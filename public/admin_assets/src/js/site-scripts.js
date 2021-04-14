
/*
**
** functions and methods are declare here
**
*/

const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success ml-2',
    cancelButton: 'btn btn-secondary'
  },
  buttonsStyling: false
});

// toast notifications 
resetToastPosition = function() {
  $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
  $(".jq-toast-wrap").css({
    "top": "",
    "left": "",
    "bottom": "",
    "right": ""
  }); //to remove previous position style
}
showToast = function(heading,text,icon) {
  'use strict';
  resetToastPosition();
  $.toast({
    heading: heading,
    text: text,
      showHideTransition: 'plain', //slide,plain,fade
      icon: icon,
      loaderBg: '#21212160',
      position: 'bottom-right'
    })
};

//copyToClipboard
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
  showToast("Copied!","Your text is Copied to Clipboard.",'success');
}

// only accepts decimal numbers
$(document).on("keypress keyup blur",".allowDcNum",function (event) {
  //this.value = this.value.replace(/[^0-9\.]/g,'');
  $(this).val($(this).val().replace(/[^0-9\.]/g,''));
  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
    event.preventDefault();
  }
});
// only accepts numbers
$(document).on("keypress keyup blur",".allowNum",function (e) {
  //if the letter is not digit then display error and don't type anything
  if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
    return false;
  }
});
/*
**  masterBtn id ex:#master
**  subBtn class ex:.sub_check
**  applyBtn id ex:#applyBtn
*/
function applyButtonDisableEnable(subCkBtn,applyBtn){
  if($(subCkBtn+':checked').length > 0){
    $(applyBtn).prop('disabled', false);;
  }
  else{
    $(applyBtn).prop('disabled',true);
  }
}
function checkbox(masterCkBtn,subCkBtn,applyBtn){
  $(document).on('click',masterCkBtn, function(e) {
    if($(this).is(':checked',true))  
    {
      $(subCkBtn).prop('checked', true);  
    } else {  
      $(subCkBtn).prop('checked',false);  
    }  
    applyButtonDisableEnable(subCkBtn,applyBtn);
  });
  $(document).on('change',subCkBtn,function(e){
    if ($(subCkBtn+':checked').length == $(subCkBtn).length) {
      $(masterCkBtn).prop('checked',true); 
    }else{
      $(masterCkBtn).prop('checked',false); 
    }
    applyButtonDisableEnable(subCkBtn,applyBtn);
  });
}

function checkBoxDataTable(masterCkBtn,s){
  
}
// createForm any form
function createForm(formId){
    var form_url = $(formId).attr('action');
    //form submitting
    $.ajax({
      url: form_url,
      type: 'POST',
      data : new FormData($(formId)[0]),
      dataType:'JSON',
      processData: false,
      contentType: false,
      xhr: function() {
        var xhr = new window.XMLHttpRequest();
        xhr.upload.addEventListener("progress", function(evt) {
          $(".progress,.overlay").toggleClass('hidden');
          $("button[type='submit']").prop('disabled',true);
          $("small.err").text('');
          if (evt.lengthComputable) {
            var percentComplete = (evt.loaded / evt.total) * 100;
            $(".progress-bar").width(percentComplete + '%');
          }
        }, false);
        return xhr;
      },
      success:function(data){
        $("#errorBlock").addClass('hidden');
        showToast('Created',data.message,'success');
        setTimeout(()=>{
          window.location.href = data.redirect_to;
        },3000);
      },
      error: function (error) {
        showToast('Error',error.responseJSON.message,'error');
        $(window).scrollTop(0); 
        $("#showErrors li").replaceWith(' ');
        $("#errorBlock").removeClass('hidden');
        $("#showErrors").html('');
        $.each(error.responseJSON.errors, function (key, val) {
          $("#"+key+"-err").text(val[0]);
          $("#showErrors").append("<li>"+ val[0] +"</li>");
        });
      },
      complete : function(){
        $(".progress,.overlay").toggleClass('hidden');
        setTimeout(()=>{
          $("button[type='submit']").prop('disabled',false);
        },3000);
        $(".progress-bar").width(0 + '%');
      }
    });
}

function form(formId,form_url,form_method="POST"){
    //form submitting
    $.ajax({
      url: form_url,
      type: form_method,
      data : new FormData($(formId)[0]),
      dataType:'JSON',
      processData: false,
      contentType: false,
      xhr: function() {
        var xhr = new window.XMLHttpRequest();
        xhr.upload.addEventListener("progress", function(evt) {
          $("button[type='submit']").prop('disabled',true);
          $("small.err").text('');
        }, false);
        return xhr;
      },
      success:function(data){
        $("#errorBlock").addClass('hidden');
        showToast('Created',data.message,'success');
        setTimeout(()=>{
          window.location.href = data.redirect_to;
        },3000);
      },
      error: function (error) {
        showToast('Error',error.responseJSON.message,'error');
        $(window).scrollTop(0); 
        $("#showErrors li").replaceWith(' ');
        $("#errorBlock").removeClass('hidden');
        $("#showErrors").html('');
        $.each(error.responseJSON.errors, function (key, val) {
          $("#showErrors").append("<li>"+ val[0] +"</li>");
        });
      },
      complete : function(){
        setTimeout(()=>{
          $("button[type='submit']").prop('disabled',false);
        },3000);
      }
    });
}

//editForm any form edit method by just pass the data_url 
function editForm(formId){
  var form_url = $(formId).attr('action');
    //form submitting
    $.ajax({
      url: form_url,
      method: 'POST',
      data : new FormData($(formId)[0]),
      dataType:'JSON',
      processData: false,
      contentType: false,
      xhr: function() {
        var xhr = new window.XMLHttpRequest();
        xhr.upload.addEventListener("progress", function(evt) {
          $(".progress,.overlay").toggleClass('hidden');
          $("button[type='submit']").prop('disabled',true);
          $("small.err").text('');
          if (evt.lengthComputable) {
            var percentComplete = (evt.loaded / evt.total) * 100;
            $(".progress-bar").width(percentComplete + '%');
          }
        }, false);
        return xhr;
      },
      success:function(data){
        showToast('Updated',data.message,'success');
        setTimeout(()=>{
          window.location.href = data.redirect_to;
        },3000);
      },
      error: function (error) {
        showToast('Error',error.responseJSON.message,'error');
        $(window).scrollTop(0); 
        $("#errorBlock").removeClass('hidden');
        $("#showErrors").html('');
        $.each(error.responseJSON.errors, function (key, val) {
          $("#"+key+"-err").text(val[0]);
          $("#showErrors").append("<li>"+ val[0] +"</li>");
        });
      },
      complete : function(){
        $(".progress,.overlay").toggleClass('hidden');
        setTimeout(()=>{
          $(document).find("button[type='submit']").prop('disabled',false);
        },3000);
        $(".progress-bar").width(0 + '%');
      }
    });
}

//get data of of ajax
function getData(getDataUrl){
  $.ajax({
      url: getDataUrl,
      type: 'POST',
      dataType: 'html',
      beforeSend:function(){
        $("div.loader").removeClass('hidden');
      },
      success:(data)=>{
        $("div.tabs_contant").html(data);
      },
      complete:(data)=>{
        $("div.loader").addClass('hidden');
      }
    });
}

function showDetails(showUrl,showInPlace = 'div.showModel',modelId = '#showModel'){
  $.ajax({
      url: showUrl,
      type: 'GET',
      dataType:'HTML',
      success:(result)=>{
        $(showInPlace).html(result);
        $(modelId).modal('show');
      }
    });
}
// move to trash single record by just pass the url of 
function moveToTrashOrDelete(trashRecordUrl){
  swalWithBootstrapButtons.fire({
      text: "You Want to move this record on trash?",
      showCancelButton: true,
      confirmButtonText: '<i class="ik trash-2 ik-trash-2"></i> Move to Trash!',
      cancelButtonText: 'Permanent Delete!',
      reverseButtons: true,
      showCloseButton : true,
      allowOutsideClick:false,
    }).then((result)=>{
      var action = (result.value) ? 'trash' : 'delete';
      if(result.value == true || result.dismiss == 'cancel'){
        $.ajax({
          url: trashRecordUrl,
          type: 'DELETE',
          data:{'action':action},
          dataType:'JSON',
          success:(result)=>{
            getData(result.getDataUrl);
            swalWithBootstrapButtons.fire({
              text: result.message,
              showConfirmButton:false,
              timer: 3000,
              timerProgressBar: true,
            }).then((result)=>{
              $("#pillsTab a[href='#live']").tab('show');
            })
          }
        });
      }
    });
}

// move to trash all record or delete all record by just pass url
function moveToTrashAllOrDelete(trashAllRecordUrl){
  var allVals = [];  
      
  $(".sub_chk:checked").each(function() {  
    allVals.push($(this).attr('data-id'));
  });  
  swalWithBootstrapButtons.fire({
    text: "You Want to move this record on trash?",
    showCancelButton: true,
    confirmButtonText: '<i class="ik trash-2 ik-trash-2"></i> Move to Trash!',
    cancelButtonText: 'Permanent Delete!',
    reverseButtons: true,
    showCloseButton : true,
    allowOutsideClick:false,
  }).then((result)=>{
    var action = (result.value) ? 'trash' : 'delete';
    if(result.value == true || result.dismiss == 'cancel'){
      $.ajax({
        url: trashAllRecordUrl,
        type: 'POST',
        data:{'action':action,'ids':allVals},
        dataType:'JSON',
        success:(result)=>{
          getData(result.getDataUrl);
          swalWithBootstrapButtons.fire({
            text: result.message,
            showConfirmButton:false,
            timer: 3000,
            timerProgressBar: true,
          }).then((result)=>{
            $("#pillsTab a[href='#live']").tab('show');
          })
        }
      });
    }
  });  
}

// move to Delete single record by just pass the url of 
function moveToDelete(trashRecordUrl){
  swalWithBootstrapButtons.fire({
      text: "You Want to Delete?",
      showCancelButton: true,
      confirmButtonText: '<i class="ik trash-2 ik-trash-2"></i> Permanent Delete!',
      cancelButtonText: 'Not Now!',
      reverseButtons: true,
      showCloseButton : true,
      allowOutsideClick:false,
    }).then((result)=>{
      var action = (result.value) ? 'trash' : 'delete';
      if(result.value == true){
        $.ajax({
          url: trashRecordUrl,
          type: 'DELETE',
          data:{'action':action},
          dataType:'JSON',
          success:(result)=>{
            getData(result.getDataUrl);
            swalWithBootstrapButtons.fire({
              text: result.message,
              showConfirmButton:false,
              timer: 3000,
              timerProgressBar: true,
            }).then((result)=>{
              $("#pillsTab a[href='#live']").tab('show');
            })
          }
        });
      }
    });
}

// move to trash all record or delete all record by just pass url
function moveToDeleteAll(trashAllRecordUrl){
  var allVals = [];  
      
  $(".sub_chk:checked").each(function() {  
    allVals.push($(this).attr('data-id'));
  });  
  swalWithBootstrapButtons.fire({
    text: "You Want to move this record on trash?",
    showCancelButton: true,
    confirmButtonText: '<i class="ik trash-2 ik-trash-2"></i> Delete selected Records!',
    cancelButtonText: 'Not Now!',
    reverseButtons: true,
    showCloseButton : true,
    allowOutsideClick:false,
  }).then((result)=>{
    if(result.value == true){
      $.ajax({
        url: trashAllRecordUrl,
        type: 'POST',
        data:{'ids':allVals},
        dataType:'JSON',
        success:(result)=>{
          getData(result.getDataUrl);
          swalWithBootstrapButtons.fire({
            text: result.message,
            showConfirmButton:false,
            timer: 3000,
            timerProgressBar: true,
          }).then((result)=>{
            $("#pillsTab a[href='#live']").tab('show');
          })
        }
      });
    }
  });  
}

// restore
function restore(restoreUrl){
  swalWithBootstrapButtons.fire({
    text: "You Want to restore this record from trash?",
    showCancelButton: true,
    confirmButtonText: '<i class="ik rotate-ccw ik-rotate-ccw"></i> Restore!',
    cancelButtonText: 'Permanent Delete!',
    reverseButtons: true,
    showCloseButton : true,
    allowOutsideClick:false,
  }).then((result)=>{
    var action = (result.value) ? 'restore' : 'delete';
    if(result.value == true || result.dismiss == 'cancel'){
      $.ajax({
        url: restoreUrl,
        type: 'POST',
        data:{'action':action},
        dataType:'JSON',
        success:(result)=>{
          getData(result.getDataUrl);
          swalWithBootstrapButtons.fire({
            text: result.message,
            showConfirmButton:false,
            timer: 3000,
            timerProgressBar: true,
          }).then((result)=>{
            $("#pillsTab a[href='#live']").tab('show');
          })
        }
      });
    }
  });
}

//restore all
function restoreAll(restoreAllUrl){
  var allVals = [];  
  $(".rst_sub_chk:checked").each(function() {  
    allVals.push($(this).attr('data-id'));
  });  
  swalWithBootstrapButtons.fire({
    text: "You Want to restore this record from trash?",
    showCancelButton: true,
    confirmButtonText: '<i class="ik rotate-ccw ik-rotate-ccw"></i> Restore!',
    cancelButtonText: 'Permanent Delete!',
    reverseButtons: true,
    showCloseButton : true,
    allowOutsideClick:false,
  }).then((result)=>{
      var action = (result.value) ? 'restore' : 'delete';
      if(result.value == true || result.dismiss == 'cancel'){
        $.ajax({
          url: restoreAllUrl,
          type: 'POST',
          data:{'action':action,'ids':allVals},
          dataType:'JSON',
          success:(result)=>{
            getData(result.getDataUrl);
            swalWithBootstrapButtons.fire({
              text: result.message,
              showConfirmButton:false,
              timer: 3000,
              timerProgressBar: true,
            }).then((result)=>{
              $("#pillsTab a[href='#live']").tab('show');
            })
          }
        });
      }
  }); 
}


/*
**
** editional events and functionality
**
*/
$(document).ready(function(){

  $('body').tooltip({
    selector: '[data-toggle="tooltip"]'
  });

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  //single record move to trash
  $(document).on('click','a.move-to-trash',function(){
    var trashRecordUrl = $(this).data('href');
    moveToTrashOrDelete(trashRecordUrl);
  });

  //single record move to delete
  $(document).on('click','a.delete',function(){
    var trashRecordUrl = $(this).data('href');
    moveToDelete(trashRecordUrl);
  });

  //select all checkboxes
  checkbox("#master",".sub_chk",'#apply');
  checkbox("#rst_master",".rst_sub_chk",'#rst_apply');

  //selected record move to trash
  $(document).on('click','.move-to-trash-all', function(e) {
    e.preventDefault();
    var trashAllRecordUrl = $(this).data('href');
    moveToTrashAllOrDelete(trashAllRecordUrl);  
  });

  //selected record move to trash
  $(document).on('click','.move-to-delete-all', function(e) {
    e.preventDefault();
    var deleteAllRecordUrl = $(this).data('href');
    moveToDeleteAll(deleteAllRecordUrl);  
  });

  //single record restore
  $(document).on('click','a.trashed-records',function(){
    var restoreUrl = $(this).data('href');
    restore(restoreUrl);
  });

  //selected record restore
  $(document).on('click','.restore-all',function(){
    var restoreAllUrl = $(this).data('href');
    restoreAll(restoreAllUrl);
  });

  //move to trash datatable
  $(document).on('click','a.move-to-trash-dt',function(){
    var trashRecordUrl = $(this).data('href');
    moveToTrashOrDeleteDT(trashRecordUrl);
  });

});


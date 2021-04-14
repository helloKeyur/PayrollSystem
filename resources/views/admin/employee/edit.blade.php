@extends('admin.layout.app')

@section('title') {{ $employee->employee_id }} - Edit Profile @endsection

@section('css')
<style type="text/css">
    .overflow-visible{
        overflow: visible !important;
    }
    .modal-sm{
      width: auto;
      max-width: 356px !important;
    }
</style>
@endsection

@section('content')

<div class="page-header">
  <div class="row align-items-end">
     <div class="col-lg-8">
        <div class="page-header-title">
           <i class="ik ik-users bg-blue"></i>
           <div class="d-inline">
              <h5>Staff</h5>
              <span>Edit Staff, Please fill all field correctly.</span>
          </div>
      </div>
  </div>
  <div class="col-lg-4">
    <nav class="breadcrumb-container" aria-label="breadcrumb">
       <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{{ route('admin.dashboard') }}"><i class="ik ik-home"></i></a>
         </li>
         <li class="breadcrumb-item">
             <a href="{{ route('admin.employee.index') }}">Staff</a>
         </li>
         <li class="breadcrumb-item">
             <a href="#">Edit</a>
         </li>
         <li class="breadcrumb-item active" aria-current="page">{{ $employee->employee_id }}</li>
     </ol>
 </nav>
</div>
</div>
</div>

<div class="row">
    <div class="col-md-8 col-sm-12 col-xl-8 offset-md-2 offset-xl-2">

        <div class="widget overflow-visible">
            <div class="progress progress-sm progress-hi-3 hidden">
                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
            </div>
            <div class="widget-body">
                <div class="overlay hidden">
                    <i class="ik ik-refresh-ccw loading"></i>
                    <span class="overlay-text">Staff {{ $employee->employee_id }} Updating...</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h5 class="text-secondary"><i class="ik ik-at-sign"></i>{!! $employee->employee_id !!} Edit</h5>
                    </div>
                </div>

                <form action="{{ $form_update }}" method="POST" enctype="multipart/form-data" id="editEmployee">
                    @method('PUT')
                    @csrf
                    <div class="row">
                      <div class="col-md-6 col-lg-6 col-sm-12">
                       <div class="form-group">
                        <label for="first_name">First Name</label><small class="text-danger">*</small>
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="John" autocomplete="off" value="{{ $employee->first_name }}">
                        <small class="text-danger err" id="first_name-err"></small>
                      </div>
                      </div>
                      <div class="col-md-6 col-lg-6 col-sm-12">
                       <div class="form-group">
                        <label for="last_name">Last Name</label><small class="text-danger">*</small>
                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Duo" autocomplete="off" value="{{ $employee->last_name }}">
                        <small class="text-danger err" id="last_name-err"></small>
                      </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="form-group">
                          <label for="email">Email</label><small class="text-danger">*</small>
                          <input type="email" name="email" class="form-control" id="email" placeholder="john@example.com" autocomplete="off" value="{{ $employee->email }}">
                          <small class="text-danger err" id="email-err"></small>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4 col-lg-4 col-sm-12">
                        <div class="form-group">
                          <label for="gender">Gender </label><small class="text-danger">*</small>
                          <select class="form-control" id="gender" name="gender">
                            <option value disabled>choose</option>
                            @php
                              $genders = ['Male','Female','Other'];
                            @endphp
                            @foreach($genders as $gender)
                              <option
                              @if($gender == $employee->gender)
                                selected
                              @endif
                              >{{ $gender }}</option>
                            @endforeach
                          </select>
                          <small class="text-danger err" id="gender-err"></small>
                        </div>
                      </div>
                      <div class="col-md-4 col-lg-4 col-sm-12">
                        <div class="form-group">
                          <label for="phone">Phone</label><small class="text-danger">*</small>
                          <input type="text" name="phone" class="form-control" id="phone" placeholder="XXXX-XXX-XXX" autocomplete="off" data-mask="0000-000-000" value="{{ $employee->phone }}">
                          <small class="text-danger err" id="phone-err"></small>
                        </div>
                      </div>
                      <div class="col-md-4 col-lg-4 col-sm-12">
                        <div class="form-group">
                          <label for="birthdate">Birthdate</label><small class="text-danger">*</small>
                          <input type="text" class="form-control datetimepicker-input" name="birthdate" id="birthdate" data-toggle="datetimepicker" data-target="#birthdate" autocomplete="off" data-value="{{ $employee->birthdate }}">
                          <small class="text-danger err" id="birthdate-err"></small>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6 col-lg-6 col-sm-12">
                       <div class="form-group">
                        <label for="position_id">Position</label><small class="text-danger">*</small>
                        <select class="form-control" name="position_id" id="position_id">
                          @foreach($positions as $position)
                            <option value="{{ $position->id }}"
                              @if($position->id==$employee->position_id)
                              selected
                              @endif 
                              >{{ $position->title }}</option>
                          @endforeach
                        </select>
                        <small class="text-danger err" id="position_id-err"></small>
                      </div>
                      </div>
                      <div class="col-md-6 col-lg-6 col-sm-12">
                       <div class="form-group">
                        <label for="schedule_id">Schedule</label><small class="text-danger">*</small>
                        <select class="form-control" name="schedule_id" id="schedule_id">
                          @foreach($schedules as $schedule)
                            <option value="{{ $schedule->id }}"
                              @if($schedule->id==$employee->schedule_id)
                              selected
                              @endif 
                              >{{ $schedule->time_in.'-'.$schedule->time_out }}</option>
                          @endforeach
                        </select>
                        <small class="text-danger err" id="schedule_id-err"></small>
                      </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-lg-6 col-sm-12">
                       <div class="form-group">
                        <label for="rate_per_hour">Rate Per Hour</label><small class="text-danger">*</small>
                        <input type="text" name="rate_per_hour" class="form-control" id="rate_per_hour" placeholder="200.00" autocomplete="off" value="{{ old('rate_per_hour',$employee->rate_per_hour) }}">
                        <small class="text-danger err" id="rate_per_hour-err">It's important for Payscal calculation.</small>
                      </div>
                      </div>
                      <div class="col-md-6 col-lg-6 col-sm-12">
                       <div class="form-group">
                        <label for="salary">Salery</label><small class="text-danger">*</small>
                        <input type="text" name="salary" class="form-control" id="salary" placeholder="45000.00" autocomplete="off" value="{{ old('salary',$employee->salary) }}">
                        <small class="text-danger err" id="salary-err">It's just informaton purpose. it will not reflect on payslip.</small>
                      </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                          <label for="address">Address</label>  <small class="text-secondary">(Optional)</small>
                          <textarea class="form-control" id="address" name="address" rows="3">{{ $employee->address }}</textarea>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                          <label for="remark">Remark</label>  <small class="text-secondary">(Optional)</small>
                          <textarea class="form-control" id="remark" name="remark" rows="3">{{ $employee->remark }}</textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                          <label for="is_active">Publish </label>
                          <select class="form-control" id="is_active" name="is_active">
                            <option value="1"
                            @if($employee->is_active)
                            selected
                            @endif 
                            >Publish Now</option>
                            <option value="0"
                            @if(!$employee->is_active)
                            selected
                            @endif 
                            >Do it Later</option>
                          </select>
                        </div>
                            <button type="submit" class="btn btn-primary"><i class="ik save ik-save"></i>Update</button>

                            <a href="{{ route('admin.employee.index') }}" class="btn btn-light"><i class="ik arrow-left ik-arrow-left"></i> Go Back</a>
                      </div>
                      <div class="col-md-6 col-lg-6 col-sm-12 {{ ($employee->media_id) ? 'hidden' : '' }}" id="add-avatar-div">
                        <div class="form-group">
                          <label for="avatar">Upload Profile Picture</label><small class="text-secondary">(Optional)</small>
                          <label for="avatar" class="btn btn-outline-danger d-block btn-block mb-0"><i class="ik ik-image"></i> Attach Document</label>
                          <input type="file" name="avatar" class="image hidden" id="avatar">
                          <small class="text-danger err" id="media-err">*Please add pixel perfect avatar of Staff.</small> 
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-6 col-sm-12 {{ (!$employee->media_id) ? 'hidden' : '' }}" id="show-avatar-div">
                        <div class="form-group my-auto">
                          <a href="{{ $removeAvatar }}" class="text-danger float-right" id="remove-avatar-profile"><i class="ik ik-x-circle"></i></a>
                          <img src="{{ $employee->media_url['thumb'] }}" class="circle-temp" id="avatar-profile">
                        </div>
                      </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!--Avatar model-->
<div class="modal" id="AvatarModel">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
        <div class="img-container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12" id="avatar-preview">
              
            </div>
          </div>
        </div>
        <div class="mt-2">
          <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12">
              <button type="button" class="btn btn-block btn-outline-secondary" data-dismiss="modal"><i class="ik x-circle ik-x-circle"></i> Close</button>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12">
              <button type="button" class="btn btn-block btn-dark" id="crop-nd-save"><i class="ik ik-crop"></i> Crop & Save</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection

@section('js')

<script type="text/javascript">

$uploadCrop = $('#avatar-preview').croppie({
    enableExif: true,
    viewport: {
        width: 312,
        height: 312,
        type: 'circle'
    },
    boundary: {
        width: 320,
        height: 320
    },
});

$model = $("#AvatarModel");

$(document).ready(function($) {
  $("#schedule_id,#position_id").select2();
  
  let birthdate = $("#birthdate").data("value");
  $('#birthdate').datetimepicker({
    defaultDate: birthdate,
    format: 'LL',
  });

  $("#editEmployee").submit(function(event){
    event.preventDefault();
    editForm("#editEmployee");
  }); 
  
  $('#avatar').on('change', function () { 
    var reader = new FileReader();
    reader.onload = function (e) {
      $uploadCrop.croppie('bind', {
        url: e.target.result
      })
    }
    reader.readAsDataURL(this.files[0]);
    $model.modal('show');
  });

  //crop and save image
  $('#crop-nd-save').on('click', function (ev) {
    $uploadCrop.croppie('result', {
      type: 'canvas',
      size: 'viewport',
      circle:false
    }).then(function (resp) {
      $.ajax({
        url: "{{ route('admin.storeMediaBase64') }}",
        type: "POST",
        data: {"file":resp},
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        beforeSend:function(){
          $("button").prop('disabled',true);
        },
        success: function (response) {
          $('form#editEmployee').append('<input type="hidden" name="media" value="' + response.name + '">');
          $("#avatar-profile").prop('src', response.profileUrl); // avatar profile show 
          $("#remove-avatar-profile").prop('href', response.removeProfileUrl);//remove button
          $("#add-avatar-div").addClass('hidden');
          $("#show-avatar-div").removeClass('hidden');
          $model.modal('hide'); // model close
        },
        complete:function(){
          $("button").prop('disabled',false);
        }
      });
    });
  });

  //remove current saved image
  $("#remove-avatar-profile").on('click',function(e){
    e.preventDefault();
    var fireUrl = $(this).prop('href'); 
    $.ajax({
        url: fireUrl,
        type: "POST",
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        beforeSend:function(){
          $("button").prop('disabled',true);
        },
        success: function (response) {
          $('<input type="hidden" name="media">').remove();
          $("#show-avatar-div").addClass('hidden');
          $("#add-avatar-div").removeClass('hidden');
        },
        complete:function(){
          $("button").prop('disabled',false);
        }
      });
  });
});
</script>
@endsection
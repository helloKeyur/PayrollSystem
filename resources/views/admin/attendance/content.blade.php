<!--data here-->
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade active show" id="live" role="tabpanel" aria-labelledby="pills-timeline-tab">

    <!--Live Attendance Data-->
    <div class="card-header">
      <div class="col-md-6 d-block">
        <a href="{{ $add_new }}" class="btn btn-sm btn-dark float-left"><i class="ik plus-square ik-plus-square"></i> Create New Attendance</a>
      </div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-primary mb-2 h-33 float-right move-to-delete-all" id="apply" disabled="true" data-href="{{ $moveToTrashAllLink }}">Action</button>
      </div>
    </div>

    <div class="card-body table-responsive">
        <table id="overtime_data_table" class="table table-striped">
          <thead>
            <tr>
              <th>Date</th>
              <th>Employee Details</th>
              <th>Time In</th>
              <th>Time Out</th>
              <th>Working Hour</th>
              <th>Actions</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
    </div>
    <!--End Live Attendance Data-->

  </div>
</div>
<!--End data here-->

<script type="text/javascript">

  $(document).ready(function() {

  // get data from serve ajax
  var merchantDataTable = $("table#overtime_data_table").DataTable({
    "processing": true,
    "serverSide": true,
    "pagingType":"full_numbers",
    "pageLength":25,
    "autoWidth": false,
    "lengthMenu": [ [10, 25, 50, 100,-1], [10, 25, 50,100, "All"] ],
    "ajax": {
      "url": "{{ $getDataTable }}",
      "type": "POST"
    },
    "columnDefs": [
    {
      'targets': 6,
      'searchable':false,
      'orderable':false,
      'render': function (data, type, full, meta){
       return "<div class='custom-control custom-checkbox pl-1 align-self-center'><label class='custom-control custom-checkbox mb-0'><input type='checkbox' class='custom-control-input sub_chk' data-id='"+$('<div/>').text(data).html()+"'><span class='custom-control-label'></span></label></div>";
     }
   },
   {
    'targets': [0,4,5,6],
    'searchable':false,
    'orderable':false,
    "className": "text-center"
  }
  ],
  "columns":[
  {"data":"date"},
  {"data":"employee"},
  {"data":"time_in_details"},
  {"data":"time_out"},
  {"data":"whr"},
  {"data":"action"},
  {"data":"id"},
  ],
});

});

</script>
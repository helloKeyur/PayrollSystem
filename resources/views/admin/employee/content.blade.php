<!--data here-->
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade active show" id="live" role="tabpanel" aria-labelledby="pills-timeline-tab">

    <!--Live Banner Data-->
    <div class="card-header">
      <div class="col-md-6 d-block">
        <a href="{{ $add_new }}" class="btn btn-sm btn-dark float-left"><i class="ik plus-square ik-plus-square"></i> Create New Employee</a>
      </div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-primary mb-2 h-33 float-right move-to-delete-all" id="apply" disabled="true" data-href="{{ $moveToTrashAllLink }}">Action</button>
      </div>
    </div>

    <div class="card-body table-responsive">
        <table id="employee_data_table" class="table table-striped">
          <thead>
            <tr>
              <th>Avatar</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Position</th>
              <th>Details</th>
              <th>Publish</th>
              <th>Actions</th>
              <th>
              
                {{-- <div class="custom-control custom-checkbox pl-1 align-self-center">
                  <label class="custom-control custom-checkbox mb-0" title="Select All" data-toggle="tooltip" data-placement="right">
                    <input type="checkbox" class="custom-control-input" id="dt-live-select-all">
                    <span class="custom-control-label"></span>
                  </label>
                </div> --}}
              
              </th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
    </div>
    <!--End Live Banner Data-->

  </div>
</div>
<!--End data here-->

<script type="text/javascript">

  $(document).ready(function() {

  // get data from serve ajax
  var merchantDataTable = $("table#employee_data_table").DataTable({
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
      'targets': 9,
      'searchable':false,
      'orderable':false,
      'render': function (data, type, full, meta){
       return "<div class='custom-control custom-checkbox pl-1 align-self-center'><label class='custom-control custom-checkbox mb-0'><input type='checkbox' class='custom-control-input sub_chk' data-id='"+$('<div/>').text(data).html()+"'><span class='custom-control-label'></span></label></div>";
     }
   },
   {
    'targets': [0,7,8,9],
    'searchable':false,
    'orderable':false,
    "className": "text-center"
  }
  ],
  "columns":[
  {"data":"avatar"},
  {"data":"first_name"},
  {"data":"last_name"},
  {"data":"phone"},
  {"data":"email"},
  {"data":"position"},
  {"data":"details"},
  {"data":"is_active"},
  {"data":"action"},
  {"data":"id"},
  ],
});

});

</script>
<!--data here-->
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade active show" id="live" role="tabpanel" aria-labelledby="pills-timeline-tab">

    <!--Live Cash Advance Data-->
    <div class="card-header">
      <div class="col-md-6 d-block">
        <a href="{{ $add_new }}" class="btn btn-sm btn-dark float-left"><i class="ik plus-square ik-plus-square"></i> Create New Cash Advance</a>
      </div>
      <div class="col-md-6">
        <button type="submit" class="btn btn-primary mb-2 h-33 float-right move-to-delete-all" id="apply" disabled="true" data-href="{{ $moveToTrashAllLink }}">Action</button>
      </div>
    </div>

    <div class="card-body table-responsive">
        <table id="cashadvance_data_table" class="table table-striped">
          <thead>
            <tr>
              <th>Date</th>
              <th>Employee Details</th>
              <th>Title</th>
              <th>Rate</th>
              <th>Actions</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            @foreach($cashadvances as $k => $advance)
            <tr>
              <td>{{ $advance->date }}</td>
              <td>
                <div class="row">
                  <div class="col-md-3 text-center">
                    <img src="{{ $advance->employee->media_url['thumb'] }}" class="rounded-circle table-user-thumb">
                  </div>
                  <div class="col-md-8 col-lg-8 my-auto">
                    <b class="mb-0">{{ $advance->employee->first_name." ".$advance->employee->last_name }} </b>
                    <p class="mb-2" title="{{ $advance->employee->employee_id }}">
                      <small>
                        <i class="ik ik-at-sign"></i>{{$advance->employee->employee_id}}
                      </small>
                    </p>
                  </div>
                  <div class="col-md-2 col-lg-2">
                    <small class="text-muted float-right"></small>
                  </div>
                </div>
              </td>
              <td>{{ $advance->title }}</td>
              <td>{{ $advance->rate_amount }}</td>
              <td>
                <div class='table-actions text-center'>
                  <a href="{{route("admin.cashadvance.edit",['slug'=>$advance->slug])}}"><i class='ik ik-edit-2 text-dark'></i></a>
                  <a data-href="{{route("admin.cashadvance.destroy",['slug'=>$advance->slug])}}" class='delete cursure-pointer'><i class='ik ik-trash-2 text-danger'></i></a>
                </div>
              </td>
              <td>
                <div class="custom-control custom-checkbox pl-1 align-self-center">
                  <label class="custom-control custom-checkbox mb-0">
                    <input type="checkbox" class="custom-control-input sub_chk" data-id="{{$advance->id}}">
                    <span class="custom-control-label"></span>
                  </label>
                </div>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
    </div>
    <!--End Live Cash Advance Data-->

  </div>
</div>
<!--End data here-->

<script type="text/javascript">
  $(document).ready(function(){
    $("#cashadvance_data_table").DataTable();
  });
</script>
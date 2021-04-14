<div class="modal fade show-employee-modal edit-layout-modal pr-0" id="showModel" tabindex="-1" role="dialog" aria-labelledby="showModelLable" aria-hidden="true" data-show="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="showModelLable"><i class="ik ik-at-sign"></i>{{ $employee->employee_id }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

        <div class="card">

          <div class="tab-content">
            <div class="tab-pane fade show active" id="overview">
              <div class="list-group">
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="row">
                    <div class="col-md-3 text-center">
                      <img src="{{ $employee->media_url['thumb'] }}" class="rounded-circle show-avatar" alt="{{ $employee->employee_id }}'s Avatar">
                    </div>
                    <div class="col-md-6 col-lg-6 my-auto">
                      <h5 class="mb-0">{{ $employee->first_name.' '.$employee->last_name }}</h5>
                      <p class="mb-2" title="employee_id"><small><i class="ik ik-at-sign"></i>{{ $employee->employee_id }}</small></p>
                    </div>
                    <div class="col-md-4 col-lg-4">
                      <small class="text-muted float-right">{{ $employee->created }}</small>
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="row">
                    <div class="col-md-3 text-right">
                      <b>Employee-Id : </b>
                    </div>
                    <div class="col-md-9">
                      <span>{{ $employee->employee_id }}</span>
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="row">
                    <div class="col-md-3 text-right">
                      <b>Email : </b>
                    </div>
                    <div class="col-md-9">
                      <span>{{ $employee->email }}</span>
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="row">
                    <div class="col-md-3 text-right">
                      <b>Phone : </b>
                    </div>
                    <div class="col-md-9">
                      <span>{{ $employee->phone }}</span>
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="row">
                    <div class="col-md-3 text-right">
                      <b>Birthdate : </b>
                    </div>
                    <div class="col-md-9">
                      <span>{{ $employee->birthdate }}</span>
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="row">
                    <div class="col-md-3 text-right">
                      <b>Gender : </b>
                    </div>
                    <div class="col-md-9">
                      <span>{{ $employee->gender }}</span>
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="row">
                    <div class="col-md-3 text-right">
                      <b>Position : </b>
                    </div>
                    <div class="col-md-9">
                      <span>{{ $employee->position->title }}</span>
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="row">
                    <div class="col-md-3 text-right">
                      <b>Remark : </b>
                    </div>
                    <div class="col-md-9">
                      <span>{{ $employee->remark }}</span>
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="row">
                    <div class="col-md-3 text-right">
                      <b>Schedule : </b>
                    </div>
                    <div class="col-md-9">
                      <span>{{ $employee->schedule->time_in.'-'.$employee->schedule->time_out }}</span>
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="row">
                    <div class="col-md-3 text-right my-auto">
                      <b>Address : </b>
                    </div>
                    <div class="col-md-9">
                      @if(!is_null($employee->address))
                      <i class='ik ik-map-pin'></i> {{ $employee->address }}
                      @endif


                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="row">
                    <div class="col-md-3 text-right my-auto">
                      <b>Publish : </b>
                    </div>
                    <div class="col-md-9">
                      @if($employee->is_active)
                      <span class="badge badge-pill badge-sm badge-success">Published</span>
                      @else
                      <span class="badge badge-pill badge-sm badge-danger">Not yet</span>
                      @endif
                    </div>
                  </div>
                </a>
                <a class="list-group-item list-group-item-action flex-column align-items-start">
                  <div class="row">
                    <div class="col-md-3 text-right my-auto">
                      <b>CreatedAt : </b>
                    </div>
                    <div class="col-md-9">
                      {{ $employee->created_on }}
                    </div>
                  </div>
                </a>

              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{ route('admin.employee.edit',['employee'=>$employee]) }}" class="btn btn-primary">Edit</a>
      </div>
    </div>
  </div>
</div>
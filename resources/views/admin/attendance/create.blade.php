@extends('admin.layout.app')

@section('title') Create Attendance @endsection

@section('css')

<style type="text/css">
    .overflow-visible{
        overflow: visible !important;
    }
    .modal-sm{
      width: auto;
      max-width: 356px !important;
    }
    .select2-container--default {
      display: block;
      width: auto !important;
    }
</style>
@endsection

@section('content')

<div class="page-header">
  <div class="row align-items-end">
     <div class="col-lg-8">
        <div class="page-header-title">
           <i class="ik ik-check-circle bg-blue"></i>
           <div class="d-inline">
              <h5>Attendance</h5>
              <span>Create Attendance, Please fill all field correctly.</span>
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
             <a href="{{ route('admin.attendance.index') }}">Attendance</a>
         </li>
         <li class="breadcrumb-item active" aria-current="page">Create</li>
     </ol>
 </nav>
</div>
</div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-12 col-xl-6 offset-md-3 offset-xl-3">

        <div class="widget overflow-visible">
            <div class="progress progress-sm progress-hi-3 hidden">
                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
            </div>
            <div class="widget-body">
                <div class="overlay hidden">
                    <i class="ik ik-refresh-ccw loading"></i>
                    <span class="overlay-text">New attendance Creating...</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h5 class="text-secondary">Create attendance</h5>
                    </div>
                </div>

                <form action="{{ $form_store }}" method="POST" enctype="multipart/form-data" id="createAttendance">
                    @csrf
                    <div class="row">
                      <div class="col-md-8 col-lg-8 col-sm-12">
                       <div class="form-group">
                        <label for="employee_id">Employee</label><small class="text-danger">*</small>
                        <select class="form-control" name="employee_id" id="employee_id">
                          @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->first_name." ".$employee->last_name." (#".$employee->employee_id.")" }}</option>
                          @endforeach
                        </select>
                        <small class="text-danger err" id="employee_id-err"></small>
                      </div>
                      </div>
                      <div class="col-md-4 col-lg-4 col-sm-12">
                        <div class="form-group">
                          <label for="date">Date</label><small class="text-danger">*</small>
                          <input type="text" class="form-control datetimepicker-input" name="date" id="date" data-toggle="datetimepicker" data-target="#date" autocomplete="off">
                          <small class="text-danger err" id="date-err"></small>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                          <label for="time_in">Time In</label><small class="text-danger">*</small>
                          <input type="text" class="form-control datetimepicker-input" id="time_in" data-toggle="datetimepicker" data-target="#time_in" name="time_in">
                          <small class="text-danger err" id="time_in-err"></small>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-6 col-sm-12">
                        <div class="form-group">
                          <label for="time_out">Time Out</label>
                          <input type="text" class="form-control datetimepicker-input" id="time_out" data-toggle="datetimepicker" data-target="#time_out" name="time_out">
                          <small class="text-danger err" id="time_out-err"></small>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-lg-12 col-sm-12">
                        <p class="text-warning small">*If there is employee check_in time is 30 min. interval then it will count in <b>OnTime</b> otherwise it will be count as <b>Late</b> check-in.</p>
                        <button type="submit" class="btn btn-primary"><i class="ik save ik-save"></i>Submit</button>
                        <a href="{{ route('admin.attendance.index') }}" class="btn btn-light"><i class="ik arrow-left ik-arrow-left"></i> Go Back</a>
                      </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function($) {
  $("#employee_id").select2();
  $('#date').datetimepicker({
    format: 'LL'
  });
  $('#time_in,#time_out').datetimepicker({
    format: 'LT'
  });
  $("#createAttendance").submit(function(event){
    event.preventDefault();
    createForm("#createAttendance");
  }); 
});
</script>
@endsection
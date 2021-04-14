@extends('admin.layout.app')

@section('title') {{ $schedule->time_in." - ".$schedule->time_out }} - Edit Schedule @endsection

@section('css')
<style type="text/css">
    .overflow-visible{
        overflow: visible !important;
    }
</style>
@endsection

@section('content')

<div class="page-header">
  <div class="row align-items-end">
     <div class="col-lg-8">
        <div class="page-header-title">
           <i class="ik ik-clock bg-blue"></i>
           <div class="d-inline">
              <h5>Schedule</h5>
              <span>Edit Schedule, Please fill all field correctly.</span>
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
             <a href="{{ route('admin.schedule.index') }}">Schedule</a>
         </li>
         <li class="breadcrumb-item">
             <a href="#">Edit</a>
         </li>
         <li class="breadcrumb-item active" aria-current="page">{{ $schedule->name }}</li>
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
                    <span class="overlay-text">Schedule {{ $schedule->name }} Updating...</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="Schedule">
                        <h5 class="text-secondary">Edit {{ $schedule->name }} Schedule</h5>
                    </div>
                </div>

                <form action="{{ $form_update }}" method="POST" id="editSchedule">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="time_in">Time In</label><small class="text-danger">*</small>
                        <input type="text" class="form-control datetimepicker-input" id="time_in" data-toggle="datetimepicker" data-target="#time_in" name="time_in" data-value="{{ $schedule->time_in }}">
                        <small class="text-danger err" id="time_in-err"></small>
                    </div>
                    <div class="form-group">
                        <label for="time_out">Time Out</label><small class="text-danger">*</small>
                        <input type="text" class="form-control datetimepicker-input" id="time_out" data-toggle="datetimepicker" data-target="#time_out" name="time_out" data-value="{{ $schedule->time_out }}">
                        <small class="text-danger err" id="time_out-err"></small>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="ik save ik-save"></i>Update</button>

                    <a href="{{ route('admin.schedule.index') }}" class="btn btn-light"><i class="ik arrow-left ik-arrow-left"></i> Go Back</a>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function(e){
  let time_in = $("#time_in").data("value");
  let time_out = $("#time_out").data("value");
  $('#time_in').datetimepicker({
    format: 'LT',
    defaultDate: moment(time_in,"h:m A"),
  });
  $('#time_out').datetimepicker({
    format: 'LT',
    defaultDate: moment(time_out,"h:m A"),
  });
  $("#editSchedule").submit(function(event){
    event.preventDefault();
    editForm("#editSchedule");
  }); 
});
</script>
@endsection
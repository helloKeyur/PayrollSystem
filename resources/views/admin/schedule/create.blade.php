@extends('admin.layout.app')

@section('title') Create Schedule @endsection

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
              <h5>Create Schedule</h5>
              <span>Create Schedule, Please fill all field correctly.</span>
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
                    <span class="overlay-text">New Schedule Creating...</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="Schedule">
                        <h5 class="text-secondary">Create Schedule</h5>
                    </div>
                </div>

                <form action="{{ $form_store }}" method="POST" id="createSchedule">
                    @csrf
                    <div class="form-group">
                        <label for="time_in">Time In</label><small class="text-danger">*</small>
                        <input type="text" class="form-control datetimepicker-input" id="time_in" data-toggle="datetimepicker" data-target="#time_in" name="time_in">
                        <small class="text-danger err" id="time_in-err"></small>
                    </div>
                    <div class="form-group">
                        <label for="time_out">Time Out</label><small class="text-danger">*</small>
                        <input type="text" class="form-control datetimepicker-input" id="time_out" data-toggle="datetimepicker" data-target="#time_out" name="time_out">
                        <small class="text-danger err" id="time_out-err"></small>
                    </div>
                    
                    <button type="submit" class="btn btn-primary"><i class="ik save ik-save"></i>Submit</button>
                    
                    <a href="{{ route('admin.schedule.index') }}" class="btn btn-light"><i class="ik arrow-left ik-arrow-left"></i> Go Back</a>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function($) {
  $('#time_in,#time_out').datetimepicker({
    format: 'LT'
  });
  $("#createSchedule").submit(function(event){
    event.preventDefault();
    createForm("#createSchedule");
  });
});
</script>
@endsection
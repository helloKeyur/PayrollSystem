@extends('admin.layout.app')

@section('title') {{ $overtime->title }} - Edit Overtime @endsection

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
           <i class="ik ik-watch bg-blue"></i>
           <div class="d-inline">
              <h5>Overtime</h5>
              <span>Edit Overtime, Please fill all field correctly.</span>
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
             <a href="{{ route('admin.overtime.index') }}">Overtime</a>
         </li>
         <li class="breadcrumb-item">
             <a href="#">Edit</a>
         </li>
         <li class="breadcrumb-item active" aria-current="page">{{ $overtime->title }}</li>
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
                    <span class="overlay-text">Overtime {{ $overtime->title }} Updating...</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h5 class="text-secondary"><i class="ik ik-at-sign"></i>{!! $overtime->title !!} Edit</h5>
                    </div>
                </div>

                <form action="{{ $form_update }}" method="POST" enctype="multipart/form-data" id="editOvertime">
                    @method('PUT')
                    @csrf
                    <div class="row">
                      <div class="col-md-8 col-lg-8 col-sm-12">
                       <div class="form-group">
                        <label for="title">Title</label><small class="text-danger">*</small>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Some Title or Resone of Overtime" autocomplete="off" value="{{ $overtime->title }}">
                        <small class="text-danger err" id="title-err"></small>
                      </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-12">
                      <div class="form-group">
                        <label for="date">Date</label><small class="text-danger">*</small>
                        <input type="text" class="form-control datetimepicker-input" name="date" id="date" data-toggle="datetimepicker" data-target="#date" autocomplete="off" data-value="{{ $overtime->date }}">
                        <small class="text-danger err" id="date-err"></small>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                     <div class="form-group">
                      <label for="employee_id">Employee</label><small class="text-danger">*</small>
                      <select class="form-control" name="employee_id" id="employee_id">
                        @foreach($employees as $employee)
                        <option value="{{ $employee->id }}"
                          @if($employee->id == $overtime->employee_id)
                          selected
                          @endif
                          >{{ $employee->first_name." ".$employee->last_name." (#".$employee->employee_id.")" }}</option>
                        @endforeach
                      </select>
                      <small class="text-danger err" id="employee_id-err"></small>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-lg-6 col-sm-12">
                   <div class="form-group">
                    <label for="rate_amount">Rate Per Hour</label><small class="text-danger">*</small>
                    <input type="text" name="rate_amount" class="form-control" id="rate_amount" placeholder="200.00" autocomplete="off" value="{{ $overtime->rate_amount }}">
                    <small class="text-danger err" id="rate_amount-err">It's important for Payscal calculation.</small>
                  </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12">
                 <div class="form-group">
                  <label for="hour">Hour</label><small class="text-danger">*</small>
                  <select class="form-control" name="hour" id="hour">
                    <option value="60"
                    @if($overtime->hour == "60")
                    selected
                    @endif
                    >1 Hr</option>
                    <option value="120" 
                    @if($overtime->hour == "120")
                    selected
                    @endif>2 Hr</option>
                    <option value="180"
                    @if($overtime->hour == "180")
                    selected
                    @endif>3 Hr</option>
                    <option value="240" 
                    @if($overtime->hour == "240")
                    selected
                    @endif
                    >4 Hr</option>
                    <option value="300" 
                    @if($overtime->hour == "300")
                    selected
                    @endif
                    >5 Hr</option>
                  </select>
                  <small class="text-danger err" id="hour-err"></small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                  <label for="description">Description</label>  <small class="text-secondary">(Optional)</small>
                  <textarea class="form-control" id="description" name="description" rows="3">{{ $overtime->description }}</textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-lg-12 col-sm-12">
                <button type="submit" class="btn btn-primary"><i class="ik save ik-save"></i>Update</button>
                <a href="{{ route('admin.overtime.index') }}" class="btn btn-light"><i class="ik arrow-left ik-arrow-left"></i> Go Back</a>
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
  
  let date = $("#date").data("value");
  $('#date').datetimepicker({
    defaultDate: date,
    format: 'LL',
  });

  $("#editOvertime").submit(function(event){
    event.preventDefault();
    editForm("#editOvertime");
  }); 
});
</script>
@endsection
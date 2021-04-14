@extends('admin.layout.app')

@section('title') {{ $deduction->title }} - Edit Deduction @endsection

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
           <i class="ik ik-file-minus bg-blue"></i>
           <div class="d-inline">
              <h5>Deduction</h5>
              <span>Edit Deduction, Please fill all field correctly.</span>
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
             <a href="{{ route('admin.deduction.index') }}">Deduction</a>
         </li>
         <li class="breadcrumb-item">
             <a href="#">Edit</a>
         </li>
         <li class="breadcrumb-item active" aria-current="page">{{ $deduction->name }}</li>
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
                    <span class="overlay-text">Deduction {{ $deduction->name }} Updating...</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="Deduction">
                        <h5 class="text-secondary">Edit {{ $deduction->name }} Deduction</h5>
                    </div>
                </div>

                <form action="{{ $form_update }}" method="POST" id="editDeduction">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label><small class="text-danger">*</small>
                        <input type="text" name="name" class="form-control" id="name" placeholder="ex: Standard Deduction" autocomplete="off" value="{{ $deduction->name }}">
                        <small class="text-danger err" id="name-err"></small>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label><small class="text-danger">*</small>
                        <input type="text" name="amount" class="form-control" id="amount" placeholder="ex: 200.15" autocomplete="off" value="{{ $deduction->amount }}">
                        <small class="text-danger err" id="amount-err"></small>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="description">Description</label>
                          <textarea class="form-control" id="description" name="description" placeholder="Some description about Deduction...">{{ old('description',$deduction->description) }}</textarea>
                          <small class="text-danger err" id="description-err"></small>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="ik save ik-save"></i>Update</button>

                    <a href="{{ route('admin.deduction.index') }}" class="btn btn-light"><i class="ik arrow-left ik-arrow-left"></i> Go Back</a>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function($) {
  $("#editDeduction").submit(function(event){
    event.preventDefault();
    editForm("#editDeduction");
  }); 
});
</script>
@endsection
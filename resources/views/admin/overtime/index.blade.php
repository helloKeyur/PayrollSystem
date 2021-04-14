@extends('admin.layout.app')

@section('title') Overtimes @endsection

@section('css')
<style type="text/css">
    .overflow-visible{
        overflow: visible !important;
    }
    td.p-0 img.img-thumbnail{
      width: 140px;
    }
    button.h-33{
      height: 33px !important;
    }
    #map{
      height: 500px;
      border: 2px solid #00000054;
      border-radius: 11px;
    }s
</style>
@endsection

@section('content')

<div class="page-header">
  <div class="row align-items-end">
    <div class="col-lg-8">
      <div class="page-header-title">
        <i class="ik ik-watch bg-blue"></i>
        <div class="d-inline">
          <h5>Overtimes</h5>
          <span>You can show and manage Overtimes from here.</span>
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
            <a href="{{ route('admin.overtime.index') }}">Overtimes</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">List of Overtimes</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 col-md-12 mt-4">
      <div class="card">

        <!--Tab content-->
        <div class="loader br-4 hidden">
          <i class="ik ik-refresh-cw loading"></i>
          <span class="loader-text">Data Fetching....</span>
        </div>
        <div class="tabs_contant">
          <div class="card-header">
            <h5>List of Overtimes</h5>
          </div>
          <div class="card-body">
              
          </div>
        </div>
        <!--End Tab Content-->
      </div>
    </div>
  </div>
  
</div>

<div class="row">
    <div class="col-md-12">
        <form id="deleteForm" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" name="submit" class="hidden">
        </form>
    </div>
</div>

<div class="showModel">
 
</div>

@endsection

@section('js')

<script type="text/javascript">
  
$(document).ready(function() {

  // get data from serve ajax
  const getDataUrl = "{{ $get_data }}"
  getData(getDataUrl);


  //show employee
  $(document).on('click','a.show-employee',function(){
    var showUrl = $(this).data('href');
    showDetails(showUrl);
  });

});
</script>
@endsection
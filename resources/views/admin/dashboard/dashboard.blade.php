@extends('admin.layout.app')

@section('title') Dashboard @endsection

@section('css')
<style type="text/css">

</style>
@endsection

@section('content')

<div class="page-header">
  <div class="row align-items-end">
   <div class="col-lg-8">
    <div class="page-header-title">
     <i class="ik ik-bar-chart bg-blue"></i>
     <div class="d-inline">
      <h5>Dashboard</h5>
      <span>This is dashboard of the PeSystem.</span>
    </div>
  </div>
</div>
<div class="col-lg-4">
  <nav class="breadcrumb-container" aria-label="breadcrumb">
   <ol class="breadcrumb">
    <li class="breadcrumb-item">
     <a href="../../index.html"><i class="ik ik-home"></i></a>
   </li>
   <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
 </ol>
</nav>
</div>
</div>
</div>

<div class="container-fluid">
  <div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-12 cursure-pointer">
      <a href="#">
        <div class="widget bg-primary">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Total Employees</h6>
                <h2>{{ $counts['employees'] }}</h2>
              </div>
              <div class="icon">
                <i class="ik ik-users"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 cursure-pointer">
      <a href="#">
        <div class="widget bg-success">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>On Time Percentage</h6>
                <h2>{{ $counts['on_time_perc'] }}%</h2>
              </div>
              <div class="icon">
                <i class="ik ik-pie-chart"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 cursure-pointer">
      <a href="#">
        <div class="widget bg-warning">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>On Time Today</h6>
                <h2>{{ $counts['on_time_attendance'] }}</h2>
              </div>
              <div class="icon">
                <i class="ik ik-clock"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12 cursure-pointer">
      <a href=#>
        <div class="widget bg-danger">
          <div class="widget-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="state">
                <h6>Late Today</h6>
                <h2>{{ $counts['late_attendance'] }}</h2>
              </div>
              <div class="icon">
                <i class="ik ik-alert-circle"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-6 col-md-6 col-sm-12">
      <div class="card table-card">
        <div class="card-header">
          <h3>Somthing about Deductions </h3>
          <div class="card-header-right"></div>
        </div>
        <div class="card-block pb-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0 without-header">
              <tbody>
                @foreach($deductions as $deduction)
                <tr>
                  <td>
                    <h3>{{ $deduction->amount }}</h3>
                  </td>
                  <td>
                    <p class="font-weight-bold">{{ $deduction->name }}</p>
                    <p>{{ $deduction->description }}</p>
                  </td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="2" class="text-right text-primary">Rs.{{ $total_deduction }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-md-6 col-sm-12">
      <div class="card latest-update-card">
        <div class="card-header">
          <h3>Latest Positions</h3>
          <div class="card-header-right"></div>
        </div>
        <div class="card-block">
          <div class="scroll-widget">
            <div class="latest-update-box">
              @foreach($positions as $position)
              <div class="row pt-20 pb-30">
                <div class="col-auto text-right update-meta pr-0">
                  <i class="b-primary update-icon ring"></i>
                </div>
                <div class="col pl-5">
                  <a href="#!"><h6>{{ $position->title }}</h6></a>
                  <p class="text-muted mb-0">{{ $position->description }}</p>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
<script type="text/javascript">

</script>
@endsection
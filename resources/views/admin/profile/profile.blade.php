@extends('admin.layout.app')

@section('title') Profile ({{ $user['username'] }}) - ApiDocs @endsection

@section('css')
<style type="text/css">

</style>
@endsection

@section('content')

<div class="page-header">
  <div class="row align-items-end">
     <div class="col-lg-8">
        <div class="page-header-title">
           <i class="ik user ik-user bg-blue"></i>
           <div class="d-inline">
              <h5>Profile</h5>
              <span>Here you can view and edit your profile detailes.</span>
          </div>
      </div>
  </div>
  <div class="col-lg-4">
    <nav class="breadcrumb-container" aria-label="breadcrumb">
       <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{{ $user['name'] }}"><i class="ik ik-home"></i></a>
         </li>
         <li class="breadcrumb-item">
             <a href="#">Profile</a>
         </li>
         <li class="breadcrumb-item active" aria-current="page">{{ $user['username'] }}</li>
     </ol>
 </nav>
</div>
</div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="card new-cust-card">
            <div class="card-body">
                <div class="text-center"> 
                    <img src="{{ asset('admin_assets/avatars/admin/admin.png') }}" class="rounded-circle" width="150">
                    <h4 class="card-title mt-10">{{ $user['name'] }}</h4>
                    <p class="text-dark font-weight-bold">{{ $user['username'] }}</p>
                    <p class="text-muted">Super Admin</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Profile</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade active show" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                    <div class="card-body">
                        
                        @if($errors->any())
                        <div class="alert {{ session()->get('bgcolor') }} text-light alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ik ik-x"></i>
                            </button>
                        </div>

                        @endif

                        

                        <form class="form-horizontal" method="post" action="{{ $form_url }}">
                            @csrf

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" placeholder="@johnathan_doe" class="form-control" name="username" id="username" value="{{ $user['username'] }}">
                            </div>


                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" placeholder="johnathan@admin.com" class="form-control" id="email" value="{{ $user['email'] }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="password">Current Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                                <span class="text-muted">*Please Enter current Password to save your Profile.</span>
                            </div>

                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password (*if you want to change your password.)">
                                <span class="text-danger">*Not Requried, If you want to change your password then enter New Password Only.</span>
                            </div>

                            <button class="btn btn-success" type="submit">Update Profile</button>
                        </form>
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
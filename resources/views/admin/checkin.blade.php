@extends('admin.layout.auth')

@section('title') Check-In | Pe System Admin  @endsection

@section('css')
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/sweetalert/dist/bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin_assets/plugins/jquery-toast-plugin/dist/jquery.toast.min.css') }}">
<style type="text/css">
    .border-time{
        padding: 7px 11px;
        border-radius: 5px;
    }
</style>
@endsection

@section('content')

<div class="authentication-form mx-auto">
    <div class="logo-centered">
        <h2><b>Pe<font color="#f05138">.</font></b></h2>
    </div>
    <h3>Check-In/Out to Pe System</h3>
    <p class="text-center">Happy to see you again!</p>
    <p class="clearfix border border-time">
      <span class="float-left" id="date"></span>  
      <span class="float-right font-weight-bold" id="time"></span>  
    </p>
     
    @if($errors->any())
    <div class="alert bg-danger text-light alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
            <span>{{ $error }}</span>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="ik ik-x"></i>
        </button>
    </div>
    @endif

    <form data-action="{{ $form_url }}" method="post" id="form">
        @method('POST')
        @csrf
        <div class="form-group">
            <input type="text" name="employee_id" class="form-control" placeholder="Employee ID (ex: EMP00XXXXXXXX)" required="">
            <input type="hidden" name="date" id="date_input">
            <input type="hidden" name="time_in" id="time_in_input">
            <input type="hidden" name="_method" id="method_input">
            <i class="ik ik-user"></i>
        </div>
        <div class="form-group">
            <select class="form-control" name="time" id="time_input">
                <option value="time_in">Time In</option>
                <option value="time_out">Time Out</option>
            </select>
            <i class="ik ik-check-circle"></i>
        </div>
        <div class="form-group" id="errorBlock">
            <ul id="showErrors" class="text-danger"></ul>
        </div>
        <div class="sign-btn text-center">
            <button class="btn btn-theme" type="submit">SUBMIT</button>
        </div>
    </form>
</div>


@endsection

@section('js')
<script src="{{ asset('admin_assets/plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
<script src="{{ asset('admin_assets/plugins/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
<script src="{{ asset('admin_assets/plugins/moment/moment.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin_assets/src/js/site-scripts.js') }}"></script>
<script type="text/javascript">
/**
* Date and Time
**/
var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
    
    $('#time_in_input').val(momentNow.format('LT'));
}, 100);
$('#date_input').val(moment().format('YYYY-MM-DD'));

$(document).ready(function($) {
    $("#form").submit(function(event){
        event.preventDefault();
        let form_url = $(this).data('action');
        let form_method = ($("#time_input").val() == "time_in") ? "POST" : "PUT";
        $("#method_input").val(form_method);
        form("#form",form_url);
    }); 
}); 
</script>
@endsection
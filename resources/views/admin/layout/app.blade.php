<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title') | PeSystem - A System for HR Payment Generator.</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('admin_assets/favicon.ico') }}" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/icon-kit/dist/css/iconkit.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/ionicons/dist/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/jquery-toast-plugin/dist/jquery.toast.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/summernote/dist/summernote-bs4.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/jquery-minicolors/jquery.minicolors.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/weather-icons/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/c3/c3.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/mohithg-switchery/dist/switchery.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/sweetalert/dist/bootstrap-4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/plugins/json-viewer/jquery.json-viewer.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/theme.min.css') }}">
        <script src="{{ asset('admin_assets/src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/dist/css/site-style.css') }}">
        @yield('css')

    </head>

    <body>
        
        <div class="wrapper">
            <header class="header-top" header-theme="light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="top-menu d-flex align-items-center">
                            
                            <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                        </div>
                        <div class="top-menu d-flex align-items-center">
                            <div class="">
                                <span class="text-secondary mr-2">Hi, {{ Auth::user()->username }}</span>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{ asset('admin_assets/avatars/admin/admin.png') }}" alt=""></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.profile.index') }}"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                                    
                                    <a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </header>

            <div class="page-wrap">
                <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="{{ url('/') }}">
                            <div class="logo-img">
                               <img src="{{ asset('./admin_assets/tile_192.png') }}" width="32">
                            </div>
                            <small class="text pl-2"><b>Pe</b>System</small>

                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        @include('admin.layout.menu')
                    </div>
                </div>
                <div class="main-content">
                    <div class="container-fluid">
                       
                        @yield('content')
                        
                    </div>
                </div>

                

                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">copyright@2021 - PeSystem Inc.</span>
                        
                    </div>
                </footer>
                
            </div>
        </div>
        
        
        

        
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
        <script>window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
        <script src="{{ asset('admin_assets/plugins/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/select2/dist/js/select2.min.js') }}" ></script>
        <script src="{{ asset('admin_assets/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/ckeditor5/build/ckeditor.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/screenfull/dist/screenfull.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/moment/moment.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/jquery-minicolors/jquery.minicolors.min.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/d3/dist/d3.min.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/c3/c3.min.js') }}"></script>
        <script src="{{ asset('admin_assets/js/tables.js') }}"></script>
        <script src="{{ asset('admin_assets/js/widgets.js') }}"></script>
        <script src="{{ asset('admin_assets/js/charts.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/mohithg-switchery/dist/switchery.min.js') }}"></script>
        <script src="{{ asset('admin_assets/plugins/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
        <script src="{{ asset('admin_assets/plugins/JQuery-mask-plugin/jquery.mask.min.js')}}"></script>
        <script src="{{ asset('admin_assets/plugins/owl.carousel/dist/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('admin_assets/plugins/json-viewer/jquery.json-viewer.js')}}"></script>
        <script src="{{ asset('admin_assets/plugins/jquery.repeater/jquery.form-repeater.min.js')}}"></script>
        {{-- <script src="http://malsup.github.com/jquery.form.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

        <script src="{{ asset('admin_assets/plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
        <script src="{{ asset('admin_assets/dist/js/theme.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
        <script type="text/javascript" src="{{ asset('admin_assets/src/js/site-scripts.js') }}"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>

        @yield('js')
    </body>
</html>

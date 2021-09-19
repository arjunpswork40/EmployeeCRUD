<!doctype html>
<html lang="en-AU">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') . ' | '   }}</title>
        <link rel="shortcut icon" href="{{ asset('web_components/images/fav.png') }}" type="image/x-icon" />
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('/bower_components/admin-lte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/bower_components/admin-lte/plugins/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/bower_components/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/bower_components/css/bootstrap-datepicker.css') }}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/admin.css?v=2.13') }}">
        @stack('styles')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('includes.header')
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="{{ url('/') }}" class="brand-link">
                    <img src="{{ asset('web_components/images/logo.svg') }}" alt="{{ config('app.name') }}" class="brand-image  elevation-3" style="opacity: .8;box-shadow: none!important;"><br>
                </a>
                @include('includes.sid-nav')
            </aside>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                {{-- <h1 class="m-0 text-dark">{{ $title }}</h1> --}}
                            </div>
                            @include('includes.breadcrumb')
                        </div>
                    </div>
                </div>
                <div class="content">
                    @yield('content')
                </div>
            </div>
            <aside class="control-sidebar control-sidebar-dark">
                <div class="p-3">
                    <h5>Title</h5>
                    <p>Sidebar content</p>
                </div>
            </aside>
            <footer class="main-footer" align="center">
                <div class="float-right d-none d-sm-inline">
                    <span class="date-time"></span>
                </div>
                <strong>Copyright &copy; {{ date('Y') }} <a href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a>.</strong> All rights reserved.
            </footer>
        </div>
        <div class="loading_overlay">
            <div class="spinner-border text-primary" id="spinner" role="status"></div>
            <span class="loading_overlay_cnt">Processing your request, please do not reload page...</span>
        </div>

        <script src="{{ asset('bower_components/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('bower_components/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('bower_components/js/popper.min.js') }}"></script>
        <script src="{{ asset('bower_components/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('bower_components/js/bootstrap-datepicker.min.js') }}"></script>



{{--        <script src="{{ asset('bower_components/admin-lte/plugins/jquery/jquery.min.js') }}"></script>--}}
{{--        <script src="{{ asset('bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}
        <script src="{{ asset('bower_components/admin-lte/dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('bower_components/admin-lte/plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('/bower_components/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>




{{--        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>--}}
        <script src="//js.pusher.com/3.1/pusher.min.js"></script>
{{--        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>--}}

        



        @stack('scripts')
    </body>
</html>

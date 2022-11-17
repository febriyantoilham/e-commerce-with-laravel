<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dashboards') }}</title>

    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    
    <!-- Nucleo Icons -->
    <link href="{{ asset('admin/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('admin/css/argon-dashboard.css?v=2.0.4') }}">
    
</head>
<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    
    <div class="">
        @include('layouts.include.admin.sidebar')
        <div class="main-content position-relative border-radius-lg">
            @include('layouts.include.admin.navbar')
            <div class="container-fluid py-4">
                <div class="content">
                    @yield('content')
                </div>
                @include('layouts.include.admin.footer')
            </div>
        </div>
    </div>

    {{-- @include('layouts.include.admin.fixedNavbar') --}}

    <!--   Core JS Files   -->
    <script src="{{ asset('/admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/admin/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/admin/js/plugins/chartjs.min.js') }}"></script>

    <script src="{{ asset('/admin/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
    <script src="intl-currency-input.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
        <script>
            swal("{{ session('status') }}")
        </script>
    @endif
    

    @yield('scripts')
</body>
</html>

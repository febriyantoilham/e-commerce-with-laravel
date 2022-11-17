<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <link href="{{ asset('admin/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('admin/css/argon-dashboard.css?v=2.0.4') }}">
    <link rel="stylesheet" href="{{ asset('store/css/styles.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('store/css/bootstrap.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('store/css/carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('store/css/carousel/owl.theme.default.min.css') }}">
    
</head>
<body class="">
    
    @include('layouts.include.store.navbar')
    <div class="content">
        @yield('content')
    </div>
    @include('layouts.include.store.footer')

    {{-- @include('layouts.include.admin.fixedNavbar') --}}

    <!--   Core JS Files   -->
    <script src="{{ asset('/store/js/jquery-3.6.1.js') }}"></script>
    <script src="{{ asset('/store/js/carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/store/js/myScripts.js') }}"></script>
    
    {{-- <script src="{{ asset('/admin/js/argon-dashboard.min.js?v=2.0.4') }}"></script> --}}
    <script src="{{ asset('/store/js/bootstrap.bundle.min.js') }}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
        <script>
            swal("{{ session('status') }}")
        </script>
    @endif
    @yield('scripts')
</body>
</html>

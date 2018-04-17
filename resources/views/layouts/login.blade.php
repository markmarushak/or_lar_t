<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Orbitleads</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {!! Html::style('assets/vendors/base/vendors.bundle.css') !!}
    {!! Html::style('assets/demo/default/base/style.bundle.css') !!}
    @yield('css')


</head>
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/vendors/base/vendors.bundle.js') }}"></script>
    <script src="{{ asset('assets/demo/default/base/scripts.bundle.js') }}"></script>
        <script src="{{ asset('assets/snippets/custom/pages/user/login.js') }}"></script>
</body>
</html>

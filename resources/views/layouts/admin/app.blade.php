<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
{{--    <title>{{ getSetting('SITE_TITLE') }} | @yield('title')</title>--}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    {{--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>--}}
    <!--end::Web font -->
    <!--begin::Base Styles -->
{!! Html::style('assets/vendors/base/vendors.bundle.css') !!}
{!! Html::style('assets/demo/default/base/style.bundle.css') !!}

{!! Html::style('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') !!}


@yield('css')
<!--end::Base Styles -->
<link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico"/>
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
@include('layouts.admin._layout')
<!--begin::Base Scripts -->


{!! Html::script('assets/vendors/base/vendors.bundle.js') !!}
{!! Html::script('assets/demo/default/base/scripts.bundle.js') !!}
<!--end::Base Scripts -->
<!--begin::Page Snippets -->

{!! Html::script('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') !!}
{!! Html::script('assets/app/js/dashboard.js') !!}


<!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>

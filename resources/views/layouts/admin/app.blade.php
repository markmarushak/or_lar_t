<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 5.0.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="{{ app()->getLocale() }}">
<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>

    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->
    <!--begin::Base Styles -->



{!! Html::style('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') !!}
{!! Html::style('assets/vendors/base/vendors.bundle.css') !!}
{!! Html::style('assets/vendors/custom/datatables/datatables.bundle.css') !!}
{!! Html::style('assets/vendors/custom/datatables/style.bundle.css') !!}
{!! Html::style('assets/admin/css/admin.min.css') !!}
{!! Html::style('assets/admin/css/style.css') !!}
{!! Html::style('assets/admin/css/simple-line-icons-webfont/simple-line-icons.css') !!}


@yield('css')
<!--end::Base Styles -->
    <link rel="shortcut icon" href="/assets/demo/default/media/img/logo/favicon.ico"/>


</head>
<!-- end::Head -->
<!-- end::Body -->

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<!--begin::Base Scripts -->

{{--
{!! Html::script('https://keenthemes.com/metronic/preview/assets/vendors/base/vendors.bundle.js') !!}
{!! Html::script('https://keenthemes.com/metronic/preview/assets/demo/default/custom/components/datatables/base/data-local.js') !!}
{!! Html::script('https://keenthemes.com/metronic/preview/assets/demo/default/base/scripts.bundle.js') !!}
--}}

{{--{!! Html::script('assets/demo/default/custom/components/base/util.js') !!}--}}
{!! Html::script('assets/vendors/base/vendors.bundle.js') !!}
{!! Html::script('js/crud.js') !!}
{!! Html::script('assets/vendors/custom/datatables/datatables.bundle.js') !!}
{!! Html::script('assets/demo/default/base/scripts.bundle.js') !!}
{!! Html::script('assets/admin/js/script.js') !!}
{!! Html::script('assets/demo/default/custom/components/base/bootstrap-notify.js') !!}
<!--end::Base Scripts -->
<!--begin::Page Snippets -->
{!! Html::script('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') !!}
{!! Html::script('assets/demo/default/custom/components/datatables/base/basic.js') !!}
{!! Html::script('assets/app/js/dashboard.js') !!}
{!! Html::script('assets/app/js/my.js') !!}
{!! Html::script('js/laroute.js') !!}

@include('layouts.admin.layout')

<!--end::Page Snippets -->
</body>
<!-- end::Body -->
</html>

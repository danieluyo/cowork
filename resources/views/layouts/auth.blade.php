<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    @include('globals.head_meta')
    <link rel="apple-touch-icon" href="{{config('cache.static_files_root')}}/assets/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="{{config('cache.static_files_root')}}/assets/img/favicon.ico">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{config('cache.static_files_root')}}/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{config('cache.static_files_root')}}/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="{{config('cache.static_files_root')}}/assets/css/site.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{config('cache.static_files_root')}}/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="{{config('cache.static_files_root')}}/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="{{config('cache.static_files_root')}}/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="{{config('cache.static_files_root')}}/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="{{config('cache.static_files_root')}}/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="{{config('cache.static_files_root')}}/global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="{{config('cache.static_files_root')}}/global/vendor/waves/waves.css">
    @yield('scripts-header')
    <!-- Fonts -->
    <link rel="stylesheet" href="{{config('cache.static_files_root')}}/global/fonts/material-design/material-design.min.css">
    <link rel="stylesheet" href="{{config('cache.static_files_root')}}/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <!--[if lt IE 9]>
    <script src="{{config('cache.static_files_root')}}/global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="{{config('cache.static_files_root')}}/global/vendor/media-match/media.match.min.js"></script>
    <script src="{{config('cache.static_files_root')}}/global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="{{config('cache.static_files_root')}}/global/vendor/modernizr/modernizr.js"></script>
    <script src="{{config('cache.static_files_root')}}/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="@yield('body-class') layout-full">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Page -->
<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
     data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
        @yield('content')
        @include('globals.footer_centered')
    </div>
</div>
<!-- End Page -->
<!-- Core  -->
<script src="{{config('cache.static_files_root')}}/global/vendor/jquery/jquery.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/bootstrap/bootstrap.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/animsition/animsition.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/asscroll/jquery-asScroll.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/mousewheel/jquery.mousewheel.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/asscrollable/jquery.asScrollable.all.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/waves/waves.js"></script>
<!-- Plugins -->
<script src="{{config('cache.static_files_root')}}/global/vendor/switchery/switchery.min.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/intro-js/intro.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/screenfull/screenfull.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/slidepanel/jquery-slidePanel.js"></script>
<script src="{{config('cache.static_files_root')}}/global/vendor/jquery-placeholder/jquery.placeholder.js"></script>
<!-- Scripts -->
<script src="{{config('cache.static_files_root')}}/global/js/core.js"></script>
<script src="{{config('cache.static_files_root')}}/assets/js/site.js"></script>
<script src="{{config('cache.static_files_root')}}/assets/js/sections/menu.js"></script>
<script src="{{config('cache.static_files_root')}}/assets/js/sections/menubar.js"></script>
<script src="{{config('cache.static_files_root')}}/assets/js/sections/gridmenu.js"></script>
<script src="{{config('cache.static_files_root')}}/assets/js/sections/sidebar.js"></script>
<script src="{{config('cache.static_files_root')}}/global/js/configs/config-colors.js"></script>
<script src="{{config('cache.static_files_root')}}/assets/js/configs/config-tour.js"></script>
<script src="{{config('cache.static_files_root')}}/global/js/components/asscrollable.js"></script>
<script src="{{config('cache.static_files_root')}}/global/js/components/animsition.js"></script>
<script src="{{config('cache.static_files_root')}}/global/js/components/slidepanel.js"></script>
<script src="{{config('cache.static_files_root')}}/global/js/components/switchery.js"></script>
<script src="{{config('cache.static_files_root')}}/global/js/components/tabs.js"></script>
<script src="{{config('cache.static_files_root')}}/global/js/components/jquery-placeholder.js"></script>
<script src="{{config('cache.static_files_root')}}/global/js/components/material.js"></script>
<script>
    (function(document, window, $) {
        'use strict';
        var Site = window.Site;
        $(document).ready(function() {
            Site.run();
        });
    })(document, window, jQuery);
</script>
</body>
</html>
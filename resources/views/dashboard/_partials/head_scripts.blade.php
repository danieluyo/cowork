<link rel="apple-touch-icon" href="{{config('cache.static_files_root')}}/assets/images/apple-touch-icon.png">
<link rel="shortcut icon" href="{{config('cache.static_files_root')}}/assets/images/favicon.ico">
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
<!-- Fonts -->
<link rel="stylesheet"
      href="{{config('cache.static_files_root')}}/global/fonts/material-design/material-design.min.css">
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

@yield('scripts-header')
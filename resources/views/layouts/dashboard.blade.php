<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    @include('globals.head_meta')
    @include('dashboard._partials.head_scripts')

</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
@include('dashboard._partials.left.menu_bar')

        <!-- Content -->
<div class="page animsition" style="/*background:#F3F4F5;*/height:100%;">
    {{--<div class="page-content">--}}
    <div class="col-lg-8 col-md-10 padding-top-70" style="background:white;">
        {{--@include('dashboard._partials.top.toolbar')--}}
        <div class="page-header">
            <h1 class="page-title">@yield('title')</h1>
            <p class="page-description">
                @yield('page-description')
            </p>
        </div>
        @yield('content')
    </div>
    <div class="col-lg-4 col-md-2 padding-top-70">
        <div class="page-header">
            <h6 class="page-title">@yield('sidebar-title')</h6>
            <p class="page-description">
                @yield('sidebar-description')
            </p>
        </div>
        @yield('sidebar-content')
    </div>


    {{--</div>--}}
</div>
<!-- End Content -->

<!-- Footer -->
@include('dashboard._partials.footer')

</body>
</html>
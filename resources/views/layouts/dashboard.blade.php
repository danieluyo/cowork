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

@include('dashboard._partials.top.toolbar')
@include('dashboard._partials.left.menu_bar')

<!-- Content -->
<div class="page animsition">
    <div class="page-content">
        <h2>Blank</h2>
        <p>Page content goes here</p>
        @yield('content')
    </div>
</div>
<!-- End Content -->

<!-- Footer -->
@include('dashboard._partials.footer')

</body>
</html>
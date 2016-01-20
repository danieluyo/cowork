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
<div class="page animsition" style="background: #e7e7e7;">

    <div class="row">
        <div class="col-md-6" style="background: #fff;width:620px;float:left;">
            <div class="page-header">
                <h1 class="page-title">@yield('title')</h1>
            </div>
            <div class="panel-heading">
                <h3 class="panel-title">@yield('page-description')</h3>
            </div>
            <div class="panel-body">
                @yield('content')
            </div>
        </div>


        <div style="background: #e7e7e7;height:100%;overflow: auto;">
            <div class="page-header">
                <h4 class="page-title">@yield('sidebar-title')</h4>
            </div>
            <div class="panel-body">
                @yield('sidebar-content')
            </div>

            {{--<section class="page-aside-section">--}}
                {{--<h5 class="page-aside-title"></h5>--}}
                {{--<div class="list-group">--}}

                {{--</div>--}}
            {{--</section>--}}
        </div>
    </div>
</div>
</div>
<!-- End Content -->

<!-- Footer -->
@include('dashboard._partials.footer')

</body>
</html>
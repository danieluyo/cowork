{{--    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">--}}
<link rel="stylesheet" href="/css/all.css">
@if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="//cdn.rawgit.com/morteza/bootstrap-rtl/master/dist/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="/css/rtl.css">
@endif

<link href="/css/font-awesome.min.css" rel="stylesheet">
<link href="/css/hover.min.css" rel="stylesheet">

@yield('head')



<title>@yield('title') | {{ trans('app.name') }}</title>

@include('dashboard._partials.header_scripts')

@include('dashboard._partials.header')
@include('dashboard._partials.mmenu')
@yield('content')

Copyright {{ Date('Y') }} <a href='{{ route('dashboard.index') }}'>{{ trans('app.name') }}</a>
@include('dashboard._partials.footer_scripts')
<!DOCTYPE html>
{{--<html dir="{{Localization::getCurrentLocaleDirection()}}"--}}
{{--lang="{{Localization::getCurrentLocale()}}"--}}
{{--class="{{Localization::getCurrentLocaleDirection()}}">--}}
<html dir="ltr" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="{{ config('app.description') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta http-equiv="cleartype" content="on">

    <link rel="shortcut icon" type="image/png" href="{{asset("/favicon.ico")}}">

    <title>@yield('title') | {{ trans('app.name') }}</title>

    @include('frontend._partials.head_scripts')

</head>


@include('frontend._partials.footer_Scripts')


@extends('layouts.errors')

@section('title','Not Found')
@section('body-class','page-error-404')

@section('content')
    <header>
        <h1 class="animation-slide-top">404</h1>
        <p> PAGE NOT FOUND !</p>
    </header>
    <p class="error-advise">
        YOU SEEM TO BE TRYING TO FIND HIS WAY HOME
    </p>
    <a class="btn btn-success btn-round" href="{{ url('/') }}">GO TO HOME PAGE</a>
@endsection
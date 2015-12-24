@extends('layouts.errors')

@section('title','Be Right Back')
@section('body-class','page-error-404')

@section('content')
    <header>
        <h1 class="animation-slide-top">503</h1>
        <p><i class="text-warning icon md-settings icon-spin page-maintenance-icon" aria-hidden="true"></i> Be Right Back!</p>
    </header>
    <p class="error-advise">
        PLEASE GIVE US A MOMENT TO SORT THINGS OUT.
    </p>
    {{--<a class="btn btn-primary btn-round" href="../index.html">Che</a>--}}
@endsection
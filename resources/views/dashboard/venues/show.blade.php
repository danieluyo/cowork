@extends('layouts.dashboard')

@section('title',"Showing $venue->name")
@section('sidebar-title','Demo title')
@section('sidebar-content')
@section('content')
    <p>{{ $venue->category_id }}</p>
    <p>{{ $venue->city }}</p>
    <p>{{ $venue->country }}</p>
    <p>{{ $venue->address }}</p>
    <hr>
    @foreach($venue->spaces as $space)
        <h5>{{ $space->title }}</h5>
        <p><i>{{ $space->description}}</i></p>
    @endforeach
    <hr>
    <img src="{{$venue->logo}}" alt="">

    <a href="{{ action('VenueController@index') }}" class="btn">All venues</a>
@endsection
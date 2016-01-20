@extends('layouts.dashboard')

@section('title','Spaces')

@section('content')
Hey there you are in users index page with <strong>{{ $users->count() }}</strong> Users.
@endsection
@extends('layouts.dashboard')

@section('title','Create new Category')

@section('page-description','Here where you can create your new category.')

@section('content')

    @if(session()->has('message'))
        @include('errors.alert')
    @endif

    <div class="panel">
        <div class="panel-heading">
            {{--<h3 class="panel-title">Title</h3>--}}
        </div>
        <div class="panel-body container-fluid">
            <form autocomplete="off" method="POST" action="{{ action('CategoryController@store') }}">

                {{ csrf_field() }}

                <div class="form-group form-material floating row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="title"
                               {{--value="{{ old('title') }}"--}} required/>
                        {{--@if ($errors->has('title'))--}}
                        {{--<span class="help-block">--}}
                        {{--<strong>{{ $errors->first('title') }}</strong>--}}
                        {{--</span>--}}
                        {{--@endif--}}
                        <label class="floating-label">Title *</label>
                    </div>
                </div>

                <div class="form-group form-material floating row">
                    <div class="col-md-12">
                        <textarea class="form-control empty" rows="2"
                                  name="description">{{--{{ old('description') }}--}}</textarea>
                        {{--@if ($errors->has('description'))--}}
                        {{--<span class="help-block">--}}
                        {{--<strong>{{ $errors->first('description') }}</strong>--}}
                        {{--</span>--}}
                        {{--@endif--}}
                        <label class="floating-label">Description</label>
                    </div>
                </div>

                @if($categories->count())
                    <div class="form-group form-material floating">
                        <select class="form-control" name="parent_id">
                            <option disabled selected>&nbsp;</option>
                             @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">
                                    {{ $cat->title }}
                                    @if(!is_null($cat->parent_id)) -
                                    ({{ \App\Models\Category::where('id',$cat->parent_id)->with('translations')->first()->title }}
                                    )@endif
                                </option>
                            @endforeach
                        </select>
                        <label class="floating-label">Parent</label>
                    </div>
                @endif

                <br>

                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Create</button>
                </div>

            </form>
        </div>
    </div>
    <!-- End Panel Floating Lables -->
@endsection

@section('head')
    <link rel="stylesheet"
          href="{{config('cache.static_files_root')}}/global/vendor/bootstrap-select/bootstrap-select.css">
    <style>
        /*.bootstrap-select {*/
        /*width: 100% !important;*/
        /*}*/
    </style>
@endsection

@section('footer')
    <script src="{{config('cache.static_files_root')}}/global/vendor/bootstrap-select/bootstrap-select.js"></script>
    <script src="{{config('cache.static_files_root')}}/global/js/components/bootstrap-select.js"></script>
@endsection
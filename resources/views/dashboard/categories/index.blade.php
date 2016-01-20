@extends('layouts.dashboard')

@section('title', $categories->total() ." ". str_plural('Category',$categories->total()))
@section('page-title', str_plural('Category',$categories->total()) . " (" . $categories->total() . ")")
@section('page-description','Listing all categories')

@section('content')

    @if(session()->has('message'))
        @include('errors.alert')
    @endif

    <table class="table table-default table-hover table-responsive table-bordered">
        <thead>
        <tr>
            <th class="width-50">
            </th>
            <th>
                Title
            </th>
            <th>
                Description
            </th>
            <th class="hidden-xs width-100">
                Edit
            </th>
        </tr>
        </thead>

        <tbody class="table-section">
        @foreach($categories as $category)
            <tr>
                <td class="text-center">{{ $category->id }}</td>
                <td class="font-weight-bold">
                    {{ $category->title }}
                </td>
                <td>
                    {{ $category->description }}
                </td>
                <td class="hidden-xs">
                    <span class="text-muted">
                        <form action="{{ action('CategoryController@destroy',$category->id) }}" method="POST">
                            <input type='hidden' name='_method' value='DELETE'>
                            {{ csrf_field() }}

                            <a href="{{ action('CategoryController@edit',$category->id) }}"
                               class="btn btn-sm btn-icon btn-flat btn-default"
                               data-toggle="tooltip" data-original-title="Edit">
                                <i class="icon md-wrench" aria-hidden="true"></i>
                            </a>

                            <a href="#" class="btn btn-sm btn-icon btn-flat btn-default"
                               data-toggle="tooltip" data-original-title="Delete"
                               onclick="deleteItem(this)">
                                <i class="icon md-close" aria-hidden="true"></i>
                            </a>
                        </form>
                    </span>
                </td>
            </tr>
        @endforeach
        </tbody>


    </table>
    <div class="pull-right">{!! $categories->links() !!}</div>
    <!-- End Example Table-section -->

@endsection

@section('scripts')
    <script src="{{config('cache.static_files_root')}}/global/js/plugins/selectable.js"></script>
    <script src="{{config('cache.static_files_root')}}/global/js/components/selectable.js"></script>
    <script src="{{config('cache.static_files_root')}}/global/js/components/table.js"></script>
@endsection
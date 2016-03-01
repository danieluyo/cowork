@extends('layouts.dashboard')

@section('title','Spaces')

@section('page-title',"Space (" . $spaces->total() .")")
@section('page-description','')

@section('content')

    @if(auth()->user()->role == \App\Models\User::ROLE_ADMIN)

@section('sidebar-title','Tip')

<div class="container">
    <div class="col-md-6">
        <div class="widget">
            <div class="widget-header cover overlay">
                <img class="cover-image" src="http://loremflickr.com/280/200" alt="...">
                <div class="overlay-panel overlay-background text-center vertical-align">
                    <div class="vertical-align-middle">
                        <h3 class="widget-title margin-bottom-20">
                            Begin here
                        </h3>
                        <button type="button" class="btn btn-success waves-effect waves-light">Add venue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="widget widget-shadow">
            <div class="widget-header cover overlay bg-blue-600 text-center">
                <img class="cover-image" src="http://loremflickr.com/280/200" alt="">
                <div class="overlay-panel overlay-background text-center vertical-align padding-10 padding-top-10">
                    <div class="vertical-align-middle">
                        <div class="font-size-20 white">June Lane</div>
                        <div class="grey-300 font-size-14">Web Designer</div>
                        <a class="avatar avatar-100 img-bordered margin-top-10 bg-white" href="javascript:void(0)">
                            <img src="../../../global/portraits/4.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="widget-footer padding-horizontal-30 padding-vertical-20 text-center">
                <div class="row no-space">
                    <div class="col-xs-6">
                        <div class="counter">
                            <span class="counter-number blue-600">102</span>
                            <div class="counter-label">Projects</div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="counter">
                            <span class="counter-number blue-600">13.5K</span>
                            <div class="counter-label">Followers</div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-12">
                        <a href="#" class="btn btn-primary col-xs-12">Edit </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@elseif(auth()->user()->role == \App\Models\User::ROLE_SUPER)
    <table class="table table-default table-hover table-responsive table-bordered">
        <thead>
        <tr>
            <th class="width-50">
            </th>
            <th>
                Title
            </th>
            <th>
                Owner
            </th>
            <th class="hidden-xs width-100">
                Edit
            </th>
        </tr>
        </thead>

        @foreach($spaces as $space)

            <tbody class="table-section">
            <tr>
                <td class="text-center"><i class="table-section-arrow"></i></td>
                <td class="font-weight-bold">
                    {{ $space->title }}
                </td>
                <td>
                    {{--<span class="label label-danger">Canceled</span>--}}

                    {{ $space->user->first_name }} {{ $space->user->last_name }}
                </td>
                <td class="hidden-xs">
                    <span class="text-muted">
                        <button type="button" class="btn btn-sm btn-icon btn-flat btn-default"
                                data-toggle="tooltip" data-original-title="Edit">
                            <i class="icon md-wrench" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-icon btn-flat btn-default"
                                data-toggle="tooltip" data-original-title="Delete">
                            <i class="icon md-close" aria-hidden="true"></i>
                        </button>
                    </span>
                </td>
            </tr>
            </tbody>
            <tbody>

            <tr>
                {{--<td></td>--}}
                <td colspan="4">
                    <table class="table table-responsive table-bordered">
                        <thead>
                        <tr>
                            <th>Category</th>
                            <th>Area</th>
                            <th>Prices</th>
                            <th>Max People</th>
                            <th>Address</th>
                            <th>Featured</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $space->category_id }}</td>
                            <td>{{ $space->area }}</td>
                            <td>
                                <div data-toggle="tooltip"
                                     data-original-title="Hourly / Daily / Monthly">
                                    ${{ $space->hourly_price }} -
                                    ${{ $space->daily_price }} -
                                    ${{ $space->monthly_price }}
                                </div>
                            </td>
                            <td>{{ $space->max_number_of_people }}</td>
                            <td>{{ $space->address }}</td>
                            <td>
                                @if($space->is_featured)
                                    <span class="label label-success">YES</span>
                                @else(!$space->is_featured)
                                    <span class="label label-danger">NO</span>
                                @endif
                                @if($space->status == -1)
                                    <span class="label label-danger">not active</span>
                                @endif
                            </td>
                            <td>{{ str_limit($space->description) }}</td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        @endforeach

    </table>
    <div class="pull-right">{!! $spaces->links() !!}</div>
    <!-- End Example Table-section -->
@endif

@endsection

@push('footer')
    <script src="{{config('cache.static_files_root')}}/global/js/plugins/selectable.js"></script>
    <script src="{{config('cache.static_files_root')}}/global/js/components/selectable.js"></script>
    <script src="{{config('cache.static_files_root')}}/global/js/components/table.js"></script>
@endpush
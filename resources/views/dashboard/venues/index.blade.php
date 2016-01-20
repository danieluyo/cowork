@extends('layouts.dashboard')

@section('title','Venues')

@section('page-title',"Venue (" . $venues->total() .")")
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
                            <a href="{{ action('VenueController@create') }}" class="btn btn-success waves-effect waves-light">Add venue</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($venues as $venue)
            <div class="col-md-6">
                <div class="widget widget-shadow">
                    <div class="widget-header cover overlay bg-blue-600 text-center">
                        <img class="cover-image" src="http://loremflickr.com/280/200" alt="">
                        <div class="overlay-panel overlay-background text-center vertical-align padding-10 padding-top-10">
                            <div class="vertical-align-middle">
                                <div class="font-size-20 white">{{ $venue->name }}</div>
                                <div class="grey-300 font-size-14">{{ $venue->address }}</div>
                                <a class="avatar avatar-100 img-bordered margin-top-10 bg-white" href="javascript:void(0)">
                                    <img src="{{ $venue->logo() }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="widget-footer padding-horizontal-30 padding-vertical-20 text-center">
                        <div class="row no-space">
                            <div class="col-xs-6">
                                <div class="counter">
                                    <span class="counter-number blue-600">{{ $venue->category->title }}</span>
                                    <div class="counter-label">Category</div>

                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="counter">
                                    <span class="counter-number blue-600">{{ $venue->spaces->count() }}</span>
                                    <div class="counter-label">Spaces</div>
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
        @endforeach
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

            @foreach($venues as $venue)

                <tbody class="table-section">
                <tr>
                    <td class="text-center"><i class="table-section-arrow"></i></td>
                    <td class="font-weight-bold">
                        {{ $venue->title }}
                    </td>
                    <td>
                        {{--<span class="label label-danger">Canceled</span>--}}

                        {{ $venue->user->first_name }} {{ $venue->user->last_name }}
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
                                <td>{{ $venue->category_id }}</td>
                                <td>{{ $venue->area }}</td>
                                <td>
                                    <div data-toggle="tooltip"
                                         data-original-title="Hourly / Daily / Monthly">
                                        ${{ $venue->hourly_price }} -
                                        ${{ $venue->daily_price }} -
                                        ${{ $venue->monthly_price }}
                                    </div>
                                </td>
                                <td>{{ $venue->max_number_of_people }}</td>
                                <td>{{ $venue->address }}</td>
                                <td>
                                    @if($venue->is_featured)
                                        <span class="label label-success">YES</span>
                                    @else(!$venue->is_featured)
                                        <span class="label label-danger">NO</span>
                                    @endif
                                    @if($venue->status == -1)
                                        <span class="label label-danger">not active</span>
                                    @endif
                                </td>
                                <td>{{ str_limit($venue->description) }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            @endforeach

        </table>
        <div class="pull-right">{!! $venues->links() !!}</div>
        <!-- End Example Table-section -->
    @endif

@endsection

@section('footer')
    <script src="{{config('cache.static_files_root')}}/global/js/plugins/selectable.js"></script>
    <script src="{{config('cache.static_files_root')}}/global/js/components/selectable.js"></script>
    <script src="{{config('cache.static_files_root')}}/global/js/components/table.js"></script>
@endsection
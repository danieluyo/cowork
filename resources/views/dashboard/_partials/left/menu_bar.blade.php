<div class="site-menubar site-menubar-dark">
    <div class="site-menubar-body">
        <div>
            <div>
                @can("admin")
                    <ul class="site-menu">
                        <li class="site-menu-item @if(route('dashboard.index')  == request()->url()) active @endif">
                            <a class="animsition-link" href="{{ route('dashboard.index') }}">
                                <i class="site-menu-icon md-account" aria-hidden="true"></i>
                                <span class="site-menu-title">Hi {{ $user->username }}!</span>
                            </a>
                        </li>

                        <li class="site-menu-category">General</li>

                        <li class="site-menu-item @if(route('dashboard.venues.index')  == request()->url()) active @endif">
                            <a class="animsition-link" href="{{ route('dashboard.venues.index') }}">
                                <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                                <span class="site-menu-title">My Venues</span>
                            </a>
                        </li>
                        <li class="site-menu-item @if(route('dashboard.spaces.index')  == request()->url()) active @endif">
                            <a class="animsition-link" href="{{ route('dashboard.spaces.index') }}">
                                <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                                <span class="site-menu-title">My Spaces</span>
                            </a>
                        </li>
                    </ul>
                @endcan
                @can("super")
                    <ul class="site-menu">

                        <li class="site-menu-item">
                            <a class="animsition-link" href="#">
                                <i class="site-menu-icon md-account" aria-hidden="true"></i>
                                <span class="site-menu-title">Hi {{ $user->username }}!</span>
                            </a>
                        </li>
                        <li class="site-menu-category">General</li>

                        <li class="site-menu-item @if(route('dashboard.index')  == request()->url()) active @endif">
                            <a class="animsition-link" href="{{ route('dashboard.index') }}">
                                <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                                <span class="site-menu-title">Dashboard</span>
                            </a>
                        </li>

                        <li class="site-menu-item has-sub
                        @if(route('dashboard.categories.index')  == request()->url()
                        || route('dashboard.categories.create')  == request()->url())
                                active open
                            @endif
                                ">
                            <a href="javascript:void(0)">
                                <i class="site-menu-icon md-labels" aria-hidden="true"></i>
                                <span class="site-menu-title">Categories</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="site-menu-sub">
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="{{ route('dashboard.categories.create') }}">
                                        <span class="site-menu-title">Create new</span>
                                    </a>
                                </li>
                                <li class="site-menu-item @if(route('dashboard.categories.index')  == request()->url()) active @endif">
                                    <a class="animsition-link" href="{{ route('dashboard.categories.index') }}">
                                        <span class="site-menu-title">All Categories</span>
                                        <div class="site-menu-label">
                                            <span class="label label-primary">{{ $categoriesCount }}</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="site-menu-item has-sub
                        @if(route('dashboard.venues.index')  == request()->url()
                        || route('dashboard.venues.create')  == request()->url())
                                active open
                            @endif
                                ">
                            <a href="javascript:void(0)">
                                <i class="site-menu-icon md-case" aria-hidden="true"></i>
                                <span class="site-menu-title">Venues</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="site-menu-sub">
                                <li class="site-menu-item @if(route('dashboard.venues.create')  == request()->url()) active @endif">
                                    <a class="animsition-link" href="{{ route('dashboard.venues.create') }}">
                                        <span class="site-menu-title">Add new</span>
                                    </a>
                                </li>
                                <li class="site-menu-item @if(route('dashboard.venues.index')  == request()->url()) active @endif">
                                    <a class="animsition-link" href="{{ route('dashboard.venues.index') }}">
                                        <span class="site-menu-title">Venues</span>
                                        <div class="site-menu-label">
                                            <span class="label label-primary">{{ $venuesCount }}</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="site-menu-item has-sub
                        @if(route('dashboard.spaces.index')  == request()->url()
                        || route('dashboard.spaces.create')  == request()->url())
                                active open
                            @endif
                                ">
                            <a href="javascript:void(0)">
                                <i class="site-menu-icon md-case" aria-hidden="true"></i>
                                <span class="site-menu-title">Spaces</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="site-menu-sub">
                                <li class="site-menu-item @if(route('dashboard.spaces.create')  == request()->url()) active @endif">
                                    <a class="animsition-link" href="{{ route('dashboard.spaces.create') }}">
                                        <span class="site-menu-title">Add new</span>
                                    </a>
                                </li>
                                <li class="site-menu-item @if(route('dashboard.spaces.index')  == request()->url()) active @endif">
                                    <a class="animsition-link" href="{{ route('dashboard.spaces.index') }}">
                                        <span class="site-menu-title">Spaces</span>
                                        <div class="site-menu-label">
                                            <span class="label label-primary">{{ $spacesCount }}</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="site-menu-item @if(route('dashboard.categories.index')  == request()->url()) active @endif">
                                    <a class="animsition-link" href="{{ route('dashboard.categories.index') }}">
                                        <span class="site-menu-title">Categories</span>
                                        <div class="site-menu-label">
                                            <span class="label label-default">{{ $categoriesCount }}</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="site-menu-item">
                                    <a class="animsition-link" href="#">
                                        <span class="site-menu-title">Amenities</span>
                                        <div class="site-menu-label">
                                            <span class="label label-default">{{ $amenitiesCount }}</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="site-menu-category">Others</li>
                        <li class="site-menu-item has-sub">
                            <a href="javascript:void(0)">
                                <i class="site-menu-icon md-puzzle-piece" aria-hidden="true"></i>
                                <span class="site-menu-title">Users</span>
                                <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="site-menu-sub">
                                <li class="site-menu-item">
                                    <a href="{{ route('dashboard.users') }}">
                                        <span class="site-menu-title">All Users</span>
                                        <div class="site-menu-label">
                                            <span class="label label-default">{{ $usersCount }}</span>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>

                    <div class="site-menubar-section">
                        <h5>
                            Milestone
                            <span class="pull-right">30%</span>
                        </h5>
                        <div class="progress progress-xs">
                            <div class="progress-bar active" style="width: 30%;" role="progressbar"></div>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
    </div>

    {{--<div class="site-menubar-footer">--}}
    {{--<a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"--}}
    {{--data-original-title="Settings">--}}
    {{--<span class="icon md-settings" aria-hidden="true"></span>--}}
    {{--</a>--}}
    {{--<a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">--}}
    {{--<span class="icon md-eye-off" aria-hidden="true"></span>--}}
    {{--</a>--}}
    {{--<a href="{{ action('Auth\AuthController@logout') }}" data-placement="top" data-toggle="tooltip"--}}
    {{--data-original-title="Logout">--}}
    {{--<span class="icon md-power" aria-hidden="true"></span>--}}
    {{--</a>--}}
    {{--</div>--}}
</div>


{{--<div class="site-gridmenu">--}}
{{--<div>--}}
{{--<div>--}}
{{--<ul>--}}
{{--<li>--}}
{{--<a href="../apps/mailbox/mailbox.html">--}}
{{--<i class="icon md-email"></i>--}}
{{--<span>Mailbox</span>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="../apps/calendar/calendar.html">--}}
{{--<i class="icon md-calendar"></i>--}}
{{--<span>Calendar</span>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="../apps/contacts/contacts.html">--}}
{{--<i class="icon md-account"></i>--}}
{{--<span>Contacts</span>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="../apps/media/overview.html">--}}
{{--<i class="icon md-videocam"></i>--}}
{{--<span>Media</span>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="../apps/documents/categories.html">--}}
{{--<i class="icon md-receipt"></i>--}}
{{--<span>Documents</span>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="../apps/projects/projects.html">--}}
{{--<i class="icon md-image"></i>--}}
{{--<span>Project</span>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="../apps/forum/forum.html">--}}
{{--<i class="icon md-comments"></i>--}}
{{--<span>Forum</span>--}}
{{--</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="../index.html">--}}
{{--<i class="icon md-view-dashboard"></i>--}}
{{--<span>Dashboard</span>--}}
{{--</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
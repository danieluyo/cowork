<footer>
    <div class="footer">
        <div class="footer-overlay"></div>
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 text-center">
                        <br>
                        <img id="header-logo" src="/img/footer-logo.svg" alt="Logo" width="70%">
                        <br>

                        <div class="col-md-12"
                             style="border-top: 1px solid white; margin:5%;padding:5%;width:90%;"></div>
                        <img src="/img/logo-zad-vertical-white.svg" alt="Zad Group Logo" width="80">&nbsp;&nbsp;
                        <img src="/img/logo-rajihi-white.svg" alt="Zad Group Logo" width="70">
                    </div>

                    @inject('shared','App\Services\SharedWithBlade')
                    <div class="col-md-5 col-sm-6 recent-posts">
                        <h3>{{  trans('strings.Latest Apps')}}</h3>
                        <br>
                        @foreach($shared->getNewestAppsWidget(4) as $application)
                                <div class="col-md-12 col-sm-12 col-xs-6 application">
                                    <div class="col-md-3 col-sm-4  col-xs-12">
                                        <a href="{{ route('frontend.apps.show',[$application->field_id,$application->id]) }}">
                                            <img src="{{ $application->icon_url }}" alt="" class="img-icon" style="/*padding:0;*/">
                                        </a>
                                    </div>
                                    <div class="col-md-9  col-sm-8 col-xs-12 apps-widget-app-text">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>
                                                    <a href="{{ route('frontend.apps.show',[$application->field_id,$application->id]) }}">
                                                        {{ $application->title }}
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                        {{--<br>--}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <small>
                                                    {{ trans('strings.Published')}}:
                                                    {{ $application->published_at->toDateString() }}
                                                </small>
                                            </div>
                                            <div class="col-md-6">
                                                <small>
                                                    {{ trans('strings.Downloaded')}}:
                                                    {{ $application->appfigures_id_ios + $application->appfigures_id_android + $application->appfigures_id_windows}}
                                                    {{ trans('strings.times') }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach

                    </div>

                    <div class="col-md-4 col-sm-12 newsletter">

                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="form text-center">
                                {{--<img src="/img/mail.svg" alt="" width="75" style="margin: 0 auto;">--}}
                                <div id="svg-mail" style="width:35%;margin:0 auto;"></div>
                            </div>
                            <br>

                            <form id="subscribe-form" action="foo/bar" method="post">
                                <!-- / .form-group of newsletter -->
                                <label for="newsletter">{{ trans('strings.Subscribe Now')}}!</label>
                                <input type="text" class="form-control" id="newsletter" name="newsletter">
                                <br>
                                <button type="submit" style="margin-left:6px;"
                                        class="btn btn-warning col-md-6 col-xs-12" id="submit">
                                    {{ trans('strings.Subscribe')}}
                                </button>
                            </form>
                        </div>

                        <div class="col-md-4 col-sm-4 hidden-xs">
                            <img src="/img/hand-holding-iphone.svg" alt="Hand holding iPhone">
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div id="footer-social-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-xs-12 text-muted text-center">
                        <p> &copy; {{ trans('strings.All rights reserved - Developed by')}} <a
                                    href="http://www.zadgroup.net">ZAD
                                Group</a></p>
                    </div>
                    <div class="col-md-3 hidden-xs hidden-sm pull-right flip">
                        <div class="social-circle">
                            <a href="{{ config('services.facebook')['portal_url'] }}" target="_blank">
                                <div id="facebook" class="col-md-1"></div>
                            </a>
                            <a href="{{ config('services.twitter')['portal_url'] }}" target="_blank">
                                <div id="twitter" class="col-md-1"></div>
                            </a>
                            <a href="{{ config('services.youtube')['portal_url'] }}" target="_blank">
                                <div id="youtube" class="col-md-1"></div>
                            </a>
                            <a href="{{ config('services.instagram')['portal_url'] }}" target="_blank">
                                <div id="instagram" class="col-md-1"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>--}}
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/vivus.min.js"></script>

    <script>

        new Vivus('svg-mail', {
            duration: 200,
            file: '/img/mail.svg'
        });
    </script>

    @yield('footer')
</footer>
@inject('shared','App\Services\SharedWithBlade')
@inject('social','App\Services\SocialMediaCounters')
<div class="col-md-4 widgets-container">
    <h4 class="section-title">{{ trans('strings.Follow Us')}}</h4>

    <div class="under-title-divider"></div>

    <div class="col-md-12 text-white text-center">
        <div class="col-md-6 col-sm-6">
            <div id="facebook-widget" class="social-widget social-widget-homepage">
                <a href="{{ config('services.facebook')['portal_url'] }}" target="_blank">
                                <span class="fa-stack fa-lg">
                                  <i class="fa fa-circle-o fa-stack-2x"></i>
                                  <i class="fa fa-facebook fa-stack-1x"></i>
                                </span>
                                <span class="social-text">
                                    {{ $social->facebook_follower_count() }}
                                    <br>
                                    {{ trans('strings.followers') }}
                                </span>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div id="twitter-widget" class="social-widget social-widget-homepage">
                <a href="{{ config('services.twitter')['portal_url'] }}" target="_blank">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle-o fa-stack-2x"></i>
                      <i class="fa fa-twitter fa-stack-1x"></i>
                    </span>
                    <span class="social-text">
                        {{ $social->twitter_follower_count() }}
                        <br>
                        {{ trans('strings.followers') }}
                    </span>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div id="youtube-widget" class="social-widget social-widget-homepage">
                <a href="{{ config('services.youtube')['portal_url'] }}" target="_blank">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle-o fa-stack-2x"></i>
                      <i class="fa fa-youtube fa-stack-1x"></i>
                    </span>
                    <span class="social-text">
                        {{ $social->youtube_follower_count() }}
                        <br>
                        {{ trans('strings.followers') }}
                    </span>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div id="google-widget" class="social-widget social-widget-homepage">
                <a href="{{ config('services.googlePlus')['portal_url'] }}" target="_blank">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle-o fa-stack-2x"></i>
                      <i class="fa fa-google-plus fa-stack-1x"></i>
                    </span>
                    <span class="social-text">
                        {{ $social->googleplus_follower_count() }}
                        <br>
                        {{ trans('strings.followers') }}
                    </span>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div id="apple-widget" class="social-widget social-widget-homepage">
                <a href="{{ config('services.apple')['portal_url'] }}" target="_blank">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle-o fa-stack-2x"></i>
                      <i class="fa fa-apple fa-stack-1x"></i>
                    </span>
                    <span class="social-text">
                        {{  $shared->apple_total_downloads() }}
                        <br>
                        {{ trans('strings.Downloaded') }}
                    </span>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div id="android-widget" class="social-widget social-widget-homepage">
                <a href="{{ config('services.android')['portal_url'] }}" target="_blank">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle-o fa-stack-2x"></i>
                      <i class="fa fa-android fa-stack-1x"></i>
                    </span>
                    <span class="social-text">
                        {{  $shared->android_follower_count() }}
                        <br>
                        {{ trans('strings.Downloaded') }}
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="transparent-divider col-md-12"></div>

    <h4 class="section-title">{{ trans('strings.Latest Apps') }}</h4>

    <div class="under-title-divider"></div>

    <div class="newest-apps-widget">
        @foreach($shared->getNewestAppsWidget() as $application)
            <div class="row widget-app-wrapper">
                <div class="col-md-4 col-xs-4">
                    <a href="{{ route('frontend.apps.show',[$application->field_id,$application->id]) }}">
                        <img src="{{ $application->icon_url }}" alt="" class="img-icon">
                    </a>
                </div>
                <div class="col-md-8  col-xs-8">
                    <div class="row text-primary2">
                        <h4>
                            <a href="{{ route('frontend.apps.show',[$application->field_id,$application->id]) }}">{{ $application->title }}</a>
                        </h4>
                    </div>
                    <div class="row help-block">
                        <p><strong>{{ trans('strings.Published') }}
                                :</strong> {{ $application->published_at->toDateString() }}
                        </p>

                        <p>
                            <strong>{{ trans('strings.Languages')}}:</strong>
                            @foreach($application->languages as $key => $lang)
                                {{$lang->name}}@if($key+1 != $application->languages->count()),@endif
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <div class="transparent-divider col-md-12"></div>

    <h4 class="section-title">{{ trans('strings.Most Downloaded Apps') }}</h4>

    <div class="under-title-divider"></div>

    <div class="most-downloaded-apps-widget">
        @foreach($shared->getMostDownloadedAppsWidget() as $application)
            {{--{{ dd($application->appfigures_id_ios) }}--}}
            <div class="col-md-6 col-xs-6 text-center widget-app-wrapper">
                <p>
                    <a href="{{ route('frontend.apps.show',[$application->field_id,$application->id]) }}">
                        <img src="{{ $application->icon_url }}" alt="" class="img-icon">
                    </a>
                </p>
                <h4 class="text-primary2">
                    <a href="{{ route('frontend.apps.show',[$application->field_id,$application->id]) }}">
                        {{ str_limit($application->title,12)  }}
                    </a>
                </h4>

                <div class="help-block">
                    <p>{{ trans('strings.Published') }} <br>{{ $application->published_at->toDateString() }}</p>
                    @if($application->languages->count() > 0)
                        <p>{{ trans('strings.Languages') }} <br>
                            @foreach($application->languages as $key => $lang)
                                {{$lang->name}} @if($key+1 != $application->languages->count())/@endif
                            @endforeach
                        </p>
                    @endif
                    <div class="transparent-divider"></div>
                    <p style="border-top:1px solid #5BD1DF;"><strong>{{ trans('strings.Downloaded')}}</strong> <br>

                    <h3 style="border-bottom:1px solid #5BD1DF;">{{ $application->appfigures_id_ios + $application->appfigures_id_android }}</h3>
                    </p>
                </div>
            </div>
        @endforeach
    </div>

</div>
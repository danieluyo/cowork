@extends('layouts.dashboard')

@section('title','Dashboard')

@section('page-title','Create new space')
@section('page-description','This page will be filled very soon, for now use the FE version pls!')

@section('content')
    <form method="POST" action="{{ action('VenueController@update',$venue->id) }}" accept-charset="UTF-8"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group form-material">
            <label class="control-label" for="name">My Venue Name *</label>
            <input type="text" class="form-control" name="name"
                   value="{{ $venue->name }}" required/>
            @if ($errors->has('name'))
                <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                            </span>
            @endif
        </div>

        <div class="form-group form-material">
            <label class="control-label" for="category_id">Category</label>
            <select class="form-control" name="category_id">
                <option disabled selected>&nbsp;</option>
                @foreach($categories as $cat)
                    @if(is_null($cat->parent_id))
                        <option value="{{ $cat->id }}"
                                @if($venue->category_id == $cat->id)
                                selected
                                @endif>
                            {{ $cat->title }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group form-material row form-material-file">
            <div class="col-md-8">
                <label class="control-label" for="inputFile">Logo</label>
                <input type="text" class="form-control" placeholder="Click here to browse for a logo">
                <input type="file" id="logo" name="logo" multiple="" class="">
            </div>
            <div class="col-md-4">
                @if($venue->logo)
                <img id="logoImg" src="{{$venue->logo}}" width="150px" height="150px"/>
                @endif
                <img id="logoImg" width="150px" height="150px"/>
            </div>
        </div>


        <div class="form-group form-material">
            <label class="control-label" for="city">City *</label>
            <input type="text" class="controls form-control" id="city" name="city"
                   value="{{ $venue->city }}" placeholder="Enter your City" required/>
            @if ($errors->has('city'))
                <span class="help-block">
                        <strong>{{ $errors->first('city') }}</strong>
                        </span>
            @endif
            @section('sidebar-content')
                <div id="map" style="height: 300px"></div>
                <input type="hidden" id="latitude" name="latitude" value="{{ $venue->latitude }}">
                <input type="hidden" id="longitude" name="longitude" value="{{ $venue->longitude }}">
                <div class="help-block">
                    <p class="geo-location">
                        <span id="markerPosition"></span>
                                <span class="pull-right">
                                    Latitude:&nbsp;<span id="lat">{{ $venue->latitude }}</span>&nbsp;&nbsp;
                                    Longitude:&nbsp;<span id="lng">{{ $venue->longitude }}</span>&nbsp;&nbsp;
                                </span>
                    </p>
                </div>
            @endsection

        </div>

        <div class="form-group form-material">
            <label class="control-label" for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $venue->address }}"/>
            @if ($errors->has('address'))
                <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
            @endif
        </div>
        <div class="form-group form-material row">
            <div class="col-md-8">
                <label class="control-label" for="country">Country</label>
                <input type="text" class="form-control" name="country" value="{{ $venue->country }}"/>
                @if ($errors->has('country'))
                    <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
                            </span>
                @endif
            </div>
            <div class="col-md-4">
                <label class="control-label" for="zip">Zip</label>
                <input type="text" class="form-control" name="zip" value="{{ $venue->zip }}"/>
                @if ($errors->has('zip'))
                    <span class="help-block">
                            <strong>{{ $errors->first('zip') }}</strong>
                            </span>
                @endif
            </div>
        </div>

        {{-- Tax and currency  --}}

        {{--<div class="form-group form-material row">--}}
        {{--<div class="col-md-6">--}}
        {{--<div class="input-group">--}}
        {{--<span class="input-group-addon">%</span>--}}
        {{--<div class="form-control-wrap">--}}
        {{--<input type="text" class="form-control" name="tax_rate" value="{{ old('tax_rate') }}"/>--}}
        {{--@if ($errors->has('tax_rate'))--}}
        {{--<span class="help-block">--}}
        {{--<strong>{{ $errors->first('tax_rate') }}</strong>--}}
        {{--</span>--}}
        {{--@endif--}}
        {{--<label class="control-label" for="">Tax rate</label>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-6">--}}
        {{--<select class="form-control" name="currency_id">--}}
        {{--<option disabled selected>&nbsp;</option>--}}
        {{--@foreach($currencies as $currency)--}}
        {{--<option value="{{ $currency->id }}"--}}
        {{--@if(old('currency_id') == $currency->id)--}}
        {{--selected--}}
        {{--@endif>--}}
        {{--{{ $cat->title }}--}}
        {{--</option>--}}
        {{--@endforeach--}}
        {{--<option value="54">USD</option>--}}
        {{--</select>--}}
        {{--<label class="control-label" for="">Currency</label>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-group form-material row">--}}

        {{--<div class="col-md-10">--}}
        {{----}}
        {{--</div>--}}
        {{--</div>--}}
        <div class="form-group form-material">
            <label class="control-label" for="number">
                Number
                <span id="valid-msg" class="hide">✓ Valid</span>
                <span id="error-msg" class="hide">Invalid number</span>
            </label>
            <input type="text" class="form-control" name="number" id="number"
                   value="{{ $venue->number }}"/>
            @if ($errors->has('number'))
                <span class="help-block">
                                <strong>{{ $errors->first('number') }}</strong>
                            </span>
            @endif
        </div>

        <div class="form-group form-material">
            <label class="control-label" for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $venue->email }}"/>
            @if ($errors->has('email'))
                <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group form-material">
            <label class="control-label" for="website">Website</label>
            <input type="url" class="form-control" name="website" value="{{ $venue->website }}"/>
            @if ($errors->has('website'))
                <span class="help-block">
                        <strong>{{ $errors->first('website') }}</strong>
                        </span>
            @endif
        </div>

        <br>

        <div class="col-sm-10">
            <button type="submit" class="btn btn-success waves-effect waves-light">Update {{$venue->name}}</button>
        </div>

    </form>
@endsection

@push('head')
<link rel="stylesheet"
      href="{{config('cache.static_files_root')}}/global/vendor/bootstrap-select/bootstrap-select.css">
<link rel="stylesheet"
      href="{{config('cache.static_files_root')}}/assets/css/intlTelInput.css">
@endpush

@push('footer')
<script src="{{config('cache.static_files_root')}}/global/vendor/bootstrap-select/bootstrap-select.js"></script>
<script src="{{config('cache.static_files_root')}}/global/js/components/bootstrap-select.js"></script>
<script src="{{config('cache.static_files_root')}}/assets/js/intlTelInput.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_api_key')  }}&libraries=places&callback=initAutocomplete" async defer>
</script>
<script src="{{config('cache.static_files_root')}}/assets/js/googleMaps.js"></script>

<script>
    $(document).ready(function () {

        function readURL(input, imgSelector) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    imgSelector.attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#logo").change(function () {
            readURL(this, $('#logoImg'));
        });

        var countryData = $.fn.intlTelInput.getCountryData();
        $.each(countryData, function (i, country) {
            country.name = country.name.replace(/.+\((.+)\)/, "$1");
        });

        var telInput = $("#number"),
                errorMsg = $("#error-msg"),
                validMsg = $("#valid-msg"),
                country = $("#country");

        // initialise plugin
        telInput.intlTelInput({
            nationalMode: true,
            initialCountry: "auto",
            preferredCountries: ["us", "tr"],
            geoIpLookup: function (callback) {
                $.get('http://ipinfo.io', function () {
                }, "jsonp").always(function (resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            utilsScript: "{{config('cache.static_files_root')}}/assets/js/utils.js"
        });

        // listen to the address dropdown for changes
        country.change(function () {
            var countryCode = $(this).val();
            telInput.intlTelInput("setCountry", countryCode);
        });

        // listen to "keyup", but also "change" to update when the user selects a country
//            telInput.on("keyup change", function() {
//                var intlNumber = telInput.intlTelInput("getNumber");
//                if (intlNumber) {
//                    console.log("International: " + intlNumber);
//                } else {
//                    console.log("Please enter a number below");
//                }
//            });

        var reset = function () {
            telInput.removeClass("error");
            errorMsg.addClass("hide");
            validMsg.addClass("hide");
        };

        // on blur: validate
        telInput.blur(function () {
            reset();
            if ($.trim(telInput.val())) {
                if (telInput.intlTelInput("isValidNumber")) {
                    validMsg.removeClass("hide");
                } else {
                    telInput.addClass("error");
                    errorMsg.removeClass("hide");
                }
            }
        });

        // on keyup / change flag: reset
        telInput.on("keyup change", reset);
    });

</script>
@endpush
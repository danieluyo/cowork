@extends('layouts.dashboard')

@section('title','Add new Venue (Company)')
{{--@section('page-description','This page will be filled very soon, for now use the FE version pls!')--}}

@section('sidebar-title','sidebar title')
@section('sidebar-content','Content yooo')

@section('content')
    <form method="POST" action="{{ action('VenueController@store') }}">
        {{ csrf_field() }}

        <div class="form-group form-material">
            <label class="control-label" for="name">My Venue Name *</label>
            <input type="text" class="form-control" name="name"
                   value="{{ old('name') }}" required/>
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
                                @if(old('category_id') == $cat->id)
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
                <img id="logoImg" width="150px" height="150px"/>
            </div>
        </div>

        <style>
            #map {
                height: 300px;
            }

            .controls {
                margin-top: 10px;
                border: 1px solid transparent;
                border-radius: 2px 0 0 2px;
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                height: 32px;
                outline: none;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            }

            #pac-input {
                background-color: #fff;
                font-family: Roboto;
                font-size: 15px;
                font-weight: 300;
                margin-left: 12px;
                padding: 0 11px 0 13px;
                text-overflow: ellipsis;
                width: 300px;
            }

            #pac-input:focus {
                border-color: #4d90fe;
            }

            .pac-container {
                font-family: Roboto;
            }

            #type-selector {
                color: #fff;
                background-color: #4d90fe;
                padding: 5px 11px 0px 11px;
            }

            #type-selector label {
                font-family: Roboto;
                font-size: 13px;
                font-weight: 300;
            }
        </style>
        <div class="form-group form-material">
            <label class="control-label" for="city">City</label>
            <input type="text" class="controls form-control" id="pac-input" name="city"
                   value="{{ old('city') }}" placeholder="Enter your City" required/>
            @if ($errors->has('city'))
                <span class="help-block">
                        <strong>{{ $errors->first('city') }}</strong>
                        </span>
            @endif
            <div id="map"></div>
        </div>

        <input type="hidden" id="latitude" name="latitude">
        <input type="hidden" id="longitude" name="longitude">


        <div class="form-group form-material">
            <label class="control-label" for="address">Address</label>
            <input type="text" class="form-control" name="address" value="{{ old('address') }}"/>
            @if ($errors->has('address'))
                <span class="help-block">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
            @endif
        </div>
        <div class="form-group form-material row">
            <div class="col-md-8">
                <label class="control-label" for="country">Country</label>
                <input type="text" class="form-control" name="country" value="{{ old('country') }}"/>
                @if ($errors->has('country'))
                    <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
                            </span>
                @endif
            </div>
            <div class="col-md-4">
                <label class="control-label" for="zip">Zip</label>
                <input type="text" class="form-control" name="zip" value="{{ old('zip') }}"/>
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
                   value="{{ old('number') }}"/>
            @if ($errors->has('number'))
                <span class="help-block">
                                <strong>{{ $errors->first('number') }}</strong>
                            </span>
            @endif
        </div>

        <div class="form-group form-material">
            <label class="control-label" for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}"/>
            @if ($errors->has('email'))
                <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
            @endif
        </div>

        <div class="form-group form-material">
            <label class="control-label" for="website">Website</label>
            <input type="url" class="form-control" name="website" value="{{ old('website') }}"/>
            @if ($errors->has('website'))
                <span class="help-block">
                        <strong>{{ $errors->first('website') }}</strong>
                        </span>
            @endif
        </div>

        <br>

        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
        </div>

    </form>
@endsection

@section('head')
    <link rel="stylesheet"
          href="{{config('cache.static_files_root')}}/global/vendor/bootstrap-select/bootstrap-select.css">
    <link rel="stylesheet"
          href="{{config('cache.static_files_root')}}/assets/css/intlTelInput.css">
@endsection

@section('footer')
    <script src="{{config('cache.static_files_root')}}/global/vendor/bootstrap-select/bootstrap-select.js"></script>
    <script src="{{config('cache.static_files_root')}}/global/js/components/bootstrap-select.js"></script>
    <script src="{{config('cache.static_files_root')}}/assets/js/intlTelInput.min.js"></script>
    <script src="{{config('cache.static_files_root')}}/assets/js/googleMaps.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"
            async defer></script>

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
@endsection
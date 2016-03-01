@extends('layouts.dashboard')

@section('title','Create new space')

@section('page-title','Create new space')
@section('page-description','This page will be filled very soon, for now use the FE version pls!')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            {{--<h3 class="panel-title">Title</h3>--}}
        </div>
        <div class="panel-body container-fluid">
            <form autocomplete="off" method="POST" action="{{ action('Space\SpaceController@store') }}">

                <div class="form-group form-material floating">
                        <select class="form-control" name="category_id">
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
                        <label class="floating-label">Type</label>
                </div>

                <div class="form-group form-material floating">
                    <select class="form-control" name="country_id">
                        <option disabled selected>&nbsp;</option>
                        <option value="225"> Turkey</option>
                    </select>
                    <label class="floating-label">Country</label>
                </div>

                <div class="form-group form-material floating">
                    <select class="form-control" name="region_id">
                        <option disabled selected>&nbsp;</option>
                        <option value="745042"> İstanbul</option>
                    </select>
                    <label class="floating-label">Region</label>
                </div>

                <div class="form-group form-material floating">
                    <select class="form-control" name="city_id">
                        <option disabled selected>&nbsp;</option>
                        <option value="737071"> Zeytinburnu</option>
                        <option value="737539"> Yeşilvadi</option>
                        <option value="738064"> Yakuplu</option>
                        <option value="738329"> Üsküdar</option>
                        <option value="738377"> Umraniye</option>
                        <option value="738858"> Tepecik</option>
                        <option value="738941"> Teke</option>
                        <option value="739549"> Şişli</option>
                        <option value="739605"> Sinekli</option>
                        <option value="739634"> Silivri</option>
                        <option value="739636"> Şile</option>
                        <option value="739838"> Selimpaşa</option>
                        <option value="740286"> Samandıra</option>
                        <option value="740616"> Pendik</option>
                        <option value="740940"> Ortaköy</option>
                        <option value="741529"> Mimarsinan</option>
                        <option value="741763"> Maltepe</option>
                        <option value="741793"> Mahmut Şevket Paşa</option>
                        <option value="741812"> Mahmutbey</option>
                        <option value="742266"> Kumburgaz</option>
                        <option value="743316"> Kınalı</option>
                        <option value="743506"> Kemerburgaz</option>
                        <option value="743818"> Kavaklı</option>
                        <option value="744514"> Karacaköy</option>
                        <option value="745044"> İstanbul</option>
                        <option value="746234"> Gürpınar</option>
                        <option value="747323"> Esenyurt</option>
                        <option value="747340"> Esenler</option>
                        <option value="747793"> Durusu</option>
                        <option value="749644"> Çatalca</option>
                        <option value="750228"> Büyükçavuşlu</option>
                        <option value="750249"> Adalar</option>
                        <option value="750446"> Boyalık</option>
                        <option value="751324"> Bağcılar</option>
                        <option value="857230"> Muratbey</option>
                        <option value="862944"> İçmeler</option>
                        <option value="6940491"> Arıköy</option>
                        <option value="6947637"> Ataşehir</option>
                        <option value="6947639"> Başakşehir</option>
                        <option value="6947640"> Beylikdüzü</option>
                        <option value="6947641"> Büyükçekmece</option>
                        <option value="7627067"> Bahçelievler</option>
                        <option value="7628416"> Sultangazi</option>
                        <option value="7628419"> Sultanbeyli</option>
                        <option value="7628420"> Sancaktepe</option>
                        <option value="9399203"> Arnavutköy</option>
                        <option value="9399204"> Avcılar</option>
                        <option value="9399205"> Bakırköy</option>
                        <option value="9399206"> Beşiktaş</option>
                        <option value="9399207"> Beykoz</option>
                        <option value="9399208"> Beyoğlu</option>
                        <option value="9399209"> Çekmeköy</option>
                        <option value="9399210"> Eyüp</option>
                        <option value="9399211"> Fatih</option>
                        <option value="9399212"> Gaziosmanpaşa</option>
                        <option value="9399213"> Güngören</option>
                        <option value="9399214"> Kadıköy</option>
                        <option value="9399215"> Kağıthane</option>
                        <option value="9399216"> Kartal</option>
                        <option value="9399217"> Küçükçekmece</option>
                        <option value="9399218"> Sarıyer</option>
                        <option value="9399219"> Tuzla</option>
                    </select>
                    <label class="floating-label">City</label>
                </div>


                <div class="form-group form-material floating row">
                    <label class="floating-label floating-label-static">Amenities</label>
                    @foreach($amenities as $amenity)
                        <div class="checkbox-custom checkbox-default col-md-3">
                            <input type="checkbox" id="amenities" name="tags[]" autocomplete="off"
                                   value="{{ $amenity->id }}">
                            <label for="inputBasicRemember">{{ $amenity->title }}</label>
                        </div>
                    @endforeach
                    <div class="checkbox-custom checkbox-default col-md-3">
                        <input type="checkbox" id="amenities" name="tags[]" autocomplete="off">
                        <label for="inputBasicRemember">Amenity 1</label>
                    </div>
                    <div class="checkbox-custom checkbox-default col-md-3">
                        <input type="checkbox" id="amenities" name="tags[]" autocomplete="off">
                        <label for="inputBasicRemember">Amenity 2</label>
                    </div>
                    {{--<select--}}
                    {{--multiple=""--}}
                    {{--class="form-control"--}}
                    {{--data-plugin="selectpicker"--}}
                    {{--data-live-search="true"--}}
                    {{--data-selected-text-format="count > 3"--}}
                    {{--data-hint="Multi select, use Command/Ctrl">--}}
                    {{--<option value="1" data-icon="md-case">tet</option>--}}
                    {{--<option value="1" data-icon="md-favorite">test</option>--}}
                    {{--<option value="1" data-icon="md-home">test2</option>--}}
                    {{--</select>--}}
                </div>

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
                        <textarea class="form-control empty" rows="4"
                                  name="description">{{--{{ old('description') }}--}}</textarea>
                        {{--@if ($errors->has('description'))--}}
                        {{--<span class="help-block">--}}
                        {{--<strong>{{ $errors->first('description') }}</strong>--}}
                        {{--</span>--}}
                        {{--@endif--}}
                        <label class="floating-label">Description</label>
                    </div>
                </div>

                <div class="form-group form-material floating row">
                    <div class="col-md-12">
                        <textarea class="form-control empty" rows="2"
                                  name="equipments"></textarea>
                        <label class="floating-label">Equipments</label>
                    </div>
                </div>


                <div class="form-group form-material floating row">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="hourly_price"/>
                                <label class="floating-label">Hourly price</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="daily_price"/>
                                <label class="floating-label">Daily price</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="monthly_price"/>
                                <label class="floating-label">Monthly price</label>
                            </div>
                        </div>
                    </div>


                </div>


                <div class="form-group form-material floating row">
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon">m<sup>2</sup></span>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" name="area"/>
                                <label class="floating-label">Area</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="max_number_of_people"/>
                        <label class="floating-label">Max number of people</label>
                    </div>
                </div>

                <div class="form-group form-material floating row">
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="address"/>
                        <label class="floating-label">Address</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="zip"/>
                        <label class="floating-label">Zip</label>
                    </div>
                </div>


                <div class="form-group form-material floating row">
                    <div class="col-md-6">
                        <input type="text" disabled class="form-control disabled" name="latitude"/>
                        <label class="floating-label">Latitude</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" disabled class="form-control disabled" name="longitude"/>
                        <label class="floating-label">Longitude</label>
                    </div>
                </div>


                <br>

                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                </div>

            </form>
        </div>
    </div>
    <!-- End Panel Floating Lables -->
@endsection

@push('head')
    <link rel="stylesheet"
          href="{{config('cache.static_files_root')}}/global/vendor/bootstrap-select/bootstrap-select.css">
    <style>
        /*.bootstrap-select {*/
        /*width: 100% !important;*/
        /*}*/
    </style>
@endpush

@push('footer')
    <script src="{{config('cache.static_files_root')}}/global/vendor/bootstrap-select/bootstrap-select.js"></script>
    <script src="{{config('cache.static_files_root')}}/global/js/components/bootstrap-select.js"></script>
@endpush
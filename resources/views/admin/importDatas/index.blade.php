@extends('layouts.admin')
@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    @if(session()->has('failures'))
        <div class="alert alert-danger">
            Something went wrong please check errors and try again
        </div>
        <table class="table table-danger">
            <tr>
                <th>Row</th>
                <th>Attribute</th>
                <th>Errors</th>
                <th>Value</th>
            </tr>
            @foreach(session()->get('failures') as $item)
                <tr>
                    <td>{{ $item->row() }}</td>
                    <td>{{ $item->attribute() }}</td>
                    <td>
                        <ul>
                            @foreach($item->errors() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $item->values()[$item->attribute()] }}</td>
                </tr>
            @endforeach
        </table>
    @endif

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active text-muted" id="home-tab" data-toggle="tab" href="#cars" role="tab"
               aria-controls="cars" aria-selected="true">Car Imports</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link text-muted" id="profile-tab" data-toggle="tab" href="#tires" role="tab"
               aria-controls="tires" aria-selected="false">Tire Imports</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link text-muted" id="contact-tab" data-toggle="tab" href="#articles" role="tab"
               aria-controls="articles" aria-selected="false">Article Imports</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link text-muted" id="contact-tab" data-toggle="tab" href="#distributars" role="tab"
               aria-controls="distributars" aria-selected="false">Distrubitar Imports</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link text-muted" id="contact-tab" data-toggle="tab" href="#news" role="tab"
               aria-controls="news" aria-selected="false">News Imports</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        {{--    Car imports    --}}
        <div class="tab-pane fade show active" id="cars" role="tabpanel" aria-labelledby="home-tab">
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.importData.title') }} Car Types
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.import-datas.car-type-import') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="car_type" class="required">Car Type Import</label>
                            <input type="file" name="car_type" class="form-control-file">
                            <span
                                class="help-block">Data needed in Excel sheet is (name - slug - description - active(1 or 0))</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.importData.title') }} Maker
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.import-datas.maker-import') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="maker" class="required">Maker Import</label>
                            <input type="file" name="maker" class="form-control-file">
                            <span
                                class="help-block">Data needed in Excel sheet is (name - searchable(1 or 0))</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.importData.title') }} Car Models
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.import-datas.car-model-import') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="car_model" class="required">Car Models Import</label>
                            <input type="file" name="car_model" class="form-control-file">
                            <span
                                class="help-block">Data needed in Excel sheet is (name - car_id)</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{--    Tire imports    --}}
        <div class="tab-pane fade" id="tires" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.importData.title') }} Tire Features
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.import-datas.tire-feature-import') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tire_feature" class="required">Tire Features Import</label>
                            <input type="file" name="tire_feature" class="form-control-file">
                            <span class="help-block">Data needed in Excel sheet is (en_name, ar_name)</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.importData.title') }} Tire Design
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.import-datas.tire-design-import') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tire_design" class="required">Tire Design Import</label>
                            <input type="file" name="tire_design" class="form-control-file">
                            <span class="help-block">Data needed in Excel sheet is (en_name, ar_name)</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.importData.title') }} Tires
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.import-datas.tires-import') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tires" class="required">Tires Import</label>
                            <input type="file" name="tire" class="form-control-file">
                            <span class="help-block">Data needed in Excel sheet is </span>
                            <table class="table table-responsive table-stripped">
                                <tr>
                                    <th>en_title</th>
                                    <th>ar_title</th>
                                    <th>en_short_description</th>
                                    <th>ar_short_description</th>
                                    <th>en_seo_keywords</th>
                                    <th>ar_seo_keywords</th>
                                    <th>en_seo_description</th>
                                    <th>ar_seo_description</th>
                                    <th>slug</th>
                                    <th>video_link</th>
                                    <th>dry_performance</th>
                                    <th>wet_performance</th>
                                    <th>rolling_resistance</th>
                                    <th>comfort_noise</th>
                                    <th>wear</th>
                                    <th>snow</th>
                                    <th>fuel_consumption</th>
                                    <th>durability</th>
                                    <th>wet_handling</th>
                                    <th>wet_grip</th>
                                    <th>aquaplaning</th>
                                    <th>ice</th>
                                    <th>car_type_id</th>
                                    <th>tire_features</th>
                                    <th>tire_designs</th>
                                    <th>car_models</th>
                                </tr>
                                <tr>
                                    <td>en title</td>
                                    <td>ar title</td>
                                    <td>en short_description</td>
                                    <td>ar short_description</td>
                                    <td>en seo_keywords</td>
                                    <td>ar seo_keywords</td>
                                    <td>en seo_description</td>
                                    <td>ar seo_description</td>
                                    <td>slug</td>
                                    <td>url</td>
                                    <td>from 0 to 5</td>
                                    <td>from 0 to 5</td>
                                    <td>from 0 to 5</td>
                                    <td>from 0 to 5</td>
                                    <td>from 0 to 5</td>
                                    <td>from 0 to 5</td>
                                    <td>from 0 to 5</td>
                                    <td>from 0 to 5</td>
                                    <td>from 0 to 5</td>
                                    <td>from 0 to 5</td>
                                    <td>from 0 to 5</td>
                                    <td>from 0 to 5</td>
                                    <td>1</td>
                                    <td>1,3,8</td>
                                    <td>2,7,3</td>
                                    <td>1,2,6,9</td>
                                </tr>
                            </table>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.importData.title') }} Tire Sizes
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.import-datas.tire-sizes-import') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tire_size" class="required">Tire Sizes Import</label>
                            <input type="file" name="tire_size" class="form-control-file">
                            <span class="help-block">Data needed in Excel sheet is (width, ratio, rim_diameter, load_index, speed_rating, tire_id)</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.importData.title') }} Tire Models
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.import-datas.tire-model-import') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tire_size" class="required">Tire Models Import</label>
                            <input type="file" name="tire_model" class="form-control-file">
                            <span class="help-block">Data needed in Excel sheet is (model_id, tire_id)</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{--    Articles imports    --}}
        <div class="tab-pane fade" id="articles" role="tabpanel" aria-labelledby="contact-tab">
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.importData.title') }} Articles
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.import-datas.article-import') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="article" class="required">Article Import</label>
                            <input type="file" name="article" class="form-control-file">
                            <span class="help-block">Data needed in Excel sheet is (en_title, ar_title, en_description, ar_description, en_article, ar_article, slug, en_seo_keywords, ar_seo_keywords, en_seo_description, ar_seo_description, publish(1 or 0))</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{--    Distributars imports    --}}
        <div class="tab-pane fade" id="distributars" role="tabpanel" aria-labelledby="contact-tab">
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.importData.title') }} Cities
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.import-datas.city-import') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="city" class="required">Cities Import</label>
                            <input type="file" name="city" class="form-control-file">
                            <span class="help-block">Data needed in Excel sheet is (en_name, ar_name, en_seo_keywords, ar_seo_keywords, en_seo_description, ar_seo_description, slug, map, active (1 or 0) )</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.importData.title') }} Locations
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.import-datas.location-import') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="location" class="required">Location Import</label>
                            <input type="file" name="location" class="form-control-file">
                            <span class="help-block">Data needed in Excel sheet is (en_name, ar_name, en_address, ar_address, en_working_hour, ar_working_hour, city_id, phone, map, active (1 or 0) )</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{--    news imports    --}}
        <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="contact-tab">
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.importData.title') }} News
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.import-datas.news-import') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="news" class="required">news Import</label>
                            <input type="file" name="news" class="form-control-file">
                            <span class="help-block">Data needed in Excel sheet is (name, email)</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

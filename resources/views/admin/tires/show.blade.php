@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tire.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tires.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.id') }}
                        </th>
                        <td>
                            {{ $tire->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.title') }}
                        </th>
                        <td>
                            {{ $tire->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.slug') }}
                        </th>
                        <td>
                            {{ $tire->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.short_description') }}
                        </th>
                        <td>
                            {{ $tire->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.seo_keywords') }}
                        </th>
                        <td>
                            {{ $tire->seo_keywords }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.seo_description') }}
                        </th>
                        <td>
                            {{ $tire->seo_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.description') }}
                        </th>
                        <td>
                            {!! $tire->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.video_link') }}
                        </th>
                        <td>
                            {{ $tire->video_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.breadcrumb') }}
                        </th>
                        <td>
                            @if($tire->breadcrumb)
                                <a href="{{ $tire->breadcrumb->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $tire->breadcrumb->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.thumb') }}
                        </th>
                        <td>
                            @if($tire->thumb)
                                <a href="{{ $tire->thumb->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $tire->thumb->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.tire_logo') }}
                        </th>
                        <td>
                            @if($tire->tire_logo)
                                <a href="{{ $tire->tire_logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $tire->tire_logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.images') }}
                        </th>
                        <td>
                            @foreach($tire->images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.dry_performance') }}
                        </th>
                        <td>
                            {{ $tire->dry_performance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.wet_performance') }}
                        </th>
                        <td>
                            {{ $tire->wet_performance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.rolling_resistance') }}
                        </th>
                        <td>
                            {{ $tire->rolling_resistance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.comfort_noise') }}
                        </th>
                        <td>
                            {{ $tire->comfort_noise }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.wear') }}
                        </th>
                        <td>
                            {{ $tire->wear }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.snow') }}
                        </th>
                        <td>
                            {{ $tire->snow }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.fuel_consumption') }}
                        </th>
                        <td>
                            {{ $tire->fuel_consumption }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.durability') }}
                        </th>
                        <td>
                            {{ $tire->durability }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.wet_handling') }}
                        </th>
                        <td>
                            {{ $tire->wet_handling }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.wet_grip') }}
                        </th>
                        <td>
                            {{ $tire->wet_grip }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.aquaplaning') }}
                        </th>
                        <td>
                            {{ $tire->aquaplaning }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.ice') }}
                        </th>
                        <td>
                            {{ $tire->ice }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.tire_feature') }}
                        </th>
                        <td>
                            @foreach($tire->tire_features as $key => $tire_feature)
                                <span class="label label-info">{{ $tire_feature->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.tire_design') }}
                        </th>
                        <td>
                            @foreach($tire->tire_designs as $key => $tire_design)
                                <span class="label label-info">{{ $tire_design->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.car_model') }}
                        </th>
                        <td>
                            @foreach($tire->car_models as $key => $car_model)
                                <span class="label label-info">{{ $car_model->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tire.fields.car_type') }}
                        </th>
                        <td>
                            {{ $tire->car_type->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tires.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection

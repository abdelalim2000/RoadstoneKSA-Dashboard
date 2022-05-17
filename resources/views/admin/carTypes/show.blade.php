@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.carType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.car-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.carType.fields.id') }}
                        </th>
                        <td>
                            {{ $carType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carType.fields.name') }}
                        </th>
                        <td>
                            {{ $carType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carType.fields.slug') }}
                        </th>
                        <td>
                            {{ $carType->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carType.fields.description') }}
                        </th>
                        <td>
                            {{ $carType->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carType.fields.image') }}
                        </th>
                        <td>
                            @if($carType->image)
                                <a href="{{ $carType->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $carType->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carType.fields.breadcrumb') }}
                        </th>
                        <td>
                            @if($carType->breadcrumb)
                                <a href="{{ $carType->breadcrumb->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $carType->breadcrumb->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.carType.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $carType->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.car-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
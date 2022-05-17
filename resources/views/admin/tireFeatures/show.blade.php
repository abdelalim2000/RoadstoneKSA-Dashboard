@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tireFeature.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tire-features.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tireFeature.fields.id') }}
                        </th>
                        <td>
                            {{ $tireFeature->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tireFeature.fields.name') }}
                        </th>
                        <td>
                            {{ $tireFeature->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tireFeature.fields.icon') }}
                        </th>
                        <td>
                            @if($tireFeature->icon)
                                <a href="{{ $tireFeature->icon->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $tireFeature->icon->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tire-features.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
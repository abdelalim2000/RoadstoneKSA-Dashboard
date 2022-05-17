@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tireSize.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tire-sizes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tireSize.fields.id') }}
                        </th>
                        <td>
                            {{ $tireSize->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tireSize.fields.width') }}
                        </th>
                        <td>
                            {{ $tireSize->width }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tireSize.fields.ratio') }}
                        </th>
                        <td>
                            {{ $tireSize->ratio }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tireSize.fields.rim_diameter') }}
                        </th>
                        <td>
                            {{ $tireSize->rim_diameter }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tireSize.fields.load_index') }}
                        </th>
                        <td>
                            {{ $tireSize->load_index }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tireSize.fields.speed_rating') }}
                        </th>
                        <td>
                            {{ $tireSize->speed_rating }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tireSize.fields.tire') }}
                        </th>
                        <td>
                            {{ $tireSize->tire->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tire-sizes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.maker.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.makers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.maker.fields.id') }}
                        </th>
                        <td>
                            {{ $maker->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.maker.fields.name') }}
                        </th>
                        <td>
                            {{ $maker->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.maker.fields.image') }}
                        </th>
                        <td>
                            @if($maker->image)
                                <a href="{{ $maker->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $maker->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.maker.fields.searchable') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $maker->searchable ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.makers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
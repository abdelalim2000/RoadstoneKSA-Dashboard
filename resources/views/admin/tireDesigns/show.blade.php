@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.tireDesign.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tire-designs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.tireDesign.fields.id') }}
                        </th>
                        <td>
                            {{ $tireDesign->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tireDesign.fields.name') }}
                        </th>
                        <td>
                            {{ $tireDesign->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tireDesign.fields.image') }}
                        </th>
                        <td>
                            @if($tireDesign->image)
                                <a href="{{ $tireDesign->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $tireDesign->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tire-designs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
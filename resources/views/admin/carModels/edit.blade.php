@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.carModel.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.car-models.update", [$carModel->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.carModel.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $carModel->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carModel.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="maker_id">{{ trans('cruds.carModel.fields.maker') }}</label>
                <select class="form-control select2 {{ $errors->has('maker') ? 'is-invalid' : '' }}" name="maker_id" id="maker_id" required>
                    @foreach($makers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('maker_id') ? old('maker_id') : $carModel->maker->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('maker'))
                    <div class="invalid-feedback">
                        {{ $errors->first('maker') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.carModel.fields.maker_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
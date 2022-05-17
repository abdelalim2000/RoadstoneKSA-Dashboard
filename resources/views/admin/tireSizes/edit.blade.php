@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tireSize.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tire-sizes.update", [$tireSize->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="width">{{ trans('cruds.tireSize.fields.width') }}</label>
                <input class="form-control {{ $errors->has('width') ? 'is-invalid' : '' }}" type="number" name="width" id="width" value="{{ old('width', $tireSize->width) }}" step="1" required>
                @if($errors->has('width'))
                    <div class="invalid-feedback">
                        {{ $errors->first('width') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tireSize.fields.width_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ratio">{{ trans('cruds.tireSize.fields.ratio') }}</label>
                <input class="form-control {{ $errors->has('ratio') ? 'is-invalid' : '' }}" type="number" name="ratio" id="ratio" value="{{ old('ratio', $tireSize->ratio) }}" step="1" required>
                @if($errors->has('ratio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ratio') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tireSize.fields.ratio_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="rim_diameter">{{ trans('cruds.tireSize.fields.rim_diameter') }}</label>
                <input class="form-control {{ $errors->has('rim_diameter') ? 'is-invalid' : '' }}" type="number" name="rim_diameter" id="rim_diameter" value="{{ old('rim_diameter', $tireSize->rim_diameter) }}" step="1" required>
                @if($errors->has('rim_diameter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rim_diameter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tireSize.fields.rim_diameter_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="load_index">{{ trans('cruds.tireSize.fields.load_index') }}</label>
                <input class="form-control {{ $errors->has('load_index') ? 'is-invalid' : '' }}" type="number" name="load_index" id="load_index" value="{{ old('load_index', $tireSize->load_index) }}" step="1" required>
                @if($errors->has('load_index'))
                    <div class="invalid-feedback">
                        {{ $errors->first('load_index') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tireSize.fields.load_index_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="speed_rating">{{ trans('cruds.tireSize.fields.speed_rating') }}</label>
                <input class="form-control {{ $errors->has('speed_rating') ? 'is-invalid' : '' }}" type="text" name="speed_rating" id="speed_rating" value="{{ old('speed_rating', $tireSize->speed_rating) }}" required>
                @if($errors->has('speed_rating'))
                    <div class="invalid-feedback">
                        {{ $errors->first('speed_rating') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tireSize.fields.speed_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tire_id">{{ trans('cruds.tireSize.fields.tire') }}</label>
                <select class="form-control select2 {{ $errors->has('tire') ? 'is-invalid' : '' }}" name="tire_id" id="tire_id" required>
                    @foreach($tires as $id => $entry)
                        <option value="{{ $id }}" {{ (old('tire_id') ? old('tire_id') : $tireSize->tire->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('tire'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tire') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.tireSize.fields.tire_helper') }}</span>
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
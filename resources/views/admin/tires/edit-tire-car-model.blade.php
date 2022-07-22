@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.tire.title_singular') }} Car Model
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.tires.models.update", [$tire->id]) }}">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="car_models">{{ trans('cruds.tire.fields.car_model') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                              style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                              style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('car_models') ? 'is-invalid' : '' }}"
                            name="car_models[]" id="car_models" multiple>
                        @foreach($car_models as $key=>$item)
                            <option
                                value="{{ $key }}" {{ (in_array($key, old('car_models', [])) || $tire->car_models->contains($key)) ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('car_models'))
                        <div class="invalid-feedback">
                            {{ $errors->first('car_models') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.car_model_helper') }}</span>
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

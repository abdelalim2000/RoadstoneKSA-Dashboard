@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.contactType.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.contact-types.update", [$contactType->id]) }}"
                  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @foreach(siteLanguages() as $locale)
                    <div class="form-group">
                        <label class="required" for="{{$locale}}-name">{{ trans('cruds.contactType.fields.name') }}
                            [{{$locale}}]</label>
                        <input class="form-control {{ $errors->has($locale.'.name') ? 'is-invalid' : '' }}" type="text"
                               name="{{$locale}}[name]" id="{{$locale}}-name"
                               value="{{ old($locale.'.name', $contactType->translate($locale, true)->name) }}"
                               required>
                        @if($errors->has($locale.'.name'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.contactType.fields.name_helper') }}</span>
                    </div>
                @endforeach
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

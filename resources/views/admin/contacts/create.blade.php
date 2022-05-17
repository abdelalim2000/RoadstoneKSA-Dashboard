@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.contact.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contacts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="contact_type_id">{{ trans('cruds.contact.fields.contact_type') }}</label>
                <select class="form-control select2 {{ $errors->has('contact_type') ? 'is-invalid' : '' }}" name="contact_type_id" id="contact_type_id" required>
                    @foreach($contact_types as $id => $entry)
                        <option value="{{ $id }}" {{ old('contact_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('contact_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.contact_type_helper') }}</span>
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
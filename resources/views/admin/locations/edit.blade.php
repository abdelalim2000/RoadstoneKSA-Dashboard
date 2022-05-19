@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.location.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.locations.update", [$location->id]) }}"
                  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @foreach(siteLanguages() as $locale)
                    <div class="form-group">
                        <label class="required" for="{{$locale}}-name">{{ trans('cruds.location.fields.name') }}
                            [{{$locale}}]</label>
                        <input class="form-control {{ $errors->has($locale.'.name') ? 'is-invalid' : '' }}" type="text"
                               name="{{$locale}}[name]"
                               id="{{$locale}}-name"
                               value="{{ old($locale.'.name', $location->translate($locale, true)->name) }}" required>
                        @if($errors->has($locale.'.name'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.location.fields.name_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="required" for="{{$locale}}-address">{{ trans('cruds.location.fields.address') }}
                            [{{$locale}}]</label>
                        <textarea class="form-control {{ $errors->has($locale.'.address') ? 'is-invalid' : '' }}"
                                  name="{{$locale}}[address]"
                                  id="{{$locale}}-address"
                                  required>{{ old($locale.'.address', $location->translate($locale, true)->address) }}</textarea>
                        @if($errors->has($locale.'.address'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.address') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.location.fields.address_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="{{$locale}}-working_hour">{{ trans('cruds.location.fields.working_hour') }}
                            [{{$locale}}]</label>
                        <input class="form-control {{ $errors->has($locale.'.working_hour') ? 'is-invalid' : '' }}"
                               type="text"
                               name="{{$locale}}[working_hour]" id="{{$locale}}-working_hour"
                               value="{{ old($locale.'.working_hour', $location->translate($locale, true)->working_hour) }}">
                        @if($errors->has($locale.'.working_hour'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.working_hour') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.location.fields.working_hour_helper') }}</span>
                    </div>
                @endforeach

                <div class="form-group">
                    <label class="required" for="city_id">{{ trans('cruds.location.fields.city') }}</label>
                    <select class="form-control select2 {{ $errors->has('city') ? 'is-invalid' : '' }}" name="city_id"
                            id="city_id" required>
                        @foreach($cities as $entry)
                            <option
                                value="{{ $entry->id }}" {{ (old('city_id') ? old('city_id') : $location->city->id ?? '') == $entry->id ? 'selected' : '' }}>{{ $entry->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('city'))
                        <div class="invalid-feedback">
                            {{ $errors->first('city') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.location.fields.city_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="phone">{{ trans('cruds.location.fields.phone') }}</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone"
                           id="phone" value="{{ old('phone', $location->phone) }}" required>
                    @if($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.location.fields.phone_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="map">{{ trans('cruds.location.fields.map') }}</label>
                    <textarea class="form-control {{ $errors->has('map') ? 'is-invalid' : '' }}" name="map"
                              id="map">{!! old('map', $location->map) !!}</textarea>
                    @if($errors->has('map'))
                        <div class="invalid-feedback">
                            {{ $errors->first('map') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.location.fields.map_helper') }}</span>
                </div>

                <div class="form-group">
                    <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="active" value="0">
                        <input class="form-check-input" type="checkbox" name="active" id="active"
                               value="1" {{ $location->active || old('active', 0) === 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="active">{{ trans('cruds.location.fields.active') }}</label>
                    </div>
                    @if($errors->has('active'))
                        <div class="invalid-feedback">
                            {{ $errors->first('active') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.location.fields.active_helper') }}</span>
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

@section('scripts')
    <script>
        $(document).ready(function () {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function (loader) {
                    return {
                        upload: function () {
                            return loader.file
                                .then(function (file) {
                                    return new Promise(function (resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '{{ route('admin.locations.storeCKEditorImages') }}', true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText = `Couldn't upload file: ${file.name}.`;
                                        xhr.addEventListener('error', function () {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function () {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function () {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                                            }

                                            $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                                            resolve({default: response.url});
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function (e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', '{{ $location->id ?? 0 }}');
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            // var allEditors = document.querySelectorAll('.ckeditor');
            // for (var i = 0; i < allEditors.length; ++i) {
            //     ClassicEditor.create(
            //         allEditors[i], {
            //             extraPlugins: [SimpleUploadAdapter]
            //         }
            //     );
            // }
        });
    </script>

@endsection

@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.tire.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.tires.update", [$tire->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                @foreach(siteLanguages() as $locale)

                    <div class="form-group">
                        <label class="required" for="{{$locale}}-title">{{ trans('cruds.tire.fields.title') }}
                            [{{$locale}}]</label>
                        <input class="form-control {{ $errors->has($locale.'.title') ? 'is-invalid' : '' }}" type="text"
                               name="{{$locale}}[title]" id="{{$locale}}-title"
                               value="{{ old($locale.'.title', $tire->translate($locale, true)->title) }}"
                               required>
                        @if($errors->has($locale.'.title'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.title') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.tire.fields.title_helper') }}</span>
                    </div>

{{--                    <div class="form-group">--}}
{{--                        <label class="required"--}}
{{--                               for="{{$locale}}-short_description">{{ trans('cruds.tire.fields.short_description') }}--}}
{{--                            [{{$locale}}]</label>--}}
{{--                        <textarea--}}
{{--                            class="form-control {{ $errors->has($locale.'.short_description') ? 'is-invalid' : '' }}"--}}
{{--                            name="{{$locale}}[short_description]" id="{{$locale}}-short_description"--}}
{{--                            required>{{ old($locale.'.short_description',$tire->translate($locale, true)->short_description) }}</textarea>--}}
{{--                        @if($errors->has($locale.'.short_description'))--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                {{ $errors->first($locale.'.short_description') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <span class="help-block">{{ trans('cruds.tire.fields.short_description_helper') }}</span>--}}
{{--                    </div>--}}

                    <div class="form-group">
                        <label for="{{$locale}}-description">{{ trans('cruds.tire.fields.description') }} [{{$locale}}
                            ]</label>
                        <textarea
                            class="form-control ckeditor {{ $errors->has($locale.'.description') ? 'is-invalid' : '' }}"
                            name="{{$locale}}[description]"
                            id="{{$locale}}-description">{!! old($locale.'.description', $tire->translate($locale, true)->description) !!}</textarea>
                        @if($errors->has($locale.'.description'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.tire.fields.description_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="{{$locale}}-seo_keywords">{{ trans('cruds.tire.fields.seo_keywords') }} [{{$locale}}
                            ]</label>
                        <textarea class="form-control {{ $errors->has($locale.'.seo_keywords') ? 'is-invalid' : '' }}"
                                  name="{{$locale}}[seo_keywords]"
                                  id="{{$locale}}-seo_keywords">{{ old($locale.'.seo_keywords', $tire->translate($locale, true)->seo_keywords) }}</textarea>
                        @if($errors->has($locale.'.seo_keywords'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.seo_keywords') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.tire.fields.seo_keywords_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="{{$locale}}-seo_description">{{ trans('cruds.tire.fields.seo_description') }}
                            [{{$locale}}]</label>
                        <textarea
                            class="form-control {{ $errors->has($locale.'.seo_description') ? 'is-invalid' : '' }}"
                            name="{{$locale}}[seo_description]"
                            id="{{$locale}}-seo_description">{{ old($locale.'.seo_description', $tire->translate($locale, true)->seo_description) }}</textarea>
                        @if($errors->has($locale.'.seo_description'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.seo_description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.tire.fields.seo_description_helper') }}</span>
                    </div>

                @endforeach

                <div class="form-group">
                    <label class="required" for="slug">{{ trans('cruds.tire.fields.slug') }}</label>
                    <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug"
                           id="slug" value="{{ old('slug', $tire->slug) }}" required>
                    @if($errors->has('slug'))
                        <div class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.slug_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="video_link">{{ trans('cruds.tire.fields.video_link') }}</label>
                    <input class="form-control {{ $errors->has('video_link') ? 'is-invalid' : '' }}" type="text"
                           name="video_link" id="video_link" value="{{ old('video_link', $tire->video_link) }}">
                    @if($errors->has('video_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('video_link') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.video_link_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="breadcrumb">{{ trans('cruds.tire.fields.breadcrumb') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('breadcrumb') ? 'is-invalid' : '' }}"
                         id="breadcrumb-dropzone">
                    </div>
                    @if($errors->has('breadcrumb'))
                        <div class="invalid-feedback">
                            {{ $errors->first('breadcrumb') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.breadcrumb_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="thumb">{{ trans('cruds.tire.fields.thumb') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('thumb') ? 'is-invalid' : '' }}"
                         id="thumb-dropzone">
                    </div>
                    @if($errors->has('thumb'))
                        <div class="invalid-feedback">
                            {{ $errors->first('thumb') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.thumb_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="tire_logo">{{ trans('cruds.tire.fields.tire_logo') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('tire_logo') ? 'is-invalid' : '' }}"
                         id="tire_logo-dropzone">
                    </div>
                    @if($errors->has('tire_logo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tire_logo') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.tire_logo_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="images">{{ trans('cruds.tire.fields.images') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('images') ? 'is-invalid' : '' }}"
                         id="images-dropzone">
                    </div>
                    @if($errors->has('images'))
                        <div class="invalid-feedback">
                            {{ $errors->first('images') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.images_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="dry_performance">{{ trans('cruds.tire.fields.dry_performance') }}</label>
                    <input class="form-control {{ $errors->has('dry_performance') ? 'is-invalid' : '' }}" type="number"
                           name="dry_performance" id="dry_performance"
                           value="{{ old('dry_performance', $tire->dry_performance) }}" step="0.1" max="5">
                    @if($errors->has('dry_performance'))
                        <div class="invalid-feedback">
                            {{ $errors->first('dry_performance') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.dry_performance_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="wet_performance">{{ trans('cruds.tire.fields.wet_performance') }}</label>
                    <input class="form-control {{ $errors->has('wet_performance') ? 'is-invalid' : '' }}" type="number"
                           name="wet_performance" id="wet_performance"
                           value="{{ old('wet_performance', $tire->wet_performance) }}" step="0.1" max="5">
                    @if($errors->has('wet_performance'))
                        <div class="invalid-feedback">
                            {{ $errors->first('wet_performance') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.wet_performance_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="rolling_resistance">{{ trans('cruds.tire.fields.rolling_resistance') }}</label>
                    <input class="form-control {{ $errors->has('rolling_resistance') ? 'is-invalid' : '' }}"
                           type="number" name="rolling_resistance" id="rolling_resistance"
                           value="{{ old('rolling_resistance', $tire->rolling_resistance) }}" step="0.1" max="5">
                    @if($errors->has('rolling_resistance'))
                        <div class="invalid-feedback">
                            {{ $errors->first('rolling_resistance') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.rolling_resistance_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="comfort_noise">{{ trans('cruds.tire.fields.comfort_noise') }}</label>
                    <input class="form-control {{ $errors->has('comfort_noise') ? 'is-invalid' : '' }}" type="number"
                           name="comfort_noise" id="comfort_noise"
                           value="{{ old('comfort_noise', $tire->comfort_noise) }}" step="0.1" max="5">
                    @if($errors->has('comfort_noise'))
                        <div class="invalid-feedback">
                            {{ $errors->first('comfort_noise') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.comfort_noise_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="wear">{{ trans('cruds.tire.fields.wear') }}</label>
                    <input class="form-control {{ $errors->has('wear') ? 'is-invalid' : '' }}" type="number" name="wear"
                           id="wear" value="{{ old('wear', $tire->wear) }}" step="0.1" max="5">
                    @if($errors->has('wear'))
                        <div class="invalid-feedback">
                            {{ $errors->first('wear') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.wear_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="snow">{{ trans('cruds.tire.fields.snow') }}</label>
                    <input class="form-control {{ $errors->has('snow') ? 'is-invalid' : '' }}" type="number" name="snow"
                           id="snow" value="{{ old('snow', $tire->snow) }}" step="0.1" max="5">
                    @if($errors->has('snow'))
                        <div class="invalid-feedback">
                            {{ $errors->first('snow') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.snow_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="fuel_consumption">{{ trans('cruds.tire.fields.fuel_consumption') }}</label>
                    <input class="form-control {{ $errors->has('fuel_consumption') ? 'is-invalid' : '' }}" type="number"
                           name="fuel_consumption" id="fuel_consumption"
                           value="{{ old('fuel_consumption', $tire->fuel_consumption) }}" step="0.1" max="5">
                    @if($errors->has('fuel_consumption'))
                        <div class="invalid-feedback">
                            {{ $errors->first('fuel_consumption') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.fuel_consumption_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="durability">{{ trans('cruds.tire.fields.durability') }}</label>
                    <input class="form-control {{ $errors->has('durability') ? 'is-invalid' : '' }}" type="number"
                           name="durability" id="durability" value="{{ old('durability', $tire->durability) }}"
                           step="0.1" max="5">
                    @if($errors->has('durability'))
                        <div class="invalid-feedback">
                            {{ $errors->first('durability') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.durability_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="wet_handling">{{ trans('cruds.tire.fields.wet_handling') }}</label>
                    <input class="form-control {{ $errors->has('wet_handling') ? 'is-invalid' : '' }}" type="number"
                           name="wet_handling" id="wet_handling" value="{{ old('wet_handling', $tire->wet_handling) }}"
                           step="0.1" max="5">
                    @if($errors->has('wet_handling'))
                        <div class="invalid-feedback">
                            {{ $errors->first('wet_handling') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.wet_handling_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="wet_grip">{{ trans('cruds.tire.fields.wet_grip') }}</label>
                    <input class="form-control {{ $errors->has('wet_grip') ? 'is-invalid' : '' }}" type="number"
                           name="wet_grip" id="wet_grip" value="{{ old('wet_grip', $tire->wet_grip) }}" step="0.1"
                           max="5">
                    @if($errors->has('wet_grip'))
                        <div class="invalid-feedback">
                            {{ $errors->first('wet_grip') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.wet_grip_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="aquaplaning">{{ trans('cruds.tire.fields.aquaplaning') }}</label>
                    <input class="form-control {{ $errors->has('aquaplaning') ? 'is-invalid' : '' }}" type="number"
                           name="aquaplaning" id="aquaplaning" value="{{ old('aquaplaning', $tire->aquaplaning) }}"
                           step="0.1" max="5">
                    @if($errors->has('aquaplaning'))
                        <div class="invalid-feedback">
                            {{ $errors->first('aquaplaning') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.aquaplaning_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="ice">{{ trans('cruds.tire.fields.ice') }}</label>
                    <input class="form-control {{ $errors->has('ice') ? 'is-invalid' : '' }}" type="number" name="ice"
                           id="ice" value="{{ old('ice', $tire->ice) }}" step="0.1" max="5">
                    @if($errors->has('ice'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ice') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.ice_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="tire_features">{{ trans('cruds.tire.fields.tire_feature') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                              style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                              style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('tire_features') ? 'is-invalid' : '' }}"
                            name="tire_features[]" id="tire_features" multiple required>
                        @foreach($tire_features as $tire_feature)
                            <option
                                value="{{ $tire_feature->id }}" {{ (in_array($tire_feature->id, old('tire_features', [])) || $tire->tire_features->contains($tire_feature->id)) ? 'selected' : '' }}>{{ $tire_feature->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('tire_features'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tire_features') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.tire_feature_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="tire_designs">{{ trans('cruds.tire.fields.tire_design') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                              style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                              style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('tire_designs') ? 'is-invalid' : '' }}"
                            name="tire_designs[]" id="tire_designs" multiple required>
                        @foreach($tire_designs as $tire_design)
                            <option
                                value="{{ $tire_design->id }}" {{ (in_array($tire_design->id, old('tire_designs', [])) || $tire->tire_designs->contains($tire_design->id)) ? 'selected' : '' }}>{{ $tire_design->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('tire_designs'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tire_designs') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.tire_design_helper') }}</span>
                </div>

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
                        @foreach($car_models as $car_model)
                            <option
                                value="{{ $car_model->id }}" {{ (in_array($car_model->id, old('car_models', [])) || $tire->car_models->contains($car_model->id)) ? 'selected' : '' }}>{{ $car_model->name }}</option>
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
                    <label class="required" for="car_type_id">{{ trans('cruds.tire.fields.car_type') }}</label>
                    <select class="form-control select2 {{ $errors->has('car_type') ? 'is-invalid' : '' }}"
                            name="car_type_id" id="car_type_id" required>
                        @foreach($car_types as $entry)
                            <option
                                value="{{ $entry->id }}" {{ (old('car_type_id') ? old('car_type_id') : $tire->car_type->id ?? '') == $entry->id ? 'selected' : '' }}>{{ $entry->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('car_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('car_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.tire.fields.car_type_helper') }}</span>
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
                                        xhr.open('POST', '{{ route('admin.tires.storeCKEditorImages') }}', true);
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
                                        data.append('crud_id', '{{ $tire->id ?? 0 }}');
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>

    <script>
        Dropzone.options.breadcrumbDropzone = {
            url: '{{ route('admin.tires.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').find('input[name="breadcrumb"]').remove()
                $('form').append('<input type="hidden" name="breadcrumb" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="breadcrumb"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($tire) && $tire->breadcrumb)
                var file = {!! json_encode($tire->breadcrumb) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="breadcrumb" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>

    <script>
        Dropzone.options.thumbDropzone = {
            url: '{{ route('admin.tires.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').find('input[name="thumb"]').remove()
                $('form').append('<input type="hidden" name="thumb" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="thumb"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($tire) && $tire->thumb)
                var file = {!! json_encode($tire->thumb) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="thumb" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>

    <script>
        Dropzone.options.tireLogoDropzone = {
            url: '{{ route('admin.tires.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').find('input[name="tire_logo"]').remove()
                $('form').append('<input type="hidden" name="tire_logo" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="tire_logo"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($tire) && $tire->tire_logo)
                var file = {!! json_encode($tire->tire_logo) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="tire_logo" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>

    <script>
        var uploadedImagesMap = {}
        Dropzone.options.imagesDropzone = {
            url: '{{ route('admin.tires.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                console.log(file)
                $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
                uploadedImagesMap[file.name] = response.name
            },
            removedfile: function (file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedImagesMap[file.name]
                }
                $('form').find('input[name="images[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($tire) && $tire->images)
                var files = {!! json_encode($tire->images) !!}
                for(var i in files)
                {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="images[]" value="' + file.file_name + '">')
                }
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection

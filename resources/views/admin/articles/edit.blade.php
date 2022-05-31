@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.article.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.articles.update", [$article->id]) }}"
                  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @foreach(siteLanguages() as $locale)
                    <div class="form-group">
                        <label class="required" for="{{$locale}}-title">{{ trans('cruds.article.fields.title') }}
                            [{{$locale}}]</label>
                        <input class="form-control {{ $errors->has($locale.'.title') ? 'is-invalid' : '' }}" type="text"
                               name="{{$locale}}[title]" id="{{$locale}}-title"
                               value="{{ old($locale.'.title', $article->translate($locale, true)->title) }}"
                               required>
                        @if($errors->has($locale.'.title'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.title') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.article.fields.title_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="required"
                               for="{{$locale}}-description">{{ trans('cruds.article.fields.description') }}
                            [{{$locale}}]</label>
                        <textarea class="form-control {{ $errors->has($locale.'.description') ? 'is-invalid' : '' }}"
                                  name="{{$locale}}[description]" id="{{$locale}}-description"
                                  required>{{ old($locale.'.description', $article->translate($locale, true)->description) }}</textarea>
                        @if($errors->has($locale.'.description'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.article.fields.description_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="{{$locale}}-article">{{ trans('cruds.article.fields.article') }} [{{$locale}}
                            ]</label>
                        <textarea
                            class="form-control ckeditor {{ $errors->has($locale.'.article') ? 'is-invalid' : '' }}"
                            name="{{$locale}}[article]"
                            id="{{$locale}}-article">{!! old($locale.'.article', $article->translate($locale, true)->article) !!}</textarea>
                        @if($errors->has($locale.'.article'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.article') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.article.fields.article_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="{{$locale}}-seo_keywords">{{ trans('cruds.article.fields.seo_keywords') }}
                            [{{$locale}}]</label>
                        <textarea class="form-control {{ $errors->has($locale.'.seo_keywords') ? 'is-invalid' : '' }}"
                                  name="{{$locale}}[seo_keywords]"
                                  id="{{$locale}}-seo_keywords">{{ old($locale.'.seo_keywords',$article->translate($locale, true)->seo_keywords) }}</textarea>
                        @if($errors->has($locale.'.seo_keywords'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.seo_keywords') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.article.fields.seo_keywords_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="{{$locale}}-seo_description">{{ trans('cruds.article.fields.seo_description') }}
                            [{{$locale}}]</label>
                        <textarea
                            class="form-control {{ $errors->has($locale.'.seo_description') ? 'is-invalid' : '' }}"
                            name="{{$locale}}[seo_description]"
                            id="{{$locale}}-seo_description">{{ old($locale.'.seo_description',$article->translate($locale, true)->seo_description) }}</textarea>
                        @if($errors->has($locale.'.seo_description'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.seo_description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.article.fields.seo_description_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="{{$locale}}-alt">{{ trans('cruds.article.fields.alt') }}
                            [{{$locale}}]</label>
                        <textarea
                            class="form-control {{ $errors->has($locale.'.alt') ? 'is-invalid' : '' }}"
                            name="{{$locale}}[alt]"
                            id="{{$locale}}-alt">{{ old($locale.'.alt', $article->translate($locale, true)->alt) }}</textarea>
                        @if($errors->has($locale.'.alt'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.alt') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.article.fields.alt_helper') }}</span>
                    </div>
                @endforeach

                <div class="form-group">
                    <label class="required" for="slug">{{ trans('cruds.article.fields.slug') }}</label>
                    <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug"
                           id="slug" value="{{ old('slug', $article->slug) }}" required>
                    @if($errors->has('slug'))
                        <div class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.article.fields.slug_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="image">{{ trans('cruds.article.fields.image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}"
                         id="image-dropzone">
                    </div>
                    @if($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.article.fields.image_helper') }}</span>
                </div>

                <div class="form-group">
                    <div class="form-check {{ $errors->has('publish') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="publish" value="0">
                        <input class="form-check-input" type="checkbox" name="publish" id="publish"
                               value="1" {{ $article->publish || old('publish', 0) === 1 ? 'checked' : '' }}>
                        <label class="form-check-label"
                               for="publish">{{ trans('cruds.article.fields.publish') }}</label>
                    </div>
                    @if($errors->has('publish'))
                        <div class="invalid-feedback">
                            {{ $errors->first('publish') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.article.fields.publish_helper') }}</span>
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
        Dropzone.options.imageDropzone = {
            url: '{{ route('admin.articles.storeMedia') }}',
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
                $('form').find('input[name="image"]').remove()
                $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($article) && $article->image)
                var file = {!! json_encode($article->image) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
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
                                        xhr.open('POST', '{{ route('admin.articles.storeCKEditorImages') }}', true);
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
                                        data.append('crud_id', '{{ $article->id ?? 0 }}');
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

@endsection

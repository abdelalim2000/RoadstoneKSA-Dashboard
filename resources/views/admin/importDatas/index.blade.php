@extends('layouts.admin')
@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    @if(session()->has('failures'))
        <div class="alert alert-danger">
            Something went wrong please check errors and try again
        </div>
        <table class="table table-danger">
            <tr>
                <th>Row</th>
                <th>Attribute</th>
                <th>Errors</th>
                <th>Value</th>
            </tr>
            @foreach(session()->get('failures') as $item)
                <tr>
                    <td>{{ $item->row() }}</td>
                    <td>{{ $item->attribute() }}</td>
                    <td>
                        <ul>
                            @foreach($item->errors() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $item->values()[$item->attribute()] }}</td>
                </tr>
            @endforeach
        </table>
    @endif

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.importData.title') }} Car Types
        </div>

        <div class="card-body">
            <form action="{{ route('admin.import-datas.car-type-import') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="car_type" class="required">Car Type Import</label>
                    <input type="file" name="car_type" class="form-control-file">
                    <span
                        class="help-block">Data needed in Excel sheet is (name - slug - description - active(1 or 0))</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.importData.title') }} Maker
        </div>

        <div class="card-body">
            <form action="{{ route('admin.import-datas.maker-import') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="maker" class="required">Maker Import</label>
                    <input type="file" name="maker" class="form-control-file">
                    <span
                        class="help-block">Data needed in Excel sheet is (name - searchable(1 or 0))</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.importData.title') }} Car Models
        </div>

        <div class="card-body">
            <form action="{{ route('admin.import-datas.car-model-import') }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="maker" class="required">Car Models Import</label>
                    <input type="file" name="car_model" class="form-control-file">
                    <span
                        class="help-block">Data needed in Excel sheet is (name - car_id)</span>
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

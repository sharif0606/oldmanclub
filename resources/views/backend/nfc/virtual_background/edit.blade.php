@extends('backend.layouts.app')

@section('title', trans('NFC Virtual Background'))
@section('page', trans('Edit'))

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" enctype="multipart/form-data"
                            action="{{ route('nfc-virtual-background.update',encryptor('encrypt',$data->id)) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="category_name">Category<i class="text-danger">*</i></label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $data->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category_id'))
                                            <span class="text-danger"> {{ $errors->first('category_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="image">Image<i class="text-danger">*</i></label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

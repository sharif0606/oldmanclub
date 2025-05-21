@extends('backend.layouts.app')

@section('title', trans('NFC Virtual Background Category'))
@section('page', trans('Edit'))

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" enctype="multipart/form-data"
                            action="{{ route('nfc-virtual-background-category.update',encryptor('encrypt',$data->id)) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="category_name">Name<i class="text-danger">*</i></label>
                                        <input type="text" id="category_name" class="form-control"
                                            value="{{ $data->category_name }}" name="category_name" required>
                                        @if ($errors->has('category_name'))
                                            <span class="text-danger"> {{ $errors->first('category_name') }}</span>
                                        @endif
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

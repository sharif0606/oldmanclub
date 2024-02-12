@extends('backend.layouts.app')

@section('title', trans('NFC Field'))
@section('page', trans('Create'))

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" method="post" enctype="multipart/form-data"
                            action="{{ route('nfc-field.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name">Name<i class="text-danger">*</i></label>
                                        <input type="text" id="name" class="form-control"
                                            value="{{ old('name') }}" name="name">
                                        @if ($errors->has('name'))
                                            <span class="text-danger"> {{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="icon">Icon<i class="text-danger">*</i></label>
                                        {{-- <input type="text" id="icon" class="form-control" value="{{ old('icon')}}" name="icon"> --}}
                                        <select class="form-control" name="icon">
                                            <option value="">Select Icon</option>
                                            <option value="fa-brands fa-dribbble"></i>">Web</option>
                                            <option value="fa-brands fa-dribbble"></i>">Email</option>
                                        </select>
                                        @if ($errors->has('icon'))
                                            <span class="text-danger"> {{ $errors->first('icon') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="status">Status<i class="text-danger">*</i></label>
                                        <select id="status" class="form-control" name="status">
                                            <option value="">select status</option>
                                            <option value="1" @if (old('status') == 1) selected @endif>Show
                                            </option>
                                            <option value="2" @if (old('status') == 2) selected @endif>Hide
                                            </option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="text-danger"> {{ $errors->first('status') }}</span>
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

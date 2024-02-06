@extends('backend.layouts.app')

@section('title',trans('NFC Field'))
@section('page',trans('Create'))

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('nfc-field.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="Identity">Name<i class="text-danger">*</i></label>
                                    <input type="text" id="Identity" pattern="[A-Za-z]+" class="form-control" value="{{ old('Identity')}}" name="Identity">
                                    @if($errors->has('Identity'))
                                        <span class="text-danger"> {{ $errors->first('Identity') }}</span>
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

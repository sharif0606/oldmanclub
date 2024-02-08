@extends('backend.layouts.app')

@section('title',trans('Printing Service'))
@section('page',trans('Edit'))

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('print_service.update',encryptor('encrypt',$print_service->id))}}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="service_name">Service Name<i class="text-danger">*</i></label>
                                    <input type="text" id="name" class="form-control" value="{{ old('service_name',$print_service->service_name)}}" name="service_name">
                                    @if($errors->has('service_name'))
                                        <span class="text-danger"> {{ $errors->first('service_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="service_details">Service Details<i class="text-danger">*</i></label>
                                    <input type="text" id="service_details" class="form-control" value="{{ old('service_details',$print_service->service_details)}}" name="service_details">
                                    @if($errors->has('service_details'))
                                        <span class="text-danger"> {{ $errors->first('service_details') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="qty">Quantity<i class="text-danger">*</i></label>
                                    <input type="text" id="qty" class="form-control" value="{{ old('qty',$print_service->qty)}}" name="qty">
                                    @if($errors->has('qty'))
                                        <span class="text-danger"> {{ $errors->first('qty') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="price">Price<i class="text-danger">*</i></label>
                                    <input type="text" id="price" class="form-control" value="{{ old('price',$print_service->price)}}" name="price">
                                    @if($errors->has('price'))
                                        <span class="text-danger"> {{ $errors->first('price') }}</span>
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

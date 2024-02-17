@extends('backend.layouts.app')
@section('title',trans('Printing Service'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="d-flex">
                                <div class="col-sm-6">
                                    <h4 class="mx-3">Service Name</h4>
                                </div>
                                <b>:</b>
                                <span class="mx-2">{{$print_service->service_name}}</span>
                            </div>
                            <div class="d-flex">
                                <div class="col-sm-6">
                                    <h4 class="mx-3">Service Details</h4>
                                </div>
                                <b>:</b>
                                <span class="mx-2">{!!$print_service->service_details!!}</span>
                            </div>
                            <div class="d-flex">
                                <div class="col-sm-6">
                                     <h4 class="mx-3">Quantity  :  </h4>
                                </div>
                                <b>:</b>
                                <span class="mx-2">{{$print_service->qty}}</span>
                            </div>
                            <div class="d-flex">
                                <div class="col-sm-6">
                                    <h4 class="mx-3">Price</h4>
                                </div>
                                <b>:</b>
                                <span class="mx-2">{{$print_service->price}}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            @if($print_image->isNotEmpty())
                                @foreach($print_image as $image)
                                <img width="100px" src="{{ asset('public/uploads/printimages/'.$image->image) }}" alt="">
                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" @if($image->is_featured) checked @endif>
                                @endforeach
                            @else
                                <h3 class="text-center mt-5">No Image Stored</h3>
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
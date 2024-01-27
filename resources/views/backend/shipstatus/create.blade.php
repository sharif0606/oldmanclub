@extends('backend.layouts.app')
@section('title',trans('Add New Shipping'))
@section('page',trans('create'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('shipstatus.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="number_of_sms">Shipping Title <i class="text-danger">*</i></label>
                                    <select name="shipping_id" id="" class="form-control">
                                        <option value="">Select shipping Title</option>
                                        @foreach($shipping as $value)
                                            @if ($value->status == 2)
                                                <option value="{{$value->id}}" {{ old('shipping_id')==$value->id ? "selected" : "" }}>{{$value->shipping_title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="validity">Shipping Address</label>
                                    <input type="text" id="validity" class="form-control" value="{{ old('shipping_address')}}" name="shipping_address">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="validity">Delivery Address</label>
                                    <input type="text" id="validity" class="form-control" value="{{ old('delivery_address')}}" name="delivery_address">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="validity">Shipping Method</label>
                                    <input type="text" id="validity" class="form-control" value="{{ old('shipping_method')}}" name="shipping_method">
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
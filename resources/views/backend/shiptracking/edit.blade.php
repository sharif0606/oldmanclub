@extends('backend.layouts.app')
@section('title',trans('Update Tracking'))
@section('page',trans('Edit'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('shiptrack.update',encryptor('encrypt',$shiptrack->id))}}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="number_of_sms">Shipping Title <i class="text-danger">*</i></label>
                                    <select name="shipping_id" id="" class="form-control">
                                        <option value="">Select shipping Title</option>
                                        @foreach($shipping as $value)
                                                <option value="{{$value->id}}" {{ old('shipping_id',$shiptrack->shipping_id)==$value->id ? "selected" : "" }}>{{$value->shipping_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="validity">Tracking status</label>
                                    <select name="tracking_status" id="" class="form-control">
                                        <option value="1" @if(old('tracking_status',$shiptrack->tracking_status==1)) selected @endif>Order</option>
                                        <option value="2" @if(old('tracking_status',$shiptrack->tracking_status==2)) selected @endif>Delivered</option>
                                        <option value="3" @if(old('tracking_status',$shiptrack->tracking_status==3)) selected @endif>Receive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="validity">Location</label>
                                    <input type="text" id="validity" class="form-control" value="{{ old('location',$shiptrack->location)}}" name="location">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="validity">Tracking Note</label>
                                    <input type="text" id="validity" class="form-control" value="{{ old('tracking_note',$shiptrack->tracking_note)}}" name="tracking_note">
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
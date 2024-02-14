@extends('backend.layouts.app')
@section('title',trans('Order'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" action="{{route('order_update',encryptor('encrypt',$order->id))}}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="name">Tracking No<i class="text-danger">*</i></label>
                                    <input type="text" id="tracking_no" class="form-control" value="{{ old('tracking_no',$order->tracking_no)}}" name="tracking_no" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="icon">User Name<i class="text-danger">*</i></label>
                                    <input type="text" id="client_id" class="form-control" value="{{ old('client_id',$order->client_id)}}" name="client_id" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="status">Order Status<i class="text-danger">*</i></label>
                                    <select id="order_status" class="form-control" name="order_status">
                                        <option value="">select status</option>
                                        <option value="1" @if(old('order_status',$order->order_status)==1) selected @endif>Processing</option>
                                        <option value="2" @if(old('order_status',$order->order_status)==2) selected @endif>Printing</option>
                                        <option value="3" @if(old('order_status',$order->order_status)==2) selected @endif>Complete</option>
                                        <option value="4" @if(old('order_status',$order->order_status)==2) selected @endif>Delivered</option>
                                        <option value="5" @if(old('order_status',$order->order_status)==2) selected @endif>Cancel</option>
                                    </select>
                                </div>
                            </div>
                           <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="icon">Additional Note<i class="text-danger">*</i></label>
                                    <input type="text" id="additional_note" class="form-control" value="{{ old('additional_note',$order->additional_note)}}" name="additional_note" >
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="icon">Order Cancel Note<i class="text-danger">*</i></label>
                                    <input type="text" id="order_cancel_note" class="form-control" value="{{ old('order_cancel_note',$order->order_cancel_note)}}" name="order_cancel_note" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
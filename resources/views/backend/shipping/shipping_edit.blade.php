@extends('backend.layouts.app')
@section('title',trans('Shipping'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('shipping_update',encryptor('encrypt',$shipping->id))}}">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="number_of_sms">User Name<i class="text-danger">*</i></label>
                                    <input type="text" id="client_id" class="form-control" value="{{ old('client_id',$shipping->user?->fname)}} {{ old('client_id',$shipping->user?->middle_name)}} {{ old('client_id',$shipping->user?->last_name)}}" name="shipping_title" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="number_of_sms">Shipping Title <i class="text-danger">*</i></label>
                                    <input type="text" id="shipping_title" class="form-control" value="{{ old('shipping_title',$shipping->shipping_title)}}" name="shipping_title" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="validity">Shipping Description </label>
                                    <input type="text" id="validity" class="form-control" value="{{ old('shipping_description',$shipping->shipping_description)}}" name="shipping_description" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="status">Status<i class="text-danger">*</i></label>
                                    <select name="status" id="" class="form-control">
                                        <option value="1" @if(old('status',$shipping->status==1)) selected @endif>Pending</option>
                                        <option value="2" @if(old('status',$shipping->status==2)) selected @endif>Approved</option>
                                        <option value="3" @if(old('status',$shipping->status==3)) selected @endif>Reject</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="price">Note<i class="text-danger">*</i></label>
                                    <textarea name="reject_note"  class="form-control"  id="" required></textarea>
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
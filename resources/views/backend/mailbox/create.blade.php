@extends('backend.layouts.app')
@section('title',trans('Add Mail Package'))
@section('page',trans('Create'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('mailbox.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="number_of_sms">Number Of Mail <i class="text-danger">*</i></label>
                                    <input type="text" id="number_of_mail" class="form-control" value="{{ old('number_of_mail')}}" name="number_of_mail">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="validity">Validity</label>
                                    <input type="text" id="validity" class="form-control" value="{{ old('validity')}}" name="validity">
                                    
                                </div>
                            </div>
                        
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="price">Price <i class="text-danger">*</i></label>
                                    <input type="text" id="price" class="form-control" value="{{ old('price')}}" name="price">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="price">Package Type <i class="text-danger">*</i></label>
                                    <select name="package_type" id="" class="form-control">
                                        <option value="1">One Time</option>
                                        <option value="2">Monthly</option>
                                    </select>
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

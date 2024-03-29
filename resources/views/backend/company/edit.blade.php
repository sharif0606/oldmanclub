@extends('backend.layouts.app')
@section('title',trans('Company'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('company_update',encryptor('encrypt',$company->id))}}">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <!-- <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="title">Company Name <i class="text-danger">*</i></label>
                                    <input type="text" id="company_name" class="form-control" value="{{ old('company_name',$company->company_name)}}" name="company_name">
                                    @if($errors->has('company_name'))
                                        <span class="text-danger"> {{ $errors->first('company_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="">Company Logo <i class="text-danger">*</i></label>
                                    <input type="file" id="company_logo" class="form-control" value="{{ old('company_logo',$company->company_logo)}}" name="company_logo">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="validity">Contact no</label>
                                    <input type="text" id="contact_no" class="form-control" value="{{ old('contact_no',$company->contact_no)}}" name="contact_no">
                                </div>
                            </div>
                        
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email <i class="text-danger">*</i></label>
                                    <input type="text" id="email" class="form-control" value="{{ old('email',$company->email)}}" name="email">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="phone_number">Phone Number <i class="text-danger">*</i></label>
                                    <input type="text" id="phone_number" class="form-control" value="{{ old('phone_number',$company->phone_number)}}" name="phone_number">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="address">Address<i class="text-danger">*</i></label>
                                    <input type="text" id="address" class="form-control" value="{{ old('address',$company->address)}}" name="address">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="city">City<i class="text-danger">*</i></label>
                                    <input type="text" id="city" class="form-control" value="{{ old('city',$company->city)}}" name="city">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="state">State<i class="text-danger">*</i></label>
                                    <input type="text" id="state" class="form-control" value="{{ old('state',$company->state)}}" name="state">
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="zip_code">Zip Code<i class="text-danger">*</i></label>
                                    <input type="text" id="zip_code" class="form-control" value="{{ old('zip_code',$company->zip_code)}}" name="zip_code">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="description">Description<i class="text-danger">*</i></label>
                                    <input type="text" id="description" class="form-control" value="{{ old('description',$company->description)}}" name="description">
                                </div>
                            </div> -->
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="status">Status<i class="text-danger">*</i></label>
                                    <select name="status" id="" class="form-control">
                                        <option value="1" @if(old('status',$company->status)==1)selected @endif > Pending</option>
                                 
                                        <option value="2" @if(old('status',$company->status)==2)selected @endif > Accepted</option>
                                
                                        <option value="3" @if(old('status',$company->status)==3)selected @endif > Rejected</option>
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
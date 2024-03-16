@extends('user.layout.base')
@section('title', 'Bank')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card p-5">
            <div class="card-content">
                <h4 class="text-center">Add New Bank</h4>
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('bank.update',encryptor('encrypt',$bank->id))}}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="title">Bank Name <i class="text-danger">*</i></label>
                                    <input type="text" id="bank_name" class="form-control" value="{{ old('bank_name',$bank->bank_name)}}" name="bank_name">
                                    @if($errors->has('bank_name'))
                                        <span class="text-danger"> {{ $errors->first('bank_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="title">Branch Name <i class="text-danger">*</i></label>
                                    <input type="text" id="branch_name" class="form-control" value="{{ old('branch_name',$bank->branch_name)}}" name="branch_name">
                                    @if($errors->has('branch_name'))
                                        <span class="text-danger"> {{ $errors->first('branch_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="title">RTN Number<i class="text-danger">*</i></label>
                                    <input type="text" id="rtn_number" class="form-control" value="{{ old('rtn_number',$bank->rtn_number)}}" name="rtn_number">
                                    @if($errors->has('rtn_number'))
                                        <span class="text-danger"> {{ $errors->first('rtn_number') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="title">Swift Code<i class="text-danger">*</i></label>
                                    <input type="text" id="swift_code" class="form-control" value="{{ old('swift_code',$bank->swift_code)}}" name="swift_code">
                                    @if($errors->has('swift_code'))
                                        <span class="text-danger"> {{ $errors->first('swift_code') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="validity">Contact no</label>
                                    <input type="text" id="contact_no" class="form-control" value="{{ old('contact_no',$bank->contact_no)}}" name="contact_no">
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email <i class="text-danger">*</i></label>
                                    <input type="text" id="email" class="form-control" value="{{ old('email',$bank->contact_no)}}" name="email">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="city">City<i class="text-danger">*</i></label>
                                    <input type="text" id="city" class="form-control" value="{{ old('city',$bank->city)}}" name="city">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="state">State<i class="text-danger">*</i></label>
                                    <input type="text" id="state" class="form-control" value="{{ old('state',$bank->state)}}" name="state">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="zip_code">Zip Code<i class="text-danger">*</i></label>
                                    <input type="text" id="zip_code" class="form-control" value="{{ old('zip_code',$bank->zip_code)}}" name="zip_code">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="">Bank Logo <i class="text-danger">*</i></label>
                                    <input type="file" id="bank_logo" class="form-control" value="{{ old('bank_logo')}}" name="bank_logo">

                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="address">Address<i class="text-danger">*</i></label>
                                    <textarea name="address" id="address" cols="30" rows="5" class="form-control">{{$bank->address}}</textarea>
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

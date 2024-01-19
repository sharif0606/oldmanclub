@extends('backend.layouts.app')
@section('title',trans('user'))
@section('page',trans('Update'))

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('client.update',encryptor('encrypt',$client->id))}}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$client->id)}}">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first_name_en">First Name(English) <i class="text-danger">*</i></label>
                                    <input type="text" id="first_name_en" class="form-control" value="{{ old('first_name_en',$client->first_name_en)}}" name="first_name_en">
                                    @if($errors->has('first_name_en'))
                                        <span class="text-danger"> {{ $errors->first('first_name_en') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="first_name_bn">First Name(Bangla) <i class="text-danger">*</i></label>
                                    <input type="text" id="first_name_bn" class="form-control" value="{{ old('first_name_bn',$client->first_name_bn)}}" name="first_name_bn">
                                    @if($errors->has('first_name_bn'))
                                        <span class="text-danger"> {{ $errors->first('first_name_bn') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="middle_name_en">Middle Name(English) <i class="text-danger">*</i></label>
                                    <input type="text" id="middle_name_en" class="form-control" value="{{ old('middle_name_en',$client->middle_name_en)}}" name="middle_name_en">
                                    @if($errors->has('middle_name_en'))
                                        <span class="text-danger"> {{ $errors->first('middle_name_en') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="middle_name_bn">Middle Name(Bangla) <i class="text-danger">*</i></label>
                                    <input type="text" id="middle_name_bn" class="form-control" value="{{ old('middle_name_bn',$client->middle_name_bn)}}" name="middle_name_bn">
                                    @if($errors->has('middle_name_bn'))
                                        <span class="text-danger"> {{ $errors->first('middle_name_bn') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last_name_en">Last Name(English) <i class="text-danger">*</i></label>
                                    <input type="text" id="last_name_en" class="form-control" value="{{ old('last_name_en',$client->last_name_en)}}" name="last_name_en">
                                    @if($errors->has('last_name_en'))
                                        <span class="text-danger"> {{ $errors->first('last_name_en') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="last_name_bn">Last Name(Bangla) <i class="text-danger">*</i></label>
                                    <input type="text" id="last_name_bn" class="form-control" value="{{ old('last_name_bn',$client->last_name_bn)}}" name="last_name_bn">
                                    @if($errors->has('last_name_bn'))
                                        <span class="text-danger"> {{ $errors->first('last_name_bn') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="Dob">Date Of Birth <i class="text-danger">*</i></label>
                                    <input type="text" id="Dob" class="form-control" value="{{ old('date_of_birth',$client->date_of_birth)}}" name="date_of_birth">
                                    @if($errors->has('date_of_birth'))
                                        <span class="text-danger"> {{ $errors->first('date_of_birth') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email <i class="text-danger">*</i></label>
                                    <input type="text" id="email" class="form-control" value="{{ old('email',$client->email)}}" name="email">
                                    @if($errors->has('email'))
                                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="contact_en">Contact Number (English) <i class="text-danger">*</i></label>
                                    <input type="text" id="contact_en" class="form-control" value="{{ old('contact_en',$client->contact_en)}}" name="contact_en">
                                    @if($errors->has('contact_en'))
                                        <span class="text-danger"> {{ $errors->first('contact_en') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="contact_bn">Contact Number (Bangla) <i class="text-danger">*</i></label>
                                    <input type="text" id="contact_bn" class="form-control" value="{{ old('contact_en',$client->contact_bn)}}" name="contact_bn">
                                    @if($errors->has('contact_bn'))
                                        <span class="text-danger"> {{ $errors->first('contact_bn') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="address_line_1">Address 1<i class="text-danger">*</i></label>
                                    <input type="text" id="address_line_1" class="form-control" value="{{ old('address_line_1',$client->address_line_1)}}" name="address_line_1">
                                    @if($errors->has('address_line_1'))
                                        <span class="text-danger"> {{ $errors->first('address_line_1') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="address_line_2">Address 2<i class="text-danger">*</i></label>
                                    <input type="text" id="address_line_2" class="form-control" value="{{ old('address_line_2',$client->address_line_2)}}" name="address_line_2">
                                    @if($errors->has('address_line_2'))
                                        <span class="text-danger"> {{ $errors->first('address_line_2') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="country">Country<i class="text-danger">*</i></label>
                                    <input type="text" id="country" class="form-control" value="{{ old('country',$client->country)}}" name="country">
                                    @if($errors->has('country'))
                                        <span class="text-danger"> {{ $errors->first('country') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="city">city<i class="text-danger">*</i></label>
                                    <input type="text" id="city" class="form-control" value="{{ old('city',$client->city)}}" name="city">
                                    @if($errors->has('city'))
                                        <span class="text-danger"> {{ $errors->first('city') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="state">state<i class="text-danger">*</i></label>
                                    <input type="text" id="state" class="form-control" value="{{ old('state',$client->state)}}" name="state">
                                    @if($errors->has('state'))
                                        <span class="text-danger"> {{ $errors->first('state') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="zip_code">zip_code<i class="text-danger">*</i></label>
                                    <input type="text" id="zip_code" class="form-control" value="{{ old('zip_code',$client->zip_code)}}" name="zip_code">
                                    @if($errors->has('zip_code'))
                                        <span class="text-danger"> {{ $errors->first('zip_code') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="nationality">nationality<i class="text-danger">*</i></label>
                                    <input type="text" id="nationality" class="form-control" value="{{ old('nationality',$client->nationality)}}" name="nationality">
                                    @if($errors->has('nationality'))
                                        <span class="text-danger"> {{ $errors->first('nationality') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="id_no">id_no<i class="text-danger">*</i></label>
                                    <input type="text" id="id_no" class="form-control" value="{{ old('id_no',$client->id_no)}}" name="id_no">
                                    @if($errors->has('id_no'))
                                        <span class="text-danger"> {{ $errors->first('id_no') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="id_no_type">id_no_type<i class="text-danger">*</i></label>
                                    <select name="id_no_type" id="" value="{{$client->id_no_type}}" class="form-control">
                                        <option value="0" @if(old('id_no_type',$client->id_no_type)==0) selected @endif>Passport</option>
                                        <option value="1" @if(old('id_no_type',$client->id_no_type)==1) selected @endif>National ID</option>
                                        <option value="2" @if(old('id_no_type',$client->id_no_type)==2) selected @endif>Driver License</option>
                                        <option value="3" @if(old('id_no_type',$client->id_no_type)==3) selected @endif>Birth Certificate</option>
                                    </select>
                                    @if($errors->has('id_no_type'))
                                        <span class="text-danger"> {{ $errors->first('id_no_type') }}</span>
                                    @endif
                                </div>
                            </div>
                           
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control" name="status">
                                        <option value="1" @if(old('status',$client->status)==1) selected @endif>Active</option>
                                        <option value="0" @if(old('status',$client->status)==0) selected @endif>Inactive</option>
                                    </select>
                                    @if($errors->has('status'))
                                        <span class="text-danger"> {{ $errors->first('status') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="password">Password <i class="text-danger">*</i></label>
                                    <input type="password" id="password" class="form-control" name="password">
                                        @if($errors->has('password'))
                                            <span class="text-danger"> {{ $errors->first('password') }}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" class="form-control" placeholder="Image" name="image">
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

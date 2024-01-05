@extends('backend.layouts.app')
@section('title','Setting')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Setting</h4>
        </div>
        <div class="card-body">
            <form action="{{route('setting.store')}}" method="post" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                @csrf
                <div>
                    <h4></h4>
                    <section>
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Header Logo <span class="text-danger"> *</span></label>
                                    <input type="file" name="header_logo" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Company Name*</label>
                                    <input type="text" name="company_name" value="{{ old('company_name')}}" class="form-control" placeholder="Input company name" required>
                                    @if($errors->has('company_name'))
                                        <span class="text-danger"> {{ $errors->first('company_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Contact Number*</label>
                                    <input type="text" name="contact_no_en" value="{{ old('contact_no_en')}}" class="form-control" placeholder="(+1)408-657-9007" required>
                                    @if($errors->has('contact_no_en'))
                                        <span class="text-danger"> {{ $errors->first('contact_no_en') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Email Address*</label>
                                    <input type="email" name="email" value="{{ old('email')}}" class="form-control" placeholder="example@example.com" required>
                                    @if($errors->has('email'))
                                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Facebook Icon<span class="text-danger"> *</span></label>
                                    <input type="text" name="facebook_icon"  value="{{ old('facebook_icon')}}" class="form-control" >
                                    @if($errors->has('facebook_icon'))
                                        <span class="text-danger"> {{ $errors->first('facebook_icon') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Twitter Icon<span class="text-danger"> *</span></label>
                                    <input type="text" name="twitter_icon" value="{{ old('twitter_icon')}}" class="form-control">
                                    @if($errors->has('twitter_icon'))
                                        <span class="text-danger"> {{ $errors->first('twitter_icon') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">LinkedLn Icon<span class="text-danger"> *</span></label>
                                    <input type="text" name="linkedln_icon" value="{{ old('linkedln_icon')}}" class="form-control">
                                    @if($errors->has('linkedln_icon'))
                                        <span class="text-danger"> {{ $errors->first('linkedln_icon') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Instagram Icon<span class="text-danger"> *</span></label>
                                    <input type="text" name="instagram_icon" value="{{ old('instagram_icon')}}" class="form-control">
                                    @if($errors->has('instagram_icon'))
                                        <span class="text-danger"> {{ $errors->first('instagram_icon') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Footer Text*</label>
                                   
                                    <input type="text" name="footer_text" value="{{ old('footer_text')}}" class="form-control" placeholder="footer text">
                                    @if($errors->has('footer_text'))
                                    <span class="text-danger"> {{ $errors->first('footer_text') }}</span>
                                    @endif
                                 
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Footer Logo <span class="text-danger"> *</span></label>
                                    <input type="file" name="footer_logo" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
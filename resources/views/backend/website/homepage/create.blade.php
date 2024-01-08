@extends('backend.layouts.app')
@section('title','Add New Homepage')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Setting</h4>
        </div>
        <div class="card-body">
            <form action="{{route('homepage.store')}}" method="post" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                @csrf
                <div>
                    <h4></h4>
                    <section>
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Service Section Text*</label>
                                    <input type="text" name="service_section_text" value="{{ old('service_section_text')}}" class="form-control">
                                    @if($errors->has('service_section_text'))
                                        <span class="text-danger"> {{ $errors->first('service_section_text') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Special Offer Text*</label>
                                    <input type="text" name="special_offer_text" value="{{ old('special_offer_text')}}" class="form-control">
                                    @if($errors->has('special_offer_text'))
                                        <span class="text-danger"> {{ $errors->first('special_offer_text') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Special Offer Link*</label>
                                    <input type="text" name="special_offer_link" value="{{ old('special_offer_link')}}" class="form-control">
                                    @if($errors->has('special_offer_link'))
                                        <span class="text-danger"> {{ $errors->first('special_offer_link') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Global Network Text*</label>
                                    <input type="text" name="global_network_text" value="{{ old('global_network_text')}}" class="form-control">
                                    @if($errors->has('global_network_text'))
                                        <span class="text-danger"> {{ $errors->first('global_network_text') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Customer Feedback*</label>
                                    <input type="text" name="customer_feedback_text" value="{{ old('customer_feedback_text')}}" class="form-control">
                                    @if($errors->has('customer_feedback_text'))
                                        <span class="text-danger"> {{ $errors->first('customer_feedback_text') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Special Offer Image<span class="text-danger"> *</span></label>
                                    <input type="file" name="special_offer_image" class="form-control" >
                                    @if($errors->has('special_offer_image'))
                                        <span class="text-danger"> {{ $errors->first('special_offer_image') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Global Network Image<span class="text-danger"> *</span></label>
                                    <input type="file" name="global_network_image" class="form-control" >
                                    @if($errors->has('global_network_image'))
                                        <span class="text-danger"> {{ $errors->first('global_network_image') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
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
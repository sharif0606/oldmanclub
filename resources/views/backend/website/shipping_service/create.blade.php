@extends('backend.layouts.app')
@section('title','Add New Service')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
           
        </div>
        <div class="card-body">
            <form action="{{route('shippingservice.store')}}" method="post" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                @csrf
                <div>
                    <h4></h4>
                    <section>
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Service Title <small class="text-danger">*</small></label>
                                    <input type="text" name="service_title" value="{{ old('service_title')}}" class="form-control">
                                    @if($errors->has('service_title'))
                                        <span class="text-danger"> {{ $errors->first('service_title') }}</span>
                                    @endif
                                </div>
                            </div>  
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Description <small class="text-danger">*</small></label>
                                    <input type="text" name="service_description" value="{{ old('service_description')}}" class="form-control">
                                    @if($errors->has('service_description'))
                                        <span class="text-danger"> {{ $errors->first('service_description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Service Image<span class="text-danger"> *</span></label>
                                    <input type="file" name="service_image" class="form-control" >
                                    @if($errors->has('service_image'))
                                        <span class="text-danger"> {{ $errors->first('service_image') }}</span>
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
@extends('backend.layouts.app')
@section('title','Add New NFC Card')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Setting</h4>
        </div>
        <div class="card-body">
            <form action="{{route('nfccard.store')}}" method="post" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                @csrf
                <div>
                    <h4></h4>
                    <section>
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Header Text Large <small class="text-danger">*</small></label>
                                    <input type="text" name="header_text_large" value="{{ old('header_text_large')}}" class="form-control">
                                    @if($errors->has('header_text_large'))
                                        <span class="text-danger"> {{ $errors->first('header_text_large') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Header Text Small<small class="text-danger">*</small></label>
                                    <input type="text" name="header_text_small" value="{{ old('header_text_small')}}" class="form-control">
                                    @if($errors->has('header_text_small'))
                                        <span class="text-danger"> {{ $errors->first('header_text_small') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Video Link <small class="text-danger">*</small></label>
                                    <input type="text" name="video_link" value="{{ old('video_link')}}" class="form-control">
                                    @if($errors->has('video_link'))
                                        <span class="text-danger"> {{ $errors->first('video_link') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Feature List <small class="text-danger">*</small></label>
                                    <input type="text" name="feature_list" value="{{ old('feature_list')}}" class="form-control">
                                    @if($errors->has('feature_list'))
                                        <span class="text-danger"> {{ $errors->first('feature_list') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Header Image<span class="text-danger"> *</span></label>
                                    <input type="file" name="header_image" class="form-control" >
                                    @if($errors->has('header_image'))
                                        <span class="text-danger"> {{ $errors->first('header_image') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Feature Image<span class="text-danger"> *</span></label>
                                    <input type="file" name="feature_image" class="form-control" >
                                    @if($errors->has('feature_image'))
                                        <span class="text-danger"> {{ $errors->first('feature_image') }}</span>
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
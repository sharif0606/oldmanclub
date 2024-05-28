@extends('backend.layouts.app')
@section('title','Slider')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Setting</h4>
        </div>
        <div class="card-body">
            <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                @csrf
                <div>
                    <h4></h4>
                    <section>
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Heading*</label>
                                    <input type="text" name="text_large" value="{{ old('text_large')}}" class="form-control">
                                    @if($errors->has('text_large'))
                                        <span class="text-danger"> {{ $errors->first('text_large') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Description*</label>
                                    <input type="text" name="text_small" value="{{ old('text_small')}}" class="form-control">
                                    @if($errors->has('text_small'))
                                        <span class="text-danger"> {{ $errors->first('text_small') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Website Link*</label>
                                    <input type="text" name="link" value="{{ old('link')}}" class="form-control">
                                    @if($errors->has('link'))
                                        <span class="text-danger"> {{ $errors->first('link') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Image<span class="text-danger"> *</span></label>
                                    <input type="file" name="image" class="form-control" >
                                    @if($errors->has('image'))
                                        <span class="text-danger"> {{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Order By<span class="text-danger"> *</span></label>
                                    <input type="text" name="order_by" value="{{ old('order_by')}}" class="form-control">
                                    @if($errors->has('order_by'))
                                        <span class="text-danger"> {{ $errors->first('order_by') }}</span>
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
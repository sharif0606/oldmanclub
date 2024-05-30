@extends('backend.layouts.app')
@section('title','Add New Hero')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
           
        </div>
        <div class="card-body">
            <form action="{{route('llcservice.update',encryptor('encrypt',$llcservice->id))}}" method="post" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                @csrf
                @method('PATCH')
                <div>
                    <h4></h4>
                    <section>
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ old('title',$llcservice->title)}}" class="form-control">
                                    @if($errors->has('title'))
                                        <span class="text-danger"> {{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Feature List <span class="text-danger">*</span></label>
                                    <input type="text" name="feature_list" value="{{ old('feature_list',implode(',' , $llcservice->feature_list))}}" class="form-control">
                                    @if($errors->has('feature_list'))
                                        <span class="text-danger"> {{ $errors->first('feature_list') }}</span>
                                    @endif
                                </div>
                            </div>  
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Image<span class="text-danger"> *</span></label>
                                    <input type="file" name="image" class="form-control" >
                                    @if($errors->has('background_image'))
                                        <span class="text-danger"> {{ $errors->first('background_image') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Video<span class="text-danger"> *</span></label>
                                    <input type="text" name="video_link" value="{{ old('video_link',$llcservice->video_link)}}" class="form-control" >
                                    @if($errors->has('video_link'))
                                        <span class="text-danger"> {{ $errors->first('video_link') }}</span>
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
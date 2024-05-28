@extends('backend.layouts.app')
@section('title','Update Service')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
           
        </div>
        <div class="card-body">
            <form action="{{route('phoneservice.update',encryptor('encrypt',$phoneservice->id))}}" method="post" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                @csrf
                @method('PATCH')
                <div>
                    <h4></h4>
                    <section>
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="text_heading" value="{{ old('text_heading',$phoneservice->text_heading)}}" class="form-control">
                                    @if($errors->has('text_heading'))
                                        <span class="text-danger"> {{ $errors->first('text_heading') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Description <span class="text-danger">*</span></label>
                                    <input type="text" name="text_small" value="{{ old('text_small',$phoneservice->text_small)}}" class="form-control">
                                    @if($errors->has('text_small'))
                                        <span class="text-danger"> {{ $errors->first('text_small') }}</span>
                                    @endif
                                </div>
                            </div>   
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Image<span class="text-danger"> *</span></label>
                                    <input type="file" name="background_image" class="form-control" >
                                    @if($errors->has('background_image'))
                                        <span class="text-danger"> {{ $errors->first('background_image') }}</span>
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
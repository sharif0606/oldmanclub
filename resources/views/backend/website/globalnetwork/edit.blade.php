@extends('backend.layouts.app')
@section('title','Update Global Network')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Setting</h4>
        </div>
        <div class="card-body">
            <form action="{{route('globalnetwork.update',encryptor('encrypt',$globalnet->id))}}" method="post" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                @csrf
                @method('PATCH')
                <div>
                    <h4></h4>
                    <section>
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Title*</label>
                                    <input type="text" name="title" value="{{ old('title',$globalnet->title)}}" class="form-control">
                                    @if($errors->has('title'))
                                        <span class="text-danger"> {{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Website Link*</label>
                                    <input type="text" name="link" value="{{ old('link',$globalnet->link)}}" class="form-control">
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
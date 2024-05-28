@extends('backend.layouts.app')
@section('title','Update')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <form action="{{route('nfcpricesection.update',encryptor('encrypt',$nfccardsection->id))}}" method="post" enctype="multipart/form-data" id="step-form-horizontal" class="step-form-horizontal">
                @csrf
                @method('PATCH')
                <div>
                    <h4></h4>
                    <section>
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Text Large <small class="text-danger">*</small></label>
                                    <input type="text" name="text_large" value="{{ old('text_large',$nfccardsection->text_large)}}" class="form-control">
                                    @if($errors->has('text_large'))
                                        <span class="text-danger"> {{ $errors->first('text_large') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4">
                                <div class="form-group">
                                    <label class="text-label">Text Small <small class="text-danger">*</small></label>
                                    <input type="text" name="text_small" value="{{ old('text_small',$nfccardsection->text_small)}}" class="form-control">
                                    @if($errors->has('text_small'))
                                        <span class="text-danger"> {{ $errors->first('text_small') }}</span>
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
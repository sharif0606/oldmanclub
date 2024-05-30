@extends('backend.layouts.app')

@section('title',trans('Design Card'))
@section('page',trans('Create'))

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('design_card.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="design_name">Design Name<i class="text-danger">*</i></label>
                                    <input type="text" id="design_name" class="form-control" value="{{ old('design_name')}}" name="design_name">
                                    @if($errors->has('design_name'))
                                        <span class="text-danger"> {{ $errors->first('design_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="image">Icon<i class="text-danger">*</i></label>
                                    <input type="file" id="image" class="form-control" value="{{ old('image')}}" name="image">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="template_id">Template Name<i class="text-danger">*</i></label>
                                    <select id="template_id" class="form-control" name="template_id">
                                        <option value="">select template</option>
                                        <option value="1" @if(old('template_id')==1) selected @endif>Classic</option>
                                        <option value="2" @if(old('template_id')==2) selected @endif>Modern</option>
                                        <option value="3" @if(old('template_id')==2) selected @endif>Flat</option>
                                        <option value="4" @if(old('template_id')==2) selected @endif>Sleek</option>
                                    </select>
                                    @if($errors->has('template_id'))
                                        <span class="text-danger"> {{ $errors->first('template_id') }}</span>
                                    @endif
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

@extends('backend.layouts.app')
@section('title',trans('Add SMS Package'))
@section('page',trans('Create'))

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('sms.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="title">Title  <i class="text-danger">*</i></label>
                                    <input type="text" id="title" class="form-control" value="{{ old('title')}}" name="title">
                                    @if($errors->has('title'))
                                        <span class="text-danger"> {{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="number_of_sms">Number Of SMS <i class="text-danger">*</i></label>
                                    <input type="text" id="number_of_sms" class="form-control" value="{{ old('number_of_sms')}}" name="number_of_sms">
                                    @if($errors->has('number_of_sms'))
                                        <span class="text-danger"> {{ $errors->first('number_of_sms') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="validity">Validity</label>
                                    <input type="text" id="validity" class="form-control" value="{{ old('validity')}}" name="validity">
                                    @if($errors->has('validity'))
                                        <span class="text-danger"> {{ $errors->first('validity') }}</span>
                                    @endif
                                </div>
                            </div>
                        
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="price">Price <i class="text-danger">*</i></label>
                                    <input type="text" id="price" class="form-control" value="{{ old('price')}}" name="price">
                                    @if($errors->has('price'))
                                        <span class="text-danger"> {{ $errors->first('price') }}</span>
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

@extends('backend.layouts.app')
@section('title',trans('Printing Service Image'))
@section('page',trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('print_service_image.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="service_name">Printing Service<i class="text-danger">*</i></label>
                                    <select name="printing_service_id" id="" class="form-control">
                                        <option value="">Select service</option>
                                        @foreach($print_service as $value)
                                            <option value="{{$value->id}}">{{$value->service_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="">Service Image<i class="text-danger">*</i></label>
                                    <input type="file" id="image" class="form-control" value="{{ old('image')}}" name="image">
                                    @if($errors->has('image'))
                                        <span class="text-danger"> {{ $errors->first('image') }}</span>
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
@extends('backend.layouts.app')
@section('title', trans('Printing Service Image'))
@section('page', trans('List'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{ route('print_service_image.update',encryptor('encrypt',$print_image->id))}}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="service_name">Printing Service<i class="text-danger">*</i></label>
                                <select name="printing_service_id" id="printing_service_id" class="form-control">
                                    <option value="">Select service</option>
                                    @foreach($print_service as $value)
                                        <option value="{{ $value->id }}" {{ old('printing_service_id',$print_image->printing_service_id)==$value->id ? "selected" : "" }}>{{ $value->service_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="image">Existing Image</label>
                                @if($print_image->image)
                                    <img src="{{asset('public/uploads/printimages/'.$print_image->image)}}" alt="Existing Image" class="w-25">
                                @else
                                    <p>No image available</p>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="new_image">New Service Image<i class="text-danger">*</i></label>
                                <input type="file" id="new_image" class="form-control" value="{{ old('new_image')}}" name="new_image">
                                <img id="preview_photo_id" src="#" alt="preview_photo_id" style="display: none; max-width: 100px;"> 
                                @if($errors->has('new_image'))
                                    <span class="text-danger">{{ $errors->first('new_image') }}</span>
                                @endif
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" @if($print_image->is_featured) checked @endif>
                                <label class="form-check-label" for="is_featured">Mark as Featured Image</label>
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

<script>
    document.getElementById('new_image').addEventListener('change', function(event) {
        var input = event.target;
        var preview = document.getElementById('preview_photo_id');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block'; // Show the preview image
            }

            reader.readAsDataURL(input.files[0]); // Convert to data URL
        }
    });
</script>
@endsection

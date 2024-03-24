@extends('backend.layouts.app')

@section('title',trans('Printing Service'))
@section('page',trans('Edit'))

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('print_service.update',encryptor('encrypt',$print_service->id))}}">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="service_name">Service Name<i class="text-danger">*</i></label>
                                    <input type="text" id="name" class="form-control" value="{{ old('service_name',$print_service->service_name)}}" name="service_name">
                                    @if($errors->has('service_name'))
                                        <span class="text-danger"> {{ $errors->first('service_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="service_details">Service Details<i class="text-danger">*</i></label>
                                    <textarea name="service_details" id="service_details" class="form-control">{{$print_service->service_details}}</textarea>
                                    @if($errors->has('service_details'))
                                        <span class="text-danger"> {{ $errors->first('service_details') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="qty">Quantity<i class="text-danger">*</i></label>
                                    <input type="text" id="qty" class="form-control" value="{{ old('qty',$print_service->qty)}}" name="qty">
                                    @if($errors->has('qty'))
                                        <span class="text-danger"> {{ $errors->first('qty') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="price">Price<i class="text-danger">*</i></label>
                                    <input type="text" id="price" class="form-control" value="{{ old('price',$print_service->price)}}" name="price">
                                    @if($errors->has('price'))
                                        <span class="text-danger"> {{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="image">Image<i class="text-danger">*</i></label>
                                    <input type="file" id="image" class="form-control" value="{{ old('image',$print_service->image)}}" name="image">
                                    <img id="preview_photo_id" src="#" alt="preview_photo_id" style="display: none; max-width: 100px;">
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1">
                                    <label class="form-check-label" for="is_featured">Mark as Featured Image</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                @if($print_image->isNotEmpty())
                                    @foreach($print_image as $image)
                                    <img width="100px" src="{{ asset('public/uploads/printimages/'.$image->image) }}" alt="">
                                    <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" @if($image->is_featured) checked @endif>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <!-- Place the first <script> tag in your HTML's <head> -->
    {{-- <script src="https://cdn.tiny.cloud/1/x4jk2jz64zffwc1fuef936e2b3z54jdbl9q6pb9rplm00ea2/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <script src="{{ asset('public/assets/tinymc.js') }}"></script>
    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
        <script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    });
    </script>

    <script>
        document.getElementById('image').addEventListener('change', function(event) {
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
@endpush

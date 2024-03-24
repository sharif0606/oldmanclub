@extends('backend.layouts.app')
@section('title',trans('Printing Service'))
@section('page',trans('Create'))
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post" enctype="multipart/form-data" action="{{route('print_service.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="service_name">Service Name<i class="text-danger">*</i></label>
                                    <input type="text" id="name" class="form-control" value="{{ old('service_name')}}" name="service_name">
                                    @if($errors->has('service_name'))
                                        <span class="text-danger"> {{ $errors->first('service_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="service_details">Service Details<i class="text-danger">*</i></label>
                                    <textarea name="service_details" cols="30" rows="8" id="service_details" id="service_details" class="form-control"></textarea>
                                    <!-- <input type="text" id="service_details" class="form-control" value="{{ old('service_details')}}" name="service_details"> -->
                                    @if($errors->has('service_details'))
                                        <span class="text-danger"> {{ $errors->first('service_details') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="qty">Quantity<i class="text-danger">*</i></label>
                                    <input type="text" id="qty" class="form-control" value="{{ old('qty')}}" name="qty">
                                    @if($errors->has('qty'))
                                        <span class="text-danger"> {{ $errors->first('qty') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="price">Price<i class="text-danger">*</i></label>
                                    <input type="text" id="price" class="form-control" value="{{ old('price')}}" name="price">
                                    @if($errors->has('price'))
                                        <span class="text-danger"> {{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label for="image">Image<i class="text-danger">*</i></label>
                                    <input type="file" id="image" class="form-control" value="{{ old('price')}}" name="image">
                                </div>
                                <div id="preview_container"></div>
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
@push('scripts')
<!-- Place the first <script> tag in your HTML's <head> -->
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
            var previewContainer = document.getElementById('preview_container');

            // Clear previous previews
            previewContainer.innerHTML = '';

            if (input.files && input.files.length > 0) {
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var preview = document.createElement('img');
                        preview.src = e.target.result;
                        preview.style.maxWidth = '80px';
                        preview.style.marginRight = '5px'; // Add some space between images
                        previewContainer.appendChild(preview); // Append each preview image
                    }

                    reader.readAsDataURL(input.files[i]); // Convert to data URL
                }
            }
       });
</script>
@endpush

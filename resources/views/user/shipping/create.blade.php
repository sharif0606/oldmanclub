@extends('user.layout.base')
@section('title', 'create')
@section('content')

    <div class="card col-sm-10 shadow-lg mx-auto">
        <div class="card-body">
            <form action="{{ route('shipping.store') }}" method="post" class="row">
                @csrf
                <div class="col-12">
                    <input type="text" class="form-control mb-3" id="" name="shipping_title"
                        placeholder="Product Title">
                </div>
                <div class="col-12">
                    <textarea name="shipping_description" class="form-control mb-3" placeholder="Order Details" rows="5"></textarea>
                </div>
                <div class="col-12">
                    <textarea name="delivery_address" class="form-control mb-3" placeholder="Delivery Address" rows="5"></textarea>
                </div>
                <div class="col-12">
                    <input type="text" class="form-control mb-3" id="" name="price" placeholder="Price">
                </div>
                <div class="col-12">
                    <label>Select Shipping Method</label>
                    <select name="shipping_method" class="form-control mb-3">
                        <option value="">Select</option>
                        <option value="1">Option1</option>
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Order Product With Shipping</button>
                </div>
            </form>
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
@endpush

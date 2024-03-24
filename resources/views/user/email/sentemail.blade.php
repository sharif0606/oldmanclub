@extends('user.layout.base')
@section('title', 'Sent Email')
@section('content')
<main>
  <!-- Container START -->
  <div class="container">
    <div class="row g-4">
      <!-- Main content START -->
      <div class="col-lg-12">
        <div class="bg-mode p-4">
            <div class="compose-content">
                <form action="{{ route('store_email') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="form-group mb-2">
                        <input type="text" name="to_email" class="form-control bg-transparent" placeholder=" To:">
                    </div>
                    <div class="form-group mb-2">
                        <input type="text" name="subject" class="form-control bg-transparent" placeholder=" Subject:">
                    </div>
                    <div class="form-group mb-2">
                       <textarea name="message" cols="30" rows="8" id="service_details" id="service_details" class="form-control"></textarea>
                        {{-- <textarea id="email-compose-editor" name="message" class="textarea_editor form-control bg-transparent" rows="15"
                            placeholder="Enter text ..."></textarea> --}}
                    </div>
                    <hr>
                    <h5 class="mb-4"><i class="fa fa-paperclip"></i> Attatchment</h5>
                    <div class="fallback w-100 mb-3">
                        <input type="file" name="image_file" class="dropify" data-default-file="" />
                    </div>
                    <button class="btn btn-primary btn-sl-sm mr-3" type="submit"><span class="mr-2"><i class="fa fa-paper-plane"></i></span> Send</button>
                    <button class="btn btn-dark btn-sl-sm" type="button"><span class="mr-2"><i class="fa fa-times" aria-hidden="true"></i></span> Discard</button>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container END -->

</main>
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

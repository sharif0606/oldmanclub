@extends('user.layout.base')
@section('title', 'Sent Email')
@section('content')
<main>
  <div class="container">
    <div class="row g-4">
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
<script src="{{ asset('public/assets/tinymc.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/x4jk2jz64zffwc1fuef936e2b3z54jdbl9q6pb9rplm00ea2/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker markdown',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
</script>
@endpush

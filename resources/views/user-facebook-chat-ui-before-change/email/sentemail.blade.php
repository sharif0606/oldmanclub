@extends('user.layout.base')
@section('title', 'Sent Email')
@push('styles')
  <style>
    textarea {
            width: 100%;
            min-height: 300px; /* Adjust as needed */
            border: 1px solid #ccc;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }
  </style>
@endpush
@section('content')
<div class="row g-4">
    <div class="col-lg-3">
        <div class="d-flex align-items-center d-lg-none">
            <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
                <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
                <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
            </button>
        </div>
        @include('user.includes.profile-navbar')
    </div>
    <div class="col-md-8 col-lg-6 vstack gap-4">
        <div class="card">
            <div class="card-header d-sm-flex text-center align-items-center justify-content-between border-0 pb-0">
                <h4 class="card-title h4">New message</h4>
                {{-- <a class="btn btn-primary-soft" href=""> <i class="fas fa-list pe-1"></i>All Shipping</a> --}}
            </div>
            <div class="card-body">
                <div class="mb-0 pb-0">
                    <div class="row g-3">
                          <div class="card col-sm-12 shadow-lg">
                                <div class="card-body">
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
                                        {{-- <button class="btn btn-dark btn-sl-sm" type="button"><span class="mr-2"><i class="fa fa-times" aria-hidden="true"></i></span> Discard</button> --}}
                                    </form>
                                </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <main>
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

                       <textarea name="message" class="form-control content"></textarea>
                        {{-- <textarea id="email-compose-editor" name="message" class="textarea_editor form-control bg-transparent" rows="15"
                            placeholder="Enter text ..."></textarea> 
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
</main> --}}
@endsection
@push('scripts')

    {{-- CKEditor CDN --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>


    <script>
        // Select all textarea elements with the specified class name
        const textareas = document.querySelectorAll('.content');

        // Loop through each textarea element
        textareas.forEach(textarea => {
            // Apply ClassicEditor.create to each textarea
            ClassicEditor.create(textarea)
                .catch(error => {
                    console.error(error);
                });
        });
    </script>

@endpush

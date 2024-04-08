@extends('frontend.layouts.app')
@section('title', 'Contact Form')
@section('content')
{{-- <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <img src="{{ asset('public/frontend/assets/image/map-image.png') }}" alt="Image Map" class="">
        </div>
    </div>
</div> --}}
<div class="contact-section">
        <div class="contact-images col-md-3">
            <img src="{{ asset('public/frontend/assets/image/Ellipse 1221.png')}}" alt="Image 1">
        </div>

        <div class="contact-form-col col-12 col-md-6">
            <div class="col-12 text-center">
                <h2>Let's connect and navigate with us</h2>
                <p>Our team is waiting to hear from you.</p>
            </div>
         

            <form action="{{ route('contact_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                <div class="form-group">
                    {{-- <label for="name">Name</label> --}}
                    <input type="text" id="name" name="name" placeholder="Your Name">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    {{-- <label for="phone">Contact Number</label> --}}
                    <input type="tel" id="phone" name="contact_no" placeholder="Your Phone Number" >
                </div>
                @error('contact_no')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    {{-- <label for="email">Email</label> --}}
                    <input type="email" id="email" name="email" placeholder="Your Email" >
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    {{-- <label for="message">Message</label> --}}
                    <textarea id="message" name="message" rows="4" placeholder="Your Message" ></textarea>
                </div>
                @error('message')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                 <div class="form-group">
                    {{-- <label for="file">Attach File</label> --}}
                    <input type="file" id="file" name="file">
                </div>
                @error('file')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="contact-images col-md-3">
            <img src="{{ asset('public/frontend/assets/image/Ellipse 1222.png')}}" alt="Image 2">
        </div>
    </div>
    {{-- <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-uppercase text-center">Let's connect and navigate with us</h4>
                        <p class="text-center">Our team are waiting to hear from you</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('contact_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="text" name="email" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Contact Number</label>
                                <input type="text" name="contact_no" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="Message"></label>
                                <textarea name="message" id="" cols="30" rows="10" class="form-control" required></textarea>
                               
                            </div>
                            <div class="form-group">
                                <label for="file">Attach a File</label>
                                <input type="file" name="file" id="" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <!-- Place the first <script> tag in your HTML's <head> -->
{{-- <script src="https://cdn.tiny.cloud/1/x4jk2jz64zffwc1fuef936e2b3z54jdbl9q6pb9rplm00ea2/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker markdown',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
</script> --}}

@endsection


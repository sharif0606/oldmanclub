@extends('user.layout.base')
@section('title', 'create')
@section('content')
<div class="row g-4">
    <!-- Sidenav START -->
    <div class="col-lg-3">
        <!-- Advanced filter responsive toggler START -->
        <div class="d-flex align-items-center d-lg-none">
            <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
                <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
                <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
            </button>
        </div>
        <!-- Advanced filter responsive toggler END -->
        <!-- Navbar START-->
        @include('user.includes.profile-navbar')
        <!-- Navbar END-->
    </div>
    <!-- Sidenav END -->
    <!-- Main content START -->
    <div class="col-md-8 col-lg-6 vstack gap-4">
        <!-- Card START -->
        <div class="card">
            <!-- Card header START -->
            <div class="card-header d-sm-flex text-center align-items-center justify-content-between border-0 pb-0">
                <h4 class="card-title h4">Shipping</h4>
                <!-- Button modal -->
                <a class="btn btn-primary-soft" href="{{ route('shipping.index') }}"> <i
                        class="fas fa-list pe-1"></i>All Shipping</a>
            </div>
            <!-- Card header START -->
            <!-- Card body START -->
            <div class="card-body">
                <!-- Album Tab content START -->
                <div class="mb-0 pb-0">
                    <div class="row g-3">
                        <div class="card col-sm-12 shadow-lg">
                            <div class="card-body">
                                <form action="{{ route('shipping.store') }}" enctype="multipart/form-data" method="post" class="row">
                                    @csrf
                                    <div class="col-12">
                                        <input type="text" class="form-control mb-3" id="" name="shipping_title"
                                            placeholder="Product Title">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="shipping_description" class="form-control mb-3 content" placeholder="Order Details" rows="5"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <textarea name="delivery_address" class="form-control mb-3 content" placeholder="Delivery Address" rows="5"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control mb-3" id="" name="price" placeholder="Price">
                                    </div>
                                    <div class="col-12">
                                        <input type="file" class="form-control mb-3" id="" name="image" >
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
                    </div>
                    <!-- Photos of you tab END -->
                </div>
                <!-- Album Tab content END -->
            </div>
            <!-- Card body END -->
        </div>
        <!-- Card END -->
    </div>
</div><!-- Row END -->
{{-- <div class="card col-sm-10 shadow-lg mx-auto">
    <div class="card-body">
        <form action="{{ route('shipping.store') }}" enctype="multipart/form-data" method="post" class="row">
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
                <input type="file" class="form-control mb-3" id="" name="image" >
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
</div> --}}
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
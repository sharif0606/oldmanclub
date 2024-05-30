@extends('user.layout.base')
@section('content')
    <!-- Main content START -->
    <main>
        <!-- Container START -->
        <div class="container">
            <div class="row g-2">
                <!-- Main content START -->
                <div class="col-lg-12 vstack gap-4">
                    <!-- My profile START -->
                    @include('user.includes.connection-profile')
                    <!-- My profile END -->
                </div>
                <!-- Right sidebar START -->
                <div class="col-lg-4">
                    <div class="row g-2">
                        <!-- Card START -->
                        <div class="col-md-6 col-lg-12">
                            <div class="card">
                                <div class="card-header border-0 pb-0">
                                    {{-- <h5 class="card-title">INTRO</h5> --}}
                                    <!-- Button modal -->
                                </div>
                                <!-- Card body START -->
                                <div class="card-body position-relative pt-0">
                                    <p class="text-center">{{ $client->tagline }}</p>
                                    <hr>
                                    <!-- Date time -->
                                    <ul class="list-unstyled mt-3 mb-0">
                                        <li class="mb-2"><i class="bi bi-calendar2-plus pe-1"></i>
                                            Joined on {{ $client->created_at->format('d M,Y')}}
                                        </li>
                                        @if ($client->designation)
                                        <li class="mb-2"><i class="bi bi-briefcase-fill pe-1"></i>
                                            {{$client->designation}}
                                        </li>
                                        @endif
                                        @if ($client->current_country_id)
                                        <li class="mb-2">
                                            <i class="bi bi-geo-alt pe-1"></i>
                                            Lives In {{$client->currentcountry?->name}}@if($client->current_city_id), {{$client->currentstate?->name}} @endif
                                        </li>
                                        @endif
                                        {{-- <li class="mb-2"> <i class="bi bi-calendar-date fa-fw pe-1"></i> Born:
                                            <strong>{{ \Carbon\Carbon::parse($client->dob)->format('M-d-Y') }}</strong>
                                        </li>
                                        <li class="mb-2"> <i class="bi bi-heart fa-fw pe-1"></i> Status: <strong> Single
                                            </strong>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-envelope fa-fw pe-1"></i> Email: <strong> {{ $client->email }}
                                            </strong>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-phone fa-fw pe-1"></i> Contact: <strong>
                                                {{ $client->contact_no }}
                                            </strong>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-house fa-fw pe-1"></i> Address: <strong>
                                                {{ $client->address_line_1 }}
                                            </strong>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-card-text fa-fw pe-1"></i> ID NO: <strong> {{ $client->id_no }}
                                            </strong>
                                        </li> --}}
                                    </ul>
                                </div>
                                <!-- Card body END -->
                            </div>
                        </div>
                        <!-- Card END -->

                        <!-- Card START -->
                        {{-- <div class="col-md-6 col-lg-12">
                            <div class="card">
                                <!-- Card header START -->
                                <div class="card-header d-flex justify-content-between border-0">
                                    <h5 class="card-title">Experience</h5>
                                    <a class="btn btn-primary-soft btn-sm" href="#!"> <i class="fa-solid fa-plus"></i>
                                    </a>
                                </div>
                                <!-- Card header END -->
                                <!-- Card body START -->
                                <div class="card-body position-relative pt-0">
                                    <!-- Experience item START -->
                                    <div class="d-flex">
                                        <!-- Avatar -->
                                        <div class="avatar me-3">
                                            <a href="#!"> <img class="avatar-img rounded-circle"
                                                    src="assets/images/logo/08.svg" alt=""> </a>
                                        </div>
                                        <!-- Info -->
                                        <div>
                                            <h6 class="card-title mb-0"><a href="#!"> Apple Computer, Inc. </a></h6>
                                            <p class="small">May 2015 – Present Employment Duration 8 mos <a
                                                    class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                                        </div>
                                    </div>
                                    <!-- Experience item END -->

                                    <!-- Experience item START -->
                                    <div class="d-flex">
                                        <!-- Avatar -->
                                        <div class="avatar me-3">
                                            <a href="#!"> <img class="avatar-img rounded-circle"
                                                    src="assets/images/logo/09.svg" alt=""> </a>
                                        </div>
                                        <!-- Info -->
                                        <div>
                                            <h6 class="card-title mb-0"><a href="#!"> Microsoft Corporation </a></h6>
                                            <p class="small">May 2017 – Present Employment Duration 1 yrs 5 mos <a
                                                    class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                                        </div>
                                    </div>
                                    <!-- Experience item END -->

                                    <!-- Experience item START -->
                                    <div class="d-flex">
                                        <!-- Avatar -->
                                        <div class="avatar me-3">
                                            <a href="#!"> <img class="avatar-img rounded-circle"
                                                    src="assets/images/logo/10.svg" alt=""> </a>
                                        </div>
                                        <!-- Info -->
                                        <div>
                                            <h6 class="card-title mb-0"><a href="#!"> Tata Consultancy Services. </a>
                                            </h6>
                                            <p class="small mb-0">May 2022 – Present Employment Duration 6 yrs 10 mos <a
                                                    class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                                        </div>
                                    </div>
                                    <!-- Experience item END -->

                                </div>
                                <!-- Card body END -->
                            </div>
                        </div> --}}
                        <!-- Card END -->

                        <!-- Card START -->
                        {{-- <div class="col-md-6 col-lg-12">
                            <div class="card">
                                <!-- Card header START -->
                                <div class="card-header d-sm-flex justify-content-between border-0">
                                    <h5 class="card-title">PHOTOS</h5>
                                    <a class="btn btn-primary-soft btn-sm" href="#!"> See all photo</a>
                                </div>
                                <!-- Card header END -->
                                <!-- Card body START -->
                                <div class="card-body position-relative pt-0">
                                    <div class="row g-2">
                                        <!-- Photos item -->
                                        <div class="col-6">
                                            <a href="assets/images/albums/01.jpg" data-gallery="image-popup"
                                                data-glightbox="">
                                                <img class="rounded img-fluid" src="assets/images/albums/01.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <!-- Photos item -->
                                        <div class="col-6">
                                            <a href="assets/images/albums/02.jpg" data-gallery="image-popup"
                                                data-glightbox="">
                                                <img class="rounded img-fluid" src="assets/images/albums/02.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <!-- Photos item -->
                                        <div class="col-4">
                                            <a href="assets/images/albums/03.jpg" data-gallery="image-popup"
                                                data-glightbox="">
                                                <img class="rounded img-fluid" src="assets/images/albums/03.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <!-- Photos item -->
                                        <div class="col-4">
                                            <a href="assets/images/albums/04.jpg" data-gallery="image-popup"
                                                data-glightbox="">
                                                <img class="rounded img-fluid" src="assets/images/albums/04.jpg"
                                                    alt="">
                                            </a>
                                        </div>
                                        <!-- Photos item -->
                                        <div class="col-4">
                                            <a href="assets/images/albums/05.jpg" data-gallery="image-popup"
                                                data-glightbox="">
                                                <img class="rounded img-fluid" src="assets/images/albums/05.jpg"
                                                    alt="">
                                            </a>
                                            <!-- glightbox Albums left bar END  -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Card body END -->
                            </div>
                        </div> --}}
                        <!-- Card END --> 

                        <!-- Card START -->
                        @include('user.includes.followers')
                        <!-- Card END -->
                    </div>
                </div>
                <!-- Right sidebar END -->
                <div class="col-lg-8 vstack gap-2">
                    <!-- Share feed START -->
{{-- May use this if want to add post --}}
                    <!-- Share feed END -->

                    <!-- Card feed item START -->
                    @include('user.includes.post-list')
                    <!-- Card feed item END -->

                </div><!-- Main content END -->
            </div> <!-- Row END -->
        </div>
        <!-- Container END -->
    </main>
    <!-- Main content END -->
@endsection

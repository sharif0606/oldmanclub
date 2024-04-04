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
                    @include('user.includes.profile')
                    <!-- My profile END -->
                </div>
                <!-- Right sidebar START -->
                <div class="col-lg-4">
                    <div class="row g-2">
                        <!-- Card START -->
                        <div class="col-md-6 col-lg-12">
                            <div class="card">
                                <div class="card-header border-0 pb-0">
                                    <h5 class="card-title">INTRO</h5>
                                    <!-- Button modal -->
                                </div>
                                <!-- Card body START -->
                                <div class="card-body position-relative pt-0">
                                    <p>{{ $client->tagline }}</p>
                                    <!-- Date time -->
                                    <ul class="list-unstyled mt-3 mb-0">
                                        <li class="mb-2"> <i class="bi bi-calendar-date fa-fw pe-1"></i> Born:
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
                                        {{-- <li class="mb-2">
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
                        <div class="col-md-6 col-lg-12">
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
                        </div>
                        <!-- Card END -->

                        <!-- Card START -->
                        <div class="col-md-6 col-lg-12">
                            <div class="card">
                                <!-- Card header START -->
                                <div class="card-header d-sm-flex justify-content-between align-items-center border-0">
                                    <h5 class="card-title">FRIENDS <span
                                            class="badge bg-danger bg-opacity-10 text-danger">230</span></h5>
                                    <a class="btn btn-primary-soft btn-sm" href="#!"> See all friends</a>
                                </div>
                                <!-- Card header END -->
                                <!-- Card body START -->
                                <div class="card-body position-relative pt-0">
                                    <div class="row g-3">

                                        <div class="col-6">
                                            <!-- Friends item START -->
                                            <div class="card shadow-none text-center h-100">
                                                <!-- Card body -->
                                                <div class="card-body p-2 pb-0">
                                                    <div class="avatar avatar-story avatar-xl">
                                                        <a href="#!"><img class="avatar-img rounded-circle"
                                                                src="{{ asset('public/user/assets/images/avatar/02.jpg') }}"
                                                                alt=""></a>
                                                    </div>
                                                    <h6 class="card-title mb-1 mt-3"> <a href="#!"> Amanda Reed </a>
                                                    </h6>
                                                    <p class="mb-0 small lh-sm">16 mutual connections</p>
                                                </div>
                                                <!-- Card footer -->
                                                <div class="card-footer p-2 border-0">
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" aria-label="Send message"
                                                        data-bs-original-title="Send message"> <i
                                                            class="bi bi-chat-left-text"></i> </button>
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" aria-label="Remove friend"
                                                        data-bs-original-title="Remove friend"> <i
                                                            class="bi bi-person-x"></i> </button>
                                                </div>
                                            </div>
                                            <!-- Friends item END -->
                                        </div>

                                        <div class="col-6">
                                            <!-- Friends item START -->
                                            <div class="card shadow-none text-center h-100">
                                                <!-- Card body -->
                                                <div class="card-body p-2 pb-0">
                                                    <div class="avatar avatar-xl">
                                                        <a href="#!"><img class="avatar-img rounded-circle"
                                                                src="{{ asset('public/user/assets/images/avatar/03.jpg') }}"
                                                                alt=""></a>
                                                    </div>
                                                    <h6 class="card-title mb-1 mt-3"> <a href="#!"> Samuel Bishop
                                                        </a></h6>
                                                    <p class="mb-0 small lh-sm">22 mutual connections</p>
                                                </div>
                                                <!-- Card footer -->
                                                <div class="card-footer p-2 border-0">
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" aria-label="Send message"
                                                        data-bs-original-title="Send message"> <i
                                                            class="bi bi-chat-left-text"></i> </button>
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" aria-label="Remove friend"
                                                        data-bs-original-title="Remove friend"> <i
                                                            class="bi bi-person-x"></i> </button>
                                                </div>
                                            </div>
                                            <!-- Friends item END -->
                                        </div>

                                        <div class="col-6">
                                            <!-- Friends item START -->
                                            <div class="card shadow-none text-center h-100">
                                                <!-- Card body -->
                                                <div class="card-body p-2 pb-0">
                                                    <div class="avatar avatar-xl">
                                                        <a href="#!"><img class="avatar-img rounded-circle"
                                                                src="{{ asset('public/user/assets/images/avatar/04.jpg') }}"
                                                                alt=""></a>
                                                    </div>
                                                    <h6 class="card-title mb-1 mt-3"> <a href="#"> Bryan Knight </a>
                                                    </h6>
                                                    <p class="mb-0 small lh-sm">1 mutual connection</p>
                                                </div>
                                                <!-- Card footer -->
                                                <div class="card-footer p-2 border-0">
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" aria-label="Send message"
                                                        data-bs-original-title="Send message"> <i
                                                            class="bi bi-chat-left-text"></i> </button>
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" aria-label="Remove friend"
                                                        data-bs-original-title="Remove friend"> <i
                                                            class="bi bi-person-x"></i> </button>
                                                </div>
                                            </div>
                                            <!-- Friends item END -->
                                        </div>

                                        <div class="col-6">
                                            <!-- Friends item START -->
                                            <div class="card shadow-none text-center h-100">
                                                <!-- Card body -->
                                                <div class="card-body p-2 pb-0">
                                                    <div class="avatar avatar-xl">
                                                        <a href="#!"><img class="avatar-img rounded-circle"
                                                                src="{{ asset('public/user/assets/images/avatar/05.jpg') }}"
                                                                alt=""></a>
                                                    </div>
                                                    <h6 class="card-title mb-1 mt-3"> <a href="#!"> Amanda Reed </a>
                                                    </h6>
                                                    <p class="mb-0 small lh-sm">15 mutual connections</p>
                                                </div>
                                                <!-- Card footer -->
                                                <div class="card-footer p-2 border-0">
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" aria-label="Send message"
                                                        data-bs-original-title="Send message"> <i
                                                            class="bi bi-chat-left-text"></i> </button>
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" aria-label="Remove friend"
                                                        data-bs-original-title="Remove friend"> <i
                                                            class="bi bi-person-x"></i> </button>
                                                </div>
                                            </div>
                                            <!-- Friends item END -->
                                        </div>

                                    </div>
                                </div>
                                <!-- Card body END -->
                            </div>
                        </div>
                        <!-- Card END -->
                    </div>

                </div>
                <!-- Right sidebar END -->
                <div class="col-lg-8 vstack gap-4">
                    <!-- Share feed START -->
                    <div class="card card-body">
                        <div class="d-flex mb-3">
                            <!-- Avatar -->
                            <div class="avatar avatar-xs me-2">
                                <a href="#">
                                    @if ($client->image)
                                        <img class="avatar-img rounded-circle"
                                            src="{{ asset('public/uploads/client/' . $client->image) }}" alt="">
                                    @else
                                        <img class="avatar-img rounded-circle"
                                            src="{{ asset('public/images/download.jpg') }}" alt="">
                                    @endif
                                    {{-- <img class="avatar-img rounded-circle" src="{{asset($client->image?$client->image:default_image())}}"
                                                            alt="">  --}}
                                </a>
                            </div>
                            <!-- Post input -->
                            <form class="w-100">
                                <input class="form-control pe-4 border-0" placeholder="Share your thoughts..."
                                    data-bs-toggle="modal" data-bs-target="#feedActionPhoto">
                            </form>
                        </div>
                        <!-- Share feed toolbar START -->
                        {{-- <ul class="nav nav-pills nav-stack small fw-normal">
                            <li class="nav-item">
                                <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal"
                                    data-bs-target="#feedActionPhoto"> <i
                                        class="bi bi-image-fill text-success pe-2"></i>Photo</a>
                            </li>
                            <li class="nav-item">
                                        <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal"
                                            data-bs-target="#feedActionVideo"> <i
                                                class="bi bi-camera-reels-fill text-info pe-2"></i>Video</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link bg-light py-1 px-2 mb-0" data-bs-toggle="modal"
                                            data-bs-target="#modalCreateEvents"> <i
                                                class="bi bi-calendar2-event-fill text-danger pe-2"></i>Event </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal"
                                            data-bs-target="#modalCreateFeed"> <i
                                                class="bi bi-emoji-smile-fill text-warning pe-2"></i>Feeling /Activity</a>
                                    </li>
                                    <li class="nav-item dropdown ms-sm-auto">
                                        <a class="nav-link bg-light py-1 px-2 mb-0" href="#" id="feedActionShare"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <!-- Dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="feedActionShare">
                                            <li><a class="dropdown-item" href="#"> <i
                                                        class="bi bi-envelope fa-fw pe-2"></i>Create a poll</a></li>
                                            <li><a class="dropdown-item" href="#"> <i
                                                        class="bi bi-bookmark-check fa-fw pe-2"></i>Ask a question </a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#"> <i
                                                        class="bi bi-pencil-square fa-fw pe-2"></i>Help</a></li>
                                        </ul>
                                    </li> 
                        </ul> --}}
                        <!-- Share feed toolbar END -->
                    </div>
                    <!-- Share feed END -->

                    <!-- Card feed item START -->
                    @include('user.includes.post-list')
                    <!-- Card feed item END -->


                </div>
                <!-- Main content END -->
            </div> <!-- Row END -->
        </div>
        <!-- Container END -->
    </main>
    <!-- Main content END -->
@endsection

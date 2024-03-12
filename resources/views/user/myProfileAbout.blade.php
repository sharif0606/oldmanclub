@extends('user.layout.base')
@section('content')
    <!-- Main content START -->
    <main>

        <!-- Container START -->
        <div class="container">
            <div class="row g-4">

                <!-- Main content START -->
                <div class="col-lg-8 vstack gap-4">
                    <!-- My profile START -->
                    <div class="card">
                        <!-- Cover image -->
                        <div class="h-200px rounded-top"
                            style="background-image:url({{ asset(default_bg_image()) }}); background-position: center; background-size: cover; background-repeat: no-repeat;">
                        </div>
                        <!-- Card body START -->
                        <div class="card-body py-0">
                            <div class="d-sm-flex align-items-start text-center text-sm-start">
                                <div>
                                    <!-- Avatar -->
                                    <div class="avatar avatar-xxl mt-n5 mb-3">
                                        <img class="avatar-img rounded-circle border border-white border-3"
                                            src="{{ asset($client->image ? $client->image : default_image()) }}" alt="">
                                    </div>
                                </div>
                                <div class="ms-sm-4 mt-sm-3">
                                    <!-- Info -->
                                    <h1 class="mb-0 h5">{{ $client->middle_name }} {{ $client->last_name }}<i
                                            class="bi bi-patch-check-fill text-success small"></i>
                                    </h1>
                                    {{-- <p>250 connections</p> --}}
                                </div>
                                <!-- Button -->
                                <div class="d-flex mt-3 justify-content-center ms-sm-auto">
                                    <a class="btn btn-danger-soft me-2" href="{{route('accountSetting')}}"> <i
                                        class="bi bi-pencil-fill pe-1"></i> Edit profile </a>
                                    {{-- <div class="dropdown">
                                        <!-- Card share action menu -->
                                        <button class="icon-md btn btn-light" type="button" id="profileAction2"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <!-- Card share action dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileAction2">
                                            <li><a class="dropdown-item" href="#"> <i
                                                        class="bi bi-bookmark fa-fw pe-2"></i>Share profile in a message</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"> <i
                                                        class="bi bi-file-earmark-pdf fa-fw pe-2"></i>Save your profile to
                                                    PDF</a></li>
                                            <li><a class="dropdown-item" href="#"> <i
                                                        class="bi bi-lock fa-fw pe-2"></i>Lock profile</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#"> <i
                                                        class="bi bi-gear fa-fw pe-2"></i>Profile settings</a></li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- List profile -->
                            <ul class="list-inline mb-0 text-center text-sm-start mt-3 mt-sm-0">
                                <li class="list-inline-item"><i class="bi bi-briefcase me-1"></i> Lead Developer</li>
                                <li class="list-inline-item"><i class="bi bi-geo-alt me-1"></i> New Hampshire</li>
                                <li class="list-inline-item"><i class="bi bi-calendar2-plus me-1"></i> Joined on Nov 26,
                                    2019</li>
                            </ul>
                        </div>
                        <!-- Card body END -->
                        @include('user/includes/navigation')
                    </div>
                    <!-- My profile END -->

                    <!-- Share feed START -->
                    {{-- <div class="card card-body">
                        <div class="d-flex mb-3">
                            <!-- Avatar -->
                            <div class="avatar avatar-xs me-2">
                                <a href="#"> <img class="avatar-img rounded-circle"
                                        src="{{ asset($client->image ? $client->image : default_image()) }}" alt="">
                                </a>
                            </div>
                            <!-- Post input -->
                            <form class="w-100">
                                <input class="form-control pe-4 border-0" placeholder="Share your thoughts..."
                                    data-bs-toggle="modal" data-bs-target="#modalCreateFeed">
                            </form>
                        </div>
                        <!-- Share feed toolbar START -->
                        <ul class="nav nav-pills nav-stack small fw-normal">
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
                        </ul>
                        <!-- Share feed toolbar END -->
                    </div> --}}
                    <!-- Share feed END -->

                    <!-- Card feed item START -->
                    <div class="card">
                        <!-- Card header START -->
                        <div class="card-header border-0 pb-0">
                            <h5 class="card-title"> Profile Info</h5>
                        </div>
                        <!-- Card header END -->
                        <!-- Card body START -->
                        <div class="card-body">
                            <div class="rounded border px-3 py-2 mb-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6>Overview</h6>
                                    <div class="dropdown ms-auto">
                                        <!-- Card share action menu -->
                                        <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <!-- Card share action dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction">
                                            <li><a class="dropdown-item" href="#"> <i
                                                        class="bi bi-pencil-square fa-fw pe-2"></i>Edit</a></li>
                                            <li><a class="dropdown-item" href="#"> <i
                                                        class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <p>He moonlights difficult engrossed it, sportsmen. Interested has all Devonshire difficulty
                                    gay assistance joy. Handsome met debating sir dwelling age material. As style lived he
                                    worse dried. Offered related so visitors we private removed. Moderate do subjects to
                                    distance. </p>
                            </div>
                            <div class="row g-4">
                                <div class="col-sm-6">
                                    <!-- Birthday START -->
                                    <div class="d-flex align-items-center rounded border px-3 py-2">
                                        <!-- Date -->
                                        <p class="mb-0">
                                            <i class="bi bi-calendar-date fa-fw me-2"></i> Born: <strong> October 20, 1990
                                            </strong>
                                        </p>
                                        {{-- <div class="dropdown ms-auto">
                                            <!-- Card share action menu -->
                                            <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction2"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <!-- Card share action dropdown menu -->
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction2">
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-pencil-square fa-fw pe-2"></i>Edit</a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                    <!-- Birthday END -->
                                </div>
                                <div class="col-sm-6">
                                    <!-- Status START -->
                                    <div class="d-flex align-items-center rounded border px-3 py-2">
                                        <!-- Date -->
                                        <p class="mb-0">
                                            <i class="bi bi-heart fa-fw me-2"></i> Status: <strong> Single </strong>
                                        </p>
                                        {{-- <div class="dropdown ms-auto">
                                            <!-- Card share action menu -->
                                            <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction3"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <!-- Card share action dropdown menu -->
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction3"
                                                style="">
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-pencil-square fa-fw pe-2"></i>Edit</a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                    <!-- Status END -->
                                </div>
                                <div class="col-sm-6">
                                    <!-- Designation START -->
                                    <div class="d-flex align-items-center rounded border px-3 py-2">
                                        <!-- Date -->
                                        <p class="mb-0">
                                            <i class="bi bi-briefcase fa-fw me-2"></i> <strong> Lead Developer </strong>
                                        </p>
                                        {{-- <div class="dropdown ms-auto">
                                            <!-- Card share action menu -->
                                            <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction4"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <!-- Card share action dropdown menu -->
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction4">
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-pencil-square fa-fw pe-2"></i>Edit</a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                    <!-- Designation END -->
                                </div>
                                <div class="col-sm-6">
                                    <!-- Lives START -->
                                    <div class="d-flex align-items-center rounded border px-3 py-2">
                                        <!-- Date -->
                                        <p class="mb-0">
                                            <i class="bi bi-geo-alt fa-fw me-2"></i> Lives in: <strong> New Hampshire
                                            </strong>
                                        </p>
                                        {{-- <div class="dropdown ms-auto">
                                            <!-- Card share action menu -->
                                            <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction5"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <!-- Card share action dropdown menu -->
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction5">
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-pencil-square fa-fw pe-2"></i>Edit</a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                    <!-- Lives END -->
                                </div>
                                <div class="col-sm-6">
                                    <!-- Joined on START -->
                                    <div class="d-flex align-items-center rounded border px-3 py-2">
                                        <!-- Date -->
                                        <p class="mb-0">
                                            <i class="bi bi-geo-alt fa-fw me-2"></i> Joined on: <strong> Nov 26, 2019
                                            </strong>
                                        </p>
                                        {{-- <div class="dropdown ms-auto">
                                            <!-- Card share action menu -->
                                            <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction6"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <!-- Card share action dropdown menu -->
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction6">
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-pencil-square fa-fw pe-2"></i>Edit</a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                    <!-- Joined on END -->
                                </div>
                                <div class="col-sm-6">
                                    <!-- Joined on START -->
                                    <div class="d-flex align-items-center rounded border px-3 py-2">
                                        <!-- Date -->
                                        <p class="mb-0">
                                            <i class="bi bi-envelope fa-fw me-2"></i> Email: <strong> webestica@gmail.com
                                            </strong>
                                        </p>
                                        {{-- <div class="dropdown ms-auto">
                                            <!-- Card share action menu -->
                                            <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction7"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <!-- Card share action dropdown menu -->
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction7">
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-pencil-square fa-fw pe-2"></i>Edit</a></li>
                                                <li><a class="dropdown-item" href="#"> <i
                                                            class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                    <!-- Joined on END -->
                                </div>
                                {{-- <div class="col-sm-6 position-relative">
                                    <!-- Workplace on START -->
                                    <a class="btn btn-dashed rounded w-100" href="#!"> <i
                                            class="bi bi-plus-circle-dotted me-1"></i>Add a workplace</a>
                                    <!-- Workplace on END -->
                                </div>
                                <div class="col-sm-6 position-relative">
                                    <!-- Education on START -->
                                    <a class="btn btn-dashed rounded w-100" href="#!"> <i
                                            class="bi bi-plus-circle-dotted me-1"></i>Add a education</a>
                                    <!-- Education on END -->
                                </div> --}}
                            </div>
                        </div>
                        <!-- Card body END -->
                    </div>
                    <!-- Card feed item END -->

                    <!-- Card feed item START -->
                    <div class="card">
                        <!-- Card header START -->
                        <div class="card-header d-sm-flex justify-content-between border-0 pb-0">
                            <h5 class="card-title">Interests</h5>
                            {{-- <a class="btn btn-primary-soft btn-sm" href="#!"> See all</a> --}}
                        </div>
                        <!-- Card header END -->
                        <!-- Card body START -->
                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-sm-6 col-lg-4">
                                    <!-- Interests item START -->
                                    <div class="d-flex align-items-center position-relative">

                                    </div>
                                    <!-- Interests item END -->
                                </div>
                            </div>
                        </div>
                        <!-- Card body END -->
                    </div>
                    <!-- Card feed item END -->

                </div>
                <!-- Main content END -->

                <!-- Right sidebar START -->
                <div class="col-lg-4">

                    <div class="row g-4">

                        <!-- Card START -->
                        <div class="col-md-6 col-lg-12">
                            <div class="card">
                                <div class="card-header border-0 pb-0">
                                    <h5 class="card-title">About</h5>
                                    <!-- Button modal -->
                                </div>
                                <!-- Card body START -->
                                <div class="card-body position-relative pt-0">
                                    <p>He moonlights difficult engrossed it, sportsmen. Interested has all Devonshire
                                        difficulty gay assistance joy.</p>
                                    <!-- Date time -->
                                    <ul class="list-unstyled mt-3 mb-0">
                                        <li class="mb-2"> <i class="bi bi-calendar-date fa-fw pe-1"></i> Born: <strong>
                                                October 20, 1990 </strong> </li>
                                        <li class="mb-2"> <i class="bi bi-heart fa-fw pe-1"></i> Status: <strong> Single
                                            </strong> </li>
                                        <li> <i class="bi bi-envelope fa-fw pe-1"></i> Email: <strong> webestica@gmail.com
                                            </strong> </li>
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
                                    <a class="btn btn-primary-soft btn-sm" href="#!"> <i
                                            class="fa-solid fa-plus"></i> </a>
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
                                    <h5 class="card-title">Photos</h5>
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
                        {{-- <div class="col-md-6 col-lg-12">
                            <div class="card">
                                <!-- Card header START -->
                                <div class="card-header d-sm-flex justify-content-between align-items-center border-0">
                                    <h5 class="card-title">Friends <span
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
                                                                src="assets/images/avatar/02.jpg" alt=""></a>
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
                                                                src="assets/images/avatar/03.jpg" alt=""></a>
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
                                                                src="assets/images/avatar/04.jpg" alt=""></a>
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
                                                                src="assets/images/avatar/05.jpg" alt=""></a>
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
                        </div> --}}
                        <!-- Card END -->
                    </div>

                </div>
                <!-- Right sidebar END -->

            </div> <!-- Row END -->
        </div>
        <!-- Container END -->

    </main>
    <!-- Main content END -->

    <!-- Right sidebar START -->
    {{-- <div class="col-lg-3">
        <div class="row g-4">
            <!-- Card follow START -->
            <div class="col-sm-6 col-lg-12">
                <div class="card">
                    <!-- Card header START -->
                    <div class="card-header pb-0 border-0">
                        <h5 class="card-title mb-0">Who to follow</h5>
                    </div>
                    <!-- Card header END -->
                    <!-- Card body START -->
                    <div class="card-body">
                        <!-- Connection item START -->
                        <div class="hstack gap-2 mb-3">
                            <!-- Avatar -->
                            <div class="avatar">
                                <a href="#!"><img class="avatar-img rounded-circle"
                                        src="assets/images/avatar/04.jpg" alt=""></a>
                            </div>
                            <!-- Title -->
                            <div class="overflow-hidden">
                                <a class="h6 mb-0" href="#!">Judy Nguyen </a>
                                <p class="mb-0 small text-truncate">News anchor</p>
                            </div>
                            <!-- Button -->
                            <a class="btn btn-primary-soft rounded-circle icon-md ms-auto"
                                href="#"><i class="fa-solid fa-plus"> </i></a>
                        </div>
                        <!-- Connection item END -->
                        <!-- Connection item START -->
                        <div class="hstack gap-2 mb-3">
                            <!-- Avatar -->
                            <div class="avatar avatar-story">
                                <a href="#!"> <img class="avatar-img rounded-circle"
                                        src="assets/images/avatar/05.jpg" alt=""> </a>
                            </div>
                            <!-- Title -->
                            <div class="overflow-hidden">
                                <a class="h6 mb-0" href="#!">Amanda Reed </a>
                                <p class="mb-0 small text-truncate">Web Developer</p>
                            </div>
                            <!-- Button -->
                            <a class="btn btn-primary-soft rounded-circle icon-md ms-auto"
                                href="#"><i class="fa-solid fa-plus"> </i></a>
                        </div>
                        <!-- Connection item END -->

                        <!-- Connection item START -->
                        <div class="hstack gap-2 mb-3">
                            <!-- Avatar -->
                            <div class="avatar">
                                <a href="#"> <img class="avatar-img rounded-circle"
                                        src="assets/images/avatar/11.jpg" alt=""> </a>
                            </div>
                            <!-- Title -->
                            <div class="overflow-hidden">
                                <a class="h6 mb-0" href="#!">Billy Vasquez </a>
                                <p class="mb-0 small text-truncate">News anchor</p>
                            </div>
                            <!-- Button -->
                            <a class="btn btn-primary rounded-circle icon-md ms-auto" href="#"><i
                                    class="bi bi-person-check-fill"> </i></a>
                        </div>
                        <!-- Connection item END -->

                        <!-- Connection item START -->
                        <div class="hstack gap-2 mb-3">
                            <!-- Avatar -->
                            <div class="avatar">
                                <a href="#"> <img class="avatar-img rounded-circle"
                                        src="assets/images/avatar/01.jpg" alt=""> </a>
                            </div>
                            <!-- Title -->
                            <div class="overflow-hidden">
                                <a class="h6 mb-0" href="#!">Lori Ferguson </a>
                                <p class="mb-0 small text-truncate">Web Developer at Webestica</p>
                            </div>
                            <!-- Button -->
                            <a class="btn btn-primary-soft rounded-circle icon-md ms-auto"
                                href="#"><i class="fa-solid fa-plus"> </i></a>
                        </div>
                        <!-- Connection item END -->

                        <!-- Connection item START -->
                        <div class="hstack gap-2 mb-3">
                            <!-- Avatar -->
                            <div class="avatar">
                                <a href="#"> <img class="avatar-img rounded-circle"
                                        src="assets/images/avatar/placeholder.jpg" alt=""> </a>
                            </div>
                            <!-- Title -->
                            <div class="overflow-hidden">
                                <a class="h6 mb-0" href="#!">Carolyn Ortiz </a>
                                <p class="mb-0 small text-truncate">News anchor</p>
                            </div>
                            <!-- Button -->
                            <a class="btn btn-primary-soft rounded-circle icon-md ms-auto"
                                href="#"><i class="fa-solid fa-plus"> </i></a>
                        </div>
                        <!-- Connection item END -->

                        <!-- View more button -->
                        <div class="d-grid mt-3">
                            <a class="btn btn-sm btn-primary-soft" href="#!">View more</a>
                        </div>
                    </div>
                    <!-- Card body END -->
                </div>
            </div>
            <!-- Card follow START -->

            <!-- Card News START -->
            <div class="col-sm-6 col-lg-12">
                <div class="card">
                    <!-- Card header START -->
                    <div class="card-header pb-0 border-0">
                        <h5 class="card-title mb-0">Today’s news</h5>
                    </div>
                    <!-- Card header END -->
                    <!-- Card body START -->
                    <div class="card-body">
                        <!-- News item -->
                        <div class="mb-3">
                            <h6 class="mb-0"><a href="blog-details.html">Ten questions you should
                                    answer truthfully</a></h6>
                            <small>2hr</small>
                        </div>
                        <!-- News item -->
                        <div class="mb-3">
                            <h6 class="mb-0"><a href="blog-details.html">Five unbelievable facts about
                                    money</a></h6>
                            <small>3hr</small>
                        </div>
                        <!-- News item -->
                        <div class="mb-3">
                            <h6 class="mb-0"><a href="blog-details.html">Best Pinterest Boards for
                                    learning about business</a></h6>
                            <small>4hr</small>
                        </div>
                        <!-- News item -->
                        <div class="mb-3">
                            <h6 class="mb-0"><a href="blog-details.html">Skills that you can learn
                                    from business</a></h6>
                            <small>6hr</small>
                        </div>
                        <!-- Load more comments -->
                        <a href="#!" role="button"
                            class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center"
                            data-bs-toggle="button" aria-pressed="true">
                            <div class="spinner-dots me-2">
                                <span class="spinner-dot"></span>
                                <span class="spinner-dot"></span>
                                <span class="spinner-dot"></span>
                            </div>
                            View all latest news
                        </a>
                    </div>
                    <!-- Card body END -->
                </div>
            </div>
            <!-- Card News END -->
        </div>
    </div> --}}
    <!-- Right sidebar END -->
@endsection

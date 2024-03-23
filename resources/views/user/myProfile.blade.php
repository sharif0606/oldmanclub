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
                    @include('user.includes.profile')
                    <!-- My profile END -->

                    <!-- Share feed START -->
                    <div class="card card-body">
                        <div class="d-flex mb-3">
                            <!-- Avatar -->
                            <div class="avatar avatar-xs me-2">
                                <a href="#">
                                @if($client->image)
                                    <img class="avatar-img rounded-circle"
                                    src="{{asset('public/uploads/client/' . $client->image)}}" alt="">
                                @else
                                    <img class="avatar-img rounded-circle"
                                    src="{{asset('public/images/download.jpg')}}" alt="">
                                @endif
                                 {{-- <img class="avatar-img rounded-circle" src="{{asset($client->image?$client->image:default_image())}}"
                                        alt="">  --}}
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
                            {{-- <li class="nav-item">
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
                            </li> --}}
                        </ul>
                        <!-- Share feed toolbar END -->
                    </div>
                    <!-- Share feed END -->

                    <!-- Card feed item START -->
                    @include('user.includes.post-list')
                    <!-- Card feed item END -->

                    <!-- Card feed item START -->
                    {{-- <div class="card">

                        <div class="border-bottom">
                            <p class="small mb-0 px-4 py-2"><i class="bi bi-heart-fill text-danger pe-1"></i>Sam Lanson
                                likes this post</p>
                        </div>
                        <!-- Card header START -->
                        <div class="card-header border-0 pb-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <div class="avatar me-2">
                                        <a href="#"> <img class="avatar-img rounded-circle"
                                                src="assets/images/logo/13.svg" alt=""> </a>
                                    </div>
                                    <!-- Title -->
                                    <div>
                                        <h6 class="card-title mb-0"> <a href="#!"> Apple Education </a></h6>
                                        <p class="mb-0 small">9 November at 23:29</p>
                                    </div>
                                </div>
                                <!-- Card share action menu -->
                                <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
                                    id="cardShareAction5" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </a>
                                <!-- Card share action dropdown menu -->
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction5">
                                    <li><a class="dropdown-item" href="#"> <i
                                                class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                                    <li><a class="dropdown-item" href="#"> <i
                                                class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
                                    <li><a class="dropdown-item" href="#"> <i
                                                class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
                                    <li><a class="dropdown-item" href="#"> <i
                                                class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#"> <i
                                                class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
                                </ul>
                            </div>
                            <!-- Card share action END -->
                        </div>
                        <!-- Card header START -->

                        <!-- Card body START -->
                        <div class="card-body pb-0">
                            <p>Find out how you can save time in the classroom this year. Earn recognition while you learn
                                new skills on iPad and Mac. Start recognition your first Apple Teacher badge today!</p>
                            <!-- Feed react START -->
                            <ul class="nav nav-stack pb-2 small">
                                <li class="nav-item">
                                    <a class="nav-link active text-secondary" href="#!"> <i
                                            class="bi bi-heart-fill me-1 icon-xs bg-danger text-white rounded-circle"></i>
                                        Louis, Billy and 126 others </a>
                                </li>
                                <li class="nav-item ms-sm-auto">
                                    <a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments
                                        (12)</a>
                                </li>
                            </ul>
                            <!-- Feed react END -->
                        </div>
                        <!-- Card body END -->
                        <!-- Card Footer START -->
                        <div class="card-footer py-3">
                            <!-- Feed react START -->
                            <ul class="nav nav-fill nav-stack small">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 active" href="#!"> <i class="bi bi-heart pe-1"></i>Liked
                                        (56)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments
                                        (12)</a>
                                </li>
                                <!-- Card share action dropdown START -->
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link mb-0" id="cardShareAction6"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                                    </a>
                                    <!-- Card share action dropdown menu -->
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction6">
                                        <li><a class="dropdown-item" href="#"> <i
                                                    class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
                                        <li><a class="dropdown-item" href="#"> <i
                                                    class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                                        <li><a class="dropdown-item" href="#"> <i
                                                    class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
                                        <li><a class="dropdown-item" href="#"> <i
                                                    class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#"> <i
                                                    class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
                                    </ul>
                                </li>
                                <!-- Card share action dropdown END -->
                                <li class="nav-item">
                                    <a class="nav-link mb-0" href="#!"> <i class="bi bi-send-fill pe-1"></i>Send</a>
                                </li>
                            </ul>
                            <!-- Feed react END -->
                        </div>
                        <!-- Card Footer END -->
                    </div> --}}
                    <!-- Card feed item END -->
                </div>
                <!-- Main content END -->

                <!-- Right sidebar START -->
                {{-- <div class="col-lg-4">

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
                                        <li class="mb-2"> <i class="bi bi-calendar-date fa-fw pe-1"></i> Born: <strong>{{ \Carbon\Carbon::parse($client->dob)->format('M-d-Y') }}</strong>
                                        </li>
                                        <li class="mb-2"> <i class="bi bi-heart fa-fw pe-1"></i> Status: <strong> Single
                                            </strong>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-envelope fa-fw pe-1"></i> Email: <strong> {{$client->email}}
                                            </strong>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-phone fa-fw pe-1"></i> Contact: <strong> {{$client->contact_no}}
                                            </strong>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-house fa-fw pe-1"></i> Address: <strong> {{$client->address_line_1}}
                                            </strong>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-card-text fa-fw pe-1"></i> ID NO: <strong> {{$client->id_no}}
                                            </strong>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Card body END -->
                            </div>
                        </div>
                        <!-- Card END -->

                        <!-- Card START -->
                        <div class="col-md-6 col-lg-12">
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
                        </div>
                        <!-- Card END -->

                        <!-- Card START -->
                        <div class="col-md-6 col-lg-12">
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
                        </div>
                        <!-- Card END -->

                        <!-- Card START -->
                        <div class="col-md-6 col-lg-12">
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
                        </div>
                        <!-- Card END -->
                    </div>

                </div> --}}
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

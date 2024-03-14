@extends('user.layout.base')
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
        <nav class="navbar navbar-expand-lg mx-0">
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSideNavbar">
                <!-- Offcanvas header -->
                <div class="offcanvas-header">
                    <button type="button" class="btn-close text-reset ms-auto"
                        data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <!-- Offcanvas body -->
                <div class="offcanvas-body d-block px-2 px-lg-0">
                    <!-- Card START -->
                    <div class="card overflow-hidden">
                        <!-- Cover image -->
                        <div class="h-50px"
                            style="background-image:url(assets/images/bg/01.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;">
                        </div>
                        <!-- Card body START -->
                        <div class="card-body pt-0">
                            <div class="text-center">
                                <!-- Avatar -->
                                <div class="avatar avatar-lg mt-n5 mb-3">
                                    <a href="#!">
                                        @if($client->image)
                                            <img class="avatar-img rounded-circle border border-white border-3" src="{{asset('public/uploads/client/' . $client->image)}}" alt="">
                                        @else
                                            <img class="avatar-img rounded-circle border border-white border-3" src="{{asset('public/images/download.jpg')}}" alt="">
                                        @endif
                                        {{-- <img class="avatar-img rounded border border-white border-3" src="{{asset($client->image?$client->image:default_image())}}" alt=""> --}}
                                    </a>
                                </div>
                                <!-- Info -->
                                <h5 class="mb-0"> <a href="#!">{{$client->middle_name}} {{$client->last_name}}</a> </h5>
                                {{-- <small>Web Developer at Webestica</small>
                                <p class="mt-3">I'd love to change the world, but they won’t give me the
                                    source code.</p> --}}

                                <!-- User stat START -->
                                <div class="hstack gap-2 gap-xl-3 justify-content-center">
                                    <!-- User stat item -->
                                    <div>
                                        <h6 class="mb-0">{{ $postCount}}</h6>
                                        <small>Post</small>
                                    </div>
                                    <!-- Divider -->
                                    {{-- <div class="vr"></div> --}}
                                    <!-- User stat item -->
                                    {{-- <div>
                                        <h6 class="mb-0">2.5K</h6>
                                        <small>Followers</small>
                                    </div> --}}
                                    <!-- Divider -->
                                    {{-- <div class="vr"></div> --}}
                                    <!-- User stat item -->
                                    {{-- <div>
                                        <h6 class="mb-0">365</h6>
                                        <small>Following</small>
                                    </div> --}}
                                </div>
                                <!-- User stat END -->
                            </div>

                            <!-- Divider -->
                            {{-- <hr> --}}

                            <!-- Side Nav START -->
                            {{-- <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                                <li class="nav-item">
                                    <a class="nav-link" href="my-profile.html"> <img
                                            class="me-2 h-20px fa-fw"
                                            src="assets/images/icon/home-outline-filled.svg"
                                            alt=""><span>Feed </span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="my-profile-connections.html"> <img
                                            class="me-2 h-20px fa-fw"
                                            src="assets/images/icon/person-outline-filled.svg"
                                            alt=""><span>Connections </span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="blog.html"> <img class="me-2 h-20px fa-fw"
                                            src="assets/images/icon/earth-outline-filled.svg"
                                            alt=""><span>Latest News </span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="events.html"> <img
                                            class="me-2 h-20px fa-fw"
                                            src="assets/images/icon/calendar-outline-filled.svg"
                                            alt=""><span>Events </span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="groups.html"> <img
                                            class="me-2 h-20px fa-fw"
                                            src="assets/images/icon/chat-outline-filled.svg"
                                            alt=""><span>Groups </span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="notifications.html"> <img
                                            class="me-2 h-20px fa-fw"
                                            src="assets/images/icon/notification-outlined-filled.svg"
                                            alt=""><span>Notifications </span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="settings.html"> <img
                                            class="me-2 h-20px fa-fw"
                                            src="assets/images/icon/cog-outline-filled.svg"
                                            alt=""><span>Settings </span></a>
                                </li>
                            </ul> --}}
                            <!-- Side Nav END -->
                        </div>
                        <!-- Card body END -->
                        <!-- Card footer -->
                        <div class="card-footer text-center py-2">
                            <a class="btn btn-link btn-sm" href="{{route('myProfile')}}">View Profile </a>
                        </div>
                    </div>
                    <!-- Card END -->

                    <!-- Helper link START -->
                    {{-- <ul class="nav small mt-4 justify-content-center lh-1">
                        <li class="nav-item">
                            <a class="nav-link" href="my-profile-about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="settings.html">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank"
                                href="https://support.webestica.com/login">Support </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" target="_blank" href="docs/index.html">Docs </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="help.html">Help</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="privacy-and-terms.html">Privacy &amp; terms</a>
                        </li>
                    </ul> --}}
                    <!-- Helper link END -->
                    <!-- Copyright -->
                    {{-- <p class="small text-center mt-1">©2023 <a class="text-reset" target="_blank"
                            href="https://www.webestica.com/"> Webestica </a></p> --}}
                </div>
            </div>
        </nav>
        <!-- Navbar END-->
    </div>
    <!-- Sidenav END -->

    <!-- Main content START -->
    <div class="col-md-8 col-lg-6 vstack gap-4">

        <!-- Story START -->
        {{-- <div class="d-flex gap-2 mb-n3">
            <div class="position-relative">
                <div
                    class="card border border-2 border-dashed h-150px px-4 px-sm-5 shadow-none d-flex align-items-center justify-content-center text-center">
                    <div>
                        <a class="stretched-link btn btn-light rounded-circle icon-md" href="#!"><i
                                class="fa-solid fa-plus"></i></a>
                        <h6 class="mt-2 mb-0 small">Post a Story</h6>
                    </div>
                </div>
            </div>

            <!-- Stories -->
            <div id="stories"
                class="storiesWrapper stories-square stories user-icon carousel scroll-enable stories user-icon carousel snapgram ">
                <div class="story " data-id="user-1" data-photo="assets/images/post/1by1/02.jpg"
                    data-last-updated="1710057946.646">
                    <a class="item-link" href="">
                        <span class="item-preview">
                            <img lazy="eager" src="assets/images/post/1by1/02.jpg">
                        </span>
                        <span class="info" itemprop="author" itemscope=""
                            itemtype="http://schema.org/Person">
                            <strong class="name" itemprop="name">Judy Nguyen</strong>
                            <span class="time"></span>
                        </span>
                    </a>

                    <ul class="items">
                        <li class="" data-id="user1-story1"><a href="assets/images/albums/01.jpg"
                                data-link="" data-linktext="" data-time="1710057946.646"
                                data-type="photo" data-length="5">
                                <img loading="auto" src="">
                            </a></li>
                        <li class="" data-id="user1-story2"><a
                                href="assets/images/videos/video-call.mp4" data-link=""
                                data-linktext="" data-time="1710057946.646" data-type="video"
                                data-length="">
                                <img loading="auto" src="">
                            </a></li>
                        <li class="" data-id="user1-story3"><a href="assets/images/albums/02.jpg"
                                data-link="https://webestica.com/" data-linktext="Visit my Portfolio"
                                data-time="1710057946.646" data-type="photo" data-length="5">
                                <img loading="auto" src="">
                            </a></li>
                    </ul>
                </div>
                <div class="story " data-id="user-2" data-photo="assets/images/post/1by1/03.jpg"
                    data-last-updated="1710057946.646">
                    <a class="item-link" href="">
                        <span class="item-preview">
                            <img lazy="eager" src="assets/images/post/1by1/03.jpg">
                        </span>
                        <span class="info" itemprop="author" itemscope=""
                            itemtype="http://schema.org/Person">
                            <strong class="name" itemprop="name">Billy Vasquez</strong>
                            <span class="time"></span>
                        </span>
                    </a>

                    <ul class="items">
                        <li class="" data-id="user2-story1"><a href="assets/images/albums/03.jpg"
                                data-link="" data-linktext="" data-time="1710057946.646"
                                data-type="photo" data-length="5">
                                <img loading="auto" src="">
                            </a></li>
                    </ul>
                </div>
                <div class="story " data-id="user-3" data-photo="assets/images/post/1by1/04.jpg"
                    data-last-updated="1710057946.646">
                    <a class="item-link" href="">
                        <span class="item-preview">
                            <img lazy="eager" src="assets/images/post/1by1/04.jpg">
                        </span>
                        <span class="info" itemprop="author" itemscope=""
                            itemtype="http://schema.org/Person">
                            <strong class="name" itemprop="name">Amanda Reed</strong>
                            <span class="time"></span>
                        </span>
                    </a>

                    <ul class="items">
                        <li class="" data-id="user3-story1"><a href="assets/images/albums/04.jpg"
                                data-link="" data-linktext="" data-time="1710057946.646"
                                data-type="photo" data-length="5">
                                <img loading="auto" src="">
                            </a></li>
                    </ul>
                </div>
                <div class="story " data-id="user-4" data-photo="assets/images/post/1by1/05.jpg"
                    data-last-updated="1710057946.646">
                    <a class="item-link" href="">
                        <span class="item-preview">
                            <img lazy="eager" src="assets/images/post/1by1/05.jpg">
                        </span>
                        <span class="info" itemprop="author" itemscope=""
                            itemtype="http://schema.org/Person">
                            <strong class="name" itemprop="name">Lori Stevens</strong>
                            <span class="time"></span>
                        </span>
                    </a>

                    <ul class="items">
                        <li class="" data-id="user4-story1"><a href="assets/images/albums/05.jpg"
                                data-link="" data-linktext="" data-time="1710057946.646"
                                data-type="photo" data-length="5">
                                <img loading="auto" src="">
                            </a></li>
                    </ul>
                </div>
                <div class="story " data-id="user-5" data-photo="assets/images/post/1by1/06.jpg"
                    data-last-updated="1710057946.646">
                    <a class="item-link" href="">
                        <span class="item-preview">
                            <img lazy="eager" src="assets/images/post/1by1/06.jpg">
                        </span>
                        <span class="info" itemprop="author" itemscope=""
                            itemtype="http://schema.org/Person">
                            <strong class="name" itemprop="name">Samuel Bishop</strong>
                            <span class="time"></span>
                        </span>
                    </a>

                    <ul class="items">
                        <li class="" data-id="user5-story1"><a href="assets/images/albums/06.jpg"
                                data-link="" data-linktext="" data-time="1710057946.646"
                                data-type="photo" data-length="5">
                                <img loading="auto" src="">
                            </a></li>
                    </ul>
                </div>
                <div class="story " data-id="user-6" data-photo="assets/images/post/1by1/07.jpg"
                    data-last-updated="1710057946.646">
                    <a class="item-link" href="">
                        <span class="item-preview">
                            <img lazy="eager" src="assets/images/post/1by1/07.jpg">
                        </span>
                        <span class="info" itemprop="author" itemscope=""
                            itemtype="http://schema.org/Person">
                            <strong class="name" itemprop="name">Joan Wallace</strong>
                            <span class="time"></span>
                        </span>
                    </a>

                    <ul class="items">
                        <li class="" data-id="user6-story1"><a href="assets/images/albums/06.jpg"
                                data-link="" data-linktext="" data-time="1710057946.646"
                                data-type="photo" data-length="5">
                                <img loading="auto" src="">
                            </a></li>
                    </ul>
                </div>
                <div class="story " data-id="user-7" data-photo="assets/images/albums/05.jpg"
                    data-last-updated="">
                    <a class="item-link" href="">
                        <span class="item-preview">
                            <img lazy="eager" src="assets/images/albums/05.jpg">
                        </span>
                        <span class="info" itemprop="author" itemscope=""
                            itemtype="http://schema.org/Person">
                            <strong class="name" itemprop="name">Carolyn Ortiz</strong>
                            <span class="time"></span>
                        </span>
                    </a>

                    <ul class="items">
                        <li class="" data-id="user7-story1"><a href="assets/images/albums/05.jpg"
                                data-link="" data-linktext="" data-time="" data-type="photo"
                                data-length="3">
                                <img loading="auto" src="">
                            </a></li>
                    </ul>
                </div>
            </div>
        </div> --}}
        <!-- Story END -->

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
                        {{-- <img class="avatar-img rounded-circle"
                        src="{{asset($client->image?$client->image:default_image())}}" alt=""> --}}
                    </a>
                </div>
                <!-- Post input -->
                <form class="w-100">
                    <textarea class="form-control pe-4 border-0" rows="2" data-autoresize="" placeholder="Share your thoughts..."></textarea>
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
                <li class="nav-item dropdown ms-lg-auto">
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
        <div class="card">
            <!-- Card header START -->
             @foreach ($post as $value )
            <div class="card-header border-0 pb-0">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <!-- Avatar -->
                        <div class="avatar avatar-story me-2">
                            <a href="#!">
                                @if($client->image)
                                    <img class="avatar-img rounded-circle"
                                    src="{{asset('public/uploads/client/' . $client->image)}}" alt="">
                                @else
                                    <img class="avatar-img rounded-circle"
                                    src="{{asset('public/images/download.jpg')}}" alt="">
                                @endif
                                {{-- <img class="avatar-img rounded-circle" src="{{asset($client->image?$client->image:default_image())}}" alt=""> --}}
                            </a>
                        </div>
                        <!-- Info -->
                        <div>
                            <div class="nav nav-divider">
                                <h6 class="nav-item card-title mb-0"> <a href="#!">{{$client->fname}} {{$client->middle_name}} {{$client->last_name}}
                                    </a></h6>
                                <span class="nav-item small">{{$value->created_at->diffForHumans()}}</span>
                            </div>
                            {{-- <p class="mb-0 small">Web Developer at Webestica</p> --}}
                        </div>
                    </div>
                    <!-- Card feed action dropdown START -->
                    <div class="dropdown">
                        <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
                            id="cardFeedAction" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <!-- Card feed action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction">
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a>
                            </li>
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
                    <!-- Card feed action dropdown END -->
                </div>
            </div>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body">


                <p>{{$value->message}}.</p>
                <!-- Card img -->
                <img class="card-img" src="{{asset('public/uploads/post/' . $value->image)}}" alt="Post">
                {{-- <img class="card-img" src="assets/images/post/3by2/01.jpg" alt="Post"> --}}
                <!-- Feed react START -->
                {{-- <ul class="nav nav-stack py-3 small">
                    <li class="nav-item">
                        <a class="nav-link active" href="#!" data-bs-container="body"
                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true"
                            data-bs-custom-class="tooltip-text-start"
                            data-bs-title="Frances Guerrero<br> Lori Stevens<br> Billy Vasquez<br> Judy Nguyen<br> Larry Lawson<br> Amanda Reed<br> Louis Crawford">
                            <i class="bi bi-hand-thumbs-up-fill pe-1"></i>Liked (56)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments
                            (12)</a>
                    </li>
                    <!-- Card share action START -->
                    <li class="nav-item dropdown ms-sm-auto">
                        <a class="nav-link mb-0" href="#" id="cardShareAction"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                        </a>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction">
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a>
                            </li>
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
                                        class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Card share action END -->
                </ul> --}}
                <!-- Feed react END -->

                <!-- Add comment -->
                {{-- <div class="d-flex mb-3">
                    <!-- Avatar -->
                    <div class="avatar avatar-xs me-2">
                        <a href="#!"> <img class="avatar-img rounded-circle"
                                src="assets/images/avatar/12.jpg" alt=""> </a>
                    </div>
                    <!-- Comment box  -->
                    <form class="nav nav-item w-100 position-relative">
                        <textarea data-autoresize="" class="form-control pe-5 bg-light" rows="1" placeholder="Add a comment..."></textarea>
                        <button
                            class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0"
                            type="submit">
                            <i class="bi bi-send-fill"> </i>
                        </button>
                    </form>
                </div> --}}
                <!-- Comment wrap START -->
                {{-- <ul class="comment-wrap list-unstyled">
                    <!-- Comment item START -->
                    <li class="comment-item">
                        <div class="d-flex position-relative">
                            <!-- Avatar -->
                            <div class="avatar avatar-xs">
                                <a href="#!"><img class="avatar-img rounded-circle"
                                        src="assets/images/avatar/05.jpg" alt=""></a>
                            </div>
                            <div class="ms-2">
                                <!-- Comment by -->
                                <div class="bg-light rounded-start-top-0 p-3 rounded">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1"> <a href="#!"> Frances Guerrero </a></h6>
                                        <small class="ms-2">5hr</small>
                                    </div>
                                    <p class="small mb-0">Removed demands expense account in outward
                                        tedious do. Particular way thoroughly unaffected projection.</p>
                                </div>
                                <!-- Comment react -->
                                <ul class="nav nav-divider py-2 small">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!"> Like (3)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!"> Reply</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!"> View 5 replies</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Comment item nested START -->
                        <ul class="comment-item-nested list-unstyled">
                            <!-- Comment item START -->
                            <li class="comment-item">
                                <div class="d-flex">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs">
                                        <a href="#!"><img class="avatar-img rounded-circle"
                                                src="assets/images/avatar/06.jpg" alt=""></a>
                                    </div>
                                    <!-- Comment by -->
                                    <div class="ms-2">
                                        <div class="bg-light p-3 rounded">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-1"> <a href="#!"> Lori Stevens </a>
                                                </h6>
                                                <small class="ms-2">2hr</small>
                                            </div>
                                            <p class="small mb-0">See resolved goodness felicity shy
                                                civility domestic had but Drawings offended yet answered
                                                Jennings perceive.</p>
                                        </div>
                                        <!-- Comment react -->
                                        <ul class="nav nav-divider py-2 small">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#!"> Like (5)</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#!"> Reply</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <!-- Comment item END -->
                            <!-- Comment item START -->
                            <li class="comment-item">
                                <div class="d-flex">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-story avatar-xs">
                                        <a href="#!"><img class="avatar-img rounded-circle"
                                                src="assets/images/avatar/07.jpg" alt=""></a>
                                    </div>
                                    <!-- Comment by -->
                                    <div class="ms-2">
                                        <div class="bg-light p-3 rounded">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-1"> <a href="#!"> Billy Vasquez </a>
                                                </h6>
                                                <small class="ms-2">15min</small>
                                            </div>
                                            <p class="small mb-0">Wishing calling is warrant settled was
                                                lucky.</p>
                                        </div>
                                        <!-- Comment react -->
                                        <ul class="nav nav-divider py-2 small">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#!"> Like</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#!"> Reply</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <!-- Comment item END -->
                        </ul>
                        <!-- Load more replies -->
                        <a href="#!" role="button"
                            class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center mb-3 ms-5"
                            data-bs-toggle="button" aria-pressed="true">
                            <div class="spinner-dots me-2">
                                <span class="spinner-dot"></span>
                                <span class="spinner-dot"></span>
                                <span class="spinner-dot"></span>
                            </div>
                            Load more replies
                        </a>
                        <!-- Comment item nested END -->
                    </li>
                    <!-- Comment item END -->
                    <!-- Comment item START -->
                    <li class="comment-item">
                        <div class="d-flex">
                            <!-- Avatar -->
                            <div class="avatar avatar-xs">
                                <a href="#!"><img class="avatar-img rounded-circle"
                                        src="assets/images/avatar/05.jpg" alt=""></a>
                            </div>
                            <!-- Comment by -->
                            <div class="ms-2">
                                <div class="bg-light p-3 rounded">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1"> <a href="#!"> Frances Guerrero </a> </h6>
                                        <small class="ms-2">4min</small>
                                    </div>
                                    <p class="small mb-0">Removed demands expense account in outward
                                        tedious do. Particular way thoroughly unaffected projection.</p>
                                </div>
                                <!-- Comment react -->
                                <ul class="nav nav-divider pt-2 small">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!"> Like (1)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!"> Reply</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!"> View 6 replies</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <!-- Comment item END -->
                </ul> --}}
                <!-- Comment wrap END -->

            </div>
            <!-- Card body END -->
            <!-- Card footer START -->
            {{-- <div class="card-footer border-0 pt-0">
                <!-- Load more comments -->
                <a href="#!" role="button"
                    class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center"
                    data-bs-toggle="button" aria-pressed="true">
                    <div class="spinner-dots me-2">
                        <span class="spinner-dot"></span>
                        <span class="spinner-dot"></span>
                        <span class="spinner-dot"></span>
                    </div>
                    Load more comments
                </a>
            </div> --}}
            <!-- Card footer END -->
            @endforeach
        </div>
        <!-- Card feed item END -->

        <!-- Card feed item START -->
        {{-- <div class="card">
            <!-- Card header START -->
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <!-- Avatar -->
                        <div class="avatar me-2">
                            <a href="#!"> <img class="avatar-img rounded-circle"
                                    src="assets/images/logo/12.svg" alt=""> </a>
                        </div>
                        <!-- Info -->
                        <div>
                            <h6 class="card-title mb-0"><a href="#!"> Bootstrap: Front-end framework
                                </a></h6>
                            <a href="#!" class="mb-0 text-body">Sponsored <i
                                    class="bi bi-info-circle ps-1" data-bs-container="body"
                                    data-bs-toggle="popover" data-bs-placement="top"
                                    data-bs-content="You're seeing this ad because your activity meets the intended audience of our site."></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card share action START -->
                    <div class="dropdown">
                        <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
                            id="cardShareAction2" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction2">
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a>
                            </li>
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
                    <!-- Card share action START -->
                </div>
            </div>
            <!-- Card header START -->

            <!-- Card body START -->
            <div class="card-body">
                <p class="mb-0">Quickly design and customize responsive mobile-first sites with
                    Bootstrap.</p>
            </div>
            <img src="assets/images/post/3by2/02.jpg" alt="">
            <!-- Card body END -->
            <!-- Card footer START -->
            <div class="card-footer border-0 d-flex justify-content-between align-items-center">
                <p class="mb-0">Currently v5.1.3 </p>
                <a class="btn btn-primary-soft btn-sm" href="#"> Download now </a>
            </div>
            <!-- Card footer END -->

        </div> --}}
        <!-- Card feed item END -->

        <!-- Card feed item START -->
        {{-- <div class="card">
            <!-- Card header START -->
            <div class="card-header border-0 pb-0">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <!-- Avatar -->
                        <div class="avatar me-2">
                            <a href="#"> <img class="avatar-img rounded-circle"
                                    src="assets/images/avatar/04.jpg" alt=""> </a>
                        </div>
                        <!-- Info -->
                        <div>
                            <h6 class="card-title mb-0"> <a href="#"> Judy Nguyen </a></h6>
                            <div class="nav nav-divider">
                                <p class="nav-item mb-0 small">Web Developer at Webestica</p>
                                <span class="nav-item small" data-bs-toggle="tooltip"
                                    data-bs-placement="top" aria-label="Public"
                                    data-bs-original-title="Public"> <i class="bi bi-globe"></i> </span>
                            </div>
                        </div>
                    </div>
                    <!-- Card share action START -->
                    <div class="dropdown">
                        <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
                            id="cardShareAction3" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction3">
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a>
                            </li>
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
            </div>
            <!-- Card header START -->
            <!-- Card body START -->
            <div class="card-body">
                <p>I'm so privileged to be involved in the <a href="#!">@bootstrap </a>hiring process!
                    Interviewing with their team was fun and I hope this can be a valuable resource for
                    folks! <a href="#!"> #inclusivebusiness</a> <a href="#!"> #internship</a> <a
                        href="#!"> #hiring</a> <a href="#"> #apply </a></p>
                <!-- Card feed grid START -->
                <div class="d-flex justify-content-between">
                    <div class="row g-3">
                        <div class="col-6">
                            <!-- Grid img -->
                            <a class="h-100" href="assets/images/post/1by1/03.jpg" data-glightbox=""
                                data-gallery="image-popup">
                                <img class="rounded img-fluid" src="assets/images/post/1by1/03.jpg"
                                    alt="Image">
                            </a>
                        </div>
                        <div class="col-6">
                            <!-- Grid img -->
                            <a href="assets/images/post/3by2/01.jpg" data-glightbox=""
                                data-gallery="image-popup">
                                <img class="rounded img-fluid" src="assets/images/post/3by2/01.jpg"
                                    alt="Image">
                            </a>
                            <!-- Grid img -->
                            <div class="position-relative bg-dark mt-3 rounded">
                                <div
                                    class="hover-actions-item position-absolute top-50 start-50 translate-middle z-index-9">
                                    <a class="btn btn-link text-white" href="#"> View all </a>
                                </div>
                                <a href="assets/images/post/3by2/02.jpg" data-glightbox=""
                                    data-gallery="image-popup">
                                    <img class="img-fluid opacity-50 rounded"
                                        src="assets/images/post/3by2/02.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card feed grid END -->

                <!-- Feed react START -->
                <ul class="nav nav-stack py-3 small">
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

                <!-- Feed react START -->
                <ul
                    class="nav nav-pills nav-pills-light nav-fill nav-stack small border-top border-bottom py-1 mb-3">
                    <li class="nav-item">
                        <a class="nav-link mb-0 active" href="#!"> <i
                                class="bi bi-heart pe-1"></i>Liked (56)</a>
                    </li>
                    <!-- Card share action menu START -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link mb-0" id="cardShareAction4"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                        </a>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction4">
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a>
                            </li>
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
                                        class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Card share action menu END -->
                    <li class="nav-item">
                        <a class="nav-link mb-0" href="#!"> <i
                                class="bi bi-send-fill pe-1"></i>Send</a>
                    </li>
                </ul>
                <!-- Feed react START -->

                <!-- Comment wrap START -->
                <ul class="comment-wrap list-unstyled">
                    <!-- Comment item START -->
                    <li class="comment-item">
                        <div class="d-flex">
                            <!-- Avatar -->
                            <div class="avatar avatar-xs">
                                <a href="#"> <img class="avatar-img rounded-circle"
                                        src="assets/images/avatar/05.jpg" alt=""> </a>
                            </div>
                            <div class="ms-2">
                                <!-- Comment by -->
                                <div class="bg-light rounded-start-top-0 p-3 rounded">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1"> <a href="#!"> Frances Guerrero </a></h6>
                                        <small class="ms-2">5hr</small>
                                    </div>
                                    <p class="small mb-0">Removed demands expense account in outward
                                        tedious do. Particular way thoroughly unaffected projection.</p>
                                </div>
                                <!-- Comment rect -->
                                <ul class="nav nav-divider py-2 small">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!"> Like (3)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!"> Reply</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!"> View 5 replies</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Comment item nested START -->
                        <ul class="comment-item-nested list-unstyled">
                            <!-- Comment item START -->
                            <li class="comment-item">
                                <div class="d-flex">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs">
                                        <a href="#!"><img class="avatar-img rounded-circle"
                                                src="assets/images/avatar/06.jpg" alt=""></a>
                                    </div>
                                    <!-- Comment by -->
                                    <div class="ms-2">
                                        <div class="bg-light p-3 rounded">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-1"> <a href="#!"> Lori Stevens </a>
                                                </h6>
                                                <small class="ms-2">2hr</small>
                                            </div>
                                            <p class="small mb-0">See resolved goodness felicity shy
                                                civility domestic had but Drawings offended yet answered
                                                Jennings perceive.</p>
                                        </div>
                                        <!-- Comment rect -->
                                        <ul class="nav nav-divider py-2 small">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#!"> Like (5)</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#!"> Reply</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <!-- Comment item END -->
                            <!-- Comment item START -->
                            <li class="comment-item">
                                <div class="d-flex">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs">
                                        <a href="#!"><img class="avatar-img rounded-circle"
                                                src="assets/images/avatar/07.jpg" alt=""></a>
                                    </div>
                                    <!-- Comment by -->
                                    <div class="ms-2">
                                        <div class="bg-light p-3 rounded">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-1"> <a href="#!"> Billy Vasquez
                                                    </a> </h6>
                                                <small class="ms-2">15min</small>
                                            </div>
                                            <p class="small mb-0">Wishing calling is warrant settled was
                                                lucky.</p>
                                        </div>
                                        <!-- Comment rect -->
                                        <ul class="nav nav-divider py-2 small">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#!"> Like</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#!"> Reply</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- Load more replies -->
                        <a href="#!" role="button"
                            class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center mb-3 ms-5"
                            data-bs-toggle="button" aria-pressed="true">
                            <div class="spinner-dots me-2">
                                <span class="spinner-dot"></span>
                                <span class="spinner-dot"></span>
                                <span class="spinner-dot"></span>
                            </div>
                            Load more replies
                        </a>
                    </li>
                    <!-- Comment item END -->
                    <!-- Comment item START -->
                    <li class="comment-item">
                        <div class="d-flex">
                            <!-- Avatar -->
                            <div class="avatar avatar-xs">
                                <a href="#!"><img class="avatar-img rounded-circle"
                                        src="assets/images/avatar/05.jpg" alt=""></a>
                            </div>
                            <!-- Comment by -->
                            <div class="ms-2">
                                <div class="bg-light p-3 rounded">
                                    <div class="d-flex justify-content-center">
                                        <h6 class="mb-1"> <a href="#!"> Frances Guerrero </a>
                                        </h6>
                                        <small class="ms-2">4min</small>
                                    </div>
                                    <p class="small mb-0">Congratulations:)</p>
                                    <div class="card p-2 border border-2 rounded mt-2 shadow-none">
                                        <img src="assets/images/elements/12.svg" alt="">
                                    </div>
                                </div>
                                <!-- Comment rect -->
                                <ul class="nav nav-divider pt-2 small">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!"> Like (1)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!"> Reply</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!"> View 6 replies</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <!-- Comment item END -->
                </ul>
                <!-- Comment wrap END -->
            </div>
            <!-- Card body END -->
            <!-- Card footer START -->
            <div class="card-footer border-0 pt-0">
                <!-- Load more comments -->
                <a href="#!" role="button"
                    class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center"
                    data-bs-toggle="button" aria-pressed="true">
                    <div class="spinner-dots me-2">
                        <span class="spinner-dot"></span>
                        <span class="spinner-dot"></span>
                        <span class="spinner-dot"></span>
                    </div>
                    Load more comments
                </a>
            </div>
            <!-- Card footer END -->
        </div> --}}
        <!-- Card feed item END -->

        <!-- Card feed item START -->
        {{-- <div class="card">
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
                <p>Find out how you can save time in the classroom this year. Earn recognition while you
                    learn new skills on iPad and Mac. Start recognition your first Apple Teacher badge
                    today!</p>
                <!-- Feed react START -->
                <ul class="nav nav-stack pb-2 small">
                    <li class="nav-item">
                        <a class="nav-link active text-secondary" href="#!"> <i
                                class="bi bi-heart-fill me-1 icon-xs bg-danger text-white rounded-circle"></i>
                            Louis, Billy and 126 others </a>
                    </li>
                    <li class="nav-item ms-sm-auto">
                        <a class="nav-link" href="#!"> <i
                                class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
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
                        <a class="nav-link mb-0 active" href="#!"> <i
                                class="bi bi-heart pe-1"></i>Liked (56)</a>
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
                                        class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a>
                            </li>
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
                                        class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Card share action dropdown END -->
                    <li class="nav-item">
                        <a class="nav-link mb-0" href="#!"> <i
                                class="bi bi-send-fill pe-1"></i>Send</a>
                    </li>
                </ul>
                <!-- Feed react END -->
            </div>
            <!-- Card Footer END -->
        </div> --}}
        <!-- Card feed item END -->

        <!-- Card feed item START -->
        {{-- <div class="card">
            <!-- Card header START -->
            <div class="card-header d-flex justify-content-between align-items-center border-0 pb-0">
                <h6 class="card-title mb-0">People you may know</h6>
                <button class="btn btn-sm btn-primary-soft"> See all </button>
            </div>
            <!-- Card header START -->

            <!-- Card body START -->
            <div class="card-body">
                <div class="tiny-slider arrow-hover">
                    <div class="tns-outer" id="tns1-ow">
                        <div class="tns-liveregion tns-visually-hidden" aria-live="polite"
                            aria-atomic="true">slide <span class="current">12 to 16</span> of 4</div>
                        <div id="tns1-mw" class="tns-ovh">
                            <div class="tns-inner" id="tns1-iw">
                                <div class="tiny-slider-inner ms-n4  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                                    data-arrow="true" data-dots="false" data-items-xl="3"
                                    data-items-lg="2" data-items-md="2" data-items-sm="2"
                                    data-items-xs="1" data-gutter="12" data-edge="30" id="tns1"
                                    style="transform: translate3d(-66.6667%, 0px, 0px);">
                                    <div class="tns-item tns-slide-cloned" aria-hidden="true"
                                        tabindex="-1">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-story avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/10.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Larry Lawson </a></h6>
                                                <p class="mb-0 small lh-sm">33 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                    <div class="tns-item tns-slide-cloned" aria-hidden="true"
                                        tabindex="-1">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/11.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Louis Crawford </a></h6>
                                                <p class="mb-0 small lh-sm">45 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                    <div class="tns-item tns-slide-cloned" aria-hidden="true"
                                        tabindex="-1">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/12.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Dennis Barrett </a></h6>
                                                <p class="mb-0 small lh-sm">21 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                    <div class="tns-item tns-slide-cloned" aria-hidden="true"
                                        tabindex="-1">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/09.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Amanda Reed </a></h6>
                                                <p class="mb-0 small lh-sm">50 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                    <div class="tns-item tns-slide-cloned" aria-hidden="true"
                                        tabindex="-1">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-story avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/10.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Larry Lawson </a></h6>
                                                <p class="mb-0 small lh-sm">33 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                    <div class="tns-item tns-slide-cloned" aria-hidden="true"
                                        tabindex="-1">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/11.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Louis Crawford </a></h6>
                                                <p class="mb-0 small lh-sm">45 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                    <div class="tns-item tns-slide-cloned" aria-hidden="true"
                                        tabindex="-1">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/12.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Dennis Barrett </a></h6>
                                                <p class="mb-0 small lh-sm">21 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                    <!-- Slider items -->
                                    <div class="tns-item" id="tns1-item0" aria-hidden="true"
                                        tabindex="-1">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/09.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Amanda Reed </a></h6>
                                                <p class="mb-0 small lh-sm">50 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                    <div class="tns-item" id="tns1-item1" aria-hidden="true"
                                        tabindex="-1">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-story avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/10.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Larry Lawson </a></h6>
                                                <p class="mb-0 small lh-sm">33 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                    <div class="tns-item" id="tns1-item2" aria-hidden="true"
                                        tabindex="-1">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/11.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Louis Crawford </a></h6>
                                                <p class="mb-0 small lh-sm">45 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                    <div class="tns-item" id="tns1-item3" aria-hidden="true"
                                        tabindex="-1">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/12.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Dennis Barrett </a></h6>
                                                <p class="mb-0 small lh-sm">21 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                    <div class="tns-item tns-slide-cloned tns-slide-active">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/09.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Amanda Reed </a></h6>
                                                <p class="mb-0 small lh-sm">50 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                    <div class="tns-item tns-slide-cloned tns-slide-active">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-story avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/10.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Larry Lawson </a></h6>
                                                <p class="mb-0 small lh-sm">33 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                    <div class="tns-item tns-slide-cloned tns-slide-active">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/11.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Louis Crawford </a></h6>
                                                <p class="mb-0 small lh-sm">45 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                    <div class="tns-item tns-slide-cloned tns-slide-active">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/12.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Dennis Barrett </a></h6>
                                                <p class="mb-0 small lh-sm">21 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                    <div class="tns-item tns-slide-cloned tns-slide-active">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/09.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Amanda Reed </a></h6>
                                                <p class="mb-0 small lh-sm">50 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                    <div class="tns-item tns-slide-cloned" aria-hidden="true"
                                        tabindex="-1">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-story avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/10.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Larry Lawson </a></h6>
                                                <p class="mb-0 small lh-sm">33 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                    <div class="tns-item tns-slide-cloned" aria-hidden="true"
                                        tabindex="-1">
                                        <!-- Card add friend item START -->
                                        <div class="card shadow-none text-center">
                                            <!-- Card body -->
                                            <div class="card-body p-2 pb-0">
                                                <div class="avatar avatar-xl">
                                                    <a href="#!"><img
                                                            class="avatar-img rounded-circle"
                                                            src="assets/images/avatar/11.jpg"
                                                            alt=""></a>
                                                </div>
                                                <h6 class="card-title mb-1 mt-3"> <a href="#!">
                                                        Louis Crawford </a></h6>
                                                <p class="mb-0 small lh-sm">45 mutual connections</p>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer p-2 border-0">
                                                <button class="btn btn-sm btn-primary-soft w-100"> Add
                                                    friend </button>
                                            </div>
                                        </div>
                                        <!-- Card add friend item END -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tns-controls" aria-label="Carousel Navigation" tabindex="0">
                            <button type="button" data-controls="prev" tabindex="-1"
                                aria-controls="tns1"><i
                                    class="fa-solid fa-chevron-left"></i></button><button type="button"
                                data-controls="next" tabindex="-1" aria-controls="tns1"><i
                                    class="fa-solid fa-chevron-right"></i></button></div>
                    </div>
                </div>
            </div>
            <!-- Card body END -->
        </div> --}}
        <!-- Card feed item END -->

        <!-- Card feed item START -->
        {{-- <div class="card">
            <!-- Card header START -->
            <div class="card-header border-0 pb-0">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <!-- Avatar -->
                        <div class="avatar me-2">
                            <a href="#"> <img class="avatar-img rounded-circle"
                                    src="assets/images/avatar/04.jpg" alt=""> </a>
                        </div>
                        <!-- Title -->
                        <div>
                            <h6 class="card-title mb-0"> <a href="#!"> All in the Mind </a></h6>
                            <p class="mb-0 small">9 November at 23:29</p>
                        </div>
                    </div>
                    <!-- Card share action menu -->
                    <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
                        id="cardShareAction7" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </a>
                    <!-- Card share action dropdown menu -->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction7">
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
                <p>How do you protect your business against cyber-crime?</p>
                <div class="vstack gap-2">
                    <!-- Feed poll item -->
                    <div>
                        <input type="radio" class="btn-check" name="poll" id="option">
                        <label class="btn btn-outline-primary w-100" for="option">We have
                            cybersecurity insurance coverage</label>
                    </div>
                    <!-- Feed poll item -->
                    <div>
                        <input type="radio" class="btn-check" name="poll" id="option2">
                        <label class="btn btn-outline-primary w-100" for="option2">Our dedicated staff
                            will protect us</label>
                    </div>
                    <!-- Feed poll item -->
                    <div>
                        <input type="radio" class="btn-check" name="poll" id="option3">
                        <label class="btn btn-outline-primary w-100" for="option3">We give regular
                            training for best practices</label>
                    </div>
                    <!-- Feed poll item -->
                    <div>
                        <input type="radio" class="btn-check" name="poll" id="option4">
                        <label class="btn btn-outline-primary w-100" for="option4">Third-party vendor
                            protection</label>
                    </div>
                </div>

                <!-- Feed poll votes START -->
                <ul class="nav nav-divider mt-2 mb-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">263 votes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">2d left</a>
                    </li>
                </ul>
                <!-- Feed poll votes ED -->

                <!-- Feed react START -->
                <ul class="nav nav-stack pb-2 small mt-4">
                    <li class="nav-item">
                        <a class="nav-link active text-secondary" href="#!"> <i
                                class="bi bi-heart-fill me-1 icon-xs bg-danger text-white rounded-circle"></i>
                            Louis, Billy and 126 others </a>
                    </li>
                    <li class="nav-item ms-sm-auto">
                        <a class="nav-link" href="#!"> <i
                                class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
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
                        <a class="nav-link mb-0 active" href="#!"> <i
                                class="bi bi-heart pe-1"></i>Liked (56)</a>
                    </li>
                    <!-- Card share action dropdown START -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link mb-0" id="feedActionShare6"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                        </a>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="feedActionShare6">
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a>
                            </li>
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
                                        class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Card share action dropdown END -->
                    <li class="nav-item">
                        <a class="nav-link mb-0" href="#!"> <i
                                class="bi bi-send-fill pe-1"></i>Send</a>
                    </li>
                </ul>
                <!-- Feed react END -->
            </div>
            <!-- Card Footer END -->
        </div> --}}
        <!-- Card feed item END -->

        <!-- Card feed item START -->
        {{-- <div class="card">
            <!-- Card header START -->
            <div class="card-header border-0 pb-0">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <!-- Avatar -->
                        <div class="avatar me-2">
                            <a href="#"> <img class="avatar-img rounded-circle"
                                    src="assets/images/avatar/04.jpg" alt=""> </a>
                        </div>
                        <!-- Title -->
                        <div>
                            <h6 class="card-title mb-0"> <a href="#!"> All in the Mind </a></h6>
                            <p class="mb-0 small">9 November at 23:29</p>
                        </div>
                    </div>
                    <!-- Card share action menu -->
                    <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
                        id="cardShareAction10" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </a>
                    <!-- Card share action dropdown menu -->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction10">
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
                <p>How do you protect your business against cyber-crime?</p>
                <div class="card card-body mt-4">
                    <!-- Title -->
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                        <span class="small">16/20 responded</span>
                        <span class="small">Results not visible to participants</span>
                    </div>

                    <!-- Results -->
                    <div class="vstack gap-4 gap-sm-3 mt-3">
                        <!-- Option 1 result START -->
                        <div class="d-flex align-items-center justify-content-between">
                            <!-- Progress bar -->
                            <div class="overflow-hidden w-100 me-3">
                                <div class="progress bg-primary bg-opacity-10 position-relative"
                                    style="height: 30px;">
                                    <div class="progress-bar bg-primary bg-opacity-25"
                                        role="progressbar" style="width: 25%" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                    <span
                                        class="position-absolute pt-1 ps-3 fs-6 fw-normal text-truncate w-100">We
                                        have cybersecurity insurance coverage </span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">25%</div>
                        </div>
                        <!-- Option 1 result END -->

                        <!-- Option 2 result START -->
                        <div class="d-flex align-items-center justify-content-between">
                            <!-- Progress bar -->
                            <div class="overflow-hidden w-100 me-3">
                                <div class="progress bg-primary bg-opacity-10 position-relative"
                                    style="height: 30px;">
                                    <div class="progress-bar bg-primary bg-opacity-25"
                                        role="progressbar" style="width: 15%" aria-valuenow="15"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                    <span
                                        class="position-absolute pt-1 ps-3 fs-6 fw-normal text-truncate w-100">Our
                                        dedicated staff will protect us</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">15%</div>
                        </div>
                        <!-- Option 2 result END -->

                        <!-- Option 3 result START -->
                        <div class="d-flex align-items-center justify-content-between">
                            <!-- Progress bar -->
                            <div class="overflow-hidden w-100 me-3">
                                <div class="progress bg-primary bg-opacity-10 position-relative"
                                    style="height: 30px;">
                                    <div class="progress-bar bg-primary bg-opacity-25"
                                        role="progressbar" style="width: 10%" aria-valuenow="10"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                    <span
                                        class="position-absolute pt-1 ps-3 fs-6 fw-normal text-truncate w-100">We
                                        give regular training for best practices</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">10%</div>
                        </div>
                        <!-- Option 3 result END -->

                        <!-- Option 4 result START -->
                        <div class="d-flex align-items-center justify-content-between">
                            <!-- Progress bar -->
                            <div class="overflow-hidden w-100 me-3">
                                <div class="progress bg-primary bg-opacity-10 position-relative"
                                    style="height: 30px;">
                                    <div class="progress-bar bg-primary bg-opacity-25"
                                        role="progressbar" style="width: 55%" aria-valuenow="55"
                                        aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                    <span
                                        class="position-absolute pt-1 ps-3 fs-6 fw-normal text-truncate w-100">Third-party
                                        vendor protection</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">55%</div>
                        </div>
                        <!-- Option 4 result END -->
                    </div>
                </div>

                <!-- Feed poll votes START -->
                <ul class="nav nav-divider mt-2 mb-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">263 votes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">2d left</a>
                    </li>
                </ul>
                <!-- Feed poll votes ED -->

                <!-- Feed react START -->
                <ul class="nav nav-stack pb-2 small mt-4">
                    <li class="nav-item">
                        <a class="nav-link active text-secondary" href="#!"> <i
                                class="bi bi-heart-fill me-1 icon-xs bg-danger text-white rounded-circle"></i>
                            Louis, Billy and 126 others </a>
                    </li>
                    <li class="nav-item ms-sm-auto">
                        <a class="nav-link" href="#!"> <i
                                class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
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
                        <a class="nav-link mb-0 active" href="#!"> <i
                                class="bi bi-heart pe-1"></i>Liked (56)</a>
                    </li>
                    <!-- Card share action dropdown START -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link mb-0" id="feedActionShare8"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                        </a>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="feedActionShare8">
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a>
                            </li>
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
                                        class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Card share action dropdown END -->
                    <li class="nav-item">
                        <a class="nav-link mb-0" href="#!"> <i
                                class="bi bi-send-fill pe-1"></i>Send</a>
                    </li>
                </ul>
                <!-- Feed react END -->
            </div>
            <!-- Card Footer END -->
        </div> --}}
        <!-- Card feed item END -->


        <!-- Card feed item START -->
        {{-- <div class="card">
            <!-- Card header START -->
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <!-- Avatar -->
                        <div class="avatar me-2">
                            <a href="#!"> <img class="avatar-img rounded-circle"
                                    src="assets/images/logo/11.svg" alt=""> </a>
                        </div>
                        <!-- Info -->
                        <div>
                            <h6 class="card-title mb-0"> <a href="#!"> Webestica </a></h6>
                            <p class="small mb-0">9 December at 10:00 </p>
                        </div>
                    </div>
                    <!-- Card share action START -->
                    <div class="dropdown">
                        <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
                            id="cardShareAction8" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction8">
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a>
                            </li>
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
                    <!-- Card share action START -->
                </div>
            </div>
            <!-- Card header START -->

            <!-- Card body START -->
            <div class="card-body">
                <p class="mb-0">The next-generation blog, news, and magazine theme for you to start
                    sharing your content today with beautiful aesthetics! This minimal &amp; clean Bootstrap
                    5 based theme is ideal for all types of sites that aim to provide users with content. <a
                        href="#!"> #bootstrap</a> <a href="#!"> #webestica </a> <a
                        href="#!"> #getbootstrap</a> <a href="#"> #bootstrap5 </a></p>
            </div>
            <!-- Card body END -->
            <a href="#!"> <img src="assets/images/post/3by2/03.jpg" alt=""> </a>
            <!-- Card body START -->
            <div class="card-body position-relative bg-light">
                <a href="#!" class="small stretched-link">https://blogzine.webestica.com</a>
                <h6 class="mb-0 mt-1">Blogzine - Blog and Magazine Bootstrap 5 Theme</h6>
                <p class="mb-0 small">Bootstrap based News, Magazine and Blog Theme</p>
            </div>
            <!-- Card body END -->

            <!-- Card Footer START -->
            <div class="card-footer py-3">
                <!-- Feed react START -->
                <ul class="nav nav-fill nav-stack small">
                    <li class="nav-item">
                        <a class="nav-link mb-0 active" href="#!"> <i
                                class="bi bi-heart pe-1"></i>Liked (56)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0" href="#!"> <i
                                class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
                    </li>
                    <!-- Card share action dropdown START -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link mb-0" id="feedActionShare7"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                        </a>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="feedActionShare7">
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a>
                            </li>
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
                                        class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Card share action dropdown END -->
                    <li class="nav-item">
                        <a class="nav-link mb-0" href="#!"> <i
                                class="bi bi-send-fill pe-1"></i>Send</a>
                    </li>
                </ul>
                <!-- Feed react END -->
            </div>
            <!-- Card Footer END -->

        </div> --}}
        <!-- Card feed item END -->

        <!-- Story START -->
        {{-- <div>
            <h6 class="mb-3">Suggested stories </h6>
            <div class="tiny-slider arrow-hover overflow-hidden">
                <div class="tns-outer" id="tns2-ow">
                    <div class="tns-liveregion tns-visually-hidden" aria-live="polite"
                        aria-atomic="true">slide <span class="current">1 to 5</span> of 6</div>
                    <div id="tns2-mw" class="tns-ovh">
                        <div class="tns-inner" id="tns2-iw">
                            <div class="tiny-slider-inner ms-n4  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                                data-arrow="true" data-dots="true" data-loop="false"
                                data-autoplay="false" data-items-xl="4" data-items-lg="3"
                                data-items-md="3" data-items-sm="3" data-items-xs="2"
                                data-gutter="12" data-edge="24" id="tns2"
                                style="transition-duration: 0s; transform: translate3d(0%, 0px, 0px);">

                                <!-- Slider items -->
                                <div class="tns-item tns-slide-active" id="tns2-item0">
                                    <!-- Card START -->
                                    <div class="card card-overlay-bottom border-0 position-relative h-150px"
                                        style="background-image:url(assets/images/post/1by1/02.jpg); background-position: center left; background-size: cover;">
                                        <div class="card-img-overlay d-flex align-items-center p-2">
                                            <div class="w-100 mt-auto">
                                                <!-- Name -->
                                                <a href="#!"
                                                    class="stretched-link text-white small">Judy
                                                    Nguyen</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card END -->
                                </div>

                                <!-- Slider items -->
                                <div class="tns-item tns-slide-active" id="tns2-item1">
                                    <!-- Card START -->
                                    <div class="card card-overlay-bottom border-0 position-relative h-150px"
                                        style="background-image:url(assets/images/post/1by1/03.jpg); background-position: center left; background-size: cover;">
                                        <div class="card-img-overlay d-flex align-items-center p-2">
                                            <div class="w-100 mt-auto">
                                                <!-- Name -->
                                                <a href="#!"
                                                    class="stretched-link text-white small">Samuel
                                                    Bishop</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card END -->
                                </div>

                                <!-- Slider items -->
                                <div class="tns-item tns-slide-active" id="tns2-item2">
                                    <!-- Card START -->
                                    <div class="card card-overlay-bottom border-0 position-relative h-150px"
                                        style="background-image:url(assets/images/post/1by1/04.jpg); background-position: center left; background-size: cover;">
                                        <div class="card-img-overlay d-flex align-items-center p-2">
                                            <div class="w-100 mt-auto">
                                                <!-- Name -->
                                                <a href="#!"
                                                    class="stretched-link text-white small">Carolyn
                                                    Ortiz</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card END -->
                                </div>

                                <!-- Slider items -->
                                <div class="tns-item tns-slide-active" id="tns2-item3">
                                    <!-- Card START -->
                                    <div class="card card-overlay-bottom border-0 position-relative h-150px"
                                        style="background-image:url(assets/images/post/1by1/05.jpg); background-position: center left; background-size: cover;">
                                        <div class="card-img-overlay d-flex align-items-center p-2">
                                            <div class="w-100 mt-auto">
                                                <!-- Name -->
                                                <a href="#!"
                                                    class="stretched-link text-white small">Amanda
                                                    Reed</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card END -->
                                </div>

                                <!-- Slider items -->
                                <div class="tns-item tns-slide-active" id="tns2-item4">
                                    <!-- Card START -->
                                    <div class="card card-overlay-bottom border-0 position-relative h-150px"
                                        style="background-image:url(assets/images/post/1by1/01.jpg); background-position: center left; background-size: cover;">
                                        <div class="card-img-overlay d-flex align-items-center p-2">
                                            <div class="w-100 mt-auto">
                                                <!-- Name -->
                                                <a href="#!"
                                                    class="stretched-link text-white small">Lori
                                                    Stevens</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card END -->
                                </div>

                                <!-- Slider items -->
                                <div class="tns-item" id="tns2-item5" aria-hidden="true"
                                    tabindex="-1">
                                    <!-- Card START -->
                                    <div class="card card-overlay-bottom border-0 position-relative h-150px"
                                        style="background-image:url(assets/images/post/1by1/06.jpg); background-position: center left; background-size: cover;">
                                        <div class="card-img-overlay d-flex align-items-center p-2">
                                            <div class="w-100 mt-auto">
                                                <!-- Name -->
                                                <a href="#!"
                                                    class="stretched-link text-white small">Joan
                                                    Wallace</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card END -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tns-nav" aria-label="Carousel Pagination"><button type="button"
                            data-nav="0" aria-controls="tns2" style=""
                            aria-label="Carousel Page 1 (Current Slide)"
                            class="tns-nav-active"></button><button type="button" data-nav="1"
                            tabindex="-1" aria-controls="tns2" style=""
                            aria-label="Carousel Page 2"></button><button type="button"
                            data-nav="2" tabindex="-1" aria-controls="tns2"
                            style="display: none;" aria-label="Carousel Page 3"></button><button
                            type="button" data-nav="3" tabindex="-1" aria-controls="tns2"
                            style="display:none" aria-label="Carousel Page 4"></button><button
                            type="button" data-nav="4" tabindex="-1" aria-controls="tns2"
                            style="display:none" aria-label="Carousel Page 5"></button><button
                            type="button" data-nav="5" tabindex="-1" aria-controls="tns2"
                            style="display:none" aria-label="Carousel Page 6"></button></div>
                    <div class="tns-controls" aria-label="Carousel Navigation" tabindex="0"><button
                            type="button" data-controls="prev" tabindex="-1" aria-controls="tns2"
                            disabled=""><i class="fa-solid fa-chevron-left"></i></button><button
                            type="button" data-controls="next" tabindex="-1"
                            aria-controls="tns2"><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Story END -->

        <!-- Card feed item START -->
        {{-- <div class="card">
            <!-- Card header START -->
            <div class="card-header border-0 pb-0">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <!-- Avatar -->
                        <div class="avatar avatar-story me-2">
                            <a href="#!"> <img class="avatar-img rounded-circle"
                                    src="assets/images/avatar/12.jpg" alt=""> </a>
                        </div>
                        <!-- Info -->
                        <div>
                            <div class="nav nav-divider">
                                <h6 class="nav-item card-title mb-0"> <a href="#!"> Joan Wallace
                                    </a></h6>
                                <span class="nav-item small"> 1day</span>
                            </div>
                            <p class="mb-0 small">12 January at 12:00</p>
                        </div>
                    </div>
                    <!-- Card feed action dropdown START -->
                    <div class="dropdown">
                        <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2"
                            id="cardFeedAction2" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <!-- Card feed action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction2">
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a>
                            </li>
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
                    <!-- Card feed action dropdown END -->
                </div>
            </div>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body pb-0">
                <p>Comfort reached gay perhaps chamber his <a href="#!">#internship</a> <a
                        href="#!">#hiring</a> <a href="#!">#apply</a> </p>
            </div>
            <!-- Card img -->
            <div class="overflow-hidden fullscreen-video w-100">

                <!-- HTML video START -->
                <div class="player-wrapper overflow-hidden">
                    <div tabindex="0"
                        class="plyr plyr--full-ui plyr--video plyr--html5 plyr--fullscreen-enabled plyr--paused plyr--stopped plyr--pip-supported plyr__poster-enabled">
                        <div class="plyr__controls"><button class="plyr__controls__item plyr__control"
                                type="button" data-plyr="play" aria-label="Play"><svg
                                    class="icon--pressed" aria-hidden="true" focusable="false">
                                    <use xlink:href="#plyr-pause"></use>
                                </svg><svg class="icon--not-pressed" aria-hidden="true"
                                    focusable="false">
                                    <use xlink:href="#plyr-play"></use>
                                </svg><span class="label--pressed plyr__sr-only">Pause</span><span
                                    class="label--not-pressed plyr__sr-only">Play</span></button>
                            <div class="plyr__controls__item plyr__progress__container">
                                <div class="plyr__progress"><input data-plyr="seek" type="range"
                                        min="0" max="100" step="0.01" value="0"
                                        autocomplete="off" role="slider" aria-label="Seek"
                                        aria-valuemin="0" aria-valuemax="0" aria-valuenow="0"
                                        id="plyr-seek-1552" aria-valuetext="00:00 of 00:00"
                                        style="--value: 0%;"><progress class="plyr__progress__buffer"
                                        min="0" max="100" value="0"
                                        role="progressbar" aria-hidden="true">% buffered</progress><span
                                        class="plyr__tooltip">00:00</span></div>
                            </div>
                            <div class="plyr__controls__item plyr__time--current plyr__time"
                                aria-label="Current time">00:00</div>
                            <div class="plyr__controls__item plyr__volume"><button type="button"
                                    class="plyr__control" data-plyr="mute"><svg class="icon--pressed"
                                        aria-hidden="true" focusable="false">
                                        <use xlink:href="#plyr-muted"></use>
                                    </svg><svg class="icon--not-pressed" aria-hidden="true"
                                        focusable="false">
                                        <use xlink:href="#plyr-volume"></use>
                                    </svg><span class="label--pressed plyr__sr-only">Unmute</span><span
                                        class="label--not-pressed plyr__sr-only">Mute</span></button><input
                                    data-plyr="volume" type="range" min="0" max="1"
                                    step="0.05" value="1" autocomplete="off" role="slider"
                                    aria-label="Volume" aria-valuemin="0" aria-valuemax="100"
                                    aria-valuenow="100" id="plyr-volume-1552" aria-valuetext="100.0%"
                                    style="--value: 100%;"></div><button
                                class="plyr__controls__item plyr__control" type="button"
                                data-plyr="captions"><svg class="icon--pressed" aria-hidden="true"
                                    focusable="false">
                                    <use xlink:href="#plyr-captions-on"></use>
                                </svg><svg class="icon--not-pressed" aria-hidden="true"
                                    focusable="false">
                                    <use xlink:href="#plyr-captions-off"></use>
                                </svg><span class="label--pressed plyr__sr-only">Disable
                                    captions</span><span class="label--not-pressed plyr__sr-only">Enable
                                    captions</span></button>
                            <div class="plyr__controls__item plyr__menu"><button aria-haspopup="true"
                                    aria-controls="plyr-settings-1552" aria-expanded="false"
                                    type="button" class="plyr__control" data-plyr="settings"><svg
                                        aria-hidden="true" focusable="false">
                                        <use xlink:href="#plyr-settings"></use>
                                    </svg><span class="plyr__sr-only">Settings</span></button>
                                <div class="plyr__menu__container" id="plyr-settings-1552"
                                    hidden="">
                                    <div>
                                        <div id="plyr-settings-1552-home">
                                            <div role="menu"><button data-plyr="settings"
                                                    type="button"
                                                    class="plyr__control plyr__control--forward"
                                                    role="menuitem" aria-haspopup="true"
                                                    hidden=""><span>Captions<span
                                                            class="plyr__menu__value">Disabled</span></span></button><button
                                                    data-plyr="settings" type="button"
                                                    class="plyr__control plyr__control--forward"
                                                    role="menuitem" aria-haspopup="true"
                                                    hidden=""><span>Quality<span
                                                            class="plyr__menu__value">undefined</span></span></button><button
                                                    data-plyr="settings" type="button"
                                                    class="plyr__control plyr__control--forward"
                                                    role="menuitem"
                                                    aria-haspopup="true"><span>Speed<span
                                                            class="plyr__menu__value">Normal</span></span></button>
                                            </div>
                                        </div>
                                        <div id="plyr-settings-1552-captions" hidden=""><button
                                                type="button"
                                                class="plyr__control plyr__control--back"><span
                                                    aria-hidden="true">Captions</span><span
                                                    class="plyr__sr-only">Go back to previous
                                                    menu</span></button>
                                            <div role="menu"></div>
                                        </div>
                                        <div id="plyr-settings-1552-quality" hidden=""><button
                                                type="button"
                                                class="plyr__control plyr__control--back"><span
                                                    aria-hidden="true">Quality</span><span
                                                    class="plyr__sr-only">Go back to previous
                                                    menu</span></button>
                                            <div role="menu"></div>
                                        </div>
                                        <div id="plyr-settings-1552-speed" hidden=""><button
                                                type="button"
                                                class="plyr__control plyr__control--back"><span
                                                    aria-hidden="true">Speed</span><span
                                                    class="plyr__sr-only">Go back to previous
                                                    menu</span></button>
                                            <div role="menu"><button data-plyr="speed"
                                                    type="button" role="menuitemradio"
                                                    class="plyr__control" aria-checked="false"
                                                    value="0.5"><span>0.5×</span></button><button
                                                    data-plyr="speed" type="button"
                                                    role="menuitemradio" class="plyr__control"
                                                    aria-checked="false"
                                                    value="0.75"><span>0.75×</span></button><button
                                                    data-plyr="speed" type="button"
                                                    role="menuitemradio" class="plyr__control"
                                                    aria-checked="true"
                                                    value="1"><span>Normal</span></button><button
                                                    data-plyr="speed" type="button"
                                                    role="menuitemradio" class="plyr__control"
                                                    aria-checked="false"
                                                    value="1.25"><span>1.25×</span></button><button
                                                    data-plyr="speed" type="button"
                                                    role="menuitemradio" class="plyr__control"
                                                    aria-checked="false"
                                                    value="1.5"><span>1.5×</span></button><button
                                                    data-plyr="speed" type="button"
                                                    role="menuitemradio" class="plyr__control"
                                                    aria-checked="false"
                                                    value="1.75"><span>1.75×</span></button><button
                                                    data-plyr="speed" type="button"
                                                    role="menuitemradio" class="plyr__control"
                                                    aria-checked="false"
                                                    value="2"><span>2×</span></button><button
                                                    data-plyr="speed" type="button"
                                                    role="menuitemradio" class="plyr__control"
                                                    aria-checked="false"
                                                    value="4"><span>4×</span></button></div>
                                        </div>
                                    </div>
                                </div>
                            </div><button class="plyr__controls__item plyr__control" type="button"
                                data-plyr="pip"><svg aria-hidden="true" focusable="false">
                                    <use xlink:href="#plyr-pip"></use>
                                </svg><span class="plyr__sr-only">PIP</span></button><button
                                class="plyr__controls__item plyr__control" type="button"
                                data-plyr="fullscreen"><svg class="icon--pressed" aria-hidden="true"
                                    focusable="false">
                                    <use xlink:href="#plyr-exit-fullscreen"></use>
                                </svg><svg class="icon--not-pressed" aria-hidden="true"
                                    focusable="false">
                                    <use xlink:href="#plyr-enter-fullscreen"></use>
                                </svg><span class="label--pressed plyr__sr-only">Exit
                                    fullscreen</span><span class="label--not-pressed plyr__sr-only">Enter
                                    fullscreen</span></button>
                        </div>
                        <div class="plyr__video-wrapper"><video class="player-html"
                                crossorigin="anonymous" poster="assets/images/videos/poster.jpg"
                                data-poster="assets/images/videos/poster.jpg">
                                <source src="assets/images/videos/video-feed.mp4" type="video/mp4">
                            </video>
                            <div class="plyr__poster"
                                style="background-image: url(&quot;assets/images/videos/poster.jpg&quot;);">
                            </div>
                        </div>
                        <div class="plyr__captions"></div><button type="button"
                            class="plyr__control plyr__control--overlaid" data-plyr="play"
                            aria-label="Play"><svg aria-hidden="true" focusable="false">
                                <use xlink:href="#plyr-play"></use>
                            </svg><span class="plyr__sr-only">Play</span></button>
                    </div>
                </div>
                <!-- HTML video END -->

                <!-- Plyr resources and browser polyfills are specified in the pen settings -->
            </div>
            <!-- Feed react START -->
            <div class="card-body pt-0">
                <ul class="nav nav-stack py-3 small">
                    <li class="nav-item">
                        <a class="nav-link active" href="#!"> <i
                                class="bi bi-hand-thumbs-up-fill pe-1"></i>Liked (56)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#!"> <i
                                class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
                    </li>
                    <!-- Card share action START -->
                    <li class="nav-item dropdown ms-sm-auto">
                        <a class="nav-link mb-0" href="#" id="cardShareAction9"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                        </a>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction9">
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a>
                            </li>
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
                                        class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Card share action END -->
                </ul>
                <!-- Feed react END -->

                <!-- Add comment -->
                <div class="d-flex mb-3">
                    <!-- Avatar -->
                    <div class="avatar avatar-xs me-2">
                        <a href="#!"> <img class="avatar-img rounded-circle"
                                src="assets/images/avatar/12.jpg" alt=""> </a>
                    </div>

                    <!-- Comment box  -->
                    <form class="input-group">
                        <textarea data-autoresize="" class="form-control me-2 bg-light rounded" rows="1"
                            placeholder="Add a comment..."></textarea>
                        <button class="btn btn-primary mb-0 rounded" type="submit">Post</button>
                    </form>
                </div>
                <!-- Comment wrap START -->
                <ul class="comment-wrap list-unstyled mb-0">
                    <!-- Comment item START -->
                    <li class="comment-item">
                        <div class="d-flex">
                            <!-- Avatar -->
                            <div class="avatar avatar-xs">
                                <a href="#!"><img class="avatar-img rounded-circle"
                                        src="assets/images/avatar/05.jpg" alt=""></a>
                            </div>
                            <div class="ms-2">
                                <!-- Comment by -->
                                <div class="bg-light rounded-start-top-0 p-3 rounded">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-1"> <a href="#!"> Frances Guerrero </a>
                                        </h6>
                                        <small class="ms-2">5hr</small>
                                    </div>
                                    <p class="small mb-0">Preference any astonished unreserved Mrs.</p>
                                </div>
                                <!-- Comment react -->
                                <ul class="nav nav-divider py-2 small">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!"> Like (3)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!"> Reply</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#!"> View 5 replies</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Comment item nested START -->
                        <ul class="comment-item-nested list-unstyled">
                            <!-- Comment item START -->
                            <li class="comment-item">
                                <div class="d-flex">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs">
                                        <a href="#!"><img class="avatar-img rounded-circle"
                                                src="assets/images/avatar/06.jpg" alt=""></a>
                                    </div>
                                    <!-- Comment by -->
                                    <div class="ms-2">
                                        <div class="bg-light p-3 rounded">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="mb-1"> <a href="#!"> Lori Stevens </a>
                                                </h6>
                                                <small class="ms-2">2hr</small>
                                            </div>
                                            <p class="small mb-0">Dependent on so extremely delivered by.
                                                Yet ﻿no jokes worse her why.</p>
                                        </div>
                                        <!-- Comment react -->
                                        <ul class="nav nav-divider py-2 small">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#!"> Like (5)</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#!"> Reply</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <!-- Comment item END -->
                        </ul>
                        <!-- Comment item nested END -->
                    </li>
                    <!-- Comment item END -->
                </ul>
                <!-- Comment wrap END -->
            </div>
            <!-- Card body END -->
            <!-- Card footer START -->
            <div class="card-footer border-0 pt-0">
                <!-- Load more comments -->
                <a href="#!" role="button"
                    class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center"
                    data-bs-toggle="button" aria-pressed="true">
                    <div class="spinner-dots me-2">
                        <span class="spinner-dot"></span>
                        <span class="spinner-dot"></span>
                        <span class="spinner-dot"></span>
                    </div>
                    Load more comments
                </a>
            </div>
            <!-- Card footer END -->
        </div> --}}
        <!-- Card feed item END -->

        <!-- Load more button START -->
        {{-- <a href="#!" role="button" class="btn btn-loader btn-primary-soft"
            data-bs-toggle="button" aria-pressed="true">
            <span class="load-text"> Load more </span>
            <div class="load-icon">
                <div class="spinner-grow spinner-grow-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </a> --}}
        <!-- Load more button END -->

    </div>
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

</div> <!-- Row END -->
@endsection

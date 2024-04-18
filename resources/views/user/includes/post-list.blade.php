@foreach ($post as $value )
<div class="card">
    <!-- Card header START -->
    <div class="card-header border-0 pb-0">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <!-- Avatar -->
                <div class="avatar avatar-story me-2">
                    <a href="#!">
                        @if($value->client->image)
                            <img class="avatar-img rounded-circle"
                            src="{{asset('public/uploads/client/' . $value->client->image)}}" alt="">
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
                        <h6 class="nav-item card-title mb-0"> <a href="#!">{{$value->client->fname}} {{$value->client->middle_name}} {{$value->client->last_name}}
                            </a></h6>
                        <span class="nav-item small">{{$value->created_at->diffForHumans()}}</span>
                    </div>
                    {{-- <span class="nav-item mb-0 small"><i class="bi bi-briefcase-fill me-1"></i>{{$client->designation}}</span> --}}
                    @if ($client->current_country_id)
                    <span class="nav-item mb-0 small"><i class="bi bi-geo-alt-fill me-1"></i>{{$value->client->currentcountry?->name}}@if($value->client->current_city_id), {{$value->client->currentstate?->name}} @endif</span>
                    @endif
                    <span class="nav-item small" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Public" data-bs-original-title="Public"> <i class="bi bi-globe"></i> </span>
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
                    <li><a class="dropdown-item edit-post" data-post-id="{{ $value->id }}" href="#" data-toggle="modal" data-target="#editPostModal"> <i
                                    class="bi bi-pencil-square fa-fw pe-2"></i>Edit post</a></li>
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
        @if($value->image)
        <img class="card-img" src="{{asset('public/uploads/post/' . $value->image)}}" alt="Post">
        @endif
        {{-- <img class="card-img" src="assets/images/post/3by2/01.jpg" alt="Post"> --}}
        <!-- Feed react START -->
        <ul class="nav nav-stack py-3 small">
            <li class="nav-item">
                <a class="nav-link active" href="#!" data-bs-container="body"
                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true"
                    data-bs-custom-class="tooltip-text-start"
                    data-bs-title="Frances Guerrero<br> Lori Stevens<br> Billy Vasquez<br> Judy Nguyen<br> Larry Lawson<br> Amanda Reed<br> Louis Crawford">
                    <i class="bi bi-hand-thumbs-up-fill pe-1"></i>Liked (56)</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#!"><i class="bi bi-chat-fill pe-1"></i>Comments ({{$value->comments->count()}})</a>
            </li>
            <!-- Card share action START -->
           @include('user.includes.share')
            <!-- Card share action END -->
        </ul>
        <!-- Feed react END -->

        <!-- Add comment -->
        @include('user.includes.comment')
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
</div>
@endforeach

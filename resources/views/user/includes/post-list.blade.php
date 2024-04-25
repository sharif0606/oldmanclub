@foreach ($post as $value)
    <div class="card">
        <!-- Card header START -->
        <div class="card-header border-0 pb-0">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <!-- Avatar -->
                    <div class="avatar avatar-story me-2">
                        <a href="{{ route('client_by_search', $value->client->username) }}">
                            @if ($value->client->image)
                                <img class="avatar-img rounded-circle"
                                    src="{{ asset('public/uploads/client/' . $value->client->image) }}" alt="">
                            @else
                                <img class="avatar-img rounded-circle" src="{{ asset('public/images/download.jpg') }}"
                                    alt="">
                            @endif
                            {{-- <img class="avatar-img rounded-circle" src="{{asset($client->image?$client->image:default_image())}}" alt=""> --}}
                        </a>
                    </div>
                    <!-- Info -->
                    <div>
                        <div class="nav nav-divider">
                            <h6 class="nav-item card-title mb-0"> <a
                                    href="{{ route('client_by_search', $value->client->username) }}">{{ $value->client->fname }}
                                    {{ $value->client->middle_name }} {{ $value->client->last_name }}
                                </a></h6>
                            <span class="nav-item small">{{ $value->created_at->diffForHumans() }}</span>
                        </div>
                        {{-- <span class="nav-item mb-0 small"><i class="bi bi-briefcase-fill me-1"></i>{{$client->designation}}</span> --}}
                        {{$client->id}}
                        @if ($client->current_country_id)
                            <span class="nav-item mb-0 small"><i
                                    class="bi bi-geo-alt-fill me-1"></i>{{ $value->client->currentcountry?->name }}
                                @if ($value->client->current_city_id)
                                    , {{ $value->client->currentstate?->name }}
                                @endif
                            </span>
                        @else
                            <span class="nav-item mb-0 small">This Account Location Not Set Yet.</span>
                        @endif
                        <span class="nav-item small" data-bs-toggle="tooltip" data-bs-placement="top"
                            aria-label="Public" data-bs-original-title="Public"> <i class="bi bi-globe"></i> </span>

                    </div>
                </div>
                <!-- Card feed action dropdown START -->
                <div class="dropdown">
                    <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardFeedAction"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </a>
                    <!-- Card feed action dropdown menu -->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardFeedAction">
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save
                                post</a></li>
                        <li><a class="dropdown-item edit-post" data-post-id="{{ $value->id }}" href="#"
                                data-toggle="modal" data-target="#editPostModal"> <i
                                    class="bi bi-pencil-square fa-fw pe-2"></i>Edit post</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow
                                lori ferguson </a>
                        </li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide
                                post</a></li>
                        <li><a class="dropdown-item" href="#"> <i
                                    class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report
                                post</a></li>
                    </ul>
                </div>
                <!-- Card feed action dropdown END -->
            </div>
        </div>
        <!-- Card header END -->
        <!-- Card body START -->
        <div class="card-body">
            <p>{{ $value->message }}.</p>
            <!-- Card img -->
            @if ($value->image)
                <img class="card-img" src="{{ asset('public/uploads/post/' . $value->image) }}" alt="Post">
            @endif
            {{-- <img class="card-img" src="assets/images/post/3by2/01.jpg" alt="Post"> --}}
            <div class="post-reaction" data-post-id="{{ $value->id }}">
                <!-- Feed react START -->
                @php $clients = []; @endphp
                <ul class="nav nav-stack pb-2 small mt-2">
                    @forelse ($value->reactions as $reaction)
                        @php
                            if ($reaction->client_id == currentUserId()) {
                                $clients[] = 'You';
                            } else {
                                $clients[] =
                                    $reaction->client->fname .
                                    ' ' .
                                    $reaction->client->middle_name .
                                    ' ' .
                                    $reaction->client->last_name;
                            }

                            $clientNames = implode(',<br> ', $clients);
                            $react_lists = implode(',', $clients);
                        @endphp
                        <li class="nav-item post-like" data-post-id="{{ $value->id }}">
                            <a class="nav-link active text-secondary" href="#" data-bs-container="body"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true"
                                data-bs-custom-class="tooltip-text-start"
                                data-bs-title="{{ $clientNames }}">{{-- <i class="bi bi-heart-fill me-1 icon-xs bg-danger text-white rounded-circle"></i> --}}
                                <img src="{{ asset('public/user/assets/images/reactions/' . $reaction->type . '.png') }}"
                                    width="24px" height="24px">
                            </a>
                        </li>
                    @empty
                    @endforelse
                    @php
                        // Get the last reaction provided by the current user
                        $currentClientReaction = $value->reactions()->where('client_id', currentUserId())->first();
                        // Get the last reaction provider user if available
                        $lastReactionProvider = $value->lastReaction
                            ? $value->lastReaction->client->fname .
                                ' ' .
                                $value->lastReaction->client->middle_name .
                                ' ' .
                                $value->lastReaction->client->last_name
                            : null;
                    @endphp

                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="#">
                            @if ($currentClientReaction && !$lastReactionProvider)
                                {{ $value->reactions()->count() }}
                            @elseif($currentClientReaction && $lastReactionProvider)
                                {{ $lastReactionProvider }} and {{ $value->reactions()->count() }} others
                            @endif
                        </a>
                    </li>
                    <li class="nav-item ms-sm-auto">
                        @if ($value->comments()->count() > 0)
                            <a class="nav-link d-inline" href="#!">{{ $value->comments()->count() }}<i
                                    class="bi bi-chat-fill pe-2"></i></a>
                        @endif
                        {{-- <a class="nav-link d-inline" href="#!">Share<i
                            class="bi bi-reply-fill"></i></a> --}}
                    </li>
                </ul>
                <!-- Feed react END -->
                <!-- Feed react START -->
                <ul class="nav nav-pills nav-pills-light nav-fill nav-stack small border-top border-bottom py-1 mb-3">

                    <li class="nav-item dropdown dropup">
                        <a class="nav-link mb-0 active" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-hand-thumbs-up pe-1"></i>Like</a>
                        <ul class="dropdown-menu rounded-left rounded-right p-2" aria-labelledby="postReaction">
                            @php
                                $reactions = $value->reactions->pluck('type')->toArray();
                                $reactionId = $value->reactions->where('client_id', currentUserId())->first();
                            @endphp

                            @foreach (['like', 'love', 'care', 'haha', 'wow', 'sad', 'angry'] as $reactionType)
                                @if (!in_array($reactionType, $reactions))
                                    @if ($reactionId)
                                        <li class="nav-item d-inline"
                                            onclick="post_reaction({{ $value->id }}, event, '{{ $reactionType }}',{{ $reactionId->id }})">
                                            <a class="nav-link m-0 d-inline" href="#">
                                                <img src="{{ asset('public/user/assets/images/reactions/' . $reactionType . '.png') }}"
                                                    width="24px" height="24px">
                                            </a>
                                        </li>
                                    @else
                                        <li class="nav-item d-inline"
                                            onclick="post_reaction({{ $value->id }}, event, '{{ $reactionType }}')">
                                            <a class="nav-link m-0 d-inline" href="#">
                                                <img src="{{ asset('public/user/assets/images/reactions/' . $reactionType . '.png') }}"
                                                    width="24px" height="24px">
                                            </a>
                                        </li>
                                    @endif
                                @endif
                            @endforeach





                        </ul>
                    </li>
                    <!-- Card share action menu END -->
                    <li class="nav-item">
                        <a class="nav-link mb-0" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comment</a>
                    </li>
                    <!-- Card share action menu START -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link mb-0" id="cardShareAction4" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                        </a>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction4">
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-envelope fa-fw pe-2"></i>Send
                                    via Direct Message</a></li>
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy
                                    link
                                    to post</a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share
                                    post
                                    via …</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- Feed react END -->
            </div>
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

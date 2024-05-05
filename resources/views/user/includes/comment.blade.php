@if($value->comments()->count() == 0)
<div class="d-flex mb-3">
    <div class="avatar avatar-xs me-2">
        @if ($client->image)
            <!-- Avatar -->
            <a href="{{ route('client_by_search', $client->username) }}"> <img class="avatar-img rounded-circle"
                    src="{{ asset('public/uploads/client/' . $client->image) }}" alt=""> </a>
        @else
            <a href="{{ route('client_by_search', $client->username) }}"><img class="avatar-img rounded-circle" src="{{ asset('public/images/download.jpg') }}"
                    alt=""></a>
        @endif
    </div>
    <!-- Comment box  -->
    {{-- action="{{ route('post-comment.store') }}" method="post" --}}
    <form class="nav nav-item w-100 position-relative comment-form">
        @csrf
        <textarea data-autoresize="" class="form-control pe-5 bg-light" rows="1" placeholder="Add a comment..."
            name="content" required style="border-radius:20px;"></textarea>
        <input type="hidden" name="post_id" value="{{ $value->id }}" data-post-id="{{$value->id}}">
        <button class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0"
            type="submit">
            <i class="bi bi-send-fill"> </i>
        </button>
    </form>
</div>
@endif
<!-- Comment wrap START -->
<div class="comments-container">
    <ul class="comment-wrap list-unstyled" data-post-id="{{$value->id}}">
        <!-- Loop through comments -->
        @forelse($value->comments as $comment)
            <!-- Comment item START -->
            <li class="comment-item" data-comment-id="{{ $comment->id }}">
                <div class="d-flex position-relative">
                    <!-- Avatar -->
                    <div class="avatar avatar-xs">
                        @if ($comment->client->image)
                            <a href="{{ route('client_by_search', $comment->client->username) }}"> <img class="avatar-img rounded-circle"
                                    src="{{ asset('public/uploads/client/' . $comment->client->image) }}"
                                    alt=""></a>
                        @else
                            <a href="{{ route('client_by_search', $comment->client->username) }}"><img class="avatar-img rounded-circle"
                                    src="{{ asset('public/images/download.jpg') }}" alt=""></a>
                        @endif
                    </div>
                    <div class="ms-2">
                        @php 
                            $followIds = \App\Models\User\Follow::where('following_id',currentUserId())->pluck('follower_id')->toArray(); 
                            //print_r($followIds);
                        @endphp
                        <!-- Comment by -->
                        <div class="bg-light rounded-start-top-1 p-2 rounded">
                            <div class="d-flex justify-content-between">
                                <h6 class="my-0" style="font-size: 0.8375rem;">
                                    <a href="{{ route('client_by_search', $comment->client->username) }}"> @if($comment->client->display_name)
                                        {{$comment->client->display_name}}
                                        @else
                                        {{$comment->client->fname}} {{$comment->client->middle_name}} {{$comment->client->last_name}}
                                        @endif
                                        @if($comment->client->id != currentUserId())
                                            @if (!in_array($comment->client->id, $followIds))
                                                <form action="{{ route('follow.store') }}" class="d-inline" method="post">
                                                    @csrf
                                                    <input type="hidden" name="username" value="{{ Session::get('username') }}">
                                                    <button type="submit" class="badge text-primary me-2" style="border:none;font-weight:bold;font-size:13px;"> Follow
                                                    </button>
                                                </form>
                                            @else
                                            @php $follow = \App\Models\User\Follow::where('follower_id',$comment->client->id)->where('following_id',currentUserId())->first(); @endphp
                                                {{-- <form action="{{ route('follow.destroy', $follow) }}" class="d-inline" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="badge text-danger me-2" style="border:none;font-weight:bold;font-size:13px;"> Unfollow </button>
                                                </form> --}}
                                            @endif
                                        @endif
                                    </a>
                                    </h6>
                                <!-- Replace with user name -->
                                <small class="ms-2">{{ $comment->created_at->diffForHumans() }}</small>
                                <!-- Replace with comment creation time -->
                            </div>
                            <p class="small mb-0">{{ $comment->content }}</p> <!-- Replace with comment content -->
                        </div>
                        <!-- Comment react -->
                        <ul class="nav nav-divider py-2 small">
                            <!-- Add your comment reaction buttons here -->
                            <li class="nav-item dropdown position-relative" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <a class="nav-link" href="#!" id="card-comment-reaction"> Like (<span
                                        class="like-count" data-comment-id="{{ $comment->id }}">{{ $comment->reactions()->where('type', 'like')->count() }}</span>)</a>
                                <!-- Replace with like count -->
                                @php
                                    $currentUserLiked = $comment
                                        ->reactions()
                                        ->where('client_id', currentUserId())
                                        ->where('comment_id', $comment->id)
                                        ->where('type', 'like')
                                        ->exists();
                                @endphp
                                @if (!$currentUserLiked)
                                    <ul class="dropdown-menu dropdown-menu-start p-2"
                                        aria-labelledby="card-comment-reaction">
                                        {{-- $comment->reactions --}}
                                        <a href="#" onclick="reaction({{ $comment->id }},event,'like',this)"> 
                                            {{-- <i class="bi bi-hand-thumbs-up fa-fw pe-2"></i> --}}
                                            <img src="{{ asset('public/user/assets/images/reactions/like.gif')}}" width="32" height="32">
                                            </a>
                                            <a href="#"> 
                                                {{-- <i class="bi bi-hand-thumbs-up fa-fw pe-2"></i> --}}
                                                <img src="{{ asset('public/user/assets/images/reactions/love.gif')}}" width="26" height="26">
                                                </a>
                                        {{-- <a class="like-btn" href="#" data-comment-id="{{ $comment->id }}" data-reaction-type="dislike"> <i
                                            class="bi bi-hand-thumbs-down fa-fw pe-2"></i></a> --}}
                                    </ul>
                                @endif
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link reply-btn" onclick="reply({{ $comment->id }},event)">Reply</a>
                            </li>
                            <!-- Add view replies link if necessary -->
                            @if ($comment->replies->count() > 0)
                                <li class="nav-item">
                                    <a class="nav-link" href="#!"> View {{ $comment->replies->count() }}
                                        replies</a>
                                </li>
                            @endif
                        </ul>
                        {{-- action="{{ route('reply.store') }}" method="post" --}}
                        <!-- Reply Form (hidden by default) -->
                        <form class="nav nav-item w-100 position-relative reply-form my-2" style="display: none;" data-comment-id="{{ $comment->id }}" onsubmit="submitReplyForm(event, this)">
                            @csrf
                            <textarea data-autoresize="" name="content" class="form-control pe-5 bg-light" rows="1"
                                placeholder="Write your reply here..." name="content" required></textarea>
                            <input type="hidden" name="comment_id" value="{{ $comment->id }}" data-comment-id="{{ $comment->id }}">
                            <button
                                class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0"
                                type="submit">
                                <i class="bi bi-send-fill"> </i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Nested comments -->
                <ul class="comment-item-nested list-unstyled">
                    @if ($comment->replies->count() > 0)
                        <!-- Loop through nested comments -->
                        @forelse($comment->replies as $reply)
                            <!-- Nested comment item START -->
                            <li class="comment-item">
                                <div class="d-flex">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs">
                                        @if ($reply->client->image)
                                            <a href="#!"> <img class="avatar-img rounded-circle"
                                                    src="{{ asset('public/uploads/client/' . $reply->client->image) }}"
                                                    alt=""></a>
                                        @else
                                            <a href="#!"><img class="avatar-img rounded-circle"
                                                    src="{{ asset('public/images/download.jpg') }}" alt=""></a>
                                        @endif
                                    </div>
                                    <!-- Comment by -->
                                    <div class="ms-2">
                                        <div class="bg-light p-2 rounded">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="my-0" style="font-size: 0.8375rem;"> <a href="#!">{{ $reply->client->fname }}
                                                        {{ $reply->client->middle_name }}
                                                        {{ $reply->client->last_name }}</a></h6>
                                                <!-- Replace with user name -->
                                                <small class="ms-2">{{ $reply->created_at->diffForHumans() }}</small>
                                                <!-- Replace with reply creation time -->
                                            </div>
                                            <p class="small mb-0">{{ $reply->content }}</p>
                                            <!-- Replace with reply content -->
                                        </div>
                                        <!-- Comment react -->
                                        <ul class="nav nav-divider py-2 small">
                                            <!-- Add your reply reaction buttons here -->
                                            {{-- <li class="nav-item">
                                                <a class="nav-link" href="#!"> Like
                                                    ({{ $reply->likes_count }})</a>
                                                <!-- Replace with like count -->
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#!"> Reply</a>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <!-- Nested comment item END -->
                        @empty
                        @endforelse
                    @endif
                </ul>
                <!-- Load more replies -->
                <!-- Add logic to load more replies if necessary -->
            </li>
            <!-- Comment item END -->
        @empty
        @endforelse
    </ul>
</div>
@if($value->comments()->count() > 0)
<div class="d-flex mb-3">
    <div class="avatar avatar-xs me-2">
        @if ($client->image)
            <!-- Avatar -->
            <a href="{{ route('client_by_search', $client->username) }}"> <img class="avatar-img rounded-circle"
                    src="{{ asset('public/uploads/client/' . $client->image) }}" alt=""> </a>
        @else
            <a href="{{ route('client_by_search', $client->username) }}"><img class="avatar-img rounded-circle" src="{{ asset('public/images/download.jpg') }}"
                    alt=""></a>
        @endif
    </div>
    <!-- Comment box  -->
    {{-- action="{{ route('post-comment.store') }}" method="post" --}}
    <form class="nav nav-item w-100 position-relative comment-form">
        @csrf
        <textarea data-autoresize="" class="form-control pe-5 bg-light" rows="1" placeholder="Add a comment..."
            name="content" required style="border-radius:20px;"></textarea>
        <input type="hidden" name="post_id" value="{{ $value->id }}" data-post-id="{{$value->id}}">
        <button class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0"
            type="submit">
            <i class="bi bi-send-fill"> </i>
        </button>
    </form>
</div>
@endif

{{-- 
        <!-- Comment wrap START -->
        <ul class="comment-wrap list-unstyled">
            <!-- Comment item START -->
            <li class="comment-item">
                <div class="d-flex position-relative">
                    <!-- Avatar -->
                    <div class="avatar avatar-xs">
                        <a href="#!"><img class="{{ asset('public/user/assets/avatar-img rounded-circle')}}"
                                src="{{ asset('public/user/assets/images/avatar/05.jpg')}}" alt=""></a>
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
                                        src="{{ asset('public/user/assets/images/avatar/06.jpg')}}" alt=""></a>
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
                                        src="{{ asset('public/user/assets/images/avatar/07.jpg')}}" alt=""></a>
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
                                src="{{ asset('public/user/assets/images/avatar/05.jpg')}}" alt=""></a>
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

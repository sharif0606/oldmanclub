@if ($value->comments()->count() == 0)
<div class="d-flex mb-3">
    <div class="avatar avatar-xs me-2">
        @if ($client->image)
        <!-- Avatar -->
        <a href="{{ route('client_by_search', $client->username) }}"> <img class="avatar-img rounded-circle"
                src="{{ asset('public/uploads/client/' . $client->image) }}" alt=""> </a>
        @else
        <a href="{{ route('client_by_search', $client->username) }}"><img class="avatar-img rounded-circle"
                src="{{ asset('public/images/download.jpg') }}" alt=""></a>
        @endif
    </div>
    <!-- Comment box  -->
    {{-- action="{{ route('post-comment.store') }}" method="post" --}}
    <form class="nav nav-item w-100 position-relative comment-form">
        @csrf
        <textarea data-autoresize="" class="form-control pe-5 bg-light" rows="1" placeholder="Add a comment..."
            name="content" required style="border-radius:20px;"></textarea>
        <input type="hidden" name="post_id" value="{{ $value->id }}" data-post-id="{{ $value->id }}">
        <button class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0"
            type="submit">
            <i class="bi bi-send-fill"> </i>
        </button>
    </form>
</div>
@endif
<!-- Comment wrap START -->
<div class="comments-container">
    <ul class="comment-wrap list-unstyled" data-post-id="{{ $value->id }}">
        <!-- Loop through comments -->
        @forelse($value->comments as $comment)
        <!-- Comment item START -->
        <li class="comment-item" data-comment-id="{{ $comment->id }}">
            <div class="d-flex position-relative">
                <!-- Avatar -->
                <div class="avatar avatar-xs">
                    @if ($comment->client->image)
                    <a href="{{ route('client_by_search', $comment->client->username) }}"> <img
                            class="avatar-img rounded-circle"
                            src="{{ asset('public/uploads/client/' . $comment->client->image) }}"
                            alt=""></a>
                    @else
                    <a href="{{ route('client_by_search', $comment->client->username) }}"><img
                            class="avatar-img rounded-circle" src="{{ asset('public/images/download.jpg') }}"
                            alt=""></a>
                    @endif
                </div>
                <div class="ms-2">
                    @php
                    $followIds = \App\Models\User\Follow::where('following_id', currentUserId())
                    ->pluck('follower_id')
                    ->toArray();
                    //print_r($followIds);
                    @endphp
                    <!-- Comment by -->
                    <div class="bg-light rounded-start-top-1 p-2 rounded">
                        <div class="d-flex justify-content-between">
                            <h6 class="my-0" style="font-size: 0.8375rem;">
                                <a href="{{ route('client_by_search', $comment->client->username) }}">
                                    @if ($comment->client->display_name)
                                    {{ $comment->client->display_name }}
                                    @else
                                    {{ $comment->client->fname }} {{ $comment->client->middle_name }}
                                    {{ $comment->client->last_name }}
                                    @endif
                                    @if ($comment->client->id != currentUserId())
                                    @if (!in_array($comment->client->id, $followIds))
                                    <form action="{{ route('follow.store') }}" class="d-inline"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="username"
                                            value="{{ $comment->client->username }}">
                                        <button type="submit" class="badge text-primary me-2"
                                            style="border:none;font-weight:bold;font-size:13px;"> Follow
                                        </button>
                                    </form>
                                    @else
                                    @php
                                    $follow = \App\Models\User\Follow::where('follower_id', $comment->client->id)
                                    ->where('following_id', currentUserId())
                                    ->first();
                                    @endphp
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
                    <ul class="nav nav-divider py-2 small comment-reaction" data-comment-id="{{ $comment->id }}">
                        <!-- Add your comment reaction buttons here -->
                        <li class="nav-item dropdown dropup" data-bs-toggle="dropdown" aria-expanded="false">
                            <a class="nav-link" href="#!" id="card-comment-reaction"> Like (<span
                                    class="like-count"
                                    data-comment-id="{{ $comment->id }}">{{ $comment->reactions()->count() }}</span>)</a>
                            <!-- Replace with like count -->
                            <ul class="dropdown-menu rounded-left rounded-right p-2"
                                aria-labelledby="commentReaction">
                                @php
                                $reactions = $comment->reactions->pluck('type')->toArray();
                                $reactionId = $comment->reactions->where('client_id', currentUserId())->first();
                                @endphp
                                @foreach (['like', 'love', 'care', 'haha', 'wow', 'sad', 'angry'] as $reactionType)
                                @if (!in_array($reactionType, $reactions))
                                @if ($reactionId)
                                <li class="d-inline"
                                    onclick="comment_reaction({{ $comment->id }}, event, '{{ $reactionType }}',{{ $reactionId->id }})">
                                    <a class="nav-link m-0 d-inline" href="#">
                                        <img src="{{ asset('public/user/assets/images/reactions/' . $reactionType . '.png') }}"
                                            width="24px" height="24px">
                                    </a>
                                </li>
                                @else
                                <li class="d-inline"
                                    onclick="comment_reaction({{ $comment->id }}, event, '{{ $reactionType }}')">
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
                        <li class="nav-item">
                            <a href="#" class="nav-link reply-btn"
                                onclick="reply({{ $comment->id }},event)">Reply</a>
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
                    <form class="nav nav-item w-100 position-relative reply-form my-2 ml-4" style="display: none;"
                        data-comment-id="{{ $comment->id }}">
                        <textarea data-autoresize="" name="content" class="form-control pe-5 bg-light" rows="1"
                            placeholder="Write your reply here..." required></textarea>
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}"
                            data-comment-id="{{ $comment->id }}">
                        <button
                            class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0"
                            type="submit">
                            <i class="bi bi-send-fill"> </i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Nested comments -->
            <ul class="reply-item-nested list-unstyled ms-4">
                @if ($comment->replies->count() > 0)
                <!-- Loop through nested comments -->
                @forelse($comment->replies as $reply)
                <!-- Nested comment item START -->
                @include('user.includes.reply', ['reply' => $reply])
                <!-- Nested comment item END -->
                @empty
                @endforelse
                @else
                
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
@if ($value->comments()->count() > 0)
<div class="d-flex mb-3">
    <div class="avatar avatar-xs me-2">
        @if ($client->image)
        <!-- Avatar -->
        <a href="{{ route('client_by_search', $client->username) }}"> <img class="avatar-img rounded-circle"
                src="{{ asset('public/uploads/client/' . $client->image) }}" alt=""> </a>
        @else
        <a href="{{ route('client_by_search', $client->username) }}"><img class="avatar-img rounded-circle"
                src="{{ asset('public/images/download.jpg') }}" alt=""></a>
        @endif
    </div>
    <!-- Comment box  -->
    {{-- action="{{ route('post-comment.store') }}" method="post" --}}
    <form class="nav nav-item w-100 position-relative comment-form">
        @csrf
        <textarea data-autoresize="" class="form-control pe-5 bg-light" rows="1" placeholder="Add a comment..."
            name="content" required style="border-radius:20px;"></textarea>
        <input type="hidden" name="post_id" value="{{ $value->id }}" data-post-id="{{ $value->id }}">
        <button class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0"
            type="submit">
            <i class="bi bi-send-fill"> </i>
        </button>
    </form>
</div>
@endif
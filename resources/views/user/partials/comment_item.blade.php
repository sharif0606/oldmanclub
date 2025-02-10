<!-- Comment item START -->
<li class="comment-item" data-comment-id="{{ $comment->id }}">
    <div class="d-flex position-relative">
        <!-- Avatar -->
        <div class="avatar avatar-xs">
            @if ($comment->client->image)
            <a href="{{ route('client_by_search', $comment->client->username) }}"> <img class="avatar-img rounded-circle"
                    src="{{ asset('public/uploads/client/' . $comment->client->image) }}" alt=""></a>
            @else
            <a href="{{ route('client_by_search', $comment->client->username) }}"><img class="avatar-img rounded-circle" src="{{ asset('public/images/download.jpg') }}"
                    alt=""></a>
            @endif
        </div>
        <div class="ms-2">
            <!-- Comment by -->
            <div class="bg-light rounded-start-top-1 p-2 rounded">
                <div class="d-flex justify-content-between">
                    <h6 class="my-0" style="font-size: 0.8375rem;">
                        <a href="{{ route('client_by_search', $comment->client->username) }}">{{ $comment->client->fname }} {{ $comment->client->middle_name }} {{ $comment->client->last_name }}</a>
                    </h6>
                    <!-- Replace with user name -->
                    <small class="ms-2">{{ $comment->created_at->diffForHumans() }}</small>
                    <!-- Replace with comment creation time -->
                </div>
                <p class="small mb-0">{{ $comment->content }}</p> <!-- Replace with comment content -->
            </div>
            <!-- Comment react -->
            @if ($comment->replies->isNotEmpty())
            <ul class="nav nav-divider py-2 small reply-reaction" data-reply-id="{{$reply->id}}">
                <!-- Add your reply reaction buttons here -->
                <li class="nav-item dropdown dropup" data-bs-toggle="dropdown" aria-expanded="false">
                    <a class="nav-link" href="#!" id="card-reply-reaction" ondblclick="myFunction()"> Like (<span
                            class="reply-like-count"
                            data-reply-id="{{ $reply->id }}">{{ $reply->reactions()->count() }}</span>)</a>
                    <!-- Replace with like count -->
                    <ul class="dropdown-menu rounded-left rounded-right p-2"
                        aria-labelledby="replyReaction">
                        @php
                        $reactions = $reply->reactions->pluck('type')->toArray();
                        $reactionId = $reply->reactions->where('client_id', currentUserId())->first();
                        @endphp
                        @foreach (['like', 'love', 'care', 'haha', 'wow', 'sad', 'angry',''] as $reactionType)
                        @if (!in_array($reactionType, $reactions))
                        @if ($reactionId)
                        <li class="d-inline"
                            onclick="reply_reaction({{ $reply->id }}, event, '{{ $reactionType }}',{{ $reactionId->id }})">
                            <a class="nav-link m-0 d-inline" href="#">
                                <img src="{{ asset('public/user/assets/images/reactions/' . $reactionType . '.png') }}"
                                    width="24px" height="24px">
                            </a>
                        </li>
                        @else
                        <li class="d-inline"
                            onclick="reply_reaction({{ $reply->id }}, event, '{{ $reactionType }}')">
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
                {{--<li class="nav-item">
                    <a class="nav-link" href="#!"> Reply</a>
                </li> --}}
            </ul>
            @else
            <ul class="nav nav-divider py-2 small reply-reaction">
                @include('user.partials.comment-reaction')
            </ul>
            @endif
            {{-- action="{{ route('reply.store') }}" method="post" --}}
            <!-- Reply Form (hidden by default) -->
            <form class="nav nav-item w-100 position-relative reply-form my-2" style="display: none;" data-comment-id="{{ $comment->id }}">
                @csrf
                <textarea data-autoresize="" onkeydown="checkKey(event,this)" name="content" class="form-control pe-5 bg-light" rows="1"
                    placeholder="Write your reply here..." required></textarea>
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
    <ul class="reply-item-nested list-unstyled">
        @if ($comment->replies->count() > 0)
        <!-- Loop through nested comments -->
        @forelse($comment->replies as $reply)
        <!-- Nested comment item START -->
        @include('user.includes.reply', ['reply' => $reply])
        <!-- Nested comment item END -->
        @empty
        @endforelse
        @endif
    </ul>
</li>
<!-- Comment item END -->
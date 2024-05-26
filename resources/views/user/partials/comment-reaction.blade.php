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
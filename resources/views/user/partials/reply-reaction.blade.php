<li class="nav-item dropdown dropup" data-bs-toggle="dropdown" aria-expanded="false">
    <a class="nav-link" href="#!" id="card-reply-reaction"> Like (<span
            class="reply-like-count"
            data-reply-id="{{ $reply->id }}">{{ $reply->reactions()->count() }}</span>)</a>
    <!-- Replace with like count -->
    <ul class="dropdown-menu rounded-left rounded-right p-2"
    aria-labelledby="replyReaction">
        @php
            $reactions = $reply->reactions->pluck('type')->toArray();
            $reactionId = $reply->reactions->where('client_id', currentUserId())->first();
        @endphp
        @foreach (['like', 'love', 'care', 'haha', 'wow', 'sad', 'angry'] as $reactionType)
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
                        onclick="comment_reaction({{ $reply->id }}, event, '{{ $reactionType }}')">
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
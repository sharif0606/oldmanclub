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
        <a class="nav-link mb-0 active" href="#" data-bs-toggle="dropdown" aria-expanded="false"> <i
                class="bi bi-hand-thumbs-up pe-1"></i>Like</a>
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
            <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send
                    via Direct Message</a></li>
            <li><a class="dropdown-item" href="#"> <i
                        class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
            <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link
                    to post</a></li>
            <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post
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
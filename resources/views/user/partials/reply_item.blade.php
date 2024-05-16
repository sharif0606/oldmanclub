<!-- Nested comment item START -->
<li class="comment-item">
    <div class="d-flex">
        <!-- Avatar -->
        <div class="avatar avatar-xs">
            @if ($reply->client->image)
                <a href="{{ route('client_by_search', $reply->client->username) }}"> <img
                        class="avatar-img rounded-circle"
                        src="{{ asset('public/uploads/client/' . $reply->client->image) }}" alt=""></a>
            @else
                <a href="{{ route('client_by_search', $reply->client->username) }}"><img class="avatar-img rounded-circle"
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
            <ul class="nav nav-divider py-2 small reply-reaction" data-reply-id="{{ $reply->id }}">
                <!-- Add your reply reaction buttons here -->
                <li class="nav-item dropdown dropup" data-bs-toggle="dropdown" aria-expanded="false">
                    <a class="nav-link" href="#!" id="card-reply-reaction"> Like (<span class="reply-like-count"
                            data-reply-id="{{ $reply->id }}">{{ $reply->reactions()->count() }}</span>)</a>
                    <!-- Replace with like count -->
                    <ul class="dropdown-menu rounded-left rounded-right p-2" aria-labelledby="replyReaction">
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
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#!"> Reply</a>
                </li> --}}
            </ul>
        </div>
    </div>
</li>
<!-- Nested comment item END -->

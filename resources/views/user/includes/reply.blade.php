<li class="reply-item" data-reply-id="{{$reply->id}}">
    <div class="d-flex">
        <!-- Avatar -->
        <div class="avatar avatar-xs">
            @if ($reply->client->image)
            <a href="#!"> <img class="avatar-img rounded-circle"
                    src="{{ asset('public/uploads/client/' . $reply->client->image) }}"
                    alt=""></a>
            @else
            <a href="#!"><img class="avatar-img rounded-circle"
                    src="{{ asset('public/images/download.jpg') }}"
                    alt=""></a>
            @endif
        </div>
        <!-- Comment by -->
        <div class="ms-2 reply-item" data-reply-id="{{$reply->id}}">
            <div class="bg-light p-2 rounded">
                <div class="d-flex justify-content-between">
                    <h6 class="my-0" style="font-size: 0.8375rem;"> <a href="#!">
                            @if ($reply->client->display_name)
                            {{ $reply->client->display_name }}
                            @else
                            {{ $reply->client->fname }}
                            {{ $reply->client->middle_name }}
                            {{ $reply->client->last_name }}
                            @endif
                        </a></h6>
                    <!-- Replace with user name -->
                    <small
                        class="ms-2">{{ $reply->created_at->diffForHumans() }}</small>
                    <!-- Replace with reply creation time -->
                </div>
                <p class="small mb-0">{{ $reply->content }}</p>
                <!-- Replace with reply content -->
            </div>
            <!-- Comment react -->
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
                <!-- Nested Reply Button -->
                <a href="javascript:void(0);" class="nav-link reply-nested-btn" onclick="replyNested({{ $reply->id }},event)">Reply</a>

                <!-- Reply Input Box (Initially Hidden) -->
                <form class="nav nav-item w-100 position-relative reply-nested-form my-2" style="display: none;"
                    data-reply-id="{{ $reply->id }}">
                    <textarea data-autoresize="" name="content" class="form-control pe-5 bg-light" rows="1"
                        placeholder="Write your reply here..." required></textarea>
                    <input type="hidden" name="parent_id" value="{{ $reply->id }}"
                        data-reply-id="{{ $reply->id }}">
                    <input type="hidden" name="comment_id" value="{{ $reply->comment_id }}">
                    <button
                        class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0"
                        type="submit">
                        <i class="bi bi-send-fill"> </i>
                    </button>
                </form>
            </ul>
        </div>
    </div>
</li>
<!-- Nested Replies -->
@if ($reply->children->count() > 0)
@foreach ($reply->children as $nestedReply)
<ul class="reply-item-nested list-unstyled" style="margin-left: 25px;">
    @include('user.partials.reply_item', ['reply' => $nestedReply])
</ul>
@endforeach
@endif
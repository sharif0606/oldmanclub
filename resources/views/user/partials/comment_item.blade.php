<!-- Comment item START -->
<li class="comment-item" data-comment-id="{{ $comment->id }}">
    <div class="d-flex position-relative">
        <!-- Avatar -->
        <div class="avatar avatar-xs">
            @if ($comment->client->image)
                <a href="#!"> <img class="avatar-img rounded-circle"
                        src="{{ asset('public/uploads/client/' . $comment->client->image) }}" alt=""></a>
            @else
                <a href="#!"><img class="avatar-img rounded-circle" src="{{ asset('public/images/download.jpg') }}"
                        alt=""></a>
            @endif
        </div>
        <div class="ms-2">
            <!-- Comment by -->
            <div class="bg-light rounded-start-top-0 p-3 rounded">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-1"> <a href="#!">{{ $comment->client->fname }}
                            {{ $comment->client->middle_name }} {{ $comment->client->last_name }}</a></h6>
                    <!-- Replace with user name -->
                    <small class="ms-2">{{ $comment->created_at->diffForHumans() }}</small>
                    <!-- Replace with comment creation time -->
                </div>
                <p class="small mb-0">{{ $comment->content }}</p> <!-- Replace with comment content -->
            </div>
            <!-- Comment react -->
            <ul class="nav nav-divider py-2 small">
                <!-- Add your comment reaction buttons here -->
                <li class="nav-item dropdown position-relative" data-bs-toggle="dropdown" aria-expanded="false">
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
                        <ul class="dropdown-menu dropdown-menu-start p-2" aria-labelledby="card-comment-reaction">
                            {{-- $comment->reactions --}}
                            <a href="#" onclick="reaction({{ $comment->id }},event,'like',this)"> <i
                                class="bi bi-hand-thumbs-up fa-fw pe-2"></i></a>
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
    <ul class="comment-item-nested list-unstyled"></ul>
</li>
<!-- Comment item END -->


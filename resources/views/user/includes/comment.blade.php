<div class="d-flex mb-3">
    @if ($client->image)
        <!-- Avatar -->
        <div class="avatar avatar-xs me-2">
            <a href="#!"> <img class="avatar-img rounded-circle"
                    src="{{ asset('public/uploads/client/' . $client->image) }}" alt=""> </a>
        </div>
    @else
        <a href="#!"><img class="avatar-img rounded-circle" src="{{ asset('public/images/download.jpg') }}"
                alt=""></a>
    @endif
    <!-- Comment box  -->
    <form class="nav nav-item w-100 position-relative" action="{{ route('post-comment.store') }}" method="post">
        @csrf
        <textarea data-autoresize="" class="form-control pe-5 bg-light" rows="1" placeholder="Add a comment..."
            name="content" required></textarea>
        <input type="hidden" name="post_id" value="{{ $value->id }}">
        <button class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0"
            type="submit">
            <i class="bi bi-send-fill"> </i>
        </button>
    </form>
</div>
<!-- Comment wrap START -->
<ul class="comment-wrap list-unstyled">
    <!-- Loop through comments -->
    @forelse($value->comments as $comment)
        <!-- Comment item START -->
        <li class="comment-item">
            <div class="d-flex position-relative">
                <!-- Avatar -->
                @if ($comment->client->image)
                    <div class="avatar avatar-xs">
                        <a href="#!"> <img class="avatar-img rounded-circle"
                                src="{{ asset('public/uploads/client/' . $comment->client->image) }}"
                                alt=""></a>
                    </div>
                @else
                    <div class="avatar avatar-xs">
                        <a href="#!"><img class="avatar-img rounded-circle"
                                src="{{ asset('public/images/download.jpg') }}" alt=""></a>
                    </div>
                @endif
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
                        <li class="nav-item">
                            <a class="nav-link" href="#!"> Like ({{ $comment->likes_count }})</a>
                            <!-- Replace with like count -->
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link reply-btn" data-comment-id="{{ $comment->id }}">Reply</a>
                        </li>
                        <!-- Add view replies link if necessary -->
                        @if ($comment->replies->count() > 0)
                            <li class="nav-item">
                                <a class="nav-link" href="#!"> View {{ $comment->replies->count() }} replies</a>
                            </li>
                        @endif
                    </ul>
                    <!-- Reply Form (hidden by default) -->
                    <form class="nav nav-item w-100 position-relative reply-form my-2" action="{{ route('reply.store') }}" method="post" style="display: none;">
                        @csrf
                        <textarea data-autoresize="" name="content" class="form-control pe-5 bg-light" rows="1" placeholder="Write your reply here..."
                            name="content" required></textarea>
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <button class="nav-link bg-transparent px-3 position-absolute top-50 end-0 translate-middle-y border-0"
                            type="submit">
                            <i class="bi bi-send-fill"> </i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Nested comments -->
            @if ($comment->replies->count() > 0)
                <ul class="comment-item-nested list-unstyled">
                    <!-- Loop through nested comments -->
                    @forelse($comment->replies as $reply)
                        <!-- Nested comment item START -->
                        <li class="comment-item">
                            <div class="d-flex">
                                <!-- Avatar -->
                                <div class="avatar avatar-xs">
                                    <a href="#!"><img class="avatar-img rounded-circle"
                                            src="{{ asset('public/user/assets/images/avatar/06.jpg') }}"
                                            alt=""></a>
                                </div>
                                <!-- Comment by -->
                                <div class="ms-2">
                                    <div class="bg-light p-3 rounded">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="mb-1"> <a href="#!">{{ $reply->client->fname }}
                                                {{ $reply->client->middle_name }} {{ $reply->client->last_name }}</a></h6>
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
                                        <li class="nav-item">
                                            <a class="nav-link" href="#!"> Like ({{ $reply->likes_count }})</a>
                                            <!-- Replace with like count -->
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#!"> Reply</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <!-- Nested comment item END -->
                    @empty
                    @endforelse
                </ul>
            @endif
            <!-- Load more replies -->
            <!-- Add logic to load more replies if necessary -->
        </li>
        <!-- Comment item END -->
    @empty
    @endforelse
</ul>



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

<!-- Nested comment item START -->
<li class="comment-item">
    <div class="d-flex">
        <!-- Avatar -->
        <div class="avatar avatar-xs">
            @if ($reply->client->image)
                <a href="{{ route('client_by_search', $reply->client->username) }}"> <img class="avatar-img rounded-circle"
                        src="{{ asset('public/uploads/client/' . $reply->client->image) }}"
                        alt=""></a>
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
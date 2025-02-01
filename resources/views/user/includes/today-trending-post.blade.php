<div class="card">
    <!-- Card header START -->
    <div class="card-header pb-0 border-0">
      <h5 class="card-title mb-0">Today’s Trending posts</h5>
    </div>
    <!-- Card header END -->
    <!-- Card body START -->
    <div class="card-body">
      <!-- News item -->
      @foreach($top_trending_posts as $post)
      <div class="mb-3">
        <h6 class="mb-0"><a href="{{ route('singlePost', $post->id) }}">{{$post->message}}</a></h6>
        <small>{{ $post->created_at->diffForHumans() }}</small>
      </div>
      @endforeach
      {{-- <!-- Load more comments -->
      <a href="#!" role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center" data-bs-toggle="button" aria-pressed="true">
        <div class="spinner-dots me-2">
          <span class="spinner-dot"></span>
          <span class="spinner-dot"></span>
          <span class="spinner-dot"></span>
        </div>
        View all latest news
      </a> --}}
    </div>
    <!-- Card body END -->
  </div>
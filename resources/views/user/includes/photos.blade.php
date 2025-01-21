<div class="card">
  <!-- Card header START -->
  <div class="card-header d-sm-flex justify-content-between border-0">
    <h5 class="card-title">Photos</h5>
    <!-- <a class="btn btn-primary-soft btn-sm" href="#!"> See all photo</a> -->
  </div>
  <!-- Card header END -->
  <!-- Card body START -->
  <div class="card-body position-relative pt-0">
    <div class="row g-2">
      {{--<!-- Photos item -->
        <div class="col-6">
          <a href="{{asset('public/user')}}/assets/images/albums/01.jpg" data-gallery="image-popup" data-glightbox="">
      <img class="rounded img-fluid" src="{{asset('public/user')}}/assets/images/albums/01.jpg" alt="">
      </a>
    </div>
    <!-- Photos item -->
    <div class="col-6">
      <a href="{{asset('public/user')}}/assets/images/albums/02.jpg" data-gallery="image-popup" data-glightbox="">
        <img class="rounded img-fluid" src="{{asset('public/user')}}/assets/images/albums/02.jpg" alt="">
      </a>
    </div>
    <!-- Photos item -->
    <div class="col-4">
      <a href="{{asset('public/user')}}/assets/images/albums/03.jpg" data-gallery="image-popup" data-glightbox="">
        <img class="rounded img-fluid" src="{{asset('public/user')}}/assets/images/albums/03.jpg" alt="">
      </a>
    </div>
    <!-- Photos item -->
    <div class="col-4">
      <a href="{{asset('public/user')}}/assets/images/albums/04.jpg" data-gallery="image-popup" data-glightbox="">
        <img class="rounded img-fluid" src="{{asset('public/user')}}/assets/images/albums/04.jpg" alt="">
      </a>
    </div>
    <!-- Photos item -->
    <div class="col-4">
      <a href="{{asset('public/user')}}/assets/images/albums/05.jpg" data-gallery="image-popup" data-glightbox="">
        <img class="rounded img-fluid" src="{{asset('public/user')}}/assets/images/albums/05.jpg" alt="">
      </a>
      <!-- glightbox Albums left bar END  -->
    </div>--}}
    @forelse ($photos as $index => $photo)
    <!-- Photos item -->
    <div class="{{ $index < 2 ? 'col-6' : 'col-4' }}">
      <a href="{{ asset('public/uploads/client/' . $photo) }}" data-gallery="image-popup" data-glightbox="">
        <img class="rounded img-fluid" src="{{ asset('public/uploads/client/' . $photo) }}" alt="">
      </a>
    </div>
    @empty
    @endforelse
  </div>
</div>
<!-- Card body END -->
</div>
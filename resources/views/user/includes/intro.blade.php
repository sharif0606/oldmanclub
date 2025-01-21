<div class="col-lg-3">
    <div class="row g-2">
        <div class="card">
            <!-- Card header START -->
            <div class="card-header border-0 pb-0">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">INTRO</h5>
                    <a class="btn btn-primary-soft icon-sm ms-auto" href="{{route('accountSetting')}}"><i
                            class="fa-solid fa-pencil"> </i></a>
                </div>
                <p class="text-center pt-2"><small>{{$client->profile_overview}}</small><span class="d-block">{{$client->tagline}}</span></p>
                <!-- User stat START -->
                <div class="hstack gap-2 gap-xl-3 justify-content-center text-center">
                    <!-- User stat item -->
                    <div>
                        <h6 class="mb-0">{{$post->count()}}</h6>
                        <small>Post</small>
                    </div>
                    <!-- Divider -->
                    <div class="vr"></div>
                    <!-- User stat item -->
                    <div>
                        <h6 class="mb-0">{{ $followers->count() >= 1000 ? number_format($followers->count() / 1000, 1) . 'k' : $followers->count() }}
                        </h6>
                        <small>Followers</small>
                    </div>
                    <!-- Divider -->
                    <div class="vr"></div>
                    <!-- User stat item -->
                    <div>
                        <h6 class="mb-0">0</h6>
                        <small>Following</small>
                    </div>
                </div>
                <!-- User stat END -->
            </div>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body">

            </div>
        </div>

        <!-- My Photo START -->
        @include('user.includes.photos')
        <!-- My Photo END -->

         <!-- Card START -->
         @include('user.includes.followers')
         <!-- Card END -->
    </div>
</div>
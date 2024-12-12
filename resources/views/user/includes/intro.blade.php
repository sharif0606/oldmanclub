<div class="col-lg-3">
    <div class="row g-2">
        <div class="card">
            <!-- Card header START -->
            <div class="card-header border-0 pb-0">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">INTRO</h5>
                    <a class="btn btn-primary-soft icon-sm ms-auto" href="#"><i
                            class="fa-solid fa-pencil"> </i></a>
                </div>
                <p class="text-center pt-2"><small>Full Stack Developer at Test </small><span class="d-block">{
                        Laravel,Vue,React }</span></p>
                <!-- User stat START -->
                <div class="hstack gap-2 gap-xl-3 justify-content-center text-center">
                    <!-- User stat item -->
                    <div>
                        <h6 class="mb-0">256</h6>
                        <small>Post</small>
                    </div>
                    <!-- Divider -->
                    <div class="vr"></div>
                    <!-- User stat item -->
                    <div>
                        <h6 class="mb-0">2.5K</h6>
                        <small>Followers</small>
                    </div>
                    <!-- Divider -->
                    <div class="vr"></div>
                    <!-- User stat item -->
                    <div>
                        <h6 class="mb-0">365</h6>
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
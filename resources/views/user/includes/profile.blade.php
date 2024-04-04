<div class="card">
    <!-- Cover image -->
    @if($client->cover_photo)
        <div class="h-200px rounded-top"
            style="background-image:url({{asset('public/uploads/client/' . $client->cover_photo)}}); background-position: center; background-size: cover; background-repeat: no-repeat;">
        </div>
    @else
        <div class="h-200px rounded-top"
            style="background-image:url({{asset(default_bg_image())}}); background-position: center; background-size: cover; background-repeat: no-repeat;">
        </div>
    @endif
    <!-- Card body START -->
    <div class="card-body py-0">
        <div class="d-sm-flex align-items-start text-center text-sm-start">
            <div>
                <!-- Avatar -->
                <div class="avatar avatar-xxl mt-n5 mb-3">
                    @if($client->image)
                    <img class="avatar-img rounded-circle border border-white border-3"
                        src="{{asset('public/uploads/client/' . $client->image)}}" alt="">
                    @else
                    <img class="avatar-img rounded-border-10 border border-white border-3"
                        src="{{asset('public/images/download.jpg')}}" alt="">
                    {{-- <img class="avatar-img rounded-circle border border-white border-3"
                        src="{{asset($client->image?$client->image:default_image())}}" alt=""> --}}
                    @endif
                </div>
            </div>
            <div class="ms-sm-4 mt-sm-3">
                <!-- Info -->
                <h1 class="mb-0 h5">{{$client->middle_name}} {{$client->last_name}}
                @if($client->is_address_verified==1)
                    <i class="bi bi-patch-check-fill text-success small"></i>
                @else
                    {{-- <i class="bi bi-file-x-fill text-danger small"></i> --}}
                @endif
                </h1>
                <p class="mb-1"><span>1.2M Followers</span><span class="mx-2" style="border-right: 2px solid #EFF2F6;"></span><span>2.5K Following</span></p>
                <div class="w-100">
                  <!-- Connections START -->
                  {{-- <ul class="avatar-group mt-1 list-unstyled align-items-sm-center">
                    <li class="avatar avatar-xxs">
                      <img class="avatar-img rounded-circle" src="{{ asset('public/user/assets/images/avatar/01.jpg')}}" alt="avatar">
                    </li>
                    <li class="avatar avatar-xxs">
                      <img class="avatar-img rounded-circle" src="{{ asset('public/user/assets/images/avatar/02.jpg')}}" alt="avatar">
                    </li>
                    <li class="avatar avatar-xxs">
                      <img class="avatar-img rounded-circle" src="{{ asset('public/user/assets/images/avatar/03.jpg')}}" alt="avatar">
                    </li>
                    <li class="avatar avatar-xxs">
                      <img class="avatar-img rounded-circle" src="{{ asset('public/user/assets/images/avatar/04.jpg')}}" alt="avatar">
                    </li>
                    <li class="avatar avatar-xxs">
                        <img class="avatar-img rounded-circle" src="{{ asset('public/user/assets/images/avatar/01.jpg')}}" alt="avatar">
                      </li>
                      <li class="avatar avatar-xxs">
                        <img class="avatar-img rounded-circle" src="{{ asset('public/user/assets/images/avatar/02.jpg')}}" alt="avatar">
                      </li>
                      <li class="avatar avatar-xxs">
                        <img class="avatar-img rounded-circle" src="{{ asset('public/user/assets/images/avatar/03.jpg')}}" alt="avatar">
                      </li>
                      <li class="avatar avatar-xxs">
                        <img class="avatar-img rounded-circle" src="{{ asset('public/user/assets/images/avatar/04.jpg')}}" alt="avatar">
                      </li>
                    <li class="avatar avatar-xxs">
                      <div class="avatar-img rounded-circle bg-primary"><span class="smaller text-white position-absolute top-50 start-50 translate-middle">+2</span></div>
                    </li>
                    {{-- <li class="small ms-3">
                      Carolyn Ortiz, Frances Guerrero, and 20 other shared connections
                    </li> --}}
                  </ul> --}}
                  <!-- Connections END -->
                </div>
            </div>
            <!-- Button -->
            <div class="d-flex mt-3 justify-content-center ms-sm-auto">
              
                <a class="btn btn-primary me-2" href="" style="padding: 8px 12px;font-size:12px"> <i
                            class="bi bi-tools pe-1"></i>View As</a>
                <a class="btn btn-primary me-2" href="{{route('accountSetting')}}" style="padding: 8px 12px;font-size:12px"> <i
                                class="bi bi-pencil-fill pe-1"></i>Edit Profile</a>
                <a class="btn btn-primary me-2" href="" style="padding: 8px 12px;font-size:12px"> <i
                                class="bi bi-megaphone pe-1"></i>Promote Profile</a>
                <div class="dropdown">
                    <!-- Card share action menu -->
                    <button class="icon-md btn btn-light" type="button" id="profileAction2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </button>
                    <!-- Card share action dropdown menu -->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileAction2">
                        <li><a class="dropdown-item" href="#"> <i
                                    class="bi bi-bookmark fa-fw pe-2"></i>Share profile in a message</a>
                        </li>
                        <li><a class="dropdown-item" href="#"> <i
                                    class="bi bi-file-earmark-pdf fa-fw pe-2"></i>Save your profile to
                                PDF</a></li>
                        <li><a class="dropdown-item" href="#"> <i
                                    class="bi bi-lock fa-fw pe-2"></i>Lock profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#"> <i
                                    class="bi bi-gear fa-fw pe-2"></i>Profile settings</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- List profile -->
        <ul class="list-inline mb-0 text-center text-sm-start mt-3 mt-sm-0">
            <li class="my-1"><i class="bi bi-calendar2-plus me-1"></i>
                Joined on {{ $client->created_at->format('d M,Y')}}
            </li>
            @if ($client->designation)
            <li><i class="bi bi-briefcase-fill me-1"></i>
                {{$client->designation}}
            </li>
            @endif
            @if ($client->current_country_id)
            <li>
                <i class="bi bi-geo-alt me-1"></i>
                Lives In {{$client->currentcountry?->name}}@if($client->current_city_id), {{$client->currentstate?->name}} @endif
            </li>
            @endif
            @if ($client->from_country_id)
            <li class="ps-4">
                Form {{$client->fromcountry?->name}}@if($client->current_city_id), {{$client->fromstate?->name}} @endif
            </li>
            @endif
        </ul>
    </div>
    <!-- Card body END -->
    @include('user/includes/navigation')
</div>
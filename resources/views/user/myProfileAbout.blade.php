@extends('user.layout.base')
@section('content')
    <!-- Main content START -->
    <main>
        <!-- Container START -->
        <div class="container-fluid">
            <div class="row g-2">
                <div class="col-lg-12 vstack gap-2">
                    <!-- My profile START -->
                    @include('user.includes.profile')
                    <!-- My profile END -->

                </div>

                <!-- Left sidebar START -->
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
                                <p class="text-center pt-2"><small>Full Stack Developer at Test </small><span>{
                                        Laravel,Vue,React }</span></p>
                                <!-- User stat START -->
                                <div class="hstack gap-2 gap-xl-3 justify-content-center">
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
                <div class="col-md-8 col-lg-6 vstack gap-2">
                    <!-- Share feed START -->
                    <!-- Card feed item START -->
                    <div class="card">
                        <!-- Card header START -->
                        <div class="card-header border-0 pb-0">
                            <h5 class="card-title">PROFILE INFO</h5>
                        </div>
                        <!-- Card header END -->
                        <!-- Card body START -->
                        <div class="card-body">
                            <div class="rounded border px-3 py-2 mb-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6>OVERVIEW</h6>
                                    <div class="dropdown ms-auto">
                                        <!-- Card share action menu -->
                                        <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                        <!-- Card share action dropdown menu -->
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction">
                                            <li><a class="dropdown-item" href="{{ route('accountSetting') }}"> <i
                                                        class="bi bi-pencil-square fa-fw pe-2"></i>Edit</a></li>
                                            {{-- <li><a class="dropdown-item" href="#"> <i
                                    class="bi bi-trash fa-fw pe-2"></i>Delete</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <p>{{ $client->profile_overview }}</p>
                            </div>
                            <div class="row g-2">
                                <div class="col-sm-6">
                                    <!-- Birthday START -->
                                    <div class="d-flex align-items-center rounded border px-3 py-2">
                                        <!-- Date -->
                                        <p class="mb-0">
                                            <i class="bi bi-calendar-date fa-fw me-2"></i> Born:
                                            <strong>{{ \Carbon\Carbon::parse($client->dob)->format('M-d-Y') }}</strong>
                                        </p>
                                        <div class="dropdown ms-auto">
                                            <!-- Card share action menu -->
                                            <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction2"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <!-- Card share action dropdown menu -->
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction2">
                                                <li><a class="dropdown-item" href="{{ route('accountSetting') }}"> <i
                                                            class="bi bi-pencil-square fa-fw pe-2"></i>Edit</a></li>
                                                {{-- <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-trash fa-fw pe-2"></i>Delete</a></li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Birthday END -->
                                </div>
                                <div class="col-sm-6">
                                    <!-- Status START -->
                                    <div class="d-flex align-items-center rounded border px-3 py-2">
                                        <!-- Date -->
                                        <p class="mb-0">
                                            <i class="bi bi-heart fa-fw me-2"></i> Status: <strong>
                                                @if ($client->marital_status == 1)
                                                    Single
                                                @endif
                                                @if ($client->marital_status == 2)
                                                    Married
                                                @endif
                                            </strong>
                                        </p>
                                        <div class="dropdown ms-auto">
                                            <!-- Card share action menu -->
                                            <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction3"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <!-- Card share action dropdown menu -->
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction3"
                                                style="">
                                                <li><a class="dropdown-item" href="{{ route('accountSetting') }}"> <i
                                                            class="bi bi-pencil-square fa-fw pe-2"></i>Edit</a></li>
                                                {{-- <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-trash fa-fw pe-2"></i>Delete</a></li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Status END -->
                                </div>
                                <div class="col-sm-6">
                                    <!-- Designation START -->
                                    <div class="d-flex align-items-center rounded border px-3 py-2">
                                        <!-- Date -->
                                        <p class="mb-0">
                                            <i class="bi bi-briefcase fa-fw me-2"></i>Contact:
                                            <strong>{{ $client->contact_no }}</strong>
                                        </p>
                                        <div class="dropdown ms-auto">
                                            <!-- Card share action menu -->
                                            <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction4"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <!-- Card share action dropdown menu -->
                                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction4">
                                                <li><a class="dropdown-item" href="{{ route('accountSetting') }}"> <i
                                                            class="bi bi-pencil-square fa-fw pe-2"></i>Edit</a></li>
                                                {{-- <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-trash fa-fw pe-2"></i>Delete</a></li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Designation END -->
                                </div>
                                <div class="col-sm-6">
                                    <!-- Lives START -->
                                    <div class="d-flex align-items-center rounded border px-3 py-2">
                                        <!-- Date -->
                                        <p class="mb-0">
                                            <i class="bi bi-geo-alt fa-fw me-2"></i> Lives in: <strong>
                                                {{ $client->currentcountry?->name }}@if ($client->current_city_id)
                                                    , {{ $client->currentstate?->name }}
                                                @endif </strong>
                                        </p>
                                        {{-- <div class="dropdown ms-auto">
                        <!-- Card share action menu -->
                        <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction5"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction5">
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-pencil-square fa-fw pe-2"></i>Edit</a></li>
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                        </ul>
                    </div> --}}
                                    </div>
                                    <!-- Lives END -->
                                </div>
                                <div class="col-sm-6">
                                    <!-- Joined on START -->
                                    <div class="d-flex align-items-center rounded border px-3 py-2">
                                        <!-- Date -->
                                        <p class="mb-0">
                                            <i class="bi bi-geo-alt fa-fw me-2"></i> Joined on: <strong>
                                                {{ $client->created_at->format('d M,Y') }}
                                            </strong>
                                        </p>
                                        {{-- <div class="dropdown ms-auto">
                        <!-- Card share action menu -->
                        <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction6"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction6">
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-pencil-square fa-fw pe-2"></i>Edit</a></li>
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                        </ul>
                    </div> --}}
                                    </div>
                                    <!-- Joined on END -->
                                </div>
                                <div class="col-sm-6">
                                    <!-- Joined on START -->
                                    <div class="d-flex align-items-center rounded border px-3 py-2">
                                        <!-- Date -->
                                        <p class="mb-0">
                                            <i class="bi bi-envelope fa-fw me-2"></i> Email: <strong> {{ $client->email }}
                                            </strong>
                                        </p>
                                        {{-- <div class="dropdown ms-auto">
                        <!-- Card share action menu -->
                        <a class="nav nav-link text-secondary mb-0" href="#" id="aboutAction7"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <!-- Card share action dropdown menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aboutAction7">
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-pencil-square fa-fw pe-2"></i>Edit</a></li>
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                        </ul>
                    </div> --}}
                                    </div>
                                    <!-- Joined on END -->
                                </div>
                                {{-- <div class="col-sm-6 position-relative">
                <!-- Workplace on START -->
                <a class="btn btn-dashed rounded w-100" href="#!"> <i
                        class="bi bi-plus-circle-dotted me-1"></i>Add a workplace</a>
                <!-- Workplace on END -->
            </div>
            <div class="col-sm-6 position-relative">
                <!-- Education on START -->
                <a class="btn btn-dashed rounded w-100" href="#!"> <i
                        class="bi bi-plus-circle-dotted me-1"></i>Add a education</a>
                <!-- Education on END -->
            </div> --}}
                            </div>
                        </div>
                        <!-- Card body END -->
                    </div>
                    <!-- Card feed item END -->
                </div>
                <!-- Right sidebar START -->
                <div class="col-md-3">
                    <div class="row g-2">
                        @include('user.includes.online-active')
                        <!-- Card START -->
                        @include('user.includes.celebration')
                        <!-- Card END -->
                    </div>
                  
                </div>
            </div> <!-- Row END -->
        </div>
        <!-- Container END -->
    </main>
    <!-- Main content END -->
@endsection

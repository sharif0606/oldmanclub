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
                @include('user.includes.intro')
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


                    
                    <!-- Share feed START -->
                    <div class="card card-body">
                        <div class="d-flex mb-3">
                            <!-- Avatar -->
                            <div class="avatar avatar-xs me-2">
                                <a href="#">
                                @if($client->image)
                                    <img class="avatar-img rounded-circle"
                                    src="{{asset('public/uploads/client/' . $client->image)}}" alt="">
                                @else
                                    <img class="avatar-img rounded-circle"
                                    src="{{asset('public/images/download.jpg')}}" alt="">
                                @endif
                                 {{-- <img class="avatar-img rounded-circle" src="{{asset($client->image?$client->image:default_image())}}"
                                        alt="">  --}}
                                    </a>
                            </div>
                            <!-- Post input -->
                            <form class="w-100">
                                <input class="form-control pe-4 border-0" placeholder="Share your thoughts..."
                                    data-bs-toggle="modal" data-bs-target="#feedActionPhoto">
                            </form>
                        </div>
                        <!-- Share feed toolbar START -->
                        <ul class="nav nav-pills nav-stack small fw-normal">
                             {{--<li class="nav-item">
                                <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal"
                                    data-bs-target="#feedActionPhoto"> <i
                                        class="bi bi-image-fill text-success pe-2"></i>Photo</a>
                            </li>--}}
                            <li class="nav-item">
                                <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal"
                                    data-bs-target="#feedActionVideo"> <i
                                        class="bi bi-camera-reels-fill text-info pe-2"></i>Video</a>
                            </li>
                            {{--<li class="nav-item">
                                <a href="#" class="nav-link bg-light py-1 px-2 mb-0" data-bs-toggle="modal"
                                    data-bs-target="#modalCreateEvents"> <i
                                        class="bi bi-calendar2-event-fill text-danger pe-2"></i>Event </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal"
                                    data-bs-target="#modalCreateFeed"> <i
                                        class="bi bi-emoji-smile-fill text-warning pe-2"></i>Feeling /Activity</a>
                            </li>
                            <li class="nav-item dropdown ms-sm-auto">
                                <a class="nav-link bg-light py-1 px-2 mb-0" href="#" id="feedActionShare"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots"></i>
                                </a>
                                <!-- Dropdown menu -->
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="feedActionShare">
                                    <li><a class="dropdown-item" href="#"> <i
                                                class="bi bi-envelope fa-fw pe-2"></i>Create a poll</a></li>
                                    <li><a class="dropdown-item" href="#"> <i
                                                class="bi bi-bookmark-check fa-fw pe-2"></i>Ask a question </a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#"> <i
                                                class="bi bi-pencil-square fa-fw pe-2"></i>Help</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                        <!-- Share feed toolbar END -->
                    </div>
                    <!-- Share feed END -->
                     <!-- Card feed item START -->
                     @include('user.includes.post-list')
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

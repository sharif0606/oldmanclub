@extends('user.layout.base')
@section('content')
    <!-- Main content START -->
    <main>
        <!-- Container START -->
        <div class="container">
            <div class="row g-2">
                <!-- Main content START -->
                <div class="col-lg-12 vstack gap-4">
                    <!-- My profile START -->
                    @include('user.includes.profile')
                    <!-- My profile END -->
                </div>
                <!-- Right sidebar START -->
                <div class="col-lg-4">
                    <div class="row g-2">
                        <!-- Card START -->
                        <div class="col-md-6 col-lg-12">
                            <div class="card">
                                <div class="card-header border-0 pb-0">
                                    {{-- <h5 class="card-title">INTRO</h5> --}}
                                    <!-- Button modal -->
                                </div>
                                <!-- Card body START -->
                                <div class="card-body position-relative pt-0">
                                    <p class="text-center">{{ $client->tagline }}</p>
                                    <hr>
                                    <!-- Date time -->
                                    <ul class="list-unstyled mt-3 mb-0">
                                        <li class="mb-2"><i class="bi bi-calendar2-plus pe-1"></i>
                                            Joined on {{ $client->created_at->format('d M,Y') }}
                                        </li>
                                        @if ($client->designation)
                                            <li class="mb-2"><i class="bi bi-briefcase-fill pe-1"></i>
                                                {{ $client->designation }}
                                            </li>
                                        @endif
                                        @if ($client->current_country_id)
                                            <li class="mb-2">
                                                <i class="bi bi-geo-alt pe-1"></i>
                                                Lives In {{ $client->currentcountry?->name }}@if ($client->current_city_id)
                                                    , {{ $client->currentstate?->name }}
                                                @endif
                                            </li>
                                        @endif
                                        {{-- <li class="mb-2"> <i class="bi bi-calendar-date fa-fw pe-1"></i> Born:
                                            <strong>{{ \Carbon\Carbon::parse($client->dob)->format('M-d-Y') }}</strong>
                                        </li>
                                        <li class="mb-2"> <i class="bi bi-heart fa-fw pe-1"></i> Status: <strong> Single
                                            </strong>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-envelope fa-fw pe-1"></i> Email: <strong> {{ $client->email }}
                                            </strong>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-phone fa-fw pe-1"></i> Contact: <strong>
                                                {{ $client->contact_no }}
                                            </strong>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-house fa-fw pe-1"></i> Address: <strong>
                                                {{ $client->address_line_1 }}
                                            </strong>
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-card-text fa-fw pe-1"></i> ID NO: <strong> {{ $client->id_no }}
                                            </strong>
                                        </li> --}}
                                    </ul>
                                </div>
                                <!-- Card body END -->
                            </div>
                        </div>
                        <!-- Card END -->





                    </div>
                </div>
                <!-- Right sidebar END -->
                <div class="col-lg-8 vstack gap-2">
                    <!-- Card Connections START -->
                    <div class="card">
                        <!-- Card header START -->
                        <div class="card-header border-0 pb-0">
                            <h5 class="card-title">Following</h5>
                        </div>
                        <!-- Card header END -->
                        <!-- Card Body START -->
                        <div class="card-body">
                            @forelse ($followers as $follow)
                                <!-- Connections Item -->
                                <div class="d-md-flex align-items-center mb-4">
                                    <!-- Avatar -->
                                    <div class="avatar me-3 mb-3 mb-md-0">
                                        @if ($follow->client->image)
                                            <a href="{{ route('client_by_search', $follow->client->image) }}"> <img class="avatar-img rounded-circle"
                                                    src="{{ asset('public/uploads/client/' . $follow->client->image) }}"
                                                    alt=""> </a>
                                        @else
                                            <img class="avatar-img rounded-circle"
                                                src="{{ asset('public/user/assets/images/avatar/placeholder.jpg') }}"
                                                alt="">
                                        @endif
                                    </div>
                                    <!-- Info -->
                                    <div class="w-100">
                                        <div class="d-sm-flex align-items-start">
                                            <h6 class="mb-0"><a href="{{ route('client_by_search', $follow->client->username) }}">{{ $follow->client->fname }}
                                                {{ $follow->client->middle_name }} {{ $follow->client->last_name }}</a></h6>
                                            <p class="small ms-sm-2 mb-0">{{ $follow->client->designation }}</p>
                                        </div>
                                        <!-- Connections START -->
                                        <ul class="avatar-group mt-1 list-unstyled align-items-sm-center">
                                            @foreach ($follow->client->followings->take(4) as $following)
                                            <li class="avatar avatar-xxs">
                                                @if ($following->follow_client->image)
                                                    <img class="avatar-img rounded-circle"
                                                        src="{{ asset('public/uploads/client/' . $following->follow_client->image) }}"
                                                        alt="">
                                                @else
                                                    <img class="avatar-img rounded-circle"
                                                        src="{{ asset('public/user/assets/images/avatar/placeholder.jpg') }}"
                                                        alt="">
                                                @endif
                                            </li>
                                            @endforeach
                                            @php
                                            $otherConnectionsCount = max(
                                                $follow->client->followings->count() - 4,
                                                0,
                                            );
                                            //echo $otherConnectionsCount;
                                            @endphp
                                            @if ($otherConnectionsCount > 0)
                                            <li class="avatar avatar-xxs">
                                                <div class="avatar-img rounded-circle bg-primary"><span
                                                        class="smaller text-white position-absolute top-50 start-50 translate-middle">+{{$otherConnectionsCount}}</span>
                                                </div>
                                            </li>
                                            @endif
                                            <li class="small ms-3">
                                                @if ($otherConnectionsCount > 0)
                                                    {{-- Displaying the first two names --}}
                                                    @foreach ($follow->client->followings->take(2) as $key => $following)
                                                        {{ $following->follow_client->fname }}
                                                        {{ $following->follow_client->middle_name }}
                                                        {{ $following->follow_client->last_name }}
                                                        @if (!$loop->last)
                                                            {{ ',' }}
                                                        @endif
                                                    @endforeach
                                                    {{-- Displaying the remaining connections count --}}
                                                    @if ($otherConnectionsCount == 1)
                                                        and 1 other Follwing
                                                    @else
                                                        and {{ $otherConnectionsCount }} other are Following
                                                    @endif
                                                @else
                                                    {{-- Displaying all names if there are less than 4 --}}
                                                    @foreach ($connection->client->followings as $key => $following)
                                                        {{ $following->follow_client->fname }}
                                                        {{ $following->follow_client->middle_name }}
                                                        {{ $following->follow_client->last_name }}
                                                        @if (!$loop->last)
                                                            {{ ',' }}
                                                        @endif
                                                    @endforeach
                                                    Following
                                                @endif
                                            </li>
                                        </ul>
                                        <!-- Connections END -->
                                    </div>
                                    <!-- Button -->
                                    <div class="ms-md-auto d-flex">
                                        <form action="{{ route('follow.destroy', $follow) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger-soft btn-sm mb-0 me-2"> Unfollow </button>
                                        </form>
                                        {{-- <button class="btn btn-primary-soft btn-sm mb-0"> Message </button> --}}
                                    </div>
                                </div>
                            @empty
                            @endforelse
                            {{-- <div class="d-grid">
                                <!-- Load more button START -->
                                <a href="#!" role="button" class="btn btn-sm btn-loader btn-primary-soft"
                                    data-bs-toggle="button" aria-pressed="true">
                                    <span class="load-text"> Load more connections </span>
                                    <div class="load-icon">
                                        <div class="spinner-grow spinner-grow-sm" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </a>
                                <!-- Load more button END -->
                            </div> --}}

                        </div>
                        <!-- Card body END -->
                    </div>
                    <!-- Card Connections END -->
                </div>
                <!-- Card Body END -->
            </div><!-- Main content END -->
        </div> <!-- Row END -->
        </div>
        <!-- Container END -->
    </main>
    <!-- Main content END -->
@endsection

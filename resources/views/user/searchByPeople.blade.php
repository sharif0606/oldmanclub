@extends('user.layout.base')
@section('content')
    <!-- Main content START -->
    <main>
        <!-- Container START -->
        <div class="container">
            <div class="row g-4">

                <!-- Main content START -->
                <div class="col-lg-12 vstack gap-4">
                    <!-- Card Connections START -->
                    <div class="card">
                        <!-- Card header START -->
                        <div class="card-header border-0 pb-0">
                            <h5 class="card-title"> Connections</h5>
                        </div>
                        <!-- Card header END -->

                        <!-- Card body START -->
                        <div class="card-body">
                            @forelse ($unfollow_connections as $connection)
                                <!-- Connections Item -->
                                <div class="d-md-flex align-items-center mb-4">
                                    <!-- Avatar -->
                                    <div class="avatar me-3 mb-3 mb-md-0">
                                        <a href="{{ route('client_by_search', $connection->client->username) }}">
                                            @if ($connection->client->image)
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('public/uploads/client/' . $connection->client->image) }}"
                                                    alt="">
                                            @else
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('public/user/assets/images/avatar/placeholder.jpg') }}"
                                                    alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <!-- Info -->
                                    {{-- <table class="table table-bordered">
                                        <tr>
                                            <td>CurrentUser ID {{currentUserId()}} is (following_id)- where {{$connection->client->id}} is follower_id</td>
                                        </tr>
                                    </table> --}}
                                    <div class="w-100">
                                        <div class="d-sm-flex align-items-start">
                                            <h6 class="mb-0"><a
                                                    href="{{ route('client_by_search', $connection->client->username) }}">{{ $connection->client->fname }}
                                                    {{ $connection->client->middle_name }}
                                                    {{ $connection->client->last_name }}</a></h6>
                                            <p class="small ms-sm-2 mb-0"> {{ $connection->client->designation }}</p>
                                        </div>
                                        <!-- Connections START -->
                                        {{-- <pre>
                                            {{ $connection->client->followings->pluck('following_id') }}
                                        </pre> --}}
                                        <ul class="avatar-group mt-1 list-unstyled align-items-sm-center">
                                            @foreach ($connection->client->followings->take(4) as $following)
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
                                                $connection->client->followings->count() - 4,
                                                0,
                                            );
                                            //echo $otherConnectionsCount;
                                            @endphp
                                            @if ($otherConnectionsCount > 0)
                                            <li class="avatar avatar-xxs">
                                                <div class="avatar-img rounded-circle bg-primary"><span
                                                        class="smaller text-white position-absolute top-50 start-50 translate-middle">{{$otherConnectionsCount}}+</span>
                                                </div>
                                            </li>
                                            @endif
                                            <li class="small ms-3">
                                                @if ($otherConnectionsCount > 0)
                                                    {{-- Displaying the first two names --}}
                                                    @foreach ($connection->client->followings->take(2) as $key => $following)
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
                                            {{-- <li class="avatar avatar-xxs">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('public/user/assets/images/avatar/01.jpg') }}"
                                                    alt="avatar">
                                            </li>
                                            <li class="small ms-3">
                                                {{$connection->client->followings}}
                                                Carolyn Ortiz, Frances Guerrero, and 20 other shared connections
                                            </li>--}}
                                        </ul> 
                                            <!-- Connections END -->
                                    </div>
                                    <!-- Button -->
                                    <div class="ms-md-auto d-flex">
                                        <form action="{{ route('follow.destroy', $connection) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger-soft btn-sm mb-0 me-2"> Unfollow </button>
                                        </form>


                                    </div>
                                </div>
                            @empty
                            @endforelse
                            @forelse ($follow_connections as $connection)
                                <!-- Connections Item -->
                                <div class="d-md-flex align-items-center mb-4">
                                    <!-- Avatar -->
                                    <div class="avatar me-3 mb-3 mb-md-0">
                                        <a href="{{ route('client_by_search', $connection->username) }}">
                                            @if ($connection->image)
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('public/uploads/client/' . $connection->image) }}"
                                                    alt="">
                                            @else
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('public/user/assets/images/avatar/placeholder.jpg') }}"
                                                    alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <!-- Info -->
                                    {{-- <table class="table table-bordered">
                                        <tr>
                                            <td>Here {{currentUserId()}} is (following_id) and {{$connection->id}} will be (follower_id)</td>
                                        </tr>
                                    </table> --}}
                                    <div class="w-100">
                                        <div class="d-sm-flex align-items-start">
                                            <h6 class="mb-0"><a
                                                    href="{{ route('client_by_search', $connection->username) }}">{{ $connection->fname }}
                                                    {{ $connection->middle_name }} {{ $connection->last_name }}</a></h6>
                                            <p class="small ms-sm-2 mb-0"> {{ $connection->designation }}</p>
                                        </div>
                                        <!-- Connections START -->
                                        <ul class="avatar-group mt-1 list-unstyled align-items-sm-center">
                                            @foreach ($connection->followings->take(4) as $following)
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
                                                $connection->followings->count() - 4,
                                                0,
                                            );
                                            //echo $otherConnectionsCount;
                                            @endphp
                                            @if ($otherConnectionsCount > 0)
                                            <li class="avatar avatar-xxs">
                                                <div class="avatar-img rounded-circle bg-primary"><span
                                                        class="smaller text-white position-absolute top-50 start-50 translate-middle">{{$otherConnectionsCount}}+</span>
                                                </div>
                                            </li>
                                            @endif
                                            <li class="small ms-3">
                                                @if ($otherConnectionsCount > 0)
                                                    {{-- Displaying the first two names --}}
                                                    @foreach ($connection->followings->take(2) as $key => $following)
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
                                                    @foreach ($connection->followings as $key => $following)
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
                                            {{-- <li class="avatar avatar-xxs">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ asset('public/user/assets/images/avatar/01.jpg') }}"
                                                    alt="avatar">
                                            </li>
                                            <li class="small ms-3">
                                                {{$connection->client->followings}}
                                                Carolyn Ortiz, Frances Guerrero, and 20 other shared connections
                                            </li>--}}
                                        </ul> 
                                        <!-- Connections END -->
                                    </div>
                                    <!-- Button -->
                                    <div class="ms-md-auto d-flex">


                                        <form action="{{ route('follow.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="follower_id" value="{{ $connection->id }}">
                                            <button type="submit" class="btn btn-primary-soft btn-sm mb-0"> Follow
                                            </button>
                                        </form>


                                    </div>
                                </div>
                            @empty
                                @if ($search_client_id)
                                    @if (!in_array($search_client_id->id, $followIds))
                                        {{-- @include('user.includes.no-people-found') --}}
                                    @endif
                                @else
                                    {{-- @include('user.includes.no-people-found') --}}
                                @endif
                            @endforelse

                        </div>


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
        </div>
        </div>
    </main>
@endsection

@if ($client->followers->count() > 0)
    <div class="col-md-6 col-lg-12">
        <div class="card">
            <!-- Card header START -->
            <div class="card-header d-sm-flex justify-content-between align-items-center border-0">
                <h5 class="card-title">Followers <span
                        class="badge bg-danger bg-opacity-10 text-danger">{{ $client->followers->count() }}</span></h5>
                {{-- <a class="btn btn-primary-soft btn-sm" href="#!"> See all Followers</a> --}}
            </div>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body position-relative pt-0">
                <div class="row g-3">
                    @forelse ($followers as $follow)
                        <div class="col-6">
                            <!-- Friends item START -->
                            <div class="card shadow-none text-center h-100">
                                <!-- Card body -->
                                <div class="card-body p-2 pb-0">
                                    @if ($follow->client->image)
                                        <div class="avatar avatar-story avatar-xl">
                                            <a href="{{ route('client_by_search', $follow->client->username) }}"><img
                                                    class="avatar-img rounded-circle"
                                                    src="{{ asset('public/uploads/client/' . $follow->client->image) }}"
                                                    alt=""></a>
                                        </div>
                                    @else
                                        <div class="avatar avatar-story avatar-xl">
                                            <a href="{{ route('client_by_search', $follow->client->username) }}"><img
                                                    class="avatar-img rounded-circle"
                                                    src="{{ asset('public/user/assets/images/avatar/placeholder.jpg') }}"
                                                    alt=""></a>
                                        </div>
                                    @endif

                                    <h6 class="card-title mb-1 mt-3">
                                        <a href="{{ route('client_by_search', $follow->client->username) }}">
                                            @if ($follow->client->display_name)
                                                {{ $follow->client->display_name }}
                                            @else
                                                {{ $follow->client->fname }}{{ $follow->client->middle_name }}
                                                {{ $follow->client->last_name }}
                                            @endif
                                        </a>
                                    </h6>
                                    {{-- <p class="mb-0 small lh-sm">16 mutual connections</p> --}}
                                </div>
                                <!-- Card footer -->
                                <div class="card-footer p-2 border-0">
                                    {{-- <button class="btn btn-sm btn-primary" data-bs-toggle="tooltip"
                            data-bs-placement="top" aria-label="Send message"
                            data-bs-original-title="Send message"> <i
                                class="bi bi-chat-left-text"></i> </button> 
                                                                                <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                            data-bs-placement="top" aria-label="Remove friend"
                            data-bs-original-title="Remove friend"> <i
                                class="bi bi-person-x"></i> </button>
                                --}}
                                    <form action="{{ route('follow.destroy', $follow) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger mb-0 me-2" aria-label="Unfollow"
                                            data-bs-original-title="Unfollow connection"> <i class="bi bi-person-x"></i>
                                        </button>
                                    </form>

                                </div>
                            </div>
                            <!-- Friends item END -->
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <!-- Card body END -->
        </div>
    </div>
@else
    @php
        $followIds = \App\Models\User\Follow::where('following_id',currentUserId())->pluck('follower_id')->toArray();
        $follow_connections = \App\Models\User\Client::where('id', '!=', currentUserId())
        ->whereNotIn('id', $followIds)
        ->orderBy('id','desc')->take(6)->get();
    @endphp
    <div class="col-sm-6 col-lg-12">
        <div class="card">
            <!-- Card header START -->
            <div class="card-header d-sm-flex justify-content-between align-items-center border-0">
                <h5 class="card-title mb-0">Who to follow</h5>
                <a class="btn btn-primary-soft btn-sm" href="{{route('search_by_people')}}"> See all Connections</a>
            </div>
            <!-- Card header END -->
            <!-- Card body START -->
            <div class="card-body">
                @forelse ($follow_connections as $connection)
                <!-- Connection item START -->
                <div class="hstack gap-2 mb-3">
                    <!-- Avatar -->
                    <div class="avatar">
                        <a href="{{ route('client_by_search', $connection->username) }}">
                            @if ($connection->image)
                            <img class="avatar-img rounded-circle" src="{{ asset('public/uploads/client/' . $connection->image) }}"
                                alt="">
                            @else
                            <img class="avatar-img rounded-circle" src="{{ asset('public/user/assets/images/avatar/placeholder.jpg') }}"
                                alt="">    
                            @endif
                            </a>
                    </div>
                    <!-- Title -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0" href="{{ route('client_by_search', $connection->username) }}">
                            @if($connection->display_name)
                            {{$connection->display_name}}
                            @else
                            {{$connection->fname}} {{$connection->middle_name}} {{$connection->last_name}}
                            @endif
                        </a>
                        <p class="mb-0 small text-truncate">{{ $connection->designation }}</p>
                    </div>
                    <!-- Button -->
                    <form action="{{ route('follow.store') }}" method="post" class="icon-md ms-auto">
                        @csrf
                        <input type="hidden" name="follower_id" value="{{ $connection->id }}">
                        <button type="submit" class="btn btn-primary-soft btn-sm mb-0"> Follow
                        </button>
                    </form>
                </div>
                @empty
                @endforelse
            </div>
            <!-- Card body END -->
        </div>
    </div>
@endif

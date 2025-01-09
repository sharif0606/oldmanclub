<!-- Card follow START -->
  
    <div class="card">
        <!-- Card header START -->
        <div class="card-header pb-0 border-0">
            <h5 class="card-title mb-0">{{$client->followers->count() > 0?"Followers":"Who to follow"}}</h5>
        </div>
        <!-- Card header END -->
        <!-- Card body START -->
        <div class="card-body">
            <!-- Connection item START -->
            @if ($client->followers->count() > 0)
                @forelse ($followers as $follow)
                <div class="hstack gap-2 mb-3">
                        <!-- Avatar -->
                        <div class="avatar">
                            @if ($follow->client->image)
                            <a href="{{ route('client_by_search', $follow->client->username) }}"><img class="avatar-img rounded-circle" src="{{ asset('public/uploads/client/' . $follow->client->image) }}" alt=""></a>
                            @else
                            <a href="{{ route('client_by_search', $follow->client->username) }}"><img class="avatar-img rounded-circle" src="{{ asset('public/user/assets/images/avatar/placeholder.jpg') }}" alt=""></a>
                            @endif
                        </div>
                    <!-- Title -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0" href="{{ route('client_by_search', $follow->client->username) }}">
                            @if ($follow->client->display_name)
                            {{ $follow->client->display_name }}
                            @else
                            {{ $follow->client->fname }}{{ $follow->client->middle_name }}
                            {{ $follow->client->last_name }}
                            @endif
                        </a>
                    </div>
                    <!-- Button -->
                    <a class="btn btn-primary rounded-circle icon-md ms-auto" href="{{ route('client_by_search', $follow->client->username) }}"><i class="bi bi-person-check-fill"> </i></a>
                </div>
                @empty
                @endforelse
            @else
                @php
                $followIds = \App\Models\User\Follow::where('following_id',currentUserId())->pluck('follower_id')->toArray();
                $follow_connections = \App\Models\User\Client::where('id', '!=', currentUserId())
                ->whereNotIn('id', $followIds)
                ->orderBy('id','desc')->take(6)->get();
                @endphp
                @forelse ($followers as $follow)
                <div class="hstack gap-2 mb-3">
                        <!-- Avatar -->
                        <div class="avatar">
                            @if ($follow->client->image)
                            <a href="{{ route('client_by_search', $follow->client->username) }}"><img class="avatar-img rounded-circle" src="{{ asset('public/uploads/client/' . $follow->client->image) }}" alt=""></a>
                            @else
                            <a href="{{ route('client_by_search', $follow->client->username) }}"><img class="avatar-img rounded-circle" src="{{ asset('public/user/assets/images/avatar/placeholder.jpg') }}" alt=""></a>
                            @endif
                        </div>
                    <!-- Title -->
                    <div class="overflow-hidden">
                        <a class="h6 mb-0" href="{{ route('client_by_search', $follow->client->username) }}">
                            @if ($follow->client->display_name)
                            {{ $follow->client->display_name }}
                            @else
                            {{ $follow->client->fname }}{{ $follow->client->middle_name }}
                            {{ $follow->client->last_name }}
                            @endif
                        </a>
                    </div>
                    <!-- Button -->
                    <a class="btn btn-primary rounded-circle icon-md ms-auto" href="{{ route('client_by_search', $follow->client->username) }}"><i class="bi bi-person-check"> </i></a>
                </div>
                @empty
                @endforelse
            @endif
            <!-- Connection item END -->
            <!-- View more button -->
            {{-- <div class="d-grid mt-3">
                <a class="btn btn-sm btn-primary-soft" href="#!">View more</a>
            </div> --}}
        </div>
        <!-- Card body END -->
    </div>

<!-- Card follow START -->
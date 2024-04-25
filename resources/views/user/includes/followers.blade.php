<div class="col-md-6 col-lg-12">
    <div class="card">
        <!-- Card header START -->
        <div class="card-header d-sm-flex justify-content-between align-items-center border-0">
            <h5 class="card-title">Followers <span
                    class="badge bg-danger bg-opacity-10 text-danger">{{$client->followers->count()}}</span></h5>
            <a class="btn btn-primary-soft btn-sm" href="#!"> See all Followers</a>
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
                            <a href="{{route('client_by_search',$follow->client->username)}}"><img class="avatar-img rounded-circle"
                            src="{{ asset('public/uploads/client/' . $follow->client->image) }}"
                            alt=""></a>
                        </div>
                    @else
                    <div class="avatar avatar-story avatar-xl">
                        <a href="{{route('client_by_search',$follow->client->username)}}"><img class="avatar-img rounded-circle"
                            src="{{ asset('public/user/assets/images/avatar/placeholder.jpg') }}"
                            alt=""></a>
                    </div>
                    @endif

                        <h6 class="card-title mb-1 mt-3"> <a href="{{route('client_by_search',$follow->client->username)}}"> {{ $follow->client->fname }}
                            {{ $follow->client->middle_name }} {{ $follow->client->last_name }} </a>
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
                                <form action="{{route('follow.destroy',$follow)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger mb-0 me-2" aria-label="Unfollow"
                                    data-bs-original-title="Unfollow connection"> <i
                                    class="bi bi-person-x"></i> </button>
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
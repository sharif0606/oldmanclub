<!-- Card follow START -->

<div class="card">
    <!-- Card header START -->
    <div class="card-header pb-0 border-0">
        <h5 class="card-title mb-0">Online Active Now</h5>
    </div>
    <!-- Card header END -->
    <!-- Card body START -->
    <div class="card-body">
        @forelse ($online_active_users as $online_active)
        <!-- Connection item START -->
        <div class="hstack gap-2 mb-3">
            <!-- Avatar -->
            <div class="avatar">
                @if ($online_active->image)
                <a href="{{ route('client_by_search', $online_active->username) }}"><img class="avatar-img rounded-circle" src="{{ asset('public/uploads/client/' . $online_active->image) }}" alt=""></a>
                @else
                @endif
            </div>
            <!-- Title -->
            <div class="overflow-hidden">
                <a class="h6 mb-0" href="{{ route('client_by_search', $online_active->username) }}">
                    @if ($online_active->display_name)
                    {{ $online_active->display_name }}
                    @else
                    {{ $online_active->fname }}{{ $online_active->middle_name }}
                    {{ $online_active->last_name }}
                    @endif
                </a>
            </div>
            <!-- Button -->
            <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="{{ route('client_by_search', $online_active->username) }}"><i class="fa-solid fa-plus"> </i></a>
        </div>
        <!-- View more button -->
        {{-- <div class="d-grid mt-3">
                <a class="btn btn-sm btn-primary-soft" href="#!">View more</a>
            </div> --}}
        @empty
        @endforelse
    </div>
    <!-- Card body END -->
</div>

<!-- Card follow START -->
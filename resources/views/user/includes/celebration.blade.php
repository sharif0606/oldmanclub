<!-- Card follow START -->
<div class="card">
    <div class="card-header border-0 pb-0">
        <h5 class="card-title mb-0">Upcoming Birthday</h5>
    </div>
    <div class="card-body">
        @if($online_birthday_users->isEmpty())
        <p class="text-center text-muted">No online friends have a birthday today.</p>
        @else
        @foreach($online_birthday_users as $client)
        <div class="mb-3">
            <!-- Avatar -->
            <div class="avatar avatar-lg w-100 mb-2 d-flex justify-content-center">
                @if ($client->image)
                <a href="{{ route('client_by_search', $client->username) }}"><img class="avatar-img rounded-circle" src="{{ asset('public/uploads/client/' . $client->image) }}" alt=""></a>
                @else
                @endif
            </div>
            <!-- Info -->
            <div class="ms-2 w-100 text-center">
                <h6><a href="{{ route('client_by_search', $client->username) }}">{{ $client->fname }} {{ $client->middle_name }} {{ $client->last_name }}</a></h6>
                <p class="small mb-0 mb-sm-2">Today is their birthday 🎉</p>
                <!-- Dropdown START -->
                <div class="dropdown ms-auto">
                    <a href="#" class="text-secondary" id="bdayActionEdit" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </a>
                    <!-- Dropdown menu -->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bdayActionEdit" style="">
                        <li><a class="dropdown-item" href="{{ route('client_by_search', $client->username) }}"> <i class="bi bi-balloon fa-fw pe-1"></i> Wish On Birthday</a></li>
                    </ul>
                </div>
                <!-- Dropdown END -->
            </div>
            {{--<div class="position-relative w-100">
                <textarea class="form-control pe-4" rows="1" placeholder="Happy birthday dear.."></textarea>
            </div>--}}
        </div>
        @endforeach
        @endif
    </div>
</div>
<!-- Card follow END -->
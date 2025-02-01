<!-- Card follow START -->
<div class="card">
    <div class="card-header border-0 pb-0">
        <h5 class="card-title mb-0">Celebration</h5>
    </div>
    <div class="card-body">
        @if($online_birthday_users->isEmpty())
            <p class="text-center text-muted">No online friends have a birthday today.</p>
        @else
            @foreach($online_birthday_users as $client)
                <div class="mb-3">
                    <!-- Avatar --> 
                    <div class="avatar avatar-lg w-100 mb-2 d-flex justify-content-center">
                        <a href="#!">
                            <img class="avatar-img rounded-circle" src="{{ asset('public/user/assets/images/avatar/default.jpg') }}" alt="">
                        </a>
                    </div>
                    <!-- Info -->
                    <div class="ms-2 w-100 text-center">
                        <h6><a href="#!">{{ $client->fname }} {{ $client->middle_name }} {{ $client->last_name }}</a></h6>
                        <p class="small mb-0 mb-sm-2">Today is their birthday 🎉</p>
                    </div>
                    <div class="position-relative w-100">
                        <textarea class="form-control pe-4" rows="1" placeholder="Happy birthday dear.."></textarea>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<!-- Card follow END -->

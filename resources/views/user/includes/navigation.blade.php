<div class="card-footer mt-3 pt-2 pb-0">
    <!-- Nav profile pages -->
    <ul
        class="nav nav-bottom-line align-items-center justify-content-center justify-content-md-start mb-0 border-0">
        @if (request()->session()->has('username'))
        @php $username = request()->session()->get('username'); @endphp
        <li class="nav-item"> <a class="nav-link @if (request()->routeIs('usernameProfile')) active @endif" href="{{route('usernameProfile',$username)}}">POST</a> </li>
        <li class="nav-item"> <a class="nav-link @if (request()->routeIs('usernameProfileAbout')) active @endif" href="{{route('usernameProfileAbout',$username)}}">ABOUT</a></li>
        <li class="nav-item"> <a class="nav-link @if (request()->routeIs('gathering')) active @endif" href="{{route('gathering')}}">GATHERING</a></li>
        @else
        <li class="nav-item"> <a class="nav-link @if (request()->routeIs('myProfile')) active @endif" href="{{route('myProfile')}}">POST</a> </li>
        <li class="nav-item"> <a class="nav-link @if (request()->routeIs('myProfileAbout')) active @endif" href="{{route('myProfileAbout')}}">ABOUT</a></li>
        <li class="nav-item"> <a class="nav-link @if (request()->routeIs('gathering')) active @endif" href="{{route('gathering')}}">GATHERING</a></li>
        @endif

        
      
        {{-- <li class="nav-item"> <a class="nav-link" href="my-profile-connections.html"> Connections
                <span class="badge bg-success bg-opacity-10 text-success small"> 230</span> </a>
        </li>
        <li class="nav-item"> <a class="nav-link" href="my-profile-media.html"> Media</a> </li>
        <li class="nav-item"> <a class="nav-link" href="my-profile-videos.html"> Videos</a> </li>
        <li class="nav-item"> <a class="nav-link" href="my-profile-events.html"> Events</a> </li>
        <li class="nav-item"> <a class="nav-link" href="my-profile-activity.html"> Activity</a> --}}
        </li>
    </ul>
</div>
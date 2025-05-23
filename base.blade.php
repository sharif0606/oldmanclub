<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <title>OLD CLUB MAN - Network, Community</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    <meta name="description" content="Social Media Network and Community">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Dark mode -->
    <script>
        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
        }

        const setTheme = function(theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if (el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                    const activeThemeIcon = document.querySelector('.theme-icon-active use')
                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                        element.classList.remove('active')
                    })

                    btnToActive.classList.add('active')
                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                }

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (storedTheme !== 'light' || storedTheme !== 'dark') {
                        setTheme(getPreferredTheme())
                    }
                })

                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            localStorage.setItem('theme', theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })

            }
        })
    </script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('public/user/assets/images/favicon.ico') }}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap">

    <!-- Plugins CSS -->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('public/user/assets/vendor/font-awesome/css/all.min.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/user/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/user/assets/vendor/OverlayScrollbars-master/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/user/assets/vendor/tiny-slider/dist/tiny-slider.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/user/assets/vendor/choices.js/public/assets/styles/choices.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/user/assets/vendor/glightbox-master/dist/css/glightbox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user/assets/vendor/dropzone/dist/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user/assets/vendor/flatpickr/dist/flatpickr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user/assets/vendor/plyr/plyr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user/assets/vendor/zuck.js/dist/zuck.min.css') }}">

    {{-- JS FILE FOR CHAT--}}
    {{-- <script src="{{ asset('public/chat/assets/js/pages/index.init.js') }}"></script> --}}

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GMKQ4P9YMZ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-GMKQ4P9YMZ');
    </script>
<style>
    .btn-primary-soft{
        font-size: 0.8rem;
    }
</style>
 @stack('styles')

</head>

<body>
    {{-- Fetch Users --}}
    @php
        $users = DB::select("SELECT chatdata.*,clients.id,clients.fname,clients.image from (SELECT t1.*, CASE WHEN t1.from_user != " . currentUserId() . " THEN t1.from_user ELSE t1.to_user END AS userid , (SELECT SUM(is_read=0) as unread FROM `messages` WHERE messages.to_user=" . currentUserId() . " AND messages.from_user=userid GROUP BY messages.from_user) as unread
        FROM messages AS t1
        INNER JOIN
        (
            SELECT
                LEAST(`from_user`, `to_user`) AS sender_id,
                GREATEST(`from_user`, `to_user`) AS receiver_id,
                MAX(id) AS max_id
            FROM messages
            GROUP BY
                LEAST(sender_id, receiver_id),
                GREATEST(sender_id, receiver_id)
        ) AS t2
            ON LEAST(t1.`from_user`, t1.`to_user`) = t2.sender_id AND
            GREATEST(t1.`from_user`, t1.`to_user`) = t2.receiver_id AND
            t1.id = t2.max_id
            WHERE t1.`from_user` = " . currentUserId() . " OR t1.`to_user` =" . currentUserId() . ") chatdata JOIN clients On clients.id=userid  WHERE clients.id !=" . currentUserId() . " ORDER BY chatdata.id DESC");

    @endphp



    <!-- ======================= Header START -->
        @include('user.includes.header')
    <!-- ======================= Header END -->

    <!-- **************** MAIN CONTENT START **************** -->
    <main>

        <!-- Container START -->
        <div class="container-fluid px-0 px-lg-4">
            @yield('content')
        </div>
        <!-- Container END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->

    <!-- Main Chat START -->
     <div class="d-block">
        <!-- Button -->
        <a  class="icon-md btn btn-primary position-fixed end-0 bottom-0 me-1 mb-5" data-bs-toggle="offcanvas"
            href="{{ route('clientdashboard')}}#offcanvasChat" role="button" aria-controls="offcanvasChat">
            <i class="bi bi-chat-left-text-fill"></i>
        </a>
        {{-- <a target="_blank" href="{{route('chat')}}" class="icon-sm btn btn-primary position-fixed end-0 bottom-0 mb-5" role="button">
        <i class="bi bi-chat-left-text-fill"></i>
        </a> --}}

        <!-- Chat sidebar START -->
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
            id="offcanvasChat">
            <!-- Offcanvas header -->
            <div class="offcanvas-header d-flex justify-content-between">
                <h5 class="offcanvas-title">Messaging</h5>
                <div class="d-flex">
                    <!-- New chat box open button -->
                    <a href="#" class="btn btn-secondary-soft-hover py-1 px-2">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <!-- Chat action START -->
                    <div class="dropdown">
                        <a href="#" class="btn btn-secondary-soft-hover py-1 px-2" id="chatAction"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </a>
                        <!-- Chat action menu -->
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatAction">
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-check-square fa-fw pe-2"></i>Mark all as read</a></li>
                            <li><a class="dropdown-item" href="#"> <i class="bi bi-gear fa-fw pe-2"></i>Chat
                                    setting </a></li>
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-bell fa-fw pe-2"></i>Disable notifications</a></li>
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-volume-up-fill fa-fw pe-2"></i>Message sounds</a></li>
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-slash-circle fa-fw pe-2"></i>Block setting</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"> <i
                                        class="bi bi-people fa-fw pe-2"></i>Create a group chat</a></li>
                        </ul>
                    </div>
                    <!-- Chat action END -->

                    <!-- Close  -->
                    <a href="#" class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="offcanvas"
                        aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </a>

                </div>
            </div>
            <!-- Offcanvas body START -->
            <div class="offcanvas-body pt-0 custom-scrollbar chat-message-chatlist">
                <!-- Search contact START -->
                <form class="rounded position-relative">
                    <input class="form-control ps-5 bg-light" type="search" placeholder="Search..."
                        aria-label="Search">
                    <button class="btn bg-transparent px-3 py-0 position-absolute top-50 start-0 translate-middle-y"
                        type="submit"><i class="bi bi-search fs-5"> </i></button>
                </form>
                <!-- Search contact END -->
                <ul class="list-unstyled chat-user-list chat-user-list">
                    @foreach($users as $user)
                        <!-- Contact item -->
                        <li class="user mt-3 hstack gap-3 align-items-center position-relative toast-btn"
                            data-target="chatToast1" data-id="{{ $user->id }}" id="user-{{ $user->id }}" user-id="{{ $user->id }}">
                            <!-- Avatar -->
                            <div class="avatar status-online">
                                <img class="avatar-img rounded-circle" src="{{ $user->image? asset('public/uploads/client/' . $user->image) : asset('public/images/download.jpg') }}"
                                    alt="">
                            </div>
                            <!-- Info -->
                            <div class="overflow-hidden">
                                <a class="h6 mb-0 stretched-link" href="#!">{{$user->fname}}</a>
                                <div class="small text-secondary text-truncate">{{ $user->message }}</div>
                            </div>
                            <!-- Chat time -->
                            <div class="small ms-auto text-nowrap"> {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}

                </div>
                        </li>
                    @endforeach


                    <!-- Button -->
                    <li class="mt-3 d-grid">
                        <a class="btn btn-primary-soft" href="{{route('chat')}}"> See all in messaging </a>
                    </li>

                </ul>
            </div>
            <!-- Offcanvas body END -->
        </div>
        <!-- Chat sidebar END -->

        <!-- Chat END -->

        <!-- Chat START -->
        {{-- <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div class="toast-container toast-chat d-flex gap-3 align-items-end" id="chat-body-{{ $user->id }}">
                @foreach($users as $user)
                <!-- Chat toast START -->
                <div id="{{$user->id}}" class="toast mb-0 bg-mode" role="alert" aria-live="assertive"
                    aria-atomic="true" data-bs-autohide="false">

                    <div class="toast-header bg-mode">
                        <!-- Top avatar and status START -->
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar me-2">
                                    <img class="avatar-img rounded-circle" src="{{ $user->image? asset('public/uploads/client/' . $user->image) : asset('public/images/download.jpg') }}"
                                        alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 mt-1">{{$user->fname}}</h6>
                                    <div class="small text-secondary"><i
                                            class="fa-solid fa-circle text-success me-1"></i>Online</div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <!-- Call button -->
                                <div class="dropdown">
                                    <a class="btn btn-secondary-soft-hover py-1 px-2" href="#"
                                        id="chatcoversationDropdown" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" aria-expanded="false"><i
                                            class="bi bi-three-dots-vertical"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end"
                                        aria-labelledby="chatcoversationDropdown">
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="bi bi-camera-video me-2 fw-icon"></i>Video call</a></li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="bi bi-telephone me-2 fw-icon"></i>Audio call</a></li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="bi bi-trash me-2 fw-icon"></i>Delete </a></li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="bi bi-chat-square-text me-2 fw-icon"></i>Mark as unread</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="bi bi-volume-up me-2 fw-icon"></i>Muted</a></li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="bi bi-archive me-2 fw-icon"></i>Archive</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="bi bi-flag me-2 fw-icon"></i>Report</a></li>
                                    </ul>
                                </div>
                                <!-- Card action END -->
                                <a class="btn btn-secondary-soft-hover py-1 px-2" data-bs-toggle="collapse"
                                    href="#collapseChat" aria-expanded="false" aria-controls="collapseChat"><i
                                        class="bi bi-dash-lg"></i></a>
                                <button class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="toast"
                                    aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </div>
                        <!-- Top avatar and status END -->

                    </div>
                    <div class="toast-body collapse show" id="collapseChat" style="background: #ddd">
                        <!-- Chat conversation START -->
                        <div class="chat-conversation-content custom-scrollbar h-200px" id="messages">
                            <!-- Chat time -->
                            <div class="text-center small my-2">Jul 16, 2022, 06:15 am</div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg"
                                        alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no
                                                discovery😊</div>
                                            <div class="small my-2">6:15 AM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message right -->
                            <div class="d-flex justify-content-end text-end mb-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="bg-primary text-white p-2 px-3 rounded-2">With pleasure</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg"
                                        alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">Please find the
                                                attached</div>
                                            <!-- Files START -->
                                            <!-- Files END -->
                                            <div class="small my-2">12:16 PM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg"
                                        alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">How promotion
                                                excellent curiosity😮</div>
                                            <div class="small my-2">3:22 PM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message right -->
                            <div class="d-flex justify-content-end text-end mb-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="bg-primary text-white p-2 px-3 rounded-2">And sir dare view.</div>
                                        <!-- Images -->
                                        <div class="d-flex my-2">
                                            <div class="small text-secondary">5:35 PM</div>
                                            <div class="small ms-2"><i class="fa-solid fa-check"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat time -->
                            <div class="text-center small my-2">2 New Messages</div>
                            <!-- Chat Typing -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg"
                                        alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-3 rounded-2">
                                                <div class="typing d-flex align-items-center">
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat conversation END -->
                        <!-- Chat bottom START -->
                        <div class="mt-2">
                            <!-- Chat textarea -->
                            <textarea class="form-control mb-sm-0 mb-3" placeholder="Type a message" rows="1"></textarea>
                            <!-- Button -->
                            <div class="d-sm-flex align-items-end mt-2">
                                <button class="btn btn-sm btn-danger-soft me-2"><i
                                        class="fa-solid fa-face-smile fs-6"></i></button>
                                <button class="btn btn-sm btn-secondary-soft me-2"><i
                                        class="fa-solid fa-paperclip fs-6"></i></button>
                                <button class="btn btn-sm btn-success-soft me-2"> Gif </button>
                                <button class="btn btn-sm btn-primary ms-auto"> Send </button>
                            </div>
                        </div>
                        <!-- Chat bottom START -->
                    </div>
                </div>
                <!-- Chat toast END -->
                @endforeach
            </div>
        </div> --}}
        <!-- Chat END -->

        <!-- Chat START -->
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div class="toast-container toast-chat d-flex gap-3 align-items-end">

                <!-- Chat toast START -->
                <div id="chatToast1" class="toast mb-0 bg-mode" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                    <div class="toast-header bg-mode">
                        <!-- Top avatar and status START -->
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 mt-1">Frances Guerrero</h6>
                                    <div class="small text-secondary"><i class="fa-solid fa-circle text-success me-1"></i>Online</div>
                                </div>
                            </div>
                            <div class="d-flex">
                            <!-- Call button -->
                            <div class="dropdown">
                                <a class="btn btn-secondary-soft-hover py-1 px-2" href="index.html#" id="chatcoversationDropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatcoversationDropdown">
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-camera-video me-2 fw-icon"></i>Video call</a></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-telephone me-2 fw-icon"></i>Audio call</a></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-trash me-2 fw-icon"></i>Delete </a></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-chat-square-text me-2 fw-icon"></i>Mark as unread</a></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-volume-up me-2 fw-icon"></i>Muted</a></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-archive me-2 fw-icon"></i>Archive</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-flag me-2 fw-icon"></i>Report</a></li>
                                </ul>
                            </div>
                            <!-- Card action END -->
                            <a class="btn btn-secondary-soft-hover py-1 px-2" data-bs-toggle="collapse" href="index.html#collapseChat" aria-expanded="false" aria-controls="collapseChat"><i class="bi bi-dash-lg"></i></a>
                            <button class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="toast" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </div>
                    <!-- Top avatar and status END -->

                    </div>
                    <div class="toast-body collapse show" id="collapseChat">
                        <!-- Chat conversation START -->
                        <div class="chat-conversation-content custom-scrollbar h-200px">
                            <!-- Chat time -->
                            <div class="text-center small my-2">Jul 16, 2022, 06:15 am</div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no discovery😊</div>
                                            <div class="small my-2">6:15 AM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message right -->
                            <div class="d-flex justify-content-end text-end mb-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="bg-primary text-white p-2 px-3 rounded-2">With pleasure</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">Please find the attached</div>
                                            <!-- Files START -->
                                            <!-- Files END -->
                                            <div class="small my-2">12:16 PM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">How promotion excellent curiosity😮</div>
                                            <div class="small my-2">3:22 PM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message right -->
                            <div class="d-flex justify-content-end text-end mb-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="bg-primary text-white p-2 px-3 rounded-2">And sir dare view.</div>
                                        <!-- Images -->
                                        <div class="d-flex my-2">
                                            <div class="small text-secondary">5:35 PM</div>
                                            <div class="small ms-2"><i class="fa-solid fa-check"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat time -->
                            <div class="text-center small my-2">2 New Messages</div>
                            <!-- Chat Typing -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-3 rounded-2">
                                                <div class="typing d-flex align-items-center">
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat conversation END -->
                        <!-- Chat bottom START -->
                        <div class="mt-2">
                            <!-- Chat textarea -->
                            <textarea class="form-control mb-sm-0 mb-3" placeholder="Type a message" rows="1"></textarea>
                            <!-- Button -->
                            <div class="d-sm-flex align-items-end mt-2">
                                <button class="btn btn-sm btn-danger-soft me-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
                                <button class="btn btn-sm btn-secondary-soft me-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
                                <button class="btn btn-sm btn-success-soft me-2"> Gif </button>
                                <button class="btn btn-sm btn-primary ms-auto"> Send </button>
                            </div>
                        </div>
                        <!-- Chat bottom START -->
                    </div>
                </div>
                <!-- Chat toast END -->

                {{-- <!-- Chat toast 2 START -->
                <div id="chatToast1" class="toast mb-0 bg-mode" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                    <div class="toast-header bg-mode">
                        <!-- Top avatar and status START -->
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 mt-1">Lori Ferguson</h6>
                                    <div class="small text-secondary"><i class="fa-solid fa-circle text-success me-1"></i>Online</div>
                                </div>
                            </div>
                            <div class="d-flex">
                            <!-- Call button -->
                            <div class="dropdown">
                                <a class="btn btn-secondary-soft-hover py-1 px-2" href="index.html#" id="chatcoversationDropdown2" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatcoversationDropdown2">
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-camera-video me-2 fw-icon"></i>Video call</a></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-telephone me-2 fw-icon"></i>Audio call</a></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-trash me-2 fw-icon"></i>Delete </a></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-chat-square-text me-2 fw-icon"></i>Mark as unread</a></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-volume-up me-2 fw-icon"></i>Muted</a></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-archive me-2 fw-icon"></i>Archive</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-flag me-2 fw-icon"></i>Report</a></li>
                                </ul>
                            </div>
                            <!-- Card action END -->
                            <a class="btn btn-secondary-soft-hover py-1 px-2" data-bs-toggle="collapse" href="index.html#collapseChat2" role="button" aria-expanded="false" aria-controls="collapseChat2"><i class="bi bi-dash-lg"></i></a>
                            <button class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="toast" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </div>
                    <!-- Top avatar and status END -->

                    </div>
                    <div class="toast-body collapse show" id="collapseChat2">
                        <!-- Chat conversation START -->
                        <div class="chat-conversation-content custom-scrollbar h-200px">
                            <!-- Chat time -->
                            <div class="text-center small my-2">Jul 16, 2022, 06:15 am</div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no discovery😊</div>
                                            <div class="small my-2">6:15 AM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message right -->
                            <div class="d-flex justify-content-end text-end mb-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="bg-primary text-white p-2 px-3 rounded-2">With pleasure</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">Please find the attached</div>
                                            <!-- Files START -->
                                            <!-- Files END -->
                                            <div class="small my-2">12:16 PM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">How promotion excellent curiosity😮</div>
                                            <div class="small my-2">3:22 PM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message right -->
                            <div class="d-flex justify-content-end text-end mb-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="bg-primary text-white p-2 px-3 rounded-2">And sir dare view.</div>
                                        <!-- Images -->
                                        <div class="d-flex my-2">
                                            <div class="small text-secondary">5:35 PM</div>
                                            <div class="small ms-2"><i class="fa-solid fa-check"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat time -->
                            <div class="text-center small my-2">2 New Messages</div>
                            <!-- Chat Typing -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-3 rounded-2">
                                                <div class="typing d-flex align-items-center">
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat conversation END -->
                        <!-- Chat bottom START -->
                        <div class="mt-2">
                            <!-- Chat textarea -->
                            <textarea class="form-control mb-sm-0 mb-3" placeholder="Type a message" rows="1"></textarea>
                            <!-- Button -->
                            <div class="d-sm-flex align-items-end mt-2">
                                <button class="btn btn-sm btn-danger-soft me-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
                                <button class="btn btn-sm btn-secondary-soft me-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
                                <button class="btn btn-sm btn-success-soft me-2"> Gif </button>
                                <button class="btn btn-sm btn-primary ms-auto"> Send </button>
                            </div>
                        </div>
                        <!-- Chat bottom START -->
                    </div>
                </div>
                <!-- Chat toast 2 END --> --}}
            </div>
        </div>
        <!-- Chat END -->

        {{-- <!-- Chat START -->
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div class="toast-container toast-chat d-flex gap-3 align-items-end">
                <div id="chat-body-{{ $user->id }}" class="toast mb-0 bg-mode"  role="alert" aria-live="assertive"
                    aria-atomic="true" data-bs-autohide="false">
                @foreach($users as $user)
                <!-- Single Chat START -->
                <div id="chatToast" class="toast mb-0 bg-mode" role="alert" aria-live="assertive"
                    aria-atomic="true" data-bs-autohide="false">

                    <!-- Start Chat User Head -->
                    <div class="p-1 border-bottom">
                        <div class="row align-items-center">
                            <div class="col-sm-4 col-8">
                                <div class="media align-items-center CHATUSER d-flex" >
                                    <div class="d-block d-lg-none mr-2">
                                        <a href="javascript: void(0);" class="user-chat-remove text-muted font-size-16 p-2">
                                            <i class="ri-arrow-left-s-line"></i>
                                        </a>
                                    </div>
                                    <div class="mr-3">
                                        <img src="{{ asset('public/images/download.jpg') }}"
                                            class="rounded-circle avatar-xs" alt="" id="user-profile-sender-img">
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="font-size-16 mb-0 text-truncate">
                                            <a href="#" class="text-reset user-profile-show" id="user-profile-sender-name">Fast name</a>
                                            <i class="ri-record-circle-fill font-size-10 text-success d-inline-block ml-1"></i>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Chat User Head -->

                    <!-- Start Chat Conversation -->
                    <div class="chat-conversation p-3 p-lg-4" data-simplebar>
                        <ul class="list-unstyled mb-0" id="chatul">
                            <!-- Example message LEFT -->
                            <li class="left">
                                <div class="conversation-list">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('assets/images/avatar/01.jpg') }}" alt="">
                                    </div>
                                    <div class="user-chat-content">
                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">Hello, how are you?</p>
                                                <p class="chat-time mb-0">
                                                    <i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">25 Apr 2025, 10:00 AM</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="conversation-name"></div>
                                    </div>
                                </div>
                            </li>

                            <!-- Example message RIGHT -->
                            <li class="right">
                                <div class="conversation-list">
                                    <div class="chat-avatar">
                                        <img src="{{ asset('assets/images/avatar/02.jpg') }}" alt="" class="imgavatar">
                                    </div>
                                    <div class="user-chat-content">
                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <p class="mb-0">I'm good! Thanks.</p>
                                                <p class="chat-time mb-0">
                                                    <i class="ri-time-line align-middle"></i>
                                                    <span class="align-middle">25 Apr 2025, 10:02 AM</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="conversation-name profile-newname"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- End Chat Conversation -->

                    <!-- Start Chat Input Section -->
                    <div class="chat-input px-3 border-top mb-0">
                        <div class="row no-gutters d-flex align-item-center my-2">
                            <div class="col">
                                <div>
                                    <p class="emoji-picker-container d-flex align-items-center m-0">
                                        <input class="input-field form-control form-control-lg bg-light border-light me-4"
                                            data-emojiable="true" data-emoji-input="true"
                                            type="text" name="comment" id="comment"
                                            placeholder="Enter Message..." />
                                    </p>
                                </div>
                            </div>
                            <div class="col-auto my-auto">
                                <div class="chat-input-links ml-md-2">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <form name="chat-file-form" id="chat-file-form" method="post" accept-charset="utf-8"
                                                enctype="multipart/form-data" action="">
                                                <input type="file" name="fileUpload" id="fileUpload" data-user="21" style="display:none;" />
                                                <button type="button" id="btnFile"
                                                    class="btn btn-link text-decoration-none font-size-16 btn-lg waves-effect"
                                                    data-toggle="tooltip" data-placement="top" title="Attach File"
                                                    onclick="document.getElementById('fileUpload').click();">
                                                    <i class="ri-attachment-line"></i>
                                                </button>
                                            </form>
                                        </li>
                                        <li class="list-inline-item">
                                            <button type="button"
                                                class="btn btn-primary font-size-16 btn-sm chat-send waves-effect waves-light send-chat-message"
                                                data-user=21">
                                                <i class="ri-send-plane-2-fill"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Chat Input Section -->

                </div>

            </div>
        </div>
        <!-- Chat END --> --}}


        {{-- <!-- Chat START -->
        <div aria-live="polite" aria-atomic="true" class="position-relative" >
            <div class="toast-container toast-chat d-flex gap-3 align-items-end">
                @foreach($users as $user)
                <!-- Chat toast START -->
                <div id="chatToast{{$user->id}}" class="toast mb-0 bg-mode" role="alert" aria-live="assertive"
                    aria-atomic="true" data-bs-autohide="false">

                    <div class="toast-header bg-mode">
                        <!-- Top avatar and status START -->
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar me-2">
                                    <img class="avatar-img rounded-circle" src="{{ $user->image? asset('public/uploads/client/' . $user->image) : asset('public/images/download.jpg') }}"
                                        alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 mt-1">{{$user->fname}}</h6>
                                    <div class="small text-secondary"><i
                                            class="fa-solid fa-circle text-success me-1"></i>Online</div>
                                </div>
                            </div>
                            <div class="d-flex">
                                <!-- Call button -->
                                <div class="dropdown">
                                    <a class="btn btn-secondary-soft-hover py-1 px-2" href="#"
                                        id="chatcoversationDropdown" data-bs-toggle="dropdown"
                                        data-bs-auto-close="outside" aria-expanded="false"><i
                                            class="bi bi-three-dots-vertical"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end"
                                        aria-labelledby="chatcoversationDropdown">
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="bi bi-camera-video me-2 fw-icon"></i>Video call</a></li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="bi bi-telephone me-2 fw-icon"></i>Audio call</a></li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="bi bi-trash me-2 fw-icon"></i>Delete </a></li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="bi bi-chat-square-text me-2 fw-icon"></i>Mark as unread</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="bi bi-volume-up me-2 fw-icon"></i>Muted</a></li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="bi bi-archive me-2 fw-icon"></i>Archive</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="bi bi-flag me-2 fw-icon"></i>Report</a></li>
                                    </ul>
                                </div>
                                <!-- Card action END -->
                                <a class="btn btn-secondary-soft-hover py-1 px-2" data-bs-toggle="collapse"
                                    href="#collapseChat" aria-expanded="false" aria-controls="collapseChat"><i
                                        class="bi bi-dash-lg"></i></a>
                                <button class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="toast"
                                    aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                        </div>
                        <!-- Top avatar and status END -->

                    </div>
                    <div class="toast-body collapse show" id="collapseChat" style="background: #ddd">
                        <!-- Chat conversation START -->
                        <div class="chat-conversation-content custom-scrollbar h-200px" id="messages">
                            <!-- Chat time -->
                            <div class="text-center small my-2">Jul 16, 2022, 06:15 am</div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg"
                                        alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no
                                                discovery😊</div>
                                            <div class="small my-2">6:15 AM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message right -->
                            <div class="d-flex justify-content-end text-end mb-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="bg-primary text-white p-2 px-3 rounded-2">With pleasure</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg"
                                        alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">Please find the
                                                attached</div>
                                            <!-- Files START -->
                                            <!-- Files END -->
                                            <div class="small my-2">12:16 PM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg"
                                        alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">How promotion
                                                excellent curiosity😮</div>
                                            <div class="small my-2">3:22 PM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message right -->
                            <div class="d-flex justify-content-end text-end mb-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="bg-primary text-white p-2 px-3 rounded-2">And sir dare view.</div>
                                        <!-- Images -->
                                        <div class="d-flex my-2">
                                            <div class="small text-secondary">5:35 PM</div>
                                            <div class="small ms-2"><i class="fa-solid fa-check"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat time -->
                            <div class="text-center small my-2">2 New Messages</div>
                            <!-- Chat Typing -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg"
                                        alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-3 rounded-2">
                                                <div class="typing d-flex align-items-center">
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat conversation END -->
                        <!-- Chat bottom START -->
                        <div class="mt-2">
                            <!-- Chat textarea -->
                            <textarea class="form-control mb-sm-0 mb-3" placeholder="Type a message" rows="1"></textarea>
                            <!-- Button -->
                            <div class="d-sm-flex align-items-end mt-2">
                                <button class="btn btn-sm btn-danger-soft me-2"><i
                                        class="fa-solid fa-face-smile fs-6"></i></button>
                                <button class="btn btn-sm btn-secondary-soft me-2"><i
                                        class="fa-solid fa-paperclip fs-6"></i></button>
                                <button class="btn btn-sm btn-success-soft me-2"> Gif </button>
                                <button class="btn btn-sm btn-primary ms-auto"> Send </button>
                            </div>
                        </div>
                        <!-- Chat bottom START -->
                    </div>
                </div>
                <!-- Chat toast END -->
                @endforeach
            </div>
        </div>
        <!-- Chat END --> --}}

    </div>
    <!-- Main Chat END -->

    <!-- Modal create Feed START -->
    {{-- <div class="modal fade" id="modalCreateFeed" tabindex="-1" aria-labelledby="modalLabelCreateFeed"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal feed header START -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelCreateFeed">Create post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <!-- Modal feed header END -->

                <!-- Modal feed body START -->
                <form action="{{ route('post.store') }}" class="w-100" method="POST">
                            @csrf
                <div class="modal-body">
                    <!-- Add Feed -->
                    <div class="d-flex mb-3">
                        <!-- Avatar -->
                        <div class="avatar avatar-xs me-2">
                            @if ($client->image)
                                        <img class="avatar-img rounded-circle"
                                            src="{{ asset('public/uploads/client/' . $client->image) }}" alt="">
                                    @else
                            <img class="avatar-img rounded-circle"
                                src="{{ asset('public/user/assets/images/avatar/03.jpg') }}" alt="">
                            @endif
                        </div>
                        <!-- Feed box  -->

                            <textarea class="form-control pe-4 fs-3 lh-1 border-0" name="message" rows="4" placeholder="Share your thoughts..."
                                autofocus></textarea>

                    </div>
                    <!-- Feed rect START -->
                    <div class="hstack gap-2">
                        <a class="icon-md bg-success bg-opacity-10 text-success rounded-circle" href="#"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Photo"> <i
                                class="bi bi-image-fill"></i> </a>
                        <a class="icon-md bg-info bg-opacity-10 text-info rounded-circle" href="#"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Video"> <i
                                class="bi bi-camera-reels-fill"></i> </a>
                        <a class="icon-md bg-danger bg-opacity-10 text-danger rounded-circle" href="#"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Events"> <i
                                class="bi bi-calendar2-event-fill"></i> </a>
                        <a class="icon-md bg-warning bg-opacity-10 text-warning rounded-circle" href="#"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Feeling/Activity"> <i
                                class="bi bi-emoji-smile-fill"></i> </a>
                        <a class="icon-md bg-light text-secondary rounded-circle" href="#"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Check in"> <i
                                class="bi bi-geo-alt-fill"></i> </a>
                        <a class="icon-md bg-primary bg-opacity-10 text-primary rounded-circle" href="#"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Tag people on top"> <i
                                class="bi bi-tag-fill"></i> </a>
                    </div>
                    <!-- Feed rect END -->
                </div>
                <!-- Modal feed body END -->

                <!-- Modal feed footer -->
                <div class="modal-footer row justify-content-between">
                    <!-- Select -->
                    <div class="col-lg-3">
                        <select class="form-select js-choice choice-select-text-none" data-position="top"
                            data-search-enabled="false">
                            <option value="PB">Public</option>
                            <option value="PV">Friends</option>
                            <option value="PV">Only me</option>
                            <option value="PV">Custom</option>
                        </select>
                        <!-- Button -->
                    </div>
                    <div class="col-lg-8 text-sm-end">
                        <button type="button" class="btn btn-danger-soft me-2"> <i
                                class="bi bi-camera-video-fill pe-1"></i> Live video</button>
                        <button type="submit" class="btn btn-success-soft">Post</button>
                    </div>
                </div>
                <!-- Modal feed footer -->
                 </form>

            </div>
        </div>
    </div> --}}
    <!-- Modal create feed END -->

    <!-- Modal create Feed photo START -->
    @include('user.includes.add-post-photo')
    @include('user.includes.edit-post')
    @include('user.includes.add-post-video')
    <div class="modal fade" id="feedActionPhoto" tabindex="-1" aria-labelledby="feedActionPhotoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal feed header START -->
                <div class="modal-header">
                    <h5 class="modal-title" id="feedActionPhotoLabel">Add post photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <!-- Modal feed header END -->

                <!-- Modal feed body START -->
                <div class="modal-body">
                    <!-- Add Feed -->
                    <div class="d-flex mb-3">
                        <!-- Avatar -->
                        <div class="avatar avatar-xs me-2">
                            <img class="avatar-img rounded-circle"
                                src="{{ asset('public/user/assets/images/avatar/03.jpg') }}" alt="">
                        </div>
                        <!-- Feed box  -->
                        <form class="w-100">
                            <textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="2" placeholder="Share your thoughts..."></textarea>
                        </form>

                    </div>

                    <!-- Dropzone photo START -->
                    <div>
                        <label class="form-label">Upload attachment</label>
                        <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>
                            <div class="dz-message">
                                <i class="bi bi-images display-3"></i>
                                <p>Drag here or click to upload photo.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Dropzone photo END -->

                </div>
                <!-- Modal feed body END -->

                <!-- Modal feed footer -->
                <div class="modal-footer row justify-content-between">
                    <div class="col-lg-3">
                        <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false"><div class="choices__inner"><select class="form-select js-choice choice-select-text-none choices__input" data-position="top" data-search-enabled="false" hidden="" tabindex="-1" data-choice="active"><option value="PB" data-custom-properties="[object Object]">Public</option></select><div class="choices__list choices__list--single"><div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="PB" data-custom-properties="[object Object]" aria-selected="true">Public</div></div></div><div class="choices__list choices__list--dropdown" aria-expanded="false"><div class="choices__list" role="listbox"><div id="choices--os0g-item-choice-1" class="choices__item choices__item--choice choices__item--selectable is-highlighted" role="option" data-choice="" data-id="1" data-value="PV" data-select-text="Press to select" data-choice-selectable="" aria-selected="true">Custom</div><div id="choices--os0g-item-choice-2" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="2" data-value="PV" data-select-text="Press to select" data-choice-selectable="">Friends</div><div id="choices--os0g-item-choice-3" class="choices__item choices__item--choice choices__item--selectable" role="option" data-choice="" data-id="3" data-value="PV" data-select-text="Press to select" data-choice-selectable="">Only me</div><div id="choices--os0g-item-choice-4" class="choices__item choices__item--choice is-selected choices__item--selectable" role="option" data-choice="" data-id="4" data-value="PB" data-select-text="Press to select" data-choice-selectable="">Public</div></div></div></div>

                    </div>
                    <div class="col-lg-8 text-sm-end">
                    <!-- Button -->
                    <button type="button" class="btn btn-danger-soft me-2"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success-soft">Post</button>
                    <!-- Button -->
                    </div>

                </div>
                <!-- Modal feed footer -->
            </div>
        </div>
    </div>
    <!-- Modal create Feed photo END -->

    <!-- Modal create Feed video START -->

    <!-- Modal create Feed video END -->

    <!-- Modal create events START -->
    <div class="modal fade" id="modalCreateEvents" tabindex="-1" aria-labelledby="modalLabelCreateAlbum"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal feed header START -->
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabelCreateAlbum">Create event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <!-- Modal feed header END -->
                <!-- Modal feed body START -->
                <div class="modal-body">
                    <!-- Form START -->
                    <form class="row g-4">
                        <!-- Title -->
                        <div class="col-12">
                            <label class="form-label">Title</label>
                            <input type="email" class="form-control" placeholder="Event name here">
                        </div>
                        <!-- Description -->
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="2" placeholder="Ex: topics, schedule, etc."></textarea>
                        </div>
                        <!-- Date -->
                        <div class="col-sm-4">
                            <label class="form-label">Date</label>
                            <input type="text" class="form-control flatpickr" placeholder="Select date">
                        </div>
                        <!-- Time -->
                        <div class="col-sm-4">
                            <label class="form-label">Time</label>
                            <input type="text" class="form-control flatpickr" data-enableTime="true"
                                data-noCalendar="true" placeholder="Select time">
                        </div>
                        <!-- Duration -->
                        <div class="col-sm-4">
                            <label class="form-label">Duration</label>
                            <input type="email" class="form-control" placeholder="1hr 23m">
                        </div>
                        <!-- Location -->
                        <div class="col-12">
                            <label class="form-label">Location</label>
                            <input type="email" class="form-control" placeholder="Logansport, IN 46947">
                        </div>
                        <!-- Add guests -->
                        <div class="col-12">
                            <label class="form-label">Add guests</label>
                            <input type="email" class="form-control" placeholder="Guest email">
                        </div>
                        <!-- Avatar group START -->
                        <div class="col-12 mt-3">
                            <ul class="avatar-group list-unstyled align-items-center mb-0">
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg"
                                        alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg"
                                        alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg"
                                        alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg"
                                        alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg"
                                        alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg"
                                        alt="avatar">
                                </li>
                                <li class="avatar avatar-xs">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg"
                                        alt="avatar">
                                </li>
                                <li class="ms-3">
                                    <small> +50 </small>
                                </li>
                            </ul>
                        </div>
                        <!-- Upload Photos or Videos -->
                        <!-- Dropzone photo START -->
                        <div>
                            <label class="form-label">Upload attachment</label>
                            <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>
                                <div class="dz-message">
                                    <i class="bi bi-file-earmark-text display-3"></i>
                                    <p>Drop presentation and document here or click to upload.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Dropzone photo END -->
                    </form>
                    <!-- Form END -->
                </div>
                <!-- Modal feed body END -->
                <!-- Modal footer -->
                <!-- Button -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal">
                        Cancel</button>
                    <button type="button" class="btn btn-success-soft">Create now</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal create events END -->

    <!-- =======================
JS libraries, plugins and custom scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@include('chat.layouts.vendor-scripts')
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script>
     toastr.options = {
        "positionClass": "toast-bottom-left",
        "closeButton": true, // Optional: Show close button
        "progressBar": true, // Optional: Show progress bar
        "timeOut": "5000",   // Optional: Set the duration of the toast
    };
</script>
{!! Toastr::message() !!}
@stack('scripts')
<script>
    /**
     *-------------------------------------------------------------
        * Select User Chat Open
        *-------------------------------------------------------------
        */

    var firstUser = $(".chat-user-list")
        .find(".user")
        .attr("data-id");
    userclick(firstUser);
    $(".chat-message-chatlist ul li").on("click", function () {
        // alert("Chat");
        var id = $(this).attr("user-id");
        userclick(id);
    });
    $(".chat-user-click").on("click", function () {
        var id = $(this).attr("user-id");
        userclick(id);
    });

    function userclick(receiver_id) {
        console.log("Revicer Id:", receiver_id);
        receiver_userid = receiver_id;
        $(".user").removeClass("active");
        $("#user-" + receiver_id).addClass("active");
        $("#user-" + receiver_id)
            .find(".pending")
            .remove();
        $("#messages").show();
        $.ajax({
            type: "get",
            url: "message/" + receiver_id,
            // need to create this route
            data: "",
            cache: false,
            success: function success(data) {
                var toastContent = `<div id="chatToast${receiver_id}" class="toast mb-0 bg-mode" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                    <div class="toast-header bg-mode">
                        <!-- Top avatar and status START -->
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 mt-1">Frances Guerrero</h6>
                                    <div class="small text-secondary"><i class="fa-solid fa-circle text-success me-1"></i>Online</div>
                                </div>
                            </div>
                            <div class="d-flex">
                            <!-- Call button -->
                            <div class="dropdown">
                                <a class="btn btn-secondary-soft-hover py-1 px-2" href="index.html#" id="chatcoversationDropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatcoversationDropdown">
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-camera-video me-2 fw-icon"></i>Video call</a></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-telephone me-2 fw-icon"></i>Audio call</a></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-trash me-2 fw-icon"></i>Delete </a></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-chat-square-text me-2 fw-icon"></i>Mark as unread</a></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-volume-up me-2 fw-icon"></i>Muted</a></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-archive me-2 fw-icon"></i>Archive</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="index.html#"><i class="bi bi-flag me-2 fw-icon"></i>Report</a></li>
                                </ul>
                            </div>
                            <!-- Card action END -->
                            <a class="btn btn-secondary-soft-hover py-1 px-2" data-bs-toggle="collapse" href="index.html#collapseChat" aria-expanded="false" aria-controls="collapseChat"><i class="bi bi-dash-lg"></i></a>
                            <button class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="toast" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    </div>
                    <!-- Top avatar and status END -->

                    </div>
                    <div class="toast-body collapse show" id="collapseChat">
                        <!-- Chat conversation START -->
                        <div class="chat-conversation-content custom-scrollbar h-200px">
                            <!-- Chat time -->
                            <div class="text-center small my-2">Jul 16, 2022, 06:15 am</div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">Applauded no discovery😊</div>
                                            <div class="small my-2">6:15 AM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message right -->
                            <div class="d-flex justify-content-end text-end mb-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="bg-primary text-white p-2 px-3 rounded-2">With pleasure</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">Please find the attached</div>
                                            <!-- Files START -->
                                            <!-- Files END -->
                                            <div class="small my-2">12:16 PM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message left -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-2 px-3 rounded-2">How promotion excellent curiosity😮</div>
                                            <div class="small my-2">3:22 PM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat message right -->
                            <div class="d-flex justify-content-end text-end mb-1">
                                <div class="w-100">
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="bg-primary text-white p-2 px-3 rounded-2">And sir dare view.</div>
                                        <!-- Images -->
                                        <div class="d-flex my-2">
                                            <div class="small text-secondary">5:35 PM</div>
                                            <div class="small ms-2"><i class="fa-solid fa-check"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat time -->
                            <div class="text-center small my-2">2 New Messages</div>
                            <!-- Chat Typing -->
                            <div class="d-flex mb-1">
                                <div class="flex-shrink-0 avatar avatar-xs me-2">
                                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="w-100">
                                        <div class="d-flex flex-column align-items-start">
                                            <div class="bg-light text-secondary p-3 rounded-2">
                                                <div class="typing d-flex align-items-center">
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                    <div class="dot"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Chat conversation END -->
                        <!-- Chat bottom START -->
                        <div class="mt-2">
                            <!-- Chat textarea -->
                            <textarea class="form-control mb-sm-0 mb-3" placeholder="Type a message" rows="1"></textarea>
                            <!-- Button -->
                            <div class="d-sm-flex align-items-end mt-2">
                                <button class="btn btn-sm btn-danger-soft me-2"><i class="fa-solid fa-face-smile fs-6"></i></button>
                                <button class="btn btn-sm btn-secondary-soft me-2"><i class="fa-solid fa-paperclip fs-6"></i></button>
                                <button class="btn btn-sm btn-success-soft me-2"> Gif </button>
                                <button class="btn btn-sm btn-primary ms-auto"> Send </button>
                            </div>
                        </div>
                        <!-- Chat bottom START -->
                    </div>
                </div>`;
               $("#chat-body-" + receiver_id).html(data.view1);
                scrollToBottomFunc();
                loademoji();
            },
        });


    }

    /**
     *-------------------------------------------------------------
        * scrollToBottom
        *-------------------------------------------------------------
        */

    function scrollToBottomFunc() {
        var height = 0;
        $("#chatul li div").each(function (i, value) {
            height += parseInt($(this).height());
        });
        height += "";
        setTimeout(function () {
            $("#messages #chatul").parent().parent().animate(
                {
                    scrollTop: height,
                },
                1000
            );
        }, 100);
    }

    function scrollToBottomFuncGroup() {
        var height = 0;
        $("#chatgroup-ul li div").each(function (i, value) {
            height += parseInt($(this).height());
        });
        height += "";
        setTimeout(function () {
            $("#group-messages #chatgroup-ul")
                .parent()
                .parent()
                .animate(
                    {
                        scrollTop: height,
                    },
                    1000
                );
        }, 100);
    }
    /**
     *-------------------------------------------------------------
        * Load Only last messages Chat
        *-------------------------------------------------------------
        */
    function loademoji() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
            emojiable_selector: "[data-emojiable=true]",
            assetsPath: "vendor/emoji-picker/lib/img/",
            popupButtonClasses: "icon-smile",
        });
        window.emojiPicker.discover();
    }


    $(document).ready(function() {
        // Initialize Dropzone
        var myDropzoneImage = new Dropzone("#image-dropzone", {
            url: "{{ route('post.store') }}",
            paramName: 'file',
            maxFilesize: 5,
            maxFiles: 1,
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            autoProcessQueue: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            init: function() {
                this.on("sending", function(file, xhr, formData) {
                    // Append additional form data to Dropzone request
                    formData.append('message', $('#message').val());
                });
            }
        });



        // Handle Dropzone success event
        myDropzoneImage.on('success', function(file, response) {
            // Handle success response
            console.log(response);
            // Optionally, close the modal

                $('#feedActionPhoto').modal('hide');

                //$('#feedActionVideo').modal('hide');

            window.location.href = "{{route('clientdashboard')}}";
        });

        // Handle Dropzone error event
        myDropzoneImage.on('error', function(file, errorMessage) {
            // Handle error event
            console.error(errorMessage);
            // Display error message to the user
            alert("Error: " + errorMessage);
        });


        var myDropzoneVideo = new Dropzone("#video-dropzone", {
            url: "{{ route('post.store') }}",
            paramName: 'file',
            maxFilesize: 40,
            maxFiles: 1,
            acceptedFiles: 'video/*',
            addRemoveLinks: true,
            autoProcessQueue: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            init: function() {
                this.on("sending", function(file, xhr, formData) {
                    // Append additional form data to Dropzone request
                    formData.append('message', $('#message').text());
                });
            }
        });



        // Handle Dropzone success event
        myDropzoneVideo.on('success', function(file, response) {
            // Handle success response
            console.log(response);
            // Optionally, close the modal
            $('#feedActionVideo').modal('hide');
            window.location.href = "{{route('clientdashboard')}}";
        });

        // Handle Dropzone error event
        myDropzoneVideo.on('error', function(file, errorMessage) {
            // Handle error event
            console.error(errorMessage);
            // Display error message to the user
            alert("Error: " + errorMessage);
        });

        // Handle form submission
        function submitForm(formId) {
            var formData = new FormData($("#" + formId)[0]);
            // Append CSRF token to form data
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                type: 'POST',
                url: "{{ route('post.store') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Handle success response
                    console.log(response);
                    // Optionally, close the appropriate modal
                    var fileType = formData.get('file').type.split('/')[0]; // 'image' or 'video'

                    if (fileType === 'image') {
                        $('#feedActionPhoto').modal('hide');
                    } else if (fileType === 'video') {
                        $('#feedActionVideo').modal('hide');
                    }
                    window.location.href = "{{route('clientdashboard')}}";
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                    // Display error message to the user
                    alert("Error: " + xhr.responseText);
                }
            });
        }

        // Call the function with the appropriate form ID
        $("#submitBtnPhoto").on("click", function() {
            // Check if Dropzone has files
            if (myDropzoneImage.getQueuedFiles().length > 0) {
                // Process Dropzone queue
                myDropzoneImage.processQueue();
            } else {
                // If no files in Dropzone queue, submit the form
                submitForm('formSubmitPhoto');
            }
        });

        $("#submitBtnVideo").on("click", function() {
            // Check if Dropzone has files
            if (myDropzoneVideo.getQueuedFiles().length > 0) {
                // Process Dropzone queue
                myDropzoneVideo.processQueue();
            } else {
                // If no files in Dropzone queue, submit the form
                submitForm('formSubmitVideo');
            }
        });


        /*=== Edit Post  ===*/
        // Handle click event for edit post dropdown item
        $(".edit-post").click(function(event) {
            // Prevent the default action of the link
            event.preventDefault();
            // Get the post ID from data attribute
            var postId = $(this).data('post-id');
            // AJAX request to fetch edit form data
            $.ajax({
                url:  "{{ url('/') }}"+'/user/post/' + postId + '/edit',
                type: 'GET',
                success: function(data) {
                    // Populate the modal with fetched data
                    $('#editMessage').val(data.message);
                    $('#editPrivacy').val(data.privacy);

                    // Set the post ID to the input field's data attribute
                    $('#postId').val(postId);
                    // Open the edit post modal
                    $('#editPostModal').modal('show');
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(error);
                    // Display error message to the user
                    alert("Error: " + error);
                }
            });
        });



            // Initialize Dropzone for post update
            var editDropzone = new Dropzone("#editPostDropzone", {
                url: "{{ route('postUpdate') }}",
                paramName: 'image',
                maxFilesize: 5,
                maxFiles: 1,
                acceptedFiles: 'image/*',
                addRemoveLinks: true,
                autoProcessQueue: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                init: function() {
                    this.on("sending", function(file, xhr, formData) {
                        // Append additional form data to Dropzone request
                        formData.append('postId', $('#postId').val());
                        formData.append('message', $('#editMessage').val());
                    });
                }
            });


            // Handle form submission for post update
            $("#editSubmitBtn").on('click', function() {
                // Check if Dropzone has files
                if (editDropzone.getQueuedFiles().length > 0) {
                    // Process Dropzone queue
                    editDropzone.processQueue();
                } else {
                    // If no files in Dropzone queue, submit the form
                    submitEditForm();
                }
            });

            // Handle Dropzone success event for post update
            editDropzone.on('success', function(file, response) {
                // Handle success response
                console.log(response);
                // Optionally, close the modal
                $('#editPostModal').modal('hide');
                // Redirect or update UI as needed
                window.location.href = "{{route('clientdashboard')}}";
            });

        // Function to submit edit form without files
        function submitEditForm() {
            // Implement your form submission logic here

            var formData = new FormData($("#editFormSubmit")[0]);
            formData.append('postId', $('#postId').val());
                    formData.append('message', $('#editMessage').val());
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('postUpdate') }}",
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Handle success response
                            $('#editPostModal').modal('hide');
                            window.location.href = "{{route('clientdashboard')}}";
                        },
                        error: function(xhr, status, error) {
                            // Handle error response
                            console.error(xhr.responseText);
                            alert("Error: " + xhr.responseText);
                        }
                    });
        }




    });
    function confirmShare(button) {
        if (confirm("Are you sure you want to share this post?")) {
            button.closest('.share-form').submit();
        }
    }
    /*============Delete Post ===============*/


    $(document).ready(function() {
        $('[data-delete-post-id]').on('click', function(event) {
            event.preventDefault();

            var deleteUrl = $(this).data('delete-url');

            if (confirm('Are you sure you want to delete this post?')) {
                $.ajax({
                    url: deleteUrl, // Use the dynamic URL here
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload(); // Reload the page or remove the post element
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                    }
                });
            }
        });
    });





</script>
    @include('user/scripts/reply-form-script')
    @include('user/scripts/add-comment-script')
    @include('user/scripts/comment-reply-script')
    @include('user/scripts/nested-reply-script')
    @include('user/scripts/comment-like-script')
    @include('user/scripts/post-reaction-script')
    @include('user/scripts/comment-reaction-script')
    @include('user/scripts/reply-reaction-script')
    @include('user/scripts/post-privacy-script')
    <!-- Custome Script JS -->
    <script src="{{ asset('public/user/assets/js/script.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('public/user/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Vendors -->
    <script src="{{ asset('public/user/assets/vendor/tiny-slider/dist/tiny-slider.js') }}"></script>
    <script src="{{ asset('public/user/assets/vendor/OverlayScrollbars-master/js/OverlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('public/user/assets/vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('public/user/assets/vendor/glightbox-master/dist/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('public/user/assets/vendor/flatpickr/dist/flatpickr.min.js') }}"></script>
    <script src="{{ asset('public/user/assets/vendor/plyr/plyr.js') }}"></script>
    <script src="{{ asset('public/user/assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('public/user/assets/vendor/zuck.js/dist/zuck.min.js') }}"></script>
    <script src="{{ asset('public/user/assets/js/zuck-stories.js') }}"></script>
    <!-- Theme Functions -->
    <script src="{{ asset('public/user/assets/js/functions.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let currentVideo = null;
            let videoPlaybackPositions = new Map(); // To keep track of playback positions

            const videos = document.querySelectorAll('video');

            // Create an intersection observer to detect visibility
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    const video = entry.target;
                    if (entry.isIntersecting) {
                        // If there's a currently playing video, pause it
                        if (currentVideo && currentVideo !== video) {
                            videoPlaybackPositions.set(currentVideo, currentVideo.currentTime); // Save playback position
                            currentVideo.pause();
                        }
                        // Restore playback position and play the current video
                        if (videoPlaybackPositions.has(video)) {
                            video.currentTime = videoPlaybackPositions.get(video);
                        }
                        video.play();
                        currentVideo = video;
                    } else {
                        // Save the playback position when the video is not visible
                        if (currentVideo === video) {
                            videoPlaybackPositions.set(video, video.currentTime);
                            video.pause();
                            currentVideo = null;
                        }
                    }
                });
            }, {
                threshold: 0.5 // Adjust this threshold as needed
            });

            // Observe each video element
            videos.forEach(video => {
                observer.observe(video);
            });
        });
        </script>


</body>
</html>

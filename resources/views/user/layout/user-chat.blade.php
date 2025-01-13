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

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @include('chat.layouts.head')
    <style>
        
    </style>
</head>

<body>

    <!-- ======================= Header START -->
    @include('user.includes.header')
    <!-- ======================= Header END -->

    <!-- **************** MAIN CONTENT START **************** -->
    <main>
        <div class="container-fluid px-5">
            <div class="row gx-0">
                <!-- Begin page -->
                <div class="layout-wrapper d-lg-flex">
                    <!-- Start left sidebar-menu -->
                    @include('chat.layouts.sidebar')
                    <!-- end left sidebar-menu -->

                    @yield('content')
                </div>
                <!-- END layout-wrapper -->
            </div>
        </div>
    </main>
    <!-- **************** MAIN CONTENT END **************** -->



    <!-- =======================JS libraries, plugins and custom scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @include('chat.layouts.vendor-scripts')

    @stack('scripts')

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



</body>

</html>
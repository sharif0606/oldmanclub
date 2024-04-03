<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Mirrored from social.webestica.com/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2024 13:01:13 GMT -->
<head>
	<title>OLD CLUB MAN - Network, Community</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Bootstrap 5 based Social Media Network and Community Theme">

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')
 
		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
		}

		const setTheme = function (theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
		    var el = document.querySelector('.theme-icon-active');
			if(el != 'undefined' && el != null) {
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
    @stack('scripts')
    <script src="{{asset('public/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('public/js/quixnav-init.js')}}"></script>
    <script src="{{asset('public/js/custom.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('public/user/assets/images/favicon.ico')}}">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/assets/vendor/font-awesome/css/all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/assets/css/style.css')}}">
	 
</head>

<body>

<!-- **************** MAIN CONTENT START **************** -->
@yield('content')
<!-- **************** MAIN CONTENT END **************** -->
 

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="{{ asset('public/user/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- Vendors -->
<script src="{{ asset('public/user/assets/vendor/pswmeter/pswmeter.min.js')}}"></script>

<!-- Theme Functions -->
<script src="{{ asset('public/user/assets/js/functions.js')}}"></script>
  
>>>>>>> 66b64afa7ee90268d99fb0f21fa127bf965595c8
</body>

<!-- Mirrored from social.webestica.com/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2024 13:01:13 GMT -->
</html>
 
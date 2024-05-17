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
	<style>
        .error {
            color: red;
            font-size: 0.875em;
            display: block;
            margin-top: 0.25rem;
        }
        .form-group {
            position: relative;
        }
        .form-group .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.25rem;
        }
        #birthdate-error {
            margin-top: 0.5rem;
            display: none;
            color: red;
        }
    </style> 
</head>

<body>

<!-- **************** MAIN CONTENT START **************** -->
@yield('content')
<!-- **************** MAIN CONTENT END **************** -->
 

<!-- =======================
JS libraries, plugins and custom scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('public/user/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- Vendors -->
<script src="{{ asset('public/user/assets/vendor/pswmeter/pswmeter.min.js')}}"></script>

<!-- Theme Functions -->
<script src="{{ asset('public/user/assets/js/functions.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
	$(document).ready(function() {
		// Generate day options
		for (let i = 1; i <= 31; i++) {
			$('#birthDay').append(new Option(i, i));
		}

		// Generate year options
		const currentYear = new Date().getFullYear();
		for (let i = currentYear; i >= 1900; i--) {
			$('#birthYear').append(new Option(i, i));
		}

		// Function to check if year is a leap year
		function isLeapYear(year) {
			return (year % 4 === 0 && year % 100 !== 0) || (year % 400 === 0);
		}

		// Set old values if available
        const oldBirthDay = "{{ old('birthDay') }}";
        const oldBirthMonth = "{{ old('birthMonth') }}";
        const oldBirthYear = "{{ old('birthYear') }}";

        if (oldBirthDay) {
            $('#birthDay').val(oldBirthDay);
        }
        if (oldBirthMonth) {
            $('#birthMonth').val(oldBirthMonth);
        }
        if (oldBirthYear) {
            $('#birthYear').val(oldBirthYear);
        }

		// Function to validate the date
		function isValidDate(day, month, year) {
			if (month == 2) {
				if (isLeapYear(year)) {
					return day <= 29;
				} else {
					return day <= 28;
				}
			} else if ([4, 6, 9, 11].includes(month)) {
				return day <= 30;
			} else {
				return day <= 31;
			}
		}

		// Form validation
		$('#signupForm').validate({
			rules: {
				fname: {
					required: true
				},
				last_name: {
					required: true
				},
				contact_or_email: {
					required: true,
				},
				password: {
					required: true,
				},
				birthDay: {
					required: true,
					number: true
				},
				birthMonth: {
					required: true,
					number: true
				},
				birthYear: {
					required: true,
					number: true
				},
			},
			messages: {
				fname: "Please enter your first name",
				last_name: "Please enter your lastname",
				contact: {
					required: "Please enter a Email or Contact",
				},
				birthDay: "Please select your birth day",
				birthMonth: "Please select your birth month",
				birthYear: "Please select your birth year",
			},
			highlight: function(element) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function(element) {
				$(element).removeClass('is-invalid');
			},
			errorPlacement: function(error, element) {
				if (element.attr("name") == "birthDay" || element.attr("name") == "birthMonth" || element.attr("name") == "birthYear") {
                        //error.appendTo("#birthdate-error");
                    } else {
                        //error.insertAfter(element);
                    }
			},
			submitHandler: function(form) {
				// Validate date before submitting
				const day = parseInt($('#birthDay').val());
				const month = parseInt($('#birthMonth').val());
				const year = parseInt($('#birthYear').val());

				if (!isValidDate(day, month, year)) {
                        $('#birthdate-error').text('Invalid date. Please check your birth date.').show();
                        $('#birthDay, #birthMonth, #birthYear').addClass('is-invalid');
                        return false;
                    } else {
                        $('#birthdate-error').hide();
                        $('#birthDay, #birthMonth, #birthYear').removeClass('is-invalid');
                    }

				form.submit();
			}
		});
	});
</script>  
</body>


</html>
 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{env('APP_NAME')}} | @yield('title','Page Name')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/images/favicon.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">
    @stack('styles')

</head>

<body class="h-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 hero p-0" style="background-image:url({{asset('public/assets/images/login_register/Frame.png')}})">
                <!-- <h5 class="hero-heading"><i class="fab fa-slack"></i> Old Club Man</h5> -->
                <div class="hero-text text-white">
                    <i class="fas fa-quote-left"></i>
                    <p>The passage experienced a surge in popularity during the 1960s when laetraset used it on their dry-transfer sheets. And again during the 90s as desktop publishers bundled the text with their software.</p>
                    <svg xmlns="http://www.w3.org/2000/svg"  transform="rotate(90)" width="26" height="26" fill="currentColor" class="bi bi-amd  float-end" viewBox="0 0 16 16">
                        <path d="m.334 0 4.358 4.359h7.15v7.15l4.358 4.358V0zM.2 9.72l4.487-4.488"/>
                    </svg>
                </div> 
              
            </div>
            <div class="col-md-6">
                @yield('content')
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('public/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('public/js/quixnav-init.js')}}"></script>
    <script src="{{asset('public/js/custom.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	{!! Toastr::message() !!}
</body>
</html>
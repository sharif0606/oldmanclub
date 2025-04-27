<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', env('APP_NAME')) </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/images/frontend_logo.png') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user/assets/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/nfc/styles.css') }}" />
    
</head>

<body>
   
                @yield('content')




    

</body>

</html>

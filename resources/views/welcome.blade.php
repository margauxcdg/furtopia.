<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jV.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel=”stylesheet” href=”css/bootstrap.css”>
        <link rel=”stylesheet” href=”css/bootstrap-responsive.css”>

        <!--Icon-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-fX9w5EaKQx5CnJv+gWzC1AOhd+ZKtfJBSnSYFb/r+P7VjLJyML1pMh3c3jK7+uYG9YYvfRtR49A2oGIwYPdGAw==" crossorigin="anonymous" />
    </head>
    <body>
        <div class="welcome-page">
            
            <div class="join">
                <a href="{{ route('register') }}" class="btn join-btn fs-3">Join Us!</a>
            </div>
            
            
           

        </div>
    </body>
   
</html>

<!doctype html>
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

    <!--Icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>
<body>
<div class="reg-form vh-100">
    <div class="row">
        <div class="col-md-6">
            <div class="form">
                <form method="POST" action="{{ route('login') }}" class="register-form">
                    @csrf
                    <h1>Welcome!</h1>
                    <p class="mb-3">Our lovable pet is waiting for you!</p>
                    
                    <div class="row md-8">
                        <div class="col-md-9 fs-5">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        </div>
                        <div class="col-md-10 mb-3">
                            <input id="email" type="email" placeholder="Email Address" class="registration form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row md-8">
                        <div class="col-md-9 fs-5">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                        </div>
                        <div class="col-md-10">
                            <input id="password" type="password" placeholder="Password" class="reg form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row md-8">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input small-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label rememberme fs-6" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                
                    </div>

                    <div class="row md-8">
                        <div class="col-md-9 mt-4 text-center">
                            <button type="submit" class="btn reg-btn text-uppercase fs-5 fw-bold text-white px-3 py-2">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>

                </form>
                <hr>
                <div class="row md-8">
                    <div class="col-md-9 d-flex justify-content-center">
                        <p class="fs-6 mytext-center">Don't have an account yet?
                            <a href="{{ route('register') }}" >Register</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="registerdesign d-flex align-items-center" style="background-image: url('{{asset('img/BG Paws.png')}}');">
                <img src="{{asset('img/logindog.png')}}" class="img-fluid d-flex vh-100"style="object-fit: cover;">
                
            </div>
        </div> 
    </div>
   
</div>
</body>
</html>
{{-- <x-guest-layout> --}}
    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

    {{-- <form method="POST" action="{{ route('login') }}">
        @csrf --}}

        <!-- Email Address -->
        {{-- <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div> --}}
        
    {{-- </form> --}}
{{-- </x-guest-layout> --}}

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstraplogin.css') }}">
    <link href="{{ asset('asset/css/fontlogin.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/fontawesome-all.css') }}">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .splash-container {
    width: 100%;
    max-width: 375px;
    padding: 15px;
    margin: auto;
    }
    .card-footer.bg-white.p-0 {
    text-align: center;
    }
    </style>
    
</head>

<body>
    
    <div class="splash-container">
        <div class="card">
            <div class="card-header text-center"><span class="splash-description">Please enter your user information.</span></div>
            <x-auth-session-status class="mb-4" :status="session('status')"/>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                    <div class="form-group">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                     <!-- Password -->
                    <div class="form-group">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="form-control form-control-lg"
                        type="password" name="password" required autocomplete="current-password" />
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <!-- Remember Me -->
                    <div class="form-group">
                        <label for="remember_me" class="custom-control custom-checkbox">
                            <input id="remember_me" type="checkbox" class="custom-control-input" name="remember">
                            <span class="custom-control-label">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <x-primary-button class="btn btn-primary btn-lg btn-block">
                        {{ __('Log in') }}
                    </x-primary-button>
                </form>
            </div>
            
            <div class="card-footer bg-white p-0  ">
                @if (Route::has('password.request'))
                    <a class="card-footer-item card-footer-item-bordered" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
    
                
            </div> 
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    {{-- <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script> --}}
    {{-- <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script> --}}
</body>
 
</html>

{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

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
            <div class="card-header text-center">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="card-body">
                <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <!-- Email Address -->
                    <div class="form-group">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <x-primary-button class="btn btn-primary btn-lg btn-block">
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </form>
            </div>
            
            <div class="card-footer bg-white p-0  ">
                
    
                
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

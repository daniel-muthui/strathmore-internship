<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Strathmore Internship</title>

    <!-- CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #3a5dae;
        }
        .small-card {
            max-width: 300px;
            margin: 0 auto;
            background-color: #3a5dae;

        }
    </style>
</head>
<body>
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <div class="small-card card p-4">
            <div class="login-header mb-3">
                <div class="brand">
                    <div class="d-flex align-items-center navbar-brand">
                        <img src="{{ asset('storage/images/studentaffairslogo.png') }}" height="75px" alt="Strath Logo"/>
                    </div>
                </div>
            </div>
        <div class="mb-4 text-sm text-white">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
           
            <!-- Email Address -->
            <div class="mb-3">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="d-flex justify-content-center">
            <x-primary-button>
                <button type="submit" style="background-color: orange;" class="btn btn-md text-white">
                    {{ __('Email Password Reset Link') }}
                </button>
                </x-primary-button>    
            </div>
        </form>
    </div>
</div>
</body>
</html>




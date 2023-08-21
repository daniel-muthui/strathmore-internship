<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Strathmore Internship </title>

        <!-- Fonts -->
        <!-- CSS link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            body{
                background-color: #3a5dae;
            }
        </style>    
    </head>
    
    <body class="login">
    <div class="d-flex justify-content-center align-items-center min-vh-100 bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
        <div class="p-6 text-center">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Dashboard</a>
                @else
                    <form class="bg-transparent p-4 rounded" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="login-header mb-3">
                            <div class="brand">
                                <div class="d-flex align-items-center navbar-brand">
                                    <img src="{{ asset('storage/images/studentaffairslogo.png') }}" height="95px" alt="Strath Logo"/>
                                </div>
                            </div>
                        </div>
                        <div class= "mb-3">
                            <div class="input-group mb-15px">
                                <input type="email" class="form-control h-45px fs-13px "
                                    name="email" id="email" value="" placeholder="Username / Student ID" />
                                <span class="input-group-text">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div> 
                        <div class= "mb-3">   
                            <div class="input-group mb-15px">
                                <input type="password" class="form-control h-45px fs-13px "
                                    name="password" id="password" value="" placeholder="Password" />

                                <span class="input-group-text password-toggle" onclick="togglePasswordVisibility()">
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>    
                        <div class="form-check mb-3">
                            <div class="row">
                                <div class="col-6">
                                </div>
                                <div class="col-6 text-end">
                                    <label class="form-check-label text-white" for="remember">
                                        <i class="fa fa-lock"></i> <a href="{{ route('password.request') }}"
                                            style="color: #fff;">Forgot Password</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" style="background-color: #b9e192;"
                                class="btn d-block h-45px w-100 btn-lg fs-14px">Log
                                in <i class="fa fa-sign-in-alt"></i> </button>
                        </div>
                        
                        <!-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif -->
                        <!-- <div class="mb-3 d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">Log in</button>
                            <a href="{{ route('password.request') }}" class="text-gray-600">Forgot Password?</a>
                        </div> -->
                    </form>
                @endauth
                    <hr class="text-white" />

                    <div class="text-white text-center mb-0">
                        &copy; Strathmore Internship Management System 2023 -
                    </div>
            @endif
        </div>
    </div>

<script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.querySelector(".password-toggle i");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            }
        }
    </script>
  
<!-- 
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif -->
                    
       
    </body>
</html>

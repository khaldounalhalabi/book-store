<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book Store</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('icomoon/icomoon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendor.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/loginStyle.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">


    <!-- script
    ================================================== -->
    <script src="{{asset('js/modernizr.js')}}"></script>

</head>
<body class="main-login">

<header id="header">
    <div style="text-align: center;">
        <div class="main-logo">
            <a href="{{route('index')}}"><img src="{{asset('images/main-logo.png')}}" alt="logo"></a>
        </div>
    </div>
</header>

<main >
    <div id="login-form-wrap" class="transparent">
        <h2>Login</h2>
        <form method="POST" id="login-form" action="{{route('customer.doLogin')}}">
            @csrf
            <div>
                <input class="form-control border-dark bg-transparent mb-3" type="email" id="email" name="email" placeholder="Email Address" required><i class="validation"><span></span><span></span></i>
            </div>
            <div>
                <input class="form-control border-dark bg-transparent" type="password" id="password" name="password" placeholder="Password" required><i class="validation"><span></span><span></span></i>
            </div>

            @include('includes.error')

            <p>
                <input type="submit" id="login" value="Login">
            </p>
        </form>
        <div id="create-account-wrap" class="transparent bg-transparent">
            <p>Not a member? <a href="{{route('register-page')}}">Create Account</a><p>
        </div><!--create-account-wrap-->
    </div><!--login-form-wrap-->
</main>

@include('includes.footer')

<!DOCTYPE html>
<html lang="ar" dir="rtl">
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

@yield('content')


@include('includes.footer')

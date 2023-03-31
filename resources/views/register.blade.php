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
    <div id="login-form-wrap">
        <h2>Login</h2>
        <form id="login-form">

            <div>
                <input type="text" id="first_name" name="first_name" placeholder="First Name" class="left-col">
                <span class="inline-space"></span>
                <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="right-col">
            </div>

            <p><input type="email" id="email" name="email" placeholder="Email Address" required><i class="validation"><span></span><span></span></i></p>

            <p><input type="password" id="password" name="password" placeholder="Password" required><i class="validation"><span></span><span></span></i></p>

            <div>
                <input type="tel" id="phone" name="phone" placeholder="Phone Number" class="right-col">
                <span style="margin: 0 10%;"></span>
                <select id="country-code" class="left-col">
                    <option value="+1">+1(USA)</option>
                    <option value="+44">+44(UK)</option>
                    <option value="+33">+33(France)</option>
                    <!-- add more options for other countries as needed -->
                </select>
            </div>

            <div>
                <select name="country" id="country" class="left-col">
                    <option value="syria">Syria</option>
                    <option value="lebanon">Lebanon</option>
                    <option value="egypt">Egypt</option>
                </select>
                <span style="margin: 0 1%;"></span>
                <input type="text" name="city" id="city" placeholder="city" class="right-col">
            </div>

            <div>
                <input type="text" id="post_code" name="post_code" placeholder="Postcode" class="left-col">
                <span class="inline-space"></span>
                <input type="text" id="street" name="street" placeholder="Street" class="right-col">
            </div>

            <div>
                <input type="text" id="house_number" name="house_number" placeholder="House Number" class="left-col">
                <span class="inline-space"></span>
                <input type="text" id="door_number" name="door_number" placeholder="Door Number" class="right-col">
            </div>

            <p><input type="submit" id="register" value="Register"></p>

        </form>



        <div id="create-account-wrap">
            <p>Not a member? <a href="#">Create Account</a><p>
        </div><!--create-account-wrap-->
    </div><!--login-form-wrap-->
</main>

<script>
    // get the phone input element and the country code select element
    const phoneInput = document.getElementById("phone");
    const countryCodeSelect = document.getElementById("country-code");

    // add an event listener to the select element to update the phone input value
    countryCodeSelect.addEventListener("change", function() {
        // get the selected country code
        const countryCode = countryCodeSelect.value;

        // update the phone input value with the selected country code
        phoneInput.value = countryCode;
    });
</script>

@include('includes.footer')

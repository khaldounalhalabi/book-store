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

<main>
    <div id="login-form-wrap" class="transparent">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
             class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem; margin-top: -25px;">
        <h3 style="margin-left: -29% ; margin-top: 20px">Registration Info</h3>
        <form id="login-form">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="form-outline datepicker">
                        <input type="text" class="form-control border-dark bg-transparent" id="first_name"
                               name="first_name" placeholder="First Name" required/>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-outline datepicker">
                        <input type="text" class="form-control border-dark bg-transparent" id="last_name"
                               name="last_name" placeholder="Last Name" required/>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="form-outline datepicker">
                        <select type="text" class="form-control border-dark bg-transparent" id="country-code"
                                name="country-code" required>
                            <option value="+1">+1(USA)</option>
                            <option value="+44">+44(UK)</option>
                            <option value="+33">+33(France)</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-8 mb-4">
                    <div class="form-outline datepicker">
                        <input type="tel" id="phone" class="form-control border-dark bg-transparent" name="phone"
                               placeholder="Phone Number" required>
                    </div>
                </div>


            </div>
            <p>
                <input class="form-control border-dark" type="email" id="email" name="email" placeholder="Email Address" required><i
                    class="validation"><span></span><span></span></i>
            </p>
            <p>
                <input class="form-control border-dark" type="password" id="password" name="password" placeholder="Password" required><i
                    class="validation"><span></span><span></span></i>
            </p>

            <p>
                <input class="form-control border-dark" type="password" id="password_confirmation" name="password_confirmation"
                       placeholder="Confirm Password" required><i
                    class="validation"><span></span><span></span></i>
            </p>

            <div class="row">

                <div class="col-md-6 mb-4">
                    <div class="form-outline datepicker">
                        <select type="text" class="form-control border-dark bg-transparent" id="country"
                                name="country" required>
                            <option value="Country">Country</option>
                            <option value="Country">Country</option>
                            <option value="Country">Country</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6 mb-4">

                    <div class="form-outline datepicker">
                        <input type="text" class="form-control border-dark bg-transparent" id="city" name="city"
                               placeholder="City" required/>
                    </div>

                </div>

                <div class="col-md-6 mb-4">

                    <div class="form-outline datepicker">
                        <input type="text" class="form-control border-dark bg-transparent" id="street" name="street"
                               placeholder="Street" required/>
                    </div>

                </div>

                <div class="col-md-6 mb-4">

                    <div class="form-outline datepicker">
                        <input type="text" class="form-control border-dark bg-transparent" id="house_number" name="house_number"
                               placeholder="House Number" required/>
                    </div>

                </div>

                <div class="col-md-6 mb-4">

                    <div class="form-outline datepicker">
                        <input type="text" class="form-control border-dark bg-transparent" id="door_number" name="door_number"
                               placeholder="Door Number" required/>
                    </div>

                </div>

            </div>


            <p>
                <input type="submit" id="register" value="Register" name="register">
            </p>
        </form>
        <div id="create-account-wrap"  class="bg-transparent">
            <p>
        </div><!--create-account-wrap-->
    </div><!--login-form-wrap-->
</main>

<script>
    // get the phone input element and the country code select element
    const phoneInput = document.getElementById("phone");
    const countryCodeSelect = document.getElementById("country-code");

    // add an event listener to the select element to update the phone input value
    countryCodeSelect.addEventListener("change", function () {
        // get the selected country code
        const countryCode = countryCodeSelect.value;

        // update the phone input value with the selected country code
        phoneInput.value = countryCode;
    });
</script>

@include('includes.footer')

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
        <h3 style="margin-left: -29% ; margin-top: 20px">User Info</h3>
        <form id="login-form" action="{{route('customer.editUserDetails')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="form-outline datepicker">
                        <input type="text" class="form-control border-dark bg-transparent" id="first_name"
                               name="first_name" placeholder="First Name" value="{{$first_name}}" readonly/>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="form-outline datepicker">
                        <input type="text" class="form-control border-dark bg-transparent" id="last_name"
                               value="{{$last_name}}"
                               name="last_name" placeholder="Last Name" readonly/>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="form-outline datepicker">
                        <select type="text" class="form-control border-dark bg-transparent" id="country_code"
                                name="country_code" readonly>
                            <option value="+1">{{$country_code}}</option>
                            <option value="+44" >+44(UK)</option>
                            <option value="+33" >+33(France)</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-8 mb-4">
                    <div class="form-outline datepicker">
                        <input type="tel" id="phone" class="form-control border-dark bg-transparent" name="phone_number"
                               placeholder="Phone Number" value="{{$phone_number}}" readonly>
                    </div>
                </div>


            </div>
            <p>
                <input class="form-control border-dark" type="email" id="email" name="email" placeholder="Email Address"
                       value="{{$email}}" style="color: black" readonly><i
                    class="validation"><span></span><span></span></i>
            </p>
            <div class="row">

                <div class="col-md-6 mb-4">
                    <div class="form-outline datepicker">
                        <select type="text" class="form-control border-dark bg-transparent" id="country"
                                name="country" readonly>
                            <option value="{{$address['country']}}">{{$address['country']}}</option>
                            <option value="Country">Country</option>
                            <option value="Country">Country</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6 mb-4">

                    <div class="form-outline datepicker">
                        <input type="text" class="form-control border-dark bg-transparent" id="city" name="city"
                               placeholder="City" value="{{$address['city']}}" readonly/>
                    </div>

                </div>

                <div class="col-md-6 mb-4">

                    <div class="form-outline datepicker">
                        <input type="text" class="form-control border-dark bg-transparent" id="street" name="street"
                               placeholder="Street" value="{{$address['street']}}" readonly/>
                    </div>

                </div>

                <div class="col-md-6 mb-4">

                    <div class="form-outline datepicker">
                        <input type="text" class="form-control border-dark bg-transparent" id="house_number"
                               name="house_number"
                               placeholder="House Number" value="{{$address['house_number']}}" readonly/>
                    </div>

                </div>

                <div class="col-md-6 mb-4">

                    <div class="form-outline datepicker">
                        <input type="text" class="form-control border-dark bg-transparent" id="door_number"
                               name="door_number" value="{{$address['door_number']}}"
                               placeholder="Door Number" readonly/>
                    </div>

                </div>

                <div class="col-md-6 mb-4">

                    <div class="form-outline datepicker">
                        <input type="text" class="form-control border-dark bg-transparent" id="post_code"
                               name="post_code"
                               placeholder="Post Code" value="{{$address['post_code']}}" readonly/>
                    </div>

                </div>

                @include('includes.error')

            </div>


            <p>
                <input type="submit" id="submit" value="Submit" name="submit" disabled>
            </p>

            <p>
                <input type="button" class="btn" value="Revise" id="revise-button">
            </p>

        </form>

        <div id="create-account-wrap" class="bg-transparent">
            <p>
        </div>

    </div>
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

<script src="{{asset('UserDetails/js/mine.js')}}"></script>

@include('includes.footer')

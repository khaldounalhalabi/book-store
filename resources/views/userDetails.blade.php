@extends('custom-layout')
@section('content')

    <main>
        <div id="login-form-wrap" class="transparent">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
                 class="w-100"
                 style="border-top-left-radius: .3rem; border-top-right-radius: .3rem; margin-top: -25px;">
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
                                <option value="+44">+44(UK)</option>
                                <option value="+33">+33(France)</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-8 mb-4">
                        <div class="form-outline datepicker">
                            <input type="tel" id="phone" class="form-control border-dark bg-transparent"
                                   name="phone_number"
                                   placeholder="Phone Number" value="{{$phone_number}}" readonly>
                        </div>
                    </div>


                </div>
                <p>
                    <input class="form-control border-dark" type="email" id="email" name="email"
                           placeholder="Email Address"
                           value="{{$email}}" style="color: black" readonly><i
                        class="validation"><span></span><span></span></i>
                </p>
                <div class="row">

                    @if(isset($address))
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
                                <input type="text" class="form-control border-dark bg-transparent" id="street"
                                       name="street"
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
                    @endif

                    @include('includes.error')

                </div>


                <p>
                    <input type="submit" id="submit" value="Submit" name="submit" disabled>
                </p>

                <p>
                    <input type="button" class="btn" value="Revise" id="revise-button">
                </p>

                <p>
                    <a href="{{route('logout')}}"><input type="button" class="btn" value="Logout"
                                                         id="logout-button"></a>
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
            // update the phone input value with the selected country code
            phoneInput.value = countryCodeSelect.value;
        });
    </script>

    <script src="{{asset('UserDetails/js/mine.js')}}"></script>

@endsection

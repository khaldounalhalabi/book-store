@extends('customer.custom-layout')
@section('content')

    <main dir="rtl" lang="ar" class="segoui">
        <div id="login-form-wrap" class="transparent">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
                 class="w-100"
                 style="border-top-left-radius: .3rem; border-top-right-radius: .3rem; margin-top: -25px;">
            <h3 style="text-align: center">بيانات التسجيل</h3>
            <form id="login-form" action="{{route('customer.doRegister')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline datepicker">
                            <input type="text" class="form-control border-dark bg-transparent" id="first_name"
                                   name="first_name" placeholder="الاسم الأول" required/>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="form-outline datepicker">
                            <input type="text" class="form-control border-dark bg-transparent" id="last_name"
                                   name="last_name" placeholder="الاسم الأخير" required/>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="form-outline datepicker">
                            <select type="text" class="form-control border-dark bg-transparent" id="country-code"
                                    name="country_code" required placeholder="رمز الدولة">
                                <option value="+1">+1(USA)</option>
                                <option value="+44">+44(UK)</option>
                                <option value="+33">+33(France)</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-8 mb-4">
                        <div class="form-outline datepicker">
                            <input type="tel" id="phone" class="form-control border-dark bg-transparent"
                                   name="phone_number"
                                   placeholder="رقم الهاتف" required>
                        </div>
                    </div>


                </div>
                <p>
                    <input class="form-control border-dark" type="email" id="email" name="email"
                           placeholder="البريد الاكتروني" required><i
                            class="validation"><span></span><span></span></i>
                </p>
                <p>
                    <input class="form-control border-dark" type="password" id="password" name="password"
                           placeholder="كلمة السر" required><i
                            class="validation"><span></span><span></span></i>
                    <label class="password-label">letters | numbers | mix case letters | min:8</label>

                </p>

                <p>
                    <input class="form-control border-dark" type="password" id="password_confirmation"
                           name="password_confirmation"
                           placeholder="تأكيد كلمة السر" required><i
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
                                   placeholder="المدينة" required/>
                        </div>

                    </div>

                    <div class="col-md-6 mb-4">

                        <div class="form-outline datepicker">
                            <input type="text" class="form-control border-dark bg-transparent" id="street" name="street"
                                   placeholder="الشارع" required/>
                        </div>

                    </div>

                    <div class="col-md-6 mb-4">

                        <div class="form-outline datepicker">
                            <input type="text" class="form-control border-dark bg-transparent" id="house_number"
                                   name="house_number"
                                   placeholder="رقم المنزل" required/>
                        </div>

                    </div>

                    <div class="col-md-6 mb-4">

                        <div class="form-outline datepicker">
                            <input type="text" class="form-control border-dark bg-transparent" id="door_number"
                                   name="door_number"
                                   placeholder="رقم الباب" required/>
                        </div>

                    </div>

                    <div class="col-md-6 mb-4">

                        <div class="form-outline datepicker">
                            <input type="text" class="form-control border-dark bg-transparent" id="door_number"
                                   name="post_code"
                                   placeholder="الرمز البريدي" required/>
                        </div>

                    </div>

                    @include('customer.includes.error')

                </div>


                <p>
                    <input type="submit" id="register" value="التسجيل" class="segoui btn" name="register">
                </p>
            </form>
            <div id="create-account-wrap" class="bg-transparent">
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

@endsection

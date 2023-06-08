@extends('customer.custom-layout')
@section('content')
    <main dir="rtl" lang="ar">
        <div class="section-profile">
            <div class="d-flex align-items-center justify-content-center">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div id="login-form-wrap" class="card bg-transparent bg-opacity-100 text-center">
                                <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
                                    class="card-img-top img-fluid"
                                    alt="form">
                                <div class="card-title">
                                    <h3 style="text-align: center">بيانات التسجيل</h3>
                                </div>

                                <form id="login-form" action="{{route('customer.doRegister')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 ">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="first_name"
                                                   name="first_name" placeholder="الاسم الأول" required/>
                                        </div>

                                        <div class="col-md-6 col-sm-12 ">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="last_name"
                                                   name="last_name" placeholder="الاسم الأخير" required/>
                                        </div>

                                        <div class="col-md-4  col-sm-3">
                                            <select type="text" class="form-control border-dark bg-transparent"
                                                    id="country-code"
                                                    name="country_code" required placeholder="رمز الدولة">
                                                <option value="+1">+1(USA)</option>
                                                <option value="+44">+44(UK)</option>
                                                <option value="+33">+33(France)</option>
                                            </select>
                                        </div>

                                        <div class="col-md-8  col-sm-9">
                                            <div class="form-outline">
                                                <input type="tel" id="phone"
                                                       class="form-control border-dark bg-transparent"
                                                       name="phone_number"
                                                       placeholder="رقم الهاتف" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12 ">
                                            <input class="form-control border-dark bg-transparent" type="email"
                                                   id="email" name="email"
                                                   placeholder="البريد الاكتروني" required>
                                        </div>

                                        <div class="col-md-12 col-sm-12 ">
                                            <input class="form-control border-dark bg-transparent" type="password"
                                                   id="password"
                                                   name="password"
                                                   placeholder="كلمة السر" required>
                                            <label for="password" class="password-label"
                                                   style="font-weight: bold; color: black;">
                                                letters | numbers | mix case letters | min:8
                                            </label>
                                        </div>

                                        <div class="col-md-12 col-sm-12 ">
                                            <input class="form-control border-dark bg-transparent" type="password"
                                                   id="password_confirmation"
                                                   name="password_confirmation"
                                                   placeholder="تأكيد كلمة السر" required>
                                        </div>

                                        <div class="col-md-6  col-sm-12">
                                            <select type="text" class="form-control border-dark bg-transparent"
                                                    id="country"
                                                    name="country" required>
                                                <option value="Country">Country</option>
                                                <option value="Country">Country</option>
                                                <option value="Country">Country</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6  col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="city" name="city"
                                                   placeholder="المدينة" required/>
                                        </div>

                                        <div class="col-md-6  col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="street" name="street"
                                                   placeholder="الشارع" required/>
                                        </div>

                                        <div class="col-md-6  col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="house_number"
                                                   name="house_number"
                                                   placeholder="رقم المنزل" required/>
                                        </div>

                                        <div class="col-md-6  col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="door_number"
                                                   name="door_number"
                                                   placeholder="رقم الباب" required/>
                                        </div>

                                        <div class="col-md-6  col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="door_number"
                                                   name="post_code"
                                                   placeholder="الرمز البريدي" required/>
                                        </div>

                                        @include('customer.includes.error')
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button
                                            class="btn btn-sm p-4 m-5 w-auto text-center d-flex justify-content-center align-items-center">
                                            تسجيل
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div><!--login-form-wrap-->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

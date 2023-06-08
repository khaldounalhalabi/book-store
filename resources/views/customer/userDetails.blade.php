@extends('customer.custom-layout')
@section('content')
    <main class="main" id="main">
        <section class="section-profile">
            <div class="d-flex align-items-center justify-content-center">
                <div class="container mt-5">
                    <div class="card bg-transparent">
                        <div class="card-header text-center"><h2 class="card-title">بيانات المستخدم</h2></div>
                        <div class="card-body">
                            <div class="row">
                                <form id="login-form" action="{{route('customer.editUserDetails')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 ">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="first_name"
                                                   name="first_name" placeholder="الاسم الأول"
                                                   value="{{($user->first_name ?? old('first_name')) ?? null}}"
                                                   required/>
                                        </div>

                                        <div class="col-md-6 col-sm-12 ">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="last_name"
                                                   name="last_name" placeholder="الاسم الأخير"
                                                   value="{{($user->last_name ?? old('last_name')) ?? null}}" required/>
                                        </div>
                                        {{--TODO:: Don't forget to configure this to be selected by the user value--}}
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
                                                       placeholder="رقم الهاتف"
                                                       value="{{($user->phone_number ?? old('phone_number')) ?? null}}"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12 ">
                                            <input class="form-control border-dark bg-transparent" type="email"
                                                   id="email" name="email"
                                                   placeholder="البريد الاكتروني"
                                                   value="{{($user->email ?? old('email')) ?? null}}" required>
                                        </div>

                                        <div class="col-md-12 col-sm-12 ">
                                            <input class="form-control border-dark bg-transparent" type="password"
                                                   id="password"
                                                   name="password"
                                                   placeholder="كلمة السر"
                                                   value="{{($user->password ?? old('password')) ?? null}}" required>
                                            <label for="password" class="password-label"
                                                   style="font-weight: bold; color: black;">
                                                letters | numbers | mix case letters | min:8
                                            </label>
                                        </div>

                                        <div class="col-md-12 col-sm-12 ">
                                            <input class="form-control border-dark bg-transparent" type="password"
                                                   id="password_confirmation"
                                                   name="password_confirmation"
                                                   placeholder="تأكيد كلمة السر"
                                                   value="{{($user->password ?? old('password')) ?? null}}" required>
                                        </div>
                                        {{--TODO:: Don't forget to configure this to be selected by the user value--}}
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
                                                   placeholder="المدينة"
                                                   value="{{($user->address->city ?? old('city')) ?? null}}" required/>
                                        </div>

                                        <div class="col-md-6  col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="street" name="street"
                                                   placeholder="الشارع"
                                                   value="{{($user->address->street ?? old('street')) ?? null}}"
                                                   required/>
                                        </div>

                                        <div class="col-md-6  col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="house_number"
                                                   name="house_number"
                                                   placeholder="رقم المنزل"
                                                   {{($user->address->house_number ?? old('house_number')) ?? null}} required/>
                                        </div>

                                        <div class="col-md-6  col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="door_number"
                                                   name="door_number"
                                                   placeholder="رقم الباب"
                                                   value="{{($user->address->door_number ?? old('door_number')) ?? null}}"
                                                   required/>
                                        </div>

                                        <div class="col-md-6  col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="door_number"
                                                   name="post_code"
                                                   placeholder="الرمز البريدي"
                                                   value="{{($user->address->post_code ?? old('post_code')) ?? null}}"
                                                   required/>
                                        </div>

                                        @include('customer.includes.error')
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <button
                                            class="btn btn-sm p-4 m-5 w-auto text-center d-flex justify-content-center align-items-center">
                                            تعديل
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

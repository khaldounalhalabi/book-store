@extends('customer.custom-layout')
@section('content')
    @php
        if (auth()->user()){
            $user = auth()->user();
        }
    @endphp
    <script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_SANDBOX_CLIENT_ID')}}"></script>
    <main dir="rtl" lang="ar">
        <div class="section-profile">
            <div class="d-flex align-items-center justify-content-center">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div id="login-form-wrap" class="card bg-transparent bg-opacity-100 text-center">
                                <div class="card-title">
                                    <h3 style="text-align: center">بيانات التوصيل</h3>
                                </div>

                                <form id="login-form"
                                      action="@if(auth()->user()){{route('customer.make-order')}}@else{{route('customer.make-order' , $book->id)}}@endif"
                                      method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 mb-4">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="first_name"
                                                   name="first_name" placeholder="الاسم الأول"
                                                   value="{{($user->first_name ?? old('first_name')) ?? null}}"
                                                   required/>
                                        </div>

                                        <div class="col-md-6 col-sm-12 mb-4">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="last_name"
                                                   name="last_name" placeholder="الاسم الأخير"
                                                   value="{{($user->last_name ?? old('last_name')) ?? null}}"
                                                   required/>
                                        </div>
                                        {{--TODO::dont forgot to configure this--}}
                                        <div class="col-md-4 mb-4 col-sm-3">
                                            <select type="text" class="form-control border-dark bg-transparent"
                                                    id="country-code"
                                                    name="country_code" required placeholder="رمز الدولة">
                                                <option value="+1">+1(USA)</option>
                                                <option value="+44">+44(UK)</option>
                                                <option value="+33">+33(France)</option>
                                            </select>
                                        </div>

                                        <div class="col-md-8 mb-4 col-sm-9">
                                            <div class="form-outline">
                                                <input type="tel" id="phone"
                                                       class="form-control border-dark bg-transparent"
                                                       name="phone_number"
                                                       placeholder="رقم الهاتف"
                                                       value="{{($user->phone_number ?? old('phone_number')) ?? null}}"
                                                       required>
                                            </div>
                                        </div>
                                        {{--TODO::dont forgot to configure this--}}
                                        <div class="col-md-6 mb-4 col-sm-12">
                                            <select type="text" class="form-control border-dark bg-transparent"
                                                    id="country"
                                                    name="country" required>
                                                <option value="Country">Country</option>
                                                <option value="Country">Country</option>
                                                <option value="Country">Country</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-4 col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="city" name="city"
                                                   placeholder="المدينة"
                                                   value="{{($user->address->city ?? old('city')) ?? null}}" required/>
                                        </div>

                                        <div class="col-md-6 mb-4 col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="street" name="street"
                                                   placeholder="الشارع"
                                                   value="{{($user->address->street ?? old('street')) ?? null}}"
                                                   required/>
                                        </div>

                                        <div class="col-md-6 mb-4 col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="house_number"
                                                   name="house_number"
                                                   placeholder="رقم المنزل"
                                                   value="{{($user->address->house_number ?? old('house_number')) ?? null}}"
                                                   required/>
                                        </div>

                                        <div class="col-md-6 mb-4 col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="door_number"
                                                   name="door_number"
                                                   placeholder="رقم الباب"
                                                   value="{{($user->address->door_number ?? old('door_number')) ?? null}}"
                                                   required/>
                                        </div>

                                        <div class="col-md-6 mb-4 col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="door_number"
                                                   name="post_code"
                                                   placeholder="الرمز البريدي"
                                                   value="{{($user->address->post_code ?? old('post_code')) ?? null}}"
                                                   required/>
                                        </div>

                                        @include('customer.includes.error')
                                    </div>
                                    <button class="btn text-center m-2 w-auto">
                                        pay with Paypal
                                    </button>
                                </form>
                            </div>
                        </div><!--login-form-wrap-->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

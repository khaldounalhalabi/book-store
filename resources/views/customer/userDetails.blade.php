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
                                                   value="{{old('first_name') ?? ($user->first_name ?? null)}}"
                                                   required/>
                                        </div>

                                        <div class="col-md-6 col-sm-12 ">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="last_name"
                                                   name="last_name" placeholder="الاسم الأخير"
                                                   value="{{old('last_name') ?? ($user->last_name ?? null)}}" required/>
                                        </div>

                                        <div class="col-md-4  col-sm-3">
                                            <select id="country_code" name="country_code"
                                                    class="form-control border-dark bg-transparent" required
                                                    placeholder="رمز الدولة">
                                                @if(old('country_code') != null)
                                                    <option
                                                        value="{{old('country_code')}}">{{old('country_code')}}</option>
                                                @elseif(isset($user->country_code))
                                                    <option
                                                        value="{{$user->country_code}}">{{$user->country_code}}</option>
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-md-8  col-sm-9">
                                            <div class="form-outline">
                                                <input type="tel" id="phone"
                                                       class="form-control border-dark bg-transparent"
                                                       name="phone_number"
                                                       placeholder="رقم الهاتف"
                                                       value="{{old('phone_number') ?? ($user->phone_number ?? null)}}"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12 ">
                                            <input class="form-control border-dark bg-transparent" type="email"
                                                   id="email" name="email"
                                                   placeholder="البريد الاكتروني"
                                                   value="{{old('email') ?? ($user->email ?? null)}}" required>
                                        </div>

                                        <div class="col-md-6 mb-4 col-sm-12">
                                            <select type="text" class="form-control border-dark bg-transparent"
                                                    id="country"
                                                    name="country" required>
                                                @if(old('country') != null)
                                                    <option value="{{old('country')}}">
                                                        {{old('country')}}
                                                    </option>
                                                @elseif(isset($user->address->country))
                                                    <option value="{{$user->address->country}}">
                                                        {{$user->address->country}}
                                                    </option>
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-md-6  col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="city" name="city"
                                                   placeholder="المدينة"
                                                   value="{{old('address') ?? ($user->address->city ?? null)}}"
                                                   required/>
                                        </div>

                                        <div class="col-md-6  col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="street" name="street"
                                                   placeholder="الشارع"
                                                   value="{{old('street') ?? ($user->address->street  ?? null)}}"
                                                   required/>
                                        </div>

                                        <div class="col-md-6  col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="house_number"
                                                   name="house_number"
                                                   placeholder="رقم المنزل"
                                                   value="{{old('house_number') ?? ($user->address->house_number ?? null)}}"
                                                   required/>
                                        </div>

                                        <div class="col-md-6  col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="door_number"
                                                   name="door_number"
                                                   placeholder="رقم الباب"
                                                   value="{{old('door_number') ?? ($user->address->door_number ?? null)}}"
                                                   required/>
                                        </div>

                                        <div class="col-md-6  col-sm-12">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="post_code"
                                                   name="post_code"
                                                   placeholder="الرمز البريدي"
                                                   value="{{old('post_code') ?? ($user->address->post_code ?? null)}}"
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
    <script type="module">
        $(document).ready(function () {
            $('#country_code').select2({
                theme: 'bootstrap-5',
                placeholder: "رمز الدولة",
                containerCss: {
                    background: "transparent",
                    border: "1px solid black",
                },
                ajax: {
                    url: '{{route('get-countries-codes')}}',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            _token: "{{csrf_token()}}",
                            search: params.term,// search term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data,
                        };
                    },
                    cache: true
                },
                minimumInputLength: 0,
                closeOnSelect: false,
            });

            $('#country').select2({
                theme: 'bootstrap-5',
                placeholder: "الدولة",
                containerCss: {
                    background: "transparent",
                    border: "1px solid black",
                },
                ajax: {
                    url: '{{route('get-countries')}}',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            _token: "{{csrf_token()}}",
                            search: params.term,// search term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data,
                        };
                    },
                    cache: true
                },
                minimumInputLength: 0,
                closeOnSelect: false,
            });
        });
    </script>
@endsection

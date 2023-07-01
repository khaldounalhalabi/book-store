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
                                <form id="order-form" method="POST">
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
                                        <div class="col-md-12 col-sm-12 mb-4">
                                            <input type="text" class="form-control border-dark bg-transparent"
                                                   id="email"
                                                   name="email" placeholder="البريد الالكتروني"
                                                   value="{{($user->email ?? old('email')) ?? null}}"
                                                   required/>
                                        </div>
                                        <div class="col-md-4 mb-4 col-sm-3">
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

                                        <div class="col-md-12">
                                            <p>By Submit You're Accepting <span>
                                                    <a style="color: black"
                                                       href="{{route('customer.terms-conditions')}}" target="_blank">Terms & Conditions</a></span>
                                            </p>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row m-3 bg-black" style="border-radius: 15px;">
                                                <div class="col-md-6" style="color: white">التكلفة مع سعر الشحن :</div>
                                                <div class="col-md-6" id="cost-container" style="color: white"></div>
                                            </div>
                                        </div>

                                        @include('customer.includes.error')
                                    </div>
                                    <button class=" btn text-center m-2 w-auto h-auto
                                                "
                                            data-route="@if(auth()->user())
                                                    {{route('customer.make-order')}}
                                                @else
                                                    {{route('customer.make-order' , $book->id)}}
                                                @endif">
                                        pay with Paypal
                                    </button>
                                    <button class="btn text-center m-2 w-auto h-auto"
                                            data-route="@if(auth()->user()){{route('customer.make-order')}}@else{{route('customer.make-order' , $book->id)}}@endif">
                                        pay with Klarna
                                    </button>
                                </form>
                            </div>
                        </div><!--login-form-wrap-->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script type="module">
        $(document).ready(function () {
            $(function () {
                // Handle button click
                $('button').click(function (e) {
                    e.preventDefault();
                    const route = $(this).data('route');
                    const form = $('#order-form');
                    form.attr('action', route);
                    form.submit();
                });
            });

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

            const countrySelector = $("#country");
            countrySelector.select2({
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

            let selectedCountry = countrySelector.val();
            $.ajax({
                url: "{{route('get-shipping-cost-by-country-name')}}",
                type: 'POST',
                data: {
                    countryName: selectedCountry,
                    @if(!auth()->user())
                    book_id: "{{$book->id}}",
                    @endif
                    _token: "{{csrf_token()}}"
                },
                success: function (data) {
                    console.log('Received data:', data); // debug information
                    $('#cost-container').text(data + " €"); // use text() method to set the text content
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.error('Error:', textStatus, errorThrown); // error handling
                }
            });

            countrySelector.on('change', function (e) {
                let selectedCountry = $(this).val();
                $.ajax({
                    url: "{{route('get-shipping-cost-by-country-name')}}",
                    type: 'POST',
                    data: {
                        countryName: selectedCountry,
                        @if(!auth()->user())
                        book_id: "{{$book->id}}",
                        @endif
                        _token: "{{csrf_token()}}"
                    },
                    success: function (data) {
                        console.log('Received data:', data); // debug information
                        $('#cost-container').text(data + " €"); // use text() method to set the text content
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        console.error('Error:', textStatus, errorThrown); // error handling
                    }
                });
            });
        });
    </script>
@endsection

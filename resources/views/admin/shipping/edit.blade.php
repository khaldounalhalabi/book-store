@extends('admin.layout')
@section('content')
    <section class="section" dir="rtl" style="font-family: 'Segoe UI',sans-serif">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title text-primary" style="font-family: 'Segoe UI',sans-serif">تعديل
                            الدولة {{$shipping->country}}</h1>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="card p-1">
                                <div class="card-body">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li style="color: red">
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <form id="serviceForm" action="{{ route('admin.shipping.update' , $shipping->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="row m-auto">

                                <div class="col-md-6 m-auto">
                                    <label class="col-form-label" for="country">الدولة</label>
                                    <input id="country" name="country" type="text" class="form-control"
                                           value="{{old('country') ?? ($shipping->country ?? null)}}">
                                </div>

                                <div class="col-md-6  m-auto">
                                    <label class="col-form-label" for="country_code">رمز الدولة</label>
                                    <input id="country_code" name="country_code" type="text" class="form-control"
                                           value="{{old('country_code') ?? ($shipping->country_code ?? null)}}">
                                </div>

                                <div class="col-md-12  m-auto">
                                    <label class="col-form-label" for="shipping_cost">كلفة الشحن</label>
                                    <input id="shipping_cost" name="shipping_cost" type="number" step="any"
                                           class="form-control"
                                           value="{{old('shipping_cost') ?? ($shipping->shipping_cost ?? null)}}">
                                </div>

                                <button type="submit" class="btn btn-primary m-5 p-auto w-auto">تعديل</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

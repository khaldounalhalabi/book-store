@extends('admin.layout')
@section('content')
    <div class="page-title" dir="rtl">
        <h1 class=""></h1>
        <h2>{{$shipping->country}}</h2>
    </div>
    <section class="section profile" dir="rtl">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-content p-2">
                            <div class="pb-3">
                                <a href="{{route('admin.shipping.edit' , $shipping->id)}}" class="p-2">
                                    <button class="btn btn-primary">تعديل</button>
                                </a>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle"> الدولة :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$shipping->country}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle">رمز الدولة :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$shipping->country_code}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle">كلفة الشحن :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$shipping->shipping_cost}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

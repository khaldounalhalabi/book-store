@extends('customer.custom-layout')
@section('content')
    <style>
        .card-registration-2 {
            background-color: rgba(255, 255, 255, 0.1);
        }
    </style>
    <section class="h-100 h-custom" dir="rtl">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">سلة المشتريات</h1>
                                        </div>
                                        <hr class="my-4">

                                        @foreach($cart as $item)
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img
                                                        src="{{asset("storage/".$item->book->face_image)}}"
                                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-muted">{{$item->book->name}}</h6>
                                                    <h6 class="text-black mb-0">{{$item->book->author_name}}</h6>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0">€ {{$item->book->price}}</h6>
                                                </div>
                                                <div class="col-md-1"><a href="{{route('customer.cart.remove' , $item->id)}}" style="color: black; text-decoration: none"><i class="icon icon-cancel"></i></a></div>
                                            </div>

                                            <hr class="my-4">
                                        @endforeach
                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="{{route('customer.index.books')}}" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>العودة إلى المتجر</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey" style="margin-top: 3.5%;">
                                    <div class="p-5">

                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">عدد المشتريات </h5>
                                            <h5>{{$itemsCount}}</h5>
                                        </div>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">السعر الإجمالي</h5>
                                            <h5>€ {{$totalPrice}}</h5>
                                        </div>

                                        <input type="button" value="اشترِ" class="btn">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

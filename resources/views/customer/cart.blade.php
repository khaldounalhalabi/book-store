@extends('customer.custom-layout')
@section('content')
    <section class="section-profile" dir="rtl">
        <div class="card bg-transparent d-flex justify-content-center align-items-center">
            <div class="card-title">
                <h1 class="card-header">السلة</h1>
            </div>
            <div class="card-body border border-dark w-75">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            @foreach($cart as $item)
                                <div class="col-md-2 m-2">
                                    <img src="{{asset("storage/".$item->book->face_image)}}" alt="item image"
                                         class="img-fluid rounded-3">
                                </div>
                                <div class="col-md-5">
                                    <h3 class="text-muted">{{$item->book->name}}</h3>
                                    <h4 class="text-black mb-0">{{$item->book->author_name}}</h4>
                                </div>
                                <div class="col-md-2">
                                    <h3 class="mb-0">€ {{$item->book->price}}</h3>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{route('customer.cart.remove' , $item->id)}}">
                                        <button type="submit" class="btn btn-sm cart-button">
                                            <span class="d-flex justify-content-center align-items-center">X</span>
                                        </button>
                                    </a>
                                </div>
                                <hr>
                            @endforeach

                            <div class="pt-5">
                                <a href="{{route('index')}}">
                                    <button
                                        class="btn btn-sm p-4 m-5 w-auto text-center d-flex justify-content-center align-items-center">
                                        العودة إلى المتجر
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-transparent">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between">
                                            <h2 class="text-uppercase">عدد العناصر </h2>
                                            <h3>{{$itemsCount}}</h3>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between mb-5">
                                            <h3 class="text-uppercase">السعر الإجمالي</h3>
                                            <h4>€ {{$totalPrice}}</h4>
                                        </div>
                                        <hr>
                                        <a href="{{route('customer.make-order')}}">
                                            <button
                                                class="btn btn-sm p-4 m-5 w-auto text-center d-flex justify-content-center align-items-center">
                                                شراء
                                            </button>
                                        </a>
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

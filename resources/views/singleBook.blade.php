@extends('layout')
@section('content')
    <section class="bg-sand padding-large" dir="rtl" lang="ar">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <a href="#" class="product-image"><img src="{{asset('images')}}/main-banner{{random_int(1 , 2)}}.jpg"></a>
                </div>

                <div class="col-md-8 pl-5">
                    <div class="product-detail">
                        <h1>{{$book->name}}</h1>
                        <h2>{{$book->author_name}}</h2>
                        @if($book->is_original)
                            <span style="z-index: -1; background-color: #74642F;; color: white;" >نسخة أصلية</span><br>
                        @else
                            <span style="z-index: -1; background-color: black; color: white;">نسخة غير أصلية</span><br>
                        @endif
                        <span class="price colored">${{$book->price}}</span>

                        <p>
                            {{$book->long_description}}
                        </p>

                        <a href="{{route('customer.cart.add' , $book->id)}}">
                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">
                                إضافة إلى السلة
                            </button>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@extends('layout')
@section('content')
    <section class="bg-sand padding-large">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <a href="#" class="product-image"><img src="{{asset('images')}}/main-banner{{random_int(1 , 2)}}.jpg"></a>
                </div>

                <div class="col-md-6 pl-5">
                    <div class="product-detail">
                        <h1>{{$book->name}}</h1>
                        <h2>{{$book->author_name}}</h2>
                        @if($book->is_original)
                            <span style="z-index: -1; background-color: #74642F;; color: white;" >Orginal</span><br>
                        @else
                            <span style="z-index: -1; background-color: black; color: white;">Not Orginal</span><br>
                        @endif
                        <span class="price colored">${{$book->price}}</span>

                        <p>
                            {{$book->long_description}}
                        </p>

                        <button type="submit" name="add-to-cart" value="27545" class="button">Add to cart</button>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

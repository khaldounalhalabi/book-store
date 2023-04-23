@extends('layout')
@section('content')
    <style>
        ul.pagination {
            display: inline-block;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        ul.pagination li {
            display: inline;
            margin: 0 5px;
        }

        ul.pagination li a {
            font-weight: bold;
            color: #333333;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 30%;
            border: 1px solid #74642F;
        }

        ul.pagination li.active a {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        ul.pagination li.disabled a {
            color: #aaaaaa;
            pointer-events: none;
        }
    </style>
    <section class="padding-large">
        <div class="container">
            <div class="row">

                <div class="products-grid grid">

                    @foreach($books as $book)
                        <figure class="product-style">
                            <img src="{{asset('images')}}/tab-item{{$loop->index + 1}}.jpg" alt="Books"
                                 class="product-item">
                            <a href="{{route('customer.cart.add' , $book->id)}}">
                                <button type="button" class="add-to-cart" data-product-tile="add-to-cart">
                                    Add to
                                    Cart
                                </button>
                            </a>
                            <figcaption>
                                <a href="{{route('customer.show.book' , $book->id)}}"><h3>{{$book->name}}</h3></a>
                                <p>{{$book->author_name}}</p>
                                @if($book->is_original)
                                    <span
                                        style="z-index: -1; background-color: #74642F;; color: white;">Orginal</span>
                                @else
                                    <span
                                        style="z-index: -1; background-color: black; color: white;">Not Orginal</span>
                                @endif
                                <div class="item-price">$ {{$book->price}}</div>
                            </figcaption>
                        </figure>
                    @endforeach
                </div>
                <div>
                    {!! $books->render() !!}
                </div>
            </div>
        </div>

    </section>

@endsection

@extends('customer.layout')
@section('content')
    <section class="bg-sand padding-large" dir="rtl" lang="ar">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="#" class="product-image"><img
                            src="{{asset("storage/$book->face_image")}}" alt=""></a>
                </div>

                <div class="col-md-8 pl-5">
                    <div class="product-detail">
                        <h1>{{$book->name}}</h1>
                        <h2>{{$book->author_name}}</h2>
                        <span class="price colored">${{$book->price}}</span>

                        <p>
                            {!! $book->long_description !!}
                        </p>

                        @if(auth()->user() && $book->quantity > 0)
                            <a href="{{route('customer.cart.add' , $book->id)}}">
                                <button type="button" class="add-to-cart" data-product-tile="add-to-cart">
                                    إضافة إلى السلة
                                </button>
                            </a>
                        @elseif($book->quantity > 0)
                            <a href="{{route('customer.delivery-details' , $book->id)}}">
                                <button type="button" class="add-to-cart" data-product-tile="add-to-cart">
                                    اشتري الآن
                                </button>
                            </a>
                        @endif
                        @if(auth()->user())
                            <div id="like" class="like" data-likeurl="">
                                <i id="like-icon"
                                   class="@if($liking == 'liked') bi bi-hand-thumbs-up-fill @else bi bi-hand-thumbs-up @endif"></i>
                                <span class="icon">أعجبني</span>
                                <br>
                            </div>
                            <span id="likesCount">{{$book->likes_count}}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="module">
        $(document).ready(function () {
            const myDiv = document.getElementById('like');
            myDiv.addEventListener('click', function () {
            });
            document.getElementById('like').addEventListener('click', function () {
                const xhr = new XMLHttpRequest();
                const url = "{{route('customer.like' , $book->id)}}";

                xhr.open('POST', url, true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', "{{csrf_token()}}");

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const data = JSON.parse(xhr.responseText);
                        document.getElementById('likesCount').textContent = data.likes_count;
                        if (data.state === 'liked') {
                            document.getElementById('like-icon').classList.remove('bi-hand-thumbs-up');
                            document.getElementById('like-icon').classList.add('bi-hand-thumbs-up-fill');
                        }

                        if (data.state === 'unliked') {
                            document.getElementById('like-icon').classList.remove('bi-hand-thumbs-up-fill');
                            document.getElementById('like-icon').classList.add('bi-hand-thumbs-up');
                        }
                    }
                };

                xhr.send();
            });
        });
    </script>
@endsection

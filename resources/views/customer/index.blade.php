@extends('customer.layout')
@section('content')
    <!-- Hero -->
    <section id="billboard" lang="ar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="slider pattern-overlay">
                        <div class="slider-item" dir="rtl">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="{{asset("storage/$firstHero->face_image")}}" alt="banner"
                                         class="banner-image">
                                </div>
                                <div class="col-md-7">
                                    <div class="banner-content">
                                        <h2 class="banner-title">{{$firstHero->name}}</h2>
                                        <p>{!! $firstHero->small_description !!}</p>
                                        <br>
                                        <div class="btn-wrap">
                                            <a href="{{route('customer.show.book' , $firstHero->id)}}"
                                               class="btn btn-outline-accent btn-accent-arrow">المزيد</a>
                                        </div>
                                    </div><!--banner-content-->
                                </div>
                            </div>
                        </div><!--slider-item-->
                        <div class="slider-item" dir="rtl">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="{{asset("storage/$secondHero->face_image")}}" alt="banner"
                                         class="banner-image">
                                </div>
                                <div class="col-md-7">
                                    <div class="banner-content">
                                        <h2 class="banner-title">{{$secondHero->name}}</h2>
                                        <p>{{$secondHero->small_description}}</p>
                                        <br>
                                        <div class="btn-wrap">
                                            <a href="{{route('customer.show.book' , $secondHero->id)}}"
                                               class="btn btn-outline-accent btn-accent-arrow">المزيد</a>
                                        </div>
                                    </div><!--banner-content-->
                                </div>
                            </div>
                        </div><!--slider-item-->
                    </div><!--slider-->
                </div>
            </div>
        </div>
    </section>
    <!-- Hero -->

    <!-- Featured Books -->
    <section id="featured-books" lang="ar" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header align-center">
                        <div class="title">
                        </div>
                        <h2 class="section-title">كتب مميزة</h2>
                    </div>
                    <div class="product-list" data-aos="fade-up">
                        <div class="row">
                            @foreach($featuredBooks as $featuredBook)
                                <div class="col-md-3">
                                    <figure class="product-style">
                                        <img src="{{asset("storage/$featuredBook->face_image")}}" alt="Books"
                                             class="product-item">
                                        @if($featuredBook->quantity <= 0)
                                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart"
                                                    disabled>
                                                انتهت الكمية
                                            </button>
                                        @elseif(auth()->user() && auth()->user()->hasRole('customer'))
                                            <a href="{{route('customer.cart.add' , $featuredBook->id)}}">
                                                <button type="button" class="add-to-cart"
                                                        data-product-tile="add-to-cart">
                                                    إضافة إلى السلة
                                                </button>
                                            </a>
                                        @elseif(!auth()->user() || (auth()->user() && !auth()->user()->hasRole('customer')))
                                            <a href="{{route('customer.delivery-details' , $featuredBook->id)}}">
                                                <button type="button" class="add-to-cart"
                                                        data-product-tile="add-to-cart">
                                                    اطلبه الآن
                                                </button>
                                            </a>
                                        @endif
                                        <figcaption>
                                            <a href="{{route('customer.show.book' , $featuredBook->id)}}">
                                                <h3>{{$featuredBook->name}}</h3></a>
                                            <p>{{$featuredBook->author_name}}</p>
                                            <div class="item-price">$ {{$featuredBook->price}}</div>
                                        </figcaption>
                                    </figure>
                                </div>
                            @endforeach
                        </div><!--ft-books-slider-->
                    </div><!--grid-->
                </div><!--inner-content-->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-wrap align-right">
                        <a href="{{route('customer.index.books')}}" class="btn-accent-arrow">
                            <i class="icon icon-ns-arrow-right"></i>عرض جميع المنتجات</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Books -->

    <!-- Best Selling Book -->
    <section id="best-selling" lang="ar" dir="rtl" class="leaf-pattern-overlay">
        <div class="corner-pattern-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="col-md-6">
                            <figure class="products-thumb">
                                <a href="{{route('customer.show.book' , $topSelling->id)}}"><img
                                        src="{{asset("storage/$topSelling->face_image")}}" alt="book"
                                        class="single-image"></a>
                            </figure>
                        </div>
                        <div class="col-md-6">
                            <div class="product-entry">
                                <h2 class="section-title divider">الأكثر مبيعاً</h2>
                                <div class="products-content">
                                    <div class="author-name">{{$topSelling->author_name}}</div>
                                    <a href="{{route('customer.show.book' , $topSelling->id)}}"><h3
                                            class="item-title">{{$topSelling->name}}</h3></a>
                                    <p>{{$topSelling->small_description}}</p>
                                    <div class="item-price">$ {{$topSelling->price}}</div>
                                    <div class="btn-wrap">
                                        @if(auth()->user() && auth()->user()->hasRole('customer') && $topSelling->quantity >= 0)
                                            <a href="{{route('customer.cart.add' , $topSelling->id)}}"
                                               class="btn-accent-arrow"><i
                                                    class="icon icon-ns-arrow-right"></i>اطلبه الآن </a>
                                        @elseif((!auth()->user() || (auth()->user() && !auth()->user()->hasRole('customer'))) && $topSelling->quantity >= 0)
                                            <a href="{{route('customer.delivery-details' , $topSelling->id)}}" class="
                                               btn-accent-arrow"><i
                                                    class="icon icon-ns-arrow-right"></i>اطلبه الآن </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Best Selling Book -->


    <!-- popular books -->
    <section id="popular-books" lang="ar" dir="rtl" class="bookshelf">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header align-center">
                        <div class="title">
                        </div>
                        <h2 class="section-title">كتب ذات شعبية</h2>
                    </div>
                    <div class="tab-content">
                        <div id="all-genre" data-tab-content class="active">
                            <div class="row">
                                @foreach($popularBooks_1 as $poBook)
                                    <div class="col-md-3">
                                        <figure class="product-style">
                                            <img src="{{asset("storage/$poBook->face_image")}}" alt="Books"
                                                 class="product-item">
                                            @if($poBook->quantity <= 0)
                                                <button type="button" class="add-to-cart"
                                                        data-product-tile="add-to-cart" disabled>
                                                    انتهت الكمية
                                                </button>
                                            @elseif(auth()->user() && auth()->user()->hasRole('customer'))
                                                <a href="{{route('customer.cart.add' , $poBook->id)}}">
                                                    <button type="button" class="add-to-cart"
                                                            data-product-tile="add-to-cart">
                                                        إضافة إلى السلة
                                                    </button>
                                                </a>
                                            @elseif(!auth()->user() || (auth()->user() && !auth()->user()->hasRole('customer')))
                                                <a href="{{route('customer.delivery-details' , $poBook->id)}}">
                                                    <button type="button" class="add-to-cart"
                                                            data-product-tile="add-to-cart">
                                                        اطلبه الآن
                                                    </button>
                                                </a>
                                            @endif
                                            <figcaption>
                                                <a href="{{route('customer.show.book' , $poBook->id)}}">
                                                    <h3>{{$poBook->name}}</h3>
                                                </a>
                                                <p>{{$poBook->author_name}}</p>
                                                <div class="item-price">$ {{$poBook->price}}</div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                @foreach($popularBooks_2 as $poBook)
                                    <div class="col-md-3">
                                        <figure class="product-style">
                                            <img src="{{asset("storage/$poBook->face_image")}}" alt="Books"
                                                 class="product-item">
                                            @if($poBook->quantity <= 0)
                                                <button type="button" class="add-to-cart"
                                                        data-product-tile="add-to-cart" disabled>
                                                    انتهت الكمية
                                                </button>
                                            @elseif(auth()->user() && auth()->user()->hasRole('customer'))
                                                <a href="{{route('customer.cart.add' , $poBook->id)}}">
                                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">
                                                        إضافة إلى السلة
                                                    </button>
                                                </a>
                                            @elseif(!auth()->user() || (auth()->user() && !auth()->user()->hasRole('customer')))
                                                <a href="{{route('customer.delivery-details' , $poBook->id)}}">
                                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">
                                                        اطلبه الآن
                                                    </button>
                                                </a>
                                            @endif
                                            <figcaption>
                                                <a href="{{route('customer.show.book' , $poBook->id)}}">
                                                    <h3>{{$poBook->name}}</h3>
                                                </a>
                                                <p>{{$poBook->author_name}}</p>
                                                <div class="item-price">$ {{$poBook->price}}</div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div><!--inner-tabs-->
            </div>
        </div>
    </section>
    <!-- popular books -->
    <script type="module">
        $('.slider').slick({
            arrows: true,
            prevArrow: '<button class="prev slick-arrow"><i class="icon icon-arrow-left"></i></button>',
            nextArrow: '<button class="next slick-arrow"><i class="icon icon-arrow-right"></i></button>',
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        vertical: false,
                        verticalSwiping: false
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        vertical: false,
                        verticalSwiping: false
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        vertical: true,
                        verticalSwiping: true
                    }
                }
            ]
        });
    </script>

@endsection

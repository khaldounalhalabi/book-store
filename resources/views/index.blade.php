@extends('layout')
@section('content')

    <!-- Hero -->
    <section id="billboard">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <button class="prev slick-arrow">
                        <i class="icon icon-arrow-left"></i>
                    </button>

                    <div class="main-slider pattern-overlay">
                        <div class="slider-item">
                            <div class="banner-content">
                                <h2 class="banner-title">{{$firstHero->name}}</h2>
                                <p>{{$firstHero->small_description}}</p>
                                <div class="btn-wrap">
                                    <a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i
                                            class="icon icon-ns-arrow-right"></i></a>
                                </div>
                            </div><!--banner-content-->
                            <img src="{{asset('images')}}/main-banner1.jpg" alt="banner" class="banner-image">
                        </div><!--slider-item-->

                        <div class="slider-item">
                            <div class="banner-content">
                                <h2 class="banner-title">{{$secondHero->name}}</h2>
                                <p>{{$secondHero->small_description}}</p>
                                <div class="btn-wrap">
                                    <a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i
                                            class="icon icon-ns-arrow-right"></i></a>
                                </div>
                            </div><!--banner-content-->
                            <img src="{{asset('images')}}/main-banner2.jpg" alt="banner" class="banner-image">
                        </div><!--slider-item-->

                    </div><!--slider-->

                    <button class="next slick-arrow">
                        <i class="icon icon-arrow-right"></i>
                    </button>

                </div>
            </div>
        </div>
    </section>
    <!-- Hero -->


    <!-- Featured Books -->
    <section id="featured-books">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Some quality items</span>
                        </div>
                        <h2 class="section-title">Featured Books</h2>
                    </div>

                    <div class="product-list" data-aos="fade-up">
                        <div class="row">
                            @foreach($featuredBooks as $featuredBook)
                                <div class="col-md-3">
                                    <figure class="product-style">
                                        <img src="{{asset("images")}}/product-item{{$loop->index + 1}}.jpg" alt="Books"
                                             class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
                                            Cart
                                        </button>
                                        <figcaption>
                                            <h3>{{$featuredBook->name}}</h3>
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
                        <a href="#" class="btn-accent-arrow">View all products <i class="icon icon-ns-arrow-right"></i></a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Featured Books -->


    <!-- Best Selling Book -->
    <section id="best-selling" class="leaf-pattern-overlay">
        <div class="corner-pattern-overlay"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-md-offset-2">

                    <div class="row">

                        <div class="col-md-6">
                            <figure class="products-thumb">
                                <img src="{{asset("images")}}/single-image.jpg" alt="book" class="single-image">
                            </figure>
                        </div>

                        <div class="col-md-6">
                            <div class="product-entry">
                                <h2 class="section-title divider">Best Selling Book</h2>

                                <div class="products-content">
                                    <div class="author-name">{{$topSelling->author_name}}</div>
                                    <h3 class="item-title">{{$topSelling->name}}</h3>
                                    <p>{{$topSelling->small_description}}</p>
                                    <div class="item-price">$ {{$topSelling->price}}</div>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn-accent-arrow">shop it now <i
                                                class="icon icon-ns-arrow-right"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- / row -->

                </div>

            </div>
        </div>
    </section>
    <!-- Best Selling Book -->


    <!-- popular books -->
    <section id="popular-books" class="bookshelf">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Some quality items</span>
                        </div>
                        <h2 class="section-title">Popular Books</h2>
                    </div>

                    <div class="tab-content">
                        <div id="all-genre" data-tab-content class="active">
                            <div class="row">
                                @foreach($popularBooks_1 as $poBook)
                                    <div class="col-md-3">
                                        <figure class="product-style">
                                            <img src="{{asset("images")}}/tab-item{{$loop->index + 1}}.jpg" alt="Books"
                                                 class="product-item">
                                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">
                                                Add to
                                                Cart
                                            </button>
                                            <figcaption>
                                                <h3>{{$poBook->name}}</h3>
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
                                            <img src="{{asset("images")}}/tab-item{{$loop->index + 1}}.jpg" alt="Books"
                                                 class="product-item">
                                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">
                                                Add to
                                                Cart
                                            </button>
                                            <figcaption>
                                                <h3>{{$poBook->name}}</h3>
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

@endsection

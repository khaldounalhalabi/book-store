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
                                <h2 class="banner-title">Life of the Wild</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis urna, a eu.</p>
                                <div class="btn-wrap">
                                    <a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i class="icon icon-ns-arrow-right"></i></a>
                                </div>
                            </div><!--banner-content-->
                            <img src="{{asset('images')}}/main-banner1.jpg" alt="banner" class="banner-image">
                        </div><!--slider-item-->

                        <div class="slider-item">
                            <div class="banner-content">
                                <h2 class="banner-title">Birds gonna be Happy</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis urna, a eu.</p>
                                <div class="btn-wrap">
                                    <a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i class="icon icon-ns-arrow-right"></i></a>
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

                            <div class="col-md-3">
                                <figure class="product-style">
                                    <img src="{{asset("images")}}/product-item1.jpg" alt="Books" class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                                    <figcaption>
                                        <h3>Simple way of piece life</h3>
                                        <p>Armor Ramsey</p>
                                        <div class="item-price">$ 40.00</div>
                                    </figcaption>
                                </figure>
                            </div>

                            <div class="col-md-3">
                                <figure class="product-style">
                                    <img src="{{asset("images")}}/product-item2.jpg" alt="Books" class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                                    <figcaption>
                                        <h3>Great travel at desert</h3>
                                        <p>Sanchit Howdy</p>
                                        <div class="item-price">$ 38.00</div>
                                    </figcaption>
                                </figure>
                            </div>

                            <div class="col-md-3">
                                <figure class="product-style">
                                    <img src="{{asset("images")}}/product-item3.jpg" alt="Books" class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                                    <figcaption>
                                        <h3>The lady beauty Scarlett</h3>
                                        <p>Arthur Doyle</p>
                                        <div class="item-price">$ 45.00</div>
                                    </figcaption>
                                </figure>
                            </div>

                            <div class="col-md-3">
                                <figure class="product-style">
                                    <img src="{{asset("images")}}/product-item4.jpg" alt="Books" class="product-item">
                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                                    <figcaption>
                                        <h3>Once upon a time</h3>
                                        <p>Klien Marry</p>
                                        <div class="item-price">$ 35.00</div>
                                    </figcaption>
                                </figure>
                            </div>

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
                                    <div class="author-name">By Timbur Hood</div>
                                    <h3 class="item-title">Birds gonna be happy</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac.</p>
                                    <div class="item-price">$ 45.00</div>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn-accent-arrow">shop it now <i class="icon icon-ns-arrow-right"></i></a>
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
                                <div class="col-md-3">
                                    <figure class="product-style">
                                        <img src="{{asset("images")}}/tab-item1.jpg" alt="Books" class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                                        <figcaption>
                                            <h3>Portrait photography</h3>
                                            <p>Adam Silber</p>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </figure>
                                </div>

                                <div class="col-md-3">
                                    <figure class="product-style">
                                        <img src="{{asset("images")}}/tab-item2.jpg" alt="Books" class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                                        <figcaption>
                                            <h3>Once upon a time</h3>
                                            <p>Klien Marry</p>
                                            <div class="item-price">$ 35.00</div>
                                        </figcaption>
                                    </figure>
                                </div>

                                <div class="col-md-3">
                                    <figure class="product-style">
                                        <img src="{{asset("images")}}/tab-item3.jpg" alt="Books" class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                                        <figcaption>
                                            <h3>Tips of simple lifestyle</h3>
                                            <p>Bratt Smith</p>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </figure>
                                </div>

                                <div class="col-md-3">
                                    <figure class="product-style">
                                        <img src="{{asset("images")}}/tab-item4.jpg" alt="Books" class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                                        <figcaption>
                                            <h3>Just felt from outside</h3>
                                            <p>Nicole Wilson</p>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </figure>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-3">
                                    <figure class="product-style">
                                        <img src="{{asset("images")}}/tab-item5.jpg" alt="Books" class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                                        <figcaption>
                                            <h3>Peaceful Enlightment</h3>
                                            <p>Marmik Lama</p>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </figure>
                                </div>

                                <div class="col-md-3">
                                    <figure class="product-style">
                                        <img src="{{asset("images")}}/tab-item6.jpg" alt="Books" class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                                        <figcaption>
                                            <h3>Great travel at desert</h3>
                                            <p>Sanchit Howdy</p>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </figure>
                                </div>

                                <div class="col-md-3">
                                    <figure class="product-style">
                                        <img src="{{asset("images")}}/tab-item7.jpg" alt="Books" class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                                        <figcaption>
                                            <h3>Life among the pirates</h3>
                                            <p>Armor Ramsey</p>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </figure>
                                </div>

                                <div class="col-md-3">
                                    <figure class="product-style">
                                        <img src="{{asset("images")}}/tab-item8.jpg" alt="Books" class="product-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to Cart</button>
                                        <figcaption>
                                            <h3>Simple way of piece life</h3>
                                            <p>Armor Ramsey</p>
                                            <div class="item-price">$ 40.00</div>
                                        </figcaption>
                                    </figure>
                                </div>

                            </div>

                        </div>
                    </div>

                </div><!--inner-tabs-->

            </div>
        </div>
    </section>
    <!-- popular books -->


@endsection

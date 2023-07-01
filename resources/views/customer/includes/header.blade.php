<!DOCTYPE html>
<html lang="ar" style="font-weight: bold; text-justify: none;
" class="segoui">
<head>
    <title>Ward Book Store</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="{{asset("storage/".$sc->favicon)}}" rel="icon">
    <link href="{{asset("storage/".$sc->favicon)}}" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
          integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
          integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('icomoon/icomoon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/vendor.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"/>
    <!-- script
    ================================================== -->
    <script src="{{asset('js/modernizr.js')}}"></script>
</head>

<body>

<div id="header-wrap">
    <!--top-content-->
    <div class="top-content">
        <div class="container">
            <div class="row">
                <!--social-links-->
                <div class="col-md-6">
                    <div class="social-links">
                        <ul>
                            @if(isset($sc->facebook))
                                <li>
                                    <a href="{{url($sc->facebook)}}"><i class="icon icon-facebook"></i></a>
                                </li>
                            @endif

                            @if(isset($sc->twitter))
                                <li>
                                    <a href="{{$sc->twitter}}"><i class="icon icon-twitter"></i></a>
                                </li>
                            @endif

                            @if(isset($sc->youtube))
                                <li>
                                    <a href="{{$sc->youtube}}"><i class="icon icon-youtube-play"></i></a>
                                </li>
                            @endif

                            @if(isset($sc->instgram))
                                <li>
                                    <a href="{{$sc->instgram}}"><i class="bi bi-instagram"></i></a>
                                </li>
                            @endif

                            @if(isset($sc->whatsapp))
                                <li>
                                    <a href="{{$sc->whatsapp}}"><i class="bi bi-whatsapp"></i></a>
                                </li>
                            @endif

                            @if(isset($sc->telegram))
                                <li>
                                    <a href="{{$sc->telegram}}"><i class="bi bi-telegram"></i></a>
                                </li>
                            @endif

                            @if(isset($sc->snapchat))
                                <li>
                                    <a href="{{$sc->snapchat}}"><i class="bi bi-snapchat"></i></a>
                                </li>
                            @endif

                            @if(isset($sc->tiktok))
                                <li>
                                    <a href="{{$sc->tiktok}}"><i class="bi bi-tiktok"></i></a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
                <!--social-links-->

                <!--top-right-->
                <div class="col-md-6">
                    <div class="right-element">
                        @if(auth()->user())
                            <a href="{{route('customer.userDetails')}}" class="user-account for-buy"><i
                                    class="icon icon-user"></i><span>{{auth()->user()->first_name}}</span></a>
                        @else
                            <a href="{{route('login-page')}}" class="user-account for-buy"><i
                                    class="icon icon-user"></i><span>تسجيل الدخول</span></a>
                        @endif

                        @if(auth()->user())
                            <a href="{{route('logout')}}" class="cart for-buy"><i
                                    class="icon icon-arrow-right-circle"></i><span>تسجيل الخروج</span></a>
                        @endif

                        <a href="{{route('register-page')}}" class="user-account for-buy"><i
                                class="icon icon-user"></i><span>التسجيل</span></a>
                        @if(auth()->user())
                            <a href="{{route('customer.cart')}}" class="cart for-buy"><i
                                    class="icon icon-clipboard"></i><span>السلة</span></a>
                        @endif

                        <div class="action-menu">

                            <div class="search-bar">
                                <a class="search-button search-toggle" data-selector="#header-wrap">
                                    <i class="icon icon-search"></i>
                                </a>
                                <form role="search" method="POST" class="search-box"
                                      action="{{route('customer.books.search')}}">
                                    @csrf
                                    <input class="search-field text search-input" placeholder="بحث" type="search"
                                           name="search">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--top-right-->
            </div>
        </div>
    </div>
    <!--top-content-->

    <header id="header" dir="rtl" lang="ar">
        <div class="container">
            <div class="row">

                <div class="col-md-10">

                    <nav id="navbar" dir="rtl">
                        <div class="main-menu stellarnav">
                            <ul class="menu-list">
                                <li class="menu-item active"><a href="{{route('index')}}" data-effect="Home">الصفحة
                                        الرئيسية</a></li>
                                <li class="menu-item"><a href="{{route('customer.about')}}" class="nav-link"
                                                         data-effect="About">حول</a>
                                </li>
                                <li class="menu-item"><a href="{{route('customer.index.books')}}" class="nav-link"
                                                         data-effect="Store">الكتب</a></li>
                                <li class="menu-item"><a href="{{route('customer.contact')}}" class="nav-link"
                                                         data-effect="Contact">اتصل بنا</a></li>
                                <li class="menu-item"><a href="{{route('customer.terms-conditions')}}" class="nav-link"
                                                         data-effect="Contact">البنود و الأحكام</a></li>
                            </ul>

                            <div class="hamburger">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </div>

                        </div>
                    </nav>

                </div>


                <div class="col-md-2">
                    <div class="main-logo">
                        <a href="{{route('index')}}"><img src="{{asset("storage/".$sc->logo)}}" alt="logo"></a>
                    </div>

                </div>


            </div>
        </div>
    </header>

</div><!--header-wrap-->

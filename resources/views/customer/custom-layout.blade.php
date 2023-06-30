<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <title>Book Store</title>
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

    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"/>


    <!-- script
    ================================================== -->
    <script src="{{asset('js/modernizr.js')}}"></script>

</head>
<body class="main-login">

@yield('content')

<footer id="footer" dir="rtl">
    <div class="container">
        <div class="row">

            <div class="col-md-2">
                <div class="footer-menu">
                    <h5><a href="{{route('customer.about')}}" class="nav-link" data-effect="About" style="color: black">حول</a>
                    </h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-menu">
                    <h5><a href="{{route('customer.contact')}}" class="nav-link" data-effect="Contact"
                           style="color: black">اتصل بنا</a></h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-menu">
                    <h5><a href="{{route('customer.index.books')}}" class="nav-link" data-effect="Contact"
                           style="color: black">الكتب</a>
                    </h5>
                </div>
            </div>

            <div class="col-md-4">

                <div class="footer-item">
                    <div class="company-brand">
                        <a href="{{route('index')}}"><img src="{{asset("storage/".$sc->logo)}}" alt="logo"
                                                          class="footer-logo"></a>
                        <p class="text-dark">{{$sc->footer_quot}}</p>
                    </div>
                </div>

            </div>

        </div>
        <!-- / row -->

    </div>
</footer>
<script src="{{asset('js/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset("js/script.js")}}"></script>
<script src="{{asset("js/bootstrap.min.js")}}"></script>
<script src="{{asset("js/bootstrap.bundle.min.js")}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.2.0/jquery-migrate.min.js"
        integrity="sha512-iJ1SAH2WFRlq6+tSHM2/y3xJiqcSoJeZ4F5c0u0VAON7+azC3IwfHkDORU3RmIv1xB/w7IBiaiRx8FJEk/fLmw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
</body>
</html>

<footer id="footer" dir="rtl">
    <div class="container">
        <div class="row">

            <div class="col-md-2">
                <div class="footer-menu">
                    <h5><a href="{{route('customer.about')}}" class="nav-link" data-effect="About" style="color: black">حول</a></h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-menu">
                    <h5><a href="{{route('customer.contact')}}" class="nav-link" data-effect="Contact" style="color: black">اتصل بنا</a></h5>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-menu">
                    <h5><a href="{{route('customer.index.books')}}" class="nav-link" data-effect="Contact" style="color: black">الكتب</a>
                    </h5>
                </div>
            </div>

            <div class="col-md-4">

                <div class="footer-item">
                    <div class="company-brand">
                        <a href="{{route('index')}}"><img src="{{asset('images/main-logo.png')}}" alt="logo"
                                                          class="footer-logo"></a>
                        <p>Lorem ipsum dolor sit amet, consecrate disciplining elite</p>
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


</body>
</html>

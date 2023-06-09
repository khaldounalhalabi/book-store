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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
@if(session()->has('error'))
    <script type="module">
        Swal.fire({
            title: 'Error!',
            text: '{{session()->get('error')}}',
            icon: 'error',
            confirmButtonText: 'Ok',
            confirmButtonColor: '#000000',
        })
    </script>
@endif

@if(session()->has('success'))
    <script type="module">
        Swal.fire({
            title: 'Success!',
            text: '{{session()->get('success')}}',
            icon: 'success',
            confirmButtonText: 'Ok',
            confirmButtonColor: '#000000',
        })
    </script>
@endif

@if(session()->has('message'))
    <script type="module">
        Swal.fire({
            title: 'Info !',
            text: '{{session()->get('message')}}',
            icon: 'info',
            confirmButtonText: 'Ok',
            confirmButtonColor: '#000000',
        })
    </script>
    @endif


    </body>
    </html>

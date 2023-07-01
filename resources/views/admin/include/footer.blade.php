<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>Ward Book Store Admin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Designed by <a href="https://github.com/khaldounalhalabi">Khaldoun Alhalabi</a>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/b-2.3.6/b-html5-2.3.6/b-print-2.3.6/datatables.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.min.js"
        integrity="sha512-ySDkgzoUz5V9hQAlAg0uMRJXZPfZjE8QiW0fFMW7Jm15pBfNn3kbGsOis5lPxswtpxyY3wF5hFKHi+R/XitalA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"
        integrity="sha512-Ixzuzfxv1EqafeQlTCufWfaC6ful6WFqIz4G+dWvK0beHw0NVJwvCKSgafpy5gwNqKmgUfIBraVwkKI+Cz0SEQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<script src="{{ asset('AdminAssets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('AdminAssets/js/main.js') }}"></script>

@stack('scripts')

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

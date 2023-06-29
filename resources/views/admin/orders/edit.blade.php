@extends('admin.layout')
@section('content')
    <section class="section" dir="rtl" style="font-family: 'Segoe UI',sans-serif">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title text-primary" style="font-family: 'Segoe UI',sans-serif">إضافة طلب</h1>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="card p-1">
                                <div class="card-body">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li style="color: red">
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <form id="serviceForm" action="{{ route('admin.books.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="row m-auto">

                                <div class="col-md-6 m-auto">
                                    <label class="col-form-label" for="first_name">الاسم الأول</label>
                                    <input id="first_name" name="first_name" type="text" class="form-control"
                                           value="{{old('first_name')}}">
                                </div>

                                <div class="col-md-6  m-auto">
                                    <label class="col-form-label" for="last_name">الاسم الأخير</label>
                                    <input id="last_name" name="last_name" type="text" class="form-control"
                                           value="{{old('last_name')}}">
                                </div>

                                <div class="col-md-3  m-auto">
                                    <label class="col-form-label" for="country_code">رمز الدولة</label>
                                    <select id="country_code" name="country_code" class="form-select">
                                        <option>+963 Syria</option>
                                        <option>+963 Syria</option>
                                        <option>+963 Syria</option>
                                    </select>
                                </div>

                                <div class="col-md-9 m-auto">
                                    <label class="col-form-label" for="phone_number">رقم الهاتف</label>
                                    <input id="phone_number" name="phone_number" class="form-control"
                                           value="{{old('phone_number')}}">
                                </div>

                                <div class="col-md-6  m-auto">
                                    <label class="col-form-label" for="country">الدولة</label>
                                    <select id="country" name="country" class="form-select">
                                        <option value="syria">Syria</option>
                                        <option value="syria">Syria</option>
                                        <option value="syria">Syria</option>
                                    </select>
                                </div>

                                <div class="col-md-6 m-auto">
                                    <label class="col-form-label" for="city">المدينة</label>
                                    <input id="city" name="city" class="form-control"
                                           value="{{old('city')}}">
                                </div>

                                <div class="col-md-6 m-auto">
                                    <label class="col-form-label" for="street">الشارع</label>
                                    <input id="street" name="street" class="form-control"
                                           value="{{old('street')}}">
                                </div>

                                <div class="col-md-6 m-auto">
                                    <label class="col-form-label" for="house_number">رقم المنزل</label>
                                    <input id="house_number" name="house_number" class="form-control"
                                           value="{{old('house_number')}}">
                                </div>

                                <div class="col-md-6 m-auto">
                                    <label class="col-form-label" for="door_number">رقم الباب</label>
                                    <input id="door_number" name="door_number" class="form-control"
                                           value="{{old('door_number')}}">
                                </div>

                                <div class="col-md-6 m-auto">
                                    <label class="col-form-label" for="post_code">الرمز البريدي</label>
                                    <input id="post_code" name="post_code" class="form-control"
                                           value="{{old('post_code')}}">
                                </div>

                                <div class="col-md-12">
                                    <label class="col-form-label" for="books">الكتب</label>
                                    <select class="form-select multiple-select-2" id="books" name="books" multiple
                                            data-placeholder="select a book">
                                    </select>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script type="module">
            $('#country_code').select2({
                theme: 'bootstrap-5'
            });

            $('#country').select2({
                theme: 'bootstrap-5'
            });

            $("#books").select2({
                theme: 'bootstrap-5',
                // width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                ajax: {
                    url: '{{route('admin.book.books-all')}}',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            _token: "{{csrf_token()}}",
                            search: params.term,// search term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data,
                        };
                    },
                    cache: true
                },
                minimumInputLength: 0,
                multiple: true,
                closeOnSelect: false,
                allowClear: true,
            });
        </script>
    @endpush
@endsection

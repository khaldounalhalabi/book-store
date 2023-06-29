@extends('admin.layout')
@section('content')
    @php
        $deliveryDetails = json_decode($order->delivery_details , true);
        $orderedBooks = json_decode($order->ordered_books_ids , true) ?? [$order->book_id];
    @endphp
    <section class="section" dir="rtl" style="font-family: 'Segoe UI',sans-serif">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title text-primary" style="font-family: 'Segoe UI',sans-serif">تعديل الطلب
                            : {{$order->order_number}}</h1>
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

                        <form id="serviceForm" action="{{ route('admin.order.update' , $order->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="row m-auto">

                                <div class="col-md-6 m-auto">
                                    <label class="col-form-label" for="first_name">الاسم الأول</label>
                                    <input id="first_name" name="first_name" type="text" class="form-control"
                                           value="{{old('first_name') ?? ($deliveryDetails['first_name'] ?? null)}}">
                                </div>

                                <div class="col-md-6  m-auto">
                                    <label class="col-form-label" for="last_name">الاسم الأخير</label>
                                    <input id="last_name" name="last_name" type="text" class="form-control"
                                           value="{{old('last_name') ?? ($deliveryDetails['last_name'] ?? null)}}">
                                </div>

                                <div class="col-md-3  m-auto">
                                    <label class="col-form-label" for="country_code">رمز الدولة</label>
                                    <select id="country_code" name="country_code" class="form-select">
                                        @if(old('country_code') != null)
                                            <option value="{{old('country_code')}}">{{old('country_code')}}</option>
                                        @elseif(isset($deliveryDetails['country_code']))
                                            <option
                                                value="{{$deliveryDetails['country_code']}}">{{$deliveryDetails['country_code']}}
                                            </option>
                                        @endif
                                    </select>
                                </div>

                                <div class="col-md-9 m-auto">
                                    <label class="col-form-label" for="phone_number">رقم الهاتف</label>
                                    <input id="phone_number" name="phone_number" class="form-control"
                                           value="{{old('phone_number') ?? ($deliveryDetails['phone_number'] ?? null)}}">
                                </div>

                                <div class="col-md-6  m-auto">
                                    <label class="col-form-label" for="country">الدولة</label>
                                    <select id="country" name="country" class="form-select">
                                        @if(old('country') != null)
                                            <option value="{{old('country')}}">{{old('country')}}</option>
                                        @elseif(isset($deliveryDetails['country']))
                                            <option
                                                value="{{$deliveryDetails['country']}}">{{$deliveryDetails['country']}}
                                            </option>
                                        @endif
                                    </select>
                                </div>

                                <div class="col-md-6 m-auto">
                                    <label class="col-form-label" for="city">المدينة</label>
                                    <input id="city" name="city" class="form-control"
                                           value="{{old('city') ?? ($deliveryDetails['city'] ?? null)}}">
                                </div>

                                <div class="col-md-6 m-auto">
                                    <label class="col-form-label" for="street">الشارع</label>
                                    <input id="street" name="street" class="form-control"
                                           value="{{old('street') ?? ($deliveryDetails['street'] ?? null)}}">
                                </div>

                                <div class="col-md-6 m-auto">
                                    <label class="col-form-label" for="house_number">رقم المنزل</label>
                                    <input id="house_number" name="house_number" class="form-control"
                                           value="{{old('house_number') ?? ($deliveryDetails['house_number'] ?? null)}}">
                                </div>

                                <div class="col-md-6 m-auto">
                                    <label class="col-form-label" for="door_number">رقم الباب</label>
                                    <input id="door_number" name="door_number" class="form-control"
                                           value="{{old('door_number') ?? ($deliveryDetails['door_number'] ?? null)}}">
                                </div>

                                <div class="col-md-6 m-auto">
                                    <label class="col-form-label" for="post_code">الرمز البريدي</label>
                                    <input id="post_code" name="post_code" class="form-control"
                                           value="{{old('post_code') ?? ($deliveryDetails['post_code'] ?? null)}}">
                                </div>

                                <div class="col-md-12">
                                    <label class="col-form-label" for="books">الكتب</label>
                                    <select class="form-select multiple-select-2" id="books" name="books[]" multiple
                                            data-placeholder="select a book">
                                        @foreach($orderedBooks as $book_id)
                                            <option value="{{$book_id}}" selected>
                                                {{\App\Models\Book::findOrFail($book_id)->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-12 m-3">
                                    <div class="row">
                                        <div class="form-check col-md-6">
                                            <input class="form-check-input" type="radio" name="status" id="shipping"
                                                   @if($order->status == 'shipping') checked @endif
                                                   value="shipping">
                                            <label class="form-check-label" for="shipping">
                                                shipping
                                            </label>
                                        </div>
                                        <div class="form-check col-md-6">
                                            <input class="form-check-input" type="radio" name="status" id="rejected"
                                                   @if($order->status == 'rejected') checked @endif
                                                   value="rejected">
                                            <label class="form-check-label" for="rejected">
                                                rejected
                                            </label>
                                        </div>
                                        <div class="form-check col-md-6">
                                            <input class="form-check-input" type="radio" name="status" id="delivered"
                                                   value="delivered"
                                                   @if($order->status == 'delivered') checked @endif
                                            >
                                            <label class="form-check-label" for="delivered">
                                                delivered
                                            </label>
                                        </div>
                                        <div class="form-check col-md-6">
                                            <input class="form-check-input" type="radio" name="status" id="pending"
                                                   value="pending"
                                                   @if($order->status == 'pending') checked @endif
                                            >
                                            <label class="form-check-label" for="pending">
                                                pending
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary m-5 p-auto w-auto">تعديل</button>
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
                theme: 'bootstrap-5',
                placeholder: $(this).data('placeholder'),
                ajax: {
                    url: '{{route('admin.get-countries-codes')}}',
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
                closeOnSelect: false,
            });

            $('#country').select2({
                theme: 'bootstrap-5',
                placeholder: $(this).data('placeholder'),
                ajax: {
                    url: '{{route('admin.get-countries')}}',
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
                closeOnSelect: false,
            });

            $("#books").select2({
                theme: 'bootstrap-5',
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

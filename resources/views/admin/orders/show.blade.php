@extends('admin.layout')
@section('content')
    <div class="page-title" dir="rtl">
        <h1 class=""></h1>
        <h2>Order Number : {{$order->order_number}}</h2>
    </div>

    @php
        $deliveryDetails = json_decode($order->delivery_details , true) ;
        if (!$order->ordered_books_ids)
            $orderedBooks = $order->book_id ;
        else $orderedBooks = json_decode($order->ordered_books_ids , true);
    @endphp

    <section class="section profile" dir="rtl">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-content p-2">
                            <div class="pb-3">
                                <a href="{{route('admin.order.edit' , $order->id)}}" class="p-2">
                                    <button class="btn btn-primary">تعديل</button>
                                </a>
                            </div>

                            <h3>Delivery Details</h3>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle"> الاسم :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$deliveryDetails['first_name'] ?? ''}}  {{$deliveryDetails['last_name'] ?? ''}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle"> البريد الالكتروني :
                                </div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$deliveryDetails['email'] ?? ''}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle">رقم الهاتف :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$deliveryDetails['country_code'] ?? ''}}  {{$deliveryDetails['phone_number'] ?? ''}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle"> الشارع :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$deliveryDetails['street'] ?? ''}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle"> رقم المنزل :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$deliveryDetails['house_number'] ?? ''}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle"> رقم الباب :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$deliveryDetails['door_number'] ?? ''}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle"> الرمز البريدي :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$deliveryDetails['post_code'] ?? ''}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle"> المدينة :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$deliveryDetails['city'] ?? ''}}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle"> البلد :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$deliveryDetails['country'] ?? ''}}</div>
                            </div>
                            <h3>Order Details</h3>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle">السعر الإجمالي :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$order->total_price}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle">السعر الشحن :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$order->shipping_cost}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle">رفم الطلب :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$order->order_number}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label border border-dark-subtle">الحالة :</div>
                                <div
                                    class="col-lg-9 col-md-8 label border border-dark-subtle">{{$order->status}}</div>
                            </div>

                            @if(is_array($orderedBooks))
                                <div class="row">
                                    <div class="col-md-3 border border-dark-subtle">
                                        <label class="" for="books">الكتب
                                            المطلوبة</label>
                                    </div>
                                    <div class="col-md-9 border border-dark-subtle">
                                        <select class="form-select multiple-select-2 border border-dark-subtle"
                                                id="books"
                                                data-placeholder="select a book" readonly="">
                                            @foreach($orderedBooks as $book_id)
                                                @php
                                                    $book = \App\Models\Book::findOrFail($book_id) ?? '';
                                                @endphp
                                                <option>{{$book->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label border border-dark-subtle">الكتاب المطلوب :
                                    </div>
                                    <div class="col-lg-9 col-md-8 label border border-dark-subtle">
                                        {{$order->book->name}}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

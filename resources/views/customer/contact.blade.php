@extends('customer.layout')
@section('content')
    <section dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">اتصل بنا</h1>
                    <div class="breadcrumbs">
                        <span class="item"><a href="{{route('index')}}">الصفحة الرئيسية/</a></span>
                        <span class="item">اتصل بنا</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-information padding-large mt-3" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-0 mb-3">

                    <h2>ابق على تواصل معنا</h2>

                    <div class="contact-detail d-flex flex-wrap mt-4">
                        <div class="detail mr-6 mb-4">
                            <p>{{$sc->contact_content}}</p>
                            <ul class="list-unstyled list-icon">
                                <li><i class="icon icon-phone"></i>{{$sc->phone_number}}</li>
                                <li><i class="icon icon-envelope-o"></i>{{$sc->email}}</li>
                                <li><i class="icon icon-location2"></i>{{$sc->address}}</li>
                            </ul>
                        </div><!--detail-->
                        <div class="detail mb-4">
                            <h3>صفحاتنا على مواقع التواصل الاجتماعي</h3>
                            <div class="social-links flex-container">
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
                            </div><!--social-links-->
                        </div><!--detail-->

                    </div><!--contact-detail-->
                </div><!--col-md-6-->

                <div class="col-md-6 p-0">

                    <div class="contact-information">
                        <h2>أرسل لنا رسالة</h2>
                        <form name="contactform" method="POST" action="{{route('customer.messages.send')}}"
                              class="contact-form d-flex flex-wrap mt-4">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" minlength="2" name="name" placeholder="الاسم"
                                           class="u-full-width"
                                           required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" placeholder="البريد الالكتروني"
                                           class="u-full-width" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                    <textarea class="u-full-width" name="body" placeholder="الرسالة"
                                              style="height: 150px;" required></textarea>
                                    @include('customer.includes.error')
                                    <button type="submit" name="submit" class="btn btn-full btn-rounded">إرسال</button>
                                </div>
                            </div>
                        </form>

                    </div><!--contact-information-->

                </div><!--col-md-6-->

            </div>
        </div>
    </section>
@endsection

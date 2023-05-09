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
                            <p>We'd love to hear from you! If you have any questions or feedback about our products or
                                services, please don't hesitate to get in touch. You can reach us by phone, email, or
                                through the contact form on this page.
                                Our customer support team is available to assist you with any issues or concerns you may
                                have. We strive to provide the best possible service to our customers and are committed
                                to resolving any problems as quickly and efficiently as possible.
                                Thank you for your interest in our company. We look forward to hearing from you!</p>
                            <ul class="list-unstyled list-icon">
                                <li><i class="icon icon-phone"></i>+1650-243-0000</li>
                                <li><i class="icon icon-envelope-o"></i><a href="mailto:info@yourcompany.com">info@yourcompany.com</a>
                                </li>
                                <li><i class="icon icon-location2"></i>North Melbourne VIC 3051, Australia</li>
                            </ul>
                        </div><!--detail-->
                        <div class="detail mb-4">
                            <h3>صفحاتنا على مواقع التواصل الاجتماعي</h3>
                            <div class="social-links flex-container">
                                <a href="#" class="icon icon-facebook"></a>
                                <a href="#" class="icon icon-twitter"></a>
                                <a href="#" class="icon icon-pinterest-p"></a>
                                <a href="#" class="icon icon-youtube"></a>
                                <a href="#" class="icon icon-linkedin"></a>
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

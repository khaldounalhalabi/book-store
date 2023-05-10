@extends('customer.layout')
@section('content')
    <div class="site-banner" dir="rtl">
        <div class="banner-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="colored">
                            <h1 class="page-title">حول</h1>
                            <div class="breadcum-items">
                                <span class="item"><a href="{{route('index')}}">الصفحة الرئيسية /</a></span>
                                <span class="item colored">حول</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--site-banner-->

    <section class="chief-detail padding-large" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="single-image col-md-12">
                    <p>{!! $sc->about !!}</p>

                </div>
            </div>
        </div>
    </section>
@endsection

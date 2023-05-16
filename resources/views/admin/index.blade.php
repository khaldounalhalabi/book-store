@extends('admin.layout')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6" dir="rtl">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title" style="font-family: 'Segoe UI',sans-serif ; ">الرسائل <span>| اليوم</span>
                                </h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$recieved_emails_today}}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->
                    <div class="col-xxl-4 col-md-6" dir="rtl">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title" style="font-family: 'Segoe UI',sans-serif ; ">عدد الزوار</h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-view-list"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$siteVisitors}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Revenue Card -->
                    <div class="col-xxl-4 col-md-6" dir="rtl">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title" style="font-family: 'Segoe UI',sans-serif ; ">عدد الكتب</h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-book"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$booksCount}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Revenue Card -->
                    <div class="col-xxl-4 col-md-6" dir="rtl">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title" style="font-family: 'Segoe UI',sans-serif ; ">عدد المستخدمين</h5>
                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$usersCount}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Revenue Card -->
                </div>
            </div>
            {{-- End Of Left Side Columns --}}

            <!-- Right side columns -->
            <div class="col-lg-4" dir="rtl">
                <div class="col-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title" style="font-family: 'Segoe UI',sans-serif ; ">التاريخ
                                <span>| الوقت</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-alarm"></i>
                                </div>
                                <div class="ps-3">
                                    <h6 dir="rtl" id="time">
                                        {{-- Setting realtime clock --}}
                                        <script>
                                            `use strict`;

                                            function refreshTime() {
                                                const timeDisplay = document.getElementById("time");
                                                const dateString = new Date().toLocaleString();
                                                const formattedString = dateString.replace(", ", " - ");
                                                timeDisplay.textContent = formattedString;
                                            }

                                            setInterval(refreshTime, 1000);
                                        </script>
                                        {{-- end setting realtime clock --}}
                                    </h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <div class="col-12">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title" style="font-family: 'Segoe UI',sans-serif ; ">عدد الطلبات</h5>
                            <div class="d-flex align-items-center">
                                <div
                                    class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi-cart-check"></i>
                                </div>
                                <div class="ps-3">
                                    <h6></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Revenue Card -->
            </div>

            <div class="row" dir="rtl">
                <!-- Top Visited Books Pages -->
                <div class="col-md-12">
                    <div class="card top-selling overflow-auto">
                        <div class="card-body pb-1">
                            <h5 class="card-title" style="font-family: 'Segoe UI',sans-serif ; " dir="rtl">الكتب الأكثر
                                مشاهدة</h5>
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th scope="col">الاسم</th>
                                    <th scope="col">الناشر</th>
                                    <th scope="col">السعر</th>
                                    <th scope="col">الإعجابات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($popularBooks as $pob)
                                    <tr>
                                        <th scope="row">{{ $pob->name }}</th>
                                        <td>{{ $pob->publisher }}</td>
                                        <td>{{ $pob->price }}</td>
                                        <td class="fw-bold">{{ $pob->likes_count }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div><!-- End Top Visited Books Pages -->
            </div>

        </div>
    </section>
@endsection

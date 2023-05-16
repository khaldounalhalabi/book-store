@extends('admin.layout')
@section('content')

    <div class="pagetitle">
        <h1 class="text-center" style="font-family: 'Segoe UI',sans-serif ; ">البريد الوارد من الموقع</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card text-center">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active text-center" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview" style="margin-bottom: 10px"></button>
                            </li>
                        </ul>
                        <table class="table table-bordered" dir="rtl">
                            <thead class="table-primary">
                            <tr>
                                <th scope="col" class="text-center">الاسم</th>
                                <th scope="col" class="text-center">البريد الالكتروني</th>
                                <th scope="col" class="text-center">التاريخ</th>
                                <th scope="col" class="text-center">الحالة</th>
                                <th scope="col" class="text-center"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($emails as $e)
                                <tr>
                                    <th scope="row">{{$e->name}}</th>
                                    <td>{{$e->email}}</td>
                                    <td>{{$e->created_at}}</td>
                                    @if(isset($e->read_at))
                                        <td class="text-success">Read at {{ $e->read_at }}</td>
                                    @else
                                        <td class="text-danger">Unread</td>
                                    @endif
                                    <td><a href="{{route('admin.email.show' , $e->id)}}" class="text-primary fw-bold">
                                            <button class="btn btn-primary">عرض</button>
                                        </a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div dir="rtl">
                            {{$emails->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

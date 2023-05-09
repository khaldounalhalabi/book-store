@extends('admin.layout')
@section('content')

    <div class="pagetitle">
        <h1 class="segoui text-center">Services</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card text-center">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <a href="{{ route('admin.service.add.page') }}"><button class="segoui btn btn-primary text-center" data-bs-toggle="tab" data-bs-target="#profile-overview" style="margin-bottom: 10px; margin-top: 10px;">Add Service</button>
                            </li>
                        </ul>
                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col" class="myfont text-center">ID</th>
                                    <th scope="col" class="myfont text-center">Title</th>
                                    <th scope="col" class="myfont text-center">Arabic Title</th>
                                    <th scope="col" class="text-center"></th>
                                    <th scope="col" class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $s)
                                   <tr>
                                    <th scope="row">{{$s->id}}</th>
                                    <td>{{$s->title}}</td>
                                    <td>{{ $s->arabic_title }}</td>
                                    <td><a href="{{ route('admin.service.editPage' , ['id' => $s->id]) }}"><button class="btn btn-primary">Edit</button></td>
                                    <td><form action="{{ route('admin.service.delete' , ['id' => $s->id]) }}" method="post">@csrf<button class="btn btn-danger">Delete</button></form></td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('admin.layout')
@section('content')

<div class="pagetitle">
    <h1 class="segoui text-center">Subscibed Emails</h1>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card text-center">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                            <button class="nav-link active myfont text-center" data-bs-toggle="tab" data-bs-target="#profile-overview" style="margin-bottom: 10px"></button>
                        </li>
                    </ul>
                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col" class="myfont text-center">ID</th>
                                <th scope="col" class="myfont text-center">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subscribers as $s)
                            <tr>
                                <th scope="row">{{$s->id}}</th>
                                <td>{{$s->email}}</td>
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

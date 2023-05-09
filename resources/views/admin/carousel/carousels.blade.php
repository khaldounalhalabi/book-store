@extends('admin.layout')
@section('content')

<div class="pagetitle">
    <h1 class="segoui text-center">Carousels Items</h1>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card text-center">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                            <a href="{{ route('admin.add.carousel.page') }}"><button class="segoui btn btn-primary" data-bs-toggle="tab" data-bs-target="#profile-overview" style="margin-bottom: 10px; margin-top: 10px;">Add Carousel</button></a>
                        </li>
                    </ul>

                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col" class="myfont text-center">ID</th>
                                <th scope="col" class="myfont text-center">Title</th>
                                <th scope="col" class="myfont text-center">Title Color </th>
                                <th scope="col" class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carousels as $c)
                            <tr>
                                <th scope="row">{{$c->id}}</th>
                                <td>{{$c->title}}</td>
                                <td>{{ $c->title_color }}</td>
                                <td><a href="{{ route('admin.carousel.editPage' , ['id' => $c->id]) }}"><button class="btn btn-primary">Edit</button></td>
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

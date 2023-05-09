@extends('admin.layout')
@section('content')

<div class="pagetitle">
    <h1 class="segoui text-center">Inbox</h1>
</div><!-- End Page Title -->
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card text-center">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                            <button class="nav-link active segoui text-center" data-bs-toggle="tab" data-bs-target="#profile-overview" style="margin-bottom: 10px"></button>
                        </li>
                    </ul>
                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col" class="segoui text-center">name</th>
                                <th scope="col" class="segoui text-center">Email</th>
                                <th scope="col" class="segoui text-center">Subject</th>
                                <th scope="col" class="segoui text-center">Status</th>
                                <th scope="col" class="segoui text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($emails as $e)
                            <tr>
                                <th scope="row">{{$e->data['name']}}</th>
                                <td>{{$e->data['email']}}</td>
                                <td>{{$e->data['subject']}}</td>
                                @if(isset($e->read_at))
                                <td>Read at {{ $e->read_at }}</td>
                                @else
                                <td>Unread</td>
                                @endif
                                <td><a href="{{ route('admin.email.from.notification' , ['emailId' => $e->data['email_id'] , 'notificationId' => $e->id]) }}" class="text-primary fw-bold"><button class="btn btn-primary">Show</button></a></td>
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

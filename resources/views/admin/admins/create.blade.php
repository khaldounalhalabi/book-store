@extends('admin.layout')
@section('content')
    <section class="section" dir="rtl" style="font-family: 'Segoe UI',sans-serif">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title text-primary" style="font-family: 'Segoe UI',sans-serif">Creat Admin</h1>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="card p-1">
                                <div class="card-body">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li style="color: red">
                                                {{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        <form id="serviceForm" action="{{ route('admin.shipping.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="row m-auto">

                                <div class="col-md-6 m-auto">
                                    <label class="col-form-label" for="name">name</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                           value="{{old('name')}}">
                                </div>

                                <div class="col-md-6  m-auto">
                                    <label class="col-form-label" for="email">email</label>
                                    <input id="email" name="email" type="text" class="form-control"
                                           value="{{old('email')}}">
                                </div>

                                <div class="col-md-12  m-auto">
                                    <label class="col-form-label" for="password">password</label>
                                    <input id="password" name="password" type="number" step="any" class="form-control"
                                           value="{{old('password')}}">
                                </div>

                                <div class="col-md-12  m-auto">
                                    <label class="col-form-label"
                                           for="password_confirmation">password_confirmation</label>
                                    <input id="password_confirmation" name="password_confirmation" type="number"
                                           step="any" class="form-control"
                                           value="{{old('password')}}">
                                </div>

                                <button type="submit" class="btn btn-primary m-5 p-auto w-auto">إضافة</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

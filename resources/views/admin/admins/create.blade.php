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

                        <form id="serviceForm" action="{{ route('admin.admin.store') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="row m-auto">

                                <div class="col-md-6 m-auto">
                                    <label class="col-form-label" for="first_name">الاسم الأول</label>
                                    <input id="first_name" name="first_name" type="text" class="form-control"
                                           value="{{old('first_name')}}">
                                </div>

                                <div class="col-md-6 m-auto">
                                    <label class="col-form-label" for="last_name">الاسم الأخير</label>
                                    <input id="last_name" name="last_name" type="text" class="form-control"
                                           value="{{old('last_name')}}">
                                </div>

                                <div class="col-md-6  m-auto">
                                    <label class="col-form-label" for="email">email</label>
                                    <input id="email" name="email" type="text" class="form-control"
                                           value="{{old('email')}}">
                                </div>

                                <div class="col-md-6  m-auto">
                                    <label class="col-form-label" for="password">password</label>
                                    <input id="password" name="password" type="password" step="any" class="form-control"
                                           value="{{old('password')}}">
                                </div>

                                <div class="col-md-12  m-auto">
                                    <label class="col-form-label"
                                           for="password_confirmation">password_confirmation</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                           step="any" class="form-control"
                                           value="{{old('password_confirmation')}}">
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

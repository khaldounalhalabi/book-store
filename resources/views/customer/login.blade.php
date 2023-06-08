@extends('customer.custom-layout')
@section('content')
    <main>
        <div class="d-flex align-items-center justify-content-center">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div id="login-form-wrap" class="card bg-transparent bg-opacity-100 text-center">
                            <img
                                src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
                                class="card-img-top img-fluid"
                                alt="form">
                            <div class="card-title">
                                <h2 class="m-2">تسجيل الدخول</h2>
                            </div>
                            <div class="card-body">
                                <form method="POST" id="login-form" action="{{route('customer.doLogin')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <input class="form-control border-dark bg-transparent mb-3" type="email"
                                                   id="email"
                                                   name="email"
                                                   placeholder="البريد الالكتروني" required>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <input class="form-control border-dark bg-transparent" type="password"
                                                   id="password"
                                                   name="password"
                                                   placeholder="كلمة السر" required>
                                        </div>
                                    </div>
                                    @include('customer.includes.error')
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button
                                            class="btn btn-sm p-4 m-5 w-auto text-center d-flex justify-content-center align-items-center">
                                            تسجيل
                                            الدخول
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="card-footer create-account">
                                <p>Not a member? <a href="{{route('register-page')}}" class="create-account">Create
                                        Account</a>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

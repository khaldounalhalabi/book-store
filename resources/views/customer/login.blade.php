@extends('customer.custom-layout')
@section('content')
    <main>
        <div id="login-form-wrap" class="transparent">
            <h2>Login</h2>
            <form method="POST" id="login-form" action="{{route('customer.doLogin')}}">
                @csrf
                <div>
                    <input class="form-control border-dark bg-transparent mb-3" type="email" id="email" name="email"
                           placeholder="البريد الالكتروني" required><i class="validation"><span></span><span></span></i>
                </div>
                <div>
                    <input class="form-control border-dark bg-transparent" type="password" id="password" name="password"
                           placeholder="كلمة السر" required><i class="validation"><span></span><span></span></i>
                </div>

                @include('customer.includes.error')

                <p>
                    <input type="submit" id="login" value="Login" class="btn">
                </p>
            </form>
            <div id="create-account-wrap" class="transparent bg-transparent">
                <p>Not a member? <a href="{{route('register-page')}}">Create Account</a>
                <p>
            </div><!--create-account-wrap-->
        </div><!--login-form-wrap-->
    </main>

@endsection

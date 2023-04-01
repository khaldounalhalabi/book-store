<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Server Error Error Page</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>


<body>
<div class="d-flex align-items-center justify-content-center vh-100">
    <div class="text-center">
        <h1 class="display-1 fw-bold">500</h1>
        <p class="fs-3"> <span class="text-danger">Ops!</span> Sorry</p>
        <p class="lead">
            500 Server Error
        </p>
        @if(isset($error))
            <p class="lead">
                {{ $error }}
            </p>
        @endif
    </div>
</div>
</body>


</html>

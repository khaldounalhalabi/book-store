<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WardBook Store Purchase Invoice</title>
</head>
<body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
      integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous"/>

<style>
    body {
        margin-top: 20px;
        background-color: #eee;
    }

    .card {
        box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: 1rem;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <h4 class="float-end font-size-15">Order Number : {{$orderNumber}}<span
                                class="badge bg-success font-size-12 ms-2">Paid</span></h4>
                        <div class="mb-4">
                            {{--                            TODO:dont forgot--}}
                            <h2 class="mb-1 text-muted">domainName</h2>
                        </div>
                        <div class="text-muted">
                            <p class="mb-1">Our Address : {{$sitecontent->address}}</p>
                            <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i>Our Email : {{$sitecontent->email}}
                            </p>
                            <p><i class="uil uil-phone me-1"></i>Our Phone Number : {{$sitecontent->phone_number}}</p>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-muted">
                                <h5 class="font-size-16 mb-3">Billed To:</h5>
                                <h5 class="font-size-15 mb-2">{{$deliveryDetails['first_name']}}</h5>
                                <p class="mb-1">Country : {{$deliveryDetails['country']}}</p>
                                <p class="mb-1">City : {{$deliveryDetails['city']}}</p>
                                <p class="mb-1">Street : {{$deliveryDetails['street']}}</p>
                                <p class="mb-1">House Number : {{$deliveryDetails['house_number']}}</p>
                                <p class="mb-1">Door Number : {{$deliveryDetails['door_number']}} </p>
                                <p class="mb-1">Post Code : {{$deliveryDetails['post_code']}}</p>
                                <p class="mb-1">Email : {{$deliveryDetails['email']}}</p>
                                <p class="mb-1">Phone Number : {{$deliveryDetails['phone_number']}}</p>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-6">
                            <div class="text-muted text-sm-end">
                                <div>
                                    <h5 class="font-size-15 mb-1">Invoice No:</h5>
                                    <p>{{$orderNumber}}</p>
                                </div>
                                <div class="mt-4">
                                    <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                    <p>{{date("Y-m-d")}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="py-2">
                        <h5 class="font-size-15">Order Summary</h5>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-centered mb-0">
                                <thead>
                                <tr>
                                    <th style="width: 70px;">No.</th>
                                    <th>Item</th>
                                    <th>Price</th>
                                </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                @foreach($books as $book)
                                    <tr>
                                        <th scope="row">{{$loop->index + 1}}</th>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-14 mb-1">Book Name
                                                    : {{$book->name}}</h5>
                                                <p class="text-muted mb-0">Author Name : {{$book->author_name}}</p>
                                            </div>
                                        </td>
                                        <td>€ {{$book->price}}</td>
                                    </tr>
                                @endforeach
                                <!-- end tr -->
                                <tr>
                                    <th scope="row" colspan="4" class="text-end">Sub Total</th>
                                    <td class="text-end">€{{$totalPrice}}</td>
                                </tr>
                                <!-- end tr -->
                                <tr>
                                    <th scope="row" colspan="4" class="border-0 text-end">
                                        Shipping Charge :
                                    </th>
                                    <td class="border-0 text-end">€ {{$shippingCost ?? '0'}}</td>
                                </tr>
                                <!-- end tr -->
                                <tr>
                                    <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                    <td class="border-0 text-end"><h4 class="m-0 fw-semibold">
                                            € {{$totalPrice + $shippingCost}}</h4></td>
                                </tr>
                                <!-- end tr -->
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div><!-- end table responsive -->
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
</body>
</html>

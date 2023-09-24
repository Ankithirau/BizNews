<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark-subtle">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Interview Task</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('product.show')}}">Product</a>
              </li>
            </ul>
            <span class="navbar-text fs-5">
              <i class="fa fa-cart-plus" aria-hidden="true"></i> &nbsp;
              @if (Session::has('cart'))
                <a href="{{route('cart.checkout')}}" target="_self" rel="noopener noreferrer" class="text-decoration-none">
                  @php
                      echo '( '.count(Session::get('cart')).' )';
                  @endphp
                </a>
              @else
                ( 0 )
              @endif
            </span>
          </div>
        </div>
      </nav>
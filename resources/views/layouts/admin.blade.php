<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@section('title') - Geek! @show</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>
    
<x-admin.header></x-admin.header>

<div class="container-fluid">
  <div class="row">

    <x-admin.sidebar></x-admin.sidebar>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      @yield('content')

    </main>
  </div>
</div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

  </body>
</html>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('kaz/css/learn.css') }}">
    <link rel="stylesheet" href="{{ asset('kaz/css/ads2.css') }}">
    <script src="{{ asset('kaz/js/bootstrap.js') }}"></script>
    <script src="{{ asset('kaz/js/ads.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('kaz/css1/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('kaz/css1/fontawesome.min.css') }}">
    <style>

    </style>
  </head>

    <body>

            @include('admin.body.header')

            <div class="main">

         @include('admin.body.sidebar')

         <div class="content">

         @yield('admin')

        </div>

            </div>


   @include('admin.body.mobile')

    </body>

</html>

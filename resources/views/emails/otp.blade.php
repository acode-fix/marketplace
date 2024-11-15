
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('kaz/css/bootstrap.css')}}">
  <title>OTP</title>
</head>
<body>


  <div class="container mt-5">
    <img class="d-block mx-auto" style="width: 150px" src="{{ asset('innocent/assets/image/transparent_logo.png') }}" alt="">
    <div class="card mt-2">
        <div class="card-header bg-success text-white text-center">OTP</div>
        <div class="card-body">

            <p class="fs-4">Your OTP for password reset is: {{ $otp }}</p>

        </div>
    </div>
  </div>
  
</body>
</html>

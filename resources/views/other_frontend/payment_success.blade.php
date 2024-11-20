<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
  <link rel="icon" href="{{ asset('innocent/assets/image/brand-icon.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/success.css') }}">
  <link rel="stylesheet" href="{{ asset('innocent/assets/css/preloader.css')}}">
  <style>


  </style>
</head>

<body>
  
  <div class="preloader">
    <div class="preloader-content">
      <img  src="{{ asset('innocent/assets/image/brand-icon.png') }}" class="bag-icon" alt="Bag Icon">
      <div class="dots">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
      </div>
    </div>
</div>
  <div class="header">
    <div>
    
      <a href="{{ url('/') }}"><img style="width:150px" src="{{ asset('/kaz/images/transparent_logo.png') }}"  class="img-fluid ms-3" alt=""></a>
      
    </div>
    <div>
      <h6 class="me-4 mt-2">Become a verified seller</h6>
    </div>
  </div>

  <div class="scroll-text">
    <div class="badge-top">
      @if(session('error'))
      <h6 style="margin-top: 40px;" class="fw-bold text-danger fs-2">Error!</h6>
      <div class="container">
        <div class="alert alert-danger mt-5">

          {{ session('error') }}

        </div>

      </div>
        
      @endif

      @if(session('message')) 
      <div class="container">
        <img src="{{ asset('/kaz/images/success.svg') }}" alt="">
        <div class="alert alert-success mt-5">
          {{ session('message') }}
      </div>
      </div>
     
      <h6 style="margin-top: 40px;" class="fw-bold ">Successful!</h6>
      <p class="fw-light approval-text mt-4">Your Payment has been Successful<br>
        Awaiting  Admin Approval normally <br>
        may take up to 1hrs during business days <br>and up to 3hrs during off business days </p>
       @endif 
    </div>
    

    

  </div>
  <script src="{{ asset('innocent/assets/js/preloader.js') }}"></script> 
</body>

</html>

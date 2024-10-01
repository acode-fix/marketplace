<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/success.css') }}">
  <style>

  </style>
</head>

<body>
  <div class="header">
    <div>
    
      <a href="{{ url('/') }}"><img style="width:150px" src="kaz/images/main logo.svg"  class="img-fluid" alt=""></a>
      
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
        <img src="kaz/images/success.svg" alt="">
        <div class="alert alert-success mt-5">
          {{ session('message') }}
      </div>
      </div>
     
      <h6 style="margin-top: 40px;" class="fw-bold ">Successful!</h6>
      <p class="fw-light approval-text mt-4 fs-4">Your Payment has been Successful<br>
        Awaiting  Admin Approval normally <br>
        may take up to 1hrs during business days <br>and up to 3hrs during off business days </p>
      @endif
    </div>
    

    

  </div>
</body>

</html>

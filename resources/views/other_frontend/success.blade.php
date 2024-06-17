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
      <a href="{{ url('/badge') }}"> <img class="arrow ms-2" src="kaz/images/Arrow.png" alt=""></a>

    </div>
    <div>
      <h6 class="me-4 mt-2">Become a verified seller</h6>
    </div>
  </div>
  <div class="scroll-text">
    <div class="badge-top">
      <img src="kaz/images/success.svg" alt="">
      <h6 style="margin-top: 40px;" class="fw-bold ">Successful!</h6>
      <p class="fw-light approval-text mt-4">Your document has been uploded.<br>
        Awaiting Approval normally approval <br>
        may take up to 1hrs during business days <br>and up to 3hrs during off business days </p>

    </div>

  </div>
  <!-- <a href="success.html">
    <button  type="button" class="btn btn-warning next-btn">Next</button>
  </a> -->


</body>

</html>

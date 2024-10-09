<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/success.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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

        <button  id="proceedBtn" type="button" class="btn btn-md btn-success js-btn">Proceed To Make Payment</button>

    </div>
    

  </div>
  

  <script type="module" src="{{ asset('backend-js/user/success.js') }}"></script>
</body>

</html>

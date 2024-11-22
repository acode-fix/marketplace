<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Success</title>
  <link rel="icon" href="{{ asset('innocent/assets/image/brand-icon.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/success.css') }}">
  <link rel="stylesheet" href="{{ asset('innocent/assets/css/preloader.css')}}">
  <script src="{{ asset('innocent/assets/js/preloader.js') }}"></script> 
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <style>
    
  .loader {
  border: 6px solid #f3f3f3; 
  border-top: 6px solid #ffb705;; 
  border-radius: 50%;
  width: 20px;
  height: 20px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.loader-layout {
  display: none;  
  align-items: center;
  justify-content: center;
}


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
      <a href="{{ url('/badge') }}"> <img class="arrow ms-2" src="{{ asset('/kaz/images/Arrow.png') }}" alt=""></a>

    </div>
    <div>
      <h6 class="me-4 mt-2">Become a verified seller</h6>
    </div>
  </div>
  <div class="scroll-text">
    <div class="badge-top">
      <img src="{{ asset('/kaz/images/success.svg') }}" alt="">
      <h6 style="margin-top: 40px;" class="fw-bold ">Successful!</h6>
      <p class="fw-light approval-text mt-4">Your document has been uploded.<br>
        Awaiting Approval normally approval <br>
        may take up to 1hrs during business days <br>and up to 3hrs during off business days </p>

        <button  id="proceedBtn" type="button" class="btn btn-md btn-success js-btn success-btn">

          <span class="bio-text">Proceed To Make Payment</span>
            <div class="loader-layout">
                <div class=" loader"></div>
                <span class="ms-1">Loading...</span>
           </div>


        </button>

    </div>
    

  </div>
  

  <script type="module" src="{{ asset('backend-js/user/success.js') }}"></script>
  
</body>

</html>

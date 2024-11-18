<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Badge</title>
  <link rel="icon" href="{{ asset('innocent/assets/image/brand-icon.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/badge.css') }}">
  <script src="{{ asset('kaz/js/badge.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
      <a href="{{ url('/selfie') }}"> <img class="arrow ms-2" src="{{ asset('/kaz/images/Arrow.png') }}" alt=""></a>

    </div>
    <div>
      <h6 class="me-4 mt-2">Become a verified seller</h6>
    </div>
  </div>
  <div class="scroll-text">
    <div class="container main">
      <div class="vetted-div js-content">
        {{-- <div style="margin-top: -30px;">
          <img class="img-fluid dp ms-3" width="60px" src="{{ asset('/kaz/images/dp.png') }}" alt="">
          <div class="vetted">
            <img  width="20px" height="20px" src="{{ asset('/kaz/images/badge.png') }}" alt="">
          </div>
        </div>
        <div class="ms-4  augustine1">
          <div style="display: flex; align-items: start;">
            <h5 class="modal-mire">Mired Augustine </h5>
            <img class="ms-2" src="{{ asset('/kaz/images/badge.png') }}" alt="">
          </div>
          <h6 class="modal-augustine" style="margin-top: -10px;">miredaugustine@gmail.com</h6>
          <h6 class="vetted-seller pt-2 fw-bold">vetted seller badge</h6>
        </div>

        <div class="augustine2">
          <div style="display: flex; align-items: start;">
            <h5 class="modal-mire">Mired Augustine </h5>
             <img class="ms-2" src="{{ asset('/kaz/images/badge.png') }}" alt=""> 
          </div>
          <h6 class="modal-augustine" style="margin-top: -10px;">miredaugustine@gmail.com</h6>
          <h6 class="vetted-seller pt-2 fw-bold">vetted seller badge</h6>
        </div> --}}


      </div>
      <div class="mt-4 container first ">
        <!-- <h6 class="fw-bold">Monthly</h6> -->
        <form id="form1" action="">

          <div class="month" onclick="selectPlan('month')">
            <h6 class="fw-bold">Monthly</h6>
            <div class="layout">
              <p class="badge-text">Your badge cost #2500 per month to stay <br>
                active on your profile </p>
              <input class="form-check-input me-5 " type="radio" name="badge_type" id="flexRadioDefault1" value="monthly">
            </div>
          </div>
          <div class="year" onclick="selectPlan('year')">
            <h6 class="fw-bold">Yearly</h6>
            <div class="layout">
              <p class="badge-text"> Your badge cost #20,000 and save 33% <br>
                per year to stay active on your profile</p>
              <input class="form-check-input me-5 " type="radio" name="badge_type" id="flexRadioDefault2" value="yearly">
            </div>
          </div>
          <span class="error"></span>

        </form>

      </div>  
     
      <div class="container">
        <h6 class="mt-4 ms-2 fw-bold">Remember the benefits</h6>
        <ol class="modal-benefits ">
          <li>Enhanced trust and credibility with potential buyers.</li>
          <li>Increased visibility in search results and featured listings.</li>
          <li>Improved conversion rates by reassuring buyers.</li>
          <li>Reduced risk of fraud and perception as scam.</li>
          <li>Access to excusive feautures and promotional opportunities.</li>
          <li>Competitive advantage over unverified sellers.</li>
          <li>long-term reputation building and potential for repeat business.</li>
        </ol>
      </div>

    </div>
    <div class="container">
      <a href="">
        <button type="button" class="btn btn-warning next-btn btn-lg mt-5">Next</button>
      </a>

    </div>
   


  </div>

  <script type="module" src="{{ asset('backend-js/user/badge.js') }}"></script>
  <script src="{{ asset('innocent/assets/js/preloader.js') }}"></script> 
</body>

</html>

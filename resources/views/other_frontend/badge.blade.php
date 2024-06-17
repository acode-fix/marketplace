<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/badge.css') }}">
  <script src="{{ asset('kaz/js/badge.js') }}"></script>
  <style>



  </style>
</head>

<body>
  <div class="header">
    <div>
      <a href="{{ url('/id') }}"> <img class="arrow ms-2" src="kaz/images/Arrow.png" alt=""></a>

    </div>
    <div>
      <h6 class="me-4 mt-2">Become a verified seller</h6>
    </div>
  </div>
  <div class="scroll-text">
    <div class="container main">
      <div class="vetted-div">
        <div style="margin-top: -30px;">
          <img class="img-fluid dp ms-3" width="60px" src="kaz/images/dp.png" alt="">
          <div class="vetted">
            <img width="20px" height="20px" src="kaz/images/badge.png" alt="">
          </div>
        </div>
        <div class="ms-4  augustine1">
          <div style="display: flex; align-items: start;">
            <h5 class="modal-mire">Mired Augustine </h5>
            <img class=" ms-2 " src="kaz/images/badge.png" alt="">
          </div>
          <h6 class="modal-augustine" style="margin-top: -10px;">miredaugustine@gmail.com</h6>
          <h6 class="vetted-seller pt-2 fw-bold">vetted seller badge</h6>
        </div>

        <div class="augustine2">
          <div style="display: flex; align-items: start;">
            <h5 class="modal-mire">Mired Augustine </h5>
            <img class="ms-2 " src="kaz/images/vetted.svg" alt="">
          </div>
          <h6 class="modal-augustine" style="margin-top: -10px;">miredaugustine@gmail.com</h6>
          <h6 class="vetted-seller pt-2 fw-bold">vetted seller badge</h6>
        </div>




      </div>
      <div class="mt-4 container first ">
        <!-- <h6 class="fw-bold">Monthly</h6> -->
        <form action="">
          <div class="month" onclick="selectPlan('month')">
            <h6 class="fw-bold">Monthly</h6>
            <div class="layout">
              <p class="badge-text">Your badge cost #2500 per month to stay <br>
                active on your profile </p>
              <input class="form-check-input me-5 " type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            </div>
          </div>
          <div class="year" onclick="selectPlan('year')">
            <h6 class="fw-bold">Yearly</h6>
            <div class="layout">
              <p class="badge-text"> Your badge cost #20,000 and save 33% <br>
                per year to stay active on your profile</p>
              <input class="form-check-input me-5 " type="radio" name="flexRadioDefault" id="flexRadioDefault2">
            </div>
          </div>

        </form>

      </div>
      <div class="mt-4 container second ">
        <!-- <h6 class="fw-bold">Monthly</h6> -->
        <form action="">
          <div class="month2" onclick="selectPlan2('month2')">
            <h6 class="fw-bold">Monthly</h6>
            <div class="layout">
              <p class="badge-text">Your badge cost #2500 per month to stay
                active on your profile </p>
              <input class="form-check-input me-5  radio-btn" type="radio" name="flexRadioDefault"
                id="flexRadioDefault13">
            </div>
          </div>
          <div class="year2" onclick="selectPlan2('year2')">
            <h6 class="fw-bold">Yearly</h6>
            <div class="layout">
              <p class="badge-text"> Your badge cost #20,000 and save 33%
                per year to stay active on your profile </p>
              <input class="form-check-input  me-5" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
            </div>
          </div>

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
    <a href="{{ url('/success') }}">
      <button type="button" class="btn btn-warning next-btn btn-lg">Next</button>
    </a>


  </div>
  <script>
  </script>
</body>

</html>

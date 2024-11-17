<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bio</title>
  <link rel="icon" href="{{ asset('innocent/assets/image/brand-icon.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/bio.css') }}">
  <link rel="stylesheet" href="{{ asset('innocent/assets/css/preloader.css')}}">
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  
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
      <a href="{{ url('/become') }}"> <img class="arrow ms-2" src="{{ asset('/kaz/images/Arrow.png') }}" alt=""></a>

    </div>
    <div>
      <h6 class="me-4 mt-2">Become a verified seller</h6>
    </div>
  </div>
  <div class="scroll-text">
    <div class="main">
      <h5 class="fw-bold">Your Bio</h5>
      <h6 class="fw-light"> It's crucial to verify the credibility <br> and legitmacy of our sellers.</h6>
    </div>
    <div class="container">
      <form id="mobile-bio-form">
        <div class="col mt-4 ms-3 me-3">
          <label for="inputEmail4" class="form-label fw-bold">Email</label>
          <input oninput="hideIcon(this)" id="search-modal" name ="email" type="text" class="form-control email"
            placeholder="Enter your email here">
            <span class="error" id="email_error"></span>
        </div>
        <div class="col mt-2  ms-3 me-3">
          <label for="name" class="form-label fw-bold">Fullname</label>
          <input oninput="hideIcon(this)" id="search-modal1" type="text" class="form-control name"
            placeholder="Your legal Name" name="name">
            <span class="error" id="name_error"></span>
        </div>
        <div class="col mt-3  ms-3 me-3">
          <div>
            <label for="address" class="form-label fw-bold">Gender</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
            <label class="form-check-label" for="inlineRadio1">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
            <label class="form-check-label" for="inlineRadio2">Female</label>
          </div>
          <span class="error" id="gender_error"></span>
        </div>
        <div class="col mt-3  ms-3 me-3">
          <label for="inputState" class="form-label fw-bold">Nationality</label>
          <select name="nationality" id="inputstate" class="form-select nationality">
            <option selected value= "">Choose...   </option>
            <option value="nigeria">Nigeria</option>
            <option value="others">Others</option>
          </select>
          <span class="error" id="nationality_error"></span>
        </div>
        <div class="col mt-3  ms-3 me-3">
          <label for="phonenumber" class="form-label fw-bold">Phone Number</label>
          <input oninput="hideIcon(this)" id="search-modal3" type="text" class="form-control phone"
            placeholder="Enter Your Contact Phone Number" name="phone_number">
            <span class="error" id="phone_error"></span>
        </div>
        <div class="col mt-3  ms-3 me-3">
          <label for="address" class="form-label fw-bold">Address</label>
          <input oninput="hideIcon(this)" id="search-modal2" type="text" class="form-control address"
            placeholder="Enter your work Address" name="address">
            <span class="error" id="address_error"></span>
        </div>


        <a href="{{ url('/nin') }}">
          <button type="button" class="btn btn-warning next-btn btn-lg mt-5">Next</button>
        </a>
      </form>
    </div>

  </div>





  <script>
    function hideIcon(self) {
      self.style.backgroundImage = 'none';
    }

  </script>
  <script type="module" src="{{ asset('backend-js/user/bio.js') }}"></script>
  <script src="{{ asset('innocent/assets/js/preloader.js') }}"></script>
</body>

</html>

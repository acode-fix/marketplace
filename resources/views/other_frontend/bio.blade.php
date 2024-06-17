<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/bio.css') }}">
  <style>


  </style>

</head>

<body>
  <div class="header">
    <div>
      <a href="{{ url('/become') }}"> <img class="arrow ms-2" src="kaz/images/Arrow.png" alt=""></a>

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
      <form action="">
        <div class="col mt-4 ms-3 me-3">
          <label for="inputEmail4" class="form-label fw-bold">Email</label>
          <input oninput="hideIcon(this)" id="search-modal" type="text" class="form-control"
            placeholder="Ceredesign@gmail.com">
        </div>
        <div class="col mt-2  ms-3 me-3">
          <label for="name" class="form-label fw-bold">Name</label>
          <input oninput="hideIcon(this)" id="search-modal1" type="text" class="form-control"
            placeholder="Your legal Name">
        </div>
        <div class="col mt-3  ms-3 me-3">
          <div>
            <label for="address" class="form-label fw-bold">Gender</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">Female</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
            <label class="form-check-label" for="inlineRadio3">Others</label>
          </div>
        </div>
        <div class="col mt-3  ms-3 me-3">
          <label for="inputState" class="form-label fw-bold">Nationality</label>
          <select id="inputstate" class="form-select">
            <option>Choose...</option>
            <option>Nigeria</option>
            <option> Germany</option>
          </select>
        </div>
        <div class="col mt-3  ms-3 me-3">
          <label for="phonenumber" class="form-label fw-bold">Phone Number</label>
          <input oninput="hideIcon(this)" id="search-modal3" type="text" class="form-control"
            placeholder="Enter Your Contact Phone Number">
        </div>
        <div class="col mt-3  ms-3 me-3">
          <label for="address" class="form-label fw-bold">Address</label>
          <input oninput="hideIcon(this)" id="search-modal2" type="text" class="form-control"
            placeholder="Enter your work Address">
        </div>


        <a href="{{ url('/nin') }}">
          <button type="button" class="btn btn-warning next-btn btn-lg">Next</button>
        </a>
      </form>
    </div>

  </div>





  <script>
    function hideIcon(self) {
      self.style.backgroundImage = 'none';
    }

  </script>
</body>

</html>

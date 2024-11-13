<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/id.css') }}">
  <link rel="stylesheet" href="{{ asset('innocent/assets/css/preloader.css')}}">
  <script src="{{ asset('kaz/js/id.js') }}"></script>
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
      <a href="{{ url('/nin') }}"> <img class="arrow ms-2" src="{{ asset('/kaz/images/Arrow.png') }}" alt=""></a>

    </div>
    <div>
      <h6 class="me-4 mt-2">Become a verified seller</h6>
    </div>
  </div>
  <div class="scroll-text">
    <div class="main ">
      <form action="">
        <div class="  selfie1 mx-auto mt-5">
          <div class="video-contain" id="video-container">
            <video id="video" autoplay></video>
          </div>
          <div class="canvas-contain" id="canvas-container">
            <canvas class="main-canvas" id="canvas"></canvas>
          </div>
        </div>
        <div class="top-cam">
          <!-- <img  id="upload"   src="/kaz/images/selfie.svg" alt=""> -->
          <div class="cam-main">
            <label id="use-camera" class="container ">
              <h6>Click here to Scan Your ID</h6>
              <h6 class="fw-light mt-2"> Please ensure all your face within the border of the scanner</h6>

            </label>
            <button style="display: none;" id="snap" type="button" class=" btn btn-success btn-lg  ">Snap</button>

          </div>

        </div>
        <div class="mt-3" style="text-align: center;">
          <button style="display: none;" id="retake-button" type="button"
            class=" btn btn-success btn-lg  ">Retake</button>
          <button style="display: none;" id="save-button" type="button" class=" btn btn-success btn-lg  ">Save</button>
        </div>

      </form>

    </div>

    <a href="{{ url('/selfie') }}">
      <button type="button" class="btn btn-warning next-btn btn-lg">Next</button>
    </a>

  </div>

  <script src="{{ asset('innocent/assets/js/preloader.js') }}"></script>

</body>

</html>

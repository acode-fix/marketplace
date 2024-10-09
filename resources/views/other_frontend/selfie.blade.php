<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/selfie.css') }}">
  <script src="{{ asset('kaz/js/camera.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <style>
  </style>
</head>

<body>
  <div class="header">
    <div>
      <a href="{{ url('/nin') }}"> <img class="arrow ms-2" src="kaz/images/Arrow.png" alt=""></a>

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
            <canvas class="selfie-canvas" id="canvas"></canvas>
          </div>
        </div>
        <div class="top-cam">
          <div class="cam-main">
            <label id="use-camera" class="container">
              <h6>Click Here To Take a Selfie</h6>
              <h6 class="fw-light mt-2"> Please ensure all your face within the border of the scanner</h6>
              <span id="error"></span>

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

    <a href="{{ url('/badge') }}">
      <button type="button" class="btn btn-warning next-btn btn-lg">Next</button>
    </a>

  </div>



  <script type="module" src="{{ asset('backend-js/user/selfie.js') }}"></script> 
</body>

</html>

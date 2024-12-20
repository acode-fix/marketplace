<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Selfie</title>
  <link rel="icon" href="{{ asset('innocent/assets/image/favicon.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/selfie.css') }}">
  <link rel="stylesheet" href="{{ asset('innocent/assets/css/preloader.css')}}">
  <script src="{{ asset('kaz/js/camera.js') }}"></script>
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
            <canvas class="selfie-canvas" id="canvas"></canvas>
          </div>
        </div>
        <div class="top-cam">
          <div class="cam-main">
            <label id="use-camera" class="container">
              <h6 class="text-success">Click Here To Take a Selfie</h6>
              <h6 class="fw-light mt-2"> Please ensure all your face within the border of the scanner</h6>
              <span id="error"></span>

            </label>
            <button style="display: none;" id="snap" type="button" class=" btn btn-success btn-lg  ">Snap</button>

          </div>

        </div>
        <div class="mt-3" style="text-align: center;">
          <button style="display: none;" id="retake-button" type="button"
            class=" btn btn-success btn-lg  ">Retake</button>
          <button style="display: none;" id="save-button" type="button" class=" btn btn-success btn-lg selfie-btn">
            <span class="bio-text">Save</span>
            <div class="loader-layout">
                <div class=" loader"></div>
                <span class="ms-1">Loading...</span>
           </div>


          </button>
        </div>

      </form>
    </div>

    <a href="{{ url('/badge') }}">
      <button type="button" class="btn btn-warning next-btn btn-lg">Next</button>
    </a>

  </div>



  <script type="module" src="{{ asset('backend-js/user/selfie.js') }}"></script> 
  <script src="{{ asset('innocent/assets/js/preloader.js') }}"></script> 
</body>

</html>

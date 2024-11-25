<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NIN</title>
  <link rel="icon" href="{{ asset('innocent/assets/image/favicon.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/nin.css') }}">
  <script src="{{ asset('kaz/js/nin.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('innocent/assets/css/preloader.css')}}">
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
      <a href="{{ url('/bio') }}"> <img class="arrow ms-2" src="{{ asset('/kaz/images/Arrow.png') }}" alt=""></a>

    </div>
    <div>
      <h6 class="me-4 mt-2">Become a verified seller</h6>
    </div>
  </div>
  <div class="scroll-text">
    <div class="bg-warning main mt-5">
      <div class="vid-con" id="video-container">
        <video id="video" autoplay></video>
      </div>
      <div class="canvas-con " id="canvas-container">
        <canvas class="canvas-main" id="canvas"></canvas>
      </div>
      <div class="mt-1 below" id="below-section" style="text-align: center;">
        <h2 class="fw-light nin-text">NIN</h2>
        <p>Kind Upload Your National <br>Identification Card </p>
        <span id="error"></span>
        <form id="mobile-nin">
          <input type="file" name="nin_file" id="actual-btn" class="mobile-file" hidden>
          <label for="actual-btn"><img id="upload" class="mt-4 mb-5" src="{{asset('/kaz/images/Nin upload.svg')}}" alt=""></label>
        </form>
      </div>
    </div>
    {{-- <form action="">
      <div class="first-struct">
        <div class="cam-struct">
          <label id="use-camera" class="label">Use Camera</label>
          <button style="display: none;" id="snap" type="button" class=" btn btn-success btn-lg  ">Snap</button>
        </div>

      </div>
      <div class="mt-3 tc">
        <button style="display: none;" id="retake-button" type="button"
          class=" btn btn-success btn-lg  ">Retake</button>
        <button style="display: none;" id="save-button" type="button" class=" btn btn-success btn-lg ">Save</button>
      </div>
    </form> --}}


    <div class="tc">
      <h6 class="sign mt-4"><span>or</span></h6>
    </div>
    <div class="mt-4 tc">
      <form >
        <input  type="file" name="" id="imgInp2" hidden>
        <label class="label2" for="actual-btn">Select the document from Gallery <br>
          <span class="png-text fw-light">Png, jpeg, pdf</span></label>
      </form>
    </div>
  </div>

  <div class="container">
    <div class="row mx-auto">
      <div class="col text-center">
        <a class="" href="">
          <button type="button" class="btn btn-warning next-btn btn-lg nin-btn">
            <span class="bio-text">Next</span>
              <div class="loader-layout">
                  <div class=" loader"></div>
                  <span class="ms-1">Loading...</span>
              </div>


          </button>
        </a>
  
      </div>
    </div>

  </div>
 
 

   <script type="module" src="{{ asset('backend-js/user/nin.js') }}"></script>
   <script src="{{ asset('innocent/assets/js/preloader.js') }}"></script> 
</body>

</html>

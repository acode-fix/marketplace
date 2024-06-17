<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/nin.css') }}">
  <script src="{{ asset('kaz/js/nin.js') }}"></script>
  <style>


  </style>
</head>

<body>
  <div class="header">
    <div>
      <a href="{{ url('/bio') }}"> <img class="arrow ms-2" src="kaz/images/Arrow.png" alt=""></a>

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
        <form action="">
          <input type="file" name="" id="actual-btn" hidden>
          <label for="actual-btn"><img id="upload" class="mt-4 mb-5" src="kaz/images/Nin uploadw.svg" alt=""></label>
        </form>
      </div>
    </div>
    <form action="">
      <div class="first-struct">
        <div class="cam-struct">
          <label id="use-camera" class="label">Use Camera</label>
          <button style="display: none;" id="snap" type="button" class=" btn btn-success btn-lg  ">Snap</button>
        </div>

      </div>
      <div class="mt-3 tc">
        <button style="display: none;" id="retake-button" type="button"
          class=" btn btn-success btn-lg  ">Retake</button>
        <button style="display: none;" id="save-button" type="button" class=" btn btn-success btn-lg  ">Save</button>
      </div>
    </form>


    <div class="tc">
      <h6 class="sign mt-4"><span>or</span></h6>
    </div>
    <div class="mt-4 tc">
      <form action="">
        <input type="file" name="" id="imgInp2" hidden>
        <label class="label2" for="actual-btn">Select the document from Gallery <br>
          <span class="png-text fw-light">Png, jpeg, pdf</span></label>
      </form>
    </div>

    <a href="{{ url('/id') }}">
      <button type="button" class="btn btn-warning next-btn btn-lg">Next</button>
    </a>
  </div>


</body>

</html>

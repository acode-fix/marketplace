<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('innocent/assets/css/ads_placement.css') }}">
  <link rel="stylesheet" href="{{ asset('innocent/assets/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('innocent/assets/css/animation.css') }}">
  <link rel="stylesheet" href="{{ asset('innocent/assets/css/alert.css') }}">
  <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/fontawesome.min.css') }}">
  <!-- <link rel="stylesheet" href="kaz/css/bootstrap.css"> -->
  <link rel="stylesheet" href="{{ asset('kaz/css/navbar.css') }}">
  <!-- <link rel="stylesheet" href="kaz/css/privacy.css"> -->
  <!-- <script src="kaz/js/privacy.js"></script>
  <script src="kaz/js/bootstrap.js"></script>  -->

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <!-- Include SweetAlert CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

  <style>




  </style>

</head>

<body>
  <div class="header-section">
    <div class="arrow-div">
      <a href="{{ url('/') }}"><img class="arrow" src="kaz/images/Arrow.png" alt=""></a>
      <h6 style="font-size: 20px;" class="fw-light ms-4">Privacy Policy</h6>
    </div>
    <div class="left-section">
      <a href="{{ url('/') }}"><img class="img-fluid ms-3" src="kaz/images/logo.png" alt=""></a>
      <h6 class="ms-5 fw-bold profile">Privacy Policy</h6>
    </div>

    <!-- <div class="middle-section">
      <div class="search-border">
        <input type="search" id="search" placeholder="&nbsp Search product...">
        <button  class="search-btn btn-light mt-1 pt-1 pb-2 me-1"  ><img src="Marketplace2/Search.png" class="img-fluid search-img" alt=""> search</button>
      </div>

    </div> -->
    <!-- <div class="create">
      <button   type="button" class=" btn btn-warning  btn-height"> + create Ads</button>
    </div>  -->
    <div class="right-section me-4">
      <button type="button" class=" btn btn-warning   me-5"> + create Ads</button>
      <div class="me-1">
        <h6 class="name">Mired Augustine </h6>
        <h6 class="mired-text fw-light">miredaugustine@gmail.com</h6>
      </div>
      <img class="img-fluid profile-picture" src="kaz/images/dp.png" alt="">
    </div>
    <div class="menu-toggle">
      <input type="checkbox" id="menu-checkbox" class="menu-checkbox">
      <label for="menu-checkbox" class="menu-btn">&#9776;</label>
      <div class="menu-overlay"></div>
      <ul class="menu">
        <li><a href="{{ url('/settings') }}">Dashboard</a></li>
        <li><a href="{{ url('/refer') }}">Refer a Friend</a></li>
        <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
        <li><a href="#">Log Out</a></li>
        <hr style="background-color: black; width: 70%;">
        <li><a style="color: #ff0000;" href="{{ url('/delete') }}">Delete Account</a></li>
      </ul>
    </div>
  </div>
  <div class="main">
    <div class="side-bar ">
      <div class="sidebar-link">
        <div class="links myLink">
          <span>
            <img class="profile-logo svg-size" src="kaz/images/profile.svg" alt="">
            <a class="profile-text" href="{{ url('/shop') }}">Shop</a>
          </span>
        </div>
      </div>
      <div class="sidebar-link">
        <div class="links myLink">
          <span>
            <img class="profile-logo svg-size" src="kaz/images/product.svg" alt="">
            <a class="profile-text" href="{{ url('/settings') }}">Settings`</a>
          </span>
        </div>
      </div>
      <div class="sidebar-link">
        <div class="links myLink">
          <span>
            <img class="profile-logo svg-size" src="kaz/images/learn.svg" alt="">
            <a class="profile-text" href="{{ url('/learn') }}">Learn</a>
          </span>
        </div>
      </div>
      <div class="sidebar-link">
        <div class="links myLink">
          <span>
            <img class="profile-logo " height="20px" width="17px" src="kaz/images/ads.svg" alt="">
            <a class="profile-text ms-3" href="{{ url('/ads') }}">Ads</a>
          </span>
        </div>
      </div>
      <div class="sidebar-link">
        <div class="links myLink">
          <span>
            <img class="profile-logo " height="20px" width="17px" src="kaz/images/wallet.svg" alt="">
            <a class="profile-text ms-3" href="{{ url('/wallet') }}">wallet</a>
          </span>
        </div>

      </div>
      <hr style="color: black;">
      <div class="sidebar-link">
        <div class="links myLink6">
          <span>
            <img class="profile-logo svg-size" src="kaz/images/privacy policy.svg" alt="">
            <a style="color: #1a2b88;" class="profile-text" href="{{ url('/privacy') }}">privacy policy</a>
          </span>
        </div>
      </div>
      <div class="sidebar-link">
        <div class="links myLink">
          <span>
            <img class="profile-logo svg-size" src="kaz/images/refer friends.svg" alt="">
            <a class="profile-text" href="{{ url('/refer') }}">Refer Friends</a>
          </span>
        </div>
      </div>
      <div class="sidebar-link">
        <div class="links myLink">
          <span>
            <img class="profile-logo svg-size1" src="kaz/images/delete.svg" alt="">
            <a class="profile-text" href="{{ url('/delete') }}">Delete Account</a>
          </span>
        </div>
      </div>
      <div class="sidebar-link">
        <div class="row mt-5 footer">
          <div style="text-align: center;" class="col">
            <img height="35px" width="35px" src="kaz/images/facebook.png" alt="">
            <img height="30px" width="30px" src="kaz/images/twitter.png" alt="">
            <img height="29px" width="29px" src="kaz/images/whatsapp.png" alt="">
            <img height="30px" width="30px" src="kaz/images/message.png" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="main" id="main">
        <p class="choose_ads animate animate-left">Choose ads Placement <span id="span1">*</span><br>
          <span id="span2">this is where your ads will appear</span>
        </p>
        <p class="choose_ads_small_screen animate animate-left">Choose ads Placement <span id="span1">*</span><br>
          <span id="span2">this is where your ads will appear</span>
        </p>

        <div class="div_for_btn_to_choose_ads">

          <button class="btn_to_choose_ads radio-button checked btn1 animate" data-amount="1200"
            data-increase="1200">User Scroll View</button>
          <button class="btn_to_choose_ads radio-button animate" data-amount="1500" data-increase="1500">Home Page
            Banner</button>
        </div>



        <div class="upload_banner_img animate animate-pulse2">

          <p class="upload_banner_p" style>
            <img class="scroll_veiw" src="innocent/assets/image/scrollview.png" alt="">
            <img src="innocent/assets/image/banner view.png" alt="">
          </p>

        </div>

        <div>
          <p class="set_ads animate animate">set your duration<span id="span1">*</span><br>
            <span id="span2">you can set how many days you wannt to run the ads, <br>
              earn more point by runing ads each day</span>
          </p>

          <div class="set_ads_small_screen animate animate-right">
            <hr>
            set your duration<span id="span1">*</span><br>
            <span id="span2">you can set how many days you wannt to run the ads, <br>
              earn more point by runing ads each day</span>
          </div>
        </div>
        <div>
          <div id="daysDisplay">5 days</div>
          <div id="days_limit">can't choose less than 5 days</div>
          <input type="range" id="daysRange" min="1" max="30" value="5" oninput="updateDays(),adjustRange(this)">
        </div>

        <div class="ads_budgets">
          <p class="budget_summary">Budget Summary</p>

          <div class="ads_costs">
            <div id="amountDisplay">₦6,000</div>
            <div>Ads Cost</div>

          </div>

          <div class="extimate_reach">
            <div id="extimate_reach"> 6%</div>
            <div>Estimated Reach</div>

          </div>

          <div class="reward">
            <div id="reward_earn"> ₦300</div>
            <div>Point Earned</div>

          </div>

          <div class="vat_costs">
            <div id="vatDisplay"> ₦450</div>
            <div>Extimated Vat</div>

          </div>

          <div class="total_cost">
            <div id="total_display"> ₦6450</div>
            <div>Total</div>

          </div>


        </div>


        <div class="next_and_prev_buttons1">
          <button class="back_button1">back </button>
          <button class="next_button1" onclick="upload_asd()">next</button>
        </div>
      </div>



    </div>
    <!-- main2 the upload ads page -->

    <div id="main2">
      <div id="adsConfirmation" class="animate animate-top"></div>


      <input type="file" id="fileInput" accept="image/*" style="display: none;">
      <input type="file" id="fileInput2" accept="image/*" style="display: none;">


      <div id="user_scroll_view_upload">
        <p class="upload_both_veiws_descriptoin1 animate ">
          Upload Scroll View Design <span class="photo_discribtion_3"> 800px by 250px</span>
        </p>
        <div class="div_for_to_upload_ads">
          <p class="upload_both_veiws_descriptoin2 animate ">
            Upload Scroll View Design<span class="photo_discribtion_3"> 800px by 250px</span>
          </p>

          <div class="upload_for_both_veiws animate animate-pulse3" id="uploadButton">
            <img src="innocent/assets/image/upload.png" alt="Logo" class="upload_camera">
            <p class="photo_discribtion">maximum picture size: <span class="photo_discribtion_2">5mb</span><br>
              supported format: <span class="photo_discribtion_2">Jpg & Png</span>
            </p>
          </div>
        </div>


      </div>
      <br>

      <div id="home_page_banner_upload">

        <p class="upload_both_veiws_descriptoin1 animate ">
          Upload Your Banner View <span class="photo_discribtion_3 "> 800px by 250px</span>
        </p>
        <div class="div_for_to_upload_ads">
          <p class="upload_both_veiws_descriptoin2 animate ">
            Upload Your Banner View <span class="photo_discribtion_3"> 800px by 250px</span>
          </p>
          <div class="upload_for_both_veiws animate animate-pulse3" id="uploadButton2">
            <img src="innocent/assets/image/upload.png" alt="Logo" class="upload_camera">
            <p class="photo_discribtion">maximum picture size: <span class="photo_discribtion_2">5mb</span><br>
              supported format: <span class="photo_discribtion_2">Jpg & Png</span>
            </p>
          </div>
        </div>



      </div>
      <!--
  <div class="uploads">
      <p class="upload_preview">upload preview</p>
  </div> -->

      <div class="main_image_container">
        <div class="frame_container">
          <div style="display: block;">
            <div class="frame"></div>
            <p>Scroll-Veiw Preveiw</p>
          </div>

        </div>

        <div class="frame_container2">
          <div style="display: block;">
            <div class="frame2"></div>
            <p>Banner-Veiw Preveiw</p>
          </div>

        </div>
      </div>

      <div class="next_and_prev_buttons2">
        <button class="back_button2" onclick="upload_asd_back()">back </button>
        <button class="next_button2 animate">next</button>
      </div>


    </div>

<div class="modal fade" id="ads_upload_condition1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content alert_modal_content">

      <div class="modal-body alert_modal_body">
        <p>Please upload image of <span class="alert_main_message">800px * 250px</span>   or above.</p>
        <i class="fa-solid fa-close" data-bs-dismiss="modal" aria-label="Close"></i>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="ads_upload_condition2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content alert_modal_content">

      <div class="modal-body alert_modal_body">
        <p>Image size must be less than <span class="alert_main_message">5MB</span></p>
        <i class="fa-solid fa-close" data-bs-dismiss="modal" aria-label="Close"></i>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="ads_upload_condition3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content alert_modal_content">

      <div class="modal-body alert_modal_body">
        <p>Image must be <span class="alert_main_message">PNG or JPG</span></p>
        <i class="fa-solid fa-close" data-bs-dismiss="modal" aria-label="Close"></i>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="ads_upload_condition4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content alert_modal_content">

      <div class="modal-body alert_modal_body">
        <p>You can only upload <span class="alert_main_message">one</span> image</p>
        <i class="fa-solid fa-close" data-bs-dismiss="modal" aria-label="Close"></i>
      </div>

    </div>
  </div>
</div>






  </div>




  <script src="{{ asset('innocent/assets/js/ads_placement.js') }}"></script>
  <script src="{{ asset('innocent/assets/js/animation.js') }}"></script>
  <script src="{{ asset('innocent/assets/js/bootstrap.js') }}"></script>
</body>

</html>

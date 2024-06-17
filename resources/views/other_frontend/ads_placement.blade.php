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
</head>
<style>
</style>
<body style="background-color: whitesmoke;">



    <div class="main" id="main">
        <p class="choose_ads animate animate-left">Choose ads Placement <span id="span1">*</span><br>
            <span id="span2">this is where your ads will appear</span>
        </p>
        <p class="choose_ads_small_screen animate animate-left">Choose ads Placement <span id="span1">*</span><br>
            <span id="span2">this is where your ads will appear</span>
        </p>

        <div class="div_for_btn_to_choose_ads">

        <button class="btn_to_choose_ads radio-button checked btn1 animate" data-amount="1200" data-increase="1200">User Scroll View</button>
        <button class="btn_to_choose_ads radio-button animate" data-amount="1500" data-increase="1500">Home Page Banner</button>
        </div>



        <div class="upload_banner_img animate animate-pulse2">

            <p class="upload_banner_p" style>
                <img class="scroll_veiw" src="{{ asset('innocent/assets/image/scrollview.png') }}" alt=""  >
                <img src="{{ asset('innocent/assets/image/banner view.png') }}" alt="">
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
            <div id="days_limit" >can't choose less than 5 days</div>
            <input type="range" id="daysRange" min="1" max="30" value="5" oninput="updateDays(),adjustRange(this)">
        </div>

        <div class="ads_budgets">
            <p class="budget_summary">Budget Summary</p>

            <div class="ads_costs">
                <div  id="amountDisplay">₦6,000</div>
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
            <button class="back_button1" >back </button>
            <button class="next_button1" onclick="upload_asd()">next</button>
        </div>
    </div>

    <!-- main2 the upload ads page -->

<div id="main2" >
    <div id="adsConfirmation" class="animate animate-top"></div>


<input type="file" id="fileInput" accept="image/*" style="display: none;">
<input type="file" id="fileInput2" accept="image/*" style="display: none;">


    <div  id="user_scroll_view_upload">
        <p class="upload_both_veiws_descriptoin1 animate ">
            Upload Scroll View Design  <span class="photo_discribtion_3"> 800px by 250px</span>
        </p>
        <div class="div_for_to_upload_ads">
            <p class="upload_both_veiws_descriptoin2 animate ">
                Upload Scroll View Design<span class="photo_discribtion_3"> 800px by 250px</span>
            </p>

        <div class="upload_for_both_veiws animate animate-pulse3"  id="uploadButton">
                <img src="{{ asset('innocent/assets/image/upload.png') }}" alt="Logo" class="upload_camera">
                <p class="photo_discribtion">maximum picture size: <span class="photo_discribtion_2">5mb</span><br>
                    supported format: <span class="photo_discribtion_2">Jpg & Png</span>
                </p>
        </div>
        </div>


    </div>
<br>

    <div  id="home_page_banner_upload">

            <p class="upload_both_veiws_descriptoin1 animate ">
                Upload Your Banner View  <span class="photo_discribtion_3 "> 800px by 250px</span>
            </p>
        <div class="div_for_to_upload_ads" >
        <p class="upload_both_veiws_descriptoin2 animate ">
            Upload Your Banner View <span class="photo_discribtion_3"> 800px by 250px</span>
        </p>
      <div class="upload_for_both_veiws animate animate-pulse3"  id="uploadButton2">
            <img src="{{ asset('innocent/assets/image/upload.png') }}" alt="Logo" class="upload_camera">
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
                <p >Scroll-Veiw Preveiw</p>
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
        <button class="back_button2" onclick="upload_asd_back()" >back </button>
        <button class="next_button2 animate" >next</button>
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

    <script src="{{ asset('innocent/assets/js/ads_placement.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/animation.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/bootstrap.js') }}"></script>
</body>
</html>

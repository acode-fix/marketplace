<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product :: Listing</title>
    <link rel="icon" href="{{ asset('innocent/assets/image/brand-icon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/start_selling.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/preloader.css')}}">
    <script src="{{ asset('innocent/assets/js/preloader.js') }}"></script> 
    <link href="https://fonts.cdnfonts.com/css/product-sans" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
    <!-- First part, the nav and search button -->

    <div class="navbar fixed-top">
        <p style="display: flex;">
            <a href="{{ url('/') }}">  <i class="fa-solid fa-angle-left  back_to_index" ></i></a>
            <span class="navbar_heading">Upload Product</span>
        </p>

        <a href="{{ url('/') }}"><img src="{{asset('innocent/assets/image/transparent_logo.png') }}" alt="" class="buy_and_sell_logo_start_selling"></a>

    </div>

    <div id="scrollToTop"><i class="fa-solid fa-arrow-up"></i></div>

    <form id="productForm" enctype="multipart/form-data">
            @csrf

    <div class="main_body">
        <h5 class="category-h5  animate animate-top">Select product category
            <span  class="text-danger"><sup>*</sup></span>
            <br><span  class="text-black-50 fs-6">(choose a category before uploading)</span>
        </h5>

    <div class="category_mobile">

        <!-- Category Images -->
        <div class="image2" onclick="selectCategory(this, 1)">
            <img src="{{asset('innocent/assets/image/category 1.png')}}">
            <div class="text2">Gadgets</div>
            <div class="checked-icon">✅️</div>
        </div>
        <div class="image2" onclick="selectCategory(this, 2)">
            <img src="{{asset('innocent/assets/image/category 2.png')}}">
            <div class="text2">Vehicles</div>
            <div class="checked-icon">✅️</div>
        </div>
        <div class="image2" onclick="selectCategory(this, 3)">
            <img src="{{asset('innocent/assets/image/category 3.png')}}">
            <div class="text2">Houses</div>
            <div class="checked-icon">✅️</div>
        </div>
        <div class="image2" onclick="selectCategory(this, 4)">
            <img src="{{asset('innocent/assets/image/category 4.png')}}">
            <div class="text2">Fashion</div>
            <div class="checked-icon">✅️</div>
        </div>
        <div class="image2" onclick="selectCategory(this, 5)">
            <img src="{{asset('innocent/assets/image/category 5.png')}}">
            <div class="text2">Jobs</div>
            <div class="checked-icon">✅️</div>
        </div>
        <div class="image2" onclick="selectCategory(this, 6)">
            <img src="{{asset('innocent/assets/image/category 6.png')}}">
            <div class="text2">Cosmetics</div>
            <div class="checked-icon">✅️</div>
        </div>
        <div class="image2" onclick="selectCategory(this, 7)">
            <img src="{{asset('innocent/assets/image/category 7.png')}}">
            <div class="text2">Fruits</div>
            <div class="checked-icon">✅️</div>
        </div>
        <div class="image2" onclick="selectCategory(this, 8)">
            <img src="{{asset('innocent/assets/image/category 8.png')}}">
            <div class="text2">Kitchen utensils</div>
            <div class="checked-icon">✅️</div>
        </div>
        <div class="others_mobile" onclick="selectCategory(this, 9)">
            <p>others</p>
            <div class="checked-icon">✅️</div>
        </div>

    </div>

        <!-- Category Full Size -->
    <div class="category_desktop_container">
            <div class="category_desktop_arrow"><i class="fa-solid fa-circle-arrow-left " id="leftArrow"></i></div>
        <div class="category_desktop" id="imageGallery">
            <!-- Category Images Gallery -->

            <div class="image" onclick="selectCategory(this, 1)">
                <img src="{{asset('innocent/assets/image/category 1.png')}}">
                <div class="text2">Gadgets</div>
                <div class="checked-icon">✅️</div>
            </div>
           

            <div class="image" onclick="selectCategory(this, 2)">
                <img src="{{asset('innocent/assets/image/category 2.png')}}">
                <div class="text2">Vehicles</div>
                <div class="checked-icon">✅️</div>
            </div>

            <div class="image" onclick="selectCategory(this, 3)">
                <img src="{{asset('innocent/assets/image/category 3.png')}}">
                <div class="text2">Houses</div>
                <div class="checked-icon">✅️</div>
            </div>

            <div class="image" onclick="selectCategory(this, 4)">
                <img src="{{asset('innocent/assets/image/category 4.png')}}">
                <div class="text2">Fashion</div>
                <div class="checked-icon">✅️</div>
            </div>

            <div class="image" onclick="selectCategory(this, 5)">
                <img src="{{asset('innocent/assets/image/category 5.png')}}">
                <div class="text2">Jobs</div>
                <div class="checked-icon">✅️</div>
            </div>

            <div class="image" onclick="selectCategory(this, 6)">
                <img src="{{asset('innocent/assets/image/category 6.png')}}">
                <div class="text2">Cosmetics</div>
                <div class="checked-icon">✅️</div>
            </div>


            <div class="image" onclick="selectCategory(this, 7)">
                <img src="{{asset('innocent/assets/image/category 7.png')}}">
                <div class="text2">Fruits</div>
                <div class="checked-icon">✅️</div>
            </div>
            <div class="image" onclick="selectCategory(this, 8)">
                <img src="{{asset('innocent/assets/image/category 8.png')}}">
                <div class="text2"> utensils</div>
                <div class="checked-icon">✅️</div>
            </div>
            <div  id="others" onclick="selectCategory(this, 9)">
                <p>others</p>
                <div class="checked-icon">✅️</div>
            </div>
        </div>
        <div class="category_desktop_arrow"><i class="fa-solid fa-circle-arrow-right " id="rightArrow"></i></div>
    </div>

    <input type="text" name="category_id" id="selected-category" placeholder="Selected Category" readonly style="display: none;">
 <!-- product upload area -->
    <div class="product_upload">
        <div class="col first_column">

            <p class="add_photo animate "><strong>Add photo</strong><br>
                <span >(your first selected photo is your product Gig)</span>
            </p>


            
                 <input type="file" id="fileInput" name="image_url[]" accept="image/*" style="display: none;" multiple>
                <div id="imageContainer">
                    <div id="uploadButton">
                        <img src="{{asset('innocent/assets/image/Upload.png')}}" alt="Logo" class="upload_camera">
                        <p class="photo_discribtion">maximum picture size: <span class="photo_discribtion_2">5mb</span><br>
                            supported format: <span class="photo_discribtion_2">Jpg & Png</span>
                        </p>
                    </div>

                </div> 
                <div class="uploads">
                    <p class="upload_preview">upload preview</p>
                </div>

                <div class="frame_container">
                    <div class="thumbnail">

                            <div class="frame"></div>
                            <p >Thumbnail</p>
                    </div>

                        <div class="frame2"></div>
                        <div class="frame3"></div>
                </div>
        </div>

        <div class="col second_column">
            <div data-bs-toggle="modal" data-bs-target="#location_input_modal_mobile_view"  class=" photo_inputs">
               <p data-bs-toggle="modal" data-bs-target="#location_input_modal_mobile_view"  class="clickMe_mobile_veiw" id="clickMe3">Location<span>*</span></p>
            </div>

            {{-- <div class="price_input photo_inputs" id="PricesInput" id="priceFields"> --}}
            <div class="price_input photo_inputs" id="priceFields">
                <input type="text" placeholder="main price" class="main_price" name="actual_price" >
                <div class="vertical-bar"></div>
                <input type="text" placeholder="promo(optional)" class="promo_price" name="promo_price">
            </div>
            <input type="number" placeholder="how many in stock," class="photo_inputs" name="quantity">
            <div class="product_condition">
                <p>
              Product condition
            <button type="button"  value="used" class="button used" onclick="toggleButton(this, 'fairly_used')">Fairly Used</button>
             <button type="button" value="new" class="button new text-center" onclick="toggleButton(this, 'new')">New</button>
                </p>
            <input type="text" name="condition" id="toggle-button" readonly style="display: none;">

            </div>
            <div class="ask_for_price">
                <p>Ask for price
                    <span class="ask_for_price_span">(
                        use ask for  price label for  services  with variable <br>pricing based  on buyer demand.)
                    </span>
                </p>
                <label class="switch">
                    <input type="checkbox" id="priceSwitch">
                    <span class="slider"></span>
                </label>
            </div>
            <!-- <div class="negotiable">
                <p>Negotiable
                    <span class="ask_for_price_span">(
                        this allows potential buyers to <br> negotiate by sending you an offer.)
                    </span>
                </p>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider"></span>
                </label>
            </div> -->
        </div>

        <div class="col " style="margin-left: auto;">
            <input type="text" placeholder="product title" name="title" class="product_title" id="product-name">

           <div class="tooltip" id="tooltip" style="display: none;">Please choose any category to proceed</div>
            
            <p class="maximum_character">500 characters max</p>
            <textarea  placeholder="product descriptoin" name="description" class="product_descriptoin_input js-desc"></textarea><span class="error"></span>
            {{-- <button type="submit" class="upload_your_product animate " data-bs-toggle="modal" data-bs-target="#exampleModal"> --}}
            <button type="submit" class="upload_your_product animate start-selling-btn">

                <p class="upload_your_product_p js-upload-text">
                <img src="{{ asset('innocent/assets/image/logo icon.svg')}}" alt="">
                 Upload your Product
                </p>
                <div  style="display: flex; align-items:center;">
                    <div id="btn-loader" class="loader"></div>
                    <p id="loading-text" class="text-white ms-1 mt-1">loading...</p>
                </div>
               
            </button>
            <p class="upload_terms animate ">By selecting the *Upload Your Product* option you acknowledge
              and agree to the Terms of Use, commit to following the Safety
              Tips. and verify that your submission does not cointain any
               Prohobited items
            </p>
        </div>
    </div>









  <!--location Modal -->
  <div class="modal fade"  id="location_input_modal_mobile_view" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollabled">
      <div class="modal-content modal_content">
        <div class="location_search_area">

            <i class="fa-solid fa-angle-left close_location"  data-bs-dismiss="modal" aria-label="Close"></i>
            <div class="space"></div>
            <div class="location_search_input_area">
                <i class="fa-solid fa-location-dot"></i>

                <input type="text" name="location" class="locationInput3" placeholder="Enter your city location" oninput="filterStates3(this.value)">
               <i class="fa-solid fa-search"></i>
            </div>
        </div>
        <div class="state_selection" id="stateSelection3">
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Abakaliki')">Abakaliki</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Aba')">Aba</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Abeokuta')">Abeokuta</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Abuja')">Abuja</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Ado Ekiti')">Ado Ekiti</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Akure')">Akure</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Asaba')">Asaba</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Awka')">Awka</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Bauchi')">Bauchi</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Benin City')">Benin City</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Birnin Kebbi')">Birnin Kebbi</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Calabar')">Calabar</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Damaturu')">Damaturu</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Delta')">Delta</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Dutse')">Dutse</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Edo')">Edo</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Ekiti')">Ekiti</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Enugu')">Enugu</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Gombe')">Gombe</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Gusau')">Gusau</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Ibadan')">Ibadan</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Ikeja')">Ikeja</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Ilorin')">Ilorin</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Imo')">Imo</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Jalingo')">Jalingo</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Jos')">Jos</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Kaduna')">Kaduna</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Kano')">Kano</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Katsina')">Katsina</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Lafia')">Lafia</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Lagos')">Lagos</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Lokoja')">Lokoja</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Maiduguri')">Maiduguri</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Makurdi')">Makurdi</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Minna')">Minna</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Ogun')">Ogun</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Owerri')">Owerri</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Owere')">Owere</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Port Harcourt')">Port Harcourt</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Sokoto')">Sokoto</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Umuahia')">Umuahia</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Uyo')">Uyo</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Yenagoa')">Yenagoa</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Yola')">Yola</p>
            <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation3('Zaria')">Zaria</p>
        </div>
      </div>
    </div>
  </div>

</form>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content upload_sucess">
        <p class="upload_sucess_modal_p">
            <i class="fa-solid fa-angle-left" data-bs-dismiss="modal" aria-label="Close"></i>
            <img src="{{asset('innocent/assets/image/transparent_logo.png')}}" alt="" class="upload_logo" width="120px">
        </p>
        <p class="upload_sucess_modal_p2">
            <i class="fa-solid fa-check"></i>
        </p>
       <div class="upload_sucess_modal_div">
        <p class="upload_sucess_modal_div_p">Sucessful!</p>
        <p class="upload_sucess_modal_div_p2">Your Product have been Sucessfully publish</p>
       </div>
      </div>
    </div>
  </div>



  <div class="modal fade" id="product_upload_condition1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content alert_modal_content">

        <div class="modal-body alert_modal_body">
          <p>Image size must be less than <span class="alert_main_message">5MB</span></p>
          <i class="fa-solid fa-close" data-bs-dismiss="modal" aria-label="Close"></i>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="product_upload_condition2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content alert_modal_content">

        <div class="modal-body alert_modal_body">
          <p>Image must be <span class="alert_main_message">PNG or JPG</span></p>
          <i class="fa-solid fa-close" data-bs-dismiss="modal" aria-label="Close"></i>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="product_upload_condition3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content alert_modal_content">

        <div class="modal-body alert_modal_body">
          <p>You can only upload a maximum of <span class="alert_main_message">three</span> images</p>
          <i class="fa-solid fa-close" data-bs-dismiss="modal" aria-label="Close"></i>
        </div>

      </div>
    </div>
  </div>


    <script src="{{ asset('innocent/assets/js/start_selling.js')}}"></script>
    <script src="{{ asset('innocent/assets/js/animation.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/bootstrap.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="module" src="{{ asset('backend-js/user/profile-update.js') }}"></script>
   <script type="module" src="{{ asset('backend-js/user/start-selling.js') }}"></script>

    <script>
 

</script>



</body>
</html>
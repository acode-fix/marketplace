
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/product.des.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/notification.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/preloader.css')}}">
    <link href="https://fonts.cdnfonts.com/css/product-sans" rel="stylesheet">
                
    


</head>
<style>
</style>

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
    <div class="body">

    <div >



       <div id="scrollToTop"><i class="fa-solid fa-arrow-up"></i></div>

        <!-- Navbar and Search Button -->
    <div class="navbar-1 fixed-top">
        <img src="{{asset('innocent/assets/image/transparent_logo.png')}}"  class="search_buy_and_sell_logo " alt="" onclick="window.location.href='{{ url('/') }}';">

        <div class="search-bar">
            <div class="location-icon"><i class="fa-solid fa-location-dot"></i></div>
            <div style="margin-left: 8px;" class="country-input">
                Nigeria
            </div>
            {{-- <select placeholder="Country" class="country-input">
                <option selected>Nigeria</option>
                <option value="1">Canada</option>
                <option value="2">Nigeria</option>
                <option value="3">Russia</option> 
            </select> --}}
            <div class="vertical-bar"></div>
            <a href="{{ url('/search') }}">
                <span  onclick="localStorage.setItem('previousPage', '{{ url('/product_des') }}')">
                   <input type="text" placeholder="Find what to buy..." class="find-what-to-buy">
                   <button type="button" class="search">Search</button>
                </span>
           </a>
        </div>
        <div id="notification_icon_div"><img class="notification-icon" src="{{asset('innocent/assets/image/notification.svg')}}" alt="Logo" id="notification_icon"></div>
        <div id="notification_icon_div2"> <a href="{{ url('/notification_mobile') }}"><img src="{{asset('innocent/assets/image/notification.png')}}" alt="Logo" ></a></div>

         {{-- <div><img id="profile_picture" src="" alt=".profile picture " class="profile_picture js-product-desc-img"></div>
         <div><img id="profile_picture_mobile" src="" alt=".profile picture " class="profile_picture_mobile js-product-desc-img"></div> --}}

         <img id="js-profile-desk" src="" alt=".profile picture " class="profile_picture">
         <img id="js-profile-mobile-desc" src="" alt=".profile picture " class="profile_picture_mobile">
    </div>

    <!-- profile card -->
    <div class="profile_card">
    {{-- <div class="profile_card_user_name">
              <img id="profile_image" src="" alt="Profile Image"
            style="width: 80px; height:80px; border-radius:50px">
          <p id="profile_name">Loading
        </p>
        <p><span id="profile_email">loading</span></p>  --}}
          {{-- <p>Mired Augustine <br>
            <span>miredaugustine@gmail.com</span>
          </p> --}}
          {{-- </div>
        <hr>
        <div class="accont_features">
            <p><a href="{{ url('/settings') }}">Account Setting </a></p>
            <p><a href="{{ url('/refer') }}"> Reffer a Friend </a></p>
            <p> <a href="{{ url('/privacy') }}">Privacy and Policy </a></p>
            <p><a href="#"> Sign out</a></p>

        </div>    --}}

    </div>




        {{-- This part is for the mobile view for navbar sticky part --}}
    <div class="navbar-2 fixed-top">
        <a href="{{ url('/') }}">  <i class="fa-solid fa-angle-left back_to_index" ></i></a>
        <div class="user_info">
            {{-- <div><img src="innocent/assets/image/bike.png" alt=".profile picture " class="user_photo"></div>
            <div class="user_name_area">
                <p class="user_name">Innocent</p>

                <p class="location">
                    <img src="innocent/assets/image/badge.png" alt="">
                    <span class="user_state_mobile">loading</span>
                    <span class="rate">
                        <img src="innocent/assets/image/Rate.png" alt="">
                        <span class="rate_value">loading</span>
                    </span>
                </p>
            </div>
            <div class="products_details_head">
                <p class="sold2">
                    loading
                </p>

                <p class="stock">
                    loading
                </p>

                <p class="condition">
                    loading
                </p>
            </div> --}}
        </div>
        <img src="{{asset('innocent/assets/image/transparent_logo.png')}}" alt="" class="buy_and_sell_logo_product_des_mobile">

    </div>





    <!-- Sidebar and Main Body Section -->
    <div class="sidebar_and_main_container">
        <div class="sidebar">
            <div class="sidebar_main">


                <div class="products_details_dekstop">
                    <div class="user_info2">
                        <div><img id="js-carousel-img" src="" alt=".profile picture " class="user_photo"></div>
                        <div class="user_name2_area">
                            <p class="user_name2">Loading</p>
                            <p class="location2">
                                <img  class="js-badge" src="" alt="">
                                <i class="fa-solid fa-location-dot" style="font-size: 12px;"></i>
                                <span class="user_state">loading</span>
                                <span class="rate">
                                    <img style="margin-bottom: 4px" src="{{asset('innocent/assets/image/Rate.png')}}" alt="">
                                    <span class="rate_value">loading</span>
                                </span>
                                <span><a class="js-review review-link ps-2 text-success" href="">Reviews</a></span>
                            </p>
                        </div>
                        <div class="close_product_des"><a href="{{ url('/') }}"><i class="fa-solid fa-close "></i></a></div>
                    </div>

                    <div class="products_details_head2">
                        <p class="sold3">
                            Loading
                        </p>

                        <p class="stock2">
                            Loading
                        </p>

                        <p class="condition2">
                            Loading
                        </p>
                    </div>
                </div>

              <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators" id="carousel-indicators">
                    <!-- Carousel indicators will be dynamically inserted here -->
                </div>
                <div class="carousel-inner" id="carousel-inner">
                    <!-- Carousel items will be dynamically inserted here -->
                    <div class="carousel-item active">
                        <img src="" class="carousel_img" alt="..." >
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>



               <div class="product_descriptoin_card">
                    <p class="product_name_on_sidebar">Loading</p>
                    <hr>
                    <div class="main_and_promo_price_des_sidebar js-price">
                    <p class="promo_price2">loading</p>
                     <p class="main_price2">loading</p>

                    </div>
                    <div>
                     <span style="font-weight: bold;">Description</span>
                     <p class="description">Loading</p>
                 </div>
                    <div class="connect_buttons">

                        {{-- <button  class="product_card_veiw_shop_button" >
                          <a href="{{ url('/sellers-shop') }}">view shop <img src="innocent/assets/image/badge.png" alt="" ></a>
                        </button> --}}
                        <button class="product_card_view_shop_button" id="viewShopButton" style="display: none;">
                            {{-- <a href="#" onclick="viewShop()">View Shop</a> --}}
                            <a href="">View Shop</a>
                          </button>

                        <button  class="product_card_connect_button js-connect-btn">
                           <a href="#">connect <img src="{{asset('innocent/assets/image/Shopping bag.png')}}" alt="" ></a>
                        </button>
                    </div>
                </div>


            </div>


            <!-- Main Body Section --> <!-- This part works for the mobile view -->
        <div class="main2" >

            <h5 class="related_search animate animate-right">Related Search</h5>
            <!-- Product Cards -->
            <div class="product_card_container related_search_margin">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="mt-4 product_card_display card-margin content-margin">
                                <!-- Example Product Card -->
                                <a href="#" class="product_card_link" data-product-id="1">
                                    <div class="card product_card">
                                        <h6 class="sold"> Sold 35 <br> <img src="{{asset('innocent/assets/image/Rate.png')}}" alt=""> 4.0</h6>
                                        <img src="{{asset('innocent/assets/image/pexels-pixabay-164558.jpg')}}" class="card-img-top w-100 product_image" alt="...">
                                        <div class="product_card_title">
                                            <div class="main_and_promo_price_area">
                                                <p class="promo_price">$100,000,000</p>
                                                <div class="main_price"><p class="main_price_amount">$120,000,000</p></div>
                                            </div>
                                            <p class="product_name">3 Bed Room Flat</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Abuja</span>
                                            <img src="{{asset('innocent/assets/image/logo icon.png')}}" alt="">
                                            <span class="connect"><strong>connect</strong></span>
                                        </div>
                                    </div>
                                </a>
                                <!-- Repeat similar structure for other product cards -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Promotion Section -->
            <div class="promotion">
                <img src="{{asset('innocent/assets/image/Annoucement.png')}}" alt="" class="Announcement">
                <p>
                    <img src="{{asset('innocent/assets/image/transparent_logo.png')}}" alt="" width="180px" ><br><br>
                        <img src="{{asset('innocent/assets/image/Annoucement.png')}}" alt="" class="Announcement2">
                        <strong>Reach more audience by promoting your Product(s)</strong><br>
                        Get an active badge by becoming a verified seller <br> and enjoy multiple benefits that comes with being a verified seller
                        <br><br><br>
                        <a class="js-become-link" href="/become"><button class="get_started animate animate-pulse4">Get
                            Started</button></a>
                        {{-- <strong>Reach more audience by promoting your Product(s)</strong><br>
                        determine your target audience location, interest, select a <br>
                        convenient budget and duration
                    <br><br><br>
                   <button class="get_started animate animate-pulse4"  onclick="showCard_get_started()">Get Started</button> --}}
                </p>
            </div>

                <div class="promotion_card card" id="promotion_card" style="display: none;">
                    <i class="fa-solid fa-close close_get_started" onclick="hideCard_get_started()"></i>
                    <img src="{{asset('innocent/assets/image/Annoucement.png')}}" alt="">
                    <div class="card_content_get_started">
                       <p>chosse your promotion option <br>
                        <span>select your promotion option</span>
                       </p>
                        <button>Boost listings</button>
                        <button>New Product Boost</button>
                    </div>

                </div>
            <!-- More Product Cards -->
            <div class="product_card_container">

                <div class="container-fluid">
                    <div class="row">
                      <div class="col">
                        <div class="mt-4 product_card_display card-margin content-margin" id="productcard_display">

                             {{-- <a href="{{ url('/product_des') }}" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 7 <br> <img src="innocent/assets/image/Rate.png" alt=""> 3.6</h6>
                                    <img src="innocent/assets/image/felipe-simo-dWQDNyPfKPU-unsplash.jpg" class="card-img-top w-100 product_image" alt="...">

                                    <div class="product_card_title">
                                        <div class="main_and_promo_price_area">
                                            <p class="promo_price">$500,000</p>
                                            <div class="main_price"><p class="main_price_amount">$520,000</p></div>

                                        </div>


                                            <p class="product_name">Mercedes-Benz M Class ML 350 4Matic 2012 Silver</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Abuja</span>
                                            <img src="innocent/assets/image/logo icon.svg" alt="" >
                                            <span class="connect"><strong>connect</strong></span>

                                    </div>
                                </div>
                             </a> --}}

                        </div>
                      </div>
                    </div>
                  </div>



            </div>


            <!--tell us what is it-->
            <div class="tell_us_what_u_want animate animate-left ">
                <p class="tell_us_paragraph" onclick="changeToInput()">
                    <img src="{{asset('innocent/assets/image/pen.png')}}" alt="" class="pen">
                    Can't find what you are looking for?
                    <span>Tell us what it is!</span><br>
                    and we'll do our best to assist you.
                </p>
            </div>

            <div class="tell_us_what_u_want_input_area">
                <img src="{{asset('innocent/assets/image/dp.png')}}" alt="" class="tell_us_what_u_want_profile js-img-tell">
               <div class="vertical_bar"></div>
                <input type="text" name="" class="tell_us_input js-input-mobile" placeholder="write the details of what you are searching for the details here">
                <button class="send js-send-mobile" onclick="send()">send</button>

            </div>
             <p class="submmited" >submmited✅</p>
             <div class="loader" class="loader"></div>

        </div>
    </div>

    {{-- END OF MOBILE VIEW --}}

        <!-- Main Body Section -->
        <div class="main" id="main">

            <h5 class="related_search animate animate-right">Related Search</h5>
            <!-- Product Cards -->
            <div class="product_card_container related_search_margin">

                <div class="container-fluid">
                    <div class="row">
                      <div class="col">
                        <div class="mt-4 product_card_display card-margin content-margin" id="productCardDisplay">
                            <!-- Products will be dynamically added here -->
                        </div>
                      </div>
                    </div>
                  </div>


                <!-- More Product Cards -->
            </div>
            <!-- Promotion Section -->
            <div class="promotion promotion2">
                <img src="{{asset('innocent/assets/image/Annoucement.png')}}" alt="" class="Announcement">
                <p>
                    <img src="{{asset('innocent/assets/image/transparent_logo.png')}}" alt="" width="180px" ><br><br>
                        <img src="{{asset('innocent/assets/image/Annoucement.png')}}" alt="" class="Announcement2">
                        <strong>Reach more audience by promoting your Product(s)</strong><br>
                        Get an active badge by becoming a verified seller <br> and enjoy multiple benefits that comes with being a verified seller
                        <br><br><br>
                        <a class="js-become-link" href="/become"><button class="get_started animate animate-pulse4">Get
                            Started</button></a>
                        {{-- <strong>Reach more audience by promoting your Product(s)</strong><br>
                        determine your target audience location, interest, select a <br>
                        convenient budget and duration
                    <br><br><br>
                    <button class="get_started animate animate-pulse4" onclick="showCard_get_started2()">Get Started</button> --}}
                </p>
            </div>
            <div class="promotion_card card" id="promotion_card2" style="display: none;">
                <i class="fa-solid fa-close close_get_started" onclick="hideCard_get_started2()"></i>
                <img src="{{asset('innocent/assets/image/Annoucement.png')}}" alt="">
                <div class="card_content_get_started">
                   <p>chosse your promotion option <br>
                    <span>select your promotion option</span>
                   </p>
                    <button>Boost listings</button>
                    <button>New Product Boost</button>
                </div>

            </div>

            <!-- More Product Cards -->
            <div class="product_card_container">

                <div class="container-fluid">
                    <div class="row">
                      <div class="col">
                        <div class="mt-4 product_card_display card-margin content-margin" id="productCardDisplay2">

                             {{-- <a href="{{ url('/product_des') }}" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 7 <br> <img src="innocent/assets/image/Rate.png" alt=""> 3.6</h6>
                                    <img src="innocent/assets/image/felipe-simo-dWQDNyPfKPU-unsplash.jpg" class="card-img-top w-100 product_image" alt="...">

                                    <div class="product_card_title">
                                        <div class="main_and_promo_price_area">
                                            <p class="promo_price">$500,000</p>
                                            <div class="main_price"><p class="main_price_amount">$520,000</p></div>

                                        </div>


                                            <p class="product_name">Mercedes-Benz M Class ML 350 4Matic 2012 Silver</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Abuja</span>
                                            <img src="innocent/assets/image/logo icon.svg" alt="" >
                                            <span class="connect"><strong>connect</strong></span>

                                    </div>
                                </div>
                             </a> --}}

                        </div>
                      </div>
                    </div>
                  </div>



            </div>

            <!--tell us what is it-->

            <!--tell us what is it-->
            <div class="tell_us_what_u_want tell_us_what_u_want2 animate animate-left ">
                <p class="tell_us_paragraph tell_us_paragraph2" onclick="changeToInput2()">
                    <img src="{{asset('innocent/assets/image/pen.png')}}" alt="" class="pen">
                    Can't find what you are looking for?
                    <span>Tell us what it is!</span><br>
                    and we'll do our best to assist you.
                </p>
            </div>

            <div class="tell_us_what_u_want_input_area tell_us_what_u_want_input_area2">
                <img src="{{asset('innocent/assets/image/dp.png')}}" alt="" class="tell_us_what_u_want_profile tell_us_what_u_want_profile2 js-img-tell">
               <div class="vertical_bar"></div>
                <input type="text" name="details" class="tell_us_input tell_us_input2  js-input2" placeholder="write the details of what you are searching for the details here">
                <button class="send js-send-input" onclick="send2()">send</button>

            </div>
             <p class="submmited submmited2" >submmited✅</p>
             <div class="loader loader2" ></div>
        </div>
    </div>


    <!--
        notification codes -->

        <div class="notification_main" id="notification_main" onclick="show_notification2()">
            <!-- Navbar and Search Button -->

            <p class="notification_indicator">
                <img class="notification-icon" src="{{asset('innocent/assets/image/notification.svg')}}" alt="">
                <span>notification(<span  class="indicator-span text-danger">0</span>)</span>


            </p>

            <div class="notifications_region">
{{-- 
                <a href="{{ url('/rating') }}" >
                    <div class="notification">
                        <div class="notification_details">
                            <div class="notification_image"><img src="innocent/assets/image/logo icon.svg" alt="Profile Picture">
                            </div>
                            <div class="message_area">
                                <p class="message"><strong>congratulations </strong> <br>it is a perfect time to tell the
                                    world about it.</p>
                                <p class="time">2 hours ago</p>

                            </div>
                            <img src="innocent/assets/image/laptop2.jpg" alt="Picture" class="notification_product_image">

                        </div>

                    </div>
                </a>


                <a href="#">
                    <div class="notification">
                        <div class="notification_details">
                            <img src="innocent/assets/image/dp.png" alt="Profile Picture" class="notification_image">
                            <div class="message_area">
                                <p class="message"><strong>suggested for you </strong> <br>enjoy 1000 points to boost your
                                    product to reach more audience.</p>
                                <p class="time">5 hours ago</p>

                            </div>
                            <img src="innocent/assets/image/laptop.jpg" alt="Picture" class="notification_product_image">

                        </div>

                    </div>
                </a>


                <a href="#">
                    <div class="notification">
                        <div class="notification_details">
                            <img src="innocent/assets/image/bike.png" alt="Profile Picture" class="notification_image">
                            <div class="message_area">
                                <p class="message"><strong>jane connected with you </strong> <br>tell us tell us your
                                    experience with the producttell us your experience with the product.your experience with
                                    the product.</p>
                                <p class="time">just now</p>

                            </div>
                            <img src="innocent/assets/image/laptop2.jpg" alt="Picture" class="notification_product_image">

                        </div>

                    </div>
                </a>


                <a href="#">
                    <div class="notification">
                        <div class="notification_details">
                            <img src="innocent/assets/image/bike.png" alt="Profile Picture" class="notification_image">
                            <div class="message_area">
                                <p class="message"><strong>congratulations </strong> <br>tell us your experience with the
                                    product.</p>
                                <p class="time">2 min. ago</p>

                            </div>
                            <img src="innocent/assets/image/laptop.jpg" alt="Picture" class="notification_product_image">

                        </div>

                    </div>
                </a>



                <a href="#">
                    <div class="notification">
                        <div class="notification_details">
                            <img src="innocent/assets/image/dp.png" alt="Profile Picture" class="notification_image">
                            <div class="message_area">
                                <p class="message"><strong>james your experience matters </strong> <br>Your experience
                                    matters to us share your experience about this product</p>
                                <p class="time">3 hours ago</p>

                            </div>
                            <img src="innocent/assets/image/laptop.jpg" alt="Picture" class="notification_product_image">

                        </div>

                    </div>
                </a>

                <a href="#">
                    <div class="notification">
                        <div class="notification_details">
                            <img src="innocent/assets/image/bike.png" alt="Profile Picture" class="notification_image">
                            <div class="message_area">
                                <p class="message"><strong>congratulations </strong> <br>tell tell us your experience with
                                    the producttell us your experience with the product.s your experience with the
                                    producttell us your experience with the product.</p>
                                <p class="time">2 hours ago</p>

                            </div>
                            <img src="innocent/assets/image/laptop.jpg" alt="Picture" class="notification_product_image">

                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="notification">
                        <div class="notification_details">
                            <img src="innocent/assets/image/dp.png" alt="Profile Picture" class="notification_image">
                            <div class="message_area">
                                <p class="message"><strong>congrats on your new listing </strong> <br>it is a perfect time
                                    to tell the world about it.</p>
                                <p class="time">2 hours ago</p>

                            </div>
                            <img src="innocent/assets/image/Picture of product (USB).png" alt="Picture" class="notification_product_image">

                        </div>
                    </div>
                </a> --}}
                <div class="d-flex ">
                    <i id="volumeHighIcon" class="fa-solid fa-volume-high notification_volume"
                        onclick="turnOnNotifications()"></i>
                    <i id="volumeMuteIcon" class="fa-solid fa-volume-mute notification_volume" style="display: none;"
                        onclick="turnOffNotifications()"></i>
                    <audio id="notificationSound">
                        <source src="{{asset('innocent/assets/notification_sound/mixkit-bell-notification-933.wav')}}" type="audio/mpeg">
                    </audio>
                    <p class="mt-2">Notification sound</p>
                </div>

            </div>
        </div>


    <!-- Footer Section -->
    <div class="footer_contanier">
        <div>
            <img class="main-logo" src="{{asset('innocent/assets/image/transparent_logo.png')}}" alt="">
        </div>
        <nav class="footer_links">
            <a href="{{ url('/about') }}">About Us</a>
            <a href="">Terms and condition</a>
            <a class="js-help-desc" href="">Help desk</a>
            <a href="{{ url('/privacy') }}">Privacy &  policy</a>
            {{-- <a href="">Report a seller</a> --}}
        </nav>
        <div class="footer_icons">
            <a href="https://web.facebook.com/loopmart/"><img src="{{asset('innocent/assets/image/facebook.png')}}" alt=""></a>
            <img src="{{asset('innocent/assets/image/twitter.png')}}" alt="">
            <img src="{{asset('innocent/assets/image/linkedin.png')}}" alt="">
            <a href="mailto:info@gmail.com.ng"><img src="{{asset('innocent/assets/image/message.png')}}" alt=""></a>

        </div>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="tell_us_what_u_want_input_condition" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content alert_modal_content">

        <div class="modal-body alert_modal_body">
          <p>Please <span class="alert_main_message">input</span> something to send.</p>
          <i class="fa-solid fa-close" data-bs-dismiss="modal" aria-label="Close"></i>
        </div>

      </div>
    </div>
  </div>

    <script src="{{ asset('innocent/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/search.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/script.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/animation.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/product_des.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/notification.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



     {{-- Axios and Moment.js Scripts --}}
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js"></script>
  <script type="module" src="{{ asset('backend-js/user/profile-update.js') }}"></script>
  <script type="module" src="{{ asset('backend-js/user/product-desc.js') }}"></script>
 <script type="module"  src="{{ asset('backend-js/notification.js') }}"></script> 
 <script src="{{ asset('innocent/assets/js/preloader.js') }}"></script>




   
  
    



</body>
</html>

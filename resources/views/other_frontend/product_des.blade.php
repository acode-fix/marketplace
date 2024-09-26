
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


</head>
<style>
</style>

<body>
    <div class="body">

    <div >



       <div id="scrollToTop"><i class="fa-solid fa-arrow-up"></i></div>

        <!-- Navbar and Search Button -->
    <div class="navbar-1 fixed-top">
        <img src="innocent/assets/image/main logo.svg"  class="search_buy_and_sell_logo " alt="" onclick="window.location.href='{{ url('/') }}';">

        <div class="search-bar">
            <div class="location-icon"><i class="fa-solid fa-location-dot"></i></div>
            <select placeholder="Country" class="country-input">
                <option selected>USA</option>
                <option value="1">Canada</option>
                <option value="2">Nigeria</option>
                <option value="3">Russia</option>
            </select>
            <div class="vertical-bar"></div>
            <a href="{{ url('/search') }}">
                <span  onclick="localStorage.setItem('previousPage', '{{ url('/product_des') }}')">
                   <input type="text" placeholder="Find what to buy..." class="find-what-to-buy">
                   <button type="button" class="search">Search</button>
                </span>
           </a>
        </div>
        <div id="notification_icon_div"><img src="innocent/assets/image/notification.png" alt="Logo" id="notification_icon"></div>
        <div id="notification_icon_div2"> <a href="{{ url('/notification_mobile') }}"><img src="innocent/assets/image/notification.png" alt="Logo" ></a></div>

         <div><img id="profile_picture" src="" alt=".profile picture " class="profile_picture"></div>
         <div><img id="profile_picture_mobile" src="" alt=".profile picture " class="profile_picture_mobile"></div>
    </div>

    <!-- profile card -->
    <div class="profile_card">
        <div class="profile_card_user_name">
            <img id="profile_image" src="" alt="Profile Image"
            style="width: 80px; height:80px; border-radius:50px">
          <p id="profile_name">Loading
        </p>
        <p><span id="profile_email">loading</span></p>
          {{-- <p>Mired Augustine <br>
            <span>miredaugustine@gmail.com</span>
          </p> --}}
        </div>
        <hr>
        <div class="accont_features">
            <p><a href="{{ url('/settings') }}">Account Setting </a></p>
            <p><a href="{{ url('/refer') }}"> Reffer a Friend </a></p>
            <p> <a href="{{ url('/privacy') }}">Privacy and Policy </a></p>
            <p><a href="#"> Sign out</a></p>

        </div>

    </div>




        {{-- This part is for the mobile view for navbar sticky part --}}
    <div class="navbar-2 fixed-top">
        <a href="{{ url('/') }}">  <i class="fa-solid fa-angle-left  back_to_index" ></i></a>
        <div class="user_info">


            <div><img src="innocent/assets/image/bike.png" alt=".profile picture " class="user_photo"></div>
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
            </div>
        </div>
        <img src="innocent/assets/image/main logo.svg" alt="" class="buy_and_sell_logo_product_des_mobile">

    </div>





    <!-- Sidebar and Main Body Section -->
    <div class="sidebar_and_main_container">
        <div class="sidebar">
            <div class="sidebar_main">


                <div class="products_details_dekstop">
                    <div class="user_info2">
                        <div><img src="innocent/assets/image/bike.png" alt=".profile picture " class="user_photo"></div>
                        <div class="user_name2_area">
                            <p class="user_name2">Loading</p>
                            <p class="location2">
                                <img src="innocent/assets/image/badge.png" alt="">
                                <i class="fa-solid fa-location-dot" style="font-size: 12px;"></i>
                                <span class="user_state">loading</span>
                                <span class="rate">
                                    <img src="innocent/assets/image/Rate.png" alt="">
                                    <span class="rate_value">loading</span>
                                </span>
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
                    <div class="main_and_promo_price_des_sidebar">
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

                        <button  class="product_card_connect_button">
                           <a href="#">connect <img src="innocent/assets/image/Shopping bag.png" alt="" ></a>
                        </button>
                    </div>
                </div>


            </div>


            <!-- Main Body Section --> <!-- This part works for the mobile view -->
        <div class="main2" >

            <h5 class="related_search  animate animate-right">Related Search</h5>
            <!-- Product Cards -->
            <div class="product_card_container related_search_margin">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="product_card_display card-margin content-margin mt-4">
                                <!-- Example Product Card -->
                                <a href="#" class="product_card_link" data-product-id="1">
                                    <div class="card product_card">
                                        <h6 class="sold"> Sold 35 <br> <img src="innocent/assets/image/Rate.png" alt=""> 4.0</h6>
                                        <img src="innocent/assets/image/pexels-pixabay-164558.jpg" class="card-img-top w-100 product_image" alt="...">
                                        <div class="product_card_title">
                                            <div class="main_and_promo_price_area">
                                                <p class="promo_price">$100,000,000</p>
                                                <div class="main_price"><p class="main_price_amount">$120,000,000</p></div>
                                            </div>
                                            <p class="product_name">3 Bed Room Flat</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Abuja</span>
                                            <img src="innocent/assets/image/logo icon.svg" alt="">
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
                <img src="innocent/assets/image/Annoucement.png" alt="" class="Announcement">
                <p>
                    <img src="innocent/assets/image/main logo.svg" alt="" width="180px" ><br><br>
                        <img src="innocent/assets/image/Annoucement.png" alt="" class="Announcement2">
                        <strong>Reach more audience by promoting your Product(s)</strong><br>
                        determine your target audience location, interest, select a <br>
                        convenient budget and duration
                    <br><br><br>
                   <button class="get_started animate animate-pulse4"  onclick="showCard_get_started()">Get Started</button>
                </p>
            </div>

                <div class="promotion_card card" id="promotion_card" style="display: none;">
                    <i class="fa-solid fa-close close_get_started" onclick="hideCard_get_started()"></i>
                    <img src="innocent/assets/image/Annoucement.png" alt="">
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
                        <div class="product_card_display card-margin content-margin mt-4" id="productcard_display">

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
                    <img src="innocent/assets/image/pen.png" alt="" class="pen">
                    Can't find what you are looking for?
                    <span>Tell us what it is!</span><br>
                    and we'll do our best to assist you.
                </p>
            </div>

            <div class="tell_us_what_u_want_input_area">
                <img src="innocent/assets/image/dp.png" alt="" class="tell_us_what_u_want_profile">
               <div class="vertical_bar"></div>
                <input type="text" name="" class="tell_us_input" placeholder="write the details here">
                <button class="send" onclick="send()">send</button>

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
                        <div class="product_card_display card-margin content-margin mt-4" id="productCardDisplay">
                            <!-- Products will be dynamically added here -->
                        </div>
                      </div>
                    </div>
                  </div>


                <!-- More Product Cards -->
            </div>
            <!-- Promotion Section -->
            <div class="promotion promotion2">
                <img src="innocent/assets/image/Annoucement.png" alt="" class="Announcement">
                <p>
                    <img src="innocent/assets/image/main logo.svg" alt="" width="180px" ><br><br>
                        <img src="innocent/assets/image/Annoucement.png" alt="" class="Announcement2">
                        <strong>Reach more audience by promoting your Product(s)</strong><br>
                        determine your target audience location, interest, select a <br>
                        convenient budget and duration
                    <br><br><br>
                    <button class="get_started animate animate-pulse4" onclick="showCard_get_started2()">Get Started</button>
                </p>
            </div>
            <div class="promotion_card card" id="promotion_card2" style="display: none;">
                <i class="fa-solid fa-close close_get_started" onclick="hideCard_get_started2()"></i>
                <img src="innocent/assets/image/Annoucement.png" alt="">
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
                        <div class="product_card_display card-margin content-margin mt-4" id="productCardDisplay2">

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
            <div class="tell_us_what_u_want  tell_us_what_u_want2 animate animate-left ">
                <p class="tell_us_paragraph tell_us_paragraph2" onclick="changeToInput2()">
                    <img src="innocent/assets/image/pen.png" alt="" class="pen">
                    Can't find what you are looking for?
                    <span>Tell us what it is!</span><br>
                    and we'll do our best to assist you.
                </p>
            </div>

            <div class="tell_us_what_u_want_input_area tell_us_what_u_want_input_area2">
                <img src="innocent/assets/image/dp.png" alt="" class="tell_us_what_u_want_profile tell_us_what_u_want_profile2">
               <div class="vertical_bar"></div>
                <input type="text" name="" class="tell_us_input tell_us_input2" placeholder="write the details here">
                <button class="send " onclick="send2()">send</button>

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
                <img src="innocent/assets/image/notification.png" alt="">
                <span>notification(<span>0</span>)</span>


            </p>

            <div class="notifications_region">

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
                </a>
                <div class="d-flex ">
                    <i id="volumeHighIcon" class="fa-solid fa-volume-high notification_volume"
                        onclick="turnOnNotifications()"></i>
                    <i id="volumeMuteIcon" class="fa-solid fa-volume-mute notification_volume" style="display: none;"
                        onclick="turnOffNotifications()"></i>
                    <audio id="notificationSound">
                        <source src="innocent/assets/notification_sound/mixkit-bell-notification-933.wav" type="audio/mpeg">
                    </audio>
                    <p class="mt-2">Notification sound</p>
                </div>

            </div>
        </div>


    <!-- Footer Section -->
    <div class="footer_contanier">
        <div>
            <img src="logo.png" alt="">
        </div>
        <nav class="footer_links">
            <a href="">About Us</a>
            <a href="">Terms and condition</a>
            <a href="">Help center</a>
            <a href="">Privacy & cookies policy</a>
            <a href="">Report a seller</a>
        </nav>
        <div class="footer_icons">
            <img src="innocent/assets/image/facebook.png" alt="">
            <img src="innocent/assets/image/twitter.png" alt="">
            <img src="innocent/assets/image/linkedin.png" alt="">
            <img src="innocent/assets/image/message.png" alt="">
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
  <script type="module" src="{{ asset('backend-js/auth.js') }}"></script>


    {{-- NEW VERSION --}}
    <script>

        //
    document.addEventListener('DOMContentLoaded', function () {
     const viewShopButton = document.getElementById('viewShopButton');

    if (viewShopButton) {
        // Apply initial styles
        viewShopButton.style.display = 'none'; // Initially hidden
        viewShopButton.style.border = '1px solid rgb(117, 116, 116)';
        viewShopButton.style.backgroundColor = 'white';
        viewShopButton.style.padding = '10px 10px';
        viewShopButton.style.fontSize = '15px';
        viewShopButton.style.borderRadius = '3px';

        // Add hover effects using mouseover and mouseout events
        viewShopButton.addEventListener('mouseover', function () {
            viewShopButton.style.border = '1px solid white';
            viewShopButton.style.outline = '1.5px solid red';
        });

        viewShopButton.addEventListener('mouseout', function () {
            viewShopButton.style.border = '1px solid rgb(117, 116, 116)';
            viewShopButton.style.outline = 'none';
        });
    }

    const selectedProduct = JSON.parse(localStorage.getItem('selectedProduct'));
    
    const allProducts = JSON.parse(localStorage.getItem('allProducts'));

    console.log(selectedProduct);



    // Display product details if selectedProduct is available
    if (selectedProduct) {

        displayProductDetails(selectedProduct);

        // Show "View Shop" button if the seller is verified
        if (selectedProduct.user.id  && selectedProduct.user.is_verified === 1) {
            viewShopButton.style.display = 'block'; // Show button
        } else {
            viewShopButton.style.display = 'none'; // Hide button
        }
    }

   // Add event listener for "View Shop" button
   if (viewShopButton) {
    console.log(selectedProduct.shop_id);

        viewShopButton.addEventListener('click', function () {
            if (selectedProduct) {
                localStorage.setItem('selectedProductId', selectedProduct.id);
                window.location.href = `/sellers-shop?userId=${selectedProduct.user.id}`;
            }
        });
    }

    // Display all products if available
    if (allProducts) {
        renderProducts(allProducts);
    }
});

function displayProductDetails(product) {
    // Display product details in the UI
    document.querySelector('.user_state').textContent = product.location;
    document.querySelector('.rate_value').textContent = product.rate;
    document.querySelector('.sold3').textContent = 'sold ' + (product.sold || 0);
    document.querySelector('.stock2').textContent = product.quantity + ' in stock';
    document.querySelector('.condition2').textContent = product.condition;
    document.querySelector('.description').textContent = product.description;
    document.querySelector('.product_name_on_sidebar').textContent = product.title;

    // For mobile view
    document.querySelector('.sold2').textContent = 'sold ' + (product.sold || 0);
    document.querySelector('.stock').textContent = product.quantity + ' in stock';
    document.querySelector('.condition').textContent = product.condition;
    document.querySelector('.user_state_mobile').textContent = product.location;

    // Handle price display
    if (product.ask_for_price) {
        document.querySelector('.promo_price2').textContent = 'ASK FOR PRICE';
        document.querySelector('.main_price2').textContent = '';
    } else {
        document.querySelector('.promo_price2').textContent = '$' + (product.promo_price || '');
        document.querySelector('.main_price2').textContent = '$' + (product.actual_price || '');
    }

    // Update the image carousel
    updateCarousel(product.image_url);
}

function updateCarousel(imagesJson) {

    const images = JSON.parse(imagesJson);

    const indicatorsContainer = document.getElementById('carousel-indicators');
    const innerContainer = document.getElementById('carousel-inner');

    indicatorsContainer.innerHTML = '';
    innerContainer.innerHTML = '';

    images.forEach((image, index) => {
        const indicator = document.createElement('button');
        indicator.type = 'button';
        indicator.setAttribute('data-bs-target', '#carouselExampleIndicators');
        indicator.setAttribute('data-bs-slide-to', index);
        indicator.setAttribute('aria-label', `Slide ${index + 1}`);
        indicator.style.backgroundColor = '#ffce29';
        if (index === 0) {
            indicator.classList.add('active');
            indicator.setAttribute('aria-current', 'true');
        }
        indicatorsContainer.appendChild(indicator);

        const carouselItem = document.createElement('div');
        carouselItem.classList.add('carousel-item');
        if (index === 0) {
            carouselItem.classList.add('active');
        }
        // carouselItem.innerHTML = `
        //     <img src="uploads/products/${image}" style="width:100%" class="carousel_img" alt="Product Image ${index + 1}">
        // `;
        carouselItem.innerHTML = `
    <img src="uploads/products/${image}" style="width: 100%; max-height: auto; object-fit: cover;" class="carousel_img" alt="Product Image ${index + 1}">
`;

        innerContainer.appendChild(carouselItem);
    });
}

function renderProducts(products) {
    // Function to render product cards in the UI
    const productCardDisplay1 = document.getElementById('productCardDisplay');
    const productCardDisplay2 = document.getElementById('productCardDisplay2');
    const mobileProductContainer1 = document.querySelector('.product_card_display');
    const mobileProductContainer2 = document.getElementById('productcard_display');

    // Clear existing product cards
    productCardDisplay1.innerHTML = '';
    productCardDisplay2.innerHTML = '';
    mobileProductContainer1.innerHTML = '';
    mobileProductContainer2.innerHTML = '';

    // Render product cards
    products.forEach((product, index) => {
        const card = createProductCard(product);
        if (index < 8) {
            productCardDisplay1.appendChild(card);
        } else {
            productCardDisplay2.appendChild(card);
        }

        const mobileCard = createProductCard(product);
        if (index < 8) {
            mobileProductContainer1.appendChild(mobileCard);
        } else {
            mobileProductContainer2.appendChild(mobileCard);
        }
    });
}

function createProductCard(product) {
    // Function to create a product card element
    const card = document.createElement('div');
    card.className = 'card';

    let product_img_url = '';
    JSON.parse(product.image_url).forEach((el, i) => {
        if (i === 0) product_img_url = el;
    });

    card.innerHTML = `
        <a href="{{ url('/product_des') }}" class="product_card_link" data-product='${JSON.stringify(product)}'>
            <div class="card product_card">
                <h6 class="sold"> Sold ${product.sold || 0} <br> <img src="innocent/assets/image/Rate.png" alt=""> ${product.rating || 0}</h6>
                <img src="uploads/products/${product_img_url || 'default.jpg'}"  class="card-img-top w-100 product_image" alt="${product.title}">
                <div class="product_card_title">
                    <div class="main_and_promo_price_area">
                        ${product.ask_for_price ? '<p class="ask-for-price" style="color:red; padding-right: 2px; font-size:23px">Ask for price</p>' : `
                            <p class="promo_price">$${product.promo_price || ''}</p>
                            <div class="main_price"><p class="main_price_amount">$${product.actual_price || ''}</p></div>
                        `}
                    </div>
                    <p class="product_name">${product.title}</p>
                    <span class="product_card_location"><i class="fa-solid fa-location-dot"></i> ${product.location}</span>
                    <img src="innocent/assets/image/logo icon.svg" alt="">
                    <span class="connect"><strong>connect</strong></span>
                </div>
            </div>
        </a>
    `;

    card.querySelector('.product_card_link').addEventListener('click', function (event) {
        event.preventDefault();
        localStorage.setItem('selectedProduct', this.getAttribute('data-product'));
        window.location.href = this.href;
    });

    return card;
}

function fetchProductDetails(productId) {
    // Simulate fetching product details from API
    // Replace with actual API call if needed
    const allProducts = JSON.parse(localStorage.getItem('allProducts'));
    const selectedProduct = allProducts.find(product => product.id === productId);

    if (selectedProduct) {
        document.querySelector('.user_state').textContent = selectedProduct.location;
        document.querySelector('.rate_value').textContent = selectedProduct.rate;
        document.querySelector('.sold3').textContent = 'sold ' + (selectedProduct.sold || 0);
        document.querySelector('.stock2').textContent = selectedProduct.quantity + ' in stock';
        document.querySelector('.condition2').textContent = selectedProduct.condition;
        document.querySelector('.description').textContent = selectedProduct.description;
        document.querySelector('.product_name_on_sidebar').textContent = selectedProduct.title;

        //for mobile
        document.querySelector('.sold2').textContent = 'sold ' + (selectedProduct.sold || 0);
        document.querySelector('.stock').textContent = selectedProduct.stock + ' in stock';
        document.querySelector('.condition').textContent = selectedProduct.condition;
        document.querySelector('.user_state_mobile').textContent = selectedProduct.location;

        if (selectedProduct.ask_for_price) {
            document.querySelector('.promo_price2').textContent = 'ASK FOR PRICE';
            document.querySelector('.main_price2').textContent = '';
        } else {
            document.querySelector('.promo_price2').textContent = '$' + (selectedProduct.promo_price || '');
            document.querySelector('.main_price2').textContent = '$' + (selectedProduct.actual_price || '');
        }

        updateCarousel(selectedProduct.image_url);
    } else {
        console.error('Product with ID ' + productId + ' not found.');
    }
}



        // FETCH THE USER DATA
/*        
document.addEventListener('DOMContentLoaded', () => {
    // Ensure the code runs after the DOM is fully loaded
    const token = localStorage.getItem('apiToken'); // Get the token from local storage

    if (token) {
        fetchUserData(token);
    } else {
        promptLogin('Authentication token is missing. Please log in.');
    }
});

*/

function fetchUserData(token) {
    axios.get('/api/v1/getuser', {
        headers: {
            'Authorization': 'Bearer ' + token
        }
    })
    .then(response => {
        const user = response.data;
        updateUserProfile(user);
    })
    .catch(error => {
        console.error('Error fetching user data:', error);
        if (error.response && error.response.status === 401) {
            promptLogin('Your session has expired. Please log in again.');
        }
    });
}

function updateUserProfile(user) {
    const nameElement = document.getElementById('profile_name');
    const emailElement = document.getElementById('profile_email');
    const profileImageElement = document.getElementById('profile_image');
    const profilePictureElement = document.getElementById('profile_picture');
    const profilePictureMobileElement = document.getElementById('profile_picture_mobile');

    if (user) {
        // nameElement.innerHTML = `${user.username || 'Unknown User'} <br>`;
        // emailElement.innerHTML = user.email || 'No email provided';

        nameElement.textContent = user.username || 'Unknown User';
        emailElement.textContent = user.email || 'No email provided';

        const imageUrl = user.photo_url ? `/uploads/users/${user.photo_url}` : 'innocent/assets/image/dp.png';
        profileImageElement.src = imageUrl;
        profilePictureElement.src = imageUrl;
        profilePictureMobileElement.src = imageUrl;
    } else {
        console.error('User data is null or undefined');
    }
}

function promptLogin(message) {
    Swal.fire({
        icon: 'error',
        title: 'Login Required',
        text: message
    }).then(() => {
        window.location.href = '/'; // Redirect to login page
    });
}
    </script>



</body>
</html>

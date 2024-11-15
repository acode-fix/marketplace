<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarketPlace</title>
    <link rel="icon" href="{{ asset('innocent/assets/image/brand-icon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/notification.css')}}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/location.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/preloader.css')}}">
    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>



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



    <div id="scrollToTop"><i class="fa-solid fa-arrow-up"></i></div>
    <div id="index">
        <!-- Navbar and Search Button -->
        <div class="navbar-1 fixed-top">
            <a class="js-logo-link" href=""><img  class="buy_and_sell_logo js-logo-img" src="{{ asset('innocent\assets\image\transparent_logo.png')}}" alt="" data-bs-toggle="" data-bs-target="" ></a>
            <div class="search-bar">
                <div class="location-icon">
                 <i class="fa-solid fa-location-dot"></i> 
                
                </div>
                <div style="margin-left: 8px;" class="country-input">
                    Nigeria
                </div>
                {{-- <select placeholder="Country" class="country-input">
                    <option selected>Nigeria</option>
                     <option selected>USA</option>
                    <option value="1">Canada</option>
                    <option value="2">Nigeria</option>  
                    <option value="3">Russia</option> 
                </select>  --}}
                <div class="vertical-bar"></div>
                <a class="js-auth" href="{{ url('/search') }}">
                    <span onclick="localStorage.setItem('previousPage', '{{ url('/') }}')">
                        <input type="text" placeholder="Find what to buy..." class="find-what-to-buy">
                        <button type="button" class="search">Search</button>
                    </span>
                </a>
            </div>
            <div  id="notification_icon_div"><img class="notification-icon" src="{{asset('innocent/assets/image/notification.svg')}}" alt="Logo"
                    id="notification_icon"></div>
            <div  id="notification_icon_div2"> <a href="{{ url('/notification_mobile') }}"><img class="notification-icon js-auth"
                        src="{{asset('innocent/assets/image/notification.svg')}}" alt="Logo"></a></div>

            <div><img id="profile_picture" src="" alt=".profile picture " class="profile_picture mt-2 js-default"></div>
            <a href="{{ url('/settings') }}">
                <img id="profile_picture_mobile" src="" alt=".profile picture "
                    class="profile_picture_mobile js-default"></a>

        </div>

        <!-- prifile card -->
        <div class="profile_card js-guest">
            <div class="profile_card_user_name">
                <img class="mt-2" id="profile_image" src="" alt="Profile Image"
                style="width: 50px; height:50px; border-radius:50px;">
                <p id="profile_name">Loading
                </p>
                <p><span id="profile_email">loading</span></p>
                {{-- <p id="profile_name">Mired Augustine <br>
                    <span id="profile_email">miredaugustine@gmail.com</span>
                </p> --}}
            </div>
            {{-- <div class="ms-2 pt-1">
                <h6 id="profile_name">Mired Augustine</h6>
                <h6 id="profile_email" style="font-size: small;">Miredaugustine@gmail.com</h6>
              </div> --}}
            <hr>
            <div class="accont_features">
                <p><a href="{{ url('/settings') }}">Account Setting </a></p>
                <p><a href="{{ url('/refer') }}"> Reffer a Friend </a></p>
                <p> <a href="{{ url('/privacy') }}">Privacy and Policy </a></p>
                {{-- <p><a href="#"> log out</a></p> --}}
                <p><a href="#" id="logoutLink">Log out</a></p>


            </div>

        </div>


        <!-- Carousel and Start Selling Section -->
        <div class="banner_veiw">

            <div id="carouselExampleSlidesOnly" class="carousel mycarousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="{{asset('innocent/assets/image/carousel 6.png')}}" class="d-block w-100 " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('innocent/assets/image/carousel 1.png')}}" class="d-block w-100 " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('innocent/assets/image/carousel 2.png')}}" class="d-block w-100 " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('innocent/assets/image/carousel 3.png')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('innocent/assets/image/carousel 4.png')}}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('innocent/assets/image/carousel 5.png')}}" class="d-block w-100" alt="...">
                    </div>

                </div>
            </div>
            <a href="{{ url('/start_selling') }}" class="start-selling js-auth">
                <p class="do_you">Do you have <br> anything to sell?</p>
                <img src="{{asset('innocent/assets/image/logo icon.svg')}}" alt="" style="width: 60px;">
                <p class="start_selling_p2">Start Selling</p>
            </a>

        </div>

        <!-- Sidebar and Main Body Section -->
        <div class="sidebar-container">
            <div class="sidebar">
                <!-- Filter Section -->
                <div class="filter_section">
                    <p>
                        <img src="{{asset('innocent/assets/image/filter.png')}}" alt="">
                    <p class="filter">Filter</p>
                    <p class="filter_line"></p>

                    </p>
                </div>
                <!--
            <label for="actualPrice">Actual Price in ₦</label>
            <input type="" id="actualPriceRange" min="0" max="100" value="50" step="1" oninput="adjustRange50(this)" style="display: none;">
            <input type="text" id="actualPriceInput" value="₦0" class="PriceInputWidth"  oninput="formatMoney(this)">
            <label for="minPrice">Min. Price</label>
            <input type="range" id="minPriceRange" min="0" max="200" value="100" step="1" oninput="adjustRange0(this)">
            <input type="text" id="minPriceInput" value="₦0" class="PriceInputWidth" >
            <label for="maxPrice">Max. Price</label>
            <input type="range" id="maxPriceRange" min="0" max="100" value="50" step="1" oninput="adjustRange100(this)">
            <input type="text" id="maxPriceInput" value="₦0" class="PriceInputWidth">
            <br> -->
                <!-- Product Condition -->
                <p class="product_condition_p">Product Condition</p>
                <div class="product_condition_desktop">

                    <button class="button new"  data-value="new"  onclick="toggleButton(this, 'new')">New</button>
                    <button class="button used" data-value="fairly_used" onclick="toggleButton(this, 'fairly_used')">Fairly Used</button>


                    <!-- Button trigger modal -->
                    <div data-bs-toggle="modal" data-bs-target="#location_input_modal" class="clickMe_div">
                        <p data-bs-toggle="modal" data-bs-target="#location_input_modal" id="clickMe">Lagos</p>
                        {{-- <p data-bs-toggle="modal" data-bs-target="#location_input_modal" id="clickMe" >Lagos</p> --}}
                        <i class="fa-solid fa-angle-down  angle_down" data-bs-toggle="modal"
                            data-bs-target="#location_input_modal"></i>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col d-flex">
                        <img src="{{asset('innocent/assets/image/badge.png')}}" alt="" class="verify_badge">

                        <p>verified seller</p>
                        <label class="switch">
                            <input name ="verify" type="checkbox" id="verifiedSeller">
                            {{-- <input type="checkbox"> --}}
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
                <!-- <a href="start_selling.html"><img src="{{asset('innocent/assets/image/Start selling 3.png')}}" alt="" class="start_selling_filter"></a> -->
                <a href="{{ url('/start_selling') }}" class="start_selling_div js-auth">
                    <img src="{{asset('innocent/assets/image/logo icon.svg')}}" alt="">
                    <p class="start_selling_p">
                        <span class="start_selling_span"> do you have anything to sell</span><br>
                        <span class="start_selling_span2">start selling</span>
                    </p>
                </a>
            </div>

            <!-- Main Body Section -->
            <div class="main">



                <div id="shop_number_mobile_icon" class="shop_number_mobile_icon js-auth" onclick="enter_shop_no_mobile()"><img
                        src="{{asset('innocent/assets/image/shop.svg') }}" alt=""></div>
                <div id="shop_number_mobile" class="shop_number_mobile">
                    <i class="fa-solid fa-close close_shop_no" onclick=" return_enter_shop_no_mobile()"></i>

                    <input type="text" class="form-control js- mobile-input" id="shop_no_input_mobile" placeholder="enter shop no ">

                    <img class="js-mobile-send" src="{{asset('innocent/assets/image/send 3.svg') }}" alt="" id="send"
                        onclick=" return_enter_shop_no_mobile()">
                        
                </div>


                <div id="shop_no_dekstop" class="shop js-auth" onclick="enter_shop_no()"><img
                        src="{{asset('innocent/assets/image/shop.svg') }}" alt=""></div>
                <div id="shop_no_dekstop2" class="shop3">
                
                    <i class="fa-solid fa-close close_shop_no" onclick="return_enter_shop_no()"></i>

                    <input type="text" class="form-control js-input-value" id="shop_no_input" placeholder="enter shop no ">

                    <img class="js-send" src="{{asset('innocent/assets/image/send 3.svg')}}" alt="" id="send" onclick="return_enter_shop_no()">
                    
                
                </div>
                
                
                {{-- <h5 class="category-replace  animate animate-right">Categories</h5> --}}
                <h5 class="category-replace  animate animate-right">Categories</h5>
                <h5 class="category-h5  ">Select product category
                    <span class="text-danger"><sup>*</sup></span>
                    <br><span class="text-black-50 fs-6">(choose a category to filter your search)</span>
                </h5>

                <div class="category_mobile">
                    <!-- Category Images -->
                    <a href="#" class="category-link js-auth" data-category-id="1" data-category-name="Gadgets">
                        <div class="image2">
                            <img src="{{asset('innocent/assets/image/category 1.png')}}">
                            <div class="text2">Gadgets</div>
                        </div>
                    </a>
                    <a href="#" class="category-link js-auth" data-category-id="2" data-category-name="Vehicles">
                        <div class="image2">
                            <img src="{{asset('innocent/assets/image/category 2.png')}}">
                            <div class="text2">Vehicles</div>
                        </div>
                    </a>
                    <a href="#" class="category-link js-auth" data-category-id="3" data-category-name="Houses">
                        <div class="image2">
                            <img src="{{asset('innocent/assets/image/category 3.png')}}">
                            <div class="text2">Houses</div>
                        </div>
                    </a>
                    <a href="#" class="category-link js-auth" data-category-id="4" data-category-name="Fashion">
                        <div class="image2">
                            <img src="{{asset('innocent/assets/image/category 4.png')}}">
                            <div class="text2">Fashion</div>
                        </div>
                    </a>
                    <a href="#" class="category-link js-auth" data-category-id="5" data-category-name="Jobs">
                        <div class="image2">
                            <img src="{{asset('innocent/assets/image/category 5.png')}}">
                            <div class="text2">Jobs</div>
                        </div>
                    </a>
                    <a href="#" class="category-link js-auth" data-category-id="6" data-category-name="Cosmetics">
                        <div class="image2">
                            <img src="{{asset('innocent/assets/image/category 6.png')}}">
                            <div class="text2">Cosmetics</div>
                        </div>
                    </a>
                    <a href="#" class="category-link js-auth" data-category-id="7" data-category-name="Fruits">
                            <div class="image2">
                                <img src="{{asset('innocent/assets/image/category 7.png')}}">
                                <div class="text2">Fruits</div>
                            </div>
                        </a>
                        <a href="#" class="category-link js-auth" data-category-id="8" data-category-name="Kitchen Utensils">
                            <div class="image2">
                                <img src="{{asset('innocent/assets/image/category 8.png')}}">
                                <div class="text2">Kitchen utensils</div>
                            </div>
                        </a>
                        <div class="others_mobile">
                            <a href="#" class="category-link js-auth" data-category-id="9" data-category-name="Others" class="others_mobile_link">
                                <div>

                                    <p>others</p>
                                </div>
                            </a>
                        </div>


                </div>


                <!-- Category Full Size -->
                <div class="category_desktop_container">
                    <div class="category_desktop_arrow"><i class="fa-solid fa-circle-arrow-left " id="leftArrow"></i></div>
                    <div class="category_desktop" id="imageGallery">
                        <!-- Category Images Gallery -->
                        <a href="#" class="category-link js-auth" data-category-id="1" data-category-name="Gadgets">
                            <div class="image">
                                <img src="{{asset('innocent/assets/image/category 1.png')}}">
                                <div class="text">Gadgets</div>
                            </div>
                        </a>
                        <a href="#" class="category-link js-auth" data-category-id="2" data-category-name="Vehicles">
                            <div class="image">
                                <img src="{{asset('innocent/assets/image/category 2.png')}}">
                                <div class="text">Vehicles</div>
                            </div>
                        </a>
                        <a href="#" class="category-link js-auth" data-category-id="3" data-category-name="Houses">
                            <div class="image">
                                <img src="{{asset('innocent/assets/image/category 3.png')}}">
                                <div class="text">Houses</div>
                            </div>
                        </a>
                        <a href="#" class="category-link js-auth" data-category-id="4" data-category-name="Fashion">
                            <div class="image">
                                <img src="{{asset('innocent/assets/image/category 4.png')}}">
                                <div class="text">Fashion</div>
                            </div>
                        </a>
                        <a href="#" class="category-link js-auth" data-category-id="5" data-category-name="Jobs">
                            <div class="image">
                                <img src="{{asset('innocent/assets/image/category 5.png')}}">
                                <div class="text">Jobs</div>
                            </div>
                        </a>
                        <a href="#" class="category-link js-auth" data-category-id="6" data-category-name="Cosmetics">
                            <div class="image">
                                <img src="{{asset('innocent/assets/image/category 6.png')}}">
                                <div class="text">Cosmetics</div>
                            </div>
                        </a>
                        <a href="#" class="category-link js-auth" data-category-id="7" data-category-name="Fruits">
                            <div class="image">
                                <img src="{{asset('innocent/assets/image/category 7.png')}}">
                                <div class="text">Fruits</div>
                            </div>
                        </a>
                        <a href="#" class="category-link js-auth" data-category-id="8" data-category-name="Kitchen Utensils">
                            <div class="image">
                                <img src="{{asset('innocent/assets/image/category 8.png')}}">
                                <div class="text">Kitchen Utensils</div>
                            </div>
                        </a>
                        <a href="#" class="category-link js-auth" data-category-id="9" data-category-name="Others" class="link">
                            <div class="image others">
                                <p>Others</p>
                            </div>
                        </a>
                    </div>
                    <div class="category_desktop_arrow"><i class="fa-solid fa-circle-arrow-right " id="rightArrow"></i></div>
                </div>


                <a class="js-auth" href="{{ url('/start_selling') }}">
                    <div class="startselling2">
                        <img src="{{asset('innocent/assets/image/logo icon.svg')}}" alt="">
                        <p>Start Selling</p>
                    </div>
                </a>
                {{-- <h5 class="top_sales  animate animate-right">Top Sales</h5> --}}
                <h5 class="top_sales  animate animate-right">Top Sales</h5>

                <!-- Product Cards -->
                <div class="product_card_container top_sales_margin">

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
                <div class="promotion">
                    <img src="{{asset('innocent/assets/image/Annoucement.png')}}" alt="" class="Annoucement">
                    <p>
                        <img src="{{asset('innocent/assets/image/transparent_logo.png')}}" alt=""
                            class="buy_and_sell_logo_promotion"><br><br>
                        <img src="{{asset('innocent/assets/image/Annoucement.png')}}" alt="" class="Annoucement2">
                        <strong>Reach more audience by promoting your Product(s)</strong><br>
                        Get an active badge by becoming a verified seller <br> and enjoy multiple benefits that comes with being a verified seller
                        <br><br><br>
                        <a class="js-become-link" href="/become"><button class="get_started animate animate-pulse4">Get
                            Started</button></a>
                        {{-- <strong>Reach more audience by promoting your Product(s)</strong><br>
                        determine your target audience location, interest, <br> select a
                        convenient budget and duration
                        <br><br><br> 
                         <button class="get_started animate animate-pulse4" onclick="showCard_get_started()">Get
                            Started</button> --}}
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
                                <div class="product_card_display card-margin content-margin mt-4" id="productCardDisplay2">


                                    {{-- <a href="{{ url('/product_des') }}" class="product_card_link">
                                        <div class="card product_card">
                                            <h6 class="sold"> Sold 35 <br> <img src="innocent/assets/image/Rate.png"
                                                    alt=""> 4.0</h6>
                                            <img src="innocent/assets/image/pexels-pixabay-164558.jpg"
                                                class="card-img-top w-100 product_image" alt="...">

                                            <div class="product_card_title">
                                                <div class="main_and_promo_price_area">
                                                    <p class="promo_price">$100,000,000</p>
                                                    <div class="main_price">
                                                        <p class="main_price_amount">$120,000,000</p>
                                                    </div>

                                                </div>


                                                <p class="product_name">3 Bed Room Flat</p>
                                                <span class="product_card_location"><i
                                                        class="fa-solid fa-location-dot"></i> Abuja</span>
                                                <img src="innocent/assets/image/badge.png" alt="">
                                                <span class="connect"><strong>connect</strong></span>

                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ url('/product_des') }}" class="product_card_link">
                                        <div class="card product_card">
                                            <h6 class="sold"> Sold 7 <br> <img src="innocent/assets/image/Rate.png"
                                                    alt=""> 3.6</h6>
                                            <img src="innocent/assets/image/felipe-simo-dWQDNyPfKPU-unsplash.jpg"
                                                class="card-img-top w-100 product_image" alt="...">

                                            <div class="product_card_title">
                                                <div class="main_and_promo_price_area">
                                                    <p class="promo_price">$500,000</p>
                                                    <div class="main_price">
                                                        <p class="main_price_amount">$520,000</p>
                                                    </div>

                                                </div>


                                                <p class="product_name">Mercedes-Benz M Class ML 350 4Matic 2012 Silver
                                                </p>
                                                <span class="product_card_location"><i
                                                        class="fa-solid fa-location-dot"></i> Abuja</span>
                                                <img src="innocent/assets/image/logo icon.svg" alt="">
                                                <span class="connect"><strong>connect</strong></span>

                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ url('/product_des') }}" class="product_card_link">
                                        <div class="card product_card">
                                            <h6 class="sold"> Sold 175 <br> <img src="innocent/assets/image/Rate.png"
                                                    alt=""> 3.6</h6>
                                            <img src="innocent/assets/image/laptop.jpg"
                                                class="card-img-top w-100 product_image" alt="...">

                                            <div class="product_card_title">

                                                <div class="main_and_promo_price_area">
                                                    <div class="ask_for_price">Ask for price</div>

                                                </div>
                                                <p class="product_name">Laptop Apple MacBook Pro 2015 8GB</p>
                                                <span class="product_card_location"><i
                                                        class="fa-solid fa-location-dot"></i> Ilorin</span>
                                                <img src="innocent/assets/image/logo icon.svg" alt="">
                                                <span class="connect"><strong>connect</strong></span>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="{{ url('/product_des') }}" class="product_card_link">
                                        <div class="card product_card">
                                            <h6 class="sold"> Sold 75 <br> <img src="innocent/assets/image/Rate.png"
                                                    alt=""> 5.0</h6>
                                            <img src="innocent/assets/image/Picture of product.png"
                                                class="card-img-top w-100 product_image" alt="...">

                                            <div class="product_card_title">

                                                <div class="main_and_promo_price_area">
                                                    <div class="ask_for_price">Ask for price</div>

                                                </div>
                                                <p class="product_name">Photographer</p>
                                                <span class="product_card_location"><i
                                                        class="fa-solid fa-location-dot"></i> Lagos</span>
                                                <img src="innocent/assets/image/logo icon.svg" alt="">
                                                <span class="connect"><strong>connect</strong></span>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ url('/product_des') }}" class="product_card_link">
                                        <div class="card product_card">
                                            <h6 class="sold"> Sold 95 <br> <img src="innocent/assets/image/Rate.png"
                                                    alt=""> 3.6</h6>
                                            <img src="innocent/assets/image/laptop2.jpg"
                                                class="card-img-top w-100 product_image" alt="...">

                                            <div class="product_card_title">

                                                <div class="main_and_promo_price_area">
                                                    <p class="promo_price">$70,000</p>
                                                    <div class="main_price">
                                                        <p class="main_price_amount">$82,000</p>
                                                    </div>

                                                </div>
                                                <p class="product_name">Lenovo 600gb Finger Print 2020</p>
                                                <span class="product_card_location"><i
                                                        class="fa-solid fa-location-dot"></i> Lagos</span>
                                                <img src="innocent/assets/image/logo icon.svg" alt="">
                                                <span class="connect"><strong>connect</strong></span>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="{{ url('/product_des') }}" class="product_card_link">
                                        <div class="card product_card">
                                            <h6 class="sold"> Sold 70 <br> <img src="innocent/assets/image/Rate.png"
                                                    alt=""> 3.0</h6>
                                            <img src="innocent/assets/image/usb-flash-drive-mockup-technology-data-storage-device.jpg"
                                                class="card-img-top w-100 product_image" alt="...">

                                            <div class="product_card_title">

                                                <div class="main_and_promo_price_area">
                                                    <p class="promo_price">$500</p>
                                                    <div class="main_price">
                                                        <p class="main_price_amount">$550</p>
                                                    </div>

                                                </div>
                                                <p class="product_name">USB Type C OTG Card Reader</p>
                                                <span class="product_card_location"><i
                                                        class="fa-solid fa-location-dot"></i> Lagos</span>
                                                <img src="innocent/assets/image/logo icon.svg" alt="">
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
                <div  class="tell_us_what_u_want animate animate-left  js-auth">
                    <p class="tell_us_paragraph js-change-to-input js-auth" >
                        <img src="{{asset('innocent/assets/image/pen.png')}}" alt="" class="pen">
                        Can't find what you are looking for?
                        <span>Tell us what it is!</span><br>
                        and we'll do our best to assist you.
                    </p>
                </div>

                <div class="tell_us_what_u_want_input_area">
                    <img src="" alt="" class="tell_us_what_u_want_profile js-tell-us">
                    <div class="vertical_bar"></div>
                    <input type="text" name="details" class="tell_us_input js-tell-us-input" placeholder="write the details of what you are searching for">
                    <button class="send js-send-input js-auth">send</button>

                </div>
                <p class="submmited">submmited✅</p>
                <div class="loader" class="loader"></div>

            </div>
        </div>

        <!-- Footer Section -->
        <div class="footer_contanier">
            <div>
                <img class="main-logo" src="{{asset('innocent/assets/image/transparent_logo.png')}}" alt="">
            </div>
            <nav class="footer_links">
                <a class="js-become-link" href="{{ url('/about') }}">About Us</a>
                <a class="js-become-link" href="">Terms and condition</a>
                <a class="js-become-link js-help" href="">Help desk</a>
                <a class="js-become-link" href="{{ url('/privacy')}}">Privacy</a>
                {{-- <a href="">Report a seller</a> --}}
            </nav>
            <div class="footer_icons">
                <a class="js-become" href="https://web.facebook.com/loopmart/"><img src="{{asset('innocent/assets/image/facebook.png')}}" alt=""></a>
                <img src="{{asset('innocent/assets/image/twitter.png')}}" alt="">
                <img src="{{asset('innocent/assets/image/linkedin.png')}}" alt="">
                <a class="js-become" href="mailto:info@gmail.com.ng"><img src="{{asset('innocent/assets/image/message.png')}}" alt=""></a>

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="signup_login-modal" class="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog">
                <div class="modal-content modal_content_signup_login">


                    <div class="sign_up_modal">
                        <i class="fa-solid fa-close close_modal_content_signup_login" data-bs-dismiss="modal"
                            aria-label="Close"> </i>

                        <h5 id="sign_up">Sign Up</h5>
                        <p>Welcome to</p>
                        <img src="{{asset('innocent/assets/image/transparent_logo.png')}}" alt="" width="150px">
                        <!-- Sign Up Form -->

                        <div class="form-group">
                            <label for="email" class="form-label"></label>
                            <input required type="email" class="form-control input_field" id="signup_email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <p class="showPasswordBtn"> <i class="fa-solid fa-eye"></i></p>
                            <label for="password" class="form-label"></label>
                            <input required type="password" class="form-control password_inputs input_field" id="signup_password" placeholder="Password">
                        </div>

                        <p id="or_sign_up_using">or sign up using</p>
                        <br><br>
                        <hr>
                        <div class="auth_icons">
                            <div class="facebook_icon" style="cursor: pointer;">
                                <img src="{{asset('innocent/assets/image/Facebook Logo.png')}}" alt="">
                            </div>
                            <div class="gmail_icon" style="cursor: pointer;">
                                <img src="{{asset('innocent/assets/image/gmail.png')}}" alt="">
                            </div>
                        </div>
                        <p>Already have an account? <a href="#" onclick="login()" class="signup_links">Login</a></p>
                        <button class="signup_continue_button continueBtn" onclick="signup()">continue</button>
                        <p>By signing up you accept <span><a  class="signup_links" href="">Our Terms and Policy</a></span></p>

                    </div>


                    <div id="loginModal" class="login_modal" style="display: none;">

                        <i class="fa-solid fa-close close_modal_content_signup_login" data-bs-dismiss="modal"
                            aria-label="Close"> </i>
                        <h5 id="sign_up">Log in</h5>
                        <p>Welcome back to</p>
                        <img src="{{asset('innocent/assets/image/transparent_logo.png')}}" alt="" width="150px">
                        <!-- Login Form -->

                        <div class="form-group">
                            <label for="email" class="form-label"></label>
                            <input required type="email" class="form-control input_field" id="login_email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <p class="showPasswordBtn"> <i class="fa-solid fa-eye"></i></p>
                            <label for="password" class="form-label"></label>
                            <input required type="password" class="form-control password_inputs input_field" id="login_password"
                                placeholder="Password">

                        </div>
                        <p class="forget_password_login" onclick="showResetPassword()">Forgot password</p>
                        <p id="or_login_using" >or Login using</p><br>
                        <hr>
                        <div class="auth_icons">
                            <div class="facebook_icon" style="cursor: pointer;">
                                <img src="{{asset('innocent/assets/image/Facebook Logo.png')}}" alt="">
                            </div>
                            <div class="gmail_icon" style="cursor: pointer;">
                                <img src="{{asset('innocent/assets/image/gmail.png')}}" alt="">
                            </div>
                        </div>
                        <button class="signup_continue_button continueBtn" onclick="loginUser()">continue</button>
                        <p style="margin-top: 20px;">Don't have an account? <span><a href="#" onclick="showSignUpModal()"
                                    class="signup_links">Sign up</a></span></p>

                    </div>




                    <div class="resetpassword" style="display: none;">

                        <i class="fa-solid fa-close close_modal_content_signup_login" data-bs-dismiss="modal"
                            aria-label="Close"> </i>
                        <h5 id="sign_up">Reset</h5>
                        <p class="forgot_password"> <span class="forgot_password_head">Forgot your password? </span>
                            <br>
                            enter the email address that is associated with your account and we'll send you a link to
                            reset your password.
                        </p>
                        <div class="reset_email">
                            <div class="form-group">
                                <label for="email" class="form-label"></label>
                                <input required type="email" class="form-control input_field" id="reset_email" placeholder="Email">
                            </div>
                        </div>
                        <button class="signup_continue_button" onclick="sendResetOtp()">Request Reset Password
                            link</button>
                        <p class="already_have_an_account">Already have an account? <span><a href="#" onclick="login2()"
                                    class="signup_links">Login</a></span></p>

                    </div>


                    <!-- Verify OTP Modal -->
{{-- <div class="modal fade" id="verifyOtpModal" tabindex="-1" role="dialog" aria-labelledby="verifyOtpModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="sign_up">Verify OTP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="forgot_password"><span class="forgot_password_head">Enter the OTP sent to your email</span></p>
                <div class="reset_email">
                    <div class="form-group">
                        <label for="otp" class="form-label"></label>
                        <input type="text" class="form-control input_field" id="otp" placeholder="Enter OTP">
                    </div>
                </div>
                <button class="signup_continue_button" onclick="verifyOtp()">Verify OTP</button>
            </div>
        </div>
    </div>
</div> --}}


                    <div class="chagepassword" id="changepassword" style="display: none;">

                        <p class="type_new_password"> <span class="type_new_password_head">Hi, Welcome Back </span> <br>
                            type in your new password
                        </p>
                        <div class="form-group">
                            <p class="showPasswordBtn"> <i class="fa-solid fa-eye "></i></p>
                            <label for="newPassword" class="form-label"></label>
                            <input type="password"
                                class="form-control password_inputs reset_password_inputs input_field" id="newPassword"
                                placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <p class="showPasswordBtn"> <i class="fa-solid fa-eye "></i></p>
                            <label for="confirmPassword" class="form-label"></label>
                            <input type="password"
                                class="form-control password_inputs reset_password_inputs input_field"
                                id="confirmPassword" placeholder="Confirm New Password">
                        </div>
                        <button
                            class="signup_continue_button change_password_button continueBtn continueBtn_error" onclick="resetPassword()">Continue</button>
                        <p>Already have an account? <span><a href="#" onclick="login3()" class="signup_links">Login</a></span></p>

                    </div>

                </div>
            </div>

        </div>

          {{-- OTP MODAL --}}
        <!-- OTP Verification Modal -->
<div style="display: none;" class="modal fade" id="verifyOtpModal" tabindex="-1" role="dialog" aria-labelledby="verifyOtpModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 id="sign_up">Verify OTP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<div class="modal-body">
    <div class="reset_email">
        <div class="form-group">
            <label for="otp" class="form-label"></label>
            <input required type="text" class="form-control input_field" id="otp" placeholder="Enter OTP">
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="signup_continue_button" onclick="verifyOtp()">Verify OTP</button>
</div>
</div>
</div>
</div>
        {{-- END OF OTP MODAL --}}


    </div>
    <!-- index end -->



    <!--
        notification codes -->

    <div class="notification_main" id="notification_main" onclick="show_notification2()">
        <!-- Navbar and Search Button -->

        <p class="notification_indicator">
            <img class="notification-icon" src="{{asset('innocent/assets/image/notification.svg')}}" alt="">
            <span>notification(<span  class="indicator-span text-danger">0</span>)</span>


        </p>

        <div class="notifications_region">
            <div class="notifications_layout">

            </div>
           

            {{-- <a href="{{ url('rating') }}" >
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

            <a href="{{ url('rating') }}">
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

            <a href="{{ url('rating') }}">
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

            <a href="{{ url('rating') }}">
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

            <a href="{{ url('rating') }}">
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

            <a href="{{ url('rating') }}">
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
            <a href="{{ url('rating') }}">
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




    <div class="location_input_modal">

        <!-- Modal -->
        <div class="modal fade" id="location_input_modal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollabled">
                <div class="modal-content modal_content">
                    <div class="location_search_area">

                        <i class="fa-solid fa-angle-left close_location" data-bs-dismiss="modal" aria-label="Close"></i>
                        <div class="space"></div>
                        <div class="location_search_input_area">
                            <i class="fa-solid fa-location-dot"></i>

                            <input type="text" class="locationInput" placeholder="Enter your city location"
                                oninput="filterStates(this.value)">
                            <i class="fa-solid fa-search"></i>
                        </div>
                    </div>
                    <div class="state_selection" id="stateSelection">
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Abakaliki')">Abakaliki
                        </p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Aba')">Aba</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Abeokuta')">Abeokuta</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Abuja')">Abuja</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Ado Ekiti')">Ado Ekiti
                        </p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Akure')">Akure</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Asaba')">Asaba</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Awka')">Awka</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Bauchi')">Bauchi</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Benin City')">Benin City
                        </p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Birnin Kebbi')">Birnin
                            Kebbi</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Calabar')">Calabar</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Damaturu')">Damaturu</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Delta')">Delta</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Dutse')">Dutse</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Edo')">Edo</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Ekiti')">Ekiti</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Enugu')">Enugu</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Gombe')">Gombe</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Gusau')">Gusau</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Ibadan')">Ibadan</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Ikeja')">Ikeja</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Ilorin')">Ilorin</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Imo')">Imo</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Jalingo')">Jalingo</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Jos')">Jos</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Kaduna')">Kaduna</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Kano')">Kano</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Katsina')">Katsina</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Lafia')">Lafia</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Lagos')">Lagos</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Lokoja')">Lokoja</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Maiduguri')">Maiduguri
                        </p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Makurdi')">Makurdi</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Minna')">Minna</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Ogun')">Ogun</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Owerri')">Owerri</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Owere')">Owere</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Port Harcourt')">Port
                            Harcourt</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Sokoto')">Sokoto</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Umuahia')">Umuahia</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Uyo')">Uyo</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Yenagoa')">Yenagoa</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Yola')">Yola</p>
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Zaria')">Zaria</p>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <!-- Modal -->
    <div class="modal fade" id="tell_us_what_u_want_input_condition" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    <script src="{{ asset('innocent/assets/js/notification.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/search.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/script.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/animation.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/location.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/modal.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/preloader.js') }}"></script>
    


 <script  src="{{ asset('backend-js/user/auth.js') }}"></script>
 <script type="module" src="{{ asset('backend-js/index.js') }}"></script>
 <script type="module"  src="{{ asset('backend-js/notification.js') }}"></script>

    
</body>

</html>

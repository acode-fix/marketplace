<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarketPlace</title>
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/notification.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/location.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/fontawesome.min.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



</head>
<script>

</script>
<style>

</style>

<body>


    <div id="scrollToTop"><i class="fa-solid fa-arrow-up"></i></div>
    <div id="index">


        <!-- Navbar and Search Button -->
        <div class="navbar-1 fixed-top">
            <img src="innocent/assets/image/main logo.svg" class="buy_and_sell_logo" alt="" data-bs-toggle="modal" data-bs-target="#signup_login-modal">

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
                    <span onclick="localStorage.setItem('previousPage', '{{ url('/') }}')">
                        <input type="text" placeholder="Find what to buy..." class="find-what-to-buy">
                        <button type="button" class="search">Search</button>
                    </span>
                </a>
            </div>
            <div id="notification_icon_div"><img src="innocent/assets/image/notification.png" alt="Logo"
                    id="notification_icon"></div>
            <div id="notification_icon_div2"> <a href="{{ url('/notification_mobile') }}"><img
                        src="innocent/assets/image/notification.png" alt="Logo"></a></div>

            <div><img id="profile_picture" src="" alt=".profile picture " class="profile_picture"></div>
            <a href="{{ url('/settings') }}">
                <img id="profile_picture_mobile" src="" alt=".profile picture "
                    class="profile_picture_mobile"></a>

        </div>

        <!-- prifile card -->
        <div class="profile_card">
            <div class="profile_card_user_name">
                <img id="profile_image" src="" alt="Profile Image"
                style="width: 80px; height:80px; border-radius:50px">
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
                        <img src="innocent/assets/image/carousel 6.png" class="d-block w-100 " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="innocent/assets/image/carousel 1.png" class="d-block w-100 " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="innocent/assets/image/carousel 2.png" class="d-block w-100 " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="innocent/assets/image/carousel 3.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="innocent/assets/image/carousel 4.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="innocent/assets/image/carousel 5.png" class="d-block w-100" alt="...">
                    </div>

                </div>
            </div>
            <a href="{{ url('/start_selling') }}" class="start-selling">
                <p class="do_you">Do you have <br> anything to sell?</p>
                <img src="innocent/assets/image/logo icon.svg" alt="" style="width: 60px;">
                <p class="start_selling_p2">Start Selling</p>
            </a>

        </div>

        <!-- Sidebar and Main Body Section -->
        <div class="sidebar-container">
            <div class="sidebar">
                <!-- Filter Section -->
                <div class="filter_section">
                    <p>
                        <img src="innocent/assets/image/filter.png" alt="">
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

                    <button class="button new" onclick="toggleButton(this, 'new')">New</button>
                    <button class="button used" onclick="toggleButton(this, 'fairly used')">Fairly Used</button>


                    <!-- Button trigger modal -->
                    <div data-bs-toggle="modal" data-bs-target="#location_input_modal" class="clickMe_div">
                        <p data-bs-toggle="modal" data-bs-target="#location_input_modal" id="clickMe" onclick="applyFilter()">Lagos</p>
                        {{-- <p data-bs-toggle="modal" data-bs-target="#location_input_modal" id="clickMe" >Lagos</p> --}}
                        <i class="fa-solid fa-angle-down  angle_down" data-bs-toggle="modal"
                            data-bs-target="#location_input_modal"></i>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col d-flex">
                        <img src="innocent/assets/image/badge.png" alt="" class="verify_badge">

                        <p>verified seller</p>
                        <label class="switch">
                            <input type="checkbox" id="verifiedSeller" onclick="applyFilter()">
                            {{-- <input type="checkbox"> --}}
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
                <!-- <a href="start_selling.html"><img src="innocent/assets/image/Start selling 3.png" alt="" class="start_selling_filter"></a> -->
                <a href="{{ url('/start_selling') }}" class="start_selling_div">
                    <img src="innocent/assets/image/logo icon.svg" alt="">
                    <p class="start_selling_p">
                        <span class="start_selling_span"> do you have anything to sell</span><br>
                        <span class="start_selling_span2">start selling</span>
                    </p>
                </a>
            </div>

            <!-- Main Body Section -->
            <div class="main">



                <div id="shop_number_mobile_icon" class="shop_number_mobile_icon" onclick="enter_shop_no_mobile()"><img
                        src="innocent/assets/image/shop.svg" alt=""></div>
                <div id="shop_number_mobile" class="shop_number_mobile">
                    <i class="fa-solid fa-close close_shop_no" onclick=" return_enter_shop_no_mobile()"></i>

                    <input type="text" class="form-control" id="shop_no_input_mobile" placeholder="enter shop no ">

                    <img src="innocent/assets/image/send 3.svg" alt="" id="send"
                        onclick=" return_enter_shop_no_mobile()">
                </div>


                <div id="shop_no_dekstop" class="shop" onclick="enter_shop_no()"><img
                        src="innocent/assets/image/shop.svg" alt=""></div>
                <div id="shop_no_dekstop2" class="shop3">
                    <i class="fa-solid fa-close close_shop_no" onclick=" return_enter_shop_no()"></i>

                    <input type="text" class="form-control" id="shop_no_input" placeholder="enter shop no ">

                    <img src="innocent/assets/image/send 3.svg" alt="" id="send" onclick=" return_enter_shop_no()">
                </div>


                <h5 class="category-replace  animate animate-right">Categories</h5>
                <h5 class="category-h5  ">Select product category
                    <span class="text-danger"><sup>*</sup></span>
                    <br><span class="text-black-50 fs-6">(choose a category to filter your search)</span>
                </h5>

                <div class="category_mobile">
                    <!-- Category Images -->
                    <a href="#" class="category-link" data-category-id="1" data-category-name="Gadgets">
                        <div class="image2">
                            <img src="innocent/assets/image/category 1.png">
                            <div class="text2">Gadgets</div>
                        </div>
                    </a>
                    <a href="#" class="category-link" data-category-id="2" data-category-name="Vehicles">
                        <div class="image2">
                            <img src="innocent/assets/image/category 2.png">
                            <div class="text2">Vehicles</div>
                        </div>
                    </a>
                    <a href="#" class="category-link" data-category-id="3" data-category-name="Houses">
                        <div class="image2">
                            <img src="innocent/assets/image/category 3.png">
                            <div class="text2">Houses</div>
                        </div>
                    </a>
                    <a href="#" class="category-link" data-category-id="4" data-category-name="Fashion">
                        <div class="image2">
                            <img src="innocent/assets/image/category 4.png">
                            <div class="text2">Fashion</div>
                        </div>
                    </a>
                    <a href="#" class="category-link" data-category-id="5" data-category-name="Jobs">
                        <div class="image2">
                            <img src="innocent/assets/image/category 5.png">
                            <div class="text2">Jobs</div>
                        </div>
                    </a>
                    <a href="#" class="category-link" data-category-id="6" data-category-name="Cosmetics">
                        <div class="image2">
                            <img src="innocent/assets/image/category 6.png">
                            <div class="text2">Cosmetics</div>
                        </div>
                    </a>
                    <a href="#" class="category-link" data-category-id="7" data-category-name="Fruits">
                            <div class="image2">
                                <img src="innocent/assets/image/category 7.png">
                                <div class="text2">Fruits</div>
                            </div>
                        </a>
                        <a href="#" class="category-link" data-category-id="8" data-category-name="Kitchen Utensils">
                            <div class="image2">
                                <img src="innocent/assets/image/category 8.png">
                                <div class="text2">Kitchen utensils</div>
                            </div>
                        </a>
                        <div class="others_mobile">
                            <a href="#" class="category-link" data-category-id="9" data-category-name="Others" class="others_mobile_link">
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
                        <a href="#" class="category-link" data-category-id="1" data-category-name="Gadgets">
                            <div class="image">
                                <img src="innocent/assets/image/category 1.png">
                                <div class="text">Gadgets</div>
                            </div>
                        </a>
                        <a href="#" class="category-link" data-category-id="2" data-category-name="Vehicles">
                            <div class="image">
                                <img src="innocent/assets/image/category 2.png">
                                <div class="text">Vehicles</div>
                            </div>
                        </a>
                        <a href="#" class="category-link" data-category-id="3" data-category-name="Houses">
                            <div class="image">
                                <img src="innocent/assets/image/category 3.png">
                                <div class="text">Houses</div>
                            </div>
                        </a>
                        <a href="#" class="category-link" data-category-id="4" data-category-name="Fashion">
                            <div class="image">
                                <img src="innocent/assets/image/category 4.png">
                                <div class="text">Fashion</div>
                            </div>
                        </a>
                        <a href="#" class="category-link" data-category-id="5" data-category-name="Jobs">
                            <div class="image">
                                <img src="innocent/assets/image/category 5.png">
                                <div class="text">Jobs</div>
                            </div>
                        </a>
                        <a href="#" class="category-link" data-category-id="6" data-category-name="Cosmetics">
                            <div class="image">
                                <img src="innocent/assets/image/category 6.png">
                                <div class="text">Cosmetics</div>
                            </div>
                        </a>
                        <a href="#" class="category-link" data-category-id="7" data-category-name="Fruits">
                            <div class="image">
                                <img src="innocent/assets/image/category 7.png">
                                <div class="text">Fruits</div>
                            </div>
                        </a>
                        <a href="#" class="category-link" data-category-id="8" data-category-name="Kitchen Utensils">
                            <div class="image">
                                <img src="innocent/assets/image/category 8.png">
                                <div class="text">Kitchen Utensils</div>
                            </div>
                        </a>
                        <a href="#" class="category-link" data-category-id="9" data-category-name="Others" class="link">
                            <div class="image others">
                                <p>Others</p>
                            </div>
                        </a>
                    </div>
                    <div class="category_desktop_arrow"><i class="fa-solid fa-circle-arrow-right " id="rightArrow"></i></div>
                </div>


                <a href="{{ url('/start_selling') }}">
                    <div class="startselling2">
                        <img src="innocent/assets/image/logo icon.svg" alt="">
                        <p>Start Selling</p>
                    </div>
                </a>
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
                    <img src="innocent/assets/image/Annoucement.png" alt="" class="Annoucement">
                    <p>
                        <img src="innocent/assets/image/main logo.svg" alt=""
                            class="buy_and_sell_logo_promotion"><br><br>
                        <img src="innocent/assets/image/Annoucement.png" alt="" class="Annoucement2">
                        <strong>Reach more audience by promoting your Product(s)</strong><br>
                        determine your target audience location, interest, <br> select a
                        convenient budget and duration
                        <br><br><br>
                        <button class="get_started animate animate-pulse4" onclick="showCard_get_started()">Get
                            Started</button>
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
                <p class="submmited">submmited✅</p>
                <div class="loader" class="loader"></div>

            </div>
        </div>

        <!-- Footer Section -->
        <div class="footer_contanier">
            <!-- <div>
                <img src="innocent/logo.png" alt="">
            </div> -->
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
        <div class="modal fade" id="signup_login-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog">
                <div class="modal-content modal_content_signup_login">


                    <div class="sign_up_modal">
                        <i class="fa-solid fa-close close_modal_content_signup_login" data-bs-dismiss="modal"
                            aria-label="Close"> </i>

                        <h5 id="sign_up">Sign Up</h5>
                        <p>Welcome to</p>
                        <img src="innocent/assets/image/main logo.svg" alt="" width="150px">
                        <!-- Sign Up Form -->

                        <div class="form-group">
                            <label for="email" class="form-label"></label>
                            <input type="email" class="form-control input_field" id="signup_email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <p class="showPasswordBtn"> <i class="fa-solid fa-eye"></i></p>
                            <label for="password" class="form-label"></label>
                            <input type="password" class="form-control password_inputs input_field" id="signup_password" placeholder="Password">
                        </div>

                        <p id="or_sign_up_using">or sign up using</p>
                        <br><br>
                        <hr>
                        <div class="auth_icons">
                            <div class="facebook_icon" style="cursor: pointer;">
                                <img src="innocent/assets/image/Facebook Logo.png" alt="">
                            </div>
                            <div class="gmail_icon" style="cursor: pointer;">
                                <img src="innocent/assets/image/gmail.png" alt="">
                            </div>
                        </div>
                        <p>Already have an account? <a href="#" onclick="login()" class="signup_links">Login</a></p>
                        <button class="signup_continue_button continueBtn" onclick="signup()">continue</button>
                        <p>By signing up you accept <span class="signup_links">Our Terms and Policy</span></p>

                    </div>


                    <div id="loginModal" class="login_modal" style="display: none;">

                        <i class="fa-solid fa-close close_modal_content_signup_login" data-bs-dismiss="modal"
                            aria-label="Close"> </i>
                        <h5 id="sign_up">Log in</h5>
                        <p>Welcome back to</p>
                        <img src="innocent/assets/image/main logo.svg" alt="" width="150px">
                        <!-- Login Form -->

                        <div class="form-group">
                            <label for="email" class="form-label"></label>
                            <input type="email" class="form-control input_field" id="login_email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <p class="showPasswordBtn"> <i class="fa-solid fa-eye"></i></p>
                            <label for="password" class="form-label"></label>
                            <input type="password" class="form-control password_inputs input_field" id="login_password"
                                placeholder="Password">

                        </div>
                        <p class="forget_password_login" onclick="showResetPassword()">Forgot password</p>
                        <p id="or_login_using" >or Login using</p><br>
                        <hr>
                        <div class="auth_icons">
                            <div class="facebook_icon" style="cursor: pointer;">
                                <img src="innocent/assets/image/Facebook Logo.png" alt="">
                            </div>
                            <div class="gmail_icon" style="cursor: pointer;">
                                <img src="innocent/assets/image/gmail.png" alt="">
                            </div>
                        </div>
                        <button class="signup_continue_button continueBtn" onclick="loginuser()">continue</button>
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
                                <input type="email" class="form-control input_field" id="reset_email" placeholder="Email">
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

                        <p class="type_new_password"> <span class="type_new_password_head">Hi Henry Great </span> <br>
                            type in your new password
                        </p>
                        <div class="form-group">
                            <p class="showPasswordBtn"> <i class="fa-solid fa-eye"></i></p>
                            <label for="newPassword" class="form-label"></label>
                            <input type="password"
                                class="form-control password_inputs reset_password_inputs input_field" id="newPassword"
                                placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <p class="showPasswordBtn"> <i class="fa-solid fa-eye"></i></p>
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
            <input type="text" class="form-control input_field" id="otp" placeholder="Enter OTP">
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
            <img src="innocent/assets/image/notification.png" alt="">
            <span>notification(<span>0</span>)</span>


        </p>

        <div class="notifications_region">

            <a href="{{ url('rating') }}" >
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



    {{-- AXIOUS JAVASCRIPT --}}
    <script>

        // Sign UP PAGE
function signup() {
    const email = document.getElementById("signup_email").value;
    const password = document.getElementById("signup_password").value;

    axios.post('/api/auth/register', {
        email: email,
        password: password,
        password_confirmation: password
    })
    .then(function (response) {
        const responseData = response.data;

        if (responseData.status) {
            // Store the token in localStorage
            localStorage.setItem('apiToken', responseData.token);


            //alert(responseData.token);

            // Set the token in Axios default headers for subsequent requests
            axios.defaults.headers.common['Authorization'] = `Bearer ${responseData.token}`;

            Swal.fire({
                icon: 'success',
                title: 'Registration Successful',
                text: responseData.message,
                willClose: () => {
                    login(); // Redirect to dashboard or desired page
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Registration Failed',
                text: 'Unexpected response from the server. Please try again later.'
            });
        }
    })
    .catch(function (error) {
        const errorData = error.response.data;

        if (error.response.status === 422) {
            // Validation error response from the server
            const validationErrors = errorData.errors;
            let errorMessage = 'Validation Errors:\n';
            for (let field in validationErrors) {
                errorMessage += `${validationErrors[field].join(' ')}\n`;
            }
            Swal.fire({
                icon: 'error',
                title: 'Registration Failed',
                text: errorMessage
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Registration Failed',
                text: errorData.message || 'There was an error while registering. Please try again later.'
            });
        }
    });
}

// Axios interceptor to set the Authorization header for all requests
axios.interceptors.request.use(
    function (config) {
        const token = localStorage.getItem('apiToken');
        if (token) {
            config.headers['Authorization'] = `Bearer ${token}`;
        }
        return config;
    },
    function (error) {
        return Promise.reject(error);
    }
);



function loginuser() {
    const email = document.getElementById("login_email").value;
    const password = document.getElementById("login_password").value;

    axios.post('/api/auth/login', {
        email: email,
        password: password
    })
    .then(function (response) {
        const responseData = response.data;

        if (responseData.status) {
            // Store the token in localStorage
            localStorage.setItem('apiToken', responseData.data.token);
            //    console.log(responseData.data.token);
            // // alert(localStorage.getItem('apiToken'));
            // // return;
            // alert(responseData.data.token);
            //  return;

            // Set the token in Axios default headers for subsequent requests
            axios.defaults.headers.common['Authorization'] = `Bearer ${responseData.data.token}`;

            Swal.fire({
                icon: 'success',
                title: 'Login Successful',
                text: responseData.message,
                willClose: () => {
                    window.location.href = '/';; // Redirect to dashboard or desired page
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: 'Unexpected response from the server. Please try again later.'
            });
        }
    })
    .catch(function (error) {
        const errorData = error.response.data;

        Swal.fire({
            icon: 'error',
            title: 'Login Failed',
            text: errorData.message || 'There was an error while logging in. Please try again later.'
        });
    });
}

// Axios interceptor to set the Authorization header for all requests
axios.interceptors.request.use(
    function (config) {
        const token = localStorage.getItem('apiToken');
        if (token) {
            config.headers['Authorization'] = `Bearer` + token;
        }
        return config;
    },
    function (error) {
        return Promise.reject(error);
    }
);



// Function to handle password reset request
// Function to send reset OTP
function sendResetOtp() {
    const email = document.getElementById("reset_email").value;

    axios.post('/api/forgot-password', {
        email: email,
    })
    .then(function (response) {
        // Handle success response
        console.log(response.data);
        // Display a success message to the user
        Swal.fire({
            icon: 'success',
            title: 'OTP Sent',
            text: 'An OTP has been sent to your email address.',
            onClose: function() {
            // After sending the OTP, show the OTP verification modal
            $('#verifyOtpModal').modal('show');
            }
        });
    })
    .catch(function (error) {
        // Handle error response
        console.log(error.response.data);
        // Display an error message to the user
        Swal.fire({
            icon: 'error',
            title: 'Failed to Send OTP',
            text: 'There was an error while sending the OTP. Please try again later.'
        });
    });
}

// Function to verify OTP
function verifyOtp() {
    const email = document.getElementById("reset_email").value;
    const otp = document.getElementById("otp").value;

    axios.post('/api/verify-otp', {
        email: email,
        otp: otp
    })
    .then(function (response) {
        // Handle success response
        console.log(response.data);
        // Display a success message to the user
        Swal.fire({
            icon: 'success',
            title: 'OTP Verified',
            text: 'OTP has been verified successfully.',
            onClose: function() {
                // After OTP verification, show the password change modal
                changePassword(); // Assuming you have a function to show the password change modal
            }
        });
    })
    .catch(function (error) {
        // Handle error response
        console.log(error.response.data);
        // Display an error message to the user
        Swal.fire({
            icon: 'error',
            title: 'Failed to Verify OTP',
            text: 'Invalid OTP. Please enter the correct OTP and try again.'
        });
    });
}

// Function to reset password
function resetPassword() {
    const email = document.getElementById("reset_email").value;
    const otp = document.getElementById("otp").value;
    const newPassword = document.getElementById("newPassword").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (newPassword !== confirmPassword) {
        Swal.fire({
            icon: 'error',
            title: 'Password Mismatch',
            text: 'The new passwords do not match. Please try again.'
        });
        return;
    }

    axios.post('/api/reset-password', {
        email: email,
        otp: otp,
        password: newPassword,
        password_confirmation: confirmPassword
    })
    .then(function (response) {
        // Handle success response
        console.log(response.data);
        // Display a success message to the user
        Swal.fire({
            icon: 'success',
            title: 'Password Reset Successful',
            text: 'Your password has been reset successfully.',
            onClose: function() {
                // After resetting the password, redirect the user to the login page
                login3(); // Redirect to login page
            }
        });
    })
    .catch(function (error) {
        // Handle error response
        console.log(error.response.data);
        // Display an error message to the user
        Swal.fire({
            icon: 'error',
            title: 'Failed to Reset Password',
            text: 'There was an error while resetting your password. Please try again.'
        });
    });
}

function logoutUser() {
    axios.post('/api/v1/auth/logout')
        .then(function (response) {
            const responseData = response.data;

            if (responseData.status) {
                // Remove the token from localStorage
                localStorage.removeItem('apiToken');

                // Remove the token from Axios default headers
                delete axios.defaults.headers.common['Authorization'];

                Swal.fire({
                    icon: 'success',
                    title: 'Logout Successful',
                    text: responseData.message,
                    // willClose: () => {
                    //     window.location.href = '/login'; // Redirect to login page
                    // }
                    onClose: function() {
                        login3(); // Redirect to login page
                     }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Logout Failed',
                    text: 'Unexpected response from the server. Please try again later.'
                });
            }
        })
        .catch(function (error) {
            const errorData = error.response.data;

            Swal.fire({
                icon: 'error',
                title: 'Logout Failed',
                text: errorData.message || 'There was an error while logging out. Please try again later.'
            });
        });
}

// Add this JavaScript code to handle the logout process
document.getElementById('logoutLink').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default action of the link
    logoutUser(); // Call the logout function
});




//THIS IS FOR PRODUCTS
function applyFilter() {
    const locationFilter = document.getElementById('clickMe').innerText.trim();
    const verifiedSeller = document.getElementById('verifiedSeller').checked;

    let condition = '';
    const conditionButton = document.querySelector('.product_condition_desktop .button.clicked');
    if (conditionButton) {
        condition = conditionButton.innerText.trim().toLowerCase();
    }

    const filters = {
        condition: condition,
        location: locationFilter,
        verifiedSeller: verifiedSeller
    };

    console.log('Filters applied:', filters);

    axios.get('/api/v1/product/filter', { params: filters })
        .then(function (response) {
            const products = response.data;
            renderProducts(products);
        })
        .catch(function (error) {
            console.error('Error fetching filtered products:', error);
        });
}

// Function to handle condition button toggle
function toggleButton(button) {
    document.querySelectorAll('.product_condition_desktop .button').forEach(btn => btn.classList.remove('clicked'));
    button.classList.add('clicked');
    applyFilter();
}


document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.product_condition_desktop .button').forEach(button => {
        button.addEventListener('click', function() {
            toggleButton(this);
        });
    });

    document.getElementById('verifiedSeller').addEventListener('change', function() {
        applyFilter();
    });

    document.getElementById('clickMe').addEventListener('input', function() {
        applyFilter();
    });

    axios.get('/api/v1/allproduct')
        .then(function (response) {
            const products = response.data;
            localStorage.setItem('allProducts', JSON.stringify(products));
            renderProductsAndSections(products);
        })
        .catch(function (error) {
            console.error('Error fetching products:', error);
        });
});


function renderProductsAndSections(products) {
    const productCardDisplay1 = document.getElementById('productCardDisplay');
    const productCardDisplay2 = document.getElementById('productCardDisplay2');

    productCardDisplay1.innerHTML = ''; // Clear the container first
    productCardDisplay2.innerHTML = ''; // Clear the container first

    products.forEach((product, index) => {
        // Render product card
        const card = createProductCard(product);

        // Insert product into appropriate container
        if (index < 9) {
            productCardDisplay1.appendChild(card);
        } else {
            productCardDisplay2.appendChild(card);
        }
    });
}

function createProductCard(product) {
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
                <img src="uploads/products/${product_img_url || 'default.jpg'}" class="card-img-top w-100 product_image" alt="${product.title}">
                <div class="product_card_title">
                    <div class="main_and_promo_price_area">
                        ${
                            product.ask_for_price
                            ? '<p class="ask-for-price" style="color:red; padding-right: 2px; font-size:23px">Ask for price</p>'
                            : `
                                <p class="promo_price">$${product.promo_price || ''}</p>
                                <div class="main_price"><p class="main_price_amount">$${product.actual_price || ''}</p></div>
                            `
                        }
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
        console.log( this.getAttribute('data-product'))
        localStorage.setItem('selectedProduct', this.getAttribute('data-product'));

      console.log(window.location.href = this.href);
    });

    return card;
}

// function boostListings() {
//     // Handle boosting listings action
// }

// function newProductBoost() {
//     // Handle new product boost action
// }

// function showCard_get_started() {
//     // Show the promotion card
//     document.getElementById('promotion_card').style.display = 'block';
// }

// function hideCard_get_started() {
//     // Hide the promotion card
//     document.getElementById('promotion_card').style.display = 'none';
// }

// function changeToInput() {
//     // Handle change to input action for "Tell us what it is"
// }

// function send() {
//     // Handle send action for "Tell us what it is"
// }




 // FETCH THE USER DATA
document.addEventListener('DOMContentLoaded', () => {
    // Ensure the code runs after the DOM is fully loaded
    const token = localStorage.getItem('apiToken'); // Get the token from local storage

    if (token) {
        fetchUserData(token);
    } else {
        promptLogin('Authentication token is missing. Please log in.');
    }
});

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
        nameElement.innerHTML = `${user.username || 'Unknown User'} <br>`;
        emailElement.innerHTML = user.email || 'No email provided';

        // nameElement.textContent = user.username || 'Unknown User';
        // emailElement.textContent = user.email || 'No email provided';

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
        text: 'Please login to continue'
    }).then(() => {
        login3(); // Redirect to login page
    });
}


document.addEventListener('DOMContentLoaded', function () {
    const categoryLinks = document.querySelectorAll('.category-link');

    categoryLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const categoryId = this.getAttribute('data-category-id');
            const categoryName = this.getAttribute('data-category-name');
            const token = localStorage.getItem('apiToken'); // Replace with your actual token

            axios.get(`/api/v1/categories/${categoryId}`, {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
            .then(function (response) {
                const products = response.data.data;
                localStorage.setItem('allProducts', JSON.stringify(products));
                localStorage.setItem('categoryName', categoryName);
                window.location.href = "{{ url('/category_search') }}";
            })
            .catch(function (error) {
                console.error('Error fetching products:', error);
            });
        });
    });
});




    </script>
</body>

</html>

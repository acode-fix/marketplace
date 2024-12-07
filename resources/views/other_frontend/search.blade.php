<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product :: Search</title>
    <link rel="icon" href="{{ asset('innocent/assets/image/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/location.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/preloader.css')}}">

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
    <div id="scrollToTop"><i class="fa-solid fa-arrow-up"></i></div>
    <!-- search page -->
    <div id="search">
        <!-- Navbar and Search Button -->
        <div class="navbar-1 fixed-top ">
            <a href="{{ url('/') }}"><i id="backBtn" class="fa-solid fa-angle-left  previous" ></i></a> 

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
                <span>
                    <input id="find-what-to-buy_search_page" type="text" placeholder="Find what to buy..."
                        class="find-what-to-buy js-input" onclick="this.select()" autofocus>
                    <button id="search id" type="button" class="search js-search">Search</button>
                </span>
                {{-- <span>
                    <input id="find-what-to-buy_search_page" type="text" placeholder="Find what to buy..."
                        class="find-what-to-buy js-input" onclick="this.select()" autofocus>
                    <button id="search id" type="button" class="search js-search">Search</button>
                </span> --}}
            </div>
        
         <a href="{{ url('/') }}"><img src="{{ asset('innocent/assets/image/transparent_logo.png')}}" alt="" class="search_buy_and_sell_logo"></a>
        </div>

        <!-- Sidebar and Main Body Section -->
        <div class="sidebar-container">
            <div class="sidebar" id="sidebar">

                <!-- Filter Section -->
                <div class="filter_section">
                    <p>
                        <img src="{{asset('innocent/assets/image/filter.png')}}" alt="">
                    <p class="filter">Filter</p>
                    <p class="filter_line"></p>

                    </p>
                </div>
                <!-- Price Filter Part -->
                <!-- <label for="actualPrice">Actual Price in ₦</label>
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

                    <button class="button  js-new" data-value ='new'>New</button>
                    <button class="button  js-used" data-value ='fairly_used'>Fairly Used</button>

                    <!-- Button trigger modal -->
                    <div data-bs-toggle="modal" data-bs-target="#location_input_modal" class="clickMe_div">
                        <p data-bs-toggle="modal" data-bs-target="#location_input_modal" id="clickMe">Lagos</p>
                        <i class="fa-solid fa-angle-down  angle_down" data-bs-toggle="modal"
                            data-bs-target="#location_input_modal"></i>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col d-flex">
                        <img src="{{ asset('innocent/assets/image/badge.png') }}" alt="" class="verify_badge">

                        <p style="font-size: 15px;">verified seller</p>
                        <label class="switch">
                            <input name="verify" class="js-check" type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
                <a href="{{ url('/start_selling') }}" class="start_selling_div">
                    <img src="{{ asset('innocent/assets/image/logo icon.svg') }}" alt="">
                    <p class="start_selling_p">
                        <span class="start_selling_span"> do you have anything to sell</span><br>
                        <span class="start_selling_span2">start selling</span>
                    </p>
                </a>
            </div>



            <!-- Main Body Section -->
            <div class="main" id="search_main">


                <div class="search_container" id="search_container">
                    <div id="recent_search">recent search</div>
                    <div class="recent_content js-recent-content">
                        {{-- <button class="buttons" >car</button>
                        <button class="buttons" >house</button>
                        <button class="buttons" >manions</button>
                        <button class="buttons" >estate</button>
                        <button class="buttons" >bike</button>
                        <button class="buttons" >jersey</button>
                        <button class="buttons" >bed</button>
                        <button class="buttons" >house</button>
                        <button class="buttons" >shoe</button>
                        <button class="buttons" >bike</button>
                        <button class="buttons" >cable</button>
                        <button class="buttons" >USB</button> --}}
                    </div>
                </div>

                <div class="filter_main" id="filter_mobile_view">
                    <div style="display: flex;">
                        <p>
                            <img src="{{asset('innocent/assets/image/filter.png')}}"  alt="">
                            <span>Filter</span>

                        </p>
                        <!-- <i class="fa-solid fa-close cancel" onclick="hideFilterMain()"></i> -->

                    </div>

                    <div class="d-flex">
                        <!-- <p style="margin-right: 4px;margin-top: 0px;" >
                    <label for="" class="filter_labels_mobile">min. price</label>
                    <input type="text" name="" id="" class="filter_inputs" oninput="formatMoney(this)">
                    </p><br>

                    <p style="margin-top:0px ">
                    <label for="" class="filter_labels_mobile">max. price</label>
                    <input type="text" name="" id=""  class="filter_inputs" oninput="formatMoney(this)">
                    </p> -->


                        <div class="filter_labels_mobile">Product Condition <br>
                            <button class="button2    js-new" data-value ='new' >New</button>
                            <button class="button2   js-used" data-value ='fairly_used'>Fairly Used</button>

                        </div>
                        <div class="filter_labels_mobile"><span style="margin-left: 10px;">Location </span> <br>
                            <div data-bs-toggle="modal" data-bs-target="#location_input_modal_mobile_view"
                                class="clickMe_mobile_veiw_div">
                                <p data-bs-toggle="modal" data-bs-target="#location_input_modal_mobile_view"
                                    class="clickMe_mobile_veiw" id="clickMe2">Lagos</p>
                                <i class="fa-solid fa-angle-down  angle_down_mobile_view" data-bs-toggle="modal"
                                    data-bs-target="#location_input_modal_mobile_view"></i>
                            </div>
                        </div>

                    </div>


                    <div style="display: flex;">
                        <p> <img src="{{ asset('innocent/assets/image/badge.png') }}" alt="" style="width: 22px;height: 20px;">
                            verified seller</p>
                        <div style="margin-left: 10%;">
                            <label class="switch">
                                <input name="verify" class="js-check-mobile" type="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>


                        <!-- Button trigger modal -->

                    </div>

                </div>

                <h5 class="top_sales  animate animate-right">Top Sales</h5> 
                <div class="filter-result">
                    <p class="text-danger fs-6 ps-4">No Product listed in this region yet, will you like to list a product</p>
                    <a class="start-sell" href="{{ url('/start_selling') }}">Start Selling</a>

                 </div>


                <!-- Product Cards -->
                <div class="product_card_container top_sales_margin">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="product_card_display card-margin content-margin mt-4 js-display">


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
                                                <img src="innocent/assets/image/logo icon.svg" alt="">
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
                                            <img src="innocent/assets/image/portrait-smiling-afro-american-male-photographer.jpg"
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

                    <!-- More Product Cards -->
                </div>
                <!-- Promotion Section -->
                <div class="promotion">
                    <img src="{{ asset('innocent/assets/image/Annoucement.png ') }}" alt="" class="Annoucement">
                    <p>
                        <img src="{{ asset('innocent/assets/image/transparent_logo.png ') }}" alt="" class="buy_and_sell_logo_promotion" ><br><br>
                        <img src="{{asset('innocent/assets/image/Annoucement.png') }}" alt="" class="Annoucement2">
                        <strong>Reach more audience by promoting your Product(s)</strong><br>
                        Get an active badge by becoming a verified seller <br> and enjoy multiple benefits that comes with being a verified seller
                        <br><br><br>
                        <a class="js-become-link  js-get-started" href="/become"><button class="get_started animate animate-pulse4">Get
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
                    <img src="{{asset('innocent/assets/image/Annoucement.png') }}" alt="">
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
                                <div class="product_card_display card-margin content-margin mt-4 js-display2">


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
                                                <img src="innocent/assets/image/logo icon.svg" alt="">
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
                                            <img src="innocent/assets/image/portrait-smiling-afro-american-male-photographer.jpg"
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
                        <img src="{{asset('innocent/assets/image/pen.png') }}" alt="" class="pen">
                        Can't find what you are looking for?
                        <span>Tell us what it is!</span><br>
                        and we'll do our best to assist you.
                    </p>
                </div>

                <div class="tell_us_what_u_want_input_area">
                    <img src="" alt="" class="tell_us_what_u_want_profile js-search-product-img">
                    <div class="vertical_bar"></div>
                    <input type="text" name="" class="tell_us_input js-search-input" placeholder="write the details here">
                    <button class="send js-search-send" onclick="send()">send</button>

                </div>
                <p class="submmited">submmited✅</p>
                <div class="loader" class="loader"></div>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="footer_contanier">
            <div>
                <a href="{{ url('/') }}"><img class="main-logo" src="{{asset('innocent/assets/image/transparent_logo.png') }}" alt=""></a>    
            </div>
            <nav class="footer_links">
                <a href="{{ url('/about') }}">About Us</a>
                <a href="">Terms and condition</a>
                <a class="js-help-search" href="">Help desk</a>
                <a href="{{ url('/privacy') }}">Privacy &  policy</a>
                {{-- <a href="">Report a seller</a> --}}
            </nav>
            <div class="footer_icons">
                <a href="https://web.facebook.com/loopmart/"><img src="{{asset('innocent/assets/image/facebook.png') }}" alt=""></a>
                <img src="{{asset('innocent/assets/image/twitter.png') }}" alt="">
                <img src="{{asset('innocent/assets/image/linkedin.png') }}" alt="">
                <a href="mailto:info@gmail.com.ng"> <img src="{{asset('innocent/assets/image/message.png') }}" alt=""></a>
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
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Abakaliki')">Abakaliki
                        </p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Aba')">Aba</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Abeokuta')">Abeokuta</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Abuja')">Abuja</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Ado Ekiti')">Ado Ekiti
                        </p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Akure')">Akure</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Asaba')">Asaba</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Awka')">Awka</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Bauchi')">Bauchi</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Benin City')">Benin City
                        </p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Birnin Kebbi')">Birnin
                            Kebbi</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Calabar')">Calabar</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Damaturu')">Damaturu</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Delta')">Delta</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Dutse')">Dutse</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Edo')">Edo</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Ekiti')">Ekiti</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Enugu')">Enugu</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Gombe')">Gombe</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Gusau')">Gusau</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Ibadan')">Ibadan</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Ikeja')">Ikeja</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Ilorin')">Ilorin</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Imo')">Imo</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Jalingo')">Jalingo</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Jos')">Jos</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Kaduna')">Kaduna</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Kano')">Kano</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Katsina')">Katsina</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Lafia')">Lafia</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Lagos')">Lagos</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Lokoja')">Lokoja</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Maiduguri')">Maiduguri
                        </p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Makurdi')">Makurdi</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Minna')">Minna</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Ogun')">Ogun</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Owerri')">Owerri</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Owere')">Owere</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Port Harcourt')">Port
                            Harcourt</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Sokoto')">Sokoto</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Umuahia')">Umuahia</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Uyo')">Uyo</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Yenagoa')">Yenagoa</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Yola')">Yola</p>
                        <p data-bs-dismiss="modal" class="location" aria-label="Close" onclick="changeLocation('Zaria')">Zaria</p>
                    </div>
                </div>
            </div>
        </div>



    </div>




    <div class="location_input_modal_mobile_view">

        <!-- Modal -->
        <div class="modal fade" id="location_input_modal_mobile_view" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollabled">
                <div class="modal-content modal_content">
                    <div class="location_search_area">

                        <i class="fa-solid fa-angle-left close_location" data-bs-dismiss="modal" aria-label="Close"></i>
                        <div class="space"></div>
                        <div class="location_search_input_area">
                            <i class="fa-solid fa-location-dot"></i>

                            <input type="text" class="locationInput2" placeholder="Enter your city location"
                                oninput="filterStates2(this.value)">
                            <i class="fa-solid fa-search"></i>
                        </div>
                    </div>
                    <div class="state_selection" id="stateSelection2">
                        <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation2('Abakaliki')">Abakaliki
                        </p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Aba')">Aba</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Abeokuta')">Abeokuta</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Abuja')">Abuja</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Ado Ekiti')">Ado Ekiti
                        </p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Akure')">Akure</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Asaba')">Asaba</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Awka')">Awka</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Bauchi')">Bauchi</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Benin City')">Benin City
                        </p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Birnin Kebbi')">Birnin
                            Kebbi</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Calabar')">Calabar</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Damaturu')">Damaturu</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Delta')">Delta</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Dutse')">Dutse</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Edo')">Edo</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Ekiti')">Ekiti</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Enugu')">Enugu</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Gombe')">Gombe</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Gusau')">Gusau</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Ibadan')">Ibadan</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Ikeja')">Ikeja</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Ilorin')">Ilorin</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Imo')">Imo</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Jalingo')">Jalingo</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Jos')">Jos</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Kaduna')">Kaduna</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Kano')">Kano</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Katsina')">Katsina</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Lafia')">Lafia</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Lagos')">Lagos</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Lokoja')">Lokoja</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Maiduguri')">Maiduguri
                        </p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Makurdi')">Makurdi</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Minna')">Minna</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Ogun')">Ogun</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Owerri')">Owerri</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Owere')">Owere</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Port Harcourt')">Port
                            Harcourt</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Sokoto')">Sokoto</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Umuahia')">Umuahia</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Uyo')">Uyo</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Yenagoa')">Yenagoa</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Yola')">Yola</p>
                        <p data-bs-dismiss="modal" class="location-mobile" aria-label="Close" onclick="changeLocation2('Zaria')">Zaria</p>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <!-- Modal -->
    <div class="modal fade" id="search_input_condition" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content alert_modal_content">

                <div class="modal-body alert_modal_body">
                    <p>Please <span class="alert_main_message">input</span> something to search.</p>
                    <i class="fa-solid fa-close" data-bs-dismiss="modal" aria-label="Close"></i>
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


    <script type="module" src="{{ asset('backend-js/search.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/preloader.js') }}"></script> 
</body>

</html>

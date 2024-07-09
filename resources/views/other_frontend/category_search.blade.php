<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/location.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/fontawesome.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/min/moment.min.js"></script>
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

    <!-- Navbar and Search Button -->
    <div class="navbar-1 fixed-top ">
        <a href="{{ url('/') }}"><i class="fa-solid fa-angle-left  previous"   ></i></a>

        <div class="search-bar">
            <div class="location-icon"><i class="fa-solid fa-location-dot"></i></div>
            <select placeholder="Country" class="country-input">
                <option selected>USA</option>
                <option value="1">Canada</option>
                <option value="2">Nigeria</option>
                <option value="3">Russia</option>
            </select>
            <div class="vertical-bar"></div>
           <a href="{{ url('/search') }}"> <span onclick="localStorage.setItem('previousPage', '{{ url('/category_search') }}')" >
            <input id="find-what-to-buy" type="text" placeholder="Find what to buy..." class="find-what-to-buy search_main">
            <button id="search" type="button" class="search" onclick="check_input()">Search</button>
            </span></a>
        </div>
        <img src="{{ asset('innocent/assets/image/main logo.svg') }}" alt="" class="search_buy_and_sell_logo">

    </div>




    <!-- Sidebar and Main Body Section -->
    <div class="sidebar-container">
        <div class="sidebar">
             <!-- Filter Section -->
             <div class="filter_section">
                <p>
                    <img src="innocent/assets/image/filter.png" alt="">
                    <p  class="filter">Filter</p>
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
            <div  class="product_condition_desktop">

                <button class="button new" onclick="toggleButton(this)">New</button>
                <button class="button used" onclick="toggleButton(this)">Fairly Used</button>

                 <!-- Button trigger modal -->
                 <div  data-bs-toggle="modal" data-bs-target="#location_input_modal" class="clickMe_div" >
                    <p data-bs-toggle="modal" data-bs-target="#location_input_modal"  id="clickMe">Lagos</p>
                   <i class="fa-solid fa-angle-down  angle_down"  data-bs-toggle="modal" data-bs-target="#location_input_modal"></i>
                 </div>
            </div>
            <br>
            <div class="row">
                <div class="col d-flex">
                    <img src="{{ asset('innocent/assets/image/badge.png') }}" alt="" class="verify_badge">

                    <p>verified seller</p>
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
            <!-- <a href="start_selling.html"><img src="innocent/assets/image/Start selling 3.png" alt="" class="start_selling_filter"></a> -->
            <a href="{{ url('/start_selling') }}" class="start_selling_div">
                <img src="{{ asset('innocent/assets/image/logo icon.svg') }}" alt="">
                <p class="start_selling_p">
                   <span class="start_selling_span"> do you have anything to sell</span><br>
                   <span class="start_selling_span2">start selling</span>
                </p>
            </a>
        </div>

        <!-- Main Body Section -->
        <div class="main main_categoty_serch_page">


            <h5 class="search_by_category  animate animate-right" id="categoryTitle">Category Name</h5>
            <!-- Product Cards -->


            <div class="product_card_container search_by_category_margin_for_category">

                <div class="container-fluid">
                    <div class="row">
                      <div class="col">
                        <div class="product_card_display card-margin content-margin mt-4" id="productCardDisplay">


                            <a href="{{ url('/product_des') }}" class="product_card_link">
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
                                        <img src="innocent/assets/image/logo icon.svg" alt="" >
                                        <span class="connect"><strong>connect</strong></span>

                                    </div>
                                </div>
                             </a>
                             <a href="{{ url('/product_des') }}" class="product_card_link">
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
                             </a>
                             <a href="{{ url('/product_des') }}" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 175 <br> <img src="innocent/assets/image/Rate.png" alt=""> 3.6</h6>
                                    <img src="innocent/assets/image/laptop.jpg" class="card-img-top w-100 product_image" alt="...">

                                    <div class="product_card_title">

                                        <div class="main_and_promo_price_area">
                                            <div class="ask_for_price">Ask for price</div>

                                        </div>
                                            <p class="product_name">Laptop Apple MacBook Pro 2015 8GB</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i> Ilorin</span>
                                            <img src="innocent/assets/image/logo icon.svg" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>

                             <a href="{{ url('/product_des') }}" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 75 <br> <img src="innocent/assets/image/Rate.png" alt=""> 5.0</h6>
                                    <img src="innocent/assets/image/portrait-smiling-afro-american-male-photographer.jpg" class="card-img-top w-100 product_image" alt="...">

                                    <div class="product_card_title">

                                        <div class="main_and_promo_price_area">
                                            <div class="ask_for_price">Ask for price</div>

                                        </div>
                                            <p class="product_name">Photographer</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Lagos</span>
                                            <img src="innocent/assets/image/logo icon.svg" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>
                             <a href="{{ url('/product_des') }}" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 95 <br> <img src="innocent/assets/image/Rate.png" alt=""> 3.6</h6>
                                    <img src="innocent/assets/image/laptop2.jpg" class="card-img-top w-100 product_image" alt="...">

                                    <div class="product_card_title">

                                        <div class="main_and_promo_price_area">
                                            <p class="promo_price">$70,000</p>
                                            <div class="main_price"><p class="main_price_amount">$82,000</p></div>

                                        </div>
                                            <p class="product_name">Lenovo 600gb Finger Print 2020</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Lagos</span>
                                            <img src="innocent/assets/image/logo icon.svg" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>
                             <a href="{{ url('/product_des') }}" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 70 <br> <img src="innocent/assets/image/Rate.png" alt=""> 3.0</h6>
                                    <img src="innocent/assets/image/usb-flash-drive-mockup-technology-data-storage-device.jpg" class="card-img-top w-100 product_image" alt="...">

                                    <div class="product_card_title">

                                        <div class="main_and_promo_price_area">
                                            <p class="promo_price">$500</p>
                                            <div class="main_price"><p class="main_price_amount">$550</p></div>

                                        </div>
                                            <p class="product_name">USB Type C OTG Card Reader</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Lagos</span>
                                            <img src="innocent/assets/image/logo icon.svg" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>

                        </div>
                      </div>
                    </div>
                  </div>


                <!-- More Product Cards -->
            </div>
            <!-- Promotion Section -->
            <div class="promotion">
                <img src="{{ asset('innocent/assets/image/Annoucement.png') }}" alt="" class="Annoucement">
                <p>
                    <img src="{{ asset('innocent/assets/image/main logo.svg') }}" alt="" class="buy_and_sell_logo_promotion" ><br><br>
                        <img src="{{ asset('innocent/assets/image/Annoucement.png') }}" alt="" class="Annoucement2">
                        <strong>Reach more audience by promoting your Product(s)</strong><br>
                        determine your target audience location, interest, <br> select a
                        convenient budget and duration
                    <br><br><br>
                   <button class="get_started animate animate-pulse4"  onclick="showCard_get_started()">Get Started</button>
                </p>
            </div>

                <div class="promotion_card card" id="promotion_card" style="display: none;">
                    <i class="fa-solid fa-close close_get_started" onclick="hideCard_get_started()"></i>
                    <img src="{{ asset('innocent/assets/image/Annoucement.png') }}" alt="">
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
                        <div class="product_card_display card-margin content-margin mt-4">


                            <a href="{{ url('/product_des') }}" class="product_card_link">
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
                                        <img src="innocent/assets/image/logo icon.svg" alt="" >
                                        <span class="connect"><strong>connect</strong></span>

                                    </div>
                                </div>
                             </a>
                             <a href="{{ url('/product_des') }}" class="product_card_link">
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
                             </a>
                             <a href="{{ url('/product_des') }}" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 175 <br> <img src="innocent/assets/image/Rate.png" alt=""> 3.6</h6>
                                    <img src="innocent/assets/image/laptop.jpg" class="card-img-top w-100 product_image" alt="...">

                                    <div class="product_card_title">

                                        <div class="main_and_promo_price_area">
                                            <div class="ask_for_price">Ask for price</div>

                                        </div>
                                            <p class="product_name">Laptop Apple MacBook Pro 2015 8GB</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i> Ilorin</span>
                                            <img src="innocent/assets/image/logo icon.svg" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>

                             <a href="{{ url('/product_des') }}" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 75 <br> <img src="innocent/assets/image/Rate.png" alt=""> 5.0</h6>
                                    <img src="innocent/assets/image/Picture of product.png" class="card-img-top w-100 product_image" alt="...">

                                    <div class="product_card_title">

                                        <div class="main_and_promo_price_area">
                                            <div class="ask_for_price">Ask for price</div>

                                        </div>
                                            <p class="product_name">Photographer</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Lagos</span>
                                            <img src="innocent/assets/image/logo icon.svg" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>
                             <a href="{{ url('/product_des') }}" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 95 <br> <img src="innocent/assets/image/Rate.png" alt=""> 3.6</h6>
                                    <img src="innocent/assets/image/laptop2.jpg" class="card-img-top w-100 product_image" alt="...">

                                    <div class="product_card_title">

                                        <div class="main_and_promo_price_area">
                                            <p class="promo_price">$70,000</p>
                                            <div class="main_price"><p class="main_price_amount">$82,000</p></div>

                                        </div>
                                            <p class="product_name">Lenovo 600gb Finger Print 2020</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Lagos</span>
                                            <img src="innocent/assets/image/logo icon.svg" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>
                             <a href="{{ url('/product_des') }}" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 70 <br> <img src="innocent/assets/image/Rate.png" alt=""> 3.0</h6>
                                    <img src="innocent/assets/image/usb-flash-drive-mockup-technology-data-storage-device.jpg" class="card-img-top w-100 product_image" alt="...">

                                    <div class="product_card_title">

                                        <div class="main_and_promo_price_area">
                                            <p class="promo_price">$500</p>
                                            <div class="main_price"><p class="main_price_amount">$550</p></div>

                                        </div>
                                            <p class="product_name">USB Type C OTG Card Reader</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Lagos</span>
                                            <img src="innocent/assets/image/logo icon.svg" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>

                        </div>
                      </div>
                    </div>
                  </div>


            </div>

            <!--tell us what is it-->
            <div class="tell_us_what_u_want animate animate-left ">
                <p class="tell_us_paragraph" onclick="changeToInput()">
                    <img src="{{ asset('innocent/assets/image/pen.png') }}" alt="" class="pen">
                    Can't find what you are looking for?
                    <span>Tell us what it is!</span><br>
                    and we'll do our best to assist you.
                </p>
            </div>

            <div class="tell_us_what_u_want_input_area">
                <img src="{{ asset('innocent/assets/image/dp.png') }}" alt="" class="tell_us_what_u_want_profile">
               <div class="vertical_bar"></div>
                <input type="text" name="" class="tell_us_input" placeholder="write the details here">
                <button class="send" onclick="send()">send</button>

            </div>
             <p class="submmited" >submmited✅</p>
             <div class="loader" class="loader"></div>

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
            <img src="{{ asset('innocent/assets/image/facebook.png') }}" alt="">
            <img src="{{ asset('innocent/assets/image/twitter.png') }}" alt="">
            <img src="{{ asset('innocent/assets/image/linkedin.png') }}" alt="">
            <img src="{{ asset('innocent/assets/image/message.png') }}" alt="">
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="signup_login-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog">
            <div class="modal-content modal_content_signup_login">


                <div class="sign_up_modal">

                    <span class="close_modal_content_signup_login" data-bs-dismiss="modal" aria-label="Close">&times;</span>
                    <h5 id="sign_up">Sign Up</h5>
                    <p>Welcome to</p>
                    <img src="innocent/assets/image/logo.png" alt="">
                    <!-- Sign Up Form -->

                    <div class="form-group">
                        <label for="email" class="form-label"></label>
                        <input type="email" class="form-control input_field" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <p class="showPasswordBtn"> <i class="fa-solid fa-eye"></i></p>
                        <label for="password" class="form-label"></label>
                        <input type="password" class="form-control password_inputs input_field" id="password" placeholder="Password">
                        <div class="password-conditions">
                            <p class="invalid containsNumber">Password must contain at least 1 number.</p>
                            <p class="invalid containsSpecialChar">Password must contain at least 1 special character.</p>
                            <p class="invalid containsUppercase">Password must contain at least 1 uppercase letter.</p>
                            <p class="invalid containsLowercase">Password must contain at least 1 lowercase letter.</p>
                            <p class="invalid isLengthValid">Password must be more than 8 characters.</p>
                        </div>
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
                    <button class="signup_continue_button continueBtn">continue</button>
                    <p>By signing up you accept <span class="signup_links">Our Terms and Policy</span></p>

                </div>


                <div class="login_modal" style="display: none;">

                    <span class="close_modal_content_signup_login" data-bs-dismiss="modal" aria-label="Close">&times;</span>
                    <h5 id="sign_up">Log in</h5>
                    <p>Welcome back to</p>
                    <img src="innocent/assets/image/logo.png" alt="">
                    <!-- Login Form -->

                    <div class="form-group">
                        <label for="email" class="form-label"></label>
                        <input type="email" class="form-control input_field" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <p class="showPasswordBtn"> <i class="fa-solid fa-eye"></i></p>
                        <label for="password" class="form-label"></label>
                        <input type="password" class="form-control password_inputs input_field" id="password" placeholder="Password">
                        <div class="password-conditions"></div>
                    </div>
                    <p class="forget_password_login" onclick="showResetPassword()">Forgot password</p>
                    <p id="or_login_using">or Login using</p><br>
                    <hr>
                    <div class="auth_icons">
                        <div class="facebook_icon" style="cursor: pointer;">
                            <img src="innocent/assets/image/Facebook Logo.png" alt="">
                        </div>
                        <div class="gmail_icon" style="cursor: pointer;">
                            <img src="innocent/assets/image/gmail.png" alt="">
                        </div>
                    </div>
                    <button class="signup_continue_button continueBtn">continue</button>
                    <p style="margin-top: 20px;">Don't have an account? <span><a href="#" onclick="signup()" class="signup_links">Sign up</a></span></p>

                </div>

                <div class="resetpassword" style="display: none;">

                    <span class="close_modal_content_signup_login" data-bs-dismiss="modal" aria-label="Close">&times;</span>
                    <h5 id="sign_up">Reset</h5>
                    <p class="forgot_password"> <span class="forgot_password_head">Forgot your password? </span> <br>
                        enter the email address that is associated with your account and we'll send you a link to reset your password.
                    </p>
                    <div class="reset_email">
                        <div class="form-group">
                            <label for="email" class="form-label"></label>
                            <input type="email" class="form-control input_field" id="email" placeholder="Email">
                        </div>
                    </div>
                    <button class="signup_continue_button" onclick="changePassword()">Request Reset Password link</button>
                    <p class="already_have_an_account">Already have an account? <span ><a href="#" onclick="login2()" class="signup_links">Login</a></span></p>

                </div>

                <div class="chagepassword" style="display: none;">

                    <p class="type_new_password"> <span class="type_new_password_head">Hi Henry Great </span> <br>
                        type in your new password
                    </p>
                    <div class="form-group">
                        <p class="showPasswordBtn"> <i class="fa-solid fa-eye"></i></p>
                        <label for="newPassword" class="form-label"></label>
                        <input type="password" class="form-control password_inputs reset_password_inputs input_field" id="newPassword" placeholder="New Password">
                        <div class="password-conditions">

                            <p class="invalid containsNumber">Password must contain at least 1 number.</p>
                            <p class="invalid containsSpecialChar">Password must contain at least 1 special character.</p>
                            <p class="invalid containsUppercase">Password must contain at least 1 uppercase letter.</p>
                            <p class="invalid containsLowercase">Password must contain at least 1 lowercase letter.</p>
                            <p class="invalid isLengthValid">Password must be more than 8 characters.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="showPasswordBtn"> <i class="fa-solid fa-eye"></i></p>
                        <label for="confirmPassword" class="form-label"></label>
                        <input type="password" class="form-control password_inputs reset_password_inputs input_field" id="confirmPassword" placeholder="Confirm New Password">
                        <p class="error" style="display: none;">Passwords must be the same</p>
                    </div>
                    <button class="signup_continue_button change_password_button continueBtn continueBtn_error">Continue</button>
                    <p>Already have an account? <span ><a href="#" onclick="login3()" class="signup_links">Login</a></span></p>

                </div>

            </div>
        </div>

    </div>



</div>
    <!-- index end -->






        <div class="location_input_modal">


            <!-- Modal -->
            <div class="modal fade" id="location_input_modal"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollabled">
                <div class="modal-content modal_content">
                  <div class="location_search_area">

                    <i class="fa-solid fa-angle-left close_location"  data-bs-dismiss="modal" aria-label="Close"></i>
                      <div class="space"></div>
                      <div class="location_search_input_area">
                        <i class="fa-solid fa-location-dot"></i>

                          <input type="text" class="locationInput" placeholder="Enter your city location" oninput="filterStates(this.value)">
                         <i class="fa-solid fa-search"></i>
                      </div>
                  </div>
                  <div class="state_selection" id="stateSelection">
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Abakaliki')">Abakaliki</p>
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Aba')">Aba</p>
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Abeokuta')">Abeokuta</p>
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Abuja')">Abuja</p>
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Ado Ekiti')">Ado Ekiti</p>
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Akure')">Akure</p>
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Asaba')">Asaba</p>
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Awka')">Awka</p>
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Bauchi')">Bauchi</p>
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Benin City')">Benin City</p>
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Birnin Kebbi')">Birnin Kebbi</p>
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
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Maiduguri')">Maiduguri</p>
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Makurdi')">Makurdi</p>
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Minna')">Minna</p>
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Ogun')">Ogun</p>
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Owerri')">Owerri</p>
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Owere')">Owere</p>
                      <p data-bs-dismiss="modal" aria-label="Close" onclick="changeLocation('Port Harcourt')">Port Harcourt</p>
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
<script src="{{ asset('innocent/assets/js/notification.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/search.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/script.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/animation.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/location.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    const products = JSON.parse(localStorage.getItem('allProducts'));
    const categoryName = localStorage.getItem('categoryName');
    const categoryTitle = document.getElementById('categoryTitle');
    const productContainer = document.getElementById('productCardDisplay');

    categoryTitle.innerText = categoryName;
    renderProducts(products);

    function renderProducts(products) {
        productContainer.innerHTML = ''; // Clear the container first

        products.forEach(function (product) {
            const card = createProductCard(product);
            productContainer.appendChild(card);
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
            localStorage.setItem('selectedProduct', this.getAttribute('data-product'));
            window.location.href = this.href;
        });

        return card;
    }
});
</script>


    
</body>
</html>

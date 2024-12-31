<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product :: Shared</title>
    <link rel="icon" href="{{ asset('innocent/assets/image/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/product.des.css') }}?time={{ time() }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/notification.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/preloader.css')}}">
    <script src="{{ asset('innocent/assets/js/preloader.js') }}"></script> 


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
  
    
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
        <a class="js-logo-link" href="{{ url('/') }}"><img  class="search_buy_and_sell_logo js-logo-img" src="{{ asset('innocent\assets\image\transparent_logo.png')}}" alt=""  data-bs-toggle="" data-bs-target="" ></a>
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
                <input type="text" placeholder="Find what to buy..." class="find-what-to-buy search-input">
                <button type="button" class="search">Search</button>
            </span>
            {{-- <a class="js-search-bar-input" href="{{ url('/search') }}">
                <span  onclick="localStorage.setItem('previousPage', '{{ url('/product_des') }}')">
                   <input type="text" placeholder="Find what to buy..." class="find-what-to-buy">
                   <button type="button" class="search">Search</button>
                </span>
           </a> --}}
        </div>
        {{-- <div id="notification_icon_div"><img src="{{asset('innocent/assets/image/notification.png')}}" alt="Logo" id="notification_icon"></div> --}}
        <div id="notification_icon_div2"> <a href="{{ url('/notification_mobile') }}"><img src="{{asset('innocent/assets/image/notification.png')}}" alt="Logo" ></a></div>
     
         <img  id="js-profile-desk" src="" alt=".profile picture " class="profile_picture">
         <img id="js-profile-mobile" src="" alt=".profile picture " class="profile_picture_mobile">
    </div>

    <!-- prifile card -->
    <div class="profile_card">
        {{-- <div class="profile_card_user_name">
          <img src="{{asset('innocent/assets/image/dp.png')}}" alt="">
          <p>Mired Augustine <br>
            <span>miredaugustine@gmail.com</span>
          </p>
        </div>
        <hr>
        <div class="accont_features">
                <p>Account Setting </p>
               <p> Reffer a Friend </p>
                <p>Privacy and Policy </p>
               <p> Sign out</p>

        </div> --}}
       
    </div>

   
       
    <div class="navbar-2 fixed-top">
        <a href="{{ url('/') }}">  <i class="fa-solid fa-angle-left  back_to_index" ></i></a>
        <div class="user_info js-user-info"> 
             {{-- <img src="{{asset('innocent/assets/image/bike.png')}}" alt=".profile picture " class="user_photo">
            <p class="user_name"><strong>Innocent Buike </strong><br>

                <span class="location">
                    <img src="{{asset('innocent/assets/image/badge.png')}}" alt="">
                    <span>lagos,</span> 
                    <span class="rate">
                        <img src="{{asset('innocent/assets/image/Rate.png')}}" alt="">
                        5.0
                    </span >
                </span>
            </p> 
            <div class="products_details_head">
                <p class="sold2">
                    sold 10
                </p>
                
                <p class="stock">
                    200 in stock
                </p>
                
                <p class="condition">
                    fairly used
                </p>
            </div>   --}}
        </div>
        <img src="{{asset('innocent/assets/image/transparent_logo.png')}}" alt=".profile picture" class="search_buy_and_sell_logo ">
    </div>
    
  
    

        
    <!-- Sidebar and Main Body Section -->
    <div class="sidebar_and_main_container">
        <div class="sidebar" >
            <div class="sidebar_main">
                

                        
                <div class="products_details_dekstop">
                    <div class="js-header">

{{--                     
                    <div class="user_info2">
                        <img src="" alt=".profile picture " class="profile_picture2">
                        <p class="user_name2"> Innocent Chibuike <br>
                            <span class="location2"> 
                                <img src="{{asset('innocent/assets/image/badge.png')}}" alt="">
                                <i class="fa-solid fa-location-dot " style="font-size: 12px;"></i>
                                <span class="user_state">lagos</span>
                                <span class="rate">
                                    <img src="{{asset('innocent/assets/image/Rate.png')}}" alt="">
                                    5.0
                                </span >
                            </span>
                        </p> 
                        <div class="close_product_des"><a href="{{ url('/') }}"><i class="fa-solid fa-close "></i></a></div>
                    </div>
                    
                    <div class="products_details_head2">
                        <p class="sold3">
                            sold 10
                        </p>
                        
                        <p class="stock2">
                            200 in stock
                        </p>
                        
                        <p class="condition2">
                            fairly used
                        </p>
                    </div> --}}
                    

                    </div>
              

                </div>
               <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="background-color: #ffce29;"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2" style="background-color: #ffce29;"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3" style="background-color: #ffce29;"></button>
                    </div>
                    <div class="carousel-inner">
                     <div class="carousel-item active">
                        <img id="img_first" src="" class="carousel_img" alt="...">
                    </div> 
                    <div class="carousel-item">
                        <img id="img_second" src="" class="carousel_img" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img id="img_third" src="" class="carousel_img" alt="...">
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
         
         
               <div class="product_descriptoin_card ">
                 <div class="js-desc">          
                {{-- <p class="product_name_on_sidebar" > Buy Hp pro 11</p>

                   
                  <hr>
                 <div class="main_and_promo_price_des_sidebar">
                     <p class="promo_price2">$90,000</p>
                     <p class="main_price2">$100,000</p>
                   
                 </div>
                
                 <div>
                     <span style="font-weight: bold;">Description</span>
                     <p>
                     typeliquid reting IPS LCD,120Hz,
                      HDRIO, Doldy Vision,600nits (typ)Size11.0 inches,
                       366.5 cm <sup>2</sup> (-82.9% screen-to-body ratio) Resolution 1668 * 2388 pixels (-265 ppi density)
                       ptotectionScratch-resistant glass, oleophobic coating 
                       (typ)Size11.0 inches,
                       366.5 cm <sup>2</sup> (-82.9% screen-to-body ratio) Resolution 1668 * 2388 pixels (-265 ppi density)
                     </p>
                 </div>
                    <div class="connect_buttons">
                       
                        <button  class="product_card_veiw_shop_button" >
                          <a href="">view shop <img src="{{asset('innocent/assets/image/badge.png')}}" alt="" ></a>  
                        </button> 
                        <button  class="product_card_connect_button">
                           <a href="shop.html">connect <img src="{{asset('innocent/assets/image/Shopping bag.png')}}" alt="" ></a> 
                        </button>
                    </div> --}}
                </div> 

              </div>  
               
            </div>
       

           
            <!-- Main Body Section -->
        <div class="main2">
           
            <h5 class="related_search  animate animate-right">Related Search</h5>
            <!-- Product Cards -->
            <div class="product_card_container related_search_margin">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="mt-4 product_card_display card-margin content-margin js-test">
                                <!-- Example Product Card -->
                                
                                
                               
                               
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
                        <a class="js-become-link js-get-started" href="/become"><button class="get_started animate animate-pulse4">Get
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
                        <div class="product_card_display card-margin content-margin mt-4 js-mobileCard-down">
                  
                        
                            {{-- <a href="product_des.html" class="product_card_link">
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
                                        <img src="{{asset('innocent/assets/image/logo icon.png')}}" alt="" >
                                        <span class="connect"><strong>connect</strong></span>
                                       
                                    </div>
                                </div>
                             </a> --}}
                             {{-- <a href="product_des.html" class="product_card_link">
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
                                            <img src="innocent/assets/image/logo icon.png" alt="" >
                                            <span class="connect"><strong>connect</strong></span>
                                       
                                    </div>
                                </div>
                             </a>
                             <a href="product_des.html" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 175 <br> <img src="innocent/assets/image/Rate.png" alt=""> 3.6</h6>
                                    <img src="innocent/assets/image/laptop.jpg" class="card-img-top w-100 product_image" alt="...">
                               
                                    <div class="product_card_title">
                                       
                                        <div class="main_and_promo_price_area">
                                            <div class="ask_for_price">Ask for price</div>
                                            
                                        </div>
                                            <p class="product_name">Laptop Apple MacBook Pro 2015 8GB</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i> Ilorin</span>
                                            <img src="innocent/assets/image/logo icon.png" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>
                           
                             <a href="product_des.html" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 75 <br> <img src="innocent/assets/image/Rate.png" alt=""> 5.0</h6>
                                    <img src="innocent/assets/image/portrait-smiling-afro-american-male-photographer.jpg" class="card-img-top w-100 product_image" alt="...">
                               
                                    <div class="product_card_title">
                                       
                                        <div class="main_and_promo_price_area">
                                            <div class="ask_for_price">Ask for price</div>
                                            
                                        </div>
                                            <p class="product_name">Photographer</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Lagos</span>
                                            <img src="innocent/assets/image/logo icon.png" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>
                             <a href="product_des.html" class="product_card_link">
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
                                            <img src="innocent/assets/image/logo icon.png" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>
                             <a href="product_des.html" class="product_card_link">
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
                                            <img src="innocent/assets/image/logo icon.png" alt="" >
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
                <p class="tell_us_paragraph js-change-to-input" onclick="changeToInput()">
                    <img src="{{asset('innocent/assets/image/pen.png') }}" alt="" class="pen">
                    Can't find what you are looking for?
                    <span>Tell us what it is!</span><br>
                    and we'll do our best to assist you.
                </p>
            </div>

            <div class="tell_us_what_u_want_input_area">
                <img src="" alt="" class="tell_us_what_u_want_profile js-img-tell">
               <div class="vertical_bar"></div>
                <input type="text" name="" class="tell_us_input js-input-mobile" placeholder="write the details of what you are searching for the details here">
                <button class="send js-send-mobile" onclick="send()" >
                    <span class="input-text">send</span>
                    <div class="loader-div" aria-hidden="true">
                        <div class="loader-text"></div>
                        <span class="ms-1 text-dark">loading...</span>
                    </div>
                </button>

            </div>
             <p class="submmited" >submmited✅</p>
             <div class="loader" class="loader"></div>

        </div>
       </div>
 
         
        <!-- Main Body Section -->
        <div class="main" id="main">
           
            <h5 class="related_search animate animate-right">Related Search</h5>
            <!-- Product Cards -->
            <div class="product_card_container related_search_margin">
              
                <div class="container-fluid">
                    <div class="row">
                      <div class="col">
                        <div class="product_card_display card-margin content-margin mt-4 js-desktop-card">
                  
                        
                            {{-- <a href="product_des.html" class="product_card_link">
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
                                        <img src="{{asset('innocent/assets/image/logo icon.png')}}" alt="" >
                                        <span class="connect"><strong>connect</strong></span>
                                       
                                    </div>
                                </div>
                             </a>
                             <a href="product_des.html" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 7 <br> <img src="{{asset('innocent/assets/image/Rate.png')}}" alt=""> 3.6</h6>
                                    <img src="{{asset('innocent/assets/image/felipe-simo-dWQDNyPfKPU-unsplash.jpg')}}" class="card-img-top w-100 product_image" alt="...">
                               
                                    <div class="product_card_title">
                                        <div class="main_and_promo_price_area">
                                            <p class="promo_price">$500,000</p>
                                            <div class="main_price"><p class="main_price_amount">$520,000</p></div>
                                            
                                        </div>
                                       
                                            
                                            <p class="product_name">Mercedes-Benz M Class ML 350 4Matic 2012 Silver</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Abuja</span>
                                            <img src="{{asset('innocent/assets/image/logo icon.png')}}" alt="" >
                                            <span class="connect"><strong>connect</strong></span>
                                       
                                    </div>
                                </div>
                             </a>
                             <a href="product_des.html" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 175 <br> <img src="{{asset('innocent/assets/image/Rate.png')}}" alt=""> 3.6</h6>
                                    <img src="{{asset('innocent/assets/image/laptop.jpg')}}" class="card-img-top w-100 product_image" alt="...">
                               
                                    <div class="product_card_title">
                                       
                                        <div class="main_and_promo_price_area">
                                            <div class="ask_for_price">Ask for price</div>
                                            
                                        </div>
                                            <p class="product_name">Laptop Apple MacBook Pro 2015 8GB</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i> Ilorin</span>
                                            <img src="{{asset('innocent/assets/image/logo icon.png')}}" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>
                           
                             <a href="product_des.html" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 75 <br> <img src="{{asset('innocent/assets/image/Rate.png')}}" alt=""> 5.0</h6>
                                    <img src="{{asset('innocent/assets/image/portrait-smiling-afro-american-male-photographer.jpg')}}" class="card-img-top w-100 product_image" alt="...">
                               
                                    <div class="product_card_title">
                                       
                                        <div class="main_and_promo_price_area">
                                            <div class="ask_for_price">Ask for price</div>
                                            
                                        </div>
                                            <p class="product_name">Photographer</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Lagos</span>
                                            <img src="{{asset('innocent/assets/image/logo icon.png')}}" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>
                             <a href="product_des.html" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 95 <br> <img src="{{asset('innocent/assets/image/Rate.png')}}" alt=""> 3.6</h6>
                                    <img src="{{asset('innocent/assets/image/laptop2.jpg')}}" class="card-img-top w-100 product_image" alt="...">
                               
                                    <div class="product_card_title">
                                       
                                        <div class="main_and_promo_price_area">
                                            <p class="promo_price">$70,000</p>
                                            <div class="main_price"><p class="main_price_amount">$82,000</p></div>
                                            
                                        </div>
                                            <p class="product_name">Lenovo 600gb Finger Print 2020</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Lagos</span>
                                            <img src="{{asset('innocent/assets/image/logo icon.png')}}" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>
                             <a href="product_des.html" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 70 <br> <img src="{{asset('innocent/assets/image/Rate.png')}}" alt=""> 3.0</h6>
                                    <img src="{{asset('innocent/assets/image/usb-flash-drive-mockup-technology-data-storage-device.jpg')}}" class="card-img-top w-100 product_image" alt="...">
                               
                                    <div class="product_card_title">
                                       
                                        <div class="main_and_promo_price_area">
                                            <p class="promo_price">$500</p>
                                            <div class="main_price"><p class="main_price_amount">$550</p></div>
                                            
                                        </div>
                                            <p class="product_name">USB Type C OTG Card Reader</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Lagos</span>
                                            <img src="{{asset('innocent/assets/image/logo icon.png')}}" alt="" >
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
            <div class="promotion promotion2">
                <img src="{{asset('innocent/assets/image/Annoucement.png')}}" alt="" class="Announcement">
                <p>
                    <img src="{{asset('innocent/assets/image/transparent_logo.png')}}" alt="" width="180px" ><br><br>
                        <img src="{{asset('innocent/assets/image/Annoucement.png')}}" alt="" class="Announcement2">
                        <strong>Reach more audience by promoting your Product(s)</strong><br>
                        Get an active badge by becoming a verified seller <br> and enjoy multiple benefits that comes with being a verified seller
                        <br><br><br>
                        <a class="js-become-link  js-get-started2" href="/become"><button class="get_started animate animate-pulse4">Get
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
                        <div class="product_card_display card-margin content-margin mt-4 js-desktop-card-down">
                  
                        
                            {{-- <a href="product_des.html" class="product_card_link">
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
                                        <img src="{{asset('innocent/assets/image/logo icon.png')}}" alt="" >
                                        <span class="connect"><strong>connect</strong></span>
                                       
                                    </div>
                                </div>
                             </a>
                             <a href="product_des.html" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 7 <br> <img src="{{asset('innocent/assets/image/Rate.png')}}" alt=""> 3.6</h6>
                                    <img src="{{asset('innocent/assets/image/felipe-simo-dWQDNyPfKPU-unsplash.jpg')}}" class="card-img-top w-100 product_image" alt="...">
                               
                                    <div class="product_card_title">
                                        <div class="main_and_promo_price_area">
                                            <p class="promo_price">$500,000</p>
                                            <div class="main_price"><p class="main_price_amount">$520,000</p></div>
                                            
                                        </div>
                                       
                                            
                                            <p class="product_name">Mercedes-Benz M Class ML 350 4Matic 2012 Silver</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Abuja</span>
                                            <img src="{{asset('innocent/assets/image/logo icon.png')}}" alt="" >
                                            <span class="connect"><strong>connect</strong></span>
                                       
                                    </div>
                                </div>
                             </a>
                             <a href="product_des.html" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 175 <br> <img src="{{asset('innocent/assets/image/Rate.png')}}" alt=""> 3.6</h6>
                                    <img src="{{asset('innocent/assets/image/laptop.jpg')}}" class="card-img-top w-100 product_image" alt="...">
                               
                                    <div class="product_card_title">
                                       
                                        <div class="main_and_promo_price_area">
                                            <div class="ask_for_price">Ask for price</div>
                                            
                                        </div>
                                            <p class="product_name">Laptop Apple MacBook Pro 2015 8GB</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i> Ilorin</span>
                                            <img src="{{asset('innocent/assets/image/logo icon.png')}}" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>
                           
                             <a href="product_des.html" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 75 <br> <img src="{{asset('innocent/assets/image/Rate.png')}}" alt=""> 5.0</h6>
                                    <img src="{{asset('innocent/assets/image/portrait-smiling-afro-american-male-photographer.jpg')}}" class="card-img-top w-100 product_image" alt="...">
                               
                                    <div class="product_card_title">
                                       
                                        <div class="main_and_promo_price_area">
                                            <div class="ask_for_price">Ask for price</div>
                                            
                                        </div>
                                            <p class="product_name">Photographer</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Lagos</span>
                                            <img src="{{asset('innocent/assets/image/logo icon.png')}}" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>
                             <a href="product_des.html" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 95 <br> <img src="{{asset('innocent/assets/image/Rate.png')}}" alt=""> 3.6</h6>
                                    <img src="{{asset('innocent/assets/image/laptop2.jpg')}}" class="card-img-top w-100 product_image" alt="...">
                               
                                    <div class="product_card_title">
                                       
                                        <div class="main_and_promo_price_area">
                                            <p class="promo_price">$70,000</p>
                                            <div class="main_price"><p class="main_price_amount">$82,000</p></div>
                                            
                                        </div>
                                            <p class="product_name">Lenovo 600gb Finger Print 2020</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Lagos</span>
                                            <img src="{{asset('innocent/assets/image/logo icon.png')}}" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>
                             <a href="product_des.html" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 70 <br> <img src="{{asset('innocent/assets/image/Rate.png')}}" alt=""> 3.0</h6>
                                    <img src="{{asset('innocent/assets/image/usb-flash-drive-mockup-technology-data-storage-device.jpg')}}" class="card-img-top w-100 product_image" alt="...">
                               
                                    <div class="product_card_title">
                                       
                                        <div class="main_and_promo_price_area">
                                            <p class="promo_price">$500</p>
                                            <div class="main_price"><p class="main_price_amount">$550</p></div>
                                            
                                        </div>
                                            <p class="product_name">USB Type C OTG Card Reader</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Lagos</span>
                                            <img src="{{asset('innocent/assets/image/logo icon.png')}}" alt="" >
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
                <p class="tell_us_paragraph tell_us_paragraph2 js-change-to-input" onclick="changeToInput2()">
                    <img src="{{asset('innocent/assets/image/pen.png')}}" alt="" class="pen">
                    Can't find what you are looking for?
                    <span>Tell us what it is!</span><br>
                    and we'll do our best to assist you.
                </p>
            </div>

            <div class="tell_us_what_u_want_input_area tell_us_what_u_want_input_area2">
                <img src="" alt="" class="tell_us_what_u_want_profile tell_us_what_u_want_profile2 js-img-tell">
               <div class="vertical_bar"></div>
                <input type="text" name="details" class="tell_us_input tell_us_input2  js-input2" placeholder="write the details of what you are searching for the details here">
                <button class="send js-send-input" onclick="send2()">
                    <span class="input-text2">send</span>
                    <div class="loader-div2" aria-hidden="true">
                        <div class="loader-text"></div>
                        <span class="ms-1 text-dark">loading...</span>
                    </div>
                </button>

            </div>
             <p class="submmited submmited2" >submmited✅</p>
             <div class="loader loader2" ></div>
        </div>
    </div>


    <div class="modal fade" id="signup_login-modal" class="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog">
        <div class="modal-content modal_content_signup_login">


            <div style="display: none"  class="sign_up_modal">
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
                    <p class="showPasswordBtn"> <i class="fa-solid fa-eye mt-4"></i></p>
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
                <button class="signup_continue_button continueBtn-signup" onclick="signup()">
                    <span class="signup-text">continue</span>
                    <div class="div-signup" aria-hidden="true">
                       <div class="loader-text"></div>
                        <span class="ms-1 text-dark">loading...</span>
                    </div>
                </button>
                <p>By signing up you accept <span class="signup_links">Our Terms and Policy</span></p>

            </div>


            <div id="loginModal" class="login_modal" style="display: block;">

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
                    <p class="showPasswordBtn"> <i class="fa-solid fa-eye mt-4"></i></p>
                    <label for="password" class="form-label"></label>
                    <input required type="password" class="form-control password_inputs input_field" id="login_password"
                        placeholder="Password">

                </div>
                <div style="display: flex; align-items:center; justify-content:space-between">
                    <div style="display: flex; align-items:center; margin-top:-20px" class="">
                        <input class="form-check-input" type="checkbox" value="" id="remember">
                        <label class="form-check-label ms-1" for="remember">
                        Remember me
                        </label>
                     </div>
                     <p class="forget_password_login" onclick="showResetPassword()">Forgot password</p>

                    </div>


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
                <button type="submit" class="signup_continue_button continueBtn login-btn" onclick="loginUser()">
                    <span class="login-text">continue</span>
                     <div class="login-loader-div" aria-hidden="true">
                        <div class="login-loader-text"></div>
                         <span class="ms-1 text-dark">loading...</span>
                     </div>
                
                </button> 


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
                <button  class="signup_continue_button request-btn" onclick="sendResetOtp()">
                    <span class="request-text">Request Reset Password link</span>
                    <div class="request-loader-div" aria-hidden="true">
                       <div class="request-loader-text"></div>
                        <span class="ms-1 text-dark">loading...</span>
                    </div>
                </button> 


                <p class="already_have_an_account">Already have an account? <span><a href="#" onclick="login2()"
                            class="signup_links">Login</a></span></p>

            </div>





            <div class="chagepassword" id="changepassword" style="display: none;">

                <p class="type_new_password"> <span class="type_new_password_head">Welcome back </span> <br>
                    type in your new password
                </p>
                <div class="form-group">
                    <p class="showPasswordBtn"> <i class="fa-solid fa-eye mt-4"></i></p>
                    <label for="newPassword" class="form-label"></label>
                    <input type="password"
                        class="form-control password_inputs reset_password_inputs input_field" id="newPassword"
                        placeholder="New Password">
                </div>
                <div class="form-group">
                    <p class="showPasswordBtn"> <i class="fa-solid fa-eye mt-4"></i></p>
                    <label for="confirmPassword" class="form-label"></label>
                    <input type="password"
                        class="form-control password_inputs reset_password_inputs input_field"
                        id="confirmPassword" placeholder="Confirm New Password">
                </div>
                <button
                            class="signup_continue_button change_password_button continueBtn continueBtn_error change-btn" onclick="resetPassword()">
                            <span class="change-text">Reset Password</span>
                            <div class="change-loader-div" aria-hidden="true">
                                <div class="change-loader-text"></div>
                                <span class="ms-1 text-dark">loading...</span>
                            </div>
                         </button> 

                <p>Already have an account? <span><a href="#" onclick="login3()" class="signup_links">Login</a></span></p>

            </div>

        </div>
    </div>

</div>
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
                <button type="button" class="signup_continue_button verify-btn" onclick="verifyOtp()">
                    <span class="verify-text">Verify OTP</span>
                    <div class="verify-loader-div" aria-hidden="true">
                        <div class="verify-loader-text"></div>
                        <span class="ms-1 text-dark">loading...</span>
                    </div>
                
                </button>


            </div>
            </div>
            </div>
            </div>

     <!-- 
        notification codes -->
        
        <div class="notification_main" id="notification_main" onclick="show_notification2()">
            <!-- Navbar and Search Button -->

            <p class="notification_indicator">
                <img src="{{asset('innocent/assets/image/notification.png')}}" alt="">
                <span>notification(<span>0</span>)</span>


            </p>

            <div class="notifications_region">

                <a href="{{ url('/rating') }}" >
                    <div class="notification">
                        <div class="notification_details">
                            <div class="notification_image"><img src="{{asset('innocent/assets/image/logo icon.svg')}}" alt="Profile Picture">
                            </div>
                            <div class="message_area">
                                <p class="message"><strong>congratulations </strong> <br>it is a perfect time to tell the
                                    world about it.</p>
                                <p class="time">2 hours ago</p>

                            </div>
                            <img src="{{asset('innocent/assets/image/laptop2.jpg')}}" alt="Picture" class="notification_product_image">

                        </div>

                    </div>
                </a>


                <a href="#">
                    <div class="notification">
                        <div class="notification_details">
                            <img src="{{asset('innocent/assets/image/dp.png')}}" alt="Profile Picture" class="notification_image">
                            <div class="message_area">
                                <p class="message"><strong>suggested for you </strong> <br>enjoy 1000 points to boost your
                                    product to reach more audience.</p>
                                <p class="time">5 hours ago</p>

                            </div>
                            <img src="{{asset('innocent/assets/image/laptop.jpg')}}" alt="Picture" class="notification_product_image">

                        </div>

                    </div>
                </a>


                <a href="#">
                    <div class="notification">
                        <div class="notification_details">
                            <img src="{{asset('innocent/assets/image/bike.png')}}" alt="Profile Picture" class="notification_image">
                            <div class="message_area">
                                <p class="message"><strong>jane connected with you </strong> <br>tell us tell us your
                                    experience with the producttell us your experience with the product.your experience with
                                    the product.</p>
                                <p class="time">just now</p>

                            </div>
                            <img src="{{asset('innocent/assets/image/laptop2.jpg')}}" alt="Picture" class="notification_product_image">

                        </div>

                    </div>
                </a>


                <a href="#">
                    <div class="notification">
                        <div class="notification_details">
                            <img src="{{asset('innocent/assets/image/bike.png')}}" alt="Profile Picture" class="notification_image">
                            <div class="message_area">
                                <p class="message"><strong>congratulations </strong> <br>tell us your experience with the
                                    product.</p>
                                <p class="time">2 min. ago</p>

                            </div>
                            <img src="{{asset('innocent/assets/image/laptop.jpg')}}" alt="Picture" class="notification_product_image">

                        </div>

                    </div>
                </a>



                <a href="#">
                    <div class="notification">
                        <div class="notification_details">
                            <img src="{{asset('innocent/assets/image/dp.png')}}" alt="Profile Picture" class="notification_image">
                            <div class="message_area">
                                <p class="message"><strong>james your experience matters </strong> <br>Your experience
                                    matters to us share your experience about this product</p>
                                <p class="time">3 hours ago</p>

                            </div>
                            <img src="{{asset('innocent/assets/image/laptop.jpg')}}" alt="Picture" class="notification_product_image">

                        </div>

                    </div>
                </a>

                <a href="#">
                    <div class="notification">
                        <div class="notification_details">
                            <img src="{{asset('innocent/assets/image/bike.png')}}" alt="Profile Picture" class="notification_image">
                            <div class="message_area">
                                <p class="message"><strong>congratulations </strong> <br>tell tell us your experience with
                                    the producttell us your experience with the product.s your experience with the
                                    producttell us your experience with the product.</p>
                                <p class="time">2 hours ago</p>

                            </div>
                            <img src="{{asset('innocent/assets/image/laptop.jpg')}}" alt="Picture" class="notification_product_image">

                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="notification">
                        <div class="notification_details">
                            <img src="{{asset('innocent/assets/image/dp.png')}}" alt="Profile Picture" class="notification_image">
                            <div class="message_area">
                                <p class="message"><strong>congrats on your new listing </strong> <br>it is a perfect time
                                    to tell the world about it.</p>
                                <p class="time">2 hours ago</p>

                            </div>
                            <img src="{{asset('innocent/assets/image/Picture of product (USB).png')}}" alt="Picture" class="notification_product_image">

                        </div>
                    </div>
                </a>
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


    </div>

    <!-- Footer Section -->
    <div class="footer_contanier">
        <div>
            <img class="main-logo" src="{{asset('innocent/assets/image/transparent_logo.png')}}" alt="">
        </div>
        <nav class="footer_links">
            <a href="{{ url('/') }}">About Us</a>
            <a href="">Terms and condition</a>
            <a class="js-help-shared" href="">Help desk</a>
            <a href="{{ url('/privacy') }}">Privacy &  policy</a>
            {{-- <a href="">Report a seller</a> --}}
        </nav>
        <div class="footer_icons">
            <a href="https://web.facebook.com/loopmart/"><img src="{{asset('innocent/assets/image/facebook.png') }}" alt=""></a> 
            <img src="{{asset('innocent/assets/image/twitter.png ') }}" alt="">
            <img src="{{asset('innocent/assets/image/linkedin.png') }}" alt="">
            <a href="mailto:info@gmail.com.ng"><img src="{{asset('innocent/assets/image/message.png') }}" alt=""></a>
            
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
    <script src="{{ asset('innocent/assets/js/modal.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="module" src="{{ asset('backend-js/shared-product.js') }}?time={{ time() }}" ></script>
    <script  src="{{ asset('backend-js/user/auth.js') }}?time={{ time() }}"></script>
</body>
</html>
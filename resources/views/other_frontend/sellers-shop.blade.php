<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sellers :: Shop</title>
  <link rel="icon" href="{{ asset('innocent/assets/image/favicon.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/navbar.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/shop.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/sellers.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css1/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css1/fontawesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('innocent/assets/css/preloader.css')}}">
  <script src="{{ asset('kaz/js/bootstrap.js') }}"></script>
   <script src="{{ asset('kaz/js/read.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
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

  <div class="header-section">
    <div class="arrow-div">
      <a href="{{ url('/') }}"><img class="arrow" src="{{ asset('/kaz/images/Arrow.png') }}" alt=""></a>
      <h6 style="font-size: 20px;" class="fw-light ms-4">Sellers Shop</h6>
    </div>
    <div class="left-section">
      <a href="{{ url('/') }}"><img class="ms-3 main-logo" src="{{asset('/kaz/images/transparent_logo.png')}}" alt=""></a>
      <h6 class="ms-5 fw-bold profile">Sellers Shop</h6>
    </div>

    <!-- <div class="middle-section">
      <div class="search-border">
        <input type="search" id="search" placeholder="&nbsp Search product...">
        <button class="search-btn btn-light mt-1 pt-1 pb-2 me-1"><img src="{{ asset('') }}/kaz/images/Search.png" class="img-fluid search-img" alt=""> search</button>
      </div>
    </div> -->
    <!-- <div class="create">
      <button type="button" class="btn btn-warning btn-height"> + create Ads</button>
    </div> -->

    <div class="right-section me-4">
      <div class="create">
        <a href="{{ url('/ads') }}"><button type="button" class="btn btn-warning btn-height me-5"> + create Ads</button></a>
      </div>
      <div class="me-1">
        <h6 class="name js-name ms-2">Loading</h6>
        <h6 class="mired-text fw-light js-email ps-4">loading</h6>
      </div>
      <div class="profile-dropdown">
        <img class="img-fluid js-profile"  src="" alt="" id="profileDropdownBtn">
        <div class="dropdown-menu js-dropdown" id="dropdownMenu">
           <div class="container drop-struct">
            <img id="profile_image" class="js-profile"  src="" alt="">
            <div class="ms-2 pt-1">
              <h6 id="profile_name" class="js-name">Mired Augustine</h6>
              <h6 id="profile_email" class="js-email" style="font-size: small;">Miredaugustine@gmail.com</h6>
            </div>
          </div>
          <hr style="background-color: black; margin-left: 10px;margin-right: 10px;">
          <div style="margin-top: -9px;">
            <a href="{{ url('/settings') }}">Dashboard</a>
            <a href="{{ url('/refer') }}">Refer A Friend</a>
            <a href="{{ url('/privacy') }}">Privacy Policy</a>
            <a class="js-logout" href="#">Log Out</a>
          </div> 

        </div>
      </div>
    </div>

    <div class="menu-toggle">
      <input type="checkbox" id="menu-checkbox" class="menu-checkbox">
      <label for="menu-checkbox" class="menu-btn">&#9776;</label>
      <div class="menu-overlay"></div>
      <ul class="menu">
        <li><a href="{{ url('/settings') }}">Dashboard</a></li>
        <li><a href="{{ url('/refer') }}">Refer A Friend</a></li>
        <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
        <li><a href="#" class="js-logout" >Log Out</a></li>
        <hr style="background-color: black; width: 70%;">
        <li><a style="color: #ff0000;" href="{{ url('/delete') }}">Delete Account</a></li>
      </ul>
    </div>
  </div>

  <div class="main">
    <div class="side-barr">
      <div class="card sidebar-card mb-3 text-dark ms-2 mt-3" style="width:240px;">
        <div class="card-body ">
          <div class="test">
            
          </div>
          {{-- <div class="ms-2">
            <h6 class="card-title">About me</h6>
            <p  style="font-size: small; " class="card-text our-company">
              Our company is a full service creation agency that specializes in defining top-notch
              UI/UX design,video editing and <span id="moreText" style="display: none;">Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Magnam reiciendis, eveniet porro ad iusto illum quisquam dolores modi
                excepturi officia. Doloribus dolor sunt dicta! A fuga, nesciunt non laborum minus provident repellat
                numquam rerum natus unde dolorum corrupti culpa. Doloremque, sunt nam modi porro unde ipsam voluptate
                ipsa alias ab dolorum vitae sed rem beatae exercitationem repellat quas! Molestias ipsa dolore sequi
                asperiores quia. Expedita iure similique vel nihil magni.</span>
              <a href="#" id="readMoreBtn"> ......Read more</a>
            </p>
          </div>
          <hr style="background-color: #534a4a;">
          <div>
            <div class="side-display">
              <div>
                <img width="10px" height="13px" src="{{ asset('') }}/kaz/images/location.svg" alt="">
                <span style="font-size: small;">From</span>
              </div>
              <h6 style="font-size: small;">Abuja,Nigera</h6>
            </div>
            <div class="side-display">
              <div>
                <img width="15px" src="{{ asset('') }}/kaz/images/profile.svg" alt="">
                <span style="font-size: small;">Member since</span>
              </div>
              <h6 style="font-size: small;">May,2022</h6>

            </div>
            <div class="side-display">
              <div>
                <img width="15px" src="{{ asset('') }}/kaz/images/product.svg" alt="">
                <span style="font-size: small;">Listed products</span>
              </div>
              <h6 style="font-size: small;">12</h6>

            </div>
            <hr style="background-color: #343434;">
          
          </div> --}}

          {{-- <div class="ms-2">
            <h6 class="card-title">Reviews</h6>
            <div>
              <img src="{{ asset('') }}/kaz/images/star-active.svg" class="img-fluid image-rate" width="15px" alt="">
              <img src="{{ asset('') }}/kaz/images/star-active.svg" class="img-fluid image-rate" width="15px" alt="">
              <img src="{{ asset('') }}/kaz/images/star-active.svg" class="img-fluid image-rate" width="15px" alt="">
              <img src="{{ asset('') }}/kaz/images/star-active.svg" class="img-fluid image-rate" width="15px" alt="">
              <img src="{{ asset('') }}/kaz/images/star-nill.svg" class="img-fluid image-rate" width="15px" alt=""> <span
                style="font-size: small;">(4.5)</span>
            </div>
            <a class="view js-review" href="{{ url('/review') }}">View all</a>

          </div> --}}


        </div>
      </div>
      <div style="color: black; width:240px ;" class="ms-2 connect-sidebar card">
        <div class="connect-struct">
          <img style="border-radius: 30px; height:40px" class="sidebar-pic ms-3" width="40px" src="" alt="">
          <h6 class="connect-shop me-4">Connect</h6>
        </div>
      </div>  
    

    </div>
    <div class="seller-desktop-content">
      <div  class="container">
        <div class="row">
          <div class="col  content-margin">
              {{-- <div style="width: 90%;" class="card mb-3  main-card-preview">
                <img style="height:220px;" id="banner" src="{{ asset('') }}/kaz/images/Picture of product (Tablet).png"
                 class="card-img-top main-img-border" alt="...">
                <div class="card-body">
                  <div class="row">
                    <div class="col mt-2">
                      <div style="display: flex; align-items: center;">
                        <img src="{{ asset('') }}/kaz/images/dp.png" class="ms-2" alt="">
                        <div class="camera2">
                          <img class="badge-cam" height="20px" width="15px" src="{{ asset('') }}/kaz/images/badge.png" alt="">
                        </div>
                        <div class="mt-4 ms-4">
                          <h5 class="">Drill Houston <span style="font-size: small;">(unique_id)</span></h5>
                          <h6 class="mired-email">drillHouston@gmail.com</h6>
                          <a class="verified-link" href="#">verified seller</a>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div style="float: right;">
                        <h6 class="connect-shop2  me-2 mt-4">Connect</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div> --}}
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-6 content-margin">
            <h6 class="">products listed</h6>
          </div>
          <div class="col-4 ">
            <div style="float: right;">
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-11">
            <div class="new-card card-margin content-margin mt-4">
             
               {{--<div>
                <div class="card card-preview" id="productCard" data-card-index="0">
                  <h6 class="sold">Sold 75</h6>
                  <img src="{{ asset('') }}/kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                  <div class="card-body">
                    <div class="card-structure">
                      <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                      <div class="star-layout">
                        <div>
                          <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                          <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                          <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        </div>
                        <div>
                          <h6 class="ps-1 rate-no">5.0</h6>
                        </div>
                      </div>
                    </div>
                    <div class="footer-card">
                      <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                      <img class="mt-3 logo-bag" src="{{ asset('') }}/kaz/images/logo icon.png" alt="">
                    </div>
                  </div>
                </div>
                <div class="overlay" onclick="closeCustomContainer()" id="overlay"></div>
                <div id="loadedCardContainer"></div>

              </div> 
               <div class="card card-preview" data-card-index="0">
                <h6 class="sold">Sold 75</h6>
                <img src="{{ asset('') }}/kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <div class="card-structure">
                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                    <div class="star-layout">
                      <div>
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                      </div>
                      <div>
                        <h6 class="ps-1 rate-no">5.0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="footer-card">
                    <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                    <img class="mt-3 logo-bag" src="{{ asset('') }}/kaz/images/logo icon.png" alt="">
                  </div>
                </div>
              </div>
              <div class="card card-preview">
                <h6 class="sold">Sold 75</h6>
                <img src="{{ asset('') }}/kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <div class="card-structure">
                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                    <div class="star-layout">
                      <div>
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                      </div>
                      <div>
                        <h6 class="ps-1 rate-no">5.0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="footer-card">
                    <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                    <img class="mt-3 logo-bag" src="{{ asset('') }}/kaz/images/logo icon.png" alt="">
                  </div>
                </div>
              </div>
              <div class="card card-preview">
                <h6 class="sold">Sold 75</h6>
                <img src="{{ asset('') }}/kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <div class="card-structure">
                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                    <div class="star-layout">
                      <div>
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                      </div>
                      <div>
                        <h6 class="ps-1 rate-no">5.0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="footer-card">
                    <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                    <img class="mt-3 logo-bag" src="{{ asset('') }}/kaz/images/logo icon.png" alt="">
                  </div>
                </div>
              </div>
              <div class="card card-preview">
                <h6 class="sold">Sold 75</h6>
                <img src="{{ asset('') }}/kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <div class="card-structure">
                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                    <div class="star-layout">
                      <div>
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                      </div>
                      <div>
                        <h6 class="ps-1 rate-no">5.0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="footer-card">
                    <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                    <img class="mt-3 logo-bag" src="{{ asset('') }}/kaz/images/logo icon.png" alt="">
                  </div>
                </div>
              </div>
              <div class="card card-preview">
                <h6 class="sold">Sold 75</h6>
                <img src="{{ asset('') }}/kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <div class="card-structure">
                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                    <div class="star-layout">
                      <div>
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                      </div>
                      <div>
                        <h6 class="ps-1 rate-no">5.0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="footer-card">
                    <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                    <img class="mt-3 logo-bag" src="{{ asset('') }}/kaz/images/logo icon.png" alt="">
                  </div>
                </div>
              </div>
              <div class="card card-preview">
                <h6 class="sold">Sold 75</h6>
                <img src="{{ asset('') }}/kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <div class="card-structure">
                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                    <div class="star-layout">
                      <div>
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                      </div>
                      <div>
                        <h6 class="ps-1 rate-no">5.0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="footer-card">
                    <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                    <img class="mt-3 logo-bag" src="{{ asset('') }}/kaz/images/logo icon.png" alt="">
                  </div>
                </div>
              </div>
              <div class="card card-preview">
                <h6 class="sold">Sold 75</h6>
                <img src="{{ asset('') }}/kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <div class="card-structure">
                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                    <div class="star-layout">
                      <div>
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                      </div>
                      <div>
                        <h6 class="ps-1 rate-no">5.0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="footer-card">
                    <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                    <img class="mt-3 logo-bag" src="{{ asset('') }}/kaz/images/logo icon.png" alt="">
                  </div>
                </div>
              </div>
              <div class="card card-preview">
                <h6 class="sold">Sold 75</h6>
                <img src="{{ asset('') }}/kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <div class="card-structure">
                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                    <div class="star-layout">
                      <div>
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                      </div>
                      <div>
                        <h6 class="ps-1 rate-no">5.0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="footer-card">
                    <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                    <img class="mt-3 logo-bag" src="{{ asset('') }}/kaz/images/logo icon.png" alt="">
                  </div>
                </div>
              </div>
             --}}
            </div>
          </div>
          <div style="text-align: center;">
            <p class="fw-bold mt-5">you've reached the end of the list</p>
          </div>
        </div>
      </div>

    </div>

    <div style="margin-top: 109px" class="sellers-footer">
      <div><img class="main-logo" src="{{asset('/kaz/images/transparent_logo.png') }}" alt=""></div>
      <div>
        <a href=""><p class="fw-light text-footer">About<br>us</p></a>
      </div>
      <div>
        <a href=""><p class="fw-light  text-footer"> Terms and <br> Conditions</p></a>
      </div>
      <div>
        <a href=""><p class="fw-light  text-footer js-seller-help">Help <br>center</p></a>
      </div>
      <div>
        <a href="/privacy"><p class="fw-light  text-footer">Privacy &<br>Policy</p></a>
      </div>
      {{-- <div>
        <a href=""><p class="fw-light  text-footer">Report <br> a seller</p></a>
      </div> --}}
      <div class="down">
        <img height="35px" width="35px" src="{{asset('/kaz/images/facebook.png')}}" alt="">
        <img height="30px" width="30px" src="{{asset('/kaz/images/twitter.png')}}" alt="">
        <img height="29px" width="29px" src="{{asset('/kaz/images/whatsapp.png')}}" alt="">
        <img height="30px" width="30px" src="{{asset('/kaz/images/message.png')}}" alt="">
      </div>
  

    </div>

  </div>
  


  <!-- mobile-view  -->
  <div class="mobile-view">
    <div style="margin-top: -49px;" class="card  main-card-mobile">
       {{-- <img style="height:180px;" id="banner" src="{{ asset('') }}/kaz/images/thumbnail-2.webp" class="card-img-top main-img-border2"
        alt="...">
      <div class="card-body">
        <div style="display: flex;justify-content: space-between;">
          <div class="drill">
            <img class="" width="50px" src="{{ asset('') }}/kaz/images/dp.png" class="" alt="">
            <div class="camera2-m">
              <img class="badge-cam-m" height="20px" width="15px" src="{{ asset('') }}/kaz/images/badge.png" alt="">
            </div>
            <div class="ms-3 mb-2 ">
              <h5 class="pt-3 mired-drill-m">Drill Houston</h5>
              <h6 class="mired-email">drillHouston@gmail.com</h6>
              <h6 class="veri-m pt-1">verified seller</h6>

            </div>

          </div>
          <div>
            <h6 class="connect-shop3  mt-4">Connect</h6>
          </div>
        </div> 
      </div> --}}
    </div>
    <div class="container-fluid">
      <div class="row mt-3">
        <div class="col">
          <div class="card-body about main-card-mobile-m about-mobile">
            {{-- <h6>About me</h6>
            <p style="font-size: small; " class="card-text our-company  pt-1">
              Our company is a full service creation agency that specializes in defining top-notch
              UI/UX design,video editing and <span id="moreText2" style="display: none;">Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Magnam reiciendis, eveniet porro ad iusto illum quisquam dolores modi
                excepturi officia. Doloribus dolor sunt dicta! A fuga, nesciunt non laborum minus provident repellat
                numquam rerum natus unde dolorum corrupti culpa. Doloremque, sunt nam modi porro unde ipsam voluptate
                ipsa alias ab dolorum vitae sed rem beatae exercitationem repellat quas! Molestias ipsa dolore sequi
                asperiores quia. Expedita iure similique vel nihil magni.</span>
              <a href="#" id="readMoreBtn2"> ......Read more</a>
            </p> --}}
          </div>
        </div>
      </div>
      <div style="margin-top: 10px;" class="row">
        <div class="col-5">
          <div class="card-body main-card-mobile-rm js-mobile-review-stars">
            <h6>Reviews</h6> 
            <div class=" mobile-stars">

            </div>
            {{-- <img src="{{ asset('') }}/kaz/images/star-active.svg" alt="">
            <img src="{{ asset('') }}/kaz/images/star-active.svg" alt="">
            <img src="{{ asset('') }}/kaz/images/star-active.svg" alt="">
            <img src="{{ asset('') }}/kaz/images/star-active.svg" alt="">
            <img src="{{ asset('') }}/kaz/images/star-nill.svg" alt=""> --}}
            <div class="pt-1 ">
               <a class="view-m js-mobile-verify-link" href=""><i>View all</i></a><span class="bracket ps-3 mobile-avg-rate"></span>
            </div>

          </div>

        </div>
        <div class="col">
          <div class="card-body main-card-mobile-rm js-sidebar">
            {{-- <div class="side-display">
              <div>
                <img width="8px" height="10px" src="{{ asset('') }}/kaz/images/location.svg" alt="">
                <span class="from ">From</span>
              </div>
              <h6 class="from ">Abuja,Nigera</h6>
            </div>
            <div class="side-display">
              <div>
                <img width="15px" src="{{ asset('') }}/kaz/images/profile.svg" alt="">
                <span class="from ">Member since</span>
              </div>
              <h6 class="from ">May,2022</h6>

            </div>
            <div class="side-display">
              <div>
                <img width="15px" src="{{ asset('') }}/kaz/images/product.svg" alt="">
                <span class="from ">Listed products</span>
              </div>
              <h6 class="from ">12</h6>
            </div> --}}

          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <h6 class="mt-3 ms-1">Products Listed</h6>
      <div class="row mt-3 mb-4">
        <div class="">
          <div class="mobile-card">
            {{-- <a class="link-card" href="{{ url('/product_des') }}">
              <div class="card card-preview" data-card-id="1">
                <div class="sold-mobile">
                  <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                  <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid ps-1" width="13px" alt=""><span
                    class="img-rate ps-1">3.6</span>
                </div>
                <img src="{{ asset('') }}/kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                  <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                  <div class="footer-card-mobile">
                    <div style="display: flex;align-items: center;">
                      <img style="margin-left:-10px;" width="8px" src="{{ asset('') }}/kaz/images/location.svg" alt=""><span
                        class="location-text ps-1">Lagos, Nigera</span>
                    </div>
                    <button style="margin-top: -10px;" type="button" class="dropbtn">...</button>
                  </div>

                </div>
              </div>
            </a>
            <a class="link-card" href="{{ url('/product_des') }}">
              <div class="card card-preview" data-card-id="1">
                <div class="sold-mobile">
                  <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                  <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid ps-1" width="13px" alt=""><span
                    class="img-rate ps-1">3.6</span>
                </div>
                <img src="{{ asset('') }}/kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                  <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                  <div class="footer-card-mobile">
                    <div style="display: flex;align-items: center;">
                      <img style="margin-left:-10px;" width="8px" src="{{ asset('') }}/kaz/images/location.svg" alt=""><span
                        class="location-text ps-1">Lagos, Nigera</span>
                    </div>
                    <button style="margin-top: -10px;" type="button" class="dropbtn">...</button>
                  </div>

                </div>
              </div>
            </a>
            <a class="link-card" href="{{ url('/product_des') }}">
              <div class="card card-preview" data-card-id="1">
                <div class="sold-mobile">
                  <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                  <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid ps-1" width="13px" alt=""><span
                    class="img-rate ps-1">3.6</span>
                </div>
                <img src="{{ asset('') }}/kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                  <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                  <div class="footer-card-mobile">
                    <div style="display: flex;align-items: center;">
                      <img style="margin-left:-10px;" width="8px" src="{{ asset('') }}/kaz/images/location.svg" alt=""><span
                        class="location-text ps-1">Lagos, Nigera</span>
                    </div>
                    <button style="margin-top: -10px;" type="button" class="dropbtn">...</button>
                  </div>

                </div>
              </div>
            </a>
            <a class="link-card" href="{{ url('/product_des') }}">
              <div class="card card-preview" data-card-id="1">
                <div class="sold-mobile">
                  <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                  <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid ps-1" width="13px" alt=""><span
                    class="img-rate ps-1">3.6</span>
                </div>
                <img src="{{ asset('') }}/kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                  <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                  <div class="footer-card-mobile">
                    <div style="display: flex;align-items: center;">
                      <img style="margin-left:-10px;" width="8px" src="{{ asset('') }}/kaz/images/location.svg" alt=""><span
                        class="location-text ps-1">Lagos, Nigera</span>
                    </div>
                    <button style="margin-top: -10px;" type="button" class="dropbtn">...</button>
                  </div>

                </div>
              </div>
            </a>
            <a class="link-card" href="{{ url('/product_des') }}">
              <div class="card card-preview" data-card-id="1">
                <div class="sold-mobile">
                  <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                  <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid ps-1" width="13px" alt=""><span
                    class="img-rate ps-1">3.6</span>
                </div>
                <img src="{{ asset('') }}/kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                  <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                  <div class="footer-card-mobile">
                    <div style="display: flex;align-items: center;">
                      <img style="margin-left:-10px;" width="8px" src="{{ asset('') }}/kaz/images/location.svg" alt=""><span
                        class="location-text ps-1">Lagos, Nigera</span>
                    </div>
                    <button style="margin-top: -10px;" type="button" class="dropbtn">...</button>
                  </div>

                </div>
              </div>
            </a>
            <a class="link-card" href="{{ url('/product_des') }}">
              <div class="card card-preview" data-card-id="1">
                <div class="sold-mobile">
                  <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                  <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid ps-1" width="13px" alt=""><span
                    class="img-rate ps-1">3.6</span>
                </div>
                <img src="{{ asset('') }}/kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                  <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                  <div class="footer-card-mobile">
                    <div style="display: flex;align-items: center;">
                      <img style="margin-left:-10px;" width="8px" src="{{ asset('') }}/kaz/images/location.svg" alt=""><span
                        class="location-text ps-1">Lagos, Nigera</span>
                    </div>
                    <button style="margin-top: -10px;" type="button" class="dropbtn">...</button>
                  </div>

                </div>
              </div>
            </a>
            <a class="link-card" href="{{ url('/product_des') }}">
              <div class="card card-preview" data-card-id="1">
                <div class="sold-mobile">
                  <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                  <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid ps-1" width="13px" alt=""><span
                    class="img-rate ps-1">3.6</span>
                </div>
                <img src="{{ asset('') }}/kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                  <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                  <div class="footer-card-mobile">
                    <div style="display: flex;align-items: center;">
                      <img style="margin-left:-10px;" width="8px" src="{{ asset('') }}/kaz/images/location.svg" alt=""><span
                        class="location-text ps-1">Lagos, Nigera</span>
                    </div>
                    <button style="margin-top: -10px;" type="button" class="dropbtn">...</button>
                  </div>

                </div>
              </div>
            </a>
            <a class="link-card" href="{{ url('/product_des') }}">
              <div class="card card-preview" data-card-id="1">
                <div class="sold-mobile">
                  <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                  <img src="{{ asset('') }}/kaz/images/Rate.png" class="img-fluid ps-1" width="13px" alt=""><span
                    class="img-rate ps-1">3.6</span>
                </div>
                <img src="{{ asset('') }}/kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                  <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                  <div class="footer-card-mobile">
                    <div style="display: flex;align-items: center;">
                      <img style="margin-left:-10px;" width="8px" src="{{ asset('') }}/kaz/images/location.svg" alt=""><span
                        class="location-text ps-1">Lagos, Nigera</span>
                    </div>
                    <button style="margin-top: -10px;" type="button" class="dropbtn">...</button>
                  </div>

                </div>
              </div>
            </a> --}}
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>

<script type="module" src="{{ asset('backend-js/seller-shop.js') }}?time={{ time() }}"></script>
<script src="{{ asset('innocent/assets/js/preloader.js') }}"></script> 
</body>

</html>

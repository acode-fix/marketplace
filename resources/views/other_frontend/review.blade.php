<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Review</title>
  <link rel="icon" href="{{ asset('innocent/assets/image/favicon.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/navbar.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/shop.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css1/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css1/fontawesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('innocent/assets/css/preloader.css')}}"> 
  <link rel="stylesheet" href="{{ asset('kaz/css/review.css') }}?time={{ time() }}">
  <script src="{{ asset('kaz/js/bootstrap.js') }}"></script>
  <script src="{{ asset('kaz/js/review.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <!-- Include SweetAlert CSS and JS -->
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
      <a href="{{ url('/') }}"><img class="arrow" src="{{asset('kaz/images/Arrow.png')}}" alt=""></a>
      <h6 style="font-size: 20px;" class="fw-light ms-4">Reviews</h6>
    </div>
    <div class="left-section">
      <a href="{{ url('/') }}"><img class="ms-3 main-logo" src="{{asset('kaz/images/transparent_logo.png')}}" alt=""></a>
      <h6 class="ms-5 fw-bold profile">Reviews</h6>
    </div>

    <!-- <div class="middle-section">
      <div class="search-border">
        <input type="search" id="search" placeholder="&nbsp Search product...">
        <button class="search-btn btn-light mt-1 pt-1 pb-2 me-1"><img src="kaz/images/Search.png" class="img-fluid search-img" alt=""> search</button>
      </div>
    </div> -->
    <!-- <div class="create">
      <button type="button" class="btn btn-warning btn-height"> + create Ads</button>
    </div> -->

    <div class="right-section me-4">
      <div class="create">
        <a href="{{ url('/ads') }}"><button type="button" class="btn btn-warning btn-height me-5"> + create Ads</button></a>
      </div>
      <div class="me-1 js-name">
        {{-- <h6 class="name">Loading</h6>
        <h6 class="mired-text fw-light">loading</h6> --}}
      </div>
      <div class="profile-dropdown js-profile-dropdown">
        {{-- <img class="img-fluid profile-picture" src="{{asset('kaz/images/dp.png')}}" alt="" id="profileDropdownBtn">
        <div class="dropdown-menu" id="dropdownMenu">
          <div class="container drop-struct">
            <img class="pt-1" width="50px" src="{{asset('kaz/images/dp.png')}}" alt="">
            <div class="ms-2 pt-1">
              <h6>Mired Augustine</h6>
              <h6 style="font-size: small;">Miredaugustine@gmail.com</h6>
            </div>
          </div>
          <hr style="background-color: black; margin-left: 10px;margin-right: 10px;">
          <div style="margin-top: -9px;">
            <a href="{{ url('/settings') }}">Dashboard</a>
            <a href="{{ url('/refer') }}">Refer A Friend</a>
            <a href="{{ url('/privacy') }}">Privacy Policy</a>
            <a href="#">Log Out</a>

          </div>

        </div> --}}
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
        <li><a class="log-out" href="#">Log Out</a></li>
        <hr style="background-color: black; width: 70%;">
        <li><a style="color: #ff0000;" href="{{ url('/delete') }}">Delete Account</a></li>
      </ul>
    </div>
  </div>

  <div class="main">
    <div class="side-barr">
      <div class="card sidebar-card mb-3 text-dark ms-2 mt-3" style="width:240px;">
        <div class="card-body ">
          <div class="sidebar-wrapper">

          </div>
          {{-- <div class="ms-2">
            <h6 class="card-title">About me</h6>
            <p style="font-size: small; " class="card-text our-company">
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
          <hr style="background-color: #343434;">
          <div>
            <div class="side-display">
              <div>
                <img width="10px" height="13px" src="{{asset('kaz/images/location.svg')}}" alt="">
                <span style="font-size: small;">From</span>
              </div>
              <h6 style="font-size: small;">Abuja,Nigera</h6>
            </div>
            <div class="side-display">
              <div>
                <img width="15px" src="{{asset('kaz/images/profile.svg')}}" alt="">
                <span style="font-size: small;">Member since</span>
              </div>
              <h6 style="font-size: small;">Dec,2022</h6>

            </div>
            <div class="side-display">
              <div>
                <img width="15px" src="{{asset('kaz/images/product.svg')}}" alt="">
                <span style="font-size: small;">Listed products</span>
              </div>
              <h6 style="font-size: small;">12</h6>

            </div>
            <hr style="background-color: #343434;">
          </div>
          <div class="ms-2">
            <h6 class="card-title">Reviews</h6>
            <div>
              <img src="{{asset('kaz/images/star-active.svg')}}" class="img-fluid image-rate" width="15px" alt="">
              <img src="{{asset('kaz/images/star-active.svg')}}" class="img-fluid image-rate" width="15px" alt="">
              <img src="{{asset('kaz/images/star-active.svg')}}" class="img-fluid image-rate" width="15px" alt="">
              <img src="{{asset('kaz/images/star-active.svg')}}" class="img-fluid image-rate" width="15px" alt="">
              <img src="{{asset('kaz/images/star-nill.svg')}}" class="img-fluid image-rate" width="15px" alt=""> <span
                style="font-size: small;">(4.5)</span>
            </div>
            <a class="view" href="{{ url('/rating') }}">View all</a>

          </div> --}}


        </div>
      </div>
      <div style="color: black; width:240px ;" class="ms-2 connect-sidebar card">
        <div class="connect-struct">
          <img style="border-radius: 30px; width:40px; height:40px" class="ms-4 sidebar-pic" src="" alt="">
          <h6 class="connect-shop me-4 js-connect-btn">Connect</h6>
        </div>
      </div>

    </div>
    <div class="content">
      <div class="container">
        <div class="row mt-2">
          <div class="col-11">
            <div style="display: flex;justify-content: space-between;">
              <h6 class="review">Reviews</h6>
                  <div class="seller-shop-btn">
                  
                  </div>
                
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-10 main-size mt-4">
            <div class="ms-2 total-border js-total">
              {{-- <h6 class="fw-light ">Total Reviews</h6>
              <div class="mt-3" style="display: flex;align-items: center;">
                <h6 class="no-text js-total-review">235</h6>
                <div class="arrow-up ms-1 js-arrow">
                  <i class="fa-solid fa-arrow-up"></i><span>3.2%</span>
                </div>
              </div>
              <h6 class="fw-light rate-break mt-2">Growth in review</h6> --}}
            </div>
            <div>
              <h6 class="fw-light">Average Rating</h6>
              <div class="mt-3 js-avg-rating" style="display: flex;align-items: center;">
                {{-- <h6 class="no-text">4.5</h6>
                <div class="ms-2">
                  <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                  <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                  <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                  <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                  <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                </div> --}}
              </div>
              <h6 class="fw-light rate-break mt-2">Average rating</h6>
            </div>
            <div class="js-break-down" >
              {{-- <div class="progress-5">
                <div style="display: flex;">
                  <div class="rate-layout">
                    <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                    <h6 class="ps-2 rate-no">5</h6>
                  </div>
                  <div class="rate-layout">
                    <div style="height: 8px; width: 200px;" class="progress ms-2">
                      <div class="progress-bar  progress-bar-striped progress-bar-animated bg-success"
                        style="width: 100%;"></div>
                    </div>
                    <h6 class="ms-2 rate-no">0</h6>
                  </div>
                </div>

              </div>
               
              <div class="progress-4">
                <div  style="display: flex;">
                  <div class="rate-layout ">
                    <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                    <h6 class="ps-2 rate-no">4</h6>
                  </div>
                  <div class="rate-layout">
                    <div style="height: 8px; width: 150px;" class="progress ms-2">
                      <div class="progress-bar  progress-bar-striped progress-bar-animated bg-primary"
                        style="width: 100%;"></div>
                    </div>
                    <h6 class="ms-2 rate-no">0</h6>
                  </div>
                </div>

              </div>
              <div class="progress-3">
                <div class="" style="display: flex;">
                  <div class="rate-layout ">
                    <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                    <h6 class="ps-2 rate-no">3</h6>
                  </div>  
                  <div class="rate-layout">
                    <div style="height: 8px; width: 100px;" class="progress ms-2">
                      <div class="progress-bar  progress-bar-striped progress-bar-animated bg-warning"
                        style="width: 100%;"></div>
                    </div>
                    <h6 class="ms-2 rate-no">0</h6>
                  </div>
                </div>

              </div>
              <div class="progress-2">
                <div class="" style="display: flex;">
                  <div class="rate-layout ">
                    <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                    <h6 class="ps-2 rate-no">2</h6>
                  </div>
                  <div class="rate-layout">
                    <div style="height: 8px; width: 50px;" class="progress ms-2">
                      <div class="progress-bar  progress-bar-striped progress-bar-animated bg-danger"
                        style="width: 100%;"></div>
                    </div>
                    <h6 class="ms-2 rate-no">0</h6>
                  </div>
                </div>
                
              </div>

              <div class="progress-1">
                <div class="" style="display: flex;">
                  <div class="rate-layout ">
                    <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                    <h6 class="ps-2 rate-no"> 1</h6>
                  </div>
                  <div class="rate-layout">
                    <div style="height: 8px; width: 10px;" class="progress ms-2">
                      <div class="progress-bar  progress-bar-striped progress-bar-animated bg-dark" style="width: 100%;">
                      </div>
                    </div>
                    <h6 class="ms-2 rate-no">0</h6>
                  </div>
                </div> 

              </div> --}}
               {{-- <h6 class="fw-light rate-break mt-1">Rating breakdown over the years</h6> --}}

            </div>
          </div>
        </div>
        <div class="js-review-test">     
              {{-- <div class="row">
                <div class="col-11 mt-5">
                  <hr class="underline">
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-4 ms-5 ">
                  <div style="display: flex;align-items: center;">
                    <img width="60px" src="{{asset('kaz/images/dp.png')}}" alt="">
                    <div class="ms-3">
                      <h6 class="benson">Gary Benson</h6>
                      <div style="display: flex;">
                        <img width="10px" height="18px" src="{{asset('kaz/images/location.svg')}}" alt="">
                        <h6 class="fw-light ms-1 lagos">Lagos, Nigeria</h6>
                      </div>
                    </div>

                  </div>

                </div>
                <div class="col">
                  <div class="mt-2" style="display: flex;align-items: center;">
                    <div>
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                    </div>
                    <h6 class="rate-four ps-2 ">(4)</h6>
                    <h6 class="rate-four ps-2 ">25-04-2024</h6>

                  </div>
                  <p class="rate-four mt-2 fw-light">Sleek and intuitive design that enhances user experience.</p>
                  <p class="rate-four-text fw-light">Aesthetically pleasing and easy to navigate,ensuring smooth interaction
                    every time</p>


                </div>
                <div class="col">
                  <img width="60px" src="{{asset('kaz/images/dp.png')}}" alt="">
                </div>
              </div>
              <div class="row">
                <div class="col-11 mt-5">
                  <hr class="underline">
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-4 ms-5 ">
                  <div style="display: flex;align-items: center;">
                    <img width="60px" src="{{asset('kaz/images/dp.png')}}" alt="">
                    <div class="ms-3">
                      <h6 class="benson">Gary Benson</h6>
                      <div style="display: flex;">
                        <img width="10px" height="18px" src="{{asset('kaz/images/location.svg')}}" alt="">
                        <h6 class="fw-light ms-1 lagos">Lagos, Nigeria</h6>
                      </div>
                    </div>

                  </div>

                </div>
                <div class="col">
                  <div class="mt-2" style="display: flex;align-items: center;">
                    <div>
                    <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                    </div>
                    <h6 class="rate-four ps-2">(4)</h6>
                    <h6 class="rate-four ps-2">25-04-2024</h6>

                  </div>
                  <p class="rate-four mt-2 fw-light">Sleek and intuitive design that enhances user experience.</p>
                  <p class="rate-four-text fw-light">Aesthetically pleasing and easy to navigate,ensuring smooth interaction
                    every time</p>


                </div>
                <div class="col">
                  <img src="" alt="">
                </div>
              </div>
              <div class="row">
                <div class="col-11 mt-5">
                  <hr class="underline">
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-4 ms-5 ">
                  <div style="display: flex;align-items: center;">
                    <img width="60px" src="{{asset('kaz/images/dp.png')}}" alt="">
                    <div class="ms-3">
                      <h6 class="benson">Gary Benson</h6>
                      <div style="display: flex;">
                        <img width="10px" height="18px" src="{{asset('kaz/images/location.svg')}}" alt="">
                        <h6 class="fw-light ms-1 lagos">Lagos, Nigeria</h6>
                      </div>
                    </div>

                  </div>

                </div>
                <div class="col">
                  <div class="mt-2" style="display: flex;align-items: center;">
                    <div>
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                    </div>
                    <h6 class="rate-four ps-2">(4)</h6>
                    <h6 class="rate-four ps-2">25-04-2024</h6>

                  </div>
                  <p class="rate-four mt-2 fw-light">Sleek and intuitive design that enhances user experience.</p>
                  <p class="rate-four-text fw-light">Aesthetically pleasing and easy to navigate,ensuring smooth interaction
                    every time</p>


                </div>
              </div>
              <div class="row">
                <div class="col-11 mt-5">
                  <hr class="underline">
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-4 ms-5 ">
                  <div style="display: flex;align-items: center;">
                    <img width="60px" src="{{asset('kaz/images/dp.png')}}" alt="">
                    <div class="ms-3">
                      <h6 class="benson">Gary Benson</h6>
                      <div style="display: flex;">
                        <img width="10px" height="18px" src="{{asset('kaz/images/location.svg')}}" alt="">
                        <h6 class="fw-light ms-1 lagos">Lagos, Nigeria</h6>
                      </div>
                    </div>

                  </div>

                </div>
                <div class="col">
                  <div class="mt-2" style="display: flex;align-items: center;">
                    <div>
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                      <img width="10px" src="{{asset('kaz/images/Rate.png')}}" alt="">
                    </div>
                    <h6 class="rate-four ps-2">(4)</h6>
                    <h6 class="rate-four ps-2">25-04-2024</h6>

                  </div>
                  <p class="rate-four mt-2 fw-light">Sleek and intuitive design that enhances user experience.</p>
                  <p class="rate-four-text fw-light">Aesthetically pleasing and easy to navigate,ensuring smooth interaction
                    every time</p>


                </div>
              </div>
              <div class="row">
          <div class="col-11 mt-5">
            <hr class="underline">
          </div>
              </div> --}}
      </div>
      </div>
    </div>
    
    <div  class="sellers-footer">
      <div><a href="{{ url('/') }}"><img class="main-logo" src="{{asset('kaz/images/transparent_logo.png')}}" alt=""></a></div>
      <div>
        <a href="{{ url('/') }}"><p class="fw-light text-footer">About<br>us</p></a>
      </div>
      <div>
        <a href=""><p class="fw-light  text-footer"> Terms and <br> Conditions</p></a>
      </div>
      <div>
        <a href=""><p class="fw-light  text-footer js-review-help">Help <br>desk</p></a>
      </div>
      <div>
        <a href="{{ url('/privacy') }}"><p class="fw-light  text-footer">Privacy &<br>Policy</p></a>
      </div>
      {{-- <div>
        <a href=""><p class="fw-light  text-footer">Report <br> a seller</p></a>
      </div> --}}
      <div class="down">
        <a href="https://web.facebook.com/loopmart/"><img height="35px" width="35px" src="{{asset('kaz/images/facebook.png')}}" alt=""></a>
        <img height="30px" width="30px" src="{{asset('kaz/images/twitter.png')}}" alt="">
        <a href="https://wa.link/ymloc0"><img height="29px" width="29px" src="{{asset('kaz/images/whatsapp.png')}}" alt=""></a>
        <a href="mailto:info@gmail.com.ng"><img height="30px" width="30px" src="{{asset('kaz/images/message.png')}}" alt=""></a>  
      </div>
  
    </div>
  </div>

 

  <!-- mobile-view  -->
  <div class="mobile-view">
    <div class="container-fluid">
      <!-- <div class="row">
        <div style="display: flex; align-items: center; justify-content: space-between;">
          <div class="mobile-link-btn">
            <a href="profile.html">Profile</a>
          </div>
          <div class="mobile-link-btn">
            <a href="products.html">Products</a>
          </div>
          <div class="mobile-link-btn">
            <a href="learn.html">Learn</a>
          </div>

          <div class="mobile-link-btn">
            <a href="ads.html"> Ads</a>
          </div>

          <div class="mobile-link-btn">
            <a href="wallet.html"> Wallet</a>
          </div>
       </div>
      </div> -->
      <div class="row ">
        <div class="">
          <div style="display: flex;justify-content: space-between;">
            <div class="drill js-drill-profile">
              {{-- <img class="" width="70px" src="{{asset('kaz/images/dp.png')}}" class="me-5" alt="">
              <div class="camera3-m">
                <img class="badge3-cam-m" height="20px" width="15px" src="{{asset('kaz/images/badge.png')}}" alt="">
              </div> 
              <div class="ms-2">
                <h5 class="pt-3 mired-drill-m">Drill Houston</h5>
                <h6 class="mired-email">drillHouston@gmail.com</h6>
                <h6 class="veri-m pt-1">verified seller</h6>

              </div> --}}

            </div>
            <div>
              <h6 class="connect-shop4  mt-2 js-connect-btn">Connect</h6>

            </div>
          </div>


        </div>
      </div>
      <h6 class="mt-4 ps-3 mb-2">Reviews</h6>
      <div class="card-body review-m js-main-review">
        {{-- <div class="review-text">
          <p>Total Review</p>
          <p>Average Rating</p>
        </div>
        <div class="arrangement">
          <div class="arrow-text">
            <h6 class="no-text">235</h6>
            <div class="arrow-up ms-1">
              <i class="fa-solid fa-arrow-up"></i><span>3.2%</span>
            </div>
          </div>
          <div class="star">
            <h6 class="no-text">4.5</h6>
            <div class="ms-1">
              <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
              <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
              <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
              <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
              <img src="{{asset('kaz/images/star-nill.svg')}}" alt="">
            </div>
          </div>
        </div>
        <div class="growth">
          <p style="font-size: x-small;">Growth in review this year</p>
          <p style="font-size: x-small;">Average rating this year</p>
        </div> --}}

      </div>
      <div class="card-body review-m mt-3">
        <div class="js-progress-bar">
          {{-- <div style="display: flex;">
            <div class="rate-layout">
              <img width="15px" src="{{asset('kaz/images/star-nill.svg')}}" alt="">
              <h6 class="ps-2 rate-no">5</h6>
            </div>
            <div class="rate-layout">
              <div style="height: 8px;width: 220px;" class="progress ms-2">
                <div class="progress-bar  progress-bar-striped progress-bar-animated bg-success" style="width: 100%;">
                </div>
              </div>
              <h6 class="ms-2 rate-no">200</h6>
            </div>
          </div>
          <div class="" style="display: flex;">
            <div class="rate-layout ">
              <img width="15px" src="{{asset('kaz/images/star-nill.svg')}}" alt="">
              <h6 class="ps-2 rate-no">4</h6>
            </div>
            <div class="rate-layout">
              <div style="height: 8px; width: 220px;" class="progress ms-2">
                <div class="progress-bar  progress-bar-striped progress-bar-animated bg-primary" style="width: 100%;">
                </div>
              </div>
              <h6 class="ms-2 rate-no">20</h6>
            </div>
          </div>
          <div class="" style="display: flex;">
            <div class="rate-layout ">
              <img width="15px" src="{{asset('kaz/images/star-nill.svg')}}" alt="">
              <h6 class="ps-2 rate-no">3</h6>
            </div>
            <div class="rate-layout">
              <div style="height: 8px; width: 220px;" class="progress ms-2">
                <div class="progress-bar  progress-bar-striped progress-bar-animated bg-warning" style="width: 100%;">
                </div>
              </div>
              <h6 class="ms-2 rate-no">15</h6>
            </div>
          </div>
          <div class="" style="display: flex;">
            <div class="rate-layout ">
              <img width="15px" src="{{asset('kaz/images/star-nill.svg')}}" alt="">
              <h6 class="ps-2 rate-no">2</h6>
            </div>
            <div class="rate-layout">
              <div style="height: 8px; width: 220px;" class="progress ms-2">
                <div class="progress-bar  progress-bar-striped progress-bar-animated bg-danger" style="width: 100%;">
                </div>
              </div>
              <h6 class="ms-2 rate-no">5</h6>
            </div>
          </div>
          <div class="" style="display: flex;">
            <div class="rate-layout ">
              <img width="15px" src="{{asset('kaz/images/star-nill.svg')}}" alt="">
              <h6 class="ps-2 rate-no">1</h6>
            </div>
            <div class="rate-layout">
              <div style="height: 8px; width: 220px;" class="progress ms-2">
                <div class="progress-bar  progress-bar-striped progress-bar-animated bg-dark" style="width: 100%;">
                </div>
              </div>
              <h6 class="ms-2 rate-no">0</h6>
            </div>
          </div>
          <h6 class="fw-light rate-break mt-1">Rating breakdown</h6> --}}

        </div>

      </div>
      <hr style="background-color: #343434;">
      <div class="js-content">

      </div>
       {{-- <div class="row">
        <div class="structure-m">
          <div class="structure-m2">
            <img width="60px" src="{{asset('kaz/images/dp.png')}}" alt="">
            <div class="ps-2">
              <h6 class="">Gary Benson</h6>
              <img width="10px" src="{{asset('kaz/images/location.svg')}}" alt=""><span style="font-size: small;"
                class="ps-1">portharcourt, Nigeria</span>

            </div>
          </div>
          <div class="">
            <h6 style="font-size: small;">25-04-2024</h6>
            <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
            <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
            <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
            <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
            <img src="{{asset('kaz/images/star-nill.svg')}}" alt=""><span class="ps-2" style="font-size: small;">4</span>
          </div>

        </div>
        <p class="fw-light sleek mt-3">Sleek and intuitive design that enhances user experience.
          Aesthetically pleasing and easy to navigate,ensuring smooth interaction every time</p>
        <div>
          <img src="" alt="">
        </div>

      </div>
      <hr class="m-text">
      <div class="row">
        <div class="structure-m">
          <div class="structure-m2">
            <img width="60px" src="{{asset('kaz/images/dp.png')}}" alt="">
            <div class="ps-2">
              <h6 class="">Gary Benson</h6>
              <img width="10px" src="{{asset('kaz/images/location.svg')}}" alt=""><span style="font-size: small;"
                class="ps-1">portharcourt, Nigeria</span>

            </div>
          </div>
          <div class="">
            <h6 style="font-size: small;">25-04-2024</h6>
            <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
            <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
            <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
            <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
            <img src="{{asset('kaz/images/star-nill.svg')}}" alt=""><span class="ps-2" style="font-size: small;">4</span>
          </div>

        </div>
        <p class="fw-light sleek mt-3">Sleek and intuitive design that enhances user experience.
          Aesthetically pleasing and easy to navigate,ensuring smooth interaction every time</p>

      </div>
      <hr class="m-text">
      <div class="row">
        <div class="structure-m">
          <div class="structure-m2">
            <img width="60px" src="{{asset('kaz/images/dp.png')}}" alt="">
            <div class="ps-2">
              <h6 class="">Gary Benson</h6>
              <img width="10px" src="{{asset('kaz/images/location.svg')}}" alt=""><span style="font-size: small;"
                class="ps-1">portharcourt, Nigeria</span>

            </div>
          </div>
          <div class="">
            <h6 style="font-size: small;">25-04-2024</h6>
            <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
            <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
            <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
            <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
            <img src="{{asset('kaz/images/star-nill.svg')}}" alt=""><span class="ps-2" style="font-size: small;">4</span>
          </div>

        </div>
        <p class="fw-light sleek mt-3">Sleek and intuitive design that enhances user experience.
          Aesthetically pleasing and easy to navigate,ensuring smooth interaction every time</p>

      </div>
      <hr class="m-text">
      <div class="row">
        <div class="structure-m">
          <div class="structure-m2">
            <img width="60px" src="{{asset('kaz/images/dp.png')}}" alt="">
            <div class="ps-2">
              <h6 class="">Gary Benson</h6>
              <img width="10px" src="{{asset('kaz/images/location.svg')}}" alt=""><span style="font-size: small;"
                class="ps-1">portharcourt, Nigeria</span>

            </div>
          </div>
          <div class="">
            <h6 style="font-size: small;">25-04-2024</h6>
            <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
            <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
            <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
            <img src="{{asset('kaz/images/star-active.svg')}}" alt="">
            <img src="{{asset('kaz/images/star-nill.svg')}}" alt=""><span class="ps-2" style="font-size: small;">4</span>
          </div>

        </div>
        <p class="fw-light sleek mt-3">Sleek and intuitive design that enhances user experience.
          Aesthetically pleasing and easy to navigate,ensuring smooth interaction every time</p>

      </div>  --}}
      {{-- <hr class="m-text mb-4"> --}}

    </div>
  </div>
  </div>
  </div>
 

<script type="module" src="{{ asset('backend-js/review.js') }}"></script>
<script src="{{ asset('innocent/assets/js/preloader.js') }}"></script> 
</body>

</html>

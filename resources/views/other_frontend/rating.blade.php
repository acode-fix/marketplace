<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rating</title>
  <link rel="icon" href="{{ asset('innocent/assets/image/favicon.svg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/navbar.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/rating.css') }}?time={{ time() }}">
  <link rel="stylesheet" href="{{ asset('innocent/assets/css/preloader.css')}}">
  <script src="{{ asset('kaz/js/rating.js') }}"></script>
  <script src="{{ asset('kaz/js/bootstrap.js') }}"></script>

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
      <a href="{{ url('/notification_mobile') }}"><img class="arrow" src="{{asset('kaz/images/Arrow.png')}}" alt=""></a>
      <h6 style="font-size: 20px;" class="fw-light ms-4">Rating</h6>
    </div>
    <div class="left-section">
      <a href="{{ url('/') }}"><img class="img-fluid ms-3 main-logo" src="{{asset('kaz/images/transparent_logo.png')}}" alt=""></a>
      <h6 class="ms-5 fw-bold profile">Rating</h6>
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
       <a href="{{ url('/ads') }}"> <button type="button" class="btn btn-warning btn-height me-5"> + create Ads</button></a>
      </div>
      <div class="me-1 js-name">
        {{-- <h6 class="name">Mired Augustine</h6>
        <h6 class="mired-text fw-light">miredaugustine@gmail.com</h6> --}}
      </div>
      <div class="profile-dropdown js-profile-dropdown">
        {{-- <img style="height: 40px" class="img-fluid profile-picture" src="{{asset('kaz/images/dp.png')}}" alt="" id="profileDropdownBtn">
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
            <a href="settings.html">Dashboard</a>
            <a href="refer.html">Refer A Friend</a>
            <a href="privacy.html">Privacy Policy</a>
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
        <li><a id="nav-logOut" href="#">Log Out</a></li>
        <hr style="background-color: black; width: 70%;">
        <li><a style="color: #ff0000;" href="{{ url('/delete') }}">Delete Account</a></li>
      </ul>
    </div>
  </div>

  <div style="margin-top: 130px;" class="container rating">
    <div class="row">
      <div class="col">
        <div style="display: flex; justify-content: space-around;">
          <h6 style="font-size: large;" class="mt-3">Rate the seller(Rating this seller means you have purchased this
            product <span style="font-size: x-small;">(s)</span> )</h6>
          <div></div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div style="display: flex; justify-content: center;" class="col">
        <div class="review-m size js-review">
          {{-- <div class="structure-m2 card-body pt-2">
            <img width="40px" src="{{asset('kaz/images/dp.png')}}" alt="">
            <div class="ps-2">
              <h6 style="font-size: small;" class="pt-1">Gary Benson</h6>
              <img width="9px" src="{{asset('kaz/images/location.svg')}}" alt="">
              <span style="font-size: small;" class="ps-1">portharcourt, Nigeria</span>
            </div>
          </div>
          <div>
            <img class="tab" src="{{asset('kaz/images/Picture of product (Tablet).png')}}" alt="">
          </div> --}}
        </div>
        <form id="review-form" action="">
          <div class="review-m2 ms-4 card-body">
            <h6 style="text-align: center;" class="fw-light pt-1">How would you rate your experience with this seller?
            </h6>
            <div style="text-align: center;">
              <button class="star" type="button">&#9734;</button>
              <button class="star" type="button">&#9734;</button>
              <button class="star" type="button">&#9734;</button>
              <button class="star" type="button">&#9734;</button>
              <button class="star" type="button">&#9734;</button>
              <p class="current-rating d-none">0 of 5</p>
              <input type="hidden" id="rating" name="rate" value="0">
              <h6 class="error-rating text-danger"></h6>
              <h6 class="error-comment text-danger"></h6>
              <div class="offset-md-1 pt-2" style="position: relative;">
                <textarea name="comment" class="form-control textarea1 js-input" id="exampleFormControlTextarea1" rows="4"></textarea>
                <div id="placeholder" class="comments js-comment">Additional Comments...</div>
              </div>
             
            </div>
            <div class="container pt-3" style="display: flex; justify-content: space-between;">

            <input type="submit" id="submit" value="Submit review">

              <a class="no-link js-no" href="">
                <h6 class="connect-shop2 fw-light me-2">No thanks</h6>
              </a>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- mobile-view  -->
  <div class="main">
    <div class="mobile-view">
      <div class="container">
        <div class="row">
          <div class="col">
            <div>
              <h6 class="mt-2 fw-bold rate-mobile">Rate the seller</h6>
              <div></div>
            </div>
          </div>
        </div>

      </div>
      <div class="container">
        <div class="row mt-3">
          <div class="col js-mobile">
            {{-- <div class="mobile-st">
              <img class="ms-2" width="40px" src="{{asset('kaz/images/dp.png')}}" alt="">
              <div class="ps-3">
                <h6 style="font-size: small;" class="pt-1">Gary Benson</h6>
                <img width="9px" src="{{asset('kaz/images/location.svg')}}" alt="">
                <span style="font-size: small;" class="ps-1">portharcourt, Nigeria</span>
              </div>

            </div>
            <div class="mt-2">
              <img class="tab" src="{{asset('kaz/images/Picture of product (Tablet).png')}}" alt="">
            </div> --}}
          </div>
        </div>
        <div class="row mt-4">
          <div class="col">
            <form id="mobile-review" action="">
              <div class="structure-box">
                <h6 style="text-align: center;" class="fw-light pt-3">How would you rate your experience with this
                  seller?</h6>
                <div style="text-align: center;">
                  <button class="mobile-star" type="button">&#9734;</button>
                  <button class="mobile-star" type="button">&#9734;</button>
                  <button class="mobile-star" type="button">&#9734;</button>
                  <button class="mobile-star" type="button">&#9734;</button>
                  <button class="mobile-star" type="button">&#9734;</button>
                  <p class="mobile-current-rating d-none">0 of 5</p>
                  <input type="hidden" id="mobile-rating" name="rate" value="0">
                  <h6 class="mobileErr-rating text-danger"></h6>
                  <h6 class="mobileErr-comment text-danger"></h6>
                  <div class=" pt-2">
                    <textarea name="comment" class="form-control textarea2 mobile-text" id="exampleFormControlTextarea1" rows="3"
                      placeholder="Additional comments"></textarea>
                  </div>

                  <div class="mt-3 pb-4 container-fluid"
                    style="display: flex;align-items: center;justify-content: space-between;">
                    <input style="margin-left: -4px;" class="" type="submit" id="submit2" value="Submit review">
                    <h6 style="font-size: small;" class="fw-light js-mobile-no">No thanks</h6>
                  </div>
                </div>

              </div>

            </form>

          </div>
        </div>


      </div>

    </div>
  </div>




<script type="module" src="{{ asset('backend-js/rating.js') }}?time={{ time() }}"></script>
<script src="{{ asset('innocent/assets/js/preloader.js') }}?time={{ time() }}"></script> 
</body>

</html>

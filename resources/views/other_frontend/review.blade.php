<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/navbar.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/shop.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/review.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css1/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css1/fontawesome.min.css') }}">
  <script src="{{ asset('kaz/js/bootstrap.js') }}"></script>
  <script src="{{ asset('kaz/js/review.js') }}"></script>


  <style>

  </style>
</head>

<body>
  <div class="header-section">
    <div class="arrow-div">
      <a href="{{ url('/') }}"><img class="arrow" src="kaz/images/Arrow.png" alt=""></a>
      <h6 style="font-size: 20px;" class="fw-light ms-4">Reviews</h6>
    </div>
    <div class="left-section">
      <a href="{{ url('/') }}"><img class="img-fluid ms-3" src="kaz/images/logo.png" alt=""></a>
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
        <button type="button" class="btn btn-warning btn-height me-5"> + create Ads</button>
      </div>
      <div class="me-1">
        <h6 class="name">Mired Augustine</h6>
        <h6 class="mired-text fw-light">miredaugustine@gmail.com</h6>
      </div>
      <div class="profile-dropdown">
        <img class="img-fluid profile-picture" src="kaz/images/dp.png" alt="" id="profileDropdownBtn">
        <div class="dropdown-menu" id="dropdownMenu">
          <div class="container drop-struct">
            <img class="pt-1" width="50px" src="kaz/images/dp.png" alt="">
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
        <li><a href="#">Log Out</a></li>
        <hr style="background-color: black; width: 70%;">
        <li><a style="color: #ff0000;" href="{{ url('/delete') }}">Delete Account</a></li>
      </ul>
    </div>
  </div>

  <div class="main">
    <div class="side-barr">
      <div class="card sidebar-card mb-3 text-dark ms-2 mt-3" style="width:240px;">
        <div class="card-body ">
          <div class="ms-2">
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
                <img width="10px" height="13px" src="kaz/images/location.svg" alt="">
                <span style="font-size: small;">From</span>
              </div>
              <h6 style="font-size: small;">Abuja,Nigera</h6>
            </div>
            <div class="side-display">
              <div>
                <img width="15px" src="kaz/images/profile.svg" alt="">
                <span style="font-size: small;">Member since</span>
              </div>
              <h6 style="font-size: small;">Dec,2022</h6>

            </div>
            <div class="side-display">
              <div>
                <img width="15px" src="kaz/images/product.svg" alt="">
                <span style="font-size: small;">Listed products</span>
              </div>
              <h6 style="font-size: small;">12</h6>

            </div>
            <hr style="background-color: #343434;">
          </div>
          <div class="ms-2">
            <h6 class="card-title">Reviews</h6>
            <div>
              <img src="kaz/images/star-active.svg" class="img-fluid image-rate" width="15px" alt="">
              <img src="kaz/images/star-active.svg" class="img-fluid image-rate" width="15px" alt="">
              <img src="kaz/images/star-active.svg" class="img-fluid image-rate" width="15px" alt="">
              <img src="kaz/images/star-active.svg" class="img-fluid image-rate" width="15px" alt="">
              <img src="kaz/images/star-nill.svg" class="img-fluid image-rate" width="15px" alt=""> <span
                style="font-size: small;">(4.5)</span>
            </div>
            <a class="view" href="{{ url('/rating') }}">View all</a>

          </div>


        </div>
      </div>
      <div style="color: black; width:240px ;" class="ms-2 connect-sidebar card">
        <div class="connect-struct">
          <img width="40px" class="ms-4" src="kaz/images/dp.png" alt="">
          <h6 class="connect-shop me-4">Connect</h6>
        </div>
      </div>

    </div>
    <div class="content">
      <div class="container">
        <div class="row mt-2">
          <div class="col-11">
            <div style="display: flex;justify-content: space-between;">
              <h6 class="review">Reviews</h6>
              <h6 class="view-shop"><a class="view-link" href="{{ url('/shop') }}">View Shop</a></h6>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-10 main-size mt-4">
            <div class="ms-2 total-border">
              <h6 class="fw-light ">Total Reviews</h6>
              <div class="mt-3" style="display: flex;align-items: center;">
                <h6 class="no-text">235</h6>
                <div class="arrow-up ms-1">
                  <i class="fa-solid fa-arrow-up"></i><span>3.2%</span>
                </div>
              </div>
              <h6 class="fw-light rate-break mt-2">Growth in review this year</h6>
            </div>
            <div>
              <h6 class="fw-light">Average Rating</h6>
              <div class="mt-3" style="display: flex;align-items: center;">
                <h6 class="no-text">4.5</h6>
                <div class="ms-2">
                  <img width="10px" src="kaz/images/Rate.png" alt="">
                  <img width="10px" src="kaz/images/Rate.png" alt="">
                  <img width="10px" src="kaz/images/Rate.png" alt="">
                  <img width="10px" src="kaz/images/Rate.png" alt="">
                  <img width="10px" src="kaz/images/Rate.png" alt="">
                </div>
              </div>
              <h6 class="fw-light rate-break mt-2">Average rating this year</h6>
            </div>
            <div>
              <div style="display: flex;">
                <div class="rate-layout">
                  <img width="10px" src="kaz/images/Rate.png" alt="">
                  <h6 class="ps-2 rate-no">5</h6>
                </div>
                <div class="rate-layout">
                  <div style="height: 8px; width: 200px;" class="progress ms-2">
                    <div class="progress-bar  progress-bar-striped progress-bar-animated bg-success"
                      style="width: 100%;"></div>
                  </div>
                  <h6 class="ms-2 rate-no">200</h6>
                </div>
              </div>
              <div class="" style="display: flex;">
                <div class="rate-layout ">
                  <img width="10px" src="kaz/images/Rate.png" alt="">
                  <h6 class="ps-2 rate-no">4</h6>
                </div>
                <div class="rate-layout">
                  <div style="height: 8px; width: 150px;" class="progress ms-2">
                    <div class="progress-bar  progress-bar-striped progress-bar-animated bg-primary"
                      style="width: 100%;"></div>
                  </div>
                  <h6 class="ms-2 rate-no">20</h6>
                </div>
              </div>
              <div class="" style="display: flex;">
                <div class="rate-layout ">
                  <img width="10px" src="kaz/images/Rate.png" alt="">
                  <h6 class="ps-2 rate-no">3</h6>
                </div>
                <div class="rate-layout">
                  <div style="height: 8px; width: 100px;" class="progress ms-2">
                    <div class="progress-bar  progress-bar-striped progress-bar-animated bg-warning"
                      style="width: 100%;"></div>
                  </div>
                  <h6 class="ms-2 rate-no">15</h6>
                </div>
              </div>
              <div class="" style="display: flex;">
                <div class="rate-layout ">
                  <img width="10px" src="kaz/images/Rate.png" alt="">
                  <h6 class="ps-2 rate-no">2</h6>
                </div>
                <div class="rate-layout">
                  <div style="height: 8px; width: 50px;" class="progress ms-2">
                    <div class="progress-bar  progress-bar-striped progress-bar-animated bg-danger"
                      style="width: 100%;"></div>
                  </div>
                  <h6 class="ms-2 rate-no">5</h6>
                </div>
              </div>
              <div class="" style="display: flex;">
                <div class="rate-layout ">
                  <img width="10px" src="kaz/images/Rate.png" alt="">
                  <h6 class="ps-2 rate-no">1</h6>
                </div>
                <div class="rate-layout">
                  <div style="height: 8px; width: 10px;" class="progress ms-2">
                    <div class="progress-bar  progress-bar-striped progress-bar-animated bg-dark" style="width: 100%;">
                    </div>
                  </div>
                  <h6 class="ms-2 rate-no">0</h6>
                </div>
              </div>
              <h6 class="fw-light rate-break mt-1">Rating breakdown over the years</h6>

            </div>
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
              <img width="60px" src="kaz/images/dp.png" alt="">
              <div class="ms-3">
                <h6 class="benson">Gary Benson</h6>
                <div style="display: flex;">
                  <img width="10px" height="18px" src="kaz/images/location.svg" alt="">
                  <h6 class="fw-light ms-1 lagos">Lagos, Nigeria</h6>
                </div>
              </div>

            </div>

          </div>
          <div class="col">
            <div class="mt-2" style="display: flex;align-items: center;">
              <div>
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
              </div>
              <h6 class="rate-four ps-2 ">(4)</h6>
              <h6 class="rate-four ps-2 ">25-04-2024</h6>

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
              <img width="60px" src="kaz/images/dp.png" alt="">
              <div class="ms-3">
                <h6 class="benson">Gary Benson</h6>
                <div style="display: flex;">
                  <img width="10px" height="18px" src="kaz/images/location.svg" alt="">
                  <h6 class="fw-light ms-1 lagos">Lagos, Nigeria</h6>
                </div>
              </div>

            </div>

          </div>
          <div class="col">
            <div class="mt-2" style="display: flex;align-items: center;">
              <div>
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
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
              <img width="60px" src="kaz/images/dp.png" alt="">
              <div class="ms-3">
                <h6 class="benson">Gary Benson</h6>
                <div style="display: flex;">
                  <img width="10px" height="18px" src="kaz/images/location.svg" alt="">
                  <h6 class="fw-light ms-1 lagos">Lagos, Nigeria</h6>
                </div>
              </div>

            </div>

          </div>
          <div class="col">
            <div class="mt-2" style="display: flex;align-items: center;">
              <div>
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
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
              <img width="60px" src="kaz/images/dp.png" alt="">
              <div class="ms-3">
                <h6 class="benson">Gary Benson</h6>
                <div style="display: flex;">
                  <img width="10px" height="18px" src="kaz/images/location.svg" alt="">
                  <h6 class="fw-light ms-1 lagos">Lagos, Nigeria</h6>
                </div>
              </div>

            </div>

          </div>
          <div class="col">
            <div class="mt-2" style="display: flex;align-items: center;">
              <div>
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
                <img width="10px" src="kaz/images/Rate.png" alt="">
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
      </div>


    </div>


    <div class="mt-5 sellers-footer">
      <div><img src="kaz/images/Logo.png" alt=""></div>
      <div>
        <p class="fw-light text-footer">About<br>us</p>
      </div>
      <div>
        <p class="fw-light  text-footer"> Terms and <br> Conditions</p>
      </div>
      <div>
        <p class="fw-light  text-footer">Help <br>center</p>
      </div>
      <div>
        <p class="fw-light  text-footer">Privacy & <br> Cookies <br>Policy</p>
      </div>
      <div>
        <p class="fw-light  text-footer">Report <br> a seller</p>
      </div>
      <div class="down">
        <img height="35px" width="35px" src="kaz/images/facebook.png" alt="">
        <img height="30px" width="30px" src="kaz/images/twitter.png" alt="">
        <img height="29px" width="29px" src="kaz/images/whatsapp.png" alt="">
        <img height="30px" width="30px" src="kaz/images/message.png" alt="">
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
            <div class="drill">
              <img class="" width="70px" src="kaz/images/dp.png" class="me-5" alt="">
              <div class="camera3-m">
                <img class="badge3-cam-m" height="20px" width="15px" src="kaz/images/badge.png" alt="">
              </div>
              <div class="ms-2">
                <h5 class="pt-3 mired-drill-m">Drill Houston</h5>
                <h6 class="mired-email">drillHouston@gmail.com</h6>
                <h6 class="veri-m pt-1">verified seller</h6>

              </div>

            </div>
            <div>
              <h6 class="connect-shop4  mt-2">Connect</h6>

            </div>
          </div>


        </div>
      </div>
      <h6 class="mt-4 ps-3 mb-2">Reviews</h6>
      <div class="card-body review-m">
        <div class="review-text">
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
              <img src="kaz/images/star-active.svg" alt="">
              <img src="kaz/images/star-active.svg" alt="">
              <img src="kaz/images/star-active.svg" alt="">
              <img src="kaz/images/star-active.svg" alt="">
              <img src="kaz/images/star-nill.svg" alt="">
            </div>
          </div>
        </div>
        <div class="growth">
          <p style="font-size: x-small;">Growth in review this year</p>
          <p style="font-size: x-small;">Average rating this year</p>
        </div>


      </div>
      <div class="card-body review-m mt-3">
        <div>
          <div style="display: flex;">
            <div class="rate-layout">
              <img width="15px" src="kaz/images/star-nill.svg" alt="">
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
              <img width="15px" src="kaz/images/star-nill.svg" alt="">
              <h6 class="ps-2 rate-no">4</h6>
            </div>
            <div class="rate-layout">
              <div style="height: 8px; width: 180px;" class="progress ms-2">
                <div class="progress-bar  progress-bar-striped progress-bar-animated bg-primary" style="width: 100%;">
                </div>
              </div>
              <h6 class="ms-2 rate-no">20</h6>
            </div>
          </div>
          <div class="" style="display: flex;">
            <div class="rate-layout ">
              <img width="15px" src="kaz/images/star-nill.svg" alt="">
              <h6 class="ps-2 rate-no">3</h6>
            </div>
            <div class="rate-layout">
              <div style="height: 8px; width: 150px;" class="progress ms-2">
                <div class="progress-bar  progress-bar-striped progress-bar-animated bg-warning" style="width: 100%;">
                </div>
              </div>
              <h6 class="ms-2 rate-no">15</h6>
            </div>
          </div>
          <div class="" style="display: flex;">
            <div class="rate-layout ">
              <img width="15px" src="kaz/images/star-nill.svg" alt="">
              <h6 class="ps-2 rate-no">2</h6>
            </div>
            <div class="rate-layout">
              <div style="height: 8px; width: 100px;" class="progress ms-2">
                <div class="progress-bar  progress-bar-striped progress-bar-animated bg-danger" style="width: 100%;">
                </div>
              </div>
              <h6 class="ms-2 rate-no">5</h6>
            </div>
          </div>
          <div class="" style="display: flex;">
            <div class="rate-layout ">
              <img width="15px" src="kaz/images/star-nill.svg" alt="">
              <h6 class="ps-2 rate-no">1</h6>
            </div>
            <div class="rate-layout">
              <div style="height: 8px; width: 10px;" class="progress ms-2">
                <div class="progress-bar  progress-bar-striped progress-bar-animated bg-dark" style="width: 100%;">
                </div>
              </div>
              <h6 class="ms-2 rate-no">0</h6>
            </div>
          </div>
          <h6 class="fw-light rate-break mt-1">Rating breakdown over the years</h6>

        </div>

      </div>
      <hr style="background-color: #343434;">
      <div class="row">
        <div class="structure-m">
          <div class="structure-m2">
            <img width="60px" src="kaz/images/dp.png" alt="">
            <div class="ps-2">
              <h6 class="">Gary Benson</h6>
              <img width="10px" src="kaz/images/location.svg " alt=""><span style="font-size: small;"
                class="ps-1">portharcourt, Nigeria</span>

            </div>
          </div>
          <div class="">
            <h6 style="font-size: small;">25-04-2024</h6>
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-nill.svg" alt=""><span class="ps-2" style="font-size: small;">4</span>
          </div>

        </div>
        <p class="fw-light sleek mt-3">Sleek and intuitive design that enhances user experience.
          Aesthetically pleasing and easy to navigate,ensuring smooth interaction every time</p>

      </div>
      <hr class="m-text">
      <div class="row">
        <div class="structure-m">
          <div class="structure-m2">
            <img width="60px" src="kaz/images/dp.png" alt="">
            <div class="ps-2">
              <h6 class="">Gary Benson</h6>
              <img width="10px" src="kaz/images/location.svg " alt=""><span style="font-size: small;"
                class="ps-1">portharcourt, Nigeria</span>

            </div>
          </div>
          <div class="">
            <h6 style="font-size: small;">25-04-2024</h6>
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-nill.svg" alt=""><span class="ps-2" style="font-size: small;">4</span>
          </div>

        </div>
        <p class="fw-light sleek mt-3">Sleek and intuitive design that enhances user experience.
          Aesthetically pleasing and easy to navigate,ensuring smooth interaction every time</p>

      </div>
      <hr class="m-text">
      <div class="row">
        <div class="structure-m">
          <div class="structure-m2">
            <img width="60px" src="kaz/images/dp.png" alt="">
            <div class="ps-2">
              <h6 class="">Gary Benson</h6>
              <img width="10px" src="kaz/images/location.svg " alt=""><span style="font-size: small;"
                class="ps-1">portharcourt, Nigeria</span>

            </div>
          </div>
          <div class="">
            <h6 style="font-size: small;">25-04-2024</h6>
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-nill.svg" alt=""><span class="ps-2" style="font-size: small;">4</span>
          </div>

        </div>
        <p class="fw-light sleek mt-3">Sleek and intuitive design that enhances user experience.
          Aesthetically pleasing and easy to navigate,ensuring smooth interaction every time</p>

      </div>
      <hr class="m-text">
      <div class="row">
        <div class="structure-m">
          <div class="structure-m2">
            <img width="60px" src="kaz/images/dp.png" alt="">
            <div class="ps-2">
              <h6 class="">Gary Benson</h6>
              <img width="10px" src="kaz/images/location.svg " alt=""><span style="font-size: small;"
                class="ps-1">portharcourt, Nigeria</span>

            </div>
          </div>
          <div class="">
            <h6 style="font-size: small;">25-04-2024</h6>
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-nill.svg" alt=""><span class="ps-2" style="font-size: small;">4</span>
          </div>

        </div>
        <p class="fw-light sleek mt-3">Sleek and intuitive design that enhances user experience.
          Aesthetically pleasing and easy to navigate,ensuring smooth interaction every time</p>

      </div>
      <hr class="m-text mb-4">

    </div>
  </div>
  </div>
  </div>






  <script>


  </script>


</body>

</html>

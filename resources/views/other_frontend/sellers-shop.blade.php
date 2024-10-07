<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/navbar.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/shop.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/sellers.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css1/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css1/fontawesome.min.css') }}">
  <script src="{{ asset('kaz/js/bootstrap.js') }}"></script>
  <script src="{{ asset('kaz/js/card.js') }}"></script>
  <script src="{{ asset('kaz/js/read.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <!-- Include SweetAlert CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <style>

  </style>
</head>

<body>
  <div class="header-section">
    <div class="arrow-div">
      <a href="{{ url('/') }}"><img class="arrow" src="kaz/images/Arrow.png" alt=""></a>
      <h6 style="font-size: 20px;" class="fw-light ms-4">Sellers Shop</h6>
    </div>
    <div class="left-section">
      <a href="{{ url('/') }}"><img class="img-fluid ms-3" src="kaz/images/logo.png" alt=""></a>
      <h6 class="ms-5 fw-bold profile">Sellers Shop</h6>
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
        <h6 class="name">Loading</h6>
        <h6 class="mired-text fw-light">loading</h6>
      </div>
      <div class="profile-dropdown">
        <img class="img-fluid" style="width: 50px; height:50px; border-radius:50px" src="kaz/images/dp.png" alt="" id="profileDropdownBtn">
        <div class="dropdown-menu js-dropdown" id="dropdownMenu">
           <div class="container drop-struct">
            <img id="profile_image" class="pt-1" width="50px" src="kaz/images/dp.png" alt="">
            <div class="ms-2 pt-1">
              <h6 id="profile_name">Mired Augustine</h6>
              <h6 id="profile_email" style="font-size: small;">Miredaugustine@gmail.com</h6>
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
            <p class="about_me"></p>
            <p class="registration_date"></p>

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
              <h6 style="font-size: small;">May,2022</h6>

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
            <a class="view" href="{{ url('/review') }}">View all</a>

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
        <div class="row ">
          <div class="col  content-margin">
            <form action="">
              <div style="width: 90%;" class="card mb-3  main-card-preview">
                <img style="height:220px;" id="banner" src="kaz/images/Picture of product (Tablet).png"
                  class="card-img-top main-img-border" alt="...">
                <div class="card-body">
                  <div class="row">
                    <div class="col mt-2">
                      <div style="display: flex; align-items: center;">
                        <img src="kaz/images/dp.png" class="ms-2" alt="">
                        <div class="camera2">
                          <img class="badge-cam " height="20px" width="15px" src="kaz/images/badge.png" alt="">
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
              </div>
            </form>
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
              <div>
                <div class="card card-preview" id="productCard" data-card-index="0">
                  <h6 class="sold">Sold 75</h6>
                  <img src="kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                  <div class="card-body">
                    <div class="card-structure">
                      <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                      <div class="star-layout">
                        <div>
                          <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                          <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                          <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        </div>
                        <div>
                          <h6 class="ps-1 rate-no">5.0</h6>
                        </div>
                      </div>
                    </div>
                    <div class="footer-card">
                      <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                      <img class="mt-3 logo-bag" src="kaz/images/logo icon.png" alt="">
                    </div>
                  </div>
                </div>
                <div class="overlay" onclick="closeCustomContainer()" id="overlay"></div>
                <div id="loadedCardContainer"></div>

              </div>
              <div class="card card-preview" data-card-index="0">
                <h6 class="sold">Sold 75</h6>
                <img src="kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <div class="card-structure">
                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                    <div class="star-layout">
                      <div>
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                      </div>
                      <div>
                        <h6 class="ps-1 rate-no">5.0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="footer-card">
                    <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                    <img class="mt-3 logo-bag" src="kaz/images/logo icon.png" alt="">
                  </div>
                </div>
              </div>
              <div class="card card-preview">
                <h6 class="sold">Sold 75</h6>
                <img src="kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <div class="card-structure">
                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                    <div class="star-layout">
                      <div>
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                      </div>
                      <div>
                        <h6 class="ps-1 rate-no">5.0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="footer-card">
                    <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                    <img class="mt-3 logo-bag" src="kaz/images/logo icon.png" alt="">
                  </div>
                </div>
              </div>
              <div class="card card-preview">
                <h6 class="sold">Sold 75</h6>
                <img src="kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <div class="card-structure">
                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                    <div class="star-layout">
                      <div>
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                      </div>
                      <div>
                        <h6 class="ps-1 rate-no">5.0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="footer-card">
                    <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                    <img class="mt-3 logo-bag" src="kaz/images/logo icon.png" alt="">
                  </div>
                </div>
              </div>
              <div class="card card-preview">
                <h6 class="sold">Sold 75</h6>
                <img src="kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <div class="card-structure">
                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                    <div class="star-layout">
                      <div>
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                      </div>
                      <div>
                        <h6 class="ps-1 rate-no">5.0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="footer-card">
                    <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                    <img class="mt-3 logo-bag" src="kaz/images/logo icon.png" alt="">
                  </div>
                </div>
              </div>
              <div class="card card-preview">
                <h6 class="sold">Sold 75</h6>
                <img src="kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <div class="card-structure">
                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                    <div class="star-layout">
                      <div>
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                      </div>
                      <div>
                        <h6 class="ps-1 rate-no">5.0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="footer-card">
                    <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                    <img class="mt-3 logo-bag" src="kaz/images/logo icon.png" alt="">
                  </div>
                </div>
              </div>
              <div class="card card-preview">
                <h6 class="sold">Sold 75</h6>
                <img src="kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <div class="card-structure">
                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                    <div class="star-layout">
                      <div>
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                      </div>
                      <div>
                        <h6 class="ps-1 rate-no">5.0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="footer-card">
                    <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                    <img class="mt-3 logo-bag" src="kaz/images/logo icon.png" alt="">
                  </div>
                </div>
              </div>
              <div class="card card-preview">
                <h6 class="sold">Sold 75</h6>
                <img src="kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <div class="card-structure">
                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                    <div class="star-layout">
                      <div>
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                      </div>
                      <div>
                        <h6 class="ps-1 rate-no">5.0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="footer-card">
                    <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                    <img class="mt-3 logo-bag" src="kaz/images/logo icon.png" alt="">
                  </div>
                </div>
              </div>
              <div class="card card-preview">
                <h6 class="sold">Sold 75</h6>
                <img src="kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <div class="card-structure">
                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                    <div class="star-layout">
                      <div>
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                      </div>
                      <div>
                        <h6 class="ps-1 rate-no">5.0</h6>
                      </div>
                    </div>
                  </div>
                  <div class="footer-card">
                    <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram, 500mph</p>
                    <img class="mt-3 logo-bag" src="kaz/images/logo icon.png" alt="">
                  </div>
                </div>
              </div>
              <!-- Repeat this structure for each card -->
            </div>
          </div>
          <div style="text-align: center;">
            <p class="fw-bold mt-5">you've reached the end of the list</p>
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
    <div style="margin-top: -20px;" class="card  main-card-mobile">
      <img style="height:180px;" id="banner" src="kaz/images/thumbnail-2.webp" class="card-img-top main-img-border2"
        alt="...">
      <div class="card-body">
        <div style="display: flex;justify-content: space-between;">
          <div class="drill">
            <img class="" width="50px" src="kaz/images/dp.png" class="" alt="">
            <div class="camera2-m">
              <img class="badge-cam-m" height="20px" width="15px" src="kaz/images/badge.png" alt="">
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
      </div>
    </div>
    <div class="container-fluid">
      <div class="row mt-3">
        <div class="col">
          <div class="card-body about main-card-mobile-m ">
            <h6>About me</h6>
            <p style="font-size: small; " class="card-text our-company  pt-1">
              Our company is a full service creation agency that specializes in defining top-notch
              UI/UX design,video editing and <span id="moreText2" style="display: none;">Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Magnam reiciendis, eveniet porro ad iusto illum quisquam dolores modi
                excepturi officia. Doloribus dolor sunt dicta! A fuga, nesciunt non laborum minus provident repellat
                numquam rerum natus unde dolorum corrupti culpa. Doloremque, sunt nam modi porro unde ipsam voluptate
                ipsa alias ab dolorum vitae sed rem beatae exercitationem repellat quas! Molestias ipsa dolore sequi
                asperiores quia. Expedita iure similique vel nihil magni.</span>
              <a href="#" id="readMoreBtn2"> ......Read more</a>
            </p>
          </div>

        </div>
      </div>
      <div style="margin-top: 10px;" class="row">
        <div class="col-5">
          <div class="card-body main-card-mobile-rm ">
            <h6>Reviews</h6>
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-active.svg" alt="">
            <img src="kaz/images/star-nill.svg" alt="">
            <div class="pt-1">
              <a class="view-m" href="{{ url('/review') }}"><i>View all</i></a><span class="bracket ps-3">(4.5)</span>
            </div>

          </div>

        </div>
        <div class="col">
          <div class="card-body main-card-mobile-rm">
            <div class="side-display">
              <div>
                <img width="8px" height="10px" src="kaz/images/location.svg" alt="">
                <span class="from ">From</span>
              </div>
              <h6 class="from ">Abuja,Nigera</h6>
            </div>
            <div class="side-display">
              <div>
                <img width="15px" src="kaz/images/profile.svg" alt="">
                <span class="from ">Member since</span>
              </div>
              <h6 class="from ">May,2022</h6>

            </div>
            <div class="side-display">
              <div>
                <img width="15px" src="kaz/images/product.svg" alt="">
                <span class="from ">Listed products</span>
              </div>
              <h6 class="from ">12</h6>

            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <h6 class="mt-3 ms-1">Products Listed</h6>
      <div class="row mt-3 mb-4">
        <div class="">
          <div class="mobile-card">
            <a class="link-card" href="{{ url('/product_des') }}">
              <div class="card card-preview" data-card-id="1">
                <div class="sold-mobile">
                  <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                  <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px" alt=""><span
                    class="img-rate ps-1">3.6</span>
                </div>
                <img src="kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                  <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                  <div class="footer-card-mobile">
                    <div style="display: flex;align-items: center;">
                      <img style="margin-left:-10px;" width="8px" src="kaz/images/location.svg" alt=""><span
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
                  <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px" alt=""><span
                    class="img-rate ps-1">3.6</span>
                </div>
                <img src="kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                  <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                  <div class="footer-card-mobile">
                    <div style="display: flex;align-items: center;">
                      <img style="margin-left:-10px;" width="8px" src="kaz/images/location.svg" alt=""><span
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
                  <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px" alt=""><span
                    class="img-rate ps-1">3.6</span>
                </div>
                <img src="kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                  <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                  <div class="footer-card-mobile">
                    <div style="display: flex;align-items: center;">
                      <img style="margin-left:-10px;" width="8px" src="kaz/images/location.svg" alt=""><span
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
                  <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px" alt=""><span
                    class="img-rate ps-1">3.6</span>
                </div>
                <img src="kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                  <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                  <div class="footer-card-mobile">
                    <div style="display: flex;align-items: center;">
                      <img style="margin-left:-10px;" width="8px" src="kaz/images/location.svg" alt=""><span
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
                  <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px" alt=""><span
                    class="img-rate ps-1">3.6</span>
                </div>
                <img src="kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                  <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                  <div class="footer-card-mobile">
                    <div style="display: flex;align-items: center;">
                      <img style="margin-left:-10px;" width="8px" src="kaz/images/location.svg" alt=""><span
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
                  <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px" alt=""><span
                    class="img-rate ps-1">3.6</span>
                </div>
                <img src="kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                  <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                  <div class="footer-card-mobile">
                    <div style="display: flex;align-items: center;">
                      <img style="margin-left:-10px;" width="8px" src="kaz/images/location.svg" alt=""><span
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
                  <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px" alt=""><span
                    class="img-rate ps-1">3.6</span>
                </div>
                <img src="kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                  <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                  <div class="footer-card-mobile">
                    <div style="display: flex;align-items: center;">
                      <img style="margin-left:-10px;" width="8px" src="kaz/images/location.svg" alt=""><span
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
                  <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px" alt=""><span
                    class="img-rate ps-1">3.6</span>
                </div>
                <img src="kaz/images/Picture of product (USB).png" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                  <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                  <div class="footer-card-mobile">
                    <div style="display: flex;align-items: center;">
                      <img style="margin-left:-10px;" width="8px" src="kaz/images/location.svg" alt=""><span
                        class="location-text ps-1">Lagos, Nigera</span>
                    </div>
                    <button style="margin-top: -10px;" type="button" class="dropbtn">...</button>
                  </div>

                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div>

<script type="module" src="{{ asset('backend-js/seller-shop.js') }}"></script>
  <script>

   

    /*
    // Fetch the user data
    const token = localStorage.getItem('apiToken'); // Get the token from local storage

if (token) {
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
            Swal.fire({
                icon: 'error',
                title: 'Unauthorized',
                text: 'Your session has expired. Please log in again.'
            }).then(() => {
                window.location.href = '/login'; // Redirect to login page
            });
        }
    });
} else {
    Swal.fire({
        icon: 'error',
        title: 'Missing Token',
        text: 'Authentication token is missing. Please log in.'
    }).then(() => {
        window.location.href = '/login'; // Redirect to login page
    });
}

function updateUserProfile(user) {
    const nameElement = document.querySelector('.right-section .name');
    const emailElement = document.querySelector('.right-section .mired-text');
    const profileImageElement = document.querySelector('.right-section .profile-picture');
    const nameeElement = document.getElementById('profile_name');
    const emaileElement = document.getElementById('profile_email');
    // const profileImageElement = document.getElementById('profile_image');
    const profilePictureElement = document.getElementById('profile_picture');
    // const profilePictureMobileElement = document.getElementById('profile_picture_mobile');

    if (user) {
        nameElement.textContent = user.username || 'Unknown User';
        emailElement.textContent = user.email || 'No email provided';

        nameeElement.textContent = user.username || 'Unknown User';
        emaileElement.textContent = user.email || 'No email provided';

        // profileImageElement.src = user.photo_url ? user.photo_url : 'kaz/images/dp.png';
        const imageUrl = user.photo_url ? `/uploads/users/${user.photo_url}` : 'innocent/assets/image/dp.png';
        profileImageElement.src = imageUrl;
        profilePictureElement.src = imageUrl;
        profilePictureMobileElement.src = imageUrl;
    } else {
        console.error('User data is null or undefined');
    }
}



document.addEventListener('DOMContentLoaded', function() {
        const productId = localStorage.getItem('selectedProductId');

        if (productId) {
            axios.get(`/api/v1/seller-details`)
                .then(response => {
                    const seller = response.data.seller;
                    const products = response.data.products;

                    // Display seller details
                    const sellerDetailsDiv = document.getElementById('seller-details');
                    sellerDetailsDiv.innerHTML = `
                        <h5>${seller.name}</h5>
                        <p>Email: ${seller.email}</p>
                        <p>Location: ${seller.location}</p>
                        <p>Member since: ${user.created_at}</p>
                        <!-- Add more seller details as needed -->
                    `;

                    // Display seller's other products
                    const sellerProductsDiv = document.getElementById('seller-products');
                    let productsHtml = '<h6>Other Products</h6>';
                    products.forEach(product => {
                        productsHtml += `
                            <div class="card card-preview">
                                <h6 class="sold">Sold ${product.sold}</h6>
                                <img src="${product.image_url}" class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <h6 class="amount">$${product.actual_price} <span class="amount-span">$${product.promo_price}</span></h6>
                                    <p class="card-text">${product.title}</p>
                                    <!-- Add more product details as needed -->
                                </div>
                            </div>
                        `;
                    });
                    sellerProductsDiv.innerHTML = productsHtml;
                })
                .catch(error => {
                    console.error('There was an error fetching the seller details!', error);
                });
        } else {
            console.error('No product ID found in localStorage.');
        }
    });


    // SELLER SHOP LISTING
//     document.addEventListener('DOMContentLoaded', function () {
//     const urlParams = new URLSearchParams(window.location.search);
//     const sellerId = urlParams.get('sellerId');
//     const token = localStorage.getItem('apiToken'); // Get the token from local storage


//     if (sellerId) {
//         fetchSellerProducts(sellerId);
//     }
// });

// function fetchSellerProducts(sellerId) {
//             axios.get(`/api/v1/sellers/${sellerId}/products`, {
//             headers: {
//                 'Authorization': `Bearer` +
//             }
//         })
//         .then(response => {
//             const products = response.data;
//             renderProducts(products); // Reuse the renderProducts function to display the products
//         })
//         .catch(error => {
//             console.error('Error fetching seller products:', error);
//         });
// }

document.addEventListener('DOMContentLoaded', function () {
    const userId = new URLSearchParams(window.location.search).get('userId');
     const token = localStorage.getItem('apiToken'); // Get the token from local storage

console.log(userId);
    if (userId) {
        axios.get(`/api/v1/seller-shop/${userId}`, {
             headers: {
                'Authorization': `Bearer ${token}`
           }
       })
            .then(response => {
                const user = response.data.data;
                displayUserInfo(user);
                displayUserProducts(user.products);
            })
            .catch(error => {
                console.error('Error fetching seller data:', error);
                // Handle error display
            });
    }
});

function displayUserInfo(user) {
    document.querySelector('.about_me').textContent = user.about_me || 'No description available';
    document.querySelector('.registration_date').textContent = new Date(user.created_at).toLocaleDateString();
    document.querySelector('.user_state').textContent = user.state || 'State not provided';
}

function displayUserProducts(products) {
    const productsContainer = document.querySelector('.user_products');
    productsContainer.innerHTML = '';

    products.forEach(product => {
        const productCard = createProductCard(product);
        productsContainer.appendChild(productCard);
    });
}

function createProductCard(product) {
    const card = document.createElement('div');
    card.className = 'product_card';

    card.innerHTML = `
        <img src="uploads/products/${product.image_url[0]}" alt="${product.title}">
        <div class="product_info">
            <h5>${product.title}</h5>
            <p>${product.description}</p>
            <p>$${product.promo_price || product.actual_price}</p>
        </div>
    `;
    return card;
}


*/
</script>




</body>

</html>

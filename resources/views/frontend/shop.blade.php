@extends('layouts.main.app')
@section('title','Shop')
@section('navtitle', 'Shop')
@section('content')

    <div class="main">


        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div style="width: 90%;" class="card mb-3 ms-3 main-card-preview">
                            <form id='banner-image-form' action="">
                                <img style="height:220px; width: 100%;" id="banner"
                                    src="kaz/images/carousel 1.png" class="card-img-top main-img-border"
                                    alt="...">
                                <div onclick="uploadBannerImage()" class="camera">
                                  <i class="fa-solid fa-camera icon-cam"></i>
                                </div>
                            </form>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-2">
                                        <form id="profile-image-form" action="">
                                            <div class="banner-s">
                                                <img id="kaz/images-dp" src="kaz/images/dp.png" class="ms-2"
                                                    alt="">
                                                <div onclick="uploadProfileImage()" class="camera2">
                                                    <i class="fa-solid fa-camera icon-cam2"></i>
                                                </div>
                                        </form>
                                        <div class="mt-4 ms-4">
                                            <h5 class="mired-name" id="mired-name">Loading</h5>
                                            <h6 class="mired-email" id="mired-email">loading</h6>
                                            <a class="verified-link" href="">Unverified seller</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div style="float: right;">
                                        <div onmouseover="showText()" onmouseout="hideText()"
                                            class="badge-shop me-3">
                                            <img height="20px" width="15px" src="kaz/images/badge.png"
                                                alt="">
                                            <a class="become-tag" href="{{ url('/become') }}">
                                                <h6 class="ps-1 vn-size">Verify Now</h6>
                                            </a>
                                        </div>
                                        <div class="me-3" id="hover-text">become verified seller</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <h6 class="ps-4">products listed</h6>
                </div>
                <div class="col-5">
                    <div style="float: right;">
                        <div class="selling">
                            <img width="15px" height="20px" src="kaz/images/logo icon.svg" alt="">
                            <h6 class="start-text ps-1"><a class="start-sell" href="{{ url('/start_selling') }}">Start
                                    Selling</a></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-11">
                        <div class="new-card card-margin mt-4" id="productList">
                            {{-- <div class="card card-preview">
                                <h6 class="sold">Sold 75</h6>
                                <img src="kaz/images/Picture of product (Tablet).png"
                                    class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <div class="card-structure">
                                        <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                                        <div class="star-layout">
                                            <div>
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                            </div>
                                            <div>
                                                <h6 class="ps-1 rate-no">5.0</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-card">
                                        <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram,
                                            500mph</p>
                                        <button type="button" class="dropbtn2 top">...</button>
                                    </div>
                                    <div id="myDropdown" class="dropdown-content">
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-1"
                                            data-bs-whatever="@mdo">share</a>
                                        <a href="#home">Edit</a>
                                        <a href="#about">Boost</a>
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-2"
                                            data-bs-whatever="@mdo">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-preview" data-card-index="0">
                                <h6 class="sold">Sold 75</h6>
                                <img src="kaz/images/Picture of product (USB).png"
                                    class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <div class="card-structure">
                                        <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                                        <div class="star-layout">
                                            <div>
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                            </div>
                                            <div>
                                                <h6 class="ps-1 rate-no">5.0</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-card">
                                        <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram,
                                            500mph</p>
                                        <button type="button" class="dropbtn2 top">...</button>
                                    </div>
                                    <div id="myDropdown" class="dropdown-content">
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-1"
                                            data-bs-whatever="@mdo">share</a>
                                        <a href="#home">Edit</a>
                                        <a href="#about">Boost</a>
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-2"
                                            data-bs-whatever="@mdo">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-preview">
                                <h6 class="sold">Sold 75</h6>
                                <img src="kaz/images/Picture of product (USB).png"
                                    class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <div class="card-structure">
                                        <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                                        <div class="star-layout">
                                            <div>
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                            </div>
                                            <div>
                                                <h6 class="ps-1 rate-no">5.0</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-card">
                                        <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram,
                                            500mph</p>
                                        <button type="button" class="dropbtn2  top">...</button>
                                    </div>
                                    <div id="myDropdown" class="dropdown-content">
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-1"
                                            data-bs-whatever="@mdo">share</a>
                                        <a href="#home">Edit</a>
                                        <a href="#about">Boost</a>
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-2"
                                            data-bs-whatever="@mdo">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-preview">
                                <h6 class="sold">Sold 75</h6>
                                <img src="kaz/images/Picture of product (USB).png"
                                    class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <div class="card-structure">
                                        <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                                        <div class="star-layout">
                                            <div>
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                            </div>
                                            <div>
                                                <h6 class="ps-1 rate-no">5.0</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-card">
                                        <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram,
                                            500mph</p>
                                        <button type="button" class="dropbtn2  top">...</button>
                                    </div>
                                    <div id="myDropdown" class="dropdown-content">
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-1"
                                            data-bs-whatever="@mdo">share</a>
                                        <a href="#home">Edit</a>
                                        <a href="#about">Boost</a>
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-2"
                                            data-bs-whatever="@mdo">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-preview">
                                <h6 class="sold">Sold 75</h6>
                                <img src="kaz/images/Picture of product (USB).png"
                                    class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <div class="card-structure">
                                        <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                                        <div class="star-layout">
                                            <div>
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                            </div>
                                            <div>
                                                <h6 class="ps-1 rate-no">5.0</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-card">
                                        <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram,
                                            500mph</p>
                                        <button type="button" class="dropbtn2 top">...</button>
                                    </div>
                                    <div id="myDropdown" class="dropdown-content">
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-1"
                                            data-bs-whatever="@mdo">share</a>
                                        <a href="#home">Edit</a>
                                        <a href="#about">Boost</a>
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-2"
                                            data-bs-whatever="@mdo">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-preview">
                                <h6 class="sold">Sold 75</h6>
                                <img src="kaz/images/Picture of product (USB).png"
                                    class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <div class="card-structure">
                                        <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                                        <div class="star-layout">
                                            <div>
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                            </div>
                                            <div>
                                                <h6 class="ps-1 rate-no">5.0</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-card">
                                        <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram,
                                            500mph</p>
                                        <button type="button" class="dropbtn2  top">...</button>
                                    </div>
                                    <div id="myDropdown" class="dropdown-content">
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-1"
                                            data-bs-whatever="@mdo">share</a>
                                        <a href="#home">Edit</a>
                                        <a href="#about">Boost</a>
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-2"
                                            data-bs-whatever="@mdo">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-preview">
                                <h6 class="sold">Sold 75</h6>
                                <img src="kaz/images/Picture of product (USB).png"
                                    class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <div class="card-structure">
                                        <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                                        <div class="star-layout">
                                            <div>
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                            </div>
                                            <div>
                                                <h6 class="ps-1 rate-no">5.0</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-card">
                                        <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram,
                                            500mph</p>
                                        <button type="button" class="dropbtn2  top">...</button>
                                    </div>
                                    <div id="myDropdown" class="dropdown-content">
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-1"
                                            data-bs-whatever="@mdo">share</a>
                                        <a href="#home">Edit</a>
                                        <a href="#about">Boost</a>
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-2"
                                            data-bs-whatever="@mdo">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-preview">
                                <h6 class="sold">Sold 75</h6>
                                <img src="kaz/images/Picture of product (USB).png"
                                    class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <div class="card-structure">
                                        <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                                        <div class="star-layout">
                                            <div>
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                            </div>
                                            <div>
                                                <h6 class="ps-1 rate-no">5.0</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-card">
                                        <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram,
                                            500mph</p>
                                        <button type="button" class="dropbtn2  top">...</button>
                                    </div>
                                    <div id="myDropdown" class="dropdown-content">
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-1"
                                            data-bs-whatever="@mdo">share</a>
                                        <a href="#home">Edit</a>
                                        <a href="#about">Boost</a>
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-2"
                                            data-bs-whatever="@mdo">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-preview">
                                <h6 class="sold">Sold 75</h6>
                                <img src="kaz/images/Picture of product (USB).png"
                                    class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <div class="card-structure">
                                        <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                                        <div class="star-layout">
                                            <div>
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                                <img src="kaz/images/Rate.png" class="img-fluid image-rate"
                                                    width="10px" alt="">
                                            </div>
                                            <div>
                                                <h6 class="ps-1 rate-no">5.0</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-card">
                                        <p class="card-text infinix-text pt-3">Infinix hot 5 (ultralight 5gb ram,
                                            500mph</p>
                                        <button type="button" class="dropbtn2  top">...</button>
                                    </div>
                                    <div id="myDropdown" class="dropdown-content">
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-1"
                                            data-bs-whatever="@mdo">share</a>
                                        <a href="#home">Edit</a>
                                        <a href="#about">Boost</a>
                                        <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-2"
                                            data-bs-whatever="@mdo">Delete</a>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal-1" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" style="align-items: flex-end;">
                            <div class="modal-content">
                                <div style="border: none;" class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <div style="text-align: center;margin-top: -30px;">
                                            <h5>Increase Your Visiblity</h5>
                                            <p class="fw-light share-text">It is the perfect time to tell the world
                                                about your product and
                                                connect with potential buyer and increase your sales.
                                            </p>
                                            <div class="modal-share">
                                                <div>
                                                    <img src="kaz/images/facebook.png" alt="">
                                                    <h6 class="fw-light  share-text ">Facebook</h6>
                                                </div>
                                                <div>
                                                    <img src="kaz/images/linkedin.png" alt="">
                                                    <h6 class="fw-light   share-text">linkedin</h6>
                                                </div>
                                                <div>
                                                    <img src="kaz/images/twitter.png" alt="">
                                                    <h6 class="fw-light  share-text ">twitter</h6>
                                                </div>
                                                <div>
                                                    <img width="40px" src="kaz/images/Whatsapp logo.png"
                                                        alt="">
                                                    <h6 class="fw-light  share-text ">whatsapp</h6>
                                                </div>
                                                <div>
                                                    <i style="height: 40px; width: 40px;"
                                                        class="fa-solid fa-link"></i>
                                                    <h6 class="fw-light  share-text ">Copy link</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal-2" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" style="align-items: flex-end;">
                            <div class="modal-content">
                                <div style="border: none;" class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div style="text-align: center; margin-top: -20px;">
                                        <h6>Are you sure you want to delist this product</h6>
                                    </div>
                                    <div class="delist mt-4 mb-3">
                                        <button type="button" class="btn cancel-btn">No</button>
                                        <button type="button" class="btn del-btn ">Delist product</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: center;margin-top: 40px;">
                        <p class="fw-bold mt-5">you've reached the end of the list</p>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <div class="mt-5 new-footer">
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
    <!-- mobile-view  -->
    <div class="mobile-view">
        <div class="container-fluid">
            <div class="row">
                <div class=" mobile-structure">
                    <div class="mobile-link-btn1">
                        <a href="{{ url('/shop') }}">Shop</a>
                    </div>
                    <div class="mobile-link-btn">
                        <a href="{{ url('/settings') }}">Settings</a>
                    </div>
                    <div class="mobile-link-btn">
                        <a href="{{ url('/learn') }}">Learn</a>
                    </div>

                    <div class="mobile-link-btn">
                        <a href="{{ url('/ads') }}"> Ads</a>
                    </div>

                    <div class="mobile-link-btn">
                        <a href="{{ url('/wallet') }}"> Wallet</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile_content">
            <div class="card mb-3 mt-3  main-card-mobile">
                <form id="banner-image-form2" action="">
                    <img style="height:180px;" id="banner2" src="kaz/images/Picture of product (Tablet).png"
                        class="card-img-top" alt="...">
                    <div onclick="uploadBannerImage2()" class="camera">
                        <i class="fa-solid fa-camera icon-cam"></i>
                    </div>
                </form>
                <div class="card-body">
                    <div style="display: flex; align-items: center;justify-content: space-between;">
                        <div style="display: flex;align-items: center;">
                            <form id="profile-image-form2" action="">
                                <img id="kaz/images-dp2" width="50px" src="kaz/images/dp.png" alt="">
                                <div class="camera-mobile">
                                    <img onclick="uploadProfileImage2()" class="icon-cam-mobile"
                                        src="kaz/images/camera-shop.svg" alt="">
                                </div>
                            </form>
                            <div class="ms-3">
                                <h6 class="mired-shop-m pt-3">Mired Augustine</h6>
                                <h6 class="mired-shop-email-m">miredaugustine@gmail.com</h6>
                                <a class="mired-un-m" href="">Unverified seller</a>
                            </div>

                        </div>
                        <div onmouseover="showText2()" onmouseout="hideText2()">
                            <div class="verify-badge-m">
                                <img height="20px" width="15px" src="kaz/images/badge.png" alt="">
                                <a class="become-link" href="{{ url('/become') }}">
                                    <h6 class="verify-m ps-1">Verify Now</h6>
                                </a>
                            </div>

                            <div class="" id="hover-text2">become verified seller</div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="container-fluid">
                <div style="display: flex; justify-content: space-between;">
                    <div>
                        <h6 class="ps-1">Products</h6>
                    </div>
                    <div class="selling2 me-1">
                        <img width="12px" height="20px" src="kaz/images/logo icon.svg" alt="">
                        <h6 class="start-text2 ps-1"><a class="start-sell2" href="{{ url('/start_selling') }}">Start
                                Selling</a>
                        </h6>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <div class="mobile-card">
                            <div class="card card-preview" data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                data-bs-whatever="@mdo" data-card-id="1">
                                <div class="sold-mobile">
                                    <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                                    <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px"
                                        alt=""><span class="img-rate ps-1">3.6</span>
                                </div>
                                <img src="kaz/images/Picture of product (Tablet).png"
                                    class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                                    <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                                    <div class="footer-card-mobile">
                                        <div>
                                            <img style="margin-left:-10px;" width="8px"
                                                src="kaz/images/location.svg" alt=""><span
                                                class="location-text ps-1">Lagos, Nigera</span>
                                        </div>
                                        <button style="margin-top: -10px;" type="button"
                                            class="dropbtn1">...</button>
                                    </div>

                                </div>
                            </div>
                            <div class="card card-preview" data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                data-bs-whatever="@mdo" data-card-id="2">
                                <div class="sold-mobile">
                                    <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                                    <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px"
                                        alt=""><span class="img-rate ps-1">3.6</span>
                                </div>
                                <img src="kaz/images/Picture of product (USB).png"
                                    class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                                    <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                                    <div class="footer-card-mobile">
                                        <div>
                                            <img style="margin-left:-10px;" width="8px"
                                                src="kaz/images/location.svg" alt=""><span
                                                class="location-text ps-1">Lagos, Nigera</span>
                                        </div>
                                        <button style="margin-top: -10px;" type="button"
                                            class="dropbtn1">...</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-preview" data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                data-bs-whatever="@mdo" data-card-id="3">
                                <div class="sold-mobile">
                                    <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                                    <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px"
                                        alt=""><span class="img-rate ps-1">3.6</span>
                                </div>
                                <img src="kaz/images/Picture of product (USB).png"
                                    class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                                    <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                                    <div class="footer-card-mobile">
                                        <div>
                                            <img style="margin-left:-10px;" width="8px"
                                                src="kaz/images/location.svg" alt=""><span
                                                class="location-text ps-1">Lagos, Nigera</span>
                                        </div>
                                        <button style="margin-top: -10px;" type="button"
                                            class="dropbtn1">...</button>
                                    </div>

                                </div>
                            </div>
                            <div class="card card-preview" data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                data-bs-whatever="@mdo" data-card-id="4">
                                <div class="sold-mobile">
                                    <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                                    <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px"
                                        alt=""><span class="img-rate ps-1">3.6</span>
                                </div>
                                <img src="kaz/images/Picture of product (USB).png"
                                    class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                                    <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                                    <div class="footer-card-mobile">
                                        <div>
                                            <img style="margin-left:-10px;" width="8px"
                                                src="kaz/images/location.svg" alt=""><span
                                                class="location-text ps-1">Lagos, Nigera</span>
                                        </div>
                                        <button style="margin-top: -10px;" type="button"
                                            class="dropbtn1">...</button>
                                    </div>

                                </div>
                            </div>
                            <div class="card card-preview" data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                data-bs-whatever="@mdo" data-card-id="5">
                                <div class="sold-mobile">
                                    <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                                    <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px"
                                        alt=""><span class="img-rate ps-1">3.6</span>
                                </div>
                                <img src="kaz/images/Picture of product (USB).png"
                                    class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                                    <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                                    <div class="footer-card-mobile">
                                        <div>
                                            <img style="margin-left:-10px;" width="8px"
                                                src="kaz/images/location.svg" alt=""><span
                                                class="location-text ps-1">Lagos, Nigera</span>
                                        </div>
                                        <button style="margin-top: -10px;" type="button" class="dropbtn1"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-bs-whatever="@mdo">...</button>
                                    </div>

                                </div>
                            </div>
                            <div class="card card-preview" data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                data-bs-whatever="@mdo" data-card-id="6">
                                <div class="sold-mobile">
                                    <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                                    <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px"
                                        alt=""><span class="img-rate ps-1">3.6</span>
                                </div>
                                <img src="kaz/images/Picture of product (USB).png"
                                    class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                                    <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                                    <div class="footer-card-mobile">
                                        <div>
                                            <img style="margin-left:-10px;" width="8px"
                                                src="kaz/images/location.svg" alt=""><span
                                                class="location-text ps-1">Lagos, Nigera</span>
                                        </div>
                                        <button style="margin-top: -10px;" type="button" class="dropbtn1"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-bs-whatever="@mdo">...</button>
                                    </div>

                                </div>
                            </div>
                            <div class="card card-preview" data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                data-bs-whatever="@mdo" data-card-id="7">
                                <div class="sold-mobile">
                                    <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                                    <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px"
                                        alt=""><span class="img-rate ps-1">3.6</span>
                                </div>
                                <img src="kaz/images/Picture of product (USB).png"
                                    class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                                    <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                                    <div class="footer-card-mobile">
                                        <div>
                                            <img style="margin-left:-10px;" width="8px"
                                                src="kaz/images/location.svg" alt=""><span
                                                class="location-text ps-1">Lagos, Nigera</span>
                                        </div>
                                        <button style="margin-top: -10px;" type="button" class="dropbtn1"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-bs-whatever="@mdo">...</button>
                                    </div>

                                </div>
                            </div>
                            <div class="card card-preview" data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                data-bs-whatever="@mdo" data-card-id="8">
                                <div class="sold-mobile">
                                    <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                                    <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px"
                                        alt=""><span class="img-rate ps-1">3.6</span>
                                </div>
                                <img src="kaz/images/Picture of product (USB).png"
                                    class="card-img-top w-100 image-border" alt="...">
                                <div class="card-body">
                                    <h6 class="amount">$3,990.00 <span class="amount-span">$5,999.00</span></h6>
                                    <p class="card-text infinix-text pt-3">25gb USB flash Drive.</p>
                                    <div class="footer-card-mobile">
                                        <div>
                                            <img style="margin-left:-10px;" width="8px"
                                                src="kaz/images/location.svg" alt=""><span
                                                class="location-text ps-1">Lagos, Nigera</span>
                                        </div>
                                        <button style="margin-top: -10px;" type="button" class="dropbtn1"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-bs-whatever="@mdo">...</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered  modal-lg" style="align-items: flex-end;">
                        <div class="modal-content">
                            <div style="border: none;" class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div id="page3" class="page1">
                                    <button style="width: 100%;" type="button"
                                        class="btn btn-warning modal-edit1 btn-lg pt-3 pb-3 mb-2">Share</button>
                                    <button style="width: 100%;" type="button"
                                        class="btn btn-warning modal-edit1 btn-lg pt-3 pb-3">Edit</button>
                                    <button style="width: 100%;" type="button"
                                        class="btn btn-warning modal-edit1 btn-lg pt-3 pb-3 mt-2"
                                        id="deleteButton">Delete</button> <!-- Added an id to the Delete button -->
                                    <button style="width: 100%;" type="button"
                                        class="btn btn-warning modal-edit-boost btn-lg pt-3 pb-3 mt-3">Boost</button>
                                </div>
                                <div id="page4" class="page1" style="display: none;">
                                    <div class="modal-struct">
                                        <h5>Increase Your Visibility</h5>
                                        <p class="fw-light share-text">It is the perfect time to tell the world about
                                            your
                                            product
                                            and
                                            connect with potential buyers and increase your sales.
                                        </p>
                                        <div class="modal-share">
                                            <div>
                                                <img src="kaz/images/facebook.png" alt="">
                                                <h6 class="fw-light share-text">Facebook</h6>
                                            </div>
                                            <div>
                                                <img src="kaz/images/linkedin.png" alt="">
                                                <h6 class="fw-light share-text">LinkedIn</h6>
                                            </div>
                                            <div>
                                                <img src="kaz/images/twitter.png" alt="">
                                                <h6 class="fw-light share-text">Twitter</h6>
                                            </div>
                                            <div>
                                                <img width="40px" src="kaz/images/Whatsapp logo.png"
                                                    alt="">
                                                <h6 class="fw-light share-text">WhatsApp</h6>
                                            </div>
                                            <div>
                                                <i style="height: 40px; width: 40px;" class="fa-solid fa-link"></i>
                                                <h6 class="fw-light  share-text ">Copy link</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="page5" class="page1" style="display: none;"> <!-- Added page 5 -->
                                    <div style="text-align: center; margin-top: -25px;">
                                        <h6>Are you sure you want to delist this product</h6>
                                    </div>
                                    <div class="delist mt-4 mb-3">
                                        <button type="button" class="btn cancel-btn">No</button>
                                        <button type="button" class="btn del-btn ">Delist product</button>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>





 <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

    <script>
        function goBack() {
            window.history.back();
        }

// FOR FETCHING USER DETAILS IMMEDIATELY AFTER THE BANNER
    document.addEventListener("DOMContentLoaded", function() {
    // Get the token from local storage
    const token = localStorage.getItem('apiToken');

    if (!token) {
        promptLogin('Authentication token is missing. Please log in.');
        return;
    }

    // Fetch user data from the backend using the stored token
    axios.get('/api/v1/getuser', {
        headers: {
            'Authorization': `Bearer ${token}`
        }
    })
    .then(response => {
        // Assuming the user data structure is in response.data
        const user = response.data;

        // Update the user's name
        const userNameElement = document.querySelector('.mired-name');
        if (userNameElement) {
            userNameElement.textContent = user.username || 'Unknown User';
        }

        // Update the user's email
        const userEmailElement = document.querySelector('.mired-email');
        if (userEmailElement) {
            userEmailElement.textContent = user.email || 'No email available';
        }

        // Update the verification status
        const verificationLinkElement = document.querySelector('.verified-link');
        if (verificationLinkElement) {
            verificationLinkElement.textContent = user.verified ? 'Verified seller' : 'Unverified seller';
            verificationLinkElement.classList.toggle('verified', user.verified); // Toggle 'verified' class based on status
        }
    })
    .catch(error => {
        console.error('Error fetching user data:', error);
    });
});




//FOR PRODUCT LISTING
document.addEventListener("DOMContentLoaded", function () {
    const token = localStorage.getItem('apiToken');
    if (!token) {
        console.error('API token is missing');
        return;
    }

    axios.get('/api/v1/user/products', {
        headers: {
            'Authorization': `Bearer ${token}`
            // 'Authorization': `Bearer` + token

        }
    })
    .then(response => {
        console.log('Response:', response);
        const products = response.data.data;

        if (!Array.isArray(products)) {
            console.error('Products data is not an array:', products);
            return;
        }

        const productList = document.getElementById('productList');
        productList.innerHTML = '';

        products.forEach((product) => {
            const imageUrls = JSON.parse(product.image_url);
            const firstImageUrl = imageUrls.length > 0 ? imageUrls[0] : 'placeholder.jpg';

            const productCard = `
                <div class="card card-preview">
                    <h6 class="sold">Sold ${product.sold || 0}</h6>
                    <img src="uploads/products/${firstImageUrl}" class="card-img-top w-100 image-border" alt="Product Image">
                    <div class="card-body">
                        <div class="card-structure">
                            <h6 class="amount">$${product.promo_price || 0} <span class="amount-span">$${product.actual_price || 0}</span></h6>
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
                            <p class="card-text infinix-text pt-3">${product.title || 'No title available'}</p>
                            <button type="button" class="dropbtn2 top" data-dropdown-id="${product.id}">...</button>
                            <div class="dropdown-content" data-dropdown-content="${product.id}">
                                <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-1" data-bs-whatever="@mdo">share</a>
                                <a href="#home">Edit</a>
                                <a href="#about">Boost</a>
                                <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-2" data-bs-whatever="@mdo">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            productList.insertAdjacentHTML('beforeend', productCard);
        });
    })
    .catch(error => {
        console.error('Error fetching products:', error);
    });

    document.addEventListener('click', function (event) {
    // Check if the clicked element is a dropdown button
    if (event.target && event.target.classList.contains('dropbtn2')) {
        console.log('Dropdown button clicked');

        // Assuming data-dropdown-id is set on the button
        const dropdownId = event.target.getAttribute('data-dropdown-id');

        // Correctly select the dropdown content using querySelector
        const dropdownContent = document.querySelector(`.dropdown-content[data-dropdown-content="${dropdownId}"]`);
        console.log('Dropdown content:', dropdownContent);

        if (dropdownContent) {
            dropdownContent.classList.toggle('show');
        }
    } else {
        // Close all dropdowns if clicked outside
        document.querySelectorAll('.dropdown-content').forEach(dropdown => {
            dropdown.classList.remove('show');
        });
    }
});


});

    </script>


@endsection

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
                                    src="" class="card-img-top main-img-border js-backend-img"
                                    alt="...">
                                <div  class="camera js-banner-upload js-banner">
                                  <i class="fa-solid fa-camera icon-cam"></i>
                                </div>
                            </form>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-2">
                                        <form id="profile-image-form" action="">
                                            <div class="banner-s">
                                                <img id="images-dp" src="" class="ms-2 js-images-dp image-dp"
                                                    alt="">
                                                <div  class="camera2 js-profile">
                                                    <i class="fa-solid fa-camera icon-cam2"></i>
                                                </div>
                                        </form>
                                        <div class="mt-4 ms-4">
                                            <h5 class="mired-name js-mired-name" id="mired-name">Loading</h5>
                                            <h6 class="mired-email js-mired-email" id="mired-email">loading</h6>
                                            <a class="verified-link js-verification" href="{{ url('/sellers-shop') }}">Unverified seller</a>
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
                            </div>   --}}

                        </div>
                    </div>
                   
                      <div class="modal fade" id="exampleModal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <!-- Step 1 -->
                              <div class="modal-step-1">
                                <form id="edit-product-form-1" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="Title" class="col-form-label">Title:</label>
                                        <input type="text" class="form-control" id="title" name = "title">
                                      </div>
                                      <div class="mb-3">
                                        <label for="Location" class="col-form-label">Location:</label>
                                        <input type="text" class="form-control" id="location"  name = "location">
                                      </div>
                                      <div class="mb-3">
                                        <label for="quantity" class="col-form-label">Quantity:</label>
                                        <input type="text" class="form-control" id="quantity"  name = "quantity">
                                      </div>
    
                                    <div class="mb-3">
                                      <label for="message-text" class="col-form-label">Description:</label>
                                      <textarea class="form-control" id="description"  name = "description"></textarea>
                                    </div>
                                </form>
                                <button style="float: right" type="button" class="btn btn-primary next-to-step-2">Next</button>
                              </div>
                      
                              <!-- Step 2 -->
                              <div class="modal-step-2" style="display: none;">
                                <form id="edit-product-form-2"  enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="actual_price" class="col-form-label">Actual Price:</label>
                                        <input type="number" class="form-control" id="actual_price"  name = "actual_price">
                                    </div>
                                    <div class="mb-3">
                                        <label for="promo_price" class="col-form-label">Promo Price:</label>
                                        <input type="number" class="form-control" id="promo_price"  name = "promo_price">
                                    </div>
                                    <div class="mb-3">
                                    <select name="condition" class="form-select" aria-label="Default select example">
                                        <option selected="">Condition</option>
                                        <option value="fairly_used">Fairly Used</option>
                                        <option value="new">New</option>   
                                    </select>
                                  </div>
                                  <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload</label>
                                    <input class="form-control" type="file"   multiple name="image_url[]">
                                  </div>
                                
                                </form>
                                <button type="button" class="btn btn-secondary previous-to-step-1" >Previous</button>
                                <button type="submit" class="btn btn-primary" id="save-product">Update</button>
                              </div>
                            </div>
                          </div>
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
                                        <button type="button" class="btn cancel-btn js-cancel-btn">No</button>
                                        <button type="button" class="btn del-btn js-delist-btn">Delist product</button>
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
                    <img style="height:180px;" id="banner2" src=""
                        class="card-img-top js-backend-img" alt="...">
                    <div  class="camera  js-banner-upload  js-banner">
                        <i class="fa-solid fa-camera icon-cam"></i>
                    </div>
                </form>
                <div class="card-body">
                    <div style="display: flex; align-items: center;justify-content: space-between;">
                        <div style="display: flex;align-items: center;">
                            <form id="profile-image-form2" action="">
                                <img id="kaz/images-dp2" class="js-images-dp mobile-image" src="" alt="">
                                <div class="camera-mobile">
                                    <img  class="icon-cam-mobile js-profile"
                                        src="kaz/images/camera-shop.svg" alt="">
                                </div>
                            </form>
                            <div class="ms-3">
                                <h6 class="mired-shop-m pt-3  js-mired-name">Mired Augustine</h6>
                                <h6 class="mired-shop-email-m js-mired-email">miredaugustine@gmail.com</h6>
                                <a class="mired-un-m  js-verification " href="{{ url('/sellers-shop') }}">Unverified seller</a>
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
                            {{-- <div class="card card-preview" data-bs-toggle="modal" data-bs-target="#exampleModal2"
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
                            </div> --}}
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
                                        class="btn btn-warning modal-edit1 btn-lg pt-3 pb-3 js-modal-edit" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit</button>
                                    <button style="width: 100%;" type="button"
                                        class="btn btn-warning modal-edit1 btn-lg pt-3 pb-3 mt-2 "
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
                                        <button type="button" class="btn cancel-btn js-cancel-mobile">No</button>
                                        <button type="button" class="btn del-btn js-delist-mobile ">Delist product</button>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <!-- Step 1 -->
                            <div class="modal-step-1">
                              <form id="edit-product-form-mobile1" enctype="multipart/form-data">
                                  <div class="mb-3">
                                      <label for="Title" class="col-form-label">Title:</label>
                                      <input type="text" class="form-control title" name ="title">
                                    </div>
                                    <div class="mb-3">
                                      <label for="Location" class="col-form-label">Location:</label>
                                      <input type="text" class="form-control location"  name = "location">
                                    </div>
                                    <div class="mb-3">
                                      <label for="quantity" class="col-form-label">Quantity:</label>
                                      <input type="text" class="form-control quantity"  name = "quantity">
                                    </div>
  
                                  <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Description:</label>
                                    <textarea class="form-control description"  name = "description"></textarea>
                                  </div>
                              </form>
                              <button style="float: right" type="button" class="btn btn-primary next-to-step-2">Next</button>
                            </div>
                    
                            <!-- Step 2 -->
                            <div class="modal-step-2" style="display: none;">
                              <form id="edit-product-form-mobile2"  enctype="multipart/form-data">
                                  <div class="mb-3">
                                      <label for="actual_price" class="col-form-label">Actual Price:</label>
                                      <input type="number" class="form-control actual_price"  name = "actual_price">
                                  </div>
                                  <div class="mb-3">
                                      <label for="promo_price" class="col-form-label">Promo Price:</label>
                                      <input type="number" class="form-control promo_price"  name = "promo_price">
                                  </div>
                                  <div class="mb-3">
                                  <select name="condition" class="form-select" aria-label="Default select example">
                                      <option selected="">Condition</option>
                                      <option value="fairly_used">Fairly Used</option>
                                      <option value="new">New</option>   
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="formFile" class="form-label">Upload</label>
                                  <input class="form-control" type="file"   multiple name="image_url[]">
                                </div>
                              
                              </form>
                              <button type="button" class="btn btn-secondary previous-to-step-1" >Previous</button>
                              <button type="submit" class="btn btn-primary" id="save-product-mobile">Update</button>
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
  <script type="module" src="{{ asset('backend-js/shop.js') }}"></script>
  
  


@endsection

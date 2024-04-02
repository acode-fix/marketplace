@extends('layouts.main.app')
@section('title','MarketPlace landing Page')
{{-- @section('search-bar','<form action="#" class="hm-searchbox">
    <select class="nice-select select-search-category">
        <option value="0">Country</option>                         
        <option value="10"><a href="#"><img src="images/menu/flag-icon/1.jpg" alt="">England</a></option>                     
        <option value="17"><a href="#"><img src="images/menu/flag-icon/2.jpg" alt="">France</a></option>                    
    </select>
    <input type="text" placeholder="Enter your search key ...">
    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
</form>') --}}

{{-- @section('search-bar','Search button') --}}

@section('content')

<!--Body Content-->
<div id="page-content">
    <!--Collection Banner-->
     <!-- My Carousel -->
<div class="col-md-12 sm-12 px-2 row justify-content-between mt-3">

    <!-- left -->
      <div class="col-md-10 sm-8 border_left">

       <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
         <div class="carousel-inner">
           <div class="carousel-item active">
             <img src="images/slide1.png" class="d-block w-100" alt="...">
           </div>
           <div class="carousel-item">
             <img src="images/slide2.png" class="d-block w-100" alt="...">
           </div>
           <div class="carousel-item">
             <img src="images/slide3.png" class="d-block w-100" alt="...">
           </div>
           <div class="carousel-item">
             <img src="images/slide4.png" class="d-block w-100" alt="...">
           </div>
           <div class="carousel-item">
             <img src="images/slide5.png" class="d-block w-100" alt="...">
           </div>
           <div class="carousel-item">
             <img src="images/slide6.png" class="d-block w-100" alt="...">
           </div>
         </div>
       </div>

     </div>

    <!-- {{-- Right --}}  -->
     <div class="d-none d-md-block  col-md-2 sm-4 border_right" id="disappear_on_mobile">
       <a href="product.html" style="text-decoration: none;">
        <p  class="text-white mt-5 ">Do you have anything you want to sell?</p>
        <div  style="text-align:center;"><img src="images/baglogo.png" alt=""></div>
        <h4  style="text-align:center;"   class="text-white ">Start Selling</h4>
        </a>
     </div>
   </div> 
    <!--End Collection Banner-->
    
    <div class="container">
        <div class="row">
            <!--Sidebar-->
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
                <div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
                <div class="sidebar_tags">
                    
<!--Price Filter-->


        <div class="container-fluid bg-white filter" id="filter_section">

<div class="sidebar_widget filterBox ">
    <div class="widget-title flex">
        <div>
        <h6 class=" fw-2 ">Filter</h6>
        </div>

        <!-- <div class="col-4 col-md-4 col-lg-4 text-right"> -->
            <div class="filters-toolbar__item">
                    <label for="SortBy" class="hidden">Sort</label>
                    <select name="SortBy" id="SortBy" class="filters-toolbar__input filters-toolbar__input--sort">
                    <option value="title-ascending" selected="selected">Sort</option>
                    <option>Best Selling</option>
                    <option>Alphabetically, A-Z</option>
                    <option>Alphabetically, Z-A</option>
                    <option>Price, low to high</option>
                    <option>Price, high to low</option>
                    <option>Date, new to old</option>
                    <option>Date, old to new</option>
                    </select>
                    <input class="collection-header__default-sort" type="hidden" value="manual">
            </div>
        <!-- </div> -->

    </div>
    <form action="#" method="post" class="price-filter">
        <div class="row">
        <div class="col-6">
            Price Min<br>
        <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
        </div>
        </div>

        <div class="col-6 text-right margin-25px-top">
            <p class="no-margin"><input id="amount" type="text"></p>
        </div>
        </div>

        <div class="row">
            <div class="col-6">
                Price Max<br>
            <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
            </div>
            </div>

            <div class="col-6 text-right margin-25px-top">
                <p class="no-margin"><input id="amount" type="text"></p>
            </div>
            </div>
        
        
        <div class="row">
            <div class="col-6">
            Price Max<br>
            <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                <div class="ui-slider-range ui-widget-header ui-corner-all " tabindex="0"></div>
            <input type="range" id="range" tabindex="0" class="w-10 mt-0 slider ui-slider-range ui-widget-header ui-corner-all" ><br>
            </div>
        </div>
            
            <div class="col-6 text-right margin-25px-top">
                <p class="no-margin"><input id="amount" type="text"></p>
            </div>
        </div>
    </form>
    
</div>
        </div>
    
<!--End Price Filter-->

        <!--product condition  -->

        <div class="container-fluid mt-3 " style="background-color: #F6F8FC ; padding:10px; width: 270px; height:80px; box-shadow: 0px 4px 5px rgba(52, 52, 52, 0.05);">
        <h6>Product Condition</h6>
        <input type="button" value ="New" style="padding:4px; border:1px solid rgb(27, 26, 26); border-radius: 10px; width:80px; font-size: small;">
        <input type="button" value ="Fairly used" style="margin-left: 10px; padding:4px; border:1px solid rgb(27, 27, 27);font-size: small; border-radius: 10px; width:100px">
        </div>
        <!-- End of product condition -->

        <!-- verified seller -->

        <div class="container mt-3 d-flex  bg-white" style="margin-left: 15px; padding: 7px;">
        <img src="images/baglogo.png" alt="" width="20px;" height="20px;" style="margin-left: 7px;">
        <h6 style="margin-left: 5px;">Verified Seller</h6>
        
        <div class="switch" style="margin-left: 30px;">
            <label class="switch">
              <input type="checkbox">
              <span class="slider round"></span>
            </label>
           </div>
        </div>
        <!-- End of verified seller -->

        <!--Start Selling -->
        <div class="container-fluid d-flex background_linear" style="padding: 10px; padding-left: 20px; margin-top: 10px;">
        <div>
            <img src="images/baglogo.png" width="50px" height="60px" alt="" class="">
            </div>
        <div style="margin-left: 10px;">
            <a href="product.html" style="text-decoration: none;">
        <p class="text-white"  style="text-align:center; font-size:10px;">Do you have anything <br>you want to sell?</p>
        <h5 class="text-white"style="text-align:center;" >Start Selling</h5>
        </a>
        </div>
        
        </div>
        <!-- End of Start Selling -->

</div>
</div>

<!--End Sidebar-->

<!--Main Content-->
<div class="col-12 col-md-9 col-lg-9 main-col">

<div class=" " style="padding: 20px;">
<div>
<h6  class="mb-0 select_product " >Select a Product Category <span class=" text-danger select_product">*</span></h4>
<span><p  class="mt-0 select_product_choose">(Choose a category to filter your search)</p></span>
</div>

<div class="container col-12 ms-0 row ms-0 mt-4">
<div class="col-md-3  text-align-center product">
<a href="" class=" text-black">
    <div class="product_img position-absolute"><img src="images/lap.png" alt=""></div>
    <div class="bg-white div_white"></div>
    <h5 class=" position-absolute text-center fiter-product">Smart Gadgets</h5>
</a>
</div>
<div class="col-md-3  product">
<a href="" class=" text-black">
    <div class="product_img position-absolute"><img src="images/car2.png" alt=""></div>
    <div class="bg-white div_white"></div>
    <h5 class=" position-absolute text-center fiter-product">Vehicles</h5>
</a>

</div>
<div class="col-md-3  product">
<a href="" class=" text-black">
    <div class="product_img position-absolute"><img src="images/house2.png" alt=""></div>
    <div class="bg-white div_white"></div>
    <h5 class=" position-absolute fiter-product text-center ">Landed Property</h5>
</a>

</div>
<div class="col-md-3  product">
<a href="" class=" text-black">
    <div class="product_img position-absolute"><img src="images/hang2.png" alt=""></div>
    <div class="bg-white div_white"></div>
    <h5 class=" position-absolute text-center fiter-product ">Fashion</h5>
</a>

</div>
<div class="col-md-3  product ">
<a href="" class=" text-black">
    <div class="product_img position-absolute"><img src="images/manwithfl.png" alt=""></div>
    <div class="bg-white div_white"></div>
    <h5 class=" position-absolute  text-center fiter-product">Jobs</h5>
</a>

</div>
<div class="col-md-3  product">
<a href="" class=" text-black">
    <div class="product_img position-absolute"><img src="images/flower.png" alt=""></div>
    <div class="bg-white div_white"></div>
    <h5 class=" position-absolute text-center fiter-product ">Beauty/Cosmetics</h5>
</a>

</div>
</div> 

<!-- <div class="productList"> -->
                    <!--Toolbar-->
                    <!-- <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product Filters</button>
                    <div class="toolbar">
                        <div class="filters-toolbar-wrapper">
                            <div class="row">
                                <div class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-start align-items-center">
                                    <a href="shop-left-sidebar.html" title="Grid View" class="change-view change-view--active">
                                        <img src="assets/images/grid.jpg" alt="Grid" />
                                    </a>
                                    <a href="shop-listview.html" title="List View" class="change-view">
                                        <img src="assets/images/list.jpg" alt="List" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!--End Toolbar-->


<div class="grid-products grid--view-items ">
<div class="row ">
<div class="product-card col-6 col-sm-6 col-md-4  item border-rounded  ">
<!-- start product image -->
<div class="product-image">
    <!-- start product image -->
    <a href="javascript:void(0)" title="Quick View" data-toggle="modal" data-target="#content_quickview">

        <!-- image -->                    
    <img class="primary blur-up lazyload" data-src="images/img1.png" src="images/img1.png" alt="image" title="product" class="card-img-top border-rounded-top img-fluid">
        <!-- End image -->

        <!-- Hover image -->
        <img class="hover blur-up lazyload" data-src="images/img1.png" src="images/img1.png" alt="image" title="product">
        <!-- End hover image -->
        
        <!-- product label -->
    <p class="sold yellow_background fs-9">Sold 75</p>
        <!-- End product label -->
    </a>
    <!-- end product image -->

</div>
<!-- end product image -->

<!--start product details -->
<div class="product-details text-center">
    <!-- product name -->
    <!-- <div class="product-name">
        <a href="#">Edna Dress</a>
    </div> -->
    <!-- End product name -->
    <!-- product price -->
    <div class="product-price card-title text-danger flex">
        <span class="old-price delete">$2,599.00</span>
        <span class="price">$3,999.00</span>
    </div>
    <!-- End product price -->
    
    <div class="card-body flex">
        <div>
        <p class="card-text ">Infinix hot 5 (ultralight 5gb ram, 500mpi)</p>
        </div>
        <div class="send">
        <p class="send_offer">Send Offer</p>
        <img src="images/baglogo.png" width="20px"height="20px" alt="" class="baglo">
        </div>
        <p class="review yellow_background fs-9 ">*4.2</p>
    </div>    
</div>
<!-- End product details -->
</div>

<div class="col-6 col-sm-6 col-md-4  item border-rounded  ">
<!-- start product image -->
<div class="product-image">
    <!-- start product image -->
    <a href="javascript:void(0)" title="Quick View" data-toggle="modal" data-target="#content_quickview">

        <!-- image -->                    
    <img class="primary blur-up lazyload" data-src="images/img2.png" src="images/img2.png" alt="image" title="product" class="card-img-top border-rounded-top img-fluid">
        <!-- End image -->

        <!-- Hover image -->
        <img class="hover blur-up lazyload" data-src="images/img2.png" src="images/img2.png" alt="image" title="product">
        <!-- End hover image -->
        
        <!-- product label -->
    <p class="sold yellow_background fs-9">Sold 10</p>
        <!-- End product label -->
    </a>
    <!-- end product image -->

</div>
<!-- end product image -->

<!--start product details -->
<div class="product-details text-center">
    <!-- product name -->
    <!-- <div class="product-name">
        <a href="#">Edna Dress</a>
    </div> -->
    <!-- End product name -->
    <!-- product price -->
    <div class="product-price card-title text-danger flex">
        <span class="old-price delete">$765,999.00</span>
        <span class="price">$553,999.00</span>
    </div>
    <!-- End product price -->
    
    <div class="card-body flex">
        <div>
        <p class="card-text ">Porshe extra feeder car, hybrid model rxd44 black</p>
        </div>
        <div class="send">
        <p class="send_offer">Send Offer</p>
        <img src="images/baglogo.png" width="20px"height="20px" alt="" class="baglo">
        </div>
        <p class="review yellow_background fs-9 ">*5.0</p>
    </div>    
</div>
<!-- End product details -->
</div>

<div class="col-6 col-sm-6 col-md-4  item border-rounded  ">
<!-- start product image -->
<div class="product-image">
    <!-- start product image -->
    <a href="javascript:void(0)" title="Quick View" data-toggle="modal" data-target="#content_quickview">

        <!-- image -->                    
    <img class="primary blur-up lazyload" data-src="images/img3.png" src="images/img3.png" alt="image" title="product" class="card-img-top border-rounded-top img-fluid">
        <!-- End image -->

        <!-- Hover image -->
        <img class="hover blur-up lazyload" data-src="images/img3.png" src="images/img3.png" alt="image" title="product">
        <!-- End hover image -->
        
        <!-- product label -->
    <p class="sold yellow_background fs-9">Sold 109</p>
        <!-- End product label -->
    </a>
    <!-- end product image -->

</div>
<!-- end product image -->

<!--start product details -->
<div class="product-details text-center">
    <!-- product name -->
    <!-- <div class="product-name">
        <a href="#">Edna Dress</a>
    </div> -->
    <!-- End product name -->
    <!-- product price -->
    <div class="product-price card-title text-danger flex">
        <span class="old-price delete">$110.00</span>
        <span class="price">$99.00</span>
    </div>
    <!-- End product price -->
    
    <div class="card-body flex">
        <div>
        <p class="card-text ">25gb USB Flash drive</p>
        </div>
        <div class="send">
        <p class="send_offer">Send Offer</p>
        <img src="images/baglogo.png" width="20px"height="20px" alt="" class="baglo">
        </div>
        <p class="review yellow_background fs-9 ">*3.6</p>
    </div>    
</div>
<!-- End product details -->
</div>

<div class="col-6 col-sm-6 col-md-4  item border-rounded  ">
<!-- start product image -->
<div class="product-image">
    <!-- start product image -->
    <a href="javascript:void(0)" title="Quick View" data-toggle="modal" data-target="#content_quickview">

        <!-- image -->                    
    <img class="primary blur-up lazyload" data-src="images/house3.png" src="images/house3.png" alt="image" title="product" class="card-img-top border-rounded-top img-fluid">
        <!-- End image -->

        <!-- Hover image -->
        <img class="hover blur-up lazyload" data-src="images/house3.png" src="images/house3.png" alt="image" title="product">
        <!-- End hover image -->
        
        <!-- product label -->
    <p class="sold yellow_background fs-9">Sold 25</p>
        <!-- End product label -->
    </a>
    <!-- end product image -->

</div>
<!-- end product image -->

<!--start product details -->
<div class="product-details ">
    <!-- product price -->
    <div class="product-price card-title text-danger flex">
        <span class="old-price delete">$3,500.00</span>
        <span class="price">$2,009.00</span>
    </div>
    <!-- End product price -->
    
    <div class="card-body flex">
        <div>
        <p class="card-text ">5 Bedroom Bungalow seating on 10 plots of Land</p>
        </div>
        <div class="send">
        <p class="send_offer">Send Offer</p>
        <img src="images/baglogo.png" width="20px"height="20px" alt="" class="baglo">
        </div>
        <p class="review yellow_background fs-9 ">*4.3</p>
    </div>    
</div>
<!-- End product details -->
</div>

<div class="col-6 col-sm-6 col-md-4  item border-rounded  ">
<!-- start product image -->
<div class="product-image">
    <!-- start product image -->
    <a href="javascript:void(0)" title="Quick View" data-toggle="modal" data-target="#content_quickview">

        <!-- image -->                    
    <img class="primary blur-up lazyload" data-src="images/product-image21.jpg" src="images/product-image21.jpg" alt="image" height="240px" title="product" class="card-img-top border-rounded-top img-fluid">
        <!-- End image -->

        <!-- Hover image -->
        <img class="hover blur-up lazyload" data-src="images/product-image21-1.jpg" src="images/product-image21-1.jpg" alt="image" title="product">
        <!-- End hover image -->
        
        <!-- product label -->
    <p class="sold yellow_background fs-9">Sold 25</p>
        <!-- End product label -->
    </a>
    <!-- end product image -->

</div>
<!-- end product image -->

<!--start product details -->
<div class="product-details ">
    <!-- product name -->
    <!-- <div class="product-name">
        <a href="#">Edna Dress</a>
    </div> -->
    <!-- End product name -->
    <!-- product price -->
    <div class="product-price card-title text-danger flex">
        <span class="old-price delete">$599.00</span>
        <span class="price">$499.00</span>
    </div>
    <!-- End product price -->
    
    <div class="card-body flex">
        <div>
        <p class="card-text ">Nude crochet Crop Top</p>
        </div>
        <div class="send">
        <p class="send_offer">Send Offer</p>
        <img src="images/baglogo.png" width="20px"height="20px" alt="" class="baglo">
        </div>
        <p class="review yellow_background fs-9 ">*4.2</p>
    </div>    
</div>
<!-- End product details -->
</div>

<div class="col-6 col-sm-6 col-md-4  item border-rounded  ">
<!-- start product image -->
<div class="product-image">
    <!-- start product image -->
    <a href="javascript:void(0)" title="Quick View" data-toggle="modal" data-target="#content_quickview">

        <!-- image -->                    
    <img class="primary blur-up lazyload" data-src="images/cosmetic.jpg" src="images/cosmetic.jpg" height="240px" alt="image" title="product" class="card-img-top border-rounded-top img-fluid">
        <!-- End image -->

        <!-- Hover image -->
        <img class="hover blur-up lazyload" data-src="images/cosmetic.jpg" src="images/cosmetic.jpg" alt="image" title="product">
        <!-- End hover image -->
        
        <!-- product label -->
    <p class="sold yellow_background fs-9">Sold 15</p>
        <!-- End product label -->
    </a>
    <!-- end product image -->

</div>
<!-- end product image -->

<!--start product details -->
<div class="product-details text-center">
    <!-- product name -->
    <!-- <div class="product-name">
        <a href="#">Edna Dress</a>
    </div> -->
    <!-- End product name -->
    <!-- product price -->
    <div class="product-price card-title text-danger flex">
        <span class="old-price delete">$99.00</span>
        <span class="price">$59.00</span>
    </div>
    <!-- End product price -->
    
    <div class="card-body flex">
        <div>
        <p class="card-text ">Cosmetics</p>
        </div>
        <div class="send">
        <p class="send_offer">Send Offer</p>
        <img src="images/baglogo.png" width="20px"height="20px" alt="" class="baglo">
        </div>
        <p class="review yellow_background fs-9 ">*4.5</p>
    </div>    
</div>
<!-- End product details -->
</div>

<div class="col-6 col-sm-6 col-md-4  item border-rounded  ">
<!-- start product image -->
<div class="product-image">
    <!-- start product image -->
    <a href="javascript:void(0)" title="Quick View" data-toggle="modal" data-target="#content_quickview">

        <!-- image -->                    
    <img class="primary blur-up lazyload" height="240px" data-src="images/categories-img1.jpg" src="images/categories-img1.jpg" alt="image" title="product" class="card-img-top border-rounded-top img-fluid">
        <!-- End image -->

        <!-- Hover image -->
        <img class="hover blur-up lazyload" data-src="images/categories-img1.jpg" src="images/categories-img1.jpg" alt="image" title="product">
        <!-- End hover image -->
        
        <!-- product label -->
    <p class="sold yellow_background fs-9">Sold 10</p>
        <!-- End product label -->
    </a>
    <!-- end product image -->

</div>
<!-- end product image -->

<!--start product details -->
<div class="product-details text-center">
    <!-- product name -->
    <!-- <div class="product-name">
        <a href="#">Edna Dress</a>
    </div> -->
    <!-- End product name -->
    <!-- product price -->
    <div class="product-price card-title text-danger flex">
        <span class="old-price delete">$1,599.00</span>
        <span class="price">$1,000.00</span>
    </div>
    <!-- End product price -->
    
    <div class="card-body flex">
        <div>
        <p class="card-text ">Lexus spare Tire</p>
        </div>
        <div class="send">
        <p class="send_offer">Send Offer</p>
        <img src="images/baglogo.png" width="20px"height="20px" alt="" class="baglo">
        </div>
        <p class="review yellow_background fs-9 ">*4.2</p>
    </div>    
</div>
<!-- End product details -->
</div>

<div class="col-6 col-sm-6 col-md-4  item border-rounded  ">
<!-- start product image -->
<div class="product-image">
    <!-- start product image -->
    <a href="javascript:void(0)" title="Quick View" data-toggle="modal" data-target="#content_quickview">

        <!-- image -->                    
    <img class="primary blur-up lazyload" data-src="images/img1.png" src="images/img1.png" alt="image" title="product" class="card-img-top border-rounded-top img-fluid">
        <!-- End image -->

        <!-- Hover image -->
        <img class="hover blur-up lazyload" data-src="images/img1.png" src="images/img1.png" alt="image" title="product">
        <!-- End hover image -->
        
        <!-- product label -->
    <p class="sold yellow_background fs-9">Sold 75</p>
        <!-- End product label -->
    </a>
    <!-- end product image -->

</div>
<!-- end product image -->

<!--start product details -->
<div class="product-details text-center">
    <!-- product name -->
    <!-- <div class="product-name">
        <a href="#">Edna Dress</a>
    </div> -->
    <!-- End product name -->
    <!-- product price -->
    <div class="product-price card-title text-danger flex">
        <span class="old-price delete">$2,599.00</span>
        <span class="price">$3,999.00</span>
    </div>
    <!-- End product price -->
    
    <div class="card-body flex">
        <div>
        <p class="card-text ">Infinix hot 5 (ultralight 5gb ram, 500mpi)</p>
        </div>
        <div class="send">
        <p class="send_offer">Send Offer</p>
        <img src="images/baglogo.png" width="20px"height="20px" alt="" class="baglo">
        </div>
        <p class="review yellow_background fs-9 ">*4.2</p>
    </div>    
</div>
<!-- End product details -->
</div>

<div class="col-6 col-sm-6 col-md-4  item border-rounded  ">
<!-- start product image -->
<div class="product-image">
    <!-- start product image -->
    <a href="javascript:void(0)" title="Quick View" data-toggle="modal" data-target="#content_quickview">

        <!-- image -->                    
    <img class="primary blur-up lazyload" data-src="images/img1.png" src="images/img1.png" alt="image" title="product" class="card-img-top border-rounded-top img-fluid">
        <!-- End image -->

        <!-- Hover image -->
        <img class="hover blur-up lazyload" data-src="images/img1.png" src="images/img1.png" alt="image" title="product">
        <!-- End hover image -->
        
        <!-- product label -->
    <p class="sold yellow_background fs-9">Sold 75</p>
        <!-- End product label -->
    </a>
    <!-- end product image -->

</div>
<!-- end product image -->

<!--start product details -->
<div class="product-details text-center">
    <!-- product name -->
    <!-- <div class="product-name">
        <a href="#">Edna Dress</a>
    </div> -->
    <!-- End product name -->
    <!-- product price -->
    <div class="product-price card-title text-danger flex">
        <span class="old-price delete">$2,599.00</span>
        <span class="price">$3,999.00</span>
    </div>
    <!-- End product price -->
    
    <div class="card-body flex">
        <div>
        <p class="card-text ">Infinix hot 5 (ultralight 5gb ram, 500mpi)</p>
        </div>
        <div class="send">
        <p class="send_offer">Send Offer</p>
        <img src="images/baglogo.png" width="20px"height="20px" alt="" class="baglo">
        </div>
        <p class="review yellow_background fs-9 ">*4.2</p>
    </div>    
</div>
<!-- End product details -->
</div>
                                   
                        </div>
                    </div>
                </div>
                <hr class="clear">
                <div class="pagination">
                  <ul>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li class="next"><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                  </ul>
                </div>
            </div>
            <!--End Main Content-->
        </div>
    </div>
    
</div>
<!--End Body Content-->

@endsection


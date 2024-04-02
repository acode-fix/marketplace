<div class="pageWrapper">
	<!--Search Form Drawer-->
	<!-- <div class="search">
        <div class="search__form">
            <form class="search-bar__form" action="#">
                <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
            </form>
            <button type="button" class="search-trigger close-btn"><i class="icon anm anm-times-l"></i></button>
        </div>
    </div> -->
    <!--End Search Form Drawer-->

    <!-- Begin Header Middle Area -->
    <div class="container-fluid header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0 p-2">
        <div class="container px-3 sticky-top navbar-light one">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30 p-0">
                        <a href="index.html">
              <img src="images/logoo.png" alt="MarketPlace" title="MarketPlace" >
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                    <!-- Begin Header Middle Searchbox Area -->
                  @if(str_contains(url()->current(),'/product'))

                  <form action="#" class="hm-searchbox">
                    <select class="nice-select select-search-category">
                        <option value="0">Country</option>                         
                        <option value="10"><a href="#"><img src="images/menu/flag-icon/1.jpg" alt="">England</a></option>                     
                        <option value="17"><a href="#"><img src="images/menu/flag-icon/2.jpg" alt="">France</a></option>                    
                    </select>
                    <input type="text" placeholder="Enter your search key ...">
                    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
                <form action="#" class="hm-searchbox search" role="search">
                    <input class="form-control" type="search" placeholder=" Search Category" aria-label="Search">
                    <div class='input-group-append' style="margin-left: -80px; margin-top: 7px;">
                    <button class="btn btn-outline-warning text-black yellow_background btn-sm" type="submit"><i class="bi bi-search"></i>Search</button>
                  </div>
                   </form>  

                   @else 

                   <form action="#" class="hm-searchbox">
                    <select class="nice-select select-search-category">
                        <option value="0">Country</option>                         
                        <option value="10"><a href="#"><img src="images/menu/flag-icon/1.jpg" alt="">England</a></option>                     
                        <option value="17"><a href="#"><img src="images/menu/flag-icon/2.jpg" alt="">France</a></option>                    
                    </select>
                    <input type="text" placeholder="Enter your search key ...">
                    <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                </form>

                   @endif

                     {{-- @yield('search-bar','
                    <form action="#" class="hm-searchbox">
                        <select class="nice-select select-search-category">
                            <option value="0">Country</option>                         
                            <option value="10"><a href="#"><img src="images/menu/flag-icon/1.jpg" alt="">England</a></option>                     
                            <option value="17"><a href="#"><img src="images/menu/flag-icon/2.jpg" alt="">France</a></option>                    
                        </select>
                        <input type="text" placeholder="Enter your search key ...">
                        <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>') --}}

                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class=" col-lg-3 header-middle-right">
                        <div class="hm-menu flex">
                            <!-- Begin Header Middle Wishlist Area -->
                            <div class="nav-item box">
                                <a type='button' class="nav-link active" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="images/signup2.png" alt=""></a>            
                            </div>
                              
                            <!-- Header Middle Wishlist Area End Here -->
                            <!-- Begin Header Mini Cart Area -->
                            <div class="nav-item you">
                                <a style="background-color: #D2D2D2; padding: 12px; border: 1px solid transparent; border-radius: 30px;" class="nav-link active btn" aria-current="page" href="#">You</a>
                            </div>                                      
                        </div>
                                </div>
                            <!-- Header Mini Cart Area End Here -->
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->

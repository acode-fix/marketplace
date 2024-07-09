<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/product.des.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/notification.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/alert.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/fontawesome.min.css') }}">

</head>
<body>

    <div class="body">

        <div >



           <div id="scrollToTop"><i class="fa-solid fa-arrow-up"></i></div>

            <!-- Navbar and Search Button -->
        <div class="navbar-1 fixed-top">
            <img src="innocent/assets/image/main logo.svg"  class="search_buy_and_sell_logo " alt="" onclick="window.location.href='{{ url('/') }}';">

            <div class="search-bar">
                <div class="location-icon"><i class="fa-solid fa-location-dot"></i></div>
                <select placeholder="Country" class="country-input">
                    <option selected>USA</option>
                    <option value="1">Canada</option>
                    <option value="2">Nigeria</option>
                    <option value="3">Russia</option>
                </select>
                <div class="vertical-bar"></div>
                <a href="{{ url('/search') }}">
                    <span  onclick="localStorage.setItem('previousPage', '{{ url('/product_des') }}')">
                       <input type="text" placeholder="Find what to buy..." class="find-what-to-buy">
                       <button type="button" class="search">Search</button>
                    </span>
               </a>
            </div>
            <div id="notification_icon_div"><img src="innocent/assets/image/notification.png" alt="Logo" id="notification_icon"></div>
            <div id="notification_icon_div2"> <a href="{{ url('/notification_mobile') }}"><img src="innocent/assets/image/notification.png" alt="Logo" ></a></div>

             <div><img src="innocent/assets/image/bike.png" alt=".profile picture " class="profile_picture"></div>
             <div><img src="innocent/assets/image/bike.png" alt=".profile picture " class="profile_picture_mobile"></div>
        </div>

        <!-- prifile card -->
        <div class="profile_card">
            <div class="profile_card_user_name">
              <img src="innocent/assets/image/dp.png" alt="">
              <p>Mired Augustine <br>
                <span>miredaugustine@gmail.com</span>
              </p>
            </div>
            <hr>
            <div class="accont_features">
                <p><a href="{{ url('/settings') }}">Account Setting </a></p>
                <p><a href="{{ url('/refer') }}"> Reffer a Friend </a></p>
                <p> <a href="{{ url('/privacy') }}">Privacy and Policy </a></p>
                <p><a href="#"> Sign out</a></p>

            </div>

        </div>


        {{-- This part is for the mobile view for navbar sticky part --}}
    <div class="navbar-2 fixed-top">
        <a href="{{ url('/') }}">  <i class="fa-solid fa-angle-left  back_to_index" ></i></a>
        <div class="user_info">


            <div><img src="innocent/assets/image/bike.png" alt=".profile picture " class="user_photo"></div>
            <div class="user_name_area">
                <p class="user_name">Innocent</p>

                <p class="location">
                    <img src="innocent/assets/image/badge.png" alt="">
                    <span class="user_state_mobile">loading</span>
                    <span class="rate">
                        <img src="innocent/assets/image/Rate.png" alt="">
                        <span class="rate_value">loading</span>
                    </span>
                </p>
            </div>
            <div class="products_details_head">
                <p class="sold2">
                    loading
                </p>

                <p class="stock">
                    loading
                </p>

                <p class="condition">
                    loading
                </p>
            </div>
        </div>
        <img src="innocent/assets/image/main logo.svg" alt="" class="buy_and_sell_logo_product_des_mobile">

    </div>



    <!-- Sidebar and Main Body Section -->
    <div class="sidebar_and_main_container">
        <div class="sidebar" >
            <div class="sidebar_main">


                <div class="products_details_dekstop">
                    <div class="user_info2">
                        <div><img src="innocent/assets/image/bike.png" alt=".profile picture " class="user_photo"></div>
                        <div class="user_name2_area">
                            <p class="user_name2">Loading</p>
                            <p class="location2">
                                <img src="innocent/assets/image/badge.png" alt="">
                                <i class="fa-solid fa-location-dot" style="font-size: 12px;"></i>
                                <span class="user_state">loading</span>
                                <span class="rate">
                                    <img src="innocent/assets/image/Rate.png" alt="">
                                    <span class="rate_value">loading</span>
                                </span>
                            </p>
                        </div>
                        <div class="close_product_des"><a href="{{ url('/') }}"><i class="fa-solid fa-close "></i></a></div>
                    </div>

                    <div class="products_details_head2">
                        <p class="sold3">
                            Loading
                        </p>

                        <p class="stock2">
                            Loading
                        </p>

                        <p class="condition2">
                            Loading
                        </p>
                    </div>
                </div>

              <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators" id="carousel-indicators">
                    <!-- Carousel indicators will be dynamically inserted here -->
                </div>
                <div class="carousel-inner" id="carousel-inner">
                    <!-- Carousel items will be dynamically inserted here -->
                    <div class="carousel-item active">
                        <img src="" class="carousel_img" alt="...">
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



               <div class="product_descriptoin_card">
                    <p class="product_name_on_sidebar">Loading</p>
                    <hr>
                    <div class="main_and_promo_price_des_sidebar">
                    <p class="promo_price2">loading</p>
                     <p class="main_price2">loading</p>

                    </div>
                    <div>
                     <span style="font-weight: bold;">Description</span>
                     <p class="description">Loading</p>
                 </div>
                    <div class="connect_buttons">

                        <button  class="product_card_veiw_shop_button" >
                          <a href="{{ url('/sellers-shop') }}">view shop <img src="innocent/assets/image/badge.png" alt="" ></a>
                        </button>
                        <button  class="product_card_connect_button">
                           <a href="{{ url('/shop') }}">connect <img src="innocent/assets/image/Shopping bag.png" alt="" ></a>
                        </button>
                    </div>
                </div>


            </div>


            <!-- Main Body Section --> <!-- This part works for the mobile view -->
        <div class="main2" >

            <h5 class="related_search  animate animate-right">Related Search</h5>
            <!-- Product Cards -->
            <div class="product_card_container related_search_margin">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="product_card_display card-margin content-margin mt-4">
                                <!-- Example Product Card -->
                                <a href="#" class="product_card_link" data-product-id="1">
                                    <div class="card product_card">
                                        <h6 class="sold"> Sold 35 <br> <img src="innocent/assets/image/Rate.png" alt=""> 4.0</h6>
                                        <img src="innocent/assets/image/pexels-pixabay-164558.jpg" class="card-img-top w-100 product_image" alt="...">
                                        <div class="product_card_title">
                                            <div class="main_and_promo_price_area">
                                                <p class="promo_price">$100,000,000</p>
                                                <div class="main_price"><p class="main_price_amount">$120,000,000</p></div>
                                            </div>
                                            <p class="product_name">3 Bed Room Flat</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Abuja</span>
                                            <img src="innocent/assets/image/logo icon.svg" alt="">
                                            <span class="connect"><strong>connect</strong></span>
                                        </div>
                                    </div>
                                </a>
                                <!-- Repeat similar structure for other product cards -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Promotion Section -->
            <div class="promotion">
                <img src="innocent/assets/image/Annoucement.png" alt="" class="Announcement">
                <p>
                    <img src="innocent/assets/image/main logo.svg" alt="" width="180px" ><br><br>
                        <img src="innocent/assets/image/Annoucement.png" alt="" class="Announcement2">
                        <strong>Reach more audience by promoting your Product(s)</strong><br>
                        determine your target audience location, interest, select a <br>
                        convenient budget and duration
                    <br><br><br>
                   <button class="get_started animate animate-pulse4"  onclick="showCard_get_started()">Get Started</button>
                </p>
            </div>

                <div class="promotion_card card" id="promotion_card" style="display: none;">
                    <i class="fa-solid fa-close close_get_started" onclick="hideCard_get_started()"></i>
                    <img src="innocent/assets/image/Annoucement.png" alt="">
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
                        <div class="product_card_display card-margin content-margin mt-4">


                            <a href="{{ url('/product_des') }}" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 35 <br> <img src="innocent/assets/image/Rate.png" alt=""> 4.0</h6>
                                    <img src="innocent/assets/image/pexels-pixabay-164558.jpg" class="card-img-top w-100 product_image" alt="...">

                                    <div class="product_card_title">
                                        <div class="main_and_promo_price_area">
                                            <p class="promo_price">$100,000,000</p>
                                            <div class="main_price"><p class="main_price_amount">$120,000,000</p></div>

                                        </div>


                                        <p class="product_name">3 Bed Room Flat</p>
                                        <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Abuja</span>
                                        <img src="innocent/assets/image/logo icon.svg" alt="" >
                                        <span class="connect"><strong>connect</strong></span>

                                    </div>
                                </div>
                             </a>
                             <a href="{{ url('/product_des') }}" class="product_card_link">
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
                                            <img src="innocent/assets/image/logo icon.svg" alt="" >
                                            <span class="connect"><strong>connect</strong></span>

                                    </div>
                                </div>
                             </a>
                             <a href="{{ url('/product_des') }}" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 175 <br> <img src="innocent/assets/image/Rate.png" alt=""> 3.6</h6>
                                    <img src="innocent/assets/image/laptop.jpg" class="card-img-top w-100 product_image" alt="...">

                                    <div class="product_card_title">

                                        <div class="main_and_promo_price_area">
                                            <div class="ask_for_price">Ask for price</div>

                                        </div>
                                            <p class="product_name">Laptop Apple MacBook Pro 2015 8GB</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i> Ilorin</span>
                                            <img src="innocent/assets/image/logo icon.svg" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>

                             <a href="{{ url('/product_des') }}" class="product_card_link">
                                <div class="card product_card">
                                    <h6 class="sold"> Sold 75 <br> <img src="innocent/assets/image/Rate.png" alt=""> 5.0</h6>
                                    <img src="innocent/assets/image/portrait-smiling-afro-american-male-photographer.jpg" class="card-img-top w-100 product_image" alt="...">

                                    <div class="product_card_title">

                                        <div class="main_and_promo_price_area">
                                            <div class="ask_for_price">Ask for price</div>

                                        </div>
                                            <p class="product_name">Photographer</p>
                                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  Lagos</span>
                                            <img src="innocent/assets/image/logo icon.svg" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>
                             <a href="{{ url('/product_des') }}" class="product_card_link">
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
                                            <img src="innocent/assets/image/logo icon.svg" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>
                             <a href="{{ url('/product_des') }}" class="product_card_link">
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
                                            <img src="innocent/assets/image/logo icon.svg" alt="" >
                                           <span class="connect"><strong>connect</strong></span>
                                    </div>
                                </div>
                             </a>

                        </div>
                      </div>
                    </div>
                  </div>



            </div>


            <!--tell us what is it-->
            <div class="tell_us_what_u_want animate animate-left ">
                <p class="tell_us_paragraph" onclick="changeToInput()">
                    <img src="innocent/assets/image/pen.png" alt="" class="pen">
                    Can't find what you are looking for?
                    <span>Tell us what it is!</span><br>
                    and we'll do our best to assist you.
                </p>
            </div>

            <div class="tell_us_what_u_want_input_area">
                <img src="innocent/assets/image/dp.png" alt="" class="tell_us_what_u_want_profile">
               <div class="vertical_bar"></div>
                <input type="text" name="" class="tell_us_input" placeholder="write the details here">
                <button class="send" onclick="send()">send</button>

            </div>
             <p class="submmited" >submmited✅</p>
             <div class="loader" class="loader"></div>

        </div>
    </div>


    <div class="main" id="main">

        <h5 class="related_search animate animate-right">Related Search</h5>
        <!-- Product Cards -->
        <div class="product_card_container related_search_margin">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
        <div class="product_card_display card-margin content-margin mt-4" id="productCardDisplay">
            <!-- Products will be dynamically added here -->
        </div>
    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>




    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
    // Fetch and display all products
    axios.get('/api/prod')
        .then(function (response) {
            const products = response.data;
            renderProducts(products);
        })
        .catch(function (error) {
            console.error('Error fetching products:', error);
        });

    // Function to render product cards
    function renderProducts(products) {
        const productContainer = document.getElementById('productCardDisplay');
        productContainer.innerHTML = ''; // Clear the container first

        var url = 'localhost:8000/uploads/products/';

        products.forEach(function (product) {
            const card = document.createElement('div');
            card.className = 'card';

            var product_img_url = '';
            JSON.parse(product.image_url).forEach((el, i) => {
                if (i == 0)
                    product_img_url = el;
            });

            card.innerHTML = `
                <a href="#" class="product_card_link" data-product-id="${product.id}">
                    <div class="card product_card">
                        <h6 class="sold">Sold ${product.sold} <br> <img src="innocent/assets/image/Rate.png" alt=""> ${product.rating}</h6>

                        <img src="uploads/products/${product_img_url}" class="card-img-top w-100 product_image" alt="${product.title}">
                        <div class="product_card_title">
                            <div class="main_and_promo_price_area">
                                <p class="promo_price">$${product.promo_price}</p>
                                <div class="main_price"><p class="main_price_amount">$${product.actual_price}</p></div>
                            </div>
                            <p class="product_name">${product.title}</p>
                            <span class="product_card_location"><i class="fa-solid fa-location-dot"></i> ${product.location}</span>
                            <img src="innocent/assets/image/logo icon.svg" alt="">
                            <span class="connect"><strong>connect</strong></span>
                        </div>
                    </div>
                </a>
            `;

            // Add click event listener to fetch and display product details
            card.querySelector('.product_card_link').addEventListener('click', function (event) {
                event.preventDefault();
                const productId = this.getAttribute('data-product-id');
                fetchProductDetails(productId);
            });

            productContainer.appendChild(card);
        });
    }

    // Function to fetch product details by ID and update the sidebar
    function fetchProductDetails(productId) {
        axios.get(`/api/product-details/${productId}`)
            .then(function (response) {
                const productDetails = response.data;

                document.querySelector('.user_name2').textContent = productDetails.user_name;
                document.querySelector('.user_state').textContent = productDetails.location;
                document.querySelector('.rate_value').textContent = productDetails.rate;
                document.querySelector('.sold3').textContent = 'sold ' + productDetails.sold;
                document.querySelector('.stock2').textContent = productDetails.stock + ' in stock';
                document.querySelector('.condition2').textContent = productDetails.condition;
                document.querySelector('.promo_price2').textContent = '$' + productDetails.promo_price;
                document.querySelector('.main_price2').textContent = '$' + productDetails.actual_price;
                document.querySelector('.description').textContent = productDetails.description;
                document.querySelector('.product_name_on_sidebar').textContent = productDetails.title;

                updateCarousel(productDetails.image_url);
            })
            .catch(function (error) {
                console.error('Error fetching product details:', error);
            });
    }

    // Function to update the carousel with product images
    function updateCarousel(imagesJson) {
        const images = JSON.parse(imagesJson);

        const indicatorsContainer = document.getElementById('carousel-indicators');
        const innerContainer = document.getElementById('carousel-inner');

        indicatorsContainer.innerHTML = '';
        innerContainer.innerHTML = '';

        images.forEach((image, index) => {
            const indicator = document.createElement('button');
            indicator.type = 'button';
            indicator.setAttribute('data-bs-target', '#carouselExampleIndicators');
            indicator.setAttribute('data-bs-slide-to', index);
            indicator.setAttribute('aria-label', `Slide ${index + 1}`);
            indicator.style.backgroundColor = '#ffce29';
            if (index === 0) {
                indicator.classList.add('active');
                indicator.setAttribute('aria-current', 'true');
            }
            indicatorsContainer.appendChild(indicator);

            const carouselItem = document.createElement('div');
            carouselItem.classList.add('carousel-item');
            if (index === 0) {
                carouselItem.classList.add('active');
            }
            carouselItem.innerHTML = `
                <img src="uploads/products/${image}" class="carousel_img" alt="Product Image ${index + 1}">
            `;
            innerContainer.appendChild(carouselItem);
        });
    }
});

    </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {
    // Fetch and display all products
    axios.get('/api/prod')
        .then(function (response) {
            const products = response.data;
            renderProducts(products);
        })
        .catch(function (error) {
            console.error('Error fetching products:', error);
        });

    // Function to render product cards
    function renderProducts(products) {
        const productContainer = document.getElementById('productCardDisplay');
        const mobileProductContainer = document.querySelector('.product_card_display');
        productContainer.innerHTML = ''; // Clear the container first
        mobileProductContainer.innerHTML = ''; // Clear the mobile container first

        products.forEach(function (product) {
            const card = createProductCard(product);
            productContainer.appendChild(card);

            const mobileCard = createProductCard(product);
            mobileProductContainer.appendChild(mobileCard);
        });

        // Add event listeners to both desktop and mobile product cards
        document.querySelectorAll('.product_card_link').forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                const productId = this.getAttribute('data-product-id');
                fetchProductDetails(productId);
            });
        });
    }

    // Function to create a product card element
    function createProductCard(product) {
        const card = document.createElement('div');
        card.className = 'card';

        var product_img_url = '';
        JSON.parse(product.image_url).forEach((el, i) => {
            if (i == 0)
                product_img_url = el;
        });

        card.innerHTML = `
            <a href="#" class="product_card_link" data-product-id="${product.id}">
                <div class="card product_card">
                    <h6 class="sold">Sold ${product.sold} <br> <img src="innocent/assets/image/Rate.png" alt=""> ${product.rating}</h6>
                    <img src="uploads/products/${product_img_url}" class="card-img-top w-100 product_image" alt="${product.title}">
                    <div class="product_card_title">
                        <div class="main_and_promo_price_area">
                            <p class="promo_price">$${product.promo_price}</p>
                            <div class="main_price"><p class="main_price_amount">$${product.actual_price}</p></div>
                        </div>
                        <p class="product_name">${product.title}</p>
                        <span class="product_card_location"><i class="fa-solid fa-location-dot"></i> ${product.location}</span>
                        <img src="innocent/assets/image/logo icon.svg" alt="">
                        <span class="connect"><strong>connect</strong></span>
                    </div>
                </div>
            </a>
        `;

        return card;
    }

    // Function to fetch product details by ID and update the sidebar
    function fetchProductDetails(productId) {
        axios.get(`/api/product-details/${productId}`)
            .then(function (response) {
                const productDetails = response.data;

                // document.querySelector('.user_name2').textContent = productDetails.user_name;
                document.querySelector('.user_state').textContent = productDetails.location;
                document.querySelector('.rate_value').textContent = productDetails.rate;
                document.querySelector('.sold3').textContent = 'sold ' + productDetails.sold;
                document.querySelector('.stock2').textContent = productDetails.quantity + ' in stock';
                document.querySelector('.condition2').textContent = productDetails.condition;
                document.querySelector('.promo_price2').textContent = '$' + productDetails.promo_price;
                document.querySelector('.main_price2').textContent = '$' + productDetails.actual_price;
                document.querySelector('.description').textContent = productDetails.description;
                document.querySelector('.product_name_on_sidebar').textContent = productDetails.title;

                //for the mobile
                document.querySelector('.sold2').textContent = 'sold ' + productDetails.sold;
                document.querySelector('.stock').textContent = productDetails.quantity + ' in stock';
                document.querySelector('.condition').textContent = productDetails.condition;
                // document.querySelector('.user_name').textContent = productDetails.user_name;
                document.querySelector('.user_state_mobile').textContent = productDetails.location;





                updateCarousel(productDetails.image_url);
            })
            .catch(function (error) {
                console.error('Error fetching product details:', error);
            });
    }

    // Function to update the carousel with product images
    function updateCarousel(imagesJson) {
        const images = JSON.parse(imagesJson);

        const indicatorsContainer = document.getElementById('carousel-indicators');
        const innerContainer = document.getElementById('carousel-inner');

        indicatorsContainer.innerHTML = '';
        innerContainer.innerHTML = '';

        images.forEach((image, index) => {
            const indicator = document.createElement('button');
            indicator.type = 'button';
            indicator.setAttribute('data-bs-target', '#carouselExampleIndicators');
            indicator.setAttribute('data-bs-slide-to', index);
            indicator.setAttribute('aria-label', `Slide ${index + 1}`);
            indicator.style.backgroundColor = '#ffce29';
            if (index === 0) {
                indicator.classList.add('active');
                indicator.setAttribute('aria-current', 'true');
            }
            indicatorsContainer.appendChild(indicator);

            const carouselItem = document.createElement('div');
            carouselItem.classList.add('carousel-item');
            if (index === 0) {
                carouselItem.classList.add('active');
            }
            carouselItem.innerHTML = `
                <img src="uploads/products/${image}" class="carousel_img" alt="Product Image ${index + 1}">
            `;
            innerContainer.appendChild(carouselItem);
        });
    }
});

    </script>






</body>
</html>


</html>

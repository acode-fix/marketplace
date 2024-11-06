   import {loadDashboard, getProdProfileDescImg, getBadge, loadConnect, getToken, logoutUser} from "../helper/helper.js";


   const token = getToken();

   if (token) {

    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

    axios.get('/api/v1/getuser', {
       
    })
    .then(response => {
        const user = response.data;

        //console.log(user)

        loadDashboard(user);
        document.getElementById('logout-link').addEventListener('click', () => {

            const auth = getToken();
        
            if(auth) {
        
            
        
                Swal.fire({
                  title: "Are you sure?",
                  text: "You won't be able to revert this!",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "Yes,I am sure!"
                  }).then((result) => {
                  if (result.isConfirmed) {
                    logoutUser();
                    
                  }
              });
        
            }
          
          })
        
    
            const imgDesk = document.getElementById('js-profile-desk');
            getProdProfileDescImg(user, imgDesk);
    })
    .catch(error => {
        console.error('Error fetching user data:', error);
        
    });


   }

   document.addEventListener('DOMContentLoaded', function () {
       const viewShopButton = document.getElementById('viewShopButton');

       if (viewShopButton) {
           // Apply initial styles
           viewShopButton.style.display = 'none'; // Initially hidden
           viewShopButton.style.border = '1px solid rgb(117, 116, 116)';
           viewShopButton.style.backgroundColor = 'white';
           viewShopButton.style.padding = '10px 10px';
           viewShopButton.style.fontSize = '15px';
           viewShopButton.style.borderRadius = '3px';

           // Add hover effects using mouseover and mouseout events
           viewShopButton.addEventListener('mouseover', function () {
               viewShopButton.style.border = '1px solid white';
               viewShopButton.style.outline = '1.5px solid red';
           });

           viewShopButton.addEventListener('mouseout', function () {
               viewShopButton.style.border = '1px solid rgb(117, 116, 116)';
               viewShopButton.style.outline = 'none';
           });
       }

       const selectedProduct = JSON.parse(localStorage.getItem('selectedProduct'));

       const allProducts = JSON.parse(localStorage.getItem('allProducts'));

       // console.log(selectedProduct);

       


       // Display product details if selectedProduct is available
       if (selectedProduct) {

           displayProductDetails(selectedProduct);

        const {id, verify_status, badge_status} = selectedProduct.user;

           // Show "View Shop" button if the seller is verified
           if (id && verify_status === 1 && badge_status === 1) {
               viewShopButton.style.display = 'block'; // Show button
           } else {
               viewShopButton.style.display = 'none'; // Hide button
           }
       }

       // Add event listener for "View Shop" button
       if (viewShopButton) {

           viewShopButton.addEventListener('click', function (event) {
               event.preventDefault();
               if (selectedProduct) {
                   const userId = selectedProduct.user.id;
                   //console.log(userId);

                   localStorage.setItem('userId', JSON.stringify(userId));

                   window.location.href = '/sellers-shop';



               }
           });
       }

       // Display all products if available
       if (allProducts) {
           renderProducts(allProducts);
       }



       const connectBtn = document.querySelector('.js-connect-btn');
       connectBtn.addEventListener('click', () => {

        if(selectedProduct) {

            console.log(selectedProduct);
            loadConnect(selectedProduct);   
        }

       });
   });




   function displayProductDetails(product) {

       // Display product details in the UI

       //console.log(product);
       document.querySelector('.user_state').textContent = product.location;
       document.querySelector('.user_name2').textContent = product.user.name;
       document.querySelector('.rate_value').textContent = product.rate;
       document.querySelector('.sold3').textContent = 'sold ' + (product.sold || 0);
       document.querySelector('.stock2').textContent = product.quantity + ' in stock';
       document.querySelector('.condition2').textContent = product.condition;
       document.querySelector('.description').textContent = product.description;
       document.querySelector('.product_name_on_sidebar').textContent = product.title;


       const carousel = document.getElementById('js-carousel-img');
        getProdProfileDescImg(product, carousel);

        const {verify_status, badge_status, id, shop_token} = product.user
       const badgeElement = document.querySelector('.js-badge');
       badgeElement.src = verify_status === 1 && badge_status === 1 ? 'innocent/assets/image/badge.png' : '';

       const reviewEl = document.querySelector('.js-review');
       reviewEl.href = `/review/product?user=${id}&shop=${shop_token}`



       // For mobile view
       /*
       document.querySelector('.sold2').textContent = 'sold ' + (product.sold || 0);
       document.querySelector('.stock').textContent = product.quantity + ' in stock';
       document.querySelector('.condition').textContent = product.condition;
       document.querySelector('.user_state_mobile').textContent = product.location;
       */       

       const badge = verify_status === 1 && badge_status === 1 ? '<img src="innocent/assets/image/badge.png" alt="">' : '';

       const mobileHeader = `
         <div><img id="js-profile-mobile" src="" alt=".profile picture " class="user_photo"></div>
             <div class="user_name_area">
                 <p class="user_name">${product.user.name ?? 'No Data Provided'}</p>
     
                 <p class="location">
                     ${badge}
                     <span class="user_state_mobile">${product.location ?? 'No Data Provided'}</span>
                     <span class="rate">
                         <img src="innocent/assets/image/Rate.png" alt="">
                         <span class="rate_value">loading</span>
                     </span>
                     <span><a class="review-link ps-2 text-success" href="/review/product?user=${id}&shop=${shop_token}">Reviews</a></span>
                 </p>
             </div>
             <div class="products_details_head">
                 <p class="sold2">
                     loading
                 </p>
     
                 <p class="stock">
                     ${product.quantity ?? 'No Data Provided'}
                 </p>
     
                 <p class="condition">
                     ${product.condition ?? 'No Data Provided'}
                 </p>
              </div>`;

       document.querySelector('.user_info').innerHTML = mobileHeader;

       const imgMobile =  document.getElementById('js-profile-mobile');
        getProdProfileDescImg(product, imgMobile);


       // Handle price display
       if (product.ask_for_price) {
           document.querySelector('.promo_price2').textContent = 'ASK FOR PRICE';
           document.querySelector('.main_price2').textContent = '';
       } else {
           document.querySelector('.promo_price2').textContent = '$' + (product.promo_price || '');
           document.querySelector('.main_price2').textContent = '$' + (product.actual_price || '');
       }

       // Update the image carousel
       updateCarousel(product.image_url);
   }

   

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
           // carouselItem.innerHTML = `
           //     <img src="uploads/products/${image}" style="width:100%" class="carousel_img" alt="Product Image ${index + 1}">
           // `;
           carouselItem.innerHTML = `
         <img src="uploads/products/${image}" style="width: 100%; max-height: auto; object-fit: cover;" class="carousel_img" alt="Product Image ${index + 1}">
     `;

           innerContainer.appendChild(carouselItem);
       });
   }

   function renderProducts(products) {
       // Function to render product cards in the UI
       const productCardDisplay1 = document.getElementById('productCardDisplay');
       const productCardDisplay2 = document.getElementById('productCardDisplay2');
       const mobileProductContainer1 = document.querySelector('.product_card_display');
       const mobileProductContainer2 = document.getElementById('productcard_display');

       // Clear existing product cards
       productCardDisplay1.innerHTML = '';
       productCardDisplay2.innerHTML = '';
       mobileProductContainer1.innerHTML = '';
       mobileProductContainer2.innerHTML = '';

       // Render product cards
       products.forEach((product, index) => {
           const card = createProductCard(product);
           if (index < 8) {
               productCardDisplay1.appendChild(card);
           } else {
               productCardDisplay2.appendChild(card);
           }

           const mobileCard = createProductCard(product);
           if (index < 8) {
               mobileProductContainer1.appendChild(mobileCard);
           } else {
               mobileProductContainer2.appendChild(mobileCard);
           }
       });
   }

   function createProductCard(product) {
       // Function to create a product card element
       const card = document.createElement('div');
       card.className = 'card';

       let product_img_url = '';
       JSON.parse(product.image_url).forEach((el, i) => {
           if (i === 0) product_img_url = el;
       });

       card.innerHTML = `
             <a href="/product_des" class="product_card_link" data-product='${JSON.stringify(product)}'>
                 <div class="card product_card">
                     <h6 class="sold"> Sold ${product.sold || 0} <br> <img src="innocent/assets/image/Rate.png" alt=""> ${product.rating || 0}</h6>
                     <img src="uploads/products/${product_img_url || 'default.jpg'}"  class="card-img-top w-100 product_image" alt="${product.title}">
                     <div class="product_card_title">
                         <div class="main_and_promo_price_area">
                             ${product.ask_for_price ? '<p class="ask-for-price" style="color:red; padding-right: 2px; font-size:23px">Ask for price</p>' : `
                                 <p class="promo_price">$${product.promo_price || ''}</p>
                                 <div class="main_price"><p class="main_price_amount">$${product.actual_price || ''}</p></div>
                             `}
                         </div>
                         <p class="product_name">${product.title}</p>
                         <span class="product_card_location"><i class="fa-solid fa-location-dot"></i> ${product.location}</span>
                          ${getBadge(product)}
                         <span class="connect"><strong>connect</strong></span>
                     </div>
                 </div>
             </a>
         `;

       card.querySelector('.product_card_link').addEventListener('click', function (event) {
           event.preventDefault();
           localStorage.setItem('selectedProduct', this.getAttribute('data-product'));
           window.location.href = this.href;
       });

       return card;
   }

   function fetchProductDetails(productId) {
       // Simulate fetching product details from API
       // Replace with actual API call if needed
       const allProducts = JSON.parse(localStorage.getItem('allProducts'));
       const selectedProduct = allProducts.find(product => product.id === productId);

       if (selectedProduct) {
           document.querySelector('.user_state').textContent = selectedProduct.location;
           document.querySelector('.rate_value').textContent = selectedProduct.rate;
           document.querySelector('.sold3').textContent = 'sold ' + (selectedProduct.sold || 0);
           document.querySelector('.stock2').textContent = selectedProduct.quantity + ' in stock';
           document.querySelector('.condition2').textContent = selectedProduct.condition;
           document.querySelector('.description').textContent = selectedProduct.description;
           document.querySelector('.product_name_on_sidebar').textContent = selectedProduct.title;

           //for mobile
           document.querySelector('.sold2').textContent = 'sold ' + (selectedProduct.sold || 0);
           document.querySelector('.stock').textContent = selectedProduct.stock + ' in stock';
           document.querySelector('.condition').textContent = selectedProduct.condition;
           document.querySelector('.user_state_mobile').textContent = selectedProduct.location;

           

           if (selectedProduct.ask_for_price) {
               document.querySelector('.promo_price2').textContent = 'ASK FOR PRICE';
               document.querySelector('.main_price2').textContent = '';
           } else {
               document.querySelector('.promo_price2').textContent = '$' + (selectedProduct.promo_price || '');
               document.querySelector('.main_price2').textContent = '$' + (selectedProduct.actual_price || '');
           }

           updateCarousel(selectedProduct.image_url);
       } else {
           console.error('Product with ID ' + productId + ' not found.');
       }
   }





   function promptLogin(message) {
       Swal.fire({
           icon: 'error',
           title: 'Login Required',
           text: message
       }).then(() => {
           window.location.href = '/'; // Redirect to login page
       });
   }

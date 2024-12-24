   import {loadDashboard, getProdProfileDescImg, getBadge, loadConnect, getToken, logoutUser, displayHelpCenter, sendProductRequest,getIndexPrice, formatPrice, formatProductCondition, loadResponse} from "../helper/helper.js";


   const token = getToken();

   if (token) {

    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

    axios.get('/api/v1/getuser', {
       
    })
    .then(response => {
        const user = response.data;

        const getEl = document.querySelector('.js-get-started');
        const getEl2 = document.querySelector('.js-get-started2');

        [getEl, getEl2].forEach((getEl) => {

            if(getEl) {

                getEl.addEventListener('click', (event) => {
                    event.preventDefault();
                    
                    if(user.verify_status == 1 && user.badge_status == 1) {

                        const title = '<span class="text-success">verified seller</span>';
                        const content = '<span class="text-dark">You have an active badge</span>';
                    
                        loadResponse(title, content);
                      
                       }
                    
                       if(user.verify_status == -2 && user.badge_status == 0) {
                    
                        const title = '<span class="text-success">Pending Verification</span>';
                        const content = '<span class="text-dark">Awaiting Admin Approval </span>';
                    
                        loadResponse(title, content);
                           
                     
                       }
                    
                       if(user.verify_status == 0 && user.badge_status == 0) {
                    
                          window.location.href = '/become';
                    
                    
                       }
                    
        

                });
            }

        })



        loadDashboard(user);
        document.getElementById('logout-link').addEventListener('click', () => {

            const auth = getToken();
        
            if(auth) {
        
            
        
                Swal.fire({
                  title: "Are you sure?",
                  text: "You won't be able to revert this!",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: '#ffb705',
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

            document.querySelectorAll('.js-img-tell').forEach((img) => {

                if(img) {

                    getProdProfileDescImg(user, img);

                }

            });

        
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

      //  console.log(selectedProduct);

       


       // Display product details if selectedProduct is available
       if (selectedProduct) {
          //       console.log(selectedProduct);

           displayProductDetails(selectedProduct);
         

        // const {id, verify_status, badge_status} = selectedProduct.user;

        const {id, verify_status, badge_status} = selectedProduct;


           if (id && verify_status == 1 && badge_status == 1) {
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
                
                   const userId = selectedProduct.user_id;
                 

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

            loadConnect(selectedProduct);   
        }

       });
   });


   function displayProductDetails(product) {

      const productCondition =  document.querySelector('.condition2');

       // Display product details in the UI

       //console.log(product);
       document.querySelector('.user_state').textContent = product.location;
    //    document.querySelector('.user_name2').textContent = product.user.name;
    document.querySelector('.user_name2').textContent = product.username;
       document.querySelector('.rate_value').textContent = product.avg_rating;
       document.querySelector('.sold3').textContent = 'sold ' + (product.sold || 0);
       document.querySelector('.stock2').textContent = product.quantity + ' in stock';
       //document.querySelector('.condition2').textContent = product.condition;
       document.querySelector('.condition2').textContent = formatProductCondition(product);

       formatProductCondition(product) === 'new' ? productCondition.classList.add('condition-new') :   productCondition.classList.add('condition2')


       document.querySelector('.description').textContent = product.description;
       document.querySelector('.product_name_on_sidebar').textContent = product.title;


       const carousel = document.getElementById('js-carousel-img');
        getProdProfileDescImg(product, carousel);

        // const {verify_status, badge_status, id, shop_token} = product.user
        const {verify_status, badge_status, user_id, shop_token, username} = product;
       const badgeElement = document.querySelector('.js-badge');
       badgeElement.src = verify_status == 1 && badge_status == 1 ? 'innocent/assets/image/badge.png' : '';

       const reviewEl = document.querySelector('.js-review');
       reviewEl.href = `/review/product?user=${user_id}&shop=${shop_token}`



       // For mobile view
       /*
       document.querySelector('.sold2').textContent = 'sold ' + (product.sold || 0);
       document.querySelector('.stock').textContent = product.quantity + ' in stock';
       document.querySelector('.condition').textContent = product.condition;
       document.querySelector('.user_state_mobile').textContent = product.location;
       */       

       const badge = verify_status == 1 && badge_status == 1 ? '<img src="innocent/assets/image/badge.png" alt="">' : '';

       const mobileHeader = `
         <div><img id="js-profile-mobile" src="" alt=".profile picture " class="user_photo"></div>
             <div class="user_name_area">
                 <p class="user_name">${product.username ?? 'No Data Provided'}</p>
     
                 <p class="location">
                     ${badge}
                     <span class="user_state_mobile">${product.location ?? 'No Data Provided'}</span>
                     <span class="rate">
                         <img src="innocent/assets/image/Rate.png" alt="">
                         <span class="rate_value">${product.avg_rating}</span>
                     </span>
                     <span><a class="review-link ps-2 text-success" href="/review/product?user=${user_id}&shop=${shop_token}">Reviews</a></span>
                 </p>
             </div>
             <div class="products_details_head">
                 <p class="sold2">
                  sold ${product.sold ?? 0}
                 </p>
     
                 <p class="stock">
                     ${product.quantity ?? 'No Data Provided'} in stock
                 </p>
     
                 <p class="condition">
                     ${formatProductCondition(product)}
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
            const promoPrice =  formatPrice(product.promo_price);
            const mainPrice =   formatPrice(product.actual_price);
            const showPromo = promoPrice === '0';

            const price = `
                         <p class="promo_price2">${promoPrice === '0' ? '' : '&#8358;' + promoPrice}</p>
                         <p class="${showPromo ? '' : 'main_price_check'} main_price2">${'&#8358;' + mainPrice}</p>`;

          document.querySelector('.js-price').innerHTML = price;



            
        //    document.querySelector('.promo_price2').innerHTML = '&#8358;' + (formatPrice(product.promo_price) || '');
        //    document.querySelector('.main_price2').innerHTML = '&#8358;' + ( formatPrice(product.actual_price) || '');
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

       const sanitizeString = (str) => {
        return str.replace(/'/g, "&#39;") // Escape single quotes
            .replace(/"/g, "&quot;") // Escape double quotes
            .replace(/\\/g, "&#92;") // Escape backslashes
            .replace(/\n/g, ' ') // Replace newlines with a space
            .replace(/\r/g, ' ') // Replace carriage returns with a space
            .replace(/\u2028/g, '&#8238;') // Escape line separator
            .replace(/\u2029/g, '&#8239;') // Escape paragraph separator
            .replace(/[\r\n]+/g, ' '); // Remove all \r\n sequences
    };
        
    const sanitizedProduct = {
        ...product,
        description: product.description ? sanitizeString(product.description) : ""
    };

    const jsonString = JSON.stringify(sanitizedProduct);
    const encodedJson = jsonString.replace(/"/g, '&quot;'); // Encode quotes for HTML attribute

       card.innerHTML = `
             <a href="/product_des" class="product_card_link" data-product='${encodedJson}'>
                 <div class="card product_card">
                     <h6 class="sold ${formatProductCondition(product) === 'new' ? 'new-product' : 'used-product'} ">${formatProductCondition(product)} <br> <img src="innocent/assets/image/Rate.png" alt=""> ${product.avg_rating || 0}</h6>
                     <img src="uploads/products/${product_img_url || 'default.jpg'}"  class="card-img-top w-100 product_image" alt="${product.title}">
                     <div class="product_card_title">
                         <div class="main_and_promo_price_area">
                            ${getIndexPrice(product)}
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

/*
function createProductCard(product) {
    const card = document.createElement('div');
    card.className = 'card';

    let product_img_url = '';
    JSON.parse(product.image_url).forEach((el, i) => {
        if (i === 0) product_img_url = el;
    });

    const { verify_status, badge_status } = product?.user ?? product;

    const badge = verify_status == 1 && badge_status == 1
        ? `<img class="logo-bag" src="kaz/images/badge.png" alt="">`
        : `<img src="innocent/assets/image/logo icon.svg" alt="">`;

        const sanitizeString = (str) => {
            return str.replace(/'/g, "&#39;") // Escape single quotes
                .replace(/"/g, "&quot;") // Escape double quotes
                .replace(/\\/g, "&#92;") // Escape backslashes
                .replace(/\n/g, ' ') // Replace newlines with a space
                .replace(/\r/g, ' ') // Replace carriage returns with a space
                .replace(/\u2028/g, '&#8238;') // Escape line separator
                .replace(/\u2029/g, '&#8239;') // Escape paragraph separator
                .replace(/[\r\n]+/g, ' '); // Remove all \r\n sequences
        };
        
    const sanitizedProduct = {
        ...product,
        description: product.description ? sanitizeString(product.description) : ""
    };

    const jsonString = JSON.stringify(sanitizedProduct);
    const encodedJson = jsonString.replace(/"/g, '&quot;'); // Encode quotes for HTML attribute

    card.innerHTML = `
        <a href="/product_des" class="product_card_link js-auth-card" data-product="${encodedJson}">
            <div class="card product_card">
                <h6 class="sold ${formatProductCondition(product) === 'new' ? 'new-product' : 'used-product'}">${formatProductCondition(product)} <br> <img src="innocent/assets/image/Rate.png" alt=""> ${product.avg_rating || 0}</h6> 
                <img src="uploads/products/${product_img_url || 'default.jpg'}" class="card-img-top w-100 product_image" alt="${product.title}">
                <div class="product_card_title">
                    <div class="main_and_promo_price_area">
                        ${getIndexPrice(product)}   
                    </div>

                    <p class="product_name">${product.title}</p>
                    <span class="product_card_location"><i class="fa-solid fa-location-dot"></i> ${product.location}</span>
                    ${badge}
                    <span class="connect"><strong>connect</strong></span>
                </div>
            </div>
        </a>
    `;

    card.querySelector('.product_card_link').addEventListener('click', function (event) {
        event.preventDefault();

        if (!token) {
            promptLogin();
            return;
        }

        const productData = this.getAttribute('data-product');
        try {
            const parsedData = JSON.parse(productData);
            console.log(parsedData);
            localStorage.setItem('selectedProduct', JSON.stringify(parsedData));
            window.location.href = this.href;
        } catch (error) {
            console.error('Error parsing JSON:', error);
        }
    });

    return card;
}

*/
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

   document.querySelector('.js-help-desc').addEventListener('click', (event) => {
    event.preventDefault();

    displayHelpCenter();

   });

   document.querySelector('.js-send-input').addEventListener('click', () => {
    
    const input = document.querySelector('.js-input2').value;

    if(input.trim() === '') {
        return;
    }

    sendProductRequest(input,token);


   });

   document.querySelector('.js-send-mobile').addEventListener('click', () => {

    const input = document.querySelector('.js-input-mobile').value;

    if(input.trim() === '') {
        return;
    }

    sendProductRequest(input, token);

   });


   const input = document.querySelector('.search-input');
   const btn = document.querySelector('.search');
 
   btn.addEventListener('click', () => {

       inputSearch()
 
 
   });

   input.addEventListener('keypress', (event) => {

    if(event.key === 'Enter') {
        inputSearch();
    }

   });


   function inputSearch() {

    
    const search_input = input.value;
     
    if(search_input.trim() === '') {
        
        Swal.fire({
            icon: 'error',
            title: 'Search',
            text: 'Please input a search parameter',
            confirmButtonColor: '#ffb705',
         });

         return


    }

    input.value = '';

    localStorage.setItem('input', search_input); 
    
    window.location.href = '/search';

   }
    

   function promptLogin(message) {
       Swal.fire({
           icon: 'error',
           confirmButtonColor: '#ffb705',
           title: 'Login Required',
           text: message
       }).then(() => {
           window.location.href = '/'; // Redirect to login page
       });
   }







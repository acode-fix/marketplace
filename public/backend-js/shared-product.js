import { getToken, getProdDesImage, getProdProfileDescImg, loadDashboard,logoutUser, getSingleImage, getBadge, getPrice, loadConnect } from "./helper/helper.js";

  const currentUrl = new URL(window.location.href);
  const id = currentUrl.searchParams.get('id');
  const shopToken = currentUrl.searchParams.get('check');

  axios.post('/api/product/shared', {
   id,
   shopToken
  }, {
    headers: {
      'Content-type': 'application/json',
    },

  }).then((response) => {
    //console.log(response)

    if(response.status === 200 && response.data) {

      const singleProduct = response.data.products.singleProduct;
      const otherProducts = response.data.products.otherProduct;

      loadCarousel(singleProduct);
      getCarouselImg(singleProduct);
      updateUserProfile();

      //console.log(singleProduct);
       const {verify_status, badge_status} = singleProduct.user;

      if(verify_status === 1 && badge_status === 1) {
         
        loadProducts(otherProducts);
        loadMobileProduct(otherProducts);

      } else  {
        const arrayProduct =[];
        arrayProduct.push(singleProduct);

        loadProducts(arrayProduct);
        loadMobileProduct(arrayProduct);

      }

   

    }

  }).catch((error) => {
    console.log(error);
    if(error.response) {

      if(error.response.status  === 404  && error.response.data) {

        Swal.fire({
          icon: 'error',
          title: 'Resources Unavailable',
          text: error.response.data.message,
      }).then(() => {
          window.location.href = '/';
      });


      }  
    }

  });


  function loadCarousel(product) {

   // console.log(product);

    const user = product.user;

    const badge = user.verify_status === 1 ? `<img src="/innocent/assets/image/badge.png" alt="">` : '';

    const img = getProdDesImage(product);


    const  carouselHeader = `
     <div class="user_info2">
          ${img}
          <p class="user_name2 ms-2">${user.username ?? 'No Username Provided'}<br>
              <span class="location2"> 
                   ${badge}
                  <i class="fa-solid fa-location-dot " style="font-size: 12px;"></i>
                  <span class="user_state">${product.location ?? 'No Location Provided'}</span>
                  <span class="rate">
                      <img src="/innocent/assets/image/Rate.png" alt="">
                      5.0
                  </span >
              </span>
               <span><a class="review-link js-link ps-2 text-success" href="">Reviews</a></span>
          </p> 
          <div class="close_product_des"><a href="{{ url('/') }}"><i class="fa-solid fa-close "></i></a></div>
      </div>
      
      <div class="products_details_head2">
          <p class="sold3">
              sold 10
          </p>
          
          <p class="stock2">
              ${product.quantity ?? ''} in stock
          </p>
          
          <p class="condition2">
              ${product.condition ?? ''}
          </p>
    </div>`;

    document.querySelector('.js-header').innerHTML = carouselHeader;


    //LOAD CAROUSEL CONTENT;

    const verifyStatus = user.verify_status === 1 ? ` <button  id="js-viewshop" class="product_card_veiw_shop_button" >
                  <a href="">view shop <img src="/innocent/assets/image/badge.png" alt="" ></a>  
                </button> ` : '';

  
    const content = `
    <p class="product_name_on_sidebar" > Buy Hp ${product.title ?? 'N/A'}</p>         
          <hr>
          <div class="main_and_promo_price_des_sidebar">
          ${
            product.ask_for_price
            ? '<p class="ask-for-price" style="color:red; padding-right: 2px; font-size:23px">Ask for price</p>'
            : `
                <p class="promo_price">$${product.promo_price || ''}</p>
                <div class="main_price"><p class="main_price_amount">$${product.actual_price || ''}</p></div>
            `
        }
            
          </div>
        
          <div>
              <span style="font-weight: bold;">Description</span>
              <p>
              ${product.description}
              </p>
          </div>
            <div class="connect_buttons">
                 ${verifyStatus}
                <button  class="product_card_connect_button js-connect-btn">
                    <a href="">connect <img src="/innocent/assets/image/Shopping bag.png" alt="" ></a> 
                </button>
            </div>
        </div>`;


    document.querySelector('.js-desc').innerHTML = content;

    if( document.getElementById('js-viewshop')) {

        document.getElementById('js-viewshop').addEventListener('click', (event) => {
          event.preventDefault();
          const auth = getToken();
          if(auth) {

          const userId = user.id;
          localStorage.setItem('userId', JSON.stringify(userId));

          window.location.href = '/sellers-shop';

          }

        });

    }

    const connectBtn = document.querySelector('.js-connect-btn');

    connectBtn.addEventListener('click', (event) => {
      event.preventDefault();

      const auth = getToken();

      if(auth) {

        loadConnect(product);

      }

    
      
      
    })

  
    const mobileImg = getProdDesImage(product);

    const mobileHeader = `
           ${mobileImg}
        <p class="user_name"><strong>${user.username ?? 'No Username Provided'}</strong><br>
            <span class="location">
                ${badge}
                <span>lagos,</span> 
                <span class="rate">
                    <img src="/innocent/assets/image/Rate.png" alt="">
                    5.0
                </span >
            </span>
             <span><a class="review-link js-link ps-2 text-success" href="">Reviews</a></span>
        </p> 
        <div class="products_details_head">
            <p class="sold2">
                sold 10
            </p>
            
            <p class="stock">
                ${product.quantity ?? 'N/A'} in stock
            </p>
            
            <p class="condition">
                ${product.condition ?? 'N/A'}
            </p>
     </div>`;

  
     document.querySelector('.js-user-info').innerHTML = mobileHeader;

     const reviewLinks = document.querySelectorAll('.js-link');

     reviewLinks.forEach((link) => {
      if(link) {
        link. addEventListener('click', (event) => {
          event.preventDefault();
    
          const token = localStorage.getItem('apiToken');

  
          if(!token) {

            getToken();
            
          } else {

            window.location.href = `/review/product?user=${user.id}&shop=${user.shop_token}`;
          }
         })
      }

     })
     
    

  }







  function getCarouselImg(product) {

    
    let images = JSON.parse(product.image_url)

    //console.log(images.length);

    let check = {};

    images.forEach((image, index) => {

      if(index === 0) {

        check['img_first'] = image;
      

      }
      if(index === 1) {

        check['img_second'] = image;
      

      }

      if(index === 2) {
        check['img_third'] = image;
      

      }

    
    });


    for (let field in check) {

      document.getElementById(`${field}`).src =  `/uploads/products/${check[field]}`;


    }

    if(!getCarouselImgLength(images)) {
      document.getElementById('img_second').style.display = 'block';
      
      document.getElementById('img_third').style.display = 'block';


    }
    

  }


  function getCarouselImgLength(images) {

    let isvalid = false;

    if(images.length < 2 ) {

     document.getElementById('img_second').style.display = 'none';

     isvalid = true;
    
      
    }

    if(images.length < 3 ) {

     

      document.getElementById('img_third').style.display = 'none';

      isvalid = true
    
      
    }


    return isvalid;

  }

 

  function updateUserProfile() {

   const imgDesk = document.getElementById('js-profile-desk');
   
   const token = localStorage.getItem('apiToken');

  // console.log(token);

  if(token) {
  
    axios.get('/api/v1/getuser', {
      headers : {
        'Authorization': `Bearer ${token}`
      }
    }).then((response) => {
      console.log(response);

      if(response.status === 200 && response.data) {

        const authData = response.data;

        loadDashboard(authData);
        getProdProfileDescImg(authData, imgDesk);

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
        

      }

    }).catch((error) => {
      console.log(error);

    })
  } else {

    const unAuthUser = null;

    loadDashboard(unAuthUser);
    getProdProfileDescImg(unAuthUser, imgDesk);



  }


  

   

  
  }


  function loadProducts(otherProducts) {

    //console.log(otherProducts); 

    let displayTopContent = '';
    let displayDownContent = '';

    otherProducts.forEach((product, index) => {

      //OBJECT DESTRUCTURING;
      const {image_url, title, location, id} = product;

    let  displayProduct = `
       <a href="" class="product_card_link js-id" data-product-id="${id}">
              <div class="card product_card">
                  <h6 class="sold"> Sold 7 <br> <img src="/innocent/assets/image/Rate.png" alt=""> 3.6</h6>
                  <img src="/uploads/products/${getSingleImage(image_url)}" class="card-img-top w-100 product_image" alt="...">
              
                  <div class="product_card_title">
                      <div class="main_and_promo_price_area">
                      ${
                       getPrice(product)
                    }
                      </div>
                      
                          
                          <p class="product_name">${title ?? 'N/A'}</p>
                          <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  ${location ?? 'N/A'}</span>
                          ${getBadge(product)}
                          <span class="connect"><strong>connect</strong></span>
                      
                  </div>
              </div>
        </a>`;

        if(index <= 6) {
           displayTopContent += displayProduct

        }else {
          displayDownContent += displayProduct
        }
    });


    document.querySelector('.js-desktop-card').innerHTML = displayTopContent;
    document.querySelector('.js-desktop-card-down').innerHTML = displayDownContent;


    const cardElements =  document.querySelectorAll('.js-id');

    getCardId(cardElements)



  }



  function getCardId(cards) {

      cards.forEach((card) => {

        card.addEventListener('click', (event) => {
          event.preventDefault();
            
          //Using object destructuring 
          const {productId} = card.dataset;

          const auth = getToken(); 

          if (auth) {

      
          //console.log(productId);

          axios.get(`/api/product-details/${productId}`, {
            headers: {
              'Content-type': 'application/json',
            }
          }).then((response) => {
            // console.log(response)
            
             if(response.status === 200 && response.data) {
             const product = response.data.product;

             loadCarousel(product);
             getCarouselImg(product);

             }
          }).catch((error) => {

           // console.log(error);

            if (error.response) {

              if (error.response.status === 400 && error.response.data) {

                Swal.fire({
                  icon: 'error',
                  title: 'Resources Unavailable',
                  text: error.response.data.message,
              }).then(() => {
                  window.location.href = '/';
              });
        

                

              }
            }

          });

        }

        })

      

      });

  }

 
  
function loadMobileProduct(products) {

  let displayTopContent = '';
  let displayDownContent = '';

  products.forEach((product, index) => {

    //OBJECT DESTRUCTURING;
    const {image_url, title, location,} = product;

  const  display = `
  <a href="#" class="product_card_link">
         <div class="card product_card">
             <h6 class="sold"> Sold 35 <br> <img src="/innocent/assets/image/Rate.png" alt=""> 4.0</h6>
             <img src="/uploads/products/${getSingleImage(image_url)}" class="card-img-top w-100 product_image" alt="...">
         
             <div class="product_card_title">
                 <div class="main_and_promo_price_area">
                     ${getPrice(product)}
                 </div>
                 <p class="product_name">${title}</p>
                 <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  ${location ?? 'N/A'}</span>
                 ${getBadge(product)}
                 <span class="connect"><strong>connect</strong></span>
                 
             </div>
         </div>
   </a>`;


   if(index <= 6) {
    displayTopContent += display;

   }else {
    displayDownContent += display;
   }

  })
  
 document.querySelector('.js-mobileCard-top').innerHTML = displayTopContent;
 document.querySelector('.js-mobileCard-down').innerHTML = displayDownContent;



  }




                                                                 
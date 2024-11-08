import { getToken, filter, getProdProfileDescImg, sendProductRequest,displayHelpCenter } from "./helper/helper.js";

const token = getToken();

if (token) {

 axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;


 
 axios.get('/api/v1/getuser').then((response) => {

  console.log(response);

  if(response.status === 200 && response.data) {

    const user = response.data;

     updateProductRequest(user);


  }

}).catch((error) => {

  console.log(error);

});



function updateProductRequest(user) {

const imgEl =  document.querySelector('.js-search-product-img');

getProdProfileDescImg(user, imgEl);


}

document.querySelector('.js-search-send').addEventListener('click', () => {

    
  const input = document.querySelector('.js-search-input').value;

  if(input.trim() === '') {
      return;
  }

  sendProductRequest(input, token);

});


document.querySelector('.js-help-search').addEventListener('click', (event) => {
  event.preventDefault();

  displayHelpCenter();

});






 const newButton = document.querySelector('.js-new');
 const used = document.querySelector('.js-used');
 const verifyElement = document.querySelector('.js-check');


 [newButton, used, verifyElement].forEach((button) => {

  if(button) {

    button.addEventListener('click', () => {
      
        const condition = button.dataset.filterValue;
     
        const locationElement = document.getElementById('clickMe');
        const verifyElement = document.querySelector('.js-check');
     
        const{location, verifyStatus}   =  filter(locationElement, verifyElement, );
     
        categoryFilter(location, verifyStatus, condition);
     
    })
  }

 })

  function categoryFilter(location, verifyStatus, condition) {

    // console.log(location);
    // console.log(verifyStatus);
    // console.log(condition);

    const url = new URL(window.location.href);
    const category = url.searchParams.get('category');
    
    axios.get('/api/v1/product/category-filter', {

      params: {
        location,
        verifyStatus,
        condition,
        category,
      }

    }).then((response) => {

      console.log(response);

      if(response.status === 200 && response.data) {

        const products = response.data.products;
        renderProducts(products);
      }

    }).catch((error) => {
      console.log(error);
    })



  }



  const products = JSON.parse(localStorage.getItem('allProducts'));
  const categoryName = localStorage.getItem('categoryName');
  const categoryTitle = document.getElementById('categoryTitle');
  const productCardDisplay1 = document.getElementById('productCardDisplay');
  const productCardDisplay2 = document.getElementById('productCardDisplay2');

  categoryTitle.innerText = categoryName;
  renderProducts(products);


  function renderProducts(products) {
     productCardDisplay1.innerHTML = ''; // Clear the container first
       productCardDisplay2.innerHTML = ''; // Clear the container first

       if(products.length === 0) {

         productCardDisplay1.innerHTML = '<p class="text-danger fs-5 text-center">Sorry, No match was found!!</p>';
         productCardDisplay2.innerHTML = '<p class="text-danger fs-5 text-center">Sorry, No match was found!!</p>'

       }


      products.forEach(function (product, index) {
          // Render product card
      const card = createProductCard(product);

          // Insert product into appropriate container
          if (index < 8) {
              productCardDisplay1.appendChild(card);
          } else {
              productCardDisplay2.appendChild(card);
          }

      });

  }

  function createProductCard(product) {
      const card = document.createElement('div');
      card.className = 'card';

      let product_img_url = '';
      JSON.parse(product.image_url).forEach((el, i) => {
          if (i === 0) product_img_url = el;
      });

      //console.log(product);

       const badge = product.user.verify_status === 1  ? `<img class="logo-bag" src="/kaz/images/badge.png" alt="">` : `<img src="/innocent/assets/image/logo icon.svg" alt="">`;

      card.innerHTML = `
          <a href="/product_des" class="product_card_link" data-product='${JSON.stringify(product)}'>
                          <div class="card product_card">
                              <h6 class="sold"> Sold ${product.sold || 0} <br> <img src="/innocent/assets/image/Rate.png" alt=""> ${product.avg_rating || 0}</h6>
                              <img src="/uploads/products/${product_img_url || 'default.jpg'}" class="card-img-top w-100 product_image" alt="${product.title}">
                              <div class="product_card_title">
                                  <div class="main_and_promo_price_area">
                                      ${
                                          product.ask_for_price
                                          ? '<p class="ask-for-price" style="color:red; padding-right: 2px; font-size:23px">Ask for price</p>'
                                          : `
                                              <p class="promo_price">$${product.promo_price || ''}</p>
                                              <div class="main_price"><p class="main_price_amount">$${product.actual_price || ''}</p></div>
                                          `
                                      }
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
          localStorage.setItem('selectedProduct', this.getAttribute('data-product'));
          window.location.href = this.href;
      });

      return card;
  }


}
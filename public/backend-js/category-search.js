import { getToken, filter, getProdProfileDescImg, sendProductRequest,displayHelpCenter, getIndexPrice,formatProductCondition, getStarted } from "./helper/helper.js";

const token = getToken();

if (token) {

 axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;


 
 axios.get('/api/v1/getuser').then((response) => {

 // console.log(response);

  if(response.status === 200 && response.data) {

    const user = response.data;

    const getEl = document.querySelector('.js-get-started');

     getStarted(user, getEl);



     updateProductRequest(user);


  }

}).catch((error) => {

//  console.log(error);

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


const newBtn = document.querySelector('.js-new');
const usedBtn = document.querySelector('.js-used');
const locations = document.querySelectorAll('.location');
const verified = document.querySelector('input[name="verify"]');

verified.addEventListener('change', () => {


  const filter = { verified: verified.checked}

  applyFilter(filter);

});

locations.forEach((location) => {

  location.addEventListener('click', () => {
      
   const value = document.querySelector(".locationInput").value ;

   const  filter ={ location : value.trim()};

   applyFilter(filter);


   
  })

});

newBtn.addEventListener('click',() => {

  

  newBtn.classList.toggle('newBtn');

 const newProducts = newBtn.dataset.value;

 const filter = {newProducts};


   applyFilter(filter);

});

usedBtn.addEventListener('click', () => {

  usedBtn.classList.toggle('usedBtn');

  const used = usedBtn.dataset.value;

  const filter = {used}

  applyFilter(filter);

});



function applyFilter(filter) {
  const url = new URL(window.location.href);
  const category = url.searchParams.get('category');
  
  axios.get('/api/v1/product/category-filter', {

    params: {
       filters : filter,
      category,
    }

  }).then((response) => {

     console.log(response);

    if(response.status === 200 && response.data) {

      const products = response.data.products;
      renderProducts(products);
    }

  }).catch((error) => {
 //   console.log(error);
  })
}




/*


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

   //   console.log(response);

      if(response.status === 200 && response.data) {

        const products = response.data.products;
        renderProducts(products);
      }

    }).catch((error) => {
   //   console.log(error);
    })



  }

*/

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
        // productCardDisplay2.innerHTML = '<p class="text-danger fs-5 text-center">Sorry, No match was found!!</p>'

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

       const badge = product.user.badge_status == 1 && product.user.verify_status == 1  ? `<img class="logo-bag" src="/kaz/images/badge.png" alt="">` : `<img src="/innocent/assets/image/logo icon.svg" alt="">`;

      card.innerHTML = `
          <a href="/product_des" class="product_card_link" data-product='${JSON.stringify(product)}'>
                          <div class="card product_card">
                              <h6 class="sold ${formatProductCondition(product) === 'new' ? 'new-product' : 'used-product'}">  ${formatProductCondition(product)} <br> <img src="/innocent/assets/image/Rate.png" alt=""> ${product.avg_rating || 0}</h6>
                              <img src="/uploads/products/${product_img_url || 'default.jpg'}" class="card-img-top w-100 product_image" alt="${product.title}">
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
          localStorage.setItem('selectedProduct', this.getAttribute('data-product'));
          window.location.href = this.href;
      });

      return card;
  }


}
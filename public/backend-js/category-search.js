import { getToken, filter, loadResponse, getProdProfileDescImg, sendProductRequest,displayHelpCenter, getIndexPrice,formatProductCondition, checkProfileReg,} from "./helper/helper.js";

const token = getToken();

if (token) {

 axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;


 
 axios.get('/api/v1/getuser').then((response) => {

 // console.log(response);

  if(response.status === 200 && response.data) {

    const user = response.data;

    const getEl = document.querySelector('.js-get-started');

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
            


            

          

        })

     updateProductRequest(user);
     loadCheckEl(user);


  }

}).catch((error) => {

//  console.log(error);

});

function loadCheckEl(user) {

  
const startSellingEl = document.querySelectorAll('.js-selling-check');

startSellingEl.forEach((start) => {

    if(start) {

      //console.log(start);

        start.addEventListener('click', (event) => {

            event.preventDefault();

            checkProfileReg(user);

            



        })
    }

});


}



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

  usedBtn.classList.remove('usedBtn');


 const newProducts = newBtn.dataset.value;

 const filter = {new: newProducts};


   applyFilter(filter);

});

usedBtn.addEventListener('click', () => {

  usedBtn.classList.toggle('usedBtn'); 


  newBtn.classList.remove('newBtn');


  const usedProduct = usedBtn.dataset.value;

  const filter = {used : usedProduct}

  applyFilter(filter);

});



function applyFilter(filter) {
  const url = new URL(window.location.href);
  const category = url.searchParams.get('category');
  
  axios.get('/api/v1/product/category-filter', {

    params: {
      filter,
      category,
    }

  }).then((response) => {

    // console.log(response);

    if(response.status === 200 && response.data) {

      const products = response.data.products;
      renderProducts(products);
    }

  }).catch((error) => {
 //   console.log(error);
  })
}


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
        
         productCardDisplay1.innerHTML =
        ` <div">
                    <p class="text-danger fs-6 ps-4">No Product listed in this region yet, will you like to list a product</p>
                    <a class="start-sell js-selling-check" href="">Start Selling</a>

                 </div>`;
        return;

       }


      products.forEach(function (product, index) {
          // Render product card
      const card = createProductCard(product);

          // Insert product into appropriate container
          if (index < 12 ) {
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
                              <h6 class="sold ${formatProductCondition(product) === 'new' ? 'new-product' : 'used-product'}">  ${formatProductCondition(product)}</h6>
                              <img src="/uploads/products/${product_img_url || 'default.jpg'}" class="card-img-top w-100 product_image" alt="${product.title}">
                              <div class="product_card_title">
                                 <div class="price-wrapper">
                                  <div class="main_and_promo_price_area">
                                      ${getIndexPrice(product)} 
                                  </div>
                                  <div class="rate-wrapper">
                                    <img src="/kaz/images/Rate.png" alt="" style="width: 20px; height: 20px;">
                                    <span class="avg-rate">${product.avg_rating || 0}</span>
                                  </div>
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
          // localStorage.setItem('selectedProduct', this.getAttribute('data-product'));
          // window.location.href = this.href;

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


}
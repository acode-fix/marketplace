import { getToken, getSingleImage, getBadge, getPrice, filter, getProdProfileDescImg, sendProductRequest, displayHelpCenter, getIndexPrice } from "./helper/helper.js";
import { serverError } from "./admin/auth-helper.js";

const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`

if(token) {


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





  document.querySelector('.js-search').addEventListener('click', () => {
    filterBySearchInput();
  
  });

  document.querySelector('.js-input').addEventListener('keypress', (event) => {

   if(event.key === 'Enter') {
    filterBySearchInput();
   }

  });



  function filterBySearchInput() {

    var input = document.getElementById("find-what-to-buy_search_page").value; 
    if (input === "") {
      var myModal = new bootstrap.Modal(document.getElementById('search_input_condition'));
      myModal.show();
    } else {
      
    
      document.getElementById("search_main").style.display="block";
      document.getElementById("search_container").style.display="none";
      document.getElementById("search_main").style.paddingTop="90px";
      document.getElementById("find-what-to-buy_search_page").value = '';

      const searchParams = input.trim();

      axios.get('/api/v1/search/products', {

        params: {
          searchParams
        }
        
      }).then((response) => {
       // console.log(response);

        if(response.status === 200 && response.data) {

            const data = response.data.products;

            //console.log(data);

            loadProducts(data);

          


        }

      }).catch((error)=> {
        
        console.log(error);

        if(error.response ) {

          if(error.response.status === 404 && error.response.data) {

            Swal.fire({
              icon: 'error',
              title: 'Product Search',
              confirmButtonColor: '#ffb705',
              text: error.response.data.message,
              willClose() {
                window.location.reload();
              }
          })


          }


          if(error.response.status === 500) {

            serverError();

          }
        }

      })
    }
  
  }


  function loadProducts(products) {

    let displayContent = '';
    let displayContent1 = '';

    if(products.length === 0) {

      const text = `<p class="text-danger fs-5 text-center">Sorry No Match Was Found!!<p/>`
      document.querySelector('.js-display').innerHTML =  text;


    } else{

  

    products.forEach((product, index) => {

      let contents = `
        <a href="/product_des" class="product_card_link">
            <div class="card product_card">
                <h6 class="sold"> Sold ${product.sold} <br> <img style="margin-bottom:4px;" src="innocent/assets/image/Rate.png"
                        alt=""> ${product.avg_rating}</h6>
                <img src="/uploads/products/${getSingleImage(product.image_url)}"
                    class="card-img-top w-100 product_image" alt="...">

                <div class="product_card_title">
                    <div class="main_and_promo_price_area">
                        ${getIndexPrice(product)}
                    </div>
                    <p class="product_name">${product.title}</p>
                    <span class="product_card_location"><i
                            class="fa-solid fa-location-dot"></i>${product.location}</span>
                    ${getBadge(product)}
                    <span class="connect"><strong>connect</strong></span>

                </div>
            </div>
        </a>`;

      if(index <= 6) {
        displayContent += contents;

      }else {
        displayContent1 += contents;

        
      }



    })

    document.querySelector('.js-display').innerHTML = displayContent;
    document.querySelector('.js-display2').innerHTML = displayContent1;

  }

  }


 document.querySelectorAll('.buttons').forEach((button) => {

  button.addEventListener('click', () => {
    document.getElementById("find-what-to-buy_search_page").value = button.textContent;
    document.getElementById("search_main").style.display="block"
    document.getElementById("search_container").style.display="none"
    document.getElementById("search_main").style.paddingTop="90px"

    filterBySearchInput();
                                           
  });

 });


 const newButton = document.querySelector('.js-new');
 const usedButton =  document.querySelector('.js-used');
 const verifyElement = document.querySelector('.js-check');

 [newButton, usedButton, verifyElement].forEach((button) => {

  if(button) {

    button.addEventListener('click', () => {
      
        const condition = button.dataset.filterValue;
     
        const locationElement = document.getElementById('clickMe');
        const verifyElement = document.querySelector('.js-check');
     
        const{location, verifyStatus}   =  filter(locationElement, verifyElement,);
     
        searchFilter(location, verifyStatus, condition);
     
    })
  }

 });


 const mobileNewBtn = document.querySelector('.js-new-mobile');
 const usedMobileBtn = document.querySelector('.js-used-mobile');
 const verifyMobileEl = document.querySelector('.js-check-mobile');

 [mobileNewBtn, usedMobileBtn, verifyMobileEl].forEach((button) => {

  if(button) {

    button.addEventListener('click', () => {
      
        const condition = button.dataset.filterValue;
     
        const locationElement = document.getElementById('clickMe2');
        const verifyElement = document.querySelector('.js-check-mobile');
     
        const{location, verifyStatus}   =  filter(locationElement, verifyElement,);
     
        searchFilter(location, verifyStatus, condition);
     
    })
  }


 });


  

  function searchFilter(location, verifyStatus, condition) {

    console.log(condition + location + verifyStatus)

    axios.get('/api/v1/product/filter', {
      params: {
        condition,
        location,
        verifyStatus,
      }
    }).then((response) => {
      
      if(response.status === 200 && response.data) {

        const products = response.data;

        loadProducts(products);

      }

    }).catch((error) => {
      
      if(error.response) {
        serverError();
      }

    })



  }







  

 
  
} 
import { getToken, getSingleImage, getBadge } from "./helper/helper.js";
import { serverError } from "./admin/auth-helper.js";

const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`

if(token) {

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

      const text = `<p class="text-danger fs-5">Sorry No Match Was Found!!<p/>`
      document.querySelector('.js-display').innerHTML =  text;


    } else{

  

    products.forEach((product, index) => {

      let contents = `
        <a href="/product_des" class="product_card_link">
            <div class="card product_card">
                <h6 class="sold"> Sold 35 <br> <img src="innocent/assets/image/Rate.png"
                        alt=""> 4.0</h6>
                <img src="/uploads/products/${getSingleImage(product.image_url)}"
                    class="card-img-top w-100 product_image" alt="...">

                <div class="product_card_title">
                    <div class="main_and_promo_price_area">
                        <p class="promo_price">$${product.promo_price}</p>
                        <div class="main_price">
                            <p class="main_price_amount">$${product.actual_price}</p>
                        </div>

                    </div>
                    <p class="product_name">$${product.title}</p>
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

  
 document.querySelectorAll('.js-button').forEach((button) => {

  button.addEventListener('click', () => {
  const buttonValue = button.dataset.filterValue;

   filter(buttonValue);
  });

  });

  const locationElement = document.getElementById('clickMe');
  const verifyElement = document.querySelector('.js-check');

  function filter(condition) {

    const locationText = locationElement ? locationElement.textContent : ' ';
    const verification = verifyElement ? verifyElement.checked : false;

    const location = locationText.trim();
    const verifyStatus = verification ? 1 : 0;

   // console.log(condition + location + verifyStatus)

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
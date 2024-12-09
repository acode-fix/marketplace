import { getToken, getSingleImage, getBadge, getPrice, filter, getProdProfileDescImg, sendProductRequest, displayHelpCenter, getIndexPrice, formatProductCondition, getStarted, checkProfileReg } from "./helper/helper.js";
import { serverError } from "./admin/auth-helper.js";

const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`

if(token) {

  axios.get('/api/v1/getuser').then((response) => {

   // console.log(response);

    if(response.status === 200 && response.data) {

      const user = response.data;

      const getEl = document.querySelector('.js-get-started');

      loadCheckEl(user);

      getStarted(user, getEl);

       updateProductRequest(user);


    }

  }).catch((error) => {

   // console.log(error);

  });

  function loadCheckEl(user) {

    const startSellingEl = document.querySelectorAll('.js-selling-check');
    
    startSellingEl.forEach((start) => {
    
        if(start) {
    
            start.addEventListener('click', (event) => {
    
                event.preventDefault();
    
                checkProfileReg(user);
    
                
    
    
    
            })
        }
    
    });
    
    }

  const indexSearchValue =  localStorage.getItem('input');
  const searchInput = document.getElementById('find-what-to-buy_search_page');

  searchInput.value = indexSearchValue;

  const searchParams = searchInput.value;

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



  axios.get('/api/v1/recent/search').then((response) => {

    console.log(response)

    const recentSearch =  response.data.searches;

    loadRecentSearch(recentSearch);



  }).catch((error) => {

    console.log(error);

  })
 
  function loadRecentSearch(recentSearch) {

    let display = '';

    recentSearch.forEach((recent) => {

      display += ` <button class="buttons" >${recent.query}</button>`

    });

    document.querySelector('.js-recent-content').innerHTML = display;

    
 document.querySelectorAll('.buttons').forEach((button) => {

  button.addEventListener('click', () => {
    document.getElementById("find-what-to-buy_search_page").value = button.textContent;
    document.getElementById("search_main").style.display="block"
    document.getElementById("search_container").style.display="none"
    document.getElementById("search_main").style.paddingTop="90px"

    filterBySearchInput();
                                           
  });

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

      localStorage.setItem('input', input);
      window.location.reload();


    /*
      document.getElementById("search_main").style.display="block";
      document.getElementById("search_container").style.display="none";
      document.getElementById("search_main").style.paddingTop="90px";
     // document.getElementById("find-what-to-buy_search_page").value = '';

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

      */
    }
  
  }


  function loadProducts(products) {

    
    let displayContent = '';
    let displayContent1 = '';

    if(products.length == 0) {

      document.querySelector('.filter-result').style.display = 'block';
      document.querySelector('.js-display2').innerHTML =  '';

      

      return;



    } else {
      document.querySelector('.filter-result').style.display = 'none';

    }

  

    products.forEach((product, index) => {

      let contents = `
        <a href="/product_des" class="product_card_link">
            <div class="card product_card">
                <h6 class="sold ${formatProductCondition(product) === 'new' ? 'new-product' : 'used-product'} "> ${formatProductCondition(product)} <br> <img style="margin-bottom:4px;" src="innocent/assets/image/Rate.png"
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


  const newBtns = document.querySelectorAll('.js-new');
  const usedBtns = document.querySelectorAll('.js-used');
  const locations = document.querySelectorAll('.location');
  const verifieds = document.querySelectorAll('input[name="verify"]');
  const locationsMobile = document.querySelectorAll('.location-mobile');

  newBtns.forEach((newBtn) => {

   
    if(newBtn) {

        newBtn.addEventListener('click', () => {

        const newValue = newBtn.dataset.value;
      //  newBtns.forEach((btn) => btn.classList.remove('new2'));
        newBtn.classList.toggle('new2'); 

        // Reset all usedBtns
        usedBtns.forEach((usedBtn) => usedBtn.classList.remove('used2'));

        const filters = {
           search: searchParams,
           new: newValue,
    
        }
    
        document.querySelector('.js-display').innerHTML = '';
        document.querySelector('.js-display2').innerHTML = '';
        applyFilter(filters);
       
       
    
      });

    }

  });

  usedBtns.forEach((usedBtn) => {

    if(usedBtn) {
      usedBtn.addEventListener('click', () => {

        const usedValue = usedBtn.dataset.value;
       // usedBtns.forEach((btn) => btn.classList.remove('used2'));
        usedBtn.classList.toggle('used2'); 

        // Reset all newBtns
        newBtns.forEach((newBtn) => newBtn.classList.remove('new2'));


        const filters = {
          search: searchParams,
          used: usedValue,
        }
    

        document.querySelector('.js-display').innerHTML = '';
        document.querySelector('.js-display2').innerHTML = '';

        applyFilter(filters);
        
       
      });
    }

  });

  verifieds.forEach((verified) => {
    if(verified) {

      verified.addEventListener('click', () => {

        if(!verified.checked) {

          document.querySelector('.filter-result').style.display = 'none';
          document.querySelector('.js-display').innerHTML = '';
          document.querySelector('.js-display2').innerHTML = '';

          

        }

        const filters = {
          search: searchParams,
          verified: verified.checked,
        }
    
        //console.log(filters)
    
        applyFilter(filters);
       
    
    
      });

    }
  });

  locations.forEach((location) => {

    location.addEventListener('click', () => {

      
     const value = document.querySelector(".locationInput").value;

     const filters = {
      search: searchParams,
      location: value.trim(),
     }


   //  console.log(filters);
     applyFilter(filters)
     document.querySelector('.js-display').innerHTML = '';
     document.querySelector('.js-display2').innerHTML = '';

    })

    



  });

  locationsMobile.forEach((location) => {

    location.addEventListener('click', () => {

      
     const value = document.querySelector(".locationInput2").value;

     const filters = {
      search: searchParams,
      location: value.trim(),
     }


   //  console.log(filters);
     applyFilter(filters)
     document.querySelector('.js-display').innerHTML = '';
     document.querySelector('.js-display2').innerHTML = '';

    })

    



  });

  

  function applyFilter(filters) {
    
       axios.get('/api/v1/product/search/filter', {params:filters}).then((response) => {

        console.log(response);

        const products = response.data.newProducts;

        loadProducts(products);


       }).catch((error) => {

        console.log(error);

       })

  }









  

 
  
} 
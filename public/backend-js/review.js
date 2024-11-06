import { getDropDownImg, getToken, loadName, loadSidebar, logoutUser,generateAvatar, getSingleImage, getDate, loadAvgStars } from "./helper/helper.js";

const token = getToken();
if(token) {

  axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

  const url = new URL(window.location.href);
  const id = url.searchParams.get('user');
  const shopToken = url.searchParams.get('shop');

  //console.log(id);
  //console.log(shopToken);

  axios.get('/api/v1/user/review', {
     params: {
      user_id: id,
      shop_token: shopToken,
     }

  }).then((response) => {

    console.log(response)

    if(response.status === 200 && response.data) {

      const products = response.data.user;
      const avgRating = response.data.avgRating;
      const totalReview = response.data.totalReview;
      const progress = response.data.rate;
      const reviewDetails = response.data.productReviews;
      const percentChange = response.data.percentChange;

    
  

      authUser();
      getProducts(products,avgRating);
      loadDashboardRating(avgRating, totalReview, percentChange)
      loadProgressBar(progress);
      loadReviewContent(reviewDetails);
  
      

    }

  }).catch((error) => {
    console.log(error);

    if(error.response) {
      
    }

  });


  function authUser() {

    axios.get('/api/v1/getuser').then((response) => {
      console.log(response)

      const authUser = response.data;

      updateAuthUser(authUser);

    }).catch((error) => {

      console.log(error);

    })
  }

  function  updateAuthUser(authUser) {

    const{name, email, photo_url} = authUser;

    
   const userName = loadName(name,email);

   document.querySelector('.js-name').innerHTML = userName;

   const dropDown = getDropDownImg(photo_url,email, name);

    document.querySelector('.js-profile-dropdown').innerHTML = dropDown;

    const profileDropdownBtn = document.getElementById('profileDropdownBtn');
    const dropdownMenu = document.getElementById('dropdownMenu');
    
      profileDropdownBtn.addEventListener('click', function () {
        dropdownMenu.classList.toggle('show');
    
    
      // Close the dropdown if the user clicks outside of it
      window.addEventListener('click', function (event) {
        if (!event.target.matches('#profileDropdownBtn')) {
          if (dropdownMenu.classList.contains('show')) {
            dropdownMenu.classList.remove('show');
          }
        }
      });
    });


    const logOut = document.getElementById('log-out');
    
    getLogOutElement(logOut);



  }






  function getProducts(products, avgRating) {

      // Extract user data from products
    const data = Array.isArray(products) ? products[0] : products;

    console.log(data);
    

  
    const{email, photo_url} = data?.user ?? data;

    const userData = Array.isArray(data) ? data.user : products;

     // Update sidebar with user data
   const display =  loadSidebar(userData);


    document.querySelector('.test').innerHTML = display;

    const sidebarPicElement = document.querySelector('.sidebar-pic');

    photo_url
     ? sidebarPicElement.src = `/uploads/users/${photo_url}` 
     : sidebarPicElement.src = `${generateAvatar(email)}`;


     const starEl = document.querySelector('.js-stars');

     loadSideBarRatings(starEl, avgRating);

   

    
  }

  

  function loadDashboardRating(avgRating, allReview, percentChange) {

   // const totalReview = document.querySelector('.js-total-review');
    const starDisplay =  document.querySelector('.js-avg-rating');

    // totalReview.textContent = allReview;

     const total = Math.floor(avgRating); 

      if(total > 0) {

        let stars = '';

        for(let i = 0; i < total; i++) {
       
         stars += `<img width="10px" src="/kaz/images/Rate.png" alt="">`;
 
        }

      const avgDisplay = ` 
       <h6 class="no-text">${total}</h6>
          <div class="ms-2">
            ${stars}
         </div>`;

       starDisplay.innerHTML = avgDisplay;

      } else {

        starDisplay.innerHTML = `<p class="no-rating">No ratings yet</p>`;
      }



  const validatPercent = Math.sign(percentChange);


   const  percetValue =   validatPercent === 1 ||  validatPercent === 0 
                   ?  `<div class="arrow-up ms-1  js-arrow"> <i class="fa-solid fa-arrow-up"></i><span>${percentChange}%</span></div>`
                   : `  <div class="arrow-up ms-1 mobile-text1 js-arrow "> <i class="fa-solid fa-arrow-down"></i><span>${percentChange}%</span></div>`;


    const totalReview = `
      <h6 class="fw-light ">Total Reviews</h6>
          <div class="mt-3" style="display: flex;align-items: center;">
            <h6 class="no-text js-total-review">${allReview}</h6>
            ${percetValue}
          </div>
        <h6 class="fw-light rate-break mt-2">Growth in review</h6>`


  document.querySelector('.js-total').innerHTML = totalReview;






  }


  function loadProgressBar(progress) {
  
    const progressArray = [];

    for (let i = 1; i <= 5; i++) {

      progressArray.push(progress[i]);

    }

  const total = progressArray.reduce((start, sum) => {

    return start + sum;

  },0);


  //console.log(total);
  

    const displayProgress = `<div class="progress-5">
                <div style="display: flex;">
                  <div class="rate-layout">
                    <img width="10px" src="/kaz/images/Rate.png" alt="">
                    <h6 class="ps-2 rate-no">5</h6>
                  </div>
                  <div class="rate-layout">
                    <div style="height: 8px; width: 200px;" class="progress ms-2">
                      <div class="progress-bar  progress-bar-striped progress-bar-animated bg-success"
                        style="width: ${(progress[5] / total ) * 100}%;"></div>
                    </div>
                    <h6 class="ms-2 rate-no">${progress[5] ?? 0}</h6>
                  </div>
                </div>

              </div>
               
              <div class="progress-4">
                <div  style="display: flex;">
                  <div class="rate-layout ">
                    <img width="10px" src="/kaz/images/Rate.png" alt="">
                    <h6 class="ps-2 rate-no">4</h6>
                  </div>
                  <div class="rate-layout">
                    <div style="height: 8px; width: 200px;" class="progress ms-2">
                      <div class="progress-bar  progress-bar-striped progress-bar-animated bg-primary"
                        style="width: ${(progress[4] / total ) * 100}%;"></div>
                    </div>
                    <h6 class="ms-2 rate-no">${progress[4] ?? 0}</h6>
                  </div>
                </div>

              </div>
              <div class="progress-3">
                <div class="" style="display: flex;">
                  <div class="rate-layout ">
                    <img width="10px" src="/kaz/images/Rate.png" alt="">
                    <h6 class="ps-2 rate-no">3</h6>
                  </div>  
                  <div class="rate-layout">
                    <div style="height: 8px; width: 200px;" class="progress ms-2">
                      <div class="progress-bar  progress-bar-striped progress-bar-animated bg-warning"
                        style="width: ${(progress[3] / total ) * 100}%;"></div>
                    </div>
                    <h6 class="ms-2 rate-no">${progress[3] ?? 0}</h6>
                  </div>
                </div>

              </div>
              <div class="progress-2">
                <div class="" style="display: flex;">
                  <div class="rate-layout ">
                    <img width="10px" src="/kaz/images/Rate.png" alt="">
                    <h6 class="ps-2 rate-no">2</h6>
                  </div>
                  <div class="rate-layout">
                    <div style="height: 8px; width: 200px;" class="progress ms-2">
                      <div class="progress-bar  progress-bar-striped progress-bar-animated bg-danger"
                        style="width: ${(progress[2] / total ) * 100}%;"></div>
                    </div>
                    <h6 class="ms-2 rate-no">${progress[2] ?? 0}</h6>
                  </div>
                </div>
                
              </div>

              <div class="progress-1">
                <div class="" style="display: flex;">
                  <div class="rate-layout ">
                    <img width="10px" src="/kaz/images/Rate.png" alt="">
                    <h6 class="ps-2 rate-no"> 1</h6>
                  </div>
                  <div class="rate-layout">
                    <div style="height: 8px; width: 200px;" class="progress ms-2">
                      <div class="progress-bar  progress-bar-striped progress-bar-animated bg-dark" style="width: ${(progress[1] / total ) * 100}%;">
                      </div>
                    </div>
                    <h6 class="ms-2 rate-no">${progress[1] ?? 0}</h6>
                  </div>
                </div> 

              </div>
               <h6 class="fw-light rate-break mt-1">Rating breakdown over the years</h6>`;


  document.querySelector('.js-break-down').innerHTML = displayProgress;


  }










  function loadSideBarRatings(sideBarStars, avgRating) {

  const stars =  loadAvgStars(avgRating);

   sideBarStars.innerHTML = stars;


  }



  function getLogOutElement(logOut) {

    logOut.addEventListener('click', (event) => {
      event.preventDefault();
  
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
      
  
    });
  }


  function  loadReviewContent(products){

      let content = ``

    products.forEach((product) => {

     

      product.reviews.forEach((review) => {

        const reviewerName = review.user.name;
        const reviewerLocation = review.user.location;
        const reviewerPhoto = review.user.photo_url; 
        const reviewerEmail = review.user.email; 
        const stars = generateStars(review.rate);      

        const img = reviewerPhoto
        ? `<img  class="img-fluid  js-profile" src="/uploads/users/${reviewerPhoto}" alt="" >`
        : `<img  class="img-fluid js-profile" src="${generateAvatar(reviewerEmail)}" alt="" >`;
      

        content += `<div class="row">
        <div class="col-11 mt-5">
          <hr class="underline">
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-4 ms-5 ">
          <div style="display: flex;align-items: center;">
            ${img}
            <div class="ms-3">
              <h6 class="benson">${reviewerName ?? 'N/A'}</h6>
              <div style="display: flex;">
                <img width="10px" height="18px" src="/kaz/images/location.svg" alt="">
                <h6 class="fw-light ms-1 lagos">${reviewerLocation ?? 'N/A'}, Nigeria</h6>
              </div>
            </div>

          </div>

        </div>
        <div class="col">
          <div class="mt-2" style="display: flex;align-items: center;">
            <div>
             ${stars}
            </div>
            <h6 class="rate-four ps-2 js-avg-rate">(${review.rate})</h6>
            <h6 class="rate-four ps-2 ">${getDate(review.created_at)}</h6>

          </div>
          <p class="rate-four mt-2 fw-light">${review.comment}.</p>
        </div>
        <div class="col">
          <img width="60px" src="/uploads/products/${getSingleImage(product.image_url)}" alt="">
        </div>
      </div>`;


      });

      

    });

    document.querySelector('.js-review-test').innerHTML = content;

    


  


  
   
     
   

  }



  function generateStars(rating) {
    let stars = '';
    for (let i = 0; i < rating; i++) {
        stars += `<img width="10px" src="/kaz/images/Rate.png" alt="">`;
    }
    return stars;
}
  


 


  

  
  

















}
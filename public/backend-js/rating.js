import {getToken, generateAvatar,getSingleImage, logoutUser} from './helper/helper.js';
import { serverError } from './admin/auth-helper.js';

const token = getToken();

if(token) {

  axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

  const url = new URL(window.location.href);
  const userId = url.searchParams.get('user');
  const productId = url.searchParams.get('product');
  const shopToken = url.searchParams.get('shop');

  axios.get('/api/v1/user/rating-page', {
    params: {
      userId,
      productId,
      shopToken,

    }
  }).then((response) => {
    console.log(response);

    const data = response.data.products.user;

    updateUserProfile(data);
    loadContent(response.data.products)

  }).catch((error) => {

    console.log(error);

    if(error.response) {

      if(error.response.status === 422 && error.response.data)  {

        Swal.fire({
          icon: 'error',
          title: 'Access Denied',
          text: 'Invalid Credentials',
          willClose: function() {
              window.location.href = '/';
           }
      });

      }

      if(error.response.status === 404 && error.response.data) {

        Swal.fire({
          icon: 'error',
          title: 'Products Rating',
          text: 'Products Details Not Available',
          willClose: function() {
              window.location.href = '/';
           }
      });



      }
    }


  });



  function updateUserProfile(data) {
    const{name, email, photo_url} = data;

    const userName = `
         <h6 class="name">${name ?? 'No Name Provided'}</h6>
        <h6 class="mired-text fw-light ps-4">${email ?? 'No Email Provided'}</h6>
        `;

   document.querySelector('.js-name').innerHTML = userName;

   const img = photo_url 
    ? `<img  class="img-fluid  js-profile" src="/uploads/users/${photo_url}" alt="" id="profileDropdownBtn">`
    : `<img  class="img-fluid js-profile" src="${generateAvatar(email)}" alt="" id="profileDropdownBtn">`;

  const dropDownImg = photo_url 
    ? `<img id="profile_image" class="js-profile"   src="/uploads/users/${photo_url}" alt="">` 
    : ` <img id="profile_image" class="js-profile"  src="${generateAvatar(email)}" alt="">`;

   const dropDown = `
               ${img}
              <div class="dropdown-menu" id="dropdownMenu">
                <div class="container drop-struct">
                  ${dropDownImg}
                  <div class="ms-2 pt-1">
                    <h6>${name ?? 'No Name Provided'}</h6>
                    <h6 style="font-size: small;">${email ?? 'No Email Provided'}</h6>
                  </div>
                </div>
                <hr style="background-color: black; margin-left: 10px;margin-right: 10px;">
                <div style="margin-top: -9px;">
                  <a href="/settings">Dashboard</a>
                  <a href="/refer">Refer A Friend</a>
                  <a href="/privacy">Privacy Policy</a>
                  <a id="log-out" href="#">Log Out</a>

                </div>

              </div>`;

    document.querySelector('.js-profile-dropdown').innerHTML = dropDown;

    const logOut = document.getElementById('log-out');

    getLogOutElement(logOut);


    
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
    
  }

  function loadContent(product) {

    const {photo_url, email, name} = product.user;
    

    const img = photo_url 
            ? `<img  class="img-content" src="/uploads/users/${photo_url}" alt="">` 
            : `<img  class="img-content" src="${generateAvatar(email)}" alt="">`;

    const productContent = `
          <div class="structure-m2 card-body pt-2">
                  ${img}        
                  <div class="ps-2">
                    <h6 style="font-size: small;" class="pt-1">${name ?? 'No Data Provided'}</h6>
                    <img width="9px" src="/kaz/images/location.svg" alt="">
                    <span style="font-size: small;" class="ps-1">${product.location ?? 'N/A'}</span>
                  </div>
                </div>
                <div>
                  <img class="tab" src="/uploads/products/${getSingleImage(product.image_url)}" alt="">
          </div>`;


    document.querySelector('.js-review').innerHTML = productContent;

    loadMobileContent(img,name,product)

  }


  function loadMobileContent(img,name,product) {

    const mobile = `
       <div class="mobile-st">
              ${img}
              <div class="ps-3">
                <h6 style="font-size: small;" class="pt-1">${name ?? 'No Data Provided'}</h6>
                <img width="9px" src="/kaz/images/location.svg" alt="">
                <span style="font-size: small;" class="ps-1">${product.location ?? 'N/A'}</span>
              </div>

            </div>
            <div class="mt-2">
              <img class="tab" src="/uploads/products/${getSingleImage(product.image_url)}" alt="">
       </div>`;

       document.querySelector('.js-mobile').innerHTML = mobile;


  }
  

const text = document.querySelector('.js-input');
 text.addEventListener('input', () => {

    document.querySelector('.js-comment').style.display = 'none';
 });

 document.getElementById('submit').addEventListener('click', (event) => {

  event.preventDefault();

  const rating = document.getElementById('rating');

  const prefix = 'error';

 const errors = validation(rating, text, prefix);

  if(errors.length === 0) {

    const reviewForm = document.getElementById('review-form');

    submitForm(reviewForm);
  }

});

 document.getElementById('submit2').addEventListener('click', (event) => {

  event.preventDefault();

  const rating = document.getElementById('rating');
  const text = document.querySelector('.mobile-text');

  const prefix = `mobileErr`;

   const errors = validation(rating, text, prefix);

   //console.log(errors);

 if(errors.length === 0) {

  const mobileForm = document.getElementById('mobile-review');

  submitForm(mobileForm);


 }



 });

 function validation(rating, text, prefix) {

  let errors = [];

  if(rating.value == 0) {

    errors.push({'field':'rating', 'message':'*Rating Field is Required*'});

  }

  const input = text ? text.value.trim() : '';

  if(input === '' || input.length > 400) {
    errors.push({'field':'comment', 'message':'*Comment Field Is Required && max-char is 400*'}) ;
  }

  errors.forEach((error) => { 
    document.querySelector(`.${prefix}-${error.field}`).innerHTML = error.message;
  });


  return errors;





  

 }

 function submitForm(reviewForm) {

  const formData = new FormData(reviewForm);

  const url = new URL(window.location.href);
  const userId = url.searchParams.get('user');
  const productId = url.searchParams.get('product');

    formData.append('user_id', userId);
    formData.append('product_id', productId);

 console.log([...formData]);

  axios.post('/api/v1/user/rating-details',
   formData, {
    headers: {
      'Content-type': 'multipart/form-data',


    }
  }).then((response) => {
    console.log(response);

    if(response.status === 200 && response.data) {
      Swal.fire({
        icon: 'success',
        title: 'Product Rating/Review',
        text: 'Thank You For Rating This Product',
        willClose() {
          window.location.href = '/';
        }
      });

    }

  }).catch((error) => {
    console.log(error);

    if(error.response) {

      if(error.response.status === 422 && error.response.data) {

        Swal.fire({
          icon: 'error',
          title: 'Validation Error',
          text: error.response.data.message,
        });


      }

      if(error.response.status === 404 && error.response.data) {

        Swal.fire({
          icon: 'error',
          title: 'Notification Error',
          text: error.response.data.message,
        });



      }


      if (error.response.status === 500 && error.response.data) {

        serverError();



      }




    }


  })

 }


const desktopNo =  document.querySelector('.js-no');
const mobileNo = document.querySelector('.js-mobile-no');

[desktopNo, mobileNo].forEach((noBtn) => {

  if(noBtn) {

    noBtn.addEventListener('click', (event) => {

      event.preventDefault();
    
    
          Swal.fire({
            title: "Are you sure?",
            text: "This means you are not rating the product",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes,I am sure!"
            }).then((result) => {
            if (result.isConfirmed) {
    
              readNotification();
              
              
            }
        });
    
    
      
    
        
    
          
    
    })
    


  }

})

function readNotification() {

    const url = new URL(window.location.href);
    const notificationId = url.searchParams.get('user');
    const productId = url.searchParams.get('product');

      axios.post('/api/v1/user/update/notification', 
        { notificationId, productId },
    ).then((response) => {
        console.log(response);

        if(response.status === 200 && response.data) {

          window.location.href = '/'
            
        }
    }).catch((error) => {
        console.log(error);
        if(error.response) {

          if(error.response.status === 422 && error.response.data) {

            Swal.fire({
              icon: 'error',
              title: 'Validation Error',
              text: error.response.data.message,
            });
  
  
          }
        
          }


          if(error.response.status === 500) {

            serverError();
          }
    });


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


document.getElementById('nav-logOut').addEventListener('click', (event) => {
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
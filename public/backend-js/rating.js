import {getToken, generateAvatar,getSingleImage, logoutUser, loadName, getDropDownImg} from './helper/helper.js';
import { serverError } from './admin/auth-helper.js';
import { checkUserSettingStatus } from './user/user-setting-status.js';

checkUserSettingStatus();
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
   // console.log(response);

    const data = response.data.user;

    updateUserProfile(data);
    loadContent(response.data.products)

  }).catch((error) => {

    console.log(error);

    if(error.response) {

      if(error.response.status === 422 && error.response.data)  {

        const responseErrors = error.response.data.errors;
           

            let allErrors = []

            for(let field in responseErrors) {

            const fieldError = responseErrors[field];

            fieldError.forEach((message) => {
                allErrors.push(message);

            })
            }

      const errorMsg = allErrors.join('\n');

      Swal.fire({ 
        icon: 'error',
        confirmButtonColor: '#ffb705',
        title: 'Validation Error',
        text:  errorMsg ,
    });


      //   Swal.fire({
      //     icon: 'error',
      //     title: 'Access Denied',
      //     text: 'Invalid Credentials',
      //     confirmButtonColor: '#ffb705',
      //     willClose: function() {
      //         window.location.href = '/';
      //      }
      // });

      }

      if(error.response.status === 404 && error.response.data) {

        Swal.fire({
          icon: 'error',
          title: 'Products Rating',
          text: 'Products Details Not Available',
          confirmButtonColor: '#ffb705',
          willClose: function() {
              window.location.href = '/';
           }
      });



      }
    }


  });



  function updateUserProfile(data) {
    const{username, email, photo_url} = data;



   const userName = loadName(username,email);

   document.querySelector('.js-name').innerHTML = userName;


   const dropDown = getDropDownImg(photo_url,email);

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

    const {photo_url, email, username} = product.user;
    

   const img = photo_url 
           ? `<img  style="height:40px; width:40px" class="img-content" src="/uploads/users/${photo_url}" alt="">` 
           : `<img  style="height:40px; width:40px"  class="img-content" src="${generateAvatar(email)}" alt="">`;

    const productContent = `
          <div class="structure-m2 card-body pt-2">
                  ${img}        
                  <div class="ps-2">
                    <h6 style="font-size: small;" class="pt-1">${username ?? 'No Data Provided'}</h6>
                    <img width="9px" src="/kaz/images/location.svg" alt="">
                    <span style="font-size: small;" class="ps-1">${product.location ?? 'N/A'}</span>
                  </div>
                </div>
                <div>
                  <img class="tab" src="/uploads/products/${getSingleImage(product.image_url)}" alt="">
          </div>`;


    document.querySelector('.js-review').innerHTML = productContent;

    loadMobileContent(img,username,product)

  }


  function loadMobileContent(img,username,product) {

    const mobile = `
       <div class="mobile-st">
              ${img}
              <div class="ps-3">
                <h6 style="font-size: small;" class="pt-1">${username ?? 'No Data Provided'}</h6>
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

  const rating = document.getElementById('mobile-rating');
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

//   console.log([...formData]);



  const url = new URL(window.location.href);
  const userId = url.searchParams.get('user');
  const productId = url.searchParams.get('product');

    formData.append('user_id', userId);
    formData.append('product_id', productId);

 //console.log([...formData]);

  axios.post('/api/v1/user/rating-details',
   formData, {
    headers: {
      'Content-type': 'multipart/form-data',


    }
  }).then((response) => {
   // console.log(response);

    if(response.status === 200 && response.data) {
      Swal.fire({
        icon: 'success',
        title: 'Product Rating/Review',
        text: 'Thank You For Rating This Product',
        confirmButtonColor: '#ffb705',
        willClose() {
          window.location.href = '/';
        }
      });

    }

  }).catch((error) => {
//    console.log(error);

    if(error.response) {

      if(error.response.status === 422 && error.response.data) {

        Swal.fire({
          icon: 'error',
          title: 'Validation Error',
          confirmButtonColor: '#ffb705',
          text: error.response.data.message,
        });


      }

      if(error.response.status === 404 && error.response.data) {

        Swal.fire({
          icon: 'error',
          title: 'Notification Error',
          confirmButtonColor: '#ffb705',
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
            confirmButtonColor: '#ffb705',
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
      //  console.log(response);

        if(response.status === 200 && response.data) {

          window.location.href = '/'
            
        }
    }).catch((error) => {
     //   console.log(error);
        if(error.response) {

          if(error.response.status === 422 && error.response.data) {

            Swal.fire({
              icon: 'error',
              title: 'Validation Error',
              confirmButtonColor: '#ffb705',
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
      confirmButtonColor: '#ffb705',
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
    confirmButtonColor: '#ffb705',
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes,I am sure!"
    }).then((result) => {
    if (result.isConfirmed) {
      logoutUser();
      
    }
});


});











}
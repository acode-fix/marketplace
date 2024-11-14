import dayjs from 'https://unpkg.com/dayjs@1.11.10/esm/index.js';



export function validationError(responseErrors) {

  let allErrors = [];

  for (let field in responseErrors) {

    const fieldErrors = responseErrors[field];

    fieldErrors.forEach((message) => {

    allErrors.push(message);

    })


  }
 const errorMsg = allErrors.join('\n');

return  errorMsg;

}

export function displaySwal(errorMsg) {

    Swal.fire({
      icon: 'error',
      confirmButtonColor: '#ffb705',
      title: 'Validation Error',
      text: errorMsg,
  });
  


}


export function getToken () {

 const token = localStorage.getItem('apiToken')

if(!token) {

    Swal.fire({
    icon: 'error',
    title: 'Login Required',
    text: 'Please log in to continue.',
    confirmButtonColor: '#ffb705',
}).then(() => {

    window.location.href = '/'; 
    
});

return false

} else {

  return token;
}

}

export  function promptLogin() {
  let myModal = bootstrap.Modal.getInstance(document.querySelector('#signup_login-modal')) || 
    new bootstrap.Modal(document.querySelector('#signup_login-modal'));

    myModal.show();
}


export function generateAvatar(email) {

  // Extract first two letters from the email
  const initials = email.slice(0, 2).toUpperCase();

  // Create canvas element to draw initials
  const canvas = document.createElement('canvas');
  canvas.width = 50;
  canvas.height = 50;
  const ctx = canvas.getContext('2d');

  // Set background color (optional, you can change this to a random color)
  ctx.fillStyle = "#e6ba24"; // Blue background color
  ctx.fillRect(0, 0, canvas.width, canvas.height);

  // Set font properties for initials
  ctx.font = 'bold 24px Arial';
  ctx.fillStyle = '#ffffff'; // White text color
  ctx.textAlign = 'center';
  ctx.textBaseline = 'middle';
  ctx.fillText(initials, canvas.width / 2, canvas.height / 2);

  // Return the data URL of the canvas as an image source
  return canvas.toDataURL();

}

export function getUserProfileImage(user) {

  return   user.photo_url 
  ? `<img src="/uploads/users/${user.photo_url}" style="width: 70px; height:70px; border-radius: 40px" class="ms-2" alt="">`
  : `<img src="${generateAvatar(user.email)}" style="width: 70px; height:70px; border-radius: 40px" class="ms-2" alt="">`;

}

export function getIndexProfileImage(user, profileImageElement) {

  user.photo_url 
  ? profileImageElement.src = `/uploads/users/${user.photo_url}` 
  : profileImageElement.src = `${generateAvatar(user.email)}`;

}

export function getDate(currentDate) {

return   dayjs(currentDate).format('MMM, YYYY');

}

export function getSingleImage(productImages) {

  const images = JSON.parse(productImages);
  
  return  images.length > 0 ? images[0] : null;


}

export function getBadge(product) {

  // const{verify_status, badge_status} = product.user;

  const{verify_status, badge_status} = product;

  return    verify_status === 1 && badge_status 
              ? `<img class="logo-bag" src="/kaz/images/badge.png" alt="">` 
              : ` <img src="/innocent/assets/image/logo icon.svg" alt="">`;


}


export function getProdDesImage(product) {

  const user = product.user;

return  user.photo_url ? `<img src="/uploads/users/${user.photo_url}" alt=".profile picture " class="user_photo">` 
                               : `<img src="${generateAvatar(user.email)}" alt=".profile picture " class="user_photo">`;

}

 export function getProdProfileDescImg(product, element) {

      if(!product) {
        return  element.src = `/innocent/assets/image/avatar.svg`;
      }

  const user = product.user ?? product ;

  return  user.photo_url ? element.src = `/uploads/users/${user.photo_url}` : element.src = `${generateAvatar(user.email)}`;

  }


export  function logoutUser() {
  
  const token = localStorage.getItem('apiToken');

  axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

  axios.post('/api/v1/auth/logout')
      .then(function (response) {
          const responseData = response.data;
          if (responseData.status) {
              // Remove the token from localStorage
              localStorage.removeItem('apiToken');
              localStorage.clear();

              // Remove the token from Axios default headers
              delete axios.defaults.headers.common['Authorization'];
              window.location.href = '/';

          
              // Swal.fire({
              //     icon: 'success',
              //     confirmButtonColor: '#ffb705',
              //     title: 'Logout Successful',
              //     text: responseData.message,
              //     willClose: function() {
              //         window.location.href = '/'; // Redirect to login page
              //      }
              // });
          } else {
              Swal.fire({
                  icon: 'error',
                  confirmButtonColor: '#ffb705',
                  title: 'Logout Failed',
                  text: 'Unexpected response from the server. Please try again later.'
              });
          }
      })
      .catch(function (error) {
          const errorData = error.response.data;

          Swal.fire({
              icon: 'error',
              confirmButtonColor: '#ffb705',
              title: 'Logout Failed',
              text: errorData.message || 'There was an error while logging out. Please try again later.'
          });
      });
}


export function loadDashboard(product) {

if (!product) {

  const fallback = `<div class="profile_card_user_name">
          <img class="avatar" src="/innocent/assets/image/avatar.svg" alt="">
          <p>Guest User<br>
            <span>GuestUser@gmail.com</span>
          </p>
        </div>
        <hr>
        <div class="accont_features">
                <p>Account Setting </p>
               <p> Reffer a Friend </p>
                <p>Privacy and Policy </p>
               <p> Sign out</p>

        </div>`;

    return    document.querySelector('.profile_card').innerHTML = fallback;
}
  
 const user = product.user ?? product;

 //USING OBJECT DESTRUCTURING
 const{photo_url, email} = user;          

  const dashboardImg = photo_url ? `<img class="dashboard-img"  src="/uploads/users/${photo_url}" alt="Profile Image">` : `<img id="profile_image" class="dashboard-img" src="${generateAvatar(email)}" alt="Profile Image"></img>`;


  const dashboard = `
  <div class="profile_card_user_name">
    ${dashboardImg}
  <p id="profile_name">${user.username ?? 'No Username Provided'}
  </p>
  <p><span id="profile_email">${user.email ?? 'No Data Provided'}</span></p>  
  </div>
  <hr>
  <div class="accont_features">
      <p><a href="/settings">Account Setting </a></p>
      <p><a href="/refer"> Reffer a Friend </a></p>
      <p> <a href="/privacy'">Privacy and Policy </a></p>
      <p><a href="#" id="logout-link">Log out</a></p>
  </div>`;


if(document.querySelector('.profile_card')) {

return  document.querySelector('.profile_card').innerHTML = dashboard;

}




}

export function getPrice(product) {
  
  return  product.ask_for_price
    ? '<p class="ask-for-price" style="color:red; padding-right: 2px; font-size:23px">Ask for price</p>'
    : `
        <p class="promo_price">$${product.promo_price ?? ''}</p>
        <div class="main_price"><p class="main_price_amount">$${product.actual_price ?? ''}</p></div>
    `

 
}

  export function getShopPrice(product) {

  const promoPrice = formatPrice(product.promo_price);
  const actualPrice = formatPrice(product.actual_price);

  const showPromo =  promoPrice === '0';

    return product.ask_for_price
    ? '<h6 class="amount" style="color:red; font-size:15px;">Ask for price</h6>' 
    : `<h6 class="amount">${promoPrice === '0' ? '' : '&#8358;' + promoPrice}  <span class="ps-1 ${showPromo ? '' : 'amount-span' } ">&#8358;${actualPrice}</span></h6>`;
  }


  export function getIndexPrice(product) {

    const promoPrice = formatPrice(product.promo_price);
    const actualPrice = formatPrice(product.actual_price);
    const showPromo = promoPrice === '0';

 return   product.ask_for_price
    ? '<p class="ask-for-price" style="color:red; padding-right: 2px; font-size:18px">Ask for price</p>'
    : `
     <p class="promo_price">${promoPrice === '0' ? '' : '&#8358;' + promoPrice}</p>
    <div class="${showPromo ? '' : 'main_price'}"><p class="main_price_amount">&#8358;${actualPrice}</p></div>
    `
  }


export function loadConnect(product) {

 // console.log(product);

  const {title, id, user_id} = product;
  const {name, phone_number, email} = product.user;

  const productName = title;


  Swal.fire({
      icon: 'info',
      confirmButtonColor: '#ffb705',
      title: `${name ?? 'Seller'} Contact: ${phone_number ?? 'N/A'}`, 
      text:  `Product Title: ${productName ?? email}`,    
  
  });

  const token = localStorage.getItem('apiToken');

//  console.log(id)


  axios.post('/api/v1/product/engagement', {id, user_id}, {
    headers: {
      'Authorization': `Bearer ${token}`,
    },
  

  }).then((response) => {
 //   console.log(response);

  }).catch((error) => {
 //   console.log(error);
  })


}


export  function loadName(name,email) {

  return  `
  <h6 class="name">${name ?? 'No Name Provided'}</h6>
 <h6 class="mired-text fw-light ps-4">${email ?? 'No Email Provided'}</h6>
 `;
}



export function getDropDownImg(photo_url, email, name) {


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


  return dropDown;




}


export function loadSidebar(user) {

  //console.log(user)

  const bioText = user.bio ?? '';
  const previewLength = 100;

  const visibleBio = bioText.slice(0, previewLength);
  const hiddenBio = bioText.length > previewLength  ? bioText.slice(previewLength) : '';

  const totalProduct = user ? user.length : null;



  
  const display = `
   <div class="ms-2">
        <h6 class="card-title">About me</h6>
        <p  style="font-size: small; " class="card-text our-company">
         ${visibleBio }
        <span id="moreText" style="display: none;"> ${hiddenBio}.</span>
          ${hiddenBio ? '<a href="#" id="readMoreBtn"> ......Read more</a>' : ''} 
        </p>
      </div>
      <hr style="background-color: #343434;">
      <div>
        <div class="side-display">
          <div>
            <img width="10px" height="13px" src="/kaz/images/location.svg" alt="">
            <span style="font-size: small;">From</span>
          </div>
          <h6 style="font-size: small;">${user.location ?? ''} Nigera</h6>
        </div>
        <div class="side-display">
          <div>
            <img width="15px" src="/kaz/images/profile.svg" alt="">
            <span style="font-size: small;">Member since</span>
          </div>
          <h6 style="font-size: small;"> ${getDate(user.created_at)}</h6>

        </div>
        <div class="side-display">
          <div>
            <img width="15px" src="/kaz/images/product.svg" alt="">
            <span style="font-size: small;">Listed products</span>
          </div>
          <h6 style="font-size: small;">${totalProduct ? totalProduct : 'N/A'}</h6>

        </div>
        <hr style="background-color: #343434;">
      
      </div> 
      <div class="ms-2">
        <h6 class="card-title">Reviews</h6>
        <div class="js-stars">
          <img src="/kaz/images/star-active.svg" class="img-fluid image-rate" width="15px" alt="">
          <img src="/kaz/images/star-active.svg" class="img-fluid image-rate" width="15px" alt="">
          <img src="/kaz/images/star-active.svg" class="img-fluid image-rate" width="15px" alt="">
          <img src="/kaz/images/star-active.svg" class="img-fluid image-rate" width="15px" alt="">
          <img src="/kaz/images/star-nill.svg" class="img-fluid image-rate" width="15px" alt=""> <span
            style="font-size: small;">(4.5)</span>
        </div>
        <a class="view js-review" href="">View all</a>

      </div>`;

     const starEl = document.querySelector('.js-stars');


      if(hiddenBio) {
        var moreText = document.getElementById("moreText");
        var readMoreBtn = document.getElementById("readMoreBtn");

        // Function to close the accordion
        function closeAccordion() {
            moreText.style.display = "none";
            readMoreBtn.textContent = ".......Read more";
        }

      
      
        // Toggle accordion on read more button click
        readMoreBtn.addEventListener("click", function(e) {
            e.preventDefault();
            if (moreText.style.display === "none") {
                moreText.style.display = "inline";
                readMoreBtn.textContent = "Read less";
            } else {
                closeAccordion();
            }
        });
      
        // Close accordion when clicking outside of it
        document.addEventListener("click", function(e) {
            var isClickInsideAccordion = readMoreBtn.contains(e.target) || moreText.contains(e.target);
            if (!isClickInsideAccordion) {
                closeAccordion();
            }
        });



      }
    

      

     


  
    
return  display;

}


export function loadAvgStars(averageRatings) {
  
  const avgRating = Math.floor(averageRatings);

  let stars = '';

  for (let i = 0; i < 5; i++) {

    stars += i < avgRating  ? `<img src="/kaz/images/star-active.svg" class="img-fluid image-rate" width="15px" alt="">`
                         :  ` <img src="/kaz/images/star-nill.svg" class="img-fluid image-rate" width="15px" alt="">`;



  }

  stars += `<span style="font-size: small;">(${avgRating})</span>`;

  return stars;
  
}

export function filter(locationElement, verifyElement,) {

  const locationText = locationElement ? locationElement.textContent : ' ';
  const verification = verifyElement ? verifyElement.checked : false;

  const location = locationText.trim();
  const verifyStatus = verification ? 1 : 0;


  return {location, verifyStatus,};


}

export function displayHelpCenter() {

  Swal.fire({
    title: "<strong>Help Center</strong>",
    icon: "info",
    html: `
      <h6 class="fs-5">Direct your complain to our email</h6>
      <h6 class="fs-5">Info@loopMartinfo.com</h6>
      <h6 class="fs-5">We will respond within 24hrs</h6>
     
    `,
    confirmButtonColor: '#ffb705',
    showCloseButton: true,
    showCancelButton: true,
    focusConfirm: false,
    confirmButtonText: `
      <i class="fa fa-thumbs-up"></i> Go To Mail
    `,
    confirmButtonAriaLabel: "Thumbs up, great!",
    // cancelButtonText: `
    //   <i class="fa fa-thumbs-down"></i>
    // `,
    cancelButtonAriaLabel: "Thumbs down"
  }).then((result)=> {
    if(result.isConfirmed) {

      window.location.href = "mailto:Admin@loopMartInfo.com?subject=Help Center Inquiry&body=Hello,"


    }
  })
  

}

export function displayData(name, phone_number) {

  Swal.fire({
    title: "<strong class='text-warning'>Connect</strong>",
    icon: "info",
    html: `
      <h6 class="fs-5">Seller Name: ${name ?? 'N/A'}</h6>
      <h6 class="fs-5">Contact: ${phone_number ?? 'N/A'}</h6>
     
    `,
    showCloseButton: true,
    showCancelButton: true,
    focusConfirm: false,
    confirmButtonColor: '#ffb705',
    confirmButtonText: `
      <i class="fa fa-thumbs-up"></i> Great!
    `,
    confirmButtonAriaLabel: "Thumbs up, great!",
    cancelButtonText: `
      <i class="fa fa-thumbs-down"></i>
    `,
    cancelButtonAriaLabel: "Thumbs down"
  });


}


export function generateStars(rating) {
  let stars = '';
  for (let i = 0; i < rating; i++) {
      stars += `<img width="10px" src="/kaz/images/Rate.png" alt="">`;
  }
  return stars;
}


export  function sendProductRequest(input, token) {

  axios.post('/api/v1/user/product-request', { input }, {
      headers: {
          'Authorization': `Bearer ${token}`,
          'Content-type': 'application/json',
      }
  }).then((response) => {

     // console.log(response);

      if(response.status === 200 && response.data) {

          const msg = response.data.message;

          Swal.fire({
              icon: 'success',
              confirmButtonColor: '#ffb705',
              title: 'Product Request',
              text: msg,
          })

          
      }

  }).catch((error) => {
    //  console.log(error);

      if(error.response) {

          if(error.response.status === 422 && error.response.data) {
              Swal.fire({
                  icon: 'error',
                  title: 'validation Error',
                  confirmButtonColor: '#ffb705',
                  text: error.response.data.message,
              })

          }



          if(error.response.status === 500) {

              Swal.fire({
                  icon: 'error',
                  confirmButtonColor: '#ffb705',
                  title: 'Server Error',
                  text: 'Something went wrong!! Please try again later'
              });


          }
      }

  })

 }


 export function formatPrice(amount) {

  const formatter = new Intl.NumberFormat('en');

   const price = formatter.format(amount);

   return price;

 }


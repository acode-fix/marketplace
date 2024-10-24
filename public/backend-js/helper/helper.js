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
    text: 'Please log in to continue.'
}).then(() => {

    window.location.href = '/'; 
    
});

return false

} else {

  return token;
}

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

return   dayjs(currentDate).format('MMMM, YYYY');

}

export function getSingleImage(productImages) {

  const images = JSON.parse(productImages);
  
  return  images.length > 0 ? images[0] : null;


}

export function getBadge(product) {

  const{verify_status, badge_status} = product.user;

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

  const user = product.user;

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

          
              Swal.fire({
                  icon: 'success',
                  title: 'Logout Successful',
                  text: responseData.message,
                  onClose: function() {
                      window.location.href = '/'; // Redirect to login page
                   }
              });
          } else {
              Swal.fire({
                  icon: 'error',
                  title: 'Logout Failed',
                  text: 'Unexpected response from the server. Please try again later.'
              });
          }
      })
      .catch(function (error) {
          const errorData = error.response.data;

          Swal.fire({
              icon: 'error',
              title: 'Logout Failed',
              text: errorData.message || 'There was an error while logging out. Please try again later.'
          });
      });
}


export function loadDashboard(product) {

 const user = product.user;

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

  return product.ask_for_price
  ? '<h6 class="amount" style="color:red; font-size:15px;">Ask for price</h6>' 
  : ` <h6 class="amount">$${product.promo_price ?? 0} <span class="amount-span">$${product.actual_price ?? 0}</span></h6>`;
}



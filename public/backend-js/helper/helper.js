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
    title: 'Unauthenticated User',
    text: 'Kindly log in.'
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

  return    product.user.verify_status === 1 
              ? `<img class="logo-bag" src="kaz/images/badge.png" alt="">` 
              : ` <img src="innocent/assets/image/logo icon.svg" alt="">`;


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
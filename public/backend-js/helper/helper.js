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
  ? `<img src="/uploads/users/${user.photo_url}" class="ms-2" alt="">`
  : `<img src="${generateAvatar(user.email)}" style="width: 70px; height:70px; border-radius: 40px" class="ms-2" alt="">`;

}
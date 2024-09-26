
  // Fetch the user data
  
const token = localStorage.getItem('apiToken'); // Get the token from local storage
  // console.log(token)

if (token) {
   axios.get('/api/v1/getuser', {
       headers: {
           'Authorization': 'Bearer ' + token
       }
   })
   .then(response => {
    const  user = response.data;
       updateUserProfile(user);
       
   })
   .catch(error => {
       console.error('Error fetching user data:', error);
       if (error.response && error.response.status === 401) {
           Swal.fire({
               icon: 'error',
               title: 'Unauthorized',
               text: 'Your session has expired. Please log in again.'
           }).then(() => {
               window.location.href = '/'; // Redirect to login page
           });
       }
   });
} else {

  // console.log('yes')

   Swal.fire({
       icon: 'error',
       title: 'Unauthenticated User',
       text: 'Please log in.'
   }).then(() => {
       window.location.href = '/'; 
       
   });
}

function updateUserProfile(user) {
   const nameElement = document.querySelector('.right-section .name');
   const emailElement = document.querySelector('.right-section .mired-text');
   const profileImageElement = document.querySelector('.right-section .profile-picture');
   const profileImagePreview = document.querySelector('.js-previewImgDesktop');
   const profileImgMobile = document.querySelector('.js-previewImgMobile');

  // update userProfile on desktop  && mobile shop Page;
  const bannerImage = document.querySelectorAll('.js-backend-img')
  const bannerProfile = document.querySelectorAll('.js-kaz-images-dp');
  const bannerName = document.querySelectorAll('.js-mired-name');
  const bannerEmail = document.querySelectorAll('.js-mired-email');
  const verification = document.querySelectorAll('.js-verification');



   if (user) {
       nameElement.textContent = user.username || 'No Username';
       emailElement.textContent = user.email || 'No email provided';
       // profileImageElement.src = user.photo_url ? user.photo_url : 'kaz/images/dp.png';
       const imageUrl = user.photo_url ? `/uploads/users/${user.photo_url}` : 'kaz/images/dp.png';
       profileImageElement.src = imageUrl;

       
    if(profileImagePreview) {
  
    const imagePreview = user.photo_url ? `uploads/users/${user.photo_url}` : 'kaz/images/dp.png';

     profileImagePreview.src = imagePreview;

   }


   if(profileImgMobile) {

      const mobileImagePreview = user.photo_url ? `uploads/users/${user.photo_url}` : 'kaz/images/dp.png';  

      profileImgMobile.src = mobileImagePreview; 
    
   }

   if (bannerProfile  && bannerName && bannerEmail && verification && bannerImage) {

    //console.log(bannerProfile);

       bannerProfile.forEach((value) => {
        const bannerProfileDesktop =user.photo_url ? `uploads/users/${user.photo_url}` : 'kaz/images/dp.png';
        value.src = bannerProfileDesktop;
        });

        bannerName.forEach((name) => {
            name.textContent = user.username || 'No Username';

        })

        bannerEmail.forEach((email) => {
            email.textContent = user.email || 'No Email Provided';

        });

        verification.forEach((verify) => {
            if(user.is_verified) {

            user.is_verified = 'Verified Seller';
            verify.textContent = user.is_verified;

          } else {
            verify.textContent = 'Unverified Seller';
            verify.href = '/shop';   


          }


        })

        bannerImage.forEach((bannerImg) => {
            const bannerUpdate = user.banner ? `${user.banner}` : 'kaz/images/carousel 1.png';
            bannerImg.src = bannerUpdate;

        })
    
   }


   } else {
       console.error('User data is null or undefined');
   }

}






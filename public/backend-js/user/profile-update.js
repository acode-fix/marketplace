
  // Fetch the user data
 const token = localStorage.getItem('apiToken');

 axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

if (token) {
  
   axios.get('/api/v1/getuser', {

   }).then(response => {
      const  user = response.data;

       updateUserProfile(user);
          
   }).catch(error => {
       console.log('Error fetching user data:', error);
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

            if (nameElement && emailElement && profileImageElement){
            nameElement.textContent = user.username || 'No Username';
            emailElement.textContent = user.email || 'No email provided';
            profileImageElement.src = user.photo_url ? user.photo_url : 'kaz/images/dp.png';
            const imageUrl = user.photo_url ? `/uploads/users/${user.photo_url}` : 'kaz/images/dp.png';
            profileImageElement.src = imageUrl;

            }

  
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

                    });



                    
                
            }

            


            //Update User Profile on Product Description Page

            const dashboardImg = user.photo_url ? `<img id=""  src="/uploads/users/${user.photo_url}" alt="Profile Image">` : '<img id="profile_image" src="" alt="Profile Image"></img>';
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
                <p><a href="#" id="dash">Log out</a></p>
            </div>`;

         if(document.querySelector('.profile_card')) {

            document.querySelector('.profile_card').innerHTML = dashboard;

        

         }

        
        

        //UPDATE USER PROFILE NAVBAR ON PRODUCT DESCRIPTION PAGE;

       document.querySelectorAll('.js-product-desc-img').forEach((productDesc) => {
    
        productDesc.src =  user.photo_url ? `/uploads/users/${user.photo_url}` : '';

       });

     //User Log Out Link in Layout.main Navbar;

     const mobileLogOut = document.querySelector('.js-mobile-view-logout');

     //User Log out link in layout.others navbar
     const otherMobileLogOut = document.querySelector('.js-other-mobile-logout')

     if(mobileLogOut) {

        mobileLogOut.addEventListener('click', () => { 
        
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

     if(otherMobileLogOut) {
        otherMobileLogOut.addEventListener('click', () => {

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

        })
     }

     function logoutUser() {

        axios.post('/api/v1/auth/logout')
      
            .then(function (response) {
      
                const responseData = response.data;
                
                if (responseData.status) {
                    
                    localStorage.removeItem('apiToken');
                    localStorage.clear();
          
                    Swal.fire({
                        icon: 'success',
                        title: 'Logout Successful',
                        text: responseData.message,
                        willClose: function() {
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

       
      

   } else {
       console.error('User data is null or undefined');
   }

}









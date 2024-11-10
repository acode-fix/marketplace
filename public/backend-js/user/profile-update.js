import { generateAvatar,  } from "../helper/helper.js";

  // Fetch the user data
 const token = localStorage.getItem('apiToken');

 axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

if (token) {
  
   axios.get('/api/v1/getuser', {

   }).then(response => {
      const  user = response.data;
      //console.log(user);

      

       updateUserProfile(user);
       
          
   }).catch(error => {
       console.log('Error fetching user data:', error);
       if (error.response && error.response.status === 401) {
           Swal.fire({
               icon: 'error',
               confirmButtonColor: '#ffb705',
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
       text: 'Please log in.',
       confirmButtonColor: '#ffb705',
   }).then(() => {
       window.location.href = '/'; 
       
   });
}
 

function updateUserProfile(user) {   

   const nameElement = document.querySelector('.right-section .name');
   const emailElement = document.querySelector('.right-section .mired-text');
   const profileImageElement = document.querySelector('.right-section .nav-profile-picture');
   const profileImagePreview = document.querySelector('.js-previewImgDesktop');
   const profileImgMobile = document.querySelector('.js-previewImgMobile');

  // update userProfile on desktop  && mobile shop Page;
  const bannerImage = document.querySelectorAll('.js-backend-img')
  const bannerProfile = document.querySelectorAll('.js-images-dp');
  const bannerName = document.querySelectorAll('.js-mired-name');
  const bannerEmail = document.querySelectorAll('.js-mired-email');
  const verification = document.querySelectorAll('.js-verification');



   if (user) {

            if (nameElement && emailElement && profileImageElement){
            nameElement.textContent = user.username ?? 'No Username';
            emailElement.textContent = user.email ?? 'No email provided';
            
            user.photo_url 
            ? profileImageElement.src = `/uploads/users/${user.photo_url}` 
            : profileImageElement.src = `${generateAvatar(user.email)}`;

        

            }

  
            if(profileImagePreview) {

                user.photo_url 
                ? profileImagePreview.src = `/uploads/users/${user.photo_url}` 
                :  profileImagePreview.src = `${generateAvatar(user.email)}`;
        
           

           }


            if(profileImgMobile) {

                user.photo_url 
                ? profileImgMobile.src = `/uploads/users/${user.photo_url}`
                : profileImgMobile.src = `${generateAvatar(user.email)}`;
  
            }

            if (bannerProfile  && bannerName && bannerEmail && verification && bannerImage) {

                //console.log(bannerProfile);

                bannerProfile.forEach((profileImg) => {

                    user.photo_url ? profileImg.src = `/uploads/users/${user.photo_url}` : profileImg.src = `${generateAvatar(user.email)}`


                    });

                    bannerName.forEach((name) => {
                        name.textContent = user.username ?? 'No Username Provided';

                    })

                    bannerEmail.forEach((email) => {
                        email.textContent = user.email ?? 'No Email Provided';

                    });

                    verification.forEach((verify) => {

                        if(user.verify_status === 1 && user.badge_status === 1) {
                        verify.textContent = 'Verified Seller';
                        verify.style.color = '#14ae5c';
                        //verify.href= `/review/product?user=${user.id}&shop=${user.shop_token}`;

                    } else {
                        verify.textContent = 'Unverified Seller';
                        verify.href = '/shop';  
                        verify.style.color = '#fe3d3d'; 


                    }


                    })

                    bannerImage.forEach((bannerImg) => {

                        user.banner ?  bannerImg.src = `/uploads/users/${user.banner}` : bannerImg.src = `${generateAvatar(user.email)}`;

                    });


                 const reviewEL =  document.querySelector('.review-page');

                

                 if(reviewEL) {

                    reviewEL.addEventListener('click', (event) => {
                        event.preventDefault();
    
                       window.location.href = `/review/product?user=${user.id}&shop=${user.shop_token}`;
    
                     });

                 }


                 



                    
                
            }

            
    
            
            
    //   function loadDashboard(user) {

            

    //         const dashboardImg = user.photo_url ? `<img id=""  src="/uploads/users/${user.photo_url}" alt="Profile Image">` : '<img id="profile_image" src="" alt="Profile Image"></img>';
    //         const dashboard = `
    //         <div class="profile_card_user_name">
    //           ${dashboardImg}
    //         <p id="profile_name">${user.username ?? 'No Username Provided'}
    //         </p>
    //         <p><span id="profile_email">${user.email ?? 'No Data Provided'}</span></p>  
    //         </div>
    //         <hr>
    //         <div class="accont_features">
    //             <p><a href="/settings">Account Setting </a></p>
    //             <p><a href="/refer"> Reffer a Friend </a></p>
    //             <p> <a href="/privacy'">Privacy and Policy </a></p>
    //             <p><a href="#" id="dash">Log out</a></p>
    //         </div>`;

    //      if(document.querySelector('.profile_card')) {

    //         document.querySelector('.profile_card').innerHTML = dashboard;

    //      }

        
    //     }

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
                    window.location.href = '/';
          
                    // Swal.fire({
                    //     icon: 'success',
                    //     confirmButtonColor: '#ffb705',
                    //     title: 'Logout Successful',
                    //     text: responseData.message,
                    //     willClose: function() {
                    //         window.location.href = '/'; 
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

       
      

   } else {
       //console.error('User data is null or undefined');
   }

}









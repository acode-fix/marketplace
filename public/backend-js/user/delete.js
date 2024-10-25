import { getToken } from "../helper/helper.js";

const token = getToken();

if(token)  {
  
  const desktopBtn = document.getElementById('deleteAccountBtn');
  const mobileBtn = document.getElementById('mobile-deleteAccountBtn');

 [desktopBtn,mobileBtn].forEach((btn) => {

  if(btn) {

    btn.addEventListener('click', function() {


      Swal.fire({
          title: 'Are you sure?',
          text: "This action is irreversible and will delete your account and all associated data.",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'Cancel'
      }).then((result) => {
          if (result.isConfirmed) {
              axios.delete('api/v1/user', {
                  headers: {
                      'Authorization': 'Bearer ' + token 
                  }
              })
              .then(function(response) {
                  if (response.data.status) {
                      Swal.fire(
                          'Deleted!',
                          response.data.message,
                          'success'
                      ).then(() => {
                          localStorage.removeItem('apiToken'); 
                          window.location.href = '/'; 
                      });
                  } else {
                      Swal.fire(
                          'Error!',
                          response.data.message,
                          'error'
                      );
                  }
              })
              .catch(function(error) {
                  Swal.fire(
                      'An error occurred',
                      error.response.data.message || 'Please try again later.',
                      'error'
                  );
              });
          }
      });
    });


  }

 });
  

  


}



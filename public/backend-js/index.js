import { validationError } from "./helper/helper.js";

export function sendResetOtp(value) {
    
  let email = document.getElementById("reset_email")?.value || value;


  axios.post('/api/forgot-password', {
      email: email,
  })
  .then(function (response) {
    
      console.log(response.data);
    
      Swal.fire({
          icon: 'success',
          title: 'OTP Sent',
          text: 'An OTP has been sent to your email address.', 
          willClose: function() {
            // After sending the OTP, show the OTP verification modal
            if (document.getElementById('verifyOtpModal')) {
                  $('#verifyOtpModal').modal('show');
            }
            }
             
      });
  }).then(() => {
     showModal();
   
  }).catch((error) => {

    if (error.response) {
      

      if(error.response.status === 500) {
        
       serverError();

      }else {

        Swal.fire({
          icon: 'error',
          title: 'Failed to Send OTP',
          text: 'There was an error while sending the OTP. Please try again later.',
      });


      }

     
    }

  })


  



  
}

  if (document.getElementById('exampleModal') && document.getElementById('changePassword')) {

    var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
    var passwordModal = new bootstrap.Modal(document.getElementById('changePassword'));

  }

  
 

  function showModal() {
    modal.show();
  
  }
  
  function hideModal() {
    modal.hide();
  
  }


  export function serverError() {

    Swal.fire({
      icon: 'error',
      title: '',
      text: 'Something Went Wrong!! Try Again Later',

      willClose() {

        window.location.reload();

      }
     
  });
  }


export function verifyOtp(adminEmail, adminOtp) {

  const email = document.getElementById("reset_email")?.value || adminEmail;
  const otp = document.getElementById("otp")?.value || adminOtp;

  axios.post('/api/verify-otp', {
      email: email,
      otp: otp
  })
  .then(function (response) {
      // Handle success response
      console.log(response.data);
      // Display a success message to the user
      Swal.fire({
          icon: 'success',
          title: 'OTP Verified',
          text: 'OTP has been verified successfully.',
          onClose: function() {
        
            // After OTP verification, show the password change modal
              //changePassword(); // Assuming you have a function to show the password change modal
          }
      });
  }).then(() => {

    hideModal();
    passwordModal.show();

   
  })
  .catch(function (error) {
    
    if (error.response) {

      if(error.response.status === 500) {

        serverError();
      

      }else {
      Swal.fire({
        icon: 'error',
        title: 'Failed to Verify OTP',
        text: 'Invalid OTP. Please enter the correct OTP and try again.'
    });

    }

    }
     
  });
}


export  function resetPassword(adminOtp, adminPassword, adminConfirmPassword) {
  
  const otp = document.getElementById("otp")?.value || adminOtp;
  const newPassword = document.getElementById("newPassword")?.value || adminPassword;
  const confirmPassword = document.getElementById("confirmPassword")?.value || adminConfirmPassword;

  if (newPassword !== confirmPassword) {
      Swal.fire({
          icon: 'error',
          title: 'Password Mismatch',
          text: 'The new passwords do not match. Please try again.'
      });
      return;
  }

  axios.post('/api/reset-password', {
      //email: email,
      otp: otp,
      password: newPassword,
      password_confirmation: confirmPassword
  })
  .then(function (response) {
   
      // Display a success message to the user
      Swal.fire({
          icon: 'success',
          title: 'Password Reset Successful',
          text: 'Your password has been reset successfully.',
          willClose: function() {
              window.location.href = '/admin/login';
          }
      });
  })
  .catch(function (error) {

   // console.log(error.response)

    if(error.response) {

      if(error.response.status === 500) {

        serverError();
      }

      if (error.response.status === 422 && error.response.data) {

        const responseErrors = error.response.data.errors;

        console.log(responseErrors);

        const errorMsg = validationError(responseErrors);
        
        Swal.fire({
          icon: 'error',
          title: 'Validation Error',
          text: errorMsg,
            
      })

       

      }
      
    


    }
     
  });
}








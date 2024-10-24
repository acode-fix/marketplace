 function signup() {
  const email = document.getElementById("signup_email").value;
  const password = document.getElementById("signup_password").value;

  axios.post('/api/auth/register', {
      email: email,
      password: password,
      password_confirmation: password
  })
  .then(function (response) {
     //    console.log(response)
      const responseData = response.data;

     // console.log(responseData)

      if (responseData.status) {
          // Store the token in localStorage
          localStorage.setItem('apiToken', responseData.token);
          


         // alert(responseData.token);

          // Set the token in Axios default headers for subsequent requests
          axios.defaults.headers.common['Authorization'] = `Bearer ${responseData.token}`;

          Swal.fire({
              icon: 'success',
              title: 'Registration Successful',
              text: responseData.message,
              willClose: () => {
                  window.location.href = '/'; // Redirect to dashboard or desired page
              }
          });
      } else  
          
      {
          Swal.fire({
              icon: 'error',
              title: 'Registration Failed',
              text: 'Unexpected response from the server. Please try again later.'
          });
      }
  })

  .catch(function (error) {
     if (error.response) {
      if(error.response.status ===  401 && error.response.data) {
          const responseErrors = error.response.data.errors;

          let allErrors = [];

          for (let field in responseErrors) {

              const fieldErrors = responseErrors[field];
              fieldErrors.forEach((message) => {
                  allErrors.push(message);
          
              }); 
          }
          const errorMsg = allErrors.join('\n')

          displaySwal(errorMsg);

      }

     }

  })

}



 function displaySwal(errorMsg, invalidCredentials) {

  Swal.fire({ 
              icon: 'error',
              title: 'Login Failed',
              text:  errorMsg || invalidCredentials,
          });

}

 function loginUser() {

  const email = document.getElementById("login_email").value;
  const password = document.getElementById("login_password").value;

  axios.post('/api/auth/login', {
      email: email,
      password: password
  }) 
  .then(function (response) {
      const responseData = response.data;
      if (responseData.status) {
          // Store the token in localStorage
          localStorage.setItem('apiToken', responseData.data.token);

          const userId =  responseData.data.user.id;

          localStorage.setItem('userId', JSON.stringify(userId));
          
          // Set the token in Axios default headers for subsequent requests
          axios.defaults.headers.common['Authorization'] = `Bearer ${responseData.data.token}`;
          

          Swal.fire({
              icon: 'success',
              title: 'Login Successful',
              text: responseData.message,
              willClose: () => {
                  window.location.href = '/';; // Redirect to dashboard or desired page
              }
          });
      } else {
          


      }
      
  })
  .catch(function (error) {
  
      if (error.response) {

      if(error.response.status ===  401 && error.response.data) {

          const  invalidCredentials = error.response.data.message;

          const responseErrors = error.response.data.errors;

          let allErrors = [];

          for (let field in responseErrors) {

              const fieldErrors = responseErrors[field];
              fieldErrors.forEach((message) => {
                  allErrors.push(message);
          
              }); 
          }
          const errorMsg = allErrors.join('\n')

          displaySwal(errorMsg, invalidCredentials);

      }

     }

  });
}

 
 function sendResetOtp() {
    
  const email = document.getElementById("reset_email").value;

  axios.post('/api/forgot-password', {
      email: email,
  })
  .then(function (response) {
      // Handle success response
      console.log(response.data);
      // Display a success message to the user
      Swal.fire({
          icon: 'success',
          title: 'OTP Sent',
          text: 'An OTP has been sent to your email address.',
          onClose: function() {
          // After sending the OTP, show the OTP verification modal
          $('#verifyOtpModal').modal('show');
          }
      });
  })
  .catch(function (error) {
      // Handle error response
      console.log(error.response.data);
      // Display an error message to the user
      Swal.fire({
          icon: 'error',
          title: 'Failed to Send OTP',
          text: 'There was an error while sending the OTP. Please try again later.'
      });
  });
}


// Function to verify OTP
 function verifyOtp() {
  const email = document.getElementById("reset_email").value;
  const otp = document.getElementById("otp").value;

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
              changePassword(); // Assuming you have a function to show the password change modal
          }
      });
  })
  .catch(function (error) {
      // Handle error response
      console.log(error.response.data);
      // Display an error message to the user
      Swal.fire({
          icon: 'error',
          title: 'Failed to Verify OTP',
          text: 'Invalid OTP. Please enter the correct OTP and try again.'
      });
  });
}


 function resetPassword() {
  //const email = document.getElementById("reset_email").value;
  const otp = document.getElementById("otp").value;
  const newPassword = document.getElementById("newPassword").value;
  const confirmPassword = document.getElementById("confirmPassword").value;

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
          onClose: function() {
              window.location.href = '/'
          }
      });
  })
  .catch(function (error) {
      // Handle error response
       msgError = error.response.data.message;
      // Display an error message to the user
      Swal.fire({
          icon: 'error',
          title: 'Failed to Reset Password',
          text: msgError,
      });
  });
}
 
 function logoutUser() {
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


// Add this JavaScript code to handle the logout process

document.getElementById('logoutLink').addEventListener('click', function(event) {

  event.preventDefault(); // Prevent the default action of the link

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





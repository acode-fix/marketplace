var myModal = new bootstrap.Modal(document.querySelector('#signup_login-modal'));
const otpModal = new bootstrap.Modal(document.querySelector('#verifyOtpModal'));



function showLoader(continueBtn, signupText, loader) {

    continueBtn.disabled = true;
    loader.style.display = 'flex';
    signupText.style.display = 'none';
    continueBtn.setAttribute('arial-busy', 'true')

}

function hideLoader(continueBtn, signupText, loader) {

    continueBtn.disabled = false;
    loader.style.display = 'none';
    signupText.style.display = 'block';
    continueBtn.removeAttribute('arial-busy');

}

function signup() {
    const email = document.getElementById("signup_email").value;
    const password = document.getElementById("signup_password").value;

    const continueBtn = document.querySelector('.continueBtn-signup');
    const signupText = document.querySelector('.signup-text');
    const loader = document.querySelector('.loader-div-signup');


    showLoader(continueBtn, signupText, loader);

    axios.post('/api/auth/register', {
            email: email,
            password: password,
            password_confirmation: password
        })
        .then((response) => {
            hideLoader(continueBtn, signupText, loader);
         //   console.log(response);
            if(response.status === 200 && response.data) {
                const responseMsg = response.data.message;

          //      console.log(response);
                localStorage.setItem('apiToken', response.data.token);

                axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`;

                 myModal.hide();
                
                let timerInterval;
                Swal.fire({
                  icon: 'success',
                  title: 'Account Created Successfully',
                  confirmButtonColor: '#ffb705',
                  text: responseMsg,
                  timer: 2000,
                  timerProgressBar: true,
                  didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                     // timer.textContent = `${Swal.getTimerLeft()}`;
                    }, 1000);
                  },
                  willClose: () => {
          
                    clearInterval(timerInterval);
                    const url = sessionStorage.getItem('sharedPage');

                    url ? window.location.reload() : window.location.href = '/';
          
                  }
                })

            }
/*
           const responseData = response.data;

           console.log(responseData)

           if (responseData.status) {
                Store the token in localStorage
                localStorage.setItem('apiToken', responseData.token);



                // alert(responseData.token);

                // Set the token in Axios default headers for subsequent requests
                axios.defaults.headers.common['Authorization'] = `Bearer ${responseData.token}`;

                myModal.hide();

                const url = sessionStorage.getItem('sharedPage');

                url ? window.location.reload() : window.location.href = '/';
            } else

            {
                Swal.fire({
                    icon: 'error',
                    confirmButtonColor: '#ffb705',
                    title: 'Registration Failed',
                    text: 'Unexpected response from the server. Please try again later.'
                });
            }

            */
        }).catch(function (error) {

            hideLoader(continueBtn, signupText, loader);

            if (error.response) {
                if (error.response.status === 401 && error.response.data) {
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
        confirmButtonColor: '#ffb705',
        title: 'Login Failed',
        text: errorMsg || invalidCredentials,
    });

}

function loginUser() {

    const email = document.getElementById("login_email").value;
    const password = document.getElementById("login_password").value;

    const continueBtn = document.querySelector('.login-btn');
    const signupText = document.querySelector('.login-text');
    const loader = document.querySelector('.login-loader-div');

    showLoader(continueBtn, signupText, loader);

    axios.post('/api/auth/login', {
            email: email,
            password: password
        })
        .then(function (response) {

            hideLoader(continueBtn, signupText, loader);
            const responseData = response.data;
            if (responseData.status) {
                // Store the token in localStorage
                localStorage.setItem('apiToken', responseData.data.token);

                const userId = responseData.data.user.id;

                localStorage.setItem('userId', JSON.stringify(userId));

                // Set the token in Axios default headers for subsequent requests
                axios.defaults.headers.common['Authorization'] = `Bearer ${responseData.data.token}`;

                myModal.hide();

                const url = sessionStorage.getItem('sharedPage');

                url ? window.location.reload() : window.location.href = '/';



            } else {



            }

        })
        .catch(function (error) {

            hideLoader(continueBtn, signupText, loader);

            if (error.response) {

                $('#signup_login-modal').modal('hide');

                if (error.response.status === 401 && error.response.data) {

                    const invalidCredentials = error.response.data.message;

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

                if (error.response.status === 403 && error.response.data) {



                    Swal.fire({
                        title: `<strong class="text-danger">Account Suspended!!</strong>`,
                        icon: "info",
                        html: `
                <h6 class="fs-5">Direct your complain to our email</h6>
                <h6 class="fs-5">helpdesk@loopMartinfo.com</h6>
                <h6 class="fs-5">We will respond within 24hrs</h6>
                
                `,
                        confirmButtonColor: '#14ae5c',
                        showCloseButton: true,
                        // showCancelButton: true,
                        focusConfirm: false,
                        confirmButtonText: `
                <i class="fa-solid fa-envelope"></i> Go To Mail
                `,


                        cancelButtonAriaLabel: "Thumbs down"
                    }).then((result) => {
                        if (result.isConfirmed) {

                            window.location.href = "mailto:helpdesk@loopMartInfo.com?subject=Help Center Inquiry&body=Hello,"


                        }
                    })


                }

            }

        });
}


function sendResetOtp() {


    const email = document.getElementById("reset_email").value;

    const continueBtn = document.querySelector('.request-btn');
    const signupText = document.querySelector('.request-text');
    const loader = document.querySelector('.request-loader-div');

    showLoader(continueBtn, signupText, loader);

    if (email.trim() === '') {
        hideLoader(continueBtn, signupText, loader);
        return document.querySelector('.reset-error').textContent = 'Email is required';

    }

    axios.post('/api/forgot-password', {
            email: email,
        })
        .then(function (response) {
            hideLoader(continueBtn, signupText, loader);

            Swal.fire({
                icon: 'success',
                title: 'OTP Sent',
                text: 'An OTP has been sent to your email address.',
                confirmButtonColor: '#ffb705',

                willClose: function () {
                    // After sending the OTP, show the OTP verification modal
                    $('#verifyOtpModal').modal('show');
                    const requestPage = document.querySelector('.resetpassword');
                    requestPage.style.display = 'none';

                }
            });
        })
        .catch(function (error) {

            hideLoader(continueBtn, signupText, loader);

            // console.log(error);

            if (error.response) {

                if (error.response.status === 404 && error.response.data) {

                    const response = error.response.data.message;

                    Swal.fire({
                        icon: 'error',
                        confirmButtonColor: '#ffb705',
                        title: 'Failed to Send OTP',
                        text: `${response}`
                    });


                } else {

                    Swal.fire({
                        icon: 'error',
                        confirmButtonColor: '#ffb705',
                        title: 'Failed to Send OTP',
                        text: 'There was an error while sending the OTP. Please try again later.'
                    });
                }


            }


        });
}


// Function to verify OTP
function verifyOtp() {

    const email = document.getElementById("reset_email").value;
    const otp = document.getElementById("otp").value;

    const continueBtn = document.querySelector('.verify-btn');
    const signupText = document.querySelector('.verify-text');
    const loader = document.querySelector('.verify-loader-div');

    showLoader(continueBtn, signupText, loader);

    axios.post('/api/verify-otp', {
            email: email,
            otp: otp
        })
        .then(function (response) {

            hideLoader(continueBtn, signupText, loader);

            // Handle success response
            //   console.log(response.data);
            // Display a success message to the user
            Swal.fire({
                icon: 'success',
                title: 'OTP Verified',
                text: 'OTP has been verified successfully.',
                confirmButtonColor: '#ffb705',
                onClose: function () {

                    otpModal.hide();

                    changePassword();
                }
            });
        })
        .catch(function (error) {
            hideLoader(continueBtn, signupText, loader);
            // Handle error response
            //    console.log(error.response.data);
            // Display an error message to the user
            Swal.fire({
                icon: 'error',
                confirmButtonColor: '#ffb705',
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

    const continueBtn = document.querySelector('.change-btn');
    const signupText = document.querySelector('.change-text');
    const loader = document.querySelector('.change-loader-div');

    showLoader(continueBtn, signupText, loader);

    if (newPassword !== confirmPassword) {

        hideLoader(continueBtn, signupText, loader);
        Swal.fire({
            icon: 'error',
            title: 'Password Mismatch',
            text: 'The new passwords do not match. Please try again.',
            confirmButtonColor: '#ffb705',
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
            hideLoader(continueBtn, signupText, loader);

            // Display a success message to the user
            Swal.fire({
                icon: 'success',
                title: 'Password Reset Successful',
                text: 'Your password has been reset successfully.',
                confirmButtonColor: '#ffb705',
                willClose: function () {
                    const url = sessionStorage.getItem('sharedPage');

                    url ? window.location.reload() : window.location.href = '/';
                }
            });
        })
        .catch(function (error) {

            hideLoader(continueBtn, signupText, loader);

            if (error.response) {

                if (error.response.status === 422 && error.response.data) {

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

                window.location.href = '/';


                // Swal.fire({
                //     icon: 'success',
                //     title: 'Logout Successful',
                //     text: responseData.message,
                //     confirmButtonColor: '#ffb705',
                //     onClose: function() {
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


// Add this JavaScript code to handle the logout process
const logOut = document.getElementById('logoutLink');

if (logOut) {



    document.getElementById('logoutLink').addEventListener('click', function (event) {

        event.preventDefault(); // Prevent the default action of the link

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

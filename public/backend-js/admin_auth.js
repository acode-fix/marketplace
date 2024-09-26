import { validationError,displaySwal } from "./helper/helper.js";
import { sendResetOtp, verifyOtp, resetPassword } from "./index.js";

//axios.defaults.headers.common['Content-Type'] = 'multipart/form-data';
const login = document.querySelector('.js-login');

if (login) {

login.addEventListener('click', () => {

  const email = document.querySelector('#email').value;
  const password = document.querySelector('#password').value;

  axios.post('/api/admin/login',{
    headers : {
      'Content-Type':'multipart/form-data'
      
    },
    'method': 'post',
    email,
    password,
    
}).then((response) =>{
  console.log(response)
  console.log(response.status)

  if (response.data) {

    if (response.status === 200 ) {
      const token = response.data.token;

      localStorage.setItem('token', token);

      let timerInterval;
      Swal.fire({
        icon: 'success',
        title: 'Admin Login',
        text: response.data.message,
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
          window.location.href = '/admin/dashboard';

        }
      })

    }

  }

}).catch((error) => {

  if(error.response) {

   if(error.response.status === 422 && error.response.data) {

      const fieldError = error.response.data.error;

    const msg = validationError(fieldError);

    displaySwal(msg);

    

    }

    if(error.response.status === 401 && error.response.data) {

      const msg = error.response.data.message;

      displaySwal(msg);
    }

    if(error.response.status === 403 && error.response.data) {

      const msg = error.response.data.message;

      displaySwal(msg);
    }


  }

}) 



});

}

const reset = document.querySelector('.js-reset');

if (reset) {


reset.addEventListener('click', () => {

const value = document.getElementById('reset_email').value;

sendResetOtp(value);


})

}

const verify = document.querySelector('.js-verify');
let adminOtp;

if (verify) {

  verify.addEventListener('click', () => {

     adminOtp = document.querySelector('#otp').value;
    const adminEmail = document.getElementById('reset_email').value;

    verifyOtp(adminEmail, adminOtp);
   

  });
}

const changePassword = document.querySelector('.js-update');

if (changePassword) {

  changePassword.addEventListener('click', () => {

    const adminPassword = document.querySelector('#new').value;
    const adminConfirmPassword = document.querySelector('#confirm').value;
    //console.log(adminOtp);

    resetPassword(adminOtp, adminPassword, adminConfirmPassword);



  })
}


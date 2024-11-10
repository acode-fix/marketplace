
import { getToken,validationError,displaySwal } from "../helper/helper.js";
import { serverError } from "../admin/auth-helper.js";

const token = getToken()

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

if(token) {

  document.querySelector('.next-btn').addEventListener('click', (event) => {

  event.preventDefault();

   let errors;

  function validation() {

     errors = {};

   const email = document.querySelector('.email').value;
   const name = document.querySelector('.name').value;
   const phone_number = document.querySelector('.phone').value;
   const address = document.querySelector('.address').value;
   const gender = document.querySelector('input[name="gender"]:checked');
   const nationality = document.querySelector('.nationality').value
   

   const genderInput = gender ? gender.value : '';

   if(email.trim() === '') {

    errors['email'] = '* Email is required *';

   }

   if(name.trim() === '') {

    errors['name'] = '* Name is required *';

   }

   if(phone_number.trim() === '') {

    errors['phone'] = '* Phone is required *';

   }

   if(address.trim() === '') {

    errors['address'] = '* Address is required *';


   }

   if(genderInput === '') {

    errors['gender'] = '* Gender is required *';
   }
   
   if(nationality.trim() === '') {

    errors['nationality'] = '* Nationality is required *';

   }


   for (let field in errors) {
   // console.log(field);

    document.getElementById(`${field}_error`).innerHTML = errors[field];
    
   }


  }

  
  validation();

  const check = [];

  for(let field in errors) {
    check.push(field);

  }
    
  if(check.length === 0) {

    const form = document.getElementById('mobile-bio-form');
    const formData = new FormData(form);

    for (let field of formData) {
      console.log(field[0] + ':' + field[1]);
    }

      axios.post('/api/v1/verify/bio', formData, {

        headers: {
          'Content-type': 'multipart/form-data',
        }

      }).then((response) => {

       // console.log(response);

        if(response.status === 200 && response.data ) {

          let timerInterval;
         Swal.fire({

            icon: 'success',
            title: 'Bio-Form Submission Successful',
            confirmButtonColor: '#ffb705',
            text: response.data.message,
            timer: 2000,
            timerProgressBar: true,

            didOpen: () => {

              Swal.showLoading();
              const timer = Swal.getPopup().querySelector("b");
              timerInterval = setInterval(() => {

              }, 1000);

        },
        willClose: () => {

          clearInterval(timerInterval);
         window.location.href = '/nin';

        }
          })




        }


        

      }).catch((error) => {
        
        if (error.response) {

              if(error.response.status === 422 && error.response.data) {
  
                  const fieldError = error.response.data.errors;
  
                  const msg = validationError(fieldError);
  
                  displaySwal(msg);
  
                  
  
              }
  
              if(error.response.status === 400 && error.response.data) {
  
                  Swal.fire({
                      icon: 'error',
                      title: 'Submission Error',
                      confirmButtonColor: '#ffb705',
                      text: error.response.data.message,
                  })
  
  
              }
  
              if(error.response.status === 500) {
  
                  serverError();
  
  
              }
          }
      

      })


    }else {

      console.log('no');

     }



  })









}


import { getToken, validationError, displaySwal } from "../helper/helper.js";
import { serverError } from "../admin/auth-helper.js";

const token = getToken();

if(token) {

  document.querySelector('.next-btn').addEventListener('click', (event) => {
    event.preventDefault();

    const badgeType = document.querySelector('input[name="badge_type"]:checked');

    if(!badgeType) {
      document.querySelector('.error').innerHTML = '* Badge type is required *';
      
    } else {

      axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

      const form = document.getElementById('form1');
      const formData = new FormData(form);

      for(let field of formData) {
      //  console.log(field[0] +':' + field[1]);
      }

      axios.post('/api/v1/verify/badge', formData, {
        headers: {
          'Content-type': 'multipart/form-data',
        }
      }).then((response) => {
       // console.log(response);

        if(response.status === 200 && response.data) {

          let timerInterval;
          Swal.fire({
 
             icon: 'success',
             title: 'Badge Type Submission Successful',
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
              window.location.href = '/success';
    
            }
           })
 

        }
      }).catch((error) => {
        //console.log(error);
        if(error.response) {

          if(error.response.status === 422 && error.response.data) {

            const fieldError = error.response.data.errors;

            const msg = validationError(fieldError);

            displaySwal(msg);



        }
        if(error.response.status === 404 && error.response.data) {

            Swal.fire({
                icon: 'error',
                confirmButtonColor: '#ffb705',
                title: 'Identification Error',
                text: error.response.data.message,
            })


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

    }
   
   


  })

}else {
 // console.log('no');
}
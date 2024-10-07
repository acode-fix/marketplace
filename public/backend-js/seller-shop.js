import { serverError } from "./index.js";

const token = localStorage.getItem('apiToken');

axios.defaults.headers.common['Authorization'] =  `Bearer ${token}`;

 const userId = localStorage.getItem('userId');

 if(!userId) {

          Swal.fire({ 
            icon: 'error',
            title: 'Resources Unavailable',
            text:  'Acess Denied!! ',
        }).then(() => {
          window.location.href = '/';
        });

       

 }else if (token) {

        axios.get('/api/v1/verified-seller/details', {

          params: {
            userId,
          },

          headers: {
            'Content-type': 'application/json',
        }

        }).then((response) => {

          console.log(response)

          if(response.status === 200 && response.data) {

            const data = response.data.data;

            console.log(data);

          }

        }).catch((error) => {
          
          console.log(error);

          if (error.response) {

            if(error.response.status === 404  && error.response.data) {

              Swal.fire({
                icon: 'error',
                title: 'Verification',
                text: error.response.data.message,
             })

            } 

            if(error.response.status === 500) {

              serverError();

            } else {

              Swal.fire({
                icon: 'error',
                title: 'Request Error',
                text: 'Something went wrong. Please try again later.',
              });

            }


          }

        })

 }else {
          Swal.fire({
            icon: 'error',
            title: 'Unauthenticated User',
            text: 'Please log in.',           
        }).then(() => {
          window.location.href = '/';

        });

}

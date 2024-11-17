import { getToken} from "../helper/helper.js";
import { serverError } from "../admin/auth-helper.js";

const token = getToken();

if(token) {

  document.getElementById('proceedBtn').addEventListener('click', () => {
    
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;


    axios.get('api/v1/payment/init', {

    }).then((response) => {
       console.log(response);
 
        if (response.data) {

            const url = response.data.paystack_url;

            window.location.href = url;
        }

      //  console.log(response);

    })
    
    .catch((error) => {
       console.log(error);

        if(error.response) {

            if(error.response.status === 404 && error.response.data) {

                Swal.fire({
                    icon: 'error',
                    confirmButtonColor: '#ffb705',
                    title: 'Paystack Init Error',
                    text: error.response.data.message,
                })


            }
            if(error.response.status === 400 && error.response.data) {

                Swal.fire({
                    icon: 'error',
                    confirmButtonColor: '#ffb705',
                    title: 'Paystack verification',
                    text: error.response.data.message,
                })


            }

            if(error.response.status === 500) {
                serverError();

            }


        }



    })


  });




}else {
 // console.log('no')
}
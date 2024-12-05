import { getUser } from "./helper/helper.js";

const token = localStorage.getItem('token');

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;


if(!token) {

  Swal.fire({
    icon: 'error',
    title: 'Unauthenticated User',
    confirmButtonColor: '#ffb705',
    text: 'Please log in.'
}).then(() => {

    window.location.href = '/admin/login'; 
    
});

}

//const fullDetails = JSON.parse(localStorage.getItem('userDetail'));

const userId = JSON.parse(localStorage.getItem('userId'));

console.log(userId);

async function loadUser() {

  const fullDetails = await getUser(userId);

 // console.log(fullDetails);

  return fullDetails;
  
}


const fullDetails = await loadUser();



//console.log(fullDetails);

for (let field in fullDetails ) {

        const element  = document.getElementById(`${field}_data`);

        console.log(field)

        if(field === 'nin_file')  {

          const ninElement = document.getElementById('nin-file');

          if(fullDetails[field]) {

            ninElement.src = `/uploads/nins/${fullDetails['nin_file']}`;


          }else {

            ninElement.src = '';

            document.getElementById('nin-error').textContent = 'No Data Yet';

          }
                

        }


        if(field === 'selfie_photo') {

          const imgElement = document.getElementById('selfie-photo');

          if(fullDetails[field]) {

            imgElement.src = `/uploads/selfiePhotos/${fullDetails['selfie_photo']}`;

          }else {
            
            imgElement.src = '';

            document.getElementById('selfie-error').textContent = 'No Data Yet';

          }
        

        }


        if(field === 'payment') {

            if(fullDetails[field]) {

                  const payElement = document.getElementById('payment_status');

                  const pay = getPayment(fullDetails[field]);

                  payElement.textContent = pay.status ? 'Success' : 'No Data Yet';

                  const amountStatus = document.getElementById('amount_status');
                  
                  amountStatus.textContent = pay.amount ? pay.amount : 'No Data Yet';

            } 
 
        }

 if(element) {

  element.textContent = fullDetails[field] === null ? 'No Data Yet' : fullDetails[field];

 }
   


}

function getPayment(paymentDetails) {

   const pay = paymentDetails.find((payment) => {

     return    payment.status ===  1 

  });

  return pay || {status: 0, amount: 0};
  
}





 

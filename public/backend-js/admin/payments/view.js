import { formatPrice } from "../../helper/helper.js";
import { formatDate, getToken } from "../helper/helper.js";

const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

axios.get('/api/v1/admin/payments/view').then((response) => {

 // console.log(response);

  const successPayments = response.data.successPayments;
  const failedPayments = response.data.failedPayments;

  loadSuccessPayments(successPayments);
  loadFailedPayments(failedPayments);



  
}).catch((error) => {

  console.log(error);

});


function loadSuccessPayments(payments) {

  
  let display = `<table id="example1" class="table table-striped nowrap" style="width:100%">'
        <thead>
            <tr> 
                <th>S/N</th>
                <th>Name</th>
                <th>Status</th>
                <th>Amount</th>
                <th>Transaction Reference</th>
                <th>Description</th>
                <th>Payment Date</th>
                <th>Full Details</th>
               
            </tr>
        </thead>
        <tbody>`; 

      payments.forEach((payment, index) => {

      display += ` <tr>
                <td>${index + 1}</td>
                <td>${payment.user.name ?? 'N/A'} </td>
                <td>${payment.status == 1 ? 'success' : 'N/A'} </td>
                <td> &#8358;${formatPrice(payment.amount) ?? 'N/A'}</td>
                <td>${payment.transaction_reference ?? 'N/A'}</td>
                <td>${payment.description}</td>
                <td>${formatDate(payment.payment_date) ?? 'N/A'}</td>
                <td><a class="user-link full-details" data-user-id="${payment.user_id}" href="" >Full Details</a></td>   
            </tr>`;

      });

      display += `</tbody></table>`;


    document.querySelector('.success-tab').innerHTML = display;


      $('#example1').DataTable({
      responsive: true
      });


}


function loadFailedPayments(payments) {

  
  let display = `<table id="example2" class="table table-striped nowrap" style="width:100%">'
        <thead>
            <tr> 
                <th>S/N</th>
                <th>Name</th>
                 <th>Status</th>
                <th>Amount</th>
                <th>Transaction Reference</th>
                <th>Description</th>
                <th>Payment Date</th>
                <th>Full Details</th>
               
            </tr>
        </thead>
        <tbody>`; 

      payments.forEach((payment, index) => {

      display += ` <tr>
                <td>${index + 1}</td>
                <td>${payment.user.name ?? 'N/A'} </td>
                <td>${payment.status == -1 ? 'Failed' : 'N/A'} </td>
                <td> &#8358;${formatPrice(payment.amount) ?? 'N/A'}</td>
                <td>${payment.transaction_reference ?? 'N/A'}</td>
                <td>${payment.description}</td>
                <td>${formatDate(payment.created_at) ?? 'N/A'}</td>
                <td><a class="user-link full-details" data-user-id="${payment.user_id}" href="" >Full Details</a></td>   
            </tr>`;

      });

      display += `</tbody></table>`;


    document.querySelector('.failed-tab').innerHTML = display;


      $('#example2').DataTable({
      responsive: true
      });


}


document.addEventListener('click', (event) => {
  
  if(event.target.classList.contains('full-details')) {

    event.preventDefault();

   const  userId = event.target.dataset.userId;


    localStorage.setItem('userId', JSON.stringify(userId));
    window.location.href = '/admin/view/user';

  }

});
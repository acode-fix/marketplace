import { formatPrice } from "../../helper/helper.js";
import { formatDate, getToken } from "../helper/helper.js";

const token = getToken();

const paymentFilter = {

};

const amount  = document.getElementById('amount');
const status = document.getElementById('status');
const trx = document.getElementById('trx');
const from = document.getElementById('from');
const to = document.getElementById('to');

amount.addEventListener('change', () => {
  paymentFilter.amount = amount.value;
});

status.addEventListener('change', () => {
  paymentFilter.status  = status.value;
});

trx.addEventListener('change', () => {
  paymentFilter.trx = trx.value;
});

from.addEventListener('change', () => {
  paymentFilter.from = from.value;
});

to.addEventListener('change', () => {
  paymentFilter.to = to.value;
});


document.getElementById('filterBtn').addEventListener('click', () => {

      console.log(paymentFilter);

      axios.get('/api/v1/admin/payments/filter', {params: paymentFilter}).then((response) => {

        const payments = response.data.payments;

        loadPayments(payments);

      }).catch((error) => {

        console.log(error);

      })

});



function loadPayments(payments) {


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
                <td>${payment.status == 1 ? 'success' : 'Failed'} </td>
                <td> &#8358;${formatPrice(payment.amount) ?? 'N/A'}</td>
                <td>${payment.transaction_reference ?? 'N/A'}</td>
                <td>${payment.description}</td>
                <td>${formatDate(payment.payment_date) ?? 'N/A'}</td>
                <td><a class="user-link full-details" data-user-id="${payment.user_id}" href="" >Full Details</a></td>   
            </tr>`;

      });

      display += `</tbody></table>`;


    document.querySelector('.js-content').innerHTML = display;


      $('#example1').DataTable({
      responsive: true
      });




}

document.addEventListener('click', (event) => {

  event.preventDefault();

  if(event.target.classList.contains('full-details')) {

   const  userId = event.target.dataset.userId;


    localStorage.setItem('userId', JSON.stringify(userId));
    window.location.href = '/admin/view/user';

  }

});












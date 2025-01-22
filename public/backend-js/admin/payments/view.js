import { formatPrice } from "../../helper/helper.js";
import { formatDate, getToken } from "../helper/helper.js";

const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;



let successPaymentsTableInstance;

successPaymentsTableInstance = $('#datatable').DataTable({
    processing: true,
    serverSide: true, 
    ajax: function (data, callback, settings) {
        const page = data.start / data.length + 1;
        const perPage = data.length; 
        const searchTerm = data.search.value; 
        axios.get('/api/v1/admin/payments/success', {
            params: {
                page: page,
                per_page: perPage,
                search: searchTerm,
            
            },
        })
        .then((response) => {
                    
        const result = response.data;

       // console.log(response);

  
            callback({
                draw: data.draw,
                recordsTotal: result.total, // Total number of records without filtering
                recordsFiltered: result.filtered_total, // Total number of records after filtering
                data: result.payments, // Data for the current page
            });
        })
        .catch((error) => {
            console.error("Error fetching data:", error);
        });
    },
    columns: [
        {
            data: null,
            render: function (data, type, row, meta) {
                return (meta.row + 1) + (meta.settings._iDisplayStart); 
            }
        },

        { data: 'user.name', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'status', render: function(data) { return data == 1 ? '<p class="text-success">Success<p>' : 'N/A'; }},
        { data: 'amount', render: function(data) { return  ` &#8358;${formatPrice(data) ?? 'N/A'} ` }},
        { data: 'invoice_number',render: function(data) { return data ? data : 'N/A' }},
        { data: 'transaction_reference',render: function(data) { return data ? data : 'N/A' }},
        { data: 'description', render: function(data) { return data ? data : 'N/A' }},
        { data: 'payment_date', render: function(data) { return `${formatDate(data)} ?? 'N/A`}},

        {
            data: null,
            orderable: false,
            searchable: false,
            render: function (data) {
                return `<button class="btn btn-sm btn-light user-link" data-user-id="${data.user_id}">Full details</button>`;
            },
        },
       

        
    ],
    responsive: true,
});


$('#datatable_filter input').on('keyup', function () {
  successPaymentsTableInstance.search(this.value).draw();
});



let failedPaymentsTableInstance;

failedPaymentsTableInstance = $('#datatable2').DataTable({
    processing: true,
    serverSide: true, 
    ajax: function (data, callback, settings) {
        const page = data.start / data.length + 1;
        const perPage = data.length; 
        const searchTerm = data.search.value; 
        axios.get('/api/v1/admin/payments/failed', {
            params: {
                page: page,
                per_page: perPage,
                search: searchTerm,
            
            },
        })
        .then((response) => {
                    
        const result = response.data;

       // console.log(response);

  
            callback({
                draw: data.draw,
                recordsTotal: result.total, // Total number of records without filtering
                recordsFiltered: result.filtered_total, // Total number of records after filtering
                data: result.payments, // Data for the current page
            });
        })
        .catch((error) => {
            console.error("Error fetching data:", error);
        });
    },
    columns: [
        {
            data: null,
            render: function (data, type, row, meta) {
                return (meta.row + 1) + (meta.settings._iDisplayStart); 
            }
        },

        { data: 'user.name', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'status', render: function(data) { return data == 1 ? 'success' : '<p class="text-danger">Failed<p>'; }},
        { data: 'amount', render: function(data) { return  ` &#8358;${formatPrice(data) ?? 'N/A'} ` }},
        { data: 'invoice_number',render: function(data) { return data ? data : 'N/A' }},
        { data: 'transaction_reference',render: function(data) { return data ? data : 'N/A' }},
        { data: 'description', render: function(data) { return data ? data : 'N/A' }},
        { data: 'created_at', render: function(data) { return `${formatDate(data)}`}},

        {
            data: null,
            orderable: false,
            searchable: false,
            render: function (data) {
                return `<button class="btn btn-sm btn-light full-details" data-user-id="${data.user_id}">Full details</button>`;
            },
        },
       

        
    ],
    responsive: true,
});


$('#datatable_filter input').on('keyup', function () {
  failedPaymentsTableInstance.search(this.value).draw();
});



document.addEventListener('click', (event) => {
  
  if(event.target.classList.contains('full-details')) {

    event.preventDefault();

   const  userId = event.target.dataset.userId;


    localStorage.setItem('userId', JSON.stringify(userId));
    window.location.href = '/admin/view/user';

  }

});



/*

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

*/
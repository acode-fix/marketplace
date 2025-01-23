import { formatDate, getDelistedProducts, getListedProducts, getToken } from "../helper/helper.js";

 const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;



let dataTableInstance;

dataTableInstance = $('#datatable').DataTable({
    processing: true,
    serverSide: true, 
    ajax: function (data, callback, settings) {
        const page = data.start / data.length + 1;
        const perPage = data.length; 
        const searchTerm = data.search.value; 

        // Fetch data from the server with pagination and search term
        axios.get('/api/v1/admin/listed-products', {
            params: {
                page: page,
                per_page: perPage,
                search: searchTerm, // Send the search term to the server
            },
        })
        .then((response) => {

          //  console.log(response.data.products);
            const result = response.data;

            // Pass data to DataTable
            callback({
                draw: data.draw,
                recordsTotal: result.total, // Total number of records without filtering
                recordsFiltered: result.filtered_total, // Total number of records after filtering
                data: result.products, // Data for the current page
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
                return (meta.row + 1) + (meta.settings._iDisplayStart); // Serial Number (starts from 1)
            }
        },
        { data: 'title', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'category.name', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'quantity', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'location', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'description', render: function(data) { return data ? data : 'N/A'; }},
        {
            data: null,
            orderable: false,
            searchable: false,
            render: function (data) {
                return `<button class="btn btn-sm btn-light full-details " data-product-id="${data.id}">Full details</button>`;
            },
        },
    ],
    responsive: true,
});

  // Search input handler
  $('#datatable_filter input').on('keyup', function () {
      // Trigger the search on the DataTable to filter the data
      dataTableInstance.search(this.value).draw();
  });


  let unListedTableInstance;

  unListedTableInstance = $('#datatable2').DataTable({
    processing: true,
    serverSide: true, 
    ajax: function (data, callback, settings) {
        const page = data.start / data.length + 1;
        const perPage = data.length; 
        const searchTerm = data.search.value; 

        // Fetch data from the server with pagination and search term
        axios.get('/api/v1/admin/delisted-products', {
            params: {
                page: page,
                per_page: perPage,
                search: searchTerm, // Send the search term to the server
            },
        })
        .then((response) => {

        //  console.log(response);
            const result = response.data;

            // Pass data to DataTable
            callback({
                draw: data.draw,
                recordsTotal: result.total, // Total number of records without filtering
                recordsFiltered: result.filtered_total, // Total number of records after filtering
                data: result.products, // Data for the current page
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
                return (meta.row + 1) + (meta.settings._iDisplayStart); // Serial Number (starts from 1)
            }
        },
        { data: 'title', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'category.name', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'location', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'description', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'deleted_at', render: function(data) { return `${formatDate(data)}` }},
        {
            data: null,
            orderable: false,
            searchable: false,
            render: function (data) {
                return `<button class="btn btn-sm btn-light full-details " data-product-id="${data.id}">Full details</button>`;
            },
        },
    ],
    responsive: true,
});

  // Search input handler
  $('#datatable2_filter input').on('keyup', function () {
      // Trigger the search on the DataTable to filter the data
      unListedTableInstance.search(this.value).draw();
  });



  let productRequestdataTable;

  productRequestdataTable = $('#datatable3').DataTable({
    processing: true,
    serverSide: true, 
    ajax: function (data, callback, settings) {
        const page = data.start / data.length + 1;
        const perPage = data.length; 
        const searchTerm = data.search.value; 

        // Fetch data from the server with pagination and search term
        axios.get('/api/v1/admin/unlisted-products', {
            params: {
                page: page,
                per_page: perPage,
                search: searchTerm, // Send the search term to the server
            },
        })
        .then((response) => {

            const result = response.data;

          //  console.log(result);

            // Pass data to DataTable
            callback({
                draw: data.draw,
                recordsTotal: result.total, // Total number of records without filtering
                recordsFiltered: result.filtered_total, // Total number of records after filtering
                data: result.products, // Data for the current page
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
                return (meta.row + 1) + (meta.settings._iDisplayStart); // Serial Number (starts from 1)
            }
        },

        { data: 'user.name', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'user.phone_number', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'user.address', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'request', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'created_at', render: function(data) { return `${formatDate(data)}`}},
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

  // Search input handler
  $('#datatable3_filter input').on('keyup', function () {
      // Trigger the search on the DataTable to filter the data
      productRequestdataTable.search(this.value).draw();
  });




  










  
document.addEventListener('click', (event) => {

  if (event.target.classList.contains('user-link')) {
    event.preventDefault();

    const userId = event.target.dataset.userId;
   // console.log('User ID:', userId);

    localStorage.setItem('userId', JSON.stringify(userId));
    window.location.href = '/admin/view/user';
}

  if (event.target.classList.contains('full-details')) {
      event.preventDefault();

      const productId = event.target.dataset.productId;
     // console.log('Product ID:', productId);

      localStorage.setItem('productId', JSON.stringify(productId));
      window.location.href = '/admin/view/product-details';
  }


});







/*
async function loadListedProducts() {

  const products = await getListedProducts();

      
        let display = `<table id="example1" class="table table-striped nowrap" style="width:100%">'
        <thead>
            <tr> 
                <th>S/N</th>
                <th>Title</th>
                <th>Category</th>
                <th>Location</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Full Details</th>
               
            </tr>
        </thead>
        <tbody>`;

      products.forEach((product, index) => {

      display += ` <tr>
                <td>${index + 1}</td>
                <td>${product.title ?? 'N/A'} </td>
                <td>${product.category.name ?? 'N/A'}</td>
                <td>${product.location ?? 'N/A'}</td>
                <td>${product.description ?? 'N/A'}</td>
                <td>${product.quantity ?? 'N/A'}</td>
                <td><a class="user-link full-details" data-product-id="${product.id}" href="" >Full Details</a></td>   
            </tr>`;

      });

      display += `</tbody></table>`;


    document.querySelector('.listed-products').innerHTML = display;


      $('#example1').DataTable({
      responsive: true
      });


}

loadListedProducts();

// let productId;


async function loadDeletedProducts() {

  const products = await getDelistedProducts();

  let display = `<table id="example2" class="table table-striped nowrap" style="width:100%">'
        <thead>
            <tr> 
                <th>S/N</th>
                <th>Title</th>
                <th>Category</th>
                <th>Location</th>
                <th>Description</th>
                <th>Deletion Date</th>
                <th>Full Details</th>
               
            </tr>
        </thead>
        <tbody>`;

      products.forEach((product, index) => {

      display += ` <tr>
                <td>${index + 1}</td>
                <td>${product.title ?? 'N/A'} </td>
                <td>${product.category.name ?? 'N/A'}</td>
                <td>${product.location ?? 'N/A'}</td>
                <td>${product.description}</td>
                <td>${formatDate(product.deleted_at) ?? 'N/A'}</td>
                <td><a class="user-link full-details" data-product-id="${product.id}" href="" >Full Details</a></td>   
            </tr>`;

      });

      display += `</tbody></table>`;


    document.querySelector('.delisted-products').innerHTML = display;


      $('#example2').DataTable({
      responsive: true
      });



}

loadDeletedProducts();


axios.get('/api/v1/admin/unlisted-products').then((response) => {
  console.log(response);

  const userProductRequest = response.data.userRequest;

  loadUserRequest(userProductRequest);

}).catch((error) => {

  console.log(error);

});


function loadUserRequest(products) {

      let display = `<table id="example3" class="table table-striped nowrap" style="width:100%">'
      <thead>
          <tr> 
              <th>S/N</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Location</th>
              <th>Product Request</th>
              <th>Request Date</th>
              <th>Full Details</th>
            
          </tr>
      </thead>
      <tbody>`;

    products.forEach((product, index) => {

    display += ` <tr>
              <td>${index + 1}</td>
              <td>${product.user.name ?? 'N/A'} </td>
              <td>${product.user.phone_number ?? 'N/A'}</td>
              <td>${product.location ?? 'N/A'}</td>
              <td>${product.request ?? 'N/A'}</td>
              <td>${formatDate(product.created_at) ?? 'N/A'}</td>
              <td><a class="user-link  user-link" data-user-id="${product.user_id}" href="" >Full Details</a></td>   
          </tr>`;

    });

    display += `</tbody></table>`;


    document.querySelector('.unlisted-products').innerHTML = display;


    $('#example3').DataTable({
    responsive: true
    });



}



document.addEventListener('click', (event) => {

  if (event.target.classList.contains('user-link')) {
      event.preventDefault();

      const userId = event.target.dataset.userId;
     // console.log('User ID:', userId);

      localStorage.setItem('userId', JSON.stringify(userId));
      window.location.href = '/admin/view/user';
  }


  if (event.target.classList.contains('full-details')) {
      event.preventDefault();

      const productId = event.target.dataset.productId;
     // console.log('Product ID:', productId);

      localStorage.setItem('productId', JSON.stringify(productId));
      window.location.href = '/admin/view/product-details';
  }


});


*/

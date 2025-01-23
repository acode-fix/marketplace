import { getToken } from "../helper/helper.js";

const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

 let salesTableInstance;

 salesTableInstance = $('#datatable').DataTable({
    processing: true,
    serverSide: true, 
    ajax: function (data, callback, settings) {
        const page = data.start / data.length + 1;
        const perPage = data.length; 
        const searchTerm = data.search.value; 

        // Fetch data from the server with pagination and search term
        axios.get('/api/v1/admin/products-performance', {
            params: {
                page: page,
                per_page: perPage,
                search: searchTerm,
               
            },
        })
        .then((response) => {

      //   console.log(response);
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
        { data: 'sold', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'category.name', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'location', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'description', render: function(data) { return data ? data : 'N/A'; }},
  
        {
            data: null,
            orderable: false,
            searchable: false,
            render: function (data) {
                return `<button class="btn btn-sm btn-light sales-details " data-product-id="${data.id}">Full details</button>`;
            },
        },
    ],
    responsive: true,
});
  // Search input handler
  $('#datatable_filter input').on('keyup', function () {
      // Trigger the search on the DataTable to filter the data
      salesTableInstance.search(this.value).draw();
  });

  let connectsTableInstance;

  connectsTableInstance = $('#datatable2 ').DataTable({
    processing: true,
    serverSide: true, 
    ajax: function (data, callback, settings) {
        const page = data.start / data.length + 1;
        const perPage = data.length; 
        const searchTerm = data.search.value; 

        // Fetch data from the server with pagination and search term
        axios.get('/api/v1/admin/products-connect-performance', {
            params: {
                page: page,
                per_page: perPage,
                search: searchTerm,
               
            },
        })
        .then((response) => {
        
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
      
        { data: 'total_engagements', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'product_name', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'category_name', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'location', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'description', render: function(data) { return data ? data : 'N/A'; }},
  
        {
            data: null,
            orderable: false,
            searchable: false,
            render: function (data) {
                return `<button class="btn btn-sm btn-light connect-details " data-product-id="${data.product_id}">Full details</button>`;
            },
        },
    ],
    responsive: true,
});
  // Search input handler
  $('#datatable2_filter input').on('keyup', function () {
      // Trigger the search on the DataTable to filter the data
      connectsTableInstance.search(this.value).draw();
  });


  document.addEventListener('click', (event) => {

    if(event.target.classList.contains('sales-details')) {
  
      event.preventDefault();
  
      const productId = event.target.dataset.productId;
     
         // console.log(productId);
     
         localStorage.setItem('productId', JSON.stringify(productId));
         window.location.href = '/admin/view/product-details';
     
       }
  
  
  
    if(event.target.classList.contains('connect-details')) {
      event.preventDefault();
  
    const productId = event.target.dataset.productId;
  
      // console.log(productId);
  
      localStorage.setItem('productId', JSON.stringify(productId));
      window.location.href = '/admin/view/product-details';
  
    }
  
  });





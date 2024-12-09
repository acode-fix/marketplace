import { formatDate, getDelistedProducts, getListedProducts, getToken } from "../helper/helper.js";

 const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;


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

 let productId;

document.addEventListener('click', (event) => {

  event.preventDefault();

  if(event.target.classList.contains('full-details')) {

     productId = event.target.dataset.productId;

    // console.log(productId);

    localStorage.setItem('productId', JSON.stringify(productId));
    window.location.href = '/admin/view/product-details';

  }

});



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

  event.preventDefault();

  if(event.target.classList.contains('user-link')) {

   const  userId = event.target.dataset.userId;


    localStorage.setItem('userId', JSON.stringify(userId));
    window.location.href = '/admin/view/user';

  }

});

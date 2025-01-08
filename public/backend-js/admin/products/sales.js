import { getToken } from "../helper/helper.js";

const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;


axios.get('/api/v1/admin/products-performance').then((response) => {
  console.log(response);
  if(response.status === 200 && response.data) {

    const products_sold = response.data.products_sold;
    const productEngagements = response.data.productEngagements;

    loadProducts(products_sold);

    loadProductsEngagement(productEngagements)


  }
 

}).catch((error) => {

  console.log(error);
});




function loadProducts(products) {
 
  let display = `<table id="example1" class="table table-striped nowrap" style="width:100%">'
        <thead>
            <tr> 
                <th>S/N</th>
                <th>Title</th>
                <th>Amount Sold</th>
                <th>Category</th>
                <th>Location</th>
                <th>Description</th>
                <th>Full Details</th>
               
            </tr>
        </thead>
        <tbody>`;

      products.forEach((product, index) => {

      display += ` <tr>
                <td>${index + 1}</td>
                <td> ${product.title ?? 'N/A'}</td>
                <td>${product.sold ?? 'N/A'} </td>
                <td>${product.category.name ?? 'N/A'}</td>
                <td>${product.location ?? 'N/A'}</td>
                <td>${product.description}</td>
                <td><a class="user-link sales-details" data-product-id="${product.id}" href="" >Full Details</a></td>   
            </tr>`;

      });

      display += `</tbody></table>`;


    document.querySelector('.sales').innerHTML = display;


      $('#example1').DataTable({
      responsive: true
      });
}



function loadProductsEngagement(products) {

 // return console.log(products)
 
  let display = `<table id="example2" class="table table-striped nowrap" style="width:100%">'
        <thead>
            <tr> 
                <th>S/N</th>
                <th>Total Connects</th>
                <th>Title</th>
                <th>Category</th>
                <th>Location</th>
                <th>Description</th>
                <th>Full Details</th>              
            </tr>
        </thead>
        <tbody>`;

      products.forEach((product, index) => {

      display += `
                <tr>
                <td>${index + 1}</td>
                <td>${product.total_engagements ?? 'N/A'} </td>
                <td> ${product.product_name ?? 'N/A'}</td>
                <td>${product.category_name ?? 'N/A'}</td>
                <td>${product.location ?? 'N/A'}</td>
                <td>${product.description}</td>
                <td><a class="user-link connect-details" data-product-id="${product.product_id}" href="" >Full Details</a></td>   
               </tr>`;

      });

      display += `</tbody></table>`;


    document.querySelector('.connects').innerHTML = display;


      $('#example2').DataTable({
      responsive: true
      });


}


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




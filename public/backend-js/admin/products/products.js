import { getListedProducts, getToken } from "../helper/helper.js";

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

  if(event.target.classList.contains('full-details')) {

    event.preventDefault();

     productId = event.target.dataset.productId;


  }

});

console.log(productId); 
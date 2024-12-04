import {
    getToken
} from "../helper/helper.js";

const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

axios.get('/api/v1/admin/products-category').then((response) => {
   //console.log(response)

    const categories = response.data.categories;

    loadCategories(categories);





}).catch((error) => {

    console.log(error);

});


function loadCategories(categories) {

    let select = `<select id="product-category" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
    <option selected>Choose Product Category</option>`;

    categories.forEach((category) => {
        select += ` <option value="${category.id}">${category.name}</option>`
    });

    select += `</select>`;

  const selEl =  document.querySelector('.js-select');

  if(selEl) {

    selEl.innerHTML = select;
  }

  const category = document.getElementById('product-category');

  getCategoryEl(category)

}



const conditionQuery = {
  
}




const condition = document.getElementById('product-condition');
const actualPrice = document.getElementById('actual-price');
const promoPrice  = document.getElementById('promo-price');
const askPrice = document.querySelector("input[name='ask_for_price']");

condition.addEventListener('change', () => {
   conditionQuery.condition = condition.value;
});

actualPrice.addEventListener('change', () => {
  conditionQuery.actual_price = actualPrice.value;
});

promoPrice.addEventListener('change', () => {
  conditionQuery.promo_price = promoPrice.value;
});

askPrice.addEventListener('change', () => {
  conditionQuery.ask_for_price = askPrice.checked;

});

function getCategoryEl(category) {
 
  category.addEventListener('change', () => {
   conditionQuery.category = category.value;

  });
}


document.getElementById('filterBtn').addEventListener('click', () => {
  console.log(conditionQuery.ask_for_price);

  axios.get('/api/v1/admin/filter', {
    params: {
      condition: conditionQuery.condition,
      category: conditionQuery.category,
      actual_price: conditionQuery.actual_price,
      promo_price: conditionQuery.promo_price,
      ask_for_price: conditionQuery.ask_for_price,
    }
  }).then((response) => {
    console.log(response);

    if(response.status === 200 && response.data) {

      const products = response.data.products.data;

      loadProducts(products);


    }

  }).catch((error) => {
    console.log(error);

  })


  });


  function loadProducts(products) {

    let display = `<table class="table">
          <thead>
            <tr>
              <th scope="col">S/N</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Location</th>
              <th scope="col">Description</th>
              <th scope="col">Full Details</th>
            </tr>
          </thead>`;

  products.forEach((product, index) => {

    display += `  <tbody class="table-hover">
            <tr>
              <th scope="row">${index + 1}</th>
              <td>${product.title ?? 'N/A'}</td>
              <td>${product.category.name}</td>
              <td>${product.location}</td>
              <td>${product.description}</td>
               <td><a class="user-link full-details" data-product-id="${product.id}" href="" >Full Details</a></td>    
            </tr>
            <tr>
              </tbody>`;
    });

  display += `</table>`;


  document.querySelector('.js-content').innerHTML = display;

  <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
  </nav> 

          
  
     
  }





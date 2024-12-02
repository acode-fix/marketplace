import {
    getToken
} from "../helper/helper.js";

const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

axios.get('/api/v1/admin/products-category').then((response) => {
   // console.log(response)

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
  condition: null,
  category: null,
  price:null,
}


const condition = document.getElementById('product-condition');

condition.addEventListener('change', () => {
   conditionQuery.condition = condition.value;
});


function getCategoryEl(category) {
 
  category.addEventListener('change', () => {
   conditionQuery.category = category.value;

  });
}

const price = document.getElementById('product-price');

price.addEventListener('change', () => {

  conditionQuery.price = price.value;

});

 
     



document.getElementById('filterBtn').addEventListener('click', () => {
  console.log(conditionQuery);

  axios.get('/api/v1/admin/filter', {
    params: {
      condition: conditionQuery.condition,
      category: conditionQuery.category,
      price: conditionQuery.price,
    
    

    }
  }).then((response) => {
    console.log(response);

  }).catch((error) => {
    console.log(error);

  })


  });





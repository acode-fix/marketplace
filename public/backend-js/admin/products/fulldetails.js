import { getToken } from "../helper/helper.js";

const token = getToken();

const productId = JSON.parse(localStorage.getItem('productId'));

console.log(productId);

axios.get(`/api/product-details/${productId}`).then((response) => {
  console.log(response);

  if(response.status === 200 && response.data) {
    const userData = response.data.product.user;

    for(let field in userData) {

      console.log(userData[field]);

     
      const element =  document.getElementById(`${field}_data`);



  if(element) {

    element.textContent = userData[field] === null ? 'No Data Yet' : userData[field];
  }

    }
  }

}).then((error) => {

  //console.log(error);

})
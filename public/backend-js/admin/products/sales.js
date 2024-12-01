import { getToken } from "../helper/helper.js";

const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

/*
axios.get('/api/v1/admin/products-performance').then((response) => {
  console.log(response);

}).catch((error) => {

  console.log(error);
})

*/
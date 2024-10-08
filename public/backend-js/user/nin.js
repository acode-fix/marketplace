import { getToken } from "../helper/helper.js";

const token = getToken();

if(token) {

  axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

  document.querySelector('.next-btn').addEventListener('click', (event) => {
    event.preventDefault();

    const form = document.getElementById('mobile-nin');
    const file = document.querySelector('.mobile-file');


    if(file.files.length > 0) {
      
        const formData = new FormData(form);

        for (let field of formData) {
          console.log(field[0] + '' + field[1])
          
        }

        axios.post('/api/v1/verify/nin', formData, {
          headers: {
            'Content-type': 'multipart/form-data',
          }
        }).then((response) => {
          console.log(response);

        }).catch((error) => {
          console.log(error);

        })

    }else {

      document.getElementById('error').innerHTML = '* Uploading NIN is required *';

    }
    
    
  });

}else {

  console.log('no')
}
import { serverError } from "./auth-helper.js";
import { logoutUser } from "./auth.js";

const token = localStorage.getItem('token');

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;


if(!token) {

  Swal.fire({
    icon: 'error',
    title: 'Unauthenticated User',
    text: 'Please log in.'
}).then(() => {

    window.location.href = '/admin/login'; 
    
});

}else { 

  axios.get('/api/v1/getuser', {

  }).then((response) => {

    //console.log(response)

  }).catch((error) => {
    console.log(error);


  });
}




const logOut = document.getElementById('adminLogOut');

logOut.addEventListener('click', function(event) {

        event.preventDefault(); 

        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes,I am sure!"

      }).then((result) => {

      if (result.isConfirmed) {

        logoutUser();
        
      }
      });

});



document.getElementById('view').addEventListener('click', () => {


  axios.get('/api/v1/verify/user').then((response) => {
   // console.log(response);

    if(response.status === 200 && response.data) {
      const data = response.data.data;
      //console.log(data);

    localStorage.setItem('userData', JSON.stringify(data));

     window.location.href = '/admin/verification/view';

    } 

    if(response.status === 500) {

      serverError();
    }


  }).catch((error) => {

    //console.log(error);

    if(error.response) {

      if(error.response.status === 404 && error.response.data) {

        Swal.fire({
            icon: 'error',
            title: 'Loading All User',
            text: error.response.data.message,
        })


    }


    }
  })

});





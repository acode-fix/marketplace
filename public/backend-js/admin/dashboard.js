import { logoutUser } from "./admin_auth.js";

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

    console.log(response)

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
    console.log(response);

  }).catch((error) => {
    console.log(error);
  })

})




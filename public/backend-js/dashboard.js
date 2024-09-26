
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




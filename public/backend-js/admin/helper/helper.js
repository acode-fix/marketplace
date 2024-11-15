export function getToken () {

 const token = localStorage.getItem('apiToken');
 if(token) {

    return token;
 }
 
 if(!token) {
 
     Swal.fire({
     icon: 'error',
     title: 'Login Required',
     text: 'Please log in to continue.',
     confirmButtonColor: '#ffb705',
 }).then(() => {
 
     window.location.href = '/admin/login'; 
     
 });

}

}


export function getUserById(userId) {

    
    axios.get('/api/v1/userDetails',  {
        params: {
            user:userId,
        }
    },

).then((response) => {
       console.log(response);

       if(response.status === 200 && response.data) {

            const data = response.data.data;
            localStorage.setItem('userDetail', JSON.stringify(data));

            window.location.href = '/admin/view/user'

       }
        
    }).catch((error) => {

        console.log(error);

        if(error.response) {

            if(error.response.status === 404 && error.response.data) {

                Swal.fire({
                    icon: 'error',
                    title: 'Loading All User',
                    confirmButtonColor: '#ffb705',
                    text: error.response.data.message,
                })
        
        
            }

            if(error.response.status === 500) {
                serverError();
            }
        }

    })
}
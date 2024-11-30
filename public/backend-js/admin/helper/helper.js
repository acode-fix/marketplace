export function getToken () {

 const token = localStorage.getItem('token');
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

//const token = getToken;

//axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;


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


export async function getUser(userId) {
    try {
      const response = await axios.get('/api/v1/userDetails', {
        params: {
            user:userId,
        }
      });
     // console.log(response);

      if(response.status === 200 && response.data) {
        const data = response.data.data

        console.log(data);

        return data;
      }
    } catch (error) {
      if(error.response) {
      //  console.error(error);


      }

      return null;
    }
  }


 export async function getRegisteredUser() {

    const token = localStorage.getItem('token');

    try {
        const response = await axios.get('/api/v1/admin/registered-user',{
            headers: {
                'Authorization': `Bearer ${token}`,
            }
        });
       // console.log(response);
  
        if(response.status === 200 && response.data) {
          const data = response.data.users
  
         // console.log(data);
  
          return data;
        }
      } catch (error) {
        if(error.response) {
        //  console.error(error);
  
  
        }
  
        return null;
      }


 }

 export function calculateTotal(users){

    const total = users.length;

    return total;

 }

 export async function getSuspendedUsers() {

    const token = localStorage.getItem('token');

    try {
        const response = await axios.get('/api/v1/admin/suspended-users',{
            headers: {
                'Authorization': `Bearer ${token}`,
            }
        });
       // console.log(response);
  
        if(response.status === 200 && response.data) {
          const data = response.data.users
  
         // console.log(data);
  
          return data;
        }
      } catch (error) {
        if(error.response) {
        //  console.error(error);
  
  
        }
  
        return null;
      }
    
 }

export async function getDeletedUsers() {

  const token = localStorage.getItem('token');

  try {
      const response = await axios.get('/api/v1/admin/deleted-account',{
          headers: {
              'Authorization': `Bearer ${token}`,
          }
      });
     // console.log(response);

      if(response.status === 200 && response.data) {
        const data = response.data.users

       // console.log(data);

        return data;
      }
    } catch (error) {
      if(error.response) {
      //  console.error(error);


      }

      return null;
    }

}


export async function getListedProducts() {

  try {
      const response = await axios.get('/api/v1/admin/listed-products',{
        
      });
     // console.log(response);

      if(response.status === 200 && response.data) {
        const data = response.data.products

      //  console.log(data);

        return data;
      }
    } catch (error) {
      if(error.response) {
        console.error(error);


      }

      return null;
    }


}


  

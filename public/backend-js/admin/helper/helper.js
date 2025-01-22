import dayjs from 'https://unpkg.com/dayjs@1.11.10/esm/index.js';
import { generateAvatar } from '../../helper/helper.js';

export function getToken() {

    const token = localStorage.getItem('token');
    if (token) {

        return token;
    }

    if (!token) {

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


    axios.get('/api/v1/userDetails', {
            params: {
                user: userId,
            }
        },

    ).then((response) => {
        console.log(response);

        if (response.status === 200 && response.data) {

            const data = response.data.data;
           // localStorage.setItem('userDetail', JSON.stringify(data));


            window.location.href = '/admin/view/user'

        }

    }).catch((error) => {

        console.log(error);

        if (error.response) {

            if (error.response.status === 404 && error.response.data) {

                Swal.fire({
                    icon: 'error',
                    title: 'Loading All User',
                    confirmButtonColor: '#ffb705',
                    text: error.response.data.message,
                })


            }

            if (error.response.status === 500) {
                serverError();
            }
        }

    })
}


export async function getUser(userId) {
    try {
        const response = await axios.get('/api/v1/userDetails', {
            params: {
                user: userId,
            }
        });
        // console.log(response);

        if (response.status === 200 && response.data) {
            const data = response.data.data

            //console.log(data);

            return data;
        }
    } catch (error) {
        if (error.response) {
            //  console.error(error);


        }

        return null;
    }
}


export async function getRegisteredUser() {

    const token = localStorage.getItem('token');

    try {
        const response = await axios.get('/api/v1/admin/registered-user', {
            headers: {
                'Authorization': `Bearer ${token}`,
            }
        });
        // console.log(response);

        if (response.status === 200 && response.data) {
            const data = response.data;

            // console.log(data);

            return data;
        }
    } catch (error) {
        if (error.response) {
            //  console.error(error);


        }

        return null;
    }


}

export function calculateTotal(users) {

    const total = users.length;

    return total;

}

export async function getSuspendedUsers() {

    const token = localStorage.getItem('token');

    try {
        const response = await axios.get('/api/v1/admin/suspended-users', {
            headers: {
                'Authorization': `Bearer ${token}`,
            }
        });
        // console.log(response);

        if (response.status === 200 && response.data) {
            const data = response.data;

            // console.log(data);

            return data;
        }
    } catch (error) {
        if (error.response) {
            //  console.error(error);


        }

        return null;
    }

}

export async function getDeletedUsers() {

    const token = localStorage.getItem('token');

    try {
        const response = await axios.get('/api/v1/admin/deleted-account', {
            headers: {
                'Authorization': `Bearer ${token}`,
            }
        });
        // console.log(response);

        if (response.status === 200 && response.data) {
            const data = response.data;

            // console.log(data);

            return data;
        }
    } catch (error) {
        if (error.response) {
            //  console.error(error);


        }

        return null;
    }

}


export async function getListedProducts() {

    try {
        const response = await axios.get('/api/v1/admin/listed-products', {

        });
        // console.log(response);

        if (response.status === 200 && response.data) {
            const data = response.data;

            //  console.log(data);

            return data;
        }
    } catch (error) {
        if (error.response) {
            console.error(error);


        }

        return null;
    }


}

export async function getDelistedProducts() {

    try {
        const response = await axios.get('/api/v1/admin/delisted-products', {

        });
        // console.log(response);

        if (response.status === 200 && response.data) {
            const data = response.data;

            //  console.log(data);

            return data;
        }
    } catch (error) {
        if (error.response) {
            console.error(error);


        }

        return null;
    }

}

export function formatDate(date) {


    return dayjs(date).format('D MMMM YYYY, HH:mm') || null;

}


export async function getBadgeDetails() {

    try {
        const response = await axios.get('/api/v1/admin/badge', {

        });
        // console.log(response);

        if (response.status === 200 && response.data) {
            


            //  console.log(data);

            return response;
        }
    } catch (error) {
        if (error.response) {
            console.error(error);


        }



    }


}



export function loadDashboard() {
     
    const adminUser = JSON.parse(localStorage.getItem('adminUser'));

    //console.log(adminUser);
      const img = adminUser.photo_url 
      ? ` <img src="/uploads/users/${adminUser.photo_url}" alt="" class="avatar-md rounded-circle">;`
      : `<img src="${generateAvatar(adminUser.email)}" alt="" class="avatar-md rounded-circle">`;

      const roleName = adminUser.role.name;
    
      const profile = `
                        <div class="">
                            ${img}
                        </div>
                        <div class="mt-3">
                            <h4 class="font-size-16 mb-1">${roleName.replace('_', ' ').toUpperCase()}</h4>
                            <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-30 text-success"></i>${adminUser.name}</span>
                        </div>
                    `
      document.querySelector('.header-profile-user').src =  adminUser.photo_url ? `/uploads/users/${adminUser.photo_url}` : `${generateAvatar(adminUser.email)}`;
      document.querySelector('.header-name').textContent = adminUser.name ?? 'N/A';

      document.querySelector('.admin-profile').innerHTML = profile;

  
  }


  export function logout() {

       const token = getToken();

        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
      
        axios.post('/api/v1/auth/logout')

            .then(function (response) {
                const responseData = response.data;
                if (responseData.status) {
                   
                    localStorage.clear();
    
                    delete axios.defaults.headers.common['Authorization'];
                    window.location.href = '/admin/login';
      
                } else {
                    Swal.fire({
                        icon: 'error',
                        confirmButtonColor: '#ffb705',
                        title: 'Logout Failed',
                        text: 'Unexpected response from the server. Please try again later.'
                    });
                }
            })
            .catch(function (error) {
                const errorData = error.response.data;
      
                Swal.fire({
                    icon: 'error',
                    confirmButtonColor: '#ffb705',
                    title: 'Logout Failed',
                    text: errorData.message || 'There was an error while logging out. Please try again later.'
                });
            });
        

    



  }
  
  

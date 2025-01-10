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
            const data = response.data.users

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
            const data = response.data.users

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
            const data = response.data.users

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
            const data = response.data.products

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
            const data = response.data.products

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

    console.log(adminUser);

    
        const img = adminUser.photo_url 
      ? `<img  class="img-fluid  js-profile" src="/uploads/users/${adminUser.photo_url}" alt="" id="profileDropdownBtn">`
      : `<img  class="img-fluid js-profile" src="${generateAvatar(adminUser.email)}" alt="" id="profileDropdownBtn">`;


    const dashboard = ` <div class="me-1">
        <h6 class="name">${adminUser.name}</h6>
        <h6 class="mired-text fw-light">${adminUser.email}</h6>
      </div>
      <div class="profile-dropdown">
      ${img}
        <div class="dropdown-menu" id="dropdownMenu">
          <div class="container drop-struct">
            <img class="pt-1" width="50px" src="" alt="">
            <div class="ms-2 pt-1">
              <h6>Mired Augustine</h6>
              <h6 style="font-size: small;">Miredaugustine@gmail.com</h6>
            </div>
          </div>
          <hr style="background-color: black; margin-left: 10px;margin-right: 10px;">
          <div style="margin-top: -9px;">
            <a href="settings.html">Dashboard</a>
            <a href="refer.html">Refer A Friend</a>
            <a href="privacy.html">Privacy Policy</a>
            <a href="#" id="adminLogOut">Log Out</a>
  
          </div>
  
        </div>
      </div>`;

      document.querySelector('.js-admin-profile').innerHTML = dashboard;

      
//  document.addEventListener("DOMContentLoaded", function () {
//   const profileDropdownBtn = document.getElementById('profileDropdownBtn');
//   const dropdownMenu = document.getElementById('dropdownMenu');

//   profileDropdownBtn.addEventListener('click', function () {
//     dropdownMenu.classList.toggle('show');
//   });

//   // Close the dropdown if the user clicks outside of it
//   window.addEventListener('click', function (event) {
//     if (!event.target.matches('#profileDropdownBtn')) {
//       if (dropdownMenu.classList.contains('show')) {
//         dropdownMenu.classList.remove('show');
//       }
//     }
//   });
// });
  
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
  

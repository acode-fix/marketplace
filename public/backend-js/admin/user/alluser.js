import { displaySwal, hideLoader, showLoader, validationError, } from '../../helper/helper.js';
import {
    formatDate,
    getDeletedUsers,
    getRegisteredUser,
    getSuspendedUsers,
    getToken,
    getUser,
    getUserById,
    loadDashboard,
} from '../helper/helper.js';


const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

const adminData = JSON.parse(localStorage.getItem('adminUser'));

console.log(adminData);

document.addEventListener('DOMContentLoaded', function () {
    let dataTableInstance;

    // Initialize the DataTable
    dataTableInstance = $('#datatable').DataTable({
        processing: true,
        serverSide: true, // Keep server-side processing for pagination and filtering
        ajax: function (data, callback, settings) {
            const page = data.start / data.length + 1; // Current page (1-based index)
            const perPage = data.length; // Number of records per page
            const searchTerm = data.search.value; // Get the search term for filtering

            // Fetch data from the server with pagination and search term
            axios.get('/api/v1/admin/registered-user', {
                params: {
                    page: page,
                    per_page: perPage,
                    search: searchTerm, // Send the search term to the server
                },
            })
            .then((response) => {

             //   console.log(response);

                const result = response.data;

                // Pass data to DataTable
                callback({
                    draw: data.draw,
                    recordsTotal: result.total, // Total number of records without filtering
                    recordsFiltered: result.filtered_total, // Total number of records after filtering
                    data: result.users, // Data for the current page
                });
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
            });
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return (meta.row + 1) + (meta.settings._iDisplayStart); // Serial Number (starts from 1)
                }
            },
            { data: 'name', render: function(data) { return data ? data : 'N/A'; }},
            { data: 'email', render: function(data) { return data ? data : 'N/A'; }},
            { data: 'address', render: function(data) { return data ? data : 'N/A'; }},
            { data: 'phone_number', render: function(data) { return data ? data : 'N/A'; }},
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function (data) {
                    return `<button class="btn btn-sm btn-light user-link" data-user-id="${data.id}">Full details</button>`;
                },
            },
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function (data) {

                    const suspendBtn = adminData.role_id === 1 
                                    ? ` <button data-user-id="${data.id}" class="btn btn-sm btn-warning text-white suspend">Suspend</button> `
                                    : '';
                   const deleteBtn =  adminData.role_id === 1 
                                     ? `<button data-user-id="${data.id}" class="btn btn-sm btn-danger delete">Delete</button>`
                                     : '';

                    return `
                        <button data-user-id="${data.id}" class="btn btn-sm btn-success edit">Edit</button>
                         ${suspendBtn}
                         ${deleteBtn}
                        
                    `;
                },
            },
        ],
        responsive: true,
    });

    // Search input handler
    $('#datatable_filter input').on('keyup', function () {
        // Trigger the search on the DataTable to filter the data
        dataTableInstance.search(this.value).draw();
    });



    let suspendedUserdataTable;

    // Initialize the DataTable
    suspendedUserdataTable = $('#datatable2').DataTable({
        processing: true,
        serverSide: true, // Keep server-side processing for pagination and filtering
        ajax: function (data, callback, settings) {
            const page = data.start / data.length + 1; // Current page (1-based index)
            const perPage = data.length; // Number of records per page
            const searchTerm = data.search.value; // Get the search term for filtering

            // Fetch data from the server with pagination and search term
            axios.get('/api/v1/admin/suspended-users', {
                params: {
                    page: page,
                    per_page: perPage,
                    search: searchTerm, // Send the search term to the server
                },
            })
            .then((response) => {

           //     console.log(response);

                const result = response.data;

                // Pass data to DataTable
                callback({
                    draw: data.draw,
                    recordsTotal: result.total, // Total number of records without filtering
                    recordsFiltered: result.filtered_total, // Total number of records after filtering
                    data: result.users, // Data for the current page
                });
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
            });
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return (meta.row + 1) + (meta.settings._iDisplayStart); // Serial Number (starts from 1)
                }
            },
            { data: 'name', render: function(data) { return data ? data : 'N/A'; }},
            { data: 'email', render: function(data) { return data ? data : 'N/A'; }},
            { data: 'address', render: function(data) { return data ? data : 'N/A'; }},
            { data: 'phone_number', render: function(data) { return data ? data : 'N/A'; }},
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function (data) {
                    return `<button class="btn btn-sm btn-light user-link" data-user-id="${data.id}">Full details</button>`;
                },
            },
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function (data) {

                    const unSuspendBtn = adminData.role_id === 1 
                                    ? ` <button data-user-id="${data.id}" class="btn btn-sm btn-success text-white unsuspend">Unsuspend</button> `
                                    : '';
                   

                    return `
                        
                         ${unSuspendBtn}
                         
                        
                    `;
                },
            },
        ],
        responsive: true,
    });

    // Search input handler
    $('#datatable_filter input').on('keyup', function () {
        // Trigger the search on the DataTable to filter the data
        suspendedUserdataTable.search(this.value).draw();
    });


    
    let deletedUserdataTable;

    // Initialize the DataTable
    deletedUserdataTable = $('#datatable3').DataTable({
        processing: true,
        serverSide: true, // Keep server-side processing for pagination and filtering
        ajax: function (data, callback, settings) {
            const page = data.start / data.length + 1; // Current page (1-based index)
            const perPage = data.length; // Number of records per page
            const searchTerm = data.search.value; // Get the search term for filtering

            // Fetch data from the server with pagination and search term
            axios.get('/api/v1/admin/deleted-account', {
                params: {
                    page: page,
                    per_page: perPage,
                    search: searchTerm, // Send the search term to the server
                },
            })
            .then((response) => {

              //  console.log(response);

                const result = response.data;

                // Pass data to DataTable
                callback({
                    draw: data.draw,
                    recordsTotal: result.total, // Total number of records without filtering
                    recordsFiltered: result.filtered_total, // Total number of records after filtering
                    data: result.users, // Data for the current page
                });
            })
            .catch((error) => {
                console.error("Error fetching data:", error);
            });
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return (meta.row + 1) + (meta.settings._iDisplayStart); // Serial Number (starts from 1)
                }
            },
            { data: 'name', render: function(data) { return data ? data : 'N/A'; }},
            { data: 'email', render: function(data) { return data ? data : 'N/A'; }},
            { data: 'phone_number', render: function(data) { return data ? data : 'N/A'; }},
            { data: 'deletion_reason', render: function(data) { return data ? data : 'N/A'; }},
            {
                data: 'deleted_at',
                orderable: false,
                searchable: false,
                render: function (data) {
                    return  `${formatDate(data)}`;
                },
            },
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function (data) {
                   return `<button class="btn btn-sm btn-light user-link" data-user-id="${data.id}">Full details</button>`;   
                },
            },
        ],
        responsive: true,
    });

    // Search input handler
    $('#datatable_filter input').on('keyup', function () {
        // Trigger the search on the DataTable to filter the data
        deletedUserdataTable.search(this.value).draw();
    });






});


document.addEventListener('click', (event) => {

    if (event.target.classList.contains('user-link')) {

        event.preventDefault();

        const userId = event.target.dataset.userId;

        localStorage.setItem('userId', JSON.stringify(userId));
         window.location.href = '/admin/view/user'


    }
});

var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
let userId;

document.addEventListener('click', (event) => {

    if (event.target.classList.contains('edit')) {
        event.preventDefault();

        modal.show();

      userId  = event.target.dataset.userId;

        axios.get(`/api/v1/admin/edit/${userId}`).then((response) => {
           // console.log(response);

            if (response.status === 200 && response.data) {

                const userData = response.data.user;
                document.querySelector('.fullname').value = userData.name ?? '';
                document.querySelector('.username').value = userData.username ?? '';
                document.querySelector('.phone').value = userData.phone_number ?? '';
                document.querySelector('.shop_no').value = userData.shop_no ?? '';
                document.querySelector('.address').value = userData.address ?? '';
                document.querySelector('.email').value = userData.email ?? '';
               // document.querySelector('.nationality').value = userData.nationality ?? '';
                document.querySelector('.bio').value = userData.bio ?? '';
                document.querySelector(`input[name="gender"][value="${userData.gender}"]`).checked = true;
            }

        }).catch((error) => {

            console.log(error);

        });



    }

});


document.querySelectorAll('.next-to-step-2').forEach((nextStep) => {

    nextStep.addEventListener('click', () => {

        document.querySelectorAll('.modal-step-1').forEach((step1) => {
            step1.style.display = 'none';

        });

        document.querySelectorAll('.modal-step-2').forEach((step2) => {
            step2.style.display = 'block'

        });

    });


});


document.querySelectorAll('.previous-to-step-1').forEach((previousStep) => {

    previousStep.addEventListener('click', () => {

        document.querySelectorAll('.modal-step-1').forEach((modalStep1) => {
            modalStep1.style.display = 'block';

        });

        document.querySelectorAll('.modal-step-2').forEach((modalStep2) => {
            modalStep2.style.display = 'none';
        });

    });

});


document.getElementById('update').addEventListener('click', () => {

    const form1 = new FormData(document.getElementById('edit-user-stage1'));
    const form2 = new FormData(document.getElementById('edit-user-stage2'));

    
    const continueBtn = document.querySelector('.update-loader');
    const signupText = document.querySelector('.update-text');
    const loader = document.querySelector('.update-layout');
    
    showLoader(continueBtn,signupText,loader)
    submitForm(form1, form2, continueBtn, signupText, loader);

});


function   submitForm(form1, form2, continueBtn, signupText, loader) {

        form2.forEach((value, key) => {

        form1.append(key, value);

        });

        //return console.log([...form1]);

        axios.post(`/api/v1/admin/store/${userId}`, form1, {

            headers: {
                'Content-type': 'multipart/form-data'
            }
        }).then((response) => {
            console.log(response)
            
            hideLoader(continueBtn, signupText,loader);

            if(response.status === 200 && response.data) {
                const iconAlert = 'success';
                const  titleAlert = 'Profile Update';
                const msg = response.data.message;

                swalAlert(iconAlert, titleAlert, msg);

                modal.hide();

            }
        }).catch((error) => {
            hideLoader(continueBtn, signupText,loader);

            console.log(error);

            if(error.response) {

                if(error.response.status === 422 && error.response.data) {

                    const responseErrors =  error.response.data.errors;

                    const  errorMsg =  validationError(responseErrors);

                    displaySwal(errorMsg);
                }


                if(error.response.status === 404 && error.response.data) {

                    const iconAlert = 'error';
                        const titleAlert = 'Error';
                        const msg = error.response.data.message;

                    swalAlert(iconAlert, titleAlert, msg )

                }


                if(error.response.status === 500) {
                    
                    const iconAlert = 'error';
                    const titleAlert = 'Upload Error';
                    const msg = error.response.data.message;

                    swalAlert(iconAlert, titleAlert, msg);
                    
                    
                }
            }

        })


   
}

function swalAlert(iconAlert, titleAlert, msg) {

     
        Swal.fire({
            icon: iconAlert,
            confirmButtonColor: '#ffb705',
            title: titleAlert,
            text: msg,
            preConfirm: ()=> {
                window.location.reload();
            }
        });

}


var suspendModal = new bootstrap.Modal(document.getElementById('suspendModal'));

let suspendUserId;

document.addEventListener('click', (event) => {

    if (event.target.classList.contains('suspend')) {

        event.preventDefault();

        suspendUserId = event.target.dataset.userId;

        loadDetails(suspendUserId)

    
    }

})


async function loadDetails(userId) {

    const user =  await getUser(userId);

  const email =  document.querySelector('.suspend-email');
  const name =  document.querySelector('.suspend-name');
  const username = document.querySelector('.suspend-username');

    loadModalDetails(user, email,name,username);

    suspendModal.show();

    
}

 const suspendBtn = document.querySelector('.js-suspend-yes');

 suspendBtn.addEventListener('click', () => {

        console.log(suspendUserId);

        axios.post('/api/v1/admin/suspend-user', {suspendUserId}).then((response)=> {
            console.log(response)

            if(response.status === 200 && response.data) {
               
                const msg = response.data.message;
                const iconAlert = 'success';
                const titleAlert = 'Suspend User';

                suspendModal.hide();

                swalAlert(iconAlert, titleAlert, msg);

    


            }

        }).catch((error) => {
            console.log(error);

            if(error.response) {
                suspendModal.hide();

                if(error.response.status === 404 && error.response.data) {

                    const msg = error.response.data.message;
                    const iconAlert =  'error';
                    const titleAlert = 'User Error';

                    swalAlert(iconAlert, titleAlert, msg);



                }

                if(error.response.status === 500) {

                    const msg = error.response.data.message;
                    const iconAlert =  'error';
                    const titleAlert = 'Server Error';

                    swalAlert(iconAlert, titleAlert, msg);



                }





            }

        });
});


function loadModalDetails(user,email,name,username) {
    
    email.textContent = user.email ?? 'N/A';
    name.textContent = user.name ?? 'N/A';
    username.textContent = user.username ?? 'N/A';

}


var unsuspendModal = new bootstrap.Modal(document.getElementById('unsuspendModal'));

let unsuspendId;

document.addEventListener('click', (event) => {

    if(event.target.classList.contains('unsuspend')) {

        unsuspendId = event.target.dataset.userId;

        loadunsuspendDetails(unsuspendId);

    }

});

async function  loadunsuspendDetails(unsuspendId) {

    
    const user =  await getUser(unsuspendId);
    const email = document.querySelector('.unsuspend-email');
    const name =  document.querySelector('.unsuspend-name');
    const username =   document.querySelector('.unsuspend-username');

    loadModalDetails(user, email,name,username);
    unsuspendModal.show();

    
}



const unsuspendBtn = document.querySelector('.js-unsuspend');

unsuspendBtn.addEventListener('click', () => {

    axios.post(`/api/v1/admin/unsuspend/${unsuspendId}`).then((response) => {

        console.log(response);

        if(response.status === 200 && response.data) {

            const msg = response.data.message;
            const iconAlert = 'success';
            const titleAlert = 'Unsuspend User';

            unsuspendModal.hide();

            swalAlert(iconAlert, titleAlert, msg);




        }
    }).catch((error) => {
      //  console.log(error);

      if(error.response) {

        if(error.response.status === 404 && error.response.data) {

            const msg = error.response.data.message;
            const iconAlert =  'error';
            const titleAlert = 'User Error';

            deleteModal.hide();

            swalAlert(iconAlert, titleAlert, msg);

        }

        if(error.response.status === 500) {

              const msg = error.response.data.message;
                const iconAlert =  'error';
                const titleAlert = 'Server Error';

                deleteModal.hide();

                swalAlert(iconAlert, titleAlert, msg);

        }
    }

    })

});



var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

let deleteUserId;

document.addEventListener('click', (event) => {

    if(event.target.classList.contains('delete')) {

        event.preventDefault();

        deleteUserId = event.target.dataset.userId;

        loadDelDetails(deleteUserId);


    }

});


 async function loadDelDetails(userId) {

  const user =  await getUser(userId);

  const email = document.querySelector('.delete-email');
  const name = document.querySelector('.delete-name');
  const username = document.querySelector('.delete-username');

  loadModalDetails(user, email,name,username);

  deleteModal.show();

}

const deleteBtn = document.querySelector('.js-delete-yes');

deleteBtn.addEventListener('click', () => {

    axios.post(`/api/v1/admin/delete/${deleteUserId}`).then((response) => {
        console.log(response)

        if(response.status === 200 && response.data) {

            const msg = response.data.message;
            const iconAlert = 'success';
            const titleAlert = 'Delete User';

            deleteModal.hide();

            swalAlert(iconAlert, titleAlert, msg);




        }

    }).catch((error) => {

     //   console.log(error);

        if(error.response) {

            if(error.response.status === 404 && error.response.data) {

                const msg = error.response.data.message;
                const iconAlert =  'error';
                const titleAlert = 'User Error';

                deleteModal.hide();

                swalAlert(iconAlert, titleAlert, msg);

            }

            if(error.response.status === 500) {

                  const msg = error.response.data.message;
                    const iconAlert =  'error';
                    const titleAlert = 'Server Error';

                    deleteModal.hide();

                    swalAlert(iconAlert, titleAlert, msg);

            }
        }

    })

});















/*

async function loadUsers() {

    const users = await getRegisteredUser();

    let display = `<table id="example1" class="table table-striped nowrap" style="width:100%">'
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th>Full Details</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>`;

    users.forEach((user) => {

        const suspendBtn = adminData.role_id === 1 
                        ? ` <button data-user-id="${user.id}"   type="btn" class="btn btn-warning suspend btn-sm js-suspend">Suspend</button>` 
                        : '';
        const deleteBtn = adminData.role_id === 1
                        ? `<button data-user-id="${user.id}"   type="btn" class="btn btn-sm btn-danger delete js-delete">Delete</button>`
                        : '';

        display += ` <tr>
                  <td>${user.name ? user.name : 'No Data Yet'} </td>
                  <td>${user.email ? user.email : 'No Data Yet'}</td>
                  <td>${user.address ? user.address : 'No Data Yet'}</td>
                  <td>${user.phone_number ? user.phone_number : 'No Data Yet'}</td>
                  <td><a class="user-link" data-user-id="${user.id}" href="" >User Details</a></td> 
                  <td>
                  <button data-user-id="${user.id}"   type="btn" class="btn btn-sm edit btn-success js-edit">Edit</button>
                  ${suspendBtn}
                  ${deleteBtn}
                  
                  </td>  
              </tr>`;

    });

    display += `</tbody></table>`;


    document.querySelector('.registered').innerHTML = display;


    $('#example1').DataTable({
        responsive: true
    });

}

loadUsers();


document.addEventListener('click', (event) => {

    if (event.target.classList.contains('user-link')) {

        event.preventDefault();

        const userId = event.target.dataset.userId;

        localStorage.setItem('userId', JSON.stringify(userId));
         window.location.href = '/admin/view/user'


       // getUserById(userId);

    }
});

var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
let userId;

document.addEventListener('click', (event) => {

    if (event.target.classList.contains('edit')) {
        event.preventDefault();

        modal.show();

      userId  = event.target.dataset.userId;

        axios.get(`/api/v1/admin/edit/${userId}`).then((response) => {
           // console.log(response);

            if (response.status === 200 && response.data) {

                const userData = response.data.user;
                document.querySelector('.fullname').value = userData.name ?? '';
                document.querySelector('.username').value = userData.username ?? '';
                document.querySelector('.phone').value = userData.phone_number ?? '';
                document.querySelector('.shop_no').value = userData.shop_no ?? '';
                document.querySelector('.address').value = userData.address ?? '';
                document.querySelector('.email').value = userData.email ?? '';
               // document.querySelector('.nationality').value = userData.nationality ?? '';
                document.querySelector('.bio').value = userData.bio ?? '';
                document.querySelector(`input[name="gender"][value="${userData.gender}"]`).checked = true;
            }

        }).catch((error) => {

            console.log(error);

        });



    }

});


document.getElementById('update').addEventListener('click', () => {

    const form1 = new FormData(document.getElementById('edit-user-stage1'));
    const form2 = new FormData(document.getElementById('edit-user-stage2'));

    
    const continueBtn = document.querySelector('.update-loader');
    const signupText = document.querySelector('.update-text');
    const loader = document.querySelector('.update-layout');
    
    showLoader(continueBtn,signupText,loader)


    submitForm(form1, form2, continueBtn, signupText, loader);

});


function   submitForm(form1, form2, continueBtn, signupText, loader) {

     form2.forEach((value, key) => {

       form1.append(key, value);

     });

//return console.log([...form1]);

    axios.post(`/api/v1/admin/store/${userId}`, form1, {

        headers: {
            'Content-type': 'multipart/form-data'
        }
    }).then((response) => {
        console.log(response)
        
        hideLoader(continueBtn, signupText,loader);

        if(response.status === 200 && response.data) {
            const iconAlert = 'success';
            const  titleAlert = 'Profile Update';
            const msg = response.data.message;

            swalAlert(iconAlert, titleAlert, msg);

            modal.hide();

        }
    }).catch((error) => {
        hideLoader(continueBtn, signupText,loader);

        console.log(error);

        if(error.response) {

            if(error.response.status === 422 && error.response.data) {

                const responseErrors =  error.response.data.errors;

               const  errorMsg =  validationError(responseErrors);

                displaySwal(errorMsg);
            }


            if(error.response.status === 404 && error.response.data) {

                const iconAlert = 'error';
                 const titleAlert = 'Error';
                 const msg = error.response.data.message;

                swalAlert(iconAlert, titleAlert, msg )

            }


            if(error.response.status === 500) {
                
                const iconAlert = 'error';
                const titleAlert = 'Upload Error';
                const msg = error.response.data.message;

                swalAlert(iconAlert, titleAlert, msg);
                
               
            }
        }

    })


    
}

 function swalAlert(iconAlert, titleAlert, msg) {

      
    Swal.fire({
        icon: iconAlert,
        confirmButtonColor: '#ffb705',
        title: titleAlert,
        text: msg,
        preConfirm: ()=> {
            window.location.reload();
        }
    });

}


document.querySelectorAll('.next-to-step-2').forEach((nextStep) => {

    nextStep.addEventListener('click', () => {

        document.querySelectorAll('.modal-step-1').forEach((step1) => {
            step1.style.display = 'none';

        });

        document.querySelectorAll('.modal-step-2').forEach((step2) => {
            step2.style.display = 'block'

        });

    });


});


document.querySelectorAll('.previous-to-step-1').forEach((previousStep) => {

    previousStep.addEventListener('click', () => {

        document.querySelectorAll('.modal-step-1').forEach((modalStep1) => {
            modalStep1.style.display = 'block';

        });

        document.querySelectorAll('.modal-step-2').forEach((modalStep2) => {
            modalStep2.style.display = 'none';
        });

    });

});

var suspendModal = new bootstrap.Modal(document.getElementById('suspendModal'));

let suspendUserId;

document.addEventListener('click', (event) => {

    if (event.target.classList.contains('suspend')) {

        event.preventDefault();

        suspendUserId = event.target.dataset.userId;

        loadDetails(suspendUserId)

    
    }

})


async function loadDetails(userId) {

    const user =  await getUser(userId);

  const email =  document.querySelector('.suspend-email');
  const name =  document.querySelector('.suspend-name');
  const username = document.querySelector('.suspend-username');

    loadModalDetails(user, email,name,username);

    suspendModal.show();

    
}

 const suspendBtn = document.querySelector('.js-suspend-yes');

 suspendBtn.addEventListener('click', () => {

        console.log(suspendUserId);

        axios.post('/api/v1/admin/suspend-user', {suspendUserId}).then((response)=> {
            console.log(response)

            if(response.status === 200 && response.data) {
               
                const msg = response.data.message;
                const iconAlert = 'success';
                const titleAlert = 'Suspend User';

                suspendModal.hide();

                swalAlert(iconAlert, titleAlert, msg);

    


            }

        }).catch((error) => {
            console.log(error);

            if(error.response) {
                suspendModal.hide();

                if(error.response.status === 404 && error.response.data) {

                    const msg = error.response.data.message;
                    const iconAlert =  'error';
                    const titleAlert = 'User Error';

                    swalAlert(iconAlert, titleAlert, msg);



                }

                if(error.response.status === 500) {

                    const msg = error.response.data.message;
                    const iconAlert =  'error';
                    const titleAlert = 'Server Error';

                    swalAlert(iconAlert, titleAlert, msg);



                }





            }

        });
});

var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

let deleteUserId;

document.addEventListener('click', (event) => {

    if(event.target.classList.contains('delete')) {

        event.preventDefault();

        deleteUserId = event.target.dataset.userId;

        loadDelDetails(deleteUserId);


    }

});


 async function loadDelDetails(userId) {

  const user =  await getUser(userId);

  const email = document.querySelector('.delete-email');
  const name = document.querySelector('.delete-name');
  const username = document.querySelector('.delete-username');

  loadModalDetails(user, email,name,username);

  deleteModal.show();

}

const deleteBtn = document.querySelector('.js-delete-yes');

deleteBtn.addEventListener('click', () => {

    axios.post(`/api/v1/admin/delete/${deleteUserId}`).then((response) => {
        console.log(response)

        if(response.status === 200 && response.data) {

            const msg = response.data.message;
            const iconAlert = 'success';
            const titleAlert = 'Delete User';

            deleteModal.hide();

            swalAlert(iconAlert, titleAlert, msg);




        }

    }).catch((error) => {

     //   console.log(error);

        if(error.response) {

            if(error.response.status === 404 && error.response.data) {

                const msg = error.response.data.message;
                const iconAlert =  'error';
                const titleAlert = 'User Error';

                deleteModal.hide();

                swalAlert(iconAlert, titleAlert, msg);

            }

            if(error.response.status === 500) {

                  const msg = error.response.data.message;
                    const iconAlert =  'error';
                    const titleAlert = 'Server Error';

                    deleteModal.hide();

                    swalAlert(iconAlert, titleAlert, msg);

            }
        }

    })

});


async function  loadSuspendedUsers() {

    const users = await getSuspendedUsers();

    let display = `<table id="example2" class="table table-striped nowrap" style="width:100%">'
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th>Full Details</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>`;

    users.forEach((user) => {

        display += ` <tr>
                  <td>${user.name ? user.name : 'No Data Yet'} </td>
                  <td>${user.email ? user.email : 'No Data Yet'}</td>
                  <td>${user.address ? user.address : 'No Data Yet'}</td>
                  <td>${user.phone_number ? user.phone_number : 'No Data Yet'}</td>
                  <td><a class="user-link" data-user-id="${user.id}" href="" >User Details</a></td> 
                  <td>
                  <button data-user-id="${user.id}"   type="btn" class="btn btn-success btn-sm  unsuspend ">unsuspend</button>
                  </td>  
              </tr>`;

    });

    display += `</tbody></table>`;


    document.querySelector('.suspended').innerHTML = display;


    $('#example2').DataTable({
        responsive: true
    });


}

loadSuspendedUsers();

var unsuspendModal = new bootstrap.Modal(document.getElementById('unsuspendModal'));

let unsuspendId;

document.addEventListener('click', (event) => {

    if(event.target.classList.contains('unsuspend')) {

        unsuspendId = event.target.dataset.userId;

        loadunsuspendDetails(unsuspendId);




    }

});

async function  loadunsuspendDetails(unsuspendId) {

    
    const user =  await getUser(unsuspendId);
    const email = document.querySelector('.unsuspend-email');
    const name =  document.querySelector('.unsuspend-name');
    const username =   document.querySelector('.unsuspend-username');

    loadModalDetails(user, email,name,username);
    unsuspendModal.show();

    
}

const unsuspendBtn = document.querySelector('.js-unsuspend');

unsuspendBtn.addEventListener('click', () => {

    axios.post(`/api/v1/admin/unsuspend/${unsuspendId}`).then((response) => {

        console.log(response);

        if(response.status === 200 && response.data) {

            const msg = response.data.message;
            const iconAlert = 'success';
            const titleAlert = 'Unsuspend User';

            unsuspendModal.hide();

            swalAlert(iconAlert, titleAlert, msg);




        }
    }).catch((error) => {
      //  console.log(error);

      if(error.response) {

        if(error.response.status === 404 && error.response.data) {

            const msg = error.response.data.message;
            const iconAlert =  'error';
            const titleAlert = 'User Error';

            deleteModal.hide();

            swalAlert(iconAlert, titleAlert, msg);

        }

        if(error.response.status === 500) {

              const msg = error.response.data.message;
                const iconAlert =  'error';
                const titleAlert = 'Server Error';

                deleteModal.hide();

                swalAlert(iconAlert, titleAlert, msg);

        }
    }

    })

});


function loadModalDetails(user,email,name,username) {
    
    email.textContent = user.email ?? 'N/A';
    name.textContent = user.name ?? 'N/A';
    username.textContent = user.username ?? 'N/A';

}


 async function loadDeletedAccounts() {

    const users = await getDeletedUsers();

        let display = `<table id="example3" class="table table-striped nowrap" style="width:100%">'
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Reason For Deletion</th>
                <th>Deletion Date</th>
                <th>Full Details</th>
            </tr>
        </thead>
        <tbody>`;

        users.forEach((user) => {

        display += ` <tr>
                <td>${user.name ? user.name : 'No Data Yet'} </td>
                <td>${user.email ? user.email : 'No Data Yet'}</td>
                <td>${user.phone_number ? user.phone_number : 'No Data Yet'}</td>
                 <td>${user.deletion_reason ?? 'No Data Yet'}</td>
                <td>${formatDate(user.deleted_at) ?? 'N/A'}</td>
                <td><a class="user-link" data-user-id="${user.id}" href="" >User Details</a></td> 
          
            </tr>`;

        });

        display += `</tbody></table>`;


        document.querySelector('.deleted').innerHTML = display;


        $('#example3').DataTable({
        responsive: true
        });



}

loadDeletedAccounts();

*/










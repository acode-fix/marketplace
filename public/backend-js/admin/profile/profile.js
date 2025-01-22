import {
    displaySwal,
    validationError
} from "../../helper/helper.js";
import {
    getToken,
    getUser,
    loadDashboard,
    logout
} from "../helper/helper.js";

const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;


const adminData = JSON.parse(localStorage.getItem('adminUser'));

if (adminData.role_id == 1) {

    const addUserBtn = ` <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addUser">Add Admin</button>`;

    document.querySelector('.js-admin').innerHTML = addUserBtn;



    function loadRoles(roles) {

        let select =`<select name = "role_id" class="form-select" aria-label="Default select example">
        <option selected>Select A role </option>`;

        roles.forEach((role) => {
        select +=  `<option value="${role.id}">${role.name.replace('_', ' ')}</option> `  

        });

        select += `</select>`;

        document.querySelector('.js-roles').innerHTML = select;


    }


 

    
  let dataTableInstance;

  // Initialize the DataTable
  dataTableInstance = $('#datatable').DataTable({
      processing: true,
      serverSide: true, 
      ajax: function (data, callback, settings) {
          const page = data.start / data.length + 1; 
          const perPage = data.length; 
          const searchTerm = data.search.value; 

          
          axios.get('/api/v1/admin/details', {
              params: {
                  page: page,
                  per_page: perPage,
                  search: searchTerm, 
              },
          })
          .then((response) => {

              console.log(response);

              const result = response.data;
              loadRoles(result.roles);

              callback({
                  draw: data.draw,
                  recordsTotal: result.total, 
                  recordsFiltered: result.filtered_total, 
                  data: result.users, 
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
                  return (meta.row + 1) + (meta.settings._iDisplayStart);
              }
          },

          { data: 'name', render: function(data) { return data ? data : 'N/A'; }},
          { data: 'email', render: function(data) { return data ? data : 'N/A'; }},
          { data: 'role.name', render: function(data) { return `${data.replace('_', ' ')}`; }},
          { data: 'phone_number', render: function(data) { return data ? data : 'N/A'; }},
          {
              data: null,
              orderable: false,
              searchable: false,
              render: function (data) {
                   
                  return `<button class="btn btn-sm btn-success edit-btn" data-user-id="${data.id}">Edit</button>
                          <button class="btn btn-sm btn-danger delete-btn" data-user-id="${data.id}">Delete</button>`;
              },
          },
         
      ],
      responsive: true,
  });

  
  $('#datatable_filter input').on('keyup', function () {
  
      dataTableInstance.search(this.value).draw();
  });

    
   }  else {

  
let display = ` <table class="table  table-hover">
   <thead>
     <tr>
       <th>S/N</th>
       <th>Name</th>
       <th>Email</th>
       <th>Role</th>
       <th>Phone Number</th>
       <th>Action</th>    
     </tr>
   </thead>
   <tbody>
   <tr>
         <td>${1}</td>
         <td>${adminData.name ?? 'N/A'}</td>
         <td>${adminData.email ?? 'N/A'}</td>
         <td>${adminData.role.name.replace('_', ' ')}</td>
         <td>${adminData.phone_number ?? 'N/A'}</td>  
         <td><button class="btn btn-sm btn-success edit-btn" data-user-id="${adminData.id}">Edit</button></td>
       </tr>
 <tbody>`;

 //console.log(adminData);

document.querySelector('.super-admin-table').style.display = 'none';
document.querySelector('.js-user-table').innerHTML = display;

}


var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));



document.addEventListener('click', (event) => {

    if(event.target.classList.contains('edit-btn')) {


        const { userId } = event.target.dataset;


        axios.get(`/api/v1/admin/edit/${userId}`).then((response) => {
            //  console.log(response);

            if (response.status === 200 && response.data) {

                const userData = response.data.user;

                console.log(userData);

                document.getElementById('name').value = userData.name;
                document.getElementById('email').value = userData.email;

                modal.show();

            }

        }).catch((error) => {

            console.log(error);

        });

        


    }

})

const saveBtn = document.getElementById('save');
saveBtn.addEventListener('click', (event) => {

    event.preventDefault();

    const profileForm = document.getElementById('profile-form');
    const formData = new FormData(profileForm);

    axios.post('/api/v1/admin/profile/update', formData).then((response) => {

        //console.log([...formData]);

        //  console.log(response);
        if (response.status === 200 && response.data) {

            const adminUser = response.data.user;
              
            localStorage.setItem('adminUser', JSON.stringify(adminUser));
            Swal.fire({
                icon: 'info',
                title: 'Profile Update',
                confirmButtonColor: '#ffb705',
                html: `<h6>Profile updated successfully</h6>`,
                timer: 3000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                },
                willClose: () => {
                    window.location.reload();
                }
            });



        }

    }).catch((error) => {

        console.log(error);

        if (error.response) {

            if (error.response.status === 422 && error.response.data) {

                const responseErrors = error.response.data.errors;

                const errorMsg = validationError(responseErrors);

                displaySwal(errorMsg);

            }
            if (error.response.status === 404 && error.response.data) {

                const iconAlert = 'error';
                const titleAlert = 'Error';
                const msg = error.response.data.message;

                swalAlert(iconAlert, titleAlert, msg)

            }


            if (error.response.status === 500) {

                const iconAlert = 'error';
                const titleAlert = 'Upload Error';
                const msg = error.response.data.message;

                swalAlert(iconAlert, titleAlert, msg);


            }




        }

    });




});

function swalAlert(iconAlert, titleAlert, msg) {


    Swal.fire({
        icon: iconAlert,
        confirmButtonColor: '#ffb705',
        title: titleAlert,
        text: msg,
        preConfirm: () => {
            window.location.reload();
        }
    });

}

const createBtn = document.getElementById('save-user');

createBtn.addEventListener('click', (event) => {

    event.preventDefault();

    const form = document.getElementById('admin-form');

    const formData = new FormData(form);

    axios.post('/api/v1/admin/new-user', formData).then((response) => {

        // console.log(response);

        if (response.status === 200 && response.data) {
            Swal.fire({
                icon: 'info',
                title: 'Profile Update',
                confirmButtonColor: '#ffb705',
                html: `<h6>User created successfully</h6>`,
                timer: 3000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                },
                willClose: () => {
                    window.location.reload();
                }
            });

        }


    }).catch((error) => {
        // console.log(error);

        if (error.response) {

            if (error.response.status === 422 && error.response.data) {

                const responseErrors = error.response.data.errors;

                const errorMsg = validationError(responseErrors);

                displaySwal(errorMsg);

            }

            if (error.response.status === 500) {

                const iconAlert = 'error';
                const titleAlert = 'Upload Error';
                const msg = error.response.data.message;

                swalAlert(iconAlert, titleAlert, msg);


            }




        }


    });



});

var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));

let deleteUserId;

document.addEventListener('click', (event) => {

    if(event.target.classList.contains('delete-btn')) {

        event.preventDefault();

        deleteUserId = event.target.dataset.userId;

        loadDelDetails(deleteUserId);


    }

});


 async function loadDelDetails(userId) {

  const user =  await getUser(userId);

  const email = document.querySelector('.delete-email');
  const name = document.querySelector('.delete-name');


  loadModalDetails(user, email,name,);

  deleteModal.show();

}



function loadModalDetails(user,email,name,) {
    
    email.textContent = user.email ?? 'N/A';
    name.textContent = user.name ?? 'N/A';

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
axios.get('/api/v1/admin/details').then((response) => {
    // console.log(response);

    if (response.status === 200 && response.data) {

        const users = response.data.users;
        const roles = response.data.roles;

     //   console.log(users)

        loadUser(users, roles)


    }

}).catch((error) => {

    console.log(error);

});



function loadUser(users, roles) {

    let otherUsers = [];

  if(userData.role_id !== 1) {

    const user =  users.find((user) => {

      return   user.email === userData.email;

    });

    otherUsers.push(user);
        
  }

    let display = ` <table class="table  table-hover">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Phone Number</th>
                  <th>Action</th>    
                </tr>
              </thead>
              <tbody>`;

const userDatas = otherUsers.length !== 0 ? otherUsers : users

    userDatas.forEach((user, index) => {
        display +=`<tr>
                    <td>${index + 1}</td>
                    <td>${user.name ?? 'N/A'}</td>
                    <td>${user.email ?? 'N/A'}</td>
                    <td>${user.role.name.replace('_', ' ')}</td>
                    <td>${user.phone_number ?? 'N/A'}</td>  
                    <td><a href="" data-user-id="${user.id}" class="btn btn-success edit-btn">edit</a></td>
                  </tr>`;

    });

    display += `<tbody>`;


    document.querySelector('.js-user-table').innerHTML = display;

    if (userData.role_id == 1) {

        const addUserBtn = ` <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUser">Add User</button>`;

        document.querySelector('.js-admin').innerHTML = addUserBtn;


        let select =`<select name = "role_id" class="form-select" aria-label="Default select example">
                       <option selected>Select A role </option>`;
        roles.forEach((role) => {
         select +=  `<option value="${role.id}">${role.name.replace('_', ' ')}</option> `  

        });

        select += `</select>`;

        document.querySelector('.js-roles').innerHTML = select;
        


    }


    var modal = new bootstrap.Modal(document.getElementById('staticBackdrop'));

    const editBtns = document.querySelectorAll('.edit-btn');
    const saveBtn = document.getElementById('save');

    //console.log(saveBtn);
    editBtns.forEach((editBtn) => {

        editBtn.addEventListener('click', (event) => {

            event.preventDefault();
    
            const {
                userId
            } = editBtn.dataset;
    
            axios.get(`/api/v1/admin/edit/${userId}`).then((response) => {
                //  console.log(response);
    
                if (response.status === 200 && response.data) {
    
                    const userData = response.data.user;
    
                    console.log(userData);
    
                    document.getElementById('name').value = userData.name;
                   // document.getElementById('email').value = userData.email;
    
                    modal.show();
    
                }
    
            }).catch((error) => {
    
                console.log(error);
    
            });
    
    
        });
    

    });

   
    saveBtn.addEventListener('click', (event) => {

        event.preventDefault();

        const profileForm = document.getElementById('profile-form');
        const formData = new FormData(profileForm);

        axios.post('/api/v1/admin/profile/update', formData).then((response) => {

            //console.log([...formData]);

            //  console.log(response);
            if (response.status === 200 && response.data) {
                Swal.fire({
                    icon: 'info',
                    title: 'Profile Update',
                    confirmButtonColor: '#ffb705',
                    html: `<h6>Profile updated successfully</h6>`,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                    },
                    willClose: () => {
                        window.location.reload();
                    }
                });



            }

        }).catch((error) => {

            console.log(error);

            if (error.response) {

                if (error.response.status === 422 && error.response.data) {

                    const responseErrors = error.response.data.errors;

                    const errorMsg = validationError(responseErrors);

                    displaySwal(errorMsg);

                }
                if (error.response.status === 404 && error.response.data) {

                    const iconAlert = 'error';
                    const titleAlert = 'Error';
                    const msg = error.response.data.message;

                    swalAlert(iconAlert, titleAlert, msg)

                }


                if (error.response.status === 500) {

                    const iconAlert = 'error';
                    const titleAlert = 'Upload Error';
                    const msg = error.response.data.message;

                    swalAlert(iconAlert, titleAlert, msg);


                }




            }

        });




    });

}

function swalAlert(iconAlert, titleAlert, msg) {


    Swal.fire({
        icon: iconAlert,
        confirmButtonColor: '#ffb705',
        title: titleAlert,
        text: msg,
        preConfirm: () => {
            window.location.reload();
        }
    });

}

const saveBtn = document.getElementById('save-user');

saveBtn.addEventListener('click', (event) => {

    event.preventDefault();

    const form = document.getElementById('admin-form');

    const formData = new FormData(form);

    axios.post('/api/v1/admin/new-user', formData).then((response) => {

        // console.log(response);

        if (response.status === 200 && response.data) {
            Swal.fire({
                icon: 'info',
                title: 'Profile Update',
                confirmButtonColor: '#ffb705',
                html: `<h6>User created successfully</h6>`,
                timer: 3000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                },
                willClose: () => {
                    window.location.reload();
                }
            });

        }


    }).catch((error) => {
        // console.log(error);

        if (error.response) {

            if (error.response.status === 422 && error.response.data) {

                const responseErrors = error.response.data.errors;

                const errorMsg = validationError(responseErrors);

                displaySwal(errorMsg);

            }

            if (error.response.status === 500) {

                const iconAlert = 'error';
                const titleAlert = 'Upload Error';
                const msg = error.response.data.message;

                swalAlert(iconAlert, titleAlert, msg);


            }




        }


    });



});


*/
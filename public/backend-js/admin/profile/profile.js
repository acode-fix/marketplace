import {
    displaySwal,
    validationError
} from "../../helper/helper.js";
import {
    getToken,
    loadDashboard,
    logout
} from "../helper/helper.js";

const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;


const userData = JSON.parse(localStorage.getItem('adminUser'));
console.log(userData);

axios.get('/api/v1/admin/details').then((response) => {
    // console.log(response);

    if (response.status === 200 && response.data) {

        const users = response.data.users;

        // console.log(user);

        loadUser(users)


    }

}).catch((error) => {

    console.log(error);

});



function loadUser(users) {

    let otherUsers = [];

  if(userData.id !== 2) {

    const user =  users.find((user) => {

      return   user.email === userData.email;

    });
    otherUsers.push(user);

    //console.log(otherUsers);
        
  }

    let display = ` <table class="table  table-hover">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>Email</th>
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
                    <td>${user.phone_number ?? 'N/A'}</td>  
                    <td><a href="" data-user-id="${user.id}" class="btn btn-success edit-btn">edit</a></td>
                  </tr>`;

    });

    display += `<tbody>`;



    document.querySelector('.js-user-table').innerHTML = display;

    if (userData.id === 2) {

        const addUserBtn = ` <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUser">Add User</button>`;

        document.querySelector('.js-admin').innerHTML = addUserBtn;


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

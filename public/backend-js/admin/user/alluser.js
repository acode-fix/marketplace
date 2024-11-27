import { displaySwal, hideLoader, showLoader, validationError } from '../../helper/helper.js';
import {
    getToken,
    getUser,
    getUserById
} from '../helper/helper.js';

const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

axios.get('/api/v1/admin/registered-user').then((response) => {
  //  console.log(response);

    if (response.status === 200 && response.data) {

        const users = response.data.users;

        loadUsers(users);


    }

}).catch((error) => {
    console.log(error);

});



function loadUsers(users) {

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

        display += ` <tr>
                  <td>${user.name ? user.name : 'No Data Yet'} </td>
                  <td>${user.email ? user.email : 'No Data Yet'}</td>
                  <td>${user.address ? user.address : 'No Data Yet'}</td>
                  <td>${user.phone_number ? user.phone_number : 'No Data Yet'}</td>
                  <td><a class="user-link" data-user-id="${user.id}" href="" >User Details</a></td> 
                  <td>
                  <button data-user-id="${user.id}"   type="btn" class="btn btn-sm edit btn-success js-edit">Edit</button>
                  <button data-user-id="${user.id}"   type="btn" class="btn btn-warning suspend btn-sm js-suspend">Suspend</button>
                  <button data-user-id="${user.id}"   type="btn" class="btn btn-sm btn-danger delete js-delete">Delete</button>
                  </td>  
              </tr>`;

    });

    display += `</tbody></table>`;


    document.querySelector('.registered').innerHTML = display;


    $('#example1').DataTable({
        responsive: true
    });


}


document.addEventListener('click', (event) => {

    if (event.target.classList.contains('user-link')) {

        event.preventDefault();

        const userId = event.target.dataset.userId;

        getUserById(userId);

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
            console.log(response);

            if (response.status === 200 && response.data) {

                const userData = response.data.user;
                document.querySelector('.fullname').value = userData.name;
                document.querySelector('.username').value = userData.username;
                document.querySelector('.phone').value = userData.phone_number;
                document.querySelector('.address').value = userData.address;
                document.querySelector('.email').value = userData.email;
                document.querySelector('.nationality').value = userData.nationality;
                document.querySelector('.bio').value = userData.bio;
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

    document.querySelector('.suspend-email').textContent = user.email ?? 'N/A';
    document.querySelector('.suspend-name').textContent = user.name ?? 'N/A';
    document.querySelector('.suspend-username').textContent = user.username ?? 'N/A';

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

    document.querySelector('.delete-email').textContent = user.email ?? 'N/A';
    document.querySelector('.delete-name').textContent = user.name ?? 'N/A';
    document.querySelector('.delete-username').textContent = user.username ?? 'N/A';

    deleteModal.show();

}

const deleteBtn = document.querySelector('.js-delete-yes');

deleteBtn.addEventListener('click', () => {

    axios.post(`/api/v1/admin/delete/${deleteUserId}`,).then((response) => {
        console.log(response)

        if(response.status === 200 && response.data) {

            const msg = response.data.message;
            const iconAlert = 'success';
            const titleAlert = 'Delete User';

            deleteModal.hide();

            swalAlert(iconAlert, titleAlert, msg);




        }

    }).catch((error) => {

        console.log(error);

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







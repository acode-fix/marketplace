
import{getToken, getUserById} from '../helper/helper.js';

const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

axios.get('/api/v1/admin/registered-user').then((response) => {
  console.log(response);

  if(response.status === 200 && response.data) {

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
          
          users.forEach((user)=> {

     display +=  ` <tr>
                  <td>${user.name ? user.name : 'No Data Yet'} </td>
                  <td>${user.email ? user.email : 'No Data Yet'}</td>
                  <td>${user.address ? user.address : 'No Data Yet'}</td>
                  <td>${user.phone_number ? user.phone_number : 'No Data Yet'}</td>
                  <td><a class="user-link" data-user-id="${user.id}" href="" >User Details</a></td> 
                  <td>
                  <button data-user-id="${user.id}"   type="btn" class="btn btn-sm btn-success js-approve">Edit</button>
                  <button data-user-id="${user.id}"   type="btn" class="btn btn-warning btn-sm js-reject">Suspend</button>
                  <button data-user-id="${user.id}"   type="btn" class="btn btn-sm btn-danger js-approve">Delete</button>
                  </td>  
              </tr>`;

          });
          
        display +=  `</tbody></table>`;


        document.querySelector('.registered').innerHTML = display;


        $('#example1').DataTable({
            responsive: true
        });


}


document.addEventListener('click', (event) => {

  if(event.target.classList.contains('user-link')) {

      event.preventDefault();

      const userId = event.target.dataset.userId;

      getUserById(userId);

  }
});

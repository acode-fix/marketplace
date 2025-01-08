import {
    getToken
} from "../helper/helper.js";


const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

const userData = JSON.parse(localStorage.getItem('adminUser'));

axios.get(`/api/v1/admin/onboarded-users/${userData.id}`).then((response) => {

    // console.log(response);

    const users = response.data.users;

    loadUsers(users);

}).catch((error) => {

    console.log(error);

});

function loadUsers(users) {
    let display = `
    <table id="example2" class="table table-striped nowrap" style="width:100%">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Shop Number</th>
          <th>Phone Number</th>
          <th>Full Details</th>
        </tr>
      </thead>
      <tbody>
  `;

    users.forEach((user) => {
        display += `
      <tr>
        <td>${user.name ?? 'No Data Yet'}</td>
        <td>${user.email ?? 'No Data Yet'}</td>
        <td>${user.shop_no ?? 'No Data Yet'}</td>
        <td>${user.phone_number ?? 'No Data Yet'}</td>
        <td><a class="user-link" data-user-id="${user.id}" href="#">User Details</a></td>
      </tr>
    `;
    });

    display += `</tbody></table>`;
    document.querySelector('.onboarded-users').innerHTML = display;

    // Initialize DataTable
    $('#example2').DataTable({
        responsive: true,
    });
}

if (userData.role_id === 1) {
    axios.get(`/api/v1/admin/onboarded-users/`)
        .then((response) => {
            const users = response.data.data;
            loadAgents(users);
        })
        .catch((error) => {
            console.error(error);
        });

    function loadAgents(data) {
        let display = `
      <table id="example3" class="table table-striped nowrap" style="width:100%">
        <thead>
          <tr>
            <th>Agent Name</th>
            <th>Agent Email</th>
            <th>Referred User Name</th>
            <th>Referred User Email</th>
            <th>Shop Number</th>
            <th>Phone Number</th>
            <th>Full Details</th>
          </tr>
        </thead>
        <tbody>
    `;

        data.forEach((item) => {
            const agent = item.agent;
            const referredUsers = item.referred_users;

            referredUsers.forEach((user) => {
                display += `
          <tr>
            <td>${agent.name ?? 'No Data Yet'}</td>
            <td>${agent.email ?? 'No Data Yet'}</td>
            <td>${user.name ?? 'No Data Yet'}</td>
            <td>${user.email ?? 'No Data Yet'}</td>
            <td>${user.shop_no ?? 'No Data Yet'}</td>
            <td>${user.phone_number ?? 'No Data Yet'}</td>
            <td><a class="user-link" data-user-id="${user.id}" href="#">User Details</a></td>
          </tr>
        `;
            });
        });

        display += `</tbody></table>`;
      document.querySelector('.agent-refferal').innerHTML = display;

        // Initialize DataTable
       $('#example3').DataTable({
           responsive: true,
       });

        // Add event listener for 'user-link' clicks
        document.addEventListener('click', (event) => {
            if (event.target.classList.contains('user-link')) {
                event.preventDefault();
                const userId = event.target.dataset.userId;
                localStorage.setItem('userId', JSON.stringify(userId));
                window.location.href = '/admin/view/user';
            }
        });
    }
} else {
    document.querySelector('.agent-tab').style.display = 'none';
}

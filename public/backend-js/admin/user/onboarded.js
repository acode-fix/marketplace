    import {
        getToken
    } from "../helper/helper.js";


    const token = getToken();

   axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

  const userData = JSON.parse(localStorage.getItem('adminUser'));

  document.querySelector('.users-onboarded').textContent = `Onboarded by: ${userData.email}`

  
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
            axios.get(`/api/v1/admin/onboarded-users/${userData.id}`, {
                params: {
                    page: page,
                    per_page: perPage,
                    search: searchTerm, // Send the search term to the server
                },
            })
            .then((response) => {

               // console.log(response);

                const result = response.data


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
            { data: 'shop_no', render: function(data) { return data ? data : 'N/A'; }},
            { data: 'phone_number', render: function(data) { return data ? data : 'N/A'; }},
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
        dataTableInstance.search(this.value).draw();
    });

  if (userData.role_id == 1) {

    document.querySelector('.agent-referral').style.display = 'block';

    let agentReferralsTable
        // Initialize the DataTable
        agentReferralsTable = $('#datatable2').DataTable({
            processing: true,
            serverSide: true, // Keep server-side processing for pagination and filtering
            ajax: function (data, callback, settings) {
                const page = data.start / data.length + 1; // Current page (1-based index)
                const perPage = data.length; // Number of records per page
                const searchTerm = data.search.value; // Get the search term for filtering

                // Fetch data from the server with pagination and search term
                axios.get(`/api/v1/admin/onboarded-users`, {
                    params: {
                        page: page,
                        per_page: perPage,
                        search: searchTerm, // Send the search term to the server
                    },
                })
                .then((response) => {

                
                // console.log(response)

                        let rows = [];
                        const results = response.data.data;

                        for(let i = 0; i < results.length; i++) {

                            const agentData = results[i]

                            //console.log(agent);

                            const agentName = agentData.agent.name;
                            const agentEmail = agentData.agent.email;


                            for(let j = 0; j < agentData.referred_users.length; j++ ) {

                            const agentRefferal = agentData.referred_users[j];
                            
                            const userId  = agentRefferal.id;
                            const userName = agentRefferal.name;
                            const userEmail = agentRefferal.email;
                            const shopNo = agentRefferal.shop_no;
                            const phone = agentRefferal.phone_number;
                                
                            rows.push({userId, agentName,agentEmail, userName,userEmail,shopNo,phone})


                            }
            
                        
            
                        }

                    // Pass data to DataTable
                    callback({
                        draw: data.draw,
                        recordsTotal: response.data.total, // Total number of records without filtering
                        recordsFiltered: response.data.filtered_total, // Total number of records after filtering
                        data: rows});
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
                { data: 'agentName', render: function(data) { return data ? data : 'N/A'}},
                { data: 'agentEmail', render: function(data) { return data ? data : 'N/A'}},
                { data: 'userName', render: function(data) { return data ? data : 'N/A'; }},
                { data: 'userEmail', render: function(data) { return data ? data : 'N/A'; }},
                { data: 'shopNo', render: function(data) { return data ? data : 'N/A'; }},
                { data: 'phone', render: function(data) { return data ? data : 'N/A'; }},
                {
                    data: null,
                    orderable: false,
                    searchable: false,
                    render: function (data) {
                        return `<button class="btn btn-sm btn-light user-link" data-user-id="${data.userId}">Full details</button>`;
                    },
                },
            ],
            responsive: true,
        });

        // Search input handler
        $('#datatable_filter input').on('keyup', function () {
            // Trigger the search on the DataTable to filter the data
            agentReferralsTable.search(this.value).draw();
        });

    }  

  document.addEventListener('click', (event) => {

    if (event.target.classList.contains('user-link')) {

        event.preventDefault();

        const userId = event.target.dataset.userId;

        localStorage.setItem('userId', JSON.stringify(userId));
        window.location.href = '/admin/view/user'


    }
  });



/*

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
*/
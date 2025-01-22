import { getDate } from "../../helper/helper.js";
import { getBadgeDetails, getToken } from "../helper/helper.js";


const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

let activeBadgeTableInstance;

activeBadgeTableInstance = $('#datatable').DataTable({
    processing: true,
    serverSide: true, 
    ajax: function (data, callback, settings) {
        const page = data.start / data.length + 1;
        const perPage = data.length; 
        const searchTerm = data.search.value; 
        axios.get('/api/v1/admin/active-badges', {
            params: {
                page: page,
                per_page: perPage,
                search: searchTerm,
            
            },
        })
        .then((response) => {
                    
        const result = response.data;

    
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
                return (meta.row + 1) + (meta.settings._iDisplayStart); 
            }
        },

        { data: 'name', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'email', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'badge_type', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'purchase_date',render: function(data) { return `${getDate(data)}` }},
        { data: 'expiry_date', render: function(data) { return `${getDate(data)}` }},

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


$('#datatable_filter input').on('keyup', function () {
  activeBadgeTableInstance.search(this.value).draw();
});

  document.addEventListener('click', (event) => {

      if(event.target.classList.contains('user-link')) {

        event.preventDefault();

        const { userId } = event.target.dataset;
        
        localStorage.setItem('userId', JSON.stringify(userId));
        window.location.href = '/admin/view/user'

      }

  })


  let expiredBadgeTableInstance;

  expiredBadgeTableInstance = $('#datatable2').DataTable({
    processing: true,
    serverSide: true, 
    ajax: function (data, callback, settings) {
        const page = data.start / data.length + 1;
        const perPage = data.length; 
        const searchTerm = data.search.value; 
        axios.get('/api/v1/admin/expired-badges', {
            params: {
                page: page,
                per_page: perPage,
                search: searchTerm,
            
            },
        })
        .then((response) => {
                    
        const result = response.data;

    
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
                return (meta.row + 1) + (meta.settings._iDisplayStart); 
            }
        },
      

        { data: 'name', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'email', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'badge_type', render: function(data) { return data ? data : 'N/A'; }},
        { data: 'purchase_date',render: function(data) { return `${getDate(data)}` }},
        { data: 'expiry_date', render: function(data) { return `${getDate(data)}` }},

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


$('#datatable_filter input').on('keyup', function () {
  expiredBadgeTableInstance.search(this.value).draw();
});


let unBadgedTableInstance;

unBadgedTableInstance= $('#datatable3').DataTable({
  processing: true,
  serverSide: true, 
  ajax: function (data, callback, settings) {
      const page = data.start / data.length + 1;
      const perPage = data.length; 
      const searchTerm = data.search.value; 
      axios.get('/api/v1/admin/unbadged-users', {
          params: {
              page: page,
              per_page: perPage,
              search: searchTerm,
          
          },
      })
      .then((response) => {
                  
      const result = response.data;

  
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
              return (meta.row + 1) + (meta.settings._iDisplayStart); 
          }
      },
    

      { data: 'username', render: function(data) { return data ? data : 'N/A'; }},
      { data: 'email', render: function(data) { return data ? data : 'N/A'; }},
      { data: 'badge_status', render: function(data) { return data == 0 ? 'No active badge' : '' }},
      { data: 'address',render: function(data) { return data ? data : 'N/A'}},
      { data: 'phone_number', render: function(data) { return data ? data: 'N/A'; }},

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


$('#datatable_filter input').on('keyup', function () {
  unBadgedTableInstance.search(this.value).draw();
});




/*

async function badgeDetails() {

  const users = await getBadgeDetails();

   const activeBadges = users.data.activeBadges;
   const expiredBadges = users.data.expiredBadges;
   const unverifiedUser = users.data.unverifiedUser;

   loadActiveBadges(activeBadges);
   loadExpiredBadges(expiredBadges);
   loadUnverifiedSeller(unverifiedUser);




}

badgeDetails();

document.addEventListener('click', (event) => {

  if(event.target.classList.contains('user-link')) {

    event.preventDefault();

    const { userId } = event.target.dataset;
    
    localStorage.setItem('userId', JSON.stringify(userId));
    window.location.href = '/admin/view/user'

  }

});


function loadActiveBadges(users) {

  let display = `<table id="example1" class="table table-striped nowrap" style="width:100%">'
  <thead>
      <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Badge Subscription</th>
          <th>Purchase Date</th>
          <th>Expiry Date</th>
          <th>User Details</th>
      </tr>
  </thead>
  <tbody>`;

users.forEach((user) => {

 // console.log(user)

display += ` <tr>
          <td>${user.name ? user.name : 'N/A'} </td>
          <td>${user.email ? user.email : 'N/A'}</td>
          <td>${user.badge_type ?? 'N/A'}</td>
          <td>${getDate(user.purchase_date)}</td>
          <td>${getDate(user.expiry_date)}</td>
          <td><a class="user-link" data-user-id="${user.id}" href="" >User Details</a></td> 
      </tr>`;

});

display += `</tbody></table>`;


document.querySelector('.active-badge').innerHTML = display;


$('#example1').DataTable({
responsive: true
});
}


function loadExpiredBadges(users) {

  let display = `<table id="example2" class="table table-striped nowrap" style="width:100%">'
  <thead>
      <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Badge Subscription</th>
          <th>Purchase Date</th>
          <th>Expiry Date</th>
          <th>User Details</th>
      </tr>
  </thead>
  <tbody>`;

users.forEach((user) => {

 // console.log(user)

display += ` <tr>
          <td>${user.name ? user.name : 'N/A'} </td>
          <td>${user.email ? user.email : 'N/A'}</td>
          <td>${user.badge_type ?? 'N/A'}</td>
          <td>${getDate(user.purchase_date)}</td>
          <td>${getDate(user.expiry_date)}</td>
          <td><a class="user-link" data-user-id="${user.id}" href="" >User Details</a></td> 
      </tr>`;

});

display += `</tbody></table>`;


document.querySelector('.expired-badge').innerHTML = display;


$('#example2').DataTable({
responsive: true
});
}


function loadUnverifiedSeller(users) {

  let display = `<table id="example3" class="table table-striped nowrap" style="width:100%">'
  <thead>
      <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Badge Subscription</th>
          <th>User Details</th>
      </tr>
  </thead>
  <tbody>`;

users.forEach((user) => {

 // console.log(user)

display += ` <tr>
          <td>${user.name ? user.name : 'N/A'} </td>
          <td>${user.email ? user.email : 'N/A'}</td>
          <td>${user.badge_type ?? 'N/A'}</td>
          <td><a class="user-link" data-user-id="${user.id}" href="" >User Details</a></td> 
      </tr>`;

});

display += `</tbody></table>`;


document.querySelector('.unverified').innerHTML = display;


$('#example3').DataTable({
responsive: true
});
}


*/


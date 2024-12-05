import { getDate } from "../../helper/helper.js";
import { getBadgeDetails, getToken } from "../helper/helper.js";


const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

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

  event.preventDefault();

  if(event.target.classList.contains('user-link')) {

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





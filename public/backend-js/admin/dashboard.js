import { serverError } from "./auth-helper.js";
import { logoutUser } from "./auth.js";
import { getRegisteredUser, calculateTotal, getSuspendedUsers, getDeletedUsers, getListedProducts, getDelistedProducts, getBadgeDetails } from "./helper/helper.js";

const token = localStorage.getItem('token');

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;


if(!token) {

  Swal.fire({
    icon: 'error',
    title: 'Unauthenticated User',
    confirmButtonColor: '#ffb705',
    text: 'Please log in.'
}).then(() => {

    window.location.href = '/admin/login'; 
    
});

}else { 

  axios.get('/api/v1/getuser', {

  }).then((response) => {

    //console.log(response)

  }).catch((error) => {
    console.log(error);


  });
}




const logOut = document.getElementById('adminLogOut');

logOut.addEventListener('click', function(event) {

        event.preventDefault(); 

        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: '#ffb705',
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes,I am sure!"

      }).then((result) => {

      if (result.isConfirmed) {

        logoutUser();
        
      }
      });

});



document.getElementById('view').addEventListener('click', () => {


  axios.get('/api/v1/verify/user').then((response) => {
   // console.log(response);

    if(response.status === 200 && response.data) {
      const data = response.data.data;
      //console.log(data);

    localStorage.setItem('userData', JSON.stringify(data));

     window.location.href = '/admin/verification/view';

    } 

    if(response.status === 500) {

      serverError();
    }


  }).catch((error) => {

    //console.log(error);

    if(error.response) {

      if(error.response.status === 404 && error.response.data) {

        Swal.fire({
            icon: 'error',
            confirmButtonColor: '#ffb705',
            title: 'Loading All User',
            text: error.response.data.message,
        })


    }


    }
  })

});


document.getElementById('get-users').addEventListener('click', (event) => {
  event.preventDefault();

  window.location.href = '/admin/dashboard/alluser';

});


async function fetchRegisteredUser() {

const users = await getRegisteredUser();

const total =  calculateTotal(users);
const totalEl = document.querySelector('.js-total-user');
 
displayTotal(total,totalEl)

  
}

fetchRegisteredUser();


async function  fetchSuspendedUsers() {

  const users = await getSuspendedUsers();

  const total = calculateTotal(users);

  const totalEl = document.querySelector('.js-total-suspended-user');

  displayTotal(total,totalEl)
  
}

fetchSuspendedUsers();


async function getDeletedAccounts() {

  const users = await getDeletedUsers();

  const total = calculateTotal(users);

  const totalEl = document.querySelector('.js-total-deleted-user');

   displayTotal(total,totalEl)


  
}

getDeletedAccounts();



async function getActiveProducts() {

  const products = await getListedProducts();

  const total = calculateTotal(products);
  const totalEl = document.querySelector('.js-total-products');

  displayTotalProducts(total, totalEl)
 
}

getActiveProducts();

async function getDeletedProducts() {

  const  products = await getDelistedProducts();

  const total = calculateTotal(products);
  const totalEl = document.querySelector('.js-total-deleted-products');

  displayTotalProducts(total, totalEl);
  
}
getDeletedProducts();

async function getActiveBadges() {

  const users = await getBadgeDetails();

  const activeBadges = users.data.activeBadges;
  const expiredBadges = users.data.expiredBadges;
  const unverifiedUser = users.data.unverifiedUser;

  
  const total = calculateTotal(activeBadges);
  const totalEl = document.querySelector('.js-total-active');

  const total1 = calculateTotal(expiredBadges);
  const totalEl1 = document.querySelector('.js-total-expired');

  const total2 = calculateTotal(unverifiedUser);
  const totalEl2 = document.querySelector('.js-total-unverified');

  displayTotalProducts(total, totalEl);
  displayTotalProducts(total1, totalEl1);
  displayTotalProducts(total2, totalEl2);


}

getActiveBadges()




function displayTotal(total, totalEl) {

  if(totalEl) {
    totalEl.innerHTML = `Total Number Of  Users :: ${total}`;
  }


}

function displayTotalProducts(total, totalEl) {

  
  if(totalEl) {
    totalEl.innerHTML = `Total Number Of  Products :: ${total}`;
  }



}












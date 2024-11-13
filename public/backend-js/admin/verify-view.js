import { serverError } from "./auth-helper.js";


//console.log('yes');

//const token = localStorage.getItem('token');

//axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

const data = JSON.parse(localStorage.getItem('userData'));

//console.log(data);


function getPaymentStatus(payment) {

   const filterPayment = payment.find((pay) => {
        return pay.status === 1

    });

    let status = filterPayment ? filterPayment.status : null;

    return status;
   
}




let display = `<table id="example1" class="table table-striped nowrap" style="width:100%">'
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th>Gender</th>
                  <th>Nationality</th>
                  <th>Payment Status</th>
                  <th>Full Details</th>
                  <th>Approval</th>
              </tr>
          </thead>
          <tbody>`;
          
          data.forEach((user)=> {

     display +=  ` <tr>
                  <td>${user.name ? user.name : 'No Data Yet'} </td>
                  <td>${user.email ? user.email : 'No Data Yet'}</td>
                  <td>${user.address ? user.address : 'No Data Yet'}</td>
                  <td>${user.phone_number ? user.phone_number : 'No Data Yet'}</td>
                  <td>${user.gender ? user.gender : 'No Data Yet'}</td>
                  <td>${user.nationality ? user.nationality : 'No Data Yet'}</td>
                  <td>${getPaymentStatus(user.payment) ? 'success' : 'No payment'}</td>
                  <td><a class="user-link" data-user-id="${user.id}" href="" >User Details</a></td> 
                  <td><button data-user-id="${user.id}"   type="btn" class="btn btn-sm btn-success js-approve">Approve</button> <button type="btn"  data-user-id="${user.id}"class="btn btn-danger btn-sm js-reject">Reject</button></td>  
              </tr>`;

          });
          
        display +=  `</tbody></table>`;


        document.querySelector('.pending').innerHTML = display;


        $('#example1').DataTable({
            responsive: true
        });


document.addEventListener('click', (event) => {

    if(event.target.classList.contains('user-link')) {

        event.preventDefault();

        const userId = event.target.dataset.userId;

        axios.get('/api/v1/userDetails',  {
            params: {
                user:userId,
            }
        },

    ).then((response) => {
           console.log(response);

           if(response.status === 200 && response.data) {

                const data = response.data.data;
                localStorage.setItem('userDetail', JSON.stringify(data));

                window.location.href = '/admin/view/user'

           }
            
        }).catch((error) => {

            console.log(error);

            if(error.response) {

                if(error.response.status === 404 && error.response.data) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Loading All User',
                        confirmButtonColor: '#ffb705',
                        text: error.response.data.message,
                    })
            
            
                }

                if(error.response.status === 500) {
                    serverError();
                }
            }

        })
    }
});

document.addEventListener('click',(event) => {

    if(event.target.classList.contains('js-approve')) {

        const userId = event.target.dataset.userId;

        axios.post( '/api/v1/approve/user',   {

            userId},
         {
            headers: {
                'Content-type': 'application/json',
            }


        }).then((response) => {
            console.log(response)

            if(response.status === 200 && response.data) {

                const message = response.data.message;

                let timerInterval;

                Swal.fire({

                    icon: 'success',
                    title: 'Verification Approval',
                    confirmButtonColor: '#ffb705',
                    text: message,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                    }, 1000);
                    },
                    willClose: () => {

                    clearInterval(timerInterval);
                    window.location.href =  '/admin/dashboard';
                   
                    }

                })

            

            }


        }).catch((error) => {
            console.log(error);

            if(error.response) {

                    if(error.response.status === 404 && error.response.data) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Verification Approval',
                            confirmButtonColor: '#ffb705',
                            text: error.response.data.message,
        
                            willClose(){
                                window.location.reload();
        
                            }
                        });
        
                    }

                    if(error.response.status === 400 && error.response.data) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Verification Approval',
                            confirmButtonColor: '#ffb705',
                            text: error.response.data.message,
        
                            willClose(){
                                window.location.reload();
        
                            }
                        });

                    }

            }

           

        })


    }

});

  let userId;
document.addEventListener('click', (event) => {

    if(event.target.classList.contains('js-reject')) {

         userId = event.target.dataset.userId;

        const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
        modal.show();

    
    }

});


document.querySelector('.js-yes').addEventListener('click', () => {

    console.log(userId);

    const text = document.getElementById('textarea').value;

    if(text.trim() === '') {

        document.getElementById('error').textContent = ' * Reason Must Be Provided!! *';
    

    }else {

        axios.post( '/api/v1/reject/user', {
            userId,
            text, },

         {
            headers: {
                'Content-type': 'application/json',
            }
            
        }).then((response) => {
            
            console.log(response);

            if(response.status === 200 && response.data) {

                const message = response.data.message;

                let timerInterval;

                Swal.fire({

                    icon: 'success',
                    title: 'Verification Rejection',
                    confirmButtonColor: '#ffb705',
                    text: message,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                    }, 1000);
                    },
                    willClose: () => {

                    clearInterval(timerInterval);
                    window.location.href =  '/admin/dashboard';
                   
                    }

                })

            

            }


        }).catch((error) => {

            console.log(error);
            if(error.response) {


                if(error.response.status === 404 && error.response.data) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Verification Rejection',
                        confirmButtonColor: '#ffb705',
                        text: error.response.data.message,
    
                        willClose(){
                            window.location.reload();
    
                        }
                    });
    
                }


                if(error.response.status === 500) {

                    serverError();


                }

            }

            

        })

    }
});


document.querySelector('.approve-menu ').addEventListener('click', () => {

    axios.get('/api/v1/view/approved/user', {

    }).then((response) => {

        console.log(response);

        if(response.status === 200 && response.data) {

            const data = response.data.data;


            let approvedData = `<table id="example3" class="table table-striped nowrap" style="width:100%">'
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th>Gender</th>
                  <th>Nationality</th>
                  <th>Payment Status</th>
                  <th>Full Details</th>
              </tr>
          </thead>
          <tbody>`;
          
          data.forEach((user)=> {

     approvedData +=  ` <tr>
                  <td>${user.name ? user.name : 'No Data Yet'} </td>
                  <td>${user.email ? user.email : 'No Data Yet'}</td>
                  <td>${user.address ? user.address : 'No Data Yet'}</td>
                  <td>${user.phone_number ? user.phone_number : 'No Data Yet'}</td>
                  <td>${user.gender ? user.gender : 'No Data Yet'}</td>
                  <td>${user.nationality ? user.nationality : 'No Data Yet'}</td>
                  <td>${getPaymentStatus(user.payment) ? 'success' : 'No payment'}</td>
                  <td><a class="user-link" data-user-id="${user.id}" href="" >User Details</a></td> 
                  
              </tr>`;

          });
          
        approvedData +=  `</tbody></table>`;


        document.querySelector('.approved').innerHTML = approvedData;


        $('#example3').DataTable({
            responsive: true
        });


        }

        

    }).catch((error) => {
        console.log(error);


        if(error.response) {

            if(error.response.status === 404 && error.response.data) {

                Swal.fire({
                    icon: 'error',
                    title: 'Loading Approved User',
                    text: error.response.data.message,
                    willClose() {
                        window.location.reload();
                    }
                })
        
        
            }

            if(error.response.status === 500) {
                serverError();
            }
        }
    })

});


document.querySelector('.reject-menu').addEventListener('click', () => {

    axios.get('/api/v1/view/rejected/user', {

    }).then((response) => {

        console.log(response);

        if(response.status === 200 && response.data) {

            const data = response.data.data;


            let rejectedData = `<table id="example4" class="table table-striped nowrap" style="width:100%">'
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th>Gender</th>
                  <th>Nationality</th>
                  <th>Payment Status</th>
                  <th>Full Details</th>
              </tr>
          </thead>
          <tbody>`;
          
          data.forEach((user)=> {

     rejectedData +=  ` <tr>
                  <td>${user.name ? user.name : 'No Data Yet'} </td>
                  <td>${user.email ? user.email : 'No Data Yet'}</td>
                  <td>${user.address ? user.address : 'No Data Yet'}</td>
                  <td>${user.phone_number ? user.phone_number : 'No Data Yet'}</td>
                  <td>${user.gender ? user.gender : 'No Data Yet'}</td>
                  <td>${user.nationality ? user.nationality : 'No Data Yet'}</td>
                  <td>${getPaymentStatus(user.payment) ? 'success' : 'No payment'}</td>
                  <td><a class="user-link" data-user-id="${user.id}" href="" >User Details</a></td> 
                  
              </tr>`;

          });
          
        rejectedData +=  `</tbody></table>`;


        document.querySelector('.rejected').innerHTML = rejectedData;


        $('#example4').DataTable({
            responsive: true
        });


        }

        

    }).catch((error) => {
        console.log(error);


        if(error.response) {

            if(error.response.status === 404 && error.response.data) {

                Swal.fire({
                    icon: 'error',
                    title: 'Loading Rejected User',
                    confirmButtonColor: '#ffb705',
                    text: error.response.data.message,
                    willClose() {
                        window.location.reload();
                    }
                })
        
        
            }

            if(error.response.status === 500) {
                serverError();
            }
        }
    })



})


        



   

     

    



    


        
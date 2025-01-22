import { serverError } from "./auth-helper.js";

const token = localStorage.getItem('token');

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

const data = JSON.parse(localStorage.getItem('userData'));




function getPaymentStatus(payment) {

   const filterPayment = payment.find((pay) => {
        return pay.status === 1

    });

    let status = filterPayment ? filterPayment.status : null;

    return status;
   
}


    let  pendingTableInstance;

    pendingTableInstance = $('#datatable').DataTable({
        processing: true,
        serverSide: true, 
        ajax: function (data, callback, settings) {
            const page = data.start / data.length + 1;
            const perPage = data.length; 
            const searchTerm = data.search.value; 
            axios.get('/api/v1/verify/user', {
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
            { data: 'address', render: function(data) { return data ? data : 'N/A'; }},
            { data: 'phone_number', render: function(data) { return data ? data : 'N/A'; }},
            { data: 'payment', 
                
                render: function(data) { return `${getPaymentStatus(data) ?? 'N/A'}` }
            
            },
    
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function (data) {
                    return `<button class="btn btn-sm btn-light user-link" data-user-id="${data.id}">Full details</button>`;
                },
            },
            {
                data:null,
                orderable: false,
                searchable : false,
                render : function (data) {
                    return `<button class="btn btn-sm btn-success js-approve" data-user-id="${data.id}">Approve</button>
                            <button class="btn btn-sm btn-danger js-reject" data-user-id="${data.id}">Reject</button>`
                }


            }

            
        ],
        responsive: true,
    });
    

    $('#datatable_filter input').on('keyup', function () {
        pendingTableInstance.search(this.value).draw();
    });


    let userId;

    document.addEventListener('click', (event) => {

        if(event.target.classList.contains('user-link')) {
    
            event.preventDefault();
    
            const userId = event.target.dataset.userId;
    
            localStorage.setItem('userId', JSON.stringify(userId));
    
            window.location.href = '/admin/view/user'
        }


        if(event.target.classList.contains('js-reject')) {

            userId = event.target.dataset.userId;
   
           const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
           modal.show();
   
       
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
                       // window.location.reload();
                       
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
                                //    window.location.reload();
            
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
                                //    window.location.reload();
            
                                }
                            });
    
                        }
    
                }
    
               
    
            })
    
    
        }
    
    });


    document.querySelector('.js-yes').addEventListener('click', () => {

       
    
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
                        window.location.reload();
                       
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


    let  approvedTableInstance;

    approvedTableInstance = $('#datatable2').DataTable({
        processing: true,
        serverSide: true, 
        ajax: function (data, callback, settings) {
            const page = data.start / data.length + 1;
            const perPage = data.length; 
            const searchTerm = data.search.value; 
            axios.get('/api/v1/view/approved/user', {
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
            { data: 'address', render: function(data) { return data ? data : 'N/A'; }},
            { data: 'phone_number', render: function(data) { return data ? data : 'N/A'; }},
            { data: 'payment', 
                
                render: function(data) { return `${getPaymentStatus(data) ? 'successful' : 'N/A'}` }
            
            },
    
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
        approvedTableInstance.search(this.value).draw();
    });


    
    let  rejectedTableInstance;

    rejectedTableInstance = $('#datatable3').DataTable({
        processing: true,
        serverSide: true, 
        ajax: function (data, callback, settings) {
            const page = data.start / data.length + 1;
            const perPage = data.length; 
            const searchTerm = data.search.value; 
            axios.get('/api/v1/view/rejected/user', {
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
            { data: 'address', render: function(data) { return data ? data : 'N/A'; }},
            { data: 'phone_number', render: function(data) { return data ? data : 'N/A'; }},
            { data: 'payment', 
                
                render: function(data) { return `${getPaymentStatus(data) ? 'successful' : 'N/A'}` }
            
            },
    
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
    

    



/*

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

        localStorage.setItem('userId', JSON.stringify(userId));

        window.location.href = '/admin/view/user'

    //     axios.get('/api/v1/userDetails',  {
    //         params: {
    //             user:userId,
    //         }
    //     },

    // ).then((response) => {
    //        console.log(response);

    //        if(response.status === 200 && response.data) {

    //             const data = response.data.data;
    //             localStorage.setItem('userDetail', JSON.stringify(data));

    //             window.location.href = '/admin/view/user'

    //        }
            
    //     }).catch((error) => {

    //         console.log(error);

    //         if(error.response) {

    //             if(error.response.status === 404 && error.response.data) {

    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Loading All User',
    //                     confirmButtonColor: '#ffb705',
    //                     text: error.response.data.message,
    //                 })
            
            
    //             }

    //             if(error.response.status === 500) {
    //                 serverError();
    //             }
    //         }

    //     })



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



});

*/

        



   

     

    



    


        
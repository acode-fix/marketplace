import {
    displaySwal,
    getToken
} from "../helper/helper.js";

const token = getToken();

if (token) {

  

    const btn = document.getElementById('save-btn');
    const mobileBtn = document.getElementById('mobile-save-btn');


     btn.addEventListener('click', function () {

        const deletionReason = document.getElementById('deletion_reason').value;

          sendRequest(deletionReason);   
    });

    mobileBtn.addEventListener('click', () => {

        
        const deletionReason = document.getElementById('deletion_reason-mobile').value;

          sendRequest(deletionReason);  

    })


    function sendRequest(deletionReason) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action is irreversible and will delete your account and all associated data.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#fe3d3d',
            cancelButtonColor: '#ffb705',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete('api/v1/user',{
                        data: {
                            deletion_reason : deletionReason,
                        },
                        headers: {
                            'Authorization': 'Bearer ' + token
                        }
                    })
                    .then(function (response) {
                        if (response.data.status) {
                          
                            Swal.fire({
                                icon: 'success',
                                confirmButtonColor: '#ffb705',
                                title: 'Account Deleted',
                                text:  response.data.message,
                            }).then(() => {
                                localStorage.removeItem('apiToken');
                                localStorage.clear();
                                window.location.href = '/';
                            });
                         } 
                       
                    })
                    .catch(function (error) {
                    
                        if(error.response) {

                            if(error.response.status === 422 && error.response.data) {

                                const responseErrors = error.response.data.errors;

                                let allErrors = [];
            
                                for (let field in responseErrors) {
            
                                    const fieldErrors = responseErrors[field];
                                    fieldErrors.forEach((message) => {
                                        allErrors.push(message);
            
                                    });
                                }
                                const errorMsg = allErrors.join('\n')
            
                                displaySwal(errorMsg);
            
                            }

                            if(error.response.status === 401) {

                                Swal.fire({
                                            icon: 'error',
                                            confirmButtonColor: '#ffb705',
                                            title: 'Account Deleted',
                                            text:  error.response.data.message,
                                        })

                            }

                            if(error.response.status === 500) {


                                Swal.fire({
                                    icon: 'error',
                                    confirmButtonColor: '#ffb705',
                                    title: 'Account Deleted',
                                    text:  'Something Went Wrong, Try Again Later',
                                    wilClose: () => {
                                        window.location.href = '/';
                                    }
                                })

                                
                               
                            }



                        }


                    });
            }
        });
    }





}

import {
    getToken
} from "../helper/helper.js";

const token = getToken();

if (token) {

    const desktopBtn = document.getElementById('deleteAccountBtn');
    const mobileBtn = document.getElementById('mobile-deleteAccountBtn');

    [desktopBtn, mobileBtn].forEach((btn) => {

        if (btn) {

            btn.addEventListener('click', function () {


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
                        axios.delete('api/v1/user', {
                                headers: {
                                    'Authorization': 'Bearer ' + token
                                }
                            })
                            .then(function (response) {
                                if (response.data.status) {
                                    //   Swal.fire(
                                    //       'Deleted!',
                                    //       response.data.message,
                                    //       'success',
                                    //        confirmButtonColor: '#ffb705',

                                    //   )
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
                                } else {
                                    // Swal.fire(
                                    //     'Error!',
                                    //     response.data.message,
                                    //     'error'
                                    // );
                                    Swal.fire({
                                        icon: 'error',
                                        confirmButtonColor: '#ffb705',
                                        title: 'Account Deleted',
                                        text:  response.data.message,
                                    })
                                }
                            })
                            .catch(function (error) {
                                Swal.fire(
                                    'An error occurred',
                                    error.response.data.message || 'Please try again later.',
                                    'error'
                                );
                            });
                    }
                });
            });


        }

    });





}

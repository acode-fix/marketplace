@extends('layouts.others.app')
@section('title','Delete')
@section('navtitle', 'Delete Account')


@section('content')



  <div class="main">

    <div style="height: 400px"  class="content" >
      <div class="container" >
        <div class="row">
          <div class="col">
            <div class="container mt-4">
              <h6 class="fw-bold">Are sure you want to delete your account?</h6>
              <p class="fw-light mt-4">The following will be deleted as well:</p>
              <ul>
                <li class="fw-bold">All Posted Products</li>
                <li class="fw-bold">All Uploaded Media</li>
                <li class="fw-bold">Personal Info</li>
              </ul>
              <p class="fw-light">Note that you will close your buyandsellmarketplace-account</p>
              <p class="fw-light your">Your verified seller subsription/any active promotion wil be canceled with no
                refund, this is also no reversible</p>
              <div class="row">
                <div class="col-10 mt-4">
                  <div style="float: right;">
                    <button type="button" class="btn cancel-btn me-4 mb-2">Cancel</button>
                    <button type="button" class="btn del-btn mb-2" id="deleteAccountBtn">Delete Account</button>

                  </div>


                </div>


              </div>


            </div>

          </div>
        </div>

      </div>


    </div>

    <div class="mobile-view">
      <div class="container-fluid">
        <!-- <div  class="row ">
          <div style="display: flex; align-items: center; justify-content: space-between;">
            <div class="mobile-link-btn">
              <a href="privacy.html">Privacy Policy</a>
            </div>
            <div class="mobile-link-btn">
              <a href="refer.html">Refer a Friend</a>
            </div>
            <div class="mobile-link-btn">
              <a href="sign.html">Sign out</a>
            </div>

            <div class="mobile-link-btn">
              <a href="delete.html"> Delete Account</a>
            </div>
            <div class="mobile-link-btn">
              <a href="wallet.html"> Wallet</a>
            </div>
         </div>
        </div> -->
        <div class="container">
          <div class="row mt-5">
            <div class="col">
              <h6 class="fw-bold only-bold mt-1">Are sure you want to delete your account?</h6>
              <p class="fw-light mt-4">The following will be deleted as well:</p>
              <ul>
                <li class="fw-bold  only-bold">All Posted Products</li>
                <li class="fw-bold  only-bold">All Uploaded Media</li>
                <li class="fw-bold  only-bold">Personal Info</li>
              </ul>
              <p class="fw-light">Note that you will close your buyandsellmarketplace-account</p>
              <p class="fw-light your">Your verified seller subsription/any active promotion wil be canceled with no
                refund, this is also no reversible</p>

            </div>




          </div>
          <div class="row">
            <div class="col mt-5">
              <div>
                <button type="button" class="btn cancel-btn me-4 mb-2">Cancel</button>
                <button type="button" class="btn del-btn1 mb-2" id="deleteAccountBtn">Delete Account</button>
              </div>


            </div>


          </div>
        </div>
      </div>
    </div>

  </div>


  {{-- <script>
    document.getElementById('deleteAccountBtn').addEventListener('click', function() {
        if (confirm("Are you sure you want to delete your account? This action is irreversible.")) {

            const token = localStorage.getItem('apiToken'); // Get the token from local storage

            axios.delete('api/v1/user', {
                headers: {
                    'Authorization': 'Bearer ' + token // Assuming the token is stored in localStorage
                }
            })
            .then(function(response) {
                if (response.data.status) {
                    alert(response.data.message);
                    localStorage.removeItem('apiToken'); // Remove the token from localStorage
                    window.location.href = '/'; // Redirect to the homepage or login page
                } else {
                    alert('Error: ' + response.data.message);
                }
            })
            .catch(function(error) {
                alert('An error occurred: ' + error.response.data.message);
            });
        }
    });
    </script> --}}
    <script type="module" src="{{ asset('backend-js/auth.js') }}"></script>
    <script>
        document.getElementById('deleteAccountBtn').addEventListener('click', function() {
            const token = localStorage.getItem('apiToken'); // Get the token from local storage

            Swal.fire({
                title: 'Are you sure?',
                text: "This action is irreversible and will delete your account and all associated data.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('api/v1/user', {
                        headers: {
                            'Authorization': 'Bearer ' + token // Assuming the token is stored in localStorage
                        }
                    })
                    .then(function(response) {
                        if (response.data.status) {
                            Swal.fire(
                                'Deleted!',
                                response.data.message,
                                'success'
                            ).then(() => {
                                localStorage.removeItem('apiToken'); // Remove the token from localStorage
                                window.location.href = '/'; // Redirect to the homepage or login page
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                response.data.message,
                                'error'
                            );
                        }
                    })
                    .catch(function(error) {
                        Swal.fire(
                            'An error occurred',
                            error.response.data.message || 'Please try again later.',
                            'error'
                        );
                    });
                }
            });
        });
        </script>



@endsection

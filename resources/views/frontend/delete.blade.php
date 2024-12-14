@extends('layouts.others.app')
@section('title','Delete')
@section('navtitle', 'Delete Account')


@section('content')



<div class="main">

  <div style="height: 400px" class="content">
    <div class="container">
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
            <p class="fw-light">Note that you will close your Loopmart-account</p>
            <p class="fw-light your">Your verified seller subsription/any active promotion wil be canceled with no
              refund, this is also not reversible</p>
            <div class="row">
              <div class="col-10 mt-4">
                <div style="float: right;">
                  <a href="/" type="button" class="btn cancel-btn me-4 mb-2">Cancel</a>
                  <button data-bs-toggle="modal" data-bs-target="#staticBackDrop" type="button" class="btn del-btn mb-2"
                    id="deleteAccountBtn">Delete Account</button>

                </div>


              </div>


            </div>


          </div>

        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackDrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Reason For Deleting Account</label>
              <textarea id="deletion_reason" class="form-control" rows="3"></textarea>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="save-btn" class="btn btn-success">save</button>
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
              refund, this is also not reversible</p>

          </div>

          <div class="modal fade" id="staticBackDrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
    
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Reason For Deleting Account</label>
                  <textarea id="deletion_reason-mobile" class="form-control" rows="3"></textarea>
                </div>
    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="mobile-save-btn" class="btn btn-success mobile-del-btn">
                  <span class="del-text">save</span>
                  <div class="del-layout" aria-hidden="true">
                     <div class="del-loader"></div>
                      <span class="ms-1 text-dark">loading...</span>
                  </div>
                </button>
              </div>
            </div>
          </div>
        </div>




        </div>
        <div class="row">
          <div class="col mt-5">
            <div>
              <a href="/" type="button" class="btn cancel-btn me-4 mb-2">Cancel</a>
              <button data-bs-toggle="modal" data-bs-target="#staticBackDrop2" type="button" class="btn del-btn1 mb-2" id="mobile-deleteAccountBtn">Delete Account</button>
            </div>


          </div>


        </div>
      </div>
    </div>
  </div>

</div>

<script type="module" src="{{ asset('backend-js/user/delete.js') }}"></script>

<script>

</script>



@endsection
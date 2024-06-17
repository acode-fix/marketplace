@extends('layouts.others.app')
@section('title','Delete')
@section('navtitle', 'Delete Account')


@section('content')



  <div class="main">

    <div  class="content" >
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
                    <button type="button" class="btn del-btn mb-2">Delete Account</button>

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
                <button type="button" class="btn del-btn1 mb-2">Delete Account</button>
              </div>


            </div>


          </div>
        </div>
      </div>
    </div>

  </div>




@endsection

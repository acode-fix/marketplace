@extends('layouts.others.app')
@section('title','Refer')
@section('navtitle', 'Refer Friends')


@section('content')


  <div class="main">

    <div style="height: 400px" class="content">
      <div class="container">
        <div class="row mt-4">
          <div class="col">
            <div class="container">
              <h4 class="use">Use the link below to refer a friend</h4>
              <p style="font-size: small;"> Buyandsell marketplace is a user-friendly platform
                that makes buying and selling goods and serviceseasy.
                Your friend should able to navigate the website and start using it with ease.</p>
              <hr class="sign2">
            </div>
            <div class="container">
              <div class="link-body">
                <form action="">
                  <input class="link" type="text" name="" id="linkInput"
                    placeholder="www.buyandsell.com/join/bas-mrk-pla">
                  <button value="submit" type="button" class="btn btn-warning btn-sm  " id="linkButton">Link</button>
                </form>
              </div>
              <div style="float: right; margin-top: 10px;">
                <img height="30px" width="30px" src="kaz/images/facebook.png" alt="">
                <img height="30px" width="30px" src="kaz/images/twitter.png" alt="">
                <img height="30px" width="30px" src="kaz/images/linkedin.png" alt="">
                <img height="30px" width="30px" src="kaz/images/message.png" alt="">
              </div>
              <div class="row mt-5">
                <div class="col">
                  <p style="color: green; text-align: center;" id="display"></p>

                </div>

              </div>


            </div>

          </div>
          <div class="col">


          </div>
        </div>

      </div>


    </div>
    <!-- mobile-view  -->
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
          <div class="row">
            <div class="col">
              <div class="container-fluid mt-3">
                <h4 class="use">Use the link below to refer a friend</h4>
                <p style="font-size: small;"> Buyandsell marketplace is a user-friendly platform
                  that makes buying and selling goods and serviceseasy.
                  Your friend should able to navigate the website and start using it with ease.</p>
                <hr class="sign2">
              </div>
              <div class="container">
                <div class="">
                  <form action="">
                    <input class="link-mobile" type="text" name="" id="linkInput-mobile"
                      placeholder="www.buyandsell.com/join/bas-mrk-pla">
                    <div class="mobile-btn">
                      <button style="width: 40%;" value="submit" type="button" class="btn btn-warning btn-md  "
                        id="linkButton-mobile">Link</button>
                    </div>

                  </form>
                </div>
                <div class="row mt-5">
                  <div class="col">
                    <p style="color: green; text-align: center;" id="display-mobile"></p>
                  </div>
                </div>
                <div class="container footer-icon">
                  <img height="30px" width="30px" src="kaz/images/facebook.png" alt="">
                  <img height="30px" width="30px" src="kaz/images/twitter.png" alt="">
                  <img height="30px" width="25px" src="kaz/images/linkedin.png" alt="">
                  <img height="30px" width="30px" src="kaz/images/message.png" alt="">
                </div>

              </div>

            </div>



          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="{{ asset('kaz/js/refer.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  

  <script>
  document.addEventListener('DOMContentLoaded', function() {
      const linkInput = document.getElementById('linkInput');
      const linkButton = document.getElementById('linkButton');

      const token = localStorage.getItem('apiToken'); // Get the token from local storage
      // Function to fetch the referral link from the backend
      function fetchReferralLink() {
          axios.get('/api/v1/referral-link', {
              headers: {
                  'Authorization': 'Bearer ' + token // Assuming the token is stored in localStorage
              }
          })
          .then(function(response) {
              linkInput.value = response.data.referralLink;
          })
          .catch(function(error) {
              // Swal.fire(
              //     'An error occurred',
              //     error.response.data.message || 'Please try again later.',
              //     'error'
              // );
          });
      }

      // Function to copy the link to the clipboard
      function copyToClipboard() {
          linkInput.select();
          linkInput.setSelectionRange(0, 99999); // For mobile devices
          document.execCommand('copy');
          Swal.fire({
              icon: 'success',
              title: 'Copied!',
              text: 'Referral link copied to clipboard.',
          });
      }

      // Fetch the referral link on page load
      fetchReferralLink();

      // Add event listener to the copy button
      linkButton.addEventListener('click', copyToClipboard);
  });
  </script>



@endsection

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User :: Details</title>
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/success.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <style>
    th, td {
      padding: 10px 20px; 
      width: 600px;
    }
    
 

  </style>
</head>

<body>
  <div class="header">
    <div>
      <a href="#"><img style="width:150px" src="{{asset('kaz/images/main logo.svg')}}" class="img-fluid" alt=""></a>
    </div>
    <div>
      <h6 class="me-4 mt-2">Become a verified seller</h6>
    </div>
  </div>

  

  <div style="padding-top: 150px" class="container">
    <div class="row">
      <div class="col">
        <div class="text-center mt-3">
          <h1>User :: Information</h1>

        </div>
      </div>
    </div>
    <div class="row">
      <div class="mx-auto  col-lg-12 mt-5">
          <div class="card mt-2 shadow-lg">
              <div class="card-header bg-success text-white">User :: Info</div>
              <div class="card-body">
                <table style="width:100%; border-collapse: collapse;">
                  <tr>
                    <th>Name</th>
                    <td colspan="" id="name_data"></td>
                  </tr>
                  <tr>
                    <th>Username</th>
                    <td  id="username_data"></td>
                  </tr>
                  <tr>
                    <th>Phone Number</th>
                    <td id="phone_number_data"></td>
                  </tr>
                  <tr>
                    <th>WhatsApp</th>
                    <td id="whatsapp_data"></td>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <td id="address_data"></td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td id="email_data"></td>
                  </tr>
                  <tr>
                    <th>Email Verified At</th>
                    <td id="email_verified_at_data"></td>
                  </tr>
                  <tr>
                    <th>Bio</th>
                    <td id="bio_data"></td>
                  </tr>
                  <tr>
                    <th>Photo URL</th>
                    <td id="photo_url_data"></td>
                  </tr>
                  <tr>
                    <th>Location</th>
                    <td id="location_data"></td>
                  </tr>
                  <tr>
                    <th>Shop No</th>
                    <td id="shop_no_data"></td>
                  </tr>
                  <tr>
                    <th>Stage</th>
                    <td id="stage_data"></td>
                  </tr>
                  <tr>
                    <th>Referral Code</th>
                    <td id="referral_code_data"></td>
                  </tr>
                  <tr>
                    <th>Verify Status</th>
                    <td id="verify_status_data"></td>
                  </tr>
                  <tr>
                    <th>Shop Token</th>
                    <td id="shop_token_data"></td>
                  </tr>
                  <tr>
                    <th>User Type</th>
                    <td id="user_type_data"></td>
                  </tr>
                  <tr>
                    <th>Banner</th>
                    <td id="banner_data"></td>
                  </tr>
                  <tr>
                    <th>Nationality</th>
                    <td id="nationality_data"></td>
                  </tr>
                  <tr>
                    <th>Gender</th>
                    <td id="gender_data"></td>
                  </tr>
                  <tr>
                    <th>NIN File</th>
                    <td id="nin-error"><a target="_blank" onclick="test(this)" href=""><img id="nin-file"  src="" alt=""></a></td>
                  </tr>
                  <tr>
                    <th>Selfie Photo</th>
                    <td id="selfie-error"><img id="selfie-photo" src="" alt=""></td>
                  </tr>
                  <tr>
                    <th>Badge Type</th>
                    <td id="badge_type_data"></td>
                  </tr>
                  <tr>
                    <th>Payment Status</th>
                    <td id="payment_status"></td>
                  </tr>
                  <tr>
                    <th>Amount Paid</th>
                    <td id="amount_status"></td>
                  </tr>
                </table>
                  
              </div>
          </div>

      </div>

  </div>
    
    
  </div>


  <script type="module" src="{{ asset('backend-js/admin/view-user-details.js')}}"></script>

  <script>
    function test(element) {
      var newTab = window.open();
      setTimeout(() => {
        newTab.document.body.innerHTML = element.innerHTML;
        
      }, 500);

      return false;
    }
  </script>
</body>

</html>
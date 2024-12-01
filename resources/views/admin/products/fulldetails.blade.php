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
    th,
    td {
      padding: 10px 20px;
      width: 600px;
    }
  </style>
</head>

<body>
  <div class="header">
    <div>
      <a href="#"><img style="width:150px" src="{{asset('kaz/images/transparent_logo.png')}}" class="img-fluid ms-4"
          alt=""></a>
    </div>
    <div>
      <h6 class="me-4 mt-2">Admin :: Dashboard</h6>
    </div>
  </div>



  <div style="padding-top: 150px" class="container">
    <div class="row">
      <div class="col">
        <div class="text-center mt-3">
          <h1>Product :: Information</h1>

        </div>
      </div>
    </div>
    <div class="row">
      <div class="mx-auto  col-lg-12 mt-5">
        <div class="card mt-2 shadow-lg">
          <div class="card-header bg-success text-white">Product-Owner :: Info</div>
          <div class="card-body">
            <table style="width:100%; border-collapse: collapse;">
              <tr>
                <th>Name</th>
                <td colspan="" id="name_data"></td>
              </tr>
              <tr>
                <th>Username</th>
                <td id="username_data"></td>
              </tr>
              <tr>
                <th>Phone Number</th>
                <td id="phone_number_data"></td>
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
                <th>Verification Status</th>
                <td><span id="verify_status"></span></td>

              </tr>
              <tr>
                <th>Badge Status</th>
                <td><span id="badge_status"></span></td>
              </tr>  
            </table>

          </div>
        </div>

      </div>

    </div>

    <div class="row">
      <div class="mx-auto  col-lg-12 mt-5 mb-5">
        <div class="card mt-2 shadow-lg">
          <div class="card-header bg-success text-white">Product :: Info</div>
          <div class="card-body">
            <table style="width:100%; border-collapse: collapse;">
              <tr>
                <th>Title</th>
                <td colspan="" id="title_data"></td>
              </tr>
              <tr>
                <th>Description</th>
                <td id="description_data"></td>
              </tr> 
              <tr>
                <th>category</th>
                <td id="category_name_data"></td>
              </tr>
              <tr>
                <th>Quantity</th>
                <td id="quantity_data"></td>
              </tr>
              <tr>
                <th>Sold</th>
                <td id="sold_data"></td>
              </tr>
              <tr>
                <th>Condition</th>
                <td id="condition_data"></td>

              </tr>
              <tr>
                <th>Location</th>
                <td id="location_data"></td>
              </tr>
              <tr>
                <th>Actual Price</th>
                <td id="actual_price_data"></td>
              </tr>
              <tr>
                <th>Promo Price</th>
                <td id="promo_price_data"></td>
              </tr>
              <tr>
                <th>Ask For Price</th>
                <td id="ask_for_price_data"></td>
              </tr>
              <tr class="images-div">
                <th>Product Images</th>
                <td><span id="product-images"></span></td>
              </tr>
            </table>

          </div>
        </div>

      </div>

    </div>



  </div>


  <script type="module" src="{{ asset('backend-js/admin/products/fulldetails.js')}}"></script>

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
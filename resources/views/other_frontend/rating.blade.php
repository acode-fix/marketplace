<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/navbar.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/rating.css') }}">
  <script src="{{ asset('kaz/js/rating.js') }}"></script>
  <script src="{{ asset('kaz/js/bootstrap.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <!-- Include SweetAlert CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <style>

  </style>
</head>

<body>
  <div class="header-section">
    <div class="arrow-div">
      <a href="{{ url('/') }}"><img class="arrow" src="kaz/images/Arrow.png" alt=""></a>
      <h6 style="font-size: 20px;" class="fw-light ms-4">Rating</h6>
    </div>
    <div class="left-section">
      <a href="{{ url('/') }}"><img class="img-fluid ms-3" src="kaz/images/logo.png" alt=""></a>
      <h6 class="ms-5 fw-bold profile">Rating</h6>
    </div>

    <!-- <div class="middle-section">
      <div class="search-border">
        <input type="search" id="search" placeholder="&nbsp Search product...">
        <button class="search-btn btn-light mt-1 pt-1 pb-2 me-1"><img src="kaz/images/Search.png" class="img-fluid search-img" alt=""> search</button>
      </div>
    </div> -->
    <!-- <div class="create">
      <button type="button" class="btn btn-warning btn-height"> + create Ads</button>
    </div> -->

    <div class="right-section me-4">
      <div class="create">
        <button type="button" class="btn btn-warning btn-height me-5"> + create Ads</button>
      </div>
      <div class="me-1">
        <h6 class="name">Loading</h6>
        <h6 class="mired-text fw-light">loading</h6>
      </div>
      <div class="profile-dropdown">
        <img class="img-fluid profile-picture" src="kaz/images/dp.png" alt="" id="profileDropdownBtn">
        <div class="dropdown-menu" id="dropdownMenu">
          <div class="container drop-struct">
            <img class="pt-1" width="50px" src="kaz/images/dp.png" alt="">
            <div class="ms-2 pt-1">
              <h6>Mired Augustine</h6>
              <h6 style="font-size: small;">Miredaugustine@gmail.com</h6>
            </div>
          </div>
          <hr style="background-color: black; margin-left: 10px;margin-right: 10px;">
          <div style="margin-top: -9px;">
            <a href="{{ url('/settings') }}">Dashboard</a>
            <a href="{{ url('/refer') }}">Refer A Friend</a>
            <a href="{{ url('/privacy') }}">Privacy Policy</a>
            <a href="#">Log Out</a>

          </div>

        </div>
      </div>
    </div>

    <div class="menu-toggle">
      <input type="checkbox" id="menu-checkbox" class="menu-checkbox">
      <label for="menu-checkbox" class="menu-btn">&#9776;</label>
      <div class="menu-overlay"></div>
      <ul class="menu">
        <li><a href="{{ url('/settings') }}">Dashboard</a></li>
        <li><a href="{{ url('/refer') }}">Refer A Friend</a></li>
        <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
        <li><a href="#">Log Out</a></li>
        <hr style="background-color: black; width: 70%;">
        <li><a style="color: #ff0000;" href="{{ url('/delete') }}">Delete Account</a></li>
      </ul>
    </div>
  </div>

  <div style="margin-top: 130px;" class="container rating">
    <div class="row">
      <div class="col">
        <div style="display: flex; justify-content: space-around;">
          <h6 style="font-size: large;" class="mt-3">Rate the seller(Rating this seller means you have purchased this
            product <span style="font-size: x-small;">(s)</span> )</h6>
          <div></div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div style="display: flex; justify-content: center;" class="col">
        <div class="review-m size">
          <div class="structure-m2 card-body pt-2">
            <img width="40px" src="kaz/images/dp.png" alt="">
            <div class="ps-2">
              <h6 style="font-size: small;" class="pt-1">Gary Benson</h6>
              <img width="9px" src="kaz/images/location.svg " alt="">
              <span style="font-size: small;" class="ps-1">portharcourt, Nigeria</span>
            </div>
          </div>
          <div>
            <img class="tab" src="kaz/images/Picture of product (Tablet).png" alt="">
          </div>
        </div>
        <form action="">
          <div class="review-m2 ms-4 card-body">
            <h6 style="text-align: center;" class="fw-light pt-1">How would you rate your experience with this seller?
            </h6>
            <div style="text-align: center;">
              <button class="star" type="button">&#9734;</button>
              <button class="star" type="button">&#9734;</button>
              <button class="star" type="button">&#9734;</button>
              <button class="star" type="button">&#9734;</button>
              <button class="star" type="button">&#9734;</button>
              <p class="current-rating d-none">0 of 5</p>
              <input type="hidden" id="rating" name="rating" value="0">
              <div class="offset-md-1 pt-2" style="position: relative;">
                <textarea class="form-control textarea1" id="exampleFormControlTextarea1" rows="4"></textarea>
                <div id="placeholder" class="comments">Additional Comments...</div>
              </div>
            </div>
            <div class="container pt-3" style="display: flex; justify-content: space-between;">

              <input type="submit" id="submit" value="Submit review">


              <a class="no-link" href="{{ url('/') }}">
                <h6 class="connect-shop2 fw-light me-2">No thanks</h6>
              </a>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- mobile-view  -->
  <div class="main">
    <div class="mobile-view">
      <div class="container">
        <div class="row">
          <div class="col">
            <div>
              <h6 class="mt-2 fw-bold rate-mobile">Rate the seller</h6>
              <div></div>
            </div>
          </div>
        </div>

      </div>
      <div class="container">
        <div class="row mt-3">
          <div class="col">
            <div class="mobile-st">
              <img class="ms-2" width="40px" src="kaz/images/dp.png" alt="">
              <div class="ps-3">
                <h6 style="font-size: small;" class="pt-1">Gary Benson</h6>
                <img width="9px" src="kaz/images/location.svg " alt="">
                <span style="font-size: small;" class="ps-1">portharcourt, Nigeria</span>
              </div>

            </div>
            <div class="mt-2">
              <img class="tab" src="kaz/images/Picture of product (Tablet).png" alt="">
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col">
            <form action="">
              <div class="structure-box">
                <h6 style="text-align: center;" class="fw-light pt-3">How would you rate your experience with this
                  seller?</h6>
                <div style="text-align: center;">
                  <button class="star" type="button">&#9734;</button>
                  <button class="star" type="button">&#9734;</button>
                  <button class="star" type="button">&#9734;</button>
                  <button class="star" type="button">&#9734;</button>
                  <button class="star" type="button">&#9734;</button>
                  <p class="current-rating d-none">0 of 5</p>
                  <input type="hidden" id="rating" name="rating" value="0">
                  <div class=" pt-2">
                    <textarea class="form-control textarea2" id="exampleFormControlTextarea1" rows="3"
                      placeholder="Additional comments"></textarea>
                  </div>

                  <div class="mt-3 pb-4 container-fluid"
                    style="display: flex;align-items: center;justify-content: space-between;">
                    <input style="margin-left: -4px;" class="" type="submit" id="submit2" value="Submit review">
                    <h6 style="font-size: small;" class="fw-light">No thanks</h6>
                  </div>
                </div>

              </div>

            </form>

          </div>
        </div>


      </div>

    </div>
  </div>





  <script>
    // Fetch the user data
    const token = localStorage.getItem('apiToken'); // Get the token from local storage

if (token) {
    axios.get('/api/v1/getuser', {
        headers: {
            'Authorization': 'Bearer ' + token
        }
    })
    .then(response => {
        const user = response.data;
        updateUserProfile(user);
    })
    .catch(error => {
        console.error('Error fetching user data:', error);
        if (error.response && error.response.status === 401) {
            Swal.fire({
                icon: 'error',
                title: 'Unauthorized',
                text: 'Your session has expired. Please log in again.'
            }).then(() => {
                window.location.href = '/login'; // Redirect to login page
            });
        }
    });
} else {
    Swal.fire({
        icon: 'error',
        title: 'Missing Token',
        text: 'Authentication token is missing. Please log in.'
    }).then(() => {
        window.location.href = '/login'; // Redirect to login page
    });
}

function updateUserProfile(user) {
    const nameElement = document.querySelector('.right-section .name');
    const emailElement = document.querySelector('.right-section .mired-text');
    const profileImageElement = document.querySelector('.right-section .profile-picture');

    if (user) {
        nameElement.textContent = user.username || 'Unknown User';
        emailElement.textContent = user.email || 'No email provided';
        // profileImageElement.src = user.photo_url ? user.photo_url : 'kaz/images/dp.png';
        const imageUrl = user.photo_url ? `/uploads/users/${user.photo_url}` : 'kaz/images/dp.png';
        profileImageElement.src = imageUrl;
    } else {
        console.error('User data is null or undefined');
    }
}
</script>
</body>

</html>

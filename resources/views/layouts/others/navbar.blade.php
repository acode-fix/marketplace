<div class="header-section">
    <div class="arrow-div">
      <a href="{{ url('/') }}"><img class="arrow" src="kaz/images/Arrow.png" alt=""></a>
      <h6 style="font-size: 20px;" class="fw-light ms-4">@yield('navtitle','Settings')</h6>
    </div>
    <div class="left-section">
      <a href="{{ url('/') }}"><img class="img-fluid ms-3" src="kaz/images/logo.png" alt=""></a>
      <h6 class="ms-5 fw-bold profile">@yield('navtitle','Settings')</h6>
    </div>

    <!-- <div class="middle-section ">
      <div class="search-border">
        <input type="search" id="search" placeholder="&nbsp Search product...">
        <button class="search-btn btn-light mt-1 pt-1 pb-2 me-1"><img src="kaz/images/Search.png"
            class="img-fluid search-img" alt=""> search</button>
      </div>

    </div> -->

    <div class="right-section me-4">
      <button type="button" class=" btn btn-warning   me-5"> + create Ads</button>
      <div class="me-1">
        <h6 class="name">Loading </h6>
        <h6 class="mired-text fw-light">loading</h6>
      </div>
      <img class="img-fluid  nav-profile-picture"  src="" alt="">
    </div>
    <div class="menu-toggle">
      <input type="checkbox" id="menu-checkbox" class="menu-checkbox">
      <label for="menu-checkbox" class="menu-btn">&#9776;</label>
      <div class="menu-overlay"></div>
      <ul class="menu">
        <li><a href="{{ url('/settings') }}">Dashboard</a></li>
        <li><a href="{{ url('/refer') }}">Refer a Friend</a></li>
        <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
        <li><a href="#" class="js-other-mobile-logout">Log Out</a></li>
        <hr style="background-color: black; width: 70%;">
        <li><a style="color: #ff0000;" href="{{ url('/delete') }}">Delete Account</a></li>
      </ul>
    </div>

  </div>

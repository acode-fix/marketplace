<div class="header-section">
  <div class="arrow-div">
    <a href="index.html"><img class="arrow" src="{{asset('kaz/images/Arrow.png')}}" alt=""></a>
    <h6 style="font-size: 20px;" class="fw-light ms-4">Dashboard</h6>
  </div>
  <div class="left-section">
    <a href="index.html"><img class="img-fluid ms-3 main-logo" src="{{asset('kaz/images/transparent_logo.png')}}" alt=""></a>
    <h6 class="ms-5 fw-bold profile">Dashboard</h6>
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
      <h6 class="name">Mired Augustine</h6>
      <h6 class="mired-text fw-light">miredaugustine@gmail.com</h6>
    </div>
    <div class="profile-dropdown">
      <img class="img-fluid profile-picture" src="{{asset('kaz/images/dp.png')}}" alt="" id="profileDropdownBtn">
      <div class="dropdown-menu" id="dropdownMenu">
        <div class="container drop-struct">
          <img class="pt-1" width="50px" src="{{asset('kaz/images/dp.png')}}" alt="">
          <div class="ms-2 pt-1">
            <h6>Mired Augustine</h6>
            <h6 style="font-size: small;">Miredaugustine@gmail.com</h6>
          </div>
        </div>
        <hr style="background-color: black; margin-left: 10px;margin-right: 10px;">
        <div style="margin-top: -9px;">
          <a href="settings.html">Dashboard</a>
          <a href="refer.html">Refer A Friend</a>
          <a href="privacy.html">Privacy Policy</a>
          <a href="#" id="adminLogOut">Log Out</a>

        </div>

      </div>
    </div>
  </div>

  <div class="menu-toggle">
    <input type="checkbox" id="menu-checkbox" class="menu-checkbox">
    <label for="menu-checkbox" class="menu-btn">&#9776;</label>
    <div class="menu-overlay"></div>
    <ul class="menu">
      <li><a href="settings.html">Dashboard</a></li>
      <li><a href="refer.html">Refer A Friend</a></li>
      <li><a href="privacy.html">Privacy Policy</a></li>
      <li><a href="#">Log Out</a></li>
      <hr style="background-color: black; width: 70%;">
      <li><a style="color: #ff0000;" href="delete.html">Delete Account</a></li>
    </ul>
  </div>
</div>
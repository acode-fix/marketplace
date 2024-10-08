<div class="header-section">
    <div class="arrow-div">
        <a href="{{ url('/') }}"><img class="arrow" src="kaz/images/Arrow.png" alt=""></a>
        <h6 class="arrow-text" class="fw-light ms-4">@yield('navtitle','Shop')</h6>
    </div>
    <div class="left-section">
        <a href="{{ url('/') }}"><img class="img-fluid ms-3" src="kaz/images/logo.png" alt=""></a>
        <h6 class="ms-5 fw-bold profile">@yield('navtitle','Shop')</h6>
    </div>

    <div class="middle-section">
        <div class="search-border">
            <input type="search" id="search" placeholder="&nbsp Search product...">
            <button class="search-btn btn-light mt-1 pt-1 pb-2 me-1">
                <img src="kaz/images/Search.png" class="img-fluid search-img" alt=""> search
            </button>
        </div>
    </div>
    <div class="create">
        <button type="button" class="btn btn-warning btn-height"> + create Ads</button>
    </div>
    <div class="right-section me-4">

        <div class="me-1">
            <h6 class="name">Loading</h6>
            <h6 class="mired-text fw-light">loading</h6>
        </div>
        <img class="img-fluid profile-picture" style="border: 0px solid transparent; border-radius:50px; height:45px; width:45px"
       src="" alt="">
    </div>
    <div class="menu-toggle">
        <input type="checkbox" id="menu-checkbox" class="menu-checkbox">
        <label for="menu-checkbox" class="menu-btn">&#9776;</label>
        <div class="menu-overlay"></div>
        <ul class="menu">
            <li><a href="{{ url('/settings') }}">Dasboard</a></li>
            <li><a href="{{ url('/refer') }}">Refer a Friend</a></li>
            <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
            <li><a href="#" class="js-mobile-view-logout" >Log Out</a></li>
            <hr class="hr-style">
            <li><a id="delete-color" href="{{ url('/delete') }}">Delete Account</a></li>
        </ul>
    </div>
</div>

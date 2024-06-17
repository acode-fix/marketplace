<div class="side-bar ">
    <div class="sidebar-link">
      <div class="links myLink">
        <span>
          <a href="{{ url('/shop') }}"><img class="profile-logo svg-size" src="kaz/images/profile.svg" alt=""></a>
          <a class="profile-text" href="{{ url('/shop') }}" class="{{ Request::is('blogs*') ? 'active' : '' }}">Shop</a>
        </span>
      </div>
    </div>
    <div class="sidebar-link">
      <div class="links myLink2">
        <span>
          <a href="{{ url('/settings') }}"><img class="profile-logo svg-size" src="kaz/images/product.svg" alt=""></a>
          <a style="color: blue;" class="profile-text" href="{{ url('/settings') }}" class="{{ Request::is('blogs*') ? 'active' : '' }}">Settings</a>
        </span>
      </div>
    </div>
    <div class="sidebar-link">
      <div class="links myLink">
        <span>
          <a href="{{ url('/learn') }}"><img class="profile-logo svg-size" src="kaz/images/learn.svg" alt=""></a>
          <a class="profile-text" href="{{ url('/learn') }}" class="{{ Request::is('blogs*') ? 'active' : '' }}">Learn</a>
        </span>
      </div>
    </div>
    <div class="sidebar-link">
      <div class="links myLink">
        <span>
          <a href="{{ url('/ads') }}"><img class="profile-logo" height="20px" width="17px" src="kaz/images/ads.svg" alt=""></a>
          <a class="profile-text ms-3" href="{{ url('/ads') }}" class="{{ Request::is('blogs*') ? 'active' : '' }}">Ads</a>
        </span>
      </div>
    </div>
    <div class="sidebar-link">
      <div class="links myLink">
        <span>
          <a href="{{ url('/wallet') }}"> <img class="profile-logo" height="20px" width="17px" src="kaz/images/wallet.svg"
              alt=""></a>
          <a class="profile-text ms-3" href="{{ url('/wallet') }}" class="{{ Request::is('blogs*') ? 'active' : '' }}">wallet</a>
        </span>
      </div>

    </div>
    <hr style="color: #343434;">
    <div class="sidebar-link">
      <div class="links myLink">
        <span>
          <a href="{{ url('/privacy') }}"><img class="profile-logo svg-size" src="kaz/images/privacy policy.svg" alt=""></a>
          <a class="profile-text" href="{{ url('/privacy') }}" class="{{ Request::is('blogs*') ? 'active' : '' }}">privacy policy</a>
        </span>
      </div>
    </div>
    <div class="sidebar-link">
      <div class="links myLink">
        <span>
          <a href="{{ url('/refer') }}"> <img class="profile-logo svg-size" src="kaz/images/refer friends.svg" alt=""></a>
          <a class="profile-text" href="{{ url('/refer') }}" class="{{ Request::is('blogs*') ? 'active' : '' }}">Refer Friends</a>
        </span>
      </div>
    </div>
    <div class="sidebar-link">
      <div class="links myLink">
        <span>
          <a href="{{ url('/delete') }}"><img class="profile-logo svg-size1" src="kaz/images/delete.svg" alt=""></a>
          <a class="profile-text" href="{{ url('/delete') }}" class="{{ Request::is('blogs*') ? 'active' : '' }}">Delete Account</a>
        </span>
      </div>
    </div>
    <div class="sidebar-link">
      <div class="row mt-5 footer">
        <div style="text-align: center;" class="col">
          <img height="35px" width="35px" src="kaz/images/facebook.png" alt="">
          <img height="30px" width="30px" src="kaz/images/twitter.png" alt="">
          <img height="29px" width="29px" src="kaz/images/whatsapp.png" alt="">
          <img height="30px" width="30px" src="kaz/images/message.png" alt="">
        </div>
      </div>
    </div>
  </div>

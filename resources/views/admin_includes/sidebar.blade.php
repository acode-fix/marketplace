<div class="side-bar">
    <div class="sidebar-link mt-4">
        <div class="links {{ Request::is('admin/dashboard*') ? 'active clicked' : '' }}">
            <span class="user-menu">
                <a href="javascript:void(0);" class="menu-link">
                  <img class="profile-logo svg-size" src="{{asset('kaz/images/profile.svg')}}" alt="">
                  <span class="profile-text">User Menu</span>
                </a>
            </span>
            <!-- Submenu -->
            <div class="submenu">
                <ul>
                    <li><a href="{{ url('profile') }}">Profile</a></li>
                    <li><a href="{{ url('settings') }}">Settings</a></li>
                </ul>
            </div>
        </div>
    </div>
  
    <!-- Other sidebar links here -->
  </div>
  
  
  {{-- <div class="sidebar-link">
      <div class="links  {{ Request::is('settings*') ? 'active clicked' : '' }}">
          <span>
              <a href="{{ url('') }}"><img class="profile-logo svg-size" src="{{asset('kaz/images/product.svg')}}"
                      alt=""><span class="profile-text">Verification</span></a>
              
          </span>
      </div>
  </div>
  <div class="sidebar-link">
      <div class="links {{ Request::is('learn*') ? 'active clicked': '' }}">
          <span>
              <a href="{{ url('') }}"><img class="profile-logo svg-size" src="{{asset('kaz/images/learn.svg')}}"
                      alt=""><span class="profile-text">Learn</span></a>
              
          </span>
      </div>
  </div>
  <div class="sidebar-link">
      <div class="links {{ Request::is('ads*') ? 'active clicked' : '' }}">
          <span>
              <a href="{{ url('') }}"><img class="profile-logo" height="20px" width="17px"
                      src="{{asset('kaz/images/ads.svg')}}" alt="">    <span class="profile-text">Ads</span></a>
              
          </span>
      </div>
  </div>
  <div class="sidebar-link">
      <div class="links {{ Request::is('wallet*') ? 'active clicked' : '' }}">
          <span>
              <a href="{{ url('') }}"> <img class="profile-logo" height="20px" width="17px"
                      src="{{asset('kaz/images/wallet.svg')}}" alt=""> <span class="profile-text">Wallet</span></a>
              
          </span>
      </div>
  </div>
  <hr style="color: black;">
  <div class="sidebar-link">
      <div class="links {{ Request::is('privacy*') ? 'active clicked' : '' }}">
          <span>
              <a href="{{ url('') }}"><img class="profile-logo svg-size" src="{{asset('kaz/images/privacy policy.svg')}}"
                      alt=""><span class="profile-text">Privacy Policy</span></a>
             
          </span>
      </div>
  </div>
  <div class="sidebar-link">
      <div class="links {{ Request::is('refer*') ? 'active clicked': '' }}">
          <span>
              <a href="{{ url('') }}"> <img class="profile-logo svg-size" src="{{asset('kaz/images/refer friends.svg')}}"
                      alt=""><span class="profile-text">Refer Friends</span></a>
             
          </span>
      </div>
  </div>
  <div class="sidebar-link">  
      <div class="links delete {{ Request::is('delete*') ? 'active clicked' : '' }}">
          <span>
              <a class="delete" href="{{ url('') }}"><img class="profile-logo svg-size1" src="{{asset('kaz/images/delete.svg')}}"
                      alt=""> <span class="profile-text">Delete Account</span></a>
          </span>
      </div>
  </div>
  <div class="sidebar-link">
      <div class="row mt-5 footer">
          <div style="text-align: center;" class="col">
              <img height="35px" width="35px" src="{{asset('kaz/images/facebook.png')}}" alt="">
              <img height="30px" width="30px" src="{{asset('kaz/images/twitter.png')}}" alt="">
              <img height="29px" width="29px" src="{{asset('kaz/images/whatsapp.png')}}" alt="">
              <img height="30px" width="30px" src="{{asset('kaz/images/message.png')}}" alt="">
          </div>
      </div>
  </div> --}}
</div>
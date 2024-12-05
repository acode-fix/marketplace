<div class="side-bar">
    <div class="sidebar-link mt-4">
      <div class="links {{ Request::is('admin/dashboard*') ? 'active-link clicked' : '' }}">
        <span class="user-menu">
          <a href="javascript:void(0);" class="menu-link">
            <img class="profile-logo svg-size" src="{{ asset('kaz/images/profile.svg') }}" alt="">
            <span class="profile-text">User Menu </span>
          </a>
        </span>
        <!-- Submenu -->
        <div class="submenu">
          <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="" id="get-users">View Users</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="sidebar-link mt-4">
      <div class="links {{ Request::is('admin/products/view*') ? 'active-link clicked' : '' }}">
        <span class="user-menu">
          <a href="javascript:void(0);" class="menu-link">
            <img class="profile-logo svg-size" src="{{ asset('kaz/images/product.svg') }}" alt="">
            <span class="profile-text">Products</span>
          </a>
        </span>
        <!-- Submenu -->
        <div class="submenu">
          <ul>
            <li><a href="{{ route('products.view') }}">View</a></li>
            <li><a href="{{ route('products.search') }}">Search</a></li>
            <li><a href="{{ route('products.sales') }}">Sales Performance</a></li>
          </ul>
        </div>
      </div>
    </div>
  
    <div class="sidebar-link mt-4">
      <div class="links {{ Request::is('admin/verification/view') ? 'active-link clicked' : '' }}">
        <span class="user-menu">
          <a href="javascript:void(1);" class="menu-link">
            <img class="profile-logo svg-size" src="{{ asset('kaz/images/profile.svg') }}" alt="">
            <span class="profile-text">Verification</span>
          </a>
        </span>
        <!-- Submenu -->
        <div class="submenu">
          <ul>
            <li><a href="#" id="view">View</a></li>
            <li><a href="{{ url('settings') }}">Settings</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="sidebar-link mt-4">
      <div class="links {{ Request::is('admin/badge/view*') ? 'active-link clicked' : '' }}">
        <span class="user-menu">
          <a href="javascript:void(0);" class="menu-link">
            <img class="profile-logo svg-size" src="{{ asset('kaz/images/product.svg') }}" alt="">
            <span class="profile-text">Badge Menu</span>
          </a>
        </span>
        <!-- Submenu -->
        <div class="submenu">
          <ul>
            <li><a href="{{ route('badge.view') }}">View</a></li>
          </ul>
        </div>
      </div>
    </div>
  
  </div>
  
<!DOCTYPE html>
<html lang="en">
@include('admin_includes.head')
<style>
    @media (max-width: 576px) {
  .menu-text {
    display: none; /* Hide the "Menu" text */
  }

  
}

  

</style>

<body>
    @include('admin_includes.navbar')
    <div class="main">
        @include('admin_includes.sidebar')
        <div  class="container mobile-nav">
            <div class="row">
                
                <div class="col-4 drop">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            User <span class="menu-text">Menu</span>

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a class="dropdown-item get-users" href="#">View Users</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.onboarded-user') }}">Onboarded Users</a></li>
                        </ul>
                    </div>
                </div>
        
                <div class="col-4 drop">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            Products <span class="menu-text">Menu</span>

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item" href="{{ route('products.view') }}">View</a></li>
                            <li><a class="dropdown-item" href="{{ route('products.search') }}">Search</a></li>
                            <li><a class="dropdown-item" href="{{ route('products.sales') }}">Performance</a></li>
                        </ul>
                    </div>
                </div>
        
                <div class="col-4 drop">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                            Verifications <span class="menu-text">Menu</span>

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                            <li><a class="dropdown-item views" href="#">View</a></li>
                            
                        </ul>
                    </div>
                </div>
        
                <div class="col-4 drop">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-expanded="false">
                            Payment <span class="menu-text">Menu</span>

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                            <li><a class="dropdown-item" href="{{ route('payments.view') }}">View</a></li>
                            <li><a class="dropdown-item" href="{{ route('payments.search') }}">Search</a></li>
                          
                        </ul>
                    </div>
                </div>
        
                <div class="col-4 drop">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-expanded="false">
                            Upload <span class="menu-text">Menu</span>

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                            <li><a class="dropdown-item" href="{{ route('uploads.view') }}">View</a></li>
                           
                        </ul>
                    </div>
                </div>
        
                <div class="col-4 drop">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton6" data-bs-toggle="dropdown" aria-expanded="false">
                            Badge <span class="menu-text">Menu</span>

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                            <li><a class="dropdown-item" href="{{ route('badge.view') }}">View</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
    
        
        <div class="container-fluid">
            <div style="margin-bottom: 150px;" class="content">
                {{$slot}}
            </div>

        </div>

    </div>

    @include('admin_includes.footer')


    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>


    <script type="module" src="{{ asset('backend-js/admin/dashboard.js') }}"></script>
    <script type="module" src="{{ asset('backend-js/admin/auth-helper.js') }}"></script>

    <script>
  document.addEventListener('DOMContentLoaded', function() {
  var checkbox = document.getElementById('menu-checkbox');
  var menuOverlay = document.querySelector('.menu-overlay');
  var menu = document.querySelector('.menu');

  checkbox.addEventListener('change', function() {
      if (this.checked) {
          menuOverlay.style.display = 'block';
          menu.style.display = 'block';
      } else {
          menuOverlay.style.display = 'none';
          menu.style.display = 'none';
      }
  });

  menuOverlay.addEventListener('click', function() {
      checkbox.checked = false;
      menuOverlay.style.display = 'none';
      menu.style.display = 'none';
  });
 });

 


    </script>



</body>

</html>
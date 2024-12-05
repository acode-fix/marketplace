<x-admin-layout>
  <x-slot:title>
    View :: Badges
    </x-slot>

    <div class="row mt-5">
      <div class="col-lg-10">
        <div class="card ">
          <div class="card-body">
            <div class="card-title">Badges :: Menu</div>
            <div class="container mt-3">
              <h2>Vetted :: Menu </h2>
              <br>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#home">Active Badges</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link  " data-bs-toggle="tab" href="#menu1">Expired badges</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link " data-bs-toggle="tab" href="#menu2">Unverified Seller</a>
                </li> 
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div id="home" class="container tab-pane  active-badge  active"><br>

                </div>
                <div id="menu1" class="container  tab-pane expired-badge fade"><br>


                </div>
                <div id="menu2" class="container tab-pane unverified fade"><br>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <script type="module" src="{{ asset('backend-js/admin/user/badge.js') }}"></script> 
</x-admin-layout>
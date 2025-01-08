<x-admin-layout>
  <x-slot:title>
    Onboarded :: Users
    </x-slot>

    <div class="row mt-5">
      <div class="col-lg-10">
        <div class="card ">
          <div class="card-body">
            <div class="card-title">User :: Menu</div>
            <div class="container mt-3">
              <h2>onboarded :: Users </h2>
              <br>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#home">User :: with shop No</a>
                </li>
                <li class="nav-item  agent-tab">
                  <a class="nav-link  "data-bs-toggle="tab" href="#menu1">Agent :: Refferals</a>
                </li>
                
                 
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div id="home" class="container tab-pane  onboarded-users  active"><br>

                </div>

                <div id="menu1" class="container     agent-refferal tab-pane fade"><br>


                </div>
                
              
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <script type="module" src="{{ asset('backend-js/admin/user/onboarded.js') }}"></script> 
</x-admin-layout>
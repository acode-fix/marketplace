<x-admin-layout>
  <x-slot:title>
    View :: Payments
    </x-slot>

    <div class="row mt-5">
      <div class="col-lg-10">
        <div class="card ">
          <div class="card-body">
            <div class="card-title">Payments :: Menu</div>
            <div class="container mt-3">
              <h2>User Payments :: Menu </h2>
              <br>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#home">Successful Payments</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link  " data-bs-toggle="tab" href="#menu1">Failed Payments</a>
                </li>
                 {{-- <li class="nav-item">
                  <a class="nav-link " data-bs-toggle="tab" href="#menu2">Unverified Seller</a>
                </li>  --}}
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div id="home" class="container tab-pane success-tab   active"><br>

                </div>
                <div id="menu1" class="container  tab-pane  failed-tab fade"><br>


                </div>
                {{-- <div id="menu2" class="container tab-pane  fade"><br>

                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <script type="module" src="{{ asset('backend-js/admin/payments/view.js') }}"></script> 
</x-admin-layout>
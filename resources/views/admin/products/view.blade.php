<x-admin-layout>
  <x-slot:title>
    View :: Products
    </x-slot>

    <div class="row mt-5">
      <div class="col-lg-10">
        <div class="card ">
          <div class="card-body">
            <div class="card-title">Products :: Menu</div>
            <div class="container mt-3">
              <h2>Listed :: Products </h2>
              <br>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#home">Active Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link  " data-bs-toggle="tab" href="#menu1">Delisted Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " data-bs-toggle="tab" href="#menu2">Products Request</a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div id="home" class="container tab-pane listed-products active"><br>

                </div>
                <div id="menu1" class="container delisted-products tab-pane fade"><br>


                </div>
                 <div id="menu2" class="container unlisted-products tab-pane fade"><br>

                </div> 
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <script type="module" src="{{ asset('backend-js/admin/products/products.js') }}"></script> 
</x-admin-layout>
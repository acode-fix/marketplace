{{-- <x-admin-layout>
  <x-slot:title>
    View :: Products
    </x-slot>   

    <div class="row mt-5">
      <div class="col-lg-10">
        <div class="card ">
          <div class="card-body">
            <div class="card-title">Products Performance :: Menu</div>
            <div class="container mt-3">
              <h2>Performing :: Products </h2>
              <br>
          
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#home">Performance by sales</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link  " data-bs-toggle="tab" href="#menu1">performance by connects</a>
                </li>
               
              </ul>

      
              <div class="tab-content">
                <div id="home" class="container tab-pane sales active"><br>

                </div>
                <div id="menu1" class="container connects tab-pane fade"><br>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <script type="module" src="{{ asset('backend-js/admin/products/sales.js') }}"></script> 
</x-admin-layout> --}}

<x-admin-layouts>

  <x-slot:title>
    Products :: Menu
   </x-slot>
    <div class="row">
      <div class="col-10">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Products Performance Menu</h4>

          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
              <li class="breadcrumb-item active">Performance</li>
            </ol>
          </div>

        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-lg-10">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title">Performance Tabs</h4>


            <!-- Nav tabs -->
            <ul class="nav nav-tabs pt-4" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                  <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                  <span class="d-none d-sm-block">Performance by sales</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                  <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                  <span class="d-none d-sm-block">Performance by connects</span>
                </a>
              </li>
              
            </ul>

            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
              <div class="tab-pane active mt-3" id="home" role="tabpanel">

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                  style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Title</th>
                      <th>Sold</th>
                      <th>Category</th>
                      <th>Location</th>
                      <th>Description</th>
                      <th>Full Details</th>
                    </tr>
                  </thead>


                  <tbody></tbody>
                </table>


              </div>
              <div class="tab-pane mt-3" id="profile" role="tabpanel">
                <table id="datatable2" class="table table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Total Connects</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Full Details</th>          
                  </tr>
                </thead>


                <tbody></tbody>
              </table>

              </div>
             
             
            </div>

          </div>
        </div>
      </div>
    </div>



    <script type="module" src="{{ asset('backend-js/admin/user/permission.js') }}"></script>
    <script type="module" src="{{ asset('backend-js/admin/products/sales.js') }}"></script> 
</x-admin-layouts>
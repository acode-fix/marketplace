
<x-admin-layouts>

  <x-slot:title>
    Products :: Menu
   </x-slot>
    <div class="row">
      <div class="col-10">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Products Menu</h4>

          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
              <li class="breadcrumb-item active">View</li>
            </ol>
          </div>

        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-lg-10">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title">Product Tabs</h4>


            <!-- Nav tabs -->
            <ul class="nav nav-tabs pt-4" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                  <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                  <span class="d-none d-sm-block">Active Products</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                  <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                  <span class="d-none d-sm-block">Delisted Products</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab">
                  <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                  <span class="d-none d-sm-block">Products Request</span>
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
                      <th>Amount Sold</th>
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
                    <th>Title</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Deletion Date</th>
                    <th>Full Details</th>             
                  </tr>
                </thead>


                <tbody></tbody>
              </table>

              </div>
              <div class="tab-pane" id="messages" role="tabpanel">
                <table id="datatable3" class="table table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Product Request</th>
                    <th>Request Date</th>
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
<script type="module" src="{{ asset('backend-js/admin/products/products.js') }}"></script> 
</x-admin-layouts>
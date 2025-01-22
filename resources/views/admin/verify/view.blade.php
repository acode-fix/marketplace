{{-- <x-admin-layout>
  <x-slot:title>
    Verification
  </x-slot:title>

  <div class="row mt-5">
    <div class="col-lg-10">
      <div class="card ">
        <div class="card-body">
          <div class="card-title">Verification :: Menu</div>


          <div class="container mt-3">
            <h2>Badge :: Approval </h2>
            <br>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#home">Pending</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  approve-menu" data-bs-toggle="tab"  href="#menu1">Approved</a>
              </li>
              <li class="nav-item">
                <a class="nav-link reject-menu" data-bs-toggle="tab" href="#menu2">Rejected</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div id="home" class="container tab-pane pending active"><br>
              
              </div>
              <div id="menu1" class="container approved tab-pane fade"><br>
                
                
              </div>
              <div id="menu2" class="container rejected tab-pane fade"><br>
                
              </div>
            </div> 
          </div>


              

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="align-items: flex-end;">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-danger" id="exampleModalLabel">Reject :: Menu </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  

                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Verification Rejection Reason</label>
                      <textarea id="textarea" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      <span id="error" class="text-danger"></span>
                    </div>

                
                
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                  <button type="button" class="btn btn-success js-yes">Yes</button>
                </div>
              </div>
            </div>
          </div>



        </div>
      </div>
    </div>

  </div>





 


 <script type="module" src="{{asset('backend-js/admin/verify-view.js')}}"></script>
</x-admin-layout> --}}

<x-admin-layouts>

  <x-slot:title>
    Verification :: Menu
   </x-slot>
    <div class="row">
      <div class="col-10">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Verification Menu</h4>

          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="javascript: void(0);">Verify</a></li>
              <li class="breadcrumb-item active">View</li>
            </ol>
          </div>

        </div>
      </div>
    </div>

    <div class="row mt-3">

      <div class="col-lg-10">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title">Verification Tabs</h4>


            <!-- Nav tabs -->
            <ul class="nav nav-tabs pt-4" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                  <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                  <span class="d-none d-sm-block">Pending</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                  <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                  <span class="d-none d-sm-block">Approved</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab">
                  <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                  <span class="d-none d-sm-block">Rejected</span>
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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Phone Number</th>
                      <th>Payment</th>
                      <th>Full Details</th>
                      <th>Action</th>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Payment</th>
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
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Payment</th>
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

     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" style="align-items: flex-end;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger" id="exampleModalLabel">Reject :: Menu </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            

              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Verification Rejection Reason</label>
                <textarea id="textarea" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <span id="error" class="text-danger"></span>
              </div>

          
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="button" class="btn btn-success js-yes">Yes</button>
          </div>
        </div>
      </div>
    </div>



    <script type="module" src="{{asset('backend-js/admin/verify-view.js')}}"></script>
</x-admin-layouts>
<x-adminLayout>
  <x-slot:title>
    View :: Users
  </x-slot>

  <div class="row mt-5">
    <div class="col-lg-10">
      <div class="card ">
        <div class="card-body">
          <div class="card-title">User :: Menu</div>


          <div class="container mt-3">
            <h2>Registered :: User </h2>
            <br>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#home">Registered</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  approve-menu" data-bs-toggle="tab"  href="#menu1">User With Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link reject-menu" data-bs-toggle="tab" href="#menu2">Suspended</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div id="home" class="container tab-pane registered active"><br>
               
              </div>
              <div id="menu1" class="container approved tab-pane fade"><br>
                
                
              </div>
              <div id="menu2" class="container rejected tab-pane fade"><br>
                
              </div>
            </div> 
          </div>


              

          <!-- Modal -->
          {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          </div> --}}



        </div>
      </div>
    </div>

  </div>
  
  
  
  <script type="module" src="{{ asset('backend-js/admin/user/alluser.js') }}"></script>
  </x-adminLayout>  
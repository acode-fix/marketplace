<x-admin-layout>
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
                  <a class="nav-link  approve-menu" data-bs-toggle="tab" href="#menu1">User With Products</a>
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
          </div>
        </div>
      </div>

    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Step 1 -->
            <div class="modal-step-1">
              <form id="edit-user-stage1" enctype="multipart/form-data">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="fullname" class="form-label fw-bold">FullName</label>
                    <input name="name" type="text" class="form-control fullname">
                  </div>
                  <div class="col-md-6">
                    <label for="username" class="form-label fw-bold">Username</label>
                    <input name="username" type="text" class="form-control username">
                  </div>
                  <div class="col-md-6 mt-4">
                    <label for="phone" class="form-label fw-bold">Phone</label>
                    <input name="phone_number" type="text" class="form-control phone">
                  </div>
                  <div class="col-md-6 mt-4">
                    <label for="address" class="form-label fw-bold">Address</label>
                    <input name="address" type="text" class="form-control address">
                  </div>
                  <div class="col-md-6 mt-4">
                    <div>
                      <label for="email" class="form-label fw-bold">Email</label>
                      <input name="email" type="text" class="form-control email">
                    </div>
                  </div>
                  <div class="col-md-6 mt-4">
                    <label for="nationality" class="form-label fw-bold">Nationality</label>
                    <input name="nationality" type="text" class="form-control nationality">
                  </div>
                  <div class="col-md-6 mt-4">
                    <label for="bio" class="form-label fw-bold">Bio</label>
                    <input name="bio" type="text" class="form-control bio">

                  </div>
                  <div class="col-md-6 mt-5">
                    <div>
                      <label for="gender" class="form-label fw-bold">Gender</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                      <label class="form-check-label" value="male" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                      <label class="form-check-label" value="female " for="inlineRadio2">Female</label>
                    </div>

                  </div>

                </div>
              </form>
              <button style="float: right" type="button" class="btn btn-warning next-to-step-2">Next</button>
            </div>

            <!-- Step 2 -->
            <div class="modal-step-2" style="display: none;">
              <form id="edit-user-stage2" enctype="multipart/form-data">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="photo" class="form-label">Photo</label>
                    <input class="form-control" type="file" name="photo_url">
                  </div>

                  <div class="col-md-6">
                    <label for="banner" class="form-label">Banner Img</label>
                    <input class="form-control" type="file" name="banner">
                  </div>

                  <div class="col-md-6 mt-4">
                    <label for="selfie_photo" class="form-label">Selfie Img</label>
                    <input class="form-control" type="file" name="selfie_photo">
                  </div>

                  <div class="col-md-6 mt-4">
                    <label for="nin" class="form-label">Nin Img</label>
                    <input class="form-control" type="file" name="nin_file">
                  </div>





                </div>
              </form>

              <div style="float: right;">
                <button type="button" class="btn btn-secondary previous-to-step-1 mt-5">Previous</button>
                <button type="submit" class="btn btn-warning update-loader mt-5" id="update">
                  <span class="update-text">Update</span>
                  <div class="update-layout" aria-hidden="true">
                    <div class="loader-text"></div>
                    <span class="ms-1 text-dark">loading...</span>
                  </div>
                </button>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="suspendModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" style="align-items: flex-end;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-warning" id="exampleModalLabel">Suspend :: User </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h6 class="mb-2">Are you sure you want to suspend user with the following details:</h6>
            <h6><strong>Email: </strong><span class="suspend-email text-danger"></span></h6>
            <h6><strong>FullName: </strong><span class="suspend-name text-danger"></span></h6>
            <h6><strong>UserName: </strong><span class="suspend-username text-danger"></span></h6>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="button" class="btn btn-success js-suspend-yes">Yes</button>
          </div>
        </div>
      </div>
    </div>

     <!-- Modal -->
     <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" style="align-items: flex-end;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger" id="exampleModalLabel">Delete :: User </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h6 class="mb-2">Are you sure you want to Delete user with the following details:</h6>
            <h6><strong>Email: </strong><span class="delete-email text-danger"></span></h6>
            <h6><strong>FullName: </strong><span class="delete-name text-danger"></span></h6>
            <h6><strong>UserName: </strong><span class="delete-username text-danger"></span></h6>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger js-delete-yes">Yes</button>
          </div>
        </div>
      </div>
    </div>



    <script type="module" src="{{ asset('backend-js/admin/user/alluser.js') }}"></script>
</x-admin-layout>
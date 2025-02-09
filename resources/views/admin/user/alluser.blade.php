

<x-admin-layouts>

  <x-slot:title>
    User :: Menu
   </x-slot>
    <div class="row">
      <div class="col-10">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">User Menu</h4>

          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
              <li class="breadcrumb-item active">View all users</li>
            </ol>
          </div>

        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-lg-10">
        <div class="card">
          <div class="card-body">

            <h4 class="card-title">User Tabs</h4>


            <!-- Nav tabs -->
            <ul class="nav nav-tabs pt-4" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab" data-bs-toggle="tooltip" data-bs-placement="top" title="View all registered users">
                  <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                  <span class="d-none d-sm-block">Registered Users</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab" data-bs-toggle="tooltip" data-bs-placement="top" title="View all suspended users">
                  <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                  <span class="d-none d-sm-block">Suspended Users</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab" data-bs-toggle="tooltip" data-bs-placement="top" title="View all deleted users">
                  <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                  <span class="d-none d-sm-block">Deleted Users</span>
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
                    <th>Full Details</th>
                    <th>Action</th>
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
                    <th>Phone Number</th>
                    <th>Reason For Deletion</th>
                    <th>Deletion Date</th>
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
                  <div class="col-md-6 mt-4">
                    <label for="nationality" class="form-label fw-bold">Shop No</label>
                    <input name="shop_no" type="text" class="form-control shop_no">
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
                <button type="button" class="btn btn-secondary previous-to-step-1 mt-5 me-2">Previous</button>
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

    <div class="modal fade" id="unsuspendModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" style="align-items: flex-end;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-success" id="exampleModalLabel">Unsuspend :: User </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h6 class="mb-2">Are you sure you want to Unsuspend user with the following details:</h6>
            <h6><strong>Email: </strong><span class="unsuspend-email text-success"></span></h6>
            <h6><strong>FullName: </strong><span class="unsuspend-name text-success"></span></h6>
            <h6><strong>UserName: </strong><span class="unsuspend-username text-success"></span></h6>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="button" class="btn btn-success js-unsuspend">Yes</button>
          </div>
        </div>
      </div>
    </div>

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
    <script>
      // Initialize all tooltips on the page
      document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
        })
      });
    </script>
</x-admin-layouts>
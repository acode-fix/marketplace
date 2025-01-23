{{-- <x-admin-layout>
  <x-slot:title>
    Admin :: Profile
    </x-slot>

    <div class="row mt-5">
      <div class="col-lg-10">
        <div class="card ">
          <div class="card-body">
            <div class="card-title">Admin :: Profile Menu</div>
            <div class="js-admin">
             
            </div>
          
            <div class="container mt-3">
              <h2> Admin :: Info </h2>
              <br>

              <div class="js-user-table table-responsive">

              </div>



            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Add :: User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="admin-form">
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control"  name="name" aria-describedby="title">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control"  name="email" aria-describedby="email">
              </div>
              <div class="mb-3 js-roles">

              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control"  name="password" aria-describedby="password">
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">photo</label>
                <input class="form-control" type="file" name="photo_url" >
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="save-user" class="btn btn-success">Save</button>
          </div>

          </form>
        </div>
      </div>
    </div>


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Edit :: Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="profile-form">
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="title">
              </div>
               <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="description">
              </div> 
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password" aria-describedby="url">
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">photo</label>
                <input class="form-control" type="file" name="photo_url" id="formFile">
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="save" class="btn btn-success">Update</button>
          </div>

          </form>
        </div>
      </div>
    </div>


    <script type="module" src="{{ asset('backend-js/admin/profile/profile.js') }}"></script>
</x-admin-layout>
 --}}

 <x-admin-layouts>

  <x-slot:title>
    Admin :: Menu
   </x-slot>
    <div class="row">
      <div class="col-10">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Admin Menu</h4>

          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="javascript: void(0);">Admins</a></li>
              <li class="breadcrumb-item active">View</li>
            </ol>
          </div>

        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-lg-10">
        <div class="card ">
          <div class="card-body">
            <div class="container mt-3">
              <h6> Admin :: Info </h6>
              <div class="js-admin">
             
              </div>
              <br>
              <div class="js-user-table  table-responsive">

              </div>

              <table id="datatable" class="table super-admin-table table-bordered dt-responsive nowrap"
              style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Phone Number</th>
                  <th>Action</th>
                </tr>
              </thead>


              <tbody></tbody>
            </table>




            </div>
          </div>
        </div>
      </div>

    </div>

    
    <div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Add :: User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="admin-form">
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control"  name="name" aria-describedby="title">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control"  name="email" aria-describedby="email">
              </div>
              <div class="mb-3 js-roles">

              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control"  name="password" aria-describedby="password">
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">photo</label>
                <input class="form-control" type="file" name="photo_url" >
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="save-user" class="btn btn-success">Save</button>
          </div>

          </form>
        </div>
      </div>
    </div>


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Edit :: Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="profile-form">
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="title">
              </div>
               <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="description" readonly>
              </div>  
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password" aria-describedby="url">
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">photo</label>
                <input class="form-control" type="file" name="photo_url" id="formFile">
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="save" class="btn btn-success">Update</button>
          </div>

          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" style="align-items: flex-end;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger" id="exampleModalLabel">Delete :: Admin </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h6 class="mb-2">Are you sure you want to Delete Admin with the following details:</h6>
            <h6><strong>Email: </strong><span class="delete-email text-danger"></span></h6>
            <h6><strong>FullName: </strong><span class="delete-name text-danger"></span></h6>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger js-delete-yes">Yes</button>
          </div>
        </div>
      </div>
    </div>


    <script type="module" src="{{ asset('backend-js/admin/profile/profile.js') }}"></script>
</x-admin-layouts> 
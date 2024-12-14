<x-admin-layout>
  <x-slot:title>
    Admin :: Profile
    </x-slot>

     <div class="row mt-5">
      <div class="col-lg-10">
        <div class="card ">
          <div class="card-body">
            <div class="card-title">Admin :: Profile Menu</div>
            <div class="container mt-3">
              <h2> Admin :: Info </h2>
              <br>

              <div class="js-user-table">

              </div>
             
            
          
            </div>
          </div>
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
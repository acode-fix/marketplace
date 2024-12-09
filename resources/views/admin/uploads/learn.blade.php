<x-admin-layout>
  <x-slot:title>
    Upload :: menu
    </x-slot>

    <div class="row mt-5">
      <div class="col-lg-10 mx-auto">
        <div class="card">
          <div class="card-body">
            <div class="card-title">upload :: Menu</div>
            <div class="container mt-3">
              <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">upload learn</button>
              <br>
    
              <div class="row js-content mt-5">
              
               
              
               
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Upload Learn Contents</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   <form id="learn-form">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title"  name="title" aria-describedby="title" >
          <span class="text-danger" id="title_error"></span>
        </div>
        <div class="mb-3">
          <label for="descriptiom" class="form-label">Description</label>
          <input type="text" class="form-control" id="desc" name="description"  aria-describedby="description" >
          <span class="text-danger" id="desc_error"></span>
        </div>
        <div class="mb-3">
          <label for="url" class="form-label">Url</label>
          <input type="text" class="form-control" id="url" name="url"  aria-describedby="url" >
          <span class="text-danger" id="url_error"></span>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="save" class="btn btn-success">Save</button>
      </div>

  </form>
    </div>
  </div>
</div>
    
   

    <script type="module" src="{{ asset('backend-js/admin/uploads/learn.js') }}"></script> 
</x-admin-layout>
{{-- <x-admin-layout>
  <x-slot:title>
    Upload :: menu
    </x-slot>

    <div class="row mt-5">
      <div class="col-lg-10 mx-auto">
        <div class="card">
          <div class="card-body">
            <div class="card-title">upload :: Menu</div>
            <div class="container mt-3">
              <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">upload
                learn</button>
              <br>

              <div class="row js-content mt-5">




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
            <h5 class="modal-title" id="staticBackdropLabel">Upload Learn Contents</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="learn-form">
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
                <span class="text-danger" id="title_error"></span>
              </div>
              <div class="mb-3">
                <label for="descriptiom" class="form-label">Description</label>
                <input type="text" class="form-control" id="desc" name="description" aria-describedby="description">
                <span class="text-danger" id="desc_error"></span>
              </div>
              <div class="mb-3">
                <label for="url" class="form-label">Url</label>
                <input type="text" class="form-control" id="url" name="url" aria-describedby="url">
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
    

    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Edit Learn Contents</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="edit-learn-form">
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control title"  name="title" aria-describedby="title">
          
              </div>
              <div class="mb-3">
                <label for="descriptiom" class="form-label">Description</label>
                <input type="text" class="form-control desc"  name="description" aria-describedby="description">
                
              </div>
              <div class="mb-3">
                <label for="url" class="form-label">Url</label>
                <input type="text" class="form-control url"  name="url" aria-describedby="url">
              </div>
              <input type="text" class="form-control id"  name="id" aria-describedby="url" hidden>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="update" class="btn btn-success">update</button>
          </div>

          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="delModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Delete Learn Contents</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p >Are you you want to delete: <span class="title-text text-danger"></span></p>
            <input type="text" name="id" class="del-id" hidden>
        
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="del" class="btn btn-success">Yes</button>
          </div>

          </form>
        </div>
      </div>
    </div>



    <script type="module" src="{{ asset('backend-js/admin/uploads/learn.js') }}"></script>
</x-admin-layout> --}}


<x-admin-layouts>

  <x-slot:title>
    Learn :: Menu
   </x-slot>
    <div class="row">
      <div class="col-10">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Learn Menu</h4>

          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="javascript: void(0);">Learn</a></li>
              <li class="breadcrumb-item active">View</li>
            </ol>
          </div>

        </div>
      </div>
    </div>


    <div class="row mt-5">
      <div class="col-lg-10 mx-auto">
        <div class="card">
          <div class="card-body">
            <div class="container mt-3">
              <div class="card-title">upload :: Menu</div>
              <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">upload
                learn</button>
              <br>

              <div class="row js-content mt-5">




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
            <h5 class="modal-title" id="staticBackdropLabel">Upload Learn Contents</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="learn-form">
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
                <span class="text-danger" id="title_error"></span>
              </div>
              <div class="mb-3">
                <label for="descriptiom" class="form-label">Description</label>
                <input type="text" class="form-control" id="desc" name="description" aria-describedby="description">
                <span class="text-danger" id="desc_error"></span>
              </div>
              <div class="mb-3">
                <label for="url" class="form-label">Url</label>
                <input type="text" class="form-control" id="url" name="url" aria-describedby="url">
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
    

    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Edit Learn Contents</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="edit-learn-form">
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control title"  name="title" aria-describedby="title">
          
              </div>
              <div class="mb-3">
                <label for="descriptiom" class="form-label">Description</label>
                <input type="text" class="form-control desc"  name="description" aria-describedby="description">
                
              </div>
              <div class="mb-3">
                <label for="url" class="form-label">Url</label>
                <input type="text" class="form-control url"  name="url" aria-describedby="url">
              </div>
              <input type="text" class="form-control id"  name="id" aria-describedby="url" hidden>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="update" class="btn btn-success">update</button>
          </div>

          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="delModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Delete Learn Contents</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p >Are you you want to delete: <span class="title-text text-danger"></span></p>
            <input type="text" name="id" class="del-id" hidden>
        
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="del" class="btn btn-success">Yes</button>
          </div>

          </form>
        </div>
      </div>
    </div>


    <script type="module" src="{{ asset('backend-js/admin/user/permission.js') }}"></script>
    <script type="module" src="{{ asset('backend-js/admin/uploads/learn.js') }}"></script>


</x-admin-layouts>


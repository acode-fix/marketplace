<x-admin-layout>
<x-slot:title>
  Dashboard
</x-slot>
<div class="row mt-3">
  <div class="col">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title text-success">Registered :: User</h5>
        <p class="card-text js-total-user"></p> 
      </div>
    </div>

  </div>

  <div class="col">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title text-warning">Suspended :: User</h5>
        <p class="card-text js-total-suspended-user"></p> 
      </div>
    </div>

  </div>
  <div class="col">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title text-danger">Deleted  :: User</h5>
        <p class="card-text js-total-deleted-user"></p> 
      </div>
    </div>

  </div>
</div>






<script type="module" src="{{ asset('backend-js/admin/helper/helper.js') }}"></script>
</x-admin-layout>
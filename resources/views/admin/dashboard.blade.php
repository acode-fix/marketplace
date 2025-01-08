<x-admin-layout>
<x-slot:title>
  Dashboard
</x-slot>
{{-- <div class="row mt-3">
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
<div class="row mt-3">
  <div class="col">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title text-success">Listed :: Products</h5>
        <p class="card-text js-total-products"></p> 
      </div>
    </div>

  </div>

  <div class="col">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title text-danger">Deleted :: Products</h5>
        <p class="card-text js-total-deleted-products"></p> 
      </div>
    </div>

  </div>
  <div class="col">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title text-success">Active :: Badges</h5>
        <p class="card-text js-total-active"></p> 
      </div>
    </div>

  </div>
</div>
<div class="row mt-3">
  <div class="col">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title text-danger">Expired :: Badges</h5>
        <p class="card-text js-total-expired"></p> 
      </div>
    </div>

  </div>

  <div class="col">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title text-danger">Unverified :: Seller</h5>
        <p class="card-text js-total-unverified"></p> 
      </div>
    </div>

  </div>
   <div class="col">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title text-success"></h5>
        <p class="card-text js-total-"></p> 
      </div>
    </div>

  </div> 
</div> --}}
<div class="row mt-3">
  <div class="col-md-6 col-lg-4 mb-3">
    <div class="card" style="width: 100%;">
      <div class="card-body">
        <h5 class="card-title text-success">Registered :: User</h5>
        <p class="card-text js-total-user"></p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4 mb-3">
    <div class="card" style="width: 100%;">
      <div class="card-body">
        <h5 class="card-title text-warning">Suspended :: User</h5>
        <p class="card-text js-total-suspended-user"></p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4 mb-3">
    <div class="card" style="width: 100%;">
      <div class="card-body">
        <h5 class="card-title text-danger">Deleted :: User</h5>
        <p class="card-text js-total-deleted-user"></p>
      </div>
    </div>
  </div>
</div>

<div class="row mt-3">
  <div class="col-md-6 col-lg-4 mb-3">
    <div class="card" style="width: 100%;">
      <div class="card-body">
        <h5 class="card-title text-success">Listed :: Products</h5>
        <p class="card-text js-total-products"></p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4 mb-3">
    <div class="card" style="width: 100%;">
      <div class="card-body">
        <h5 class="card-title text-danger">Deleted :: Products</h5>
        <p class="card-text js-total-deleted-products"></p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4 mb-3">
    <div class="card" style="width: 100%;">
      <div class="card-body">
        <h5 class="card-title text-success">Active :: Badges</h5>
        <p class="card-text js-total-active"></p>
      </div>
    </div>
  </div>
</div>

<div class="row mt-3">
  <div class="col-md-6 col-lg-4 mb-3">
    <div class="card" style="width: 100%;">
      <div class="card-body">
        <h5 class="card-title text-danger">Expired :: Badges</h5>
        <p class="card-text js-total-expired"></p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4 mb-3">
    <div class="card" style="width: 100%;">
      <div class="card-body">
        <h5 class="card-title text-danger">Unverified :: Seller</h5>
        <p class="card-text js-total-unverified"></p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4 mb-3">
    <div class="card" style="width: 100%;">
      <div class="card-body">
        <h5 class="card-title text-success"></h5>
        <p class="card-text js-total-"></p>
      </div>
    </div>
  </div>
</div>
  






<script type="module" src="{{ asset('backend-js/admin/helper/helper.js') }}"></script>
</x-admin-layout>
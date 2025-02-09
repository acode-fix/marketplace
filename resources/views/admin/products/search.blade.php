

<x-admin-layouts>
  <style>
    
    .table-responsive {
      overflow-x: auto;
    }

    .table-hover tbody tr {
      transition: all 0.2s ease;
    }

    @media (max-width: 768px) {

      .table th:nth-child(3),
      .table td:nth-child(3),
      /* Hide Category */
      .table th:nth-child(4),
      .table td:nth-child(4) {
        /* Hide Location */
        display: none;
      }
    }


     .card-title {
      
      text-align: center;
    } 

    
    .ask-div {
      display: flex;
      align-items: center;
      gap: 10px;
    }


    @media (max-width: 768px) {
      .form-label {
        font-size: 0.9rem;
      }

      #filterBtn {
        width: 100%;
        
      }

      .form-select,
      .form-control {
        font-size: 0.85rem;
        padding: 8px;
      }
    }

    .table-wrapper {
      display: none;
    }
  </style>

  <x-slot:title>
    Products :: Search
   </x-slot>
    <div class="row">
      <div class="col-10">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Products Menu</h4>

          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
              <li class="breadcrumb-item active">Search</li>
            </ol>
          </div>

        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-lg-10">
        <div class="card card-body">
          <h6 class="card-title">Search :: Menu</h6>
          <div class="container mt-3">
            <h6>Filter :: Search</h6>
            <br>
            <div class="row">
              <!-- Product Condition -->
              <div class="col-12 col-md-4 mb-3">
                <select id="product-condition" class="form-select form-select-lg"
                  aria-label="Choose Product Condition">
                  <option selected>Choose Product Condition</option>
                  <option value="new">New</option>
                  <option value="fairly_used">Fairly Used</option>
                </select>
              </div>

            
              <div class="col-12 col-md-4 js-select mb-3">
              
              </div>

          
              <div class="col-12 col-md-4 mb-3">
          
                <input type="number" class="form-control" id="actual-price" placeholder="Actual Price">
              </div>
            </div>

            <div class="row">
              
              <div class="col-12 col-md-4 mb-3">
                <input type="number" class="form-control" id="promo-price" placeholder="Promo price">
              </div>

        
              <div class="col-12 col-md-4 mb-3">
                <div class="d-flex align-items-center">
                  <p class="mb-0 me-2">Ask for Price</p>
                  <label class="switch">
                    <input name="ask_for_price" type="checkbox" id="mobile-priceSwitch">
                    <span class="slider"></span>
                  </label>
                </div>
              </div>

        
              <div class="col-12 d-flex justify-content-end">
                <button id="filterBtn" class="btn btn-warning mt-2">Filter</button>
              </div>
            </div>
          </div>
      </div>
      </div>
    </div>

    
      <div class="row mt-5 table-wrapper">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <div class="card-title">Products :: Table</div>
              <div class="container mt-3">
                <div class="js-content table-responsive">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  


      <script type="module" src="{{ asset('backend-js/admin/user/permission.js') }}"></script>
    <script type="module" src="{{ asset('backend-js/admin/products/search.js') }}"></script>  
</x-admin-layouts>
<x-admin-layout>
  <x-slot:title>
    Search :: Products
    </x-slot>

    <style>
      /* Ensure table is scrollable on small screens */
      .table-responsive {
        overflow-x: auto;
      }

      .table-hover tbody tr {
        transition: all 0.2s ease;
      }

      /* Hide columns on smaller screens */
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

      /* General Adjustments */
      .card-title {
        font-size: 1.5rem;
        text-align: center;
      }

      /* Switch alignment for "Ask for Price" */
      .ask-div {
        display: flex;
        align-items: center;
        gap: 10px;
      }

      /* Responsive Layout */
      @media (max-width: 768px) {
        .form-label {
          font-size: 0.9rem;
        }

        #filterBtn {
          width: 100%;
          /* Make the button full width on smaller screens */
        }

        .form-select,
        .form-control {
          font-size: 0.85rem;
          /* Adjust font size */
          padding: 8px;
        }
      }
    </style>

    <div class="row mt-5">
      <div class="col-lg-10">
        <div class="card">
          <div class="card-body">
            <div class="card-title">Search :: Menu</div>
            <div class="container mt-3">
              <h2>Filter :: Search</h2>
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

                <!-- Category -->
                <div class="col-12 col-md-4 js-select mb-3">
                  <!-- Dynamic category dropdown will be injected here -->
                </div>

                <!-- Actual Price -->
                <div class="col-12 col-md-4 mb-3">
                  {{-- <label for="actual-price" class="form-label">Actual Price</label> --}}
                  <input type="number" class="form-control" id="actual-price" placeholder="Actual Price">
                </div>
              </div>

              <div class="row">
                <!-- Promo Price -->
                <div class="col-12 col-md-4 mb-3">
                  {{-- <label for="promo-price" class="form-label">Promo Price</label> --}}
                  <input type="number" class="form-control" id="promo-price" placeholder="Promo price">
                </div>

                <!-- Ask for Price -->
                <div class="col-12 col-md-4 mb-3">
                  <div class="d-flex align-items-center">
                    <p class="mb-0 me-2">Ask for Price</p>
                    <label class="switch">
                      <input name="ask_for_price" type="checkbox" id="mobile-priceSwitch">
                      <span class="slider"></span>
                    </label>
                  </div>
                </div>

                <!-- Filter Button -->
                <div class="col-12 d-flex justify-content-end">
                  <button id="filterBtn" class="btn btn-warning mt-2">Filter</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container-fluid">
      <div class="row mt-5">
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <div class="card-title">Products :: Table</div>
              <div class="container mt-3">
                <div class="js-content table-responsive">
                  <!-- Table will load dynamically -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <script type="module" src="{{ asset('backend-js/admin/products/search.js') }}"></script>
</x-admin-layout>
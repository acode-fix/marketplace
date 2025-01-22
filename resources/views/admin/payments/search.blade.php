{{-- <x-admin-layout>
  <x-slot:title>
    Payments :: Search
    </x-slot>
    <style>
      .card-title {
        font-size: 1.5rem;
        text-align: center;
      }

      label.form-label {
        font-size: 1rem;
      }

      .form-control,
      .form-select {
        font-size: 0.9rem;
        padding: 8px;
      }


      #filterBtn {
        font-size: 1rem;
      }


      @media (max-width: 768px) {
        label.form-label {
          font-size: 0.85rem;
        }

        .form-control,
        .form-select {
          font-size: 0.85rem;
          padding: 6px;
        }

        #filterBtn {
          width: 100%;
        }
      }

      @media (max-width: 576px) {
        h2 {
          font-size: 1.25rem;
        }

        .card-title {
          font-size: 1.25rem;
        }
      }
    </style>

    <div class="row mt-5">
      <div class="col-lg-10">
        <div class="card">
          <div class="card-body">
            <div class="card-title">Payments :: Menu</div>
            <div class="container mt-3">
              <h2>Filter :: Payments</h2>
              <br>
              <div class="row">

                <div class="col-12 col-md-4 mb-3">
                  <select id="amount" class="form-select form-select-lg" aria-label="Choose Amount Paid">
                    <option selected>Amount Paid</option>
                    <option value="2500.00">&#8358;2,500</option>
                    <option value="20000.00">&#8358;20,000</option>
                  </select>
                </div>


                <div class="col-12 col-md-4 mb-3">
                  <select id="status" class="form-select form-select-lg" aria-label="Choose Payment Status">
                    <option selected>Status</option>
                    <option value="1">Success</option>
                    <option value="-1">Failed</option>
                  </select>
                </div>


                <div class="col-12 col-md-4 mb-3">

                  <input id="trx" type="text" class="form-control" placeholder="Transaction Reference">
                </div>
              </div>

              <div class="row">

                <div class="col-12 col-md-4 mb-3">
                  <label for="from" class="form-label">From</label>
                  <input id="from" type="date" class="form-control">
                </div>

                <div class="col-12 col-md-4 mb-3">
                  <label for="to" class="form-label">To</label>
                  <input id="to" type="date" class="form-control">
                </div>

                <div class="col-12 d-flex justify-content-end">
                  <button id="filterBtn" class="btn btn-warning mt-2">Filter</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-lg-10">
        <div class="card ">
          <div class="card-body">
            <div class="card-title">Filter :: Table</div>
            <div class="container mt-3">
              <div class="js-content">

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <script type="module" src="{{ asset('backend-js/admin/payments/search.js') }}"></script>
</x-admin-layout> --}}


<x-admin-layouts>

  <style>
    /* General Styling */
    .card-title {
      text-align: center;
    }

    label.form-label {
      font-size: 1rem;
    }

    /* Input and Select Field Adjustments */
    .form-control,
    .form-select {
      font-size: 0.9rem;
      padding: 8px;
    }

    /* Button Styling */
    #filterBtn {
      font-size: 1rem;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
      label.form-label {
        font-size: 0.85rem;
      }

      .form-control,
      .form-select {
        font-size: 0.85rem;
        padding: 6px;
      }

      #filterBtn {
        width: 100%;
        /* Full-width button on smaller screens */
      }
    }

    @media (max-width: 576px) {
      h2 {
        font-size: 1.25rem;
      }

      .card-title {
        font-size: 1.25rem;
      }
    }
    .table-wrapper {
      display: none;
    }
  </style>

  <x-slot:title>
    Payment :: Search
    </x-slot>
    <div class="row">
      <div class="col-10">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Payments Menu</h4>

          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
              <li class="breadcrumb-item active">Search</li>
            </ol>
          </div>

        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-lg-10">
        <div class="card">
          <div class="card-body">
            <div class="card-title">Payments :: Menu</div>
            <div class="container mt-3">
              <h6>Filter :: Payments</h6>
              <br>
              <div class="row">
                <!-- Amount Paid -->
                <div class="col-12 col-md-4 mb-3">
                  <select id="amount" class="form-select form-select-lg" aria-label="Choose Amount Paid">
                    <option selected>Amount Paid</option>
                    <option value="2500.00">&#8358;2,500</option>
                    <option value="20000.00">&#8358;20,000</option>
                  </select>
                </div>

                <!-- Status -->
                <div class="col-12 col-md-4 mb-3">
                  <select id="status-input" class="form-select form-select-lg" aria-label="Choose Payment Status">
                    <option selected>Status</option>
                    <option value="1">Success</option>
                    <option value="-1">Failed</option>
                  </select>
                </div>

                <!-- Transaction Reference -->
                <div class="col-12 col-md-4 mb-3">
                  {{-- <label for="trx" class="form-label">Transaction Reference</label> --}}
                  <input id="trx" type="text" class="form-control" placeholder="Transaction Reference">
                </div>
              </div>

              <div class="row">
                <!-- From Date -->
                <div class="col-12 col-md-4 mb-3">
                  <label for="from" class="form-label">From</label>
                  <input id="from" type="date" class="form-control">
                </div>

                <!-- To Date -->
                <div class="col-12 col-md-4 mb-3">
                  <label for="to" class="form-label">To</label>
                  <input id="to" type="date" class="form-control">
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

    <div class="row mt-5 table-wrapper">
      <div class="col-lg-10">
        <div class="card ">
          <div class="card-body">
            <div class="card-title">Filter :: Table</div>
            <div class="container mt-3">
              <div class="js-content">

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>



    <script type="module" src="{{ asset('backend-js/admin/payments/search.js') }}"></script>
</x-admin-layouts>
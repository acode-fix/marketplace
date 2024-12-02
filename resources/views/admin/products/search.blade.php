<x-admin-layout>
  <x-slot:title>
    Search :: Products
    </x-slot>

    <div class="row mt-5">
      <div class="col-lg-10">
        <div class="card ">
          <div class="card-body">
            <div class="card-title">Search :: Menu</div>
            <div class="container mt-3">
              <h2>Filter :: Search </h2>
              <br>
               <div class="row">
                <div class="col-4">
                  <select id="product-condition" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>Choose Product Condition</option>
                    <option value="new">New</option>
                    <option value="fairly_used">Fairly Used</option>
                  </select>
                </div>
                <div class="col-4 js-select">
                  
                  

                </div>
                <div class="col-4">
                  <select id="product-price" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>Choose Product Prce</option>
                    <option value="actual_price">Actual Price</option>
                    <option value="promo_price">Promo Price</option>
                    <option value="ask_for_price">Ask For Price</option>
                  </select>
                  

                </div>
               </div>
               <button id="filterBtn" style="float: right" class="btn btn-warning mt-2">Filter</button>
             
            
          
            </div>
          </div>
        </div>
      </div>

    </div>

    <script type="module" src="{{ asset('backend-js/admin/products/search.js') }}"></script> 
</x-admin-layout>
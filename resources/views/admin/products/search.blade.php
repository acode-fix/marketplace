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
                  <div style="margin-top: -25px" class="">
                    <label for="exampleFormControlInput1" class="form-label">Actual Price</label>
                    <input type="number" value=""  class="form-control" id="actual-price">
                  </div>
                </div>
               </div>
               <div class="row">
                <div class="col-4">
                  <div  class="">
                    <label for="exampleFormControlInput1" class="form-label">Promo Price</label>
                    <input type="number" value="" class="form-control" id="promo-price">
                  </div>
                </div>
                <div class="col-4">
                  <div class="mt-3 ask-div">
                    <p>Ask for price
                    </p>
                    <label class="switch">
                        <input name="ask_for_price" type="checkbox" id="mobile-priceSwitch">
                        <span class="slider"></span>
                    </label>
                </div>
                </div>

               </div>
               <button id="filterBtn" style="float: right" class="btn btn-warning mt-2">Filter</button>
             
            
          
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="row mt-5">
      <div class="col-lg-10">
        <div class="card ">
          <div class="card-body">
            <div class="card-title">Products :: Table</div>
            <div class="container mt-3">
              <div class="js-content">
                
              </div>
            
            
             
  
          
            </div>
          </div>
        </div>
      </div>

    </div>

    <script type="module" src="{{ asset('backend-js/admin/products/search.js') }}"></script> 
</x-admin-layout>
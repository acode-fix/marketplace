<x-admin-layout>
  <x-slot:title>
    Payments :: Search
    </x-slot>

    <div class="row mt-5">
      <div class="col-lg-10">
        <div class="card ">
          <div class="card-body">
            <div class="card-title">Payments :: Menu</div>
            <div class="container mt-3">
              <h2>Filter :: Payments </h2>
              <br>
               <div class="row">
                <div class="col-4">
                  <select id="amount" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>Amount Paid</option>
                    <option value="2500.00">&#8358;2,500</option>
                    <option value="20000.00">&#8358;20,000</option>
                  </select>
                </div>
                <div class="col-4">
                  <select id="status" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>Status</option>
                    <option value="1">Success</option>
                    <option value="-1">Failed</option>
                  </select>
                </div>
                <div class="col-4">
                  <div  style="margin-top: -25px" class="">
                    <label for="exampleFormControlInput1" class="form-label">Transaction Reference</label>
                    <input id="trx" type="text" value=""  class="form-control">
                  </div>  
                </div>
               
               </div>
               <div class="row">
                <div class="col-4">
                  <div  class="">
                    <label for="exampleFormControlInput1" class="form-label">From</label>
                    <input id="from" type="date" value="" class="form-control">
                  </div>
                </div>
                <div class="col-4">
                  <label for="exampleFormControlInput1" class="form-label">To</label>
                  <input id="to" type="date" value="" class="form-control">
 
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
</x-admin-layout>
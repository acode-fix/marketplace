

<div class="mobile-view">
    <div class="container-fluid">
      <div class="row">
        <div class="mobile-struct">
          <div class="mobile-link-btn">
            <a href="shop.html">Shop</a>
          </div>
          <div class="mobile-link-btn">
            <a href="settings.html">Settings</a>
          </div>
          <div class="mobile-link-btn">
            <a href="learn.html">Learn</a>
          </div>

          <div class="mobile-link-btn1">
            <a href="ads.html"> Ads</a>
          </div>

          <div class="mobile-link-btn">
            <a href="wallet.html"> Wallet</a>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col ">
          <table class="table container-fluid">
            <tr>
              <th class="remove-border  ps-3 pt-3">Total Campaign</th>
              <th class="remove-border1  ps-2 pt-2 pt-3">Total Reach/Connects</th>
              <th class="remove-border2 ps-4  pt-2 pt-3">Wallet Balance </th>
            </tr>
            <tbody>
              <tr>
                <td class="td-text-mobile  ps-3 td-lh">67,124k <br><span class="br-text1">wed, jul 20</span> </td>
                <td class="td-text-mobile td-lh">125k<span class="mobile-text1 icon "> <i
                      class="fa-solid fa-arrow-down"></i> 3.0%</span>
                  <br> <span class="br-text1-mobile">643 Connects</span>
                </td>
                <td class="ps-4 pb-3  td-text3-mobile td-lh">$123k<span class="mobile-text2 icon  "><i
                      class="fa-solid fa-arrow-up"></i> 3.2%</span>
                  <br> <span class="br-text1-mobile">643 Connects</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="">
        <div class="row">
          <div class="col">
            <button type="button" class=" btn ms-2 btn-light filter2"><img width="18px" height="18px"
                src="{{ asset('kaz/images/mi_filter.svg') }}" alt=""></button>
            <div class="custom-dropdown">
              <button id="Newest" onclick="toggleDropdown()" class="custom-btn">Newest</button>
              <div id="myDropdown2" class="custom-dropdown-content">
                <div>
                  <button style="width: 100%;" id="in-review-btn-mobile"
                    class="btn btn-light btn-text">In-Review</button>
                </div>
                <div>
                  <button style="width: 100%;" id="on-going-btn-mobile"
                    class="btn btn-light  btn-text">On-Going</button>
                </div>
                <div>

                  <button style="width: 100%;" id="expired-btn-mobile" class="btn btn-light  btn-text">Expired</button>

                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div style="display: flex; justify-content: end;">
              <button style="width: 100%;" type="button" class=" btn  btn-warning pt-2 pb-2">+ Create Ads</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col in-review-mobile">
          <table class="table">
            <tr>
              <th class="remove-m ads-no ps-3 pt-3"><span class="span-ads">#AD-43355</span></th>
            </tr>
            <tbody>
              <tr>
                <td class="mb-border">
                  <div class="pb-1">
                    <h6 class=" ps-2 product-m">50% OFF Floor Lamp Get It Now! </h6>
                    <h6 class=" ps-2 published-m fw-light"> <i class="fa-solid fa-check"></i> Published on 5 March 2020
                    </h6>
                  </div>

                <td class="mb-border">
                  <div>
                    <img class="svg-reach" src="{{ asset('kaz/images/reach.svg') }}" alt=""> <span>0</span>
                    <h6 class="total-m"> Total Reach</h6>
                  </div>
                </td>
                <td class="mb-border">
                  <div>
                    <img src="{{ asset('kaz/images/connect.svg') }}" alt=""><span>0C+</span>
                    <h6 class=" connect-m pe-2">Total Connects</h6>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="pt-4 pb-5 bb-none"> <span class="in-mobile ">In-review </span></td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img src="{{ asset('kaz/images/spent.svg') }}" alt=""><span class="spent-mobile"> Spent</span>
                    <h6 class="amount-spent-mobile">0</h6>
                  </div>
                </td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img width="15px" height="15px" src="{{ asset('kaz/images/duration.svg') }}" alt=""><span class="mobile-duration">
                      Duration</span>
                    <h6 class="duration-m pe-2">Ending 4/4/23</h6>
                  </div>

                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col On-going-mobile">
          <table class="table">
            <tr>
              <th class="remove-m ads-no ps-3 pt-3"><span class="span-ads">#AD-43355</span></th>
            </tr>
            <tbody>
              <tr>
                <td class="mb-border">
                  <div class="pb-1">
                    <h6 class=" ps-2 product-m">50% OFF Floor Lamp Get It Now! </h6>
                    <h6 class=" ps-2 published-m fw-light"> <i class="fa-solid fa-check"></i> Published on 5 March 2020
                    </h6>
                  </div>

                <td class="mb-border">
                  <div>
                    <img class="svg-reach" src="{{ asset('kaz/images/reach.svg') }}" alt=""> <span>0</span>
                    <h6 class="total-m"> Total Reach</h6>
                  </div>
                </td>
                <td class="mb-border">
                  <div>
                    <img src="{{ asset('kaz/images/connect.svg') }}" alt=""><span>0C+</span>
                    <h6 class=" connect-m pe-2">Total Connects</h6>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="pt-4 pb-5 bb-none"> <span class="on-going-mobile ">On-going</span></td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img src="{{ asset('kaz/images/spent.sv') }}g" alt=""><span class="spent-mobile"> Spent</span>
                    <h6 class="amount-spent-mobile">0</h6>
                  </div>
                </td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img width="15px" height="15px" src="{{ asset('kaz/images/duration.svg') }}" alt=""><span class="mobile-duration">
                      Duration</span>
                    <h6 class="duration-m pe-2">Ending 4/4/23</h6>
                  </div>

                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col expired">
          <table class="table">
            <tr>
              <th class="remove-m ads-no ps-3 pt-3"><span class="span-ads">#AD-43355</span></th>
            </tr>
            <tbody>
              <tr>
                <td class="mb-border">
                  <div class="pb-1">
                    <h6 class=" ps-2 product-m">50% OFF Floor Lamp Get It Now! </h6>
                    <h6 class=" ps-2 published-m fw-light"> <i class="fa-solid fa-check"></i> Published on 5 March 2020
                    </h6>
                  </div>

                <td class="mb-border">
                  <div>
                    <img class="svg-reach" src="{{ asset('kaz/images/reach.svg') }}" alt=""> <span>0</span>
                    <h6 class="total-m"> Total Reach</h6>
                  </div>
                </td>
                <td class="mb-border">
                  <div>
                    <img src="{{ asset('kaz/images/connect.svg') }}" alt=""><span>0C+</span>
                    <h6 class=" connect-m pe-2">Total Connects</h6>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="pt-4 pb-5 bb-none"> <span class="ex-mobile ">Expired</span></td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img src="{{ asset('kaz/images/spent.svg') }}" alt=""><span class="spent-mobile"> Spent</span>
                    <h6 class="amount-spent-mobile">0</h6>
                  </div>
                </td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img width="15px" height="15px" src="{{ asset('kaz/images/duration.svg') }}" alt=""><span class="mobile-duration">
                      Duration</span>
                    <h6 class="duration-m pe-2">Ending 4/4/23</h6>
                  </div>

                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col in-review-mobile">
          <table class="table">
            <tr>
              <th class="remove-m ads-no ps-3 pt-3"><span class="span-ads">#AD-43355</span></th>
            </tr>
            <tbody>
              <tr>
                <td class="mb-border">
                  <div class="pb-1">
                    <h6 class=" ps-2 product-m">50% OFF Floor Lamp Get It Now! </h6>
                    <h6 class=" ps-2 published-m fw-light"> <i class="fa-solid fa-check"></i> Published on 5 March 2020
                    </h6>
                  </div>

                <td class="mb-border">
                  <div>
                    <img class="svg-reach" src="{{ asset('kaz/images/reach.svg') }}" alt=""> <span>0</span>
                    <h6 class="total-m"> Total Reach</h6>
                  </div>
                </td>
                <td class="mb-border">
                  <div>
                    <img src="{{ asset('kaz/images/connect.svg') }}" alt=""><span>0C+</span>
                    <h6 class=" connect-m pe-2">Total Connects</h6>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="pt-4 pb-5 bb-none"> <span class="in-mobile ">In-review </span></td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img src="{{ asset('kaz/images/spent.svg') }}" alt=""><span class="spent-mobile"> Spent</span>
                    <h6 class="amount-spent-mobile">0</h6>
                  </div>
                </td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img width="15px" height="15px" src="{{ asset('kaz/images/duration.svg') }}" alt=""><span class="mobile-duration">
                      Duration</span>
                    <h6 class="duration-m pe-2">Ending 4/4/23</h6>
                  </div>

                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col On-going-mobile">
          <table class="table">
            <tr>
              <th class="remove-m ads-no ps-3 pt-3"><span class="span-ads">#AD-43355</span></th>
            </tr>
            <tbody>
              <tr>
                <td class="mb-border">
                  <div class="pb-1">
                    <h6 class=" ps-2 product-m">50% OFF Floor Lamp Get It Now! </h6>
                    <h6 class=" ps-2 published-m fw-light"> <i class="fa-solid fa-check"></i> Published on 5 March 2020
                    </h6>
                  </div>

                <td class="mb-border">
                  <div>
                    <img class="svg-reach" src="{{ asset('kaz/images/reach.svg') }}" alt=""> <span>0</span>
                    <h6 class="total-m"> Total Reach</h6>
                  </div>
                </td>
                <td class="mb-border">
                  <div>
                    <img src="{{ asset('kaz/images/connect.svg') }}" alt=""><span>0C+</span>
                    <h6 class=" connect-m pe-2">Total Connects</h6>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="pt-4 pb-5 bb-none "> <span class="on-going-mobile ">On-going</span></td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img src="{{ asset('kaz/images/spent.svg') }}" alt=""><span class="spent-mobile"> Spent</span>
                    <h6 class="amount-spent-mobile">0</h6>
                  </div>
                </td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img width="15px" height="15px" src="{{ asset('kaz/images/duration.svg') }}" alt=""><span class="mobile-duration">
                      Duration</span>
                    <h6 class="duration-m pe-2">Ending 4/4/23</h6>
                  </div>

                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col expired">
          <table class="table">
            <tr>
              <th class="remove-m ads-no ps-3 pt-3"><span class="span-ads">#AD-43355</span></th>
            </tr>
            <tbody>
              <tr>
                <td class="mb-border">
                  <div class="pb-1">
                    <h6 class=" ps-2 product-m">50% OFF Floor Lamp Get It Now! </h6>
                    <h6 class=" ps-2 published-m fw-light"> <i class="fa-solid fa-check"></i> Published on 5 March 2020
                    </h6>
                  </div>

                <td class="mb-border">
                  <div>
                    <img class="svg-reach" src="{{ asset('kaz/images/reach.svg') }}" alt=""> <span>0</span>
                    <h6 class="total-m"> Total Reach</h6>
                  </div>
                </td>
                <td class="mb-border">
                  <div>
                    <img src="{{ asset('kaz/images/connect.svg') }}" alt=""><span>0C+</span>
                    <h6 class=" connect-m pe-2">Total Connects</h6>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="pt-4 pb-5 bb-none"> <span class="ex-mobile ">Expired</span></td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img src="{{ asset('kaz/images/spent.svg') }}" alt=""><span class="spent-mobile"> Spent</span>
                    <h6 class="amount-spent-mobile">0</h6>
                  </div>
                </td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img width="15px" height="15px" src="{{ asset('kaz/images/duration.svg') }}" alt=""><span class="mobile-duration">
                      Duration</span>
                    <h6 class="duration-m pe-2">Ending 4/4/23</h6>
                  </div>

                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <nav aria-label="Page navigation example">
        <ul class="pagination  pagination-md justify-content-center">
          <li class="page-item disabled">
            <a class="page-link">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="ads.html">1</a></li>
          <li class="page-item"><a class="page-link" href="ads2.html">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>



    </div>
  </div>

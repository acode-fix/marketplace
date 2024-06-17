<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/learn.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/ads2.css') }}">
  <script src="{{ asset('kaz/js/bootstrap.js') }}"></script>
  <script src="{{ asset('kaz/js/ads.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('kaz/css1/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css1/fontawesome.min.css') }}">
  <style>

  </style>

</head>

<body>
  <div class="header-section">
    <div class="arrow-div">
      <a href="{{ url('/') }}"><img class="arrow" src="kaz/images/Arrow.png" alt=""></a>
      <h6 style="font-size: 20px;" class="fw-light ms-4">Ads</h6>
    </div>
    <div class="left-section">
      <a href="{{ url('/') }}"><img class="img-fluid ms-3" src="kaz/images/logo.png" alt=""></a>
      <h6 class="ms-5 fw-bold profile">Ads</h6>

    </div>

    <div class="middle-section">
      <div class="search-border">
        <input type="search" id="search" placeholder="&nbsp Search product...">
        <button class="search-btn btn-light mt-1 pt-1 pb-2 me-1"><img src="kaz/images/Search.png"
            class="img-fluid search-img" alt=""> search</button>
      </div>

    </div>
    <div class="create">
      <button type="button" class=" btn btn-warning  btn-height"> + create Ads</button>
    </div>
    <div class="right-section me-4">
      <div class="me-1">
        <h6 class="name">Mired Augustine </h6>
        <h6 class="mired-text fw-light">miredaugustine@gmail.com</h6>
      </div>
      <img class="img-fluid profile-picture" src="kaz/images/dp.png" alt="">
    </div>
    <div class="menu-toggle">
      <input type="checkbox" id="menu-checkbox" class="menu-checkbox">
      <label for="menu-checkbox" class="menu-btn">&#9776;</label>
      <div class="menu-overlay"></div>
      <ul class="menu">
        <li><a href="{{ url('/settings') }}">Dashboard</a></li>
        <li><a href="{{ url('/refer') }}">Refer a Friend</a></li>
        <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
        <li><a href="#">Log Out</a></li>
        <hr style="background-color: black; width: 70%;">
        <li><a style="color: red;" href="{{ url('/delete') }}">Delete Account</a></li>
      </ul>
    </div>
  </div>
  <div class="main">
    <div class="side-bar ">
      <div class="sidebar-link">
        <div class="links myLink">
          <span>
            <a href="{{ url('/shop') }}"><img class="profile-logo svg-size" src="kaz/images/profile.svg" alt=""></a>
            <a class="profile-text" href="{{ url('/shop') }}">Shop</a>
          </span>
        </div>
      </div>
      <div class="sidebar-link">
        <div class="links myLink">
          <span>
            <a href="{{ url('/settings') }}"><img class="profile-logo svg-size" src="kaz/images/product.svg" alt=""></a>
            <a class="profile-text" href="{{ url('/settings') }}">Settings</a>
          </span>
        </div>
      </div>
      <div class="sidebar-link">
        <div class="links myLink">
          <span>
            <a href="{{ url('/learn') }}"><img class="profile-logo svg-size" src="kaz/images/learn.svg" alt=""></a>
            <a class="profile-text" href="{{ url('/learn') }}">Learn</a>
          </span>
        </div>
      </div>
      <div class="sidebar-link">
        <div class="links myLink4">
          <span>
            <img class="profile-logo " height="20px" width="17px" src="kaz/images/ads.svg" alt="">
            <a style="color: blue;" class="profile-text ms-3" href="{{ url('/ads') }}">Ads</a>
          </span>
        </div>
      </div>
      <div class="sidebar-link">
        <div class="links myLink">
          <span>
            <a href="{{ url('/wallet') }}"> <img class="profile-logo" height="20px" width="17px" src="kaz/images/wallet.svg"
                alt=""></a>
            <a class="profile-text ms-3" href="{{ url('/wallet') }}">wallet</a>
          </span>
        </div>

      </div>
      <hr style="color: black;">
      <div class="sidebar-link">
        <div class="links myLink">
          <span>
            <a href="{{ url('/privacy') }}"><img class="profile-logo svg-size" src="kaz/images/privacy policy.svg" alt=""></a>
            <a class="profile-text" href="{{ url('/privacy') }}">privacy policy</a>
          </span>
        </div>
      </div>
      <div class="sidebar-link">
        <div class="links myLink">
          <span>
            <a href="{{ url('/refer') }}"> <img class="profile-logo svg-size" src="kaz/images/refer friends.svg" alt=""></a>
            <a class="profile-text" href="{{ url('/refer') }}">Refer Friends</a>
          </span>
        </div>
      </div>
      <div class="sidebar-link">
        <div class="links myLink">
          <span>
            <a href="{{ url('/delete') }}"><img class="profile-logo svg-size1" src="kaz/images/delete.svg" alt=""></a>
            <a class="profile-text" href="{{ url('/delete') }}">Delete Account</a>
          </span>
        </div>
      </div>
      <div class="sidebar-link">
        <div class="row mt-5 footer">
          <div style="text-align: center;" class="col">
            <img height="35px" width="35px" src="kaz/images/facebook.png" alt="">
            <img height="30px" width="30px" src="kaz/images/twitter.png" alt="">
            <img height="29px" width="29px" src="kaz/images/whatsapp.png" alt="">
            <img height="30px" width="30px" src="kaz/images/message.png" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-9">
            <table class="table ">
              <tr>
                <th class="remove-border ps-4 pt-3">Total Campaign</th>
                <th class="remove-border1 ps-4 pt-2 pt-3">Total Reach/Connects <span class="text1"> <i
                      class="fa-solid fa-arrow-down"></i> 3.0%</span></th>
                <th class="remove-border2 ps-4 pt-2 pt-3">Wallet Balance <span class="text2"><i
                      class="fa-solid fa-arrow-up"></i> 3.2%</span></th>
              </tr>
              <tbody>
                <tr>
                  <td class="lh td-text ps-4 pt-2 pb-3">67,124 <br><span class="br-text1">wed, jul 20</span></td>
                  <td class=" lh td-text ps-4 pt-2">125k <br> <span class="br-text1">643 Connects</span></td>
                  <td class="td-text3 ps-4 ">$123</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col">
            <div class="row mt-1">
              <div class="col">
                <div class="ads-struct">
                  <button type="button" class=" btn btn-warning"> + create Ads</button>
                </div>
              </div>
            </div>

            <div class="row  mt-4">
              <div class="col">
                <div class="ads-struct">
                  <button type="button" class=" btn  btn-light filter me-2"><img src="kaz/images/mi_filter.svg"
                      alt=""></button>
                  <div class="dropdown  ">
                    <button id="Newest-main" onclick="myFunction()" type="button"
                      class="btn btn-light dropbtn">Newest</button>
                    <div id="myDropdown" class="dropdown-content">
                      <div>
                        <button style="width: 100%;" id="in-review-btn"
                          class="btn btn-light btn-text">In-Review</button>
                      </div>
                      <div>
                        <button style="width: 100%;" id="on-going-btn" class="btn btn-light  btn-text">On-Going</button>
                      </div>
                      <div>
                        <button style="width: 100%;" id="expired-btn" class="btn btn-light  btn-text">Expired</button>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col in-review">
            <table class="table ">
              <tr>
                <th class="ads-no ps-4 pt-3"><span class="span-ads"># AD-43355</span></th>
              </tr>
              <tbody>
                <tr>
                  <td class="product ps-4 bb-none">50% OFF Floor Lamp Get It Now! <br> <span class="Published fw-light">
                      <i class="fa-solid fa-check"></i> Published on 5 March 2020</span></td>
                  <td class="lh1 bb-none"><img src="kaz/images/reach.svg" alt=""> <span>0</span> <br> <span
                      class="svg-text"> Total Reach</span></td>
                  <td class="lh2 bb-none"><img src="kaz/images/connect.svg" alt=""><span> 0C +</span> <br> <span
                      class="svg-text">Total Connects</span> </td>
                  <td class="lh3 bb-none"><img src="kaz/images/spent.svg" alt=""><span class="product"> Spent <br><span
                        class="svg-text-amount">70,000</span></span></td>
                  <td class="lh4 bb-none"><img width="15px" height="25px" src="kaz/images/duration.svg" alt=""><Span
                      class="product"> Duration</Span> <br><span class="svg-text-end">Ending 12/12/23</span></td>
                  <td class="bb-none"> <span class="in">In-review </span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col on-going">
            <table class="table ">
              <tr>
                <th class="ads-no ps-4 pt-3"><span class="span-ads"># AD-43355</span></th>
              </tr>
              <tbody>
                <tr>
                  <td class="product ps-4 bb-none">50% OFF Floor Lamp Get It Now! <br> <span class="Published fw-light">
                      <i class="fa-solid fa-check"></i> Published on 5 March 2020</span></td>
                  <td class="lh1 bb-none"><img src="kaz/images/reach.svg" alt=""> <span>0</span> <br> <span
                      class="svg-text"> Total Reach</span></td>
                  <td class="lh2 bb-none"><img src="kaz/images/connect.svg" alt=""><span> 0C +</span> <br> <span
                      class="svg-text">Total Connects</span> </td>
                  <td class="lh3 bb-none"><img src="kaz/images/spent.svg" alt=""><span class="product"> Spent <br><span
                        class="svg-text-amount">70,000</span></span></td>
                  <td class="lh4 bb-none"><img width="15px" height="25px" src="kaz/images/duration.svg" alt=""><Span
                      class="product"> Duration</Span> <br><span class="svg-text-end">Ending 4/4/23</span></td>
                  <td class="bb-none"> <span class="on">0n-Going </span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col expired">
            <table class="table">
              <tr>
                <th class="ads-no ps-4 pt-3"><span class="span-ads"># AD-43355</span></th>
              </tr>
              <tbody>
                <tr>
                  <td class="product ps-4 bb-none">50% OFF Floor Lamp Get It Now! <br> <span class="Published fw-light">
                      <i class="fa-solid fa-check"></i> Published on 5 March 2020</span></td>
                  <td class="lh1 bb-none"><img src="kaz/images/reach.svg" alt=""> <span>0</span> <br> <span
                      class="svg-text"> Total Reach</span></td>
                  <td class="lh2 bb-none"><img src="kaz/images/connect.svg" alt=""><span> 0C +</span> <br> <span
                      class="svg-text">Total Connects</span> </td>
                  <td class="lh3 bb-none"><img src="kaz/images/spent.svg" alt=""><span class="product"> Spent <br><span
                        class="svg-text-amount">70,000</span></span></td>
                  <td class="lh4 bb-none"><img width="15px" height="25px" src="kaz/images/duration.svg" alt=""><Span
                      class="product"> Duration</Span> <br><span class="svg-text-end">Ending 4/4/23</span></td>
                  <td class="bb-none"> <span class="ex"> Expired </span></td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
        <div class="row">
          <div class="col in-review">
            <table class="table ">
              <tr>
                <th class="ads-no ps-4 pt-3"><span class="span-ads"># AD-43355</span></th>
              </tr>
              <tbody>
                <tr>
                  <td class="product ps-4 bb-none">50% OFF Floor Lamp Get It Now! <br> <span class="Published fw-light">
                      <i class="fa-solid fa-check"></i> Published on 5 March 2020</span></td>
                  <td class="lh1 bb-none"><img src="kaz/images/reach.svg" alt=""> <span>0</span> <br> <span
                      class="svg-text"> Total Reach</span></td>
                  <td class="lh2 bb-none"><img src="kaz/images/connect.svg" alt=""><span> 0C +</span> <br> <span
                      class="svg-text">Total Connects</span> </td>
                  <td class="lh3 bb-none"><img src="kaz/images/spent.svg" alt=""><span class="product"> Spent <br><span
                        class="svg-text-amount">70,000</span></span></td>
                  <td class="lh4 bb-none"><img width="15px" height="25px" src="kaz/images/duration.svg" alt=""><Span
                      class="product"> Duration</Span> <br><span class="svg-text-end">Ending 4/4/23</span></td>
                  <td class="bb-none"> <span class="in">In-review </span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col on-going">
            <table class="table ">
              <tr>
                <th class="ads-no ps-4 pt-3"><span class="span-ads"># AD-43355</span></th>
              </tr>
              <tbody>
                <tr>
                  <td class="product ps-4 bb-none">50% OFF Floor Lamp Get It Now! <br> <span class="Published fw-light">
                      <i class="fa-solid fa-check"></i> Published on 5 March 2020</span></td>
                  <td class="lh1 bb-none"><img src="kaz/images/reach.svg" alt=""> <span>0</span> <br> <span
                      class="svg-text"> Total Reach</span></td>
                  <td class="lh2 bb-none"><img src="kaz/images/connect.svg" alt=""><span> 0C +</span> <br> <span
                      class="svg-text">Total Connects</span> </td>
                  <td class="lh3 bb-none"><img src="kaz/images/spent.svg" alt=""><span class="product"> Spent <br><span
                        class="svg-text-amount">70,000</span></span></td>
                  <td class="lh4 bb-none"><img width="15px" height="25px" src="kaz/images/duration.svg" alt=""><Span
                      class="product"> Duration</Span> <br><span class="svg-text-end">Ending 4/4/23</span></td>
                  <td class="bb-none"> <span class="on">0n-Going </span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col expired">
            <table class="table ">
              <tr>
                <th class="ads-no ps-4 pt-3"><span class="span-ads"># AD-43355</span></th>
              </tr>
              <tbody>
                <tr>
                  <td class="product ps-4 bb-none">50% OFF Floor Lamp Get It Now! <br> <span class="Published fw-light">
                      <i class="fa-solid fa-check"></i> Published on 5 March 2020</span></td>
                  <td class="lh1 bb-none"><img src="kaz/images/reach.svg" alt=""> <span>0</span> <br> <span
                      class="svg-text"> Total Reach</span></td>
                  <td class="lh2 bb-none"><img src="kaz/images/connect.svg" alt=""><span> 0C +</span> <br> <span
                      class="svg-text">Total Connects</span> </td>
                  <td class="lh3 bb-none"><img src="kaz/images/spent.svg" alt=""><span class="product"> Spent <br><span
                        class="svg-text-amount">70,000</span></span></td>
                  <td class="lh4 bb-none"><img width="15px" height="25px" src="kaz/images/duration.svg" alt=""><Span
                      class="product"> Duration</Span> <br><span class="svg-text-end">Ending 4/4/23</span></td>
                  <td class="bb-none"> <span class="ex"> Expired </span></td>
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
            <li class="page-item"><a class="page-link" href="{{ url('/ads') }}">1</a></li>
            <li class="page-item"><a class="page-link" href="{{ url('/ads2') }}">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>

      </div>

    </div>

  </div>
  <!-- mobile-view -->
  <div class="mobile-view">
    <div class="container-fluid">
      <div class="row">
        <div class="mobile-struct">
          <div class="mobile-link-btn">
            <a href="{{ url('/shop') }}">Shop</a>
          </div>
          <div class="mobile-link-btn">
            <a href="{{ url('/settings') }}">Settings</a>
          </div>
          <div class="mobile-link-btn">
            <a href="{{ url('/learn') }}">Learn</a>
          </div>

          <div class="mobile-link-btn1">
            <a href="{{ url('/ads') }}"> Ads</a>
          </div>

          <div class="mobile-link-btn">
            <a href="{{ url('/wallet') }}"> Wallet</a>
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
                src="kaz/images/mi_filter.svg" alt=""></button>
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
                    <img class="svg-reach" src="kaz/images/reach.svg" alt=""> <span>0</span>
                    <h6 class="total-m"> Total Reach</h6>
                  </div>
                </td>
                <td class="mb-border">
                  <div>
                    <img src="kaz/images/connect.svg" alt=""><span>0C+</span>
                    <h6 class=" connect-m pe-2">Total Connects</h6>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="pt-4 pb-5 bb-none"> <span class="in-mobile ">In-review </span></td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img src="kaz/images/spent.svg" alt=""><span class="spent-mobile"> Spent</span>
                    <h6 class="amount-spent-mobile">0</h6>
                  </div>
                </td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img width="15px" height="15px" src="kaz/images/duration.svg" alt=""><span class="mobile-duration">
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
                    <img class="svg-reach" src="kaz/images/reach.svg" alt=""> <span>0</span>
                    <h6 class="total-m"> Total Reach</h6>
                  </div>
                </td>
                <td class="mb-border">
                  <div>
                    <img src="kaz/images/connect.svg" alt=""><span>0C+</span>
                    <h6 class=" connect-m pe-2">Total Connects</h6>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="pt-4 pb-5 bb-none"> <span class="on-going-mobile ">On-going</span></td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img src="kaz/images/spent.svg" alt=""><span class="spent-mobile"> Spent</span>
                    <h6 class="amount-spent-mobile">0</h6>
                  </div>
                </td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img width="15px" height="15px" src="kaz/images/duration.svg" alt=""><span class="mobile-duration">
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
                    <img class="svg-reach" src="kaz/images/reach.svg" alt=""> <span>0</span>
                    <h6 class="total-m"> Total Reach</h6>
                  </div>
                </td>
                <td class="mb-border">
                  <div>
                    <img src="kaz/images/connect.svg" alt=""><span>0C+</span>
                    <h6 class=" connect-m pe-2">Total Connects</h6>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="pt-4 pb-5 bb-none"> <span class="ex-mobile ">Expired</span></td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img src="kaz/images/spent.svg" alt=""><span class="spent-mobile"> Spent</span>
                    <h6 class="amount-spent-mobile">0</h6>
                  </div>
                </td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img width="15px" height="15px" src="kaz/images/duration.svg" alt=""><span class="mobile-duration">
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
                    <img class="svg-reach" src="kaz/images/reach.svg" alt=""> <span>0</span>
                    <h6 class="total-m"> Total Reach</h6>
                  </div>
                </td>
                <td class="mb-border">
                  <div>
                    <img src="kaz/images/connect.svg" alt=""><span>0C+</span>
                    <h6 class=" connect-m pe-2">Total Connects</h6>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="pt-4 pb-5 bb-none"> <span class="in-mobile ">In-review </span></td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img src="kaz/images/spent.svg" alt=""><span class="spent-mobile"> Spent</span>
                    <h6 class="amount-spent-mobile">0</h6>
                  </div>
                </td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img width="15px" height="15px" src="kaz/images/duration.svg" alt=""><span class="mobile-duration">
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
                    <img class="svg-reach" src="kaz/images/reach.svg" alt=""> <span>0</span>
                    <h6 class="total-m"> Total Reach</h6>
                  </div>
                </td>
                <td class="mb-border">
                  <div>
                    <img src="kaz/images/connect.svg" alt=""><span>0C+</span>
                    <h6 class=" connect-m pe-2">Total Connects</h6>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="pt-4 pb-5 bb-none "> <span class="on-going-mobile ">On-going</span></td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img src="kaz/images/spent.svg" alt=""><span class="spent-mobile"> Spent</span>
                    <h6 class="amount-spent-mobile">0</h6>
                  </div>
                </td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img width="15px" height="15px" src="kaz/images/duration.svg" alt=""><span class="mobile-duration">
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
                    <img class="svg-reach" src="kaz/images/reach.svg" alt=""> <span>0</span>
                    <h6 class="total-m"> Total Reach</h6>
                  </div>
                </td>
                <td class="mb-border">
                  <div>
                    <img src="kaz/images/connect.svg" alt=""><span>0C+</span>
                    <h6 class=" connect-m pe-2">Total Connects</h6>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="pt-4 pb-5 bb-none"> <span class="ex-mobile ">Expired</span></td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img src="kaz/images/spent.svg" alt=""><span class="spent-mobile"> Spent</span>
                    <h6 class="amount-spent-mobile">0</h6>
                  </div>
                </td>
                <td class="bb-none">
                  <div class="mt-2">
                    <img width="15px" height="15px" src="kaz/images/duration.svg" alt=""><span class="mobile-duration">
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
          <li class="page-item"><a class="page-link" href="{{ url('/ads') }}">1</a></li>
          <li class="page-item"><a class="page-link" href="{{ url('/ads2') }}">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>



    </div>
  </div>
</body>

</html>

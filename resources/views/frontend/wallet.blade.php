@extends('layouts.others.app')
@section('title','Wallet')
@section('navtitle', 'Wallet')

@section('content')



  <div class="main">


    <div class="content" style="text-align: center;  margin-top:200px">
        <div class="container">
            <div class="row">
              <div class="col-9">
                <table class="table">
                  <tbody>
                    <tr>
                      <th style="padding: 50px; border-bottom:none;"><h4 class="fw-light">This page is under construction. Expect something amazing soon</h4> </th>
                </tr>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>

    {{-- <div class="content">
      <div class="container">
        <div class="row mt-3">
          <div class="col">
            <table class="table">
              <tr>
                <th class="border-remove points-border">
                  <h6 class="points pt-4 ">Points Earned</h6>
                </th>
                <th class="border-remove">
                  <h6 class="wallet pt-4">Wallet Balance <span class="text2"><i class="fa-solid fa-arrow-up"></i>
                      3.2%</span></h6>
                </th>
              </tr>
              <tbody>
                <tr>
                  <td class="border-remove  points-border">
                    <div style="display: flex; align-items: center; justify-content: center;"
                      class="point-preview mt-1">
                      <img class="point-svg " src="kaz/images/point.svg" alt=""><span class="icon-text ps-1">234</span>
                    </div>
                  </td>
                  <td class="border-remove ">
                    <h6 class="amount-rate">$123</h6>
                  </td>
                </tr>
              </tbody>
            </table>

          </div>
          <div class="col">
            <div class="container">
              <h6 class="point-earned-text pt-2">Point Earned</h6>
              <p class="excited-text pt-2 fw-light">We're excited to inform you that the points you've earned
                from your previous ad campaigns with us are our taken of appreciation,
                aimed at helping you save on future and expenditures.Your points are
                secured stored with us and can be redeemed whenever you wish to promote
                any of your listed products on our platform.
              </p>
            </div>

          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col">

            <div class="fund-box container">
              <form action="">
                <label for="exampleFormControlInput1" class="form-label pt-2 fund-text">Fund Your Wallet</label>
                <div class="input-group mb-3">
                  <input id="wallet-form" type="number" class="form-control" placeholder="Amount &#10; 7500"
                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <span class="input-group-text" id="basic-addon2">$</span>
                  <button type="button" class=" btn btn-warning wallet-btn mb-3 mt-3 ">Next</button>
                </div>
              </form>
            </div>

          </div>
          <div class="col">

          </div>
        </div>
      </div>

    </div> --}}

  </div>

   <!-- mobile-view  -->
    <div class="mobile-view mobile-height">
    <div class="container-fluid">
      <div class="row">
        <div class="mobile-struct">
           <div class="mobile-link-btn">
            <a href="{{ url('/settings') }}">Profile</a>
          </div>
          <div class="mobile-link-btn">
            <a href="{{ url('/shop') }}">Shop</a>
          </div>
         
          <div class="mobile-link-btn">
            <a href="{{ url('/learn') }}">Learn</a>
          </div>

          <div class="mobile-link-btn">
            <a href="{{ url('/ads') }}"> Ads</a>
          </div>

          <div class="mobile-link-btn1">
            <a href="{{ url('/wallet') }}"> Wallet</a>
          </div>
        </div>
      </div>


      <div class="container mt-4">
        <div class="row">
          <div class="col">
            <table class="table">
              <tbody>
                <tr>
                <th style="padding: 50px; border-bottom:none;"><h6 class="fw-light">This page is under construction. Expect something amazing soon</h6> </th>
               </tr>
              </tbody>
            </table> 
            
          </div>
        </div>
      </div>
      <!-- <div class="row mt-4">  -->
      {{-- <div class="container">
        <table class="table accordion mt-5">
          <tr>
            <th class="border-remove points-border">
              <h6 class="points pt-4 ">Points Earned</h6>
            </th>
            <th class="border-remove">
              <h6 class="wallet pt-4">Wallet Balance <span class="text2"><i class="fa-solid fa-arrow-up"></i>
                  3.2%</span></h6>
            </th>
          </tr>
          <tbody>
            <tr>
              <td class="border-remove  points-border">
                <div style="display: flex; align-items: center; justify-content: center;" class="point-preview mt-1">
                  <img class="point-svg " src="kaz/images/point.svg" alt=""><span class="icon-text ps-1">234</span>
                </div>
              </td>
              <td class="border-remove ">
                <h6 class="amount-rate">$123</h6>
                <i class="fa fa-caret-down ps-2 caret-btn"></i>
                <i style="display:none;" class="fa fa-caret-up  ps-2 caret-btn2"></i>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="panel">
          <p class=" excited-text-mobile fw-light">We're excited to inform you that the points you've earned
            from your previous ad campaigns with us are our taken of appreciation,
            aimed at helping you save on future and expenditures.Your points are
            secured stored with us and can be redeemed whenever you wish to promote
            any of your listed products on our platform.
          </p>
        </div>

      </div>
      <div class="container">
        <div class="row">
          <div class="col">

            <div class="fund-box container-fluid mt-4">
              <form action="">
                <label for="exampleFormControlInput1" class="form-label pt-2 fund-text">Fund Your Wallet</label>
                <div class="input-group mb-3">
                  <input id="wallet-form" type="number" class="form-control" placeholder="Amount &#10; 7500"
                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <span class="input-group-text" id="basic-addon2">$</span>
                  <button type="button" class=" btn btn-warning wallet-btn mb-3 mt-3 ">Next</button>
                </div>
              </form>
            </div>

          </div>

        </div>
      </div> --}}





    </div>
  </div> 




  

  @endsection

@extends('layouts.others.app')
@section('title','Refer')
@section('navtitle', 'Refer Friends')


@section('content')


  <div class="main">

    <div style="height: 400px" class="content">
      <div class="container">
        <div class="row mt-4">
          <div class="col">
            <div class="container">
              <h4 class="use">Use the link below to refer a friend</h4>
              <p style="font-size: small;"> LoopMart marketplace is a user-friendly platform
                that makes buying and selling goods and serviceseasy.
                Your friend should able to navigate the website and start using it with ease.</p>
              <hr class="sign2">
            </div>
            <div class="container">
              <div class="link-body">
                <form action="">
                  <input class="link" type="text" name="" id="linkInput"
                    placeholder="www.buyandsell.com/join/bas-mrk-pla">
                  <button value="submit" type="button" class="btn btn-warning btn-sm  " id="linkButton">Copy</button>
                </form>
              </div>
              <div class="media-link" style="float: right; margin-top: 10px;">
                <a href="https://web.facebook.com/loopmart/"><img height="30px" width="30px" src="{{ asset('/kaz/images/facebook.png') }}" alt=""></a>
                <img height="30px" width="30px" src="{{ asset('/kaz/images/twitter.png') }}" alt="">
                <a href="https://wa.link/ymloc0"><img height="25px" width="25px" src="{{ asset('kaz/images/whatsapp.png') }}" alt=""></a>
                <a href="mailto:info@gmail.com.ng"><img height="30px" width="30px" src="{{ asset('/kaz/images/message.png') }}" alt=""></a> 
              </div>
              <div class="row mt-5">
                <div class="col">
                  <p style="color: green; text-align: center;" id="display"></p>

                </div>

              </div>


            </div>

          </div>
          <div class="col">


          </div>
        </div>

      </div>


    </div>
    <!-- mobile-view  -->
    <div class="mobile-view">
      <div class="container-fluid">
        <!-- <div  class="row ">
          <div style="display: flex; align-items: center; justify-content: space-between;">
            <div class="mobile-link-btn">
              <a href="privacy.html">Privacy Policy</a>
            </div>
            <div class="mobile-link-btn">
              <a href="refer.html">Refer a Friend</a>
            </div>
            <div class="mobile-link-btn">
              <a href="sign.html">Sign out</a>
            </div>

            <div class="mobile-link-btn">
              <a href="delete.html"> Delete Account</a>
            </div>
            <div class="mobile-link-btn">
              <a href="wallet.html"> Wallet</a>
            </div>
         </div>
        </div> -->
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="container-fluid mt-3">
                <h4 class="use">Use the link below to refer a friend</h4>
                <p style="font-size: small;"> LoopMart marketplace is a user-friendly platform
                  that makes buying and selling goods and serviceseasy.
                  Your friend should able to navigate the website and start using it with ease.</p>
                <hr class="sign2">
              </div>
              <div class="container">
                <div class="">
                  <form action="">
                    <input class="link-mobile" type="text" name="" id="linkInput-mobile"
                      placeholder="www.buyandsell.com/join/bas-mrk-pla">
                    <div class="mobile-btn">
                      <button style="width: 40%;" value="submit" type="button" class="btn btn-warning btn-md  "
                        id="linkButton-mobile">Copy</button>
                    </div>

                  </form>
                </div>
                <div class="row mt-5">
                  <div class="col">
                    <p style="color: green; text-align: center;" id="display-mobile"></p>
                  </div>
                </div>
                <div class="container footer-icon">
                  <img height="30px" width="30px" src="{{ asset('/kaz/images/facebook.png') }}" alt="">
                  <img height="30px" width="30px" src="{{ asset('/kaz/images/twitter.png') }}" alt="">
                  <img height="30px" width="25px" src="{{ asset('/kaz/images/linkedin.png') }}" alt="">
                  <img height="30px" width="30px" src="{{ asset('/kaz/images/message.png') }}" alt="">
                </div>

              </div>

            </div>



          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="{{ asset('/kaz/js/refer.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <script type="module" src="{{ asset('backend-js/user/refer.js') }}"></script>




@endsection

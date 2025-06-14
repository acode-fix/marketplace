@extends('layouts.main.app')
@section('title','Learn')
@section('navtitle', 'Learn')
<link rel="stylesheet" href="{{ asset('kaz/css/learn.css') }}">

@section('content')
  <div class="main">
    <div class="content">
      <div class="container mt-2">
        
        {{-- <div class="outer-div" id="web-learn-container">
          Example static card, remove if unnecessary -->
           <div class="card card-main">
            <iframe class="video-size" src="https://www.youtube.com/embed/FG0-p9tX0-k?si=ZANJ5IQnUEn1FIl_"
              title="YouTube video player" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <div class="card-body card-txt">
              <p class="card-text new-tex">How to Create Ads on loopMart</p>
              <p class="fw-light footer-txt">loopMart <br>
                9.1k views 7days ago
              </p>
            </div>
          </div> 
        </div> --}}

        <div class="outer-div js-content">
          
        
        </div>

      </div>

      
       <div class="footer-height">
        <div class="footer footer-desktop">
          <div class="row buy border-top footer mt-5 ">
            <div class="col mt-3 ">
              <div style="text-align: center; ">
                <a href="{{ url('/') }}"> <img class="main-logo" src="{{ asset('kaz/images/transparent_logo.png') }}" class="img-fluid" alt=""></a>
               
              </div>
            </div>
          </div>
        </div>
        <div style="text-align: center; word-wrap: none;" class="row pt-4 footer footer-desktop">
          <div class="col">
            <a href="{{ url('about') }}"><p class="fw-light">About <br> us</p></a>
          </div>
          <div class="col">
            <a href=""><p class="fw-light"> Terms and <br> Conditions</p></a>
          </div>
          <div class="col">
            <a href=""><p class="fw-light js-learn-help">Help <br>desk</p></a>
          </div>
          <div class="col">
            <a href="{{ url('/privacy') }}"><p class="fw-light">Privacy & <br>Policy</p></a>
          </div>
          {{-- <div class="col ">
            <p class="fw-light">Report <br> a seller</p>
          </div> --}}
        </div>
       
        <div class="row footer footer-desktop">
          <div style="text-align: center;" class="col">
            <a href="https://web.facebook.com/loopmart/"> <img height="35px" width="35px" src="{{ asset('/kaz/images/facebook.png') }}" alt=""></a>
            <img height="30px" width="30px" src="{{ asset('/kaz/images/twitter.png') }}" alt="">
            <a href="https://wa.link/ymloc0"><img height="29px" width="29px" src="{{ asset('/kaz/images/whatsapp.png') }}" alt=""></a>
            <a href="mailto:info@gmail.com.ng"> <img height="30px" width="30px" src="{{ asset('/kaz/images/message.png') }}" alt=""></a>
          </div>
        </div>
      </div> 
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
            
            <div class="mobile-link-btn1">
              <a href="{{ url('/learn') }}">Learn</a>
            </div>
            <div class="mobile-link-btn">
              <a href="{{ url('/ads') }}"> Ads</a>
            </div>
            <div class="mobile-link-btn">
              <a href="{{ url('/wallet') }}"> Wallet</a>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="mobile-outer-div js-mobile-content">
            <!-- Example static card, remove if unnecessary -->
            {{-- <div class="card card-main">
              <iframe class="mobile-video-size" src="https://www.youtube.com/embed/FG0-p9tX0-k?si=ZANJ5IQnUEn1FIl_"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              <div class="card-body card-txt">
                <p class="card-text new-tex">How to Create Ads on loopMart</p>
                <p class="fw-light footer-txt">loopMart <br>
                  9.1k views 7days ago
                </p>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
    </div>



    
  </div>

  {{-- Axios and Moment.js Scripts --}}
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
  <script type="module" src="{{ asset('backend-js/learn.js') }}?time={{ time() }}"></script>
  

 
@endsection

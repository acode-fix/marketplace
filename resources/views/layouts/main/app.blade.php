<!DOCTYPE html>
<html class="no-js" lang="en">


@include('layouts.main.head-section')



<body>
     {{-- <div class="preloader">
          <img src="{{ asset('innocent/assets/image/brand-icon.png') }}" alt="Loading icon" class="bag-icon" />
          <div class="dots">
              <div class="dot"></div>
              <div class="dot"></div>
              <div class="dot"></div>
          </div>
      </div> --}}
      <!-- HTML structure -->
<div class="preloader">
     <div class="preloader-content">
       <img  src="{{ asset('innocent/assets/image/brand-icon.png') }}" class="bag-icon" alt="Bag Icon">
       <div class="dots">
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="dot"></div>
       </div>
     </div>
</div>
   

@include('layouts.main.navbar')



@include('layouts.main.sidebar-section')


     @yield('content')
{{-- @include('layouts.main.profile-js') --}}

<script type="module" src="{{ asset('backend-js/user/profile-update.js') }}?time={{ time() }}"></script>
</body>

</html>

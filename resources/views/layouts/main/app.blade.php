<!DOCTYPE html>
<html class="no-js" lang="en">


@include('layouts.main.head-section')



<body>
    
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

<script type="module" src="{{ asset('backend-js/user/profile-update.js') }}"></script>
<script type="module" src="{{ asset('backend-js/user/user-setting-status.js') }}"></script>
</body>

</html>

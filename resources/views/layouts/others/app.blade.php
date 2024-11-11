<!DOCTYPE html>
<html class="no-js" lang="en">


@include('layouts.others.head')



<body>
     <div class="preloader">
          <img src="{{ asset('innocent/assets/image/Shopping bag.png') }}" alt="Loading icon" class="bag-icon" />
          <div class="dots">
              <div class="dot"></div>
              <div class="dot"></div>
              <div class="dot"></div>
          </div>
      </div>


@include('layouts.others.navbar')



@include('layouts.main.sidebar-section')


     @yield('content')

     {{-- @include('layouts.others.profile-js') --}}

<script type="module" src="{{ asset('backend-js/user/profile-update.js') }}"></script>
</body>

</html>

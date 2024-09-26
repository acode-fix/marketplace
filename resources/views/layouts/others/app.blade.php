<!DOCTYPE html>
<html class="no-js" lang="en">


@include('layouts.others.head')



<body>

@include('layouts.others.navbar')



@include('layouts.main.sidebar-section')


     @yield('content')

     {{-- @include('layouts.others.profile-js') --}}


</body>

</html>

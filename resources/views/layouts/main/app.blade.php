<!DOCTYPE html>
<html class="no-js" lang="en">


@include('layouts.main.head-section')



<body>

@include('layouts.main.navbar')



@include('layouts.main.sidebar-section')


     @yield('content')
{{-- @include('layouts.main.profile-js') --}}

</body>

</html>

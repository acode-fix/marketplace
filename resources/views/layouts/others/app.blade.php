<!DOCTYPE html>
<html class="no-js" lang="en">


@include('layouts.others.head')



<body>

@include('layouts.others.navbar')



@include('layouts.others.sidenav')


     @yield('content')

     @include('layouts.others.profile-js')


</body>

</html>

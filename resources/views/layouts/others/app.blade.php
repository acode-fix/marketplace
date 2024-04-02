<!DOCTYPE html>
<html class="no-js" lang="en">

@include('layouts.others.head')


<body class="container-fluid px-0 body_background template-collection">
    
@include('layouts.others.navbar')
@include('layouts.others.asidenav')


     @yield('content')
    
      @include('layouts.others.footer')
</body>

</html>
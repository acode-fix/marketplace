<!DOCTYPE html>
<html lang="en">
@include('includes.head')
<body>
@include('includes.header')
<div class="main">
    @include('includes.sidebar')
    <div class="content">
        {{ $slot }}

    </div>



</div>
@include('includes.footer')
<div class="mobile-view">
@include('includes.mobile_nav')
<div class="mobile_content">
        {{$mobile_banner}}
<div class="container-fluid">
    {{ $mobile_content }}
</div>


</div>
</div>
</body>
</html>

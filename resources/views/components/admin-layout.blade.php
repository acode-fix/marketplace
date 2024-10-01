<!DOCTYPE html>
<html lang="en">
@include('admin_includes.head')
<body>
    @include('admin_includes.navbar')

    <div class="main">
        @include('admin_includes.sidebar')

        <div class="content">
            {{$slot}}
        </div>

    </div>

    @include('admin_includes.footer')
   
    
 <script type="module" src="{{ asset('backend-js/admin/dashboard.js') }}"></script> 
</body>
</html>
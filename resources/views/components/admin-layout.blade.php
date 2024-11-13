<!DOCTYPE html>
<html lang="en">
@include('admin_includes.head')
<body>
    @include('admin_includes.navbar')

    <div class="main">
        @include('admin_includes.sidebar')
         <div class="container-fluid">
            <div style="margin-bottom: 150px" class="content">
                {{$slot}}
            </div>

         </div>
        

    </div>

    @include('admin_includes.footer')

    
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>
   
    
 <script type="module" src="{{ asset('backend-js/admin/dashboard.js') }}"></script>
 <script type="module" src="{{ asset('backend-js/admin/auth-helper.js') }}"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    @include('_includes.head')
</head>
<body data-topbar="dark">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <i class="ri-loader-line spin-icon"></i>
            </div>
        </div>
    </div>

    <div id="layout-wrapper">

        @include('_includes.header')

        @include('_includes.sidebar')

         <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">

                    
                    <div class="container-fluid">
                        
                    

                        {{ $slot }}
                       
                    </div>
                    
                </div>
                <!-- End Page-content -->
               
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Loopmart.ng
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by SadDev
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                
            </div>
            <!-- end main content-->

          

    </div>

    @include('_includes.footer')


    <script type="module" src="{{ asset('backend-js/admin/dashboard.js')}}?{{ time() }}"></script>
    <script type="module" src="{{ asset('backend-js/admin/auth-helper.js')}}?{{ time()  }}"></script>

    <script type="module" src="{{ asset('backend-js/admin/user/check.js') }}"></script>

    
    
</body>
</html>
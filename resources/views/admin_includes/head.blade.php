<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <title>{{$title}}</title>
  <link rel="stylesheet" href="{{asset('kaz/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('kaz/css/admin-nav.css')}}">
  <link rel="stylesheet" href="{{asset('kaz/css/admin-learn.css')}}">
  <link rel="stylesheet" href="{{asset('kaz/css/admin-sidebar.css')}}">
  <link rel="stylesheet" href="{{asset('kaz/css1/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('kaz/css1/fontawesome.min.css')}}">

  {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> --}}
  

  
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.min.css">


  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  
 
  
  
  {{-- <script src="{{asset('kaz/js/bootstrap.js')}}"></script> --}}
  <script src="{{asset('kaz/js/shop.js')}}?{{ time() }}"></script> 
  <script  src="{{asset('kaz/js/dashboard.js')}}?{{ time() }}"></script> 

  
  <style>

.loader-text {
    border: 6px solid #f3f3f3; 
    border-top: 6px solid #ffb705; 
    border-radius: 50%;
    width: 20px;
    height: 20px;
    animation: spin 2s linear infinite;

  }
  
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  .update-layout {
    justify-content:center;
    align-items:center;
    display: none; 
  }

    
  </style>

  

</head>
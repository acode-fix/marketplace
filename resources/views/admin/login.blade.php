<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <style>
    a {
    text-decoration-line: none;
    color: #1a2b88; 
    display: inline;     
  } 
   a:hover {
    color: blue
  }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="mx-auto col-md-8 col-lg-9 mt-5">
        <div class="card mt-2 shadow-lg">
            <div class="card-header bg-secondary text-white">Admin :: Login</div>
            <div class="card-body">
                    <div class="form-group mt-2">
                        <label for="email">Email address</label>
                        <input required name='email' type="email" id="email" class="form-control mt-2" value="">
                    </div>
                    <div class="form-group mt-2">
                      <label for="password">Password</label>
                      <input required type="password" required id="password" name='password' class="form-control mt-2" value="">
                  </div>
                  <div style="display: flex; align-items:center">
                    <button type="submit" class="btn btn-warning mt-3 js-login">Login</button>
                    <div class="mt-3 ms-2">
                      <a href="{{ route('reset') }}">Forgot Password?</a>
                    </div>                    
                  </div>    
                
            </div>
        </div>
    </div>

      </div>
    </div>

  </div>
 

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script type="module" src="{{ asset('backend-js/admin/admin_auth.js') }}"></script>
  
</body>
</html>
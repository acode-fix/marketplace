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
    .loadbtn { 
  padding: 10px 20px; 

  background: linear-gradient(90deg, #dafc79, #96e6a1);
  color: #343434; 
  border: none; 
  cursor: pointer; 
  border-radius: 5px; 
  transition: background-color 0.3s; 
  display: flex; 
  align-items: center; 
  justify-content: space-between; 
} 

/* .btn:hover { 
  background-color: #14ae5c; 
}  */

    
.loader { 
  display: none; 
  border: 4px solid rgba(255, 255, 255, 0.3); 
  border-top: 4px solid #14ae5c; 
  border-radius: 50%; 
  width: 25px; 
  height: 25px; 
  animation: spin 1s linear infinite; 
  margin-left: 10px; 
} 

@keyframes spin { 
  0% { 
      transform: rotate(0deg); 
  } 

  100% { 
      transform: rotate(360deg); 
  } 
} 

.loading { 
  background-color: #ccc; 
  pointer-events: none; 
}

  </style>
  
  
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Change :: Password</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="form-group mt-2">
                <label for="new_password">New Pasword</label>
                <input required id='new' type="text" class="form-control mt-2" value="">
              </div>
              <div class="form-group mt-2">
                <label for="old_password">confirm Pasword</label>
                <input required id='confirm' type="text" class="form-control mt-2" value="">
              </div>
            
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary js-update">Update</button>
            </div>
          </div>
        </div>
      </div>
      

      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Verfiy OTP</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group mt-2">
          <label for="email">OTP</label>
          <input required id='otp' type="text" class="form-control mt-2" value="">
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary js-verify">Verify</button>
      </div>
    </div>
  </div>
</div>

      <div class="mx-auto col-md-8 col-lg-9 mt-5">
        <div class="card mt-2 shadow-lg">
            <div class="card-header bg-secondary text-white">Reset :: Password</div>
            <div class="card-body">
                    <div class="form-group mt-2">
                        <label for="email">Email address</label>
                        <input required id='reset_email' type="email" class="form-control mt-2" value="">
                    </div> 
                    {{-- <button type="submit" class="btn btn-warning mt-3 js-reset">Request Reset Password Link</button> --}}
                    <button type="submit" id="loadButton" class="loadbtn mt-3 js-reset"> 
                      Request Reset Password Link
                      <div class="loader" id="loader"> 
    
                      </div> 
                  </button>     
            </div>
        </div>
    </div>

      </div>
    </div>

  </div>
 
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script type="module" src="{{ asset('backend-js/admin_auth.js')}}"></script>
  <script>
    const loadButton =  
    document.getElementById('loadButton'); 
const loader =  
    document.getElementById('loader'); 

  
loadButton.addEventListener('click', () => { 
  
    // Disable the button 
    // and prevent further clicks 
    loadButton.disabled = true; 
    loader.style.display = 'inline-block'; 
  
    setTimeout(() => { 
      
        // Restore the button state  
        //after the operation is done 
        loadButton.disabled = false; 
        loader.style.display = 'none'; 
       // demoForm.reset(); 
    }, 6000); 
});
  </script>
  
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('kaz/css/bootstrap.css')}}">
  <title>Document</title>
</head>
<body>


  <div class="container">
    <div class="card mt-2">
        <div class="card-header bg-danger text-white">Failed :: Approval</div>
        <div class="card-body">

          <p>Hi {{ $name ? $name : 'No Name Provided' }}</p>
          <p>You applied for verification on Buy and Sell with  the following details </p>
          <p>Email Address: {{ $email }}</p>
          <p>Phone Number: {{ $phone_number }}</p>
          <p>We regret to inform you that verification was not approved due to {{ $text }} data submitted</p>

        
        </div>
    </div>
  </div>
  
</body>
</html>
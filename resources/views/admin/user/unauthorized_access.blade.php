<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>403 - Unauthorized Access</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #f3f4f6, #dbeafe);
      color: #1f2937;
      text-align: center;
    }

    .container {
      max-width: 600px;
      padding: 20px;
      background: white;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    h1 {
      font-size: 2.5rem;
      margin-bottom: 10px;
      color: #ef4444;
    }

    p {
      font-size: 1.1rem;
      margin-bottom: 20px;
      color: #374151;
    }

    a {
      display: inline-block;
      padding: 10px 20px;
      background: #3b82f6;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
      transition: background 0.3s ease;
    }

    a:hover {
      background: #2563eb;
    }

    .icon {
      font-size: 5rem;
      color: #f87171;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="icon">🚫</div>
    <h1>403 - Access Denied</h1>
    <p>Oops! You do not have permission to access this page.</p>
    <a href="/">Go to Homepage</a>
  </div>
</body>
</html>

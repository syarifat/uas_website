<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #5B56CC, #B751C2);
      margin: 0;
      font-family: Arial, sans-serif;
    }
    
    .container {
      max-width: 1000px;
    }
    
    .login-card {
      background: #ffffff;
      display: flex;
      flex-direction: row;
      align-items: center;
    }
    
    .login-image {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    
    .login-image img {
      width: 150px;
    }
    
    .login-form {
      width: 300px;
    }
    
    .input-group-text {
      border-radius: 30px 0 0 30px;
    }
    
    .input-group .form-control {
      border-radius: 0 30px 30px 0;
    }
    
    .btn-success {
      background-color: #28a745;
      border: none;
      border-radius: 30px;
      font-weight: bold;
    }
    
    .btn-success:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="login-card p-5 rounded-4 shadow-lg d-flex">
      <div class="login-image">
        <img src="https://img.icons8.com/clouds/200/000000/laptop.png" alt="Laptop Icon">
      </div>
      <div class="login-form ms-5">
        <h3 class="mb-4 text-dark fw-bold">Login Page</h3>
        
        <div class="mb-3">
          <div class="input-group">
            <input type="email" name="email" class="form-control" placeholder="Email Address">
          </div>
        </div>
        <div class="mb-3">
          <div class="input-group">
            <input type="password" name="password" class="form-control" placeholder="Password">
          </div>
        </div>
        <form action="{{url('dashboard')}}">
          <button type="submit" class="btn btn-success w-100">LOGIN</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
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
    
    .register-card {
      background: #ffffff;
      display: flex;
      flex-direction: row;
      align-items: center;
    }
    
    .register-image {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    
    .register-image img {
      width: 150px;
    }
    
    .register-form {
      width: 300px;
    }
    
    .input-group-text {
      border-radius: 30px 0 0 30px;
    }
    
    .input-group .form-control {
      border-radius: 0 30px 30px 0;
    }
    
    .btn-primary {
      background-color: #007bff;
      border: none;
      border-radius: 30px;
      font-weight: bold;
    }
    
    .btn-primary:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="register-card p-5 rounded-4 shadow-lg d-flex">
      <div class="register-image">
        <img src="https://img.icons8.com/clouds/200/000000/add-user-male.png" alt="User Icon">
      </div>
      <div class="register-form ms-5">
        <h3 class="mb-4 text-dark fw-bold">Registration Page</h3>
        
        <form action="{{url('dashboard')}}" method="POST">
          <div class="mb-3">
            <div class="input-group">
              <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
          </div>
          <div class="mb-3">
            <div class="input-group">
              <input type="email" name="email" class="form-control" placeholder="Email Address" required>
            </div>
          </div>
          <div class="mb-3">
            <div class="input-group">
              <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
          </div>
          <div class="mb-3">
            <div class="input-group">
              <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100">REGISTER</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css"></script>
</body>
</html>

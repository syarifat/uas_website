<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - KasirKu</title>
    <!-- Import Font Nunito -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(to right, #5B56CC, #B751C2);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-card img {
            width: 350px;
            margin: -50px auto 20px; /* Memusatkan gambar secara horizontal dan memberi margin bawah */
            display: block;
        }
        .description {
            text-align: center;
            font-size: 16px;
            color: #fff;
            margin-top: 2px;
            font-weight: normal;
        }
        .login-title {
            font-size: 46px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 6px;
            text-align: center;
        }
        .center-text {
            font-size: 46px;
            font-weight: bold;
            color: #fff;
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-login {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            font-size: 30px;
            border-radius: 50px;
            padding: 10px 20px;
            width: 250px;
            height: 60px;
            display: block;
            margin: 0 auto;
        }
        .btn-login:hover {
            background-color: #218838;
        }
        .brand-title {
            position: absolute;
            top: 20px;
            left: 30px;
            font-size: 36px;
            font-weight: bold;
            color: #fff;
            font-style: italic;
        }
        .login-btn-top-right {
            background-color: #3B87F0;
            position: absolute;
            top: 20px;
            right: 30px;
            font-weight: bold;
            font-size: 24px;
            border-radius: 50px;
            padding: 10px 20px;
            color: white; 
            border: none; 
            width: 150px;
            height: 60px;
        }
        .login-btn-top-right:hover {
            background-color: #2561b0;
        }
    </style>
</head>
<body>

<!-- Teks KasirKu di pojok kiri atas -->
<div class="brand-title">KasirKu</div>

<!-- Tombol Login di pojok kanan atas -->
    <form action="">
        @csrf
        <button type="submit" class="login-btn-top-right">Login</button>
    </form>
</div>

<div class="login-card">
    <img src="{{ asset('images/rb_1200.png') }}" alt="KasirKu Logo">
    <p class="description" style="font-weight: normal;">KELOLA PENJUALAN DAN TRANSAKSI DENGAN MUDAH</p>
    <h2 class="login-title">Selamat Datang di KasirKu,</h2>
    <p class="center-text">Asisten Keuangan Pribadi Anda</p>
    <form action="{{ url('dashboard') }}">
        @csrf
        <button type="submit" class="btn btn-login w-90">Dashboard</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

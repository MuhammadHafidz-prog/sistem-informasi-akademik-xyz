<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sistem Informasi Akademik XYZ</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        body{
            background: linear-gradient(135deg,#0d6efd,#4ea3ff);
        }

        .login-card{
            border:none;
            border-radius:20px;
        }

        .logo{
            width:90px;
            height:90px;
            background:#e9f2ff;
            color:#0d6efd;
            border-radius:50%;
            display:flex;
            justify-content:center;
            align-items:center;
            font-size:40px;
            margin:auto;
            margin-top:30px;
        }

        .form-control{
            height:48px;
            border-radius:10px;
        }

        .btn-login{
            height:48px;
            border-radius:10px;
            font-weight:bold;
        }

        h2{
            font-weight:bold;
        }

        .subtitle{
            color:gray;
            font-size:15px;
        }

    </style>

</head>

<body>

<div class="container">

<div class="row justify-content-center align-items-center vh-100">

<div class="col-md-5">

<div class="card login-card shadow-lg">

<div class="logo">

<i class="fa-solid fa-user-graduate"></i>

</div>

<div class="card-body p-5">

<h2 class="text-center text-primary">
Sistem Informasi Akademik XYZ
</h2>

<p class="text-center subtitle mb-4">
Silakan login untuk masuk ke sistem
</p>

<form action="proses_login.php" method="POST">

<div class="mb-3">

<label class="fw-semibold">
Username
</label>

<input
type="text"
name="username"
class="form-control"
placeholder="Masukkan Username"
required>

</div>

<div class="mb-4">

<label class="fw-semibold">
Password
</label>

<input
type="password"
name="password"
class="form-control"
placeholder="Masukkan Password"
required>

</div>

<button
class="btn btn-primary btn-login w-100">

<i class="fa-solid fa-right-to-bracket"></i>

Login

</button>

</form>

<hr>

<p class="text-center text-muted mb-0">

© 2026 Sistem Informasi Akademik XYZ

</p>

</div>

</div>

</div>

</div>

</div>

</body>
</html>
<?php 
session_start();
    require '../config/connector.php';
?>
<?php
if(isset($_POST["daftar"])){
    // print_r($_POST);
    $email = $_POST["email"];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $password = $_POST['password'];
    $konfirmasi_psw = $_POST['konfirmasi_password'];

    if($password == $konfirmasi_psw)
    {
        $sql = "INSERT INTO users (email,nama,no_hp,password) VALUES ('$email','$nama','$no_hp','$password')";
        if (mysqli_query($conn, $sql)) {
            header("Location: login.php");
        } else {
            echo $connectDB->error;
        }
    } else {
        echo "Password tidak sama!";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Register</title>
</head>
<style>
    html, body {
        max-width: 100%;
        overflow-x: hidden;
    }
</style>
<body>
<div class="row">
    <div class="col-6">
        <div class="bg-image" 
        style="background-image: url('../asset/images/bg-login3.jpg');
        height: 100vh;
        background-position: center;
        background-repeat: no-repeat">
        </div>
    </div>
    <div class="col-6 m-auto">
        <div class="container">
            <form action="" method="POST">
                <div class="mb-3 row">
                    <div class="col-10 m-auto">
                    <h2 class="mb-4">Register</h2>
                        <label for="email">Email<span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" id="Email" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-10 m-auto">
                        <label for="nama">Nama</label>
                        <input type="nama" class="form-control" name="nama" id="nama">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-10 m-auto">
                        <label for="no_hp">Nomor Handphone<span class="text-danger">*</span></label>
                        <input type="no_hp" class="form-control" name="no_hp" id="no_hp" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-10 m-auto">
                        <label for="password">Kata Sandi<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-10 m-auto">
                        <label for="password">Konfirmasi Kata Sandi<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="konfirmasi_password" id="password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 m-auto">
                        <button type="submit" name="daftar" class="btn btn-primary" style="width:100px">Daftar</button>
                        <p class="mt-2">
                            Anda Sudah Punya Akun? <a href="Login.php">Login</a>
                        </p>
                    </div>                    
                </div>                
            </form>
        </div>
    </div>
</div>
<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
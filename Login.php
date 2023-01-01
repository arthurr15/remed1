<?php 
session_start();
    require '../config/connector.php';
?>
<?php
    //cek cookie
    if( isset($_COOKIE['id']) && isset($_COOKIE['key'])){
        $id = $_COOKIE['id']; 
        $key = $_COOKIE['key'];
    
        ///ambil email
        $result = mysqli_query($koneksi, "SELECT email FROM users WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
    
        //cek email
        if($key == $row['email']){
            $_SESSION['login'] = true;
        }
    }

    // if($_SESSION["login"] == true)
    // {
    //     header('Location: ../');
    //     exit;
    // }

    if(isset($_POST["login"]))
    {
        // print_r($_POST);
        $email = $_POST["email"];
        $pass = $_POST["password"];

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) === 1)
        {
            $row = mysqli_fetch_assoc($result);

            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["nama"] = $row["nama"];
            if(isset($_POST["remember"]))
            {
                // Buat cookie
                setcookie('id', $row['id'], time()+60);
                setcookie('key', $row["email"], time()+60);
            }
            header('Location: Home-Arthur.php');         
        }
        else{
            echo('ada kesalahan');
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Login</title>
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
        style="background-image: url('../asset/images/bg-login4.jpg');
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
                    <h2 class="mb-4">Login</h2>
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="Email" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-10 m-auto">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                </div>
                <div class="mb-3 row form-check">
                    <div class="col-10 m-auto">
                        <input type="checkbox" class="form-check-input" name="remember" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10 m-auto">
                        <button type="submit" name="login" class="btn btn-primary" style="width:100px">Login</button>
                        <p class="mt-2">
                            Anda Belum Punya Akun? <a href="Register.php">Daftar</a>
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
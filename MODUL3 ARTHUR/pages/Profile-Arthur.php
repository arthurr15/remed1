<?php
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
}
require '../config/koneksi.php';

$query = "SELECT * FROM showroom_caeArthur";
$hasil = mysqli_query($connectDB, $query);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile - Arthur_NIM</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <style>
    <?php include '../asset/style/style.css'; ?>
  </style>
</head>
<?php
function showSuccess($success)
{   
    ?>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <span class="text-warning"><i class="bi bi-square-fill"></i></span>
            <strong class="me-auto">&nbsp;Alert</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?php echo $success ?>
        </div>
    </div>
    
<?php
}
?>
<?php
    if(isset($_POST["btnUpdate"])){
        $id = $_SESSION["id"];
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $konfirmasi = $_POST["konfirmasi"];
        $nohp = $_POST["no_hp"];
        $sql2 = "UPDATE users SET nama='$nama', email='$email', password='$password', no_hp='$nohp' WHERE id='$id'";
        if (mysqli_query($connectDB, $sql2)) {
            header("Location: Profile-Arthur.php?success=ubah");
        } else {
            echo "Error";
        }
}
        
?>
<body>
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                  <a class="nav-link text-white" aria-current="page" href="../">Home</a>
              </li>
              <li class="nav-item">
                <?php 
                  if(!isset($_SESSION["login"]))
                  {
                    
                  } else {
                      ?>
                      <a class="nav-link text-white" href="<?php if (mysqli_num_rows($hasil) > 0) {
                                            echo "./ListCar-Arthur.php";
                                          } else {
                                            echo "./Add-Arthur.php";
                                          } ?>">MyCar
                      </a>
                      <?php
                  }
                ?>
              </li>
              
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <?php 
            if(!isset($_SESSION["login"]))
            {
                ?>
                <li>
                  <a href="Login.php" class="nav-link text-white">Login</a>
                </li>
                <?php
            } else {
              ?>
                <li>
                  <button class="btn btn-default btn-sm navbar-btn" style="margin-right:15px;background:white"><a href="Add-Arthur.php" class="text-primary text-decoration-none">Add Car</a></button>
                </li>
                <li class="nav-item dropdown">
                  <a class="btn btn-default btn-sm text-primary dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background:white">
                    <?php echo $_SESSION["nama"] ?>
                  </a>
                  <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item" href="Profile-Arthur.php">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../config/do-logout.php">Logout</a></li>
                  </ul>
                </li>
              <?php
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>

    <?php    
        $id = $_SESSION["id"];
        $sql = "SELECT * FROM users WHERE id='$id'";
        $hasil = mysqli_query($connectDB, $sql);
        if(mysqli_num_rows($hasil) === 1){
            $getProfile = mysqli_fetch_assoc($hasil);
        }
    ?>

    <div class="w-75 m-auto">
        <div class="row">
            <div class="col-4">
                <?php 
                    if(isset($_GET["success"])) {
                        $success = $_GET["success"];
                        if($success == "ubah") {
                            ?>
                            <p><?php echo showSuccess("Data berhasil diupdate"); ?></p>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
        <form action="" method="post">
            <h1 class="h3 fw-bold text-center my-5">Profile</h1>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Email<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="<?php echo $getProfile["email"] ?>" name="email">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nama<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?php echo $getProfile["nama"] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Nomor Handphone<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Nomor Handphone" name="no_hp" value="<?php echo $getProfile["no_hp"] ?>">
                </div>
            </div>
            <hr>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Kata Sandi<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Kata Sandi" name="password" value="<?php echo $getProfile["password"] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Konfirmasi Kata Sandi<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" name="konfirmasi" value="<?php echo $getProfile["password"] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Warna Navbar<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="Biru" name="navbar">
                </div>
            </div>
            <div class="m-auto my-5 text-center">
                <button class="w-25 btn btn-lg btn-primary" type="submit" name="btnUpdate">Update</button>
            </div>
        </form>
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start mb-5" style="margin-top:100px">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><img src="<?php echo "../asset/images/logo-ead.png" ?>" alt="logoead" style="width:150px;"></li>
                <li><p class="text-muted mx-5">Arthur_NIM</p></li>
            </ul>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
        $('.toast').toast('show');
    })
</script>
</body>
</html>
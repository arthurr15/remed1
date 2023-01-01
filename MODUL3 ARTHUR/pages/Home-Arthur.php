<?php
require "../config/connector.php";
session_start();
$query = "SELECT * FROM showroom_arthur_table";
$hasil = mysqli_query($conn, $query);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home - Arthur_NIM</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
    <?php include './asset/style/style.css'; ?>
  </style>
</head>
<body>
  <!-- Nav -->
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
                                            echo "../pages/ListCar-Arthur.php";
                                          } else {
                                            echo "../pages/Add-Arthur.php";
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
                  <a href="./pages/Login.php" class="nav-link text-white">Login</a>
                </li>
                <?php
            } else {
              ?>
                <li>
                  <button class="btn btn-default btn-sm navbar-btn" style="margin-right:15px;background:white"><a href="./pages/Add-Arthur.php" class="text-primary text-decoration-none">Add Car</a></button>
                </li>
                
                <li>
                  <button class="btn btn-default btn-sm navbar-btn" style="margin-right:15px;background:white"><a href="./config/Logout.php" class="text-primary text-decoration-none">Logout</a></button>
                </li>

                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown button
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="Profile-Arthur.php">Profile</a></li>
                    <li><a class="dropdown-item" href="../config/Logout.php">Logout</a></li>
                  </ul>
                </div>

              <?php
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Nav End -->

  <!-- Jumbotron -->
  <section id="home">
    <div class="container">
      <div class="d-flex justify-content-center align-items-center mt-5">
        <div>
          <h1>Selamat Datang Di<br /> Show Room Arthur</h1>
          <p class="mt-3 text-muted">Showroom Arthur<br />Adalah Showroom Mobil Terpecaya </p>
          <?php 
            if(!isset($_SESSION["login"]))
            {
              
            } else {
              ?>
               <a class="btn btn-primary w-25" href="<?php if (mysqli_num_rows($hasil) > 0) {
                    echo "./pages/List-Arthur.php";
                  } else {
                    echo "./pages/ListCar-Arthur.php";
                  } ?>">MyCar
              </a>
              <?php
            }
          ?>
          <div class="d-flex align-items-center gap-5 mt-5">
            <img src="<?php echo "../asset/images/logo-ead.png" ?>" alt="logoead" style="width:100px;">
            <p style="margin-top: 20px; font-size:14px;">Arthur_NIM</p>
          </div>
        </div>
        <img src="<?php echo "../asset/images/hero.png" ?>" alt="mobil" style="width:500px;>
      </div>
    </div>
  </section>
  <!-- Jumbotron End -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
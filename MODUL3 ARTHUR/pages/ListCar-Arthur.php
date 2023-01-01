<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>List Car</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <?php
  require '../config/connector.php';

  $query = "SELECT * FROM showroom_arthur_table";
  $result = mysqli_query($conn, $query);

  if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == 'succes') {
      echo "<script>alert('Data berhasil ditambahkan')</script>";
    } else if ($_GET['pesan'] == 'update') {
      echo "<script>alert('Data berhasil diupdate')</script>";
    } else if ($_GET['pesan'] == 'delete') {
      echo "<script>alert('Data berhasil dihapus')</script>";
    } else if ($_GET['pesan'] == 'failed') {
      echo "<script>alert('Gagal')</script>";
    }
  }
  ?>

  <nav class="navbar navbar-expand-lg bg-primary">
    <div class="container">
      <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
        <div class="navbar-nav gap-3">
          <a class="nav-link" style="color: #e0e0e0; font-weight: 600;" href="../index.php">Home</a>
          <a class="nav-link" style="color: white;" href="#">MyCar</a>
        </div>
        <a href="Add-Arthur.php" style="background-color: white; color:blue; border-radius: 5px; text-decoration: none; width: 110px; height: 35px; display:flex; justify-content:center; align-items:center; font-weight:500;">Add Car</a>
      </div>
    </div>
  </nav>
  <section id="list" style="padding-top: 50px; padding-bottom: 50px;">
    <div class="container">
      <div>
        <h1 style="font-family: 'Raleway'; font-style: normal; font-weight: 900; font-size: 32px; line-height: 38px;">My Show Room</h1>
        <p style="font-family: 'Raleway'; font-style: normal; font-weight: 400; font-size: 16px; line-height: 19px; color: #757575; margin-top: 20px;">List Show Room Arthur_1202204220</p>
        <div class="d-flex gap-5">
          <?php
          if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_assoc($result)) {
              echo "<div class='card cardcontent' style='background: #ffffff; box-shadow: 6px 14px 40px rgba(210, 210, 210, 0.6); border-radius: 16px; width: 400px; margin-top: 50px;'>
                      <img src='../asset/images/" . $data["foto_mobil"] . "' class='card-img-top' alt='fotomobil' style='padding: 16px;'>
                      <div class='card-body'>
                        <h5 class='card-title'>" . $data["nama_mobil"] . "</h5>
                        <p class='card-text'>" . substr($data["deskripsi"], 0, 60) . '...' . "</p>
                        <span class='d-flex'>
                          <a href='Detail-Arthur.php?id=" . $data["id_mobil"] . "' class='btn btn-primary' style='border-radius: 100px; width:140px; height: 36px;'>Detail</a>
                          <a href='../config/delete.php?id=" . $data["id_mobil"] . "' class='btn btn-danger' style='border-radius: 100px; width:140px; height: 36px; margin-left:20px;'>Delete</a>
                        </span>
                      </div>
                    </div>";
            }
          } else {
            echo "Tidak ada data";
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  <footer style="padding-bottom: 50px;">
    <div class="container">
      <p style="font-family: 'Raleway'; font-style: normal; font-weight: 700; font-size: 16px; line-height: 19px; color: #757575;">Jumlah Mobil : <?php echo mysqli_num_rows($result) ?></p>
    </div>
  </footer>
  <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
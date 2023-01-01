<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Car</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-primary">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav gap-3">
          <a class="nav-link" style="color: #e0e0e0; font-weight: 600;" href="../index.php">Home</a>
          <a class="nav-link" style="color: white;" href="#">MyCar</a>
        </div>
      </div>
    </div>
  </nav>
  <section id='form' style="padding-top: 50px; padding-bottom: 50px;">
    <div class="container">
      <h1 style="font-family: 'Raleway'; font-style: normal; font-weight: 700; font-size: 32px; line-height: 38px;">Tambah Mobil</h1>
      <p style="font-family: 'Raleway'; font-style: normal; font-weight: 400; font-size: 16px; line-height: 19px; color: #757575;">Tambah Mobil Baru Anda Ke List Show Room</p>
      <form style="margin-top: 50px;" action="../config/add.php" method="POST" enctype="multipart/form-data">
        <div>
          <label style="display: block; font-size: 20px; line-height: 24px; letter-spacing: 1.2px; margin-top: 30px;" for="nama">Nama Mobil</label>
          <input style="display: block; width: 1000px; height: 50px; border: 1px solid #757575; border-radius: 8px; margin-top: 20px; padding-left: 10px; padding-right: 10px;" type="text" id="nama" name="nama_mobil" placeholder="Masukkan Nama Mobil">
        </div>
        <div>
          <label style="display: block; font-size: 20px; line-height: 24px; letter-spacing: 1.2px; margin-top: 30px;" for="pemilik">Nama Pemilik</label>
          <input style="display: block; width: 1000px; height: 50px; border: 1px solid #757575; border-radius: 8px; margin-top: 20px; padding-left: 10px; padding-right: 10px;" type="text" id="pemilik" name="nama_pemilik" placeholder="Masukkan Nama Pemilik">
        </div>
        <div>
          <label style="display: block; font-size: 20px; line-height: 24px; letter-spacing: 1.2px; margin-top: 30px;" for="merk">Merk</label>
          <input style="display: block; width: 1000px; height: 50px; border: 1px solid #757575; border-radius: 8px; margin-top: 20px; padding-left: 10px; padding-right: 10px;" type="text" id="merk" name="merk_mobil" placeholder="Masukkan Merk Mobil">
        </div>
        <div>
          <label style="display: block; font-size: 20px; line-height: 24px; letter-spacing: 1.2px; margin-top: 30px;" for="tanggalbeli">Tanggal Beli</label>
          <input style="display: block; width: 1000px; height: 50px; border: 1px solid #757575; border-radius: 8px; margin-top: 20px; padding-left: 10px; padding-right: 10px;" type="date" id="tanggalbeli" name="tanggal_beli">
        </div>
        <div>
          <label style="display: block; font-size: 20px; line-height: 24px; letter-spacing: 1.2px; margin-top: 30px;" for="desc">Deskripsi</label>
          <textarea id="desc" name="deskripsi" placeholder="Masukkan Deskripsi Mobil" style="height:200px; width: 1000px; border-radius: 8px; padding: 20px; margin-top: 20px;"></textarea>
        </div>
        <div>
          <label style="display: block; font-size: 20px; line-height: 24px; letter-spacing: 1.2px; margin-top: 30px;" for="inputGroupFile01">Foto</label>
          <input type="file" class="form-control" id="inputGroupFile01" name="foto_mobil" style="height: 40px; display: block; width: 1000px; border: 1px solid #757575; border-radius: 8px; margin-top: 20px; padding-left: 10px; padding-right: 10px;">
        </div>
        <div>
          <label style="display: block; font-size: 20px; line-height: 24px; letter-spacing: 1.2px; margin-top: 30px;" for="status">Status Pembayaran</label>
          <span class="d-flex">
            <input type="radio" name="status_bayar" id="lunas" value="Lunas" style="width: 15px; height: 15px; margin-right:10px; margin-top: 18px;">
            <label for="lunas" style="margin-top: 15px; margin-right:10px; font-size: 20px; line-height: 24px; letter-spacing: 1.2px;">Lunas</label>
            <input type="radio" name="status_bayar" id="belum" value="Belum Lunas" style="width: 15px; height: 15px; margin-right:10px; margin-top: 18px;">
            <label for="belum" style="margin-top: 15px; font-size: 20px; line-height: 24px; letter-spacing: 1.2px;">Belum Lunas</label>
          </span>
        </div>
        <button type="submit" class="btn btn-primary" style="margin-top: 40px;">Simpan</button>
      </form>
    </div>
  </section>
  <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>
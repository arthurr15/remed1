<?php
require './connector.php';

$nama_mobil = $_POST['nama_mobil'];
$nama_pemilik = $_POST['nama_pemilik'];
$merk_mobil = $_POST['merk_mobil'];
$tanggal_beli = $_POST['tanggal_beli'];
$deskripsi = $_POST['deskripsi'];
$status_bayar = $_POST['status_bayar'];
$foto_mobil = $_FILES['foto_mobil']['name'];

$path = "../asset/images/";

if (move_uploaded_file($_FILES['foto_mobil']['tmp_name'], $path . $foto_mobil)) {
  $addquery = "INSERT INTO showroom_arthur_table (nama_mobil, pemilik_mobil, merk_mobil, tanggal_beli, deskripsi, foto_mobil, status_pembayaran) VALUES ('$nama_mobil', '$nama_pemilik', '$merk_mobil', '$tanggal_beli', '$deskripsi', '$foto_mobil', '$status_bayar')";
  if (mysqli_query($conn, $addquery)) {
    header("location: ../pages/ListCar-Arthur.php?pesan=succes");
  } else {
    header("location: ../pages/ListCar-Arthur.php?pesan=failed");
  }
} else {
  header("location: ../pages/ListCar-Arthur.php?pesan=failed");
}

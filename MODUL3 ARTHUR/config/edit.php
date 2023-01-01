<?php
require './connector.php';

$id = $_GET['id'];
$nama_mobil = $_POST['nama_mobil'];
$nama_pemilik = $_POST['nama_pemilik'];
$merk_mobil = $_POST['merk_mobil'];
$tanggal_beli = $_POST['tanggalbeli'];
$deskripsi = $_POST['deskripsi'];
$status_bayar = $_POST['status_bayar'];
$foto_mobil = $_FILES['foto_mobil']['name'];

$path = "../asset/images/";

if ("SELECT foto_mobil FROM showroom_arthur_table WHERE id_mobil = $id" != 0) {
  if (move_uploaded_file($_FILES['foto_mobil']['tmp_name'], $path . $foto_mobil)) {
    $editquery = "UPDATE showroom_arthur_table SET nama_mobil = '$nama_mobil', pemilik_mobil = '$nama_pemilik', merk_mobil = '$merk_mobil', tanggal_beli = '$tanggal_beli', deskripsi = '$deskripsi', foto_mobil = '$foto_mobil', status_pembayaran = '$status_bayar' WHERE id_mobil = $id";
    if (mysqli_query($conn, $editquery)) {
      header("location: ../pages/ListCar-Arthur.php?pesan=update");
    } else {
      header("location: ../pages/ListCar-Arthur.php?pesan=failed");
    }
  } else {
    header("location: ../pages/ListCar-Arthur.php?pesan=failed");
  }
} else {
  $editquery = "UPDATE showroom_arthur_table SET nama_mobil = '$nama_mobil', pemilik_mobil = '$nama_pemilik', merk_mobil = '$merk_mobil', tanggal_beli = '$tanggal_beli', deskripsi = '$deskripsi', status_pembayaran = '$status_bayar' WHERE id_mobil = $id";
  if (mysqli_query($conn, $editquery)) {
    header("location: ../pages/ListCar-Arthur.php?pesan=update");
  } else {
    header("location: ../pages/ListCar-Arthur.php?pesan=failed");
  }
}

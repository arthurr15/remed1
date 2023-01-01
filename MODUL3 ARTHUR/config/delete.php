<?php
require './connector.php';

$id = $_GET['id'];

$deletequery = "DELETE FROM showroom_arthur_table WHERE id_mobil = $id";

if (mysqli_query($conn, $deletequery)) {
  header("location: ../pages/ListCar-Arthur.php?pesan=delete");
} else {
  header("location: ../pages/ListCar-Arthur.php?pesan=failed");
}

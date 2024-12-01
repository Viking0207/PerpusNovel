<?php
include 'connect.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Hapus data dari database
  $sql = "DELETE FROM data_perpus WHERE id = $id";

  if (mysqli_query($connect, $sql)) {
    header("Location: index.php");
  } else {
    echo "Error: " . mysqli_error($connect);
  }
} else {
  echo "ID tidak ditemukan!";
}

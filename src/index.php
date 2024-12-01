<?php
include 'connect.php';
$title = "";
$author = "";
$year = "";
$sypno = "";
$img = "";
$success = "";
$error = "";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PerpusNovel</title>
    <link href="../dist/styles.css" rel="stylesheet" />
  </head>
  <body>
    <!-- Navigation -->
    <?php include('Header & Footer/nav.php'); ?>

    <!-- Konten Hero -->
    <div id="content-con">
      <?php
      // Mendapatkan parameter 'content' dari URL
      $content = isset($_GET['content']) ? $_GET['content'] : 'home_page'; // Default ke 'home'
      $id = isset($_GET['id']) ? $_GET['id'] : null;
      
        if ($content === 'detail' && $id) {
          // Menampilkan detail buku berdasarkan ID
          $sql = "SELECT * FROM data_perpus WHERE id = $id";
          $result = mysqli_query($connect, $sql);
          if ($row = mysqli_fetch_assoc($result)) {
              include('Content/detail.php'); // Include file detail.php
          } else {
              echo "<h1>Buku tidak ditemukan!</h1>";
          }
        } else {
          $file = "Content/{$content}.php"; // Path file yang ingin dimuat
          // Memeriksa apakah file ada, lalu menyertakan file tersebut
          if (file_exists($file)) {
              include($file);
          } else {
              // Jika file tidak ditemukan, tampilkan pesan error
              echo "<h1>404 Content Not Found</h1>";
          }
        }
      ?>
    </div>

    <!-- Footer -->
    <?php include('Header & Footer/foot.php'); ?>

    <script src="./Header & Footer/navigation.js"></script>
  </body>
</html>

<?php
include '../connect.php';

if (isset($_GET['query'])) {
       $query = mysqli_real_escape_string($connect, $_GET['query']);

       // Query pencarian buku dengan menggunakan LIKE
       $sql = "SELECT * FROM data_perpus WHERE judul_buku LIKE '%$query%' LIMIT 5";
       $result = mysqli_query($connect, $sql);

       if (mysqli_num_rows($result) > 0) {
              // Jika ditemukan hasil pencarian
              while ($row = mysqli_fetch_assoc($result)) {
                     echo "<div class='result-item'>
                    <a href='index.php?content=detail&id={$row['id']}'>{$row['judul_buku']}</a>
                  </div>";
              }
       } else {
              echo "<p>Tidak ditemukan hasil yang sesuai.</p>";
       }
}

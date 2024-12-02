<?php
// Koneksi ke database
include '../connect.php';

$tipe_buku = isset($_GET['tipe_buku']) ? $_GET['tipe_buku'] : '';
$genre = isset($_GET['genre']) ? $_GET['genre'] : '';

if ($tipe_buku && $genre) {
       // Query untuk mendapatkan buku berdasarkan tipe buku dan genre
       $query = "SELECT judul_buku, pengarang FROM data_perpus WHERE tipe_buku = ? AND genre = ?";
       $stmt = mysqli_prepare($connect, $query);

       if ($stmt) {
              // Bind parameter
              mysqli_stmt_bind_param($stmt, "ss", $tipe_buku, $genre);

              // Eksekusi statement
              mysqli_stmt_execute($stmt);

              // Ambil hasilnya
              $result = mysqli_stmt_get_result($stmt);

              $books = [];
              while ($row = mysqli_fetch_assoc($result)) {
                     $books[] = [
                            'title' => $row['judul_buku'],
                            'author' => $row['pengarang']
                     ];
              }

              // Tampilkan hasil dalam format JSON
              echo json_encode($books);

              // Tutup statement
              mysqli_stmt_close($stmt);
       } else {
              // Jika query gagal disiapkan
              echo json_encode([]);
       }
} else {
       // Jika parameter tidak lengkap
       echo json_encode([]);
}

// Tutup koneksi
mysqli_close($connect);
?>
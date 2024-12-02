<?php
// Koneksi ke database
include '../connect.php';

$tipe_buku = isset($_GET['tipe_buku']) ? $_GET['tipe_buku'] : '';

if ($tipe_buku) {
    // Query untuk mendapatkan genre berdasarkan tipe buku
    $query = "SELECT DISTINCT genre FROM data_perpus WHERE tipe_buku = ?";
    $stmt = mysqli_prepare($connect, $query);

    if ($stmt) {
        // Bind parameter
        mysqli_stmt_bind_param($stmt, "s", $tipe_buku);

        // Eksekusi statement
        mysqli_stmt_execute($stmt);

        // Ambil hasilnya
        $result = mysqli_stmt_get_result($stmt);

        $genres = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $genres[] = $row['genre'];
        }

        // Tampilkan hasil dalam format JSON
        echo json_encode($genres);

        // Tutup statement
        mysqli_stmt_close($stmt);
    } else {
        // Jika query gagal
        echo json_encode([]);
    }
} else {
    // Jika tidak ada tipe buku
    echo json_encode([]);
}

// Tutup koneksi
mysqli_close($connect);

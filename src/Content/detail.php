<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

<div class="min-h-screen m-12 mt-5">
<?php
include 'connect.php';

// Mengambil ID dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data buku berdasarkan ID
    $sql = "SELECT * FROM data_perpus WHERE id = $id";
    $result = mysqli_query($connect, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        // Menampilkan detail buku
        echo "<img src='../uploads/{$row['gambar']}' alt='Book Image' class='book-image' style='max-width: 300px;' />";
        echo "<h2>{$row['judul_buku']}</h2>";
        echo "<p><strong>Pengarang:</strong> {$row['pengarang']}</p>";
        echo "<p><strong>Tahun:</strong> {$row['tahun']}</p>";
        echo "<p><strong>Sypnosis:</strong> {$row['sypnosis']}</p>";
        
    } else {
        echo "<h1>Buku tidak ditemukan!</h1>";
    }
} else {
    echo "<h1>ID Buku tidak ditemukan!</h1>";
}
?>

</div>
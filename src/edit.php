<?php
include 'connect.php';

// Ambil data berdasarkan ID
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = mysqli_query($connect, "SELECT * FROM data_perpus WHERE id = $id");
  $novel = mysqli_fetch_assoc($query);

  if (!$novel) {
    echo "Data tidak ditemukan!";
    exit;
  }
}

// Proses update data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $author = $_POST['author'];
  $year = $_POST['year'];
  $sypno = $_POST['sypno'];

  // Jika gambar baru diunggah
  if (!empty($_FILES['img']['name'])) {
    $img = $_FILES['img']['name'];
    $target = "../uploads/" . basename($img);
    move_uploaded_file($_FILES['img']['tmp_name'], $target);
  } else {
    $img = $novel['img']; // Gunakan gambar lama jika tidak diunggah
  }

  // Update data
  $sql = "UPDATE data_perpus SET 
            judul_buku = '$title', 
            pengarang = '$author', 
            tahun = '$year', 
            sypnosis = '$sypno', 
            gambar = '$img' 
            WHERE id = $id";

  if (mysqli_query($connect, $sql)) {
    header("Location: index.php");
  } else {
    echo "Error: " . mysqli_error($connect);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Buku</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <form action="" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Edit Buku</h2>
    <div class="mb-4">
      <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
      <input type="text" name="title" id="title" value="<?= $novel['judul_buku'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
    </div>
    <div class="mb-4">
      <label for="author" class="block text-sm font-medium text-gray-700">Penulis</label>
      <input type="text" name="author" id="author" value="<?= $novel['pengarang'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
    </div>
    <div class="mb-4">
      <label for="year" class="block text-sm font-medium text-gray-700">Tahun</label>
      <input type="number" name="year" id="year" value="<?= $novel['tahun'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
    </div>
    <div class="mb-4">
      <label for="sypno" class="block text-sm font-medium text-gray-700">Sinopsis</label>
      <textarea name="sypno" id="sypno" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"><?= $novel['sypnosis'] ?></textarea>
    </div>
    <div class="mb-4">
      <label for="img" class="block text-sm font-medium text-gray-700">Gambar</label>
      <input type="file" name="img" id="img" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
      <p class="text-sm text-gray-500 mt-2">Gambar saat ini: <strong><?= $novel['gambar'] ?></strong></p>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
  </form>
</body>

</html>
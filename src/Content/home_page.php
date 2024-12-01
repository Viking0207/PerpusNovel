<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
<div class="min-h-screen">
  <div class="container mx-auto px-20 mt-20">
    <div class="grid grid-cols-3 gap-4 mt-8">
        <?php
        include 'connect.php';

        // Fetch data
        $result = mysqli_query($connect, "SELECT * FROM data_perpus");
        while ($row = mysqli_fetch_assoc($result)) {
          $gambarPath = file_exists('../uploads/' . $row['gambar']) ? '../uploads/' . $row['gambar'] : '../uploads/TLOTR.jpg';
            echo "
            <div class='bg-white rounded-lg shadow-md flex'>
                <!-- Bagian Gambar -->
                <img src='{$gambarPath}' alt='Book Image' class='w-1/3 object-cover rounded-l-lg' />
                
                <!-- Bagian Konten -->
                <div class='py-10 px-6 w-2/3'>
                    <h2 class='text-lg font-bold mb-2'>{$row['judul_buku']}</h2>
                    <p class='text-sm text-gray-600'>By {$row['pengarang']} ({$row['tahun']})</p>
                    <p class='text-sm text-gray-700 mt-2'>{$row['sypnosis']}</p>
                    <div class='mt-4 flex justify-end gap-4'>
                        <a href='edit.php?id={$row['id']}' class='text-blue-500'>Edit</a>
                        <a href='delete.php?id={$row['id']}' class='text-red-500'>Delete</a>
                    </div>
                </div>
            </div>";
        }
        ?>
    </div>

    <div class="mt-6">
        <form action="add.php" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Tambah Buku</h2>
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-700">Penulis</label>
                <input type="text" name="author" id="author" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="year" class="block text-sm font-medium text-gray-700">Tahun</label>
                <input type="number" name="year" id="year" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="sypno" class="block text-sm font-medium text-gray-700">Sinopsis</label>
                <textarea name="sypno" id="sypno" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
            </div>
            <div class="mb-4">
                <label for="img" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="img" id="img" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Tambah</button>
        </form>
    </div>
  </div>
</div>
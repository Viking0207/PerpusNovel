<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

<div class="min-h-screen">
    <div class="filter-section">
        <select id="bookType" class="border p-2 rounded-md">
            <option>Pilih Tipe Buku</option>
            <option value="novel">Novel</option>
            <option value="komik">Komik</option>
        </select>

        <select id="bookGenre" class="border p-2 rounded-md" disabled>
            <option>Pilih Genre</option>
        </select>
    </div>


    <div id="bookList" class="mt-5 p-6 bg-neutral dark:bg-slate-300 text-white dark:text-black rounded-md">
        <div class="grid grid-cols-5 gap-4 mt-8">
            <?php
            include 'connect.php';

            // Fetch data
            $result = mysqli_query($connect, "SELECT * FROM data_perpus");
            while ($row = mysqli_fetch_assoc($result)) {
                $gambarPath = file_exists('../uploads/' . $row['gambar']) ? '../uploads/' . $row['gambar'] : '../uploads/TLOTR.jpg';
                echo "
            <div class='bg-white rounded-lg shadow-md flex flex-col items-center'>
                <!-- Bagian Gambar -->
                <div class='relative'>
                    <img src='{$gambarPath}' alt='Book Image' class='w-auto max-w-[150px] h-96 object-contain scale-90 rounded-t-lg p-4' />
                </div>
                
                <!-- Bagian Konten -->
                <div class='py-2 px-6'>
                    <h2 class='text-lg font-bold mb-1 text-center'>{$row['judul_buku']}</h2>
                    <p class='text-sm text-gray-600 text-center'>By {$row['pengarang']}</p>
                    <p class='text-sm text-gray-600 text-center mt-1'>Genre: {$row['genre']}</p>
                </div>
            </div>";
            }
            ?>
        </div>
    </div>
</div>

<script src="Content/lists.js"></script>
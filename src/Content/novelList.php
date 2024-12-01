<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" />

<div class="min-h-screen">
    <?php
    // Proses hanya jika form di-submit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

        if ($id > 0) {
            // Query untuk mengambil data berdasarkan ID
            $sql = "SELECT judul_buku, pengarang, tahun, sypnosis, gambar FROM data_perpus WHERE id = $id";
            $result = mysqli_query($connect, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                // Data ditemukan
                $row = mysqli_fetch_assoc($result);
                $title = $row['judul_buku'];
                $author = $row['pengarang'];
                $year = $row['tahun'];
                $sypno = $row['sypnosis'];
                $img = $row['gambar'];
                $success = "Data berhasil diambil.";
            } else {
                $error = "Data tidak ditemukan.";
            }

            // Bebaskan hasil query
            if ($result) {
                mysqli_free_result($result);
            }
        } else {
            $error = "ID tidak valid.";
        }
    }

    // Tutup koneksi
    mysqli_close($connect);

    ?>

    <h1>Cari Data Buku</h1>
    <div class="mb-5">
        <form method="POST" action="">
            <label for="id">Masukkan ID Buku:</label>
            <input class="p-3 text-base"  type="number" id="id" name="id" required>
            <button class="py-3 px-5 text-base cursor-pointer" type="submit">Cari</button>
        </form>
    </div>

    <?php if ($error): ?>
        <p class="text-red-700"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <?php if ($success): ?>
        <p class="text-green-700"><?php echo htmlspecialchars($success); ?></p>
        <h2>Detail Buku</h2>
        <p><strong>Judul Buku:</strong> <?php echo htmlspecialchars($title); ?></p>
        <p><strong>Pengarang:</strong> <?php echo htmlspecialchars($author); ?></p>
        <p><strong>Tahun Terbit:</strong> <?php echo htmlspecialchars($year); ?></p>
        <p><strong>Sinopsis:</strong> <?php echo htmlspecialchars($sypno); ?></p>
        <?php if ($img): ?>
            <img src="<?php echo htmlspecialchars($img); ?>" alt="Gambar Buku" class="max-w-52 h-auto mt-3">
        <?php else: ?>
            <p>(Tidak ada gambar tersedia)</p>
        <?php endif; ?>
    <?php endif; ?>
</div>
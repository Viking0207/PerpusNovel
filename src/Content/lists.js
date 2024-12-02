document.addEventListener("DOMContentLoaded", () => {
  const bookType = document.getElementById("bookType");
  const bookGenre = document.getElementById("bookGenre");
  const bookList = document.getElementById("bookList");

  // Event listener untuk tipe buku
  bookType.addEventListener("change", () => {
    const selectedType = bookType.value;

    // Reset genre jika tipe buku berubah
    bookGenre.innerHTML = '<option value="">Pilih Genre</option>';
    bookGenre.disabled = !selectedType;

    if (selectedType) {
      // Fetch genre berdasarkan tipe buku
      fetch(
        `/Project-PerpustakaanNovel/src/Content/genres.php?tipe_buku=${selectedType}`
      )
        .then((response) => response.json())
        .then((data) => {
          if (data.length > 0) {
            data.forEach((genre) => {
              const option = document.createElement("option");
              option.value = genre;
              option.textContent = genre;
              bookGenre.appendChild(option);
            });
          }
        });
    }

    // Kosongkan daftar buku saat tipe buku berubah
    bookList.innerHTML = "";
  });

  // Event listener untuk genre
  bookGenre.addEventListener("change", () => {
    const selectedType = bookType.value;
    const selectedGenre = bookGenre.value;

    if (selectedType && selectedGenre) {
      // Fetch daftar buku berdasarkan tipe dan genre
      fetch(
        `/Project-PerpustakaanNovel/src/Content/typeBook.php?tipe_buku=${selectedType}&genre=${selectedGenre}`
      )
        .then((response) => response.json())
        .then((data) => {
          bookList.innerHTML = "";

          if (data.length > 0) {
            data.forEach((book) => {
              const bookItem = document.createElement("div");
              bookItem.className = "p-2 border-b border-gray-500";
              bookItem.textContent = `${book.title} - ${book.author}`;
              bookList.appendChild(bookItem);
            });
          } else {
            bookList.innerHTML = "<p>Tidak ada buku ditemukan.</p>";
          }
        });
    }
  });
});

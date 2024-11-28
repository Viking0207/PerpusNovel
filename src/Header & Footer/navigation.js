class Navigation {
  constructor() {
    this.openSection = null;
    this.isDarkMode = false;

    // Inisialisasi
    this.init();
    this.setupListeners();
  }

  // Inisialisasi preferensi tema
  init() {
    // Ambil preferensi mode dari localStorage
    const darkModePreference = localStorage.getItem("darkMode");

    // Jika ada preferensi di localStorage, gunakan itu
    // Jika tidak ada, cek preferensi sistem (browser)
    if (darkModePreference) {
      this.isDarkMode = darkModePreference === "true";
    } else {
      // Cek preferensi sistem menggunakan media query
      this.isDarkMode = window.matchMedia(
        "(prefers-color-scheme: dark)"
      ).matches;
    }

    // Terapkan tema yang sesuai
    this.applyTheme();
  }

  // Fungsi untuk mengubah status section yang terbuka
  toggleSection(section) {
    if (this.openSection === section) {
      this.openSection = null;
      console.log(`${section} section has fail`);
    } else {
      this.openSection = section;
      console.log(`${section} section has success`);
    }
  }

  // Fungsi untuk mengubah tema
  toggleDarkMode() {
    // Ubah antara light dan dark mode
    this.isDarkMode = !this.isDarkMode;

    // Simpan preferensi ke localStorage
    localStorage.setItem("darkMode", this.isDarkMode.toString());

    // Terapkan perubahan tema
    this.applyTheme();
  }

  // Terapkan tema sesuai dengan mode
  applyTheme() {
    const rootElement = document.documentElement;

    if (this.isDarkMode) {
      rootElement.setAttribute("data-theme", "dark");
      document.body.classList.remove("dark");
    } else {
      rootElement.setAttribute("data-theme", "light");
      document.body.classList.add("dark");
    }
  }

  // Listener untuk menutup detail saat klik di luar
  closeDetailsEvent(e) {
    const targetElement = e.target;
    const isClickInside = targetElement.closest("details");

    if (!isClickInside) {
      this.openSection = null;
    }
  }

  // Tambahkan event listeners
  setupListeners() {
    // Listener untuk klik pada dokumen
    document.addEventListener("click", (e) => this.closeDetailsEvent(e));

    // Listener untuk tombol toggle tema
    const themeToggleButton = document.querySelector(".theme-controller");
    if (themeToggleButton) {
      themeToggleButton.addEventListener("click", () => this.toggleDarkMode());
    }
  }

  // Dummy fungsi untuk cek apakah berada di halaman kontak
  isContactPage() {
    // Contoh: Periksa apakah URL mengarah ke halaman kontak
    return window.location.pathname.includes("contact");
  }
}

// Inisialisasi Navigation
const navigation = new Navigation();

// Menangani klik pada ikon pencarian
const searchIcon = document.getElementById('search-icon');
const searchInput = document.getElementById('search');

searchIcon.addEventListener('click', () => {
  const query = searchInput.value;
  if (query) {
    alert('Searching for: ' + query);
  } else {
    alert('Please enter a search query!');
  }
});


<div class="font-imul navbar bg-teal-700 text-slate-300">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
        <?= file_get_contents('../assets/burger.svg'); ?>
      </div>

      <ul
        tabindex="0"
        class="menu menu-sm dropdown-content bg-neutral dark:bg-slate-300 dark:text-base-content text-neutral-content rounded-box z-[2] mt-3 w-52 p-2 shadow">
        <li><a href="?content=home_page">Home</a></li>
        <li><a  href="?content=novelList">Novel List</a></li>
        <li><a href="?content=bookmark">Bookmark</a></li>
      </ul>
    </div>

    <a class="btn btn-ghost text-xl">PerpusNovel</a>
  </div>
  <div class="navbar-start hidden lg:flex lg:absolute lg:left-44">
    <ul class="menu menu-horizontal px-1">
      <li><a href="?content=home_page">Home</a></li>
      <li><a href="?content=novelList">Novel List</a></li>
      <li><a href="?content=bookmark">Bookmark</a></li>
    </ul>
  </div>

  <div class="navbar-end space-x-6 mr-10">
    <label class="swap swap-rotate">
      <!-- this hidden checkbox controls the state -->
      <input
        (click)="toggleDarkMode()"
        type="checkbox"
        class="theme-controller"
        value="synthwave"
        [checked]="isDarkMode" />
      <!-- sun icon -->
      <svg
        class="swap-off h-6 w-auto fill-current"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24">
        <path
          d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
      </svg>
      <!-- moon icon -->
      <svg
        class="swap-on h-6 w-auto fill-current"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24">
        <path
          d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
      </svg>
    </label>

    <div class="relative">
      <input
        type="text"
        id="search"
        class="w-full p-2 pl-7 text-slate-300 dark:text-slate-900 bg-neutral dark:bg-white rounded-3xl focus:outline-none focus:ring-2 focus:ring-teal-300"
        placeholder="Search..."
        onkeyup="searchBook()" />
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="absolute right-5 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        role="button"
        id="search-icon">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M21 21l-4.35-4.35M9 14a5 5 0 1 0 0-10 5 5 0 0 0 0 10z" />
      </svg>
      <div id="searchResult" class="bg-base-content text-base-content max-h-48 overflow-y-auto absolute w-full z-10 mt-3 left-3"></div>
    </div>
  </div>

</div>

<script src="navigation.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  function searchBook() {
      let query = document.getElementById("search").value;
      const searchResult = document.getElementById("searchResult");
      console.log(query);  // Debugging untuk melihat query
      if (query.length >= 1) {
          $.ajax({
              url: "/Project-PerpustakaanNovel/src/Header & Footer/search.php",
              type: "GET",
              data: {
                  query: query
              },
              success: function(response) {
                  document.getElementById("searchResult").innerHTML = response;
              }
          });
      } else {
          document.getElementById("searchResult").innerHTML = '';
      }

      // Cek apakah input tidak kosong untuk menambahkan/menghapus border
      if (query.length >= 1) {
        searchResult.classList.add("border", "border-gray-500"); // Menambahkan border
      } else {
        searchResult.classList.remove("border", "border-gray-500"); // Menghapus border
      }
  }
</script>

<style>
  @import url("https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap");
</style>

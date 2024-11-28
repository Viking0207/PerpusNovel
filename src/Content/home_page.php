<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
<div class="min-h-screen">
  <div class="swiper-container h-32 mx-auto">
    <div class="swiper-wrapper">
      <!-- Slide 1 -->
      <div class="swiper-slide">
        <h1>Slide 1</h1>
      </div>
      <!-- Slide 2 -->
      <div class="swiper-slide">
        <h1>Slide 2</h1>
      </div>
      <!-- Slide 3 -->
      <div class="swiper-slide">
        <h1>Slide 3</h1>
      </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="swiper-button-prev "></div>
    <div class="swiper-button-next"></div>

    <!-- Pagination -->
    <div class="swiper-pagination"></div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const swiper = new Swiper(".swiper-container", {
        loop: true, // Loop the slides
        autoplay: {
          delay: 3000, // Auto-scroll every 3 seconds
          disableOnInteraction: false, // Continue autoplay after user interaction
        },
        pagination: {
          el: ".swiper-pagination", // Enable pagination
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next", // Next button
          prevEl: ".swiper-button-prev", // Previous button
        },
      });
    });
  </script>
</div>

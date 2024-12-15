<div id="auto-carousel" class="relative w-full flex justify-center" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div style="height: 280px; width: 1100px;" class="relative overflow-hidden rounded-lg">
        <!-- Item 1 -->
        <div class="absolute inset-0 transform transition-transform duration-700 ease-in-out translate-x-0" data-carousel-item>
            <img src="https://www.tomizone.com/wp-content/uploads/2017/10/1080x720.png" class="block w-full h-full object-cover" alt="Slide 1">
        </div>
        <!-- Item 2 -->
        <div class="absolute inset-0 transform transition-transform duration-700 ease-in-out translate-x-full hidden" data-carousel-item>
            <img src="/images/slide-2.jpg" class="block w-full h-full object-cover" alt="Slide 2">
        </div>
        <!-- Item 3 -->
        <div class="absolute inset-0 transform transition-transform duration-700 ease-in-out translate-x-full hidden" data-carousel-item>
            <img src="/images/slide-3.jpg" class="block w-full h-full object-cover" alt="Slide 3">
        </div>

        <!-- Slider controls -->
        <!-- Left button -->
        <button type="button" class="absolute top-1/2 left-2 z-30 transform -translate-y-1/2 px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>

        <!-- Right button -->
        <button type="button" class="absolute top-1/2 right-2 z-30 transform -translate-y-1/2 px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
    </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function () {
    const carousel = document.querySelector("#auto-carousel");
    const items = carousel.querySelectorAll("[data-carousel-item]");
    const indicators = carousel.querySelectorAll("[data-carousel-slide-to]");
    let currentIndex = 0;
    const intervalTime = 3000; // Time in milliseconds

    function showSlide(index) {
        items.forEach((item, i) => {
            if (i === index) {
                item.classList.remove("hidden", "translate-x-full", "-translate-x-full");
                item.classList.add("translate-x-0");
            } else if (i < index) {
                item.classList.remove("translate-x-0", "-translate-x-full");
                item.classList.add("hidden", "translate-x-full");
            } else {
                item.classList.remove("translate-x-0", "translate-x-full");
                item.classList.add("hidden", "-translate-x-full");
            }
        });

        indicators.forEach((indicator, i) => {
            indicator.setAttribute("aria-current", i === index);
        });
        currentIndex = index;
    }


    function nextSlide() {
        showSlide((currentIndex + 1) % items.length);
    }

    function prevSlide() {
        showSlide((currentIndex - 1 + items.length) % items.length);
    }

    // Auto slide
    let autoSlide = setInterval(nextSlide, intervalTime);

    // Add event listeners for manual controls
    carousel.querySelector("[data-carousel-next]").addEventListener("click", () => {
        clearInterval(autoSlide);
        nextSlide();
        autoSlide = setInterval(nextSlide, intervalTime);
    });

    carousel.querySelector("[data-carousel-prev]").addEventListener("click", () => {
        clearInterval(autoSlide);
        prevSlide();
        autoSlide = setInterval(nextSlide, intervalTime);
    });

    indicators.forEach((indicator, index) => {
        indicator.addEventListener("click", () => {
            clearInterval(autoSlide);
            showSlide(index);
            autoSlide = setInterval(nextSlide, intervalTime);
        });
    });

    showSlide(currentIndex);
});
</script>
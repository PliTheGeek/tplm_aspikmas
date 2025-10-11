<div class="relative w-full h-96 md:h-[500px] overflow-hidden">
    <!-- Slider container -->
    <div class="slider-container relative w-full h-full">
        <!-- Slide 1 -->
        <div class="slide absolute inset-0 w-full h-full transition-opacity duration-1000 opacity-100">
            <img src="https://picsum.photos/1200/500?random=1" alt="Slide 1" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                <div class="text-center text-white px-4">
                    <h2 class="text-4xl md:text-6xl font-bold mb-4">Welcome to Our Company</h2>
                    <p class="text-xl md:text-2xl mb-8">Discover amazing solutions for your business</p>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg text-lg font-semibold transition duration-300 transform hover:scale-105">
                        Get Started
                    </button>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="slide absolute inset-0 w-full h-full transition-opacity duration-1000 opacity-0">
            <img src="https://picsum.photos/1200/500?random=2" alt="Slide 2" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                <div class="text-center text-white px-4">
                    <h2 class="text-4xl md:text-6xl font-bold mb-4">Innovation at Its Best</h2>
                    <p class="text-xl md:text-2xl mb-8">Leading the way with cutting-edge technology</p>
                    <button class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg text-lg font-semibold transition duration-300 transform hover:scale-105">
                        Learn More
                    </button>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="slide absolute inset-0 w-full h-full transition-opacity duration-1000 opacity-0">
            <img src="https://picsum.photos/1200/500?random=3" alt="Slide 3" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                <div class="text-center text-white px-4">
                    <h2 class="text-4xl md:text-6xl font-bold mb-4">Your Success Matters</h2>
                    <p class="text-xl md:text-2xl mb-8">Partnering with you for exceptional results</p>
                    <button class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-3 rounded-lg text-lg font-semibold transition duration-300 transform hover:scale-105">
                        Contact Us
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation arrows -->
    <button class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-20 hover:bg-opacity-30 text-white p-2 rounded-full transition duration-300" onclick="previousSlide()">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>
    <button class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-20 hover:bg-opacity-30 text-white p-2 rounded-full transition duration-300" onclick="nextSlide()">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>

    <!-- Dot indicators -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
        <button class="dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75 transition duration-300 active" onclick="currentSlide(1)"></button>
        <button class="dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75 transition duration-300" onclick="currentSlide(2)"></button>
        <button class="dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-75 transition duration-300" onclick="currentSlide(3)"></button>
    </div>
</div>

<script>
    let currentSlideIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const totalSlides = slides.length;

    function showSlide(index) {
        // Hide all slides
        slides.forEach(slide => slide.classList.remove('opacity-100'));
        slides.forEach(slide => slide.classList.add('opacity-0'));
        
        // Remove active class from all dots
        dots.forEach(dot => dot.classList.remove('active', 'bg-opacity-100'));
        dots.forEach(dot => dot.classList.add('bg-opacity-50'));
        
        // Show current slide
        slides[index].classList.remove('opacity-0');
        slides[index].classList.add('opacity-100');
        
        // Activate current dot
        dots[index].classList.remove('bg-opacity-50');
        dots[index].classList.add('active', 'bg-opacity-100');
    }

    function nextSlide() {
        currentSlideIndex = (currentSlideIndex + 1) % totalSlides;
        showSlide(currentSlideIndex);
    }

    function previousSlide() {
        currentSlideIndex = (currentSlideIndex - 1 + totalSlides) % totalSlides;
        showSlide(currentSlideIndex);
    }

    function currentSlide(index) {
        currentSlideIndex = index - 1;
        showSlide(currentSlideIndex);
    }

    // Auto-play slider
    setInterval(nextSlide, 5000); // Change slide every 5 seconds

    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        showSlide(0);
    });
</script>
<style>
    .slider-area {
        position: relative;
        width: 90%;
        max-width: 1200px;
        height: 500px;
        overflow: hidden;
        border-radius: 20px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.6);
        font-family: 'Inter', sans-serif;
        background: radial-gradient(circle at 50% 50%, rgba(25, 25, 112, 0.1) 0%, #0a0a0a 100%);
        color: #fff;
    }

    .slider-area * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .slider-area ul {
        list-style: none;
        height: 100%;
        position: relative;
    }

    .slider-area li {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 100%;
        opacity: 0;
        transform: scale(0.8) rotateY(45deg);
        transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        border-radius: 20px;
        overflow: hidden;
    }

    .slider-area li.active {
        left: 0;
        opacity: 1;
        transform: scale(1) rotateY(0deg);
        z-index: 2;
    }

    .slider-area li.next {
        opacity: 0.7;
        transform: scale(0.9) rotateY(-20deg) translateX(100px);
        z-index: 1;
    }

    .slider-area li.prev {
        opacity: 0.7;
        transform: scale(0.9) rotateY(20deg) translateX(-100px);
        z-index: 1;
    }

    .slider-area img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 20px;
    }

    /* Caption */
    .slider-area .caption-group {
        position: absolute;
        bottom: 150px;
        right: 100px;
        max-width: 400px;
        text-shadow: 0 2px 6px rgba(0, 0, 0, 0.6);
        color: #0a0a0a;
        animation: fadeInUp 0.8s ease forwards;
    }

    .slider-area .caption-group h2 {
        font-size: 2rem;
        background: linear-gradient(135deg, #ffffff 0%, #00d4ff 50%, #ff0080 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 10px;
    }

    .slider-area .caption-group p {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.8);
    }

    /* Arrows */
    .slider-area .arrow-prev,
    .slider-area .arrow-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
        font-size: 2rem;
        padding: 10px 15px;
        cursor: pointer;
        border-radius: 50%;
        transition: all 0.3s;
        z-index: 10;
    }

    .slider-area .arrow-prev:hover,
    .slider-area .arrow-next:hover {
        background: rgba(0, 212, 255, 0.2);
        border-color: #00d4ff;
        transform: translateY(-50%) scale(1.1);
    }

    .slider-area .arrow-prev {
        left: 10px;
    }

    .slider-area .arrow-next {
        right: 10px;
    }

    /* Dots */
    .slider-area .nav-dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 12px;
        z-index: 10;
    }

    .slider-area .nav-item {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .slider-area .nav-item.active {
        background: #00d4ff;
        box-shadow: 0 0 10px rgba(0, 212, 255, 0.6);
    }

    /* Progress bar */
    .slider-area .progress {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: rgba(255, 255, 255, 0.1);
        z-index: 5;
    }

    .slider-area #progressBar {
        height: 100%;
        width: 0%;
        background: linear-gradient(90deg, #00d4ff, #ff0080);
        transition: width 0.1s linear;
    }

    /* Particles */
    .slider-area #particles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        border-radius: 20px;
        overflow: hidden;
        z-index: 0;
    }

    .slider-area .particle {
        position: absolute;
        width: 3px;
        height: 3px;
        background: rgba(0, 212, 255, 0.5);
        border-radius: 50%;
        animation: particleFloat 10s linear infinite;
    }

    .cta-button {
        background: linear-gradient(135deg, #00d4ff 0%, #ff0080 100%);
        border: none;
        padding: 18px 40px;
        border-radius: 50px;
        color: white;
        font-weight: 600;
        font-size: 16px;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
        align-self: flex-start;
        opacity: 0;
        animation: fadeInUp 0.6s ease-out 1s forwards;
        margin-top: 10px;
    }

    .cta-button::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .cta-button:hover::before {
        left: 100%;
    }

    .cta-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 30px rgba(0, 212, 255, 0.3);
    }

    @keyframes particleFloat {
        0% {
            transform: translateY(100%);
            opacity: 0;
        }

        10% {
            opacity: 1;
        }

        90% {
            opacity: 1;
        }

        100% {
            transform: translateY(-20%);
            opacity: 0;
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>



<!-- Slider Area -->
<div class="slider-area" id="mySlider">
    <ul>
        <li class="slide active">
            <img src="../../../../assets/img/h4-slide.png" alt="Slide">
            <div class="caption-group">
                <h2>iPhone 6 Plus</h2>
                <h4 class="caption subtitle">Dual SIM</h4>
                <button class="cta-button">Shop now</button>
            </div>
        </li>
        <li class="slide">
            <img src="../../../../assets/img/h4-slide2.png" alt="Slide">
            <div class="caption-group">
                <h2 class="caption title">
                    by one, get one <span class="primary">50% <strong>off</strong></span>
                </h2>
                <h4 class="caption subtitle">school supplies & backpacks.*</h4>
                <button class="cta-button">Shop now</button>

            </div>
        </li>
        <li class="slide">
            <img src="../../../../assets/img/h4-slide3.png" alt="Slide">
            <div class="caption-group">
                <h2 class="caption title">
                    Apple Store Ipod
                </h2>
                <h4 class="caption subtitle">Select Item</h4>
                <button class="cta-button">Shop now</button>

            </div>
        </li>
        <li class="slide">
            <img src="../../../../assets/img/h4-slide4.png" alt="Slide">
            <div class="caption-group">
                <h2 class="caption title">
                    Apple Store Ipod
                </h2>
                <h4 class="caption subtitle">& Phone</h4>
                <button class="cta-button">Shop now</button>

            </div>
        </li>
    </ul>

    <button class="arrow-prev">‹</button>
    <button class="arrow-next">›</button>

    <ul class="nav-dots">
        <li class="nav-item active"></li>
        <li class="nav-item"></li>
        <li class="nav-item"></li>
    </ul>

    <div class="progress">
        <div id="progressBar"></div>
    </div>

    <div id="particles"></div>
</div>

<script>
    (function () {
        const slider = document.getElementById('mySlider');
        const slides = slider.querySelectorAll('.slide');
        const navItems = slider.querySelectorAll('.nav-item');
        const progressBar = slider.querySelector('#progressBar');
        const arrowNext = slider.querySelector('.arrow-next');
        const arrowPrev = slider.querySelector('.arrow-prev');

        let currentSlide = 0;
        const totalSlides = slides.length;
        let autoSlideInterval;
        let progressInterval;

        function createParticles() {
            const particleContainer = slider.querySelector('#particles');
            for (let i = 0; i < 40; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 10 + 's';
                particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
                particleContainer.appendChild(particle);
            }
        }

        function updateSlider() {
            slides.forEach((slide, index) => {
                slide.classList.remove('active', 'next', 'prev');
                if (index === currentSlide) {
                    slide.classList.add('active');
                } else if (index === (currentSlide + 1) % totalSlides) {
                    slide.classList.add('next');
                } else if (index === (currentSlide - 1 + totalSlides) % totalSlides) {
                    slide.classList.add('prev');
                }
            });

            navItems.forEach((item, index) => {
                item.classList.toggle('active', index === currentSlide);
            });

            resetProgressBar();
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlider();
            resetAutoSlide();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlider();
            resetAutoSlide();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateSlider();
            resetAutoSlide();
        }

        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, 5000);
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            startAutoSlide();
        }

        function startProgressBar() {
            let progress = 0;
            progressInterval = setInterval(() => {
                progress += 1;
                progressBar.style.width = progress + '%';
                if (progress >= 100) clearInterval(progressInterval);
            }, 50);
        }

        function resetProgressBar() {
            clearInterval(progressInterval);
            progressBar.style.width = '0%';
            startProgressBar();
        }

        // Events
        arrowNext.addEventListener('click', nextSlide);
        arrowPrev.addEventListener('click', prevSlide);
        navItems.forEach((item, index) => {
            item.addEventListener('click', () => goToSlide(index));
        });

        // Swipe inside slider only
        let touchStartX = 0;
        let touchEndX = 0;

        slider.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        });

        slider.addEventListener('touchend', e => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;
            if (Math.abs(diff) > swipeThreshold) {
                diff > 0 ? nextSlide() : prevSlide();
            }
        }

        // Init
        createParticles();
        updateSlider();
        startAutoSlide();
        startProgressBar();
    })();
</script>
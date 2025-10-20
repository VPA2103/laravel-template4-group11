<style>
    .slider-container {
        width: 90%;
        max-width: 1200px;
        height: 400px;
        margin: 0 auto;
        position: relative;
        overflow: hidden;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        background: #fff;
        font-family: "Inter", sans-serif;
    }

    .slide {
        display: flex;
        flex-direction: row;
        align-items: center;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 100%;
        opacity: 0;
        transition: all 0.6s ease;
        background: #f9f9f9;
        border-radius: 16px;
        overflow: hidden;
    }

    .slide.active {
        left: 0;
        opacity: 1;
        z-index: 2;
    }

    .slide img {
        width: 50%;
        height: 100%;
        object-fit: contain;
        /* Hiển thị toàn bộ ảnh, không bị cắt */
        object-position: center;
        /* Căn giữa ảnh trong khung */
        background-color: #f5f5f5;
        /* Nền trung tính khi ảnh nhỏ hơn khung */
        padding: 10px;
        /* Khoảng đệm để ảnh không dính sát viền */
        box-sizing: border-box;
    }


    .slide-content {
        width: 50%;
        padding: 30px 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: #ffffff;
    }

    .slide-content h2 {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: #333;
    }

    .slide-content p {
        font-size: 1rem;
        color: #666;
        line-height: 1.4;
        margin-bottom: 20px;
    }

    .slide-content .cta-button {
        background: linear-gradient(135deg, #00bcd4, #ff4081);
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 30px;
        cursor: pointer;
        font-weight: 600;
        text-transform: uppercase;
        transition: all 0.3s ease;
        align-self: flex-start;
    }

    .slide-content .cta-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(0, 188, 212, 0.3);
    }

    /* Navigation arrows */
    .arrow-prev,
    .arrow-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.4);
        color: #fff;
        font-size: 1.8rem;
        padding: 8px 14px;
        border-radius: 50%;
        cursor: pointer;
        transition: background 0.3s ease;
        z-index: 10;
    }

    .arrow-prev:hover,
    .arrow-next:hover {
        background: rgba(0, 0, 0, 0.6);
    }

    .arrow-prev {
        left: 10px;
    }

    .arrow-next {
        right: 10px;
    }

    /* Dots navigation */
    .nav-dots {
        position: absolute;
        bottom: 15px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
        z-index: 10;
    }

    .nav-item {
        width: 12px;
        height: 12px;
        background: rgba(0, 0, 0, 0.3);
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .nav-item.active {
        background: #00bcd4;
        box-shadow: 0 0 6px #00bcd4;
    }

    @media (max-width: 768px) {
        .slide {
            flex-direction: column;
        }

        .slide img {
            width: 100%;
            height: 200px;
        }

        .slide-content {
            width: 100%;
            padding: 20px;
            text-align: center;
        }

        .slide-content .cta-button {
            align-self: center;
        }
    }
</style>

<div class="slider-container" id="productSlider">
    @foreach ($sanphams as $sp)
        <div class="slide {{ $loop->first ? 'active' : '' }}">
            <img src="{{ asset('assets/products/thumbnails/' . $sp->AnhSanPham) }}" alt="{{ $sp->TenSanPham }}">
            <div class="slide-content">
                <h2>{{ $sp->TenSanPham }}</h2>
                <p>{{ $sp->MoTa }}</p>
                <a href="{{ route('product.show', ['MaSanPham' => $sp->MaSanPham]) }}">
                    <button class="cta-button">Xem chi tiết</button>
                </a>
            </div>
        </div>
    @endforeach

    <button class="arrow-prev">‹</button>
    <button class="arrow-next">›</button>

    <div class="nav-dots">
        @foreach ($sanphams as $sp)
            <div class="nav-item {{ $loop->first ? 'active' : '' }}"></div>
        @endforeach
    </div>
</div>

<script>
    (function () {
        const slider = document.getElementById('productSlider');
        const slides = slider.querySelectorAll('.slide');
        const dots = slider.querySelectorAll('.nav-item');
        const prevBtn = slider.querySelector('.arrow-prev');
        const nextBtn = slider.querySelector('.arrow-next');

        let currentIndex = 0;
        const totalSlides = slides.length;
        let autoSlide;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });
            currentIndex = index;
        }

        function nextSlide() {
            showSlide((currentIndex + 1) % totalSlides);
        }

        function prevSlide() {
            showSlide((currentIndex - 1 + totalSlides) % totalSlides);
        }

        function startAutoSlide() {
            autoSlide = setInterval(nextSlide, 5000);
        }

        function stopAutoSlide() {
            clearInterval(autoSlide);
        }

        nextBtn.addEventListener('click', () => {
            nextSlide();
            stopAutoSlide();
            startAutoSlide();
        });

        prevBtn.addEventListener('click', () => {
            prevSlide();
            stopAutoSlide();
            startAutoSlide();
        });

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
                stopAutoSlide();
                startAutoSlide();
            });
        });

        startAutoSlide();
    })();
</script>
<?php
// Componente de carrossel de imagens
function renderCarousel() {
    $slides = [
        ['img' => 'https://placehold.co/1200x400/FF6B35/white?text=Promoção+Imperdível', 'title' => 'Ofertas Especiais', 'desc' => 'Descontos de até 50%'],
        ['img' => 'https://placehold.co/1200x400/FF8C42/white?text=Coleção+Verão', 'title' => 'Coleção Verão', 'desc' => 'Produtos exclusivos'],
        ['img' => 'https://placehold.co/1200x400/FFA559/white?text=Frete+Grátis', 'title' => 'Frete Grátis', 'desc' => 'Para compras acima de R$ 200']
    ];
    ?>
    <div class="relative overflow-hidden rounded-xl mb-12">
        <div class="carousel-container relative h-64 md:h-96">
            <?php foreach ($slides as $index => $slide): ?>
                <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-500" data-slide="<?php echo $index; ?>">
                    <img src="<?php echo $slide['img']; ?>" alt="<?php echo $slide['title']; ?>" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                        <div class="text-center text-white">
                            <h2 class="text-3xl md:text-5xl font-bold mb-4"><?php echo $slide['title']; ?></h2>
                            <p class="text-lg md:text-xl"><?php echo $slide['desc']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-prev absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 hover:bg-opacity-75 rounded-full p-2 transition">
            <i class="fas fa-chevron-left text-gray-800"></i>
        </button>
        <button class="carousel-next absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-50 hover:bg-opacity-75 rounded-full p-2 transition">
            <i class="fas fa-chevron-right text-gray-800"></i>
        </button>
    </div>
    
    <script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const totalSlides = slides.length;
    
    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('opacity-0', i !== index);
            slide.classList.toggle('opacity-100', i === index);
        });
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }
    
    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
    }
    
    document.querySelector('.carousel-prev')?.addEventListener('click', prevSlide);
    document.querySelector('.carousel-next')?.addEventListener('click', nextSlide);
    showSlide(0);
    setInterval(nextSlide, 5000);
    </script>
    <?php
}
?>
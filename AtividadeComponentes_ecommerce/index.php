<?php
/**
 * index.php
 * 
 * Main landing page
 */
require_once __DIR__ . '/components/functions.php';
$title = 'StyleStore - O melhor do varejo';
include __DIR__ . '/components/header.php';
include __DIR__ . '/components/navbar.php';

// Fetch all products for main grid and carousel
$allProducts = getProducts();
$featuredProducts = array_slice($allProducts, 0, 6);

// Predefined banners for carousel
$banners = [
    ['image' => 'https://picsum.photos/id/10/1600/400', 'title' => 'Promoção Relâmpago', 'subtitle' => 'Até 40% OFF em eletrônicos'],
    ['image' => 'https://picsum.photos/id/20/1600/400', 'title' => 'Coleção Verão', 'subtitle' => 'Moda com até 30% de desconto'],
    ['image' => 'https://picsum.photos/id/26/1600/400', 'title' => 'Casa dos Sonhos', 'subtitle' => 'Móveis e decoração com frete grátis']
];
?>

<main class="container mx-auto px-4 py-6">
    <!-- Banner Carousel (Hero) -->
    <div class="relative w-full h-72 md:h-96 rounded-2xl overflow-hidden shadow-lg mb-12" id="heroCarousel">
        <div class="absolute inset-0 flex transition-transform duration-500 ease-in-out" id="carouselTrack">
            <?php foreach ($banners as $index => $banner): ?>
            <div class="w-full flex-shrink-0 relative">
                <img src="<?php echo $banner['image']; ?>" alt="banner" class="w-full h-72 md:h-96 object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-30 flex flex-col justify-center items-start px-8 md:px-16">
                    <h2 class="text-white text-2xl md:text-4xl font-bold drop-shadow"><?php echo $banner['title']; ?></h2>
                    <p class="text-white text-lg md:text-xl mt-2"><?php echo $banner['subtitle']; ?></p>
                    <a href="#" class="mt-4 bg-white text-blue-700 px-6 py-2 rounded-full font-semibold shadow-lg hover:bg-gray-100">Comprar Agora</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <button id="prevBtn" class="absolute left-3 top-1/2 transform -translate-y-1/2 bg-white/70 hover:bg-white rounded-full p-2 shadow-lg z-10">❮</button>
        <button id="nextBtn" class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-white/70 hover:bg-white rounded-full p-2 shadow-lg z-10">❯</button>
        <div class="absolute bottom-4 left-0 right-0 flex justify-center gap-2 z-10">
            <?php foreach ($banners as $i => $b): ?>
            <button class="carousel-dot w-3 h-3 rounded-full bg-white/70 mx-1" data-index="<?php echo $i; ?>"></button>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Product Grid Section -->
    <section class="mb-16">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 border-l-4 border-blue-600 pl-4">Produtos em Destaque</h2>
        <?php echo renderProductGrid($allProducts, 'md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4'); ?>
    </section>

    <!-- Second Carousel -->
    <section class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center justify-between">
            <span>🔥 Produtos Mais Desejados</span>
            <span class="text-sm font-normal text-gray-500">Deslize para ver mais</span>
        </h2>
        <div class="relative">
            <div id="productCarouselTrack" class="flex overflow-x-auto scroll-smooth gap-6 pb-4 hide-scrollbar" style="scrollbar-width: none;">
                <?php foreach ($featuredProducts as $product): ?>
                    <div class="min-w-[260px] sm:min-w-[280px] md:min-w-[300px] flex-shrink-0">
                        <?php echo renderProductCard($product); ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <button id="carouselScrollLeft" class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-3 bg-white rounded-full p-2 shadow-md hover:bg-gray-100">❮</button>
            <button id="carouselScrollRight" class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-3 bg-white rounded-full p-2 shadow-md hover:bg-gray-100">❯</button>
        </div>
    </section>

    <!-- Customer Reviews Section -->
    <section class="mb-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">✨ O que nossos clientes dizem</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <?php 
                $reviews = [
                    ['name' => 'Carla Mendes', 'rating' => 5.0, 'comment' => 'Comprei um fone e chegou antes do prazo. Qualidade incrível!', 'avatar' => 5],
                    ['name' => 'Rafael Souza', 'rating' => 4.8, 'comment' => 'Excelente atendimento e produto superou expectativas. Recomendo a loja.', 'avatar' => 12],
                    ['name' => 'Juliana Lima', 'rating' => 4.9, 'comment' => 'A Smart TV é fantástica, entrega rápida e embalagem segura. Nota 10!', 'avatar' => 28]
                ];
                foreach ($reviews as $review) {
                    echo renderReviewCard($review['name'], $review['rating'], $review['comment'], $review['avatar']);
                }
            ?>
        </div>
    </section>
</main>

<script>
// Hero Carousel logic
const track = document.getElementById('carouselTrack');
const slides = track ? Array.from(track.children) : [];
const nextBtn = document.getElementById('nextBtn');
const prevBtn = document.getElementById('prevBtn');
const dots = document.querySelectorAll('.carousel-dot');
let currentIndex = 0;

function updateCarousel() {
    if (!track || slides.length === 0) return;
    const width = slides[0]?.getBoundingClientRect().width;
    track.style.transform = 'translateX(-' + (currentIndex * width) + 'px';
    dots.forEach((dot, i) => {
        dot.classList.toggle('bg-blue-600', i === currentIndex);
        dot.classList.toggle('bg-white/70', i !== currentIndex);
    });
}

if (nextBtn && prevBtn && slides.length > 0) {
    window.addEventListener('resize', updateCarousel);
    nextBtn.addEventListener('click', () => { currentIndex = (currentIndex + 1) % slides.length; updateCarousel(); });
    prevBtn.addEventListener('click', () => { currentIndex = (currentIndex - 1 + slides.length) % slides.length; updateCarousel(); });
    dots.forEach((dot, idx) => {
        dot.addEventListener('click', () => { currentIndex = idx; updateCarousel(); });
    });
    updateCarousel();
    setInterval(() => { currentIndex = (currentIndex + 1) % slides.length; updateCarousel(); }, 6000);
}

// Product Carousel horizontal scroll
const carouselTrackDiv = document.getElementById('productCarouselTrack');
const leftScrollBtn = document.getElementById('carouselScrollLeft');
const rightScrollBtn = document.getElementById('carouselScrollRight');
if (carouselTrackDiv) {
    leftScrollBtn?.addEventListener('click', () => { carouselTrackDiv.scrollBy({ left: -300, behavior: 'smooth' }); });
    rightScrollBtn?.addEventListener('click', () => { carouselTrackDiv.scrollBy({ left: 300, behavior: 'smooth' }); });
}
</script>

<style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
</style>

<?php include __DIR__ . '/components/footer.php'; ?>
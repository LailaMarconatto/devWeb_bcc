<?php
$pageTitle = "Página Inicial";
require_once 'data/produtos.php';
require_once 'components/product-card.php';
require_once 'components/product-grid.php';
require_once 'components/carousel.php';
include 'header.php';
?>

<div class="container mx-auto px-4 py-8">
    <?php renderCarousel(); ?>
    
    <!-- Seção de imagens do produto / Destaques -->
    <div class="mb-16">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Produtos em Destaque</h2>
        <p class="text-gray-600 mb-8">Os produtos mais vendidos da OrangeStore</p>
        <?php 
        $destaques = array_slice($produtos, 0, 4);
        renderProductGrid($destaques);
        ?>
    </div>
    
    <!-- Seção de promoções -->
    <div class="mb-16">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Ofertas Imperdíveis</h2>
            <a href="promocoes.php" class="text-orange-600 hover:text-orange-700 font-semibold">
                Ver todos <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
        <?php 
        $promocoes = getProdutosPromocao($produtos);
        renderProductGrid(array_slice($promocoes, 0, 4));
        ?>
    </div>
    
    <!-- Carrossel de produtos / Categorias -->
    <div class="mb-16 bg-orange-light rounded-xl p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Compre por Categoria</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($categorias as $key => $categoria): ?>
                <a href="categorias.php?cat=<?php echo $key; ?>" class="group">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition">
                        <div class="h-48 overflow-hidden">
                            <img src="https://placehold.co/400x300/FF6B35/white?text=<?php echo urlencode($categoria); ?>" 
                                 alt="<?php echo $categoria; ?>"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="font-semibold text-lg text-gray-800"><?php echo $categoria; ?></h3>
                            <p class="text-orange-600 mt-2">Ver produtos <i class="fas fa-arrow-right"></i></p>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
function addToCart(productId) {
    fetch('carrinho.php?action=add&id=' + productId, {
        method: 'GET'
    }).then(() => {
        location.reload();
    });
}
</script>

<?php include 'footer.php'; ?>
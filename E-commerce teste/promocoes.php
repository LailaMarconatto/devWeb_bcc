<?php
$pageTitle = "Promoções";
require_once 'data/produtos.php';
require_once 'components/product-grid.php';
include 'header.php';

$promocoes = getProdutosPromocao($produtos);
?>

<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Ofertas Especiais</h1>
        <p class="text-gray-600">Produtos com descontos imperdíveis</p>
    </div>
    
    <?php if (count($promocoes) > 0): ?>
        <?php renderProductGrid($promocoes, null); ?>
    <?php else: ?>
        <div class="text-center py-12 bg-white rounded-lg shadow-md">
            <i class="fas fa-tags text-6xl text-gray-400 mb-4"></i>
            <p class="text-gray-600">Nenhum produto em promoção no momento.</p>
        </div>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
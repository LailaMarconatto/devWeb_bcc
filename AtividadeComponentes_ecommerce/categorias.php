<?php
/**
 * categorias.php - Dynamic category page
 */
require_once __DIR__ . '/components/functions.php';

$categorySlug = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$validCategories = ['eletronicos', 'moda', 'casa'];
$products = [];

if (in_array($categorySlug, $validCategories)) {
    $products = getProductsByCategory($categorySlug);
    $categoryDisplay = getCategoryName($categorySlug);
    $title = "$categoryDisplay - StyleStore";
} else {
    $title = "Categoria não encontrada";
    $categoryDisplay = "Categoria inválida";
    $products = [];
}

include __DIR__ . '/components/header.php';
include __DIR__ . '/components/navbar.php';
?>

<main class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800"><?php echo isset($categoryDisplay) ? $categoryDisplay : 'Produtos'; ?></h1>
        <p class="text-gray-500 mt-1">Encontre os melhores produtos dessa categoria</p>
    </div>
    <?php 
        if (!empty($products)) {
            echo renderProductGrid($products, 'md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4');
        } else {
            echo '<div class="bg-white rounded-xl p-8 text-center shadow"><h2 class="text-xl font-semibold text-gray-700">Nenhum produto encontrado nesta categoria.</h2><a href="index.php" class="text-blue-600 underline mt-2 inline-block">Ver todos os produtos</a></div>';
        }
    ?>
</main>

<?php include __DIR__ . '/components/footer.php'; ?>
<?php
/**
 * produto.php - Detailed product page
 */
require_once __DIR__ . '/components/functions.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$product = getProductById($id);

if (!$product) {
    $title = "Produto não encontrado";
    include __DIR__ . '/components/header.php';
    include __DIR__ . '/components/navbar.php';
    echo '<main class="container mx-auto px-4 py-16 text-center"><h1 class="text-2xl font-bold">Produto não encontrado</h1><a href="index.php" class="text-blue-600 underline">Voltar para loja</a></main>';
    include __DIR__ . '/components/footer.php';
    exit;
}

$title = $product['name'] . ' - StyleStore';
include __DIR__ . '/components/header.php';
include __DIR__ . '/components/navbar.php';

$imageUrl = "https://picsum.photos/id/{$product['image_id']}/600/500";
$priceFormatted = number_format($product['price'], 2, ',', '.');
?>

<main class="container mx-auto px-4 py-10">
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="md:flex">
            <div class="md:w-1/2 p-6 bg-gray-100 flex items-center justify-center">
                <img src="<?php echo $imageUrl; ?>" alt="<?php echo $product['name']; ?>" class="rounded-xl object-contain max-h-96 w-full">
            </div>
            <div class="md:w-1/2 p-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-3"><?php echo $product['name']; ?></h1>
                <div class="mb-4"><?php echo renderStarRating($product['rating']); ?></div>
                <p class="text-gray-600 text-lg leading-relaxed mb-6"><?php echo $product['description']; ?></p>
                <div class="text-4xl font-black text-green-700 mb-8">R$ <?php echo $priceFormatted; ?></div>
                <div class="flex gap-4 flex-wrap">
                    <?php echo renderButton('Comprar Agora', '#', 'bg-green-600 hover:bg-green-700 text-lg px-8'); ?>
                    <?php echo renderButton('Adicionar ao Carrinho', '#', 'bg-gray-200 text-gray-800 hover:bg-gray-300'); ?>
                </div>
                <div class="mt-8 border-t pt-6 text-sm text-gray-500">
                    <p>✅ Entrega rápida para todo Brasil</p>
                    <p>✅ Garantia de 12 meses</p>
                    <p>✅ Parcele em até 6x sem juros</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-10">
        <a href="index.php" class="text-blue-600 hover:underline flex items-center gap-1">← Voltar para loja</a>
    </div>
</main>

<?php include __DIR__ . '/components/footer.php'; ?>
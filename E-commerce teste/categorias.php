<?php
$pageTitle = "Categorias";
require_once 'data/produtos.php';
include 'header.php';
?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Nossas Categorias</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php foreach ($categorias as $key => $categoria): ?>
            <a href="produtos.php?categoria=<?php echo $key; ?>" class="group">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <div class="h-64 overflow-hidden">
                        <img src="https://placehold.co/600x400/FF6B35/white?text=<?php echo urlencode($categoria); ?>" 
                             alt="<?php echo $categoria; ?>"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="p-6 text-center">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2"><?php echo $categoria; ?></h2>
                        <p class="text-gray-600 mb-4">Confira nossa seleção especial</p>
                        <span class="inline-block bg-orange-600 text-white px-6 py-2 rounded-lg group-hover:bg-orange-700 transition">
                            Ver Produtos
                        </span>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'footer.php'; ?>
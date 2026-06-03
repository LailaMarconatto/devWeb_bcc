<?php
$pageTitle = "Todos os Produtos";
require_once 'data/produtos.php';
require_once 'components/product-grid.php';
require_once 'components/breadcrumb.php';
include 'header.php';

$categoriaFiltro = $_GET['categoria'] ?? null;
$produtosFiltrados = $produtos;

if ($categoriaFiltro && isset($categorias[$categoriaFiltro])) {
    $produtosFiltrados = array_filter($produtos, function($produto) use ($categoriaFiltro) {
        return $produto['categoria'] === $categoriaFiltro;
    });
}
?>

<div class="container mx-auto px-4 py-8">
    <?php renderBreadcrumb([['nome' => 'Produtos']]); ?>
    
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Sidebar com filtros -->
        <aside class="lg:w-1/4">
            <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                <h3 class="font-bold text-lg mb-4 text-gray-800">Filtros</h3>
                
                <div class="mb-6">
                    <h4 class="font-semibold mb-2 text-gray-700">Categorias</h4>
                    <div class="space-y-2">
                        <a href="produtos.php" class="block text-gray-600 hover:text-orange-600 <?php echo !$categoriaFiltro ? 'text-orange-600 font-semibold' : ''; ?>">
                            Todos os produtos
                        </a>
                        <?php foreach ($categorias as $key => $categoria): ?>
                            <a href="produtos.php?categoria=<?php echo $key; ?>" 
                               class="block text-gray-600 hover:text-orange-600 <?php echo $categoriaFiltro === $key ? 'text-orange-600 font-semibold' : ''; ?>">
                                <?php echo $categoria; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div class="mb-6">
                    <h4 class="font-semibold mb-2 text-gray-700">Preço</h4>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-gray-600">
                            <input type="radio" name="preco" class="text-orange-600"> Até R$ 50
                        </label>
                        <label class="flex items-center gap-2 text-gray-600">
                            <input type="radio" name="preco" class="text-orange-600"> R$ 50 - R$ 100
                        </label>
                        <label class="flex items-center gap-2 text-gray-600">
                            <input type="radio" name="preco" class="text-orange-600"> Acima de R$ 100
                        </label>
                    </div>
                </div>
                
                <button class="w-full bg-orange-600 text-white py-2 rounded-lg hover:bg-orange-700 transition">
                    Aplicar Filtros
                </button>
            </div>
        </aside>
        
        <!-- Grid de produtos -->
        <div class="lg:w-3/4">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    <?php echo $categoriaFiltro ? $categorias[$categoriaFiltro] : 'Todos os Produtos'; ?>
                </h1>
                <div class="flex items-center gap-2">
                    <span class="text-gray-600">Ordenar:</span>
                    <select class="border border-gray-300 rounded-lg px-3 py-1 focus:outline-none focus:border-orange-500">
                        <option>Mais recentes</option>
                        <option>Menor preço</option>
                        <option>Maior preço</option>
                    </select>
                </div>
            </div>
            
            <?php if (count($produtosFiltrados) > 0): ?>
                <?php renderProductGrid($produtosFiltrados); ?>
            <?php else: ?>
                <div class="text-center py-12">
                    <i class="fas fa-box-open text-6xl text-gray-400 mb-4"></i>
                    <p class="text-gray-600">Nenhum produto encontrado nesta categoria.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
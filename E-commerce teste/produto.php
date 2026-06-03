<?php
$pageTitle = "Detalhes do Produto";
require_once 'data/produtos.php';
require_once 'components/breadcrumb.php';
include 'header.php';

$id = $_GET['id'] ?? null;
$produto = $id && isset($produtos[$id]) ? $produtos[$id] : null;

if (!$produto) {
    header('Location: produtos.php');
    exit;
}
?>

<div class="container mx-auto px-4 py-8">
    <?php renderBreadcrumb([
        ['nome' => 'Produtos', 'url' => 'produtos.php'],
        ['nome' => $produto['nome']]
    ]); ?>
    
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="grid md:grid-cols-2 gap-8 p-6 md:p-8">
            <!-- Imagens do produto -->
            <div>
                <div class="mb-4">
                    <img src="<?php echo $produto['imagem']; ?>" 
                         alt="<?php echo $produto['nome']; ?>"
                         class="w-full rounded-lg shadow-md">
                </div>
                <div class="grid grid-cols-3 gap-2">
                    <?php foreach ($produto['imagens'] as $img): ?>
                        <img src="<?php echo $img; ?>" 
                             alt="Imagem do produto" 
                             class="w-full rounded-lg cursor-pointer hover:opacity-75 transition">
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Descrição e informações -->
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-4"><?php echo $produto['nome']; ?></h1>
                
                <div class="mb-4">
                    <?php if ($produto['preco_promocional']): ?>
                        <span class="text-gray-400 line-through text-lg">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></span>
                        <span class="text-orange-600 font-bold text-3xl ml-2">R$ <?php echo number_format($produto['preco_promocional'], 2, ',', '.'); ?></span>
                    <?php else: ?>
                        <span class="text-orange-600 font-bold text-3xl">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="mb-6">
                    <p class="text-gray-700 leading-relaxed"><?php echo $produto['descricao_completa']; ?></p>
                </div>
                
                <div class="mb-6">
                    <h3 class="font-semibold mb-2 text-gray-800">Tamanhos Disponíveis:</h3>
                    <div class="flex gap-2">
                        <button class="w-12 h-12 border-2 border-gray-300 rounded-lg hover:border-orange-600 transition">P</button>
                        <button class="w-12 h-12 border-2 border-gray-300 rounded-lg hover:border-orange-600 transition">M</button>
                        <button class="w-12 h-12 border-2 border-gray-300 rounded-lg hover:border-orange-600 transition">G</button>
                        <button class="w-12 h-12 border-2 border-gray-300 rounded-lg hover:border-orange-600 transition">GG</button>
                    </div>
                </div>
                
                <div class="mb-6">
                    <h3 class="font-semibold mb-2 text-gray-800">Quantidade:</h3>
                    <div class="flex items-center gap-3">
                        <button class="w-10 h-10 border border-gray-300 rounded-lg hover:bg-gray-100">-</button>
                        <input type="number" value="1" min="1" class="w-20 text-center border border-gray-300 rounded-lg py-2">
                        <button class="w-10 h-10 border border-gray-300 rounded-lg hover:bg-gray-100">+</button>
                    </div>
                </div>
                
                <div class="flex gap-4">
                    <button onclick="addToCart(<?php echo $produto['id']; ?>)" 
                            class="flex-1 bg-orange-600 text-white py-3 rounded-lg hover:bg-orange-700 transition font-semibold">
                        <i class="fas fa-cart-plus mr-2"></i> Adicionar ao Carrinho
                    </button>
                    <button class="px-6 py-3 border-2 border-orange-600 text-orange-600 rounded-lg hover:bg-orange-50 transition font-semibold">
                        Comprar Agora
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Avaliações do produto -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Avaliações dos Clientes</h2>
        <?php if (count($produto['avaliacoes']) > 0): ?>
            <div class="space-y-4">
                <?php foreach ($produto['avaliacoes'] as $avaliacao): ?>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center justify-between mb-2">
                            <div>
                                <span class="font-semibold text-gray-800"><?php echo $avaliacao['usuario']; ?></span>
                                <div class="flex items-center gap-1 mt-1">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <i class="fas fa-star <?php echo $i <= $avaliacao['nota'] ? 'text-yellow-400' : 'text-gray-300'; ?>"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <span class="text-sm text-gray-500"><?php echo date('d/m/Y', strtotime($avaliacao['data'])); ?></span>
                        </div>
                        <p class="text-gray-700"><?php echo $avaliacao['comentario']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="bg-white rounded-lg shadow-md p-8 text-center">
                <i class="far fa-star text-4xl text-gray-400 mb-2"></i>
                <p class="text-gray-600">Ainda não há avaliações para este produto.</p>
                <button class="mt-4 text-orange-600 hover:text-orange-700 font-semibold">
                    Seja o primeiro a avaliar
                </button>
            </div>
        <?php endif; ?>
    </div>
    
    <!-- Produtos relacionados -->
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Você Também Pode Gostar</h2>
        <?php
        $relacionados = array_filter($produtos, function($p) use ($produto) {
            return $p['id'] !== $produto['id'] && $p['categoria'] === $produto['categoria'];
        });
        require_once 'components/product-grid.php';
        renderProductGrid(array_slice($relacionados, 0, 4));
        ?>
    </div>
</div>

<script>
function addToCart(productId) {
    fetch('carrinho.php?action=add&id=' + productId)
        .then(() => location.reload());
}
</script>

<?php include 'footer.php'; ?>
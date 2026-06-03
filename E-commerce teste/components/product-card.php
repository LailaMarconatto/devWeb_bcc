<?php
// Componente reutilizável de card de produto
function renderProductCard($produto) {
    $preco = $produto['preco'];
    $preco_promocional = $produto['preco_promocional'];
    $temPromocao = $preco_promocional !== null;
    $precoExibir = $temPromocao ? $preco_promocional : $preco;
    ?>
    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover-scale transition-all duration-300 hover:shadow-2xl group">
        <a href="produto.php?id=<?php echo $produto['id']; ?>" class="block">
            <div class="relative overflow-hidden h-64">
                <img src="<?php echo $produto['imagem']; ?>" 
                     alt="<?php echo $produto['nome']; ?>"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <?php if ($temPromocao): ?>
                    <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                        -<?php echo round((1 - $preco_promocional/$preco) * 100); ?>%
                    </div>
                <?php endif; ?>
            </div>
            <div class="p-4">
                <h3 class="font-semibold text-lg text-gray-800 mb-2 line-clamp-2"><?php echo $produto['nome']; ?></h3>
                <p class="text-gray-600 text-sm mb-3 line-clamp-2"><?php echo $produto['descricao']; ?></p>
                <div class="flex items-center justify-between">
                    <div>
                        <?php if ($temPromocao): ?>
                            <span class="text-gray-400 line-through text-sm">R$ <?php echo number_format($preco, 2, ',', '.'); ?></span>
                            <span class="text-orange-600 font-bold text-xl block">R$ <?php echo number_format($preco_promocional, 2, ',', '.'); ?></span>
                        <?php else: ?>
                            <span class="text-orange-600 font-bold text-xl">R$ <?php echo number_format($preco, 2, ',', '.'); ?></span>
                        <?php endif; ?>
                    </div>
                    <button onclick="event.preventDefault(); addToCart(<?php echo $produto['id']; ?>)" 
                            class="bg-orange-600 text-white px-4 py-2 rounded-lg hover:bg-orange-700 transition flex items-center gap-2">
                        <i class="fas fa-cart-plus"></i>
                        <span class="hidden sm:inline">Comprar</span>
                    </button>
                </div>
            </div>
        </a>
    </div>
    <?php
}
?>
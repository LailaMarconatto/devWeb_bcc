<?php
// Componente de grid de produtos
function renderProductGrid($produtos, $titulo = null) {
    if ($titulo): ?>
        <h2 class="text-2xl font-bold text-gray-800 mb-6"><?php echo $titulo; ?></h2>
    <?php endif; ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <?php foreach ($produtos as $produto): ?>
            <?php renderProductCard($produto); ?>
        <?php endforeach; ?>
    </div>
    <?php
}
?>
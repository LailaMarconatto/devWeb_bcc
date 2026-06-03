<?php
function renderBreadcrumb($items) {
    ?>
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="index.php" class="text-gray-600 hover:text-orange-600 transition">
                    <i class="fas fa-home mr-1"></i> Início
                </a>
            </li>
            <?php foreach ($items as $item): ?>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <?php if (isset($item['url'])): ?>
                            <a href="<?php echo $item['url']; ?>" class="text-gray-600 hover:text-orange-600 transition">
                                <?php echo $item['nome']; ?>
                            </a>
                        <?php else: ?>
                            <span class="text-gray-800 font-medium"><?php echo $item['nome']; ?></span>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ol>
    </nav>
    <?php
}
?>
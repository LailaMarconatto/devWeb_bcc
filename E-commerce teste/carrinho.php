<?php
session_start();
require_once 'data/produtos.php';
include 'header.php';

// Ações do carrinho
if (isset($_GET['action'])) {
    $id = $_GET['id'] ?? null;
    
    if ($_GET['action'] === 'add' && $id && isset($produtos[$id])) {
        if (isset($_SESSION['carrinho'][$id])) {
            $_SESSION['carrinho'][$id]['quantidade']++;
        } else {
            $_SESSION['carrinho'][$id] = [
                'id' => $id,
                'nome' => $produtos[$id]['nome'],
                'preco' => $produtos[$id]['preco_promocional'] ?? $produtos[$id]['preco'],
                'imagem' => $produtos[$id]['imagem'],
                'quantidade' => 1
            ];
        }
    } elseif ($_GET['action'] === 'remove' && $id) {
        unset($_SESSION['carrinho'][$id]);
    } elseif ($_GET['action'] === 'update' && $id && isset($_GET['qty'])) {
        $qty = max(1, intval($_GET['qty']));
        $_SESSION['carrinho'][$id]['quantidade'] = $qty;
    }
    
    // Redirecionar para evitar reenvio do GET
    header('Location: carrinho.php');
    exit;
}

$carrinho = $_SESSION['carrinho'];
$total = 0;
foreach ($carrinho as $item) {
    $total += $item['preco'] * $item['quantidade'];
}
?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Meu Carrinho</h1>
    
    <?php if (empty($carrinho)): ?>
        <div class="bg-white rounded-lg shadow-md p-12 text-center">
            <i class="fas fa-shopping-cart text-6xl text-gray-400 mb-4"></i>
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">Seu carrinho está vazio</h2>
            <p class="text-gray-600 mb-6">Que tal dar uma olhada em nossos produtos?</p>
            <a href="produtos.php" class="inline-block bg-orange-600 text-white px-6 py-3 rounded-lg hover:bg-orange-700 transition">
                <i class="fas fa-store mr-2"></i> Continuar Comprando
            </a>
        </div>
    <?php else: ?>
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Lista de produtos no carrinho -->
            <div class="lg:col-span-2">
                <?php foreach ($carrinho as $id => $item): ?>
                    <div class="bg-white rounded-lg shadow-md p-4 mb-4">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <img src="<?php echo $item['imagem']; ?>" 
                                 alt="<?php echo $item['nome']; ?>"
                                 class="w-32 h-32 object-cover rounded-lg">
                            <div class="flex-1">
                                <h3 class="font-semibold text-lg text-gray-800 mb-2">
                                    <a href="produto.php?id=<?php echo $id; ?>" class="hover:text-orange-600">
                                        <?php echo $item['nome']; ?>
                                    </a>
                                </h3>
                                <p class="text-orange-600 font-bold text-xl mb-2">
                                    R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?>
                                </p>
                                <div class="flex items-center gap-4">
                                    <div class="flex items-center gap-2">
                                        <button onclick="updateQuantity(<?php echo $id; ?>, <?php echo $item['quantidade'] - 1; ?>)" 
                                                class="w-8 h-8 bg-gray-200 rounded-full hover:bg-gray-300 transition">
                                            -
                                        </button>
                                        <span class="font-semibold w-8 text-center"><?php echo $item['quantidade']; ?></span>
                                        <button onclick="updateQuantity(<?php echo $id; ?>, <?php echo $item['quantidade'] + 1; ?>)" 
                                                class="w-8 h-8 bg-gray-200 rounded-full hover:bg-gray-300 transition">
                                            +
                                        </button>
                                    </div>
                                    <button onclick="removeFromCart(<?php echo $id; ?>)" 
                                            class="text-red-600 hover:text-red-700">
                                        <i class="fas fa-trash"></i> Remover
                                    </button>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-gray-600">Subtotal:</p>
                                <p class="font-bold text-gray-800">
                                    R$ <?php echo number_format($item['preco'] * $item['quantidade'], 2, ',', '.'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Resumo do pedido -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Resumo do Pedido</h2>
                    
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal:</span>
                            <span class="font-semibold">R$ <?php echo number_format($total, 2, ',', '.'); ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Frete:</span>
                            <span class="font-semibold text-green-600">Grátis</span>
                        </div>
                        <div class="border-t pt-2 mt-2">
                            <div class="flex justify-between text-lg font-bold">
                                <span>Total:</span>
                                <span class="text-orange-600">R$ <?php echo number_format($total, 2, ',', '.'); ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <a href="checkout.php" class="block w-full bg-orange-600 text-white text-center py-3 rounded-lg hover:bg-orange-700 transition font-semibold">
                        Prosseguir para Checkout
                    </a>
                    
                    <a href="produtos.php" class="block w-full text-center mt-3 text-gray-600 hover:text-orange-600 transition">
                        <i class="fas fa-arrow-left mr-1"></i> Continuar Comprando
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
function updateQuantity(id, qty) {
    if (qty > 0) {
        window.location.href = `carrinho.php?action=update&id=${id}&qty=${qty}`;
    } else {
        removeFromCart(id);
    }
}

function removeFromCart(id) {
    if (confirm('Remover este produto do carrinho?')) {
        window.location.href = `carrinho.php?action=remove&id=${id}`;
    }
}
</script>

<?php include 'footer.php'; ?>
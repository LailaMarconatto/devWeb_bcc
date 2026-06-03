<?php
session_start();
include 'header.php';

$carrinho = $_SESSION['carrinho'] ?? [];
$total = 0;
foreach ($carrinho as $item) {
    $total += $item['preco'] * $item['quantidade'];
}

if (empty($carrinho)) {
    header('Location: carrinho.php');
    exit;
}
?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Finalizar Compra</h1>
    
    <div class="grid lg:grid-cols-2 gap-8">
        <!-- Formulário de checkout -->
        <div>
            <form action="" method="POST" class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Informações Pessoais</h2>
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Nome Completo</label>
                    <input type="text" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Email</label>
                    <input type="email" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Telefone</label>
                    <input type="tel" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
                </div>
                
                <h2 class="text-xl font-bold text-gray-800 mb-4 mt-6">Endereço de Entrega</h2>
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">CEP</label>
                    <input type="text" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Endereço</label>
                    <input type="text" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Número</label>
                        <input type="text" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Complemento</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Cidade</label>
                        <input type="text" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Estado</label>
                        <select required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
                            <option>SP</option>
                            <option>RJ</option>
                            <option>MG</option>
                            <option>RS</option>
                        </select>
                    </div>
                </div>
                
                <h2 class="text-xl font-bold text-gray-800 mb-4 mt-6">Forma de Pagamento</h2>
                
                <div class="space-y-2 mb-6">
                    <label class="flex items-center gap-3">
                        <input type="radio" name="payment" value="card" checked class="text-orange-600">
                        <span>Cartão de Crédito</span>
                    </label>
                    <label class="flex items-center gap-3">
                        <input type="radio" name="payment" value="boleto" class="text-orange-600">
                        <span>Boleto Bancário</span>
                    </label>
                    <label class="flex items-center gap-3">
                        <input type="radio" name="payment" value="pix" class="text-orange-600">
                        <span>PIX</span>
                    </label>
                </div>
                
                <button type="submit" class="w-full bg-orange-600 text-white py-3 rounded-lg hover:bg-orange-700 transition font-semibold">
                    Finalizar Pedido
                </button>
            </form>
        </div>
        
        <!-- Resumo do pedido -->
        <div>
            <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Seu Pedido</h2>
                
                <?php foreach ($carrinho as $item): ?>
                    <div class="flex gap-3 mb-4 pb-4 border-b">
                        <img src="<?php echo $item['imagem']; ?>" alt="<?php echo $item['nome']; ?>" class="w-16 h-16 object-cover rounded">
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800"><?php echo $item['nome']; ?></p>
                            <p class="text-gray-600">Quantidade: <?php echo $item['quantidade']; ?></p>
                            <p class="text-orange-600 font-bold">R$ <?php echo number_format($item['preco'] * $item['quantidade'], 2, ',', '.'); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <div class="space-y-2 pt-4">
                    <div class="flex justify-between">
                        <span>Subtotal:</span>
                        <span>R$ <?php echo number_format($total, 2, ',', '.'); ?></span>
                    </div>
                    <div class="flex justify-between text-lg font-bold">
                        <span>Total:</span>
                        <span class="text-orange-600">R$ <?php echo number_format($total, 2, ',', '.'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
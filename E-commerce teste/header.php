<?php
session_start();
// Inicializar carrinho se não existir
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Função para contar itens no carrinho
function countCarrinho() {
    $total = 0;
    foreach ($_SESSION['carrinho'] as $item) {
        $total += $item['quantidade'];
    }
    return $total;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Orange Store - <?php echo $pageTitle ?? 'Sua Loja Laranja' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hover-scale {
            transition: transform 0.3s ease;
        }
        .hover-scale:hover {
            transform: translateY(-5px);
        }
        .btn-orange {
            background-color: #FF6B35;
            transition: all 0.3s ease;
        }
        .btn-orange:hover {
            background-color: #e55a2b;
            transform: translateY(-2px);
        }
        .text-orange {
            color: #FF6B35;
        }
        .border-orange {
            border-color: #FF6B35;
        }
        .bg-orange-light {
            background-color: #FFF3ED;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header / Cabeçalho -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <!-- Logo -->
                <div class="flex items-center gap-2">
                    <i class="fas fa-store text-3xl text-orange-600"></i>
                    <a href="index.php" class="text-2xl font-bold text-gray-800 hover:text-orange-600 transition">
                        Orange<span class="text-orange-600">Store</span>
                    </a>
                </div>
                
                <!-- Busca -->
                <div class="flex-1 max-w-md w-full">
                    <div class="relative">
                        <input type="text" placeholder="Buscar produtos..." 
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                        <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                    </div>
                </div>
                
                <!-- Ícones do header -->
                <div class="flex items-center gap-6">
                    <a href="perfil.php" class="text-gray-600 hover:text-orange-600 transition">
                        <i class="fas fa-user text-xl"></i>
                    </a>
                    <a href="carrinho.php" class="text-gray-600 hover:text-orange-600 transition relative">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <?php $carrinhoCount = countCarrinho(); ?>
                        <?php if ($carrinhoCount > 0): ?>
                            <span class="absolute -top-2 -right-3 bg-orange-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                                <?php echo $carrinhoCount; ?>
                            </span>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Navegação / Navbar -->
        <nav class="bg-orange-600 text-white">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-center md:justify-start gap-6 py-3">
                    <a href="index.php" class="hover:text-gray-200 transition font-medium">Início</a>
                    <a href="produtos.php" class="hover:text-gray-200 transition font-medium">Produtos</a>
                    <a href="categorias.php" class="hover:text-gray-200 transition font-medium">Categorias</a>
                    <a href="promocoes.php" class="hover:text-gray-200 transition font-medium">Promoções</a>
                    <a href="contato.php" class="hover:text-gray-200 transition font-medium">Contato</a>
                    <a href="sobre.php" class="hover:text-gray-200 transition font-medium">Sobre</a>
                </div>
            </div>
        </nav>
    </header>
    
    <main class="min-h-screen">
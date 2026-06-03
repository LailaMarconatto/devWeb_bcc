<?php
session_start();
$pageTitle = "Meu Perfil";
include 'header.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$usuario = $_SESSION['usuario'];
?>

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Meu Perfil</h1>
    
    <div class="grid md:grid-cols-3 gap-8">
        <!-- Menu lateral -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="text-center mb-6">
                    <i class="fas fa-user-circle text-6xl text-orange-600"></i>
                    <h2 class="text-xl font-bold text-gray-800 mt-2"><?php echo $usuario['nome']; ?></h2>
                    <p class="text-gray-600"><?php echo $usuario['email']; ?></p>
                </div>
                
                <nav class="space-y-2">
                    <a href="#" class="block px-4 py-2 bg-orange-50 text-orange-600 rounded-lg font-semibold">
                        <i class="fas fa-user mr-2"></i> Meus Dados
                    </a>
                    <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                        <i class="fas fa-shopping-bag mr-2"></i> Meus Pedidos
                    </a>
                    <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                        <i class="fas fa-heart mr-2"></i> Lista de Desejos
                    </a>
                    <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-50 rounded-lg transition">
                        <i class="fas fa-map-marker-alt mr-2"></i> Endereços
                    </a>
                    <a href="logout.php" class="block px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition">
                        <i class="fas fa-sign-out-alt mr-2"></i> Sair
                    </a>
                </nav>
            </div>
        </div>
        
        <!-- Conteúdo principal -->
        <div class="md:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Informações Pessoais</h2>
                
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Nome Completo</label>
                        <input type="text" value="<?php echo $usuario['nome']; ?>" 
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Email</label>
                        <input type="email" value="<?php echo $usuario['email']; ?>" 
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Telefone</label>
                        <input type="tel" placeholder="(11) 99999-9999" 
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
                    </div>
                    
                    <div class="flex gap-4">
                        <button type="submit" class="bg-orange-600 text-white px-6 py-2 rounded-lg hover:bg-orange-700 transition">
                            Salvar Alterações
                        </button>
                        <button type="button" class="border border-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-50 transition">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
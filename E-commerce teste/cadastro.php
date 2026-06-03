<?php
$pageTitle = "Cadastro";
include 'header.php';
?>

<div class="container mx-auto px-4 py-8 max-w-md">
    <div class="bg-white rounded-lg shadow-md p-8">
        <div class="text-center mb-6">
            <i class="fas fa-user-plus text-6xl text-orange-600 mb-2"></i>
            <h1 class="text-2xl font-bold text-gray-800">Cadastro</h1>
            <p class="text-gray-600">Crie sua conta gratuitamente</p>
        </div>
        
        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Nome Completo</label>
                <input type="text" required 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Email</label>
                <input type="email" required 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Telefone</label>
                <input type="tel" 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Senha</label>
                <input type="password" required 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Confirmar Senha</label>
                <input type="password" required 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
            </div>
            
            <button type="submit" class="w-full bg-orange-600 text-white py-3 rounded-lg hover:bg-orange-700 transition font-semibold">
                Criar Conta
            </button>
        </form>
        
        <div class="mt-6 text-center">
            <p class="text-gray-600">
                Já tem uma conta? 
                <a href="login.php" class="text-orange-600 hover:text-orange-700 font-semibold">Faça login</a>
            </p>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<?php
session_start();
$pageTitle = "Login";
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    // Simulação de login (em produção, verificaria no banco)
    if ($email === 'teste@email.com' && $senha === '123456') {
        $_SESSION['usuario'] = ['nome' => 'Usuário Teste', 'email' => $email];
        header('Location: perfil.php');
        exit;
    } else {
        $erro = 'Email ou senha inválidos.';
    }
}
?>

<div class="container mx-auto px-4 py-8 max-w-md">
    <div class="bg-white rounded-lg shadow-md p-8">
        <div class="text-center mb-6">
            <i class="fas fa-user-circle text-6xl text-orange-600 mb-2"></i>
            <h1 class="text-2xl font-bold text-gray-800">Login</h1>
            <p class="text-gray-600">Acesse sua conta</p>
        </div>
        
        <?php if (isset($erro)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php echo $erro; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Email</label>
                <input type="email" name="email" required 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Senha</label>
                <input type="password" name="senha" required 
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
            </div>
            
            <div class="mb-4">
                <label class="flex items-center gap-2">
                    <input type="checkbox" class="text-orange-600">
                    <span class="text-gray-600">Lembrar-me</span>
                </label>
            </div>
            
            <button type="submit" class="w-full bg-orange-600 text-white py-3 rounded-lg hover:bg-orange-700 transition font-semibold">
                Entrar
            </button>
        </form>
        
        <div class="mt-6 text-center">
            <p class="text-gray-600">
                Não tem uma conta? 
                <a href="cadastro.php" class="text-orange-600 hover:text-orange-700 font-semibold">Cadastre-se</a>
            </p>
            <a href="#" class="text-sm text-gray-500 hover:text-orange-600 mt-2 inline-block">
                Esqueceu a senha?
            </a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
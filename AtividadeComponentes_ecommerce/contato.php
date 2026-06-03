<?php
/**
 * contato.php - Contact page
 */
require_once __DIR__ . '/components/functions.php';

$title = "Contato - StyleStore";
include __DIR__ . '/components/header.php';
include __DIR__ . '/components/navbar.php';
?>

<main class="container mx-auto px-4 py-12 max-w-4xl">
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-4">Fale Conosco</h1>
    <p class="text-center text-gray-600 mb-12">Estamos prontos para atender você</p>
    
    <div class="grid md:grid-cols-2 gap-10">
        <div class="bg-white p-6 rounded-2xl shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Informações de contato</h2>
            <div class="space-y-4 text-gray-700">
                <p>📍 Endereço: Av. Paulista, 1000 - São Paulo, SP</p>
                <p>📞 Telefone: (11) 4000-1234</p>
                <p>✉️ Email: atendimento@stylestore.com.br</p>
                <p>🕒 Horário: Seg-Sex 9h às 18h</p>
            </div>
            <div class="mt-6">
                <?php echo renderButton('Enviar uma mensagem', '#', 'w-full text-center'); ?>
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-2xl shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Envie sua mensagem</h2>
            <form action="#" method="post" class="space-y-4">
                <div>
                    <label class="block text-gray-700 mb-1">Nome completo</label>
                    <input type="text" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 mb-1">E-mail</label>
                    <input type="email" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 mb-1">Mensagem</label>
                    <textarea rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2"></textarea>
                </div>
                <div>
                    <?php echo renderButton('Enviar', '#', 'bg-green-600 hover:bg-green-700 w-full text-center'); ?>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include __DIR__ . '/components/footer.php'; ?>
<?php
$pageTitle = "Contato";
include 'header.php';
?>

<div class="container mx-auto px-4 py-8">
    <div class="grid md:grid-cols-2 gap-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Entre em Contato</h1>
            <p class="text-gray-600 mb-6">
                Estamos aqui para ajudar! Preencha o formulário ou utilize nossos canais de atendimento.
            </p>
            
            <div class="space-y-4 mb-8">
                <div class="flex items-center gap-3">
                    <i class="fas fa-phone-alt text-orange-600 text-xl"></i>
                    <div>
                        <p class="font-semibold text-gray-800">Telefone</p>
                        <p class="text-gray-600">(11) 9999-9999</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-3">
                    <i class="fas fa-envelope text-orange-600 text-xl"></i>
                    <div>
                        <p class="font-semibold text-gray-800">Email</p>
                        <p class="text-gray-600">contato@orangestore.com.br</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-3">
                    <i class="fas fa-clock text-orange-600 text-xl"></i>
                    <div>
                        <p class="font-semibold text-gray-800">Horário de Atendimento</p>
                        <p class="text-gray-600">Segunda a Sexta: 9h às 18h</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div>
            <form class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Envie uma mensagem</h2>
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Nome</label>
                    <input type="text" required 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Email</label>
                    <input type="email" required 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Assunto</label>
                    <input type="text" required 
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500">
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 mb-2">Mensagem</label>
                    <textarea rows="5" required 
                              class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-orange-500"></textarea>
                </div>
                
                <button type="submit" class="w-full bg-orange-600 text-white py-3 rounded-lg hover:bg-orange-700 transition font-semibold">
                    Enviar Mensagem
                </button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
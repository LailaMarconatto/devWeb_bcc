<?php
$pageTitle = "Sobre Nós";
include 'header.php';
?>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Sobre a OrangeStore</h1>
            <p class="text-xl text-gray-600">Sua loja de confiança desde 2020</p>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Nossa História</h2>
            <p class="text-gray-600 leading-relaxed mb-4">
                A OrangeStore nasceu do sonho de oferecer produtos de qualidade com um atendimento excepcional. 
                Desde nossa fundação em 2020, temos nos dedicado a trazer as melhores opções em moda e acessórios 
                para nossos clientes.
            </p>
            <p class="text-gray-600 leading-relaxed">
                Com uma equipe apaixonada por moda e tecnologia, trabalhamos diariamente para proporcionar 
                a melhor experiência de compra online, com produtos selecionados e um atendimento personalizado.
            </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <div class="text-center">
                <i class="fas fa-shipping-fast text-4xl text-orange-600 mb-3"></i>
                <h3 class="font-bold text-gray-800 mb-2">Entrega Rápida</h3>
                <p class="text-gray-600">Entregamos em todo Brasil</p>
            </div>
            <div class="text-center">
                <i class="fas fa-lock text-4xl text-orange-600 mb-3"></i>
                <h3 class="font-bold text-gray-800 mb-2">Pagamento Seguro</h3>
                <p class="text-gray-600">Ambiente 100% seguro</p>
            </div>
            <div class="text-center">
                <i class="fas fa-headset text-4xl text-orange-600 mb-3"></i>
                <h3 class="font-bold text-gray-800 mb-2">Suporte 24/7</h3>
                <p class="text-gray-600">Atendimento especializado</p>
            </div>
        </div>
        
        <div class="bg-orange-light rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Pronto para fazer parte da OrangeStore?</h2>
            <p class="text-gray-600 mb-6">Junte-se a milhares de clientes satisfeitos!</p>
            <a href="produtos.php" class="inline-block bg-orange-600 text-white px-8 py-3 rounded-lg hover:bg-orange-700 transition font-semibold">
                Começar a Comprar
            </a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
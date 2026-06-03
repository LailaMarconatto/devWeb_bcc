<?php
/**
 * components/navbar.php - Responsive navigation bar
 */
?>
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex flex-wrap justify-between items-center">
        <a href="index.php" class="text-2xl font-bold text-blue-700 hover:text-blue-800 transition">StyleStore</a>
        
        <div class="hidden md:flex space-x-6 font-medium">
            <a href="index.php" class="text-gray-700 hover:text-blue-600 transition">Início</a>
            <a href="categorias.php?categoria=eletronicos" class="text-gray-700 hover:text-blue-600 transition">Eletrônicos</a>
            <a href="categorias.php?categoria=moda" class="text-gray-700 hover:text-blue-600 transition">Moda</a>
            <a href="categorias.php?categoria=casa" class="text-gray-700 hover:text-blue-600 transition">Casa</a>
            <a href="contato.php" class="text-gray-700 hover:text-blue-600 transition">Contato</a>
        </div>
        
        <div class="md:hidden relative">
            <button id="menuBtn" class="text-gray-600 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
            <div id="mobileMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden z-20">
                <a href="index.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Início</a>
                <a href="categorias.php?categoria=eletronicos" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Eletrônicos</a>
                <a href="categorias.php?categoria=moda" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Moda</a>
                <a href="categorias.php?categoria=casa" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Casa</a>
                <a href="contato.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Contato</a>
            </div>
        </div>
    </div>
</nav>
<script>
    (function() {
        var menuBtn = document.getElementById('menuBtn');
        var mobileMenu = document.getElementById('mobileMenu');
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }
    })();
</script>
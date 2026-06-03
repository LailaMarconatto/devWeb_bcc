<?php
/**
 * components/footer.php
 * 
 * Simple footer with copyright and social links.
 */
?>
<footer class="bg-gray-800 text-white mt-auto">
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-center md:text-left">
                <h3 class="text-xl font-bold">StyleStore</h3>
                <p class="text-gray-400 text-sm">Moda, tecnologia e casa em um só lugar</p>
            </div>
            <div class="flex gap-6 text-gray-300 text-sm">
                <a href="#" class="hover:text-white transition">Sobre nós</a>
                <a href="#" class="hover:text-white transition">Política de Privacidade</a>
                <a href="#" class="hover:text-white transition">Termos de Uso</a>
            </div>
            <div class="text-gray-400 text-sm">
                © <?php echo date('Y'); ?> StyleStore - Todos os direitos reservados
            </div>
        </div>
    </div>
</footer>
</body>
</html>
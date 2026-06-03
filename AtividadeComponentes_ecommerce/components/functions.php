<?php
/**
 * components/functions.php - Core data and reusable UI functions
 */

// Product database
function getProducts() {
    return [
        ['id' => 1, 'name' => 'Smartphone Galaxy A54', 'description' => 'Smartphone com tela Super AMOLED de 6.4", 128GB, câmera quádrupla de 50MP e bateria de 5000mAh.', 'price' => 1899.90, 'category' => 'eletronicos', 'rating' => 4.7, 'image_id' => '20'],
        ['id' => 2, 'name' => 'Camiseta Cotton Tech', 'description' => 'Camiseta masculina em algodão orgânico, tecnológica com proteção UV e design minimalista.', 'price' => 79.90, 'category' => 'moda', 'rating' => 4.5, 'image_id' => '30'],
        ['id' => 3, 'name' => 'Mesa de Escritório Ergonômica', 'description' => 'Mesa com tampo de madeira reflorestada, regulagem de altura e estrutura em aço.', 'price' => 549.00, 'category' => 'casa', 'rating' => 4.8, 'image_id' => '41'],
        ['id' => 4, 'name' => 'Fone de Ouvido Bluetooth Pro', 'description' => 'Cancelamento ativo de ruído, 30h de bateria, som Hi-Fi e carregamento rápido.', 'price' => 299.90, 'category' => 'eletronicos', 'rating' => 4.6, 'image_id' => '60'],
        ['id' => 5, 'name' => 'Jaqueta Jeans Premium', 'description' => 'Jaqueta jeans com acabamento em couro ecológico, bolsos funcionais e modelagem slim.', 'price' => 249.90, 'category' => 'moda', 'rating' => 4.3, 'image_id' => '82'],
        ['id' => 6, 'name' => 'Smart TV LED 50" 4K', 'description' => 'Smart TV com HDR10, processador inteligente, compatível com Alexa e Google Assistant.', 'price' => 2799.00, 'category' => 'eletronicos', 'rating' => 4.9, 'image_id' => '15'],
        ['id' => 7, 'name' => 'Conjunto de Lençóis 400 fios', 'description' => 'Lençóis premium 100% algodão egípcio, suave e respirável, para cama queen/king.', 'price' => 189.90, 'category' => 'casa', 'rating' => 4.4, 'image_id' => '99'],
        ['id' => 8, 'name' => 'Tênis Casual Runner', 'description' => 'Tênis leve com amortecimento responsivo, cabedal em malha respirável, solado antiderrapante.', 'price' => 179.90, 'category' => 'moda', 'rating' => 4.6, 'image_id' => '42']
    ];
}

function getProductById($id) {
    $products = getProducts();
    foreach ($products as $product) {
        if ($product['id'] == $id) return $product;
    }
    return null;
}

function getProductsByCategory($categorySlug) {
    $products = getProducts();
    return array_filter($products, function($product) use ($categorySlug) {
        return $product['category'] === $categorySlug;
    });
}

function getCategoryName($slug) {
    $map = ['eletronicos' => 'Eletrônicos', 'moda' => 'Moda', 'casa' => 'Casa & Decoração'];
    return $map[$slug] ?? ucfirst($slug);
}

function renderStarRating($rating) {
    $fullStars = floor($rating);
    $halfStar = ($rating - $fullStars) >= 0.5;
    $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
    
    $html = '<div class="flex items-center">';
    for ($i = 0; $i < $fullStars; $i++) {
        $html .= '<svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>';
    }
    if ($halfStar) {
        $html .= '<svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" style="clip-path: inset(0 50% 0 0)"/></svg>';
    }
    for ($i = 0; $i < $emptyStars; $i++) {
        $html .= '<svg class="w-5 h-5 text-gray-300 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>';
    }
    $html .= '<span class="ml-2 text-sm text-gray-600">(' . number_format($rating, 1) . ')</span></div>';
    return $html;
}

function renderButton($text, $url, $extraClasses = '') {
    return '<a href="' . htmlspecialchars($url) . '" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 shadow-md ' . $extraClasses . '">' . htmlspecialchars($text) . '</a>';
}

function renderProductCard($product) {
    $imageUrl = "https://picsum.photos/id/{$product['image_id']}/400/300";
    $detailUrl = "produto.php?id={$product['id']}";
    $priceFormatted = number_format($product['price'], 2, ',', '.');
    $starsHtml = renderStarRating($product['rating']);
    $productName = htmlspecialchars($product['name']);
    $productDesc = htmlspecialchars($product['description']);
    
    return '
    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 flex flex-col h-full">
        <img src="' . $imageUrl . '" alt="' . $productName . '" class="w-full h-56 object-cover">
        <div class="p-4 flex flex-col flex-grow">
            <h3 class="text-lg font-bold text-gray-800 mb-1">' . $productName . '</h3>
            <div class="mb-2">' . $starsHtml . '</div>
            <p class="text-gray-600 text-sm mb-3 line-clamp-2">' . $productDesc . '</p>
            <div class="flex items-center justify-between mt-auto">
                <span class="text-2xl font-bold text-green-600">R$ ' . $priceFormatted . '</span>
                <a href="' . $detailUrl . '" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg text-sm font-medium transition">Ver detalhes</a>
            </div>
        </div>
    </div>';
}

function renderProductGrid($products, $columns = 'md:grid-cols-3 lg:grid-cols-4') {
    if (empty($products)) {
        return '<div class="text-center py-12 text-gray-500">Nenhum produto encontrado nesta categoria.</div>';
    }
    $html = '<div class="grid grid-cols-1 sm:grid-cols-2 ' . $columns . ' gap-6">';
    foreach ($products as $product) {
        $html .= renderProductCard($product);
    }
    $html .= '</div>';
    return $html;
}

function renderReviewCard($reviewer, $rating, $comment, $avatarId) {
    $starsHtml = renderStarRating($rating);
    $reviewerName = htmlspecialchars($reviewer);
    $commentText = htmlspecialchars($comment);
    $avatarUrl = ($avatarId % 2 == 0) 
        ? "https://randomuser.me/api/portraits/men/{$avatarId}.jpg"
        : "https://randomuser.me/api/portraits/women/{$avatarId}.jpg";
    
    return '
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col h-full">
        <div class="flex items-center gap-4 mb-4">
            <img src="' . $avatarUrl . '" alt="' . $reviewerName . '" class="w-12 h-12 rounded-full object-cover">
            <div>
                <h4 class="font-semibold text-gray-800">' . $reviewerName . '</h4>
                ' . $starsHtml . '
            </div>
        </div>
        <p class="text-gray-600 italic">"' . $commentText . '"</p>
    </div>';
}
?>
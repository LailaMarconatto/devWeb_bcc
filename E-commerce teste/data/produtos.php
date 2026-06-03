<?php
// Simulação de banco de dados com array de produtos
$produtos = [
    1 => [
        'id' => 1,
        'nome' => 'Camiseta Orange Edition',
        'preco' => 89.90,
        'preco_promocional' => 69.90,
        'descricao' => 'Camiseta 100% algodão com estampa exclusiva na cor laranja. Ideal para o dia a dia com muito estilo e conforto.',
        'descricao_completa' => 'Camiseta Orange Edition fabricada com algodão premium. Possui acabamento de alta qualidade, gola reforçada e estampa resistente à lavagem. Disponível nos tamanhos P, M, G e GG.',
        'categoria' => 'camisetas',
        'imagem' => 'https://placehold.co/600x400/FF6B35/white?text=Camiseta+Laranja',
        'imagens' => [
            'https://placehold.co/600x400/FF6B35/white?text=Frente',
            'https://placehold.co/600x400/FF6B35/white?text=Costas'
        ],
        'avaliacoes' => [
            ['usuario' => 'João Silva', 'nota' => 5, 'comentario' => 'Excelente produto!', 'data' => '2024-01-15'],
            ['usuario' => 'Maria Santos', 'nota' => 4, 'comentario' => 'Muito bom, recomendo!', 'data' => '2024-01-20']
        ]
    ],
    2 => [
        'id' => 2,
        'nome' => 'Tênis Esportivo Laranja',
        'preco' => 299.90,
        'preco_promocional' => 249.90,
        'descricao' => 'Tênis esportivo com amortecimento premium e design moderno na cor laranja.',
        'descricao_completa' => 'Tênis desenvolvido para máximo desempenho. Possui solado antiderrapante, cabedal em material respirável e palmilha anatômica.',
        'categoria' => 'calcados',
        'imagem' => 'https://placehold.co/600x400/FF6B35/white?text=Tenis+Laranja',
        'imagens' => [
            'https://placehold.co/600x400/FF6B35/white?text=Lateral',
            'https://placehold.co/600x400/FF6B35/white?text=Superior'
        ],
        'avaliacoes' => [
            ['usuario' => 'Carlos Lima', 'nota' => 5, 'comentario' => 'Muito confortável!', 'data' => '2024-01-18']
        ]
    ],
    3 => [
        'id' => 3,
        'nome' => 'Mochila Orange Pro',
        'preco' => 159.90,
        'preco_promocional' => null,
        'descricao' => 'Mochila resistente com compartimento para notebook de até 15.6".',
        'descricao_completa' => 'Mochila com design ergonômico, alças acolchoadas e diversos compartimentos organizadores. Ideal para trabalho, estudo ou viagens.',
        'categoria' => 'acessorios',
        'imagem' => 'https://placehold.co/600x400/FF6B35/white?text=Mochila+Laranja',
        'imagens' => [
            'https://placehold.co/600x400/FF6B35/white?text=Frente',
            'https://placehold.co/600x400/FF6B35/white?text=Aberta'
        ],
        'avaliacoes' => []
    ],
    4 => [
        'id' => 4,
        'nome' => 'Boné Laranja Flame',
        'preco' => 49.90,
        'preco_promocional' => 39.90,
        'descricao' => 'Boné ajustável com estampa flamejante, perfeito para compor looks descolados.',
        'descricao_completa' => 'Boné em algodão, com regulagem de tamanho e aba curva. Design exclusivo e moderno.',
        'categoria' => 'acessorios',
        'imagem' => 'https://placehold.co/600x400/FF6B35/white?text=Bone+Laranja',
        'imagens' => [
            'https://placehold.co/600x400/FF6B35/white?text=Frente',
            'https://placehold.co/600x400/FF6B35/white?text=Lateral'
        ],
        'avaliacoes' => []
    ],
    5 => [
        'id' => 5,
        'nome' => 'Calça Jeans Laranja',
        'preco' => 189.90,
        'preco_promocional' => null,
        'descricao' => 'Calça jeans moderna com lavagem diferenciada e modelagem slim.',
        'descricao_completa' => 'Calça jeans de alta qualidade, com elastano para maior conforto e mobilidade. Possui bolsos funcionais e acabamento premium.',
        'categoria' => 'calcados',
        'imagem' => 'https://placehold.co/600x400/FF6B35/white?text=Calca+Jeans',
        'imagens' => [
            'https://placehold.co/600x400/FF6B35/white?text=Frente',
            'https://placehold.co/600x400/FF6B35/white?text=Costas'
        ],
        'avaliacoes' => []
    ]
];

// Categorias
$categorias = [
    'camisetas' => 'Camisetas',
    'calcados' => 'Calçados',
    'acessorios' => 'Acessórios'
];

// Produtos em promoção
function getProdutosPromocao($produtos) {
    return array_filter($produtos, function($produto) {
        return $produto['preco_promocional'] !== null;
    });
}
?>
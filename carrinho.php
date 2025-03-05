<?php
session_start();
include('includes/db.php');

// Verifica se um produto foi adicionado
if (isset($_GET['add'])) {
    $id_produto = $_GET['add'];

    // Verifica se o carrinho já existe na sessão
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    // Verifica se o produto já está no carrinho
    if (!in_array($id_produto, $_SESSION['carrinho'])) {
        $_SESSION['carrinho'][] = $id_produto;
    }
}

// Exibe o carrinho
if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
    echo "<h1>Carrinho de Compras</h1>";
    foreach ($_SESSION['carrinho'] as $id_produto) {
        $sql = "SELECT * FROM produtos WHERE id = $id_produto";
        $result = $conn->query($sql);
        $produto = $result->fetch_assoc();
        echo "<p>{$produto['nome']} - R$ " . number_format($produto['preco'], 2, ',', '.') . "</p>";
    }
    echo "<a href='checkout.php'>Finalizar Compra</a>";
} else {
    echo "<p>Seu carrinho está vazio!</p>";
}

$conn->close();
?>

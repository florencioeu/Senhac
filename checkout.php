<?php
session_start();
include('includes/db.php');

if (isset($_SESSION['carrinho']) && count($_SESSION['carrinho']) > 0) {
    echo "<h1>Resumo da Compra</h1>";
    $total = 0;
    foreach ($_SESSION['carrinho'] as $id_produto) {
        $sql = "SELECT * FROM produtos WHERE id = $id_produto";
        $result = $conn->query($sql);
        $produto = $result->fetch_assoc();
        echo "<p>{$produto['nome']} - R$ " . number_format($produto['preco'], 2, ',', '.') . "</p>";
        $total += $produto['preco'];
    }
    echo "<h3>Total: R$ " . number_format($total, 2, ',', '.') . "</h3>";
    echo "<button>Finalizar Compra</button>";
} else {
    echo "<p>Seu carrinho está vazio! <a href='index.php'>Voltar ao catálogo</a></p>";
}

$conn->close();
?>

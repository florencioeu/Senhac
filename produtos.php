<?php
include('includes/db.php');

$sql = "SELECT * FROM produtos"; // Alterar para a sua tabela de produtos
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Site de E-commerce</title>
</head>
<body>
    <h1>Catálogo de Produtos</h1>
    <div class="produtos">
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="produto">
                <img src="assets/images/<?php echo $row['imagem']; ?>" alt="<?php echo $row['nome']; ?>" width="200">
                <h2><?php echo $row['nome']; ?></h2>
                <p>R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?></p>
                <a href="cart.php?add=<?php echo $row['id']; ?>">Adicionar ao carrinho</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>

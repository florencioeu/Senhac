<?php
$host = "localhost";
$user = "root"; // Altere para o seu usuário
$pass = ""; // Altere para a sua senha
$dbname = "ecommerce"; // Nome do banco de dados

$conn = new mysqli($host, $user, $pass, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
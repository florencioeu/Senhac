<?php
session_start();
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['email'] ?? '';
    $senhausuario = $_POST['senha'] ?? '';

    // Preparar a consulta SQL para buscar usuário por email
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $usuario, PDO::PARAM_STR);
    $stmt->execute();

    $usuarioEncontrado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuarioEncontrado) {
        $hashed_password = $usuarioEncontrado['senha'];
        // Verifica a senha usando password_verify (supondo que as senhas estejam hashadas)
        if (password_verify($senhausuario, $hashed_password)) {
            // Armazena dados do usuário na sessão
            $_SESSION['id_usuario'] = $usuarioEncontrado['id_usuario'];
            $_SESSION['nome_usuario'] = $usuarioEncontrado['nome_usuario'];
            $_SESSION['email'] = $usuarioEncontrado['email'];
            $_SESSION['foto'] = $usuarioEncontrado['foto'] ?? 'imagens/default-profile.png';

            // Redireciona para página principal (aqui coloquei sobrenos.html conforme seu código)
            header('Location: sobrenos.html');
            exit();
        } else {
            // Senha inválida
            header('Location: usuario_recusado.php');
            exit();
        }
    } else {
        // Usuário não encontrado
        header('Location: usuario_recusado.php');
        exit();
    }
} else {
    // Caso o script seja acessado por GET ou outro método, redireciona para a página de login
    header('Location: index2.php');
    exit();
}
?>

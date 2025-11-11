<?php
session_start();


$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';


if ($usuario === 'admin' && $senha === '1234') {
    $_SESSION['usuario'] = $usuario;


    if (isset($_POST['lembrar'])) {
        // Salva o nome de usuário por 30 dias
        setcookie('usuario', $usuario, time() + (60 * 60 * 24 * 30), "/");
    } else {
        // Remove o cookie, se existir
        setcookie('usuario', '', time() - 3600, "/");
    }


    header('Location: dashboard.php');
    exit;
} else {
    $_SESSION['erro'] = 'Usuário ou senha inválidos.';
    header('Location: index.php');
    exit;
}

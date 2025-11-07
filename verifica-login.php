<?php
// Inicia a sessão, caso ainda não tenha sido iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {
    // Redireciona para o login com uma mensagem
    header("Location: login.php?erro=nao_logado");
    exit;
}

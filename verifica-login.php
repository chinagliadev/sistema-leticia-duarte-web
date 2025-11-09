<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {
    header("Location: login.php?erro=nao_logado");
    exit;
}

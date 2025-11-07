<?php
session_start();

// Limpa e destrói a sessão
$_SESSION = [];
session_destroy();

// Redireciona para o login
header("Location: login.php");
exit;

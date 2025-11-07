<?php
require_once './config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$nome_usuario = $_SESSION['usuario']['nome'];
$email_usuario = $_SESSION['usuario']['email'];
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<aside class="menu_lateral">
    <section class="opcoes_menu">

        <div class="perfil" onclick="window.location.href='perfil.php'">

            <span class="usuario-info">
                <span class="usuario-nome"><strong><?= $nome_usuario ?></strong></span><br>
                <span class="usuario-email"><?= $email_usuario ?></span>
            </span>
        </div>

        <div class="lista_opcoes">
            <ul>
                <li><i class="home icon"></i><a href="cadastrados.php">Início</a></li>
                <li><i class="chart bar outline icon"></i><a href="formulario-cadastro.php">Cadastrar</a></li>
            </ul>
        </div>
    </section>

    <section class="container_sair">
        <a href="/sistema-leticia-duarte-web/logout.php"><i class="sign-out icon"></i>Sair</a>
    </section>
</aside>

<script>
    const btnMenu = document.getElementById('btn-menu');
    const menu = document.querySelector('.menu_lateral');
    const body = document.body;

    btnMenu.addEventListener('click', () => {
        menu.classList.toggle('ativo');
        body.classList.toggle('menu-aberto');
    });
</script>
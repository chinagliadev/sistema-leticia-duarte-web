<?php
require './config.php';
include './class/Matricula.php';

$matricula = new Matricula();

$ra_aluno = $_GET['idAluno'] ?? '';

if (empty($ra_aluno)) {
    die("Erro: Nenhum aluno selecionado.");
}

$dadosCompletos = $matricula->buscarDadosCompletosAluno($ra_aluno);

if (!$dadosCompletos) {
    die("Erro: Aluno não encontrado.");
}

// Divide os dados conforme retorno da classe
$aluno = $dadosCompletos['aluno'];
$responsavel = $dadosCompletos['responsavel'] ?? [];
$estrutura_familiar = $dadosCompletos['estrutura_familiar'] ?? [];
$pessoas_autorizadas = $dadosCompletos['pessoas_autorizadas'] ?? [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Aluno</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" />
    <link rel="stylesheet" href="./css/sistema.css" />

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui-calendar@0.0.8/dist/calendar.min.js"></script>
    <script src="./js/semantic_ui.js"></script>
    <script src="./js/validacao-formulario.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui-calendar@0.0.8/dist/calendar.min.css">
</head>

<body>
    <button id="btn-menu" class="ui icon button">
        <i class="sidebar icon"></i>
    </button>

    <section class="corpo_pagina">
        <?php include './template/menuLateral.php' ?>

        <main class="conteudo_cadastrados">
            <section class="sessao_cadastro">
                <section class="cabecalho_cadastrados ui segment blue">
                    <h2>Editar <br>Aluno</h2>
                    <img class="tamanho-img ui small image fluid" src="./img/apresentacao_img/Logo Leiticia Duarte.png"
                        alt="logo da leticia duarte">
                </section>

                <form method="post" action="./salvar-edicao-aluno.php" class="ui form form-cadastro-aluno" id="formulario-aluno">
                    <input type="hidden" name="ra_aluno" value="<?= htmlspecialchars($aluno['ra_aluno']) ?>">

                    <?php
                        include './template/cadastro_aluno/aluno.php'; 
                        include './template/cadastro_aluno/responsavel.php';
                        include './template/cadastro_aluno/estrutura-familiar.php';
                        include './template/cadastro_aluno/pessoas-autorizadas.php';
                    ?>

                    <div class="ui error message"></div>
                    <div style="margin-top: 20px;">
                        <button type="submit" class="ui primary button">
                            <i class="save icon"></i> Salvar Alterações
                        </button>
                        <a href="./cadastrados.php" class="ui button">Cancelar</a>
                    </div>
                </form>

                <?php include './template/modal/modal-salvar-dados.php'?>
                <?php include './template/modal/modal-formulario-invalido.php'?>
            </section>
        </main>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</body>
</html>

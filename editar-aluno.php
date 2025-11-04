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

$aluno = $dadosCompletos['aluno'] ?? [];
$endereco = $dadosCompletos['endereco'] ?? [];
$responsavel_1 = $dadosCompletos['responsavel_1'] ?? [];
$responsavel_2 = $dadosCompletos['responsavel_2'] ?? [];
$estrutura_familiar = $dadosCompletos['estrutura_familiar'] ?? [];
$pessoa_autorizada_1 = $dadosCompletos['pessoa_autorizada_1'] ?? [];
$pessoa_autorizada_2 = $dadosCompletos['pessoa_autorizada_2'] ?? [];
$pessoa_autorizada_3 = $dadosCompletos['pessoa_autorizada_3'] ?? [];
$pessoa_autorizada_4 = $dadosCompletos['pessoa_autorizada_4'] ?? [];
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui-calendar@0.0.8/dist/calendar.min.css">

    <script src="./js/semantic_ui.js"></script>
    <script src="./js/validacao-formulario.js"></script>
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
                    <img class="tamanho-img ui small image fluid" src="./img/apresentacao_img/Logo Leiticia Duarte.png" alt="logo da leticia duarte">
                </section>

                <form method="post" action="./salvar-edicao-aluno.php" class="ui form form-cadastro-aluno" id="formulario-aluno">
                    <input type="hidden" name="ra_aluno" value="<?= $aluno['ra_aluno'] ?>">

                    <?php
                    include './template/cadastro_aluno/aluno.php';
                    include './template/cadastro_aluno/responsavel.php';
                    include './template/cadastro_aluno/estrutura-familiar.php';
                    include './template/cadastro_aluno/pessoas-autorizadas.php';
                    ?>
                </form>

                <?php include './template/modal/modal-salvar-dados.php' ?>
                <?php include './template/modal/modal-formulario-invalido.php' ?>
            </section>
        </main>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#txtNomeCrianca').val('<?= $aluno['nome'] ?>');
            $('#txtRaAluno').val('<?= $aluno['ra_aluno'] ?>');
            $('#txtCpfAluno').val('<?= $aluno['cpf'] ?>');
            $('#txtRgAluno').val('<?= $aluno['rg'] ?>');
            $('#txtTurma').val('<?= $aluno['turma'] ?>');
            $('#txtDataNascimento').val('<?= $aluno['data_nascimento'] ?>');
            $('#txtRaca').val('<?= $aluno['cor_raca'] ?>');
            $('#txtCep').val('<?= $endereco['cep'] ?>');
            $('#txtEndereco').val('<?= $aluno['endereco'] ?>');
            $('#txtNumero').val('<?= $aluno['numero'] ?>');
            $('#txtBairro').val('<?= $aluno['bairro'] ?>');
            $('#txtCidade').val('<?= $aluno['cidade'] ?>');
            $('#txtComplemento').val('<?= $aluno['complemento'] ?>');

            <?php if ($aluno['autorizacao_medicacao'] ?? 0) : ?>
                $('#autorizacaoMed').prop('checked', true);
                $('#camposGotas').removeClass('oculto');
                $('#fieldRemedio').removeClass('oculto');
            <?php endif; ?>

            $('#txtGotas').val('<?= $aluno['quantidade_gotas'] ?>');
            $('#txtRemedio').val('<?= $aluno['remedio'] ?>');

            <?php if ($aluno['autorizacao_imagem'] ?? 0) : ?>
                $('input[name="autorizacaoImagem"]').prop('checked', true);
            <?php endif; ?>
        });
    </script>
</body>

</html>
<?php
require './config.php';
include './class/Matricula.php';

$matricula = new Matricula();

$pesquisa = $_GET['txtPesquisar'] ?? '';

if (empty($pesquisa)) {
    $dadosMatricula = $matricula->listarMatricula();
} else {
    $dadosMatricula = $matricula->pesquisarAluno($pesquisa);
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema com seu CSS e sidebar Semantic UI.</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" />
    <link rel="stylesheet" href="./css/sistema.css" />

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
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
            <section class="cabecalho_cadastrados ui segment blue">
                <h2>Alunos<br>Cadastrados</h2>
                <img class="ui small image fluid" src="./img/apresentacao_img/Logo Leiticia Duarte.png"
                    alt="logo da leticia duarte na tela de cadastros de alunos">
            </section>

            <section class="sessao_tabela ui segment yellow">
                <section class="pesquisar_alunos">
                    <div class="ui two column stackable grid">
                        <div class="eight wide column">
                            <form action="./cadastrados.php" method="GET" onsubmit="return validarPesquisar(event)">
                                <div class="ui action fluid input" id="div-pesquisar">
                                    <input name="txtPesquisar" id="txtPesquisar" type="text" placeholder="Pesquisar aluno (Nome/RA/Responsavel)">
                                    <button onclick="validarPesquisar()" class="ui icon primary button">
                                        <i class="search icon"></i>
                                    </button>
                                </div>
                                <div class="ui hidden negative message" id="mensagem-erro-pesquisar" style="margin-top:13px">
                                    <div class="content">
                                        <i class="user icon"></i><span id="pesquisar-erro"></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="eight wide column">
                            <a href="./cadastrados.php" class="ui yellow button right floated"><i class="th list icon"></i> Listar alunos</a>
                        </div>
                    </div>
                </section>
                <table class="ui single line table center aligned">
                    <thead class="background-thead">
                        <tr>
                            <th><i class="id badge icon"></i> Registro do Aluno (RA)</th>
                            <th><i class="user icon"></i> Nome</th>
                            <th><i class="calendar alternate outline icon"></i> Data de Nascimento</th>
                            <th><i class="users icon"></i> Responsável</th>
                            <th><i class="cog icon"></i> Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($dadosMatricula)) { ?>
                            <tr>
                                <td colspan="5">
                                    <div class="ui center aligned">
                                        <img src="img/cadastrados/nenhum_aluno_cadastrado.png" class="ui image medium centered fluid" alt="">
                                            <div class="content">

                                                <div class="ui header">Nenhum Aluno Encontrado</div>

                                                <p>Nenhum aluno encontrado, para cadastrar um aluno clique no botão abaixo</p>

                                                <a href="./formulario-cadastro.php" class="ui small primary button">
                                                    <i class="plus icon"></i> Cadastrar Novo Aluno
                                                </a>

                                            </div>
                                    </div>
                                </td>
                            </tr>

                            <?php } else {
                            foreach ($dadosMatricula as $matricula) { ?>

                                <tr>
                                    <td><?= $matricula['ra_aluno'] ?></td>
                                    <td><?= $matricula['nome_aluno'] ?></td>
                                    <td><?= $matricula['data_nascimento'] ?></td>
                                    <td><?= $matricula['nome_responsavel'] ?></td>
                                    <td>
                                        <button
                                            data-inverted=""
                                            data-tooltip="Detalhes Aluno"
                                            class="ui small icon button blue"
                                            title="Detalhes">
                                            <i class="eye icon"></i>
                                        </button>
                                        <button
                                            data-tooltip="Deletar Aluno"
                                            data-inverted=""
                                            id="btn-deletar-aluno"
                                            type="button"
                                            class="btn-deletar-aluno ui small red icon button"
                                            data-id="<?= $matricula['id'] ?>"
                                            data-ra="<?= $matricula['ra_aluno']?>"
                                            data-nome="<?= $matricula['nome_aluno'] ?>"
                                            title="Excluir">
                                            <i class="trash icon"></i>
                                        </button>
                                        <a href="./editar-aluno.php?idAluno=<?= $matricula['ra_aluno'] ?>"
                                            data-tooltip="Editar Aluno"
                                            data-inverted=""
                                            class="ui small yellow icon button">
                                            <i class="edit icon"></i>
                                        </a>
                                        <a href="./gerar-arquivo-pdf.php?idAluno=<?= $matricula['ra_aluno'] ?>" class="ui small icon button" data-tooltip="Baixar PDF" data-inverted="">
                                            <i class="file pdf outline red icon"></i>
                                        </a>
                                    </td>
                                </tr>

                        <?php }
                        } ?>
                    </tbody>
                </table>
            </section>
        </main>
    </section>
    <?php include './template/modal/modal-excluir-aluno.php' ?>
</body>

</html>
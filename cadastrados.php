<?php
require './config.php';
include './class/Matricula.php';

$matricula = new Matricula();

$dadosMatricula = $matricula->listarMatricula();


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

</head>

<body>

    <button id="btn-menu" class="ui icon button">
        <i class="sidebar icon"></i>
    </button>

    <section class="corpo_pagina">
        <?php include './template/menuLateral.php' ?>

        <main class="conteudo_cadastrados">
            <section class="cabecalho_cadastrados">
                <h2>Alunos<br>Cadastrados</h2>
                <img class="ui small image fluid" src="./img/apresentacao_img/Logo Leiticia Duarte.png"
                    alt="logo da leticia duarte na tela de cadastros de alunos">
            </section>

            <section class="pesquisa_alunos">
                <div class="container_pesquisar ui action input">
                    <input id="txtPesquisar" type="text" placeholder="Pesquisar aluno (Nome/RA/Responsavel)">
                    <button class="ui button primary"><i class="search icon"></i></button>
                </div>
            </section>

            <section class="sessao_tabela">
                <table class="ui single line table center aligned">
                    <thead>
                        <tr>
                            <th>Registro do Aluno (RA)</th>
                            <th>Nome</th>
                            <th>Data de Nascimento</th>
                            <th>Responsável</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dadosMatricula as $matricula) { ?>
                            <tr>
                                <td><?= $matricula['ra_aluno'] ?></td>
                                <td><?= $matricula['nome_aluno'] ?></td>
                                <td><?= $matricula['data_nascimento'] ?></td>
                                <td><?= $matricula['nome_responsavel'] ?></td>
                                <td>
                                    <button class="ui small icon button blue" title="Detalhes">
                                        <i class="eye icon"></i>
                                    </button>
                                    <button
                                        id="btn-deletar-aluno"
                                        type="button"
                                        class="btn-deletar-aluno ui small red icon button"
                                        data-id="<?= $matricula['ra_aluno'] ?>"
                                        data-nome="<?= $matricula['nome_aluno'] ?>"
                                        title="Excluir">
                                        <i class="trash icon"></i>
                                    </button>
                                    <a href="./editar-aluno.php?idAluno=<?= $matricula['ra_aluno'] ?>" class="ui small yellow icon button">
                                        <i class="edit icon"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
        </main>
    </section>
    <?php include './template/modal/modal-excluir-aluno.php' ?>
</body>

</html>
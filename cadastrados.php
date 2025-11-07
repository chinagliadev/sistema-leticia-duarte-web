<?php
require './verifica-login.php';
require './config.php';
include './class/Matricula.php';

$matricula = new Matricula();

$pesquisa = $_GET['txtPesquisar'] ?? '';
$filtro = isset($_GET['campo_filtro']) ? $_GET['campo_filtro'] : '';

if ($filtro) {
    $dadosMatricula = $matricula->filtrarTurma($filtro);;
} else if (empty($pesquisa)) {
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
    <title>Sistema Leticia Duarte.</title>

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
                            <form action="./cadastrados.php" id="formulario_filtro" method="GET">
                                <div class="ui floating labeled icon dropdown button right floated">
                                    <input type="hidden" name="campo_filtro" id="campo_filtro">
                                    <i class="filter icon"></i>
                                    <span class="text">Filtro</span>
                                    <div class="menu ">
                                        <div class="header icon"> <i class="filter icon"></i>Filtrar Turma</div>
                                        <div class="divider"></div>

                                        <div class="ui left pointing dropdown link item" data-value="listarTudo">
                                            <i class="dropdown icon"></i>
                                            Listar Todos
                                            <div class="menu">
                                                <div class="item" data-value="matriculas-ativadas">
                                                    <div class="ui green empty circular label"></div> Matriculas Ativadas
                                                </div>
                                                <div class="item" data-value="matriculas-desativadas">
                                                    <div class="ui red empty circular label"></div> Matriculas Desativadas
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item" data-value="Bercario 2 A">

                                            <div class="ui empty circular label label-bercario"></div> Berçário 2 A
                                        </div>
                                        <div class="item" data-value="Bercario 2 B">
                                            <div class="ui empty circular label label-bercario"></div> Berçário 2 B
                                        </div>
                                        <div class="item" data-value="Bercario 2 C">
                                            <div class="ui empty circular label label-bercario"></div> Berçário 2 C
                                        </div>

                                        <div class="item" data-value="Maternal I A">
                                            <div class="ui empty circular label label-maternal1"></div> Maternal I A
                                        </div>
                                        <div class="item" data-value="Maternal I B">
                                            <div class="ui empty circular label label-maternal1"></div> Maternal I B
                                        </div>
                                        <div class="item" data-value="Maternal I C">
                                            <div class="ui empty circular label label-maternal1"></div> Maternal I C
                                        </div>

                                        <div class="item" data-value="Maternal II A">
                                            <div class="ui empty circular label label-maternal2"></div> Maternal II A
                                        </div>
                                        <div class="item" data-value="Maternal II B">
                                            <div class="ui empty circular label label-maternal2"></div> Maternal II B
                                        </div>

                                        <div class="item" data-value="Multisseriada M.M">
                                            <div class="ui empty circular label label-multisseriada"></div> Multisseriada M.M
                                        </div>
                                        <div class="item" data-value="Multisseriada B.M">
                                            <div class="ui empty circular label label-multisseriada"></div> Multisseriada B.M
                                        </div>

                                    </div>
                                </div>
                            </form>
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
                            <th><i class="users icon"></i> turma</th>
                            <th><i class="users icon"></i> Matricula</th>
                            <th><i class="cog icon"></i> Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($dadosMatricula)) { ?>
                            <tr>
                                <td colspan="7">
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
                            foreach ($dadosMatricula as $matricula) {
                                $status_matricula = '';
                                $cor_label = '';

                                $status_db = $matricula['matricula'];

                                if ($status_db == 1) {
                                    $status_matricula = 'Ativada';
                                    $cor_label = 'green';
                                } else {
                                    $status_matricula = 'Desativada';
                                    $cor_label = 'red';
                                }

                                $cor_label_turma = '';
                                $tipo_turma = $matricula['turma'];

                                if ($tipo_turma === 'Bercario 2 A' || $tipo_turma === 'Bercario 2 B' || $tipo_turma === 'Bercario 2 C') {
                                    $cor_label_turma = 'label-bercario';
                                } else if ($tipo_turma === 'Maternal I A' || $tipo_turma === 'Maternal I B' || $tipo_turma === 'Maternal I C') {
                                    $cor_label_turma = 'label-maternal1';
                                } else if ($tipo_turma === 'Maternal II A' || $tipo_turma === 'Maternal II B' || $tipo_turma === 'Maternal II C') {
                                    $cor_label_turma = 'label-maternal2';
                                } else if ($tipo_turma === 'Multisseriada M.M' || $tipo_turma === 'Multisseriada B.M') {
                                    $cor_label_turma = 'label-multisseriada';
                                }

                                $dataNascimento = $matricula['data_nascimento'] ?? '';
                                if (!empty($dataNascimento) && $dataNascimento !== '0000-00-00') {
                                    $dataObj = DateTime::createFromFormat('Y-m-d', $dataNascimento);
                                    $dataFormatada = $dataObj ? $dataObj->format('d/m/Y') : '';
                                } else {
                                    $dataFormatada = '';
                                }

                            ?>
                                <tr>
                                    <td><?= $matricula['ra_aluno'] ?></td>
                                    <td><?= $matricula['nome_aluno'] ?></td>
                                    <td> <?=$dataFormatada ?></td>
                                    <td><?= $matricula['nome_responsavel'] ?></td>
                                    <td>
                                        <div class="ui <?= $cor_label_turma ?> label white">
                                            <?= $matricula['turma'] ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="ui <?= $cor_label ?> label"><?= $status_matricula ?></div>
                                    </td>
                                    <td>
                                        <button
                                            data-tooltip="Desativar Matricula"
                                            data-inverted=""
                                            id="btn-deletar-aluno"
                                            type="button"
                                            class="btn-deletar-aluno ui small red icon button"
                                            data-id="<?= $matricula['id'] ?>"
                                            data-ra="<?= $matricula['ra_aluno'] ?>"
                                            data-nome="<?= $matricula['nome_aluno'] ?>"
                                            title="Excluir"
                                            <?= ($status_db == 0) ? 'style="display:none;"' : '' ?>>
                                            <i class="trash icon"></i>
                                        </button>
                                        <button
                                            data-tooltip="Ativar Matricula"
                                            data-inverted=""
                                            id="btn-ativar-aluno"
                                            type="button"
                                            class="btn-ativar-aluno ui small green icon button"
                                            data-id="<?= $matricula['id'] ?>"
                                            data-ra="<?= $matricula['ra_aluno'] ?>"
                                            data-nome="<?= $matricula['nome_aluno'] ?>"
                                            title="Ativar"
                                            <?= ($status_db == 1) ? 'style="display:none;"' : '' ?>>
                                            <i class="check icon"></i>
                                        </button>
                                        <a href="./detalhes-aluno.php?idAluno=<?= $matricula['id'] ?>"
                                            data-inverted=""
                                            data-tooltip="Detalhes Aluno"
                                            class="ui small icon button blue"
                                            title="Detalhes">
                                            <i class="eye icon"></i>
                                        </a>
                                        <a href="./editar-aluno.php?idAluno=<?= $matricula['id'] ?>"
                                            data-tooltip="Editar Aluno"
                                            data-inverted=""
                                            class="ui small yellow icon button"
                                            <?= ($status_db == 0) ? 'style="display:none;"' : '' ?>>
                                            <i class="edit icon"></i>
                                        </a>
                                        <a href="./gerar-arquivo-pdf.php?idAluno=<?= $matricula['id'] ?>" class="ui small icon button" data-tooltip="Baixar PDF" data-inverted="">
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
    <?php include  './template/modal/modal-ativar-matricula.php' ?>
    <script>
        $(document).ready(function() {
            $('.ui.dropdown').dropdown({
                onChange: function(value, text, $choice) {
                    if (value) {
                        $('#campo_filtro').val(value);
                        $('#formulario_filtro').submit();
                    }
                }
            });
        });
    </script>
</body>

</html>
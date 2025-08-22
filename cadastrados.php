<?php

$dns = 'mysql:dbname=leticia_duarte;host=127.0.0.1';
$usuario = 'root';
$senha = ''; 

$conn = new PDO($dns, $usuario, $senha);

$scriptConsulta = 'SELECT * FROM tb_alunos';
$scriptConsultaResponsavel = 'SELECT * FROM tb_mae';
$resultadoConsulta = $conn->query($scriptConsulta)->fetchAll();
$resultadoConsultaResponsavel = $conn->query($scriptConsultaResponsavel)->fetchAll();
var_dump($resultadoConsultaResponsavel);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema com seu CSS e sidebar Semantic UI</title>

    <link rel="stylesheet" href="./css/cadastros.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" />

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
</head>

<body>

    <button id="btn-menu" class="ui icon button">
        <i class="sidebar icon"></i>
    </button>

    <section class="corpo_pagina">
        <?php
            include './template/menuLateral.php'
        ?>

        <main class="conteudo_cadastrados">
            <section class="cabecalho_cadastrados">
                <h2>Alunos<br>cadastrados</h2>
                <img class="ui small image fluid" src="./img/apresentacao_img/Logo Leiticia Duarte.png"
                    alt="logo da leticia duarte na tela de cadastros de alunos">
            </section>

            <section class="pesquisa_alunos">
                <div class="container_pesquisar ui action input">
                    <input id="txtPesquisar" type="text" placeholder="Pesquisar aluno (Nome/RA/Responsavel)">
                    <button class="ui button primary"><i class="search icon"></i></button>
                </div>

                <div class="container_filtrar">
                    <button></button>
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
                    <tbody>
                        <?php foreach($resultadoConsulta as $linha){?>
                            <tr>
                                <td><?=$linha['ra_aluno']?></td>
                                <td><?=$linha['nome']?></td>
                                <td><?=$linha['data_nascimento']?></td>
                                
                                <td><?=$linha['responsavel']?></td>
                                <td>
                                    <button class="ui small icon button blue" title="Detalhes">
                                        <i class="eye icon"></i> Detalhes
                                    </button>
                                    <button class="ui small icon button red" title="Excluir">
                                        <i class="trash icon"></i> Excluir
                                    </button>
                                    <button class="ui small icon button yellow" title="Editar">
                                        <i class="edit icon"></i> Editar
                                    </button>
                                </td>
                            </tr>
                            <?php }?>
                        <tr>
                            <td>234567</td>
                            <td>Jamie Harington</td>
                            <td>11/01/2014</td>
                            <td>João Harington</td>
                            <td>
                                <button class="ui small icon button blue" >
                                    <i class="eye icon"></i> Detalhes
                                </button>
                                <button class="ui small icon button red">
                                    <i class="trash icon"></i> Excluir
                                </button>
                                <button class="ui small icon button yellow">
                                    <i class="edit icon"></i> Editar
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>345678</td>
                            <td>Jill Lewis</td>
                            <td>11/05/2014</td>
                            <td>Lucas Lewis</td>
                            <td>
                                <button class="ui small icon button blue">
                                    <i class="eye icon"></i> Detalhes
                                </button>
                                <button class="ui small icon button red">
                                    <i class="trash icon"></i> Excluir
                                </button>
                                <button class="ui small icon button yellow">
                                    <i class="edit icon"></i> Editar
                                </button>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </section>
        </main>
    </section>

    <script>
        const btnMenu = document.getElementById('btn-menu');
        const menu = document.querySelector('.menu_lateral');
        const body = document.body;

        btnMenu.addEventListener('click', () => {
            menu.classList.toggle('ativo');
            body.classList.toggle('menu-aberto');
        });
    </script>
</body>

</html>
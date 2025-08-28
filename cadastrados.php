<?php
$dns = 'mysql:dbname=leticia_duarte;host=127.0.0.1';
$usuario = 'root';
$senha = '';

$conn = new PDO($dns, $usuario, $senha);

// Fazendo o relacionamento direto no SELECT
$scriptConsulta = "
SELECT 
    tb_alunos.ra_aluno, 
    tb_alunos.nome AS nome_aluno, 
    tb_alunos.data_nascimento, 
    tb_mae.nome AS nome_mae
FROM tb_alunos
INNER JOIN tb_matricula 
    ON tb_matricula.aluno = tb_alunos.ra_aluno
INNER JOIN tb_mae 
    ON tb_matricula.mae = tb_mae.id_mae;
";
$resultadoConsulta = $conn->query($scriptConsulta)->fetchAll(PDO::FETCH_ASSOC);
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
        <?php include './template/menuLateral.php' ?>

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
                        <?php foreach ($resultadoConsulta as $linha) { ?>
                            <tr>
                                <td><?= $linha['ra_aluno'] ?></td>
                                <td><?= $linha['nome_aluno'] ?></td>
                                <td><?= $linha['data_nascimento'] ?></td>
                                <td><?= $linha['nome_mae'] ?? 'Não informado' ?></td>
                                <td>
                                    <button class="ui small icon button blue" title="Detalhes">
                                        <i class="eye icon"></i> Detalhes
                                    </button>
                                    <a href="./cadastradosExcluir.php?idExluir=<?= $linha['ra_aluno']?>" class="ui small red icon button" title="Excluir">
                                        <i class="trash icon"></i> Excluir
                                    </a>
                                    <button class="ui small icon button yellow" title="Editar">
                                        <i class="edit icon"></i> Editar
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
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
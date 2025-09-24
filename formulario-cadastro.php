<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" />
    <link rel="stylesheet" href="./css/sistema.css" />

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui-calendar@0.0.8/dist/calendar.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui-calendar@0.0.8/dist/calendar.min.css">
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

            <section class="sessao_cadastro ui segment blue">
                <form method="post" action="./salvar-cadastro-aluno.php" class="ui form form-cadastro-aluno" id="formulario-aluno">
                    <div class="ui top attached tabular menu">
                        <a class="active item" data-tab="cadastro_aluno">Aluno</a>
                        <a class="item" data-tab="responsavel">Responsavel</a>
                        <a class="item" data-tab="estrutura-familiar">Estrutura Familiar</a>
                        <a class="item" data-tab="pessoas-autorizadas">Pessoas Autorizadas</a>

                    </div>

                    <div class="ui tab active" data-tab="cadastro_aluno">
                        <?php include './template/cadastro_aluno/aluno.php'; ?>
                    </div>
                    <div class="ui tab" data-tab="responsavel">
                        <?php include './template/cadastro_aluno/responsavel.php'; ?>
                    </div>
                    <div class="ui tab" data-tab="estrutura-familiar">
                        <?php include './template/cadastro_aluno/estrutura-familiar.php'; ?>
                    </div>
                    <div class="ui tab" data-tab="pessoas-autorizadas">
                        <?php include './template/cadastro_aluno/pessoas-autorizadas.php'; ?>
                    </div>


                </form>
            </section>
        </main>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="./js/validarCadastroAluno.js"></script>
    <script>
        $('.tabular.menu .item').tab();
    </script>
</body>

</html>
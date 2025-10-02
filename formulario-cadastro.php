<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Sistema</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" />
        <link rel="stylesheet" href="./css/sistema.css" />
        <script src="./js/semantic_ui.js"></script>
        
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
            
            <section class="sessao_cadastro">
                <section class="cabecalho_cadastrados ui segment blue">
                    <h2>Cadastro <br>de alunos</h2>
                    <img class="tamanho-img ui small image fluid" src="./img/apresentacao_img/Logo Leiticia Duarte.png"
                    alt="logo da leticia duarte na tela de cadastros de alunos">
                </section>
                <form method="post" action="./salvar-cadastro-aluno.php" class="ui form form-cadastro-aluno" id="formulario-aluno">
                    <?php include './template/cadastro_aluno/aluno.php'; ?>
                    <?php include './template/cadastro_aluno/responsavel.php' ?>
                    <?php include './template/cadastro_aluno/estrutura-familiar.php'; ?>
                    <?php include './template/cadastro_aluno/pessoas-autorizadas.php'; ?>
                    <div class="ui error message"></div>
                </form>
            </section>
        </main>
    </section>
</body>

</html>
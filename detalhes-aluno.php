<?php
require('./class/Matricula.php');
require('./config.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $idAluno = $_GET['idAluno'];

    $matricula = new Matricula();
    $dadosCompleto = $matricula->buscarDadosCompletosAluno($idAluno);


    $aluno = $dadosCompleto['aluno'];
    $endereco = $dadosCompleto['endereco'];
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema Leticia Duarte</title>

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
                <h2>Detalhes<br>Aluno</h2>
                <img class="ui small image fluid" src="./img/apresentacao_img/Logo Leiticia Duarte.png"
                    alt="logo da leticia duarte na tela de cadastros de alunos">
            </section>

            <div class="ui grid relaxed ">
                <div class="two column row">
                    <div class="four wide column">
                        <div class="ui card" style="width: 100%;">
                            <?php
                            $nomeAluno = $aluno['nome'] ?? 'Não Informado'
                            ?>
                            <div class="content background_card_detalhes">
                                <div class="ui header centered">CRIANÇA</div>
                            </div>

                            <div class="content paragrafo-card">

                                        <?php

                                        $rg_aluno = !empty($aluno['rg']) ? $aluno['rg'] : 'Não informado';
                                        $data_nascimento = !empty($aluno['data_nascimento']) ? $aluno['data_nascimento'] : 'Não informado';
                                        $endereco_completo = !empty($endereco['endereco']) ? $endereco['endereco'] : 'Não informado';
                                        $bairro_completo = !empty($endereco['bairro']) ? $endereco['bairro'] : 'Não informado';

                                        $autorizacao = $aluno['autorizacao_febre'];
                                        $autorizo = ($autorizacao === 1) ? 'Sim' : 'Não'; // Assume que 0 ou null é 'Não'

                                        $remedio = !empty($aluno['remedio']) ? $aluno['remedio'] : 'Não informado';

                                        $gotas = (isset($aluno['gotas']) && (int)$aluno['gotas'] > 0) ? $aluno['gotas'] : '0';

                                        ?>
                                        
                                        <div class="ui header centered"><?= $aluno['nome']?></div>
                                        <p style="text-align: center;" class="centered"><strong>RA:</strong> <?=$aluno['ra_aluno']?></p>
                            </div>
                            <div class="extra content">
                                
                            </div>
                        </div>
                    </div>
                    <div class="twelve wide column">
                        <div class="ui card" style="width: 100%;">
                            <div class="content background_card_detalhes">
                                <div class="ui header centered">INDENTIFICAÇÃO DA CRIANÇA</div>
                            </div>

                            <div class="content paragrafo-card">
                                <div class="ui two column grid">

                                    <div class="column">
                                        <?php

                                        $rg_aluno = !empty($aluno['rg']) ? $aluno['rg'] : 'Não informado';
                                        $data_nascimento = !empty($aluno['data_nascimento']) ? $aluno['data_nascimento'] : 'Não informado';
                                        $endereco_completo = !empty($endereco['endereco']) ? $endereco['endereco'] : 'Não informado';
                                        $bairro_completo = !empty($endereco['bairro']) ? $endereco['bairro'] : 'Não informado';

                                        $autorizacao = $aluno['autorizacao_febre'];
                                        $autorizo = ($autorizacao === 1) ? 'Sim' : 'Não'; // Assume que 0 ou null é 'Não'

                                        $remedio = !empty($aluno['remedio']) ? $aluno['remedio'] : 'Não informado';

                                        $gotas = (isset($aluno['gotas']) && (int)$aluno['gotas'] > 0) ? $aluno['gotas'] : '0';

                                        ?>

                                        <p><strong>RG:</strong> <?= $rg_aluno ?></p>
                                        <p><strong>Data de Nascimento:</strong> <?= $data_nascimento ?></p>
                                        <p><strong>Endereço:</strong> <?= $endereco_completo ?></p>
                                        <p><strong>Bairro:</strong> <?= $bairro_completo ?></p>

                                        <p><strong>Em caso de Febre autoriza medicar a criança:</strong> <?= $autorizo ?></p>
                                        <p><strong>Qual Remédio:</strong> <?= $remedio ?></p>
                                        <p><strong>Quantas Gotas:</strong> <?= $gotas ?></p>
                                    </div>

                                    <div class="column">
                                        <p>CPF: <?= $aluno['cpf'] ?></p>
                                        <p>Cor/Raça: <?= $aluno['etnia'] ?></p>
                                        <p>CPF: <?= $aluno['cpf'] ?></p>
                                        <p>Cidade: <?= $endereco['cidade'] ?></p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </section>
</body>
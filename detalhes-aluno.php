<?php
require('./class/Matricula.php');
require('./config.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $idAluno = $_GET['idAluno'];

    $matricula = new Matricula();
    $dadosCompleto = $matricula->buscarDadosCompletosAluno($idAluno);

    $aluno = $dadosCompleto['aluno'];
    $endereco = $dadosCompleto['endereco'];
    $responsavel = $dadosCompleto['responsavel_1'];
    $responsavel2 = $dadosCompleto['responsavel_2'];
    $estrutura_familiar = $dadosCompleto['estrutura_familiar'];

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
                                $autorizo = ($autorizacao === 1) ? 'Sim' : 'Não';

                                $remedio = !empty($aluno['remedio']) ? $aluno['remedio'] : 'Não informado';

                                $gotas = (isset($aluno['gotas']) && (int)$aluno['gotas'] > 0) ? $aluno['gotas'] : '0';
                                $tipo_turma = $aluno['turma'];

                                if ($tipo_turma === 'Bercario 2 A' || $tipo_turma === 'Bercario 2 B' || $tipo_turma === 'Bercario 2 C') {
                                    $cor_label_turma = 'label-bercario';
                                } else if ($tipo_turma === 'Maternal I A' || $tipo_turma === 'Maternal I B' || $tipo_turma === 'Maternal I C') {
                                    $cor_label_turma = 'label-maternal1';
                                } else if ($tipo_turma === 'Maternal II A' || $tipo_turma === 'Maternal II B' || $tipo_turma === 'Maternal II C') {
                                    $cor_label_turma = 'label-maternal2';
                                } else if ($tipo_turma === 'Multisseriada M.M' || $tipo_turma === 'Multisseriada B.M') {
                                    $cor_label_turma = 'label-multisseriada';
                                }

                                ?>

                                <div class="ui header centered"><?= $aluno['nome'] ?></div>
                                <p style="text-align: center;" class="centered"><strong>RA:</strong> <?= $aluno['ra_aluno'] ?></p>
                                <div class="ui center aligned container">
                                    <div class="ui label <?= $cor_label_turma ?>">
                                        <?= $tipo_turma ?>
                                    </div>
                                </div>
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
                                        $autorizo = ($autorizacao === 1) ? 'Sim' : 'Não';

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
                                        <p><strong>CPF:</strong> <?= $aluno['cpf'] ?></p>
                                        <p><strong>Cor/Raça:</strong> <?= $aluno['etnia'] ?></p>
                                        <p><strong>CPF:</strong> <?= $aluno['cpf'] ?></p>
                                        <p><strong>Cidade:</strong> <?= $endereco['cidade'] ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="ui card" style="width: 100%;">
                            <div class="content background_card_detalhes">
                                <div class="ui header centered">INDENTIFICAÇÃO DO RESPONSAVEL</div>
                            </div>

                            <div class="content paragrafo-card">
                                <div class="ui two column grid">

                                    <div class="column">
                                        <?php

                                        $tipo_responsavel = !empty($responsavel['tipo_responsavel']) ? $responsavel['tipo_responsavel'] : 'Não informado';
                                        $nome_responsavel = !empty($responsavel['nome']) ? $responsavel['nome'] : 'Não informado';
                                        $data_nascimento = !empty($responsavel['data_nascimento']) ? $responsavel['data_nascimento'] : 'Não informado';
                                        $escolaridade = !empty($responsavel['escolaridade']) ? $responsavel['escolaridade'] : 'Não informado';
                                        $email = !empty($responsavel['email']) ? $responsavel['email'] : 'Não informado';
                                        $nome_empresa = !empty($responsavel['nome_empresa']) ? $responsavel['nome_empresa'] : 'Não informado';
                                        $telefone_trabalho = !empty($responsavel['telefone_trabalho']) ? $responsavel['telefone_trabalho'] : 'Não informado';
                                        $salario = !empty($responsavel['salario']) ? $responsavel['salario'] : 'Não informado';

                                        $renda_extra = $responsavel['renda_extra'];
                                        $renda_extra = ($renda_extra == 1) ? 'Sim' : 'Não';

                                        $valor_renda_extra = $responsavel['valor_renda_extra'];
                                        $valor_renda_extra = ($renda_extra === 'Sim') ? $valor_renda_extra : 'Não informado';

                                        $gotas = (isset($aluno['gotas']) && (int)$aluno['gotas'] > 0) ? $aluno['gotas'] : '0';

                                        ?>

                                        <p><strong>Nome do Responsavel:</strong> <?= $nome_responsavel ?></p>
                                        <p><strong>Tipo Responsavel:</strong> <?= $tipo_responsavel ?></p>
                                        <p><strong>Data de Nascimento:</strong> <?= $data_nascimento ?></p>
                                        <p><strong>Escolaridade:</strong> <?= $escolaridade ?></p>

                                        <p><strong>Email:</strong> <?= $email ?></p>
                                        <p><strong>Nome da empresa:</strong> <?= $nome_empresa ?></p>
                                        <p><strong>Telefone do trabalho:</strong> <?= $telefone_trabalho ?></p>
                                        <p><strong>Salário:</strong> <?= $salario ?></p>
                                    </div>

                                    <div class="column">
                                        <p><strong>Estado Civil:</strong> <?= $aluno['cpf'] ?></p>
                                        <p><strong>Telefone:</strong> <?= $aluno['etnia'] ?></p>
                                        <p><strong>Profissão:</strong> <?= $aluno['cpf'] ?></p>
                                        <p><strong>Horario:</strong> <?= $endereco['cidade'] ?></p>
                                        <p><strong>Possui Outra Renda:</strong> <?= $renda_extra ?></p>
                                        <p><strong>Valor renda extra:</strong><?= $valor_renda_extra ?></p>
                                    </div>


                                </div>


                                <?php if (!empty($responsavel2['nome'])) { ?>
                                    <div class="ui divider horizontal">Segundo Responsável</div>
                                    <div class="ui two column grid">
                                        <div class="column">
                                            <?php
                                            $tipo_responsavel = !empty($responsavel2['tipo_responsavel']) ? $responsavel2['tipo_responsavel'] : 'Não informado';
                                            $nome_responsavel = !empty($responsavel2['nome']) ? $responsavel2['nome'] : 'Não informado';
                                            $data_nascimento = !empty($responsavel2['data_nascimento']) ? $responsavel2['data_nascimento'] : 'Não informado';
                                            $escolaridade = !empty($responsavel2['escolaridade']) ? $responsavel2['escolaridade'] : 'Não informado';
                                            $email = !empty($responsavel2['email']) ? $responsavel2['email'] : 'Não informado';
                                            $nome_empresa = !empty($responsavel2['nome_empresa']) ? $responsavel2['nome_empresa'] : 'Não informado';
                                            $telefone_trabalho = !empty($responsavel2['telefone_trabalho']) ? $responsavel2['telefone_trabalho'] : 'Não informado';
                                            $salario = !empty($responsavel2['salario']) ? $responsavel2['salario'] : 'Não informado';

                                            $renda_extra = $responsavel2['renda_extra'] ?? 0;
                                            $renda_extra = ($renda_extra == 1) ? 'Sim' : 'Não';

                                            $valor_renda_extra = $responsavel2['valor_renda_extra'] ?? 'Não informado';
                                            $valor_renda_extra = ($renda_extra === 'Sim') ? $valor_renda_extra : 'Não informado';
                                            ?>

                                            <p><strong>Nome do Responsável:</strong> <?= $nome_responsavel ?></p>
                                            <p><strong>Tipo Responsável:</strong> <?= $tipo_responsavel ?></p>
                                            <p><strong>Data de Nascimento:</strong> <?= $data_nascimento ?></p>
                                            <p><strong>Escolaridade:</strong> <?= $escolaridade ?></p>
                                            <p><strong>Email:</strong> <?= $email ?></p>
                                            <p><strong>Nome da empresa:</strong> <?= $nome_empresa ?></p>
                                            <p><strong>Telefone do trabalho:</strong> <?= $telefone_trabalho ?></p>
                                            <p><strong>Salário:</strong> <?= $salario ?></p>
                                        </div>

                                        <div class="column <?= $oculto ?>">
                                            <p><strong>Possui Outra Renda:</strong> <?= $renda_extra ?></p>
                                            <p><strong>Valor Renda Extra:</strong> <?= $valor_renda_extra ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>

                        <!-- Estrutura Familiar -->

                        <div class="ui card" style="width: 100%;">
                            <div class="content background_card_detalhes">
                                <div class="ui header centered">ESTRUTURA FAMILIAR</div>
                            </div>

                            <div class="content paragrafo-card">
                                <div class="ui two column grid">

                                    <div class="column">
                                        <?php

                                        $numero_filhos = !empty($estrutura_familiar['numero_filhos']) ? $estrutura_familiar['numero_filhos'] : 'Não informado';
                                        $transportes = [];

                                        if (!empty($estrutura_familiar['transporte_carro']) && $estrutura_familiar['transporte_carro'] == 1) {
                                            $transportes[] = 'Carro';
                                        }

                                        if (!empty($estrutura_familiar['transporte_van']) && $estrutura_familiar['transporte_van'] == 1) {
                                            $transportes[] = 'Van';
                                        }

                                        if (!empty($estrutura_familiar['transporte_a_pe']) && $estrutura_familiar['transporte_a_pe'] == 1) {
                                            $transportes[] = 'A pé';
                                        }

                                        if (!empty($estrutura_familiar['transporte_outros_desc'])) {
                                            $transportes[] = $estrutura_familiar['transporte_outros_desc'];
                                        }

                                        $transporte_selecionado = !empty($transportes) ? implode(', ', $transportes) : 'Não informado';

                                        $recebe_bolsa_familia = isset($estrutura_familiar['recebe_bolsa_familia'])
                                            ? ($estrutura_familiar['recebe_bolsa_familia'] == 1 ? 'Sim' : 'Não')
                                            : 'Não informado';

                                        $pais_vivem_juntos = isset($estrutura_familiar['pais_vivem_juntos'])
                                            ? ($estrutura_familiar['pais_vivem_juntos'] == 1 ? 'Sim' : 'Não')
                                            : 'Não informado';

                                        $tipo_moradia = !empty($estrutura_familiar['tipo_moradia']) ? $estrutura_familiar['tipo_moradia'] : 'Não informado';
                                        $valor_bolsa_familia = (isset($estrutura_familiar['recebe_bolsa_familia']) && $estrutura_familiar['recebe_bolsa_familia'] == 1)
                                            ? (!empty($estrutura_familiar['valor']) ? $estrutura_familiar['valor'] : 'Não informado')
                                            : 'Não recebe';

                                        $valor_aluguel = !empty($estrutura_familiar['valor_aluguel']) ? $estrutura_familiar['valor_aluguel'] : 'Não informado';

                                        ?>

                                        <p><strong>Numero de Filhos: </strong> <?= $estrutura_familiar['numero_filhos'] ?></p>
                                        <p><strong>Tipo de transporte: </strong><?= $transporte_selecionado ?></p>
                                        <p><strong>Recebe Bolsa Familia: </strong> <?= $recebe_bolsa_familia ?></p>
                                        <p><strong>Tipo da Moradia: </strong> <?= $tipo_moradia ?></p>
                                    </div>

                                    <div class="column">
                                        <p><strong>Pais vivem juntos:</strong> <?= $pais_vivem_juntos ?></p>
                                        <p><strong>Valor bolsa familia:</strong> <?= $valor_bolsa_familia ?></p>
                                        <p><strong>Valor do Aluguel:</strong> <?= $valor_aluguel ?></p>
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
<?php
require('./class/Matricula.php');
require('./config.php');

// Função para formatar a data do banco de dados (YYYY-MM-DD) para o formato brasileiro (DD/MM/YYYY)
function formatarDataBrasileira($data_db)
{
    // Verifica se a data está vazia ou é uma data nula do banco
    if (empty($data_db) || $data_db === '0000-00-00') {
        return 'Não informado';
    }
    // Converte e formata
    return date('d/m/Y', strtotime($data_db));
}

// Função para retornar 'Sim' ou 'Não' com base no valor booleano
function simNao($valor)
{
    if (!isset($valor)) return 'Não informado';
    return $valor == 1 ? 'Sim' : 'Não';
}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $idAluno = $_GET['idAluno'];

    $matricula = new Matricula();
    $dadosCompleto = $matricula->buscarDadosCompletosAluno($idAluno);

    $aluno = $dadosCompleto['aluno'];
    $endereco = $dadosCompleto['endereco'];
    $responsavel = $dadosCompleto['responsavel_1'];
    $responsavel2 = $dadosCompleto['responsavel_2'];
    $estrutura_familiar = $dadosCompleto['estrutura_familiar'];
    $pessoa_autorizada_1 = $dadosCompleto['pessoa_autorizada_1'];
    $pessoa_autorizada_2 = $dadosCompleto['pessoa_autorizada_2'];
    $pessoa_autorizada_3 = $dadosCompleto['pessoa_autorizada_3'];
    $pessoa_autorizada_4 = $dadosCompleto['pessoa_autorizada_4'];
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
                <div class="ui stackable two column row">
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
                                // APLICANDO A FORMATAÇÃO DE DATA AQUI
                                $data_nascimento = formatarDataBrasileira($aluno['data_nascimento'] ?? null);
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
                                } else {
                                    $cor_label_turma = 'blue'; // Cor padrão caso não caia em nenhuma classe
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
                                <a href="./gerar-arquivo-pdf.php?idAluno=<?=$aluno['ra_aluno']?>">
                                <div class="ui bottom attached button red">
                                        <i class="file pdf outline icon"></i>
                                        Gerar PDF do <?=$aluno['nome']?>
                                    </div>
                                </a>
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
                                        // Variável $data_nascimento já está formatada acima.
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
                                <div class="ui stackable two column grid">

                                    <div class="column">
                                        <?php

                                        $tipo_responsavel = !empty($responsavel['tipo_responsavel']) ? $responsavel['tipo_responsavel'] : 'Não informado';
                                        $nome_responsavel = !empty($responsavel['nome']) ? $responsavel['nome'] : 'Não informado';
                                        // APLICANDO A FORMATAÇÃO DE DATA AQUI
                                        $data_nascimento_resp1 = formatarDataBrasileira($responsavel['data_nascimento'] ?? null);
                                        $escolaridade = !empty($responsavel['escolaridade']) ? $responsavel['escolaridade'] : 'Não informado';
                                        $email = !empty($responsavel['email']) ? $responsavel['email'] : 'Não informado';
                                        $nome_empresa = !empty($responsavel['nome_empresa']) ? $responsavel['nome_empresa'] : 'Não informado';
                                        $telefone_trabalho = !empty($responsavel['telefone_trabalho']) ? $responsavel['telefone_trabalho'] : 'Não informado';
                                        $salario = !empty($responsavel['salario']) ? $responsavel['salario'] : 'Não informado';

                                        $renda_extra = $responsavel['renda_extra'] ?? 0;
                                        $renda_extra = ($renda_extra == 1) ? 'Sim' : 'Não';

                                        $valor_renda_extra = $responsavel['valor_renda_extra'];
                                        $valor_renda_extra = ($renda_extra === 'Sim' && !empty($valor_renda_extra)) ? $valor_renda_extra : 'Não informado';

                                        $gotas = (isset($aluno['gotas']) && (int)$aluno['gotas'] > 0) ? $aluno['gotas'] : '0';

                                        ?>

                                        <p><strong>Nome do Responsavel:</strong> <?= $nome_responsavel ?></p>
                                        <p><strong>Tipo Responsavel:</strong> <?= $tipo_responsavel ?></p>
                                        <p><strong>Data de Nascimento:</strong> <?= $data_nascimento_resp1 ?></p>
                                        <p><strong>Escolaridade:</strong> <?= $escolaridade ?></p>

                                        <p><strong>Email:</strong> <?= $email ?></p>
                                        <p><strong>Nome da empresa:</strong> <?= $nome_empresa ?></p>
                                        <p><strong>Telefone do trabalho:</strong> <?= $telefone_trabalho ?></p>
                                        <p><strong>Salário:</strong> <?= $salario ?></p>
                                    </div>

                                    <div class="column">
                                        <p><strong>Estado Civil:</strong> <?= $responsavel['estado_civil'] ?? 'Não informado' ?></p>
                                        <p><strong>Telefone:</strong> <?= $responsavel['telefone'] ?? 'Não informado' ?></p>
                                        <p><strong>Profissão:</strong> <?= $responsavel['profissao'] ?? 'Não informado' ?></p>
                                        <p><strong>Horario:</strong> <?= $responsavel['horario'] ?? 'Não informado' ?></p>
                                        <p><strong>Possui Outra Renda:</strong> <?= $renda_extra ?></p>
                                        <p><strong>Valor renda extra:</strong><?= $valor_renda_extra ?></p>
                                    </div>


                                </div>


                                <?php if (!empty($responsavel2['nome'])) { ?>
                                    <div class="ui divider horizontal">Segundo Responsável</div>
                                    <div class="ui stackable two column grid">
                                        <div class="column">
                                            <?php
                                            $tipo_responsavel = !empty($responsavel2['tipo_responsavel']) ? $responsavel2['tipo_responsavel'] : 'Não informado';
                                            $nome_responsavel = !empty($responsavel2['nome']) ? $responsavel2['nome'] : 'Não informado';
                                            // APLICANDO A FORMATAÇÃO DE DATA AQUI
                                            $data_nascimento_resp2 = formatarDataBrasileira($responsavel2['data_nascimento'] ?? null);
                                            $escolaridade = !empty($responsavel2['escolaridade']) ? $responsavel2['escolaridade'] : 'Não informado';
                                            $email = !empty($responsavel2['email']) ? $responsavel2['email'] : 'Não informado';
                                            $nome_empresa = !empty($responsavel2['nome_empresa']) ? $responsavel2['nome_empresa'] : 'Não informado';
                                            $telefone_trabalho = !empty($responsavel2['telefone_trabalho']) ? $responsavel2['telefone_trabalho'] : 'Não informado';
                                            $salario = !empty($responsavel2['salario']) ? $responsavel2['salario'] : 'Não informado';

                                            $renda_extra = $responsavel2['renda_extra'] ?? 0;
                                            $renda_extra = ($renda_extra == 1) ? 'Sim' : 'Não';

                                            $valor_renda_extra = $responsavel2['valor_renda_extra'] ?? 'Não informado';
                                            $valor_renda_extra = ($renda_extra === 'Sim' && !empty($valor_renda_extra)) ? $valor_renda_extra : 'Não informado';
                                            ?>

                                            <p><strong>Nome do Responsável:</strong> <?= $nome_responsavel ?></p>
                                            <p><strong>Tipo Responsável:</strong> <?= $tipo_responsavel ?></p>
                                            <p><strong>Data de Nascimento:</strong> <?= $data_nascimento_resp2 ?></p>
                                            <p><strong>Escolaridade:</strong> <?= $escolaridade ?></p>
                                            <p><strong>Email:</strong> <?= $email ?></p>
                                            <p><strong>Nome da empresa:</strong> <?= $nome_empresa ?></p>
                                            <p><strong>Telefone do trabalho:</strong> <?= $telefone_trabalho ?></p>
                                            <p><strong>Salário:</strong> <?= $salario ?></p>
                                        </div>

                                        <div class="column <?= $oculto ?? '' ?>">
                                            <p><strong>Estado Civil:</strong> <?= $responsavel2['estado_civil'] ?? 'Não informado' ?></p>
                                            <p><strong>Telefone:</strong> <?= $responsavel2['telefone'] ?? 'Não informado' ?></p>
                                            <p><strong>Profissão:</strong> <?= $responsavel2['profissao'] ?? 'Não informado' ?></p>
                                            <p><strong>Horario:</strong> <?= $responsavel2['horario'] ?? 'Não informado' ?></p>
                                            <p><strong>Possui Outra Renda:</strong> <?= $renda_extra ?></p>
                                            <p><strong>Valor Renda Extra:</strong> <?= $valor_renda_extra ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>

                        <div class="ui card" style="width: 100%;">
                            <div class="content background_card_detalhes">
                                <div class="ui header centered">ESTRUTURA FAMILIAR</div>
                            </div>

                            <div class="content paragrafo-card">
                                <div class="ui stackable two column grid">

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

                                        $recebe_bolsa_familia = simNao($estrutura_familiar['recebe_bolsa_familia'] ?? null);

                                        $pais_vivem_juntos = simNao($estrutura_familiar['pais_vivem_juntos'] ?? null);

                                        $tipo_moradia = !empty($estrutura_familiar['tipo_moradia']) ? $estrutura_familiar['tipo_moradia'] : 'Não informado';
                                        $valor_bolsa_familia = ($recebe_bolsa_familia === 'Sim')
                                            ? (!empty($estrutura_familiar['valor']) ? $estrutura_familiar['valor'] : 'Não informado')
                                            : 'Não recebe';

                                        $valor_aluguel = !empty($estrutura_familiar['valor_aluguel']) ? $estrutura_familiar['valor_aluguel'] : 'Não informado';

                                        $ja_fez_cirurgia = simNao($estrutura_familiar['ja_fez_cirurgia'] ?? null);
                                        $qual_cirurgia = !empty($estrutura_familiar['qual_cirurgia']) ? $estrutura_familiar['qual_cirurgia'] : 'Não informado';
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
                                    <div class="ui label-detalhes label" style="width: 100%;text-align:center">INFORMAÇÕES IMPORTANTES SOBRE A CRIANÇA</div>
                                    <div class="column">
                                        <?php

                                        $possui_convenio = simNao($estrutura_familiar['possui_convenio'] ?? null);
                                        $qual_convenio = !empty($estrutura_familiar['qual_convenio']) ? $estrutura_familiar['qual_convenio'] : 'Não informado';

                                        $portador_necessidade_especial = simNao($estrutura_familiar['portador_necessidade_especial'] ?? null);
                                        $qual_necessidade_especial = !empty($estrutura_familiar['qual_necessidade_especial']) ? $estrutura_familiar['qual_necessidade_especial'] : 'Não informado';

                                        $possui_alergia = simNao($estrutura_familiar['possui_alergia'] ?? null);
                                        $qual_alergia = !empty($estrutura_familiar['especifique_alergia']) ? $estrutura_familiar['especifique_alergia'] : 'Não informado';

                                        $tomou_vacina = simNao($estrutura_familiar['vacina_catapora_varicela'] ?? null);

                                        $doencas_campos = [
                                            'doenca_anemia' => 'Anemia',
                                            'doenca_bronquite' => 'Bronquite',
                                            'doenca_catapora' => 'Catapora',
                                            'doenca_covid' => 'Covid',
                                            'doenca_cardiaca' => 'Doença Cardíaca',
                                            'doenca_meningite' => 'Meningite',
                                            'doenca_pneumonia' => 'Pneumonia',
                                            'doenca_convulsao' => 'Convulsão',
                                            'doenca_diabete' => 'Diabetes',
                                            'doenca_refluxo' => 'Refluxo'
                                        ];

                                        $doencas_list = [];
                                        foreach ($doencas_campos as $campo => $nome) {
                                            if (!empty($estrutura_familiar[$campo]) && $estrutura_familiar[$campo] == 1) {
                                                $doencas_list[] = $nome;
                                            }
                                        }

                                        if (!empty($estrutura_familiar['outras_doencas'])) {
                                            $doencas_list[] = $estrutura_familiar['outras_doencas'];
                                        }

                                        $doencas_string = !empty($doencas_list) ? implode(', ', $doencas_list) : 'Não informado';
                                        ?>

                                        <p><strong>Possui convênio: </strong> <?= $possui_convenio ?></p>
                                        <p><strong>Qual convênio: </strong> <?= $qual_convenio ?></p>

                                        <p><strong>Portador de alguma necessidade especial: </strong> <?= $portador_necessidade_especial ?></p>
                                        <p><strong>Qual necessidade especial: </strong> <?= $qual_necessidade_especial ?></p>

                                        <p><strong>Possui alergia: </strong> <?= $possui_alergia ?></p>
                                        <p><strong>Qual alergia: </strong> <?= $qual_alergia ?></p>
                                    </div>
                                    <div class="column">
                                        <p><strong>Já fez cirurgia: </strong> <?= $ja_fez_cirurgia ?></p>
                                        <p><strong>Qual cirurgia: </strong> <?= $qual_cirurgia ?></p>
                                        <p><strong>Tomou vacina contra catapora ou varicela: </strong> <?= $tomou_vacina ?></p>
                                        <p><strong>Doença que a criança já teve:</strong> <?= $doencas_string ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="ui card" style="width: 100%;">
                            <div class="content background_card_detalhes">
                                <div class="ui header centered">PESSOAS AUTORIZADAS A BUSCAR MEU FILHO(A) NA CRECHE</div>
                            </div>

                            <div class="content paragrafo-card">
                                <div class="ui stackable two column grid">
                                    <?php
                                    $pessoas_autorizadas = [
                                        $pessoa_autorizada_1 ?? null,
                                        $pessoa_autorizada_2 ?? null,
                                        $pessoa_autorizada_3 ?? null,
                                        $pessoa_autorizada_4 ?? null
                                    ];

                                    $temPessoas = false;

                                    foreach ($pessoas_autorizadas as $pessoa) {
                                        if (!empty($pessoa['nome'])) {
                                            $temPessoas = true;
                                            $nome = $pessoa['nome'] ?? 'Não informado';
                                            $cpf = $pessoa['cpf'] ?? 'Não informado';
                                            $celular = $pessoa['celular'] ?? 'Não informado';
                                            $parentesco = $pessoa['parentesco'] ?? 'Não informado';
                                    ?>
                                            <div class="column">
                                                <p><strong>Nome:</strong> <?= $nome ?></p>
                                                <p><strong>CPF:</strong> <?= $cpf ?></p>
                                            </div>
                                            <div class="column">
                                                <p><strong>Telefone:</strong> <?= $celular ?></p>
                                                <p><strong>Parentesco:</strong> <?= $parentesco ?></p>
                                            </div>
                                    <?php
                                        }
                                    }

                                    if (!$temPessoas) {
                                        echo '<p><em>Nenhuma pessoa autorizada informada.</em></p>';
                                    }
                                    ?>
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

</html>
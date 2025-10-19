<?php
require './config.php';
include './class/Matricula.php';

$matricula = new Matricula();

$ra_aluno = $_GET['idAluno'] ?? '';

$dadosCompletos = $matricula->buscarDadosCompletosAluno($ra_aluno);

if (!$dadosCompletos) {
    die("Erro: Aluno não encontrado ou ID inválido.");
}

$aluno = $dadosCompletos['aluno'];
$endereco = $dadosCompletos['endereco'];
$resp1 = $dadosCompletos['responsavel_1'];
$resp2 = $dadosCompletos['responsavel_2'];
$estrutura = $dadosCompletos['estrutura_familiar'];
$autorizados = $dadosCompletos['autorizados'];

var_dump($resp1)
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" />
    <link rel="stylesheet" href="./css/sistema.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui-calendar@0.0.8/dist/calendar.min.css">

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui-calendar@0.0.8/dist/calendar.min.js"></script>

    <script src="./js/validacao-formulario.js"></script>
    <script src="./js/semantic_ui.js"></script>

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
                    <h2>Editar <br>alunos</h2>
                    <img class="tamanho-img ui small image fluid" src="./img/apresentacao_img/Logo Leiticia Duarte.png"
                        alt="logo da leticia duarte na tela de cadastros de alunos">
                </section>
                <form method="post" action="./editar-aluno.php" class="ui form form-cadastro-aluno" id="formulario-aluno">
                    <section class="ui segment blue raised ">
                        <div class="fields">
                            <div class="seven wide field" id="validacao-nome">
                                <label for="txtNomeCrianca">Nome da Criança</label>
                                <input type="text" id="txtNomeCrianca" name="txtNomeCrianca" placeholder="Digite o nome da criança"
                                    value="<?= $aluno['nome'] ?? '' ?>" onblur="validarCampoNomeAluno()">
                                <div class="ui hidden negative message" id="mensagem-erro-aluno">
                                    <div class="content">
                                        <i class="user icon"></i><span id="nome-erro"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="three wide field" id="validacao-turma">
                                <label for="txtTurma">Turma</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="turma" id="txtTurma" value="<?= $aluno['turma'] ?? '' ?>" onchange="validarTurma()">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Selecione a turma</div>
                                    <div class="menu">
                                        <div class="item" data-value="Bercario 2 A">Bercario 2 A</div>
                                        <div class="item" data-value="Bercario 2 B">Bercario 2 B</div>
                                        <div class="item" data-value="Bercario 2 C">Bercario 2 C</div>
                                        <div class="item" data-value="Maternal I A">Maternal I A</div>
                                        <div class="item" data-value="Maternal I B">Maternal I B</div>
                                        <div class="item" data-value="Maternal I C">Maternal I C</div>
                                        <div class="item" data-value="Maternal II A">Maternal II A</div>
                                        <div class="item" data-value="Maternal II B">Maternal II B</div>
                                        <div class="item" data-value="Multisseriada M.M">Multisseriada M.M</div>
                                        <div class="item" data-value="Multisseriada B.M">Multisseriada B.M</div>
                                    </div>
                                </div>
                                <div class="ui hidden negative message" id="mensagem-erro-turma" style="margin-top:15px">
                                    <div class="content">
                                        <i class="user icon"></i><span id="turma-erro"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="three wide field" id="validacao-data-nascimento">
                                <label for="txtDataNascimento">Data Nascimento</label>
                                <div class="ui calendar" id="dataNascimentoCalendar">
                                    <div class="ui input">
                                        <input id="txtDataNascimento" name="txtDataNascimento" type="text"
                                            placeholder="dd/mm/aaaa" onblur="validarDataNascimento()"
                                            value="<?= !empty($aluno['data_nascimento']) ? date('d/m/Y', strtotime($aluno['data_nascimento'])) : '' ?>">
                                    </div>
                                </div>
                                <input type="hidden" name="data_nascimento" id="data_nascimento" value="<?= $aluno['data_nascimento'] ?? '' ?>">
                                <div class="ui hidden negative message" id="mensagem-erro-data-nascimento">
                                    <div class="content">
                                        <i class="calendar icon"></i><span id="data-nascimento-erro"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="three wide field">
                                <label for="txtRaca">Cor / Raça</label>
                                <select class="ui search dropdown" id="txtRaca" name="corRaca">
                                    <option value="" disabled hidden <?= empty($aluno['etnia']) ? 'selected' : '' ?>>Selecione Cor / Raça</option>
                                    <option value="branca" <?= ($aluno['etnia'] ?? '') === 'branca' ? 'selected' : '' ?>>Branca</option>
                                    <option value="preta" <?= ($aluno['etnia'] ?? '') === 'preta' ? 'selected' : '' ?>>Preta</option>
                                    <option value="parda" <?= ($aluno['etnia'] ?? '') === 'parda' ? 'selected' : '' ?>>Parda</option>
                                    <option value="amarela" <?= ($aluno['etnia'] ?? '') === 'amarela' ? 'selected' : '' ?>>Amarela</option>
                                    <option value="indigena" <?= ($aluno['etnia'] ?? '') === 'indigena' ? 'selected' : '' ?>>Indígena</option>
                                    <option value="outra" <?= ($aluno['etnia'] ?? '') === 'outra' ? 'selected' : '' ?>>Outra</option>
                                </select>
                                <div class="ui hidden negative message" id="mensagem-erro-raca" style="margin-top:15px">
                                    <div class="content">
                                        <i class="user icon"></i><span id="raca-erro"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Endereço -->
                        <div class="fields">
                            <div class="three wide field" id="validacao-cep">
                                <label for="txtCep">CEP</label>
                                <input type="text" id="txtCep" name="txtCep" placeholder="00000-000" value="<?= $endereco['cep'] ?? '' ?>" onblur="validarCep()">
                                <div class="ui hidden negative message" id="mensagem-erro-cep">
                                    <div class="content">
                                        <i class="map marker alternate icon"></i><span id="cep-erro"></span>
                                    </div>
                                </div>
                                <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" target="_blank">Não sei o meu cep</a>
                            </div>

                            <div class="ten wide field" id="validacao-endereco">
                                <label for="txtEndereco">Endereço</label>
                                <input type="text" id="txtEndereco" name="txtEndereco" placeholder="Rua, Avenida..." value="<?= $endereco['endereco'] ?? '' ?>" onblur="validarEndereco()">
                                <div class="ui hidden negative message" id="mensagem-erro-endereco">
                                    <div class="content">
                                        <i class="home icon"></i><span id="endereco-erro"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="three wide field" id="validacao-numero">
                                <label for="txtNumero">Número</label>
                                <input type="number" id="txtNumero" name="txtNumero" placeholder="Nº" value="<?= $endereco['numero'] ?? '' ?>" onblur="validarNumero()">
                                <div class="ui hidden negative message" id="mensagem-erro-numero">
                                    <div class="content">
                                        <i class="hashtag icon"></i><span id="numero-erro"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bairro, cidade, complemento -->
                        <div class="fields">
                            <div class="ten wide field" id="validacao-bairro">
                                <label for="txtBairro">Bairro</label>
                                <input type="text" id="txtBairro" name="txtBairro" placeholder="Bairro..." value="<?= $endereco['bairro'] ?? '' ?>" onblur="validarBairro()">
                                <div class="ui hidden negative message" id="mensagem-erro-bairro">
                                    <div class="content">
                                        <i class="building outline icon"></i><span id="bairro-erro"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="three wide field" id="validacao-cidade">
                                <label for="txtCidade">Cidade</label>
                                <input type="text" id="txtCidade" name="txtCidade" placeholder="Americana..." value="<?= $endereco['cidade'] ?? '' ?>" onblur="validarCidade()">
                                <div class="ui hidden negative message" id="mensagem-erro-cidade">
                                    <div class="content">
                                        <i class="map outline icon"></i><span id="cidade-erro"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="three wide field">
                                <label for="txtComplemento">Complemento</label>
                                <input type="text" id="txtComplemento" name="txtComplemento" placeholder="Escola, apartamento..." value="<?= $endereco['complemento'] ?? '' ?>">
                            </div>
                        </div>

                        <!-- Autorização medicação -->
                        <div class="fields">
                            <div class="ten wide field">
                                <label>Em caso de febre autoriza medicar a criança?</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" id="autorizacaoMed" name="autorizacaoMed" value="1" <?= ($aluno['autorizacao_febre'] ?? 0) ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>

                            <div class="three wide field" id="fieldGotas" style="display: <?= ($aluno['autorizacao_febre'] ?? 0) ? 'block' : 'none' ?>">
                                <label for="txtGotas">Quantas gotas</label>
                                <input type="number" id="txtGotas" name="txtGotas" placeholder="1, 2, 3..." value="<?= $aluno['gotas'] ?? '' ?>">
                            </div>
                            <div class="three wide field" id="fieldRemedio" style="display: <?= ($aluno['autorizacao_febre'] ?? 0) ? 'block' : 'none' ?>">
                                <label for="txtRemedio">Qual remédio</label>
                                <input type="text" id="txtRemedio" name="txtRemedio" placeholder="" value="<?= $aluno['remedio'] ?? '' ?>">
                            </div>
                        </div>

                        <!-- Autorização de imagem -->
                        <div class="fields">
                            <div class="ten wide field">
                                <label>Autorizo a divulgação de imagem do meu filho(a) para uso de projetos na escola, fotos, filmagem, Facebook, Instagram e site.</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="autorizacaoImagem" value="1" <?= ($aluno['permissao_foto'] ?? 0) ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>
                        </div>


                    </section>

                    <section class="ui segment red raised sessao-tab">
                        <h2>Responsável</h2>

                        <div class="responsavel" id="responsavel-1">
                            <div class="fields">

                                <div class="four wide field" id="tipo_responsavel_div">
                                    <label for="txtTipoResponsavel_1">Tipo do responsável</label>
                                    <select class="ui search dropdown" id="txtTipoResponsavel_1" name="txtTipoResponsavel_1" onchange="validarTipoResponsavel1()">
                                        <option value="" disabled hidden <?= empty($resp1['tipo_responsavel']) ? 'selected' : '' ?>>Selecione o tipo</option>
                                        <option value="Pai" <?= ($resp1['tipo_responsavel'] ?? '') === 'Pai' ? 'selected' : '' ?>>Pai</option>
                                        <option value="Mãe" <?= ($resp1['tipo_responsavel'] ?? '') === 'Mãe' ? 'selected' : '' ?>>Mãe</option>
                                        <option value="Avô" <?= ($resp1['tipo_responsavel'] ?? '') === 'Avô' ? 'selected' : '' ?>>Avô</option>
                                        <option value="Avó" <?= ($resp1['tipo_responsavel'] ?? '') === 'Avó' ? 'selected' : '' ?>>Avó</option>
                                        <option value="Irmão" <?= ($resp1['tipo_responsavel'] ?? '') === 'Irmão' ? 'selected' : '' ?>>Irmão</option>
                                        <option value="Irmã" <?= ($resp1['tipo_responsavel'] ?? '') === 'Irmã' ? 'selected' : '' ?>>Irmã</option>
                                        <option value="Tio" <?= ($resp1['tipo_responsavel'] ?? '') === 'Tio' ? 'selected' : '' ?>>Tio</option>
                                        <option value="Tia" <?= ($resp1['tipo_responsavel'] ?? '') === 'Tia' ? 'selected' : '' ?>>Tia</option>
                                        <option value="Outro" <?= ($resp1['tipo_responsavel'] ?? '') === 'Outro' ? 'selected' : '' ?>>Outro</option>
                                    </select>
                                    <div id="mensagem-erro-tipo-responsavel-1" class="ui hidden message error">
                                        <span id="tipo-responsavel-erro-1" class="mensagem-margin"></span>
                                    </div>
                                </div>

                                <div class="eight wide field" id="nome_responsavel_div">
                                    <label for="txtNomeResponsavel_1">Nome do Responsável</label>
                                    <input type="text" id="txtNomeResponsavel_1" name="txtNomeResponsavel_1" placeholder="" onblur="validarNomeResponsavel1()" value="<?= $resp1['nome'] ?? '' ?>">
                                    <div id="mensagem-erro-nome-responsavel-1" class="ui hidden message error">
                                        <span id="nome-responsavel-erro-1"></span>
                                    </div>
                                </div>

                                <div class="four wide field" id="data_nascimento_responsavel_div">
                                    <label>Data Nascimento</label>
                                    <div class="ui calendar" id="dataNascimentoCalendar_1">
                                        <div class="ui input">
                                            <input type="text" id="txtDataNascimento_1" placeholder="dd/mm/aaaa" onblur="validarDataNascimentoResponsavel1()">
                                        </div>
                                    </div>
                                    <input type="hidden" name="data_nascimento_1" id="hiddenDataNascimento_1">
                                    <div id="mensagem-erro-data-responsavel-1" class="ui hidden message error">
                                        <span id="data-responsavel-erro-1"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="fields">

                                <div class="four wide field" id="estado_civil_responsavel_div">
                                    <label for="txtEstadoCivil_1">Estado Civil</label>
                                    <select class="ui search dropdown" id="txtEstadoCivil_1" name="txtEstadoCivil_1" onchange="validarEstadoCivilResponsavel1()">
                                        <option value="" disabled hidden <?= empty($resp1['estado_civil']) ? 'selected' : '' ?>>Selecione o estado civil</option>
                                        <option value="Solteiro" <?= ($resp1['estado_civil'] ?? '') === 'Solteiro' ? 'selected' : '' ?>>Solteiro</option>
                                        <option value="Casado" <?= ($resp1['estado_civil'] ?? '') === 'Casado' ? 'selected' : '' ?>>Casado</option>
                                        <option value="Divorciado" <?= ($resp1['estado_civil'] ?? '') === 'Divorciado' ? 'selected' : '' ?>>Divorciado</option>
                                        <option value="Viuvo" <?= ($resp1['estado_civil'] ?? '') === 'Viuvo' ? 'selected' : '' ?>>Viúvo</option>
                                    </select>
                                    <div id="mensagem-erro-estado-civil-1" class="ui hidden message error">
                                        <span id="estado-civil-erro-1" class="mensagem-margin"></span>
                                    </div>
                                </div>

                                <div class="four wide field" id="telefone_responsavel_div">
                                    <label for="txtTelefone_1">Telefone</label>
                                    <input type="text" id="txtTelefone_1" name="txtTelefone_1" placeholder="(19) 99999-9999" onblur=" validarTelefoneResponsavel1()" value="<?= $resp1['celular'] ?? '' ?>">
                                    <div id="mensagem-erro-telefone-1" class="ui hidden message error">
                                        <span id="telefone-erro-1"></span>
                                    </div>
                                </div>

                                <div class="eight wide field" id="email_responsavel_div">
                                    <label for="txtEmail_1">Email</label>
                                    <input value="<?= $resp1['email'] ?? '' ?>" type="email" id="txtEmail_1" name="txtEmail_1" placeholder="exemplo@email.com" onblur="validarEmailResponsavel1()">
                                    <div id="mensagem-erro-email-1" class="ui hidden message error">
                                        <span id="email-erro-1"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="eight wide field" id="empresa_responsavel_div">
                                    <label for="txtNomeEmpresa_1">Nome da Empresa</label>
                                    <input type="text" id="txtNomeEmpresa_1" name="txtNomeEmpresa_1" placeholder="Empresa..." value="<?= $resp1['nome_empresa'] ?? '' ?>">
                                </div>

                                <div class="four wide field" id="profissao_responsavel_div">
                                    <label for="txtProfissao_1">Profissão</label>
                                    <input type="text" id="txtProfissao_1" name="txtProfissao_1" placeholder="Arquiteto, Advogado..."
                                        value="<?= $resp1['profissao'] ?? '' ?>">
                                </div>

                                <div class="four wide field" id="telefone_trabalho_responsavel_div">
                                    <label for="txtTelefoneTrabalho_1">Telefone do Trabalho</label>
                                    <input type="text" id="txtTelefoneTrabalho_1" name="txtTelefoneTrabalho_1" placeholder="(19) 99999-9999"
                                        value="<?= $resp1['telefone_trabalho'] ?>">
                                </div>
                            </div>

                            <div class="fields">
                                <div class="four wide field" id="horario_trabalho_responsavel_div">
                                    <label for="txtHorarioTrabalho_1">Horário de Trabalho</label>
                                    <input type="text" id="txtHorarioTrabalho_1" name="txtHorarioTrabalho_1" placeholder="8h"
                                        value="<?= $resp1['horario_trabalho'] ?? '' ?>">
                                </div>

                                <div class="four wide field" id="salario_responsavel_div">
                                    <label for="txtSalario_1">Salário do responsável</label>
                                    <input type="text" id="txtSalario_1" name="txtSalario_1" placeholder="R$1500,00..." onblur="validarSalarioResponsavel1()"
                                        value="<?= $resp1['salario'] ?? '' ?>">
                                    <div id="mensagem-erro-salario-1" class="ui hidden message error">
                                        <span id="salario-erro-1"></span>
                                    </div>
                                </div>

                                <div class="four wide field" id="renda_extra_responsavel_div">
                                    <label for="toggleRendaExtra_1">Possui Renda Extra?</label>
                                    <div class="ui toggle checkbox">
                                        <input
                                            type="checkbox"
                                            id="toggleRendaExtra_1"
                                            name="toggleRendaExtra_1"
                                            onchange="validarRendaExtra()"
                                            <?= !empty($resp1['renda_extra']) && $resp1['renda_extra'] == 1 ? 'checked' : '' ?>>
                                        <label></label>
                                    </div>
                                </div>

                                <div class="four wide field oculto" id="renda_extra_div">
                                    <label for="txtRendaExtra">Valor da renda extra</label>
                                    <input
                                        type="text"
                                        id="txtRendaExtra"
                                        name="txtRendaExtra"
                                        placeholder="R$ 500,00..."
                                        value="<?= $resp1['valor_renda_extra'] ?? '' ?>"
                                        onblur="validarRendaExtra()">
                                    <div id="mensagem-erro-renda-extra-1" class="ui hidden message error">
                                        <span id="renda-extra-erro-1"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ui divider"></div>

                        <div class="responsavel_2 oculto" id="responsavel_2">
                            <h2>Responsavel 2</h2>
                            <div class="fields">

                                <div class="four wide field" id="tipo_responsavel_2_div">
                                    <label for="txtTipoResponsavel_2">Tipo do responsável</label>
                                    <select class="ui search dropdown" id="txtTipoResponsavel_2" name="txtTipoResponsavel_2" onchange="validarTipoResponsavel2()">
                                        <option value="" disabled hidden <?= empty($resp2['tipo_responsavel']) ? 'selected' : '' ?>>Selecione o tipo</option>
                                        <option value="Pai" <?= ($resp2['tipo_responsavel'] ?? '') === 'Pai' ? 'selected' : '' ?>>Pai</option>
                                        <option value="Mãe" <?= ($resp2['tipo_responsavel'] ?? '') === 'Mãe' ? 'selected' : '' ?>>Mãe</option>
                                        <option value="Avô" <?= ($resp2['tipo_responsavel'] ?? '') === 'Avô' ? 'selected' : '' ?>>Avô</option>
                                        <option value="Avó" <?= ($resp2['tipo_responsavel'] ?? '') === 'Avó' ? 'selected' : '' ?>>Avó</option>
                                        <option value="Irmão" <?= ($resp2['tipo_responsavel'] ?? '') === 'Irmão' ? 'selected' : '' ?>>Irmão</option>
                                        <option value="Irmã" <?= ($resp2['tipo_responsavel'] ?? '') === 'Irmã' ? 'selected' : '' ?>>Irmã</option>
                                        <option value="Tio" <?= ($resp2['tipo_responsavel'] ?? '') === 'Tio' ? 'selected' : '' ?>>Tio</option>
                                        <option value="Tia" <?= ($resp2['tipo_responsavel'] ?? '') === 'Tia' ? 'selected' : '' ?>>Tia</option>
                                        <option value="Outro" <?= ($resp2['tipo_responsavel'] ?? '') === 'Outro' ? 'selected' : '' ?>>Outro</option>
                                    </select>
                                    <div id="mensagem_erro_tipo_responsavel_2" class="ui hidden message error">
                                        <span id="tipo_responsavel_erro_2"></span>
                                    </div>
                                </div>

                                <div class="eight wide field" id="nome_responsavel_div_2">
                                    <label for="txtNomeResponsavel_2">Nome do Responsável</label>
                                    <input type="text" id="txtNomeResponsavel_2" name="txtNomeResponsavel_2" placeholder="" onblur="validarNomeResponsavel1()" value="<?= $resp2['nome'] ?? '' ?>">
                                    <div id="mensagem-erro-nome-responsavel-2" class="ui hidden message error">
                                        <span id="nome-responsavel-erro-2"></span>
                                    </div>
                                </div>

                                <div class="four wide field" id="data_nascimento_responsavel_2_div">
                                    <label>Data Nascimento</label>
                                    <div class="ui calendar" id="dataNascimentoCalendar_2">
                                        <div class="ui input">
                                            <input type="text" id="txtDataNascimento_2" placeholder="dd/mm/aaaa" onblur="validarDataNascimentoResponsavel2()">
                                        </div>
                                    </div>

                                    <input type="hidden" name="data_nascimento_2" id="hiddenDataNascimento_2">
                                    <div id="mensagem-erro-data-responsavel-2" class="ui hidden message error">
                                        <span id="data-responsavel-erro-2"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="fields">

                                <div class="four wide field" id="estado_civil_responsavel_2_div">
                                    <label for="txtEstadoCivil_2">Estado Civil</label>
                                    <select class="ui search dropdown" id="txtEstadoCivil_2" name="txtEstadoCivil_2" onchange="validarEstadoCivilResponsavel2()">
                                        <option value="" disabled selected hidden>Selecione o estado civil</option>
                                        <option value="Solteiro">Solteiro</option>
                                        <option value="Casado">Casado</option>
                                        <option value="Divorciado">Divorciado</option>
                                        <option value="Viuvo">Viúvo</option>
                                    </select>
                                    <div id="mensagem-erro-estado-civil-2" class="ui hidden message error">
                                        <span id="estado-civil-erro-2"></span>
                                    </div>
                                </div>

                                <div class="four wide field" id="telefone_responsavel_2_div">
                                    <label for="txtTelefone_2">Telefone</label>
                                    <input type="text" id="txtTelefone_2" name="txtTelefone_2" placeholder="(19) 99999-9999" onblur="validarTelefoneResponsavel2()">
                                    <div id="mensagem-erro-telefone-2" class="ui hidden message error">
                                        <span id="telefone-erro-2"></span>
                                    </div>
                                </div>

                                <div class="eight wide field" id="email_responsavel_2_div">
                                    <label for="txtEmail_2">Email</label>
                                    <input type="email" id="txtEmail_2" name="txtEmail_2" placeholder="exemplo@email.com" onblur="validarEmailResponsavel2()">
                                    <div id="mensagem-erro-email-2" class="ui hidden message error">
                                        <span id="email-erro-2"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="eight wide field" id="empresa_responsavel_div">
                                    <label for="txtNomeEmpresa_2">Nome da Empresa</label>
                                    <input type="text" id="txtNomeEmpresa_2" name="txtNomeEmpresa_2" placeholder="Empresa...">
                                </div>

                                <div class="four wide field" id="profissao_responsavel_div">
                                    <label for="txtProfissao_2">Profissão</label>
                                    <input type="text" id="txtProfissao_2" name="txtProfissao_2" placeholder="Arquiteto, Advogado...">
                                </div>

                                <div class="four wide field" id="telefone_trabalho_responsavel_div">
                                    <label for="txtTelefoneTrabalho_2">Telefone do Trabalho</label>
                                    <input type="text" id="txtTelefoneTrabalho_2" name="txtTelefoneTrabalho_2" placeholder="(19) 99999-9999">
                                </div>
                            </div>

                            <div class="fields">
                                <div class="four wide field" id="horario_trabalho_responsavel_div">
                                    <label for="txtHorarioTrabalho_2">Horário de Trabalho</label>
                                    <input type="text" id="txtHorarioTrabalho_2" name="txtHorarioTrabalho_2" placeholder="8h">
                                </div>

                                <div class="four wide field" id="salario_responsavel_2_div">
                                    <label for="txtSalario_2">Salário do responsável</label>
                                    <input type="text" id="txtSalario_2" name="txtSalario_2" placeholder="R$1500,00..." onblur="validarSalarioResponsavel2()">
                                    <div id="mensagem-erro-salario-2" class="ui hidden message error">
                                        <span id="salario-erro-2"></span>
                                    </div>
                                </div>

                                <div class="four wide field" id="renda_extra_responsavel_div">
                                    <label for="toggleRendaExtra_2">Possui Renda Extra?</label>
                                    <div class="ui toggle checkbox">
                                        <input type="checkbox" id="toggleRendaExtra_2" name="toggleRendaExtra_2" onchange="validarRendaExtraResponsavel2()">
                                        <label></label>
                                    </div>
                                </div>
                                <div class="four wide field oculto" id="renda_extra_div_2">
                                    <label for="txtRendaExtra_2">Valor da renda extra</label>
                                    <input type="text" id="txtRendaExtra_2" name="txtRendaExtra_2" onblur="validarRendaExtraResponsavel2()">
                                    <div id="mensagem-erro-renda-extra-2" class="ui hidden message error">
                                        <span id="renda-extra-erro-2"></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="fields">
                            <div class="sixteen wide field" id="divBotaoResponsavel">
                                <div class="right floated column">
                                    <button class="ui blue button right floated" id="btnAdicionarResponsavel" type="button" onclick="adicionarResponsavel()">
                                        <i class="plus circle icon"></i> Adicionar Responsável
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="fields">
                            <div class="sixteen wide field <?= !empty($resp2['nome']) ? '' : 'oculto' ?>" id="divBotaoRemoverResponsavel">
                                <div class="right floated column">
                                    <button class="ui red button right floated" id="btnRemoverResponsavel" type="button" onclick="removerResponsavel()">
                                        <i class="trash alternate outline icon"></i> Remover Responsável
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>

                    <script>
                        $(document).ready(function() {
                            $('.ui.checkbox').checkbox();

                            $('#autorizacaoMed').change(function() {
                                if ($(this).is(':checked')) {
                                    $('#fieldGotas, #fieldRemedio').show();
                                } else {
                                    $('#fieldGotas, #fieldRemedio').hide();
                                }
                            });

                            $('#toggle-alergia').change(function() {
                                if ($(this).is(':checked')) {
                                    $('#especifique-alergia-field').show();
                                } else {
                                    $('#especifique-alergia-field').hide();
                                }
                            });

                            $('#toggle-convenio').change(function() {
                                if ($(this).is(':checked')) {
                                    $('#qual-convenio-field').show();
                                } else {
                                    $('#qual-convenio-field').hide();
                                }
                            });
                        });

                        window.addEventListener("DOMContentLoaded", () => {
                            $('.ui.checkbox').checkbox();
                            validarRendaExtra();

                            const divRemover = document.getElementById("divBotaoRemoverResponsavel");
                            const divAdicionar = document.getElementById("divBotaoResponsavel");

                            // PHP funciona aqui porque está dentro de um arquivo .php
                            const responsavel2Existe = <?= !empty($resp2['nome']) ? 'true' : 'false' ?>;

                            if (responsavel2Existe) {
                                divRemover.classList.remove("oculto");
                                divAdicionar.classList.add("oculto");
                            } else {
                                divRemover.classList.add("oculto");
                                divAdicionar.classList.remove("oculto");
                            }
                        });
                    </script>
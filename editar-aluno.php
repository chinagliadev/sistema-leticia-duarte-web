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
$pessoa_autorizada1 = $dadosCompletos['pessoa_autorizada_1'];
$pessoa_autorizada2 = $dadosCompletos['pessoa_autorizada_2'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui-calendar@0.0.8/dist/calendar.min.css">
    <link rel="stylesheet" href="./css/sistema.css" />

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
                <form method="post" action="./editar-cadastro-aluno.php" class="ui form form-cadastro-aluno" id="formulario-aluno">

                    <input type="hidden" name="ra_aluno" value="<?= $aluno['ra_aluno'] ?? '' ?>">
                    <input type="hidden" name="id_matricula" value="<?= $dadosCompletos['matricula']['id_matricula'] ?? '' ?>">
                    <input type="hidden" name="id_endereco" value="<?= $endereco['id_endereco'] ?? '' ?>">
                    <input type="hidden" name="id_resp1" value="<?= $resp1['id_responsavel'] ?? '' ?>">
                    <input type="hidden" name="id_resp2" value="<?= $resp2['id_responsavel'] ?? '' ?>">
                    <input type="hidden" name="id_estrutura_familiar" value="<?= $estrutura['id'] ?? '' ?>">
                    <input type="hidden" name="id_pessoa_autorizada1" value="<?= $pessoa_autorizada1['id'] ?? '' ?>">
                    <input type="hidden" name="id_pessoa_autorizada2" value="<?= $pessoa_autorizada2['id'] ?? '' ?>">


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

                        <div class="responsavel_2 <?= !empty($resp2['nome']) ? '' : 'oculto' ?>" id="responsavel_2">
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
                                    <input type="text" id="txtNomeResponsavel_2" name="txtNomeResponsavel_2" placeholder="" onblur="validarNomeResponsavel2()" value="<?= $resp2['nome'] ?? '' ?>">
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
                                        <option value="" disabled hidden <?= empty($resp2['estado_civil']) ? 'selected' : '' ?>>Selecione o estado civil</option>
                                        <option value="Solteiro" <?= ($resp2['estado_civil'] ?? '') === 'Solteiro' ? 'selected' : '' ?>>Solteiro</option>
                                        <option value="Casado" <?= ($resp2['estado_civil'] ?? '') === 'Casado' ? 'selected' : '' ?>>Casado</option>
                                        <option value="Divorciado" <?= ($resp2['estado_civil'] ?? '') === 'Divorciado' ? 'selected' : '' ?>>Divorciado</option>
                                        <option value="Viuvo" <?= ($resp2['estado_civil'] ?? '') === 'Viuvo' ? 'selected' : '' ?>>Viúvo</option>
                                    </select>
                                    <div id="mensagem-erro-estado-civil-2" class="ui hidden message error">
                                        <span id="estado-civil-erro-2"></span>
                                    </div>
                                </div>

                                <div class="four wide field" id="telefone_responsavel_2_div">
                                    <label for="txtTelefone_2">Telefone</label>
                                    <input type="text" id="txtTelefone_2" name="txtTelefone_2" placeholder="(19) 99999-9999" onblur="validarTelefoneResponsavel2()" value="<?= $resp2['celular'] ?? '' ?>">
                                    <div id="mensagem-erro-telefone-2" class="ui hidden message error">
                                        <span id="telefone-erro-2"></span>
                                    </div>
                                </div>

                                <div class="eight wide field" id="email_responsavel_2_div">
                                    <label for="txtEmail_2">Email</label>
                                    <input type="email" id="txtEmail_2" name="txtEmail_2" placeholder="exemplo@email.com" onblur="validarEmailResponsavel2()" value="<?= $resp2['email'] ?? '' ?>">
                                    <div id="mensagem-erro-email-2" class="ui hidden message error">
                                        <span id="email-erro-2"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="eight wide field" id="empresa_responsavel_div">
                                    <label for="txtNomeEmpresa_2">Nome da Empresa</label>
                                    <input type="text" id="txtNomeEmpresa_2" name="txtNomeEmpresa_2" placeholder="Empresa..." value="<?= $resp2['nome_empresa'] ?? '' ?>">
                                </div>

                                <div class="four wide field" id="profissao_responsavel_div">
                                    <label for="txtProfissao_2">Profissão</label>
                                    <input type="text" id="txtProfissao_2" name="txtProfissao_2" placeholder="Arquiteto, Advogado..." value="<?= $resp2['profissao'] ?? '' ?>">
                                </div>

                                <div class="four wide field" id="telefone_trabalho_responsavel_div">
                                    <label for="txtTelefoneTrabalho_2">Telefone do Trabalho</label>
                                    <input type="text" id="txtTelefoneTrabalho_2" name="txtTelefoneTrabalho_2" placeholder="(19) 99999-9999" value="<?= $resp2['telefone_trabalho'] ?? '' ?>">
                                </div>
                            </div>

                            <div class="fields">
                                <div class="four wide field" id="horario_trabalho_responsavel_div">
                                    <label for="txtHorarioTrabalho_2">Horário de Trabalho</label>
                                    <input type="text" id="txtHorarioTrabalho_2" name="txtHorarioTrabalho_2" placeholder="8h" value="<?= $resp2['horario_trabalho'] ?? '' ?>">
                                </div>

                                <div class="four wide field" id="salario_responsavel_2_div">
                                    <label for="txtSalario_2">Salário do responsável</label>
                                    <input type="text" id="txtSalario_2" name="txtSalario_2" placeholder="R$1500,00..." onblur="validarSalarioResponsavel2()" value="<?= $resp2['salario'] ?? '' ?>">
                                    <div id="mensagem-erro-salario-2" class="ui hidden message error">
                                        <span id="salario-erro-2"></span>
                                    </div>
                                </div>

                                <div class="four wide field" id="renda_extra_responsavel_div">
                                    <label for="toggleRendaExtra_2">Possui Renda Extra?</label>
                                    <div class="ui toggle checkbox">
                                        <input type="checkbox" id="toggleRendaExtra_2" name="toggleRendaExtra_2" onchange="validarRendaExtraResponsavel2()" <?= !empty($resp2['renda_extra']) && $resp2['renda_extra'] == 1 ? 'checked' : '' ?>>
                                        <label></label>
                                    </div>
                                </div>
                                <div class="four wide field <?= !empty($resp2['renda_extra']) && $resp2['renda_extra'] == 1 ? '' : 'oculto' ?>" id="renda_extra_div_2">
                                    <label for="txtRendaExtra_2">Valor da renda extra</label>
                                    <input type="text" id="txtRendaExtra_2" name="txtRendaExtra_2" onblur="validarRendaExtraResponsavel2()" value="<?= $resp2['valor_renda_extra'] ?? '' ?>">
                                    <div id="mensagem-erro-renda-extra-2" class="ui hidden message error">
                                        <span id="renda-extra-erro-2"></span>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" id="apagarResp2" name="apagarResp2" value="0">
                        </div>
                        <div class="fields">
                            <div class="sixteen wide field <?= !empty($resp2['nome']) ? 'oculto' : '' ?>" id="divBotaoResponsavel">
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
                                    <button class="ui red button right floated" id="btnRemoverResponsavel" type="button" onclick="removerResponsavel2()">
                                        <i class="trash alternate outline icon"></i> Remover Responsável
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="ui segment yellow raised">
                        <h2>Estrutura Familiar</h2>
                        <div class="fields">
                            <div class="four wide field">
                                <label>Pais vivem juntos</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="pais_vivem_juntos" <?= isset($estrutura['pais_vivem_juntos']) && $estrutura['pais_vivem_juntos'] ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>
                            <div class="four wide field">
                                <label>Nº de filhos</label>
                                <input type="number" placeholder="0" name="numero_filhos" value="<?= $estrutura['numero_filhos'] ?? '' ?>">
                            </div>
                            <div class="four wide field">
                                <label>Recebe bolsa família</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="recebe_bolsa_familia" id="toggle-bolsa-familia" onchange="validarBolsaFamilia()" <?= isset($estrutura['recebe_bolsa_familia']) && $estrutura['recebe_bolsa_familia'] ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>
                            <?php

                            $bolsa_familia_oculto = isset($estrutura['recebe_bolsa_familia']) && $estrutura['recebe_bolsa_familia'] ? '' : 'oculto';
                            ?>
                            <div class="four wide field <?= $bolsa_familia_oculto ?>" id="valor-bolsa-field">
                                <label>Valor</label>
                                <input type="text" placeholder="R$" name="valor" id="valor_bolsa_familia" onblur="validarBolsaFamilia()" value="<?= $estrutura['valor'] ?? '' ?>">
                                <div class="ui hidden negative message" id="mensagem-erro-bolsa-familia">
                                    <div class="content">
                                        <i class="user icon"></i><span id="bolsa-familia-erro"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fields">
                            <div class="four wide field">
                                <label>Possui alergia</label>
                                <div class="ui toggle checkbox">
                                    <?php
                                    $alergia_ativa = (isset($estrutura['possui_alergia']) && $estrutura['possui_alergia']) || (isset($estrutura['especifique_alergia']) && !empty($estrutura['especifique_alergia']));
                                    ?>
                                    <input type="checkbox" name="possui_alergia" id="toggle-alergia" onchange="validarAlergia()"
                                        <?= $alergia_ativa ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>
                            <?php
                            $alergia_oculto = $alergia_ativa ? '' : 'oculto';
                            ?>
                            <div class="four wide field <?= $alergia_oculto ?>" id="especifique-alergia">
                                <label>Especifique</label>
                                <input type="text" placeholder="" name="especifique_alergia" id="qual_alergia" onblur="validarAlergia()" value="<?= $estrutura['especifique_alergia'] ?? '' ?>">
                                <div class="ui hidden negative message" id="mensagem-erro-alergia">
                                    <div class="content">
                                        <i class="heartbeat icon"></i><span id="alergia-erro"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="four wide field">
                                <label>Possui convênio</label>
                                <div class="ui toggle checkbox">
                                    <?php

                                    $convenio_ativo = (isset($estrutura['possui_convenio']) && $estrutura['possui_convenio']) || (isset($estrutura['qual_convenio']) && !empty($estrutura['qual_convenio']));
                                    ?>
                                    <input type="checkbox" name="possui_convenio" id="toggle-convenio" onchange="validarConvenioMedico()"
                                        <?= $convenio_ativo ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>
                            <?php

                            $convenio_oculto = $convenio_ativo ? '' : 'oculto';
                            ?>
                            <div class="four wide field <?= $convenio_oculto ?>" id="qual-convenio-field">
                                <label>Qual convênio</label>
                                <input type="text" placeholder="" name="qual_convenio" id="qual_convenio" onblur="validarConvenioMedico()" value="<?= $estrutura['qual_convenio'] ?? '' ?>">
                                <div class="ui hidden negative message" id="mensagem-erro-convenio">
                                    <div class="content">
                                        <i class="heartbeat icon"></i><span id="convenio-erro"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fields">
                            <div class="four wide field">
                                <label>Portador de alguma necessidade especial</label>
                                <div class="ui toggle checkbox">
                                    <?php
                                    $necessidade_ativa = (isset($estrutura['portador_necessidade_especial']) && $estrutura['portador_necessidade_especial']) || (isset($estrutura['qual_necessidade']) && !empty($estrutura['qual_necessidade']));
                                    ?>
                                    <input type="checkbox" name="portador_necessidade_especial" id="toggle-necessidade-especial" onchange="validarNecessidadeEspecial()"
                                        <?= $necessidade_ativa ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>

                            <?php
                            $necessidade_oculto = $necessidade_ativa ? '' : 'oculto';
                            ?>
                            <div class="four wide field <?= $necessidade_oculto ?>" id="qual-necessidade">
                                <label>Qual</label>
                                <input type="text" name="qual_necessidade" id="necessidade_especial" placeholder="" onblur="validarNecessidadeEspecial()" value="<?= $estrutura['qual_necessidade_especial'] ?? '' ?>">
                                <div class="ui hidden negative message" id="mensagem-erro-necessidade">
                                    <div class="content">
                                        <i class="heartbeat icon"></i>
                                        <span id="necessidade-erro"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="four wide field">
                                <label>Problemas de visão</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="problemas_visao" <?= isset($estrutura['problemas_visao']) && $estrutura['problemas_visao'] ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>
                        </div>

                        <div class="fields">
                            <div class="four wide field">
                                <label>Já fez cirurgia</label>
                                <div class="ui toggle checkbox">
                                    <?php

                                    $cirurgia_ativa = (isset($estrutura['ja_fez_cirurgia']) && $estrutura['ja_fez_cirurgia']) || (isset($estrutura['qual_cirurgia']) && !empty($estrutura['qual_cirurgia']));
                                    ?>
                                    <input type="checkbox" id="toggle_cirurgia" name="ja_fez_cirurgia" onchange="validarCirurgia()"
                                        <?= $cirurgia_ativa ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>

                            <?php

                            $cirurgia_oculto = $cirurgia_ativa ? '' : 'oculto';
                            ?>
                            <div class="four wide field <?= $cirurgia_oculto ?>" id="divCirurgia">
                                <label>Qual</label>
                                <input type="text" name="qual_cirurgia" id="cirurgia" placeholder="" onblur="validarCirurgia()" value="<?= $estrutura['qual_cirurgia'] ?? '' ?>">
                                <div class="ui hidden negative message" id="mensagem-erro-cirurgia">
                                    <div class="content">
                                        <i class="heartbeat icon"></i>
                                        <span id="cirurgia-erro"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fields">
                            <div class="four wide field">
                                <label>Tomou vacina contra catapora ou varicela</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="vacina_catapora_varicela" <?= isset($estrutura['vacina_catapora_varicela']) && $estrutura['vacina_catapora_varicela'] ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>
                        </div>

                        <h4 class="ui dividing header">Transporte para a escola</h4>
                        <div class="fields">
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="transporte_carro" value="carro" <?= isset($estrutura['transporte_carro']) && $estrutura['transporte_carro'] ? 'checked' : '' ?>>
                                    <label>Carro</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="transporte_van" value="van" <?= isset($estrutura['transporte_van']) && $estrutura['transporte_van'] ? 'checked' : '' ?>>
                                    <label>Van Escolar</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="transporte_pe" value="pe" <?= isset($estrutura['transporte_a_pe']) && $estrutura['transporte_a_pe'] ? 'checked' : '' ?>>
                                    <label>A Pé</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="transporte_outros_desc" value="outros" <?= isset($estrutura['transporte_outros_desc']) && $estrutura['transporte_outros_desc'] ? 'checked' : '' ?>>
                                    <label>Outros</label>
                                </div>
                            </div>
                        </div>

                        <h4 class="ui dividing header">Doenças que a criança já teve</h4>
                        <div class="ui grid">
                            <div class="five wide column">
                                <div class="field">
                                    <div class="ui checkbox"><input type="checkbox" name="doenca_anemia" <?= isset($estrutura['doenca_anemia']) && $estrutura['doenca_anemia'] ? 'checked' : '' ?>><label>Anemia</label></div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox"><input type="checkbox" name="doenca_bronquite" <?= isset($estrutura['doenca_bronquite']) && $estrutura['doenca_bronquite'] ? 'checked' : '' ?>><label>Bronquite</label></div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox"><input type="checkbox" name="doenca_cardiaca" <?= isset($estrutura['doenca_cardiaca']) && $estrutura['doenca_cardiaca'] ? 'checked' : '' ?>><label>Doença Cardíaca</label></div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox"><input type="checkbox" name="doenca_catapora" <?= isset($estrutura['doenca_catapora']) && $estrutura['doenca_catapora'] ? 'checked' : '' ?>><label>Catapora</label></div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox"><input type="checkbox" name="doenca_diabetes" <?= isset($estrutura['doenca_diabetes']) && $estrutura['doenca_diabetes'] ? 'checked' : '' ?>><label>Diabetes</label></div>
                                </div>
                            </div>
                            <div class="five wide column">
                                <div class="field">
                                    <div class="ui checkbox"><input type="checkbox" name="doenca_hepatite" <?= isset($estrutura['doenca_hepatite']) && $estrutura['doenca_hepatite'] ? 'checked' : '' ?>><label>Hepatite</label></div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox"><input type="checkbox" name="doenca_meningite" <?= isset($estrutura['doenca_meningite']) && $estrutura['doenca_meningite'] ? 'checked' : '' ?>><label>Meningite</label></div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox"><input type="checkbox" name="doenca_pneumonia" <?= isset($estrutura['doenca_pneumonia']) && $estrutura['doenca_pneumonia'] ? 'checked' : '' ?>><label>Pneumonia</label></div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox"><input type="checkbox" name="doenca_caxumba" <?= isset($estrutura['doenca_caxumba']) && $estrutura['doenca_caxumba'] ? 'checked' : '' ?>><label>Caxumba</label></div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox"><input type="checkbox" name="doenca_convulsao" <?= isset($estrutura['doenca_convulsao']) && $estrutura['doenca_convulsao'] ? 'checked' : '' ?>><label>Convulsão</label></div>
                                </div>
                            </div>
                            <div class="five wide column">
                                <div class="field">
                                    <div class="ui checkbox"><input type="checkbox" name="doenca_dengue" <?= isset($estrutura['doenca_dengue']) && $estrutura['doenca_dengue'] ? 'checked' : '' ?>><label>Dengue</label></div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox"><input type="checkbox" name="doenca_desidratacao" <?= isset($estrutura['doenca_desidratacao']) && $estrutura['doenca_desidratacao'] ? 'checked' : '' ?>><label>Desidratação</label></div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox"><input type="checkbox" name="doenca_refluxo" <?= isset($estrutura['doenca_refluxo']) && $estrutura['doenca_refluxo'] ? 'checked' : '' ?>><label>Refluxo</label></div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox"><input type="checkbox" name="doenca_rubeola" <?= isset($estrutura['doenca_rubeola']) && $estrutura['doenca_rubeola'] ? 'checked' : '' ?>><label>Rubéola</label></div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox"><input type="checkbox" name="doenca_sarampo" <?= isset($estrutura['doenca_sarampo']) && $estrutura['doenca_sarampo'] ? 'checked' : '' ?>><label>Sarampo</label></div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox"><input type="checkbox" name="doenca_verminose" <?= isset($estrutura['doenca_verminose']) && $estrutura['doenca_verminose'] ? 'checked' : '' ?>><label>Verminoses</label></div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="ui segment green raised">
                        <h2>Parentesco</h2>
                        <div class="pessoaAutorizada" id="autorizada-1">
                            <div class="fields">
                                <div class="eight wide field" id="div_nome_autorizada">
                                    <label for="txtNomePessoaAutorizada">Nome</label>
                                    <input type="text" id="txtNomePessoaAutorizada" name="txtNomePessoaAutorizada" placeholder="" onblur="validarNomeAutorizada()" value="<?= $pessoa_autorizada1['nome'] ?>">
                                    <div class="ui hidden negative message" id="mensagem-erro-nomeAutorizada">
                                        <div class="content">
                                            <i class="user icon"></i><span id="nomeAutorizada-erro"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="four wide field" id="div_cpf_autorizada">
                                    <label for="txtCpfAutorizada">CPF</label>
                                    <input type="text" id="txtCpfAutorizada" name="txtCpfAutorizada" placeholder="" onblur="validarCpfAutorizada()" value="<?= $pessoa_autorizada1['cpf'] ?>">
                                    <div class="ui hidden negative message" id="mensagem-erro-cpf">
                                        <div class="content">
                                            <i class="user icon"></i><span id="cpf-erro"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="four wide field" id="div_telefone_autorizada">
                                    <label for="txtTelefoneAutorizada">Telefone</label>
                                    <input type="text" id="txtTelefoneAutorizada" name="txtTelefoneAutorizada" placeholder="" onblur="validarTelefoneAutorizada()" value="<?= $pessoa_autorizada1['celular'] ?>">
                                    <div class="ui hidden negative message" id="mensagem-erro-telefone-autorizada">
                                        <div class="content">
                                            <i class="user icon"></i><span id="telefone-autorizada-erro"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="four wide field" id="div_parentesco">
                                    <label for="txtParentesco">Parentesco</label>
                                    <select class="ui search dropdown" id="txtParentesco" name="txtParentesco" onchange="validarParentesco()">
                                        <option value="" disabled hidden <?= empty($pessoa_autorizada1['parentesco']) ? 'selected' : '' ?>>Selecione o parentesco</option>
                                        <option value="Pai" <?= ($pessoa_autorizada1['parentesco'] ?? '') === 'Pai' ? 'selected' : '' ?>>Pai</option>
                                        <option value="Mãe" <?= ($pessoa_autorizada1['parentesco'] ?? '') === 'Mãe' ? 'selected' : '' ?>>Mãe</option>
                                        <option value="Avô" <?= ($pessoa_autorizada1['parentesco'] ?? '') === 'Avô' ? 'selected' : '' ?>>Avô</option>
                                        <option value="Avó" <?= ($pessoa_autorizada1['parentesco'] ?? '') === 'Avó' ? 'selected' : '' ?>>Avó</option>
                                        <option value="Irmão" <?= ($pessoa_autorizada1['parentesco'] ?? '') === 'Irmão' ? 'selected' : '' ?>>Irmão</option>
                                        <option value="Irmã" <?= ($pessoa_autorizada1['parentesco'] ?? '') === 'Irmã' ? 'selected' : '' ?>>Irmã</option>
                                        <option value="Tio" <?= ($pessoa_autorizada1['parentesco'] ?? '') === 'Tio' ? 'selected' : '' ?>>Tio</option>
                                        <option value="Tia" <?= ($pessoa_autorizada1['parentesco'] ?? '') === 'Tia' ? 'selected' : '' ?>>Tia</option>
                                        <option value="Outro" <?= ($pessoa_autorizada1['parentesco'] ?? '') === 'Outro' ? 'selected' : '' ?>>Outro</option>
                                    </select>
                                    <div class="ui hidden negative message" id="mensagem-erro-parentesco-autorizada">
                                        <div class="content">
                                            <i class="user icon"></i><span id="parentesco-autorizada-erro"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ui divider"></div>

                        <div class="pessoaAutorizada <?= !empty($pessoa_autorizada2['nome']) ? '' : 'oculto' ?>" id="autorizada-2">
                            <h2>Parentesco 2</h2>
                            <div class="fields">
                                <div class="eight wide field" id="div_nome_autorizada2">
                                    <label for="txtNomePessoaAutorizada2">Nome</label>
                                    <input type="text" id="txtNomePessoaAutorizada2" placeholder="" onblur="validarNomeParentesco2()" value="<?= $pessoa_autorizada2['nome'] ?>">
                                    <div class="ui hidden negative message" id="mensagem-erro-nomeAutorizada2">
                                        <div class="content">
                                            <i class="user icon"></i><span id="nomeAutorizada2-erro"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="four wide field" id="div_cpf_autorizada2">
                                    <label for="txtCpfAutorizada2">CPF</label>
                                    <input type="text" id="txtCpfAutorizada2" placeholder="" onblur="validarCpfAutorizada2()" value="<?= $pessoa_autorizada2['cpf'] ?>">
                                    <div class="ui hidden negative message" id="mensagem-erro-cpf2">
                                        <div class="content">
                                            <i class="user icon"></i><span id="cpf2-erro"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="four wide field" id="div_telefone_autorizada2">
                                    <label for="txtTelefoneAutorizada">Telefone</label>
                                    <input type="text" id="txtTelefoneAutorizada2" placeholder="" onblur="validarTelefoneAutorizada2()" value="<?= $pessoa_autorizada2['celular'] ?>">
                                    <div class="ui hidden negative message" id="mensagem-erro-telefone2-autorizada">
                                        <div class="content">
                                            <i class="user icon"></i><span id="telefone-autorizada2-erro"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="four wide field" id="div_parentesco2">
                                    <label for="txtParentenco">Parentesco</label>
                                    <select class="ui search dropdown" id="txtParentenco2" name="txtParentenco2">
                                        <option value="" disabled hidden <?= empty($pessoa_autorizada2['parentesco']) ? 'selected' : '' ?>>Selecione o parentesco</option>
                                        <option value="Pai" <?= ($pessoa_autorizada2['parentesco'] ?? '') === 'Pai' ? 'selected' : '' ?>>Pai</option>
                                        <option value="Mãe" <?= ($pessoa_autorizada2['parentesco'] ?? '') === 'Mãe' ? 'selected' : '' ?>>Mãe</option>
                                        <option value="Avô" <?= ($pessoa_autorizada2['parentesco'] ?? '') === 'Avô' ? 'selected' : '' ?>>Avô</option>
                                        <option value="Avó" <?= ($pessoa_autorizada2['parentesco'] ?? '') === 'Avó' ? 'selected' : '' ?>>Avó</option>
                                        <option value="Irmão" <?= ($pessoa_autorizada2['parentesco'] ?? '') === 'Irmão' ? 'selected' : '' ?>>Irmão</option>
                                        <option value="Irmã" <?= ($pessoa_autorizada2['parentesco'] ?? '') === 'Irmã' ? 'selected' : '' ?>>Irmã</option>
                                        <option value="Tio" <?= ($pessoa_autorizada2['parentesco'] ?? '') === 'Tio' ? 'selected' : '' ?>>Tio</option>
                                        <option value="Tia" <?= ($pessoa_autorizada2['parentesco'] ?? '') === 'Tia' ? 'selected' : '' ?>>Tia</option>
                                        <option value="Outro" <?= ($pessoa_autorizada2['parentesco'] ?? '') === 'Outro' ? 'selected' : '' ?>>Outro</option>
                                    </select>
                                    <div class="ui hidden negative message" id="mensagem-erro-parentesco-autorizada2">
                                        <div class="content">
                                            <i class="user icon"></i><span id="parentesco-autorizada-erro2"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fields" style="margin-top: 10px;">
                                <div class="sixteen wide field">
                                    <div class="right floated column">
                                        <button type="button" id="btnRemoverAutorizada" class="ui red button right floated" onclick="removerPessoaAutorizada()">
                                            <i class="trash icon"></i> Remover Pessoa Autorizada
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="fields">
                            <div class="sixteen wide field ">
                                <div class="right floated column <?= !empty($pessoa_autorizada2['nome']) ? 'oculto' : '' ?>" id="div_autorizada">
                                    <button type="button" class="ui blue button right floated" onclick="adicionarPessoaAutorizada()" id="btnAdicionarAutorizada">
                                        <i class="plus circle icon"></i>
                                        Adicionar Pessoa Autorizada
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="ui grid">
                            <div class="four column row">
                                <div class="right floated column <?= !empty($pessoa_autorizada2['nome']) ? '' : 'oculto' ?>">
                                    <button
                                        type="submit"
                                        class="ui yellow icon button right floated">
                                        <i class="save icon"></i> Editar Cadastro
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
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

var_dump($autorizados);
?>

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

    <script src="./js/semantic_ui.js"></script>

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
                    <h2>Editar <br>alunos</h2>
                    <img class="tamanho-img ui small image fluid" src="./img/apresentacao_img/Logo Leiticia Duarte.png"
                        alt="logo da leticia duarte na tela de cadastros de alunos">
                </section>
                <form method="post" action="./editar-aluno.php" class="ui form form-cadastro-aluno" id="formulario-aluno">
                    <!-- Nome, nascimento e raça -->
                    <section class="ui segment blue raised ">
                        <div class="fields">
                            <div class="seven wide field">
                                <label for="txtNomeCrianca">Nome da Criança</label>
                                <input type="text" id="txtNomeCrianca" name="txtNomeCrianca" placeholder="Digite o nome da criança" value="<?= $aluno['nome'] ?>">
                            </div>
                            <div class="three wide field">
                                <label for="txtTurma">Turma</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="turma" id="txtTurma" value="<?= $aluno['turma'] ?>">
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
                            </div>
                            <div class="three wide field">
                                <label for="txtDataNascimento">Data Nascimento</label>
                                <div class="ui calendar" id="dataNascimentoCalendar">
                                    <div class="ui input">
                                        <input id="txtDataNascimento" name="txtDataNascimento" type="text" placeholder="dd/mm/aaaa">
                                    </div>
                                </div>
                            </div>
                            <div class="three wide field">
                                <label for="txtRaca">Cor / Raça</label>
                                <select class="ui search dropdown" id="txtRaca" name="corRaca">
                                    <option value="" disabled hidden <?= empty($aluno['etnia']) ? 'selected' : '' ?>>Selecione Cor / Raça</option>
                                    <option value="branca" <?= $aluno['etnia'] === 'branca' ? 'selected' : '' ?>>Branca</option>
                                    <option value="preta" <?= $aluno['etnia'] === 'preta' ? 'selected' : '' ?>>Preta</option>
                                    <option value="parda" <?= $aluno['etnia'] === 'parda' ? 'selected' : '' ?>>Parda</option>
                                    <option value="amarela" <?= $aluno['etnia'] === 'amarela' ? 'selected' : '' ?>>Amarela</option>
                                    <option value="indigena" <?= $aluno['etnia'] === 'indigena' ? 'selected' : '' ?>>Indígena</option>
                                    <option value="outra" <?= $aluno['etnia'] === 'outra' ? 'selected' : '' ?>>Outra</option>
                                </select>
                            </div>
                        </div>

                        <!-- Endereço -->
                        <div class="fields">
                            <div class="three wide field">
                                <label for="txtCep">CEP</label>
                                <input type="text" id="txtCep" name="txtCep" placeholder="00000-000" value="<?= $endereco['cep'] ?? '' ?>">
                                <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" target="_blank">Não sei o meu cep</a>
                            </div>
                            <div class="ten wide field">
                                <label for="txtEndereco">Endereço</label>
                                <input type="text" id="txtEndereco" name="txtEndereco" placeholder="Rua, Avenida..." value="<?= $endereco['endereco'] ?? '' ?>">
                            </div>
                            <div class="three wide field">
                                <label for="txtNumero">Número</label>
                                <input type="text" id="txtNumero" name="txtNumero" placeholder="Nº" value="<?= $endereco['numero'] ?? '' ?>">
                            </div>
                        </div>

                        <!-- Bairro, cidade, complemento -->
                        <div class="fields">
                            <div class="ten wide field">
                                <label for="txtBairro">Bairro</label>
                                <input type="text" id="txtBairro" name="txtBairro" placeholder="Bairro..."
                                    value="<?= $endereco['bairro'] ?? '' ?>">
                            </div>
                            <div class="three wide field">
                                <label for="txtCidade">Cidade</label>
                                <input type="text" id="txtCidade" name="txtCidade" placeholder="Americana..." value="<?= $endereco['cidade'] ?>">
                            </div>
                            <div class="three wide field">
                                <label for="txtComplemento">Complemento</label>
                                <input type="text" id="txtComplemento" name="txtComplemento" placeholder="Escola, apartamento..."
                                    value="<?= $endereco['complemento'] ?? '' ?>">
                            </div>
                        </div>

                        <!-- Autorização medicação -->
                        <div class="fields">
                            <div class="ten wide field">
                                <label>Em caso de febre autoriza medicar a criança?</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" id="autorizacaoMed" name="autorizacaoMed" value="1"
                                        <?= ($aluno['autorizacao_febre'] ?? 0) ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>

                            <div class="three wide field oculto" id="fieldGotas">
                                <label for="txtGotas">Quantas gotas</label>
                                <input type="number" id="txtGotas" name="txtGotas" placeholder="1, 2, 3..."
                                    value="<? $aluno['gotas'] ?>">
                            </div>
                            <div class="three wide field oculto" id="fieldRemedio">
                                <label for="txtRemedio">Qual remédio</label>
                                <input type="text" id="txtRemedio" name="txtRemedio" placeholder=""
                                    value="<? $aluno['remedio'] ?>">
                            </div>
                        </div>

                        <!-- Autorização imagem -->
                        <div class="fields">
                            <div class="ten wide field">
                                <label>Autorizo a divulgação de imagem do meu filho(a) para uso de projetos na escola, fotos, filmagem, Facebook, Instagram e site.</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="autorizacaoImagem" value="1"
                                        <?= ($aluno['permissao_foto'] ?? 0) ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>
                        </div>


                    </section>
                    <section class="ui segment red raised sessao-tab">
                        <h2>Responsável 1</h2>
                        <div class="responsavel" id="responsavel-1">
                            <div class="fields">
                                <div class="four wide field">
                                    <label for="txtTipoResponsavel_1">Tipo do responsável</label>
                                    <select class="ui search dropdown" id="txtTipoResponsavel_1" name="txtTipoResponsavel_1">
                                        <option value="" disabled selected hidden>Selecione o tipo</option>

                                        <?php
                                        // Variável PHP para determinar a opção selecionada
                                        $tipo_selecionado = $resp1['tipo_responsavel'] ?? '';
                                        ?>

                                        <option value="Pai" <?= ($tipo_selecionado === 'Pai') ? 'selected' : '' ?>>Pai</option>
                                        <option value="Mãe" <?= ($tipo_selecionado === 'Mãe') ? 'selected' : '' ?>>Mãe</option>
                                        <option value="Avô" <?= ($tipo_selecionado === 'Avô') ? 'selected' : '' ?>>Avô</option>
                                        <option value="Avó" <?= ($tipo_selecionado === 'Avó') ? 'selected' : '' ?>>Avó</option>
                                        <option value="Irmão" <?= ($tipo_selecionado === 'Irmão') ? 'selected' : '' ?>>Irmão</option>
                                        <option value="Irmã" <?= ($tipo_selecionado === 'Irmã') ? 'selected' : '' ?>>Irmã</option>
                                        <option value="Tio" <?= ($tipo_selecionado === 'Tio') ? 'selected' : '' ?>>Tio</option>
                                        <option value="Tia" <?= ($tipo_selecionado === 'Tia') ? 'selected' : '' ?>>Tia</option>
                                        <option value="Outro" <?= ($tipo_selecionado === 'Outro') ? 'selected' : '' ?>>Outro</option>
                                    </select>
                                </div>
                                <div class="eight wide field">
                                    <label for="txtNomeResponsavel_1">Nome do Responsável</label>
                                    <input value="<?= $resp1['nome'] ?? '' ?>" type="text" id="txtNomeResponsavel_1" name="txtNomeResponsavel_1" placeholder="Nome Completo">
                                </div>
                                <div class="four wide field">
                                    <label>Data Nascimento</label>
                                    <div class="ui calendar" id="dataNascimentoCalendar_1">
                                        <div class="ui input">
                                            <input type="text" id="txtDataNascimento_1" name="txtDataNascimento_1" placeholder="dd/mm/aaaa" value="<?= $resp1['data_nascimento'] ?? '' ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="four wide field">
                                    <label for="txtEstadoCivil_1">Estado Civil</label>
                                    <select class="ui search dropdown" id="txtEstadoCivil_1" name="txtEstadoCivil_1">
                                        <option value="" disabled selected hidden>Selecione o estado civil</option>

                                        <?php
                                        $estado_civil_selecionado = $resp1['estado_civil'] ?? '';
                                        ?>

                                        <option value="Solteiro" <?= ($estado_civil_selecionado === 'Solteiro') ? 'selected' : '' ?>>Solteiro</option>
                                        <option value="Casado" <?= ($estado_civil_selecionado === 'Casado') ? 'selected' : '' ?>>Casado</option>
                                        <option value="Divorciado" <?= ($estado_civil_selecionado === 'Divorciado') ? 'selected' : '' ?>>Divorciado</option>
                                        <option value="Viuvo" <?= ($estado_civil_selecionado === 'Viúvo') ? 'selected' : '' ?>>Viúvo</option>
                                    </select>
                                </div>
                                <div class="four wide field">
                                    <label for="txtTelefone_1">Telefone</label>
                                    <input type="text" id="txtTelefone_1" name="txtTelefone_1" placeholder="(19) 99999-9999" value="<?= $resp1['celular'] ?? '' ?>">
                                </div>
                                <div class="eight wide field">
                                    <label for="txtEmail_1">Email</label>
                                    <input type="email" id="txtEmail_1" name="txtEmail_1" placeholder="exemplo@email.com" value="<?= $resp1['email'] ?? '' ?>">
                                </div>
                            </div>

                            <div class="fields">
                                <div class="eight wide field">
                                    <label for="txtNomeEmpresa_1">Nome da Empresa</label>
                                    <input type="text" id="txtNomeEmpresa_1" name="txtNomeEmpresa_1" placeholder="Empresa..." value="<?= $resp1['nome_empresa'] ?? '' ?>">
                                </div>
                                <div class="four wide field">
                                    <label for="txtProfissao_1">Profissão</label>
                                    <input type="text" id="txtProfissao_1" name="txtProfissao_1" placeholder="Arquiteto, Advogado..." value="<?= $resp1['profissao'] ?? '' ?>">
                                </div>
                                <div class="four wide field">
                                    <label for="txtTelefoneTrabalho_1">Telefone do Trabalho</label>
                                    <input type="text" id="txtTelefoneTrabalho_1" name="txtTelefoneTrabalho_1" placeholder="(19) 99999-9999" value="<?= $resp1['telefone_trabalho'] ?? '' ?>">
                                </div>
                            </div>

                            <div class="fields">
                                <div class="four wide field">
                                    <label for="txtHorarioTrabalho_1">Horário de Trabalho</label>
                                    <input type="text" id="txtHorarioTrabalho_1" name="txtHorarioTrabalho_1" placeholder="8h às 18h..." value="<?= $resp1['horario_trabalho'] ?? '' ?>">
                                </div>
                                <div class="four wide field">
                                    <label for="txtSalario_1">Salário do responsável</label>
                                    <input type="number" id="txtSalario_1" name="txtSalario_1" placeholder="R$1500,00..." value="<?= $resp1['salario'] ?? '' ?>">
                                </div>
                                <div class="eight wide field">
                                    <label for="toggleRendaExtra_1">Possui Renda Extra?</label>
                                    <div class="ui toggle checkbox">
                                        <input type="checkbox" id="toggleRendaExtra_1" name="toggleRendaExtra_1" <?= ($resp1['renda_extra'] ?? false) ? 'checked' : '' ?>>
                                        <label></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui divider"></div>
                    </section>

                    <section class="ui segment yellow raised">
                        <h2>Estrutura Familiar</h2>
                        <div class="fields">
                            <div class="four wide field">
                                <label>Pais vivem juntos</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="pais_vivem_juntos"
                                        value="1" <?= ($estrutura['pais_vivem_juntos'] ?? 0) == 1 ? 'checked' : '' ?>>
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
                                    <input type="checkbox" name="recebe_bolsa_familia" id="toggle-bolsa-familia" value="1"
                                        <?= ($estrutura['recebe_bolsa_familia'] ?? 0) == 1 ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>
                            <div class="four wide field <?= (($estrutura['recebe_bolsa_familia'] ?? 0) == 1) ? '' : 'oculto' ?>" id="valor-bolsa-field">
                                <label>Valor</label>
                                <input type="number" placeholder="R$" name="valor" value="<?= $estrutura['valor'] ?? '' ?>">
                            </div>
                        </div>

                        <div class="fields">
                            <div class="four wide field">
                                <label>Possui alergia</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="possui_alergia" id="toggle-alergia" value="1"
                                        <?= ($estrutura['possui_alergia'] ?? 0) == 1 ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>
                            <div class="four wide field" id="especifique-alergia-field">
                                <label>Especifique</label>
                                <input type="text" placeholder="" name="especifique_alergia" value="<?= $estrutura['especifique_alergia'] ?? '' ?>">
                            </div>
                            <div class="four wide field">
                                <label>Possui convênio</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="possui_convenio" id="toggle-convenio" value="1"
                                        <?= ($estrutura['possui_convenio'] ?? 0) == 1 ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>
                            <div class="four wide field" id="qual-convenio-field">
                                <label>Qual convênio</label>
                                <input type="text" placeholder="" name="qual_convenio" value="<?= $estrutura['qual_convenio'] ?? '' ?>">
                            </div>
                        </div>

                        <div class="fields">
                            <div class="four wide field">
                                <label>Portador de alguma necessidade especial</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="portador_necessidade_especial" id="toggle-necessidade-especial" value="1"
                                        <?= ($estrutura['portador_necessidade_especial'] ?? 0) == 1 ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>
                            <div class="four wide field" id="qual-necessidade-field">
                                <label>Qual</label>
                                <input type="text" placeholder="" name="qual_necessidade" value="<?= $estrutura['qual_necessidade'] ?? '' ?>">
                            </div>
                            <div class="four wide field">
                                <label>Problemas de visão</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="problemas_visao" value="1"
                                        <?= ($estrutura['problemas_visao'] ?? 0) == 1 ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>
                            <div class="four wide field">
                                <label>Já fez cirurgia</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="ja_fez_cirurgia" value="1"
                                        <?= ($estrutura['ja_fez_cirurgia'] ?? 0) == 1 ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>
                        </div>

                        <div class="fields">
                            <div class="four wide field">
                                <label>Tomou vacina contra catapora ou varicela</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="vacina_catapora_varicela" value="1"
                                        <?= ($estrutura['vacina_catapora_varicela'] ?? 0) == 1 ? 'checked' : '' ?>>
                                    <label></label>
                                </div>
                            </div>
                        </div>

                        <h4 class="ui dividing header">Transporte para a escola</h4>
                        <?php
                        // Assume-se que $estrutura['transporte'] contém o valor único salvo (ex: 'carro')
                        $transporte_selecionado = $estrutura['transporte'] ?? '';
                        ?>
                        <div class="fields">
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="transporte" value="carro"
                                        <?= $transporte_selecionado == 'carro' ? 'checked' : '' ?>>
                                    <label>Carro</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="transporte" value="van"
                                        <?= $transporte_selecionado == 'van' ? 'checked' : '' ?>>
                                    <label>Van Escolar</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="transporte" value="pe"
                                        <?= $transporte_selecionado == 'pe' ? 'checked' : '' ?>>
                                    <label>A Pé</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="transporte" value="outros"
                                        <?= $transporte_selecionado == 'outros' ? 'checked' : '' ?>>
                                    <label>Outros</label>
                                </div>
                            </div>
                        </div>

                        <h4 class="ui dividing header">Doenças que a criança já teve</h4>
                        <div class="ui grid">
                            <div class="five wide column">
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="doenca_anemia" value="1" <?= ($estrutura['doenca_anemia'] ?? 0) == 1 ? 'checked' : '' ?>>
                                        <label>Anemia</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="doenca_bronquite" value="1" <?= ($estrutura['doenca_bronquite'] ?? 0) == 1 ? 'checked' : '' ?>>
                                        <label>Bronquite</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="doenca_cardiaca" value="1" <?= ($estrutura['doenca_cardiaca'] ?? 0) == 1 ? 'checked' : '' ?>>
                                        <label>Doença Cardíaca</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="doenca_catapora" value="1" <?= ($estrutura['doenca_catapora'] ?? 0) == 1 ? 'checked' : '' ?>>
                                        <label>Catapora</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="doenca_diabetes" value="1" <?= ($estrutura['doenca_diabetes'] ?? 0) == 1 ? 'checked' : '' ?>>
                                        <label>Diabetes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="five wide column">
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="doenca_hepatite" value="1" <?= ($estrutura['doenca_hepatite'] ?? 0) == 1 ? 'checked' : '' ?>>
                                        <label>Hepatite</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="doenca_meningite" value="1" <?= ($estrutura['doenca_meningite'] ?? 0) == 1 ? 'checked' : '' ?>>
                                        <label>Meningite</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="doenca_pneumonia" value="1" <?= ($estrutura['doenca_pneumonia'] ?? 0) == 1 ? 'checked' : '' ?>>
                                        <label>Pneumonia</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="doenca_caxumba" value="1" <?= ($estrutura['doenca_caxumba'] ?? 0) == 1 ? 'checked' : '' ?>>
                                        <label>Caxumba</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="doenca_convulsao" value="1" <?= ($estrutura['doenca_convulsao'] ?? 0) == 1 ? 'checked' : '' ?>>
                                        <label>Convulsão</label>
                                    </div>
                                </div>
                            </div>
                            <div class="five wide column">
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="doenca_dengue" value="1" <?= ($estrutura['doenca_dengue'] ?? 0) == 1 ? 'checked' : '' ?>>
                                        <label>Dengue</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="doenca_desidratacao" value="1" <?= ($estrutura['doenca_desidratacao'] ?? 0) == 1 ? 'checked' : '' ?>>
                                        <label>Desidratação</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="doenca_refluxo" value="1" <?= ($estrutura['doenca_refluxo'] ?? 0) == 1 ? 'checked' : '' ?>>
                                        <label>Refluxo</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="doenca_rubeola" value="1" <?= ($estrutura['doenca_rubeola'] ?? 0) == 1 ? 'checked' : '' ?>>
                                        <label>Rubéola</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="doenca_sarampo" value="1" <?= ($estrutura['doenca_sarampo'] ?? 0) == 1 ? 'checked' : '' ?>>
                                        <label>Sarampo</label>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="doenca_verminose" value="1" <?= ($estrutura['doenca_verminose'] ?? 0) == 1 ? 'checked' : '' ?>>
                                        <label>Verminoses</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="ui segment green raised">
                        <h2>Parentesco</h2>
                        <div class="pessoaAutorizada" id="autorizada-1">
                            <div class="fields">
                                <div class="eight wide field">
                                    <label for="txtNomePessoaAutorizada">Nome</label>
                                    <input type="text" id="txtNomePessoaAutorizada" name="txtNomePessoaAutorizada" placeholder=""
                                      value="">
                                </div>
                                <div class="four wide field">
                                    <label for="txtCpfAutorizada">CPF</label>
                                    <input type="text" id="txtCpfAutorizada" name="txtCpfAutorizada" placeholder=""
                                    value="">
                                </div>
                                <div class="four wide field">
                                    <label for="txtTelefoneAutorizada">Telefone</label>
                                    <input type="text" id="txtTelefoneAutorizada" name="txtTelefoneAutorizada" placeholder="">
                                </div>
                            </div>

                            <div class="fields">
                                <div class="four wide field">
                                    <label for="txtParentenco">Parentesco</label>
                                    <select class="ui search dropdown" name="txtParentenco">
                                        <option value="" disabled selected hidden>Selecione o parentesco</option>
                                        <option value="Pai">Pai</option>
                                        <option value="Mãe">Mãe</option>
                                        <option value="Avô">Avô</option>
                                        <option value="Avó">Avó</option>
                                        <option value="Irmão">Irmão</option>
                                        <option value="Irmã">Irmã</option>
                                        <option value="Tio">Tio</option>
                                        <option value="Tia">Tia</option>
                                        <option value="Outro">Outro</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="ui divider"></div>

                        <div class="pessoaAutorizada" id="autorizada-2" style="display: none;">
                            <div class="fields">
                                <div class="eight wide field">
                                    <label for="txtNomePessoaAutorizada">Nome</label>
                                    <input type="text" id="txtNomePessoaAutorizada2" placeholder="">
                                </div>
                                <div class="four wide field">
                                    <label for="txtCpfAutorizada">CPF</label>
                                    <input type="text" id="txtCpfAutorizada2" placeholder="">
                                </div>
                                <div class="four wide field">
                                    <label for="txtTelefoneAutorizada">Telefone</label>
                                    <input type="text" id="txtTelefoneAutorizada2" placeholder="">
                                </div>
                            </div>

                            <div class="fields">
                                <div class="four wide field">
                                    <label for="txtParentenco">Parentesco</label>
                                    <select class="ui search dropdown" name="txtParentenco2">
                                        <option value="" disabled selected hidden>Selecione o parentesco</option>
                                        <option value="Pai">Pai</option>
                                        <option value="Mãe">Mãe</option>
                                        <option value="Avô">Avô</option>
                                        <option value="Avó">Avó</option>
                                        <option value="Irmão">Irmão</option>
                                        <option value="Irmã">Irmã</option>
                                        <option value="Tio">Tio</option>
                                        <option value="Tia">Tia</option>
                                        <option value="Outro">Outro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="fields" style="margin-top: 10px;">
                                <div class="sixteen wide field">
                                    <div class="right floated column">
                                        <button type="button" id="btnRemoverAutorizada" class="ui red button right floated">
                                            <i class="trash icon"></i> Remover Pessoa Autorizada
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="fields">
                            <div class="sixteen wide field">
                                <div class="right floated column">
                                    <button class="ui blue button right floated" id="btnAdicionarAutorizada">
                                        <i class="plus circle icon"></i>
                                        Adicionar Pessoa Autorizada
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- BOTÕES -->
                        <div class="ui grid">
                            <div class="four column row">
                                <div class="right floated column">
                                    <button type="button" id="btn-salvar-dados" class="ui yellow icon button right floated ">
                                        <i class="save icon"></i> Editar Cadastro
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>

                    <div class="ui error message"></div>
                </form>

                <?php include './template/modal/modal-salvar-dados.php' ?>
            </section>
        </main>
    </section>
</body>

</html>
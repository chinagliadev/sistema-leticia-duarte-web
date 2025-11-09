<?php
require './config.php';
include './class/Matricula.php';

$matricula = new Matricula();

$ra_aluno = $_GET['idAluno'] ?? '';

if (empty($ra_aluno)) {
    die("Erro: Nenhum aluno selecionado.");
}


$dadosCompletos = $matricula->buscarDadosCompletosAluno($ra_aluno);

if (!$dadosCompletos) {
    die("Erro: Aluno não encontrado.");
}

$aluno = $dadosCompletos['aluno'] ?? [];
$endereco = $dadosCompletos['endereco'] ?? [];
$responsavel_1 = $dadosCompletos['responsavel_1'] ?? [];
$responsavel_2 = $dadosCompletos['responsavel_2'] ?? [];
$estrutura_familiar = $dadosCompletos['estrutura_familiar'] ?? [];
$pessoa_autorizada_1 = $dadosCompletos['pessoa_autorizada_1'] ?? [];
$pessoa_autorizada_2 = $dadosCompletos['pessoa_autorizada_2'] ?? [];
$pessoa_autorizada_3 = $dadosCompletos['pessoa_autorizada_3'] ?? [];
$pessoa_autorizada_4 = $dadosCompletos['pessoa_autorizada_4'] ?? [];


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Aluno</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" />
    <link rel="stylesheet" href="./css/sistema.css" />

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui-calendar@0.0.8/dist/calendar.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui-calendar@0.0.8/dist/calendar.min.css">

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
            <section class="sessao_cadastro">
                <section class="cabecalho_cadastrados ui segment blue">
                    <h2>Editar <br>Aluno</h2>
                    <img class="tamanho-img ui small image fluid" src="./img/apresentacao_img/Logo Leiticia Duarte.png" alt="logo da leticia duarte">
                </section>

                <form method="post" action="./salvar-edicao-aluno.php" class="ui form form-cadastro-aluno" id="formulario-aluno">
                    <input type="hidden" name="id_aluo" value="<?= $aluno['id'] ?>">

                    <?php
                    include './template/cadastro_aluno/aluno.php';
                    include './template/cadastro_aluno/responsavel.php';
                    include './template/cadastro_aluno/estrutura-familiar.php';
                    ?>

                    <section class="ui segment green raised">
                        <h2 style="margin-bottom: 20px;">Pessoa autorizada a buscar meu filho(a)</h2>

                        <div class="pessoaAutorizada" id="autorizada-1" style="margin-top: 10px;">
                            <div class="ui horizontal divider">Pessoa Autorizada 1</div>
                            <div class="fields">
                                <div class="six wide field" id="div_nome_autorizada">
                                    <label for="txtNomePessoaAutorizada">Nome</label>
                                    <input type="text" id="txtNomePessoaAutorizada" name="txtNomePessoaAutorizada"
                                        value="<?= htmlspecialchars($pessoa_autorizada_1['nome'] ?? '') ?>" placeholder="">
                                    <div class="ui hidden negative message" id="mensagem-erro-nomeAutorizada">
                                        <div class="content"><i class="user icon"></i><span id="nomeAutorizada-erro"></span></div>
                                    </div>
                                </div>

                                <div class="three wide field" id="div_cpf_autorizada">
                                    <label for="txtCpfAutorizada">CPF</label>
                                    <input type="text" id="txtCpfAutorizada" name="txtCpfAutorizada"
                                        value="<?= htmlspecialchars($pessoa_autorizada_1['cpf'] ?? '') ?>" placeholder="">
                                    <div class="ui hidden negative message" id="mensagem-erro-cpf">
                                        <div class="content"><i class="user icon"></i><span id="cpf-erro"></span></div>
                                    </div>
                                </div>

                                <div class="three wide field" id="div_telefone_autorizada">
                                    <label for="txtTelefoneAutorizada">Telefone</label>
                                    <input type="text" id="txtTelefoneAutorizada" name="txtTelefoneAutorizada"
                                        value="<?= htmlspecialchars($pessoa_autorizada_1['celular'] ?? '') ?>" placeholder="">
                                    <div class="ui hidden negative message" id="mensagem-erro-telefone-autorizada">
                                        <div class="content"><i class="user icon"></i><span id="telefone-autorizada-erro"></span></div>
                                    </div>
                                </div>

                                <div class="four wide field" id="div_parentesco">
                                    <label for="txtParentesco">Parentesco</label>
                                    <select class="ui search dropdown" id="txtParentesco" name="txtParentesco">
                                        <option value="" disabled hidden <?= empty($pessoa_autorizada_1['parentesco']) ? 'selected' : '' ?>>Selecione o parentesco</option>
                                        <?php
                                        $parentescos = ['Pai', 'Mãe', 'Avô', 'Avó', 'Irmão', 'Irmã', 'Tio', 'Tia', 'Outro'];
                                        foreach ($parentescos as $p) {
                                            $selected = ($pessoa_autorizada_1['parentesco'] ?? '') === $p ? 'selected' : '';
                                            echo "<option value='$p' $selected>$p</option>";
                                        }
                                        ?>
                                    </select>
                                    <div class="ui hidden negative message" id="mensagem-erro-parentesco-autorizada">
                                        <div class="content"><i class="user icon"></i><span id="parentesco-autorizada-erro"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="pessoaAutorizada" id="autorizada-2">
                            <div class="ui horizontal divider">Pessoa Autorizada 2</div>
                            <div class="fields">
                                <div class="six wide field" id="div_nome_autorizada2">
                                    <label for="txtNomePessoaAutorizada2">Nome</label>
                                    <input
                                        type="text"
                                        name="txtNomePessoaAutorizada2"
                                        id="txtNomePessoaAutorizada2"
                                        value="<?= htmlspecialchars($pessoa_autorizada_2['nome'] ?? '') ?>"
                                        placeholder="">
                                    <div class="ui hidden negative message" id="mensagem-erro-nomeAutorizada2">
                                        <div class="content">
                                            <i class="exclamation triangle icon"></i>
                                            <span id="nomeAutorizada2-erro"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="three wide field" id="div_cpf_autorizada2">
                                    <label for="txtCpfAutorizada2">CPF</label>
                                    <input
                                        type="text"
                                        name="txtCpfAutorizada2"
                                        id="txtCpfAutorizada2"
                                        value="<?= htmlspecialchars($pessoa_autorizada_2['cpf'] ?? '') ?>"
                                        placeholder="">
                                    <div class="ui hidden negative message" id="mensagem-erro-cpf2" style="margin-top: 10px">
                                        <div class="content">
                                            <i class="exclamation triangle icon"></i>
                                            <span id="cpf2-erro"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="three wide field" id="div_telefone_autorizada2">
                                    <label for="txtTelefoneAutorizada2">Telefone</label>
                                    <input
                                        type="text"
                                        name="txtTelefoneAutorizada2"
                                        id="txtTelefoneAutorizada2"
                                        value="<?= htmlspecialchars($pessoa_autorizada_2['celular'] ?? '') ?>"
                                        placeholder="">
                                    <div class="ui hidden negative message" id="mensagem-erro-telefone2-autorizada" style="margin-top: 10px">
                                        <div class="content">
                                            <i class="exclamation triangle icon"></i>
                                            <span id="telefone-autorizada2-erro"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="four wide field" id="div_parentesco2">
                                    <label for="txtParentenco2">Parentesco</label>
                                    <select class="ui search dropdown" id="txtParentenco2" name="txtParentesco2" onblur="validarParentesco2()">
                                        <option value="" disabled hidden <?= empty($pessoa_autorizada_2['parentesco']) ? 'selected' : '' ?>>Selecione o parentesco</option>
                                        <?php
                                        foreach ($parentescos as $p) {
                                            $selected = ($pessoa_autorizada_2['parentesco'] ?? '') === $p ? 'selected' : '';
                                            echo "<option value='$p' $selected>$p</option>";
                                        }
                                        ?>
                                    </select>

                                    <div class="ui hidden negative message" id="mensagem-erro-parentesco-autorizada2" style="margin-top: 10px">
                                        <div class="content">
                                            <i class="exclamation triangle icon"></i>
                                            <span id="parentesco-autorizada-erro2"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PESSOA AUTORIZADA 3 -->
                        <div class="pessoaAutorizada" id="autorizada-3">
                            <div class="ui horizontal divider">Pessoa Autorizada 3</div>
                            <div class="fields">
                                <!-- Nome -->
                                <div class="six wide field" id="div_nome_autorizada3">
                                    <label for="txtNomePessoaAutorizada3">Nome</label>
                                    <input type="text" name="txtNomePessoaAutorizada3" id="txtNomePessoaAutorizada3"
                                        value="<?= htmlspecialchars($pessoa_autorizada_3['nome'] ?? '') ?>" placeholder="">
                                    <div class="ui hidden negative message" id="mensagem-erro-nomeAutorizada3" style="margin-top: 10px">
                                        <div class="content">
                                            <i class="exclamation triangle icon"></i>
                                            <span id="nomeAutorizada3-erro"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- CPF -->
                                <div class="three wide field" id="div_cpf_autorizada3">
                                    <label for="txtCpfAutorizada3">CPF</label>
                                    <input type="text" name="txtCpfAutorizada3" id="txtCpfAutorizada3"
                                        value="<?= htmlspecialchars($pessoa_autorizada_3['cpf'] ?? '') ?>" placeholder="">
                                    <div class="ui hidden negative message" id="mensagem-erro-cpf3" style="margin-top: 10px">
                                        <div class="content">
                                            <i class="exclamation triangle icon"></i>
                                            <span id="cpf3-erro"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Telefone -->
                                <div class="three wide field" id="div_telefone_autorizada3">
                                    <label for="txtTelefoneAutorizada3">Telefone</label>
                                    <input type="text" name="txtTelefoneAutorizada3" id="txtTelefoneAutorizada3"
                                        value="<?= htmlspecialchars($pessoa_autorizada_3['celular'] ?? '') ?>" placeholder="">
                                    <div class="ui hidden negative message" id="mensagem-erro-telefone3-autorizada" style="margin-top: 10px">
                                        <div class="content">
                                            <i class="exclamation triangle icon"></i>
                                            <span id="telefone-autorizada3-erro"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Parentesco -->
                                <div class="four wide field" id="div_parentesco3">
                                    <label for="txtParentesco3">Parentesco</label>
                                    <select class="ui search dropdown" id="txtParentesco3" name="txtParentesco3"
                                        onblur="validarParentesco3()">
                                        <option value="" disabled hidden <?= empty($pessoa_autorizada_3['parentesco']) ? 'selected' : '' ?>>Selecione o parentesco</option>
                                        <?php
                                        foreach ($parentescos as $p) {
                                            $selected = ($pessoa_autorizada_3['parentesco'] ?? '') === $p ? 'selected' : '';
                                            echo "<option value='$p' $selected>$p</option>";
                                        }
                                        ?>
                                    </select>
                                    <div class="ui hidden negative message" id="mensagem-erro-parentesco-autorizada3" style="margin-top: 10px">
                                        <div class="content">
                                            <i class="exclamation triangle icon"></i>
                                            <span id="parentesco-autorizada-erro3"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PESSOA AUTORIZADA 4 -->
                        <div class="pessoaAutorizada" id="autorizada-4">
                            <div class="ui horizontal divider">Pessoa Autorizada 4</div>
                            <div class="fields">
                                <!-- Nome -->
                                <div class="six wide field" id="div_nome_autorizada4">
                                    <label for="txtNomePessoaAutorizada4">Nome</label>
                                    <input type="text" name="txtNomePessoaAutorizada4" id="txtNomePessoaAutorizada4"
                                        value="<?= htmlspecialchars($pessoa_autorizada_4['nome'] ?? '') ?>" placeholder="">
                                    <div class="ui hidden negative message" id="mensagem-erro-nomeAutorizada4" style="margin-top: 10px">
                                        <div class="content">
                                            <i class="exclamation triangle icon"></i>
                                            <span id="nomeAutorizada4-erro"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- CPF -->
                                <div class="three wide field" id="div_cpf_autorizada4">
                                    <label for="txtCpfAutorizada4">CPF</label>
                                    <input type="text" name="txtCpfAutorizada4" id="txtCpfAutorizada4"
                                        value="<?= htmlspecialchars($pessoa_autorizada_4['cpf'] ?? '') ?>" placeholder="">
                                    <div class="ui hidden negative message" id="mensagem-erro-cpf4" style="margin-top: 10px">
                                        <div class="content">
                                            <i class="exclamation triangle icon"></i>
                                            <span id="cpf4-erro"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Telefone -->
                                <div class="three wide field" id="div_telefone_autorizada4">
                                    <label for="txtTelefoneAutorizada4">Telefone</label>
                                    <input type="text" name="txtTelefoneAutorizada4" id="txtTelefoneAutorizada4"
                                        value="<?= htmlspecialchars($pessoa_autorizada_4['celular'] ?? '') ?>" placeholder="">
                                    <div class="ui hidden negative message" id="mensagem-erro-telefone4-autorizada" style="margin-top: 10px">
                                        <div class="content">
                                            <i class="exclamation triangle icon"></i>
                                            <span id="telefone-autorizada4-erro"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="four wide field" id="div_parentesco4">
                                    <label for="txtParentesco4">Parentesco</label>
                                    <select class="ui search dropdown" id="txtParentesco4" name="txtParentesco4"
                                        onblur="validarParentesco4()">
                                        <option value="" disabled hidden <?= empty($pessoa_autorizada_4['parentesco']) ? 'selected' : '' ?>>Selecione o parentesco</option>
                                        <?php
                                        foreach ($parentescos as $p) {
                                            $selected = ($pessoa_autorizada_4['parentesco'] ?? '') === $p ? 'selected' : '';
                                            echo "<option value='$p' $selected>$p</option>";
                                        }
                                        ?>
                                    </select>
                                    <div class="ui hidden negative message" id="mensagem-erro-parentesco-autorizada4" style="margin-top: 10px">
                                        <div class="content">
                                            <i class="exclamation triangle icon"></i>
                                            <span id="parentesco-autorizada-erro4"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="ui grid">
                            <div class="four column row">
                                <div class="left floated column">
                                    <a href="./cadastrados.php" class="ui icon button left floated">
                                        <i class="angle left icon"></i> Voltar
                                    </a>
                                </div>
                                <div class="right floated column">
                                    <button onclick="validarFormularioCompleto('editar')" type="button" id="btn-editar-dados" class="ui yellow icon button right floated">
                                        <i class="save icon"></i> Editar Cadastro
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>

                <?php include './template/modal/modal-formulario-invalido.php' ?>
                <?php include './template/modal/modal-editar-cadastro.php'?>
            </section>
        </main>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#txtNomeCrianca').val('<?= $aluno['nome'] ?>');
            $('#txtRaAluno').val('<?= $aluno['ra_aluno'] ?>');
            $('#txtCpfAluno').val('<?= $aluno['cpf'] ?>');
            $('#txtRgAluno').val('<?= $aluno['rg'] ?>');
            $('#txtTurma').val('<?= $aluno['turma'] ?>');
            $('#txtDataNascimento').val('<?= $aluno['data_nascimento'] ?? '' ?>');
            $('#txtRaca').val('<?= $aluno['cor_raca'] ?>');
            $('#txtCep').val('<?= $endereco['cep'] ?>');
            $('#txtEndereco').val('<?= $aluno['endereco'] ?>');
            $('#txtNumero').val('<?= $aluno['numero'] ?>');
            $('#txtBairro').val('<?= $aluno['bairro'] ?>');
            $('#txtCidade').val('<?= $aluno['cidade'] ?>');
            $('#txtComplemento').val('<?= $aluno['complemento'] ?>');

            <?php if ($aluno['autorizacao_medicacao'] ?? 0) : ?>
                $('#autorizacaoMed').prop('checked', true);
                $('#camposGotas').removeClass('oculto');
                $('#fieldRemedio').removeClass('oculto');
            <?php endif; ?>

            $('#txtGotas').val('<?= $aluno['quantidade_gotas'] ?>');
            $('#txtRemedio').val('<?= $aluno['remedio'] ?>');

            <?php if ($aluno['autorizacao_imagem'] ?? 0) : ?>
                $('input[name="autorizacaoImagem"]').prop('checked', true);
            <?php endif; ?>
        });
    </script>
</body>

</html>
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
                <?php include './etapas-cadastro.php' ?>
                <form method="post" action="./salvar-cadastro-aluno.php" class="ui form form-cadastro-aluno" id="formulario-aluno">

                    <!-- Nome, nascimento e raça -->
                    <div class="fields">
                        <div class="seven wide field">
                            <label for="txtNomeCrianca">Nome da Criança</label>
                            <input type="text" id="txtNomeCrianca" name="txtNomeCrianca" placeholder="Digite o nome da criança">
                        </div>
                        <div class="three wide field">
                            <label for="txtTurma">Turma</label>
                            <div class="ui selection dropdown">
                                <input type="hidden" name="turma" id="txtTurma">
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
                                <option value="" disabled selected hidden>Selecione Cor / Raça</option>
                                <option value="branca">Branca</option>
                                <option value="preta">Preta</option>
                                <option value="parda">Parda</option>
                                <option value="amarela">Amarela</option>
                                <option value="indigena">Indígena</option>
                                <option value="outra">Outra</option>
                            </select>
                        </div>
                    </div>

                    <!-- Endereço -->
                    <div class="fields">
                        <div class="three wide field">
                            <label for="txtCep">CEP</label>
                            <input type="text" id="txtCep" name="txtCep" placeholder="00000-000">
                            <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" target="_blank">Não sei o meu cep</a>
                        </div>
                        <div class="ten wide field">
                            <label for="txtEndereco">Endereço</label>
                            <input type="text" id="txtEndereco" name="txtEndereco" placeholder="Rua, Avenida...">
                        </div>
                        <div class="three wide field">
                            <label for="txtNumero">Número</label>
                            <input type="text" id="txtNumero" name="txtNumero" placeholder="Nº">
                        </div>
                    </div>

                    <!-- Bairro, cidade, complemento -->
                    <div class="fields">
                        <div class="ten wide field">
                            <label for="txtBairro">Bairro</label>
                            <input type="text" id="txtBairro" name="txtBairro" placeholder="Bairro...">
                        </div>
                        <div class="three wide field">
                            <label for="txtCidade">Cidade</label>
                            <input type="text" id="txtCidade" name="txtCidade" placeholder="Americana...">
                        </div>
                        <div class="three wide field">
                            <label for="txtComplemento">Complemento</label>
                            <input type="text" id="txtComplemento" name="txtComplemento" placeholder="Escola, apartamento...">
                        </div>
                    </div>

                    <!-- Autorização medicação -->
                    <div class="fields">
                        <div class="ten wide field">
                            <label>Em caso de febre autoriza medicar a criança?</label>
                            <div class="ui toggle checkbox">
                                <input type="checkbox" id="autorizacaoMed" name="autorizacaoMed">
                                <label></label>
                            </div>
                        </div>

                        <div class="three wide field oculto" id="fieldGotas">
                            <label for="txtGotas">Quantas gotas</label>
                            <input type="number" id="txtGotas" name="txtGotas" placeholder="1, 2, 3...">
                        </div>
                        <div class="three wide field oculto" id="fieldRemedio">
                            <label for="txtRemedio">Qual remédio</label>
                            <input type="text" id="txtRemedio" name="txtRemedio" placeholder="">
                        </div>
                    </div>

                    <!-- Autorização imagem -->
                    <div class="fields">
                        <div class="ten wide field">
                            <label>Autorizo a divulgação de imagem do meu filho(a) para uso de projetos na escola, fotos, filmagem, Facebook, Instagram e site.</label>
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="autorizacaoImagem">
                                <label></label>
                            </div>
                        </div>
                    </div>

                    <div class="ui error message"></div>

                    <!-- Botão -->
                    <div class="ui grid">
                        <div class="four column row">
                            <div class="right floated column">
                                <button type="submit" class="ui basic blue icon button right floated">
                                    <i class="angle right icon"></i> Próximo
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </section>

    <script src="./js/validarCadastroAluno.js"></script>
</body>

</html>
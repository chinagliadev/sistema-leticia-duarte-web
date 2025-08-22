<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema</title>

    <link rel="stylesheet" href="./css/cadastros.css" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" />
    
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
</head>

<body>
    <button id="btn-menu" class="ui icon button">
        <i class="sidebar icon"></i>
    </button>

    <section class="corpo_pagina">
        <?php
            include './template/menuLateral.php'
        ?>

        <main class="conteudo_cadastrados">
            <section class="cabecalho_cadastrados">
                <h2>Alunos<br>cadastrados</h2>
                <img class="ui small image fluid" src="./img/apresentacao_img/Logo Leiticia Duarte.png"
                    alt="logo da leticia duarte na tela de cadastros de alunos">
            </section>

            <section class="sessao_cadastro ui segment blue ">
                <form class="ui form form-cadastro-aluno">
                    <div class="fields">
                        <div class="ten wide field">
                            <label for="txtNomeCriança">Nome da Criança</label>
                            <input type="text" placeholder="Digite o nome da criança">
                        </div>
                        <div class="three wide field">
                            <label for="txtDataNascimento">Data Nascimento</label>
                            <input type="date" id="txtDataNascimento">
                        </div>
                        <div class="three wide field">
                            <label for="txtRaca">Cor / Raça</label>
                            <select class="ui search dropdown" name="corRaca" required>
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
                    <div class="fields">
                        <div class="three wide field">
                            <label for="txtCep">CEP</label>
                            <input type="text" id="txtCep" placeholder="00000-000">
                        </div>
                        <div class="ten wide field">
                            <label for="txtEndereco">Endereço</label>
                            <input type="text" id="txtEndereco" placeholder="Rua, Avenida...">
                        </div>
                        <div class="three wide field">
                            <label for="txtNumero">Número</label>
                            <input type="text" id="txtNumero" placeholder="Nº">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="ten wide field">
                            <label for="txtBairro">Bairro</label>
                            <input type="text" id="txtBairro" placeholder="Bairro...">
                        </div>
                        <div class="three wide field">
                            <label for="txtCidade">Cidade</label>
                            <input type="text" id="txtCidade" placeholder="Americana...">
                        </div>
                        <div class="three wide field">
                            <label for="txtComplemento">Complemento</label>
                            <input type="text" id="txtComplemento" placeholder="Escola, apartamento...">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="ten wide field">
                                <div class="ui form">
                                    <div class="fields">
                                        <div class="field">
                                            <label>
                                               Em caso de febre autoriza medicar a criança ?
                                            </label>
                                            <div class="ui toggle checkbox">
                                                <input type="checkbox" name="public" id="chkPublic">
                                                <label for="chkPublic"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="three wide field">
                            <label for="txtGotas">Quantas gotas</label>
                            <input type="number" id="txtGotas" placeholder="1, 2, 3...">
                        </div>
                        <div class="three wide field">
                            <label for="txtRemedio">Qual remédio</label>
                            <input type="text" id="txtRemedio" placeholder="">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="ten wide field">
                            <div class="sixteen wide field">
                                <div class="ui form">
                                    <div class="fields">
                                        <div class="field">
                                            <label>
                                                Autorizo a divulgação de imagem do meu filho(a) para uso de projetos na
                                                escola,
                                                fotos, filmagem, facebook, instagram e site.
                                            </label>
                                            <div class="ui toggle checkbox">
                                                <input type="checkbox" name="public" id="chkPublic">
                                                <label for="chkPublic"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fields">
                        <div class="eight wide right aligned field " style="text-align: left;">
                            <a href="#" class="ui red icon button" title="Sair">
                                <i class="sign-out alternate icon"></i> Sair
                            </a>
                        </div>
                        <div class="eight wide right aligned field" style="text-align: right;">
                            <a href="#" class="ui blue icon button" title="Próximo">
                                <i class="angle right icon"></i> Próximo
                            </a>
                        </div>
                    </div>
                </form>
            </section>
        </main>
    </section>

</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" />
    <link rel="stylesheet" href="./css/cadastros.css" />

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
                <!-- Etapas de cadastro incluindo no -->
                <?php include './etapas-cadastro.php' ?>
                <form class="ui form">

                    <div class="fields">
                        <div class="four wide field">
                            <label>Pais vivem juntos</label>
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="pais_vivem">
                                <label></label>
                            </div>
                        </div>
                        <div class="four wide field">
                            <label>Nº de filhos</label>
                            <input type="number" placeholder="0">
                        </div>
                        <div class="four wide field">
                            <label>Recebe bolsa família</label>
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="bolsa_familia">
                                <label></label>
                            </div>
                        </div>
                        <div class="four wide field">
                            <label>Valor</label>
                            <input type="number" placeholder="R$">
                        </div>
                    </div>

                    <div class="fields">
                        <div class="four wide field">
                            <label>Possui alergia</label>
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="alergia">
                                <label></label>
                            </div>
                        </div>
                        <div class="four wide field">
                            <label>Especifique</label>
                            <input type="text" placeholder="">
                        </div>
                        <div class="four wide field">
                            <label>Possui convênio</label>
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="convenio">
                                <label></label>
                            </div>
                        </div>
                        <div class="four wide field">
                            <label>Qual convênio</label>
                            <input type="text" placeholder="">
                        </div>
                    </div>

                    <div class="fields">
                        <div class="four wide field">
                            <label>Portador de alguma necessidade especial</label>
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="necessidade_especial">
                                <label></label>
                            </div>
                        </div>
                        <div class="four wide field">
                            <label>Qual</label>
                            <input type="text" placeholder="">
                        </div>
                        <div class="four wide field">
                            <label>Problemas de visão</label>
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="problema_visao">
                                <label></label>
                            </div>
                        </div>
                        <div class="four wide field">
                            <label>Já fez cirurgia</label>
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="cirurgia">
                                <label></label>
                            </div>
                        </div>
                    </div>

                    <div class="fields">
                        <div class="four wide field">
                            <label>Tomou vacina contra catapora ou varicela</label>
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="vacina_catapora">
                                <label></label>
                            </div>
                        </div>
                    </div>

                    <h4 class="ui dividing header">Transporte para a escola</h4>
                    <div class="fields">
                        <div class="field">
                            <div class="ui checkbox">
                                <input type="checkbox" name="transporte" value="carro">
                                <label>Carro</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox">
                                <input type="checkbox" name="transporte" value="van">
                                <label>Van Escolar</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox">
                                <input type="checkbox" name="transporte" value="pe">
                                <label>A Pé</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox">
                                <input type="checkbox" name="transporte" value="outros">
                                <label>Outros</label>
                            </div>
                        </div>
                    </div>

                    <h4 class="ui dividing header">Doenças que a criança já teve</h4>

                    <div class="ui grid">
                        <!-- Coluna 1 -->
                        <div class="five wide column">
                            <div class="field">
                                <div class="ui checkbox"><input type="checkbox" name="doenca" value="anemia"><label>Anemia</label></div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox"><input type="checkbox" name="doenca" value="bronquite"><label>Bronquite</label></div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox"><input type="checkbox" name="doenca" value="doenca_cardiaca"><label>Doença Cardíaca</label></div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox"><input type="checkbox" name="doenca" value="catapora"><label>Catapora</label></div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox"><input type="checkbox" name="doenca" value="diabetes"><label>Diabetes</label></div>
                            </div>
                        </div>

                        <!-- Coluna 2 -->
                        <div class="five wide column">
                            <div class="field">
                                <div class="ui checkbox"><input type="checkbox" name="doenca" value="hepatite"><label>Hepatite</label></div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox"><input type="checkbox" name="doenca" value="meningite"><label>Meningite</label></div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox"><input type="checkbox" name="doenca" value="pneumonia"><label>Pneumonia</label></div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox"><input type="checkbox" name="doenca" value="caxumba"><label>Caxumba</label></div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox"><input type="checkbox" name="doenca" value="convulsao"><label>Convulsão</label></div>
                            </div>
                        </div>

                        <!-- Coluna 3 -->
                        <div class="five wide column">
                            <div class="field">
                                <div class="ui checkbox"><input type="checkbox" name="doenca" value="dengue"><label>Dengue</label></div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox"><input type="checkbox" name="doenca" value="desidratacao"><label>Desidratação</label></div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox"><input type="checkbox" name="doenca" value="refluxo"><label>Refluxo</label></div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox"><input type="checkbox" name="doenca" value="rubeola"><label>Rubéola</label></div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox"><input type="checkbox" name="doenca" value="sarampo"><label>Sarampo</label></div>
                            </div>
                            <div class="field">
                                <div class="ui checkbox"><input type="checkbox" name="doenca" value="verminose"><label>Verminoses</label></div>
                            </div>
                        </div>
                    </div>

                    <div class="ui grid">
                        <div class="four column row">
                            <div class="left floated column">
                                <a href="./cadastro-responsaveis.php" class="ui basic blue icon button" style="margin-top: 10px;">
                                    <i class="angle left icon"></i> Voltar
                                </a>
                            </div>
                            <div class="right floated column">
                                <a href="./cadastro-pessoas-autorizadas.php" class="ui basic blue icon button right floated column" style="margin-top: 10px;">
                                    <i class="angle right icon"></i> Próximo
                                </a>
                            </div>
                        </div>
                    </div>
                </form>

            </section>
        </main>
    </section>

    <script>

    </script>
    <script src="./js/adicionarResponsavel.js"></script>
</body>

</html>
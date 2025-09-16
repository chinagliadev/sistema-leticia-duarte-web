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
                <form class="ui form form-cadastro-aluno" id="responsavelFormulario">

                    <div class="responsavel" id="responsavel-1">
                        <div class="fields">
                            <div class="four wide field">
                                <label for="txtTipoResponsavel">Tipo do responsavel</label>
                                <select class="ui search dropdown" name="corRaca" required>
                                    <option value="" disabled selected hidden>Selecione o tipo do responsavel</option>
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

                            <div class="eight wide field">
                                <label for="txtResponsavel">Nome do Responsavel</label>
                                <input type="text" id="txtResponsavel" placeholder="">
                            </div>

                            <div class="four wide field">
                                <label>Data Nascimento</label>
                                <div class="ui calendar" id="dataNascimentoCalendar">
                                    <div class="ui input">
                                        <input type="text" placeholder="dd/mm/aaaa">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fields">
                            <div class="four wide field">
                                <label for="txtEscolaridade">Estado Civil</label>
                                <select class="ui search dropdown" name="corRaca" required>
                                    <option value="" disabled selected hidden>Selecione a Escolaridade</option>
                                    <option value="Solteiro">Solteiro</option>
                                    <option value="Casado">Casado</option>
                                    <option value="Divorciado">Divorciada</option>
                                    <option value="Viuvo">Viuvo</option>
                                </select>
                            </div>
                            <div class="four wide field">
                                <label for="txtTelefone">Telefone</label>
                                <input type="text" id="txtTelefone" placeholder="(19) 99999-9999">
                            </div>
                            <div class="eight wide field">
                                <label for="txtEmail">Email</label>
                                <input type="email" id="txtNumero" placeholder="exemplo@email.com">
                            </div>
                        </div>

                        <div class="fields">
                            <div class="eight wide field">
                                <label for="txtNomeEmpresa">Nome da Empresa</label>
                                <input type="text" id="txtNomeEmpresa" placeholder="Empresa...">
                            </div>
                            <div class="four wide field">
                                <label for="txtProfissao">Profissão</label>
                                <input type="text" id="txtProfissao" placeholder="Arquiteto, Advogado...">
                            </div>
                            <div class="four wide field">
                                <label for="txtTelefoneTrabalho">Telefone do Trabalho</label>
                                <input type="text" id="txtTelefoneTrabalho" placeholder="(19) 99999-9999">
                            </div>
                        </div>

                        <div class="fields">
                            <div class="four wide field">
                                <label for="txtHorarioTrabalho">Horario de Trabalho</label>
                                <input type="text" placeholder="8h as 18h...">
                            </div>
                            <div class="four wide field">
                                <label for="txtSalario">Salario do responsavel</label>
                                <input type="number" id="txtSalario" placeholder="R$1500,00...">
                            </div>
                            <div class="eight wide field">
                                <label for="txtPossuiRendaExtra">Possui Renda Extra</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="autorizacaoMed">
                                    <label></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ui divider"></div>
                    <!-- Adicionando mais um -->
                    <div class="responsavel" id="responsavel-2" style="display: none;">
                        <div class="fields">
                            <div class="four wide field">
                                <label for="txtTipoResponsavel">Tipo do responsavel</label>
                                <select class="ui search dropdown" name="corRaca" required>
                                    <option value="" disabled selected hidden>Selecione o tipo do responsavel</option>
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

                            <div class="eight wide field">
                                <label for="txtResponsavel">Nome do Responsavel</label>
                                <input type="text" id="txtResponsavel" placeholder="">
                            </div>

                            <div class="four wide field">
                                <label>Data Nascimento</label>
                                <div class="ui calendar" id="dataNascimentoCalendar">
                                    <div class="ui input">
                                        <input type="text" placeholder="dd/mm/aaaa">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="fields">
                            <div class="four wide field">
                                <label for="txtEscolaridade">Estado Civil</label>
                                <select class="ui search dropdown" name="corRaca" required>
                                    <option value="" disabled selected hidden>Selecione a Escolaridade</option>
                                    <option value="Solteiro">Solteiro</option>
                                    <option value="Casado">Casado</option>
                                    <option value="Divorciado">Divorciada</option>
                                    <option value="Viuvo">Viuvo</option>
                                </select>
                            </div>
                            <div class="four wide field">
                                <label for="txtTelefone">Telefone</label>
                                <input type="text" id="txtTelefone" placeholder="(19) 99999-9999">
                            </div>
                            <div class="eight wide field">
                                <label for="txtEmail">Email</label>
                                <input type="email" id="txtNumero" placeholder="exemplo@email.com">
                            </div>
                        </div>

                        <div class="fields">
                            <div class="eight wide field">
                                <label for="txtNomeEmpresa">Nome da Empresa</label>
                                <input type="text" id="txtNomeEmpresa" placeholder="Empresa...">
                            </div>
                            <div class="four wide field">
                                <label for="txtProfissao">Profissão</label>
                                <input type="text" id="txtProfissao" placeholder="Arquiteto, Advogado...">
                            </div>
                            <div class="four wide field">
                                <label for="txtTelefoneTrabalho">Telefone do Trabalho</label>
                                <input type="text" id="txtTelefoneTrabalho" placeholder="(19) 99999-9999">
                            </div>
                        </div>

                        <div class="fields">
                            <div class="four wide field">
                                <label for="txtHorarioTrabalho">Horario de Trabalho</label>
                                <input type="text" placeholder="8h as 18h...">
                            </div>
                            <div class="four wide field">
                                <label for="txtSalario">Salario do responsavel</label>
                                <input type="number" id="txtSalario" placeholder="R$1500,00...">
                            </div>
                            <div class="eight wide field">
                                <label for="txtPossuiRendaExtra">Possui Renda Extra</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="autorizacaoMed">
                                    <label></label>
                                </div>
                            </div>
                        </div>

                        <div class="fields" style="margin-top: 10px;">
                            <div class="sixteen wide field">
                                <div class="right floated column">
                                    <button type="button" id="btnRemoverResponsavel" class="ui red button right floated">
                                        <i class="trash icon"></i> Remover Responsável
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="fields">
                        <div class="sixteen wide field">
                            <div class="right floated column">
                                <button class="ui blue button right floated" id="btnAdicionarResponsavel">
                                    <i class="plus circle icon"></i>
                                    Adicionar Responsável
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="ui grid">
                        <div class="four column row">
                            <div class="left floated column">
                                <a href="./cadastros.php" class="ui basic blue icon button" style="margin-top: 10px;">
                                    <i class="angle left icon"></i> Voltar
                                </a>
                            </div>
                            <div class="right floated column">
                                <a href="./cadastroEstruturaFamiliar.php" class="ui basic blue icon button right floated column" style="margin-top: 10px;">
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
        $('#dataNascimentoCalendar').calendar({
            type: 'date',
            maxDate: new Date(), // bloqueia datas futuras
            formatter: {
                date: function(date) {
                    if (!date) return '';
                    const day = ("0" + date.getDate()).slice(-2);
                    const month = ("0" + (date.getMonth() + 1)).slice(-2);
                    const year = date.getFullYear();
                    return day + '/' + month + '/' + year; // dd/mm/yyyy
                }
            },
            text: {
                days: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
                months: [
                    'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
                    'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
                ],
                monthsShort: [
                    'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
                    'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
                ],
                today: 'Hoje',
                now: 'Agora',
                am: 'AM',
                pm: 'PM'
            }
        });
    </script>
    <script src="./js/adicionarResponsavel.js"></script>
</body>

</html>
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
                <?php include './etapas-cadastro.php'?> 
                <form class="ui form form-cadastro-aluno">
                    <div class="fields">
                        <div class="ten wide field">
                            <label for="txtNomeCriança">Nome da Criança</label>
                            <input type="text" placeholder="Digite o nome da criança">
                        </div>

                        <!-- Calendar Semantic UI para data de nascimento -->
                        <div class="three wide field">
                            <label>Data Nascimento</label>
                            <div class="ui calendar" id="dataNascimentoCalendar">
                                <div class="ui input">
                                    <input type="text" placeholder="dd/mm/aaaa">
                                </div>
                            </div>
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

                    <!-- Campos de endereço -->
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

                    <!-- Autorização de medicação -->
                    <div class="fields">
                        <div class="ten wide field">
                            <label>Em caso de febre autoriza medicar a criança?</label>
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="autorizacaoMed">
                                <label></label>
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

                    <!-- Autorização de imagem -->
                    <div class="fields">
                        <div class="ten wide field">
                            <label>Autorizo a divulgação de imagem do meu filho(a) para uso de projetos na escola, fotos, filmagem, Facebook, Instagram e site.</label>
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="autorizacaoImagem">
                                <label></label>
                            </div>
                        </div>
                    </div>

                    <!-- Botões -->
                    <div class="fields">
                        <div class="eight wide field" style="text-align: left;">
                            <a href="#" class="ui red icon button">
                                <i class="sign-out alternate icon"></i> Sair
                            </a>
                        </div>
                        <div class="eight wide field" style="text-align: right;">
                            <a href="#" class="ui blue icon button">
                                <i class="angle right icon"></i> Próximo
                            </a>
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
        date: function (date) {
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
</body>

</html>

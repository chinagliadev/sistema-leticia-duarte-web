$(document).ready(function () {

    $('#txtCep').blur(function () {
        let cep = this.value.replace(/\D/g, ''); //remove os caracteres e deixa apenas numero - 22/09/2025

        if (cep.length === 8) {
            $.get('https://viacep.com.br/ws/' + cep + '/json/', function (dados) {
                if (dados.erro) {
                    $('#formulario-aluno')
                        .form('add errors', ['CEP não encontrado. Verifique e tente novamente.']);

                    $('#txtCep').val('');
                    $('#txtBairro').val('');
                    $('#txtCidade').val('');
                    $('#txtEndereco').val('');
                } else {
                    $('#txtBairro').val(dados.bairro);
                    $('#txtCidade').val(dados.localidade);
                    $('#txtEndereco').val(dados.logradouro);

                    $('.ui.error.message').hide();
                }
            }).fail(function () {
                $('#formulario-aluno')
                    .form('add errors', ['Erro ao consultar o CEP. Tente novamente mais tarde.']);
            });
        }
    });


    $('#txtTurma').parent('.ui.dropdown').dropdown();

    const $form = $('#formulario-aluno');
    const $campoGotas = $('#fieldGotas');
    const $campoRemedio = $('#fieldRemedio');
    const $toggle = $('#autorizacaoMed');

    $("#txtCep").mask("99999-999");

    $campoGotas.hide();
    $campoRemedio.hide();

    $('.ui.checkbox').checkbox();

    $.fn.form.settings.rules.cepValido = function (value) {
        let cep = value.replace(/\D/g, '');
        return cep.length === 8;
    };

    $form.form({
        fields: {
            txtNomeCrianca: { rules: [{ type: 'empty', prompt: 'Por favor informe o nome da criança' }] },
            txtDataNascimento: { rules: [{ type: 'empty', prompt: 'Por favor informe a data de nascimento' }] },
            corRaca: { rules: [{ type: 'empty', prompt: 'Por favor informe a raça/cor do aluno' }] },
            turma: { rules: [{ type: 'empty', prompt: 'Por favor selecione a turma' }] },
            txtCep: {
                rules: [
                    { type: 'empty', prompt: 'Por favor insira o CEP' },
                    { type: 'cepValido', prompt: 'Por favor insira um CEP válido (99999-999)' }
                ]
            },
            txtEndereco: { rules: [{ type: 'empty', prompt: 'Por favor insira o endereço do aluno' }] },
            txtNumero: { rules: [{ type: 'empty', prompt: 'Por favor informe o número do endereço' }] },
            txtBairro: { rules: [{ type: 'empty', prompt: 'Por favor informe o bairro' }] },
            txtCidade: { rules: [{ type: 'empty', prompt: 'Por favor informe a cidade' }] },
        },
        inline: false
    });

    $toggle.on('change', function () {
        if (this.checked) {
            $campoGotas.show();
            $campoRemedio.show();

            $form.form('add fields', {
                txtGotas: { rules: [{ type: 'empty', prompt: 'Por favor informe a quantidade de gotas' }] },
                txtRemedio: { rules: [{ type: 'empty', prompt: 'Por favor informe o nome do remédio' }] }
            });
        } else {
            $campoGotas.hide();
            $campoRemedio.hide();

            $form.form('remove fields', ['txtGotas', 'txtRemedio']);
        }
    });

    $('#txtRaca').dropdown();

    $('#dataNascimentoCalendar').calendar({
        type: 'date',
        maxDate: new Date(),
        formatter: {
            date: function (date) {
                if (!date) return '';
                const day = ("0" + date.getDate()).slice(-2);
                const month = ("0" + (date.getMonth() + 1)).slice(-2);
                const year = date.getFullYear();
                return day + '/' + month + '/' + year;
            }
        }
    });

    $form.on('submit', function (e) {
        if (!$form.form('is valid')) {
            e.preventDefault();
        }
    });
});

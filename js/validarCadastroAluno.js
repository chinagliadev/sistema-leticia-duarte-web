$(document).ready(function () {

    // Ativa dropdown de Turma
    $('#txtTurma').parent('.ui.dropdown').dropdown();

    const $form = $('#formulario-aluno');
    const $campoGotas = $('#fieldGotas');
    const $campoRemedio = $('#fieldRemedio');
    const $toggle = $('#autorizacaoMed');

    $("#txtCep").mask("99999-999");

    $campoGotas.hide();
    $campoRemedio.hide();

    $('.ui.checkbox').checkbox();

    $form.form({
        fields: {
            txtNomeCrianca: { rules: [{ type: 'empty', prompt: 'Por favor informe o nome da criança' }] },
            txtDataNascimento: { rules: [{ type: 'empty', prompt: 'Por favor informe a data de nascimento' }] },
            corRaca: { rules: [{ type: 'empty', prompt: 'Por favor informe a raça/cor do aluno' }] },
            turma: { rules: [{ type: 'empty', prompt: 'Por favor selecione a turma' }] }, // NOVO CAMPO
            txtCep: { rules: [{ type: 'empty', prompt: 'Por favor insira o CEP' }] },
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

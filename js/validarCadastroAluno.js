$(document).ready(function () {

    const $form = $('#formulario-aluno');
    const $campoGotas = $('#fieldGotas');   // Div do campo gotas
    const $campoRemedio = $('#fieldRemedio'); // Div do campo remédio
    const $toggle = $('#autorizacaoMed');

    $campoGotas.hide();
    $campoRemedio.hide();

    $('.ui.checkbox').checkbox();

    $toggle.on('change', function () {
        if (this.checked) {
            $campoGotas.show();
            $campoRemedio.show();

            $form.form('add rule', 'txtGotas', [{
                type: 'empty',
                prompt: 'Por favor informe a quantidade de gotas'
            }]);
            $form.form('add rule', 'txtRemedio', [{
                type: 'empty',
                prompt: 'Por favor informe o nome do remédio'
            }]);
        } else {
            $campoGotas.hide();
            $campoRemedio.hide();

            $form.form('remove rule', 'txtGotas');
            $form.form('remove rule', 'txtRemedio');
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

    $form.form({
        fields: {
            nome: {
                identifier: 'txtNomeCrianca',
                rules: [{ type: 'empty', prompt: 'Por favor informe o nome da criança' }]
            },
            dataNascimento: {
                identifier: 'txtDataNascimento',
                rules: [{ type: 'empty', prompt: 'Por favor informe a data de nascimento' }]
            },
            corRaca: {
                identifier: 'corRaca',
                rules: [{ type: 'empty', prompt: 'Por favor informe a raça/cor do aluno' }]
            },
            cep: {
                identifier: 'txtCep',
                rules: [{ type: 'empty', prompt: 'Por favor insira o CEP' }]
            },
            endereco: {
                identifier: 'txtEndereco',
                rules: [{ type: 'empty', prompt: 'Por favor insira o endereço do aluno' }]
            },
            numero: {
                identifier: 'txtNumero',
                rules: [{ type: 'empty', prompt: 'Por favor informe o número do endereço' }]
            },
            bairro: {
                identifier: 'txtBairro',
                rules: [{ type: 'empty', prompt: 'Por favor informe o bairro' }]
            },
            cidade: {
                identifier: 'txtCidade',
                rules: [{ type: 'empty', prompt: 'Por favor informe a cidade' }]
            },
            complemento: {
                identifier: 'txtComplemento',
                rules: [{ type: 'empty', prompt: 'Por favor informe o complemento' }]
            }
        },
        inline: false
    });

    $form.on('submit', function (e) {
        e.preventDefault(); 

        const isValid = $form.form('is valid');

        if (!isValid) {
            const errors = $form.form('get errors');
            $('.ui.error.message').html(errors.join('<br>')).show();
        } 
    });

});

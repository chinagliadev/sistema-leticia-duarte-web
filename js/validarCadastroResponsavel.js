$(document).ready(function () {
    const $form = $('#responsavelFormulario');

    $form.form({
        fields: {
            txtTipoResponsavel_1: {
                rules: [{ type: 'empty', prompt: 'Por favor selecione o tipo do responsável' }]
            },
            txtNomeResponsavel_1: {
                rules: [{ type: 'empty', prompt: 'Por favor informe o nome do responsável' }]
            },
            txtDataNascimento_1: {
                rules: [{ type: 'empty', prompt: 'Por favor informe a data de nascimento do responsável' }]
            },
            txtTelefone_1: {
                rules: [
                    { type: 'empty', prompt: 'Por favor informe o telefone do responsável' },
                    { type: 'regExp[/^\\(\\d{2}\\)\\s\\d{4,5}-\\d{4}$/]', prompt: 'Formato válido: (19) 99999-9999' }
                ]
            },
            txtEmail_1: {
                rules: [
                    { type: 'empty', prompt: 'Por favor informe o email do responsável' },
                    { type: 'email', prompt: 'Por favor insira um email válido' }
                ]
            },

        },
        inline: false
    });

    $('#dataNascimentoCalendar_1').calendar({
        type: 'date',
        maxDate: new Date(),
        formatter: {
            date: function (date) {
                if (!date) return '';
                const d = ("0" + date.getDate()).slice(-2);
                const m = ("0" + (date.getMonth() + 1)).slice(-2);
                const y = date.getFullYear();
                return d + '/' + m + '/' + y;
            }
        }
    });

    $form.on('submit', function (e) {
        if (!$form.form('is valid')) {
            e.preventDefault();
        }
    });

    $('#btnRemoverResponsavel').on('click', function () {
        $('.ui.basic.modal').modal({
            centered: true
        }).modal('show');
    });
});
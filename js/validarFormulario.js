$(document).ready(function () {
    // Adicionar Responsável 2
    $('#btnAdicionarResponsavel').on('click', function () {
        $('#responsavel-2').show();
        $('#responsavel-2').find('input, select').prop('disabled', false);
        $(this).hide();
        $('#btnRemoverResponsavel').show();
        $('.ui.dropdown').dropdown();
        $('.ui.calendar').calendar({ type: 'date' });
    });

    // Remover Responsável 2
    $('#btnRemoverResponsavel').on('click', function () {
        $('#responsavel-2').hide();
        $('#responsavel-2').find('input, select').prop('disabled', true);
        $('#btnAdicionarResponsavel').show();
        $(this).hide();
        $('#responsavel-2').find('input').val('');
        $('#responsavel-2').find('select').dropdown('restore defaults');
    });

    // Adicionar Pessoa Autorizada 2
    $('#btnAdicionarAutorizada').on('click', function (e) {
        e.preventDefault();
        $('#autorizada-2').show();
        $('#autorizada-2').find('input, select').prop('disabled', false);
        $(this).hide();
    });

    $('#btnRemoverAutorizada').on('click', function (e) {
        e.preventDefault();
        $('#autorizada-2').hide();
        $('#autorizada-2').find('input, select').prop('disabled', true);
        $('#btnAdicionarAutorizada').show();
        $('#autorizada-2').find('input').val('');
        $('#autorizada-2').find('select').dropdown('restore defaults');
    });

    $('.ui.dropdown').dropdown();
    $('.ui.checkbox').checkbox();
    $('.ui.calendar').calendar({
        type: 'date',
        formatter: {
            date: function (date) {
                if (!date) return '';
                var day = date.getDate().toString().padStart(2, '0');
                var month = (date.getMonth() + 1).toString().padStart(2, '0');
                var year = date.getFullYear();
                return `${day}/${month}/${year}`;
            }
        }
    });

    function toggleFields() {
        $('input[name="bolsa_familia"]').is(':checked') ? $('#valor-bolsa-field').show() : $('#valor-bolsa-field').hide();
        $('input[name="alergia"]').is(':checked') ? $('#especifique-alergia-field').show() : $('#especifique-alergia-field').hide();
        $('input[name="convenio"]').is(':checked') ? $('#qual-convenio-field').show() : $('#qual-convenio-field').hide();
        $('input[name="necessidade_especial"]').is(':checked') ? $('#qual-necessidade-field').show() : $('#qual-necessidade-field').hide();
        if ($('input[name="autorizacaoMed"]').is(':checked')) {
            $('#fieldGotas').show();
            $('#fieldRemedio').show();
        } else {
            $('#fieldGotas').hide();
            $('#fieldRemedio').hide();
        }
    }

    toggleFields();
    $('input[type="checkbox"]').on('change', toggleFields);

    $.fn.form.settings.rules.conditionalRequired = function (value, parameter) {
        var $field = $(this);
        var $form = $field.closest('.ui.form');
        var $target = $form.find(parameter);
        if ($target.is(':visible') && !$target.find('input, select').first().is(':disabled')) {
            return value !== undefined && value !== '';
        }
        return true;
    };

    // Form validation rules
    $('.ui.form.form-cadastro-aluno').form({
        fields: {
            /*
            // Campos do aluno e endereço comentados
            txtNomeCrianca: { identifier: 'txtNomeCrianca', rules: [{ type: 'empty', prompt: 'O nome da criança não pode ficar vazio.' }] },
            turma: { identifier: 'turma', rules: [{ type: 'empty', prompt: 'Selecione a turma da criança.' }] },
            txtDataNascimento: { identifier: 'txtDataNascimento', rules: [{ type: 'empty', prompt: 'A data de nascimento da criança não pode ficar vazia.' }] },
            corRaca: { identifier: 'corRaca', rules: [{ type: 'empty', prompt: 'Selecione a cor ou raça da criança.' }] },
            txtCep: { identifier: 'txtCep', rules: [{ type: 'regExp[/^[0-9]{5}-[0-9]{3}$/]', prompt: 'O CEP deve estar no formato 00000-000.' }, { type: 'empty', prompt: 'O CEP não pode ficar vazio.' }] },
            txtEndereco: { identifier: 'txtEndereco', rules: [{ type: 'empty', prompt: 'O endereço não pode ficar vazio.' }] },
            txtNumero: { identifier: 'txtNumero', rules: [{ type: 'empty', prompt: 'O número não pode ficar vazio.' }, { type: 'number', prompt: 'O número deve conter apenas dígitos.' }] },
            txtBairro: { identifier: 'txtBairro', rules: [{ type: 'empty', prompt: 'O bairro não pode ficar vazio.' }] },
            txtCidade: { identifier: 'txtCidade', rules: [{ type: 'empty', prompt: 'A cidade não pode ficar vazia.' }] },
            valor_bolsa: { identifier: 'valor_bolsa', optional: true, rules: [{ type: 'number', prompt: 'O valor deve ser um número.' }, { type: 'not[0]', prompt: 'O valor não pode ser zero.' }] },
            especifique_alergia: { identifier: 'especifique_alergia', optional: true, rules: [{ type: 'empty', prompt: 'A especificação da alergia não pode ficar vazia.' }] },
            qual_convenio: { identifier: 'qual_convenio', optional: true, rules: [{ type: 'empty', prompt: 'O nome do convênio não pode ficar vazio.' }] },
            qual_necessidade: { identifier: 'qual_necessidade', optional: true, rules: [{ type: 'empty', prompt: 'A especificação da necessidade especial não pode ficar vazia.' }] },
            txtGotas: { identifier: 'txtGotas', optional: true, rules: [{ type: 'number', prompt: 'A quantidade de gotas deve ser um número.' }, { type: 'not[0]', prompt: 'A quantidade de gotas não pode ser zero.' }] },
            txtRemedio: { identifier: 'txtRemedio', optional: true, rules: [{ type: 'empty', prompt: 'O nome do remédio não pode ficar vazio.' }] },
            */
        },
        inline: true,
        onSuccess: function (event) {
            // Aqui você pode colocar o que acontece quando o formulário é válido
        }
    });
});

$(document).ready(function () {
    // Adicionar Responsável 2
    $('#btnAdicionarResponsavel').on('click', function () {
        $('#responsavel-2').show();
        $('#responsavel-2').find('input, select').prop('disabled', false); // Enable fields
        $(this).hide();
        $('#btnRemoverResponsavel').show();
        $('.ui.dropdown').dropdown();
        $('.ui.calendar').calendar({ type: 'date' });
    });

    // Remover Responsável 2
    $('#btnRemoverResponsavel').on('click', function () {
        $('#responsavel-2').hide();
        $('#responsavel-2').find('input, select').prop('disabled', true); // Disable fields
        $('#btnAdicionarResponsavel').show();
        $(this).hide();
        // Clear fields of the removed section
        $('#responsavel-2').find('input').val('');
        $('#responsavel-2').find('select').dropdown('restore defaults');
    });

    // Adicionar Pessoa Autorizada 2
    $('#btnAdicionarAutorizada').on('click', function (e) {
        e.preventDefault();
        $('#autorizada-2').show();
        $('#autorizada-2').find('input, select').prop('disabled', false); // Enable fields
        $(this).hide();
    });

    // Remover Pessoa Autorizada 2
    $('#btnRemoverAutorizada').on('click', function (e) {
        e.preventDefault();
        $('#autorizada-2').hide();
        $('#autorizada-2').find('input, select').prop('disabled', true); // Disable fields
        $('#btnAdicionarAutorizada').show();
        // Clear fields of the removed section
        $('#autorizada-2').find('input').val('');
        $('#autorizada-2').find('select').dropdown('restore defaults');
    });

    // Initialize Semantic UI components
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

    // Handle conditional field visibility based on checkboxes
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

    // Custom conditional required rule
    $.fn.form.settings.rules.conditionalRequired = function (value, parameter) {
        var $field = $(this);
        var $form = $field.closest('.ui.form');
        var $target = $form.find(parameter);
        // The key change is to also check if the target is NOT disabled
        if ($target.is(':visible') && !$target.find('input, select').first().is(':disabled')) {
            return value !== undefined && value !== '';
        }
        return true;
    };

    // Form validation rules
    $('.ui.form.form-cadastro-aluno').form({
        fields: {
            // Student fields
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

            // Responsavel 1
            txtTipoResponsavel_1: { identifier: 'txtTipoResponsavel_1', rules: [{ type: 'empty', prompt: 'Selecione o tipo do responsável 1.' }] },
            txtNomeResponsavel_1: { identifier: 'txtNomeResponsavel_1', rules: [{ type: 'empty', prompt: 'O nome do responsável 1 não pode ficar vazio.' }] },
            txtDataNascimento_1: { identifier: 'txtDataNascimento_1', rules: [{ type: 'empty', prompt: 'A data de nascimento do responsável 1 não pode ficar vazia.' }] },
            txtEstadoCivil_1: { identifier: 'txtEstadoCivil_1', rules: [{ type: 'empty', prompt: 'Selecione o estado civil do responsável 1.' }] },
            txtTelefone_1: { identifier: 'txtTelefone_1', rules: [{ type: 'regExp[/^\\(?[0-9]{2}\\)?\\s?[0-9]{4,5}-?[0-9]{4}$/]', prompt: 'O telefone do responsável 1 deve ser um número de telefone válido.' }, { type: 'empty', prompt: 'O telefone do responsável 1 não pode ficar vazio.' }] },
            txtEmail_1: { identifier: 'txtEmail_1', rules: [{ type: 'email', prompt: 'O email do responsável 1 deve ser um endereço de email válido.' }, { type: 'empty', prompt: 'O email do responsável 1 não pode ficar vazio.' }] },

            // Responsavel 2 (conditional validation)
            txtTipoResponsavel_2: { identifier: 'txtTipoResponsavel_2', rules: [{ type: 'conditionalRequired[#responsavel-2]', prompt: 'Selecione o tipo do responsável 2.' }] },
            txtNomeResponsavel_2: { identifier: 'txtNomeResponsavel_2', rules: [{ type: 'conditionalRequired[#responsavel-2]', prompt: 'O nome do responsável 2 não pode ficar vazio.' }] },
            txtDataNascimento_2: { identifier: 'txtDataNascimento_2', rules: [{ type: 'conditionalRequired[#responsavel-2]', prompt: 'A data de nascimento do responsável 2 não pode ficar vazia.' }] },
            txtEstadoCivil_2: { identifier: 'txtEstadoCivil_2', rules: [{ type: 'conditionalRequired[#responsavel-2]', prompt: 'Selecione o estado civil do responsável 2.' }] },
            txtTelefone_2: { identifier: 'txtTelefone_2', rules: [{ type: 'conditionalRequired[#responsavel-2]', prompt: 'O telefone do responsável 2 não pode ficar vazio.' }, { type: 'regExp[/^\\(?[0-9]{2}\\)?\\s?[0-9]{4,5}-?[0-9]{4}$/]', prompt: 'O telefone do responsável 2 deve ser um número de telefone válido.' }] },
            txtEmail_2: { identifier: 'txtEmail_2', rules: [{ type: 'conditionalRequired[#responsavel-2]', prompt: 'O email do responsável 2 não pode ficar vazio.' }, { type: 'email', prompt: 'O email do responsável 2 deve ser um endereço de email válido.' }] },

            // Authorized persons (conditional validation)
            txtNomePessoaAutorizada: { identifier: 'txtNomePessoaAutorizada', rules: [{ type: 'conditionalRequired[#autorizada-1]', prompt: 'O nome da pessoa autorizada não pode ficar vazio.' }] },
            txtCpfAutorizada: { identifier: 'txtCpfAutorizada', rules: [{ type: 'conditionalRequired[#autorizada-1]', prompt: 'O CPF da pessoa autorizada não pode ficar vazio.' }] },
            txtTelefoneAutorizada: { identifier: 'txtTelefoneAutorizada', rules: [{ type: 'conditionalRequired[#autorizada-1]', prompt: 'O telefone da pessoa autorizada não pode ficar vazio.' }] },
            txtParentenco: { identifier: 'txtParentenco', rules: [{ type: 'conditionalRequired[#autorizada-1]', prompt: 'Selecione o parentesco da pessoa autorizada.' }] },
            txtNomePessoaAutorizada2: { identifier: 'txtNomePessoaAutorizada2', rules: [{ type: 'conditionalRequired[#autorizada-2]', prompt: 'O nome da segunda pessoa autorizada não pode ficar vazio.' }] },
            txtCpfAutorizada2: { identifier: 'txtCpfAutorizada2', rules: [{ type: 'conditionalRequired[#autorizada-2]', prompt: 'O CPF da segunda pessoa autorizada não pode ficar vazio.' }] },
            txtTelefoneAutorizada2: { identifier: 'txtTelefoneAutorizada2', rules: [{ type: 'conditionalRequired[#autorizada-2]', prompt: 'O telefone da segunda pessoa autorizada não pode ficar vazio.' }] },
            txtParentenco2: { identifier: 'txtParentenco2', rules: [{ type: 'conditionalRequired[#autorizada-2]', prompt: 'Selecione o parentesco da segunda pessoa autorizada.' }] },
        },
        inline: true,
        onSuccess: function (event) {
            // Action to perform on success
        }
    });
});
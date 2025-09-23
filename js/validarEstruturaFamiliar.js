$(document).ready(function() {
    // Inicializa os toggles
    $('.ui.toggle.checkbox').checkbox();
    $('.ui.checkbox').checkbox();

    // Campos que só devem ativar quando o toggle estiver marcado
    $('#valor-bolsa-field input').prop('disabled', true);
    $('#especifique-alergia-field input').prop('disabled', true);
    $('#qual-convenio-field input').prop('disabled', true);
    $('#qual-necessidade-field input').prop('disabled', true);

    $('#toggle-bolsa-familia').change(function() {
        $('#valor-bolsa-field input').prop('disabled', !$(this).is(':checked'));
    });

    $('#toggle-alergia').change(function() {
        $('#especifique-alergia-field input').prop('disabled', !$(this).is(':checked'));
    });

    $('#toggle-convenio').change(function() {
        $('#qual-convenio-field input').prop('disabled', !$(this).is(':checked'));
    });

    $('#toggle-necessidade-especial').change(function() {
        $('#qual-necessidade-field input').prop('disabled', !$(this).is(':checked'));
    });

    // Inicializa a validação do formulário
    $('.ui.form').form({
        fields: {
            numero_filhos: {
                identifier: 'numero_filhos',
                rules: [
                    { type: 'empty', prompt: 'Por favor, informe o número de filhos' }
                ]
            },
            valor_bolsa: {
                identifier: 'valor_bolsa',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Informe o valor da bolsa família',
                        depends: function() {
                            return $('#toggle-bolsa-familia').is(':checked');
                        }
                    }
                ]
            },
            especifique_alergia: {
                identifier: 'especifique_alergia',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Especifique a alergia',
                        depends: function() {
                            return $('#toggle-alergia').is(':checked');
                        }
                    }
                ]
            },
            qual_convenio: {
                identifier: 'qual_convenio',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Informe qual convênio',
                        depends: function() {
                            return $('#toggle-convenio').is(':checked');
                        }
                    }
                ]
            },
            qual_necessidade: {
                identifier: 'qual_necessidade',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Informe qual é a necessidade especial',
                        depends: function() {
                            return $('#toggle-necessidade-especial').is(':checked');
                        }
                    }
                ]
            }
        },
        inline: false, // mensagens vão para o ui error message
        on: 'submit',
        onFailure: function(formErrors, fields) {
            // Coloca as mensagens dentro do div.ui.error.message
            $('.ui.error.message').html('<ul><li>' + formErrors.join('</li><li>') + '</li></ul>');
            return false; // evita o submit
        }
    });
});

$(document).ready(function () {
    const $form = $('#responsavelFormulario');
    const responsavel2 = document.getElementById('responsavel-2');
    const btnAdicionarResponsavel = document.getElementById('btnAdicionarResponsavel');
    const modalRemoverResponsavel = $('#modalRemoverResponsavel');
    const confirmarRemocaoResponsavel = $('#confirmarRemocaoResponsavel');

    $('#txtTelefone_1').mask('(19) 99999-9999')
    $('#txtTelefone_2').mask('(19) 99999-9999')

    $('#txtTelefone_1').on('input', function () {
        let tel = $(this).val().replace(/\D/g, '');

        if (tel.length > 10) {
            tel = tel.replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3');
        } else if (tel.length > 9) {
            tel = tel.replace(/^(\d{2})(\d{4})(\d{4}).*/, '($1) $2-$3');
        } else if (tel.length > 2) {
            tel = tel.replace(/^(\d{2})(\d+)/, '($1) $2');
        } else {
            tel = tel.replace(/^(\d*)/, '($1');
        }

        $(this).val(tel);
    });

    $('#txtTelefone_2').on('input', function () {
    let tel = $(this).val().replace(/\D/g, ''); // remove tudo que não é número

    if (tel.length > 10) { // celular com 9 dígitos
        tel = tel.replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3');
    } else if (tel.length > 9) { // telefone fixo com 8 dígitos
        tel = tel.replace(/^(\d{2})(\d{4})(\d{4}).*/, '($1) $2-$3');
    } else if (tel.length > 2) {
        tel = tel.replace(/^(\d{2})(\d+)/, '($1) $2');
    } else {
        tel = tel.replace(/^(\d*)/, '($1');
    }

    $(this).val(tel);
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

    $('#dataNascimentoCalendar_2').calendar({
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

    $form.form({
        fields: {
            txtTipoResponsavel_1: { rules: [{ type: 'empty', prompt: 'Por favor selecione o tipo do responsável' }] },
            txtNomeResponsavel_1: { rules: [{ type: 'empty', prompt: 'Por favor informe o nome do responsável' }] },
            txtDataNascimento_1: { rules: [{ type: 'empty', prompt: 'Por favor informe a data de nascimento do responsável' }] },
            txtTelefone_1: { rules: [{ type: 'empty', prompt: 'Por favor informe o telefone do responsável' }, { type: 'regExp[/^\\(\\d{2}\\)\\s\\d{4,5}-\\d{4}$/]', prompt: 'Formato válido: (19) 99999-9999' }] },
            txtEmail_1: { rules: [{ type: 'empty', prompt: 'Por favor informe o email do responsável' }, { type: 'email', prompt: 'Por favor insira um email válido' }] },
        },
        inline: false
    });

    btnAdicionarResponsavel.addEventListener('click', (e) => {
        e.preventDefault();
        responsavel2.style.display = 'block';
        btnAdicionarResponsavel.disabled = true;
        btnAdicionarResponsavel.style.display = 'none';

        // **Adiciona as regras de validação para o segundo responsável**
        $form.form('add fields', {
            txtTipoResponsavel_2: { rules: [{ type: 'empty', prompt: 'Por favor selecione o tipo do segundo responsável' }] },
            txtNomeResponsavel_2: { rules: [{ type: 'empty', prompt: 'Por favor informe o nome do segundo responsável' }] },
            txtDataNascimento_2: { rules: [{ type: 'empty', prompt: 'Por favor informe a data de nascimento do segundo responsável' }] },
            txtTelefone_2: { rules: [{ type: 'empty', prompt: 'Por favor informe o telefone do segundo responsável' }, { type: 'regExp[/^\\(\\d{2}\\)\\s\\d{4,5}-\\d{4}$/]', prompt: 'Formato válido: (19) 99999-9999' }] },
            txtEmail_2: { rules: [{ type: 'empty', prompt: 'Por favor informe o email do segundo responsável' }, { type: 'email', prompt: 'Por favor insira um email válido' }] },
        });
    });

    $('#btnRemoverResponsavel').on('click', function () {
        modalRemoverResponsavel.modal({
            centered: true
        }).modal('show');
    });

    confirmarRemocaoResponsavel.on('click', () => {
        responsavel2.style.display = 'none';

        const inputs = responsavel2.querySelectorAll('input, select');
        inputs.forEach(input => {
            if (input.type === 'checkbox') {
                input.checked = false;
            } else {
                input.value = '';
            }
        });

        $form.form('remove errors');

        // **Remove as regras de validação para o segundo responsável**
        $form.form('remove fields', ['txtTipoResponsavel_2', 'txtNomeResponsavel_2', 'txtDataNascimento_2', 'txtTelefone_2', 'txtEmail_2']);

        btnAdicionarResponsavel.disabled = false;
        btnAdicionarResponsavel.style.display = 'inline-block';
        modalRemoverResponsavel.modal('hide');
    });

    $form.on('submit', function (e) {
        if (!$form.form('is valid')) {
            e.preventDefault();
        }
    });
});
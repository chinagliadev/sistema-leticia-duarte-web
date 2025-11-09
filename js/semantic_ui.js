const formatToDbDate = (date) => {
    if (!date) return '';
    const ano = date.getFullYear();
    const mes = (date.getMonth() + 1).toString().padStart(2, '0');
    const dia = date.getDate().toString().padStart(2, '0');
    return `${ano}-${mes}-${dia}`;
};


$(document).ready(function () {

    $('#modal-editar').modal({
        closable: true,
        onApprove: function () {
            $('#form-editar-aluno').submit();
            return true;
        }
    });

    $('.ui.dropdown').dropdown();

    $('#txtTurma').on('change', function () {
        validarTurma();
    });

    $('#modal-salvar-dados .ok.button').on("click", function () {
        $('#formulario-aluno').submit();
    });

    $(document).on("click", ".btn-ativar-aluno", function () {
        let id = $(this).data('id');
        let ra_aluno = $(this).data('ra');
        let nomeAluno = $(this).data('nome');

        $('#input-id-ativar').val(id);
        $('#ra-aluno-no-modal').text(ra_aluno);
        $('#nome-aluno-modal').text(nomeAluno);

        $('#modal-ativar-matricula').modal('show');
    });

    $(document).on("click", ".btn-deletar-aluno", function () {
        let id = $(this).data('id');
        let ra_aluno = $(this).data('ra');
        let nomeAluno = $(this).data('nome');

        $('#input-id-excluir').val(id);
        $('#ra-aluno-no-modal').text(ra_aluno);
        $('#nome-aluno-modal').text(nomeAluno);

        $('#modal-excluir').modal('show');
    });

    $('#modal-excluir').modal({});


    $('#btn-excluir-cadastro').on("click", function () {
        $('#form-excluir-cadastro').submit();
    });


    $('#txtCep').mask('00000-000');
    $('#txtValorAluguel').mask('R$ 000.000.000.000.000,00', { reverse: true, selectOnFocus: true });
    $('#txtTelefone_1').mask('(00) 00000-0000');
    $('#txtTelefone_2').mask('(00) 00000-0000');
    $('#txtTelefoneTrabalho_1').mask('(00) 00000-0000');
    $('#txtTelefoneTrabalho_2').mask('(00) 00000-0000');

    $('#txtCpfAluno').mask('000.000.000-00');
    $('#txtRgAluno').mask('00.000.000-0');

    $('#txtCpfAutorizada').mask('000.000.000-00');
    $('#txtCpfAutorizada2').mask('000.000.000-00');
    $('#txtCpfAutorizada3').mask('000.000.000-00');
    $('#txtCpfAutorizada4').mask('000.000.000-00');

    $('#txtTelefoneAutorizada').mask('(00) 00000-0000');
    $('#txtTelefoneAutorizada2').mask('(00) 00000-0000');
    $('#txtTelefoneAutorizada3').mask('(00) 00000-0000');
    $('#txtTelefoneAutorizada4').mask('(00) 00000-0000');

    $('#txtSalario_1').mask('000.000.000.000.000,00', { reverse: true, selectOnFocus: true });
    $('#txtSalario_2').mask('R$ 000.000.000.000.000,00', { reverse: true, selectOnFocus: true });
    $('#txtRendaExtra').mask('R$ 000.000.000.000.000,00', { reverse: true, selectOnFocus: true });
    $('#txtRendaExtra_2').mask('R$ 000.000.000.000.000,00', { reverse: true, selectOnFocus: true });
    $('#valor_bolsa_familia').mask('R$ 000.000.000.000.000,00', { reverse: true, selectOnFocus: true });



    $('#dataNascimentoCalendar').find('input[type="text"]').mask('00/00/0000');
    $('#dataNascimentoCalendar_1').find('input[type="text"]').mask('00/00/0000');
    $('#dataNascimentoCalendar_2').find('input[type="text"]').mask('00/00/0000');

    const dataDeHoje = new Date();

    const settingsPtBr = {
        months: [
            'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho',
            'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
        ],
        monthsShort: [
            'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
            'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
        ],
        days: [
            'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'
        ],
        daysShort: [
            'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'
        ],
        today: 'Hoje',
        now: 'Agora',
        am: 'AM',
        pm: 'PM',

        firstDayOfWeek: 0,

        dateFormat: 'dd/mm/yyyy',
    };



});

$(document).on('keypress', function (event) {
    if (event.which === 13) {
        const focusedElement = $(document.activeElement);
        if (focusedElement.is('input') || focusedElement.is('select')) {
            event.preventDefault();
            return false;
        }
    }
});
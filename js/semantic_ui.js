$(document).ready(function () {

    $('.ui.dropdown').dropdown();

    $('#txtTurma').on('change', function () {
        validarTurma();
    });

    $('#modal-salvar-dados .ok.button').on("click", function () {
        $('#formulario-aluno').submit();
    });

    $('.btn-deletar-aluno').on("click", function () {

        let raAluno = $(this).data('id');
        let nomeAluno = $(this).data('nome');

        $('#input-ra-excluir').val(raAluno);
        $('#ra-aluno-no-modal').text(raAluno);
        $('#nome-aluno-modal').text(nomeAluno);

        $('#modal-excluir').modal('show');
    });

    $('#modal-excluir').modal({});

    $('#btn-excluir-cadastro').on("click", function () {
        $('#form-excluir-cadastro').submit(); 
    });

    $('#btn-editar-aluno').on("click", function () {
        $('#modal-editar').modal('show');
    });

    $('#txtCep').mask('00000-000');
    $('#txtTelefone_1').mask('(00) 00000-0000');
    $('#txtTelefoneTrabalho_1').mask('(00) 00000-0000');
    $('#txtCpfAutorizada').mask('000.000.000-00');
    $('#txtTelefoneAutorizada').mask('(00) 00000-0000');
    $('#txtTelefoneAutorizada2').mask('(00) 00000-0000');
    $('#txtTelefoneTrabalho_2').mask('(00) 00000-0000');
    $('#txtDataNascimento').mask('00/00/0000');
    $('#txtDataNascimento_1').mask('00/00/0000');
    $('#txtDataNascimento_2').mask('00/00/0000');
   $('#txtSalario_1').mask('000.000.000.000.000,00', {reverse: true, selectOnFocus: true});
   $('#txtSalario_2').mask('R$ 000.000.000.000.000,00', {reverse: true, selectOnFocus: true});
   $('#txtRendaExtra').mask('R$ 000.000.000.000.000,00', {reverse: true, selectOnFocus: true});
   $('#txtRendaExtra_2').mask('R$ 000.000.000.000.000,00', {reverse: true, selectOnFocus: true});

});

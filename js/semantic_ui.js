$(document).ready(function () {
    $('.ui.dropdown').dropdown();


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

    $('#modal-excluir').modal({

    });


    $('#btn-excluir-cadastro').on("click", function () {
        $('btn-excluir-cadastro').submit();
    })


    $('#btn-editar-aluno').on("click", function(){
        $('#modal-editar').modal('show');

    })


    $('#txtCep').mask('00000-000')
    $('#txtTelefone_1').mask('(00) 00000-0000')
    $('#txtTelefoneTrabalho_1').mask('(00) 00000-0000')
    $('#txtCpfAutorizada').mask('000.000.000-00')
    $('#txtTelefoneAutorizada').mask('(00) 00000-0000')
    $('#txtTelefoneAutorizada2').mask('(00) 00000-0000')

});
$(document).ready(function () {
    $('.ui.dropdown').dropdown();

    $("#btn-salvar-dados").on("click", function (e) {
        e.preventDefault();
        $('#modal-salvar-dados').modal('show');
    });

    $('.ui.basic.modal .ok.button').on("click", function () {
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


});
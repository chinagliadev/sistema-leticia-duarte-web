$(document).ready(function () {
    $('.ui.dropdown').dropdown();

    $("#btn-salvar-dados").on("click", function (e) {
        e.preventDefault();
        $('.ui.basic.modal').modal('show');
    });

    $('.ui.basic.modal .ok.button').on("click", function () {
        $('#formulario-aluno').submit();
    });

    //Realizar crud - Deletar, Editar e Detalhes

    $("#btn-deletar-aluno").on("click", function(){
        $('#modal-excluir-aluno').modal('show');

        alert('Chamou o botao de deletar')
    })

});
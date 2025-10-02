$(document).ready(function () {
    $('.ui.dropdown').dropdown();

    $("#btn-salvar-dados").on("click", function (e) {
        e.preventDefault();
        $('.ui.basic.modal').modal('show');
    });

    $('.ui.basic.modal .ok.button').on("click", function () {
        $('#formulario-aluno').submit();
    });
});
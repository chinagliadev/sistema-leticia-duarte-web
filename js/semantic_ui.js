// CÓDIGO JAVASCRIPT/JQUERY CORRIGIDO
$(document).ready(function () {
    $('.ui.dropdown').dropdown();

    $("#btn-salvar-dados").on("click", function (e) {
        e.preventDefault();
        $('#modal-salvar-dados').modal('show');
    });

    $('.ui.basic.modal .ok.button').on("click", function () {
        $('#formulario-aluno').submit();
    });

    
    $('.btn-deletar-aluno').on("click", function(){
       
        let raAluno = $(this).data('id'); 
        
        $('#input-ra-excluir').val(raAluno);
        
        $('#ra-aluno-no-modal').text(raAluno); 

        $('#modal-excluir').modal('show'); // Use o ID correto do seu modal
    });
    
    // Inicialização do modal (para garantir que o Semantic UI funcione)
    $('#modal-excluir').modal({
        // Adicione opções se necessário, mas o padrão funciona para submissão
    });
});
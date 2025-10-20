<div class="ui basic modal modal-editar" id="modal-editar">
    <div class="header">
        Editar Aluno
    </div>
    <div class="content">
        <p>Você tem certeza que deseja editar o <strong id="nome-aluno-modal-editar"></strong> com o RA: <strong id="ra-aluno-no-modal-editar"></strong>?</p>
        <p>Esta ação vai editar os dados do aluno</p>
    </div>
    <div class="actions">
        <form method="POST" action="teste.php" id="form-editar-aluno">
            
            <input type="hidden" name="ra_aluno" id="input-ra-editar" value="">
            
            <div class="ui inverted cancel button">
                Cancelar
            </div>
            
            <button id="btn-editar-cadastro" type="submit" class="ui inverted yellow ok button">
                Editar
            </button>
        </form>
    </div>
</div>
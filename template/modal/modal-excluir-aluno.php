<div class="ui basic modal" id="modal-excluir">
    <div class="header">
        Excluir Aluno
    </div>
    <div class="content">
        <p>Você tem certeza que deseja excluir o aluno com o RA: <strong id="ra-aluno-no-modal"></strong>?</p>
        <p>Esta ação não poderá ser desfeita.</p>
    </div>
    <div class="actions">
        <form method="POST" action="./excluir-cadastro-aluno.php" id="form-excluir-aluno">
            
            <input type="hidden" name="ra_aluno" id="input-ra-excluir" value="">
            
            <div class="ui inverted cancel button">
                Cancelar
            </div>
            
            <button type="submit" class="ui inverted red ok button">
                Excluir
            </button>
        </form>
    </div>
</div>
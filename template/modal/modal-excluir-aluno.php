<div class="ui basic modal modal-excluir" id="modal-excluir">
    <div class="header">
        Excluir Aluno
    </div>
    <div class="content">
        <p>Você tem certeza que deseja excluir o <strong id="nome-aluno-modal"></strong> com o RA: <strong id="ra-aluno-no-modal"></strong>?</p>
        <p>Esta ação não poderá ser desfeita.</p>
    </div>
    <div class="actions">
        <form method="POST" action="./excluir-cadastro-aluno.php" id="form-excluir-aluno">
            
            <input type="hidden" name="id_aluno" id="input-id-excluir" value="">
            
            <div class="ui inverted cancel button">
                Cancelar
            </div>
            
            <button id="btn-excluir-cadastro" type="submit" class="ui inverted red ok button">
                Excluir
            </button>
        </form>
    </div>
</div>
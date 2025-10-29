<div class="ui basic modal modal-ativar" id="modal-ativar-matricula">
    <div class="header">
        Ativar matricula do aluno
    </div>
    <div class="content">
        <p>Você tem certeza que ativar a matricula do <strong id="nome-aluno-modal"></strong> com o RA: <strong id="ra-aluno-no-modal"></strong>?</p>
        <p>Esta ação vai ativar a matricula do aluno.</p>
    </div>
    <div class="actions">
        <form method="POST" action="./ativar-cadastro-aluno.php" id="form-ativar-aluno">
            
            <input type="hidden" name="id_aluno" id="input-id-ativar" value="">
            
            <div class="ui inverted cancel button">
                Cancelar
            </div>
            
            <button id="btn-excluir-cadastro" type="submit" class="ui green ok button">
                Ativar Matricula
            </button>
        </form>
    </div>
</div>
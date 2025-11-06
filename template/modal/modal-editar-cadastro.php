<div class="ui basic modal modal-editar" id="modal-editar">
  <div class="ui icon header">
    <i class="edit icon"></i>
    Confirmar Edição do Aluno
  </div>
  <div class="content" style="text-align:center;">
    <p>
      Deseja realmente salvar as alterações do aluno 
      <strong id="nome-aluno-modal-editar"></strong> 
      (RA: <span id="ra-aluno-no-modal-editar"></span>)?
    </p>
    <input type="hidden" id="input-ra-editar">
  </div>
  <div class="actions">
    <div class="ui red basic cancel inverted button">
      <i class="remove icon"></i>
      Cancelar
    </div>
    <div class="ui green ok inverted button" id="btn-editar-cadastro">
      <i class="checkmark icon"></i>
      Confirmar Edição
    </div>
  </div>
</div>

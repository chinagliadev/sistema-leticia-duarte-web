<div class="ui mini modal" id="modalSalvar">
    <div class="header" style="background-color:#2185d0; color:white; text-align:center; font-weight:bold;">
        <i class="save icon"></i> Salvar Cadastros
    </div>
    <div class="content" style="text-align:center; font-size:1.1em; padding: 1.5em;">
        <p>Você está prestes a salvar todos os dados do cadastro.<br>Tem certeza de que deseja continuar?</p>
    </div>
    <div class="actions" style="padding:1em; display:flex; justify-content:center; gap:1em;">
        <button class="ui green button approve" id="btnConfirmarSalvar" style="min-width:120px;">
            <i class="check icon"></i> Sim, Salvar
        </button>
        <button class="ui red button cancel" style="min-width:120px;">
            <i class="times icon"></i> Cancelar
        </button>
    </div>
    <!-- Loader oculto inicialmente -->
    <div class="ui active inverted dimmer" id="loaderSalvar" style="display:none;">
        <div class="ui text loader">Salvando dados...</div>
    </div>
</div>


<section class="ui segment yellow raised">
    <h2>Estrutura Familiar</h2>
    <div class="fields">
        <div class="four wide field">
            <label>Pais vivem juntos</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="pais_vivem_juntos">
                <label></label>
            </div>
        </div>
        <div class="four wide field">
            <label>Nº de filhos</label>
            <input type="number" placeholder="0" name="numero_filhos">
        </div>
        <div class="four wide field">
            <label>Recebe bolsa família</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="recebe_bolsa_familia" id="toggle-bolsa-familia" onchange="validarBolsaFamilia()">
                <label></label>
            </div>
        </div>
        <div class="four wide field oculto" id="valor-bolsa-field">
            <label>Valor</label>
            <input type="number" placeholder="R$" name="valor" id="valor_bolsa_familia" onblur="validarBolsaFamilia()">
            <div class="ui hidden negative message" id="mensagem-erro-bolsa-familia">
                <div class="content">
                    <i class="user icon"></i><span id="bolsa-familia-erro"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="fields">
        <div class="four wide field">
            <label>Possui alergia</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="possui_alergia" id="toggle-alergia" onchange="validarAlergia()">
                <label></label>
            </div>
        </div>
        <div class="four wide field oculto" id="especifique-alergia">
            <label>Especifique</label>
            <input type="text" placeholder="" name="especifique_alergia" id="qual_alergia" onblur="validarAlergia()">
            <div class="ui hidden negative message" id="mensagem-erro-alergia">
                <div class="content">
                    <i class="heartbeat icon"></i><span id="alergia-erro"></span>
                </div>
            </div>
        </div>
        <div class="four wide field">
            <label>Possui convênio</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="possui_convenio" id="toggle-convenio" onchange="validarConvenioMedico()">
                <label></label>
            </div>
        </div>
        <div class="four wide field oculto" id="qual-convenio-field">
            <label>Qual convênio</label>
            <input type="text" placeholder="" name="qual_convenio" id="qual_convenio" onblur="validarConvenioMedico()">
            <div class="ui hidden negative message" id="mensagem-erro-convenio">
                <div class="content">
                    <i class="heartbeat icon"></i><span id="convenio-erro"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="fields">
        <div class="four wide field">
            <label>Portador de alguma necessidade especial</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="portador_necessidade_especial" id="toggle-necessidade-especial" onchange="validarNecessidadeEspecial()">
                <label></label>
            </div>
        </div>
        <div class="four wide field oculto" id="qual-necessidade">
            <label>Qual</label>
            <input type="text" placeholder="" name="qual_necessidade" id="necessidade_especial" onblur="validarNecessidadeEspecial()">
            <div class="ui hidden negative message" id="mensagem-erro-necessidade">
                <div class="content">
                    <i class="heartbeat icon"></i><span id="necessidade-erro"></span>
                </div>
            </div>
        </div>
        <div class="four wide field">
            <label>Problemas de visão</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="problemas_visao">
                <label></label>
            </div>
        </div>
        <div class="four wide field">
            <label>Já fez cirurgia</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="ja_fez_cirurgia">
                <label></label>
            </div>
        </div>
    </div>

    <div class="fields">
        <div class="four wide field">
            <label>Tomou vacina contra catapora ou varicela</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="vacina_catapora_varicela">
                <label></label>
            </div>
        </div>
    </div>

    <h4 class="ui dividing header">Transporte para a escola</h4>
    <div class="fields">
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="transporte_carro" value="carro">
                <label>Carro</label>
            </div>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="transporte_van" value="van">
                <label>Van Escolar</label>
            </div>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="transporte_pe" value="pe">
                <label>A Pé</label>
            </div>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="transporte_outros_desc" value="outros">
                <label>Outros</label>
            </div>
        </div>
    </div>

    <h4 class="ui dividing header">Doenças que a criança já teve</h4>
    <div class="ui grid">
        <div class="five wide column">
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_anemia"><label>Anemia</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_bronquite"><label>Bronquite</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_cardiaca"><label>Doença Cardíaca</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_catapora"><label>Catapora</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_diabetes"><label>Diabetes</label></div>
            </div>
        </div>
        <div class="five wide column">
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_hepatite"><label>Hepatite</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_meningite"><label>Meningite</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_pneumonia"><label>Pneumonia</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_caxumba"><label>Caxumba</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_convulsao"><label>Convulsão</label></div>
            </div>
        </div>
        <div class="five wide column">
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_dengue"><label>Dengue</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_desidratacao"><label>Desidratação</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_refluxo"><label>Refluxo</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_rubeola"><label>Rubéola</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_sarampo"><label>Sarampo</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_verminose"><label>Verminoses</label></div>
            </div>
        </div>
    </div>
</section>
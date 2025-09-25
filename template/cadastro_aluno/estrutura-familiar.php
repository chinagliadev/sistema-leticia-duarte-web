<section class="ui segment blue">
    <h2>Estrutura Familiar</h2>
    <div class="fields">
        <div class="four wide field">
            <label>Pais vivem juntos</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="pais_vivem">
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
                <input type="checkbox" name="bolsa_familia" id="toggle-bolsa-familia">
                <label></label>
            </div>
        </div>
        <div class="four wide field" id="valor-bolsa-field">
            <label>Valor</label>
            <input type="number" placeholder="R$" name="valor_bolsa">
        </div>
    </div>

    <!-- SEGUNDA LINHA -->
    <div class="fields">
        <div class="four wide field">
            <label>Possui alergia</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="alergia" id="toggle-alergia">
                <label></label>
            </div>
        </div>
        <div class="four wide field" id="especifique-alergia-field">
            <label>Especifique</label>
            <input type="text" placeholder="" name="especifique_alergia">
        </div>
        <div class="four wide field">
            <label>Possui convênio</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="convenio" id="toggle-convenio">
                <label></label>
            </div>
        </div>
        <div class="four wide field" id="qual-convenio-field">
            <label>Qual convênio</label>
            <input type="text" placeholder="" name="qual_convenio">
        </div>
    </div>

    <!-- TERCEIRA LINHA -->
    <div class="fields">
        <div class="four wide field">
            <label>Portador de alguma necessidade especial</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="necessidade_especial" id="toggle-necessidade-especial">
                <label></label>
            </div>
        </div>
        <div class="four wide field" id="qual-necessidade-field">
            <label>Qual</label>
            <input type="text" placeholder="" name="qual_necessidade">
        </div>
        <div class="four wide field">
            <label>Problemas de visão</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="problema_visao">
                <label></label>
            </div>
        </div>
        <div class="four wide field">
            <label>Já fez cirurgia</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="cirurgia">
                <label></label>
            </div>
        </div>
    </div>

    <div class="fields">
        <div class="four wide field">
            <label>Tomou vacina contra catapora ou varicela</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="vacina_catapora">
                <label></label>
            </div>
        </div>
    </div>

    <!-- TRANSPORTE -->
    <h4 class="ui dividing header">Transporte para a escola</h4>
    <div class="fields">
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="transporte" value="carro">
                <label>Carro</label>
            </div>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="transporte" value="van">
                <label>Van Escolar</label>
            </div>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="transporte" value="pe">
                <label>A Pé</label>
            </div>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="transporte" value="outros">
                <label>Outros</label>
            </div>
        </div>
    </div>

    <!-- DOENÇAS -->
    <h4 class="ui dividing header">Doenças que a criança já teve</h4>
    <div class="ui grid">
        <div class="five wide column">
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca" value="anemia"><label>Anemia</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca" value="bronquite"><label>Bronquite</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca" value="doenca_cardiaca"><label>Doença Cardíaca</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca" value="catapora"><label>Catapora</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca" value="diabetes"><label>Diabetes</label></div>
            </div>
        </div>
        <div class="five wide column">
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca" value="hepatite"><label>Hepatite</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca" value="meningite"><label>Meningite</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca" value="pneumonia"><label>Pneumonia</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca" value="caxumba"><label>Caxumba</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca" value="convulsao"><label>Convulsão</label></div>
            </div>
        </div>
        <div class="five wide column">
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca" value="dengue"><label>Dengue</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca" value="desidratacao"><label>Desidratação</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca" value="refluxo"><label>Refluxo</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca" value="rubeola"><label>Rubéola</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca" value="sarampo"><label>Sarampo</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca" value="verminose"><label>Verminoses</label></div>
            </div>
        </div>
    </div>



</section>
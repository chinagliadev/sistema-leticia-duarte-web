<section class="ui segment yellow raised">
    <h2>Estrutura Familiar</h2>
    <div class="fields">
        <div class="four wide field">
            <label>Pais vivem juntos</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="pais_vivem_juntos" <?= !empty($estrutura_familiar['pais_vivem_juntos']) && $estrutura_familiar['pais_vivem_juntos'] == 1 ? 'checked' : '' ?>>
                <label></label>
            </div>
        </div>

        <div class="four wide field">
            <label>Nº de filhos</label>
            <input type="number" placeholder="0" name="numero_filhos" value="<?= $estrutura_familiar['numero_filhos'] ?? '' ?>">
        </div>

        <div class="four wide field">
            <label>Recebe bolsa família</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="recebe_bolsa_familia" id="toggle-bolsa-familia"
                    <?= !empty($estrutura_familiar['recebe_bolsa_familia']) && $estrutura_familiar['recebe_bolsa_familia'] == 1 ? 'checked' : '' ?>
                    onchange="validarBolsaFamilia()">
                <label></label>
            </div>
        </div>

        <div class="four wide field <?= !empty($estrutura_familiar['recebe_bolsa_familia']) && $estrutura_familiar['recebe_bolsa_familia'] == 1 ? '' : 'oculto' ?>" id="valor-bolsa-field">
            <label>Valor</label>
            <input
                type="text"
                placeholder="R$"
                name="valor"
                id="valor_bolsa_familia"
                value="<?= $estrutura_familiar['valor'] ?? '' ?>"
                onblur="validarBolsaFamilia()">

            <div class="ui hidden negative message" id="mensagem-erro-bolsa-familia" style="margin-top:15px">
                <div class="content">
                    <i class="exclamation triangle icon"></i>
                    <span id="bolsa-familia-erro"></span>
                </div>
            </div>
        </div>

    </div>

    <div class="fields">
        <div class="four wide field">
            <label>Possui alergia</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="possui_alergia" id="toggle-alergia"
                    <?= !empty($estrutura_familiar['possui_alergia']) && $estrutura_familiar['possui_alergia'] == 1 ? 'checked' : '' ?>
                    onchange="validarAlergia()">
                <label></label>
            </div>
        </div>

        <div class="four wide field <?= !empty($estrutura_familiar['possui_alergia']) && $estrutura_familiar['possui_alergia'] == 1 ? '' : 'oculto' ?>" id="especifique-alergia">
            <label>Especifique</label>
            <input
                type="text"
                name="especifique_alergia"
                id="qual_alergia"
                value="<?= $estrutura_familiar['especifique_alergia'] ?? '' ?>"
                onblur="validarAlergia()">

            <div class="ui hidden negative message" id="mensagem-erro-alergia">
                <div class="content">
                    <i class="exclamation triangle icon"></i>
                    <span id="alergia-erro"></span>
                </div>
            </div>
        </div>

        <div class="four wide field">
            <label>Possui convênio</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="possui_convenio" id="toggle-convenio"
                    <?= !empty($estrutura_familiar['possui_convenio']) && $estrutura_familiar['possui_convenio'] == 1 ? 'checked' : '' ?>
                    onchange="validarConvenioMedico()">
                <label></label>
            </div>
        </div>

        <div class="four wide field <?= !empty($estrutura_familiar['possui_convenio']) && $estrutura_familiar['possui_convenio'] == 1 ? '' : 'oculto' ?>" id="qual-convenio-field">
            <label>Qual convênio</label>
            <input
                type="text"
                name="qual_convenio"
                id="qual_convenio"
                value="<?= $estrutura_familiar['qual_convenio'] ?? '' ?>"
                onblur="validarConvenioMedico()">

            <div class="ui hidden negative message" id="mensagem-erro-convenio">
                <div class="content">
                    <i class="exclamation triangle icon"></i>
                    <span id="convenio-erro"></span>
                </div>
            </div>
        </div>


    </div>

    <div class="fields">
        <div class="four wide field">
            <label>Portador de alguma necessidade especial</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="portador_necessidade_especial" id="toggle-necessidade-especial"
                    <?= !empty($estrutura_familiar['portador_necessidade_especial']) && $estrutura_familiar['portador_necessidade_especial'] == 1 ? 'checked' : '' ?>
                    onchange="validarNecessidadeEspecial()">
                <label></label>
            </div>
        </div>

        <div class="four wide field <?= !empty($estrutura_familiar['portador_necessidade_especial']) && $estrutura_familiar['portador_necessidade_especial'] == 1 ? '' : 'oculto' ?>" id="qual-necessidade">
            <label>Qual</label>
            <input
                type="text"
                name="qual_necessidade"
                id="necessidade_especial"
                value="<?= $estrutura_familiar['qual_necessidade_especial'] ?? '' ?>"
                onblur="validarNecessidadeEspecial()">


            <div class="ui hidden negative message" id="mensagem-erro-necessidade">
                <div class="content">
                    <i class="exclamation triangle icon"></i>
                    <span id="necessidade-erro"></span>
                </div>
            </div>
        </div>

        <div class="four wide field">
            <label>Problemas de visão</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="problemas_visao"
                    <?= !empty($estrutura_familiar['problemas_visao']) && $estrutura_familiar['problemas_visao'] == 1 ? 'checked' : '' ?>>
                <label></label>
            </div>
        </div>
    </div>

    <div class="fields">
        <div class="four wide field">
            <label>Já fez cirurgia</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" id="toggle_cirurgia" name="ja_fez_cirurgia"
                    <?= !empty($estrutura_familiar['ja_fez_cirurgia']) && $estrutura_familiar['ja_fez_cirurgia'] == 1 ? 'checked' : '' ?>
                    onchange="validarCirurgia()">
                <label></label>
            </div>
        </div>

        <div class="four wide field <?= !empty($estrutura_familiar['ja_fez_cirurgia']) && $estrutura_familiar['ja_fez_cirurgia'] == 1 ? '' : 'oculto' ?>" id="divCirurgia">
            <label>Qual</label>
            <input
                type="text"
                name="qual_cirurgia"
                id="cirurgia"
                value="<?= $estrutura_familiar['qual_cirurgia'] ?? '' ?>"
                onblur="validarCirurgia()">

            <div class="ui hidden negative message" id="mensagem-erro-cirurgia" style="margin-top:15px">
                <div class="content">
                    <i class="exclamation triangle icon"></i>
                    <span id="cirurgia-erro"></span>
                </div>
            </div>
        </div>

    </div>

    <div class="fields">
        <div class="four wide field">
            <label>Tomou vacina contra catapora ou varicela</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="vacina_catapora_varicela"
                    <?= !empty($estrutura_familiar['vacina_catapora_varicela']) && $estrutura_familiar['vacina_catapora_varicela'] == 1 ? 'checked' : '' ?>>
                <label></label>
            </div>
        </div>
    </div>

    <h4 class="ui dividing header">Tipo de moradia</h4>
    <div class="fields">
        <div class="field">
            <div class="ui radio checkbox">
                <input type="radio" name="tipo_moradia" value="propria"
                    <?= ($estrutura_familiar['tipo_moradia'] ?? '') == 'propria' ? 'checked' : '' ?>
                    onclick="ativarCampoAluguel()">
                <label>Própria</label>
            </div>
        </div>

        <div class="field">
            <div class="ui radio checkbox">
                <input type="radio" name="tipo_moradia" value="cedida"
                    <?= ($estrutura_familiar['tipo_moradia'] ?? '') == 'cedida' ? 'checked' : '' ?>
                    onclick="ativarCampoAluguel()">
                <label>Cedida</label>
            </div>
        </div>

        <div class="field">
            <div class="ui radio checkbox">
                <input type="radio" id="moradia_alugada" name="tipo_moradia" value="alugada"
                    <?= ($estrutura_familiar['tipo_moradia'] ?? '') == 'alugada' ? 'checked' : '' ?>
                    onclick="ativarCampoAluguel()">
                <label>Alugada</label>
            </div>
        </div>
    </div>

    <div class="field <?= ($estrutura_familiar['tipo_moradia'] ?? '') == 'alugada' ? '' : 'oculto' ?>" id="divAluguel">
        <label for="txtValorAluguel">Valor do aluguel</label>
        <div class="ui small input">
            <input
                name="txtValorAluguel"
                id="txtValorAluguel"
                type="text"
                value="<?= $estrutura_familiar['valor_aluguel'] ?? '' ?>"
                placeholder="Valor do aluguel"
                onblur="validarCampoAluguel()">
        </div>

        <div class="ui hidden negative message" id="mensagem-erro-aluguel" style="margin-top: 10px">
            <div class="content">
                <i class="exclamation triangle icon"></i>
                <span id="aluguel-erro"></span>
            </div>
        </div>
    </div>


    <h4 class="ui dividing header">Transporte para a escola</h4>
    <div class="fields">
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="transporte_carro" value="1" <?= !empty($estrutura_familiar['transporte_carro']) ? 'checked' : '' ?>>
                <label>Carro</label>
            </div>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="transporte_van" value="1" <?= !empty($estrutura_familiar['transporte_van']) ? 'checked' : '' ?>>
                <label>Van Escolar</label>
            </div>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="transporte_pe" value="1" <?= !empty($estrutura_familiar['transporte_pe']) ? 'checked' : '' ?>>
                <label>A Pé</label>
            </div>
        </div>
        <div class="field">
            <div class="ui checkbox">
                <input type="checkbox" name="transporte_outros_desc" value="1" <?= !empty($estrutura_familiar['transporte_outros_desc']) ? 'checked' : '' ?>>
                <label>Outros</label>
            </div>
        </div>
    </div>

    <!-- Doenças -->
    <h4 class="ui dividing header">Doenças que a criança já teve</h4>
    <div class="ui grid">
        <div class="five wide column">
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_anemia" <?= !empty($estrutura_familiar['doenca_anemia']) ? 'checked' : '' ?>><label>Anemia</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_bronquite" <?= !empty($estrutura_familiar['doenca_bronquite']) ? 'checked' : '' ?>><label>Bronquite</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_catapora" <?= !empty($estrutura_familiar['doenca_catapora']) ? 'checked' : '' ?>><label>Catapora</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_covid" <?= !empty($estrutura_familiar['doenca_covid']) ? 'checked' : '' ?>><label>COVID-19</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_cardiaca" <?= !empty($estrutura_familiar['doenca_cardiaca']) ? 'checked' : '' ?>><label>Doença Cardíaca</label></div>
            </div>
        </div>

        <div class="five wide column">
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_meningite" <?= !empty($estrutura_familiar['doenca_meningite']) ? 'checked' : '' ?>><label>Meningite</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_pneumonia" <?= !empty($estrutura_familiar['doenca_pneumonia']) ? 'checked' : '' ?>><label>Pneumonia</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_convulsao" <?= !empty($estrutura_familiar['doenca_convulsao']) ? 'checked' : '' ?>><label>Convulsão</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_diabete" <?= !empty($estrutura_familiar['doenca_diabete']) ? 'checked' : '' ?>><label>Diabetes</label></div>
            </div>
            <div class="field">
                <div class="ui checkbox"><input type="checkbox" name="doenca_refluxo" <?= !empty($estrutura_familiar['doenca_refluxo']) ? 'checked' : '' ?>><label>Refluxo</label></div>
            </div>
        </div>

        <div class="five wide column">
            <div class="field">
                <label>Outras doenças</label>
                <input type="text" name="outras_doencas" placeholder="Especifique outras doenças" value="<?= $estrutura_familiar['outras_doencas'] ?? '' ?>">
            </div>
        </div>
    </div>
</section>
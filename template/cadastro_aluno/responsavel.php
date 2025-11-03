<section class="ui segment red raised sessao-tab">
    <h2>Identificação do responsável 1</h2>

    <div class="responsavel" id="responsavel-1">
        <div class="fields">
            <!-- Tipo do responsável -->
            <div class="four wide field" id="tipo_responsavel_div">
                <label for="txtTipoResponsavel_1">Tipo do responsável</label>
                <select class="ui search dropdown" id="txtTipoResponsavel_1" name="txtTipoResponsavel_1" onchange="validarTipoResponsavel1()">
                    <option value="" disabled hidden <?= empty($responsavel_1['tipo_responsavel']) ? 'selected' : '' ?>>Selecione o tipo</option>
                    <?php
                    $tipos = ["Pai", "Mãe", "Avô", "Avó", "Irmão", "Irmã", "Tio", "Tia", "Outro"];
                    foreach ($tipos as $tipo) {
                        $selected = ($responsavel_1['tipo_responsavel'] ?? '') === $tipo ? 'selected' : '';
                        echo "<option value='$tipo' $selected>$tipo</option>";
                    }
                    ?>
                </select>
                <div id="mensagem-erro-tipo-responsavel-1" class="ui hidden message error">
                    <span id="tipo-responsavel-erro-1" class="mensagem-margin"></span>
                </div>
            </div>

            <!-- Nome -->
            <div class="eight wide field" id="nome_responsavel_div">
                <label for="txtNomeResponsavel_1">Nome do Responsável</label>
                <input type="text" id="txtNomeResponsavel_1" name="txtNomeResponsavel_1" value="<?= $responsavel_1['nome'] ?? '' ?>" onblur="validarNomeResponsavel1()">
                <div id="mensagem-erro-nome-responsavel-1" class="ui hidden message error">
                    <span id="nome-responsavel-erro-1"></span>
                </div>
            </div>

            <!-- Data nascimento -->
            <div class="four wide field" id="data_nascimento_responsavel_div">
                <label>Data Nascimento</label>
                <div class="ui calendar" id="dataNascimentoCalendar_1">
                    <div class="ui input">
                        <input type="text" id="txtDataNascimento_1" value="<?= $responsavel_1['data_nascimento'] ?? '' ?>" placeholder="dd/mm/aaaa" onblur="validarDataNascimentoResponsavel1()">
                    </div>
                </div>
                <input type="hidden" name="data_nascimento_1" id="hiddenDataNascimento_1" value="<?= $aluno['data_nascimento_1'] ?? '' ?>">
                <div id="mensagem-erro-data-responsavel-1" class="ui hidden message error">
                    <span id="data-responsavel-erro-1"></span>
                </div>
            </div>
        </div>

        <div class="fields">
            <!-- Estado Civil -->
            <div class="four wide field" id="estado_civil_responsavel_div">
                <label for="txtEstadoCivil_1">Estado Civil</label>
                <select class="ui search dropdown" id="txtEstadoCivil_1" name="txtEstadoCivil_1" onchange="validarEstadoCivilResponsavel1()">
                    <option value="" disabled hidden <?= empty($responsavel_1['estado_civil']) ? 'selected' : '' ?>>Selecione o estado civil</option>
                    <?php
                    $estados = ["Solteiro", "Casado", "Divorciado", "Viuvo", "União Estável"];
                    foreach ($estados as $estado) {
                        $selected = ($responsavel_1['estado_civil'] ?? '') === $estado ? 'selected' : '';
                        echo "<option value='$estado' $selected>$estado</option>";
                    }
                    ?>
                </select>
                <div id="mensagem-erro-estado-civil-1" class="ui hidden message error">
                    <span id="estado-civil-erro-1"></span>
                </div>
            </div>

            <!-- Escolaridade -->
            <div class="four wide field" id="escolaridade_responsavel_div">
                <label for="txtEscolaridade">Escolaridade</label>
                <select class="ui search dropdown" id="txtEscolaridade" name="txtEscolaridade" onchange="validarEscolaridade()">
                    <option value="" disabled hidden <?= empty($responsavel_1['escolaridade']) ? 'selected' : '' ?>>Selecione a escolaridade</option>
                    <?php
                    $escolaridades = ["Fundamental", "Médio", "Técnico", "Superior", "Pós-graduação", "Outro"];
                    foreach ($escolaridades as $esc) {
                        $selected = ($responsavel_1['escolaridade'] ?? '') === $esc ? 'selected' : '';
                        echo "<option value='$esc' $selected>$esc</option>";
                    }
                    ?>
                </select>
                <div id="mensagem-erro-escolaridade-1" class="ui hidden message error">
                    <span id="escolaridade-erro-1"></span>
                </div>
            </div>

            <!-- Telefone -->
            <div class="four wide field" id="telefone_responsavel_div">
                <label for="txtTelefone_1">Telefone</label>
                <input type="text" id="txtTelefone_1" name="txtTelefone_1" placeholder="(19) 99999-9999" value="<?= $responsavel_1['celular'] ?? '' ?>" onblur="validarTelefoneResponsavel1()">
                <div id="mensagem-erro-telefone-1" class="ui hidden message error">
                    <span id="telefone-erro-1"></span>
                </div>
            </div>

            <!-- Email -->
            <div class="four wide field" id="email_responsavel_div">
                <label for="txtEmail_1">Email</label>
                <input type="email" id="txtEmail_1" name="txtEmail_1" placeholder="exemplo@email.com" value="<?= $responsavel_1['email'] ?? '' ?>" onblur="validarEmailResponsavel1()">
                <div id="mensagem-erro-email-1" class="ui hidden message error">
                    <span id="email-erro-1"></span>
                </div>
            </div>
        </div>

        <div class="fields">
            <!-- Empresa -->
            <div class="eight wide field" id="empresa_responsavel_div">
                <label for="txtNomeEmpresa_1">Nome da Empresa</label>
                <input type="text" id="txtNomeEmpresa_1" name="txtNomeEmpresa_1" placeholder="Empresa..." value="<?= $responsavel_1['nome_empresa'] ?? '' ?>">
            </div>

            <!-- Profissão -->
            <div class="four wide field" id="profissao_responsavel_div">
                <label for="txtProfissao_1">Profissão</label>
                <input type="text" id="txtProfissao_1" name="txtProfissao_1" placeholder="Arquiteto, Advogado..." value="<?= $responsavel_1['profissao'] ?? '' ?>">
            </div>

            <!-- Telefone Trabalho -->
            <div class="four wide field" id="telefone_trabalho_responsavel_div">
                <label for="txtTelefoneTrabalho_1">Telefone do Trabalho</label>
                <input type="text" id="txtTelefoneTrabalho_1" name="txtTelefoneTrabalho_1" placeholder="(19) 99999-9999" value="<?= $responsavel_1['telefone_trabalho'] ?? '' ?>">
            </div>
        </div>

        <div class="fields">
            <!-- Horário Trabalho -->
            <div class="four wide field" id="horario_trabalho_responsavel_div">
                <label for="txtHorarioTrabalho_1">Horário de Trabalho</label>
                <input type="text" id="txtHorarioTrabalho_1" name="txtHorarioTrabalho_1" placeholder="8h" value="<?= $responsavel_1['horario_trabalho'] ?? '' ?>">
            </div>

            <!-- Salário -->
            <div class="four wide field" id="salario_responsavel_div">
                <label for="txtSalario_1">Salário do responsável</label>
                <input type="text" id="txtSalario_1" name="txtSalario_1" placeholder="R$1500,00..." value="<?= $responsavel_1['salario'] ?? '' ?>" onblur="validarSalarioResponsavel1()">
                <div id="mensagem-erro-salario-1" class="ui hidden message error">
                    <span id="salario-erro-1"></span>
                </div>
            </div>

            <!-- Renda Extra -->
            <div class="four wide field" id="renda_extra_responsavel_div">
                <label for="toggleRendaExtra_1">Possui Renda Extra?</label>
                <div class="ui toggle checkbox">
                    <input type="checkbox" id="toggleRendaExtra_1" name="toggleRendaExtra_1" <?= !empty($responsavel_1['renda_extra']) ? 'checked' : '' ?> onchange="validarRendaExtra()">
                    <label></label>
                </div>
            </div>

            <div class="four wide field <?= !empty($responsavel_1['renda_extra']) ? '' : 'oculto' ?>" id="renda_extra_div">
                <label for="txtRendaExtra">Valor da renda extra</label>
                <input type="text" id="txtRendaExtra" name="txtRendaExtra" value="<?= $responsavel_1['valor_renda_extra'] ?? '' ?>" onblur="validarRendaExtra()">
                <div id="mensagem-erro-renda-extra-1" class="ui hidden message error">
                    <span id="renda-extra-erro-1"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- RESPONSÁVEL 2 -->
    <div class="ui divider"></div>
    <div class="responsavel_2 <?= !empty($responsavel_2['nome']) ? '' : 'oculto' ?>" id="responsavel_2">
        <h2>Identificação do responsável 2</h2>

        <div class="fields">
            <!-- Tipo do responsável -->
            <div class="four wide field" id="tipo_responsavel_2_div">
                <label for="txtTipoResponsavel_2">Tipo do responsável</label>
                <select class="ui search dropdown" id="txtTipoResponsavel_2" name="txtTipoResponsavel_2">
                    <option value="" disabled hidden <?= empty($responsavel_2['tipo_responsavel']) ? 'selected' : '' ?>>Selecione o tipo</option>
                    <?php
                    foreach ($tipos as $tipo) {
                        $selected = ($responsavel_2['tipo_responsavel'] ?? '') === $tipo ? 'selected' : '';
                        echo "<option value='$tipo' $selected>$tipo</option>";
                    }
                    ?>
                </select>
                <div id="mensagem-erro-tipo-responsavel-2" class="ui hidden message error">
                    <span id="tipo-responsavel-erro-2" class="mensagem-margin"></span>
                </div>
            </div>

            <!-- Nome -->
            <div class="eight wide field" id="nome_responsavel_div_2">
                <label for="txtNomeResponsavel_2">Nome do Responsável</label>
                <input type="text" id="txtNomeResponsavel_2" name="txtNomeResponsavel_2" value="<?= $responsavel_2['nome'] ?? '' ?>" onblur="validarNomeResponsavel2()">
                <div id="mensagem-erro-nome-responsavel-2" class="ui hidden message error">
                    <span id="nome-responsavel-erro-2"></span>
                </div>
            </div>

            <!-- Data nascimento -->
            <div class="four wide field" id="data_nascimento_responsavel_2_div">
                <label>Data Nascimento</label>
                <div class="ui calendar" id="dataNascimentoCalendar_2">
                    <div class="ui input">
                        <input type="text" id="txtDataNascimento_2" value="<?= $responsavel_2['data_nascimento'] ?? '' ?>" placeholder="dd/mm/aaaa" onblur="validarDataNascimentoResponsavel2()">
                    </div>
                </div>
                <input type="hidden" name="data_nascimento_2" id="hiddenDataNascimento_2" value="<?= $responsavel_2['data_nascimento'] ?? '' ?>">
                <div id="mensagem-erro-data-responsavel-2" class="ui hidden message error">
                    <span id="data-responsavel-erro-2"></span>
                </div>
            </div>
        </div>

        <div class="fields">
            <!-- Estado Civil -->
            <div class="four wide field" id="estado_civil_responsavel_2_div">
                <label for="txtEstadoCivil_2">Estado Civil</label>
                <select class="ui search dropdown" id="txtEstadoCivil_2" name="txtEstadoCivil_2">
                    <option value="" disabled hidden <?= empty($responsavel_2['estado_civil']) ? 'selected' : '' ?>>Selecione o estado civil</option>
                    <?php
                    foreach ($estados as $estado) {
                        $selected = ($responsavel_2['estado_civil'] ?? '') === $estado ? 'selected' : '';
                        echo "<option value='$estado' $selected>$estado</option>";
                    }
                    ?>
                </select>
                <div id="mensagem-erro-estado-civil-2" class="ui hidden message error">
                    <span id="estado-civil-erro-2"></span>
                </div>
            </div>

            <!-- Escolaridade -->
            <div class="four wide field" id="escolaridade_responsavel_2_div">
                <label for="txtEscolaridade_2">Escolaridade</label>
                <select class="ui search dropdown" id="txtEscolaridade_2" name="txtEscolaridade_2">
                    <option value="" disabled hidden <?= empty($responsavel_2['escolaridade']) ? 'selected' : '' ?>>Selecione a escolaridade</option>
                    <?php
                    foreach ($escolaridades as $esc) {
                        $selected = ($responsavel_2['escolaridade'] ?? '') === $esc ? 'selected' : '';
                        echo "<option value='$esc' $selected>$esc</option>";
                    }
                    ?>
                </select>
                <div id="mensagem-erro-escolaridade-2" class="ui hidden message error">
                    <span id="escolaridade-erro-2"></span>
                </div>
            </div>

            <!-- Telefone -->
            <div class="four wide field" id="telefone_responsavel_2_div">
                <label for="txtTelefone_2">Telefone</label>
                <input type="text" id="txtTelefone_2" name="txtTelefone_2" placeholder="(19) 99999-9999" value="<?= $responsavel_2['celular'] ?? '' ?>" onblur="validarTelefoneResponsavel2()">
                <div id="mensagem-erro-telefone-2" class="ui hidden message error">
                    <span id="telefone-erro-2"></span>
                </div>
            </div>

            <!-- Email -->
            <div class="six wide field" id="email_responsavel_2_div">
                <label for="txtEmail_2">Email</label>
                <input type="email" id="txtEmail_2" name="txtEmail_2" placeholder="exemplo@email.com" value="<?= $responsavel_2['email'] ?? '' ?>" onblur="validarEmailResponsavel2()">
                <div id="mensagem-erro-email-2" class="ui hidden message error">
                    <span id="email-erro-2"></span>
                </div>
            </div>
        </div>

        <div class="fields">
            <!-- Empresa -->
            <div class="eight wide field" id="empresa_responsavel_div_2">
                <label for="txtNomeEmpresa_2">Nome da Empresa</label>
                <input type="text" id="txtNomeEmpresa_2" name="txtNomeEmpresa_2" placeholder="Empresa..." value="<?= $responsavel_2['nome_empresa'] ?? '' ?>">
            </div>

            <!-- Profissão -->
            <div class="four wide field" id="profissao_responsavel_div_2">
                <label for="txtProfissao_2">Profissão</label>
                <input type="text" id="txtProfissao_2" name="txtProfissao_2" placeholder="Arquiteto, Advogado..." value="<?= $responsavel_2['profissao'] ?? '' ?>">
            </div>

            <!-- Telefone Trabalho -->
            <div class="four wide field" id="telefone_trabalho_responsavel_div_2">
                <label for="txtTelefoneTrabalho_2">Telefone do Trabalho</label>
                <input type="text" id="txtTelefoneTrabalho_2" name="txtTelefoneTrabalho_2" placeholder="(19) 99999-9999" value="<?= $responsavel_2['telefone_trabalho'] ?? '' ?>">
            </div>
        </div>

        <div class="fields">
            <!-- Horário Trabalho -->
            <div class="four wide field" id="horario_trabalho_responsavel_div_2">
                <label for="txtHorarioTrabalho_2">Horário de Trabalho</label>
                <input type="text" id="txtHorarioTrabalho_2" name="txtHorarioTrabalho_2" placeholder="8h" value="<?= $responsavel_2['horario_trabalho'] ?? '' ?>">
            </div>

            <!-- Salário -->
            <div class="four wide field" id="salario_responsavel_2_div">
                <label for="txtSalario_2">Salário do responsável</label>
                <input type="text" id="txtSalario_2" name="txtSalario_2" placeholder="R$1500,00..." value="<?= $responsavel_2['salario'] ?? '' ?>" onblur="validarSalarioResponsavel2()">
                <div id="mensagem-erro-salario-2" class="ui hidden message error">
                    <span id="salario-erro-2"></span>
                </div>
            </div>

            <!-- Renda Extra -->
            <div class="four wide field" id="renda_extra_responsavel_2_div">
                <label for="toggleRendaExtra_2">Possui Renda Extra?</label>
                <div class="ui toggle checkbox">
                    <input type="checkbox" id="toggleRendaExtra_2" name="toggleRendaExtra_2" <?= !empty($responsavel_2['renda_extra']) ? 'checked' : '' ?>>
                    <label></label>
                </div>
            </div>

            <div class="four wide field <?= !empty($responsavel_2['renda_extra']) ? '' : 'oculto' ?>" id="renda_extra_div_2">
                <label for="txtRendaExtra_2">Valor da renda extra</label>
                <input type="text" id="txtRendaExtra_2" name="txtRendaExtra_2" value="<?= $responsavel_2['valor_renda_extra'] ?? '' ?>">
                <div id="mensagem-erro-renda-extra-2" class="ui hidden message error">
                    <span id="renda-extra-erro-2"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Botão adicionar/remover responsável -->
    <div class="fields">
        <div class="sixteen wide field <?= !empty($responsavel_2['nome']) ? 'oculto' : '' ?>" id="divBotaoResponsavel">
            <div class="right floated column">
                <button class="ui blue button right floated" id="btnAdicionarResponsavel" type="button" onclick="adicionarResponsavel()">
                    <i class="plus circle icon"></i> Adicionar Responsável
                </button>
            </div>
        </div>
    </div>
    <div class="fields">
        <div class="sixteen wide field <?= !empty($responsavel_2['nome']) ? '' : 'oculto' ?>" id="divBotaoRemoverResponsavel">
            <div class="right floated column">
                <button class="ui red button right floated" id="btnRemoverResponsavel" type="button" onclick="removerResponsavel()">
                    <i class="trash alternate outline icon"></i> Remover Responsavel
                </button>
            </div>
        </div>
    </div>
</section>
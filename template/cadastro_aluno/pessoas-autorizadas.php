<section class="ui segment green raised">
    <h2 style="margin-bottom: 20px;">Pessoa autorizada a buscar meu filho(a)</h2>

    <!-- PESSOA AUTORIZADA 1 -->
    <div class="pessoaAutorizada" id="autorizada-1" style="margin-top: 10px;">
        <div class="ui horizontal divider">Pessoa Autorizada 1</div>
        <div class="fields">
            <div class="six wide field" id="div_nome_autorizada">
                <label for="txtNomePessoaAutorizada">Nome</label>
                <input type="text" id="txtNomePessoaAutorizada" name="txtNomePessoaAutorizada"
                    value="<?= htmlspecialchars($pessoa_autorizada_1['nome'] ?? '') ?>" placeholder="">
                <div class="ui hidden negative message" id="mensagem-erro-nomeAutorizada">
                    <div class="content"><i class="user icon"></i><span id="nomeAutorizada-erro"></span></div>
                </div>
            </div>

            <div class="three wide field" id="div_cpf_autorizada">
                <label for="txtCpfAutorizada">CPF</label>
                <input type="text" id="txtCpfAutorizada" name="txtCpfAutorizada"
                    value="<?= htmlspecialchars($pessoa_autorizada_1['cpf'] ?? '') ?>" placeholder="">
                <div class="ui hidden negative message" id="mensagem-erro-cpf">
                    <div class="content"><i class="user icon"></i><span id="cpf-erro"></span></div>
                </div>
            </div>

            <div class="three wide field" id="div_telefone_autorizada">
                <label for="txtTelefoneAutorizada">Telefone</label>
                <input type="text" id="txtTelefoneAutorizada" name="txtTelefoneAutorizada"
                    value="<?= htmlspecialchars($pessoa_autorizada_1['celular'] ?? '') ?>" placeholder="">
                <div class="ui hidden negative message" id="mensagem-erro-telefone-autorizada">
                    <div class="content"><i class="user icon"></i><span id="telefone-autorizada-erro"></span></div>
                </div>
            </div>

            <div class="four wide field" id="div_parentesco">
                <label for="txtParentesco">Parentesco</label>
                <select class="ui search dropdown" id="txtParentesco" name="txtParentenco">
                    <option value="" disabled hidden <?= empty($pessoa_autorizada_1['parentesco']) ? 'selected' : '' ?>>Selecione o parentesco</option>
                    <?php
                    $parentescos = ['Pai', 'Mãe', 'Avô', 'Avó', 'Irmão', 'Irmã', 'Tio', 'Tia', 'Outro'];
                    foreach ($parentescos as $p) {
                        $selected = ($pessoa_autorizada_1['parentesco'] ?? '') === $p ? 'selected' : '';
                        echo "<option value='$p' $selected>$p</option>";
                    }
                    ?>
                </select>
                <div class="ui hidden negative message" id="mensagem-erro-parentesco-autorizada">
                    <div class="content"><i class="user icon"></i><span id="parentesco-autorizada-erro"></span></div>
                </div>
            </div>
        </div>
    </div>

    <!-- PESSOA AUTORIZADA 2 -->
    <div class="pessoaAutorizada" id="autorizada-2">
        <div class="ui horizontal divider">Pessoa Autorizada 2</div>
        <div class="fields">
            <div class="six wide field" id="div_nome_autorizada2">
                <label for="txtNomePessoaAutorizada2">Nome</label>
                <input type="text" name="txtNomePessoaAutorizada2" id="txtNomePessoaAutorizada2"
                    value="<?= htmlspecialchars($pessoa_autorizada_2['nome'] ?? '') ?>" placeholder="">
            </div>

            <div class="three wide field" id="div_cpf_autorizada2">
                <label for="txtCpfAutorizada2">CPF</label>
                <input type="text" name="txtCpfAutorizada2" id="txtCpfAutorizada2"
                    value="<?= htmlspecialchars($pessoa_autorizada_2['cpf'] ?? '') ?>" placeholder="">
            </div>

            <div class="three wide field" id="div_telefone_autorizada2">
                <label for="txtTelefoneAutorizada2">Telefone</label>
                <input type="text" name="txtTelefoneAutorizada2" id="txtTelefoneAutorizada2"
                    value="<?= htmlspecialchars($pessoa_autorizada_2['celular'] ?? '') ?>" placeholder="">
            </div>

            <div class="four wide field" id="div_parentesco2">
                <label for="txtParentenco2">Parentesco</label>
                <select class="ui search dropdown" id="txtParentenco2" name="txtParentenco2">
                    <option value="" disabled hidden <?= empty($pessoa_autorizada_2['parentesco']) ? 'selected' : '' ?>>Selecione o parentesco</option>
                    <?php
                    foreach ($parentescos as $p) {
                        $selected = ($pessoa_autorizada_2['parentesco'] ?? '') === $p ? 'selected' : '';
                        echo "<option value='$p' $selected>$p</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <!-- PESSOA AUTORIZADA 3 -->
    <div class="pessoaAutorizada" id="autorizada-3">
        <div class="ui horizontal divider">Pessoa Autorizada 3</div>
        <div class="fields">
            <div class="six wide field" id="div_nome_autorizada3">
                <label for="txtNomePessoaAutorizada3">Nome</label>
                <input type="text" name="txtNomePessoaAutorizada3" id="txtNomePessoaAutorizada3"
                    value="<?= htmlspecialchars($pessoa_autorizada_3['nome'] ?? '') ?>" placeholder="">
            </div>

            <div class="three wide field" id="div_cpf_autorizada3">
                <label for="txtCpfAutorizada3">CPF</label>
                <input type="text" name="txtCpfAutorizada3" id="txtCpfAutorizada3"
                    value="<?= htmlspecialchars($pessoa_autorizada_3['cpf'] ?? '') ?>" placeholder="">
            </div>

            <div class="three wide field" id="div_telefone_autorizada3">
                <label for="txtTelefoneAutorizada3">Telefone</label>
                <input type="text" name="txtTelefoneAutorizada3" id="txtTelefoneAutorizada3"
                    value="<?= htmlspecialchars($pessoa_autorizada_3['celular'] ?? '') ?>" placeholder="">
            </div>

            <div class="four wide field" id="div_parentesco3">
                <label for="txtParentenco3">Parentesco</label>
                <select class="ui search dropdown" id="txtParentenco3" name="txtParentenco3">
                    <option value="" disabled hidden <?= empty($pessoa_autorizada_3['parentesco']) ? 'selected' : '' ?>>Selecione o parentesco</option>
                    <?php
                    foreach ($parentescos as $p) {
                        $selected = ($pessoa_autorizada_3['parentesco'] ?? '') === $p ? 'selected' : '';
                        echo "<option value='$p' $selected>$p</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <!-- PESSOA AUTORIZADA 4 -->
    <div class="pessoaAutorizada" id="autorizada-4">
        <div class="ui horizontal divider">Pessoa Autorizada 4</div>
        <div class="fields">
            <div class="six wide field" id="div_nome_autorizada4">
                <label for="txtNomePessoaAutorizada4">Nome</label>
                <input type="text" name="txtNomePessoaAutorizada4" id="txtNomePessoaAutorizada4"
                    value="<?= htmlspecialchars($pessoa_autorizada_4['nome'] ?? '') ?>" placeholder="">
            </div>

            <div class="three wide field" id="div_cpf_autorizada4">
                <label for="txtCpfAutorizada4">CPF</label>
                <input type="text" name="txtCpfAutorizada4" id="txtCpfAutorizada4"
                    value="<?= htmlspecialchars($pessoa_autorizada_4['cpf'] ?? '') ?>" placeholder="">
            </div>

            <div class="three wide field" id="div_telefone_autorizada4">
                <label for="txtTelefoneAutorizada4">Telefone</label>
                <input type="text" name="txtTelefoneAutorizada4" id="txtTelefoneAutorizada4"
                    value="<?= htmlspecialchars($pessoa_autorizada_4['celular'] ?? '') ?>" placeholder="">
            </div>

            <div class="four wide field" id="div_parentesco4">
                <label for="txtParentenco4">Parentesco</label>
                <select class="ui search dropdown" id="txtParentenco4" name="txtParentenco4">
                    <option value="" disabled hidden <?= empty($pessoa_autorizada_4['parentesco']) ? 'selected' : '' ?>>Selecione o parentesco</option>
                    <?php
                    foreach ($parentescos as $p) {
                        $selected = ($pessoa_autorizada_4['parentesco'] ?? '') === $p ? 'selected' : '';
                        echo "<option value='$p' $selected>$p</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <div class="ui grid">
        <div class="four column row">
            <div class="left floated column">
                <a href="./cadastrados.php" class="ui icon button left floated">
                    <i class="angle left icon"></i> Voltar
                </a>
            </div>
            <div class="right floated column">
                <button type="button" onclick="validarFormularioCompleto()" id="btn-salvar-dados" class="ui green icon button right floated">
                    <i class="save icon"></i> Salvar Cadastro
                </button>
            </div>
        </div>
    </div>
</section>

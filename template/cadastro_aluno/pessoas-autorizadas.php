<section class="ui segment green raised">
    <h2>Parentesco</h2>
    <div class="pessoaAutorizada" id="autorizada-1">
        <div class="fields">
            <div class="eight wide field">
                <label for="txtNomePessoaAutorizada">Nome</label>
                <input type="text" id="txtNomePessoaAutorizada" name="txtNomePessoaAutorizada" placeholder="">
            </div>
            <div class="four wide field">
                <label for="txtCpfAutorizada">CPF</label>
                <input type="text" id="txtCpfAutorizada" name="txtCpfAutorizada" placeholder="">
            </div>
            <div class="four wide field">
                <label for="txtTelefoneAutorizada">Telefone</label>
                <input type="text" id="txtTelefoneAutorizada" name="txtTelefoneAutorizada" placeholder="">
            </div>
        </div>

        <div class="fields">
            <div class="four wide field">
                <label for="txtParentenco">Parentesco</label>
                <select class="ui search dropdown" name="txtParentenco">
                    <option value="" disabled selected hidden>Selecione o parentesco</option>
                    <option value="Pai">Pai</option>
                    <option value="Mãe">Mãe</option>
                    <option value="Avô">Avô</option>
                    <option value="Avó">Avó</option>
                    <option value="Irmão">Irmão</option>
                    <option value="Irmã">Irmã</option>
                    <option value="Tio">Tio</option>
                    <option value="Tia">Tia</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>
        </div>
    </div>

    <div class="ui divider"></div>

    <div class="pessoaAutorizada" id="autorizada-2" style="display: none;">
        <div class="fields">
            <div class="eight wide field">
                <label for="txtNomePessoaAutorizada">Nome</label>
                <input type="text" id="txtNomePessoaAutorizada2" placeholder="">
            </div>
            <div class="four wide field">
                <label for="txtCpfAutorizada">CPF</label>
                <input type="text" id="txtCpfAutorizada2" placeholder="">
            </div>
            <div class="four wide field">
                <label for="txtTelefoneAutorizada">Telefone</label>
                <input type="text" id="txtTelefoneAutorizada2" placeholder="">
            </div>
        </div>

        <div class="fields">
            <div class="four wide field">
                <label for="txtParentenco">Parentesco</label>
                <select class="ui search dropdown" name="txtParentenco2">
                    <option value="" disabled selected hidden>Selecione o parentesco</option>
                    <option value="Pai">Pai</option>
                    <option value="Mãe">Mãe</option>
                    <option value="Avô">Avô</option>
                    <option value="Avó">Avó</option>
                    <option value="Irmão">Irmão</option>
                    <option value="Irmã">Irmã</option>
                    <option value="Tio">Tio</option>
                    <option value="Tia">Tia</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>
        </div>
        <div class="fields" style="margin-top: 10px;">
            <div class="sixteen wide field">
                <div class="right floated column">
                    <button type="button" id="btnRemoverAutorizada" class="ui red button right floated">
                        <i class="trash icon"></i> Remover Pessoa Autorizada
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="fields">
        <div class="sixteen wide field">
            <div class="right floated column">
                <button class="ui blue button right floated" id="btnAdicionarAutorizada">
                    <i class="plus circle icon"></i>
                    Adicionar Pessoa Autorizada
                </button>
            </div>
        </div>
    </div>
    <!-- BOTÕES -->
    <div class="ui grid">
        <div class="four column row">
            <div class="left floated column">
                <button type="submit" class="ui icon button left floated">
                    <i class="angle left icon"></i> Voltar
                </button>
            </div>
            <div class="right floated column">
                <button onclick="validarResponsavel1();validarAluno();validarResponsavel2();validarResponsavel2();" type="button" id="btn-salvar-dados" class="ui green icon button right floated">
                    <i class="save icon"></i> Salvar Cadastro
                </button>
            </div>
        </div>
    </div>
</section>

<section class="ui segment green raised">
    <h2>Parentesco</h2>
    <div class="pessoaAutorizada" id="autorizada-1">
        <div class="fields">
            <div class="eight wide field" id="div_nome_autorizada">
                <label for="txtNomePessoaAutorizada">Nome</label>
                <input type="text" id="txtNomePessoaAutorizada" name="txtNomePessoaAutorizada" placeholder="" onblur="validarNomeAutorizada()">
                <div class="ui hidden negative message" id="mensagem-erro-nomeAutorizada">
                    <div class="content">
                        <i class="user icon"></i><span id="nomeAutorizada-erro"></span>
                    </div>
                </div>
            </div>
            <div class="four wide field" id="div_cpf_autorizada">
                <label for="txtCpfAutorizada">CPF</label>
                <input type="text" id="txtCpfAutorizada" name="txtCpfAutorizada" placeholder="" onblur="validarCpfAutorizada()">
                <div class="ui hidden negative message" id="mensagem-erro-cpf">
                    <div class="content">
                        <i class="user icon"></i><span id="cpf-erro"></span>
                    </div>
                </div>
            </div>
            <div class="four wide field" id="div_telefone_autorizada">
                <label for="txtTelefoneAutorizada">Telefone</label>
                <input type="text" id="txtTelefoneAutorizada" name="txtTelefoneAutorizada" placeholder="" onblur="validarTelefoneAutorizada()">
                <div class="ui hidden negative message" id="mensagem-erro-telefone-autorizada">
                    <div class="content">
                        <i class="user icon"></i><span id="telefone-autorizada-erro"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="fields">
            <div class="four wide field" id="div_parentesco">
                <label for="txtParentenco">Parentesco</label>
                <select class="ui search dropdown" id="txtParentesco" name="txtParentenco" onchange="validarParentesco()">
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
                <div class="ui hidden negative message" id="mensagem-erro-parentesco-autorizada">
                    <div class="content">
                        <i class="user icon"></i><span id="parentesco-autorizada-erro"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui divider"></div>

    <div class="pessoaAutorizada oculto" id="autorizada-2">
        <h2>Parentesco 2</h2>
        <div class="fields">
            <div class="eight wide field" id="div_nome_autorizada2">
                <label for="txtNomePessoaAutorizada2">Nome</label>
                <input type="text" id="txtNomePessoaAutorizada2" placeholder="" onblur="validarNomeParentesco2()">
                <div class="ui hidden negative message" id="mensagem-erro-nomeAutorizada2">
                    <div class="content">
                        <i class="user icon"></i><span id="nomeAutorizada2-erro"></span>
                    </div>
                </div>
            </div>
            <div class="four wide field" id="div_cpf_autorizada2">
                <label for="txtCpfAutorizada2">CPF</label>
                <input type="text" id="txtCpfAutorizada2" placeholder="" onblur="validarCpfAutorizada2()">
                <div class="ui hidden negative message" id="mensagem-erro-cpf2">
                    <div class="content">
                        <i class="user icon"></i><span id="cpf2-erro"></span>
                    </div>
                </div>
            </div>
            <div class="four wide field" id="div_telefone_autorizada2">
                <label for="txtTelefoneAutorizada">Telefone</label>
                <input type="text" id="txtTelefoneAutorizada2" placeholder="" onblur="validarTelefoneAutorizada2()">
                <div class="ui hidden negative message" id="mensagem-erro-telefone2-autorizada">
                    <div class="content">
                        <i class="user icon"></i><span id="telefone-autorizada2-erro"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="fields">
            <div class="four wide field" id="div_parentesco2">
                <label for="txtParentenco">Parentesco</label>
                <select class="ui search dropdown" id="txtParentenco2" name="txtParentenco2">
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
                <div class="ui hidden negative message" id="mensagem-erro-parentesco-autorizada2">
                    <div class="content">
                        <i class="user icon"></i><span id="parentesco-autorizada-erro2"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="fields" style="margin-top: 10px;">
            <div class="sixteen wide field">
                <div class="right floated column">
                    <button type="button" id="btnRemoverAutorizada" class="ui red button right floated" onclick="removerPessoaAutorizada()">
                        <i class="trash icon"></i> Remover Pessoa Autorizada
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="fields">
        <div class="sixteen wide field">
            <div class="right floated column" id="div_autorizada">
                <button type="button" class="ui blue button right floated" onclick="adicionarPessoaAutorizada()" id="btnAdicionarAutorizada">
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
                <button type="button" onclick="validarFormularioCompleto()" id="btn-salvar-dados" class="ui green icon button right floated">
                    <i class="save icon"></i> Salvar Cadastro
                </button>
            </div>
        </div>
    </div>
</section>
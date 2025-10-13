<section class="ui segment red raised sessao-tab">
    <h2>Responsável</h2>

    <div class="responsavel" id="responsavel-1">
        <div class="fields">

            <div class="four wide field" id="tipo_responsavel_div">
                <label for="txtTipoResponsavel_1">Tipo do responsável</label>
                <select class="ui search dropdown" id="txtTipoResponsavel_1" name="txtTipoResponsavel_1">
                    <option value="" disabled selected hidden>Selecione o tipo</option>
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
                <div id="mensagem-erro-tipo-responsavel-1" class="ui hidden message error">
                    <span id="tipo-responsavel-erro-1"></span>
                </div>
            </div>

            <div class="eight wide field" id="nome_responsavel_div">
                <label for="txtNomeResponsavel_1">Nome do Responsável</label>
                <input type="text" id="txtNomeResponsavel_1" name="txtNomeResponsavel_1" placeholder="">
                <div id="mensagem-erro-nome-responsavel-1" class="ui hidden message error">
                    <span id="nome-responsavel-erro-1"></span>
                </div>
            </div>

            <div class="four wide field" id="data_nascimento_responsavel_div">
                <label>Data Nascimento</label>
                <div class="ui calendar" id="dataNascimentoCalendar_1">
                    <div class="ui input">
                        <input type="date" id="txtDataNascimento_1" name="txtDataNascimento_1" placeholder="dd/mm/aaaa">
                    </div>
                </div>
                <div id="mensagem-erro-data-responsavel-1" class="ui hidden message error">
                    <span id="data-responsavel-erro-1"></span>
                </div>
            </div>
        </div>

        <div class="fields">
            
            <div class="four wide field" id="estado_civil_responsavel_div">
                <label for="txtEstadoCivil_1">Estado Civil</label>
                <select class="ui search dropdown" id="txtEstadoCivil_1" name="txtEstadoCivil_1">
                    <option value="" disabled selected hidden>Selecione o estado civil</option>
                    <option value="Solteiro">Solteiro</option>
                    <option value="Casado">Casado</option>
                    <option value="Divorciado">Divorciado</option>
                    <option value="Viuvo">Viúvo</option>
                </select>
                <div id="mensagem-erro-estado-civil-1" class="ui hidden message error">
                    <span id="estado-civil-erro-1"></span>
                </div>
            </div>

            <div class="four wide field" id="telefone_responsavel_div">
                <label for="txtTelefone_1">Telefone</label>
                <input type="text" id="txtTelefone_1" name="txtTelefone_1" placeholder="(19) 99999-9999">
                <div id="mensagem-erro-telefone-1" class="ui hidden message error">
                    <span id="telefone-erro-1"></span>
                </div>
            </div>

            <div class="eight wide field" id="email_responsavel_div">
                <label for="txtEmail_1">Email</label>
                <input type="email" id="txtEmail_1" name="txtEmail_1" placeholder="exemplo@email.com">
                <div id="mensagem-erro-email-1" class="ui hidden message error">
                    <span id="email-erro-1"></span>
                </div>
            </div>
        </div>

        <div class="fields">
            <div class="eight wide field" id="empresa_responsavel_div">
                <label for="txtNomeEmpresa_1">Nome da Empresa</label>
                <input type="text" id="txtNomeEmpresa_1" name="txtNomeEmpresa_1" placeholder="Empresa...">
            </div>

            <div class="four wide field" id="profissao_responsavel_div">
                <label for="txtProfissao_1">Profissão</label>
                <input type="text" id="txtProfissao_1" name="txtProfissao_1" placeholder="Arquiteto, Advogado...">
            </div>

            <div class="four wide field" id="telefone_trabalho_responsavel_div">
                <label for="txtTelefoneTrabalho_1">Telefone do Trabalho</label>
                <input type="text" id="txtTelefoneTrabalho_1" name="txtTelefoneTrabalho_1" placeholder="(19) 99999-9999">
            </div>
        </div>

        <div class="fields">
            <div class="four wide field" id="horario_trabalho_responsavel_div">
                <label for="txtHorarioTrabalho_1">Horário de Trabalho</label>
                <input type="text" id="txtHorarioTrabalho_1" name="txtHorarioTrabalho_1" placeholder="8h às 18h...">
            </div>

            <div class="four wide field" id="salario_responsavel_div">
                <label for="txtSalario_1">Salário do responsável</label>
                <input type="number" id="txtSalario_1" name="txtSalario_1" placeholder="R$1500,00...">
                <div id="mensagem-erro-salario-1" class="ui hidden message error">
                    <span id="salario-erro-1"></span>
                </div>
            </div>

            <div class="four wide field" id="renda_extra_responsavel_div">
                <label for="toggleRendaExtra_1">Possui Renda Extra?</label>
                <div class="ui toggle checkbox">
                    <input type="checkbox" id="toggleRendaExtra_1" name="toggleRendaExtra_1" onchange="ativarCampoRendaExtra()">
                    <label></label>
                </div>
            </div>
            <div class="four wide field oculto" id="renda_extra_div">
                <label for="txtRendaEnxtra">Valor da renda extra</label>
                <input type="number" id="txtRendaExtra" name="txtRendaExtra">
            </div>
        </div>
    </div>

    <div class="ui divider"></div>

    <div class="fields">
        <div class="sixteen wide field">
            <div class="right floated column">
                <button class="ui blue button right floated" id="btnAdicionarResponsavel" type="button">
                    <i class="plus circle icon"></i> Adicionar Responsável
                </button>
            </div>
        </div>
    </div>
</section>

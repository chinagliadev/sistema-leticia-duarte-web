<section class="ui segment red raised sessao-tab">
    <h2>Responsável</h2>

    <div class="responsavel" id="responsavel-1">
        <div class="fields">

            <div class="four wide field" id="tipo_responsavel_div">
                <label for="txtTipoResponsavel_1">Tipo do responsável</label>
                <select class="ui search dropdown" id="txtTipoResponsavel_1" name="txtTipoResponsavel_1" onchange="validarTipoResponsavel1()">
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
                    <span id="tipo-responsavel-erro-1" class="mensagem-margin"></span>
                </div>
            </div>

            <div class="eight wide field" id="nome_responsavel_div">
                <label for="txtNomeResponsavel_1">Nome do Responsável</label>
                <input type="text" id="txtNomeResponsavel_1" name="txtNomeResponsavel_1" placeholder="" onblur="validarNomeResponsavel1()">
                <div id="mensagem-erro-nome-responsavel-1" class="ui hidden message error">
                    <span id="nome-responsavel-erro-1"></span>
                </div>
            </div>

            <div class="four wide field" id="data_nascimento_responsavel_div">
                <label>Data Nascimento</label>
                <div class="ui calendar" id="dataNascimentoCalendar_1">
                    <div class="ui input">
                        <!-- CAMPO VISÍVEL: SEM o atributo 'name'. Apenas exibe a data formatada. -->
                        <input type="text" id="txtDataNascimento_1" placeholder="dd/mm/aaaa" onblur="validarDataNascimentoResponsavel1()">
                    </div>
                </div>
                <!-- NOVO CAMPO OCULTO: ESTE CAMPO SERÁ ENVIADO COM O FORMATO YYYY-MM-DD PELO JAVASCRIPT -->
                <input type="hidden" name="data_nascimento_1" id="hiddenDataNascimento_1">
                <div id="mensagem-erro-data-responsavel-1" class="ui hidden message error">
                    <span id="data-responsavel-erro-1"></span>
                </div>
            </div>
        </div>

        <div class="fields">

            <div class="four wide field" id="estado_civil_responsavel_div">
                <label for="txtEstadoCivil_1">Estado Civil</label>
                <select class="ui search dropdown" id="txtEstadoCivil_1" name="txtEstadoCivil_1" onchange="validarEstadoCivilResponsavel1()">
                    <option value="" disabled selected hidden>Selecione o estado civil</option>
                    <option value="Solteiro">Solteiro</option>
                    <option value="Casado">Casado</option>
                    <option value="Divorciado">Divorciado</option>
                    <option value="Viuvo">Viúvo</option>
                </select>
                <div id="mensagem-erro-estado-civil-1" class="ui hidden message error">
                    <span id="estado-civil-erro-1" class="mensagem-margin"></span>
                </div>
            </div>

            <div class="four wide field" id="telefone_responsavel_div">
                <label for="txtTelefone_1">Telefone</label>
                <input type="text" id="txtTelefone_1" name="txtTelefone_1" placeholder="(19) 99999-9999" onblur=" validarTelefoneResponsavel1()">
                <div id="mensagem-erro-telefone-1" class="ui hidden message error">
                    <span id="telefone-erro-1"></span>
                </div>
            </div>

            <div class="eight wide field" id="email_responsavel_div">
                <label for="txtEmail_1">Email</label>
                <input type="email" id="txtEmail_1" name="txtEmail_1" placeholder="exemplo@email.com" onblur="validarEmailResponsavel1()">
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
                <input type="text" id="txtHorarioTrabalho_1" name="txtHorarioTrabalho_1" placeholder="8h">
            </div>

            <div class="four wide field" id="salario_responsavel_div">
                <label for="txtSalario_1">Salário do responsável</label>
                <input type="text" id="txtSalario_1" name="txtSalario_1" placeholder="R$1500,00..." onblur="validarSalarioResponsavel1()">
                <div id="mensagem-erro-salario-1" class="ui hidden message error">
                    <span id="salario-erro-1"></span>
                </div>
            </div>

            <div class="four wide field" id="renda_extra_responsavel_div">
                <label for="toggleRendaExtra_1">Possui Renda Extra?</label>
                <div class="ui toggle checkbox">
                    <input type="checkbox" id="toggleRendaExtra_1" name="toggleRendaExtra_1" onchange="validarRendaExtra()">
                    <label></label>
                </div>
            </div>
            <div class="four wide field oculto" id="renda_extra_div">
                <label for="txtRendaEnxtra">Valor da renda extra</label>
                <input type="text" id="txtRendaExtra" name="txtRendaExtra" onblur="validarRendaExtra()">
                <div id="mensagem-erro-renda-extra-1" class="ui hidden message error">
                    <span id="renda-extra-erro-1"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="ui divider"></div>

    <div class="responsavel_2 oculto" id="responsavel_2">
        <h2>Responsavel 2</h2>
        <div class="fields">

            <div class="four wide field" id="tipo_responsavel_2_div">
                <label for="txtTipoResponsavel_2">Tipo do responsável</label>
                <select class="ui search dropdown" id="txtTipoResponsavel_2" name="txtTipoResponsavel_2" onchange="validarTipoResponsavel2()">
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
                <div id="mensagem_erro_tipo_responsavel_2" class="ui hidden message error">
                    <span id="tipo_responsavel_erro_2"></span>
                </div>
            </div>

            <div class="eight wide field" id="nome_responsavel_div_2">
                <label for="txtNomeResponsavel_2">Nome do Responsável</label>
                <input type="text" id="txtNomeResponsavel_2" name="txtNomeResponsavel_2" placeholder="" onblur="validarNomeResponsavel2()">
                <div id="mensagem-erro-nome-responsavel-2" class="ui hidden message error">
                    <span id="nome-responsavel-erro-2"></span>
                </div>
            </div>

            <div class="four wide field" id="data_nascimento_responsavel_2_div">
                <label>Data Nascimento</label>
                <div class="ui calendar" id="dataNascimentoCalendar_2">
                    <div class="ui input">
                        <!-- CAMPO VISÍVEL: SEM o atributo 'name'. Apenas exibe a data formatada. -->
                        <input type="text" id="txtDataNascimento_2" placeholder="dd/mm/aaaa" onblur="validarDataNascimentoResponsavel2()">
                    </div>
                </div>
                <!-- NOVO CAMPO OCULTO: ESTE CAMPO SERÁ ENVIADO COM O FORMATO YYYY-MM-DD PELO JAVASCRIPT -->
                <input type="hidden" name="data_nascimento_2" id="hiddenDataNascimento_2">
                <div id="mensagem-erro-data-responsavel-2" class="ui hidden message error">
                    <span id="data-responsavel-erro-2"></span>
                </div>
            </div>
        </div>

        <div class="fields">

            <div class="four wide field" id="estado_civil_responsavel_2_div">
                <label for="txtEstadoCivil_2">Estado Civil</label>
                <select class="ui search dropdown" id="txtEstadoCivil_2" name="txtEstadoCivil_2" onchange="validarEstadoCivilResponsavel2()">
                    <option value="" disabled selected hidden>Selecione o estado civil</option>
                    <option value="Solteiro">Solteiro</option>
                    <option value="Casado">Casado</option>
                    <option value="Divorciado">Divorciado</option>
                    <option value="Viuvo">Viúvo</option>
                </select>
                <div id="mensagem-erro-estado-civil-2" class="ui hidden message error">
                    <span id="estado-civil-erro-2"></span>
                </div>
            </div>

            <div class="four wide field" id="telefone_responsavel_2_div">
                <label for="txtTelefone_2">Telefone</label>
                <input type="text" id="txtTelefone_2" name="txtTelefone_2" placeholder="(19) 99999-9999" onblur="validarTelefoneResponsavel2()">
                <div id="mensagem-erro-telefone-2" class="ui hidden message error">
                    <span id="telefone-erro-2"></span>
                </div>
            </div>

            <div class="eight wide field" id="email_responsavel_2_div">
                <label for="txtEmail_2">Email</label>
                <input type="email" id="txtEmail_2" name="txtEmail_2" placeholder="exemplo@email.com" onblur="validarEmailResponsavel2()">
                <div id="mensagem-erro-email-2" class="ui hidden message error">
                    <span id="email-erro-2"></span>
                </div>
            </div>
        </div>

        <div class="fields">
            <div class="eight wide field" id="empresa_responsavel_div">
                <label for="txtNomeEmpresa_2">Nome da Empresa</label>
                <input type="text" id="txtNomeEmpresa_2" name="txtNomeEmpresa_2" placeholder="Empresa...">
            </div>

            <div class="four wide field" id="profissao_responsavel_div">
                <label for="txtProfissao_2">Profissão</label>
                <input type="text" id="txtProfissao_2" name="txtProfissao_2" placeholder="Arquiteto, Advogado...">
            </div>

            <div class="four wide field" id="telefone_trabalho_responsavel_div">
                <label for="txtTelefoneTrabalho_2">Telefone do Trabalho</label>
                <input type="text" id="txtTelefoneTrabalho_2" name="txtTelefoneTrabalho_2" placeholder="(19) 99999-9999">
            </div>
        </div>

        <div class="fields">
            <div class="four wide field" id="horario_trabalho_responsavel_div">
                <label for="txtHorarioTrabalho_2">Horário de Trabalho</label>
                <input type="text" id="txtHorarioTrabalho_2" name="txtHorarioTrabalho_2" placeholder="8h">
            </div>

            <div class="four wide field" id="salario_responsavel_2_div">
                <label for="txtSalario_2">Salário do responsável</label>
                <input type="text" id="txtSalario_2" name="txtSalario_2" placeholder="R$1500,00..." onblur="validarSalarioResponsavel2()">
                <div id="mensagem-erro-salario-2" class="ui hidden message error">
                    <span id="salario-erro-2"></span>
                </div>
            </div>

            <div class="four wide field" id="renda_extra_responsavel_div">
                <label for="toggleRendaExtra_2">Possui Renda Extra?</label>
                <div class="ui toggle checkbox">
                    <input type="checkbox" id="toggleRendaExtra_2" name="toggleRendaExtra_2" onchange="validarRendaExtraResponsavel2()">
                    <label></label>
                </div>
            </div>
            <div class="four wide field oculto" id="renda_extra_div_2">
                <label for="txtRendaExtra_2">Valor da renda extra</label>
                <input type="text" id="txtRendaExtra_2" name="txtRendaExtra_2" onblur="validarRendaExtraResponsavel2()">
                <div id="mensagem-erro-renda-extra-2" class="ui hidden message error">
                    <span id="renda-extra-erro-2"></span>
                </div>
            </div>
        </div>
    </div>


    <div class="fields">
        <div class="sixteen wide field" id="divBotaoResponsavel">
            <div class="right floated column">
                <button class="ui blue button right floated" id="btnAdicionarResponsavel" type="button" onclick="adicionarResponsavel()">
                    <i class="plus circle icon"></i> Adicionar Responsável
                </button>
            </div>
        </div>
    </div>
    <div class="fields">
        <div class="sixteen wide field oculto" id="divBotaoRemoverResponsavel">
            <div class="right floated column">
                <button class="ui red button right floated" id="btnRemoverResponsavel" type="button" onclick="removerResponsavel()">
                    <i class="trash alternate outline icon"></i> Remover Responsavel
                </button>
            </div>
        </div>
    </div>
</section>

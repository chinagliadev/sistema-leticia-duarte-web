<?php
include './template/modal-remover-responsavel.php'
?>
<button id="btn-menu" class="ui icon button">
    <i class="sidebar icon"></i>
</button>
<section class="sessao_cadastro ui segment blue">
    <div class="responsavel" id="responsavel-1">
        <div class="fields">
            <div class="four wide field">
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
            </div>
            <div class="eight wide field">
                <label for="txtNomeResponsavel_1">Nome do Responsável</label>
                <input type="text" id="txtNomeResponsavel_1" name="txtNomeResponsavel_1" placeholder="">
            </div>
            <div class="four wide field">
                <label>Data Nascimento</label>
                <div class="ui calendar" id="dataNascimentoCalendar_1">
                    <div class="ui input">
                        <input type="text" id="txtDataNascimento_1" name="txtDataNascimento_1" placeholder="dd/mm/aaaa">
                    </div>
                </div>
            </div>
        </div>

        <div class="fields">
            <div class="four wide field">
                <label for="txtEstadoCivil_1">Estado Civil</label>
                <select class="ui search dropdown" id="txtEstadoCivil_1" name="txtEstadoCivil_1">
                    <option value="" disabled selected hidden>Selecione o estado civil</option>
                    <option value="Solteiro">Solteiro</option>
                    <option value="Casado">Casado</option>
                    <option value="Divorciado">Divorciado</option>
                    <option value="Viuvo">Viúvo</option>
                </select>
            </div>
            <div class="four wide field">
                <label for="txtTelefone_1">Telefone</label>
                <input type="text" id="txtTelefone_1" name="txtTelefone_1" placeholder="(19) 99999-9999">
            </div>
            <div class="eight wide field">
                <label for="txtEmail_1">Email</label>
                <input type="email" id="txtEmail_1" name="txtEmail_1" placeholder="exemplo@email.com">
            </div>
        </div>

        <div class="fields">
            <div class="eight wide field">
                <label for="txtNomeEmpresa_1">Nome da Empresa</label>
                <input type="text" id="txtNomeEmpresa_1" name="txtNomeEmpresa_1" placeholder="Empresa...">
            </div>
            <div class="four wide field">
                <label for="txtProfissao_1">Profissão</label>
                <input type="text" id="txtProfissao_1" name="txtProfissao_1" placeholder="Arquiteto, Advogado...">
            </div>
            <div class="four wide field">
                <label for="txtTelefoneTrabalho_1">Telefone do Trabalho</label>
                <input type="text" id="txtTelefoneTrabalho_1" name="txtTelefoneTrabalho_1" placeholder="(19) 99999-9999">
            </div>
        </div>

        <div class="fields">
            <div class="four wide field">
                <label for="txtHorarioTrabalho_1">Horário de Trabalho</label>
                <input type="text" id="txtHorarioTrabalho_1" name="txtHorarioTrabalho_1" placeholder="8h às 18h...">
            </div>
            <div class="four wide field">
                <label for="txtSalario_1">Salário do responsável</label>
                <input type="number" id="txtSalario_1" name="txtSalario_1" placeholder="R$1500,00...">
            </div>
            <div class="eight wide field">
                <label for="toggleRendaExtra_1">Possui Renda Extra?</label>
                <div class="ui toggle checkbox">
                    <input type="checkbox" id="toggleRendaExtra_1" name="toggleRendaExtra_1">
                    <label></label>
                </div>
            </div>
        </div>
    </div>
    <div class="ui divider"></div>

    <div class="responsavel" id="responsavel-2" style="display: none;">
        <div class="fields">
            <div class="four wide field">
                <label for="txtTipoResponsavel_2">Tipo do responsável</label>
                <select class="ui search dropdown" id="txtTipoResponsavel_2" name="txtTipoResponsavel_2">
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
            </div>
            <div class="eight wide field">
                <label for="txtNomeResponsavel_2">Nome do Responsável</label>
                <input type="text" id="txtNomeResponsavel_2" name="txtNomeResponsavel_2" placeholder="">
            </div>
            <div class="four wide field">
                <label>Data Nascimento</label>
                <div class="ui calendar" id="dataNascimentoCalendar_2">
                    <div class="ui input">
                        <input type="text" id="txtDataNascimento_2" name="txtDataNascimento_2" placeholder="dd/mm/aaaa">
                    </div>
                </div>
            </div>
        </div>

        <div class="fields">
            <div class="four wide field">
                <label for="txtEstadoCivil_2">Estado Civil</label>
                <select class="ui search dropdown" id="txtEstadoCivil_2" name="txtEstadoCivil_2">
                    <option value="" disabled selected hidden>Selecione o estado civil</option>
                    <option value="Solteiro">Solteiro</option>
                    <option value="Casado">Casado</option>
                    <option value="Divorciado">Divorciado</option>
                    <option value="Viuvo">Viúvo</option>
                </select>
            </div>
            <div class="four wide field">
                <label for="txtTelefone_2">Telefone</label>
                <input type="text" id="txtTelefone_2" name="txtTelefone_2" placeholder="(19) 99999-9999">
            </div>
            <div class="eight wide field">
                <label for="txtEmail_2">Email</label>
                <input type="email" id="txtEmail_2" name="txtEmail_2" placeholder="exemplo@email.com">
            </div>
        </div>

        <div class="fields">
            <div class="eight wide field">
                <label for="txtNomeEmpresa_2">Nome da Empresa</label>
                <input type="text" id="txtNomeEmpresa_2" name="txtNomeEmpresa_2" placeholder="Empresa...">
            </div>
            <div class="four wide field">
                <label for="txtProfissao_2">Profissão</label>
                <input type="text" id="txtProfissao_2" name="txtProfissao_2" placeholder="Arquiteto, Advogado...">
            </div>
            <div class="four wide field">
                <label for="txtTelefoneTrabalho_2">Telefone do Trabalho</label>
                <input type="text" id="txtTelefoneTrabalho_2" name="txtTelefoneTrabalho_2" placeholder="(19) 99999-9999">
            </div>
        </div>

        <div class="fields">
            <div class="four wide field">
                <label for="txtHorarioTrabalho_2">Horário de Trabalho</label>
                <input type="text" id="txtHorarioTrabalho_2" name="txtHorarioTrabalho_2" placeholder="8h às 18h...">
            </div>
            <div class="four wide field">
                <label for="txtSalario_2">Salário do responsável</label>
                <input type="number" id="txtSalario_2" name="txtSalario_2" placeholder="R$1500,00...">
            </div>
            <div class="eight wide field">
                <label for="toggleRendaExtra_2">Possui Renda Extra?</label>
                <div class="ui toggle checkbox">
                    <input type="checkbox" id="toggleRendaExtra_2" name="toggleRendaExtra_2">
                    <label></label>
                </div>
            </div>
        </div>

        <div class="fields" style="margin-top: 10px;">
            <div class="sixteen wide field">
                <div class="right floated column">
                    <button type="button" id="btnRemoverResponsavel" class="ui red button right floated">
                        <i class="trash icon"></i> Remover Responsável
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="ui error message"></div>

    <div class="ui grid">
        <div class="four column row">
            <div class="left floated column">
                <a href="./cadastros.php" class="ui basic blue icon button" style="margin-top: 10px;">
                    <i class="angle left icon"></i> Voltar
                </a>
            </div>
            <div class="right floated column">
                <button type="submit" class="ui basic blue icon button right floated">
                    <i class="angle right icon"></i> Próximo
                </button>
            </div>
        </div>
    </div>

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
<script src="./js/validarCadastroResponsavel.js"></script>
 <script src="./js/adicionarResponsavel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
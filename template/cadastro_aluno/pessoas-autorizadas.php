<?php
include './template/modal-remover-autorizada.php';
include './template/modal-salvar-dados.php';
?>
<section class="sessao_cadastro ui segment blue">
        <div class="pessoaAutorizada" id="autorizada-1">
            <div class="fields">
                <div class="eight wide field">
                    <label for="txtNomePessoaAutorizada">Nome</label>
                    <input type="text" id="txtNomePessoaAutorizada" placeholder="">
                </div>
                <div class="four wide field">
                    <label for="txtCpfAutorizada">CPF</label>
                    <input type="text" id="txtCpfAutorizada" placeholder="">
                </div>
                <div class="four wide field">
                    <label for="txtTelefoneAutorizada">Telefone</label>
                    <input type="text" id="txtTelefoneAutorizada" placeholder="">
                </div>
            </div>

            <div class="fields">
                <div class="four wide field">
                    <label for="txtParentenco">Parentesco</label>
                    <select class="ui search dropdown" name="txtParentenco" required>
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
                    <select class="ui search dropdown" name="txtParentenco2" required>
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
                            <i class="trash icon"></i> Remover Responsável
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


        <div class="ui grid">
            <div class="four column row">
                <div class="left floated column">
                    <a href="./cadastros.php" class="ui basic blue icon button" style="margin-top: 10px;">
                        <i class="angle left icon"></i> Voltar
                    </a>
                </div>
                <div class="right floated column">
                    <a href="" class="ui basic blue icon button right floated column" id="btnAbrirModal" style="margin-top: 10px;">
                        <i class="angle right icon"></i> Salvar Cadastro
                    </a>
                </div>
            </div>
        </div>

    </form>
</section>

<script src="./js/adicionarAutorizada.js"></script>
<script>
    $(document).ready(function() {
        $('#btnAbrirModal').on('click', function(e) {
            e.preventDefault(); // evita ação padrão

            $('#modalSalvar').modal({
                centered: true,
                closable: false,
                onApprove: function() {
                    $('#autorizadaFormulario').submit(); // envia pro PHP
                },
                onDeny: function() {
                    console.log('Usuário cancelou.');
                }
            }).modal('show');
        });
    });
</script>
    <!-- Nome, nascimento e raça -->
    <section class="ui segment blue raised ">
        <div class="fields">
            <div class="seven wide field" id="validacao-nome">
                <label for="txtNomeCrianca">Nome da Criança</label>
                <input type="text" id="txtNomeCrianca" name="txtNomeCrianca" placeholder="Digite o nome da criança"
                    onblur="validarCadastroAluno()">
            </div>
            <div class="three wide field">
                <label for="txtTurma">Turma</label>
                <div class="ui selection dropdown" id="divTurma">
                    <input type="hidden" name="turma" id="txtTurma" onchange="validarCadastroAluno()">
                    <i class="dropdown icon"></i>
                    <div class="default text">Selecione a turma</div>
                    <div class="menu">
                        <div class="item" data-value="Bercario 2 A">Bercario 2 A</div>
                        <div class="item" data-value="Bercario 2 B">Bercario 2 B</div>
                        <div class="item" data-value="Bercario 2 C">Bercario 2 C</div>
                        <div class="item" data-value="Maternal I A">Maternal I A</div>
                        <div class="item" data-value="Maternal I B">Maternal I B</div>
                        <div class="item" data-value="Maternal I C">Maternal I C</div>
                        <div class="item" data-value="Maternal II A">Maternal II A</div>
                        <div class="item" data-value="Maternal II B">Maternal II B</div>
                        <div class="item" data-value="Multisseriada M.M">Multisseriada M.M</div>
                        <div class="item" data-value="Multisseriada B.M">Multisseriada B.M</div>
                    </div>
                </div>
            </div>
            <div class="three wide field">
                <label for="txtDataNascimento">Data Nascimento</label>
                <div class="ui calendar" id="dataNascimentoCalendar">
                    <div class="ui input">
                        <input id="txtDataNascimento" name="txtDataNascimento" type="date" placeholder="dd/mm/aaaa">
                    </div>
                </div>
            </div>
            <div class="three wide field">
                <label for="txtRaca">Cor / Raça</label>
                <select class="ui search dropdown" id="txtRaca" name="corRaca">
                    <option value="" disabled selected hidden>Selecione Cor / Raça</option>
                    <option value="branca">Branca</option>
                    <option value="preta">Preta</option>
                    <option value="parda">Parda</option>
                    <option value="amarela">Amarela</option>
                    <option value="indigena">Indígena</option>
                    <option value="outra">Outra</option>
                </select>
            </div>
        </div>
        <div class="fields">
            <div class="three wide field">
                <label for="txtCep">CEP</label>
                <input type="text" id="txtCep" name="txtCep" placeholder="00000-000">
                <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" target="_blank">Não sei o meu cep</a>
            </div>
            <div class="ten wide field">
                <label for="txtEndereco">Endereço</label>
                <input type="text" id="txtEndereco" name="txtEndereco" placeholder="Rua, Avenida...">
            </div>
            <div class="three wide field">
                <label for="txtNumero">Número</label>
                <input type="text" id="txtNumero" name="txtNumero" placeholder="Nº">
            </div>
        </div>

        <div class="fields">
            <div class="ten wide field">
                <label for="txtBairro">Bairro</label>
                <input type="text" id="txtBairro" name="txtBairro" placeholder="Bairro...">
            </div>
            <div class="three wide field">
                <label for="txtCidade">Cidade</label>
                <input type="text" id="txtCidade" name="txtCidade" placeholder="Americana...">
            </div>
            <div class="three wide field">
                <label for="txtComplemento">Complemento</label>
                <input type="text" id="txtComplemento" name="txtComplemento" placeholder="Escola, apartamento...">
            </div>
        </div>

        <div class="fields">
            <div class="ten wide field">
                <label>Em caso de febre autoriza medicar a criança?</label>
                <div class="ui toggle checkbox">
                    <input type="checkbox" id="autorizacaoMed" name="autorizacaoMed">
                    <label></label>
                </div>
            </div>

            <div class="three wide field oculto" id="fieldGotas">
                <label for="txtGotas">Quantas gotas</label>
                <input type="number" id="txtGotas" name="txtGotas" placeholder="1, 2, 3...">
            </div>
            <div class="three wide field oculto" id="fieldRemedio">
                <label for="txtRemedio">Qual remédio</label>
                <input type="text" id="txtRemedio" name="txtRemedio" placeholder="">
            </div>
        </div>

        <div class="fields">
            <div class="ten wide field">
                <label>Autorizo a divulgação de imagem do meu filho(a) para uso de projetos na escola, fotos, filmagem, Facebook, Instagram e site.</label>
                <div class="ui toggle checkbox">
                    <input type="checkbox" name="autorizacaoImagem">
                    <label></label>
                </div>
            </div>
        </div>
        <div class="ui error message" id="mensagem-erro-aluno">
            <div class="header">
                Erros do cadastro
            </div>
            <ul id="lista-erros-aluno"></ul>
        </div>
        <div class="ui success message" id="mensagem-sucesso-aluno">
            <div class="header">Cadastro aluno completado com sucesso</div>
            <p>You're all signed up for the newsletter.</p>
        </div>
    </section>
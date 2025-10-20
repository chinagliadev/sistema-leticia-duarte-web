<section class="ui segment blue raised">
    <div class="fields">
        <div class="seven wide field" id="validacao-nome">
            <label for="txtNomeCrianca">Nome da Criança</label>
            <input type="text" id="txtNomeCrianca" name="txtNomeCrianca" placeholder="Digite o nome da criança" onblur="validarCampoNomeAluno()">
            <div class="ui hidden negative message" id="mensagem-erro-aluno">
                <div class="content">
                    <i class="user icon"></i><span id="nome-erro"></span>
                </div>
            </div>
        </div>

        <div class="three wide field" id="validacao-turma">
            <label for="txtTurma">Turma</label>
            <div class="ui selection dropdown" id="divTurma">
                <input type="hidden" name="turma" id="txtTurma" onchange="validarTurma()">
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
            <div class="ui hidden negative message" id="mensagem-erro-turma" style="margin-top:15px">
                <div class="content">
                    <i class="user icon"></i><span id="turma-erro"></span>
                </div>
            </div>
        </div>

        <div class="three wide field" id="validacao-data-nascimento">
            <label for="txtDataNascimento">Data Nascimento</label>
            <div class="ui calendar" id="dataNascimentoCalendar">
                <div class="ui input">
                    <input id="txtDataNascimento" name="txtDataNascimento" type="text" placeholder="dd/mm/aaaa" onblur="validarDataNascimento()">
                </div>
            </div>

            <input type="hidden" name="data_nascimento" id="data_nascimento">

            <div class="ui hidden negative message" id="mensagem-erro-data-nascimento">
                <div class="content">
                    <i class="calendar icon"></i>
                    <span id="data-nascimento-erro"></span>
                </div>
            </div>
        </div>

        <div class="three wide field" id="divRaca">
            <label for="txtRaca">Cor / Raça</label>
            <select class="ui search dropdown" id="txtRaca" name="corRaca" onchange="validarRaca()">
                <option value="" disabled selected hidden>Selecione Cor / Raça</option>
                <option value="branca">Branca</option>
                <option value="preta">Preta</option>
                <option value="parda">Parda</option>
                <option value="amarela">Amarela</option>
                <option value="indigena">Indígena</option>
                <option value="outra">Outra</option>
            </select>
            <div class="ui hidden negative message" id="mensagem-erro-raca" style="margin-top:15px">
                <div class="content">
                    <i class="user icon"></i>
                    <span id="raca-erro"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- CEP e endereço -->
    <div class="fields">
        <div class="three wide field" id="validacao-cep">
            <label for="txtCep">CEP</label>
            <input type="text" id="txtCep" name="txtCep" placeholder="00000-000" onblur="validarCep()">
            <div class="ui hidden negative message" id="mensagem-erro-cep">
                <div class="content">
                    <i class="map marker alternate icon"></i><span id="cep-erro"></span>
                </div>
            </div>
            <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" target="_blank">Não sei o meu cep</a>
        </div>

        <div class="ten wide field" id="validacao-endereco">
            <label for="txtEndereco">Endereço</label>
            <input type="text" id="txtEndereco" name="txtEndereco" placeholder="Rua, Avenida..." onblur="validarEndereco()">
            <div class="ui hidden negative message" id="mensagem-erro-endereco">
                <div class="content">
                    <i class="home icon"></i><span id="endereco-erro"></span>
                </div>
            </div>
        </div>

        <div class="three wide field" id="validacao-numero">
            <label for="txtNumero">Número</label>
            <input type="number" id="txtNumero" name="txtNumero" placeholder="Nº" onblur="validarNumero()">
            <div class="ui hidden negative message" id="mensagem-erro-numero">
                <div class="content">
                    <i class="hashtag icon"></i><span id="numero-erro"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Bairro e cidade -->
    <div class="fields">
        <div class="ten wide field" id="validacao-bairro">
            <label for="txtBairro">Bairro</label>
            <input type="text" id="txtBairro" name="txtBairro" placeholder="Bairro..." onblur="validarBairro()">
            <div class="ui hidden negative message" id="mensagem-erro-bairro">
                <div class="content">
                    <i class="building outline icon"></i><span id="bairro-erro"></span>
                </div>
            </div>
        </div>

        <div class="three wide field" id="validacao-cidade">
            <label for="txtCidade">Cidade</label>
            <input type="text" id="txtCidade" name="txtCidade" placeholder="Americana..." onblur="validarCidade()">
            <div class="ui hidden negative message" id="mensagem-erro-cidade">
                <div class="content">
                    <i class="map outline icon"></i><span id="cidade-erro"></span>
                </div>
            </div>
        </div>

        <div class="three wide field">
            <label for="txtComplemento">Complemento</label>
            <input type="text" id="txtComplemento" name="txtComplemento" placeholder="Escola, apartamento...">
        </div>
    </div>

    <!-- Autorizações médicas -->
    <div class="fields">
        <div class="ten wide field">
            <label>Em caso de febre autoriza medicar a criança?</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" id="autorizacaoMed" name="autorizacaoMed" onchange="validarCampoGotas();validarRemedio()">
                <label></label>
            </div>
        </div>

        <div class="three wide field oculto" id="camposGotas">
            <label for="txtGotas">Quantas gotas</label>
            <input type="number" id="txtGotas" name="txtGotas" placeholder="1, 2, 3..." onblur="validarCampoGotas()">
            <div class="ui hidden negative message" id="mensagem-erro-gotas">
                <div class="content">
                    <i class=""></i><span id="gotas-erro"></span>
                </div>
            </div>
        </div>

        <div class="three wide field oculto" id="fieldRemedio">
            <label for="txtRemedio">Qual remédio</label>
            <input type="text" id="txtRemedio" name="txtRemedio" placeholder="" onblur="validarRemedio()">
            <div class="ui hidden negative message" id="mensagem-erro-remedio">
                <div class="content">
                    <i class=""></i><span id="remedio-erro"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Autorização de imagem -->
    <div class="fields">
        <div class="ten wide field">
            <label>Autorizo a divulgação de imagem do meu filho(a) para uso de projetos na escola, fotos, filmagem, Facebook, Instagram e site.</label>
            <div class="ui toggle checkbox">
                <input type="checkbox" name="autorizacaoImagem">
                <label></label>
            </div>
        </div>
    </div>

    <!-- Mensagens gerais -->
    <div class="ui error message" id="mensagem-erro-aluno">
        <div class="header">
            <i class="exclamation triangle icon"></i>
            Erros do cadastro
        </div>
        <ul id="lista-erros-aluno"></ul>
    </div>

    <div class="ui success message" id="mensagem-sucesso-aluno">
        <div class="header">
            <i class="check circle icon"></i>
            Cadastro do aluno completado com sucesso
        </div>
        <p>O cadastro foi realizado corretamente.</p>
    </div>
</section>
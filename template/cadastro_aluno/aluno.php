<section class="ui segment blue raised">
    <div class="fields">
        <div class="three wide field" id="validacao-ra">
            <label for="txtRaAluno">RA da Criança</label>
            <input type="text" id="txtRaAluno" name="txtRaAluno" placeholder="Digite o RA da criança" onblur="validarRa()"
                value="<?= $aluno['ra_aluno'] ?? '' ?>">
            <div class="ui hidden negative message" id="mensagem-erro-ra">
                <div class="content">
                    <i class="user icon"></i><span id="ra-erro"></span>
                </div>
            </div>
        </div>

        <div class="five wide field" id="validacao-nome">
            <label for="txtNomeCrianca">Nome da Criança</label>
            <input type="text" id="txtNomeCrianca" name="txtNomeCrianca" placeholder="Digite o nome da criança" onblur="validarCampoNomeAluno()"
                value="<?= $aluno['nome'] ?? '' ?>">
            <div class="ui hidden negative message" id="mensagem-erro-aluno">
                <div class="content">
                    <i class="user icon"></i><span id="nome-erro"></span>
                </div>
            </div>
        </div>

        <div class="three wide field" id="div_cpf_aluno">
            <label for="txtCpfAluno">CPF</label>
            <input type="text" id="txtCpfAluno" name="txtCpfAluno" placeholder="xxx.xxx.xxx-xx" onblur="validarCpfAluno()"
                value="<?= $aluno['cpf'] ?? '' ?>">
            <div class="ui hidden negative message" id="mensagem-erro-cpf-aluno">
                <div class="content">
                    <i class="exclamation triangle icon"></i><span id="cpf-aluno-erro"></span>
                </div>
            </div>
        </div>

        <div class="three wide field" id="div_rg_aluno">
            <label for="txtRgAluno">RG</label>
            <input type="text" id="txtRgAluno" name="txtRgAluno" placeholder="xx.xxx.xxx-x" onblur="validarCpfAluno()"
                value="<?= $aluno['rg'] ?? '' ?>">
            <div class="ui hidden negative message" id="mensagem-erro-rg-aluno">
                <div class="content">
                    <i class="exclamation triangle icon"></i><span id="rg-aluno-erro"></span>
                </div>
            </div>
        </div>

        <div class="three wide field" id="validacao-turma">
            <label for="txtTurma">Turma</label>
            <div class="ui selection dropdown" id="divTurma">
                <input type="hidden" name="turma" id="txtTurma" onchange="validarTurma()" value="<?= $aluno['turma'] ?? '' ?>">
                <i class="dropdown icon"></i>
                <div class="default text">Selecione uma turma</div>
                <div class="menu">
                    <?php
                    $turmas = ["Bercario 2 A", "Bercario 2 B", "Bercario 2 C", "Maternal I A", "Maternal I B", "Maternal I C", "Maternal II A", "Maternal II B", "Multisseriada M.M", "Multisseriada B.M"];
                    foreach ($turmas as $turma) {
                        $selected = ($aluno['turma'] ?? '') === $turma ? 'selected' : '';
                        echo "<div class='item' data-value='$turma' $selected>$turma</div>";
                    }
                    ?>
                </div>
            </div>
            <div class="ui hidden negative message" id="mensagem-erro-turma" style="margin-top:15px">
                <div class="content">
                    <i class="user icon"></i><span id="turma-erro"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="fields">
         <div class="three wide field" id="validacao-data-nascimento">
            <label for="txtDataNascimento">Data Nascimento</label>
                <div class="ui input">
                    <input id="txtDataNascimento" name="txtDataNascimento" type="date" placeholder="dd/mm/aaaa"
                        value="<?= $aluno['data_nascimento'] ?>">
                </div>
            <input type="hidden" name="data_nascimento" id="data_nascimento" value="<?= $aluno['data_nascimento'] ?? '' ?>">
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
                <option value="">Selecione Cor/Raça</option>
                <?php
                $opcoesRaca = ["branca", "preta", "parda", "amarela", "indigena", "não declarada", "outra"];
                echo "$opcoesRaca";
                foreach ($opcoesRaca as $raca) {
                    $selected = ($aluno['etnia'] ?? '') === $raca ? 'selected' : '';
                    echo "<option value='$raca' $selected>$raca</option>";
                }
                ?>
            </select>
            <div class="ui hidden negative message" id="mensagem-erro-raca" style="margin-top:15px">
                <div class="content">
                    <i class="user icon"></i>
                    <span id="raca-erro"></span>
                </div>
            </div>
        </div>

        <div class="three wide field" id="validacao-cep">
            <label for="txtCep">CEP</label>
            <input type="text" id="txtCep" name="txtCep" placeholder="00000-000" onblur="validarCep()" value="<?= $endereco['cep'] ?? '' ?>">
            <div class="ui hidden negative message" id="mensagem-erro-cep">
                <div class="content">
                    <i class="map marker alternate icon"></i><span id="cep-erro"></span>
                </div>
            </div>
            <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" target="_blank">Não sei o meu cep</a>
        </div>

        <div class="four wide field" id="validacao-endereco">
            <label for="txtEndereco">Endereço</label>
            <input type="text" id="txtEndereco" name="txtEndereco" placeholder="Rua, Avenida..." onblur="validarEndereco()" value="<?= $endereco['endereco'] ?? '' ?>">
            <div class="ui hidden negative message" id="mensagem-erro-endereco">
                <div class="content">
                    <i class="home icon"></i><span id="endereco-erro"></span>
                </div>
            </div>
        </div>

        <div class="three wide field" id="validacao-numero">
            <label for="txtNumero">Número</label>
            <input type="number" id="txtNumero" name="txtNumero" placeholder="Nº" onblur="validarNumero()" value="<?= $endereco['numero'] ?? '' ?>">
            <div class="ui hidden negative message" id="mensagem-erro-numero">
                <div class="content">
                    <i class="hashtag icon"></i><span id="numero-erro"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="fields">
        <div class="ten wide field" id="validacao-bairro">
            <label for="txtBairro">Bairro</label>
            <input type="text" id="txtBairro" name="txtBairro" placeholder="Bairro..." onblur="validarBairro()" value="<?= $endereco['bairro'] ?? '' ?>">
            <div class="ui hidden negative message" id="mensagem-erro-bairro">
                <div class="content">
                    <i class="building outline icon"></i><span id="bairro-erro"></span>
                </div>
            </div>
        </div>

        <div class="three wide field" id="validacao-cidade">
            <label for="txtCidade">Cidade</label>
            <input type="text" id="txtCidade" name="txtCidade" placeholder="Americana..." onblur="validarCidade()" value="<?= $endereco['cidade'] ?? '' ?>">
            <div class="ui hidden negative message" id="mensagem-erro-cidade">
                <div class="content">
                    <i class="map outline icon"></i><span id="cidade-erro"></span>
                </div>
            </div>
        </div>

        <div class="three wide field">
            <label for="txtComplemento">Complemento</label>
            <input type="text" id="txtComplemento" name="txtComplemento" placeholder="Escola, apartamento..." value="<?= $endereco['complemento'] ?? '' ?>">
        </div>
    </div>

    <div class="fields">
        <div class="ten wide field">
            <label>Em caso de febre autoriza medicar a criança?</label>
            <div class="ui toggle checkbox">
                <input
                    type="checkbox"
                    id="autorizacaoMed"
                    name="autorizacaoMed"
                    onchange="validarCampoGotas(); validarRemedio()"
                    <?= !empty($aluno['autorizacao_febre']) && $aluno['autorizacao_febre'] == 1 ? 'checked' : '' ?>>
                <label></label>
            </div>
        </div>

        <div class="three wide field <?= !empty($aluno['autorizacao_febre']) && $aluno['autorizacao_febre'] == 1 ? '' : 'oculto' ?>" id="camposGotas">
            <label for="txtGotas">Quantas gotas</label>
            <input
                type="number"
                id="txtGotas"
                name="txtGotas"
                placeholder="1, 2, 3..."
                onblur="validarCampoGotas()"
                value="<?= $aluno['gotas'] ?? '' ?>">
            <div class="ui hidden negative message" id="mensagem-erro-gotas">
                <div class="content">
                    <span id="gotas-erro"></span>
                </div>
            </div>
        </div>

        <div class="three wide field <?= !empty($aluno['autorizacao_febre']) && $aluno['autorizacao_febre'] == 1 ? '' : 'oculto' ?>" id="fieldRemedio">
            <label for="txtRemedio">Qual remédio</label>
            <input
                type="text"
                id="txtRemedio"
                name="txtRemedio"
                placeholder=""
                onblur="validarRemedio()"
                value="<?= $aluno['remedio'] ?? '' ?>">
            <div class="ui hidden negative message" id="mensagem-erro-remedio">
                <div class="content">
                    <span id="remedio-erro"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="fields">
        <div class="ten wide field">
            <label>
                Autorizo a divulgação de imagem do meu filho(a) para uso de projetos na escola,
                fotos, filmagem, Facebook, Instagram e site.
            </label>
            <div class="ui toggle checkbox">
                <input
                    type="checkbox"
                    id="permissaoFoto"
                    name="permissaoFoto"
                    <?= !empty($aluno['permissao_foto']) && $aluno['permissao_foto'] == 1 ? 'checked' : '' ?>>
                <label for="permissaoFoto"></label>
            </div>
        </div>
    </div>

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
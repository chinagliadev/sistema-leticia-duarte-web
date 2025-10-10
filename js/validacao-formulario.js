function mensagemErroCampos(div, input, span, mensagem) {
    
    div.classList.remove('hidden');
    div.classList.add('visible', 'error');

    input.classList.add('ui', 'error');
    span.textContent = mensagem;
}

function limparErro(div, input, span) {
    div.classList.remove('visible', 'error');
    div.classList.add('hidden');
    input.classList.remove('ui', 'error');
    span.textContent = "";
}


function validarCampoNomeAluno() {
    const nomeAluno = document.getElementById("txtNomeCrianca").value.trim();
    const regexNome = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;

    const divMensagem = document.getElementById('mensagem-erro-aluno');
    const spanMensagem = document.getElementById('nome-erro');
    const inputNome = document.getElementById("validacao-nome");

    limparErro(divMensagem, inputNome, spanMensagem);

    if (nomeAluno === "") {
        mensagemErroCampos(divMensagem, inputNome, spanMensagem, "Informe o nome do aluno");
        return false;
    }

    if (!regexNome.test(nomeAluno)) {
        mensagemErroCampos(divMensagem, inputNome, spanMensagem, "O nome não deve conter números ou símbolos");
        return false;
    }

    if (nomeAluno.split(" ").length < 2) {
        mensagemErroCampos(divMensagem, inputNome, spanMensagem, "Informe o nome completo (nome e sobrenome)");
        return false;
    }

    limparErro(divMensagem, inputNome, spanMensagem);
    return true;
}

function validarEndereco() {
    const divEndereco = document.getElementById('validacao-endereco');
    const mensagemErro = document.getElementById('mensagem-erro-endereco');
    const endereco = document.getElementById('txtEndereco').value;
    const spanErro = document.getElementById('endereco-erro');

    limparErro(mensagemErro, divEndereco, spanErro);
    
    if (endereco.trim() === "") {
        mensagemErroCampos(mensagemErro, divEndereco, spanErro, 'Informe o endereço (rua)');
        return false;
    }

    limparErro(mensagemErro, divEndereco, spanErro);
    return true;
}

function validarNumero() {
    const divNumero = document.getElementById('validacao-numero');
    const mensagemErro = document.getElementById('mensagem-erro-numero');
    const numero = document.getElementById('txtNumero').value;
    const spanNumero = document.getElementById('numero-erro');

    limparErro(mensagemErro, divNumero, spanNumero);

    if (numero.trim() === '') {
        mensagemErroCampos(mensagemErro, divNumero, spanNumero, 'Informe o número');
        return false;
    }
    
    if (isNaN(parseInt(numero))) {
        mensagemErroCampos(mensagemErro, divNumero, spanNumero, 'O número deve ser um valor numérico');
        return false;
    }

    limparErro(mensagemErro, divNumero, spanNumero);
    return true;
}

function validarBairro() {
    const divBairro = document.getElementById('validacao-bairro');
    const mensagemErro = document.getElementById('mensagem-erro-bairro');
    const bairro = document.getElementById('txtBairro').value;
    const spanBairro = document.getElementById('bairro-erro');

    limparErro(mensagemErro, divBairro, spanBairro);

    if (bairro.trim() === '') {
        mensagemErroCampos(mensagemErro, divBairro, spanBairro, 'Informe o bairro do aluno');
        return false;
    }

    limparErro(mensagemErro, divBairro, spanBairro);
    return true;
}

function validarCidade() {
    const divCidade = document.getElementById('validacao-cidade');
    const mensagemErro = document.getElementById('mensagem-erro-cidade');
    const cidade = document.getElementById('txtCidade').value;
    const spanCidade = document.getElementById('cidade-erro');

    limparErro(mensagemErro, divCidade, spanCidade);

    if (cidade.trim() === '') {
        mensagemErroCampos(mensagemErro, divCidade, spanCidade, 'Informe a cidade do aluno');
        return false;
    }

    limparErro(mensagemErro, divCidade, spanCidade);
    return true;
}

function validarRaca() {
    const divRaca = document.getElementById('divRaca');
    const inputRaca = document.getElementById('txtRaca').value; 
    const mensagemErro = document.getElementById('mensagem-erro-raca');
    const spanErro = document.getElementById('raca-erro');

    limparErro(mensagemErro, divRaca, spanErro);

    // CORREÇÃO AQUI: 'inputRaca' JÁ É uma string, não precisa do .value
    if (inputRaca.trim() === '') {
        mensagemErroCampos(mensagemErro, divRaca, spanErro, 'Selecione a raça do aluno');
        return false;
    }

    limparErro(mensagemErro, divRaca, spanErro);
    return true;
}

function validarTurma() {
    const divValidacaoTurma = document.getElementById('validacao-turma');
    const inputTurma = document.getElementById('txtTurma').value;
    const mensagemErro = document.getElementById('mensagem-erro-turma');
    const spanErro = document.getElementById('turma-erro');

    limparErro(mensagemErro, divValidacaoTurma, spanErro);

    if (inputTurma.trim() === '') {
        mensagemErroCampos(mensagemErro, divValidacaoTurma, spanErro, 'Selecione a turma do aluno');
        return false;
    }

    limparErro(mensagemErro, divValidacaoTurma, spanErro);
    return true;
}


async function buscarCep(cep) {
    try {
        if (cep.length !== 8) {
            return false;
        }

        const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);

        if (!response.ok) {
            throw new Error("Erro ao buscar o CEP.");
        }

        const dados = await response.json();
        return dados;

    } catch (error) {
        console.error("Erro na função buscarCep:", error);
        return false;
    }
}

async function validarCep() {
    const divCep = document.getElementById('validacao-cep');
    const mensagemErro = document.getElementById('mensagem-erro-cep');
    const spanCep = document.getElementById('cep-erro');

    let cep = $('#txtCep').val().replace(/\D/g, ''); 

    limparErro(mensagemErro, divCep, spanCep); // Limpa erro antes de começar

    if (cep === '') {
        mensagemErroCampos(mensagemErro, divCep, spanCep, 'Informe o CEP do aluno');
        return false;
    }

    if (!/^\d{8}$/.test(cep)) {
        mensagemErroCampos(mensagemErro, divCep, spanCep, 'CEP inválido. Digite 8 números.');
        return false;
    }


    const dadosCep = await buscarCep(cep);

    if (!dadosCep || dadosCep.erro) {
        mensagemErroCampos(mensagemErro, divCep, spanCep, 'CEP não encontrado.');
        return false;
    }

    document.getElementById('txtEndereco').value = dadosCep.logradouro;
    document.getElementById('txtBairro').value = dadosCep.bairro;
    document.getElementById('txtCidade').value = dadosCep.localidade;

    validarEndereco();
    validarBairro();
    validarCidade(); 

    limparErro(mensagemErro, divCep, spanCep);
    return true
}

function validarDataNascimento() {
    const divData = document.getElementById('validacao-data-nascimento');
    const inputData = document.getElementById('txtDataNascimento').value.trim();
    const mensagemErro = document.getElementById('mensagem-erro-data-nascimento');
    const spanErro = document.getElementById('data-nascimento-erro');

    limparErro(mensagemErro, divData, spanErro);

    if (inputData === '') {
        mensagemErroCampos(mensagemErro, divData, spanErro, 'Informe a data de nascimento');
        return false;
    }

    const dataNascimento = new Date(inputData); 
    const dataAtual = new Date();
    
    dataAtual.setHours(0, 0, 0, 0); 
    
    if (isNaN(dataNascimento) || dataNascimento > dataAtual) {
        mensagemErroCampos(mensagemErro, divData, spanErro, 'A data de nascimento não pode ser futura ou inválida');
        return false;
    }

    limparErro(mensagemErro, divData, spanErro);
    return true;
}

async function validarAluno(){ 
    const validacaoNome = validarCampoNomeAluno();
    const validacaoEndereco = validarEndereco();
    const validacaoNumero = validarNumero();
    const validacaoBairro = validarBairro();
    const validacaoCidade = validarCidade();
    const validacaoRaca = validarRaca();
    const validacaoTurma = validarTurma();
    const validacaoDataNascimento = validarDataNascimento();
    
    const validacaoCep = await validarCep(); 

    const formularioValido = validacaoNome && validacaoEndereco && validacaoNumero && validacaoBairro && validacaoCidade && validacaoRaca && validacaoTurma && validacaoCep && validacaoDataNascimento;

    return formularioValido;
}
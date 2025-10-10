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
        return;
    }

    if (!regexNome.test(nomeAluno)) {
        mensagemErroCampos(divMensagem, inputNome, spanMensagem, "O nome não deve conter números ou símbolos");
        return;
    }

    if (nomeAluno.split(" ").length < 2) {
        mensagemErroCampos(divMensagem, inputNome, spanMensagem, "Informe o nome completo (nome e sobrenome)");
        return;
    }

    limparErro(divMensagem, inputNome, spanMensagem);
}

function validarEndereco() {
    const divEndereco = document.getElementById('validacao-endereco')
    const mensagemErro = document.getElementById('mensagem-erro-endereco')
    const endereco = document.getElementById('txtEndereco').value
    const spanErro = document.getElementById('endereco-erro')

    if (endereco === "") {
        mensagemErroCampos(mensagemErro, divEndereco, spanErro, 'Informe o endereco (rua)')
        return
    }

    limparErro(mensagemErro, divEndereco, spanErro)
}

function validarNumero() {
    const divNumero = document.getElementById('validacao-numero')
    const mensagemErro = document.getElementById('mensagem-erro-numero')
    const numero = document.getElementById('txtNumero').value
    const spanNumero = document.getElementById('numero-erro')

    if (numero === '') {
        mensagemErroCampos(mensagemErro, divNumero, spanNumero, 'Informe o numero')
        return
    }
    limparErro(mensagemErro, divNumero, spanNumero)
}

function validarBairro() {
    const divBairro = document.getElementById('validacao-bairro')
    const mensagemErro = document.getElementById('mensagem-erro-bairro')
    const bairro = document.getElementById('txtBairro').value
    const spanBairro = document.getElementById('bairro-erro')

    if (bairro === '') {
        mensagemErroCampos(mensagemErro, divBairro, spanBairro, 'Informe o bairro do aluno')
        return
    }

    limparErro(mensagemErro, divBairro, spanBairro)
}

function validarCidade() {
    const divCidade = document.getElementById('validacao-cidade')
    const mensagemErro = document.getElementById('mensagem-erro-cidade')
    const cidade = document.getElementById('txtCidade').value
    const spanCidade = document.getElementById('cidade-erro')

    if (cidade === '') {
        mensagemErroCampos(mensagemErro, divCidade, spanCidade, 'Informe a cidade do aluno')
        return
    }

    limparErro(mensagemErro, divCidade, spanCidade)
}


async function validarCep() {
    const divCep = document.getElementById('validacao-cep');
    const mensagemErro = document.getElementById('mensagem-erro-cep');
    const spanCep = document.getElementById('cep-erro');

    let cep = $('#txtCep').val().replace(/\D/g, ''); 

    if (cep === '') {
        mensagemErroCampos(mensagemErro, divCep, spanCep, 'Informe o CEP do aluno');
        return;
    }

    if (!/^\d{8}$/.test(cep)) {
        mensagemErroCampos(mensagemErro, divCep, spanCep, 'CEP inválido. Digite 8 números.');
        return;
    }

    const dadosCep = await buscarCep(cep);

    if (!dadosCep || dadosCep.erro) {
        mensagemErroCampos(mensagemErro, divCep, spanCep, 'CEP não encontrado.');
        return;
    }

    console.log('Dados do CEP:', dadosCep);
    document.getElementById('txtEndereco').value = dadosCep.logradouro;
    document.getElementById('txtBairro').value = dadosCep.bairro; 
    document.getElementById('txtCidade').value = dadosCep.localidade; 

    limparErro(mensagemErro, divCep, spanCep)
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

function validarRaca() {
    const divRaca = document.getElementById('divRaca');
    const inputRaca = document.getElementById('txtRaca');
    const mensagemErro = document.getElementById('mensagem-erro-raca');
    const spanErro = document.getElementById('raca-erro');

    limparErro(mensagemErro, divRaca, spanErro);

    if (inputRaca.value.trim() === '') {
        mensagemErroCampos(mensagemErro, divRaca, spanErro, 'Selecione a raça do aluno');
        return false;
    }

    limparErro(mensagemErro, divRaca, spanErro);
    return true;
}
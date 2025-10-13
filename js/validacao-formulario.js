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

    console.log('ola')

    let cep = $('#txtCep').val().replace(/\D/g, ''); 

    limparErro(mensagemErro, divCep, spanCep);

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

function validarCampoGotas(){
    const autorizacaoRemedio = document.getElementById('autorizacaoMed');
    const campoGotas = document.getElementById('camposGotas')
    const mensagemErro = document.getElementById('mensagem-erro-gotas')
    const spanMensagem = document.getElementById('gotas-erro')

    if(autorizacaoRemedio.checked === true){ 
        campoGotas.classList.remove('oculto')
        const gotas = document.getElementById('txtGotas').value
        const txtGotas = document.getElementById('txtGotas')
        
        if(gotas === ''){
            mensagemErroCampos(mensagemErro, campoGotas, spanMensagem, 'Informe as quantidade de gotas' )
            console.log('')
            return false
        }
            
    } else {
        campoGotas.classList.add('oculto')
        limparErro(campoGotas, txtGotas, spanMensagem)    
        return true    
    }
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
    const validarGotas = validarCampoGotas();
    
    const validacaoCep = await validarCep(); 

    const formularioValido = validacaoNome && validacaoEndereco && validacaoNumero && validacaoBairro && validacaoCidade && validacaoRaca && validacaoTurma && validacaoCep && validacaoDataNascimento && validarGotas;

    return formularioValido;
}
function validarTipoResponsavel1() {
    const div = document.getElementById('tipo_responsavel_div');
    const valor = document.getElementById('txtTipoResponsavel_1').value;
    const mensagemErro = document.getElementById('mensagem-erro-tipo-responsavel-1');
    const spanErro = document.getElementById('tipo-responsavel-erro-1');

    limparErro(mensagemErro, div, spanErro);

    if (valor === '') {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Selecione o tipo do responsável');
        return false;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;
}

function validarNomeResponsavel1() {
    const div = document.getElementById('nome_responsavel_div');
    const valor = document.getElementById('txtNomeResponsavel_1').value.trim();
    const mensagemErro = document.getElementById('mensagem-erro-nome-responsavel-1');
    const spanErro = document.getElementById('nome-responsavel-erro-1');
    const regexNome = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;

    limparErro(mensagemErro, div, spanErro);

    if (valor === '') {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Informe o nome do responsável');
        return false;
    }

    if (!regexNome.test(valor)) {
        mensagemErroCampos(mensagemErro, div, spanErro, 'O nome não deve conter números ou símbolos');
        return false;
    }

    if (valor.split(' ').length < 2) {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Informe o nome completo (nome e sobrenome)');
        return false;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;
}

function validarDataNascimentoResponsavel1() {
    const div = document.getElementById('data_nascimento_responsavel_div');
    const valor = document.getElementById('txtDataNascimento_1').value.trim();
    const mensagemErro = document.getElementById('mensagem-erro-data-responsavel-1');
    const spanErro = document.getElementById('data-responsavel-erro-1');

    limparErro(mensagemErro, div, spanErro);

    if (valor === '') {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Informe a data de nascimento');
        return false;
    }

    const dataNascimento = new Date(valor);
    const hoje = new Date();
    hoje.setHours(0, 0, 0, 0);

    if (isNaN(dataNascimento) || dataNascimento > hoje) {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Data de nascimento inválida ou futura');
        return false;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;
}

function validarEstadoCivilResponsavel1() {
    const div = document.getElementById('estado_civil_responsavel_div');
    const valor = document.getElementById('txtEstadoCivil_1').value;
    const mensagemErro = document.getElementById('mensagem-erro-estado-civil-1');
    const spanErro = document.getElementById('estado-civil-erro-1');

    limparErro(mensagemErro, div, spanErro);

    if (valor === '') {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Selecione o estado civil');
        return false;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;
}

function validarTelefoneResponsavel1() {
    const div = document.getElementById('telefone_responsavel_div');
    const valor = document.getElementById('txtTelefone_1').value.trim();
    const mensagemErro = document.getElementById('mensagem-erro-telefone-1');
    const spanErro = document.getElementById('telefone-erro-1');
    const regexTelefone = /^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$/;

    limparErro(mensagemErro, div, spanErro);

    if (valor === '') {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Informe o telefone do responsável');
        return false;
    }

    if (!regexTelefone.test(valor)) {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Formato de telefone inválido. Ex: (19) 99999-9999');
        return false;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;
}

function validarEmailResponsavel1() {
    const div = document.getElementById('email_responsavel_div');
    const valor = document.getElementById('txtEmail_1').value.trim();
    const mensagemErro = document.getElementById('mensagem-erro-email-1');
    const spanErro = document.getElementById('email-erro-1');
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    limparErro(mensagemErro, div, spanErro);

    if (valor === '') {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Informe o email do responsável');
        return false;
    }

    if (!regexEmail.test(valor)) {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Email inválido');
        return false;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;
}

function validarSalarioResponsavel1() {
    const div = document.getElementById('salario_responsavel_div');
    const valor = document.getElementById('txtSalario_1').value.trim();
    const mensagemErro = document.getElementById('mensagem-erro-salario-1');
    const spanErro = document.getElementById('salario-erro-1');

    limparErro(mensagemErro, div, spanErro);

    if (valor === '') {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Informe o salário do responsável');
        return false;
    }

    if (isNaN(parseFloat(valor)) || parseFloat(valor) <= 0) {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Informe um valor numérico válido');
        return false;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;
}

function ativarCampoRendaExtra() {
    const possuiRenda = document.getElementById('toggleRendaExtra_1');
    const campoRendaExtra = document.getElementById('renda_extra_div');

    if (possuiRenda.checked) {
        campoRendaExtra.classList.remove('oculto');
        
    } else {
        campoRendaExtra.classList.add('oculto');
    }
}

function validarResponsavel1() {
    const tipo = validarTipoResponsavel1();
    const nome = validarNomeResponsavel1();
    const data = validarDataNascimentoResponsavel1();
    const estadoCivil = validarEstadoCivilResponsavel1();
    const telefone = validarTelefoneResponsavel1();
    const email = validarEmailResponsavel1();
    const salario = validarSalarioResponsavel1();

    const formularioValido = tipo && nome && data && estadoCivil && telefone && email && salario;
    return formularioValido;
}

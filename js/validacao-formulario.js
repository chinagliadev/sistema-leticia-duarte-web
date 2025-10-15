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
    const nomeAluno = document.getElementById("txtNomeCrianca").value
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

function validarRemedio() {
    const autorizacaoRemedio = document.getElementById('autorizacaoMed');
    const campoRemedio = document.getElementById('fieldRemedio')
    const mensagemErro = document.getElementById('mensagem-erro-remedio')
    const spanMensagem = document.getElementById('remedio-erro')

    if (autorizacaoRemedio.checked === true) {
        campoRemedio.classList.remove('oculto')
        const txtRemedio = document.getElementById('txtGotas').value

        if (txtRemedio === '') {
            mensagemErroCampos(mensagemErro, campoRemedio, spanMensagem, 'Informe as quantidade de gotas')
            console.log('')
            return false
        } else {
            limparErro(campoRemedio, campoRemedio, spanMensagem)
            mensagemErro.classList.remove('visible')
        }

    } else {
        campoRemedio.classList.add('oculto')
        limparErro(campoRemedio, txtGotas, spanMensagem)
        return true
    }
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
        mensagemErroCampos(mensagemErro, divData, spanErro, 'Informe a data');
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

function validarCampoGotas() {
    const autorizacaoRemedio = document.getElementById('autorizacaoMed');
    const campoGotas = document.getElementById('camposGotas')
    const mensagemErro = document.getElementById('mensagem-erro-gotas')
    const spanMensagem = document.getElementById('gotas-erro')

    if (autorizacaoRemedio.checked === true) {
        campoGotas.classList.remove('oculto')
        const gotas = document.getElementById('txtGotas').value
        const txtGotas = document.getElementById('txtGotas')

        if (gotas === '') {
            mensagemErroCampos(mensagemErro, campoGotas, spanMensagem, 'Informe as quantidade de gotas')
            console.log('')
            return false
        } else {
            limparErro(campoGotas, txtGotas, spanMensagem)
            mensagemErro.classList.remove('visible')
        }

    } else {
        campoGotas.classList.add('oculto')
        limparErro(campoGotas, txtGotas, spanMensagem)
        return true
    }
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

function validarRendaExtra() {
    const possuiRenda = document.getElementById('toggleRendaExtra_1');
    const campoRendaExtra = document.getElementById('renda_extra_div');
    const rendaExtra = document.getElementById('txtRendaExtra').value
    const spanMensagemErro = document.getElementById('renda-extra-erro-1')
    const divMensagemErro = document.getElementById('mensagem-erro-renda-extra-1')

    if (possuiRenda.checked) {
        campoRendaExtra.classList.remove('oculto');
        if (rendaExtra.trim() === '') {
            mensagemErroCampos(divMensagemErro, campoRendaExtra, spanMensagemErro, 'Informe a renda extra')
            return false
        } else {
            limparErro(divMensagemErro, campoRendaExtra, spanMensagemErro)
        }
    } else {
        campoRendaExtra.classList.add('oculto');
        limparErro(divMensagemErro, campoRendaExtra, spanMensagemErro)
        return true
    }
}


function adicionarResponsavel() {
    const responsavel2 = document.getElementById('responsavel_2')
    const divBotaoResponsavel = document.getElementById('divBotaoResponsavel')
    const divRemoverResponsavel = document.getElementById('divBotaoRemoverResponsavel')
    responsavel2.classList.remove('oculto')
    divBotaoResponsavel.classList.add('oculto')
    divRemoverResponsavel.classList.remove('oculto')
}

function removerResponsavel() {
    const divBotaoRemoverResponsavel = document.getElementById('divBotaoRemoverResponsavel')
    const divBotaoResponsavel = document.getElementById('divBotaoResponsavel')
    const responsavel_2 = document.getElementById('responsavel_2')

    divBotaoRemoverResponsavel.classList.add('oculto')
    divBotaoResponsavel.classList.remove('oculto')
    responsavel_2.classList.add('oculto')

}

function validarRendaExtraResponsavel2() {
    const responsavel2 = document.getElementById('responsavel_2');
    if (responsavel2.classList.contains('oculto')) return true;
    const possuiRenda = document.getElementById('toggleRendaExtra_2');
    const campoRendaExtra = document.getElementById('renda_extra_div_2');
    const rendaExtra = document.getElementById('txtRendaExtra_2').value
    const spanMensagemErro = document.getElementById('renda-extra-erro-2')
    const divMensagemErro = document.getElementById('mensagem-erro-renda-extra-2')

    if (possuiRenda.checked) {
        campoRendaExtra.classList.remove('oculto');
        if (rendaExtra.trim() === '') {
            mensagemErroCampos(divMensagemErro, campoRendaExtra, spanMensagemErro, 'Informe a renda extra')
        } else {
            limparErro(divMensagemErro, campoRendaExtra, spanMensagemErro)
        }
    } else {
        campoRendaExtra.classList.add('oculto');
        limparErro(divMensagemErro, campoRendaExtra, spanMensagemErro)
    }
}

function validarTipoResponsavel2() {
    const responsavel2 = document.getElementById('responsavel_2');
    if (responsavel2.classList.contains('oculto')) return true;

    const div = document.getElementById('tipo_responsavel_2_div');
    const valor = document.getElementById('txtTipoResponsavel_2').value;
    const mensagemErro = document.getElementById('mensagem_erro_tipo_responsavel_2');
    const spanErro = document.getElementById('tipo_responsavel_erro_2');

    limparErro(mensagemErro, div, spanErro);

    if (valor === '') {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Selecione o tipo do responsável');
        return false;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;

}


function validarNomeResponsavel2() {
    const responsavel2 = document.getElementById('responsavel_2');
    if (responsavel2.classList.contains('oculto')) return true;

    const div = document.getElementById('nome_responsavel_div_2');
    const valor = document.getElementById('txtNomeResponsavel_2').value.trim();
    const mensagemErro = document.getElementById('mensagem-erro-nome-responsavel-2');
    const spanErro = document.getElementById('nome-responsavel-erro-2');
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


function validarDataNascimentoResponsavel2() {
    const responsavel2 = document.getElementById('responsavel_2');
    if (responsavel2.classList.contains('oculto')) return true;

    const div = document.getElementById('data_nascimento_responsavel_2_div');
    const valor = document.getElementById('txtDataNascimento_2').value.trim();
    const mensagemErro = document.getElementById('mensagem-erro-data-responsavel-2');
    const spanErro = document.getElementById('data-responsavel-erro-2');

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


function validarEstadoCivilResponsavel2() {

    const responsavel2 = document.getElementById('responsavel_2');
    if (responsavel2.classList.contains('oculto')) return true;

    const div = document.getElementById('estado_civil_responsavel_2_div');
    const valor = document.getElementById('txtEstadoCivil_2').value;
    const mensagemErro = document.getElementById('mensagem-erro-estado-civil-2');
    const spanErro = document.getElementById('estado-civil-erro-2');

    limparErro(mensagemErro, div, spanErro);

    if (valor === '') {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Selecione o estado civil');
        return false;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;
}


function validarTelefoneResponsavel2() {
    const responsavel2 = document.getElementById('responsavel_2');
    if (responsavel2.classList.contains('oculto')) return true;

    const div = document.getElementById('telefone_responsavel_2_div');
    const valor = document.getElementById('txtTelefone_2').value.trim();
    const mensagemErro = document.getElementById('mensagem-erro-telefone-2');
    const spanErro = document.getElementById('telefone-erro-2');
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


function validarEmailResponsavel2() {
    const responsavel2 = document.getElementById('responsavel_2');
    if (responsavel2.classList.contains('oculto')) return true;

    const div = document.getElementById('salario_responsavel_2_div');
    const valor = document.getElementById('txtSalario_2').value.trim();
    const mensagemErro = document.getElementById('mensagem-erro-salario-2');
    const spanErro = document.getElementById('salario-erro-2');

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


function validarSalarioResponsavel2() {
    const responsavel2 = document.getElementById('responsavel_2');
    if (responsavel2.classList.contains('oculto')) return true;

    const div = document.getElementById('salario_responsavel_div');
    const valor = document.getElementById('txtSalario_2').value.trim();
    const mensagemErro = document.getElementById('mensagem-erro-salario-2');
    const spanErro = document.getElementById('salario-erro-2');

    limparErro(mensagemErro, div, spanErro);

    if (valor === '') {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Informe o salário do responsável');
        return false;
    }

    if (isNaN(parseFloat(valor)) || parseFloat(valor) <= 0) {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Informe um valor numérico válido');
        return false;
    }

    return true;
}

function validarResponsavel2() {
    const tipo = validarTipoResponsavel2();
    const nome = validarNomeResponsavel2();
    const data = validarDataNascimentoResponsavel2();
    const estadoCivil = validarEstadoCivilResponsavel2();
    const telefone = validarTelefoneResponsavel2();
    const email = validarEmailResponsavel2();
    const salario = validarSalarioResponsavel2();
    const rendaExtra = validarRendaExtraResponsavel2();

    return tipo && nome && data && estadoCivil && telefone && email && salario && rendaExtra;
}

function validarBolsaFamilia() {
    const possuiBolsaFamilia = document.getElementById('toggle-bolsa-familia');
    const divBolsaFamilia = document.getElementById('valor-bolsa-field');
    const valorBolsaFamilia = document.getElementById('valor_bolsa_familia').value
    const spanMensagemErro = document.getElementById('bolsa-familia-erro')
    const divMensagemErro = document.getElementById('mensagem-erro-bolsa-familia')

    if (possuiBolsaFamilia.checked) {
        divBolsaFamilia.classList.remove('oculto');
        if (valorBolsaFamilia.trim() === '') {
            mensagemErroCampos(divMensagemErro, divBolsaFamilia, spanMensagemErro, 'Informe o valor da bolsa familia')
            return false
        } else {
            limparErro(divMensagemErro, divBolsaFamilia, spanMensagemErro)
        }
    } else {
        divBolsaFamilia.classList.add('oculto');
        limparErro(divMensagemErro, divBolsaFamilia, spanMensagemErro)
        return false
    }

    return true
}

function validarConvenioMedico() {
    const possuiConvenio = document.getElementById('toggle-convenio');
    const divConvenio = document.getElementById('qual-convenio-field');
    const qualConvenio = document.getElementById('qual_convenio').value
    const spanMensagemErro = document.getElementById('convenio-erro')
    const divMensagemErro = document.getElementById('mensagem-erro-convenio')

    if (possuiConvenio.checked) {
        divConvenio.classList.remove('oculto');
        if (qualConvenio.trim() === '') {
            mensagemErroCampos(divMensagemErro, divConvenio, spanMensagemErro, 'Informe qual convenio medico')
            return false
        }
    } else {
        divConvenio.classList.add('oculto');
        limparErro(divMensagemErro, divBolsaFamilia, spanMensagemErro)
        return false
    }
    return true
}

function validarNecessidadeEspecial() {
    const possuiNecessidadeEspecial = document.getElementById('toggle-necessidade-especial');
    const divNecessidade = document.getElementById('qual-necessidade');
    const necessidadeEspecial = document.getElementById('necessidade_especial').value
    const spanMensagemErro = document.getElementById('necessidade-erro')
    const divMensagemErro = document.getElementById('mensagem-erro-necessidade')

    if (possuiNecessidadeEspecial.checked) {
        divNecessidade.classList.remove('oculto');
        if (necessidadeEspecial.trim() === '') {
            mensagemErroCampos(divMensagemErro, divNecessidade, spanMensagemErro, 'Informe a necessidade especial')
            return false
        } else {
            limparErro(divMensagemErro, divNecessidade, spanMensagemErro)
        }
    } else {
        divNecessidade.classList.add('oculto');
        limparErro(divMensagemErro, divNecessidade, spanMensagemErro)
        return false
    }
    return true
}

function validarAlergia() {
    const possuiAlergia = document.getElementById('toggle-alergia');
    const divAlergia = document.getElementById('especifique-alergia');
    const alergia = document.getElementById('qual_alergia').value
    const spanMensagemErro = document.getElementById('alergia-erro')
    const divMensagemErro = document.getElementById('mensagem-erro-alergia')

    if (possuiAlergia.checked) {
        divAlergia.classList.remove('oculto');
        if (alergia.trim() === '') {
            mensagemErroCampos(divMensagemErro, divAlergia, spanMensagemErro, 'Informe a alergia')
            return false
        } else {
            limparErro(divMensagemErro, divAlergia, spanMensagemErro)
        }
    } else {
        divAlergia.classList.add('oculto');
        limparErro(divMensagemErro, divAlergia, spanMensagemErro)
        return false
    }
    return true
}

function validarNomeAutorizada() {
    const nomeAutorizada = document.getElementById("txtNomePessoaAutorizada").value.trim();
    const regexNome = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;

    const divMensagem = document.getElementById('mensagem-erro-nomeAutorizada');
    const spanMensagem = document.getElementById('nomeAutorizada-erro');
    const inputNome = document.getElementById("div_nome_autorizada");

    limparErro(divMensagem, inputNome, spanMensagem);

    if (nomeAutorizada === "") {
        mensagemErroCampos(divMensagem, inputNome, spanMensagem, "Informe o nome do parente");
        return false;
    }

    if (!regexNome.test(nomeAutorizada)) {
        mensagemErroCampos(divMensagem, inputNome, spanMensagem, "O nome não deve conter números ou símbolos");
        return false;
    }

    if (nomeAutorizada.split(" ").length < 2) {
        mensagemErroCampos(divMensagem, inputNome, spanMensagem, "Informe o nome completo (nome e sobrenome)");
        return false;
    }

    limparErro(divMensagem, inputNome, spanMensagem);
    return true;
}

function validarCpfAutorizada() {
    const cpfAutorizada = document.getElementById("txtCpfAutorizada").value.trim();
    const regexCpf = /^\d{3}\.\d{3}\.\d{3}\-\d{2}$/;

    const divMensagem = document.getElementById('mensagem-erro-cpf');
    const spanMensagem = document.getElementById('cpf-erro');
    const inputCpf = document.getElementById("div_cpf_autorizada");

    limparErro(divMensagem, inputCpf, spanMensagem);

    if (cpfAutorizada === '') {
        mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'Informe o CPF');
        return false;
    }

    if (!regexCpf.test(cpfAutorizada)) {
        mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'Informe um CPF no formato válido (xxx.xxx.xxx-xx)');
        return false;
    }

    const cpf = cpfAutorizada.replace(/[^\d]+/g, '');

    if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) {
        mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'CPF inválido');
        return false;
    }

    let soma = 0;
    let resto;

    for (let i = 1; i <= 9; i++) soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
    resto = (soma * 10) % 11;

    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.substring(9, 10))) {
        mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'CPF inválido');
        return false;
    }

    soma = 0;
    for (let i = 1; i <= 10; i++) soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
    resto = (soma * 10) % 11;

    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.substring(10, 11))) {
        mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'CPF inválido');
        return false;
    }

    return true;
}

function validarTelefoneAutorizada() {
    const div = document.getElementById('div_telefone_autorizada');
    const telefone = document.getElementById('txtTelefoneAutorizada').value.trim();
    const mensagemErro = document.getElementById('mensagem-erro-telefone-autorizada');
    const spanErro = document.getElementById('telefone-autorizada-erro');
    const regexTelefone = /^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$/;

    limparErro(mensagemErro, div, spanErro);

    if (telefone === '') {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Informe o telefone do parente autorizado');
        return false;
    }

    if (!regexTelefone.test(telefone)) {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Formato de telefone inválido. Ex: (19) 99999-9999');
        return false;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;
}

function validarParentesco() {
    const div = document.getElementById('div_parentesco');
    const valor = document.getElementById('txtParentesco').value;
    const mensagemErro = document.getElementById('mensagem-erro-parentesco-autorizada');
    const spanErro = document.getElementById('parentesco-autorizada-erro');

    limparErro(mensagemErro, div, spanErro);

    if (valor === '') {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Selecione o parentesco do aluno');
        return false;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;
}

function adicionarPessoaAutorizada() {
    const autorizada2 = document.getElementById('autorizada-2')
    const btnAdicionarAutorizada = document.getElementById('div_autorizada')
    const btnRemoverAutorizada = document.getElementById('btnRemoverAutorizada')
    autorizada2.classList.remove('oculto')
    btnAdicionarAutorizada.classList.add('oculto')
    btnRemoverAutorizada.classList.remove('oculto')
}

function removerPessoaAutorizada() {
    const btnRemoverAutorizada = document.getElementById('btnRemoverAutorizada')
    const btnAdicionarAutorizada = document.getElementById('div_autorizada')
    const autorizada2 = document.getElementById('autorizada-2')

    btnRemoverAutorizada.classList.add('oculto')
    btnAdicionarAutorizada.classList.remove('oculto')
    autorizada2.classList.add('oculto')

}

function validarNomeParentesco2() {
    const autorizada2 = document.getElementById('autorizada-2');
    if (autorizada2.classList.contains('oculto')) return true;

    const nomeAutorizada2 = document.getElementById("txtNomePessoaAutorizada2").value.trim();
    const regexNome = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;

    const divMensagem = document.getElementById('mensagem-erro-nomeAutorizada2');
    const spanMensagem = document.getElementById('nomeAutorizada2-erro');
    const inputNome = document.getElementById("div_nome_autorizada2");

    limparErro(divMensagem, inputNome, spanMensagem);

    if (nomeAutorizada2 === "") {
        mensagemErroCampos(divMensagem, inputNome, spanMensagem, "Informe o nome do segundo parente");
        return false;
    }

    if (!regexNome.test(nomeAutorizada2)) {
        mensagemErroCampos(divMensagem, inputNome, spanMensagem, "O nome não deve conter números ou símbolos");
        return false;
    }

    if (nomeAutorizada2.split(" ").length < 2) {
        mensagemErroCampos(divMensagem, inputNome, spanMensagem, "Informe o nome completo (nome e sobrenome)");
        return false;
    }

    limparErro(divMensagem, inputNome, spanMensagem);
    return true;

}

function validarCpfAutorizada2() {
    const autorizada2 = document.getElementById('autorizada-2');
    if (autorizada2.classList.contains('oculto')) return true;

    const txtCpfAutorizada2 = document.getElementById("txtCpfAutorizada2").value.trim();
    const regexCpf = /^\d{3}\.\d{3}\.\d{3}\-\d{2}$/;

    const divMensagem = document.getElementById('mensagem-erro-cpf2');
    const spanMensagem = document.getElementById('cpf2-erro');
    const inputCpf = document.getElementById("div_cpf_autorizada2");

    limparErro(divMensagem, inputCpf, spanMensagem);

    if (txtCpfAutorizada2 === '') {
        mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'Informe o CPF');
        return false;
    }

    if (!regexCpf.test(txtCpfAutorizada2)) {
        mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'Informe um CPF no formato válido (xxx.xxx.xxx-xx)');
        return false;
    }

    const cpf = txtCpfAutorizada2.replace(/[^\d]+/g, '');

    if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) {
        mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'CPF inválido');
        return false;
    }

    let soma = 0;
    let resto;

    for (let i = 1; i <= 9; i++) soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
    resto = (soma * 10) % 11;

    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.substring(9, 10))) {
        mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'CPF inválido');
        return false;
    }

    soma = 0;
    for (let i = 1; i <= 10; i++) soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
    resto = (soma * 10) % 11;

    if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.substring(10, 11))) {
        mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'CPF inválido');
        return false;
    }

    return true;
}

function validarTelefoneAutorizada2() {
    const autorizada2 = document.getElementById('autorizada-2');
    if (autorizada2.classList.contains('oculto')) return true;


    const div = document.getElementById('div_telefone_autorizada2');
    const telefone = document.getElementById('txtTelefoneAutorizada2').value.trim();
    const mensagemErro = document.getElementById('mensagem-erro-telefone2-autorizada');
    const spanErro = document.getElementById('telefone-autorizada2-erro');
    const regexTelefone = /^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$/;

    limparErro(mensagemErro, div, spanErro);

    if (telefone === '') {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Informe o telefone do parente autorizado');
        return false;
    }

    if (!regexTelefone.test(telefone)) {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Formato de telefone inválido. Ex: (19) 99999-9999');
        return false;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;
}

function validarParentesco2() {
    const div = document.getElementById('div_parentesco2');
    const valor = document.getElementById('txtParentenco2').value;
    const mensagemErro = document.getElementById('mensagem-erro-parentesco-autorizada2');
    const spanErro = document.getElementById('parentesco-autorizada-erro2');

    limparErro(mensagemErro, div, spanErro);

    if (valor === '') {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Selecione o parentesco do aluno');
        return false;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;
}
async function validarAluno() {
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


function validarResponsavel1() {
    const tipo = validarTipoResponsavel1();
    const nome = validarNomeResponsavel1();
    const data = validarDataNascimentoResponsavel1();
    const estadoCivil = validarEstadoCivilResponsavel1();
    const telefone = validarTelefoneResponsavel1();
    const email = validarEmailResponsavel1();
    const salario = validarSalarioResponsavel1();


    const formularioValidoResponsavel = tipo && nome && data && estadoCivil && telefone && email && salario;
    return formularioValidoResponsavel;
}

function validarResponsavel2() {
    const tipo = validarTipoResponsavel2();
    const nome = validarNomeResponsavel2();
    const data = validarDataNascimentoResponsavel2();
    const estadoCivil = validarEstadoCivilResponsavel2();
    const telefone = validarTelefoneResponsavel2();
    const email = validarEmailResponsavel2();
    const salario = validarSalarioResponsavel2();

    const formularioValidoResponsavel2 = tipo && nome && data && estadoCivil && telefone && email && salario;
    return formularioValidoResponsavel2;
}

function validarPessoaAutorizada1() {
    const nome = validarNomeAutorizada();
    const cpf = validarCpfAutorizada();
    const telefone = validarTelefoneAutorizada();
    const parentesco = validarParentesco();

    return nome && cpf && telefone && parentesco;
}

function validarPessoaAutorizada2() {
    const autorizada2 = document.getElementById('autorizada-2');

    if (autorizada2 && autorizada2.classList.contains('oculto')) {
        return true;
    }


    if (autorizada2) {
        const nome = validarNomeParentesco2();
        const cpf = validarCpfAutorizada2();
        const telefone = validarTelefoneAutorizada2();
        const parentesco = validarParentesco2();

        return nome && cpf && telefone && parentesco;
    }


    return true;
}

async function validarFormularioCompleto() {
    const alunoValido = await validarAluno();

    const responsavel1Valido = validarResponsavel1();

    const responsavel2Div = document.getElementById('responsavel_2');
    let responsavel2Valido = true; // Assume true se estiver oculto

    if (responsavel2Div && !responsavel2Div.classList.contains('oculto')) {
        responsavel2Valido = validarResponsavel2();
    }

    const autorizada1Valida = validarPessoaAutorizada1();

    const autorizada2Valida = validarPessoaAutorizada2();

    const formularioValido = alunoValido &&
        responsavel1Valido &&
        responsavel2Valido &&
        autorizada1Valida &&
        autorizada2Valida;
    if (formularioValido) {
        $('#modal-salvar-dados').modal('show');
    } else {
        $('#modal_formulario_invalido').modal('show');
    }
}
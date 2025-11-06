function mensagemErroCampos(divMensagemErro, divDoCampo, spanTextoErro, mensagem) {

    divMensagemErro.classList.remove('hidden');
    divMensagemErro.classList.add('visible', 'error');

    divDoCampo.classList.add('error');

    spanTextoErro.textContent = mensagem;
}

function limparErro(divMensagemErro, divDoCampo, spanTextoErro) {
    divMensagemErro.classList.remove('visible', 'error');
    divMensagemErro.classList.add('hidden');

    divDoCampo.classList.remove('error');

    spanTextoErro.textContent = "";
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

function validarCpfAluno() {
    const cpfAluno = document.getElementById("txtCpfAluno").value.trim();
    const regexCpf = /^\d{3}\.\d{3}\.\d{3}\-\d{2}$/;

    const divMensagem = document.getElementById('mensagem-erro-cpf-aluno');
    const spanMensagem = document.getElementById('cpf-aluno-erro');
    const inputCpfDiv = document.getElementById("div_cpf_aluno"); // Div principal para aplicar classes de erro

    limparErro(divMensagem, inputCpfDiv, spanMensagem);

    if (cpfAluno === '') {
        mensagemErroCampos(divMensagem, inputCpfDiv, spanMensagem, 'Informe o CPF do aluno');
        return false;
    }

    if (!regexCpf.test(cpfAluno)) {
        mensagemErroCampos(divMensagem, inputCpfDiv, spanMensagem, 'Informe um CPF no formato válido (xxx.xxx.xxx-xx)');
        return false;
    }

    if (!validarCPF(cpfAluno)) {
        mensagemErroCampos(divMensagem, inputCpfDiv, spanMensagem, 'CPF inválido');
        return false;
    }

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
        const txtRemedio = document.getElementById('txtRemedio').value

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
    }
    return true
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
    }
    return true
}

async function buscarCep(cep) {
    try {
        if (cep.length !== 8) {
            return false;
        }

        const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);

        if (!response.ok) {
            console.warn("API ViaCEP fora do ar ou retornou erro.");
            return null;
        }

        const dados = await response.json();
        return dados;
    } catch (error) {
        console.warn("Erro na função buscarCep (API pode estar fora do ar):", error);
        return null;
    }
}

async function validarCep() {
    const divCep = document.getElementById('validacao-cep');
    const mensagemErro = document.getElementById('mensagem-erro-cep');
    const spanCep = document.getElementById('cep-erro');

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

    // Se a API caiu, não valida nem exibe erro
    if (dadosCep === null) {
        console.warn("ViaCEP indisponível, pulando preenchimento automático.");
        return true; // segue o fluxo normal, sem travar o usuário
    }

    if (dadosCep.erro) {
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
    return true;
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

function validarEscolaridade() {
    const div = document.getElementById('escolaridade_responsavel_div');
    const valor = document.getElementById('txtEscolaridade').value;
    const mensagemErro = document.getElementById('mensagem-erro-escolaridade-1');
    const spanErro = document.getElementById('escolaridade-erro-1');

    limparErro(mensagemErro, div, spanErro);

    if (valor === '') {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Selecione a escolaridade');
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



function validarRendaExtra() {
    const possuiRenda = document.getElementById('toggleRendaExtra_1');
    const campoRendaExtraDiv = document.getElementById('renda_extra_div');
    const campoRendaExtraInput = document.getElementById('txtRendaExtra');
    const rendaExtra = campoRendaExtraInput.value;
    const spanMensagemErro = document.getElementById('renda-extra-erro-1');
    const divMensagemErro = document.getElementById('mensagem-erro-renda-extra-1');

    if (possuiRenda.checked) {
        campoRendaExtraDiv.classList.remove('oculto');

        if (rendaExtra.trim() === '') {
            mensagemErroCampos(
                divMensagemErro,
                campoRendaExtraDiv,
                spanMensagemErro,
                'Informe a renda extra'
            );
            return false;
        } else {
            limparErro(divMensagemErro, campoRendaExtraDiv, spanMensagemErro);
            return true;
        }
    } else {
        campoRendaExtraDiv.classList.add('oculto');
        limparErro(divMensagemErro, campoRendaExtraDiv, spanMensagemErro);
        campoRendaExtraInput.value = "";
        return true;
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
    return true
}

function validarTipoResponsavel2() {
    const responsavel2 = document.getElementById('responsavel_2');
    if (responsavel2.classList.contains('oculto')) return true;

    const div = document.getElementById('tipo_responsavel_2_div');
    const valor = document.getElementById('txtTipoResponsavel_2').value;
    const mensagemErro = document.getElementById('mensagem-erro-tipo-responsavel-2');
    const spanErro = document.getElementById('tipo-responsavel-erro-2');

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

function validarEscolaridade2() {
    const responsavel2 = document.getElementById('responsavel_2');
    if (responsavel2.classList.contains('oculto')) return true;

    const div = document.getElementById('escolaridade_responsavel_2_div');
    const valor = document.getElementById('txtEscolaridade_2').value;
    const mensagemErro = document.getElementById('mensagem-erro-escolaridade-2');
    const spanErro = document.getElementById('escolaridade-erro-2');

    limparErro(mensagemErro, div, spanErro);

    if (valor === '') {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Selecione a escolaridade');
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

    const div = document.getElementById('email_responsavel_2_div');
    const valor = document.getElementById('txtEmail_2').value.trim();
    const mensagemErro = document.getElementById('mensagem-erro-email-2');
    const spanErro = document.getElementById('email-erro-2');
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


function validarResponsavel2() {
    const tipo = validarTipoResponsavel2();
    const nome = validarNomeResponsavel2();
    const estadoCivil = validarEstadoCivilResponsavel2();
    const telefone = validarTelefoneResponsavel2();
    const email = validarEmailResponsavel2();
    const rendaExtra = validarRendaExtraResponsavel2();
    const escolaridade = validarEscolaridade2()

    return tipo && nome && estadoCivil && telefone && email && rendaExtra;
}

function validarBolsaFamilia() {
    const possuiBolsaFamilia = document.getElementById('toggle-bolsa-familia');
    const divBolsaFamilia = document.getElementById('valor-bolsa-field');
    const valorBolsaFamilia = document.getElementById('valor_bolsa_familia').value;
    const spanMensagemErro = document.getElementById('bolsa-familia-erro');
    const divMensagemErro = document.getElementById('mensagem-erro-bolsa-familia');

    if (possuiBolsaFamilia.checked) {
        divBolsaFamilia.classList.remove('oculto');
        if (valorBolsaFamilia.trim() === '') {
            mensagemErroCampos(divMensagemErro, divBolsaFamilia, spanMensagemErro, 'Informe o valor da bolsa familia');
            return false;
        } else {
            limparErro(divMensagemErro, divBolsaFamilia, spanMensagemErro);
            return true;
        }
    } else {
        divBolsaFamilia.classList.add('oculto');
        limparErro(divMensagemErro, divBolsaFamilia, spanMensagemErro);
        return true;
    }
}

function validarConvenioMedico() {
    const possuiConvenio = document.getElementById('toggle-convenio');
    const divConvenio = document.getElementById('qual-convenio-field');
    const qualConvenio = document.getElementById('qual_convenio').value;
    const spanMensagemErro = document.getElementById('convenio-erro');
    const divMensagemErro = document.getElementById('mensagem-erro-convenio');

    if (possuiConvenio.checked) {
        divConvenio.classList.remove('oculto');
        if (qualConvenio.trim() === '') {
            mensagemErroCampos(divMensagemErro, divConvenio, spanMensagemErro, 'Informe qual convenio medico');
            return false;
        } else {
            limparErro(divMensagemErro, divConvenio, spanMensagemErro);
            return true;
        }
    } else {
        divConvenio.classList.add('oculto');
        limparErro(divMensagemErro, divConvenio, spanMensagemErro);
        return true;
    }
}

function validarCampoAluguel() {
    const valorAluguel = document.getElementById('txtValorAluguel').value
    const radioAluguel = document.getElementById('moradia_alugada')
    const divAluguelValor = document.getElementById('divAluguel')
    const mensagemErro = document.getElementById('mensagem-erro-aluguel')
    const spanError = document.getElementById('aluguel-erro')

    if (!radioAluguel.checked) {
        limparErro(mensagemErro, divAluguelValor, spanError)
        return true
    }

    if (valorAluguel.trim() === '') {
        mensagemErroCampos(mensagemErro, divAluguelValor, spanError, 'Informe o aluguel')
        return false
    }

    limparErro(mensagemErro, divAluguelValor, spanError)
    return true
}

function ativarCampoAluguel() {
    const radioAluguel = document.getElementById('moradia_alugada')
    const divAluguel = document.getElementById('divAluguel')
    const mensagemErro = document.getElementById('mensagem-erro-aluguel')
    const spanError = document.getElementById('aluguel-erro')

    if (radioAluguel.checked) {
        divAluguel.classList.remove('oculto')
    } else {
        divAluguel.classList.add('oculto')
        limparErro(mensagemErro, divAluguel, spanError)
    }
}
function validarNecessidadeEspecial() {
    const possuiNecessidadeEspecial = document.getElementById('toggle-necessidade-especial');
    const divNecessidade = document.getElementById('qual-necessidade');
    const necessidadeEspecial = document.getElementById('necessidade_especial').value;
    const spanMensagemErro = document.getElementById('necessidade-erro');
    const divMensagemErro = document.getElementById('mensagem-erro-necessidade');

    if (possuiNecessidadeEspecial.checked) {
        divNecessidade.classList.remove('oculto');
        if (necessidadeEspecial.trim() === '') {
            mensagemErroCampos(divMensagemErro, divNecessidade, spanMensagemErro, 'Informe a necessidade especial');
            return false;
        } else {
            limparErro(divMensagemErro, divNecessidade, spanMensagemErro);
            return true;
        }
    } else {
        divNecessidade.classList.add('oculto');
        limparErro(divMensagemErro, divNecessidade, spanMensagemErro);
        return true;
    }
}

function validarAlergia() {
    const possuiAlergia = document.getElementById('toggle-alergia');
    const divAlergia = document.getElementById('especifique-alergia');
    const inputAlergia = document.getElementById('qual_alergia');
    const spanMensagemErro = document.getElementById('alergia-erro');
    const divMensagemErro = document.getElementById('mensagem-erro-alergia');

    if (possuiAlergia.checked) {
        divAlergia.classList.remove('oculto');
        if (inputAlergia.value.trim() === '') {
            mensagemErroCampos(divMensagemErro, divAlergia, spanMensagemErro, 'Informe a alergia');
            return false;
        } else {
            limparErro(divMensagemErro, divAlergia, spanMensagemErro);
            return true;
        }
    } else {
        divAlergia.classList.add('oculto');
        limparErro(divMensagemErro, divAlergia, spanMensagemErro);
        return true;
    }
}


function validarCirurgia() {
    const jaFezCirurgia = document.getElementById('toggle_cirurgia');
    const divCirurgia = document.getElementById('divCirurgia');
    const cirurgia = document.getElementById('cirurgia').value;
    const spanMensagemErro = document.getElementById('cirurgia-erro');
    const divMensagemErro = document.getElementById('mensagem-erro-cirurgia');

    if (jaFezCirurgia.checked) {
        divCirurgia.classList.remove('oculto');
        if (cirurgia.trim() === '') {
            mensagemErroCampos(divMensagemErro, divCirurgia, spanMensagemErro, 'Informe a cirurgia');
            return false;
        } else {
            limparErro(divMensagemErro, divCirurgia, spanMensagemErro);
            return true;
        }
    } else {
        divCirurgia.classList.add('oculto');
        limparErro(divMensagemErro, divCirurgia, spanMensagemErro);
        return true;
    }
}
function validarNomeAutorizada() {
    const nomeAutorizada = document.getElementById("txtNomePessoaAutorizada").value.trim();
    const regexNome = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;

    const divMensagem = document.getElementById('mensagem-erro-nomeAutorizada');
    const spanMensagem = document.getElementById('nomeAutorizada-erro');
    const inputNome = document.getElementById("div_nome_autorizada");

    limparErro(divMensagem, inputNome, spanMensagem);

    if (nomeAutorizada === "") {
        return true;
    }

    if (!regexNome.test(nomeAutorizada)) {
        mensagemErroCampos(divMensagem, inputNome, spanMensagem, "O nome não deve conter números ou símbolos");
        return false;
    }

    if (nomeAutorizada.split(" ").length < 2) {
        mensagemErroCampos(divMensagem, inputNome, spanMensagem, "Informe o nome completo (nome e sobrenome)");
        return false;
    }

    return true;
}

function validarCPF(cpfString) {
    const cpf = cpfString.replace(/[^\d]+/g, '');

    if (cpf.length !== 11) {
        return false;
    }

    if (/^(\d)\1+$/.test(cpf)) {
        return false;
    }

    let soma = 0;
    let resto;

    for (let i = 1; i <= 9; i++) {
        soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
    }

    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) {
        resto = 0;
    }
    if (resto !== parseInt(cpf.substring(9, 10))) {
        return false;
    }

    soma = 0;
    for (let i = 1; i <= 10; i++) {
        soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
    }

    resto = (soma * 10) % 11;
    if (resto === 10 || resto === 11) {
        resto = 0;
    }
    if (resto !== parseInt(cpf.substring(10, 11))) {
        return false;
    }

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
        return true;
    }

    if (!regexCpf.test(cpfAutorizada)) {
        mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'Informe um CPF no formato válido (xxx.xxx.xxx-xx)');
        return false;
    }

    if (!validarCPF(cpfAutorizada)) {
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
        return true;
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
        return true;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;
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
        return true;
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
        return true;
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
        return true;
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
        return true;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;
}

function validarNomeAutorizada3() {
    const autorizada3 = document.getElementById('autorizada-3');
    if (autorizada3.classList.contains('oculto')) return true;

    const nome = document.getElementById("txtNomePessoaAutorizada3").value.trim();
    const regexNome = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;

    const divMensagem = document.getElementById('mensagem-erro-nomeAutorizada3');
    const spanMensagem = document.getElementById('nomeAutorizada3-erro');
    const inputNome = document.getElementById("div_nome_autorizada3");

    limparErro(divMensagem, inputNome, spanMensagem);

    if (nome === "") {
        return true;
    }

    if (!regexNome.test(nome)) {
        mensagemErroCampos(divMensagem, inputNome, spanMensagem, "O nome não deve conter números ou símbolos");
        return false;
    }

    if (nome.split(" ").length < 2) {
        mensagemErroCampos(divMensagem, inputNome, spanMensagem, "Informe o nome completo (nome e sobrenome)");
        return false;
    }

    limparErro(divMensagem, inputNome, spanMensagem);
    return true;
}

function validarCpfAutorizada3() {
    const autorizada3 = document.getElementById('autorizada-3');
    if (autorizada3.classList.contains('oculto')) return true;

    const cpfInput = document.getElementById("txtCpfAutorizada3").value.trim();
    const regexCpf = /^\d{3}\.\d{3}\.\d{3}\-\d{2}$/;

    const divMensagem = document.getElementById('mensagem-erro-cpf3');
    const spanMensagem = document.getElementById('cpf3-erro');
    const inputCpf = document.getElementById("div_cpf_autorizada3");

    limparErro(divMensagem, inputCpf, spanMensagem);

    if (cpfInput === '') {
        return true;
    }

    if (!regexCpf.test(cpfInput)) {
        mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'Informe um CPF no formato válido (xxx.xxx.xxx-xx)');
        return false;
    }

    const cpf = cpfInput.replace(/[^\d]+/g, '');
    if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) {
        mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'CPF inválido');
        return false;
    }

    let soma = 0, resto;
    for (let i = 1; i <= 9; i++) soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
    resto = (soma * 10) % 11; if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.substring(9, 10))) { mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'CPF inválido'); return false; }

    soma = 0;
    for (let i = 1; i <= 10; i++) soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
    resto = (soma * 10) % 11; if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.substring(10, 11))) { mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'CPF inválido'); return false; }

    return true;
}

function validarTelefoneAutorizada3() {
    const autorizada3 = document.getElementById('autorizada-3');
    if (autorizada3.classList.contains('oculto')) return true;

    const telefone = document.getElementById('txtTelefoneAutorizada3').value.trim();
    const div = document.getElementById('div_telefone_autorizada3');
    const mensagemErro = document.getElementById('mensagem-erro-telefone3-autorizada');
    const spanErro = document.getElementById('telefone-autorizada3-erro');
    const regexTelefone = /^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$/;

    limparErro(mensagemErro, div, spanErro);

    if (telefone === '') {
        return true;
    }

    if (!regexTelefone.test(telefone)) {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Formato de telefone inválido. Ex: (19) 99999-9999');
        return false;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;
}

function validarParentesco3() {
    const div = document.getElementById('div_parentesco3');
    const valor = document.getElementById('txtParentesco3').value;
    const mensagemErro = document.getElementById('mensagem-erro-parentesco-autorizada3');
    const spanErro = document.getElementById('parentesco-autorizada-erro3');

    limparErro(mensagemErro, div, spanErro);

    if (valor === '') {
        return true;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;
}

function validarNomeAutorizada4() {
    const autorizada4 = document.getElementById('autorizada-4');
    if (autorizada4.classList.contains('oculto')) return true;

    const nome = document.getElementById("txtNomePessoaAutorizada4").value.trim();
    const regexNome = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;

    const divMensagem = document.getElementById('mensagem-erro-nomeAutorizada4');
    const spanMensagem = document.getElementById('nomeAutorizada4-erro');
    const inputNome = document.getElementById("div_nome_autorizada4");

    limparErro(divMensagem, inputNome, spanMensagem);

    if (nome === "") return true;

    if (!regexNome.test(nome)) {
        mensagemErroCampos(divMensagem, inputNome, spanMensagem, "O nome não deve conter números ou símbolos");
        return false;
    }

    if (nome.split(" ").length < 2) {
        mensagemErroCampos(divMensagem, inputNome, spanMensagem, "Informe o nome completo (nome e sobrenome)");
        return false;
    }

    limparErro(divMensagem, inputNome, spanMensagem);
    return true;
}

function validarCpfAutorizada4() {
    const autorizada4 = document.getElementById('autorizada-4');
    if (autorizada4.classList.contains('oculto')) return true;

    const cpfInput = document.getElementById("txtCpfAutorizada4").value.trim();
    const regexCpf = /^\d{3}\.\d{3}\.\d{3}\-\d{2}$/;

    const divMensagem = document.getElementById('mensagem-erro-cpf4');
    const spanMensagem = document.getElementById('cpf4-erro');
    const inputCpf = document.getElementById("div_cpf_autorizada4");

    limparErro(divMensagem, inputCpf, spanMensagem);

    if (cpfInput === '') return true;

    if (!regexCpf.test(cpfInput)) {
        mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'Informe um CPF no formato válido (xxx.xxx.xxx-xx)');
        return false;
    }

    const cpf = cpfInput.replace(/[^\d]+/g, '');
    if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) {
        mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'CPF inválido');
        return false;
    }

    let soma = 0, resto;
    for (let i = 1; i <= 9; i++) soma += parseInt(cpf.substring(i - 1, i)) * (11 - i);
    resto = (soma * 10) % 11; if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.substring(9, 10))) { mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'CPF inválido'); return false; }

    soma = 0;
    for (let i = 1; i <= 10; i++) soma += parseInt(cpf.substring(i - 1, i)) * (12 - i);
    resto = (soma * 10) % 11; if (resto === 10 || resto === 11) resto = 0;
    if (resto !== parseInt(cpf.substring(10, 11))) { mensagemErroCampos(divMensagem, inputCpf, spanMensagem, 'CPF inválido'); return false; }

    return true;
}

function validarTelefoneAutorizada4() {
    const autorizada4 = document.getElementById('autorizada-4');
    if (autorizada4.classList.contains('oculto')) return true;

    const telefone = document.getElementById('txtTelefoneAutorizada4').value.trim();
    const div = document.getElementById('div_telefone_autorizada4');
    const mensagemErro = document.getElementById('mensagem-erro-telefone4-autorizada');
    const spanErro = document.getElementById('telefone-autorizada4-erro');
    const regexTelefone = /^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$/;

    limparErro(mensagemErro, div, spanErro);

    if (telefone === '') return true;

    if (!regexTelefone.test(telefone)) {
        mensagemErroCampos(mensagemErro, div, spanErro, 'Formato de telefone inválido. Ex: (19) 99999-9999');
        return false;
    }

    limparErro(mensagemErro, div, spanErro);
    return true;
}

function validarParentesco4() {
    const div = document.getElementById('div_parentesco4');
    const valor = document.getElementById('txtParentesco4').value;
    const mensagemErro = document.getElementById('mensagem-erro-parentesco-autorizada4');
    const spanErro = document.getElementById('parentesco-autorizada-erro4');

    limparErro(mensagemErro, div, spanErro);

    if (valor === '') return true;

    limparErro(mensagemErro, div, spanErro);
    return true;
}

function validarDataNascimentoResponsavel2() {
    const input = document.getElementById('txtDataNascimento_2');
    const divMensagemErro = document.getElementById('mensagem-erro-data-responsavel-2');
    const divCampo = document.getElementById('data_nascimento_responsavel_2_div');
    const spanErro = document.getElementById('data-responsavel-erro-2');

    const valor = input.value;

    if (!valor) {
        limparErro(divMensagemErro, divCampo, spanErro);
        return false; // Campo vazio é inválido
    }

    const dataDigitada = new Date(valor);
    const hoje = new Date();

    dataDigitada.setHours(0, 0, 0, 0);
    hoje.setHours(0, 0, 0, 0);

    if (dataDigitada > hoje) {
        mensagemErroCampos(
            divMensagemErro,
            divCampo,
            spanErro,
            'A data de nascimento não pode ser uma data futura.'
        );
        input.value = ''; // limpa o campo
        return false;
    }

    limparErro(divMensagemErro, divCampo, spanErro);
    return true;
}



document.addEventListener("DOMContentLoaded", function () {
    const campoNome1 = document.getElementById("txtNomePessoaAutorizada");
    const campoCpf1 = document.getElementById('txtCpfAutorizada');
    const campoTelefone1 = document.getElementById('txtTelefoneAutorizada');
    const campoParentesco1 = document.getElementById('txtParentesco');

    if (campoNome1) campoNome1.addEventListener("input", validarNomeAutorizada);
    if (campoCpf1) campoCpf1.addEventListener("input", validarCpfAutorizada);
    if (campoTelefone1) campoTelefone1.addEventListener("input", validarTelefoneAutorizada);
    if (campoParentesco1) campoParentesco1.addEventListener("change", validarParentesco);

    const campoNome2 = document.getElementById("txtNomePessoaAutorizada2");
    const campoCpf2 = document.getElementById('txtCpfAutorizada2');
    const campoTelefone2 = document.getElementById('txtTelefoneAutorizada2');
    const campoParentesco2 = document.getElementById('txtParentenco2');

    if (campoNome2) campoNome2.addEventListener("input", validarNomeParentesco2);
    if (campoCpf2) campoCpf2.addEventListener("input", validarCpfAutorizada2);
    if (campoTelefone2) campoTelefone2.addEventListener("input", validarTelefoneAutorizada2);
    if (campoParentesco2) campoParentesco2.addEventListener("change", validarParentesco2);

    const campoNome3 = document.getElementById("txtNomePessoaAutorizada3");
    const campoCpf3 = document.getElementById('txtCpfAutorizada3');
    const campoTelefone3 = document.getElementById('txtTelefoneAutorizada3');
    const campoParentesco3 = document.getElementById('txtParentesco3');

    if (campoNome3) campoNome3.addEventListener("input", validarNomeAutorizada3);
    if (campoCpf3) campoCpf3.addEventListener("input", validarCpfAutorizada3);
    if (campoTelefone3) campoTelefone3.addEventListener("input", validarTelefoneAutorizada3);
    if (campoParentesco3) campoParentesco3.addEventListener("change", validarParentesco3);

    const campoNome4 = document.getElementById("txtNomePessoaAutorizada4");
    const campoCpf4 = document.getElementById('txtCpfAutorizada4');
    const campoTelefone4 = document.getElementById('txtTelefoneAutorizada4');
    const campoParentesco4 = document.getElementById('txtParentesco4');

    if (campoNome4) campoNome4.addEventListener("input", validarNomeAutorizada4);
    if (campoCpf4) campoCpf4.addEventListener("input", validarCpfAutorizada4);
    if (campoTelefone4) campoTelefone4.addEventListener("input", validarTelefoneAutorizada4);
    if (campoParentesco4) campoParentesco4.addEventListener("change", validarParentesco4);
});

async function validarAluno() {
    const validacaoNome = validarCampoNomeAluno();
    const validarRaAluno = verificarRaAluno();
    const validarCpf = validarCpfAluno()
    const validacaoEndereco = validarEndereco();
    const validacaoNumero = validarNumero();
    const validacaoBairro = validarBairro();
    const dataNascimento = validarDataNascimentoAluno();
    const validacaoCidade = validarCidade();
    const validacaoRaca = validarRaca();
    const validacaoTurma = validarTurma();
    const validarGotas = validarCampoGotas();

    const validacaoCep = await validarCep();

    const formularioValido = validacaoNome && validarRaAluno && validarCpf && validacaoEndereco && validacaoNumero && validacaoBairro && dataNascimento && validacaoCidade && validacaoRaca && validacaoTurma && validarGotas && validacaoCep;

    return formularioValido;
}


function validarResponsavel1() {
    const tipo = validarTipoResponsavel1();
    const nome = validarNomeResponsavel1();
    const estadoCivil = validarEstadoCivilResponsavel1();
    const telefone = validarTelefoneResponsavel1();
    const dataNascimento = validarDataNascimentoResponsavel1();
    const email = validarEmailResponsavel1();
    const escolaridade = validarEscolaridade()

    const formularioValidoResponsavel = tipo && nome && estadoCivil && telefone && dataNascimento && email && escolaridade;
    return formularioValidoResponsavel;
}

function validarResponsavel2() {
    const tipo = validarTipoResponsavel2();
    const nome = validarNomeResponsavel2();
    const estadoCivil = validarEstadoCivilResponsavel2();
    const dataNascimento = validarDataNascimentoResponsavel2()
    const telefone = validarTelefoneResponsavel2();
    const email = validarEmailResponsavel2();
    const escolaridade2 = validarEscolaridade2()

    const formularioValidoResponsavel2 = tipo && nome && estadoCivil && telefone && dataNascimento && email && escolaridade2;
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

function validarDataNascimentoAluno() {
    const input = document.getElementById('txtDataNascimento');
    const divMensagemErro = document.getElementById('mensagem-erro-data-nascimento');
    const divCampo = document.getElementById('validacao-data-nascimento');
    const spanErro = document.getElementById('data-nascimento-erro');

    const valor = input.value;

    if (!valor) {
        limparErro(divMensagemErro, divCampo, spanErro);
        return false; // Campo vazio é inválido
    }

    const dataDigitada = new Date(valor);
    const hoje = new Date();

    // Normaliza a comparação (ignora hora)
    dataDigitada.setHours(0, 0, 0, 0);
    hoje.setHours(0, 0, 0, 0);

    if (dataDigitada > hoje) {
        mensagemErroCampos(
            divMensagemErro,
            divCampo,
            spanErro,
            'A data de nascimento não pode ser uma data futura.'
        );
        input.value = ''; // limpa o campo
        return false;
    }

    limparErro(divMensagemErro, divCampo, spanErro);
    return true;
}

function validarDataNascimentoResponsavel1() {
    const input = document.getElementById('txtDataNascimento_1');
    const divMensagemErro = document.getElementById('mensagem-erro-data-responsavel-1');
    const divCampo = document.getElementById('data_nascimento_responsavel_div');
    const spanErro = document.getElementById('data-responsavel-erro-1');

    const valor = input.value;

    if (!valor) {
        limparErro(divMensagemErro, divCampo, spanErro);
        return false;
    }

    const dataDigitada = new Date(valor);
    const hoje = new Date();

    dataDigitada.setHours(0, 0, 0, 0);
    hoje.setHours(0, 0, 0, 0);

    if (dataDigitada > hoje) {
        mensagemErroCampos(
            divMensagemErro,
            divCampo,
            spanErro,
            'A data de nascimento não pode ser uma data futura.'
        );
        input.value = '';
        return false;
    }

    limparErro(divMensagemErro, divCampo, spanErro);
    return true;
}



function validarEstruturaFamiliar() {
    const bolsaFamiliaValida = validarBolsaFamilia();
    const convenioValido = validarConvenioMedico();
    const necessidadeEspecialValida = validarNecessidadeEspecial();
    const alergiaValida = validarAlergia();
    const aluguelFamiliar = validarCampoAluguel()

    const estruturaFamiliarValida =
        bolsaFamiliaValida &&
        convenioValido &&
        necessidadeEspecialValida &&
        alergiaValida &&
        aluguelFamiliar;

    if (!estruturaFamiliarValida) {
        console.warn('Estrutura familiar inválida. Verifique os seguintes campos:', {
            bolsaFamilia: bolsaFamiliaValida,
            convenioMedico: convenioValido,
            necessidadeEspecial: necessidadeEspecialValida,
            alergia: alergiaValida
        });
    } else {
        console.log('Estrutura familiar válida.');
    }

    return estruturaFamiliarValida;
}


async function validarFormularioCompleto(acao = 'salvar') {
    const erros = [];

    const alunoValido = await validarAluno();
    if (!alunoValido) erros.push('Aluno');

    const responsavel1Valido = validarResponsavel1();
    if (!responsavel1Valido) erros.push('Responsável 1');

    const responsavel2Div = document.getElementById('responsavel_2');
    let responsavel2Valido = true;
    if (responsavel2Div && !responsavel2Div.classList.contains('oculto')) {
        responsavel2Valido = validarResponsavel2();
        if (!responsavel2Valido) erros.push('Responsável 2');
    }

    const autorizada1Valida = validarPessoaAutorizada1();
    if (!autorizada1Valida) erros.push('Pessoa Autorizada 1');

    const autorizada2Valida = validarPessoaAutorizada2();
    if (!autorizada2Valida) erros.push('Pessoa Autorizada 2');

    const estruturaFamiliarValida = validarEstruturaFamiliar();
    if (!estruturaFamiliarValida) erros.push('Estrutura Familiar');

    const formularioValido =
        alunoValido &&
        responsavel1Valido &&
        responsavel2Valido &&
        autorizada1Valida &&
        autorizada2Valida &&
        estruturaFamiliarValida;

    if (formularioValido) {
        console.log('Formulário válido!');

        if (acao === 'salvar') {
            $('#modal-salvar-dados').modal('show');
        } else if (acao === 'editar') {
            const nomeAluno = $('#txtNomeCrianca').val();
            const raAluno = $('input[name="ra_aluno"]').val();

            $('#nome-aluno-modal-editar').text(nomeAluno);
            $('#ra-aluno-no-modal-editar').text(raAluno);
            $('#input-ra-editar').val(raAluno);

            $('.ui.modal.modal-editar').modal('show');


            $('.ui.modal.modal-editar .cancel.button').on('click', function () {
                $('.ui.modal.modal-editar').modal('hide');
            });

            $('#btn-editar-cadastro').on('click', function () {
                $('.ui.modal.modal-editar').modal('hide');

                $('#formulario-aluno').submit();
            });
        }
    } else {
        console.warn('Formulário inválido. Seções com erro:', erros);
        $('#modal_formulario_invalido').modal('show');
    }
}



function removerResponsavel() {
    document.getElementById('responsavel_2').classList.add('oculto');
    document.getElementById('divBotaoRemoverResponsavel').classList.add('oculto');
    document.getElementById('divBotaoResponsavel').classList.remove('oculto');

    document.getElementById('apagarResp2').value = '1';

    document.getElementById('txtTipoResponsavel_2').selectedIndex = 0;
    document.getElementById('txtNomeResponsavel_2').value = '';
    document.getElementById('txtDataNascimento_2').value = '';
    document.getElementById('hiddenDataNascimento_2').value = '';
    document.getElementById('txtEstadoCivil_2').selectedIndex = 0;
    document.getElementById('txtEscolaridade_2').selectedIndex = 0;
    document.getElementById('txtTelefone_2').value = '';
    document.getElementById('txtEmail_2').value = '';
    document.getElementById('txtNomeEmpresa_2').value = '';
    document.getElementById('txtProfissao_2').value = '';
    document.getElementById('txtTelefoneTrabalho_2').value = '';
    document.getElementById('txtHorarioTrabalho_2').value = '';
    document.getElementById('txtSalario_2').value = '';
    document.getElementById('toggleRendaExtra_2').checked = false;
    document.getElementById('txtRendaExtra_2').value = '';

    document.getElementById('renda_extra_div_2').classList.add('oculto');

}


function validarPesquisar(event) {
    const inputPesquisar = document.getElementById("txtPesquisar");
    const divInput = document.getElementById("div-pesquisar");
    const divMensagem = document.getElementById("mensagem-erro-pesquisar");
    const spanMensagem = document.getElementById("pesquisar-erro");

    const valor = inputPesquisar.value.trim();

    divMensagem.classList.add("hidden");
    spanMensagem.textContent = "";
    divInput.classList.remove("error", "success");

    if (valor === "") {
        divInput.classList.add("error");
        divMensagem.classList.remove("hidden");
        spanMensagem.textContent = "Informe o RA ou nome do aluno";
        return false;
    }

    if (!isNaN(valor) && Number(valor) < 0) {
        divInput.classList.add("error");
        divMensagem.classList.remove("hidden");
        spanMensagem.textContent = "RA inválido";
        return false;
    }

    divInput.classList.add("success");

    return true;
}

async function verificarRaAluno() {
    const ra = document.getElementById('txtRaAluno').value.trim();

    const divMensagemErro = document.getElementById('mensagem-erro-ra');
    const divDoCampo = document.getElementById('validacao-ra');
    const spanTextoErro = document.getElementById('ra-erro');

    if (!ra) {
        limparErro(divMensagemErro, divDoCampo, spanTextoErro);
        return false;
    }

    try {
        const response = await fetch(`verificar_ra.php?ra=${encodeURIComponent(ra)}`);
        const data = await response.json();

        if (data.existe) {
            mensagemErroCampos(divMensagemErro, divDoCampo, spanTextoErro, 'Este RA já está cadastrado!');
            return true; 
        } else {
            limparErro(divMensagemErro, divDoCampo, spanTextoErro);
            return false; 
        }
    } catch (error) {
        console.error('Erro ao verificar o RA:', error);
        return false;
    }
}





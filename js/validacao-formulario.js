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
}

function validarNumero() {
    const divNumero = document.getElementById('validacao-numero')
    const mensagemErro = document.getElementById('mensagem-erro-numero')
    const numero = document.getElementById('txtNumero').value
    const spanNumero = document.getElementById('numero-erro')

    if (numero === '') {
        mensagemErroCampos(mensagemErro, divNumero, spanNumero, 'Informe o numero')
    }

}

function validarBairro() {
    const divBairro = document.getElementById('validacao-bairro')
    const mensagemErro = document.getElementById('mensagem-erro-bairro')
    const bairro = document.getElementById('txtBairro').value
    const spanBairro = document.getElementById('bairro-erro')

    if(bairro === ''){
        mensagemErroCampos(mensagemErro, divBairro, spanBairro, 'Informe o bairro do aluno')
    }
}


// async function validarCampoCep(listaDeErro) {
//     const cep = document.getElementById('txtCep').value.trim();
//     const divCep = document.getElementById("validacao-cep");

//     divCep.classList.remove("ui", "error");

//     if (cep === "") {
//         listaDeErro.push("O CEP não pode estar vazio.");
//         divCep.classList.add("ui", "error");
//         return;
//     }

//     const dadosCep = await buscarCep(cep);

//     if (!dadosCep || dadosCep.erro) {
//         listaDeErro.push("CEP inválido ou não encontrado.");
//         divCep.classList.add("ui", "error");
//         return;
//     }

//     document.getElementById("txtEndereco").value = dadosCep.logradouro || "";
//     document.getElementById("txtBairro").value = dadosCep.bairro || "";
//     document.getElementById("txtCidade").value = dadosCep.localidade || "";
//     document.getElementById("txtUf").value = dadosCep.uf || "";
//     return true
// }

// async function buscarCep(cep) {
//     try {

//         if (cep.length !== 8) {
//             return null;
//         }

//         const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);

//         if (!response.ok) {
//             throw new Error("Erro ao buscar o CEP.");
//         }

//         const dados = await response.json();
//         return dados;

//     } catch (error) {
//         console.error("Erro na função buscarCep:", error);
//         return null;
//     }
// }

// function validarEndereco(listaDeErro) {
//     const endereco = document.getElementById('txtEndereco').value.trim();
//     const divEndereco = document.getElementById('div-endereco');

//     divEndereco.classList.remove("ui", "error");

//     if (endereco === '') {
//         listaDeErro.push('Informe o campo Endereço.');
//         divEndereco.classList.add("ui", "error");
//     }
// }

let listaDeErro = [];
async function validarCadastroAluno() {
    const sucessoMensagem = document.getElementById("mensagem-sucesso-aluno");
    const erroMensagem = document.getElementById("mensagem-erro-aluno");


    validarCampoNomeAluno(listaDeErro);

    await validarCampoCep(listaDeErro);

    validarEndereco(listaDeErro);
    const listarMensagemErro = document.getElementById("lista-erros-aluno");
    const divAluno = document.getElementById("validacao-nome");
    const divCep = document.getElementById("validacao-cep");
    const divEndereco = document.getElementById('div-endereco');

    listarMensagemErro.innerHTML = "";

    if (listaDeErro.length > 0) {
        erroMensagem.style.display = "block";
        sucessoMensagem.style.display = "none";

        listaDeErro.forEach(erro => {
            const li = document.createElement("li");
            li.textContent = erro;
            listarMensagemErro.appendChild(li);
        });

        divAluno.classList.add("ui", "error");
        divCep.classList.add("ui", "error");
        divEndereco.classList.add("ui", "error");

    } else {
        sucessoMensagem.style.display = "block";
        erroMensagem.style.display = "none";

        divAluno.classList.remove("ui", "error");
        divCep.classList.remove("ui", "error");
        divEndereco.classList.remove("ui", "error");

        listaDeErro = []
    }
}



function validarCampoNomeAluno(listaDeErro) {
    const nomeAluno = document.getElementById("txtNomeCrianca").value.trim();
    const regexNome = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;
    const divMensagem = document.getElementById('mensagem-erro-aluno');
    const mensagemErro = document.getElementById('mensagem-erro-aluno');

    divMensagem.classList.add('hidden');
    divMensagem.classList.remove('visible', 'error');

    if (nomeAluno === "") {
        divMensagem.classList.add('visible', 'error');
        divMensagem.classList.remove('hidden');
        mensagemErro.textContent = 'Informe o nome do aluno';
        listaDeErro.push("O nome do aluno não pode estar vazio.");
        return;
    }

    if (!regexNome.test(nomeAluno)) {
        divMensagem.classList.add('visible', 'error');
        divMensagem.classList.remove('hidden');
        mensagemErro.textContent = 'O nome do aluno não deve conter números';
        listaDeErro.push("O nome do aluno deve conter apenas letras e espaços.");
        return;
    }

    if (nomeAluno.split(" ").length < 2) {
        divMensagem.classList.add('visible', 'error');
        divMensagem.classList.remove('hidden');
        mensagemErro.textContent = 'Informe o nome completo (nome e sobrenome)';
        listaDeErro.push("Informe o nome completo (nome e sobrenome).");
        return;
    }

    divMensagem.classList.add('hidden');
    divMensagem.classList.remove('visible', 'error');
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

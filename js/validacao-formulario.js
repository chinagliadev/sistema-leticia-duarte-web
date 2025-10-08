function validarCadastroAluno() {
    const sucessoMensagem = document.getElementById("mensagem-sucesso-aluno");
    const erroMensagem = document.getElementById("mensagem-erro-aluno");
    validarCampoNomeAluno(sucessoMensagem, erroMensagem)
}

function validarCampoNomeAluno(sucessoMensagem, erroMensagem) {
    const nomeAluno = document.getElementById("txtNomeCrianca").value.trim();
    const divAluno = document.getElementById("validacao-nome");

    const listarMensagemErro = document.getElementById("lista-erros-aluno");

    const regexNome = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;

    let listaDeErro = [];

    listarMensagemErro.innerHTML = "";
    erroMensagem.style.display = "none";
    divAluno.classList.remove("ui", "error");

    if (nomeAluno === "") {
        listaDeErro.push("O nome do aluno não pode estar vazio.");
    }

    if (!regexNome.test(nomeAluno) && nomeAluno !== "") {
        listaDeErro.push("O nome do aluno deve conter apenas letras e espaços.");
    }

    if (nomeAluno.split(" ").length < 2 && nomeAluno !== "") {
        listaDeErro.push("Informe o nome completo (nome e sobrenome).");
    }


    if (listaDeErro.length > 0) {
        divAluno.classList.add("ui", "error");
        erroMensagem.style.display = "block";
        sucessoMensagem.style.display = 'none'


        for (let i = 0; i < listaDeErro.length; i++) {
            const li = document.createElement("li");
            li.textContent = listaDeErro[i];
            listarMensagemErro.appendChild(li);
        }
    } else {
        sucessoMensagem.style.display = 'block'
        erroMensagem.style.display = 'none'
    }
}

function validarCampoCep(){
    
}
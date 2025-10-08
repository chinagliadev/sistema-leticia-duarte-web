function validarCadastroAluno() {
    const nomeAluno = document.getElementById("txtNomeCrianca").value.trim();
    const divAluno = document.getElementById("validacao-nome");
    const erroMensagem = document.getElementById("mensagem-erro-aluno");

    const regexNome = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;

    if (nomeAluno === "") {
        divAluno.classList.add("ui", "error");
        erroMensagem.textContent = 'Aluno não pode ter nome vazio'
    } 
    else if (!regexNome.test(nomeAluno)) {
        divAluno.classList.add("ui", "error");
    } 
    else if (nomeAluno.split(" ").length < 2) {
        divAluno.classList.add("ui", "error");
    } 
    else {
        divAluno.classList.remove("ui", "error");
    }
}
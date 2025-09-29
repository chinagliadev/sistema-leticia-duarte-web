<?php


session_start();

echo "<h1>Arquivo carregou com sucesso...</h1>";

require './class/Aluno.php';
require './class/Endereco.php';
require './config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (
        isset(
            $_POST['txtNomeCrianca'],
            $_POST['turma'],
            $_POST['txtDataNascimento'],
            $_POST['corRaca'],
            $_POST['txtCep'],
            $_POST['txtEndereco'],
            $_POST['txtNumero'],
            $_POST['txtBairro'],
            $_POST['txtCidade']
        )
    ) {

        $nome = $_POST['txtNomeCrianca'];
        $turma = $_POST['turma'];
        $dataNascimento = $_POST['txtDataNascimento'];
        $corRaca = $_POST['corRaca'];
        $cep = $_POST['txtCep'];
        $logradouro = $_POST['txtEndereco'];
        $numero = $_POST['txtNumero'];
        $bairro = $_POST['txtBairro'];
        $cidade = $_POST['txtCidade'];
        $complemento = $_POST['txtComplemento'] ?? '';

        $autorizacaoMed = isset($_POST['autorizacaoMed']) ? 1 : 0;
        $gotas = !empty($_POST['txtGotas']) ? 1 : 0;
        $remedio = $_POST['txtRemedio'] ?? null;
        $autorizacaoImagem = isset($_POST['autorizacaoImagem']) ? 1 : 0;

        $aluno = new Aluno();
        $enderecoObj = new Endereco();
        $funcionario_id = $_SESSION['usuario']['id'];

        $enderecoObj->cadastrarEndereco($cep, $logradouro, $numero, $bairro, $cidade, $complemento);

        $aluno->cadastrarAluno($nome, $dataNascimento, $corRaca, $turma, $autorizacaoMed, $remedio, $gotas, $autorizacaoImagem, $enderecoObj, $funcionario_id);

        echo "<script>
            alert('dados salvos com sucesso !')
        </script>";
    } 
}
?>

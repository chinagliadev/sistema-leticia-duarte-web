<?php
require './class/Aluno.php';
require './class/Responsavel.php';
require './class/Endereco.php';
require './class/EstruturaFamiliar.php'; // <-- INCLUSÃO DA NOVA CLASSE
require './config.php';

var_dump($_POST);

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // ------------------------------------
    // 1. Dados do Aluno e Endereço (Mantidos)
    // ------------------------------------
    $nome = $_POST['txtNomeCrianca'] ?? null;
    $turma = $_POST['turma'] ?? null;
    $dataNascimento = $_POST['txtDataNascimento'] ?? null;
    $corRaca = $_POST['corRaca'] ?? null;

    $cep = $_POST['txtCep'] ?? null;
    $logradouro = $_POST['txtEndereco'] ?? null;
    $numero = $_POST['txtNumero'] ?? null;
    $bairro = $_POST['txtBairro'] ?? null;
    $cidade = $_POST['txtCidade'] ?? null;
    $complemento = $_POST['txtComplemento'] ?? null;

    $autorizacaoMed = isset($_POST['autorizacaoMed']) ? 1 : 0;

    if ($autorizacaoMed) {
        $remedio = $_POST['txtRemedio'] ?? null;
        $gotas = $_POST['txtGotas'] ?? null;
    } else {
        $remedio = null;
        $gotas = null;
    }

    $autorizacaoImagem = isset($_POST['autorizacaoImagem']) ? 1 : 0;

    // ------------------------------------
    // 2. Processamento do Responsável (Mantido)
    // ------------------------------------
    $responsavel = new Responsavel();

    $tipo_responsavel_1 = $_POST['txtTipoResponsavel_1'] ?? null;
    $nome_responsavel_1 = $_POST['txtNomeResponsavel_1'] ?? null;
    $data_nascimento_1 = $_POST['txtDataNascimento_1'] ?? null; // Corrigindo a variável aqui
    $estado_civil_1 = $_POST['txtEstadoCivil_1'] ?? null;
    $escolaridade_1 = $_POST['txtEscolaridade_1'] ?? 'Não informado';
    $celular_1 = $_POST['txtTelefone_1'] ?? null;
    $email_1 = $_POST['txtEmail_1'] ?? null;
    $nome_empresa_1 = $_POST['txtNomeEmpresa_1'] ?? null;
    $profissao_1 = $_POST['txtProfissao_1'] ?? null;
    $telefone_trabalho_1 = $_POST['txtTelefoneTrabalho_1'] ?? null;
    $horario_trabalho_1 = $_POST['txtHorarioTrabalho_1'] ?? null;
    $salario_1 = $_POST['txtSalario_1'] ?? null;
    $renda_extra_1 = isset($_POST['toggleRendaExtra_1']) ? 1 : 0;


    $responsavel->cadastrarResponsavel(
        $tipo_responsavel_1,
        $nome_responsavel_1,
        $data_nascimento_1,
        $estado_civil_1,
        $escolaridade_1,
        $celular_1,
        $email_1,
        $nome_empresa_1,
        $profissao_1,
        $telefone_trabalho_1,
        $horario_trabalho_1,
        $salario_1,
        $renda_extra_1
    );

    // Responsável 2
    if (!empty($_POST['txtNomeResponsavel_2'])) {
        $tipo_responsavel_2 = $_POST['txtTipoResponsavel_2'] ?? null;
        $nome_responsavel_2 = $_POST['txtNomeResponsavel_2'] ?? null;
        $data_nascimento_2 = $_POST['txtDataNascimento_2'] ?? null;
        $estado_civil_2 = $_POST['txtEstadoCivil_2'] ?? "Não informado";
        $escolaridade_2 = $_POST['txtEscolaridade_2'] ?? null;
        $celular_2 = $_POST['txtTelefone_2'] ?? null;
        $email_2 = $_POST['txtEmail_2'] ?? null;
        $nome_empresa_2 = $_POST['txtNomeEmpresa_2'] ?? null;
        $profissao_2 = $_POST['txtProfissao_2'] ?? null;
        $telefone_trabalho_2 = $_POST['txtTelefoneTrabalho_2'] ?? null;
        $horario_trabalho_2 = $_POST['txtHorarioTrabalho_2'] ?? null;
        $salario_2 = $_POST['txtSalario_2'] ?? null;
        $renda_extra_2 = isset($_POST['toggleRendaExtra_2']) ? 1 : 0;

        $responsavel->cadastrarResponsavel(
            $tipo_responsavel_2,
            $nome_responsavel_2,
            $data_nascimento_2,
            $estado_civil_2,
            $escolaridade_2,
            $celular_2,
            $email_2,
            $nome_empresa_2,
            $profissao_2,
            $telefone_trabalho_2,
            $horario_trabalho_2,
            $salario_2,
            $renda_extra_2
        );
    }

    // ------------------------------------
    // 3. Cadastro do Endereço e do Aluno (Necessário para obter o aluno_id)
    // ------------------------------------
    $aluno = new Aluno();
    $enderecoObj = new Endereco();
    $funcionario_id = $_SESSION['usuario']['id'] ?? null;

    $endereco_id = $enderecoObj->cadastrarEndereco(
        $cep,
        $logradouro,
        $numero,
        $bairro,
        $cidade,
        $complemento
    );

    $aluno_id = $aluno->cadastrarAluno(
        $nome,
        $dataNascimento,
        $corRaca,
        $turma,
        $autorizacaoMed,
        $remedio,
        $gotas,
        $autorizacaoImagem,
        $endereco_id,
        $funcionario_id
    );

    var_dump($aluno_id);



    echo "<script>alert('Dados salvos com sucesso!');</script>";
}

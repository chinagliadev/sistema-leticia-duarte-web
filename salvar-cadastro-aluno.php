<?php
session_start();
require './config.php';

if (
    $_SERVER['REQUEST_METHOD'] == 'POST'
    &&
    isset(
        $_POST['txtNomeCrianca'],
        $_POST['txtDataNascimento'],
        $_POST['corRaca'],
        $_POST['turma'],
        $_POST['txtCep'],
        $_POST['txtEndereco'],
        $_POST['txtNumero'],
        $_POST['txtBairro'],
        $_POST['txtCidade'],
        $_POST['txtComplemento']
    )
) {


    $nome           = $_POST['txtNomeCrianca'];
    $dataNascimento = $_POST['txtDataNascimento'];
    $corRaca           = $_POST['corRaca'];
    $turma          = $_POST['turma'];
    $cep            = $_POST['txtCep'];
    $endereco       = $_POST['txtEndereco'];
    $numero         = $_POST['txtNumero'];
    $bairro         = $_POST['txtBairro'];
    $cidade         = $_POST['txtCidade'];
    $complemento    = $_POST['txtComplemento'];

    if (!empty($dataNascimento)) {
        if (strpos($dataNascimento, "/") !== false) {
            $partes = explode("/", $dataNascimento);
            if (count($partes) === 3) {
                $dataNascimento = $partes[2] . "-" . $partes[1] . "-" . $partes[0];
            }
        }
    }

    $autorizacaoMed = isset($_POST['autorizacaoMed']) ? 1 : 0;

    $gotas  = $autorizacaoMed ? ($_POST['txtGotas'] ?? null) : null;
    $remedio = $autorizacaoMed ? ($_POST['txtRemedio'] ?? null) : null;

    if ($autorizacaoMed && (empty($gotas) || empty($remedio))) {
        die("Erro: informe o remédio e a quantidade de gotas.");
    }

    $autorizacaoImagem = isset($_POST['autorizacaoImagem']) ? 1 : 0;

    $funcionario_id = $_SESSION['usuario']['id'] ?? null;
    if (!$funcionario_id) {
        die("Erro: funcionário não identificado na sessão.");
    }

    try {
        $sqlEndereco = "INSERT INTO endereco (cep, endereco, numero, bairro, cidade, complemento)
                        VALUES (:cep, :endereco, :numero, :bairro, :cidade, :complemento)";
        $stmt = $conn->prepare($sqlEndereco);
        $stmt->execute([
            'cep' => $cep,
            'endereco' => $endereco,
            'numero' => $numero,
            'bairro' => $bairro,
            'cidade' => $cidade,
            'complemento' => $complemento
        ]);

        $endereco_id = $conn->lastInsertId();

        $sqlAluno = "INSERT INTO tb_alunos (
                        nome, data_nascimento, etnia, turma,
                        autorizacao_febre, remedio, gotas, permissao_foto,
                        endereco_id, funcionario_id
                     ) VALUES (
                        :nome, :data_nascimento, :etnia, :turma,
                        :autorizacao_febre, :remedio, :gotas, :permissao_foto,
                        :endereco_id, :funcionario_id
                     )";

        $stmt = $conn->prepare($sqlAluno);
        $stmt->execute([
            'nome' => $nome,
            'data_nascimento' => $dataNascimento,
            'etnia' => $raca,
            'turma' => $turma,
            'autorizacao_febre' => $autorizacaoMed,
            'remedio' => $remedio,
            'gotas' => $gotas,
            'permissao_foto' => $autorizacaoImagem,
            'endereco_id' => $endereco_id,
            'funcionario_id' => $funcionario_id
        ]);

        header('location:cadastro-responsaveis.php');
    } catch (PDOException $e) {
        echo "Erro ao cadastrar aluno: " . $e->getMessage();
    }
} else {
    echo "<h2>Não foi possivel cadastrar usuario</h2>";
}
?>

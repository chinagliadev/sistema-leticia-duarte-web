<?php
echo '<h1>Cadastrados Excluir</h1>';
require_once './config.php';

$id = $_GET['idExluir'];

/* Apaga primeiro da tabela de ligação */
$deleteAutorizadas = $conn->prepare("
    DELETE FROM tb_matricula_pessoas_autorizadas 
    WHERE id_matricula IN (
        SELECT id_matricula FROM tb_matricula WHERE aluno = :id
    )
");

$deleteAutorizadas->execute([':id' => $id]);

$deleteMatricula = $conn->prepare("DELETE FROM tb_matricula WHERE aluno = :id");
$deleteMatricula->execute([':id' => $id]);

$deleteAluno = $conn->prepare("DELETE FROM tb_alunos WHERE ra_aluno = :id");
$deleteAluno->execute([':id' => $id]);

header('location:cadastrados.php');

?>
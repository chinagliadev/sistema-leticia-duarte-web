<?php
include './config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_funcionario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $cpf = $_POST['cpf'];

    $sql = "UPDATE tb_funcionario SET nome = ?, email = ?, celular = ?, cpf = ? WHERE id_funcionario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome, $email, $celular, $cpf, $id]);

    header("Location: perfil.php?sucesso=1");
    exit;
}
?>
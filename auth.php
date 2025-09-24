<?php
include "config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acao = $_POST['acao'];

    if ($acao == "cadastro") {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $celular = $_POST['celular'];
        $cpf = $_POST['cpf'];

        try {
            $sql = "INSERT INTO tb_funcionario (nome, email, senha, celular, cpf) VALUES (:nome, :email, :senha, :celular, :cpf)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":senha", $senha);
            $stmt->bindParam(":celular", $celular);
            $stmt->bindParam(":cpf", $cpf);

            if ($stmt->execute()) {
                echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='login.php';</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar!'); window.location.href='login.php';</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('Erro: " . $e->getMessage() . "'); window.location.href='login.php';</script>";
        }
    }

    if ($acao === "login") {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try {
            $sql = "SELECT * FROM tb_funcionario WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

                if (password_verify($senha, $usuario['senha'])) {
                    $_SESSION['usuario'] = [
                        'id' => $usuario['id_funcionario'],
                        'nome' => $usuario['nome'],
                        'email' => $usuario['email']
                    ];
                    echo "<script>alert('Login realizado com sucesso!'); window.location.href='cadastrados.php';</script>";
                } else {
                    echo "<script>alert('Senha incorreta!'); window.location.href='login.php';</script>";
                }
            } else {
                echo "<script>alert('Usuário não encontrado!'); window.location.href='login.php';</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('Erro: " . $e->getMessage() . "'); window.location.href='login.php';</script>";
        }
    }
}
?>

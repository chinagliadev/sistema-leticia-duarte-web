<?php
include "config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $acao = $_POST['acao'];

    // ===================== CADASTRO =====================
    if ($acao == "cadastro") {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $senha_confirm = $_POST['senha_confirm'];
        $celular = $_POST['celular'];
        $cpf = $_POST['cpf'];

        // Verifica se as senhas conferem
        if ($senha !== $senha_confirm) {
            $_SESSION['mensagem'] = [
                'tipo' => 'error',
                'titulo' => 'Erro!',
                'texto' => 'As senhas não conferem.'
            ];
            header("Location: login.php");
            exit;
        }

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO tb_funcionario (nome, email, senha, celular, cpf) VALUES (:nome, :email, :senha, :celular, :cpf)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":senha", $senha_hash);
            $stmt->bindParam(":celular", $celular);
            $stmt->bindParam(":cpf", $cpf);

            if ($stmt->execute()) {
                $_SESSION['mensagem'] = [
                    'tipo' => 'success',
                    'titulo' => 'Sucesso!',
                    'texto' => 'Cadastro realizado com sucesso!'
                ];
            } else {
                $_SESSION['mensagem'] = [
                    'tipo' => 'error',
                    'titulo' => 'Erro!',
                    'texto' => 'Erro ao cadastrar. Tente novamente.'
                ];
            }
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = [
                'tipo' => 'error',
                'titulo' => 'Erro!',
                'texto' => 'Erro: ' . $e->getMessage()
            ];
        }

        header("Location: login.php");
        exit;
    }

    // ===================== LOGIN =====================
    if ($acao == "login") {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try {
            $sql = "SELECT * FROM tb_funcionario WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                $_SESSION['usuario'] = [
                    'id' => $usuario['id_funcionario'],
                    'nome' => $usuario['nome'],
                    'email' => $usuario['email']
                ];

                header("Location: cadastrados.php");
                exit;
            } else {
                $_SESSION['mensagem'] = [
                    'tipo' => 'error',
                    'titulo' => 'Erro!',
                    'texto' => 'E-mail ou Senha incorretos!'
                ];
                header("Location: login.php");
                exit;
            }
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = [
                'tipo' => 'error',
                'titulo' => 'Erro!',
                'texto' => 'Erro: ' . $e->getMessage()
            ];
            header("Location: login.php");
            exit;
        }
    }
}

<?php
include "config.php";
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer-master/src/Exception.php';
require __DIR__ . '/PHPMailer-master/src/PHPMailer.php';
require __DIR__ . '/PHPMailer-master/src/SMTP.php';

// ===================== FUNÇÃO PARA ENVIAR E-MAIL COM PHPMailer =====================
function enviarEmail($emailDestino, $codigo)
{
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sistemaleticiaduarte@gmail.com';
        $mail->Password = 'tokierjgeerdzero';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('sistemaleticiaduarte@gmail.com', 'Sistema Leticia Duarte');
        $mail->addAddress($emailDestino);

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'Código de recuperação de senha';
        $mail->Body = "<p>Seu código de recuperação é:</p>
                       <h2 style='color:#1C86CC;'>$codigo</h2>
                       <p>O código expira em 3 minutos.</p>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// ===================== TRATAMENTO DE REQUISIÇÕES =====================
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

        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        try {
            $sql = "INSERT INTO tb_funcionario (nome,email,senha,celular,cpf) VALUES (:nome,:email,:senha,:celular,:cpf)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":senha", $senha_hash);
            $stmt->bindParam(":celular", $celular);
            $stmt->bindParam(":cpf", $cpf);

            if ($stmt->execute()) {
                $_SESSION['mensagem'] = ['tipo' => 'success', 'titulo' => 'Sucesso!', 'texto' => 'Cadastro realizado com sucesso!'];
            } else {
                $_SESSION['mensagem'] = ['tipo' => 'error', 'titulo' => 'Erro!', 'texto' => 'Erro ao cadastrar.'];
            }
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = ['tipo' => 'error', 'titulo' => 'Erro!', 'texto' => $e->getMessage()];
        }
        header("Location: login.php");
        exit;
    }

    // ===================== LOGIN =====================
    if ($acao == "login") {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try {
            $sql = "SELECT * FROM tb_funcionario WHERE email=:email";
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
                $_SESSION['mensagem'] = ['tipo' => 'error', 'titulo' => 'Erro!', 'texto' => 'E-mail ou senha incorretos!'];
                header("Location: login.php");
                exit;
            }
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = ['tipo' => 'error', 'titulo' => 'Erro!', 'texto' => $e->getMessage()];
            header("Location: login.php");
            exit;
        }
    }

    // ===================== ESQUECEU SENHA - VERIFICA EMAIL =====================
    if ($acao == "check_email") {
        $email = $_POST['email'];
        $sql = "SELECT * FROM tb_funcionario WHERE email=:email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'E-mail não encontrado']);
        }
        exit;
    }

    // ===================== ESQUECEU SENHA - VERIFICA CELULAR + CPF =====================
    if ($acao == "check_cel_cpf") {
        $email = $_POST['email'];
        $cel = $_POST['celular'];
        $cpf = $_POST['cpf'];

        $sql = "SELECT * FROM tb_funcionario WHERE email=:email AND celular=:celular AND cpf=:cpf";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":celular", $cel);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Gerar código e enviar e-mail
            $codigo = rand(100000, 999999);
            $expira_em = date("Y-m-d H:i:s", strtotime("+3 minutes"));

            $sql = "UPDATE tb_funcionario SET reset_token=:codigo, token_expira=:expira WHERE email=:email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":codigo", $codigo);
            $stmt->bindParam(":expira", $expira_em);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            if (enviarEmail($email, $codigo)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Não foi possível enviar o e-mail']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Celular ou CPF incorretos']);
        }
        exit;
    }

    // ===================== ESQUECEU SENHA - VALIDAR CÓDIGO =====================
    if ($acao == "verify_otp") {
        $email = $_POST['email'];
        $codigo = $_POST['codigo'];

        $sql = "SELECT * FROM tb_funcionario WHERE email=:email AND reset_token=:codigo AND token_expira>NOW()";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":codigo", $codigo);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            $_SESSION['reset_email'] = $email;
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Código incorreto ou expirado']);
        }
        exit;
    }

    // ===================== ESQUECEU SENHA - NOVA SENHA =====================
    if ($acao == "reset_password") {
        $nova_senha = $_POST['nova_senha'];
        $confirmar = $_POST['confirmar'];
        $email = $_SESSION['reset_email'] ?? '';

        if ($nova_senha !== $confirmar) {
            echo json_encode(['success' => false, 'message' => 'As senhas não conferem']);
            exit;
        }

        $senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
        $sql = "UPDATE tb_funcionario SET senha=:senha, reset_token=NULL, token_expira=NULL WHERE email=:email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":senha", $senha_hash);
        $stmt->bindParam(":email", $email);

        if ($stmt->execute()) {
            unset($_SESSION['reset_email']);
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao atualizar a senha']);
        }
        exit;
    }
}

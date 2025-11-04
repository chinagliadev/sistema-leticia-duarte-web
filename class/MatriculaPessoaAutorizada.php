<?php
class PessoaAutorizada
{

    private $conn;

    public function __construct()
    {
        $dsn = "mysql:dbname={$_ENV['BANCO']};host={$_ENV['HOST']}";
        $usuario = $_ENV['USUARIO'];
        $senha = $_ENV['SENHA'];

        $this->conn = new PDO($dsn, $usuario, $senha);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function cadastrarPessoaAutorizada($nome, $cpf, $celular, $parentesco){

        $sqlInserir = "INSERT INTO tb_pessoas_autorizadas (nome, cpf, celular, parentesco) VALUES (:nome, :cpf, :celular, :parentesco)";

        $dados = $this->conn->prepare($sqlInserir);

        $dados->execute([
            ":nome" => $nome,
            ":cpf" => $cpf,
            ":celular" => $celular,
            ":parentesco" => $parentesco
        ]);


        return $this->conn->lastInsertId();
    }

    public function atualizarPessoaAutorizada($id, $nome, $cpf, $celular, $parentesco)
    {
        $sql = "UPDATE tb_pessoas_autorizadas SET
                    nome = :nome,
                    cpf = :cpf,
                    celular = :celular,
                    parentesco = :parentesco
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':celular' => $celular,
            ':parentesco' => $parentesco,
            ':id' => $id
        ]);

        return $stmt->rowCount();
    }
}

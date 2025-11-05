<?php
class MatriculaPessoaAutorizada
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

    public function cadastrarMatriculaPessoaAutorizada($matricula_id, $pessoa_autorizada_id)
    {
        $sql = "INSERT INTO tb_matricula_pessoas_autorizadas (matricula_id, pessoa_autorizada_id)
                VALUES (:matricula_id, :pessoa_autorizada_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':matricula_id' => $matricula_id,
            ':pessoa_autorizada_id' => $pessoa_autorizada_id
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

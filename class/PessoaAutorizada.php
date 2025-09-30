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

}


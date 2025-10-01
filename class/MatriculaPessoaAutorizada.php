<?php

class matriculaPessoaAutorizada
{
    private $conn;

    public $matricula_id;
    public $pessoa_autorizada_id;

    public function __construct()
    {
        $dsn = "mysql:dbname={$_ENV['BANCO']};host={$_ENV['HOST']}";
        $usuario = $_ENV['USUARIO'];
        $senha = $_ENV['SENHA'];

        $this->conn = new PDO($dsn, $usuario, $senha);
    }


    public function cadastrarMatriculaPessoaAutorizada($matricula_id ,$pessoa_autorizada_id){
        $sqlInserir = "INSERT INTO tb_matricula_pessoas_autorizadas (matricula_id, pessoa_autorizada_id) 
                        VALUES (:matricula_id, :pessoa_autorizada_id)";

        $dados = $this->conn->prepare($sqlInserir);

        $dados->execute([
            ":matricula_id" => $matricula_id,
            ":pessoa_autorizada_id" => $pessoa_autorizada_id
        ]);
    }


}

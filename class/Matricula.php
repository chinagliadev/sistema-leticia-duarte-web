<?php

class Matricula
{
    private $conn;

    public $aluno_id;
    public $estrutura_familiar_id;
    public $funcionario_id;
    public $responsavel_1_id;
    public $responsavel_2_id;

    public function __construct()
    {
        $dsn = "mysql:dbname={$_ENV['BANCO']};host={$_ENV['HOST']}";
        $usuario = $_ENV['USUARIO'];
        $senha = $_ENV['SENHA'];

        $this->conn = new PDO($dsn, $usuario, $senha);
    }

    public function cadastrarMatricula($aluno_id, $estrutura_familiar_id, $funcionario_id, $responsavel_1_id, $responsavel_2_id = null){

        $sqlInserir = "INSERT INTO tb_matricula (aluno_id, estrutura_familiar_id, funcionario_id, responsavel_1_id, responsavel_2_id) 
                        VALUES (:aluno_id, :estrutura_familiar_id, :funcionario_id, :responsavel_1_id, :responsavel_2_id)";

        $dados = $this->conn->prepare($sqlInserir);

        $dados->execute([
            ":aluno_id" => $aluno_id,
            ":estrutura_familiar_id" => $estrutura_familiar_id,
            ":funcionario_id" => $funcionario_id,
            ":responsavel_1_id" => $responsavel_1_id,
            ":responsavel_2_id" => $responsavel_2_id,
        ]);

        return $this->conn->lastInsertId();
    }


}

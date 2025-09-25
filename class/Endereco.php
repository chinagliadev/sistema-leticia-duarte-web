<?php

class Endereco{

    private $conn;

    public $cep;
    public $endereco;
    public $numero;
    public $bairro;
    public $cidade;
    public $complemento;


     public function __construct()
    {
        $dsn = "mysql:dbname={$_ENV['BANCO']};host={$_ENV['HOST']}";
        $usuario = $_ENV['USUARIO'];
        $senha = $_ENV['SENHA'];

        $this->conn = new PDO($dsn, $usuario, $senha);
    }

    public function cadastrarEndereco($cep, $endereco, $numero, $bairro, $cidade, $complemento = 'Sem complemento'){
        $sqlInserir = "INSERT INTO endereco (cep, endereco, numero, bairro, cidade, complemento) 
                        VALUES 
                        (:cep, :endereco, :numero, :bairro, :cidade, :complemento)";

        $dados = $this->conn->prepare($sqlInserir);

        $dados->execute([
            ':cep' => $cep,
            ':endereco' => $endereco,
            ':numero' => $numero,
            ':bairro' => $bairro,
            ':cidade' => $cidade,
            ':complemento' => $complemento
        ]);

         return $this->conn->lastInsertId();
    }

}

?>
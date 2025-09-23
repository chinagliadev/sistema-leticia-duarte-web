<?php

class Endereco
{

    private $conn;

    public $cep;
    public $endereco;
    public $numero;
    public $bairro;
    public $cidade;
    public $complemento;

    public function __construct()
    {
        $dns = "mysql:dbname={$_ENV['BANCO']};host={$_ENV['HOST']}";
        $usuario = $_ENV['USUARIO'];
        $senha = $_ENV['SENHA'];

        $this->conn = new PDO($dns, $usuario, $senha);
    }
}

<?php

class Aluno{

    private $conn;

    public $nome;
    public $data_nascimento;
    public $etnia;
    public $turma;
    public $autorizacao_febre;
    public $remedio;
    public $gotas;
    public $permissao_foto;
    public $endereco_id;
    public $funcionario_id;

    public function __construct()
    {
        $dsn = "mysql:dbname={$_ENV['BANCO']};host={$_ENV['HOST']}";
        $usuario = $_ENV['USUARIO'];
        $senha = $_ENV['SENHA'];

        $this->conn = new PDO($dsn, $usuario, $senha);
    }


    public function cadastrarAluno($nome, $data_nascimento, $etnia, $turma, $autorizacao_febre = 0, $remedio = '', $gotas = 0, $permissao_foto = 0, $endereco_id, $funcionario_id){

        $sqlInserir = "INSERT INTO tb_alunos 
        (nome, data_nascimento, etnia, turma, autorizacao_febre, remedio, gotas, permissao_foto, endereco_id, funcionario_id)
        VALUES
        (:nome, :data_nascimento, :etnia, :turma, :autorizacao_febre, :remedio, :gotas, :permissao_foto, :endereco_id, :funcionario_id)
        ";

        $dados = $this->conn->prepare($sqlInserir);

        $dados->execute([
            ':nome' => $nome,
            ':data_nascimento' => $data_nascimento,
            ':etnia' => $etnia,
            ':turma' => $turma,
            ':autorizacao_febre' => $autorizacao_febre,
            ':remedio' => $remedio,
            ':gotas' => $gotas,
            ':permissao_foto' => $permissao_foto,
            ':endereco_id' => $endereco_id,
            ':funcionario_id' => $funcionario_id
        ]);

        return $dados;
    }


}

?>
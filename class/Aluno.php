<?php
$_ENV = parse_ini_file('.env');


class Aluno
{

    private $conn;

    public $id;
    public $nome;
    public $turma;
    public $dataNascimento;
    public $corRaca;
    public $autorizacaoMed;
    public $gotas;
    public $remedio;
    public $autorizacaoImagem;


    public function __construct()
    {
        $dns = "mysql:dbname={$_ENV['BANCO']};host={$_ENV['HOST']}";
        $usuario = $_ENV['USUARIO'];
        $senha = $_ENV['SENHA'];

        $this->conn = new PDO($dns, $usuario, $senha);
    }

    public function inserirAluno($nome, $dataNascimento, $corRaca, $turma, $autorizacaoFebre, $remedio, $gotas, $permissaoFoto, $endereco_id, $funcionario_id)
    {

        $sqlAluno = "INSERT INTO tb_alunos (
                        nome, data_nascimento, etnia, turma,
                        autorizacao_febre, remedio, gotas, permissao_foto,
                        endereco_id, funcionario_id
                     ) VALUES (
                        :nome, :data_nascimento, :etnia, :turma,
                        :autorizacao_febre, :remedio, :gotas, :permissao_foto,
                        :endereco_id, :funcionario_id
                     )";

        
        $dados = $this->conn->prepare($sqlAluno);
        $dados->execute([
            'nome' => $nome,
            'data_nascimento' => $dataNascimento,
            'etnia' => $corRaca,
            'turma' => $turma,
            'autorizacao_febre' => $autorizacaoFebre,
            'remedio' => $remedio,
            'gotas' => $gotas,
            'permissao_foto' => $permissaoFoto,
            'endereco_id' => $endereco_id,
            'funcionario_id' => $funcionario_id
        ]);

        if(!empty($dados)){
            return true;
        }else{
            return false;
        }

    }
}

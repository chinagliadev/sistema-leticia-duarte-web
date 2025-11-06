<?php

class Aluno
{

    private $conn;

    public $nome;
    public $cpf;
    public $ra_aluno;
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
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function cadastrarAluno($raAluno, $nome, $cpf, $rg = null, $data_nascimento, $etnia, $turma, $autorizacao_febre, $remedio, $gotas, $permissao_foto, $endereco_id, $funcionario_id)
    {

        $sqlInserir = "INSERT INTO tb_alunos 
        (ra_aluno, nome, cpf, rg, data_nascimento, etnia, turma, autorizacao_febre, remedio, gotas, permissao_foto, endereco_id, funcionario_id)
        VALUES
        (:ra_aluno, :nome, :cpf, :rg, :data_nascimento, :etnia, :turma, :autorizacao_febre, :remedio, :gotas, :permissao_foto, :endereco_id, :funcionario_id)
        ";

        $dados = $this->conn->prepare($sqlInserir);

        $dados->execute([
            ':ra_aluno' => $raAluno,
            ':nome' => $nome,
            ':cpf' => $cpf,
            ':rg' => $rg,
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

        return $this->conn->lastInsertId();
    }

    public function atualizarAlunoByRa($idAluno, $dados)
    {
        $sql = "UPDATE tb_alunos SET
                ra_aluno = :ra_aluno,
                nome = :nome,
                cpf = :cpf,
                rg = :rg,
                data_nascimento = :data_nascimento,
                etnia = :etnia,
                turma = :turma,
                autorizacao_febre = :autorizacao_febre,
                remedio = :remedio,
                gotas = :gotas,
                permissao_foto = :permissao_foto
            WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ra_aluno' => $dados['ra_aluno'] ?? null,
            ':nome' => $dados['nome'] ?? null,
            ':cpf' => $dados['cpf'] ?? null,
            ':rg' => $dados['rg'] ?? null,
            ':data_nascimento' => $dados['data_nascimento'] ?? null,
            ':etnia' => $dados['etnia'] ?? null,
            ':turma' => $dados['turma'] ?? null,
            ':autorizacao_febre' => $dados['autorizacao_febre'] ?? 0,
            ':remedio' => $dados['remedio'] ?? null,
            ':gotas' => $dados['gotas'] ?? null,
            ':permissao_foto' => $dados['permissao_foto'] ?? 0,
            ':id' => $idAluno
        ]);

        return $stmt->rowCount();
    }

    public function atualizarEnderecoIdByRa($id_aluno, $endereco_id)
    {
        $sql = "UPDATE tb_alunos SET endereco_id = :endereco_id WHERE id = :id_aluno";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':endereco_id' => $endereco_id,
            ':id_aluno' => $id_aluno
        ]);
        return $stmt->rowCount();
    }
}

<?php


class Responsavel
{

    private $conn;

    public $tipo_responsavel;
    public $nome;
    public $data_nascimento;
    public $estado_civil;
    public $escolaridade;
    public $celular;
    public $email;
    public $nome_empresa;
    public $profissao;
    public $telefone_trabalho;
    public $horario_trabalho;
    public $salario;
    public $renda_extra;
    public $valor_renda_extra;

    public function __construct()
    {
        $dsn = "mysql:dbname={$_ENV['BANCO']};host={$_ENV['HOST']}";
        $usuario = $_ENV['USUARIO'];
        $senha = $_ENV['SENHA'];

        $this->conn = new PDO($dsn, $usuario, $senha);
    }

    public function cadastrarResponsavel(
        $tipo_responsavel,
        $nome,
        $data_nascimento,
        $estado_civil,
        $escolaridade,
        $celular,
        $email,
        $nome_empresa,
        $profissao,
        $telefone_trabalho,
        $horario_trabalho,
        $salario,
        $renda_extra,
        $valor_renda_extra
    ) {
        $sqlInserir = "INSERT INTO tb_responsaveis
            (tipo_responsavel, nome, data_nascimento, estado_civil, escolaridade, celular, email, nome_empresa, profissao, telefone_trabalho, horario_trabalho, salario, renda_extra, valor_renda_extra)
            VALUES
            (:tipo_responsavel, :nome, :data_nascimento, :estado_civil, :escolaridade, :celular, :email, :nome_empresa, :profissao, :telefone_trabalho, :horario_trabalho, :salario, :renda_extra, :valor_renda_extra)";

        $dados = $this->conn->prepare($sqlInserir);

        $dados->execute([
            ':tipo_responsavel' => $tipo_responsavel,
            ':nome' => $nome,
            ':data_nascimento' => $data_nascimento,
            ':estado_civil' => $estado_civil,
            ':escolaridade' => $escolaridade,
            ':celular' => $celular,
            ':email' => $email,
            ':nome_empresa' => $nome_empresa,
            ':profissao' => $profissao,
            ':telefone_trabalho' => $telefone_trabalho,
            ':horario_trabalho' => $horario_trabalho,
            ':salario' => $salario,
            ':renda_extra' => $renda_extra,
            ':valor_renda_extra' => $valor_renda_extra
        ]);

        return $this->conn->lastInsertId();
    }
}

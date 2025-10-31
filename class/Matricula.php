<?php

class Matricula
{
    private $conn;

    public $aluno_id;
    public $estrutura_familiar_id;
    public $funcionario_id;
    public $responsavel_1_id;
    public $responsavel_2_id;
    public $pessoa_autorizada_1_id;
    public $pessoa_autorizada_2_id;
    public $pessoa_autorizada_3_id;
    public $pessoa_autorizada_4_id;

    const MATRICULA_DESATIVADA = 0;
    const MATRICULA_ATIVA = 1;

    public function __construct()
    {
        $dsn = "mysql:dbname={$_ENV['BANCO']};host={$_ENV['HOST']}";
        $usuario = $_ENV['USUARIO'];
        $senha = $_ENV['SENHA'];

        try {
            $this->conn = new PDO($dsn, $usuario, $senha);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro de Conexão com o Banco de Dados: " . $e->getMessage());
        }
    }

    public function cadastrarMatricula($aluno_id, $estrutura_familiar_id, $funcionario_id, $responsavel_1_id, $responsavel_2_id, $pessoa_autorizada_1_id, $pessoa_autorizada_2_id, $pessoa_autorizada_3_id, $pessoa_autorizada_4_id)
    {
        $sqlInserir = "INSERT INTO tb_matricula 
                         (aluno_id, estrutura_familiar_id, funcionario_id, responsavel_1_id, responsavel_2_id, pessoa_autorizada_1_id, pessoa_autorizada_2_id, pessoa_autorizada_3_id, pessoa_autorizada_4_id) 
                         VALUES 
                         (:aluno_id, :estrutura_familiar_id, :funcionario_id, :responsavel_1_id, :responsavel_2_id, :pessoa_autorizada_1_id, :pessoa_autorizada_2_id, :pessoa_autorizada_3_id, :pessoa_autorizada_4_id)";

        $dados = $this->conn->prepare($sqlInserir);

        $dados->execute([
            ":aluno_id" => $aluno_id,
            ":estrutura_familiar_id" => $estrutura_familiar_id,
            ":funcionario_id" => $funcionario_id,
            ":responsavel_1_id" => $responsavel_1_id,
            ":responsavel_2_id" => $responsavel_2_id,
            ":pessoa_autorizada_1_id" => $pessoa_autorizada_1_id,
            ":pessoa_autorizada_2_id" => $pessoa_autorizada_2_id,
            ":pessoa_autorizada_3_id" => $pessoa_autorizada_3_id,
            ":pessoa_autorizada_4_id" => $pessoa_autorizada_4_id
        ]);

        return $this->conn->lastInsertId();
    }


    public function listarMatricula(): array
    {
        $sqlListar =
            "SELECT 
        tb_alunos.id, 
        tb_alunos.ra_aluno, 
        tb_alunos.nome AS nome_aluno, 
        tb_alunos.data_nascimento, 
        tb_alunos.turma, 
        tb_responsaveis.nome AS nome_responsavel,
        tb_matricula.matricula_ativada AS matricula
            FROM tb_matricula
        INNER JOIN tb_alunos ON tb_matricula.aluno_id = tb_alunos.id
        INNER JOIN tb_responsaveis ON tb_matricula.responsavel_1_id = tb_responsaveis.id_responsavel
        WHERE matricula_ativada = 1;
";

        $dados = $this->conn->query($sqlListar)->fetchAll();
        return $dados;
    }

    public function listarMatriculaDesativada(): array
    {
        $sqlListar =
            "SELECT 
        tb_alunos.id, 
        tb_alunos.ra_aluno, 
        tb_alunos.nome AS nome_aluno, 
        tb_alunos.data_nascimento, 
        tb_alunos.turma, 
        tb_responsaveis.nome AS nome_responsavel,
        tb_matricula.matricula_ativada AS matricula
            FROM tb_matricula
        INNER JOIN tb_alunos ON tb_matricula.aluno_id = tb_alunos.id
        INNER JOIN tb_responsaveis ON tb_matricula.responsavel_1_id = tb_responsaveis.id_responsavel
        WHERE matricula_ativada = 0;
";

        $dados = $this->conn->query($sqlListar)->fetchAll();
        return $dados;
    }

    public function desativarMatricula($idAluno): bool
    {
        $sqlDesativarMatricula = "UPDATE tb_matricula 
                                  SET matricula_ativada = :situacao WHERE aluno_id = :id
        ";

        $dadosDesativarMatricula = $this->conn->prepare($sqlDesativarMatricula);
        $dadosDesativarMatricula->execute([
            ':situacao' => self::MATRICULA_DESATIVADA,
            ':id' => $idAluno
        ]);

        return $dadosDesativarMatricula->rowCount() > 0;
    }

    public function reativarMatricula($idAluno): bool
    {
        $sqlAtivarMatricula = "UPDATE tb_matricula 
                                  SET matricula_ativada = :situacao WHERE aluno_id = :id
        ";

        $dadosAtivarMatricula = $this->conn->prepare($sqlAtivarMatricula);
        $dadosAtivarMatricula->execute([
            ':situacao' => self::MATRICULA_ATIVA,
            ':id' => $idAluno
        ]);

        return $dadosAtivarMatricula->rowCount() > 0;
    }

    public function buscarDadosCompletosAluno($ra_aluno)
    {
        $dadosCompletos = [
            'aluno' => null,
            'endereco' => null,
            'matricula' => null,
            'responsavel_1' => null,
            'responsavel_2' => null,
            'estrutura_familiar' => null,
            'pessoa_autorizada_1' => null,
            'pessoa_autorizada_2' => null,
            'pessoa_autorizada_3' => null, 
            'pessoa_autorizada_4' => null  
        ];

        $sqlIdAluno = "SELECT id FROM tb_alunos WHERE ra_aluno = :ra_aluno";
        $stmtId = $this->conn->prepare($sqlIdAluno);
        $stmtId->execute([':ra_aluno' => $ra_aluno]);
        $idAluno = $stmtId->fetchColumn();

        if (!$idAluno) {
            return false;
        }

        $sqlMatricula = "SELECT * FROM tb_matricula WHERE aluno_id = :aluno_id";
        $stmtMatricula = $this->conn->prepare($sqlMatricula);
        $stmtMatricula->execute([':aluno_id' => $idAluno]);
        $dadosCompletos['matricula'] = $stmtMatricula->fetch();

        if (!$dadosCompletos['matricula']) {
            return false;
        }

        $matricula = $dadosCompletos['matricula'];

        $resp1_id = $matricula['responsavel_1_id'];
        $resp2_id = $matricula['responsavel_2_id'];
        $estrutura_id = $matricula['estrutura_familiar_id'];
        $pessoa_autorizada_1_id = $matricula['pessoa_autorizada_1_id'];
        $pessoa_autorizada_2_id = $matricula['pessoa_autorizada_2_id'];
        $pessoa_autorizada_3_id = $matricula['pessoa_autorizada_3_id']; // Novo
        $pessoa_autorizada_4_id = $matricula['pessoa_autorizada_4_id']; // Novo

        $sqlAluno = "SELECT * FROM tb_alunos WHERE id = :id";
        $stmtAluno = $this->conn->prepare($sqlAluno);
        $stmtAluno->execute([':id' => $idAluno]);
        $dadosCompletos['aluno'] = $stmtAluno->fetch();

        $endereco_id = $dadosCompletos['aluno']['endereco_id'] ?? null;

        $buscarPorId = function ($tabela, $colunaId, $id) {
            if (!$id) return null;
            $sql = "SELECT * FROM $tabela WHERE $colunaId = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        };

        $dadosCompletos['endereco'] = $buscarPorId('endereco', 'id_endereco', $endereco_id);
        $dadosCompletos['responsavel_1'] = $buscarPorId('tb_responsaveis', 'id_responsavel', $resp1_id);
        $dadosCompletos['responsavel_2'] = $buscarPorId('tb_responsaveis', 'id_responsavel', $resp2_id);
        $dadosCompletos['estrutura_familiar'] = $buscarPorId('tb_estrutura_familiar', 'id', $estrutura_id);
        $dadosCompletos['pessoa_autorizada_1'] = $buscarPorId('tb_pessoas_autorizadas', 'id', $pessoa_autorizada_1_id);
        $dadosCompletos['pessoa_autorizada_2'] = $buscarPorId('tb_pessoas_autorizadas', 'id', $pessoa_autorizada_2_id);
        $dadosCompletos['pessoa_autorizada_3'] = $buscarPorId('tb_pessoas_autorizadas', 'id', $pessoa_autorizada_3_id); // Novo
        $dadosCompletos['pessoa_autorizada_4'] = $buscarPorId('tb_pessoas_autorizadas', 'id', $pessoa_autorizada_4_id); // Novo

        return $dadosCompletos;
    }


    public function pesquisarAluno($termoPesquisa)
    {
        $termoLike = '%' . $termoPesquisa . '%';

        $sqlPesquisar = "SELECT
                tb_alunos.id,
                tb_alunos.ra_aluno, 
                tb_alunos.nome AS nome_aluno, 
                tb_alunos.data_nascimento, 
                tb_alunos.turma,
                tb_responsaveis.nome AS nome_responsavel,
                tb_matricula.matricula_ativada AS matricula
                    FROM tb_matricula
                    INNER JOIN tb_alunos ON tb_matricula.aluno_id = tb_alunos.id
                    INNER JOIN tb_responsaveis ON tb_matricula.responsavel_1_id = tb_responsaveis.id_responsavel
                WHERE 
                tb_alunos.ra_aluno = :termoPesquisa  
                OR tb_alunos.nome LIKE :termoLike    
                OR tb_responsaveis.nome LIKE :termoLike";

        $stmt = $this->conn->prepare($sqlPesquisar);

        $stmt->execute([
            ':termoPesquisa' => $termoPesquisa,
            ':termoLike' => $termoLike
        ]);

        return $stmt->fetchAll();
    }

    public function filtrarTurma($turma)
    {

        if ($turma === 'matriculas-ativadas') {
            return $this->listarMatricula();
        } else if ($turma === 'matriculas-desativadas') {
            return $this->listarMatriculaDesativada();
        }

        $sqlFiltrar = "SELECT 
        tb_alunos.id, 
        tb_alunos.ra_aluno, 
        tb_alunos.nome AS nome_aluno, 
        tb_alunos.data_nascimento, 
        tb_alunos.turma,
        tb_responsaveis.nome AS nome_responsavel,
        tb_matricula.matricula_ativada AS matricula
            FROM tb_matricula
        INNER JOIN tb_alunos ON tb_matricula.aluno_id = tb_alunos.id
        INNER JOIN tb_responsaveis ON tb_matricula.responsavel_1_id = tb_responsaveis.id_responsavel
        WHERE matricula_ativada = 1 AND turma = :turma";

        $dadosFiltro = $this->conn->prepare($sqlFiltrar);

        $dadosFiltro->execute([
            ':turma' => $turma
        ]);

        return $dadosFiltro->fetchAll();
    }
}

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

    public function cadastrarMatricula($aluno_id, $estrutura_familiar_id, $funcionario_id, $responsavel_1_id, $responsavel_2_id = null)
    {

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


    public function listarMatricula(): array
    {
        $sqlListar =
            "SELECT tb_alunos.ra_aluno, tb_alunos.nome as nome_aluno, tb_alunos.data_nascimento, tb_responsaveis.nome as nome_responsavel
                FROM
            tb_matricula
                INNER JOIN tb_alunos ON tb_matricula.aluno_id = tb_alunos.ra_aluno
                INNER JOIN tb_responsaveis ON tb_matricula.responsavel_1_id = tb_responsaveis.id_responsavel";

        $dados = $this->conn->query($sqlListar)->fetchAll();
        return $dados;
    }

    public function deletarAlunoCompleto($aluno_id)
    {
        $sqlBuscaChaves = "SELECT id_matricula, responsavel_1_id, responsavel_2_id, estrutura_familiar_id 
                            FROM tb_matricula 
                            WHERE aluno_id = :id";

        $dadosChaves = $this->conn->prepare($sqlBuscaChaves);
        $dadosChaves->execute([":id" => $aluno_id]);
        
        $matricula = $dadosChaves->fetch(); 

        if (!$matricula) {
            $this->deletarAlunoPrincipal($aluno_id);
            return true;
        }

        $id_matricula = $matricula['id_matricula'];
        $resp1_id = $matricula['responsavel_1_id'];
        $resp2_id = $matricula['responsavel_2_id'];
        $estrutura_id = $matricula['estrutura_familiar_id'];


        $sqlDeletarPessoas = "DELETE FROM tb_matricula_pessoas_autorizadas WHERE matricula_id = :id_matricula";
        $this->conn->prepare($sqlDeletarPessoas)->execute([":id_matricula" => $id_matricula]);


        $sqlDeletarMatricula = "DELETE FROM tb_matricula WHERE aluno_id = :id";
        $this->conn->prepare($sqlDeletarMatricula)->execute([":id" => $aluno_id]);


        if ($resp1_id) {
            $sqlDeletarResp1 = "DELETE FROM tb_responsaveis WHERE id_responsavel = :id";
            $this->conn->prepare($sqlDeletarResp1)->execute([":id" => $resp1_id]);
        }
        if ($resp2_id) {
            $sqlDeletarResp2 = "DELETE FROM tb_responsaveis WHERE id_responsavel = :id";
            $this->conn->prepare($sqlDeletarResp2)->execute([":id" => $resp2_id]);
        }

        if ($estrutura_id) {
            $sqlDeletarEstrutura = "DELETE FROM tb_estrutura_familiar WHERE id = :estrutura_id";
            $this->conn->prepare($sqlDeletarEstrutura)->execute([":estrutura_id" => $estrutura_id]);
        }

        $this->deletarAlunoPrincipal($aluno_id);

        return true;
    }

    private function deletarAlunoPrincipal($aluno_id)
    {
        $sqlDeletarAluno = "DELETE FROM tb_alunos WHERE ra_aluno = :id";
        $this->conn->prepare($sqlDeletarAluno)->execute([":id" => $aluno_id]);
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
            'autorizados' => [],
        ];

        $sqlMatricula = "SELECT * FROM tb_matricula WHERE aluno_id = :ra_aluno";
        $stmtMatricula = $this->conn->prepare($sqlMatricula);
        $stmtMatricula->execute([':ra_aluno' => $ra_aluno]);
        $dadosCompletos['matricula'] = $stmtMatricula->fetch(); 

        if (!$dadosCompletos['matricula']) {
            return false;
        }

        $matricula = $dadosCompletos['matricula'];
        $resp1_id = $matricula['responsavel_1_id'];
        $resp2_id = $matricula['responsavel_2_id'];
        $estrutura_id = $matricula['estrutura_familiar_id'];

        $sqlAluno = "SELECT * FROM tb_alunos WHERE ra_aluno = :ra_aluno";
        $dadosAluno = $this->conn->prepare($sqlAluno);
        $dadosAluno->execute([':ra_aluno' => $ra_aluno]);
        $dadosCompletos['aluno'] = $dadosAluno->fetch(); 
        
        $endereco_id = $dadosCompletos['aluno']['endereco_id'] ?? null; 
        
        if ($endereco_id) {
            $sqlEndereco = "SELECT * FROM endereco WHERE id_endereco = :id";
            $dadosEndereco = $this->conn->prepare($sqlEndereco);
            $dadosEndereco->execute([':id' => $endereco_id]);
            $dadosCompletos['endereco'] = $dadosEndereco->fetch();
        }
        
        if ($resp1_id) {
            $sqlResp1 = "SELECT * FROM tb_responsaveis WHERE id_responsavel = :id";
            $dadosResp1 = $this->conn->prepare($sqlResp1);
            $dadosResp1->execute([':id' => $resp1_id]);
            $dadosCompletos['responsavel_1'] = $dadosResp1->fetch();
        }

        if ($resp2_id) {
            $sqlResp2 = "SELECT * FROM tb_responsaveis WHERE id_responsavel = :id";
            $dadosResp2 = $this->conn->prepare($sqlResp2);
            $dadosResp2->execute([':id' => $resp2_id]);
            $dadosCompletos['responsavel_2'] = $dadosResp2->fetch();
        }

        if ($estrutura_id) {
            $sqlEstrutura = "SELECT * FROM tb_estrutura_familiar WHERE id = :id";
            $dadosEstruturaFamiliar = $this->conn->prepare($sqlEstrutura);
            $dadosEstruturaFamiliar->execute([':id' => $estrutura_id]);
            $dadosCompletos['estrutura_familiar'] = $dadosEstruturaFamiliar->fetch();
        }

        $sqlAutorizados = "SELECT pa.* FROM tb_pessoas_autorizadas pa
                            INNER JOIN tb_matricula_pessoas_autorizadas mpa 
                            ON pa.id = mpa.pessoa_autorizada_id 
                            WHERE mpa.matricula_id = :matricula_id";

        $dadosAutorizadas = $this->conn->prepare($sqlAutorizados);
        $dadosAutorizadas->execute([':matricula_id' => $matricula['id_matricula']]);
        $dadosCompletos['autorizados'] = $dadosAutorizadas->fetchAll();

        return $dadosCompletos;
    }
}
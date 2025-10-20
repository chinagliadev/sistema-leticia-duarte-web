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

    public function cadastrarMatricula($aluno_id, $estrutura_familiar_id, $funcionario_id, $responsavel_1_id, $responsavel_2_id, $pessoa_autorizada_1_id, $pessoa_autorizada_2_id)
    {
        $sqlInserir = "INSERT INTO tb_matricula 
                         (aluno_id, estrutura_familiar_id, funcionario_id, responsavel_1_id, responsavel_2_id, pessoa_autorizada_1_id, pessoa_autorizada_2_id) 
                         VALUES 
                         (:aluno_id, :estrutura_familiar_id, :funcionario_id, :responsavel_1_id, :responsavel_2_id, :pessoa_autorizada_1_id, :pessoa_autorizada_2_id)";

        $dados = $this->conn->prepare($sqlInserir);

        $dados->execute([
            ":aluno_id" => $aluno_id,
            ":estrutura_familiar_id" => $estrutura_familiar_id,
            ":funcionario_id" => $funcionario_id,
            ":responsavel_1_id" => $responsavel_1_id,
            ":responsavel_2_id" => $responsavel_2_id,
            ":pessoa_autorizada_1_id" => $pessoa_autorizada_1_id,
            ":pessoa_autorizada_2_id" => $pessoa_autorizada_2_id
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

        $dados = $this->conn->query($sqlListar)->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }

    public function deletarAlunoCompleto($aluno_id)
    {
        try {
            // 1. Inicia a transação e desativa as verificações de FK para evitar o erro 1451
            $this->conn->beginTransaction();
            $this->conn->exec("SET foreign_key_checks = 0");

            $sqlBuscaChaves = "SELECT id_matricula, responsavel_1_id, responsavel_2_id, estrutura_familiar_id, pessoa_autorizada_1_id, pessoa_autorizada_2_id 
                                FROM tb_matricula 
                                WHERE aluno_id = :id";

            $dadosChaves = $this->conn->prepare($sqlBuscaChaves);
            $dadosChaves->execute([":id" => $aluno_id]);

            $matricula = $dadosChaves->fetch(PDO::FETCH_ASSOC);

            if (!$matricula) {
                $this->deletarAlunoPrincipal($aluno_id);
                $this->conn->exec("SET foreign_key_checks = 1");
                $this->conn->commit();
                return true;
            }

            $id_matricula = $matricula['id_matricula'];
            $resp1_id = $matricula['responsavel_1_id'];
            $resp2_id = $matricula['responsavel_2_id'];
            $estrutura_id = $matricula['estrutura_familiar_id'];
            $pa1_id = $matricula['pessoa_autorizada_1_id'];
            $pa2_id = $matricula['pessoa_autorizada_2_id'];


            $sqlDeletarPessoasNM = "DELETE FROM tb_matricula_pessoas_autorizadas WHERE matricula_id = :id_matricula";
            $this->conn->prepare($sqlDeletarPessoasNM)->execute([":id_matricula" => $id_matricula]);

            $sqlDeletarMatricula = "DELETE FROM tb_matricula WHERE aluno_id = :id";
            $this->conn->prepare($sqlDeletarMatricula)->execute([":id" => $aluno_id]);


            if ($pa1_id) {
                $sqlDeletarPA1 = "DELETE FROM tb_pessoas_autorizadas WHERE id = :id";
                $this->conn->prepare($sqlDeletarPA1)->execute([":id" => $pa1_id]);
            }
            if ($pa2_id) {
                $sqlDeletarPA2 = "DELETE FROM tb_pessoas_autorizadas WHERE id = :id";
                $this->conn->prepare($sqlDeletarPA2)->execute([":id" => $pa2_id]);
            }

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

            $this->conn->exec("SET foreign_key_checks = 1");
            $this->conn->commit();

            return true;
        } catch (PDOException $e) {
            $this->conn->rollback();
            $this->conn->exec("SET foreign_key_checks = 1");
            throw $e;
        }
    }

    private function deletarAlunoPrincipal($aluno_id)
    {
        $sqlBuscaEndereco = "SELECT endereco_id FROM tb_alunos WHERE ra_aluno = :id";
        $stmtBuscaEndereco = $this->conn->prepare($sqlBuscaEndereco);
        $stmtBuscaEndereco->execute([":id" => $aluno_id]);
        $endereco_id = $stmtBuscaEndereco->fetchColumn();

        $sqlDeletarAluno = "DELETE FROM tb_alunos WHERE ra_aluno = :id";
        $this->conn->prepare($sqlDeletarAluno)->execute([":id" => $aluno_id]);

        if ($endereco_id) {
            $sqlDeletarEndereco = "DELETE FROM endereco WHERE id_endereco = :id";
            $this->conn->prepare($sqlDeletarEndereco)->execute([":id" => $endereco_id]);
        }
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
            'pessoa_autorizada_2' => null
        ];

        $sqlMatricula = "SELECT * FROM tb_matricula WHERE aluno_id = :ra_aluno";
        $stmtMatricula = $this->conn->prepare($sqlMatricula);
        $stmtMatricula->execute([':ra_aluno' => $ra_aluno]);
        $dadosCompletos['matricula'] = $stmtMatricula->fetch(PDO::FETCH_ASSOC);

        if (!$dadosCompletos['matricula']) {
            return false;
        }

        $matricula = $dadosCompletos['matricula'];
        $resp1_id = $matricula['responsavel_1_id'];
        $resp2_id = $matricula['responsavel_2_id'];
        $estrutura_id = $matricula['estrutura_familiar_id'];
        $pessoa_autorizada_1_id = $matricula['pessoa_autorizada_1_id'];
        $pessoa_autorizada_2_id = $matricula['pessoa_autorizada_2_id'];


        $sqlAluno = "SELECT * FROM tb_alunos WHERE ra_aluno = :ra_aluno";
        $dadosAluno = $this->conn->prepare($sqlAluno);
        $dadosAluno->execute([':ra_aluno' => $ra_aluno]);
        $dadosCompletos['aluno'] = $dadosAluno->fetch(PDO::FETCH_ASSOC);

        $endereco_id = $dadosCompletos['aluno']['endereco_id'] ?? null;

        if ($endereco_id) {
            $sqlEndereco = "SELECT * FROM endereco WHERE id_endereco = :id";
            $dadosEndereco = $this->conn->prepare($sqlEndereco);
            $dadosEndereco->execute([':id' => $endereco_id]);
            $dadosCompletos['endereco'] = $dadosEndereco->fetch(PDO::FETCH_ASSOC);
        }

        if ($resp1_id) {
            $sqlResp1 = "SELECT * FROM tb_responsaveis WHERE id_responsavel = :id";
            $dadosResp1 = $this->conn->prepare($sqlResp1);
            $dadosResp1->execute([':id' => $resp1_id]);
            $dadosCompletos['responsavel_1'] = $dadosResp1->fetch(PDO::FETCH_ASSOC);
        }

        if ($resp2_id) {
            $sqlResp2 = "SELECT * FROM tb_responsaveis WHERE id_responsavel = :id";
            $dadosResp2 = $this->conn->prepare($sqlResp2);
            $dadosResp2->execute([':id' => $resp2_id]);
            $dadosCompletos['responsavel_2'] = $dadosResp2->fetch(PDO::FETCH_ASSOC);
        }

        if ($estrutura_id) {
            $sqlEstrutura = "SELECT * FROM tb_estrutura_familiar WHERE id = :id";
            $dadosEstruturaFamiliar = $this->conn->prepare($sqlEstrutura);
            $dadosEstruturaFamiliar->execute([':id' => $estrutura_id]);
            $dadosCompletos['estrutura_familiar'] = $dadosEstruturaFamiliar->fetch(PDO::FETCH_ASSOC);
        }

        if ($pessoa_autorizada_1_id) {
            $sqlPa = "SELECT * FROM tb_pessoas_autorizadas WHERE id = :id";
            $dadosPessoaAutorizada = $this->conn->prepare($sqlPa);
            $dadosPessoaAutorizada->execute([':id' => $pessoa_autorizada_1_id]);
            $dadosCompletos['pessoa_autorizada_1'] = $dadosPessoaAutorizada->fetch(PDO::FETCH_ASSOC);
        }

        if ($pessoa_autorizada_2_id) {
            $sqlPa2 = "SELECT * FROM tb_pessoas_autorizadas WHERE id = :id";
            $dadosPessoaAutorizada2 = $this->conn->prepare($sqlPa2);
            $dadosPessoaAutorizada2->execute([':id' => $pessoa_autorizada_2_id]);
            $dadosCompletos['pessoa_autorizada_2'] = $dadosPessoaAutorizada2->fetch(PDO::FETCH_ASSOC);
        }


        return $dadosCompletos;
    }

    public function editarAluno(array $dados)
    {
        if (empty($dados['id_aluno'])) {
            throw new Exception("ID do Aluno não fornecido para edição.");
        }

        $autorizacaoMed = isset($dados['autorizacaoMed']) ? 1 : 0;
        $autorizacaoImagem = isset($dados['autorizacaoImagem']) ? 1 : 0;

        try {
            $sql = "UPDATE tb_alunos
            SET 
                ra_aluno = :ra_aluno,
                nome = :nome,
                data_nascimento = :data_nascimento,
                etnia = :etnia,
                turma = :turma,
                autorizacao_febre = :autorizacao_febre,
                remedio = :remedio,
                gotas = :gotas,
                permissao_foto = :permissao_foto
            WHERE ra_aluno = :id_aluno";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ":id_aluno" => $dados['id_aluno'],
                ":ra_aluno" => $dados['ra_aluno'],
                ":nome" => $dados['txtNomeCrianca'],
                ":data_nascimento" => $dados['data_nascimento'],
                ":etnia" => $dados['corRaca'],
                ":turma" => $dados['turma'],
                ":autorizacao_febre" => $autorizacaoMed,
                ":remedio" => $dados['txtRemedio'] ?? null,
                ":gotas" => $dados['txtGotas'] ?? null,
                ":permissao_foto" => $autorizacaoImagem
            ]);

            return true;
        } catch (PDOException $e) {
            throw new Exception("Erro ao editar dados do Aluno: " . $e->getMessage());
        }
    }

    public function editarEndereco(array $dados)
    {
        if (empty($dados['id_endereco'])) {
            throw new Exception("ID do Endereço não fornecido para edição.");
        }

        try {
            $sql = "UPDATE endereco 
            SET 
                cep = :cep,
                endereco = :endereco,
                numero = :numero,
                bairro = :bairro,
                cidade = :cidade,
                complemento = :complemento
            WHERE id_endereco = :id_endereco";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ":id_endereco" => $dados['id_endereco'],
                ":cep" => $dados['txtCep'],
                ":endereco" => $dados['txtEndereco'],
                ":numero" => $dados['txtNumero'],
                ":bairro" => $dados['txtBairro'],
                ":cidade" => $dados['txtCidade'],
                ":complemento" => $dados['txtComplemento'] ?? null
            ]);

            return true;
        } catch (PDOException $e) {
            throw new Exception("Erro ao editar Endereço: " . $e->getMessage());
        }
    }

    public function editarResponsavel($id_responsavel, $sufixo, array $dados)
    {
        if (empty($id_responsavel)) return true;

        $prefixo = ($sufixo === '_1') ? '_1' : '_2';
        $toggleRendaExtra = isset($dados["toggleRendaExtra{$prefixo}"]) ? 1 : 0;

        try {
            $sql = "UPDATE tb_responsaveis
            SET 
                tipo_responsavel = :tipo_responsavel,
                nome = :nome,
                data_nascimento = :data_nascimento,
                estado_civil = :estado_civil,
                celular = :celular,
                email = :email,
                nome_empresa = :nome_empresa,
                profissao = :profissao,
                telefone_trabalho = :telefone_trabalho,
                horario_trabalho = :horario_trabalho,
                salario = :salario,
                renda_extra = :renda_extra,
                valor_renda_extra = :valor_renda_extra
            WHERE id_responsavel = :id_responsavel";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ":id_responsavel" => $id_responsavel,
                ":tipo_responsavel" => $dados["txtTipoResponsavel{$prefixo}"] ?? null,
                ":nome" => $dados["txtNomeResponsavel{$prefixo}"] ?? null,
                ":data_nascimento" => $dados["data_nascimento{$prefixo}"] ?? null,
                ":estado_civil" => $dados["txtEstadoCivil{$prefixo}"] ?? null,
                ":celular" => $dados["txtTelefone{$prefixo}"] ?? null,
                ":email" => $dados["txtEmail{$prefixo}"] ?? null,
                ":nome_empresa" => $dados["txtNomeEmpresa{$prefixo}"] ?? null,
                ":profissao" => $dados["txtProfissao{$prefixo}"] ?? null,
                ":telefone_trabalho" => $dados["txtTelefoneTrabalho{$prefixo}"] ?? null,
                ":horario_trabalho" => $dados["txtHorarioTrabalho{$prefixo}"] ?? null,
                ":salario" => str_replace(',', '.', str_replace('R$ ', '', $dados["txtSalario{$prefixo}"] ?? '0,00')),
                ":renda_extra" => $toggleRendaExtra,
                ":valor_renda_extra" => str_replace(',', '.', str_replace('R$ ', '', $dados["txtRendaExtra{$prefixo}"] ?? '0,00'))
            ]);
            return true;
        } catch (PDOException $e) {
            throw new Exception("Erro ao editar Responsável {$prefixo}: " . $e->getMessage());
        }
    }


    public function editarEstruturaFamiliar(array $dados)
    {
        if (empty($dados['id_estrutura_familiar'])) {
            throw new Exception("ID da Estrutura Familiar não fornecido para edição.");
        }

        $pais_vivem_juntos = isset($dados['pais_vivem_juntos']) ? 1 : 0;
        $recebe_bolsa_familia = isset($dados['recebe_bolsa_familia']) ? 1 : 0;

        try {
            $sql = "UPDATE tb_estrutura_familiar 
            SET 
                pais_vivem_juntos = :pais_vivem_juntos,
                numero_filhos = :numero_filhos,
                recebe_bolsa_familia = :recebe_bolsa_familia,
                valor = :valor,
                possui_alergia = :possui_alergia,
                especifique_alergia = :especifique_alergia,
                possui_convenio = :possui_convenio,
                qual_convenio = :qual_convenio,
                portador_necessidade_especial = :portador_necessidade_especial,
                qual_necessidade_especial = :qual_necessidade,
                problemas_visao = :problemas_visao,
                ja_fez_cirurgia = :ja_fez_cirurgia,
                qual_cirurgia = :qual_cirurgia,
                vacina_catapora_varicela = :vacina_catapora_varicela,
                doenca_anemia = :doenca_anemia,
                doenca_bronquite = :doenca_bronquite,
                doenca_cardiaca = :doenca_cardiaca,
                doenca_catapora = :doenca_catapora,
                doenca_diabetes = :doenca_diabetes,
                doenca_hepatite = :doenca_hepatite,
                doenca_meningite = :doenca_meningite,
                doenca_pneumonia = :doenca_pneumonia,
                doenca_caxumba = :doenca_caxumba,
                doenca_convulsao = :doenca_convulsao,
                doenca_dengue = :doenca_dengue,
                doenca_desidratacao = :doenca_desidratacao,
                doenca_refluxo = :doenca_refluxo,
                doenca_rubeola = :doenca_rubeola,
                doenca_sarampo = :doenca_sarampo,
                doenca_verminose = :doenca_verminose,
                transporte_carro = :transporte_carro,
                transporte_van = :transporte_van,
                transporte_a_pe = :transporte_a_pe,
                transporte_outros_desc = :transporte_outros_desc
            WHERE id = :id_estrutura_familiar";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ":id_estrutura_familiar" => $dados['id_estrutura_familiar'],
                ":pais_vivem_juntos" => $pais_vivem_juntos,
                ":numero_filhos" => $dados['numero_filhos'] ?? 0,
                ":recebe_bolsa_familia" => $recebe_bolsa_familia,
                ":valor" => str_replace(',', '.', str_replace('R$ ', '', $dados['valor'] ?? '0,00')),
                ":possui_alergia" => isset($dados['possui_alergia']) ? 1 : 0,
                ":especifique_alergia" => $dados['especifique_alergia'] ?? null,
                ":possui_convenio" => isset($dados['possui_convenio']) ? 1 : 0,
                ":qual_convenio" => $dados['qual_convenio'] ?? null,
                ":portador_necessidade_especial" => isset($dados['portador_necessidade_especial']) ? 1 : 0,
                ":qual_necessidade" => $dados['qual_necessidade'] ?? null,
                ":problemas_visao" => isset($dados['problemas_visao']) ? 1 : 0,
                ":ja_fez_cirurgia" => isset($dados['ja_fez_cirurgia']) ? 1 : 0,
                ":qual_cirurgia" => $dados['qual_cirurgia'] ?? null,
                ":vacina_catapora_varicela" => isset($dados['vacina_catapora_varicela']) ? 1 : 0,
                ":doenca_anemia" => isset($dados['doenca_anemia']) ? 1 : 0,
                ":doenca_bronquite" => isset($dados['doenca_bronquite']) ? 1 : 0,
                ":doenca_cardiaca" => isset($dados['doenca_cardiaca']) ? 1 : 0,
                ":doenca_catapora" => isset($dados['doenca_catapora']) ? 1 : 0,
                ":doenca_diabetes" => isset($dados['doenca_diabetes']) ? 1 : 0,
                ":doenca_hepatite" => isset($dados['doenca_hepatite']) ? 1 : 0,
                ":doenca_meningite" => isset($dados['doenca_meningite']) ? 1 : 0,
                ":doenca_pneumonia" => isset($dados['doenca_pneumonia']) ? 1 : 0,
                ":doenca_caxumba" => isset($dados['doenca_caxumba']) ? 1 : 0,
                ":doenca_convulsao" => isset($dados['doenca_convulsao']) ? 1 : 0,
                ":doenca_dengue" => isset($dados['doenca_dengue']) ? 1 : 0,
                ":doenca_desidratacao" => isset($dados['doenca_desidratacao']) ? 1 : 0,
                ":doenca_refluxo" => isset($dados['doenca_refluxo']) ? 1 : 0,
                ":doenca_rubeola" => isset($dados['doenca_rubeola']) ? 1 : 0,
                ":doenca_sarampo" => isset($dados['doenca_sarampo']) ? 1 : 0,
                ":doenca_verminose" => isset($dados['doenca_verminose']) ? 1 : 0,
                ":transporte_carro" => isset($dados['transporte_carro']) ? 1 : 0,
                ":transporte_van" => isset($dados['transporte_van']) ? 1 : 0,
                ":transporte_a_pe" => isset($dados['transporte_pe']) ? 1 : 0,
                ":transporte_outros_desc" => $dados['transporte_outros_desc'] ?? null
            ]);

            return true;
        } catch (PDOException $e) {
            throw new Exception("Erro ao editar Estrutura Familiar: " . $e->getMessage());
        }
    }


    public function editarPessoaAutorizada($id_autorizada, $sufixo, array $dados)
    {
        if (empty($id_autorizada)) {
            return true; // se não existe pessoa autorizada, não faz nada
        }

        $nomeCampo = "txtNomePessoaAutorizada" . ($sufixo === '2' ? '2' : '');
        $cpfCampo = "txtCpfAutorizada" . ($sufixo === '2' ? '2' : '');
        $telefoneCampo = "txtTelefoneAutorizada" . ($sufixo === '2' ? '2' : '');
        $parentescoCampo = "txtParentesco" . ($sufixo === '2' ? '2' : '');

        $nome = $dados[$nomeCampo] ?? null;
        $cpf = $dados[$cpfCampo] ?? null;
        $celular = $dados[$telefoneCampo] ?? null;
        $parentesco = $dados[$parentescoCampo] ?? null;

        try {
            $sql = "UPDATE tb_pessoas_autorizadas
                SET nome = :nome,
                    cpf = :cpf,
                    celular = :celular,
                    parentesco = :parentesco
                WHERE id = :id_autorizada";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ":id_autorizada" => $id_autorizada,
                ":nome" => $nome,
                ":cpf" => $cpf,
                ":celular" => $celular,
                ":parentesco" => $parentesco
            ]);

            return true;
        } catch (PDOException $e) {
            throw new Exception("Erro ao editar Pessoa Autorizada {$sufixo}: " . $e->getMessage());
        }
    }

    public function editarMatricula($id_matricula, $aluno_id, $estrutura_familiar_id, $funcionario_id, $responsavel_1_id, $responsavel_2_id, $pessoa_autorizada_1_id, $pessoa_autorizada_2_id)
    {
        if (empty($id_matricula)) return true;

        $responsavel_2_id = (empty($responsavel_2_id) || $responsavel_2_id == 0) ? null : $responsavel_2_id;
        try {
            $sql = "UPDATE tb_matricula
            SET 
                aluno_id = :aluno_id,
                estrutura_familiar_id = :estrutura_familiar_id,
                funcionario_id = :funcionario_id,
                responsavel_1_id = :responsavel_1_id,
                responsavel_2_id = :responsavel_2_id,
                pessoa_autorizada_1_id = :pessoa_autorizada_1_id,
                pessoa_autorizada_2_id = :pessoa_autorizada_2_id
            WHERE id_matricula = :id_matricula";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ":id_matricula" => $id_matricula,
                ":aluno_id" => $aluno_id,
                ":estrutura_familiar_id" => $estrutura_familiar_id,
                ":funcionario_id" => $funcionario_id ?? 1,
                ":responsavel_1_id" => $responsavel_1_id,
                ":responsavel_2_id" => $responsavel_2_id,
                ":pessoa_autorizada_1_id" => $pessoa_autorizada_1_id,
                ":pessoa_autorizada_2_id" => $pessoa_autorizada_2_id
            ]);
            return true;
        } catch (PDOException $e) {
            throw new Exception("Erro ao editar matrícula: " . $e->getMessage());
        }
    }

    public function editarDadosCompletosIds(
        $ra_aluno,
        $id_endereco,
        $id_responsavel_1,
        $id_responsavel_2,
        $id_estrutura_familiar,
        $id_pessoa_autorizada_1,
        $id_pessoa_autorizada_2,
        array $dados
    ) {
        try {
            $this->editarAluno(array_merge($dados, [
                'id_aluno' => $ra_aluno,
                'id_endereco' => $id_endereco,
                'funcionario_id' => $dados['funcionario_id'] ?? 1
            ]));

            $this->editarEndereco(array_merge($dados, [
                'id_endereco' => $id_endereco
            ]));

            $this->editarResponsavel($id_responsavel_1, '_1', $dados);
            if (!empty($id_responsavel_2)) {
                $this->editarResponsavel($id_responsavel_2, '_2', $dados);
            }

            $this->editarEstruturaFamiliar(array_merge($dados, [
                'id_estrutura_familiar' => $id_estrutura_familiar
            ]));

            if (!empty($id_pessoa_autorizada_1)) {
                $this->editarPessoaAutorizada($id_pessoa_autorizada_1, '', $dados);
            }
            if (!empty($id_pessoa_autorizada_2)) {
                $this->editarPessoaAutorizada($id_pessoa_autorizada_2, '2', $dados);
            }

            if (!empty($dados['id_matricula'])) {
                $this->editarMatricula(
                    $dados['id_matricula'],
                    $ra_aluno,
                    $id_estrutura_familiar,
                    $dados['funcionario_id'] ?? 1,
                    $id_responsavel_1,
                    $id_responsavel_2,
                    $id_pessoa_autorizada_1,
                    $id_pessoa_autorizada_2
                );
            }

            return true;
        } catch (Exception $e) {
            throw new Exception("Erro ao editar dados completos: " . $e->getMessage());
        }
    }
}

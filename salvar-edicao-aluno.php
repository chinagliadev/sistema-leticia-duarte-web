<?php
require './config.php';
include './class/Matricula.php';
include './class/Aluno.php';
include './class/Endereco.php';
include './class/Responsavel.php';
include './class/EstruturaFamiliar.php';
include './class/PessoaAutorizada.php';

$matriculaClass = new Matricula();
$alunoClass = new Aluno();
$enderecoClass = new Endereco();
$responsavelClass = new Responsavel();
$estruturaClass = new EstruturaFamiliar();
$pessoaAutorizadaClass = new PessoaAutorizada();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acesso inválido.");
}

$ra_aluno = $_POST['ra_aluno'] ?? '';

if (empty($ra_aluno)) {
    die("Erro: RA do aluno não informado.");
}

// buscar dados atuais (ids)
$dadosCompletos = $matriculaClass->buscarDadosCompletosAluno($ra_aluno);
if (!$dadosCompletos) {
    die("Aluno / matrícula não encontrados.");
}

// ids existentes
$alunoAtual = $dadosCompletos['aluno'] ?? [];
$enderecoAtual = $dadosCompletos['endereco'] ?? [];
$matriculaAtual = $dadosCompletos['matricula'] ?? [];
$responsavel1Atual = $dadosCompletos['responsavel_1'] ?? [];
$responsavel2Atual = $dadosCompletos['responsavel_2'] ?? [];
$estruturaAtual = $dadosCompletos['estrutura_familiar'] ?? [];
$pessoa_aut_1 = $dadosCompletos['pessoa_autorizada_1'] ?? [];
$pessoa_aut_2 = $dadosCompletos['pessoa_autorizada_2'] ?? [];
$pessoa_aut_3 = $dadosCompletos['pessoa_autorizada_3'] ?? [];
$pessoa_aut_4 = $dadosCompletos['pessoa_autorizada_4'] ?? [];

$aluno_id = $alunoAtual['id'] ?? null;
$endereco_id = $enderecoAtual['id_endereco'] ?? null;
$matricula_aluno_id = $matriculaAtual['id'] ?? null;
$responsavel1_id = $responsavel1Atual['id_responsavel'] ?? null;
$responsavel2_id = $responsavel2Atual['id_responsavel'] ?? null;
$estrutura_id = $estruturaAtual['id'] ?? null;
$pessoa_autorizada_1_id = $pessoa_aut_1['id'] ?? null;
$pessoa_autorizada_2_id = $pessoa_aut_2['id'] ?? null;
$pessoa_autorizada_3_id = $pessoa_aut_3['id'] ?? null;
$pessoa_autorizada_4_id = $pessoa_aut_4['id'] ?? null;

try {
    $conn->beginTransaction();

    // ----------------------------
    // 1) Endereço: se existe atualiza, senão cria e atualiza tb_alunos.endereco_id
    // ----------------------------
    $cep = $_POST['txtCep'] ?? '';
    $endereco_input = $_POST['txtEndereco'] ?? '';
    $numero = $_POST['txtNumero'] ?? '';
    $bairro = $_POST['txtBairro'] ?? '';
    $cidade = $_POST['txtCidade'] ?? '';
    $complemento = $_POST['txtComplemento'] ?? '';

    if ($endereco_id) {
        // atualiza endereco
        $enderecoClass->atualizarEndereco($endereco_id, $cep, $endereco_input, $numero, $bairro, $cidade, $complemento);
    } else {
        // se não existe e veio dados, cadastra novo
        if ($cep || $endereco_input) {
            $novoEnderecoId = $enderecoClass->cadastrarEndereco($cep, $endereco_input, $numero, $bairro, $cidade, $complemento);
            // atualiza tb_alunos.endereco_id
            if ($novoEnderecoId) {
                $alunoClass->atualizarEnderecoIdByRa($ra_aluno, $novoEnderecoId);
                $endereco_id = $novoEnderecoId;
            }
        }
    }

    // ----------------------------
    // 2) Aluno: atualiza dados (por RA)
    // ----------------------------
    $dadosAluno = [
        'nome' => $_POST['txtNomeCrianca'] ?? '',
        'cpf' => $_POST['txtCpfAluno'] ?? '',
        'rg' => $_POST['txtRgAluno'] ?? '',
        'data_nascimento' => $_POST['txtDataNascimento'] ?? '',
        'etnia' => $_POST['txtRaca'] ?? ($_POST['cor_raca'] ?? ''),
        'turma' => $_POST['txtTurma'] ?? '',
        'autorizacao_febre' => isset($_POST['autorizacaoMed']) ? 1 : 0,
        'remedio' => $_POST['txtRemedio'] ?? '',
        'gotas' => $_POST['txtGotas'] ?? '',
        'permissao_foto' => isset($_POST['autorizacaoImagem']) && ($_POST['autorizacaoImagem'] != '') ? 1 : (isset($_POST['permissaoFoto']) ? 1 : 0)
    ];

    $alunoClass->atualizarAlunoByRa($ra_aluno, $dadosAluno);

    // ----------------------------
    // 3) Responsáveis (1 e 2)
    // ----------------------------
    // RESPONSÁVEL 1 (campos com sufixo _1)
    $tipo1 = $_POST['txtTipoResponsavel_1'] ?? '';
    $nome1 = $_POST['txtNomeResponsavel_1'] ?? '';
    $dataNasc1 = $_POST['txtDataNascimento_1'] ?? '';
    $estadoCivil1 = $_POST['txtEstadoCivil_1'] ?? '';
    $escolaridade1 = $_POST['txtEscolaridade'] ?? '';
    $celular1 = $_POST['txtTelefone_1'] ?? '';
    $email1 = $_POST['txtEmail_1'] ?? '';
    $nomeEmpresa1 = $_POST['txtNomeEmpresa_1'] ?? '';
    $profissao1 = $_POST['txtProfissao_1'] ?? '';
    $telefoneTrabalho1 = $_POST['txtTelefoneTrabalho_1'] ?? '';
    $horarioTrabalho1 = $_POST['txtHorarioTrabalho_1'] ?? '';
    $salario1 = $_POST['txtSalario_1'] ?? '';
    $rendaExtra1 = isset($_POST['toggleRendaExtra_1']) ? 1 : 0;
    $valorRendaExtra1 = $_POST['txtRendaExtra'] ?? '';

    if ($responsavel1_id) {
        $responsavelClass->atualizarResponsavel($responsavel1_id, $tipo1, $nome1, $dataNasc1, $estadoCivil1, $escolaridade1, $celular1, $email1, $nomeEmpresa1, $profissao1, $telefoneTrabalho1, $horarioTrabalho1, $salario1, $rendaExtra1, $valorRendaExtra1);
    } else {
        // se não existe e o usuário preencheu algo, cadastrar e atualizar matricula
        if ($nome1 || $celular1) {
            $novoResp1 = $responsavelClass->cadastrarResponsavel($tipo1, $nome1, $dataNasc1, $estadoCivil1, $escolaridade1, $celular1, $email1, $nomeEmpresa1, $profissao1, $telefoneTrabalho1, $horarioTrabalho1, $salario1, $rendaExtra1, $valorRendaExtra1);
            if ($novoResp1) {
                $responsavel1_id = $novoResp1;
                $matriculaClass->atualizarMatriculaByAlunoId($aluno_id, $responsavel1_id, null, null, null, null, null, null);
            }
        }
    }

    // RESPONSÁVEL 2 (campos com sufixo _2)
    $tipo2 = $_POST['txtTipoResponsavel_2'] ?? '';
    $nome2 = $_POST['txtNomeResponsavel_2'] ?? '';
    $dataNasc2 = $_POST['txtDataNascimento_2'] ?? '';
    $estadoCivil2 = $_POST['txtEstadoCivil_2'] ?? '';
    $escolaridade2 = $_POST['txtEscolaridade_2'] ?? '';
    $celular2 = $_POST['txtTelefone_2'] ?? '';
    $email2 = $_POST['txtEmail_2'] ?? '';
    $nomeEmpresa2 = $_POST['txtNomeEmpresa_2'] ?? '';
    $profissao2 = $_POST['txtProfissao_2'] ?? '';
    $telefoneTrabalho2 = $_POST['txtTelefoneTrabalho_2'] ?? '';
    $horarioTrabalho2 = $_POST['txtHorarioTrabalho_2'] ?? '';
    $salario2 = $_POST['txtSalario_2'] ?? '';
    $rendaExtra2 = isset($_POST['toggleRendaExtra_2']) ? 1 : 0;
    $valorRendaExtra2 = $_POST['txtRendaExtra_2'] ?? '';

    if ($responsavel2_id) {
        $responsavelClass->atualizarResponsavel($responsavel2_id, $tipo2, $nome2, $dataNasc2, $estadoCivil2, $escolaridade2, $celular2, $email2, $nomeEmpresa2, $profissao2, $telefoneTrabalho2, $horarioTrabalho2, $salario2, $rendaExtra2, $valorRendaExtra2);
    } else {
        if ($nome2 || $celular2) {
            $novoResp2 = $responsavelClass->cadastrarResponsavel($tipo2, $nome2, $dataNasc2, $estadoCivil2, $escolaridade2, $celular2, $email2, $nomeEmpresa2, $profissao2, $telefoneTrabalho2, $horarioTrabalho2, $salario2, $rendaExtra2, $valorRendaExtra2);
            if ($novoResp2) {
                $responsavel2_id = $novoResp2;
                $matriculaClass->atualizarMatriculaByAlunoId($aluno_id, null, $responsavel2_id, null, null, null, null, null);
            }
        }
    }

    // ----------------------------
    // 4) Estrutura Familiar
    // ----------------------------
    $pais_vivem_juntos = isset($_POST['pais_vivem_juntos']) ? 1 : 0;
    $numero_filhos = $_POST['numero_filhos'] ?? 0;
    $recebe_bolsa_familia = isset($_POST['recebe_bolsa_familia']) ? 1 : 0;
    $valor_bolsa = $_POST['valor'] ?? null;
    $possui_alergia = isset($_POST['possui_alergia']) ? 1 : 0;
    $especifique_alergia = $_POST['especifique_alergia'] ?? null;
    $possui_convenio = isset($_POST['possui_convenio']) ? 1 : 0;
    $qual_convenio = $_POST['qual_convenio'] ?? null;
    $portador_necessidade_especial = isset($_POST['portador_necessidade_especial']) ? 1 : 0;
    $qual_necessidade = $_POST['qual_necessidade'] ?? null;
    $problemas_visao = isset($_POST['problemas_visao']) ? 1 : 0;
    $ja_fez_cirurgia = isset($_POST['ja_fez_cirurgia']) ? 1 : 0;
    $qual_cirurgia = $_POST['qual_cirurgia'] ?? null;
    $vacina_catapora_varicela = isset($_POST['vacina_catapora_varicela']) ? 1 : 0;
    $tipo_moradia = $_POST['tipo_moradia'] ?? ($_POST['tipo_moradia'] ?? null);
    $valor_aluguel = $_POST['txtValorAluguel'] ?? null;

    // doenças e transportes (checkboxes)
    $doenca_anemia = isset($_POST['doenca_anemia']) ? 1 : 0;
    $doenca_bronquite = isset($_POST['doenca_bronquite']) ? 1 : 0;
    $doenca_catapora = isset($_POST['doenca_catapora']) ? 1 : 0;
    $doenca_covid = isset($_POST['doenca_covid']) ? 1 : 0;
    $doenca_cardiaca = isset($_POST['doenca_cardiaca']) ? 1 : 0;
    $doenca_meningite = isset($_POST['doenca_meningite']) ? 1 : 0;
    $doenca_pneumonia = isset($_POST['doenca_pneumonia']) ? 1 : 0;
    $doenca_convulsao = isset($_POST['doenca_convulsao']) ? 1 : 0;
    $doenca_diabete = isset($_POST['doenca_diabete']) ? 1 : 0;
    $doenca_refluxo = isset($_POST['doenca_refluxo']) ? 1 : 0;
    $outras_doencas = $_POST['outras_doencas'] ?? null;

    $transporte_carro = isset($_POST['transporte_carro']) ? 1 : 0;
    $transporte_van = isset($_POST['transporte_van']) ? 1 : 0;
    $transporte_a_pe = isset($_POST['transporte_pe']) ? 1 : 0;
    $transporte_outros_desc = isset($_POST['transporte_outros_desc']) ? 1 : 0;

    if ($estrutura_id) {
        $estruturaClass->atualizarEstruturaFamiliar(
            $estrutura_id,
            $pais_vivem_juntos,
            $numero_filhos,
            $recebe_bolsa_familia,
            $valor_bolsa,
            $possui_alergia,
            $especifique_alergia,
            $possui_convenio,
            $qual_convenio,
            $portador_necessidade_especial,
            $qual_necessidade,
            $problemas_visao,
            $ja_fez_cirurgia,
            $qual_cirurgia,
            $vacina_catapora_varicela,
            $tipo_moradia,
            $valor_aluguel,
            $doenca_anemia,
            $doenca_bronquite,
            $doenca_cardiaca,
            $doenca_covid,
            $doenca_catapora,
            $doenca_convulsao,
            $doenca_diabete,
            $doenca_meningite,
            $doenca_pneumonia,
            $doenca_refluxo,
            $outras_doencas,
            $transporte_carro,
            $transporte_van,
            $transporte_a_pe,
            $transporte_outros_desc
        );
    } else {
        // caso não exista e houver dados mínimos -> cadastrar e atualizar matricula
        $novoEstruturaId = $estruturaClass->cadastrarEstruturaFamiliar(
            $pais_vivem_juntos,
            $numero_filhos,
            $recebe_bolsa_familia,
            $valor_bolsa,
            $possui_alergia,
            $especifique_alergia,
            $possui_convenio,
            $qual_convenio,
            $portador_necessidade_especial,
            $qual_necessidade,
            $problemas_visao,
            $ja_fez_cirurgia,
            $qual_cirurgia,
            $vacina_catapora_varicela,
            $tipo_moradia,
            $valor_aluguel,
            $doenca_anemia,
            $doenca_bronquite,
            $doenca_cardiaca,
            $doenca_covid,
            $doenca_catapora,
            $doenca_convulsao,
            $doenca_diabete,
            $doenca_meningite,
            $doenca_pneumonia,
            $doenca_refluxo,
            $outras_doencas,
            $transporte_carro,
            $transporte_van,
            $transporte_a_pe,
            $transporte_outros_desc
        );
        if ($novoEstruturaId) {
            $estrutura_id = $novoEstruturaId;
            $matriculaClass->atualizarMatriculaByAlunoId($aluno_id, null, null, $estrutura_id, null, null, null, null);
        }
    }

    // ----------------------------
    // 5) Pessoas autorizadas (1..4)
    //    Para cada: se existe -> atualizar, se não existe e veio nome/celular -> cadastrar e atualizar matricula
    // ----------------------------
    $pessoasForm = [
        1 => [
            'id' => $pessoa_autorizada_1_id,
            'nome' => $_POST['txtNomePessoaAutorizada'] ?? '',
            'cpf' => $_POST['txtCpfAutorizada'] ?? '',
            'celular' => $_POST['txtTelefoneAutorizada'] ?? '',
            'parentesco' => $_POST['txtParentenco'] ?? ''
        ],
        2 => [
            'id' => $pessoa_autorizada_2_id,
            'nome' => $_POST['txtNomePessoaAutorizada2'] ?? '',
            'cpf' => $_POST['txtCpfAutorizada2'] ?? '',
            'celular' => $_POST['txtTelefoneAutorizada2'] ?? '',
            'parentesco' => $_POST['txtParentenco2'] ?? ''
        ],
        3 => [
            'id' => $pessoa_autorizada_3_id,
            'nome' => $_POST['txtNomePessoaAutorizada3'] ?? '',
            'cpf' => $_POST['txtCpfAutorizada3'] ?? '',
            'celular' => $_POST['txtTelefoneAutorizada3'] ?? '',
            'parentesco' => $_POST['txtParentenco3'] ?? ''
        ],
        4 => [
            'id' => $pessoa_autorizada_4_id,
            'nome' => $_POST['txtNomePessoaAutorizada4'] ?? '',
            'cpf' => $_POST['txtCpfAutorizada4'] ?? '',
            'celular' => $_POST['txtTelefoneAutorizada4'] ?? '',
            'parentesco' => $_POST['txtParentenco4'] ?? ''
        ]
    ];

    foreach ($pessoasForm as $index => $pessoa) {
        $fieldId = $pessoa['id'];
        $nome = $pessoa['nome'];
        $cpfP = $pessoa['cpf'];
        $cel = $pessoa['celular'];
        $parentesco = $pessoa['parentesco'];

        if ($fieldId) {
            // atualizar
            $pessoaAutorizadaClass->atualizarPessoaAutorizada($fieldId, $nome, $cpfP, $cel, $parentesco);
        } else {
            if (!empty($nome) || !empty($cel) || !empty($cpfP)) {
                $novoId = $pessoaAutorizadaClass->cadastrarPessoaAutorizada($nome, $cpfP, $cel, $parentesco);
                if ($novoId) {
                    // atualizar matricula
                    if ($index === 1) $matriculaClass->atualizarMatriculaByAlunoId($aluno_id, null, null, null, $novoId, null, null, null);
                    if ($index === 2) $matriculaClass->atualizarMatriculaByAlunoId($aluno_id, null, null, null, null, $novoId, null, null);
                    if ($index === 3) $matriculaClass->atualizarMatriculaByAlunoId($aluno_id, null, null, null, null, null, $novoId, null);
                    if ($index === 4) $matriculaClass->atualizarMatriculaByAlunoId($aluno_id, null, null, null, null, null, null, $novoId);
                }
            }
        }
    }

    // ----------------------------
    // 6) Garantir que tb_matricula tem os ids finais (se atualizamos vários campos)
    // ----------------------------
    $matriculaClass->atualizarMatriculaByAlunoId($aluno_id, $responsavel1_id ?? null, $responsavel2_id ?? null, $estrutura_id ?? null, $pessoa_autorizada_1_id ?? null, $pessoa_autorizada_2_id ?? null, $pessoa_autorizada_3_id ?? null, $pessoa_autorizada_4_id ?? null);

    $conn->commit();

    header("Location: cadastrados.php?sucesso=1");
    exit;

} catch (Exception $e) {
    $conn->rollBack();
    echo "Erro ao salvar edição: " . $e->getMessage();
    exit;
}

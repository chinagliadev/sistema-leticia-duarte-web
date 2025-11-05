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
if (empty($ra_aluno)) die("Erro: RA do aluno não informado.");

$dadosCompletos = $matriculaClass->buscarDadosCompletosAluno($ra_aluno);
if (!$dadosCompletos) die("Aluno / matrícula não encontrados.");

$aluno_id = $dadosCompletos['aluno']['id'] ?? null;
$endereco_id = $dadosCompletos['endereco']['id_endereco'] ?? null;
$matricula_id = $dadosCompletos['matricula']['id'] ?? null;
$responsavel1_id = $dadosCompletos['responsavel_1']['id_responsavel'] ?? null;
$responsavel2_id = $dadosCompletos['responsavel_2']['id_responsavel'] ?? null;
$estrutura_id = $dadosCompletos['estrutura_familiar']['id'] ?? null;
$pessoa_aut_ids = [
    1 => $dadosCompletos['pessoa_autorizada_1']['id'] ?? null,
    2 => $dadosCompletos['pessoa_autorizada_2']['id'] ?? null,
    3 => $dadosCompletos['pessoa_autorizada_3']['id'] ?? null,
    4 => $dadosCompletos['pessoa_autorizada_4']['id'] ?? null
];

try {
    $conn->beginTransaction();

    $cep = $_POST['txtCep'] ?? '';
    $endereco = $_POST['txtEndereco'] ?? '';
    $numero = $_POST['txtNumero'] ?? '';
    $bairro = $_POST['txtBairro'] ?? '';
    $cidade = $_POST['txtCidade'] ?? '';
    $complemento = $_POST['txtComplemento'] ?? '';

    if ($endereco_id) {
        $enderecoClass->atualizarEndereco($endereco_id, $cep, $endereco, $numero, $bairro, $cidade, $complemento);
    } elseif ($cep || $endereco) {
        $endereco_id = $enderecoClass->cadastrarEndereco($cep, $endereco, $numero, $bairro, $cidade, $complemento);
        if ($endereco_id) $alunoClass->atualizarEnderecoIdByRa($ra_aluno, $endereco_id);
    }

    $dadosAluno = [
        'nome' => $_POST['txtNomeCrianca'] ?? '',
        'cpf' => $_POST['txtCpfAluno'] ?? '',
        'rg' => $_POST['txtRgAluno'] ?? '',
        'data_nascimento' => $_POST['txtDataNascimento'] ?? '',
        'etnia' => $_POST['corRaca'] ?? '',
        'turma' => $_POST['turma'] ?? '',
        'autorizacao_febre' => isset($_POST['autorizacaoMed']) ? 1 : 0,
        'remedio' => $_POST['txtRemedio'] ?? '',
        'gotas' => $_POST['txtGotas'] ?? '',
        'permissao_foto' => isset($_POST['autorizacaoImagem']) ? 1 : 0
    ];
    $alunoClass->atualizarAlunoByRa($ra_aluno, $dadosAluno);

    for ($i = 1; $i <= 2; $i++) {
        $responsavelId = ($i === 1) ? $responsavel1_id : $responsavel2_id;

        $tipo = $_POST["txtTipoResponsavel_$i"] ?? '';
        $nome = $_POST["txtNomeResponsavel_$i"] ?? '';
        $dataNascimento = $_POST["data_nascimento_$i"] ?? '';
        $estadoCivil = $_POST["txtEstadoCivil_$i"] ?? '';
        $escolaridade = $_POST["txtEscolaridade" . ($i === 1 ? '' : "_$i")] ?? '';
        $telefone = $_POST["txtTelefone_$i"] ?? '';
        $email = $_POST["txtEmail_$i"] ?? '';
        $nomeEmpresa = $_POST["txtNomeEmpresa_$i"] ?? '';
        $profissao = $_POST["txtProfissao_$i"] ?? '';
        $telefoneTrabalho = $_POST["txtTelefoneTrabalho_$i"] ?? '';
        $horarioTrabalho = $_POST["txtHorarioTrabalho_$i"] ?? '';
        $salario = $_POST["txtSalario_$i"] ?? '';
        $rendaExtra = isset($_POST["toggleRendaExtra_$i"]) ? 1 : 0;
        $valorRendaExtra = $_POST["txtRendaExtra" . ($i === 1 ? '' : "_$i")] ?? '';

        if ($responsavelId) {
            $responsavelClass->atualizarResponsavel($responsavelId, $tipo, $nome, $dataNascimento, $estadoCivil, $escolaridade, $telefone, $email, $nomeEmpresa, $profissao, $telefoneTrabalho, $horarioTrabalho, $salario, $rendaExtra, $valorRendaExtra);
        } elseif ($nome || $telefone) {
            $novoId = $responsavelClass->cadastrarResponsavel($tipo, $nome, $dataNascimento, $estadoCivil, $escolaridade, $telefone, $email, $nomeEmpresa, $profissao, $telefoneTrabalho, $horarioTrabalho, $salario, $rendaExtra, $valorRendaExtra);
            if ($novoId) {
                if ($i === 1) $responsavel1_id = $novoId;
                if ($i === 2) $responsavel2_id = $novoId;
            }
        }
    }


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
    $tipo_moradia = $_POST['tipo_moradia'] ?? null;
    $valor_aluguel = $_POST['txtValorAluguel'] ?? null;

    $doenca_anemia = isset($_POST['doenca_anemia']) ? 1 : 0;
    $doenca_bronquite = isset($_POST['doenca_bronquite']) ? 1 : 0;
    $doenca_cardiaca = isset($_POST['doenca_cardiaca']) ? 1 : 0;
    $doenca_covid = isset($_POST['doenca_covid']) ? 1 : 0;
    $doenca_catapora = isset($_POST['doenca_catapora']) ? 1 : 0;
    $doenca_convulsao = isset($_POST['doenca_convulsao']) ? 1 : 0;
    $doenca_diabete = isset($_POST['doenca_diabete']) ? 1 : 0;
    $doenca_meningite = isset($_POST['doenca_meningite']) ? 1 : 0;
    $doenca_pneumonia = isset($_POST['doenca_pneumonia']) ? 1 : 0;
    $doenca_refluxo = isset($_POST['doenca_refluxo']) ? 1 : 0;
    $outras_doencas = $_POST['outras_doencas'] ?? null;

    $transporte_carro = isset($_POST['transporte_carro']) ? 1 : 0;
    $transporte_van = isset($_POST['transporte_van']) ? 1 : 0;
    $transporte_a_pe = isset($_POST['transporte_pe']) ? 1 : 0;
    $transporte_outros_desc = $_POST['transporte_outros_desc'] ?? null;


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
        if ($novoEstruturaId) $estrutura_id = $novoEstruturaId;
    }

    for ($i = 1; $i <= 4; $i++) {
        $pessoaId = $pessoa_aut_ids[$i];
        $nome = $_POST["txtNomePessoaAutorizada" . ($i === 1 ? '' : $i)] ?? '';
        $cpf = $_POST["txtCpfAutorizada" . ($i === 1 ? '' : $i)] ?? '';
        $telefone = $_POST["txtTelefoneAutorizada" . ($i === 1 ? '' : $i)] ?? '';
        $parentesco = $_POST["txtParentenco" . ($i === 1 ? '' : $i)] ?? '';

        if ($pessoaId) {
            $pessoaAutorizadaClass->atualizarPessoaAutorizada($pessoaId, $nome, $cpf, $telefone, $parentesco);
        } elseif ($nome || $cpf || $telefone) {
            $novoId = $pessoaAutorizadaClass->cadastrarPessoaAutorizada($nome, $cpf, $telefone, $parentesco);
            if ($novoId) $pessoa_aut_ids[$i] = $novoId;
        }
    }

    $matriculaClass->atualizarMatriculaByAlunoId(
        $aluno_id,
        $responsavel1_id,
        $responsavel2_id,
        $estrutura_id,
        $pessoa_aut_ids[1],
        $pessoa_aut_ids[2],
        $pessoa_aut_ids[3],
        $pessoa_aut_ids[4]
    );

    $conn->commit();

    header("Location: cadastrados.php?sucesso=1");
    exit;
} catch (Exception $e) {
    $conn->rollBack();
    echo "Erro ao salvar edição: " . $e->getMessage();
    exit;
}

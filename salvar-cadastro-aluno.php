<?php
require './class/Aluno.php';
require './class/Responsavel.php';
require './class/Endereco.php';
require './class/EstruturaFamiliar.php'; // <-- INCLUSÃO DA NOVA CLASSE
require './config.php';

var_dump($_POST);

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // ------------------------------------
    // 1. Dados do Aluno e Endereço (Mantidos)
    // ------------------------------------
    $nome = $_POST['txtNomeCrianca'] ?? null;
    $turma = $_POST['turma'] ?? null;
    $dataNascimento = $_POST['txtDataNascimento'] ?? null;
    $corRaca = $_POST['corRaca'] ?? null;

    $cep = $_POST['txtCep'] ?? null;
    $logradouro = $_POST['txtEndereco'] ?? null;
    $numero = $_POST['txtNumero'] ?? null;
    $bairro = $_POST['txtBairro'] ?? null;
    $cidade = $_POST['txtCidade'] ?? null;
    $complemento = $_POST['txtComplemento'] ?? null;

    $autorizacaoMed = isset($_POST['autorizacaoMed']) ? 1 : 0;

    if ($autorizacaoMed) {
        $remedio = $_POST['txtRemedio'] ?? null;
        $gotas = $_POST['txtGotas'] ?? null;
    } else {
        $remedio = null;
        $gotas = null;
    }

    $autorizacaoImagem = isset($_POST['autorizacaoImagem']) ? 1 : 0;

    // ------------------------------------
    // 2. Processamento do Responsável (Mantido)
    // ------------------------------------
    $responsavel = new Responsavel();

    $tipo_responsavel_1 = $_POST['txtTipoResponsavel_1'] ?? null;
    $nome_responsavel_1 = $_POST['txtNomeResponsavel_1'] ?? null;
    $data_nascimento_1 = $_POST['txtDataNascimento_1'] ?? null; // Corrigindo a variável aqui
    $estado_civil_1 = $_POST['txtEstadoCivil_1'] ?? null;
    $escolaridade_1 = $_POST['txtEscolaridade_1'] ?? 'Não informado';
    $celular_1 = $_POST['txtTelefone_1'] ?? null;
    $email_1 = $_POST['txtEmail_1'] ?? null;
    $nome_empresa_1 = $_POST['txtNomeEmpresa_1'] ?? null;
    $profissao_1 = $_POST['txtProfissao_1'] ?? null;
    $telefone_trabalho_1 = $_POST['txtTelefoneTrabalho_1'] ?? null;
    $horario_trabalho_1 = $_POST['txtHorarioTrabalho_1'] ?? null;
    $salario_1 = $_POST['txtSalario_1'] ?? null;
    $renda_extra_1 = isset($_POST['toggleRendaExtra_1']) ? 1 : 0;


    $responsavel->cadastrarResponsavel(
        $tipo_responsavel_1,
        $nome_responsavel_1,
        $data_nascimento_1,
        $estado_civil_1,
        $escolaridade_1,
        $celular_1,
        $email_1,
        $nome_empresa_1,
        $profissao_1,
        $telefone_trabalho_1,
        $horario_trabalho_1,
        $salario_1,
        $renda_extra_1
    );

    // Responsável 2
    if (!empty($_POST['txtNomeResponsavel_2'])) {
        $tipo_responsavel_2 = $_POST['txtTipoResponsavel_2'] ?? null;
        $nome_responsavel_2 = $_POST['txtNomeResponsavel_2'] ?? null;
        $data_nascimento_2 = $_POST['txtDataNascimento_2'] ?? null;
        $estado_civil_2 = $_POST['txtEstadoCivil_2'] ?? "Não informado";
        $escolaridade_2 = $_POST['txtEscolaridade_2'] ?? null;
        $celular_2 = $_POST['txtTelefone_2'] ?? null;
        $email_2 = $_POST['txtEmail_2'] ?? null;
        $nome_empresa_2 = $_POST['txtNomeEmpresa_2'] ?? null;
        $profissao_2 = $_POST['txtProfissao_2'] ?? null;
        $telefone_trabalho_2 = $_POST['txtTelefoneTrabalho_2'] ?? null;
        $horario_trabalho_2 = $_POST['txtHorarioTrabalho_2'] ?? null;
        $salario_2 = $_POST['txtSalario_2'] ?? null;
        $renda_extra_2 = isset($_POST['toggleRendaExtra_2']) ? 1 : 0;

        $responsavel->cadastrarResponsavel(
            $tipo_responsavel_2,
            $nome_responsavel_2,
            $data_nascimento_2,
            $estado_civil_2,
            $escolaridade_2,
            $celular_2,
            $email_2,
            $nome_empresa_2,
            $profissao_2,
            $telefone_trabalho_2,
            $horario_trabalho_2,
            $salario_2,
            $renda_extra_2
        );
    }

    // ------------------------------------
    // 3. Cadastro do Endereço e do Aluno (Necessário para obter o aluno_id)
    // ------------------------------------
    $aluno = new Aluno();
    $enderecoObj = new Endereco();
    $funcionario_id = $_SESSION['usuario']['id'] ?? null;

    $endereco_id = $enderecoObj->cadastrarEndereco(
        $cep,
        $logradouro,
        $numero,
        $bairro,
        $cidade,
        $complemento
    );

    $aluno_id = $aluno->cadastrarAluno(
        $nome,
        $dataNascimento,
        $corRaca,
        $turma,
        $autorizacaoMed,
        $remedio,
        $gotas,
        $autorizacaoImagem,
        $endereco_id,
        $funcionario_id
    );

    var_dump($aluno_id);


    $estruturaFamiliarObj = new EstruturaFamiliar();
  
    $pais_vivem              = isset($_POST['pais_vivem']) ? 1 : 0;
    $numero_filhos           = $_POST['numero_filhos'] ?? 0;
    $bolsa_familia           = isset($_POST['bolsa_familia']) ? 1 : 0;
    $valor_bolsa             = $_POST['valor_bolsa'] ?? 0.00;
    $alergia                 = isset($_POST['alergia']) ? 1 : 0;
    $especifique_alergia     = $_POST['especifique_alergia'] ?? null;
    $convenio                = isset($_POST['convenio']) ? 1 : 0;
    $qual_convenio           = $_POST['qual_convenio'] ?? null;
    $necessidade_especial    = isset($_POST['necessidade_especial']) ? 1 : 0;
    $qual_necessidade        = $_POST['qual_necessidade'] ?? null;
    $problema_visao          = isset($_POST['problema_visao']) ? 1 : 0;
    $cirurgia                = isset($_POST['cirurgia']) ? 1 : 0;
    $vacina_catapora         = isset($_POST['vacina_catapora']) ? 1 : 0; 
    
    $transporte_carro        = isset($_POST['transporte_carro']) ? 1 : 0;
    $transporte_van          = isset($_POST['transporte_van']) ? 1 : 0;
    $transporte_pe           = isset($_POST['transporte_pe']) ? 1 : 0;
    $transporte_outros       = isset($_POST['transporte_outros']) ? 1 : 0;

    $doenca_anemia           = isset($_POST['anemia']) ? 1 : 0; 
    $doenca_bronquite        = isset($_POST['bronquite']) ? 1 : 0;
    $doenca_cardiaca         = isset($_POST['doenca_cardiaca']) ? 1 : 0;
    $doenca_catapora         = isset($_POST['catapora']) ? 1 : 0;
    $doenca_diabetes         = isset($_POST['diabetes']) ? 1 : 0;
    $doenca_hepatite         = isset($_POST['hepatite']) ? 1 : 0;
    $doenca_meningite        = isset($_POST['meningite']) ? 1 : 0;
    $doenca_pneumonia        = isset($_POST['pneumonia']) ? 1 : 0;
    $doenca_caxumba          = isset($_POST['caxumba']) ? 1 : 1; 
    $doenca_convulsao        = isset($_POST['convulsao']) ? 1 : 0;
    $doenca_dengue           = isset($_POST['dengue']) ? 1 : 0;
    $doenca_desidratacao     = isset($_POST['desidratacao']) ? 1 : 0;
    $doenca_refluxo          = isset($_POST['refluxo']) ? 1 : 0;
    $doenca_rubeola          = isset($_POST['rubeola']) ? 1 : 0;
    $doenca_sarampo          = isset($_POST['sarampo']) ? 1 : 0;
    $doenca_verminose        = isset($_POST['verminose']) ? 1 : 0;


    $estruturaFamiliarObj->cadastrarEstruturaFamiliar(
        $pais_vivem,
        $numero_filhos,
        $bolsa_familia,
        $valor_bolsa,
        $alergia,
        $especifique_alergia,
        $convenio,
        $qual_convenio,
        $necessidade_especial,
        $qual_necessidade,
        $problema_visao,
        $cirurgia,
        $vacina_catapora,
        // Transporte
        $transporte_carro,
        $transporte_van,
        $transporte_pe,
        $transporte_outros,
        // Doenças
        $doenca_anemia,
        $doenca_bronquite,
        $doenca_cardiaca,
        $doenca_catapora,
        $doenca_diabetes,
        $doenca_hepatite,
        $doenca_meningite,
        $doenca_pneumonia,
        $doenca_caxumba,
        $doenca_convulsao,
        $doenca_dengue,
        $doenca_desidratacao,
        $doenca_refluxo,
        $doenca_rubeola,
        $doenca_sarampo,
        $doenca_verminose
    );


    echo "<script>alert('Dados salvos com sucesso!');</script>";
}

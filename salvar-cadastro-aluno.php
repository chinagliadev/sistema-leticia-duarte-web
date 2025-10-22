<?php
require './class/Aluno.php';
require './class/Responsavel.php';
require './class/Endereco.php';
require './class/PessoaAutorizada.php';
require './class/EstrturaFamiliar.php';
require './class/Matricula.php';
require './class/MatriculaPessoaAutorizada.php';
require './config.php';

var_dump($_POST);

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['txtNomeCrianca'] ?? null;
    $raAluno = $_POST['txtRaAluno'] ?? null;

    var_dump($raAluno);
    $turma = $_POST['turma'] ?? null;
    $dataNascimento = $_POST['data_nascimento'] ?? null;
    $corRaca = $_POST['corRaca'] ?? null;

    $autorizacaoMed = isset($_POST['autorizacaoMed']) ? 1 : 0;
    $remedio = $autorizacaoMed ? ($_POST['txtRemedio'] ?? null) : null;
    $gotas = $autorizacaoMed ? ($_POST['txtGotas'] ?? null) : null;
    $autorizacaoImagem = isset($_POST['autorizacaoImagem']) ? 1 : 0;

    $cep = $_POST['txtCep'] ?? null;
    $logradouro = $_POST['txtEndereco'] ?? null;
    $numero = $_POST['txtNumero'] ?? null;
    $bairro = $_POST['txtBairro'] ?? null;
    $cidade = $_POST['txtCidade'] ?? null;
    $complemento = $_POST['txtComplemento'] ?? null;

    $pais_vivem_juntos = isset($_POST['pais_vivem_juntos']) ? 1 : 0;

    $recebe_bolsa_familia = isset($_POST['recebe_bolsa_familia']) ? 1 : 0;

    $possui_alergia = isset($_POST['possui_alergia']) ? 1 : 0;
    $especifique_alergia = $possui_alergia ? ($_POST['especifique_alergia'] ?? null) : null;

    $possui_convenio = isset($_POST['possui_convenio']) ? 1 : 0;

    $qual_convenio = $possui_convenio ? ($_POST['qual_convenio'] ?? null) : null;

    $portador_necessidade_especial = isset($_POST['portador_necessidade_especial']) ? 1 : 0;
    $qual_necessidade_especial = $portador_necessidade_especial ? ($_POST['qual_necessidade'] ?? null) : null;

    $problemas_visao = isset($_POST['problemas_visao']) ? 1 : 0;

    $ja_fez_cirurgia = isset($_POST['ja_fez_cirurgia']) ? 1 : 0;
    $qual_cirurgia = $ja_fez_cirurgia ? ($_POST['qual_cirurgia'] ?? null) : null;

    $vacina_catapora_varicela = isset($_POST['vacina_catapora_varicela']) ? 1 : 0;

    $numero_filhos               = $_POST['numero_filhos'] ?? null;

    $valor                       = $recebe_bolsa_familia ? ($_POST['valor'] ?? null) : null;

    $doenca_anemia     = isset($_POST['doenca_anemia']) ? 1 : 0;
    $doenca_bronquite  = isset($_POST['doenca_bronquite']) ? 1 : 0;
    $doenca_catapora   = isset($_POST['doenca_catapora']) ? 1 : 0;
    $doenca_covid      = isset($_POST['doenca_covid']) ? 1 : 0;
    $doenca_cardiaca   = isset($_POST['doenca_cardiaca']) ? 1 : 0;
    $doenca_meningite  = isset($_POST['doenca_meningite']) ? 1 : 0;
    $doenca_pneumonia  = isset($_POST['doenca_pneumonia']) ? 1 : 0;
    $doenca_convulsao  = isset($_POST['doenca_convulsao']) ? 1 : 0;
    $doenca_diabete    = isset($_POST['doenca_diabete']) ? 1 : 0;
    $doenca_refluxo    = isset($_POST['doenca_refluxo']) ? 1 : 0;
    $outras_doencas    = $_POST['outras_doencas'] ?? null;

    $transporte_carro       = isset($_POST['transporte_carro']) ? 1 : 0;
    $transporte_van         = isset($_POST['transporte_van']) ? 1 : 0;
    $transporte_a_pe        = isset($_POST['transporte_pe']) ? 1 : 0;
    $transporte_outros_desc = isset($_POST['transporte_outros_desc']) ? 1 : 0;

    $estruturaFamiliar = new EstruturaFamiliar();
    $estrutura_familiar_id = $estruturaFamiliar->cadastrarEstruturaFamiliar(
        $pais_vivem_juntos,
        $numero_filhos,
        $recebe_bolsa_familia,
        $valor,
        $possui_alergia,
        $especifique_alergia,
        $possui_convenio,
        $qual_convenio,
        $portador_necessidade_especial,
        $qual_necessidade_especial,
        $problemas_visao,
        $ja_fez_cirurgia,
        $qual_cirurgia,
        $vacina_catapora_varicela,
        $doenca_anemia,
        $doenca_bronquite,
        $doenca_catapora,
        $doenca_covid,
        $doenca_cardiaca,
        $doenca_meningite,
        $doenca_pneumonia,
        $doenca_convulsao,
        $doenca_diabete,
        $doenca_refluxo,
        $outras_doencas,
        $transporte_carro,
        $transporte_van,
        $transporte_a_pe,
        $transporte_outros_desc
    );
    
    $responsavel = new Responsavel();

    $tipo_responsavel_1     = $_POST['txtTipoResponsavel_1'] ?? null;
    $nome_responsavel_1     = $_POST['txtNomeResponsavel_1'] ?? null;
    $data_nascimento_1      = $_POST['data_nascimento_1'] ?? null;
    $estado_civil_1         = $_POST['txtEstadoCivil_1'] ?? null;
    $escolaridade_1         = $_POST['txtEscolaridade'] ?? 'Não informado';
    $celular_1              = $_POST['txtTelefone_1'] ?? null;
    $email_1                = $_POST['txtEmail_1'] ?? null;
    $nome_empresa_1         = $_POST['txtNomeEmpresa_1'] ?? null;
    $profissao_1            = $_POST['txtProfissao_1'] ?? null;
    $telefone_trabalho_1    = $_POST['txtTelefoneTrabalho_1'] ?? null;
    $horario_trabalho_1     = $_POST['txtHorarioTrabalho_1'] ?? null;
    $salario_1              = $_POST['txtSalario_1'] ?? null;
    $renda_extra_1          = isset($_POST['toggleRendaExtra_1']) ? 1 : 0;
    $valor_renda_extra      = $_POST['txtRendaExtra'] ?? null;


    $responsavel_1_id = $responsavel->cadastrarResponsavel(
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
        $renda_extra_1,
        $valor_renda_extra
    );

    if (!empty($_POST['txtNomeResponsavel_2'])) {
        $tipo_responsavel_2     = $_POST['txtTipoResponsavel_2'] ?? null;
        $nome_responsavel_2     = $_POST['txtNomeResponsavel_2'] ?? null;
        $data_nascimento_2      = $_POST['data_nascimento_2'] ?? null;
        $estado_civil_2         = $_POST['txtEstadoCivil_2'] ?? 'Não informado';
        $escolaridade_2         = $_POST['txtEscolaridade_2'] ?? 'Não informado';
        $celular_2              = $_POST['txtTelefone_2'] ?? null;
        $email_2                = $_POST['txtEmail_2'] ?? null;
        $nome_empresa_2         = $_POST['txtNomeEmpresa_2'] ?? null;
        $profissao_2            = $_POST['txtProfissao_2'] ?? null;
        $telefone_trabalho_2    = $_POST['txtTelefoneTrabalho_2'] ?? null;
        $horario_trabalho_2     = $_POST['txtHorarioTrabalho_2'] ?? null;
        $salario_2              = $_POST['txtSalario_2'] ?? null;
        $renda_extra_2          = isset($_POST['toggleRendaExtra_2']) ? 1 : 0;
        $valor_renda_extra_2    = $_POST['txtRendaExtra_2'] ?? null;

        $responsavel_2_id = $responsavel->cadastrarResponsavel(
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
            $renda_extra_2,
            $valor_renda_extra_2
        );
    }

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
        $raAluno,
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

    $txtNomePessoaAutorizada = $_POST['txtNomePessoaAutorizada'] ?? null;
    $txtCpfAutorizada = $_POST['txtCpfAutorizada'] ?? null;
    $txtTelefoneAutorizada = $_POST['txtTelefoneAutorizada'] ?? null;
    $txtParentesnco = $_POST['txtParentenco'] ?? null;

    $pessoa_autorizada = new PessoaAutorizada();

    $pessoa_autorizada_id = $pessoa_autorizada->cadastrarPessoaAutorizada(
        $txtNomePessoaAutorizada,
        $txtCpfAutorizada,
        $txtTelefoneAutorizada,
        $txtParentesnco
    );
    if (!empty($_POST['txtNomePessoaAutorizada2'])) {
        $txtNomePessoaAutorizada2 = $_POST['txtNomePessoaAutorizada2'] ?? null;
        $txtCpfAutorizada2 = $_POST['txtCpfAutorizada2'] ?? null;
        $txtTelefoneAutorizada2 = $_POST['txtTelefoneAutorizada2'] ?? null;
        $txtParentesco2 = $_POST['txtParentenco2'] ?? null;

        $pessoa_autorizada2 = new PessoaAutorizada();

        $pessoa_autorizada_id_2 = $pessoa_autorizada2->cadastrarPessoaAutorizada(
            $txtNomePessoaAutorizada2,
            $txtCpfAutorizada2,
            $txtTelefoneAutorizada2,
            $txtParentesco2
        );

        var_dump($pessoa_autorizada_id_2);
    }

    $matricula = new Matricula();
    $matricula_id = $matricula->cadastrarMatricula($aluno_id, $estrutura_familiar_id, $funcionario_id, $responsavel_1_id, $responsavel_2_id, $pessoa_autorizada_id, $pessoa_autorizada_id_2 ?? null);

    $matriculaPessoaAutorizada = new matriculaPessoaAutorizada();
    $matriculaPessoaAutorizada->cadastrarMatriculaPessoaAutorizada($matricula_id, $pessoa_autorizada_id);

    header('location: ./cadastrados.php');
}

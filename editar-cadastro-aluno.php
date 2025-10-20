<?php
require './config.php';
require './class/Matricula.php';

$matricula = new Matricula();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    var_dump($_POST['ra_aluno']);
    var_dump($_POST['id_matricula']);
    var_dump($_POST['id_endereco']);
    var_dump($_POST['id_resp1']);
    var_dump($_POST['id_resp2']);
    var_dump($_POST['id_estrutura_familiar']);
    var_dump($_POST['id_pessoa_autorizada1']);
    var_dump($_POST['id_pessoa_autorizada2']);

    if (isset($_POST['apagarResp2']) && $_POST['apagarResp2'] == '1') {
        $_POST['txtTipoResponsavel_2'] = null;
        $_POST['txtNomeResponsavel_2'] = null;
        $_POST['txtDataNascimento_2'] = null;
        $_POST['txtEstadoCivil_2'] = null;
        $_POST['txtTelefone_2'] = null;
        $_POST['txtEmail_2'] = null;
        $_POST['txtNomeEmpresa_2'] = null;
        $_POST['txtProfissao_2'] = null;
        $_POST['txtTelefoneTrabalho_2'] = null;
        $_POST['txtHorarioTrabalho_2'] = null;
        $_POST['txtSalario_2'] = null;
        $_POST['toggleRendaExtra_2'] = null;
        $_POST['txtRendaExtra_2'] = null;
    }


    try {
        $matricula->editarDadosCompletosIds(
            $_POST['ra_aluno'],
            $_POST['id_endereco'],
            $_POST['id_resp1'],
            $_POST['id_resp2'] ?? null,
            $_POST['id_estrutura_familiar'],
            $_POST['id_pessoa_autorizada1'] ?? null,
            $_POST['id_pessoa_autorizada2'] ?? null,
            $_POST
        );

        header('location: ./cadastrados.php');
        exit;
    } catch (Exception $e) {
        echo "<h1>Erro ao Salvar Edição</h1>";
        echo "<p>Ocorreu um erro ao atualizar o cadastro. Detalhes do Erro: " . htmlspecialchars($e->getMessage()) . "</p>";
        echo "<a href='javascript:history.back()'>Voltar ao Formulário</a>";
    }
} else {
}

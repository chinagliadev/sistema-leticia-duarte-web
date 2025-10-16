<?php

class EstruturaFamiliar
{
    private $conn;


    public function __construct()
    {
        $dsn = "mysql:dbname={$_ENV['BANCO']};host={$_ENV['HOST']}";
        $usuario = $_ENV['USUARIO'];
        $senha = $_ENV['SENHA'];

        $this->conn = new PDO($dsn, $usuario, $senha);
    }

  public function cadastrarEstruturaFamiliar(
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
    $doenca_verminose,
    $transporte_carro,
    $transporte_van,
    $transporte_a_pe,
    $transporte_outros_desc
) {

    $sqlInserir = "INSERT INTO tb_estrutura_familiar (
        pais_vivem_juntos, numero_filhos, recebe_bolsa_familia, valor, possui_alergia, especifique_alergia,
        possui_convenio, qual_convenio, portador_necessidade_especial, qual_necessidade_especial, problemas_visao, ja_fez_cirurgia, qual_cirurgia,
        vacina_catapora_varicela, doenca_anemia, doenca_bronquite, doenca_cardiaca, 
        doenca_catapora, doenca_diabetes, doenca_hepatite, doenca_meningite, 
        doenca_pneumonia, doenca_caxumba, doenca_convulsao, doenca_dengue, 
        doenca_desidratacao, doenca_refluxo, doenca_rubeola, doenca_sarampo, doenca_verminose,
        transporte_carro, transporte_van, transporte_a_pe, transporte_outros_desc
    ) 
    VALUES (
        :pais_vivem_juntos, :numero_filhos, :recebe_bolsa_familia, :valor, :possui_alergia, :especifique_alergia,
        :possui_convenio, :qual_convenio, :portador_necessidade_especial, :qual_necessidade_especial, :problemas_visao, :ja_fez_cirurgia, :qual_cirurgia, 
        :vacina_catapora_varicela, :doenca_anemia, :doenca_bronquite, :doenca_cardiaca, 
        :doenca_catapora, :doenca_diabetes, :doenca_hepatite, :doenca_meningite, 
        :doenca_pneumonia, :doenca_caxumba, :doenca_convulsao, :doenca_dengue, 
        :doenca_desidratacao, :doenca_refluxo, :doenca_rubeola, :doenca_sarampo, :doenca_verminose,
        :transporte_carro, :transporte_van, :transporte_a_pe, :transporte_outros_desc
    )";

    $dados = $this->conn->prepare($sqlInserir);

    $dados->execute([
        'pais_vivem_juntos' => $pais_vivem_juntos,
        'numero_filhos' => $numero_filhos,
        'recebe_bolsa_familia' => $recebe_bolsa_familia,
        'valor' => $valor,
        'possui_alergia' => $possui_alergia,
        'especifique_alergia' => $especifique_alergia, 
        'possui_convenio' => $possui_convenio,
        'qual_convenio' => $qual_convenio,
        'portador_necessidade_especial' => $portador_necessidade_especial,
        'qual_necessidade_especial' => $qual_necessidade_especial, 
        'problemas_visao' => $problemas_visao,
        'ja_fez_cirurgia' => $ja_fez_cirurgia,
        'qual_cirurgia' => $qual_cirurgia,
        'vacina_catapora_varicela' => $vacina_catapora_varicela,
        'doenca_anemia' => $doenca_anemia,
        'doenca_bronquite' => $doenca_bronquite,
        'doenca_cardiaca' => $doenca_cardiaca,
        'doenca_catapora' => $doenca_catapora,
        'doenca_diabetes' => $doenca_diabetes,
        'doenca_hepatite' => $doenca_hepatite,
        'doenca_meningite' => $doenca_meningite,
        'doenca_pneumonia' => $doenca_pneumonia,
        'doenca_caxumba' => $doenca_caxumba,
        'doenca_convulsao' => $doenca_convulsao,
        'doenca_dengue' => $doenca_dengue,
        'doenca_desidratacao' => $doenca_desidratacao,
        'doenca_refluxo' => $doenca_refluxo,
        'doenca_rubeola' => $doenca_rubeola,
        'doenca_sarampo' => $doenca_sarampo,
        'doenca_verminose' => $doenca_verminose,
        'transporte_carro' => $transporte_carro,
        'transporte_van' => $transporte_van,
        'transporte_a_pe' => $transporte_a_pe,
        'transporte_outros_desc' => $transporte_outros_desc
    ]);

    return $this->conn->lastInsertId();
}

}
<?php

include './class/Matricula.php';
include './config.php';

echo "<h1>excluir-cadastro-aluno.php</h1>";

var_dump($_POST);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $ra_aluno = $_POST['ra_aluno'] ?? null;

    if($ra_aluno !== null){
        $matricula = new Matricula();

        $sucesso = $matricula->deletarAlunoCompleto($ra_aluno); 
        
        if ($sucesso) {
            echo "deu bom";
            header('location: ./cadastrados.php');
        }
    }
}
<?php

include './class/Matricula.php';
include './config.php';

echo "<h1>excluir-cadastro-aluno.php</h1>";

var_dump($_POST);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $id_aluno = $_POST['id_aluno'] ?? null;

    if($id_aluno !== null){
        $matricula = new Matricula();
        
        $sucesso = $matricula->deletarAlunoCompleto($id_aluno); 
        
        if ($sucesso) {
            header('location: ./cadastrados.php');
        }

        echo 'deu ruim';
    }
}
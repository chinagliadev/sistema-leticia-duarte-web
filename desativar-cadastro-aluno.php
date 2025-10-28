<?php

include './class/Matricula.php';
include './config.php';

echo "<h1>excluir-cadastro-aluno.php</h1>";

var_dump($_POST);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $id_aluno = $_POST['id_aluno'] ?? null;

    if($id_aluno !== null){
        $matricula = new Matricula();
        
        $matricula->desativarMatricula($id_aluno); 
        header('location: ./cadastrados.php');
        var_dump($matricula);

    }
}
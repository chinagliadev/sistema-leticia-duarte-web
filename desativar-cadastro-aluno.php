<?php

include './class/Matricula.php';
include './config.php';

echo "<h1>excluir-cadastro-aluno.php</h1>";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $id_aluno = $_POST['id_aluno'] ?? null;

    if($id_aluno !== null){
        $matricula = new Matricula();
        
        $matricula->desativarMatricula($id_aluno); 
        header('location: ./cadastrados.php');

    }
}
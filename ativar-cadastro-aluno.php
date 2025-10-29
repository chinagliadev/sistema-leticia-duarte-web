<?php

require('./class/Matricula.php');
require('./config.php');

if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $id_aluno = $_POST['id_aluno'] ?? null;

    if($id_aluno !== null){
        $matricula = new Matricula();
        
        $matricula->reativarMatricula($id_aluno);
        header('location: ./cadastrados.php');
        var_dump($matricula);

    }
}

?>
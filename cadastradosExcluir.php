<?php
echo '<h1>Cadastrados Excluir</h1>';
$dns = 'mysql:dbname=leticia_duarte;host=127.0.0.1';
$usuario = 'root';
$senha = ''; 

$conn = new PDO($dns, $usuario, $senha);

$id = $_GET['idExluir'];


$deleteMatricula = $conn->prepare("DELETE FROM tb_matricula WHERE aluno = :id");
$deleteMatricula->execute([':id' => $id]);

$deleteAluno = $conn->prepare("DELETE FROM tb_alunos WHERE ra_aluno = :id");
$deleteAluno->execute([':id' => $id]);

if($deleteAluno->rowCount() > 0){
    echo '<h2>Registro apagado com sucesso !</h2>';
    header('location:cadastrados.php');
}else{
    echo '<h2>Algo deu errado!</h2>';
}

?>
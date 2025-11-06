<?php
require './config.php';

header('Content-Type: application/json');

if (!isset($_GET['ra'])) {
    echo json_encode(['erro' => 'RA não fornecido']);
    exit;
}

$ra = trim($_GET['ra']);

try {
    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM tb_alunos WHERE ra_aluno = ?");
    $stmt->execute([$ra]);
    $resultado = $stmt->fetch();

    echo json_encode(['existe' => $resultado['total'] > 0]);
} catch (Exception $e) {
    echo json_encode(['erro' => $e->getMessage()]);
}

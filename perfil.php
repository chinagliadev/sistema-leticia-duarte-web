<?php
include './config.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$id = $_SESSION['usuario']['id'] ?? null;

$sql = "SELECT * FROM tb_funcionario WHERE id_funcionario = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

$sqlHist = "
    SELECT 
        m.id_matricula,
        a.nome AS nome_aluno,
        r1.nome AS responsavel_1,
        r2.nome AS responsavel_2,
        m.data
    FROM tb_matricula m
    LEFT JOIN tb_alunos a ON m.aluno_id = a.id
    LEFT JOIN tb_responsaveis r1 ON m.responsavel_1_id = r1.id_responsavel
    LEFT JOIN tb_responsaveis r2 ON m.responsavel_2_id = r2.id_responsavel
    WHERE m.funcionario_id = ?
    ORDER BY m.data DESC
";

$stmtHist = $conn->prepare($sqlHist);
$stmtHist->execute([$id]);
$historico = $stmtHist->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css">
    <link rel="stylesheet" href="./css/sistema.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>
    <button id="btn-menu" class="ui icon button">
        <i class="sidebar icon"></i>
    </button>

    <section class="corpo_pagina">
        <?php include './template/menuLateral.php' ?>

        <main class="conteudo_cadastrados">
            <section class="cabecalho_cadastrados">
                <h2>Perfil do Usuário</h2>
                <img class="ui small image fluid" src="./img/apresentacao_img/Logo Leiticia Duarte.png"
                    alt="Logo Leiticia Duarte">
            </section>

            <section class="sessao_cadastro ui segment blue">
                <?php if ($usuario): ?>
                    <div class="ui two column stackable grid">
                        <div class="ten wide column">
                            <div class="ui card fluid">
                                <div class="content">
                                    <a class="header"><?= ($usuario['nome']) ?></a>
                                    <div class="meta">
                                        <span>ID: <?= ($usuario['id_funcionario']) ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="ui segment">
                                <h4 class="ui dividing header">
                                    <i class="history icon"></i>
                                    Histórico de Matrículas
                                </h4>
                                <div class="ui very basic segment" style="max-height: 280px; overflow-y: auto;">
                                    <?php if (count($historico) > 0): ?>
                                        <table class="ui celled striped compact small table">
                                            <thead>
                                                <tr>
                                                    <th>ID Matrícula</th>
                                                    <th>Aluno</th>
                                                    <th>Responsável 1</th>
                                                    <th>Responsável 2</th>
                                                    <th>Data</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($historico as $row): ?>
                                                    <tr>
                                                        <td><?= ($row['id_matricula']) ?></td>
                                                        <td><?= ($row['nome_aluno'] ?? '---') ?></td>
                                                        <td><?= ($row['responsavel_1'] ?? 'Nenhum cadastrado') ?></td>
                                                        <td><?= ($row['responsavel_2'] ?? 'Nenhum cadastrado') ?></td>
                                                        <td><?= $row['data'] ? date('d/m/Y H:i', strtotime($row['data'])) : '---' ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php else: ?>
                                        <div class="ui message">
                                            <div class="header">Nenhum histórico encontrado</div>
                                            <p>Este usuário ainda não cadastrou nenhuma matrícula.</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="six wide column">
                            <form class="ui form" method="POST" action="salvarPerfil.php" id="formPerfil">
                                <div class="field">
                                    <label>Nome</label>
                                    <input type="text" name="nome" value="<?= ($usuario['nome']) ?>" readonly required>
                                </div>
                                <div class="field">
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?= ($usuario['email']) ?>" readonly required>
                                </div>
                                <div class="field">
                                    <label>Celular</label>
                                    <input type="text" id="celular" name="celular" value="<?= ($usuario['celular']) ?>" readonly required>
                                </div>
                                <div class="field">
                                    <label>CPF</label>
                                    <input type="text" id="cpf" name="cpf" value="<?= ($usuario['cpf']) ?>" readonly required>
                                </div>

                                <div class="ui error message"></div>

                                <input type="hidden" name="id_funcionario" value="<?= $usuario['id_funcionario'] ?>">

                                <div class="ui divider"></div>
                                <button class="ui primary button" type="button" id="editarPerfil">
                                    <i class="edit icon"></i> Editar Perfil
                                </button>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="ui negative message">
                        <div class="header">Usuário não encontrado!</div>
                        <p>Verifique se está logado corretamente.</p>
                    </div>
                <?php endif; ?>
            </section>
        </main>
    </section>
    <script src="./js/perfil.js"></script>
</body>

</html>